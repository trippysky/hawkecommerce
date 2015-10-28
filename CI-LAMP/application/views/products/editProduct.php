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
<?php //var_dump($results); die();
 ?>
<h3>Edit Product - ID <?= $results['product_id'] ?></h3>
	<div class = "form_edit">
		<form action = "/products/products/update_product" method = "post">
			<input type = "hidden" name = "product_id" value = "<?= $results['product_id'] ?>">
			Name:  
				<input type="text" name="name" value = "<?= $results['product_name'] ?>"><br>
				Description:
				<textarea id="description" name="description"><?= $results['description'] ?></textarea><br>
				Price:
				<input type = "text" name = "price" value = "<?= $results['price'] ?>"><br>
				Quantity:
				<input type = "text" name = "qty" value = "<?= $results['inventory'] ?>"><br>
			Categories: 
				<select name = "category_id">
					<option value = "<?= $results['category_id'] ?>"><?= $results['category_name'] ?></option>

					<?php foreach($cat_results as $cat_result){ ?>
					<option value = "<?= $cat_result['id'] ?>"><?= $cat_result['name'] ?></option>
					<?php } ?>
				</select><br>
			or add a new category:
				<input type="text" name="new_category"><br>
			Images:
			<button type="button" name="Upload" onlick="">Upload</button><br>
			<button>Cancel</button>
			<button>Preview</button>
			<input type="submit" value="Update"><br>
		</form>
	</div>

</body>
</html>