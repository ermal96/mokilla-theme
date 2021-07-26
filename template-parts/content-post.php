<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mokilla
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title-post">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php mokilla_post_thumbnail(); ?>

	<div class="entry-content-post-single">
		<?php
		the_content();

		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
