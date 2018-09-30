<?php
	require_once "Model.php";

	class CustomerModel extends Model
	{
		
		public function __construct() {
			parent::__construct();
		}

		public function getAll() {
			$query = $this->ex_query("SELECT * FROM customer ");
			$result = [];
			while ($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
			return $result;
		}

		public function getByName($name) {
			$query = $this->ex_query("SELECT * FROM customer WHERE name = ".$name);
			$row = mysqli_fetch_assoc($query);
			return $row;
		}
		
		public function Add($data) {
			$query = "INSERT INTO customer (name, email, phone, address, created) VALUES ('".$data['name']."','".$data['email']."','".$data['phone']."','".$data['address']."','".$data['created']."')";
			return $this->ex_query($query);
		}

		public function getById($id) {
			$query = $this->ex_query("SELECT * from customer WHERE id = ".$id);	
			$row = mysqli_fetch_assoc($query);
			return $row;
		}

		public function Update($data, $id) {
			$query = "UPDATE customer SET name = '".$data['name']."', email = '".$data['email']."', phone = '".$data['phone']."', address = '".$data['address']."' where id = ".$id;
			return $this->ex_query($query);
			//die($query);
		}

		public function Delete($id) {
			$query = "DELETE FROM customer WHERE id = ".$id;
			return $this->ex_query($query);
		}
	}