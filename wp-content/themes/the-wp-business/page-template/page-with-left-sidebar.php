<?php
/**
 * Template Name: Page with Left Sidebar
 */

get_header(); ?>

<?php do_action('the_wp_business_page_leftside_header'); ?>

<div class="container">
    <div class="middle-align row">  
    	<div id="sidebar" class="col-lg-4 col-md-4">
    		<?php dynamic_sidebar('sidebar-2'); ?>
    	</div>		 
    	<div class="col-lg-8 col-md-8" id="content-tg" >
    		<?php while ( have_posts() ) : the_post(); ?>        
                <h1><?php the_title();?></h1>
                <img src="<?php the_post_thumbnail_url(); ?>">
                <?php the_content(); ?>

                <?php wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'the-wp-business' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'the-wp-business' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) ); 
            
                //If comments are open or we have at least one comment, load up the comment template
            	if ( comments_open() || '0' != get_comments_number() )
                	comments_template();
                    ?>
            <?php endwhile; // end of the loop. 
            wp_reset_postdata();?>
        </div>
        <div class="clearfix"></div>    
    </div>
</div>

<?php do_action('the_wp_business_page_leftside_footer'); ?>

<?php get_footer(); ?>