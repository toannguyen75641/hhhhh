<?php $this->layout('layout.tpl'); ?>

<a href="index.php?controller=Customer&action=add">
	<input type="button" name="btnAddCustomer" value="Add Customer">
</a>
<table width="100%" border="1" style="background-color: #FC6">
	<tr>
    	<th>ID</th>
    	<th>Name</th>
	    <th>Email</th>
	    <th>Phone</th>
	    <th>Address</th>
	    <th>Created</th>
		<th colspan="2">Action</th>
	</tr>
	<?php if(isset($list)) { ?>
		<?php foreach ($list as $item) { ?>
			<tr>
		  		<td><?= $item['id'] ?></td>
		  		<td><?= $item['name'] ?></td>
		  		<td><?= $item['email'] ?></td>
		  		<td><?= $item['phone'] ?></td>
			  	<td><?= $item['address'] ?></td>
		 		<td><?= $item['created'] ?></td>
		  		<td style="text-align: center;">
		  			<a href="index.php?controller=Customer&action=edit&id=<?= $item['id'] ?>">Edit</a>	
		  			|
			  		<a href="index.php?controller=Customer&action=delete&id=<?= $item['id'] ?>" onclick="return confirm('Are you sure?');" >Delete</a>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
			 
</table>