<?php 

/**
* edulite functions and definitions
* @package edulite
*/

if( ! function_exists( 'edulite_theme_setup' ) )
{

function edulite_theme_setup() {
	
    load_theme_textdomain( 'edulite', get_template_directory() . '/lang' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	// Add default title support
	add_theme_support( 'title-tag' ); 		

	// Add default logo support		
    add_theme_support( 'custom-logo' );	

    // To use additional css
	    add_editor_style( 'css/editor-style.css' );		

	
    
	add_theme_support('post-thumbnails');
	
	$defaults = array(/* translators: %s: default background header image */
		'default-image'          => get_template_directory_uri() .'/assets/images/header.jpg',
		'width'                  => 1920,
		'height'                 => 540,
		'uploads'                => true,
		'default-text-color'     => "#000",
		'wp-head-callback'       => 'edulite_header_css',
	);
	add_theme_support( 'custom-header', $defaults );

	/**
	* Set the content width in pixels, based on the theme's design and stylesheet.
	*/
	$GLOBALS['content_width'] = apply_filters( 'edulite_content_width', 980 );
	
	// Add theme support for Semantic Markup
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	) );
	 
	 add_theme_support( 'customize-selective-refresh-widgets' );
	 
	// add excerpt support for pages
	add_post_type_support( 'page', 'excerpt' );
	
	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
   
	// Menus
	//add_theme_support( 'menus' );

    register_nav_menus(array(
   'primary' => esc_html__('primary Menu', 'edulite')
   ));		
   
   //Welcome Message 		
	if ( is_admin() ) {
		require( get_template_directory() . '/welcome-message.php');
	}

}
add_action( 'after_setup_theme', 'edulite_theme_setup' );
}



if( ! function_exists( 'edulite_header_css' ) ) {
	function edulite_header_css()
	{
		?>
			<style type="text/css">
				<?php
					//Check if user has defined any header image.
					if ( get_header_image() ) :
				?>
					.page-title
					{
						background-image:url('<?php header_image(); ?>');
					}
				<?php endif; ?>	
			</style>
		<?php

	}

}

	
	/**
 * Load Upsell Button In Customizer
 * 2016 &copy; [Justin Tadlock](http://justintadlock.com).
 */

require_once( trailingslashit( get_template_directory() ) . '/lib/upgrade/class-customize.php' );

add_action( 'admin_init', 'edulite_detect_button' );
	function edulite_detect_button() {
	wp_enqueue_style( 'edulite-info-button', get_template_directory_uri() . '/assets/css/import-button.css' );
}

/**
 * admin  JS scripts
 */
function edulite_admin_enqueue_scripts( $hook ) { 
	wp_enqueue_style( 
		'font-awesome', 
		get_template_directory_uri() . '/assets/css/font-awesome.css', 
		array(), 
		'4.7.0', 
		'all' 
	);
	wp_enqueue_style( 
		'edulite-admin', 
		get_template_directory_uri() . '/assets/admin/css/admin.css', 
		array(), 
		'1.0.0', 
		'all' 
	);
 
}
add_action( 'admin_enqueue_scripts', 'edulite_admin_enqueue_scripts' );

/**
* Customizer additions.
*/

require get_template_directory(). '/customizer.php';
require get_template_directory(). '/pro-feat.php';

// Register Nav Walker class_alias
require get_template_directory() . '/wp-bootstrap-navwalker.php';


	/**
	* Enqueue CSS stylesheets
	*/

	if( ! function_exists( 'edulite_enqueue_styles' ) ) {
	function edulite_enqueue_styles() {
		
	// Bootstrap CSS 
	wp_enqueue_style('edulite-font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,500,600|Poppins:400,500,600,700');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style('owl', get_template_directory_uri() . '/assets/css/owl.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css');
	wp_enqueue_style( 'edulite-style', get_stylesheet_uri() );

	}
	add_action( 'wp_enqueue_scripts', 'edulite_enqueue_styles' );
	}

	/**
	* Enqueue JS scripts
	*/

if( ! function_exists( 'edulite_enqueue_scripts' ) ) {
	function edulite_enqueue_scripts() {   
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), '', true);
		wp_enqueue_script('jquery-owl-js', get_template_directory_uri() . '/assets/js/owl.js',array(),'', true);
		wp_enqueue_script('edulite-script', get_template_directory_uri() . '/assets/js/script.js', array(), '', true);
		
	}
	add_action( 'wp_enqueue_scripts', 'edulite_enqueue_scripts' );	
}


function edulite_sidebars() {

	// Blog Sidebar

	register_sidebar(array(
		'name' => esc_html__( 'Blog Sidebar', "edulite"),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Sidebar on the blog layout.', "edulite"),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-heading">',
		'after_title' => '</h2>',
	));
		

	// Footer Sidebar

	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area', "edulite"),
		'id' => 'edulite-footer-widget-area',
		'description' => esc_html__( 'The footer widget area', "edulite"),
		'before_widget' => '<div class="%2$s footer-widget col-md-3 col-sm-6 col-xs-12">',
		'after_widget' => '</div>',
		'before_title' => ' <h2>',
		'after_title' => '</h2>',
	));	

	
		
}
add_action( 'widgets_init', 'edulite_sidebars' );