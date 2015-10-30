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
<link type = "text/css" rel="stylesheet" href="/assets/style.css">


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>


</head>
<body>
	<?php
	// var_dump($this->session->userdata('id'));
	// 		die();
			?>
	<div id="header">
		<p>Dashboard</p>
		<p><b>Orders</b></p>
		<p><a href="/show_products">Products</a></p>
		<p><a href="/logout">Logout</a></p>
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

			<?php 
				// var_dump($results);
				// die('view');
			 ?>
			<?php foreach($results as $result){ ?>	
			<tr>

				<td><a href="/show_orders/<?= $result['id'] ?>"><?= $result['id'] ?></a></td>

				
				<td><?= $result['first_name'] ?> <?= $result['last_name'] ?></td>
				<td><?= $result['created_at'] ?></td>
				<td><?= $result['street_1'] ?>, <?= $result['street_2'] ?>, <?= $result['city'] ?>, <?= $result['state'] ?> <?= $result['zip'] ?></td>
				<td><?= $result['total'] ?></td>
				<td>
					<form id = "status_change" action = "/orders/orders/update_status" method = "post">
						<input type = "hidden" name = "id" value = "<?= $result['id'] ?>">
						<select name = "orderStatus">
							<?php
								if($result['status'] == "inProcess")
								{
									echo "<option value = 'inProcess'>In Process</option>
									<option value = 'shipped'>Shipped</option>
									<option value = 'cancelled'>Cancelled</option>";
								}
								elseif($result['status'] == "shipped")
								{
									echo "<option value = 'shipped'>Shipped</option>
									<option value = 'inProcess'>In Process</option>
									<option value = 'cancelled'>Cancelled</option>";
								}
								elseif($result['status'] == "cancelled")
								{
									echo "<option value = 'cancelled'>Cancelled</option>
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