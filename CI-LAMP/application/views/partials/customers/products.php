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
	<?php if($product['inventory'] <= 0)
	{ ?>
		<div class="oos">Out of Stock</div>
		<p id="name"><?= $product['name'] ?></p>
	<?php } else { ?>
		<a href="products/show/<?= $product['id'] ?>"><p id="name"><?= $product['name'] ?></p></a>
	<?php } ?>
</div>
<?php  }
 } ?>
