<?php $this->layout('layout.tpl'); ?>

<a href="index.php?controller=Category&action=index">
	<input type="button" name="list" value="List of Categories">
</a>
	<form action="" method="post" enctype="multipart/form-data">
	<h3>&nbsp;</h3>
	<table width="90%" border="1" style="background-color: #FC6; margin-left: 50px;">
	 	<tr>
	    	<td colspan="2" style="text-align:center;font-size:25px;">Edit Category</td>
	  	</tr>
		<tr>
			<td>Name</td>
		    <td><input type="text" name="name" value="<?= $category['name'] ?>">
		    <?php if(isset($errors['name'])) : ?>
		    	<span style="color: red"><?= $errors['name'] ?></span>
		    <?php endif; ?>
			</td>
		</tr>
		<tr>
		    <td>Description</td>
		    <td><textarea name="description" cols="40" rows="10" value="<?= $category['description'] ?>"></textarea></td>
		</tr>
		<tr >
			<td colspan="2">
				<input type="submit" name="editCategory" value="Edit Category">
			</td>
		</tr>
	</table>
</form>
