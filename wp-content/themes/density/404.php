<?php
/**
 * Page opens when broken links are found
 * @package Density
 */

get_header(); ?>

<?php 
	density_breadcrumbs();
?>
<div class="density_tm_section ptb-100">
		<div class="container">
			<div class="error-page">
				<h2><?php echo esc_html__( '404', 'density' ); ?></h2>
				<h3><?php echo esc_html__( 'Page Not Found', 'density' ); ?></h3>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Back To Home', 'density' ); ?></a>
			</div>
		</div>
</div>

<?php get_footer(); ?>