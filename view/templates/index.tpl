<?php $this->layout('layout.tpl'); ?>
<h2 style="text-align: center; color: red; padding: 10px;">All Products</h2>
<div class="product">
	<ul>
		<?php if(isset($list)) { ?>
			<?php foreach($list as $item) { ?>
				<li>	
					<a href="index.php?controller=Page&action=product&id=<?= $item['id']; ?>">
						<img src="admin/<?= $item['image']; ?>" style="height: 100px; width: 100px;">
						<p><?= $item['name'] ?></p>
						<p style="color: #F00"><?= number_format($item['price'])."VNĐ"; ?></p>
					</a>
				</li>
			<?php } ?>
		<?php } ?>	
		<div class="clear"></div>
	</ul>	
</div>