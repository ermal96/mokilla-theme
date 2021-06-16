<div class="grid-item">
	<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID));   ?>" alt="<?php echo $post->post_title; ?>" />
	<p class="grid-item-cat"><?php echo get_the_category($post->ID)[0]->name; ?></p>
	<h3 class="grid-item-title"><?php echo $post->post_title; ?></h3>
	<div class="grid-item-excerpt"><?php echo wp_trim_words(get_the_excerpt($post->ID), 20, '...')  ?></div>
	<a class="grid-item-link" href="<?php echo get_the_permalink($post->ID) ?>"> <?php _e('Read More', 'mokilla') ?> <i class="icon-arrow-right"></i></a>
</div>