<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "Controller.php";

//Load Composer's autoloader
require 'vendor/autoload.php';

class PageController extends Controller 
{
	public function index() {
		$this->loadModel('Product');
		$list = $this->Product->getAll();
		$this->template->set('list', $list);

		$this->loadModel('Category');
		$category = $this->Category->getAll();
		$this->template->set('category', $category);

		$this->template->set('title', 'Computer');
		$this->template->render('index.tpl');
		$this->template->output();
	}

	public function category() {
		$this->loadModel('Product');
		$category_id = $_GET['id'];
		$list = $this->Product->getByCategory($category_id);
		$this->template->set('list', $list);

		$this->loadModel('Category');
		$category = $this->Category->getAll();
		$this->template->set('category', $category);

		$this->template->set('title', 'Computer - category');
		$this->template->render('category.tpl');
		$this->template->output();
	}

	public function product() {
		$this->loadModel('Product');
		$id = $_GET['id'];
		$list = $this->Product->getById($id);
		$this->template->set('list', $list);

		$this->loadModel('Category');
		$category = $this->Category->getAll();
		$this->template->set('category', $category);

		$this->template->set('title', 'Computer - product');
		$this->template->render('product.tpl');
		$this->template->output();
	}

	public function contact() {
		if(!empty($_POST)) {
			$message = $_POST['message'];
			$email = $_POST['email'];

			$mail = new PHPMailer(true);
			//pr($mail);

			try {
		    //Server settings
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = EMAIL_HOST;  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = EMAIL_ADMIN;                 // SMTP username
		    $mail->Password = EMAIL_PASS;                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom($email);
		    $mail->addAddress(EMAIL_ADMIN);     // Add a recipient
		    // $mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('cc@example.com');
		    // $mail->addBCC('bcc@example.com');

		    //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Contact Us';
		    $mail->Body    = $message;

		    $mail->send();
		    $data = $_POST;
			$this->loadModel('Contact');
			$data['created'] = date('Y-m-d H:i:s');
			$this->Contact->add($data);
		    echo 'Message has been sent';
			} 
			catch (Exception $e) {
			    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}

				// if($sent==true) {
				// 	$data = $_POST;
				// 	$this->loadModel('Contact');
				// 	$data['created'] = date('Y-m-d H:i:s');
				// 	$contact = $this->Contact->add($data);
				// 	//pr($data);
				// 	if($contact>0) {
				// 		$this->redirect('.');
				// 	}
				// }
				// else {
				// 	echo 'Fail';
				// }
			}

		$this->loadModel('Category');
		$category = $this->Category->getAll();
		$this->template->set('category', $category);

		$this->template->set('title', 'Computer - contact');
		$this->template->render('contact.tpl');
		$this->template->output();
	}
}