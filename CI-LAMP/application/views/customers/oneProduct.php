<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title>Product View Page</title>
		<link rel="stylesheet" type="text/css" href="../../assets/style.css"/>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
			<!-- this will become a partial -->
			<div id="navbar" class="navbar">
				<h2 class="alignleft">Hawk eCommerce</h2>
				<p class="alignright"><a href="/cart">Shopping Cart (
						<?php if($this->session->userdata('count') == 0)
						{ ?>
							empty
						<?php } else { ?>
							<?= $this->session->userdata('count'); ?>
							<?php }?>
							)</a></p>
			</div>
			<div style="clear: both;"></div>
			<div class="leftheader">
				<a href="/">Go Back</a>
				<h2><?= $product['name']; ?></h2>
			</div>
			<div class="leftimg">
				<img id="mainImg" src="/../assets/<?= $product['image'] ?>"/>
				<div class="otherViews">
					<!-- set the image size using css -->
					<img class="smallImg" src="/../assets/<?= $product['image'] ?>" height="50px" width="50px"/>
					<img class="smallImg" src="/../assets/<?= $product['image'] ?>" height="50px" width="50px"/>
					<img class="smallImg" src="/../assets/<?= $product['image'] ?>" height="50px" width="50px"/>
					<img class="smallImg" src="/../assets/<?= $product['image'] ?>" height="50px" width="50px"/>
					<img class="smallImg" src="/../assets/<?= $product['image'] ?>" height="50px" width="50px"/>
				</div>
			</div>
			<div class="description">
				<p><?= $product['name']; ?></p>
				<form action="/buy" method="post">
					<!-- set the value with ajax and calculate -->
					<select id="qty" name="quantity">
						<?php $qty_price = number_format(1 * $product['price'],2) ?>
						<option value="1">1 (<?= $qty_price; ?>)</option>
						<?php $qty_price = number_format(2 * $product['price'],2) ?>
						<option value="2">2 (<?= $qty_price; ?>)</option>
						<?php $qty_price = number_format(3 * $product['price'],2) ?>
						<option value="3">3 (<?= $qty_price; ?>)</option>
					</select>
					<input type="hidden" name="id" value="<?= $product['id'] ?>"/>
					<input type="submit" value="Buy"/>
				</form>
			</div>
			<div class="purchase_form">
			</div>
			<h3>Similar Items</h3>
			<div class="similarItems">
				<?php if(isset($similar_products) && $similar_products !== null){
					foreach($similar_products as $similar)
				{ ?>
					<div class="product">
						<div class="image">
							<!-- this will become a partial -->
							<img src="/assets/<?= $similar['image']; ?>" height="125px" width="125px"/>
							<p id="price"><?= $similar['price']; ?></p>
						</div>
						<a href="/products/show/<?= $similar['id']; ?>"><p id="name"><?= $similar['name']; ?></p></a>
					</div>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
	</body>
</html>