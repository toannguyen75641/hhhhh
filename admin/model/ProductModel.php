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

		public function Add($data = []) {
			$query = "INSERT INTO product (product_code, category_id, name, quantity,";

			if(isset($data['image'])) {
				$query .= "image, price, description, status, created) VALUES ('".$data['product_code']."','".$data['category_id']."','".$data['name']."','".$data['quantity']."','".$data['image']."','".$data['price']."','".$data['description']."','".$data['status']."','".$data['created']."')";
			}
			
			else {
				$query .= "price, description, status, created) VALUES ('".$data['product_code']."','".$data['category_id']."','".$data['name']."','".$data['quantity']."','".$data['price']."','".$data['description']."','".$data['status']."','".$data['created']."')";
			}
			return $this->ex_query($query);
		}

		public function getById($id) {
			$query = $this->ex_query("SELECT * FROM product WHERE id = ".$id);	
			$row = mysqli_fetch_assoc($query);
			return $row;
		}

		public function Update($data, $id) {
			$query = "UPDATE product SET product_code = '".$data['product_code']."', category_id = '".$data['category_id']."', name = '".$data['name']."', quantity = '".$data['quantity']."',";

			if (isset($data['image'])) {
				$query .= "image = '".$data['image']."',";
			}

			$query .= "price = '".$data['price']."', description = '".$data['description']."', status = '".$data['status']."' where id = ".$id;

			return $this->ex_query($query);
		} 

		public function Delete($id) {
			$query = "DELETE FROM product WHERE id = ".$id;
			return $this->ex_query($query);
		}

	}