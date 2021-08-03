<?php 

$articles = get_term_by('slug', 'articles', 'category');
$aricle_id = null;
if($articles) {
	$aricle_id = $articles->term_id;
}

$categories = get_terms('category',array('number' => 4, 'exclude' => $aricle_id)); 

?>

<ul class="cat-list">
	<?php foreach ($categories as $category) : ?>
		<li>
			<a class="cat-list_item" href="#!" data-slug="<?= $category->slug; ?>">
				<?= $category->name; ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>