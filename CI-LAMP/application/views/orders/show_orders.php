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
	
		<h5>Order ID:  <?= $orders['order_id']; ?></h5>
		<h5>Customer shipping info:  </h5>
		<p>Name:  <?= $orders['customers_first_name'] ; ?> <br>
		<p>Address:  <?= $orders['street_1'] ; ?><br>
		<p>City:  <?= $orders['city'] ; ?><br>
		<p>State: <?= $orders['state'] ; ?> <br>
		<p>Zip:  <?= $orders['zip'] ; ?></p><br>

		<p>Customer billing info:  </p>
		<p>Name:  <?= $orders['name'] ; ?></p>
		<p>Address:  <?= $orders['street_1'] ; ?></p>
		<p>City: <?= $orders['city'] ; ?></p>
		<p>State:  <?= $orders['state'] ; ?></p>
		<p>Zip:  <?= $orders['zip'] ; ?></p><br>

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

			<?php foreach $customer_info as $orders) 
			
			{
			var_dump($orders);
			die(); ?>
			<tr>

				<th><?= $orders['id'] ; ?></th>
				<th><?= $orders['name'] ; ?></th>
				<th><?= $orders['price'] ; ?></th>
				<th><?= $orders['inventory'] ; ?></th>
				<th>product order total</th>
			</tr>
			<?php }?>
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