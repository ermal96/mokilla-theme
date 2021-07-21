<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mokilla
 */

use mokilla\mokilla_core_admin\PostTypeListings;

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main listing-container listing-container-single">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<p><span>FRONT PAGE</span> >> INDIVIDUAL LISTING PAGE</p>
				<h1><?php the_title(); ?></h1>
			</header><!-- .page-header -->


				<?php
					while ( have_posts() ) :
						the_post(); ?>

                   
                       <div class="row">

                            <div class="col">
                                <div class="thumbnail"><?php the_post_thumbnail(); ?></div>
                            </div>

                            <div class="col">
								<h3>Author Info</h3>
								<div class="box">
									<?php if(get_field(PostTypeListings::ACF_EMAIL)):  ?>
										<p><i class="icon-mail"></i><?= get_field(PostTypeListings::ACF_EMAIL) ?></p>
									<?php endif; ?>
						
									<?php if(get_field(PostTypeListings::ACF_PHONE_NUMBER)):  ?>
										<p><i class="icon-phone"></i><?= get_field(PostTypeListings::ACF_PHONE_NUMBER) ?></p>
									<?php endif; ?>

									<?php if(get_field(PostTypeListings::ACF_ADDRESS)):  ?>
										<p><i class="icon-location"></i><?= get_field(PostTypeListings::ACF_ADDRESS) ?></p>
									<?php endif; ?>

									<?php if(get_field(PostTypeListings::ACF_WEBSITE)):  ?>
										<p><i class="icon-website"></i><?= get_field(PostTypeListings::ACF_WEBSITE) ?></p>
									<?php endif; ?>
								</div>
                            </div>

                        </div>
						
				<?php	endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
				
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
