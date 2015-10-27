<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		*{
			margin: 0px auto;
		}
		form{
			text-align: left;
			border: 1px;
			border-width: 100px;
			border-height: 100px;
			margin: 10px;

		}

		body{

			border: 2px solid;
			width:1000px;
			height:900px;

		}
		h3{
			margin:10px;
		}
		select{
			width: 120px;
		}
		textarea{
			height:200px;
		}
		input {
			width:200px;
		}
	</style>
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