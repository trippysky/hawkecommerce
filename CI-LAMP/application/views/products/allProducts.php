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

	<?php include("partials/header");?>

	<div>
		<form>
			<input type = "search" name = "search" placeholder = "Search">
		</form>
		<a href=""><button>Add new product</button></a>
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
			<tr>
				<td><img src=""></td>
				<td>(id)</td>
				<td>(name)</td>
				<td>(inventory)</td>
				<td>(quantity)</td>
				<td>
					<a href="">Edit</a>
					<a href="">Delete</a>
				</td>
			</tr>
		</tbody>
	</table>

	<!-- Pagination here -->
</body>
</html>