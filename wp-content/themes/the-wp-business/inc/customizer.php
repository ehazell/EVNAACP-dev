<?php
/**
 * The WP Business Theme Customizer
 *
 * @package The WP Business
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function the_wp_business_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'the_wp_business_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'TG Settings', 'the-wp-business' ),
	    'description' => __( 'Description of what this panel does.', 'the-wp-business' ),
	) );

	//Layouts
	$wp_customize->add_section( 'the_wp_business_left_right', array(
    	'title'      => __( 'Layout Settings', 'the-wp-business' ),
		'priority'   => 30,
		'panel' => 'the_wp_business_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('the_wp_business_theme_options',array(
	        'default' => __('Right Sidebar','the-wp-business'),
	        'sanitize_callback' => 'the_wp_business_sanitize_choices'
	    )
    );

	$wp_customize->add_control('the_wp_business_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Do you want this section','the-wp-business'),
	        'section' => 'the_wp_business_left_right',
	        'choices' => array(
	        	'One Column' => __('One Column','the-wp-business'),
	            'Three Columns' => __('Three Columns','the-wp-business'),
	            'Four Columns' => __('Four Columns','the-wp-business'),
	            'Left Sidebar' => __('Left Sidebar','the-wp-business'),
	            'Right Sidebar' => __('Right Sidebar','the-wp-business'),
	          	'Grid Layout' => __('Grid Layout','the-wp-business')
	        ),
	    )
    );

    $font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );


	//Typography
	$wp_customize->add_section( 'the_wp_business_typography', array(
    	'title'      => __( 'Typography', 'the-wp-business' ),
		'priority'   => 30,
		'panel' => 'the_wp_business_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'the_wp_business_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_paragraph_color', array(
		'label' => __('Paragraph Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_paragraph_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( 'Paragraph Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('the_wp_business_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('the_wp_business_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_typography',
		'setting'	=> 'the_wp_business_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'the_wp_business_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_atag_color', array(
		'label' => __('"a" Tag Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_atag_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( '"a" Tag Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'the_wp_business_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_li_color', array(
		'label' => __('"li" Tag Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_li_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( '"li" Tag Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'the_wp_business_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_h1_color', array(
		'label' => __('H1 Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_h1_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( 'H1 Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('the_wp_business_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_h1_font_size',array(
		'label'	=> __('H1 Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_typography',
		'setting'	=> 'the_wp_business_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'the_wp_business_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_h2_color', array(
		'label' => __('H2 Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_h2_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( 'H2 Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('the_wp_business_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_wp_business_h2_font_size',array(
		'label'	=> __('H2 Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_typography',
		'setting'	=> 'the_wp_business_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'the_wp_business_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_h3_color', array(
		'label' => __('H3 Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_h3_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( 'H3 Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('the_wp_business_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_h3_font_size',array(
		'label'	=> __('H3 Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_typography',
		'setting'	=> 'the_wp_business_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'the_wp_business_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_h4_color', array(
		'label' => __('H4 Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_h4_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( 'H4 Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('the_wp_business_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_wp_business_h4_font_size',array(
		'label'	=> __('H4 Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_typography',
		'setting'	=> 'the_wp_business_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'the_wp_business_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_h5_color', array(
		'label' => __('H5 Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_h5_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( 'H5 Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('the_wp_business_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_h5_font_size',array(
		'label'	=> __('H5 Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_typography',
		'setting'	=> 'the_wp_business_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'the_wp_business_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_h6_color', array(
		'label' => __('H6 Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_h6_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( 'H6 Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('the_wp_business_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_h6_font_size',array(
		'label'	=> __('H6 Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_typography',
		'setting'	=> 'the_wp_business_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('the_wp_business_topbar_icon',array(
		'title'	=> __('Topbar Section','the-wp-business'),
		'description'	=> __('Add Header Content here','the-wp-business'),
		'priority'	=> null,
		'panel' => 'the_wp_business_panel_id',
	));

	$wp_customize->add_setting('the_wp_business_contact_corporate',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_contact_corporate',array(
		'label'	=> __('Add Phone Number','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_icon',
		'setting'	=> 'the_wp_business_contact_corporate',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('the_wp_business_email_corporate',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_email_corporate',array(
		'label'	=> __('Add Email','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_icon',
		'setting'	=> 'the_wp_business_email_corporate',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('the_wp_business_button_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_button_text',array(
		'label'	=> __('Add Button Text','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_icon',
		'setting'	=> 'the_wp_business_button_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('the_wp_business_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_button_url',array(
		'label'	=> __('Add Button Url','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_icon',
		'setting'	=> 'the_wp_business_button_url',
		'type'		=> 'text'
	));

	//Social Icons(topbar)
	$wp_customize->add_section('the_wp_business_topbar_header',array(
		'title'	=> __('Social Icon Section','the-wp-business'),
		'description'	=> __('Add Header Content here','the-wp-business'),
		'priority'	=> null,
		'panel' => 'the_wp_business_panel_id',
	));

	$wp_customize->add_setting('the_wp_business_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_wp_business_youtube_url',array(
		'label'	=> __('Add Youtube link','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_header',
		'setting'	=> 'the_wp_business_youtube_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('the_wp_business_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_wp_business_facebook_url',array(
		'label'	=> __('Add Facebook link','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_header',
		'setting'	=> 'the_wp_business_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('the_wp_business_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_wp_business_twitter_url',array(
		'label'	=> __('Add Twitter link','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_header',
		'setting'	=> 'the_wp_business_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('the_wp_business_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_wp_business_rss_url',array(
		'label'	=> __('Add RSS link','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_header',
		'setting'	=> 'the_wp_business_rss_url',
		'type'	=> 'url'
	));



	//home page slider
	$wp_customize->add_section( 'the_wp_business_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'the-wp-business' ),
		'priority'   => 30,
		'panel' => 'the_wp_business_panel_id'
	) );

	$wp_customize->add_setting('the_wp_business_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','the-wp-business'),
       'section' => 'the_wp_business_slidersettings'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'the_wp_business_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'the_wp_business_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'the_wp_business_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'the-wp-business' ),
			'section'  => 'the_wp_business_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//we think
	$wp_customize->add_section('the_wp_business_wethink',array(
		'title'	=> __('We Think Section','the-wp-business'),
		'description'	=> __('Add We Think sections below.','the-wp-business'),
		'panel' => 'the_wp_business_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('the_wp_business_wethink_post_setting',array(
		'sanitize_callback' => 'the_wp_business_sanitize_choices',
	));

	$wp_customize->add_control('the_wp_business_wethink_post_setting',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','the-wp-business'),
		'section' => 'the_wp_business_wethink',
	));

	$wp_customize->add_section('the_wp_business_footer_section',array(
		'title'	=> __('Footer Text','the-wp-business'),
		'description'	=> '',
		'priority'	=> null,
		'panel' => 'the_wp_business_panel_id',
	));
	
	$wp_customize->add_setting('the_wp_business_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('the_wp_business_footer_copy',array(
		'label'	=> __('Copyright Text','the-wp-business'),
		'section'	=> 'the_wp_business_footer_section',
		'type'		=> 'textarea'
	));
	
}
add_action( 'customize_register', 'the_wp_business_customize_register' );	


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class The_WP_Business_Customize {

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
		$manager->register_section_type( 'The_WP_Business_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new The_WP_Business_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'	=> 9,
					'title'    => esc_html__( 'Upgrade to Pro', 'the-wp-business' ),
					'pro_text' => esc_html__( 'Go Pro', 'the-wp-business' ),
					'pro_url'  => esc_url( 'https://www.themesglance.com/premium/business-wordpress-theme/' ),
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

		wp_enqueue_script( 'the-wp-business-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'the-wp-business-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
The_WP_Business_Customize::get_instance();