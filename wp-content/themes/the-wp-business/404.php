<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package The WP Business
 */

get_header(); ?>
<div id="content-tg">
	<div class="container">
        <div class="page-content">			
			<div class="notfound">
				<h1><?php esc_html_e('404 Not Found', 'the-wp-business' ); ?></h1>
				<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn &hellip;','the-wp-business' );  ?></p>
				<p class="text-404"><?php esc_html_e( 'Dont worry &hellip; it happens to the best of us.', 'the-wp-business' ); ?></p>
				<div class="read-moresec">
            		<a href="<?php echo esc_url( home_url() )?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Back to Home Page', 'the-wp-business' ); ?>
            		</a>
				</div>
			</div>			
			<div class="clearfix"></div>
        </div>
    	<div class="clearfix"></div>
	</div>
</div>

<?php get_footer(); ?>