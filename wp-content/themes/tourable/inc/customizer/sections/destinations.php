<?php
/**
 * Destinations Section options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

// Add Destinations section
$wp_customize->add_section( 'tourable_destinations_section', array(
	'title'             => esc_html__( 'Destinations','tourable' ),
	'description'       => esc_html__( 'Destinations Section options.', 'tourable' ),
	'panel'             => 'tourable_front_page_panel',
) );

// Destinations content enable control and setting
$wp_customize->add_setting( 'tourable_theme_options[destinations_section_enable]', array(
	'default'			=> 	$options['destinations_section_enable'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[destinations_section_enable]', array(
	'label'             => esc_html__( 'Destinations Section Enable', 'tourable' ),
	'section'           => 'tourable_destinations_section',
	'on_off_label' 		=> tourable_switch_options(),
) ) );

// destinations suffix setting and control
$wp_customize->add_setting( 'tourable_theme_options[destinations_suffix]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> $options['destinations_suffix'],
) );

$wp_customize->add_control( 'tourable_theme_options[destinations_suffix]', array(
	'label'           	=> esc_html__( 'Suffix After Trip Count', 'tourable' ),
	'section'        	=> 'tourable_destinations_section',
	'active_callback' 	=> 'tourable_is_destinations_section_enable',
	'type'				=> 'text',
) );

// Destinations category image enable control and setting
$wp_customize->add_setting( 'tourable_theme_options[destinations_cat_meta_image_enable]', array(
	'default'			=> 	$options['destinations_cat_meta_image_enable'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[destinations_cat_meta_image_enable]', array(
	'label'             => esc_html__( 'Use Category Meta Image', 'tourable' ),
	'description'       => esc_html__( 'Note: You can enable background image from category image for Destinations, Activities and Trip Types.', 'tourable' ),
	'section'           => 'tourable_destinations_section',
	'on_off_label' 		=> tourable_switch_options(),
	'active_callback'   => 'tourable_is_destinations_section_enable',
) ) );

// Destinations content type control and setting
$wp_customize->add_setting( 'tourable_theme_options[destinations_content_type]', array(
	'default'          	=> $options['destinations_content_type'],
	'sanitize_callback' => 'tourable_sanitize_select',
) );

$wp_customize->add_control( 'tourable_theme_options[destinations_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'tourable' ),
	'section'           => 'tourable_destinations_section',
	'type'				=> 'select',
	'active_callback' 	=> 'tourable_is_destinations_section_enable',
	'choices'			=> tourable_destinations_content_type(),
) );

for ( $i = 1; $i <= 3; $i++ ) :
	// banner image setting and control.
	$wp_customize->add_setting( 'tourable_theme_options[destinations_background_image_' . $i . ']', array(
		'sanitize_callback' => 'tourable_sanitize_image',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tourable_theme_options[destinations_background_image_' . $i . ']',
			array(
			'label'       		=> sprintf( esc_html__( 'Image %d', 'tourable' ), $i ),
			'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'tourable' ), 500, 500 ),
			'section'     		=> 'tourable_destinations_section',
			'active_callback'	=> 'tourable_is_destinations_section_image_enable',
	) ) );

	// Add dropdown category setting and control.
	$wp_customize->add_setting(  'tourable_theme_options[destinations_content_category_' . $i . ']', array(
		'sanitize_callback' => 'tourable_sanitize_single_category',
	) ) ;

	$wp_customize->add_control( new Tourable_Dropdown_Taxonomies_Control( $wp_customize,'tourable_theme_options[destinations_content_category_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Category %d', 'tourable' ), $i ),
		'section'           => 'tourable_destinations_section',
		'type'              => 'dropdown-taxonomies',
		'active_callback'	=> 'tourable_is_destinations_section_content_category_enable'
	) ) );

	// Add dropdown category setting and control.
	$wp_customize->add_setting(  'tourable_theme_options[destinations_content_destination_' . $i . ']', array(
		'sanitize_callback' => 'absint',
	) ) ;

	$wp_customize->add_control( new Tourable_Dropdown_Taxonomies_Control( $wp_customize,'tourable_theme_options[destinations_content_destination_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Destination %d', 'tourable' ), $i ),
		'section'           => 'tourable_destinations_section',
		'taxonomy'			=> 'travel_locations',
		'type'              => 'dropdown-taxonomies',
		'active_callback'	=> 'tourable_is_destinations_section_content_destination_enable'
	) ) );

	// destinations hr setting and control
	$wp_customize->add_setting( 'tourable_theme_options[destinations_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Tourable_Customize_Horizontal_Line( $wp_customize, 'tourable_theme_options[destinations_hr_'. $i .']',
		array(
			'section'         => 'tourable_destinations_section',
			'active_callback' => 'tourable_is_destinations_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;
