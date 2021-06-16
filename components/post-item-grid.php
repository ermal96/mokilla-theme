
<a href="<?php echo get_the_permalink($post->ID) ?>" style="background: url(<?php if ($key === array_key_first($grid_posts)) {
    echo wp_get_attachment_url(get_post_thumbnail_id($post->ID));
} ?>)" class="blog-grid-item">

	<?php if ($key !== array_key_first($grid_posts)): ?>
		<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php echo $post->post_title; ?>">
	<?php endif; ?>

	<div class="blog-grid-item-row">
		<p class="cat-name"><?php echo get_the_category($post->ID)[0]->name; ?></p>
		<p class="post-date"><?php echo get_the_date('F j, Y', $post->ID); ?></p>
	</div>
	<h3>
		<span><?php echo $post->post_title; ?></span>

		<?php if ($key === array_key_first($grid_posts)): ?>
			<i class="icon-arrow-top"></i>
		<?php endif; ?>
				
	</h3>
			
</a>