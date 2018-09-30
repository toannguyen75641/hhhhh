<?php $this->layout('layout.tpl'); ?>

<a href="index.php?controller=Category&action=index">
	<input type="button" name="list" value="List of Categories" >
</a>	
<h3>&nbsp;</h3>	
<form action="" method="post" enctype="multipart/form-data">
	<table width="90%" border="1" style="background-color: #FC6; margin-left: 50px;">
	 	<tr>
	    	<td colspan="2" style="text-align:center;font-size:25px;">Add Category</td>
	  	</tr>
		<tr>
		    <td>Name</td>
		    <td><input type="text" name="name">
		    <?php if(isset($errors['name'])) : ?>
		    	<span style="color: red"><?= $errors['name'] ?></span>
		    <?php endif; ?>
			</td>
		<tr>
		    <td>Description</td>
		    <td><textarea name="description" cols="40" rows="10"></textarea></td>
		</tr>	
		<tr >
			<td colspan="2">
				<input type="submit" name="addCategory" value="Add Category">
			</td>s
		</tr>
	</table>
</form>
