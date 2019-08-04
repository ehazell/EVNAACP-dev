<?php 
add_action( 'wp_enqueue_scripts', 'density_business_theme_css',20);
function density_business_theme_css() {
	wp_enqueue_style( 'density-business-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'density-business-style',get_stylesheet_directory_uri() . '/css/density-business.css');
}