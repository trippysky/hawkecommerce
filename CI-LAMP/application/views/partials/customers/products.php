<?php if(isset($product_list) && $product_list !== null){
	foreach($product_list as $product)
{ ?>
<div class="image">
	<img src="assets/<?= $product['image'] ?>" height="125px" width="125px"/>
	<p id="price">$<?= $product['price'] ?></p>
	<p id="name"><?= $product['name'] ?></p>
</div>
<?php } 
 } ?>
