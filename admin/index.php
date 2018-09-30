<?php
session_start();

function pr($var) {
		echo '<pre>';
		print_r($var);
		echo '</pre>';
		die;
	}

if(isset($_GET['controller']) && isset($_GET['action'])) {
		$controller = $_GET['controller'];
		$action = $_GET['action'];
	}
else {
	$controller = "Product";
	$action = "index";
}
require_once "controller/".$controller."Controller.php";
$modelClass = $controller."Controller";
$model = new $modelClass();
$model->$action();