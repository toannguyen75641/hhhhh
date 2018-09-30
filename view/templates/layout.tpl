<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="view/access/css/style.css">
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<a href=".">
				<img src="img/banner.jpg" style="width: 100%; height: 120px;">
			</a>
		</div>

		<div class="menu">
			<ul>
				<li>
					<a href=".">Trang chủ</a>
				</li>
				<li>
					<a href="">Sản phẩm</a>
				</li>
				<li>
					<a href="#">Hướng dẫn</a>
				</li>
				<li>
					<a href="index.php?controller=Page&action=contact">Liên hệ</a>
				</li>
			</ul>
		</div>

		<div class="content">
			<div class="left">
				<div class="category">
					<h2>Category</h2>
					<ul>
						<?php if(isset($category)) : ?>
							<?php foreach($category as $item) { ?>
							<li>
								<a href="index.php?controller=page&action=category&id=<?= $item['id']; ?>"><?= $item['name'] ?></a>
							</li>
							<?php } ?>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="right">
				<?php $this->content(); ?>
			</div>
		</div>
	
		<div class="footer">
			<p style="text-align: center;">
				<hr />
			 	Trang web bán hàng lậu hàng đầu Việt Nam<br>
				Hotline: 096.911.6097<br>
				Email: toannguyen75641@gmail.com<br>
			</p>
		</div>
	</div>
</body>
</html>
	