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
			filter nav
			</nav>

			<div class="row">
			
				<div class="col side">
					side
				</div>
				<div class="col grid content">
				<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
				</div>
			
			</div>
			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
