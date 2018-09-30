<?php
	require_once "Model.php";

	class ContactModel extends Model
	{
		public function __construct() {
			parent::__construct();
		}

		public function add($data) {
			$query = "INSERT INTO contact (email, message, created) VALUES ('".$data['email']."','".$data['message']."','".$data['created']."')";
			return $this->ex_query($query);
		}
	}