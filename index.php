<?php

function  __autoload($classname){
	include_once("c/$classname.php");
}

$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';

if (isset($_GET['c'])) {
	if ($_GET['c'] == 'page') {
		$controller = new C_Page();
	} else if ($_GET['c'] == 'user') {
		$controller = new C_User();
	}
} else {
	$controller = new C_Page();
}

$controller->Request($action);// запускается общий метод в которм еще три метода
// в обном методе подставляется $action и запускается также будет запущен метод render

