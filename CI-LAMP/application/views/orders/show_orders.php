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
	<div class="orderInfo">
	<?php
	// var_dump($customer_info);
	// die();
	?>
		<h5>Order ID:  <?= $customer_info['order_id']; ?></h5>
		<h5>Customer shipping info:  </h5>
		<p>Name:  <?= $customer_info['first_name'] . $customer_info['last_name']; ?> <br>
		<p>Address:  <?= $customer_info['shipping_street1'] . $customer_info['shipping_street2']; ?><br>
		<p>City:  <?= $customer_info['shipping_city'] ; ?><br>
		<p>State: <?= $customer_info['shipping_state'] ; ?> <br>
		<p>Zip:  <?= $customer_info['shipping_zip'] ; ?></p><br>

		<p>Customer billing info:  </p>
		<p>Name:  <?= $customer_info['first_name'] . $customer_info['last_name']; ?> <br>
		<p>Address:  <?= $customer_info['billing_street1'] . $customer_info['billing_street2']; ?><br>
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
			foreach ($order_items as $order_item)			
			{
			$total = ($order_item['price'] * $order_item['qty']);
			 ?>
			<tr>

				<th><?= $order_item['id'] ; ?></th>
				<th><?= $order_item['name'] ; ?></th>
				<th>$<?= $order_item['price'] ; ?></th>
				<th><?= $order_item['qty'] ; ?></th>
				<th>$<?= $total ?></th>
			</tr>
			<?php }
			// die();
			 ?>
		</table>
		
	</div>
	<div class="totalBilling">
		Sub total:  <br>
		Shipping:  Free<br>
		Total Price:
		
	</div>
	<div class="status">
		Status:  
	</div>
</body>
</html>