<?php $this->layout('layout.tpl'); ?>


	<a href="index.php?controller=Product&action=add">
	<input type="button" name="btnAddProduct" value="Add Product" >
</a>
<table width="100%" border="1" style="background-color: #FC6">
	<tr>
    	<th>ID</th>
    	<th>Category</th>
    	<th>Product_code</th>
    	<th>Name</th>
	    <th>Quantity</th>
	    <th>Image</th>
	    <th>Price</th>
	    <th>Description</th>
	    <th>Status</th>	
	    <th>Created</th>
		<th colspan="2">Action</th>
	</tr>
	<?php if(isset($list)) { ?>
		<?php foreach ($list as $item) { ?>
			<tr>
		  		<td><?= $item['id'] ?></td>
		  		<td><?= $item['category_name'] ?></td>
		  		<td><?= $item['product_code'] ?></td>
		  		<td><?= $item['name'] ?></td>
		  		<td><?= $item['quantity'] ?></td>
		  		<td><img src=<?= $item['image']; ?> style="height: 100px; width: 100px;"></td>
		  		<td><?= number_format($item['price']).'VNĐ' ?></td>
			  	<td><?= $item['description'] ?></td>
		 		<td><?= $item['status'] ?></td>
		 		<td><?= $item['created'] ?></td>
		  		<td style="text-align: center;">
		  			<a href="index.php?controller=Product&action=edit&id=<?= $item['id'] ?>">Edit</a>	
		  			|
			  		<a href="index.php?controller=Product&action=delete&id=<?= $item['id'] ?>" onclick="return confirm('Are you sure?');" >Delete</a>
			  		|
			  		<a href="index.php?controller=Page&action=product&id=<?= $item['id'] ?>">View</a>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
			 
</table>




