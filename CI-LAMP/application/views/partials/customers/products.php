<?php if(isset($product_list) && $product_list !== null){
	foreach($product_list as $product)
{ ?>
<div class="product">
	<div class="image">
		<img src="assets/<?= $product['image'] ?>" height="125px" width="125px"/>
		<p id="price">$<?= $product['price'] ?></p>
	</div>
	<a href="products/show/<?= $product['id'] ?>"><p id="name"><?= $product['name'] ?></p></a>
</div>
<?php } 
 } ?>
