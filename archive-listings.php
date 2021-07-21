<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mokilla
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main listing-container">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<p><span>FRONT PAGE</span> >> LISTING PAGE</p>
				<h1>LISTING PAGE</h1>
			</header><!-- .page-header -->

			<nav class="filter-nav">
				
			<button class="btn-grid-view active">
				<i class="icon-grid"></i>
			</button>

			<button class="btn-list-view">
				<i class="icon-hamburger"></i>
			</button>
			</nav>

			<div class="row">
			
				<div class="col side">
				<?php do_action('show_beautiful_filters'); ?>
				</div>
				<div class="col grid listing-row-content">
				<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile; ?>

				</div>

				<?php	

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
				
			
			</div>
			
			<?php  the_posts_pagination( array( 'mid_size'=>3 ) ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
