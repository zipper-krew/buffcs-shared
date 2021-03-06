<?php 
return [
	// MainController
	'' => [
		'controller'=> 'main',
		'action' => 'index',
	],
	'buy' => [
		'controller'=> 'main',
		'action' => 'buy',
	],
	'buyers{args:.*|\d+\/d+}' => [ // {page:.*\/|\z|\/\d+} // args:.*\/\d+
		'controller'=> 'main',
		'action' => 'buyers',
	],
	'error{error\?(.*)}' => [
		'controller'=> 'main',
		'action' => 'error',
	],
	'success{success\?(.*)}' => [ // success\?(.*)
		'controller'=> 'main',
		'action' => 'success',
	],
	'support' => [
		'controller' => 'main',
		'action' => 'support',
	],
	'cron' => [
		'controller' => 'main',
		'action' => 'cron',
	],

	// AdminController
	'admin' => [
		'controller'=> 'admin',
		'action' => 'index',
	],
	'admin/login' => [
		'controller'=> 'admin',
		'action' => 'login',
	],
	'admin/home' => [
		'controller'=> 'admin',
		'action' => 'home',
	],
	'admin/addprivileges' => [
		'controller'=> 'admin',
		'action' => 'addprivileges',
	],
	'admin/adduser' => [
		'controller'=> 'admin',
		'action' => 'adduser',
	],
	'admin/promo' => [
		'controller'=> 'admin',
		'action' => 'promo',
	],
	'admin/infoprivileges' => [
		'controller'=> 'admin',
		'action' => 'infoprivileges',
	],
	'admin/amxadmins' => [
		'controller' => 'admin',
		'action' => 'amxadmins',
	],

	'admin/exit' => [
		'controller'=> 'admin',
		'action' => 'exit',
	],

	// AccountController
	'account' => [
		'controller'=> 'account',
		'action' => 'index',
	],
	'account/login' => [
		'controller'=> 'account',
		'action' => 'login',
	],
	'account/profile/{id:\d+}' => [
		'controller'=> 'account',
		'action' => 'profile',
	],
	'account/profile/edit' => [
		'controller'=> 'account',
		'action' => 'edit',
	],
	'account/profile/change' => [
		'controller'=> 'account',
		'action' => 'change',
	],
	'account/profile/buy' => [
		'controller'=> 'account',
		'action' => 'buy',
	],
	'account/profile/update' => [
		'controller' => 'account',
		'action' => 'update',
	],
	'account/reset' => [ // account/reset/{token:\w+}
		'controller' => 'account',
		'action' => 'reset',
	],
	'account/profile/exit' => [
		'controller'=> 'account',
		'action' => 'exit',
	],

	// AccountController
	'merchant/freekassa' => [
		'controller'=> 'merchant',
		'action' => 'freekassa',
	],
	'merchant/robokassa' => [
		'controller'=> 'merchant',
		'action' => 'robokassa',
	],
	'merchant/webmoney' => [
		'controller'=> 'merchant',
		'action' => 'webmoney',
	],
	'merchant/unitpay{unitpay\?(.*)}' => [
		'controller'=> 'merchant',
		'action' => 'unitpay',
	],
	'merchant/qiwi' => [
		'controller'=> 'merchant',
		'action' => 'qiwi',
	],
	'merchant/yandexmoney' => [
		'controller'=> 'merchant',
		'action' => 'yandexmoney',
	],

	// BansController
	'bans{bans\?.*}' => [ // {page:.*\/|\z|\/\d+} // {page:.*} // {page:\/\d+}
		'controller' => 'bans',
		'action' => 'index',
	],
	'bans/ban{id:\w+}' => [
		'controller' => 'bans',
		'action' => 'ban',
	],
];