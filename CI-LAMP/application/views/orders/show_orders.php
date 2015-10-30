<!DOCTYPE html>
<html>
	<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
    	$(document).ready(function()
    	{

    	});
    </script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>


</head>
<body>

	<div id="header">
		<p>Dashboard</p>
		<p><a href="/orders">Orders</a></p>
		<p><a href="/show_products">Products</a></p>
		<p><a href="/logout">Logout</a></p>
	</div>
	
	<div class="orderInfo">
	<?php
	// var_dump($customer_info);
	// die();
	?>
		<h5>Order ID:  <?= $customer_info['order_id']; ?></h5>
		<h5>Customer shipping info:  </h5>
		<p>Name:  <?= $customer_info['first_name'] ."  ". $customer_info['last_name']; ?> <br>
		<p>Address:  <?= $customer_info['shipping_street1'] ." ". $customer_info['shipping_street2']; ?><br>
		<p>City:  <?= $customer_info['shipping_city'] ; ?><br>
		<p>State: <?= $customer_info['shipping_state'] ; ?> <br>
		<p>Zip:  <?= $customer_info['shipping_zip'] ; ?></p><br>

		<p>Customer billing info:  </p>
		<p>Name:  <?= $customer_info['first_name'] ." ". $customer_info['last_name']; ?> <br>
		<p>Address:  <?= $customer_info['billing_street1'] ." ". $customer_info['billing_street2']; ?><br>
		<p>City:  <?= $customer_info['billing_city'] ; ?><br>
		<p>State: <?= $customer_info['billing_state'] ; ?> <br>
		<p>Zip:  <?= $customer_info['billing_zip'] ; ?></p><br>

	</div>

	<div class="customerBillingInfo">
		<table>
			<tr>

				<th>ID</th>
				<th>Item</th>
				<th>Price </th>
				<th>Quantity</th>
				<th>Total  </th>
			</tr>

			<?php 
			$order_sub = 0;
			foreach ($order_items as $order_item)			
			{
			$item_total = ($order_item['price'] * $order_item['qty']);
			$order_sub += $item_total;
			 ?>
			<tr>

				<td><?= $order_item['id'] ; ?></td>
				<td><?= $order_item['name'] ; ?></td>
				<td>$<?= $order_item['price'] ; ?></td>
				<td><?= $order_item['qty'] ; ?></td>
				<td>$<?= $item_total ?></td>
			</tr>
			<?php }
			// die();
			 ?>
		</table>
		
	</div>
	<div class="totalBilling">
		Sub total: $<?= $order_sub ?><br>
		Shipping:  $5.00<br>
		Total Price: $<?= $order_sub +5 ?>
		
	</div>
	<div class="status">
		Status: <?= $customer_info['status'] ; ?>
	</div>
</body>
</html>