<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mokilla
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">

			<p class="info">© 2021 Mokilla.fi</p>
			<?php  if (get_option('mokilla-social-links')) : ?>

				<div class="footer-socials"> 

				<?php  foreach (get_option('mokilla-social-links') as $key => $option) : ?>

					<a target="_blank" href="<?php echo $option ?>"> <i class="icon-<?php echo $key?>"> </i></a>

				<?php endforeach; ?>

				</div>

			<?php endif; ?>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
