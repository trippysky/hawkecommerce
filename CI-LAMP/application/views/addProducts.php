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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>


</head>

<body>

	<?php //var_dump($results); die('view'); 
	?>
<h3>Add a New Product</h3>
	<div class = "form_edit">
		<form action = "/products/products/create_product" method = "post">
			Name:  
				<input type="text" name="name"></input><br>
				Description:
				<textarea id="description" name="description"></textarea><br>
				Price:
				<input type = "text" name = "price"><br>
				Quantity:
				<input type = "text" name = "qty"><br>
			Categories: 
				<select name = "categories">
					<option value = ""></option>
					<?php foreach($results as $result){ ?>
					<option value = "<?= $result['id'] ?>"><?= $result['name'] ?></option>
					<?php } ?>
				</select><br>
			or add a new category:
				<input type="text" name="new_category"><br>
			Images:
			<button type="button" name="Upload" onlick="">Upload</button><br>
			
			<input type="submit" value="Add"><br>
		</form>
		<a href="/show_products"><button>Cancel</button></a>
		<button>Preview</button>
	</div>

</body>
</html>