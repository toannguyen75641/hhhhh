<?php
	require_once "Model.php";

	Class ProductModel extends Model 
	{
		public function __construct() {
			parent::__construct();
			$this->table = "product";
		}

		public function getAll() {
			$query = $this->ex_query("SELECT product.*, category.name AS category_name FROM product LEFT JOIN category ON (product.category_id = category.id);");
			$result = [];
			while ($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
			return $result;
		}

		public function getByCategory($category_id) {
			$query = $this->ex_query("SELECT * FROM product WHERE category_id = ".$category_id);
			$result = [];
			while ($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
			return $result;
		}

		public function getById($id) {
			$query = $this->ex_query("SELECT * FROM product WHERE id = ".$id);	
			$row = mysqli_fetch_assoc($query);
			return $row;
		}

	}