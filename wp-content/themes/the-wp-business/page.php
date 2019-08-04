<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package The WP Business
 */

get_header(); ?>

<?php do_action('the_wp_business_page_header'); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <div class="title-box">
    	<div class="container">
    		<h1><?php the_title();?></h1>		
    	</div>
    </div>

    <div id="content-tg" class="container">
        <div class="middle-align"> 
            <div class="feature-box bradcrumbs">
                <?php the_wp_business_the_breadcrumb(); ?>
            </div>
            <img src="<?php the_post_thumbnail_url(); ?>">
            <?php the_content(); ?>
            <?php wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'the-wp-business' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'the-wp-business' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
            )   ); ?>       
            <div class="clear"></div>    
        </div>
        <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        ?>
    </div>
<?php endwhile; // end of the loop. 
wp_reset_postdata();?>

<?php do_action('the_wp_business_page_footer'); ?>

<?php get_footer(); ?>