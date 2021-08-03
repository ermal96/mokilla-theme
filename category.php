<?php

get_header();
?>

<div id="primary" class="content-area posts-page container">
		<main id="main" class="site-main">
        <header class="page-header">
				<p><span>FRONT PAGE</span> >> Category</p>
		</header><!-- .page-header -->

        <div class="grid">

            
            <?php if (have_posts() ) : ?>
            
                <!-- the loop -->
                <?php while (have_posts() ) :the_post(); ?>
                <a href="<?= get_the_permalink(); ?>" class="post-item-single">
                    <?php the_post_thumbnail(); ?>
                    <?php if(count(get_the_category( get_the_ID() ))): ?>
                        <p><?= get_the_category( get_the_ID() )[0]->name; ?></p>
                    <?php endif; ?>
                    <h2><?php the_title(); ?></h2>
                </a>
                
                <?php endwhile; ?>
                <!-- end of the loop -->
            
                <?php wp_reset_postdata(); ?>
            
        
            <?php endif; ?>
        </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
