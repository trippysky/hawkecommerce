<h4>Categories</h4>
<?php if(isset($categories_list) && $categories_list !== null){
	foreach($categories_list as $category)
{ ?>
		<a href="/products/category/<?= $category['id']; ?>"><p><?= $category['name']; ?> (<?= $category['counter']; ?>)</p></a>
<?php } } ?>
<a href="/products/category/showall"><p class="showall">Show All</p></a>
