<?php $this->layout('layout.tpl'); ?>

<a href="index.php?controller=Product&action=index">
	<input type="button" name="list" value="List of products">
</a>	
<form action="" method="post" enctype="multipart/form-data">
	<table width="90%" border="1" style="background-color: #FC6; margin-left: 50px;">
	 	<tr>
	    	<td colspan="2" style="text-align:center;font-size:25px;">Add Product</td>
	  	</tr>
	  	<tr>
	    	<td width="200">Product_Code(*)</td>
	    	<td><input type="text" name="product_code" id="product_code">
	    </tr>
		<tr>
		 	<td>Category_Id(*)</td>
		  	<td>
		 	 	<select name="category_id">
		 	 	<?php if(isset($category)) { ?>
		  			<?php  foreach($category as $item) { ?>
			  			<option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
			  		<?php } ?>
			  	<?php } ?>
			  	</select>
		  	</td>
		</tr>
		<tr>
		    <td>Name(*)</td>
		    <td><input type="text" name="name" id="name">
		</tr>
		<tr>
		    <td>Quantity</td>
		    <td><input type="text" name="quantity"></td>
		</tr>
		<tr>
		    <td>Image</td>
		    <td><input type="file" name="image" id="image">
		</tr>  
		<tr>
		    <td>Price(*)</td>
		    <td><input type="text" name="price" id="price">
		    </td>
		</tr>
		<tr>
		    <td>Description</td>
		    <td><textarea name="description" cols="40" rows="10"></textarea></td>
		</tr>
		<tr>
		    <td>Status</td>
		    <td><select name="status">
		    	<option value="1">Kích hoạt</option>
		     	<option value="2">Không kích hoạt</option>
		    </select></td>
		</tr>
		
		<tr >
			<td colspan="2"><input type="submit" name="addProduct" value="Add Product"></td>
		</tr>
	</table>
</form>
