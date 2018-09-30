<?php
	require_once "Model.php";

	class CategoryModel extends Model
	{
		
		public function __construct() {
			parent::__construct();
			$this->table = "category";
		}

		public function getAll() {
			$query = $this->ex_query("select * from ".$this->table);
			$result = [];
			while ($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
			return $result;
		}

		public function getByName($name) {
			$query = $this->ex_query("SELECT * FROM category WHERE name = ".$name);
			$row = mysqli_fetch_assoc($query);
			return $row;
		}

		public function getById($id) {
			$query = $this->ex_query("SELECT * from category WHERE id = ".$id);	
			$row = mysqli_fetch_assoc($query);
			return $row;
		}

	}