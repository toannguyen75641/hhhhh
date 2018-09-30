<?php $this->layout('layout.tpl'); ?>

<div class="content">
	<a href="index.php?controller=Category&action=add">
	<input type="button" name="addCategory" value="Add Category" >
</a>
<table width="100%" border="1" style="background-color: #FC6">
	<tr>
    	<th>ID</th>
    	<th>Name</th>
	    <th>description</th>
		<th colspan="2">Action</th>
	</tr>
	<?php if(isset($list)) { ?>
		<?php foreach ($list as $item) { ?>
			<tr>
		  		<td><?= $item['id'] ?></td>
		  		<td><?= $item['name'] ?></td>
			  	<td><?= $item['description'] ?></td>
		  		<td style="text-align: center;">
		  			<a href="index.php?controller=Category&action=edit&id=<?= $item['id'] ?>">Edit</a>	
		  			|
			  		<a href="index.php?controller=Category&action=delete&id=<?= $item['id'] ?>" onclick="return confirm('Are you sure?');" >Delete</a>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
			 
</table>
</div>


