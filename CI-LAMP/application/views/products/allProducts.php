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
<link type = "text/css" rel="stylesheet" href="/assets/style.css">


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>


</head>
<body>

	<div id="header">
		<p>Dashboard</p>
		<p><a href="/orders">Orders</a></p>
		<p><b>Products</b></p>
		<p><a href="/logout">Logout</a></p>
	</div>

	<div>
		<form>
			<input type = "search" name = "search" placeholder = "Search">
		</form>
		<a href="/add_product"><button>Add new product</button></a>
	</div>

	<!-- Main table here -->
	<table>
		<thead>
			<tr>
				<th>Picture</th>
				<th>ID</th>
				<th>Name</th>
				<th>Inventory Count</th>
				<th>Quantity Sold</th>
				<th>Active?</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			//  var_dump($results);
			// die();
			?>
			<?php 
			foreach($results as $result){ 
				
			if($result['active'] == 1)
			{
				$actv = "Yes";
			}
			else
			{
				$actv = "No";
			}
			?>

			<tr>
				<td><img src="/assets/<?= $result['image']; ?>"></td>
				<td><?= $result['id']; ?></td>
				<td><?= $result['name']; ?></td>
				<td><?= $result['inventory']; ?></td>
				<td><?= $result['qty_sold']; ?></td>
				<td><?= $actv; ?></td>
				<td>
					<a href="/edit_product/<?= $result['id'] ?>">Edit</a>
					<?php
					if($result['active'] == 1)
			{
				echo "<a href='/delete_product/".$result['id'] ."'>Remove from Inventory</a>";
			}
			else
			{
				echo "<a href='/activate_product/".$result['id'] ."'>Return to Inventory</a>";
			}
			?>
					
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<!-- Pagination here -->
</body>
</html>