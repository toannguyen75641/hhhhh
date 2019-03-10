<?php $this->layout('layout.tpl'); ?>

<h2 style="text-align: center; color: red; padding: 10px;">Product Details</h2>
<div class="d-flex flex-wrap">
	<?php if(isset($list)) : ?>
		<h2><?= $list['name'] ?></h2><hr>
		<div class="left_detail">
			<p style="color: #F00"><?= number_format($list['price'])."VNĐ"; ?></p>
			<img src="admin/<?= $list['image']; ?>">
		</div>
		<div class="right_detail">
			<h2>Description: <?= $list['description'] ?></h2>
		</div>
	<?php endif; ?>	
	<div class="clear"></div>
</div>