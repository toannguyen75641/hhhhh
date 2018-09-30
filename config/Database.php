<?php
	class Database {
		private $host = "localhost";
		private $user = "root";
		private $password = "";
		private $db = "computer";
		public $conn;

		public function __construct() {
			$this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);
			mysqli_set_charset($this->conn, 'UTF8');
			if(!$this->conn) {
				die("can't connected");
			}
		}

		public function ex_query($query = "") { 
			if($query != "") {
				return mysqli_query($this->conn, $query);
			}
			else return -1;
		}
	}
?>