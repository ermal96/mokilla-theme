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

								<div class="tags-row">
									<?php if(get_field(PostTypeListings::ACF_PRICE)):  ?>
												<button class="accent">Place</button>
									<?php endif; ?>

									<?php if(get_field(PostTypeListings::ACF_PRICE)):  ?>
											<button class="primary">$<?= get_field(PostTypeListings::ACF_PRICE) ?> /per order</button>
										<?php endif; ?>
									

									<?php if(get_field(PostTypeListings::ACF_PRICE)):  ?>
											<button class="dark"><i class="icon-bookmark"></i> <?php
											foreach(wp_get_post_categories(get_the_ID()) as $category) {
												echo get_category( $category )->name . ', ';
											}	
											?></button>
										<?php endif; ?>
									
								</div>

								<?php if(get_field(PostTypeListings::ACF_DESCRIPTION)): ?>
										<div class="border-card">
											<h2>description</h2>
											<?= get_field(PostTypeListings::ACF_DESCRIPTION); ?>
										</div>
								<?php endif; ?>

								<div class="border-card">
									<h2>Listing Details</h2>
									<div class="flex-row">
										<p><span>Parking Capacity: </span>10</p>
										<p><span>Pets Allowed: </span>Yes</p>
									</div>
									<div class="flex-row">
										<p><span>Discount: </span>1</p>
									</div>
								</div>

								<?php if(get_field(PostTypeListings::ACF_OWNER_MESSAGE)): ?>
								<div class="border-card">
									<h2>Owner Message</h2>
									<div><?= get_field(PostTypeListings::ACF_OWNER_MESSAGE); ?></div>
								</div>
								<?php endif; ?>

                            </div>

                            <div class="col">

								<h3 class="box-title">Author Info</h3>
								<div class="box">
									<?php if(get_field(PostTypeListings::ACF_USER_NAME, 'user_' . get_the_author_meta('ID'))):  ?>
										<p class="primary"><?= get_field(PostTypeListings::ACF_USER_NAME, 'user_' . get_the_author_meta('ID')) ?></p>
									<?php endif; ?>
									<?php if(get_field(PostTypeListings::ACF_USER_DESCRIPTION, 'user_' . get_the_author_meta('ID'))):  ?>
										<p ><?= get_field(PostTypeListings::ACF_USER_DESCRIPTION, 'user_' . get_the_author_meta('ID')) ?></p>
									<?php endif; ?>
									<?php if(get_field(PostTypeListings::ACF_USER_TELEPHONE, 'user_' . get_the_author_meta('ID'))):  ?>
										<p><i class="icon-phone"></i><?= get_field(PostTypeListings::ACF_USER_TELEPHONE, 'user_' . get_the_author_meta('ID')) ?></p>
									<?php endif; ?>
									<?php if(get_field(PostTypeListings::ACF_USER_EMAIL, 'user_' . get_the_author_meta('ID'))):  ?>
										<p><i class="icon-mail"></i><?= get_field(PostTypeListings::ACF_USER_EMAIL, 'user_' . get_the_author_meta('ID')) ?></p>
									<?php endif; ?>

									<?php if(get_field(PostTypeListings::ACF_USER_PHONE, 'user_' . get_the_author_meta('ID'))):  ?>
										<p><i class="icon-phone"></i><?= get_field(PostTypeListings::ACF_USER_PHONE, 'user_' . get_the_author_meta('ID')) ?></p>
									<?php endif; ?>

								</div>
							
								<?php if(count(get_field(PostTypeListings::ACF_AVAILABILITY_TIME))): 
									$time = get_field(PostTypeListings::ACF_AVAILABILITY_TIME);
								?>
								<h3 class="box-title">Availability Time</h3>
								<div class="box">
									<?php if($time[PostTypeListings::ACF_MONDAY]):  ?>
										<p class="flex-bet"><span>Monday</span><?= $time[PostTypeListings::ACF_MONDAY] ?></p>
									<?php endif; ?>
									<?php if($time[PostTypeListings::ACF_TUESDAY]):  ?>
										<p class="flex-bet"><span>Tuesday</span><?= $time[PostTypeListings::ACF_TUESDAY] ?></p>
									<?php endif; ?>
									<?php if($time[PostTypeListings::ACF_WEDNESDAY]):  ?>
										<p class="flex-bet"><span>Wednesday</span><?= $time[PostTypeListings::ACF_WEDNESDAY] ?></p>
									<?php endif; ?>
									<?php if($time[PostTypeListings::ACF_THURSDAY]):  ?>
										<p class="flex-bet"><span>Thursday</span><?= $time[PostTypeListings::ACF_THURSDAY] ?></p>
									<?php endif; ?>
									<?php if($time[PostTypeListings::ACF_FRIDAY]):  ?>
										<p class="flex-bet"><span>Friday</span><?= $time[PostTypeListings::ACF_FRIDAY] ?></p>
									<?php endif; ?>
									<hr>
									<?php if($time[PostTypeListings::ACF_SATURDAY]):  ?>
										<p class="flex-bet accent"><span>Saturday</span><?= $time[PostTypeListings::ACF_SATURDAY] ?></p>
									<?php endif; ?>
									<?php if($time[PostTypeListings::ACF_SUNDAY]):  ?>
										<p class="flex-bet accent"><span>Sunday</span><?= $time[PostTypeListings::ACF_SUNDAY] ?></p>
									<?php endif; ?>
								</div>
								<?php endif; ?>

								<h3 class="box-title">Contact Info</h3>
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
