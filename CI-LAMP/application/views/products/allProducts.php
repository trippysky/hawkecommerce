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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<!-- Local stylesheet -->
<link type = "text/css" rel="stylesheet" href="/assets/style.css">


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>


</head>
<body>
	<div class = "container">

	<div class = "navbar" >
		<h5>Dashboard</h5>
		<h5><a href="/orders">Orders</a></h5>
		<h5><b>Products</b></h5>
		<h5><a href="/logout">Logout</a></h5>
	</div>

	<div>
		<form action="/" method="post" class="search"/>
					<input type="search" name="searchName" placeholder="Search"/>
					<i class="fa fa-search"></i>
				</form>
		<a href="/add_product"><button>Add new product</button></a>
	</div>

	<!-- Main table here -->
	<table class = "order">
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
					<a href="/edit_product/<?= $result['id'] ?>">Edit</a><br><br>
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
	</div>
	<!-- Pagination here -->
</body>
</html>