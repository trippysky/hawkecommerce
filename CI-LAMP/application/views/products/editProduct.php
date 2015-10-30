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
<?php //var_dump($results); die();
 ?>
<h3>Edit Product - ID <?= $results['product_id'] ?></h3>
	<div class="customer_info">
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
			Category: 
				<select name = "category_id">
					<option value = "<?= $results['category_id'] ?>"><?= $results['category_name'] ?></option>

					<?php foreach($cat_results as $cat_result){ ?>
					<option value = "<?= $cat_result['id'] ?>"><?= $cat_result['name'] ?></option>
					<?php } ?>
				</select><br>
			or add a new category:
				<input type="text" name="new_category"><br>
			
			<button type="button" name="Upload" onlick="">Upload an Image</button><br>
			<a href="/show_products"><button>Cancel</button></a><br>
			<a href="/products/show/<?= $results['product_id'] ?>"><button>Preview</button></a><br>
			<input type="submit" value="Update"><br>
		</form>
	</div>
	</div>

</body>
</html>