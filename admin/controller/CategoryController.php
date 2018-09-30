<?php
	require_once "Controller.php";

	class CategoryController extends Controller
	{		
		public function index() {
			if(!isset($_SESSION['user'])) {
				$this->redirect("index.php?controller=User&action=login");
			}
			
			$this->loadModel("Category");
			$list = $this->Category->getAll();

			$this->template->set('title', 'Category Manager');
			$this->template->set('list', $list);
			$this->template->render('category/index.tpl');
			$this->template->output();
		}

		public function add() {
			if(!isset($_SESSION['user'])) {
				$this->redirect("index.php?controller=User&action=login");
			}

			if(!empty($_POST)) {
				$data = $_POST;
				$errors = array();
				$this->loadModel("Category");

				if(empty($data['name'])) {
					$errors['name'] = "Name is empty!!";
				}

				//pr($errors);

				$this->template->set('errors', $errors);

				if (empty($errors)) {
					$category = $this->Category->Add($data);
					if($category>0) {
						$this->redirect("index.php?controller=Category&action=index&message=craete_success");
					}
				}
			}

			$this->template->set('title', 'Category Manager - Add');
			$this->template->render('category/add.tpl');
			$this->template->output();
		}

		public function edit() {
			if(!isset($_SESSION['user'])) {
				$this->redirect("index.php?controller=User&action=login");
			}

			if(isset($_POST)) {
				$this->loadModel("Category");
				$id = $_GET['id'];
				$category = $this->Category->getById($id);
				$this->template->set('category', $category);
			}

			if(!empty($_POST)) {
				$data = $_POST;
				$errors = array();

				if(empty($data['name'])) {
					$errors['name'] = "Name is empty!!";
				}

				if (empty($errors)) {
					$category = $this->Category->Update($data, $id);
					if($category>0) {
						$this->redirect("index.php?controller=Category&action=index&message=craete_success");
					}
				}
				$this->template->set('errors', $errors);
			}

			$this->template->set('title', 'Category Manager - Edit');
			$this->template->render('category/edit.tpl');
			$this->template->output();
		}

		public function delete() {
			$this->loadModel("Category");
			$id = $_GET['id'];
			$category = $this->Category->Delete($id);
			if($category>0) {
				$this->redirect("index.php?controller=Category&action=list&message=delete_success");
			}
		}
	}