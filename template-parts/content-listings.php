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

<a href="<?php the_permalink(); ?>" class="content-listing" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
   <img src="<?php the_post_thumbnail_url(); ?>" alt="">

    <div class="content">
        <h3 class="title"><?php the_title(); ?></h3>

        <div class="meta">
            <?php if(get_field(PostTypeListings::ACF_EMAIL)):  ?>
                <p><?= get_field(PostTypeListings::ACF_EMAIL) ?></p>
            <?php endif; ?>
            
            <?php if(get_field(PostTypeListings::ACF_PHONE_NUMBER)):  ?>
                <p><?= get_field(PostTypeListings::ACF_PHONE_NUMBER) ?></p>
            <?php endif; ?>

            <?php if(get_field(PostTypeListings::ACF_ADDRESS)):  ?>
                <p><?= get_field(PostTypeListings::ACF_ADDRESS) ?></p>
            <?php endif; ?>

            <?php if(get_field(PostTypeListings::ACF_WEBSITE)):  ?>
                <p><?= get_field(PostTypeListings::ACF_WEBSITE) ?></p>
            <?php endif; ?>
        </div>

        <footer class="meta">
        <?php if(get_field(PostTypeListings::ACF_PRICE)):  ?>
                <p><span>$<?= get_field(PostTypeListings::ACF_PRICE) ?></span> / per order</p>
            <?php endif; ?>
        </footer>
    </div>


</a><!-- #post-<?php the_ID(); ?> -->
