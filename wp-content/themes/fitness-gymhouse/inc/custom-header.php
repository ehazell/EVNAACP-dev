<?php
/**
 * Custom header implementation
 */

function fitness_gymhouse_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'fitness_gymhouse_custom_header_args', array(

		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'fitness_gymhouse_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'fitness_gymhouse_custom_header_setup' );

if ( ! function_exists( 'fitness_gymhouse_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see fitness_gymhouse_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'fitness_gymhouse_header_style' );
function fitness_gymhouse_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        #masthead{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'fitness-gymhouse-style', $custom_css );
	endif;
}
endif; // fitness_gymhouse_header_style