<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>Products Page</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css"/>
</head>
<body>
	<div class="container">
		<div id="navbar" class="navbar">
			<h2 class="alignleft">Hawk eCommerce</h2>
			<p class="alignright">Shopping Cart (Count will go here)</p>
		</div>
		<div style="clear: both;"></div>
		<div class="leftnav">
			<!-- search button -->
			<form action="/" method="post" class="search"/>
				<input type="text" name="searchName" placeholder="product name"/>
				<input type="submit" value="icon"/>
			</form>
			<div id="categories" class="categories">
				<!-- will be filled in by code as a partial -->
				<h4>Categories</h4>
				<p>Radio Control (count)</p>
				<p>Models (count)</p>
				<p>Railroad (count)</p>
				<p>Rockets (count)</p>
			</div>
		</div>
		<div class="products">
			<div class="header">
				<h3 class="alignleft">Category Title Goes Here (page # here)</h3>
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
			<div class="images">
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
				<div class="image">
					<!-- this will become a partial -->
					<img src=""/>
					<p id="price">Product price here</p>
					<p id="name">Product name here</p>
				</div>
			</div>
			<div class="footernav">
				<p>Some AJAX will go here to display page navigation</p>
			</div>
		</div>
	</div>
</body>
</html>