<?php $this->layout('layout.tpl'); ?>

<a href="index.php?controller=Product&action=index">
	<input type="button" name="list" value="List of products">
</a>
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validate()">
	<table width="90%" border="1" style="background-color: #FC6; margin-left: 50px;">
	 	<tr>
	    	<td colspan="2" style="text-align:center;font-size:25px;">Edit Product</td>
	  	</tr>
	  	<tr>
	    	<td width="97">Product_Code(*)</td>
	    	<td width="87"><input type="text" name="product_code" id="product_code" value="<?= $product['product_code'] ?>">
			</td>
		</tr>
		<tr>
		 	<td>Category_Id(*)</td>
		  	<td>
		   		<select name="category_id">
		  		<?php if(isset($category)) : ?>
		  			<?php foreach($category as $item) : ?>
			  			<option value="<?php echo $item['id']?>" <?php if ($item['id'] == $product['category_id']) : ?>selected="selected"<?php endif; ?> ><?php echo $item['name'] ?></option>
			  		<?php endforeach; ?>
			  	<?php endif; ?>
		  		</select>
		  	</td>
		</tr>
		<tr>
			<td>Name(*)</td>
		    <td><input type="text" name="name" value="<?= $product['name'] ?>" id="name">
			</td>
		</tr>
		<tr>
		    <td>Quantity</td>
		    <td><input type="text" name="quantity" value="<?= $product['quantity'] ?>"></td>
		</tr>
		<tr>
		    <td>Image</td>
		    <td>
		    	<?php if (isset($product['image'])) : ?>
		    		<img src="<?= $product['image'] ?>" height="100px"><br/>
		    	<?php endif; ?>
		    		<input type="file" name="image" id="image">
		    </td>    
		</tr>  
		<tr>
		    <td>Price(*)</td>
		    <td><input type="text" name="price" id="price" value="<?= $product['price'] ?>">
			</td>
		</tr>
		<tr>
		    <td>Description</td>
		    <td><textarea name="description" cols="40" rows="10" value="<?= $product['description'] ?>"></textarea></td>
		</tr>
		<tr>
		    <td>Status</td>
		    <td><select name="status" value="<?= $product['status'] ?>">
		    	<option value="1">Kích hoạt</option>
		     	<option value="2">Không kích hoạt</option>
		    </select></td>
		</tr>
		<tr >
			<td colspan="2">
				<input type="submit" name="editProduct" value="Edit Product">
			</td>
		</tr>
	</table>
</form>
