<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mokilla
 */
use mokilla\mokilla_core_admin\PostTypeListings;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
    <header class="entry-header">
        <p><span>FRONT PAGE</span> >> INDIVIDUAL LISTING PAGE</p>
		<?php the_title( '<h1 class="entry-title-post">', '</h1>' ); ?>
	</header><!-- .entry-header -->



	<div class="entry-content-post-single">
		<div>
            <?php mokilla_post_thumbnail(); ?>
            <?php the_content(); ?>
        </div>
        <div>
        <div class="box">
			<?php if(get_field(PostTypeListings::ACF_USER_NAME, 'user_' . get_the_author_meta('ID'))):  ?>
				<p class="primary"><?= get_field(PostTypeListings::ACF_USER_NAME, 'user_' . get_the_author_meta('ID')) ?></p>
			<?php endif; ?>
			<?php if(get_field(PostTypeListings::ACF_USER_DESCRIPTION, 'user_' . get_the_author_meta('ID'))):  ?>
					<p ><?= get_field(PostTypeListings::ACF_USER_DESCRIPTION, 'user_' . get_the_author_meta('ID')) ?></p>
			<?php endif; ?>

		</div>
    </div>
	</div><!-- .entry-content -->
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
