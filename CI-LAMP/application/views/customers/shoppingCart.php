<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css"/>
</head>
<body>
	<div class="container">
		<!-- this will become a partial -->
		<div id="navbar" class="navbar">
			<h2 class="alignleft">Hawk eCommerce</h2>
			<p class="alignright">Shopping Cart (Count will go here)</p>
		</div>
		<div style="clear: both;"></div>
		<div class="order">
			<!-- this will be a partial -->
			<table>
				<thead>
					<tr>
						<th>Item</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Ordered Item Here</td>
						<td>Item Price Here</td>
						<td>Quantity ordered here <a href="/">update</a> <a href="/"><button value="delete">Delete</button></a></td>
						<td>$ Calculated Item Total</td>
					</tr>
					<tr>
						<td>Ordered Item Here</td>
						<td>Item Price Here</td>
						<td>Quantity ordered here <a href="/">update</a> <a href="/"><button value="delete">Delete</button></a></td>
						<td>$ Calculated Item Total</td>
					</tr>
					<tr>
						<td>Ordered Item Here</td>
						<td>Item Price Here</td>
						<td>Quantity ordered here <a href="/">update</a> <a href="/"><button value="delete">Delete</button></a></td>
						<td>$ Calculated Item Total</td>
					</tr>
					<tr>
						<td>Ordered Item Here</td>
						<td>Item Price Here</td>
						<td>Quantity ordered here <a href="/">update</a> <a href="/"><button value="delete">Delete</button></a></td>
						<td>$ Calculated Item Total</td>
					</tr>
					<tr>
						<td>Ordered Item Here</td>
						<td>Item Price Here</td>
						<td>Quantity ordered here <a href="/">update</a> <a href="/"><button value="delete">Delete</button></a></td>
						<td>$ Calculated Item Total</td>
					</tr>
				</tbody>
			</table>
			<p class="alignright">Total: $ Calculated Order Total</p>
			<div style="clear: both;"></div>
			<p class="alignright"><a href="/products"><button>Continue Shopping</button></a></p>
			<div style="clear: both;"></div>
		</div>
		<div class="customer_info">
			<div class="shipping">
				<h3>Shipping Information</h3>
				<form action="/order/create" method="post">
					<p>
						<label class="space">First Name:</label>
						<input type="text" name="first_name"/>
					</p>
					<p>
						<label>Last Name:</label>
						<input type="text" name="last_name"/>
					</p>
					<p>
						<label>Address:</label>
						<input type="text" name="address"/>
					</p>
					<p>
						<label>Address 2:</label>
						<input type="text" name="address2"/>
					</p>
					<p>
						<label>City:</label>
						<input type="text" name="city"/>
					</p>
					<p>
						<label>State:</label>
						<input type="text" name="state"/>
					</p>
					<p>
						<label>Zipcode:</label>
						<input type="text" name="zipcode"/>
					</p>
				</form>
			</div>
			<div class="billing">
				<h3>Billing Information</h3>
				<form action="/order/create" method="post">
					<input type="checkbox" name="sameas"/> Same as Shipping
					<p>
						<label>First Name:</label>
						<input type="text" name="first_name"/>
					</p>
					<p>
						<label>Last Name:</label>
						<input type="text" name="last_name"/>
					</p>
					<p>
						<label>Address:</label>
						<input type="text" name="address"/>
					</p>
					<p>
						<label>Address 2:</label>
						<input type="text" name="address2"/>
					</p>
					<p>
						<label>City:</label>
						<input type="text" name="city"/>
					</p>
					<p>
						<label>State:</label>
						<input type="text" name="state"/>
					</p>
					<p>
						<label>Zipcode:</label>
						<input type="text" name="zipcode"/>
					</p>
					<p class="ccn_info">
						<label>Card:</label>
						<input type="text" name="ccn"/>
					</p>
					<p>
						<label>Security Code:</label>
						<input type="text" name="sec_code"/>
					</p>
					<p>
						<label>Expiration:</label>
						<input type="text" name="expiration"/>
					</p>
					<p>
						<label></label>
						<input type="submit" value="Pay" class="alignright"/>
					</p>
				</form>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
</body>
</html>