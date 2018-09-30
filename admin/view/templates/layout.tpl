<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="view/access/css/style.css">
	<script type="text/javascript" src="view/access/js/jquery.min.js"></script>
	<script type="text/javascript" src="view/access/js/validate.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<?php if(isset($_SESSION['user'])) : ?>
				<h3>Wellcome to admin: <?php echo ucwords($_SESSION['user']['name']); ?></h3>
			<?php endif; ?>
		</div>

			<div class="menu">
			<ul>
				<li>
					<a href="index.php?controller=Category&action=index">Category Manager</a>
				</li>
				<li>
					<a href="index.php?controller=Product&action=index">Product Manager</a>
				</li>
				<li>
					<a href="index.php?controller=Customer&action=index">Customer Manager</a>
				</li>
				<li>
					<a href="#">Order Manager</a>
				</li>
				<li>
					<a href="#">Contact Manager</a>
				</li>
				<li>
					<a href="index.php?controller=User&action=index">User Manager</a>
				</li>
				<a href="index.php?controller=User&action=logout"><p>LogOut</p>
				</a>
			</ul>
			<form action="" method="get">
				<input type="text" name="keyword" placeholder="Enter product..." id="keyword"/>
			    <input type="submit" id="btnSearch" name="btnSearch" value="Search" />
			</form>  	
		</div>

		<div class="content">
			<?php $this->content(); ?>
		</div>
	
			<div class="footer">
				<hr>
			Website bán lậu hàng đầu Việt Nam
		</div>
	</div>
</body>
</html>
	