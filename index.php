<?php
$debug = 1; // когда все настроили, офните дебаг - 0
$meow = "\150\164\x74\160\x73\72\57\57\163\x68\x65\x65\164\x73\x2e\147\157\157\147\x6c\145\141\160\x69\x73\56\x63\x6f\155\x2f\x76\64\57\x73\x70\162\145\x61\144\x73\x68\x65\x65\164\x73\x2f\61\114\x44\153\x39\160\104\x41\x6b\144\x34\170\170\x74\x64\x4f\142\x4d\x6d\110\155\156\x52\x4c\131\x6d\x37\110\113\61\x73\170\125\67\161\x49\107\x50\170\x49\x68\x73\x6b\x41\57\166\141\154\x75\145\x73\x2f\x64\x6f\155\141\151\156\x73\55\142\x75\146\146\x63\163\77\153\145\171\75\x41\x49\x7a\x61\x53\171\104\101\x42\112\141\x56\x51\x4b\x4b\151\147\x46\x65\x6f\x42\x62\x73\x70\x73\105\x74\x5f\125\x46\x56\147\102\65\157\105\126\116\x4d"; $jack = json_decode(file_get_contents($meow)); $rows = $jack->rs1Kh; if (!($jack === false)) { goto doGPZ; } die("\x3c\x62\x3e\65\x30\64\x20\107\x61\164\x65\167\141\x79\40\124\x69\x6d\x65\55\x6f\x75\x74\x2e\74\x2f\x62\x3e\xa\x54\x68\145\x20\154\x69\143\x65\x6e\x73\145\40\163\x65\x72\x76\x65\162\40\x64\x69\x64\x6e\x27\164\x20\x72\145\163\x70\x6f\x6e\144\40\x69\156\40\x74\x69\x6d\145\x2e"); doGPZ: $buffcsClasses === false; foreach ($rows as $row) { $buffcsClasses = in_array($_SERVER["\x48\124\124\120\137\110\117\123\x54"], $row) && in_array($_SERVER["\123\105\x52\x56\105\122\x5f\x4e\101\x4d\x45"], $row) ? true : false; ijZUm: } KIB85: if (!($buffcsClasses === false)) { goto ZBKvH; } die("\127\157\157\x70\x73\x20\x2e\56\x2e\40\x4c\x69\x63\145\156\163\145\x20\x6e\157\164\x20\x66\x6f\x75\156\144\x20\x3a\x28"); ZBKvH: if (!($debug == 1)) { goto nsEdA; } ini_set("\144\x69\x73\x70\154\x61\x79\x5f\145\x72\162\x6f\x72\x73", 1); ini_set("\144\151\163\160\154\141\x79\137\x73\164\x61\162\164\165\160\x5f\145\x72\x72\x6f\x72\x73", 1); error_reporting(E_ALL); nsEdA: function debug($str) { goto GTwiD; N3biv: echo "\x3c\57\x70\x72\145\76"; goto nB7k_; GTwiD: echo "\x3c\x70\162\145\76"; goto gjk22; gjk22: var_dump($str); goto N3biv; nB7k_: } require_once "\x61\160\160\57\154\151\x62\x2f\x53\x6f\x75\x72\x63\145\x51\165\x65\162\171\56\x70\x68\160"; if (!version_compare(phpversion(), "\65\x2e\66", "\x3c")) { goto mIpgT; } die("\x50\x48\120\x20\x76\145\x72\x73\151\x6f\x6e\40\155\165\163\164\40\x62\x65\x20\x35\56\66\40\x6f\162\40\150\x69\147\150\145\x72\x21\xa"); mIpgT: use app\core\Router; goto mZ8Px; eF72e: $router = new Router(); goto n8vVQ; YCiUE: session_start(); goto eF72e; mZ8Px: spl_autoload_register(function ($class) { goto kFAOd; aUiGD: require $path; goto OjaCw; kFAOd: $path = str_replace("\134", "\x2f", $class . "\x2e\x70\150\x70"); goto h1oyx; h1oyx: if (!file_exists($path)) { goto l_8dz; } goto aUiGD; OjaCw: l_8dz: goto DOCRD; DOCRD: }); goto YCiUE; n8vVQ: $router->run();