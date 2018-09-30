<?php $this->layout('layout.tpl') ?>

<a href="index.php?controller=Customer&action=index">
	<input type="button" name="list" value="List of customers">
</a>	
<form action="" method="post" enctype="multipart/form-data">
	<table width="90%" border="1" style="background-color: #FC6; margin-left: 50px;">
	 	<tr>
	    	<td colspan="2" style="text-align:center;font-size:25px;">Add Customer</td>
	  	</tr>
		<tr>
		    <td>Name</td>
		    <td><input type="text" name="name">
		    <?php if(isset($errors['name'])) : ?>
		    	<span style="color: red"><?= $errors['name'] ?></span>
		    <?php endif; ?>
		    </td>
		</tr>
		<tr>
		    <td>Email</td>
		    <td><input type="text" name="email">
		    <?php if(isset($errors['email'])) : ?>
		    	<span style="color: red"><?= $errors['email'] ?></span>
		    <?php endif; ?>
		    </td>
		</tr>
		<tr>
		    <td>Phone</td>
		    <td><input type="text" name="phone" />
		    <?php if(isset($errors['phone'])) : ?>
		    	<span style="color: red"><?= $errors['phone'] ?></span>
		    <?php endif; ?>
		    </td>

		</tr>  
		<tr>
		    <td>Address</td>
		    <td><input type="text" name="address">
		    <?php if(isset($errors['address'])) : ?>
		    	<span style="color: red"><?= $errors['address'] ?></span>
		    <?php endif; ?>
		    </td>
		</tr>
		<tr >
			<td colspan="2"><input type="submit" name="addCustomer" value="Add Customer"></td>
		</tr>
	</table>
</form>
