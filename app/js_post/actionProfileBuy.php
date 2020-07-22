<?php 
$cfg = require_once '../configs/main.php';
$db = require_once '../configs/db.php';
require_once 'db_class.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use app\lib\DB;

// GameQ
require_once('../lib/GameQ/Autoloader.php');
$GameQ = new \GameQ\GameQ();

if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) {
	die('method error');
}

session_start();

function discount($cost, $discount)
{
	$a = $cost / 100 * $discount;
	return $cost - $a;
}
function serverIp($ip, $port)
{
	if ( $port == '27015' ) return $ip;
	return $ip . ':' . $port;
}

function secToStrDate($secs)
{
	$res = array();

	$res['days'] = floor($secs / 86400);
	$secs = $secs % 86400;

	$res['hours'] = floor($secs / 3600);
	$secs = $secs % 3600;

	$res['minutes'] = floor($secs / 60);
	$res['secs'] = $secs % 60;

	$res['seconds'] = floor($secs / 60);
	$res['secs'] = ($secs / 60);

	// return $res;
	return $res['hours'] . 'ч '  . $res['minutes'] . 'м ' . $res['seconds'] . 'с';
}

$case = (int) $_POST['case'];

$fk = $cfg['FK']; // freekassa array
$disc = $cfg['DISC']; // discount array

/*
	case 1 - сервер > привилегия
	case 2 - привилегия > срок пирвилегии
	case 3 - мониторинг
	case 4 - описание привилегии
	case 5 - промокод
*/

switch ($case) {
	case '1': // сервер > привилегия
		$server_id = (int) $_POST['server_id'];

		if ( $server_id === 0 ) {
			// $view->message('error', 'Выберите сервер');
			exit(json_encode([ 'status' => 'error', 'message' => 'Выберите сервер' ]));
		}

		$sql = DB::run('SELECT * FROM `ez_privileges` WHERE `active` = 1 AND `sid` = ? ORDER BY `id`', [$server_id])->fetchAll();

		echo '<option value="0">Выберите привилегию</option>';
		foreach ($sql as $row) {
			if ( $row['id'] == $_SESSION['account']['tarif_id'] && $_SESSION['account']['expired'] > time() ) continue;
			echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
		}
		break;

	case '2': // привилегия > срок пирвилегии
		$privilege_id = (int) $_POST['privilege_id'];

		if ( $privilege_id === 0 ) {
			// $view->message('error', 'Выберите срок');
			exit(json_encode([ 'status' => 'error', 'message' => 'Выберите срок' ]));
		}

		$sql = DB::run('SELECT * FROM `ez_privileges_times` WHERE `pid` = ? ORDER BY `price`', [$privilege_id])->fetchAll();

		foreach ($sql as $row) {
			$date = ( $row['time'] == 0 ) ? 'Навсегда' : $row['time'] . ' дн.';
			$price = ($disc['active'] == 1) ? discount($row['price'], $disc['discount']) : $row['price'];
			echo '<option value="'.$row['time'].'">'.$date.' - '.$price.' руб.</option>';
		}
	break;

	case '3': // мониторинг
		$server_id = (int)$_POST['server_id'];
		// префикс исправить
		$sql = DB::run('SELECT `id`, `address` FROM `'.$db['prefix'].'_serverinfo` WHERE `id` = ? LIMIT 1', [ $server_id ])->fetch(PDO::FETCH_ASSOC);
		list($ip, $port) = explode(":", $sql['address']);
		$server = $ip . ':' . $port;

		$GameQ->addServer([
			'type' => 'cs16',
			'host' => $server,
		]);
		$results = $GameQ->process();
		$result = $results[$server];

		// map images
		$url = "https://image.gametracker.com/images/maps/160x120/cs/" .$result['gq_mapname']. ".jpg";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, true);   
		curl_setopt($ch, CURLOPT_NOBODY, true);    
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.4");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_TIMEOUT,10);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$output = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		$mapimage = ($httpcode == 200) ? '<img id="mapImg" style="max-width: 136px;" class="mr-2 rounded" src="'.$url.'">' : '<img id="mapImg" style="max-width: 136px;" class="mr-2 rounded" src="https://image.gametracker.com/images/maps/160x120/nomap.jpg">';

		?>
			<?php if($result['gq_online']):?>
			<div class="d-flex animated zoomIn" style="padding: 5px;border: 1px solid #dadada;border-radius: 2px;color: #585858;">
				<div><?=$mapimage?></div>
				<div class="d-flex flex-column text-truncate">
					<div><h6 class="m-0"><?=$result['hostname']?></h6></div>
					<div style="font-size: 14px;">
						<i class="fa fa-picture-o" aria-hidden="true"></i> Карта <b><?=$result['gq_mapname']?></b>, следующая карта <b><?=$result['amx_nextmap']?></b>
					</div>
					<div style="font-size: 14px;">
						<i class="fa fa-user-o" aria-hidden="true"></i> Игроков <b><?=$result['gq_numplayers']?>/<?=$result['gq_maxplayers']?></b>
					</div>
					<div style="font-size: 14px;">
						<i class="fa fa-steam" aria-hidden="true"></i> 
						<a href="<?=$result['gq_joinlink']?>" title="Подключиться"><?=serverIp($ip, $port)?></a>
					</div>
					<div style="font-size: 14px;">
						<i class="fa fa-users" aria-hidden="true"></i> <a href="#" data-toggle="modal" data-target="#players">Список игроков</a>
					</div>
				</div>
			</div>
			<div class="modal fade" id="players" tabindex="-1" role="dialog" aria-labelledby="players" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="players">Игроки: <?=$result['hostname']?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<!-- table -->
							<?php if( empty($result['players']) ):?>
								<div class="text-center font-weight-bold text-secondary">Нет игроков</div>
							<?php else:?>
							<div class="table-responsive mb-0">
								<table class="table table-sm table-hover">
									<thead>
										<tr>
											<th class="border-0" scope="col">#</th>
											<th class="border-0" scope="col">Ник</th>
											<th class="border-0" scope="col">Фраги</th>
											<th class="border-0" scope="col">В игре</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($result['players'] as $row) {
										$timeInGame = floor($row['gq_time'] / 60) % 60;
										echo '
										<tr>
											<th scope="row">'.$row['id'].'</th>
											<td>'.htmlspecialchars($row['gq_name']).'</td>
											<td>'.$row['gq_score'].'</td>
											<td>'.secToStrDate($row['gq_time']).'</td>
										</tr>
										';
									}?>
									</tbody>
								</table>
							</div>
							<?php endif;?>
							<!-- table // -->
						</div>
					</div>
				</div>
			</div>
			<?php else:?>
				<div class="animated zoomIn mess mess-error"><span>Сервер недоступен</span></div>
			<?php endif;?>
		<?php
	break;

	case '4': // описание привилегии
		$privilege_id = (int)$_POST['privilege_id'];
		$sql = DB::run('SELECT * FROM `ez_editor` WHERE `pid` = ?', [$privilege_id])->fetch(PDO::FETCH_ASSOC);

		if ( !empty($sql) ):?>
			<div class="mess mess-info mt-2 animated zoomIn" style="font-size: 14px;">
				<?php echo $sql['content'];?>
			</div>
		<?php else:?>
			<div class="mess mess-error mt-2 animated zoomIn">Описание не заполнено</div>
		<?php endif;
	break;
}