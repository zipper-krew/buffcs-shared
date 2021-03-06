<?php 
return [
	# настройка сайта
	'SITEURL' 		=> 'https://buffcs.csonelove.ru/', // урл сайта // слеш в конце важен!
	'STYLE' 		=> 'default', //
	'NAME' 			=> 'BUFFCS', // название сайта
	'RULES_URL' 	=> '#', // ссылка на правила
	'ICONS' 		=> 1, // иконки привилегий, 1 - вкл. 0 - выкл
	'RELOADADMINS' 	=> 1, // отправлять amx_reloadadmins после покупки привилегии (в БД amx_serverinfo должен быть rcon)
	'VK_GROUP'		=> 'https://vk.com/alabamasster1337', // полная ссылка на группу вк
	'WEB_SERVER_IP'	=> '127.0.0.1', // ip вашего web сервера для отправки cron-a
	'GEO_IP'		=> 1, // какой модуль geo ip юзать // 0- geoip php, 1 - other api
	'BUYERS_SORT'	=> 1, // кого показывать в покупателях // 1 - всех // 2 - всех у кого НЕ кончилась привилегия

	# id каких привилегий скрывать в списке покупателей
	'HIDDEN_PRIV' => [
		0,
		//example
		// 1,
		// 3,
		// 7,
	],
	
	# настройки банлиста
	'BANS' => [
		'charset'	=> 'latin1', // latin1 или utf8
		'price'		=> 1, // цена разбана (покупка разбана работает только с freekassa и robokassa)
		'hide_ip'	=> 0, // скрыть ip // 0/1
		'hide_id'	=> 0, // скрыть steamid // 0/1
	],
	
	# настройка smtp (отправка почты)
	# yandex https://yandex.ru/support/mail/mail-clients.html
	# google https://support.google.com/mail/answer/7126229?hl=ru
	# - для гугла возможно потребуется разрешить доступ небезопасных приложений или типа того
	# mail.ru https://help.mail.ru/mail/mailer/popsmtp
	'SMTP' => [
		'host' 		=> 'smtp.yandex.ru', // host // example: smtp.yandex.ru
		'username' 	=> 'mail@yandex.ru', // username // example: mail@yandex.ru
		'password' 	=> 'qwerty', // user password
		'port' 		=> 465, // port
		'from' 		=> 'mail@yandex.ru', // адрес почты ОТ КОГО
		'reply' 	=> 'mail@yandex.ru', // адрес почты для ответа
	],

	# скидка
	'DISC' => [
		'active' => 1, // 0 - выкл // 1 - вкл
		'discount' => 10, // скидка, целое число без знака '%'
		'currency' => 'руб.', // название валюты 
		'mess_animated' => 1, // сообщение о скидке на главной // 0 - выкл, 1 - сообщение с анимацией, 2 - сообщение статичное
	],

	# FREEKASSA
	'FK' => [
		'active' 		=> 1,
		'test' 			=> 0, // тест
		'merchant_id' 	=> 1337,
		'secret_word1'	=> 'qwerty', // секретное слово(пароль) #1
		'secret_word2' 	=> 'qwerty', // секретное слово(пароль) #2
		'url'			=> 'https://www.free-kassa.ru/merchant/cash.php', // не менять
	],

	# ROBOKASSA
	'RK' => [
		'active'	=> 1,
		'test'		=> 1, // тест
		'shop_id'	=> 'qwerty',  // shop id
		'pass1'		=> 'qwerty', // секретное слово(пароль) #1
		'pass2'		=> 'qwerty', // секретное слово(пароль) #2
		'url'		=> 'https://auth.robokassa.ru/Merchant/Index.aspx', // не менять
	],

	# UnitPay
	'UP' => [
		'active' 		=> 1,
		'projectId'		=> 1337, // ID вашего проекта в системе UnitPay
		'secretKey'		=> 'qwerty', // Секретный ключ, доступен в настройках проекта
		'publicId'		=> 'qwerty', // PUBLIC KEY
		'domain'		=> 'unitpay.money', // домен // не менять
		'currency'		=> 'RUB', // валюта
	],

	'TEXT' => [
		// голубой блок на главной
		'info_block' => '
			<div class="mess mess-info" style="font-size: 14px;">
				<h6 class="alert-heading font-weight-bold">Активация услуги</h6>
				- Услуга будут активна после смены карты на сервере<br>
				- В консоли игры напишите: setinfo _pw "пароль от услуги" и нажмите ENTER<br><br>
				<h6 class="alert-heading font-weight-bold">Примечание</h6>
				- Если вы не используете Steam, рекомендуется выбрать Ник + Пароль<br>
				- Вы соглашаетесь с <a href="#" target="_blank">правилами</a><br>
				- Возврат средств невозможен<br>
				- Вабба лабба даб даб
			</div>
		',
	],
];
