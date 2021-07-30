<?php
/**
 * Template part for displaying page content in frontpage.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mokilla
 */

 $grid_posts = get_posts(array('numberposts' => 3 ));

 $posts = get_posts(array('numberposts' => 4 ));

 $categories = get_categories();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
	
	<!-- blog grid -->
	<div class="blog-grid">
 		<?php
          foreach ($grid_posts as $key => $post):
            set_query_var('grid_posts', $grid_posts);
            set_query_var('key', $key);
            get_template_part('components/post-item-grid');
          endforeach;
          ?>
	</div>


	<!-- articles sidebar -->
	<div class="articles-sidebar">

		<div class="articles-sidebar-header">
			<h2><?php _e('latest recipes', 'mokilla') ?></h2>
			<?php get_template_part('components/post-header-filter'); ?>
			<a class="show-all-link" href="<?= get_site_url() . '/posts' ?>"><?php _e('view all', 'mokilla') ?><i class="icon-arrow-top"></i></a>
		</div>

		<div class="articles-grid">
			<div class="articles-grid-items">

			<?php

                foreach ($posts as $key => $post):
                    get_template_part('components/post-item-box');
                endforeach;
            ?>

			</div>

			<?php get_sidebar(); ?>

		</div>
	
	
	</div>


	<!-- categories slide -->
	<div class="home-slide">
		<div class="home-slide-header">
			<h2 class="home-slide-header-title"><?php _e('Categories', 'mokilla') ?></h2>
		</div>
		<div class="home-slide-slider">
			<?php foreach ($categories as $category) : ?>

					<a class="home-slide-slider-slide" >
						<img src="<?= get_field('mokilla_category_image', $category) ?>" alt="<?= $category->name; ?>">
						<div class="slide-content">
							<p><?= $category->name; ?></p>
							<i class="icon-arrow-right"></i>
						</div>
					</a>
			<?php endforeach; ?>
		</div>
	</div>


	<!-- forum homepage -->
	<div class="forum-homepage">
		<div class="forum-homepage-header">
			<h2><?= _e('FORUM', 'mokilla') ?></h2>
			<a href="#"><?= _e('view all') ?> <i class="icon-arrow-top"></i></a>
		</div>
		<?php  echo do_shortcode(' [fmwp_forums /]') ?> 
    </div>


		<!-- categories slide -->
	<div class="home-slide">
		<div class="home-slide-header">
			<h2 class="home-slide-header-title"><?php _e('carousel section', 'mokilla') ?></h2>
		</div>
		<div class="home-slide-slider">
			<?php foreach ($posts as $post) :

				get_template_part('components/post-item-box');
					
			 endforeach; ?>
		</div>
	</div>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
