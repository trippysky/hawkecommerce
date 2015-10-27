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
			<button>Cancel</button>
			<button>Preview</button>
			<input type="submit" value="Update"><br>
		</form>
	</div>

</body>
</html>