<?php $categories = get_categories(array('number' => 4)); ?>

<ul class="cat-list">
	<?php foreach ($categories as $category) : ?>
		<li>
			<a class="cat-list_item" href="#!" data-slug="<?= $category->slug; ?>">
				<?= $category->name; ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>