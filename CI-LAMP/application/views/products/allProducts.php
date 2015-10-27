<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>
    	$(document).ready(function()
    	{

    	});
    </script>


	<link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>

	

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
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($results as $result){ ?>
				
			<tr>
				<td><img src=""></td>
				<td><?= $result['id']; ?></td>
				<td><?= $result['name']; ?></td>
				<td><?= $result['inventory']; ?></td>
				<td><?= $result['qty_sold']; ?></td>
				<td>
					<a href="/edit_product/<?= $result['id'] ?>">Edit</a>
					<a href="/products/delete_product">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<!-- Pagination here -->
</body>
</html>