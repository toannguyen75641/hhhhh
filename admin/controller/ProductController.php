<?php
	require_once "Controller.php";

	class ProductController extends Controller
	{
		public function index() {
			if(!isset($_SESSION['user'])) {
				$this->redirect("index.php?controller=User&action=login");
			}
			
			$this->loadModel("Product");		
			$list = $this->Product->getAll();

			$this->template->set('title', 'Product Manager');
			$this->template->set('list', $list);
			$this->template->render('product/index.tpl');
			$this->template->output();
		}

		public function add() {
			if(!isset($_SESSION['user'])) {
				$this->redirect("index.php?controller=User&action=login");
			}

			if(!empty($_POST)) {
				$data = $_POST;
				$this->loadModel("Product");

				if (isset($_FILES['image'])) {
					if ($_FILES['image']['error'] === 0) {
						$file_name = "uploads/".$_FILES['image']['name'];
						if(move_uploaded_file($_FILES['image']['tmp_name'], $file_name)) {
							$data['image'] = $file_name;
						}
					}
				}
				$data['created'] = date('Y-m-d H:i:s');
				$product = $this->Product->Add($data);
				//pr($data);
				if($product>0) {
					$this->redirect(".");
				}

			}
			$this->loadModel('Category');
			$category = $this->Category->getAll();
			$this->template->set('category', $category);
			$this->template->set('title', 'Product Manager - Add');
			$this->template->render('product/add.tpl');
			$this->template->output();
		}

		public function edit() {
			if(!isset($_SESSION['user'])) {
				$this->redirect("index.php?controller=User&action=login");
			}

			if(isset($_POST)) {
				$this->loadModel("Product");
				$id = $_GET['id'];
				$product = $this->Product->getById($id);
				$this->template->set('product',$product);
				$this->loadModel("Category");
				$category = $this->Category->getAll();
				$this->template->set('category',$category);
			}

			if(!empty($_POST)) {
				$data = $_POST;
				if (isset($_FILES['image'])) {
					if ($_FILES['image']['error'] === 0) {
						$file_name = "uploads/".$_FILES['image']['name'];
						if(move_uploaded_file($_FILES['image']['tmp_name'], $file_name)) {
							$data['image'] = $file_name;
						}
					}
				}
				// pr($data);
				$product = $this->Product->Update($data, $id); 
				if($product>0) {
					$this->redirect(".");
				}	
			}

			$this->template->set('title', 'Product Manager - Edit');
			$this->template->render('product/edit.tpl');
			$this->template->output();
		}

		public function delete() {
			$this->loadModel("Product");
			$id = $_GET['id'];
			$product = $this->Product->Delete($id);
			if($product>0) {
				$this->redirect(".");
			}
		}
	}
