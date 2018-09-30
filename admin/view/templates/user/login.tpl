<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="view/access/css/login.css">
</head>
<body>
	<div id="login">
	<form action="index.php?controller=User&action=login" method="post" enctype="multipart/form-data">
	    <h2>Log in</h2>
	    <input type="text" name="email" id="email" placeholder="Enter username..." required="required" />
	    <input type="password" name="password" id="pass" placeholder="Enter password..." required="required" />
	    <!-- <?php if(isset($errors['name'])) : ?>
		    <span style="color: red"><?= $errors['name'] ?></span>
		<?php endif; ?> -->
	    <input type="submit" name="btnLogin" id="button" value="Log in"/>
    </form>
</body>
</html>