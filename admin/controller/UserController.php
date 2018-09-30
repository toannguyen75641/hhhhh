<?php
	require_once "Controller.php";

	class UserController extends Controller
	{
		public function login() {
			
			if(isset($_POST['btnLogin'])) {
				$email = $_POST['email'];
				$pass = md5($_POST['password']);
				$this->loadModel('User');
				$user = $this->User->getOne($email);
				//pr($user);
				if (!empty($user)) {
					$_SESSION['user'] = $user;
					$this->redirect(".");
				}
				else {
					echo "Login fail";
				}
			}
			$this->template->layout('user/login.tpl');;
			$this->template->output();		
		}

		public function logout() {
			session_destroy();
			$this->redirect("index.php?controller=User&action=login");
		}

		public function index() {
			if(!isset($_SESSION['user'])) {
				$this->redirect("index.php?controller=User&action=login");
			}
			
			$this->loadModel('User');
			$list = $this->User->getAll();
			$this->template->set('title', 'User Manager');
			$this->template->set('list', $list);
			$this->template->render('user/index.tpl');
			$this->template->output();
		}

		public function add() {
			if(!isset($_SESSION['user'])) {
				$this->redirect("index.php?controller=User&action=login");
			}

			if(!empty($_POST)) {
				$data = $_POST;
				$data['password'] = md5($_POST['password']);
				$errors = array();
				$this->loadModel('User');

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

				if(empty($data['password'])) {
					$errors['password'] = "Password is empty!!";
				}

				if(empty($errors)) {
					$data['created'] = date('Y-m-d H:i:s');
					$user = $this->User->Add($data);
					if($user>0) {
						$this->redirect("index.php?controller=User&action=index");
					}
				}

				$this->template->set("errors", $errors);
			}

			$this->template->set('title', 'User Manager - Add');
			$this->template->render('user/add.tpl');
			$this->template->output();
		}

		public function edit() {
			if(!isset($_SESSION['user'])) {
				$this->redirect("index.php?controller=User&action=login");
			}

			if(isset($_POST)) {
				$this->loadModel("User");
				$id = $_GET['id'];
				$user = $this->User->getById($id);
				$this->template->set('user', $user);
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

				if(empty($data['password'])) {
					$errors['password'] = "Password is empty!!";
				}

				if(empty($errors)) {
					$user = $this->User->Update($data, $id);
					if($user>0) {
						$this->redirect("index.php?controller=User&action=index");
					}
				}

				$this->template->set("errors", $errors);
			}

			$this->template->set('title', 'User Manager - Edit');
			$this->template->render('user/edit.tpl');
			$this->template->output();

		}

		public function delete() {
			if(!isset($_SESSION['user'])) {
				$this->redirect("index.php?controller=User&action=login");
			}

			$this->loadModel('User');
			$id = $_GET['id'];
			$user = $this->User->Delete($id);
			if($user>0) {
					$this->redirect("index.php?controller=User&action=index");
				}
		}
	}