<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<style type="text/css">
		.orderInfo{
			margin: 20px;
		}
		.customerBillingInfo table, th{
			margin: 20px;
			border: 1px black solid;

		}	
		.totalBilling {
			border: 1px black solid;
			width: 150px;
			height: 50px;
			padding: 10px;
			margin: 10px;
		}
		.status{
			border: 2px black solid;
			width: 140px;
			height: 20px;
			padding: 5px;

		}					
	</style>
<body>
	<div class="orderInfo">
		<h5>Order ID:</h5>
		<h5>Customer shipping info:</h5>
		<p>Name: <br>
		<p>Address:  <br>
		<p>City:  <br>
		<p>State:  <br>
		<p>Zip:</p><br>

		<p>Customer billing info:</p>
		<p>Name:</p>
		<p>Address:</p>
		<p>City:</p>
		<p>State:</p>
		<p>Zip:</p><br>
	</div>

	<div class="customerBillingInfo">
		<table>
			<tr>
				<th>ID</th>
				<th>Item</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
			</tr>
			<tr>
				<th>product ID</th>
				<th>Product name</th>
				<th>product price</th>
				<th>product quantity</th>
				<th>product order total</th>
			</tr>
		</table>
		
	</div>
	<div class="totalBilling">
		Sub total:  <br>
		Shipping:  <br>
		Total Price:
		
	</div>
	<div class="status">
		Status:  
	</div>
</body>
</html>