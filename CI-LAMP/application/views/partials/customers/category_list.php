<h4>Categories</h4>
<?php if(isset($categories_list) && $categories_list !== null){
	foreach($categories_list as $category)
{ ?>
	<p class = "cat_list" id = "<?= $category['id']; ?>" data-name="<?= $category['name']?>" action="/products/category/<?= $category['id']; ?>"><?= $category['name']; ?> (<?= $category['counter']; ?>)</p>
<?php } } ?>

<a href="/"><p class="showall">Show All</p></a>
