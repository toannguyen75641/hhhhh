<?php
	require_once "Controller.php";

	class CustomerController extends Controller
	{		
		public function index() {
			if(!isset($_SESSION['user'])) {
				$this->redirect("index.php?controller=User&action=login");
			}

			$this->loadModel("Customer");
			$list = $this->Customer->getAll();
			$this->template->set('title', 'Customer Manager');
			$this->template->set('list', $list);
			$this->template->render('customer/index.tpl');
			$this->template->output();
		}
		public function add() {
			if(!isset($_SESSION['user'])) {
				$this->redirect("index.php?controller=User&action=login");
			}

			if (!empty($_POST)) {
				$data = $_POST;
				$errors = array();
				$this->loadModel("Customer");

				if(empty($data['name'])) {
					$errors['name'] = "Name is empty!!";
				}


				if(empty($data['email'])) {
					$errors['email'] = "Email address is empty!!";
				} 
				else {
					if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
						$errors['email'] = "Email address is invalid!!";
					}
				}

				if(empty($data['phone'])) {
					$errors['phone'] = "Phone is empty!!";
				}
				else {
					$filler = "/([0-9]{10})/";
					if(!preg_match($filler, $data['phone'])) {
						$errors['phone'] = "Phone is invalid!!";
					}
				}

				if(empty($data['address'])) {
					$errors['address'] = "Address is empty!!";
				}

				//pr($errors);

				if (empty($errors)) {
					$data['created'] = date('Y-m-d H:i:s');
					$customer = $this->Customer->Add($data);
					if ($customer>0) {
						$this->redirect("index.php?controller=Customer&action=index");
					}
				}
				//pr($data);

				$this->template->set('errors', $errors);
			}
			
			$this->template->set('title', 'Customer Manager - Add');
			$this->template->render('customer/add.tpl');
			$this->template->output();
		}

		public function edit() {
			if(!isset($_SESSION['user'])) {
				$this->redirect("index.php?controller=User&action=login");
			}
			
			if(isset($_POST)) {
				$this->loadModel("Customer");
				$id = $_GET['id'];
				$customer = $this->Customer->getById($id);
				$this->template->set('customer', $customer);
			}
			if(!empty($_POST)) {
				$errors = array();
				$data = $_POST;

				if(empty($data['name'])) {
				$errors['name'] = "Name is empty!!";
				}

				if(empty($data['email'])) {
					$errors['email'] = "Email address is empty!!";
				} 
				else {
					if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
						$errors['email'] = "Email address is invalid!!";
					}
				}

				if(empty($data['phone'])) {
					$errors['phone'] = "Phone is empty!!";
				}
				else {
					$filler = "/([0-9]{10})/";
					if(!preg_match($filler, $data['phone'])) {
						$errors['phone'] = "Phone is invalid!!";
					}
				}

				if(empty($data['address'])) {
					$errors['address'] = "Address is empty!!";
				}
				//pr($errors);
				$this->template->set('errors', $errors);

				if(empty($errors)) {
					$customer = $this->Customer->Update($data, $id);
					if($customer>0) {
						$this->redirect("index.php?controller=customer&action=index");
					}
				}
			}

			
			$this->template->set('title', 'Customer Manager - Edit');
			$this->template->render('customer/edit.tpl');
			$this->template->output();
		}

		public function delete() {
			$this->loadModel("Customer");
			$id = $_GET['id'];
			$customer = $this->Customer->Delete($id);
			if($customer>0) {
				$this->redirect("index.php?controller=customer&action=index");
			}
		}
	}