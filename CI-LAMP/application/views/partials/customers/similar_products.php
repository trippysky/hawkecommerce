<?php if(isset($similar_products) && $similar_products !== null){
	foreach($similar_products as $similar)
{ ?>
	<div class="item">
		<!-- this will become a partial -->
		<img src="/assets/<?= $similar['image']; ?>"/>
		<p id="price"><?= $similar['price']; ?></p>
		<p id="name"><?= $similar['name']; ?></p>
	</div>
<?php } ?>
<?php } ?>
