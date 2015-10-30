<?php if(isset($products) && $products !== null){
	foreach($products as $product)

{
	// for($i=$pagenum; $i<= ($pagenum + 15); $i++)
	// {
 ?>
<div class="product">
	<div class="image">
		<img src="assets/<?= $product['image'] ?>"/>
		<p id="price">$<?= $product['price'] ?></p>
	</div>
	<a href="products/show/<?= $product['id'] ?>"><p id="name"><?= $product['name'] ?></p></a>
</div>
<?php  }
 } ?>
