<?php $this->layout('layout.tpl') ?>

<a href="index.php?controller=User&action=index">
	<input type="button" name="list" value="List of users">
</a>
	<form action="" method="post" enctype="multipart/form-data">
	<table width="90%" border="1" style="background-color: #FC6; margin-left: 50px;">
	 	<tr>
	    	<td colspan="2" style="text-align:center;font-size:25px;">Edit User</td>
	  	</tr>
		<tr>
			<td>Name</td>
		    <td><input type="text" name="name" value="<?= $user['name'] ?>">
		    <?php if(isset($errors['name'])) : ?>
		    	<span style="color: red"><?= $errors['name'] ?></span>
		    <?php endif; ?>
			</td>
		</tr>
		<tr>
		    <td>Email</td>
		    <td><input type="text" name="email" value="<?= $user['email'] ?>">
		    <?php if(isset($errors['email'])) : ?>
		    	<span style="color: red"><?= $errors['email'] ?></span>
		    <?php endif; ?>
			</td>
		</tr>
		<tr>
		    <td>Password</td>
		    <td><input type="password" name="password" value="<?= $user['phone'] ?>">
		    <?php if(isset($errors['password'])) : ?>
		    	<span style="color: red"><?= $errors['password'] ?></span>
		    <?php endif; ?>
			</td>
		</tr>
		<<tr>
		    <td>Status</td>
		    <td><select name="status">
		    	<option value="1">Kích hoạt</option>
		     	<option value="2">Không kích hoạt</option>
		    </select></td>
		</tr>
			<td colspan="2">
				<input type="submit" name="editUser" value="Edit User">
			</td>
		</tr>
	</table>
</form>