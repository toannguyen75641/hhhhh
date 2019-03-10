<?php
	require_once "Model.php";

	Class UserModel extends Model 
	{
		public function __construct() {
			parent::__construct();		
		}

		public function getAll() {
			$query = $this->ex_query("SELECT * FROM user");
			$result = [];
			while ($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
			return $result;
		}

		public function getOne($email) {
			$query = $this->ex_query("SELECT * FROM user WHERE email = '$email' LIMIT 1");
			// die($query);
			$row = mysqli_fetch_assoc($query);
			return $row;
		}

		public function Add($data) {
			$query = "INSERT INTO user (name, email, password, status, created) VALUES ('".$data['name']."','".$data['email']."','".$data['password']."','".$data['status']."','".$data['created']."')";
			return $this->ex_query($query);
		}

		public function getById($id) {
			$query = $this->ex_query("SELECT * from user where id = ".$id);	
			$row = mysqli_fetch_assoc($query);
			return $row;
		}

		public function Update($data,$id) {
			$query = "UPDATE user SET name = '".$data['name']."', email = '".$data['email']."', password = '".$data['password']."', status = '".$data['status']."' where id = ".$id;
			return $this->ex_query($query);
		}

		public function Delete($id) {
			$query = "DELETE FROM user WHERE id = ".$id;
			return $this->ex_query($query);
		}
	}