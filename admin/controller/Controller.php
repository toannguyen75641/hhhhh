<?php
	require_once "model/Model.php";
	require_once "Template.php";

	class Controller 
	{
		public $model;

		public function __construct() {
			$this->template = new Template('view/templates/');
		}

		public function loadModel($name) {
			$class = $name. "Model";
			include "model/".$class.".php";
			$this->$name = new $class();
		}

		public function redirect($url) {
		 	if(!empty($url)) {
		 		header("Location: $url");
		 		exit();
		 	}
		 }

	}