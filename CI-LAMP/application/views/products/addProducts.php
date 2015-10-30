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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<!-- Local stylesheet -->
<link type = "text/css" rel="stylesheet" href="/assets/style.css">


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>


</head>

<body>

	<div class = "container">
	<?php //var_dump($results); die('view'); 
	?>
<h3>Add a New Product</h3>
	<div class="customer_info">
		<form action = "/products/products/create_product" method = "post">
			  
				<input type="text" name="name" placeholder = "Name"></input><br>
				
				<textarea id="description" name="description" placeholder = "Description"></textarea><br>
				
				<input type = "text" name = "price" placeholder = "Price"><br>
				
				<input type = "text" name = "qty"placeholder = "Quantity"><br>
			 
				<select name = "categories">
					<option>Select a Category</option>
					<?php foreach($results as $result){ ?>
					<option value = "<?= $result['id'] ?>"><?= $result['name'] ?></option>
					<?php } ?>
				</select><br>
			
				<input type="text" name="new_category" placeholder = "or add a new category"><br>
			
			<button type="button" name="Upload" onlick="">Upload an Image</button><br>
			
			<a href="/show_products"><button>Cancel</button></a>
			<a href="/customers/show_product/<?= $result['id'] ?>"></a><button>Preview</button>
			<input type="submit" value="Add"><br>
		</form>

	</div>
	</div>
</body>
</html>