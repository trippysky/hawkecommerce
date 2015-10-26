<html>
<head>
	<title>Dashboard Orders</title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>
    	$(document).ready(function()
    	{

    	});
    </script>


	<link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>
<?php include("partials/header");?>
	
	<form>
		<input type = "search" name = "search" placeholder = "Search">
		<select name = "pageSelect">
			<option>Show all orders in</option>
			<option value = "process">Process</option>
			<option value = "shipped">shipped</option>
		</select>
	</form>
	
	<!-- Main table here -->
	<table>
		<thead>
			<tr>
				<th>OrderID</th>
				<th>Name</th>
				<th>Date</th>
				<th>Billing Address</th>
				<th>Total</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>(order_id)</td>
				<td>(name)</td>
				<td>(date)</td>
				<td>(address)</td>
				<td>(total)</td>
				<td>
					<form>
						<select name = "orderStatus">
							<option value = "inProcess">In Process</option>
							<option value = "shipped">Shipped</option>
							<option value = "cancelled">Cancelled</option>
						</select>
					</form>
				</td>
			</tr>
		</tbody>
	</table>

	<!-- Pagination here -->

</body>
</html>