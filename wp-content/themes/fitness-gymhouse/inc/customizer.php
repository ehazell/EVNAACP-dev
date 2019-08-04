<?php
/**
 * Fitness Gymhouse: Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fitness_gymhouse_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'fitness_gymhouse_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'fitness-gymhouse' ),
	    'description' => __( 'Description of what this panel does.', 'fitness-gymhouse' ),
	) );

	// font array
	$font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' => 'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' => 'Bree Serif',
        'BenchNine' => 'BenchNine', 
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Cherry Swash' => 'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' => 'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee', 
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' => 'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' => 'Lato',
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather', 
        'Monda' => 'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron', 
        'Patua One' => 'Patua One', 
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk', 
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display', 
        'PT Sans' => 'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' => 'Poiret One', 
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' => 'Quattrocento Sans', 
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Source Sans Pro' => 'Source Sans Pro', 
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light', 
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand', 
        'Tangerine' => 'Tangerine',
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round', 
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    );
    
	//Typography
	$wp_customize->add_section( 'fitness_gymhouse_typography', array(
    	'title'      => __( 'Color / Fonts Settings', 'fitness-gymhouse' ),
		'priority'   => 30,
		'panel' => 'fitness_gymhouse_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'fitness_gymhouse_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitness_gymhouse_paragraph_color', array(
		'label' => __('Paragraph Color', 'fitness-gymhouse'),
		'section' => 'fitness_gymhouse_typography',
		'settings' => 'fitness_gymhouse_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('fitness_gymhouse_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'fitness_gymhouse_sanitize_choices'
	));
	$wp_customize->add_control(
	    'fitness_gymhouse_paragraph_font_family', array(
	    'section'  => 'fitness_gymhouse_typography',
	    'label'    => __( 'Paragraph Fonts','fitness-gymhouse'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('fitness_gymhouse_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fitness_gymhouse_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','fitness-gymhouse'),
		'section'	=> 'fitness_gymhouse_typography',
		'setting'	=> 'fitness_gymhouse_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'fitness_gymhouse_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitness_gymhouse_atag_color', array(
		'label' => __('"a" Tag Color', 'fitness-gymhouse'),
		'section' => 'fitness_gymhouse_typography',
		'settings' => 'fitness_gymhouse_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('fitness_gymhouse_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'fitness_gymhouse_sanitize_choices'
	));
	$wp_customize->add_control(
	    'fitness_gymhouse_atag_font_family', array(
	    'section'  => 'fitness_gymhouse_typography',
	    'label'    => __( '"a" Tag Fonts','fitness-gymhouse'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'fitness_gymhouse_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitness_gymhouse_li_color', array(
		'label' => __('"li" Tag Color', 'fitness-gymhouse'),
		'section' => 'fitness_gymhouse_typography',
		'settings' => 'fitness_gymhouse_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('fitness_gymhouse_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'fitness_gymhouse_sanitize_choices'
	));
	$wp_customize->add_control(
	    'fitness_gymhouse_li_font_family', array(
	    'section'  => 'fitness_gymhouse_typography',
	    'label'    => __( '"li" Tag Fonts','fitness-gymhouse'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'fitness_gymhouse_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitness_gymhouse_h1_color', array(
		'label' => __('H1 Color', 'fitness-gymhouse'),
		'section' => 'fitness_gymhouse_typography',
		'settings' => 'fitness_gymhouse_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('fitness_gymhouse_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'fitness_gymhouse_sanitize_choices'
	));
	$wp_customize->add_control(
	    'fitness_gymhouse_h1_font_family', array(
	    'section'  => 'fitness_gymhouse_typography',
	    'label'    => __( 'H1 Fonts','fitness-gymhouse'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('fitness_gymhouse_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fitness_gymhouse_h1_font_size',array(
		'label'	=> __('H1 Font Size','fitness-gymhouse'),
		'section'	=> 'fitness_gymhouse_typography',
		'setting'	=> 'fitness_gymhouse_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'fitness_gymhouse_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitness_gymhouse_h2_color', array(
		'label' => __('h2 Color', 'fitness-gymhouse'),
		'section' => 'fitness_gymhouse_typography',
		'settings' => 'fitness_gymhouse_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('fitness_gymhouse_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'fitness_gymhouse_sanitize_choices'
	));
	$wp_customize->add_control(
	    'fitness_gymhouse_h2_font_family', array(
	    'section'  => 'fitness_gymhouse_typography',
	    'label'    => __( 'h2 Fonts','fitness-gymhouse'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('fitness_gymhouse_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fitness_gymhouse_h2_font_size',array(
		'label'	=> __('h2 Font Size','fitness-gymhouse'),
		'section'	=> 'fitness_gymhouse_typography',
		'setting'	=> 'fitness_gymhouse_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'fitness_gymhouse_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitness_gymhouse_h3_color', array(
		'label' => __('h3 Color', 'fitness-gymhouse'),
		'section' => 'fitness_gymhouse_typography',
		'settings' => 'fitness_gymhouse_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('fitness_gymhouse_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'fitness_gymhouse_sanitize_choices'
	));
	$wp_customize->add_control(
	    'fitness_gymhouse_h3_font_family', array(
	    'section'  => 'fitness_gymhouse_typography',
	    'label'    => __( 'h3 Fonts','fitness-gymhouse'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('fitness_gymhouse_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fitness_gymhouse_h3_font_size',array(
		'label'	=> __('h3 Font Size','fitness-gymhouse'),
		'section'	=> 'fitness_gymhouse_typography',
		'setting'	=> 'fitness_gymhouse_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'fitness_gymhouse_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitness_gymhouse_h4_color', array(
		'label' => __('h4 Color', 'fitness-gymhouse'),
		'section' => 'fitness_gymhouse_typography',
		'settings' => 'fitness_gymhouse_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('fitness_gymhouse_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'fitness_gymhouse_sanitize_choices'
	));
	$wp_customize->add_control(
	    'fitness_gymhouse_h4_font_family', array(
	    'section'  => 'fitness_gymhouse_typography',
	    'label'    => __( 'h4 Fonts','fitness-gymhouse'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('fitness_gymhouse_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fitness_gymhouse_h4_font_size',array(
		'label'	=> __('h4 Font Size','fitness-gymhouse'),
		'section'	=> 'fitness_gymhouse_typography',
		'setting'	=> 'fitness_gymhouse_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'fitness_gymhouse_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitness_gymhouse_h5_color', array(
		'label' => __('h5 Color', 'fitness-gymhouse'),
		'section' => 'fitness_gymhouse_typography',
		'settings' => 'fitness_gymhouse_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('fitness_gymhouse_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'fitness_gymhouse_sanitize_choices'
	));
	$wp_customize->add_control(
	    'fitness_gymhouse_h5_font_family', array(
	    'section'  => 'fitness_gymhouse_typography',
	    'label'    => __( 'h5 Fonts','fitness-gymhouse'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('fitness_gymhouse_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fitness_gymhouse_h5_font_size',array(
		'label'	=> __('h5 Font Size','fitness-gymhouse'),
		'section'	=> 'fitness_gymhouse_typography',
		'setting'	=> 'fitness_gymhouse_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'fitness_gymhouse_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitness_gymhouse_h6_color', array(
		'label' => __('h6 Color', 'fitness-gymhouse'),
		'section' => 'fitness_gymhouse_typography',
		'settings' => 'fitness_gymhouse_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('fitness_gymhouse_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'fitness_gymhouse_sanitize_choices'
	));
	$wp_customize->add_control(
	    'fitness_gymhouse_h6_font_family', array(
	    'section'  => 'fitness_gymhouse_typography',
	    'label'    => __( 'h6 Fonts','fitness-gymhouse'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('fitness_gymhouse_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fitness_gymhouse_h6_font_size',array(
		'label'	=> __('h6 Font Size','fitness-gymhouse'),
		'section'	=> 'fitness_gymhouse_typography',
		'setting'	=> 'fitness_gymhouse_h6_font_size',
		'type'	=> 'text'
	));

	// Add the Global Color typography section.
	$wp_customize->add_section( 'fitness_gymhouse_theme_color_option', array( 
		'panel' => 'fitness_gymhouse_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'fitness-gymhouse' )
	) );

  	$wp_customize->add_setting( 'fitness_gymhouse_theme_color_1', array(
	    'default' => '#554c86',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitness_gymhouse_theme_color_1', array(
  		'label' => __( 'Color Option', 'fitness-gymhouse' ),
	    'description' => __('One can change complete theme color on just one click.', 'fitness-gymhouse'),
	    'section' => 'fitness_gymhouse_theme_color_option',
	    'settings' => 'fitness_gymhouse_theme_color_1',
  	)));

  	$wp_customize->add_setting( 'fitness_gymhouse_theme_color_2', array(
	    'default' => '#e21b58',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitness_gymhouse_theme_color_2', array(
  		'label' =>__( 'Color Option', 'fitness-gymhouse' ),
	    'description' => __('One can change complete theme color on just one click.', 'fitness-gymhouse'),
	    'section' => 'fitness_gymhouse_theme_color_option',
	    'settings' => 'fitness_gymhouse_theme_color_2',
  	)));

	$wp_customize->add_section( 'fitness_gymhouse_general_option', array(
    	'title'      => __( 'Sidebar Settings', 'fitness-gymhouse' ),
		'priority'   => 30,
		'panel' => 'fitness_gymhouse_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('fitness_gymhouse_layout_settings',array(
        'default' => __('Right Sidebar','fitness-gymhouse'),
        'sanitize_callback' => 'fitness_gymhouse_sanitize_choices'	        
	));
	$wp_customize->add_control('fitness_gymhouse_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Layouts', 'fitness-gymhouse'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'fitness-gymhouse'),
        	'section' => 'fitness_gymhouse_general_option',
        	'choices' => array(
            'Left Sidebar' => __('Left Sidebar','fitness-gymhouse'),
            'Right Sidebar' => __('Right Sidebar','fitness-gymhouse'),
            'One Column' => __('One Column','fitness-gymhouse'),
            'Three Columns' => __('Three Columns','fitness-gymhouse'),
            'Four Columns' => __('Four Columns','fitness-gymhouse'),
            'Grid Layout' => __('Grid Layout','fitness-gymhouse')
        ),
	));	

	//Topbar section
	$wp_customize->add_section('fitness_gymhouse_topbar',array(
		'title'	=> __('Topbar Section','fitness-gymhouse'),
		'label' => __('Contact Details', 'fitness-gymhouse'),
		'description' => __('Here you can add email address, phone number and timings.','fitness-gymhouse'),
		'priority'	=> null,
		'panel' => 'fitness_gymhouse_panel_id',
	));

	$wp_customize->add_setting('fitness_gymhouse_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('fitness_gymhouse_contact',array(
		'label'	=> __('Add Phone Number','fitness-gymhouse'),
		'section'	=> 'fitness_gymhouse_topbar',
		'setting'	=> 'fitness_gymhouse_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('fitness_gymhouse_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('fitness_gymhouse_email',array(
		'label'	=> __('Add Email Address','fitness-gymhouse'),
		'section'	=> 'fitness_gymhouse_topbar',
		'setting'	=> 'fitness_gymhouse_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('fitness_gymhouse_timming',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('fitness_gymhouse_timming',array(
		'label'	=> __('Add Time','fitness-gymhouse'),
		'section'	=> 'fitness_gymhouse_topbar',
		'setting'	=> 'fitness_gymhouse_timming',
		'type'		=> 'text'
	));

	//home page slider
	$wp_customize->add_section( 'fitness_gymhouse_slider' , array(
    	'title'      => __( 'Slider Section', 'fitness-gymhouse' ),
    	'label'     => __('Slider Settings', 'fitness-gymhouse'),
    	'description'	=> __('Here you can select pages which you have created for slider.','fitness-gymhouse'),
		'priority'   => null,
		'panel' => 'fitness_gymhouse_panel_id'
	) );

	$wp_customize->add_setting('fitness_gymhouse_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('fitness_gymhouse_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','fitness-gymhouse'),
       'section' => 'fitness_gymhouse_slider',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'fitness_gymhouse_slide_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'fitness_gymhouse_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'fitness_gymhouse_slide_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'fitness-gymhouse' ),
			'section'  => 'fitness_gymhouse_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//About
	$wp_customize->add_section('fitness_gymhouse_about_section',array(
		'title'	=> __('About Section','fitness-gymhouse'),
		'label'     => __('About Us', 'fitness-gymhouse'),
		'description'	=> __('Here you can select post which you have created for About section.','fitness-gymhouse'),
		'panel' => 'fitness_gymhouse_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	$posts[]='Select';	
	foreach($post_list as $post){
	$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('fitness_gymhouse_about',array(
		'sanitize_callback' => 'fitness_gymhouse_sanitize_choices',
	));
	$wp_customize->add_control('fitness_gymhouse_about',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','fitness-gymhouse'),
		'section' => 'fitness_gymhouse_about_section',
	));

	//Footer
	$wp_customize->add_section( 'fitness_gymhouse_footer' , array(
    	'title'      => __( 'Footer Text', 'fitness-gymhouse' ),
    	'description'	=> __('Here you can add copyright text.','fitness-gymhouse'),
		'priority'   => null,
		'panel' => 'fitness_gymhouse_panel_id'
	) );

	$wp_customize->add_setting('fitness_gymhouse_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fitness_gymhouse_footer_text',array(
		'label'	=> __('Add Copyright Text','fitness-gymhouse'),
		'section'	=> 'fitness_gymhouse_footer',
		'setting'	=> 'fitness_gymhouse_footer_text',
		'type'		=> 'text'
	));


	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'fitness_gymhouse_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'fitness_gymhouse_customize_partial_blogdescription',
	) );
	
}
add_action( 'customize_register', 'fitness_gymhouse_customize_register' );


/**
 * Render the site title for the selective refresh partial.
 *
 * @since Fitness Gymhouse 1.0
 * @see fitness-gymhouse_customize_register()
 *
 * @return void
 */
function fitness_gymhouse_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Fitness Gymhouse 1.0
 * @see fitness-gymhouse_customize_register()
 *
 * @return void
 */
function fitness_gymhouse_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function fitness_gymhouse_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'footer-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Fitness_Gymhouse_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Fitness_Gymhouse_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
		 	new Fitness_Gymhouse_Customize_Section_Pro(
				$manager,
		 		'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Fitness Gymhouse Pro', 'fitness-gymhouse' ),
					'pro_text' => esc_html__( 'Go Pro', 'fitness-gymhouse' ),
					'pro_url'  => esc_url('https://www.themeseye.com/wordpress/premium-fitness-wordpress-theme/')
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'fitness-gymhouse-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'fitness-gymhouse-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Fitness_Gymhouse_Customize::get_instance();