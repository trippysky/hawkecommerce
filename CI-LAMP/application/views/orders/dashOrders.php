<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
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
	<?php 
		// var_dump($results);
		// die('view');


	?>
	<div id="header">
		<p>Dashboard</p>
		<p><a href=""></a>Orders</p>
		<p><a href="/show_products">Products</a></p>
		<p><a href="/admins/admins/logout">logoff</a></p>
	</div>
	
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
			<?php foreach($results as $result){ ?>	
			<tr>
				<td><a href="/orders/show_order"><?= $result['id'] ?></a></td>
				<td><?= $result['first_name'] ?> <?= $result['last_name'] ?></td>
				<td><?= $result['created_at'] ?></td>
				<td><?= $result['street_1'] ?>, <?= $result['street_2'] ?>, <?= $result['city'] ?>, <?= $result['state'] ?> <?= $result['zip'] ?></td>
				<td><?= $result['total'] ?></td>
				<td>
					<form id = "status_change" action = "/orders/orders/update_status" method = "post">
						<select name = "orderStatus">
							<?php
								if($result['status'] == "In Process")
								{
									echo "<option value = 'inProcess'>". $result['status'] ."</option>
									<option value = 'shipped'>Shipped</option>
									<option value = 'cancelled'>Cancelled</option>";
								}
								elseif($result['status'] == "Shipped")
								{
									echo "<option value = 'shipped'>". $result['status'] ."</option>
									<option value = 'inProcess'>In Process</option>
									<option value = 'cancelled'>Cancelled</option>";
								}
								elseif($result['status'] == "Cancelled")
								{
									echo "<option value = 'cancelled'>". $result['status'] ."</option>
									<option value = 'inProcess'>In Process</option>
									<option value = 'shipped'>Shipped</option>";
								}
							?>
							
						</select>
						<input type = "submit" value = "Change status">
					</form>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<!-- Pagination here -->

</body>
</html>