<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>Product View Page</title>
	<link rel="stylesheet" type="text/css" href="../../assets/style.css"/>
</head>
<body>
	<div class="container">
		<!-- this will become a partial -->
		<div id="navbar" class="navbar">
			<h2 class="alignleft">Hawk eCommerce</h2>
			<p class="alignright">Shopping Cart (
					<?php if($this->session->userdata('count') == 0)
					{ ?>
						empty
					<?php } else { ?>
						<?= $this->session->userdata('count'); ?>
						<?php }?>
						)</p>
		</div>
		<div style="clear: both;"></div>
		<div class="leftheader">
			<a href="/">Go Back</a>
			<h2><?= $product['name']; ?></h2>
		</div>
		<div class="leftimg">
			<img id="mainImg" src="/../assets/<?= $product['image'] ?>"/>
			<div class="otherViews">
				<img class="smallImg" src="/../assets/<?= $product['image'] ?>" height="50px" width="50px"/>
				<img class="smallImg" src="/../assets/<?= $product['image'] ?>" height="50px" width="50px"/>
				<img class="smallImg" src="/../assets/<?= $product['image'] ?>" height="50px" width="50px"/>
				<img class="smallImg" src="/../assets/<?= $product['image'] ?>" height="50px" width="50px"/>
				<img class="smallImg" src="/../assets/<?= $product['image'] ?>" height="50px" width="50px"/>
			</div>
		</div>
		<div class="description">
			<p><?= $product['name']; ?></p>
			<form action="/" method="post">
				<!-- set the value with ajax and calculate -->
				<input type="number" name="quantity" min="1" max="5" value="1"/>
				<input type="submit" value="Buy"/>
			</form>
		</div>
		<h3>Similar Items</h3>
		<div class="similarItems">
			<div class="item">
				<!-- this will become a partial -->
				<img src="something"/>
				<p id="price">Product price here</p>
				<p id="name">Product name here</p>
			</div>
			<div class="item">
				<!-- this will become a partial -->
				<img src="something"/>
				<p id="price">Product price here</p>
				<p id="name">Product name here</p>
			</div>
			<div class="item">
				<!-- this will become a partial -->
				<img src="something"/>
				<p id="price">Product price here</p>
				<p id="name">Product name here</p>
			</div>
			<div class="item">
				<!-- this will become a partial -->
				<img src="something"/>
				<p id="price">Product price here</p>
				<p id="name">Product name here</p>
			</div>
			<div class="item">
				<!-- this will become a partial -->
				<img src="something"/>
				<p id="price">Product price here</p>
				<p id="name">Product name here</p>
			</div>
			<div class="item">
				<!-- this will become a partial -->
				<img src="something"/>
				<p id="price">Product price here</p>
				<p id="name">Product name here</p>
			</div>
		</div>
	</div>
</body>
</html>