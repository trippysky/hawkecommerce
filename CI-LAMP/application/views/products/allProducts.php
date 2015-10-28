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
			<?php
			//  var_dump($results);
			// die();
			?>
			<?php foreach($results as $result){ ?>
				
			<tr>
				<td><img src="/assets/<?= $result['image']; ?>"></td>
				<td><?= $result['id']; ?></td>
				<td><?= $result['name']; ?></td>
				<td><?= $result['inventory']; ?></td>
				<td><?= $result['qty_sold']; ?></td>
				<td>
					<a href="/edit_product/<?= $result['id'] ?>">Edit</a>
					<a href="/delete_product/<?= $result['id'] ?>">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<!-- Pagination here -->
</body>
</html>