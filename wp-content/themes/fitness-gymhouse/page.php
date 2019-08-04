<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

<?php do_action( 'fitness_gymhouse_page_top' ); ?>

<div class="container">

	<?php
		while ( have_posts() ) : the_post();?>

			<div class="feature-box">   
                <img src="<?php the_post_thumbnail_url('full'); ?>" >
            </div>
			<h1><?php the_title();?></h1>
			<p><?php the_content(); ?></p>
			
			<?php
		        // If comments are open or we have at least one comment, load up the comment template.
		        if ( comments_open() || get_comments_number() ) {
		            comments_template();
		        }
		    ?>

		<?php endwhile; // End of the loop.

		wp_reset_postdata(); ?>
</div>

<?php do_action( 'fitness_gymhouse_bottom' ); ?>

<?php get_footer();
