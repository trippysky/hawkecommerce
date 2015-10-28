<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title>Products Page</title>
		<link rel="stylesheet" type="text/css" href="/../../assets/style.css"/>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		<script>
			$(document).ready(function(){
				$.get('/customers/customers/index_html', function(output) {
					$('#product').html(output);
				});

				$.get('/customers/customers/category_html', function(output){
					$('#categories').html(output);
				});
			});
		</script>
	</head>
	<body>
		<div class="container">
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
			<div class="leftnav">
				<!-- search button -->
				<form action="/" method="post" class="search"/>
					<input type="text" name="searchName" placeholder="product name"/>
					<i class="fa fa-search"></i>
				</form>
				<div id="categories" class="categories">
					<!-- partials/customers/category_list.php outputs here -->
				</div>
			</div>
			<div class="products">
				<div id="header" class="header">
					<h3 class="alignleft">
						<?php if(isset($id) and $id){ ?>
							<?= $category_list['name'] ?> (page # here)
						<?php } else { ?>
							All Products (page # here)
						<?php } ?>
					</h3>
					<p class="alignright"><a href="/">first</a> | <a href="/">prev</a> | <a href="/">2</a> | <a href="/">next</a></p>
					<div style="clear: both;"></div>
					<form action="/" method="post" class="alignright">
						<label>Sorted by</label>
						<select>
							<option value="Price">Price</option>
							<option value="Most Popular">Most Popular</option>
						</select>
					</form>
					<div style="clear: both;"></div>
				</div>
				<div id="product" class="images">
						<!-- partials/customers/products.php outputs here -->
				</div>
				<div class="footernav">
					<p>Some AJAX will go here to display page navigation</p>
				</div>
			</div>
		</div>
	</body>
</html>