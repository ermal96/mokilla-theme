<?php
/**
* Template Name: Posts Page
*
*/

get_header();
?>

<div id="primary" class="content-area posts-page container">
		<main id="main" class="site-main">
        <header class="page-header">
				<p><span>FRONT PAGE</span> >> BLOG</p>
		</header><!-- .page-header -->

        <div class="grid">
            <?php 
            // the query
            $the_query = new WP_Query( array('post_type' => 'post') ); ?>
            
            <?php if ( $the_query->have_posts() ) : ?>
            
                <!-- the loop -->
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <a href="<?php the_post_thumbnail_url(); ?>" class="post-item-single">
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
