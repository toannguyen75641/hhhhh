<?php $this->layout('layout.tpl'); ?>

<h2 style="text-align: center; color: red; padding: 10px;">Liên hệ</h2>
<form action="index.php?controller=Page&action=contact" method="post">
	Email: <input type="text" name="email"><br>
	Message:<br>
	<textarea name="message" rows="15" cols="40"></textarea>
	<input type="submit" name="btnSubmit" value="Send">
</form>