<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mokilla
 */
use mokilla\mokilla_core_admin\PostTypeListings;

$posts = get_posts(array(
    'numberposts' => 4,
))

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
    <header class="entry-header">
        <p style="text-transform: uppercase;"><span>FRONT PAGE</span> >> <?= get_the_title(); ?></p>
		<?php the_title('<h1 class="entry-title-post">', '</h1>'); ?>
	</header><!-- .entry-header -->



	<div class="entry-content-post-single">
		<div>
			<div class="meta-row">
				<?php if(count(get_the_category( get_the_ID() ))): ?>
					<p><?= get_the_category( get_the_ID() )[0]->name; ?></p>
				<?php endif; ?>
				<p><?= get_the_date( 'F j, Y', get_the_ID() ) ?></p>
			</div>

            <?php mokilla_post_thumbnail(); ?>
            <?php the_content(); ?>
        </div>
        <div style="margin-top: 64px;">
        <div class="box">
			<div class="user-info">
				<?php if (get_field(PostTypeListings::ACF_USER_IMAGE, 'user_' . get_the_author_meta('ID'))):  ?>
					<img src="<?= get_field(PostTypeListings::ACF_USER_IMAGE, 'user_' . get_the_author_meta('ID')) ?>">
				<?php endif; ?>
				<?php if (get_field(PostTypeListings::ACF_USER_NAME, 'user_' . get_the_author_meta('ID'))):  ?>
					<p class="primary"><?= get_field(PostTypeListings::ACF_USER_NAME, 'user_' . get_the_author_meta('ID')) ?></p>
				<?php endif; ?>
			</div>
			
			<?php if (get_field(PostTypeListings::ACF_USER_DESCRIPTION, 'user_' . get_the_author_meta('ID'))):  ?>
					<p ><?= get_field(PostTypeListings::ACF_USER_DESCRIPTION, 'user_' . get_the_author_meta('ID')) ?></p>
			<?php endif; ?>

			<?php  if (get_option('mokilla-social-links')) : ?>

				<div class="socials"> 

				<?php  foreach (get_option('mokilla-social-links') as $key => $option) : ?>

					<a target="_blank" href="<?php echo $option ?>"> <i class="icon-<?php echo $key?>"> </i></a>

				<?php endforeach; ?>

				</div>

			<?php endif; ?>

		</div>

		<h3 class="side-title">latest news</h3>

		<?php foreach($posts as $post):  ?>

			<a href="<?= get_the_permalink( $post->ID ); ?>" class="post-item-side">
					<img src="<?= get_the_post_thumbnail_url( $post->ID ); ?>" >
				<div>
					<?php if(count(get_the_category($post->ID))): ?>
						<span><?= get_the_category($post->ID)[0]->cat_name; ?></span>
					<?php  endif; ?>
				<p><?= get_the_title($post->ID) ?></p>
				</div>
			</a>

		<?php endforeach;  ?>

    </div>
	</div><!-- .entry-content -->
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
