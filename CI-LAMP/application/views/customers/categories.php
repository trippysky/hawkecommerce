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

				$('h5.message').delay(4000).fadeOut('slow', function() {
					$(this).remove();
				})

				$(document).on('click', '.cat_list', function()
				{
					$.post(
						$(this).attr('action'),
						$(this).serialize(),
						$.get('/customers/customers/get_category_list/' + $(this).attr('id'), function(output) {
							$('#product').html(output);
						})
					)

					$("#title").html($(this).attr("data-name"));
				});

				$(document).on('change', '.sort', function()
				{
					$.post(
						$(this).attr('action'), 
						$('#sort').serialize(), function(output)
						{
							$('#product').html(output);
						}, "html"
					)
				});
			});
		</script>
	</head>
	<body>
		<div class="container">
			<div id="navbar" class="navbar">
				<h2 class="alignleft">Hawk eCommerce</h2>
				<?php if($this->session->userdata("message")){; ?>
					<h5 class="message"><?= $this->session->userdata("message"); ?></h5>
				<?php //clear the message
						$this->session->set_userdata("message", ""); 
					} ?>
				<p class="alignright">
					<a href="/cart">Shopping Cart (
					<?php if($this->session->userdata('count') == 0)
					{ ?>
						empty
					<?php } else { ?>
						<?= $this->session->userdata('count'); ?>
						<?php }?>
						)</a></p>
			</div>
			<div style="clear: both;"></div>
			<div class="leftnav">
				<!-- search button -->
				<form action="/" method="post" class="search"/>
					<input type="search" name="searchName" placeholder="product name"/>
					<i class="fa fa-search"></i>
				</form>
				<div id="categories" class="categories">
					<!-- partials/customers/category_list.php outputs here -->
				</div>
			</div>
			<div class="products">
				<div id="header" class="header">
					<h3 class="alignleft" id="title">
						All Products
					</h3>
					<p class="alignright"><a href="/">first</a> | <a href="/">prev</a> | <a href="/">2</a> | <a href="/">next</a></p>
					<div style="clear: both;"></div>
					<form id="sort" method="post" class="alignright">
						<label>Sorted by</label>
						<select class="sort" action="/popular" name="sort">
							<option value="Price">Price</option>
							<option value="Popular">Most Popular</option>
						</select>
					</form>
					<div style="clear: both;"></div>
				</div>
				<div id="product" class="images">
						<!-- partials/customers/products.php outputs here -->
				</div>
				<div class="footernav">
					<p><?php 

					$pages = (round(count($products)/15));
					for($i = 1; $i <= $pages; $i++)
					{
						echo "<a href = ''>".$i."</a> |";
					}

					?>
					</p>
				</div>
			</div>
		</div>
	</body>
</html>