<?php
/**
 * edulite Theme Customizer
 *
 * @package edulite
 */


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function edulite_customize_register( $wp_customize ) {
	
	 class edulite_theme_info_text extends WP_Customize_Control{
        public function render_content(){  ?>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>
            <?php if($this->description){ ?>
                <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php }
        }
    }
	
	// edulite theme choice options
    if (!function_exists('edulite_section_choice_option')) :
        function edulite_section_choice_option()
        {
            $edulite_section_choice_option = array(
                'show' => esc_html__('Show', 'edulite'),
                'hide' => esc_html__('Hide', 'edulite')
            );
            return apply_filters('edulite_section_choice_option', $edulite_section_choice_option);
        }
    endif;


    if (!function_exists('edulite_column_layout_option')) :
        function edulite_column_layout_option()
        {
            $edulite_column_layout_option = array(
                '6' => esc_html__('2 Column Layout', 'edulite'),
                '4' => esc_html__('3 Column Layout', 'edulite'),
                '3' => esc_html__('4 Column Layout', 'edulite'),
            );
            return apply_filters('edulite_column_layout_option', $edulite_column_layout_option);
        }
    endif;



    /**
     * Sanitizing the select callback example
     *
    */
    if ( !function_exists('edulite_sanitize_select') ) :
        function edulite_sanitize_select( $input, $setting ) {

            // Ensure input is a slug.
            $input = sanitize_text_field( $input );

            // Get list of choices from the control associated with the setting.
            $choices = $setting->manager->get_control( $setting->id )->choices;

                // If the input is a valid key, return it; otherwise, return the default.
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
        }
    endif;


    if ( !function_exists('edulite_column_layout_sanitize_select') ) :
        function edulite_column_layout_sanitize_select( $input, $setting ) {

            // Ensure input is a slug.
            $input = sanitize_text_field( $input );

            // Get list of choices from the control associated with the setting.
            $choices = $setting->manager->get_control( $setting->id )->choices;

            // If the input is a valid key, return it; otherwise, return the default.
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
        }
    endif;
    
    /**
     * Drop-down Pages sanitization callback example.
     *
     * - Sanitization: dropdown-pages
     * - Control: dropdown-pages
     * 
     * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
     * as an absolute integer, and then validates that $input is the ID of a published page.
     * 
     * @see absint() https://developer.wordpress.org/reference/functions/absint/
     * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
     *
     * @param int                  $page    Page ID.
     * @param WP_Customize_Setting $setting Setting instance.
     * @return int|string Page ID if the page is published; otherwise, the setting default.
     */

    function edulite_sanitize_dropdown_pages( $page_id, $setting ) {
        // Ensure $input is an absolute integer.
        $page_id = absint( $page_id );
    
        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
    }

$wp_customize->add_section('edulite-footer_info', 
          array(
              'title'   => esc_html__('Footer Option', 'edulite'),
              'description' => '',
              'priority'    => 3
          )
      );
    
    $wp_customize->add_setting('edulite_footer_section_hideshow',
          array(
              'default' => 'hide',
              'sanitize_callback' => 'edulite_sanitize_select',
          )
      );

      $edulite_footer_section_hide_show_option = edulite_section_choice_option();
    
      $wp_customize->add_control('edulite_footer_section_hideshow',
          array(
              'type' => 'radio',
              'label' => esc_html__('Footer Option', 'edulite'),
              'description' => esc_html__('Show/hide option for Footer Section.', 'edulite'),
              'section' => 'edulite-footer_info',
              'choices' => $edulite_footer_section_hide_show_option,
              'priority' => 1
          )
      );

    $wp_customize->add_setting('edulite-footer_title', 
          array(
              'default'   => '',
              'type'      => 'theme_mod',
            'sanitize_callback' => 'wp_kses_post'
          )
      );

    $wp_customize->add_control('edulite-footer_title', 
        array(
            'label'   => esc_html__('Copyright', 'edulite'),
            'section' => 'edulite-footer_info',
            'type'      => 'textarea',
            'priority'  => 1
        )
    );
    


	
    /** Front Page Section Settings starts **/	

    $wp_customize->add_panel('frontpage', 
        array(
            'title'       => esc_html__('edulite Options', 'edulite'),        
		    'description' => '',                                        
		     'priority'   => 3,
        )
    );
	



 $wp_customize->add_section('edulite_header_social_link', 
        array(
            'title'       => esc_html__('Home social Icon Section', 'edulite'),
            'description' => '',
            'priority'    => 10
        )
    );
  
    $wp_customize->add_setting(
    'edulite_header_social_section_hideshow',
    array(
        'default'           => 'hide',
        'sanitize_callback' => 'edulite_sanitize_select',
    )
    );

    $edulite_header_social_section_hideshow = edulite_section_choice_option();

    $wp_customize->add_control('edulite_header_social_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('header Option', 'edulite'),
            'description' => esc_html__('Show/hide option for social Icon Section.', 'edulite'),
            'section'     => 'edulite_header_social_link',
            'choices'     => $edulite_header_social_section_hideshow,
            'priority'    => 1
        )
    );



 $wp_customize->add_setting(
'edulite_header_social_link_1',
array(

    'default'=>'',
    'type'=>'theme_mod',
    'sanitize_callback'=> 'esc_url_raw'


)
);

$wp_customize->add_control(
'edulite_header_social_link_1',
array(

'label'=>esc_html__('facebook url','edulite'),
'section'=>'edulite_header_social_link',
'priority'=>11
)
);

  
$wp_customize->add_setting(
'edulite_header_social_link_2',
array(

    'default'=>'',
    'type'=>'theme_mod',
    'sanitize_callback'=> 'esc_url_raw'


)
);

$wp_customize->add_control(
'edulite_header_social_link_2',
array(

'label'=>esc_html__('instagram url','edulite'),
'section'=>'edulite_header_social_link',
'priority'=>11
)
);

$wp_customize->add_setting(
'edulite_header_social_link_3',
array(

    'default'=>'',
    'type'=>'theme_mod',
    'sanitize_callback'=> 'esc_url_raw'


)
);

$wp_customize->add_control(
'edulite_header_social_link_3',
array(

'label'=>esc_html__('twitter url','edulite'),
'section'=>'edulite_header_social_link',
'priority'=>11
)
);

$wp_customize->add_setting(
'edulite_header_social_link_4',
array(

    'default'=>'',
    'type'=>'theme_mod',
    'sanitize_callback'=> 'esc_url_raw'


)
);



$wp_customize->add_control(
'edulite_header_social_link_4',
array(

'label'=>esc_html__('Google+ url','edulite'),
'section'=>'edulite_header_social_link',
'priority'=>11
)
);


    /** Header Section Settings Start **/

  $wp_customize->add_panel('edulite_frontpage', 
        array(
            'title'       => esc_html__('Edulite Options', 'edulite'),        
        'description' => '',                                        
         'priority'   => 3,
        )
    );
  

    /** Header Section Settings Start **/

    $wp_customize->add_section('edulite_header_info', 
        array(
            'title'       => esc_html__('Header Section', 'edulite'),
            'description' => '',
            'panel'       => 'edulite_frontpage',
            'priority'    => 100
        )
    );
  
    $wp_customize->add_setting(
    'edulite_header_section_hideshow',
    array(
        'default'           => 'hide',
        'sanitize_callback' => 'edulite_sanitize_select',
    )
    );

    $edulite_header_section_hide_show_option = edulite_section_choice_option();

    $wp_customize->add_control('edulite_header_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Header Option', 'edulite'),
            'description' => esc_html__('Show/hide option for Header Section.', 'edulite'),
            'section'     => 'edulite_header_info',
            'choices'     => $edulite_header_section_hide_show_option,
            'priority'    => 1
        )
    );
  
  
      $wp_customize->add_setting('edulite_btn_text2',
         array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('edulite_btn_text2',
        array(
            'label'    => esc_html__('Mail Text', 'edulite'),
            'section'  => 'edulite_header_info',
            'priority' => 2
        )
    );  


    $wp_customize->add_setting('edulite_btn_text3',
         array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('edulite_btn_text3',
        array(
            'label'    => esc_html__('Mail Value', 'edulite'),
            'section'  => 'edulite_header_info',
            'priority' => 2
        )
    );  

 $wp_customize->add_setting('edulite_btn_text4',
         array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('edulite_btn_text4',
        array(
            'label'    => esc_html__('Call Text', 'edulite'),
            'section'  => 'edulite_header_info',
            'priority' => 3
        )
    );  

    $wp_customize->add_setting('edulite_btn_text5',
         array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('edulite_btn_text5',
        array(
            'label'    => esc_html__('Call Value', 'edulite'),
            'section'  => 'edulite_header_info',
            'priority' => 3
        )
    );  
  
  
    $wp_customize->add_setting('edulite_btn_url1', 
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );


    $wp_customize->add_control('edulite_btn_url1', 
        array(
            'label'    => esc_html__('Button URL', 'edulite'),
            'section'  => 'edulite_header_info',
            'priority' => 3
        )
    );

    $wp_customize->add_setting('edulite_btn_text1',
         array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('edulite_btn_text1',
        array(
            'label'    => esc_html__('Button Text', 'edulite'),
            'section'  => 'edulite_header_info',
            'priority' => 4
        )
    );  



  
//Image Banner
    $wp_customize->add_section('edulite_image_info', array(
      'title'   => __('Home Banner section', 'edulite'),
      'description' => '',
      'panel' => 'edulite_frontpage',
      'priority'    => 151
    ));
    
    $wp_customize->add_setting(
    'edulite_image_section_hideshow',
    array(
        'default' => 'hide',
        'sanitize_callback' => 'edulite_sanitize_select',
    )
    );
    $edulite_i_section_hide_show_option = edulite_section_choice_option();
    $wp_customize->add_control(
    'edulite_image_section_hideshow',
    array(
        'type' => 'radio',
        'label' => esc_html__('Show/hide option for Image Section.', 'edulite'),
        'description' => '',
        'section' => 'edulite_image_info',
        'choices' => $edulite_i_section_hide_show_option,
        'priority' => 1
    )
    );
    
    $wp_customize->add_setting('edulite_b_image', array(     
    'default'   => '',
    'type'      => 'theme_mod',
    'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'edulite_b_image', array(
      'label'   => __('Image', 'edulite'),
      'section' => 'edulite_image_info',
      'settings' => 'edulite_b_image',
      'priority'  => 2
     )));
    
    $wp_customize->add_setting('edulite_image_heading', array(
     'default'   => '',
      'type'      => 'theme_mod',
      'sanitize_callback'   => 'sanitize_text_field'
    ));

    $wp_customize->add_control('edulite_image_heading', array(
      'label'   => __('Heading', 'edulite'),
      'section' => 'edulite_image_info',
      'priority'  => 4
    )); 
    
    $wp_customize->add_setting('edulite_image_subheading', array(
     'default'   => '',
      'type'      => 'theme_mod',
      'sanitize_callback'   => 'sanitize_text_field'
    ));

    $wp_customize->add_control('edulite_image_subheading', array(
      'label'   => __('Sub Heading', 'edulite'),
      'section' => 'edulite_image_info',
      'priority'  => 4
    ));  
    
    $wp_customize->add_setting('edulite_image_start', array(
      'default'   =>'',
      'type'      => 'theme_mod',
      'sanitize_callback'   => 'sanitize_text_field'
    ));

    $wp_customize->add_control('edulite_image_start', array(
      'label'   => __('Button 1 - Text', 'edulite'),
      'section' => 'edulite_image_info',
      'priority'  => 7
    ));
    
    $wp_customize->add_setting('edulite_image_start_url', array(
     'default'   =>  '',
      'type'      => 'theme_mod',
    'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('edulite_image_start_url', array(
      'label'   => __('Button 1 - URL', 'edulite'),
      'section' => 'edulite_image_info',
      'priority'  => 8
    ));
    
    $wp_customize->add_setting('edulite_image_contact', array(
      'default'   => '',
      'type'      => 'theme_mod',
      'sanitize_callback'   => 'sanitize_text_field'
    ));

    $wp_customize->add_control('edulite_image_contact', array(
      'label'   => __('Button 2 - Text', 'edulite'),
      'section' => 'edulite_image_info',
      'priority'  => 9
    ));
    
    $wp_customize->add_setting('edulite_image_contact_url', array(
    'default'   => '',
      'type'      => 'theme_mod',
    'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('edulite_image_contact_url', array(
      'label'   => __('Button 2 - URL', 'edulite'),
      'section' => 'edulite_image_info',
      'priority'  => 10
    ));

//About

 $wp_customize->add_section('edulite_about_info', array(
      'title'   => __('Home About section', 'edulite'),
      'description' => '',
    'panel' => 'edulite_frontpage',
      'priority'    => 153
    ));
  
  $wp_customize->add_setting(
    'edulite_aboutus_section_hideshow',
    array(
        'default' => 'hide',
        'sanitize_callback' => 'edulite_sanitize_select',
    )
    );
    $edulite_a_section_hide_show_option =edulite_section_choice_option();
    $wp_customize->add_control(
    'edulite_aboutus_section_hideshow',
    array( 
        'type' => 'radio',
        'label' => esc_html__('Show/hide option for About Us Section.', 'edulite'),
        'description' => '',
        'section' => 'edulite_about_info',
        'choices' => $edulite_a_section_hide_show_option,
        'priority' => 1
    )
    );
  
  $about_no = 1;
  for( $i = 1; $i <= $about_no; $i++ ) {
  $edulite_about_page = 'edulite_about_page_' . $i; 
              $edulite_about_btntxt = 'edulite_about_btntxt_' . $i;
            $edulite_about_btnurl = 'edulite_about_btnurl_' .$i;

    $wp_customize->add_setting( $edulite_about_page,
      array(
        'default'           => 1,
        'sanitize_callback' => 'edulite_sanitize_dropdown_pages',
      )
    );

    $wp_customize->add_control( $edulite_about_page,
      array(
        'label'         => esc_html__( 'About Page ', 'edulite' ).$i,
        'section'       => 'edulite_about_info',
        'type'          => 'dropdown-pages',
        'priority'      => 4,
      )
    );

    $wp_customize->add_setting( $edulite_about_btntxt,
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control( $edulite_about_btntxt,
        array(
            'label'        => esc_html__( 'Button - Text','edulite' ),
            'section'      => 'edulite_about_info',
            'type'         => 'text',
            'priority'     => 100,
        )
    );
        
    $wp_customize->add_setting( $edulite_about_btnurl,
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control( $edulite_about_btnurl,
        array(
            'label'       => esc_html__( 'Button - URL', 'edulite' ),
            'section'     => 'edulite_about_info',
            'type'        => 'text',
            'priority'    => 100,
        )
    );
  
  }

$wp_customize->add_section('courses',              
        array(
            'title'       => esc_html__('Home Courses Section', 'edulite'),          
            'description' => '',             
            'panel'       => 'edulite_frontpage',      
            'priority'    => 160,
        )
    );
    
    $wp_customize->add_setting('edulite_courses_section_hideshow',
        array(
            'default'           => 'hide',
            'sanitize_callback' => 'edulite_sanitize_select',
        )
    );

    $edulite_courses_section_hide_show_option = edulite_section_choice_option();

    $wp_customize->add_control(
        'edulite_courses_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('courses Option', 'edulite'),
            'description' => esc_html__('Show/hide option Section.', 'edulite'),
            'section'     => 'courses',
            'choices'     => $edulite_courses_section_hide_show_option,
            'priority'    => 1
        )
    );


    // courses title
    $wp_customize->add_setting('edulite_courses_title', 
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_control('edulite_courses_title',
        array(
           'label'    => esc_html__('Course Title', 'edulite'),
           'section'  => 'courses',
           'priority' => 1
        )
    );

  
    $wp_customize->add_setting('edulite_courses_subtitle',
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_control('edulite_courses_subtitle', 
        array(
           'label'    => esc_html__('Course Description', 'edulite'),
           'section'  => 'courses', 
           'priority' => 4
        )
    );


    // courses 
   
    $course_no = 6;
        for( $i = 1; $i <= $course_no; $i++ ) {
            $edulite_coursepage = 'edulite_course_page_' . $i;
        
   
        
    $wp_customize->add_setting( $edulite_coursepage,
        array(
            'default'           => 1,
            'sanitize_callback' => 'edulite_sanitize_dropdown_pages',
        )
    );

    $wp_customize->add_control( $edulite_coursepage,
        array(
            'label'        => esc_html__( 'Course Page', 'edulite' ) .$i,
            'section'      => 'courses',
            'type'         => 'dropdown-pages',
            'priority'     => 100,
        )
    );
    }
 $wp_customize->add_section(
        'edulite_footer_contact', 
        array(
            'title'   => esc_html__('Home Callout Section', 'edulite'),
            'description' => '',
            'panel' => 'edulite_frontpage',
            'priority'    => 170
        )
    );
    
    $wp_customize->add_setting(
        'edulite_contact_section_hideshow',
        array(
            'default' => 'hide',
            'sanitize_callback' => 'edulite_sanitize_select',
        )
    );

    $edulite_section_choice_option = edulite_section_choice_option();
    $wp_customize->add_control(
        'edulite_contact_section_hideshow',
        array(
            'type' => 'radio',
            'label' => esc_html__('Home Callout', 'edulite'),
            'description' => esc_html__('Show/hide option for Footer Callout Section.', 'edulite'),
            'section' => 'edulite_footer_contact',
            'choices' => $edulite_section_choice_option,
            'priority' => 5
        )
    );

    $wp_customize->add_setting(
        'edulite_heading', 
        array(
            'default'   => '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'edulite_heading', 
        array(
            'label'   => esc_html__('Callout Text', 'edulite'),
            'section' => 'edulite_footer_contact',
            'priority'  => 8
        )
    );

 
    $wp_customize->add_setting(
        'edulite_btn_url', 
        array(
            'default'   =>'',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        'edulite_btn_url', 
        array(
            'label'   => esc_html__('Button URL', 'edulite'),
            'section' => 'edulite_footer_contact',
            'priority'  => 10
        )
    );

    $wp_customize->add_setting(
        'edulite_btn_text', 
        array(
            'default'   => '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'edulite_btn_text', 
        array(
            'label'   => esc_html__('Button Text', 'edulite'),
            'section' => 'edulite_footer_contact',
            'priority'  => 12
        )
    );


 $wp_customize->add_section('edulite_blog_info', 
        array(
            'title'       => esc_html__('Home Blog Section', 'edulite'),
            'description' => '',
            'panel'       => 'edulite_frontpage',
            'priority'    => 180
        )
     );
    
    $wp_customize->add_setting('edulite_blog_section_hideshow',
        array(
            'default'           => 'hide',
            'sanitize_callback' => 'edulite_sanitize_select',
        )
    );

    $edulite_blog_section_hide_show_option = edulite_section_choice_option();

    $wp_customize->add_control('edulite_blog_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Blog Option', 'edulite'),
            'description' => esc_html__('Show/hide option for Blog Section.', 'edulite'),
            'section'     => 'edulite_blog_info',
            'choices'     => $edulite_blog_section_hide_show_option,
            'priority'    => 1
        )
    );
    
    $wp_customize->add_setting('edulite_blog_title', 
         array(
            'default'            => '',
            'type'               => 'theme_mod',
            'sanitize_callback'  => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('edulite_blog_title', 
        array(
            'label'    => esc_html__('Blog Title', 'edulite'),
            'section'  => 'edulite_blog_info',
            'priority' => 1
        )
    );

	/**
	 * Important Link
	*/
	$wp_customize->add_section( 'edulite_implink_section', array(
	  'title'       => esc_html__( 'Important Links', 'edulite' ),
	  'priority'      => 2
	) );

	    $wp_customize->add_setting( 'edulite_imp_links', array(
	      'sanitize_callback' => 'edulite_text_sanitize'
	    ));

	    $wp_customize->add_control( new edulite_theme_info_text( $wp_customize,'edulite_imp_links', array(
	        'settings'    => 'edulite_imp_links',
	        'section'   => 'edulite_implink_section',
	        'description' => '<a class="implink" href="http://www.hubblethemes.com/docs/edulite-documentation/index.html" target="_blank">'.esc_html__('Documentation', 'edulite').'</a><a class="implink" href="http://www.hubblethemes.com/recommends/edulite-premium-details/" target="_blank">'.esc_html__('Live Demo', 'edulite').'</a><a class="implink" href="https://wordpress.org/support/theme/edulite" target="_blank">'.esc_html__('Support Forum', 'edulite').'</a>',
	      )
	    ));

	    $wp_customize->add_setting( 'edulite_rate_us', array(
	      'sanitize_callback' => 'edulite_text_sanitize'
	    ));

	    $wp_customize->add_control( new edulite_theme_info_text( $wp_customize, 'edulite_rate_us', array(
	          'settings'    => 'edulite_rate_us',
	          'section'   => 'edulite_implink_section',
	          'description' => sprintf(__( 'Please do rate our theme if you liked it %1$s', 'edulite'), '<a class="implink" href="https://wordpress.org/support/theme/edulite/reviews/?filter=5" target="_blank">'.esc_html__('Rate/Review','edulite').'</a>' ),
	        )
	    ));

	    $wp_customize->add_setting( 'edulite_setup_instruction', array(
	      'sanitize_callback' => 'edulite_text_sanitize'
	    ));

	    $wp_customize->add_control( new edulite_theme_info_text( $wp_customize, 'edulite_setup_instruction', array(
	        'settings'    => 'edulite_setup_instruction',
	        'section'   => 'edulite_implink_section',
	        'description' => __( '<span class="customize-text_editor_desc">
	        		<h2 class="customize-title">'.esc_html__('Edulite Pro Features','edulite').'</h2>                
                    <ul class="admin-pro-feature-list">   
                        <li><span>'.esc_html__('3 Home Pages','edulite').'</span></li>
                        <li><span>'.esc_html__('25+ Page Layout','edulite').'</span></li>
                        <li><span>'.esc_html__('One Click Demo Import','edulite').'</span></li>
                        <li><span>'.esc_html__('Unlimited theme colors ( Primary Colors)','edulite').'</span></li>
                        <li><span>'.esc_html__('Unlimited sliders Inbuilt sliders','edulite').'</span></li>
                        <li><span>'.esc_html__('Contact Form 7','edulite').'</span></li>
                        <li><span>'.esc_html__('Advanced Typography','edulite').'</span></li>
                        <li><span>'.esc_html__('500+ google fonts','edulite').'</span></li>
                        <li><span>'.esc_html__('Background configuration','edulite').'</span></li>
                        <li><span>'.esc_html__('Pricing Table','edulite').'</span></li>
                        <li><span>'.esc_html__('Highly configurable home page','edulite').'</span></li>
                        <li><span>'.esc_html__('Over 2500 icons','edulite').'</span></li>
                        <li><span>'.esc_html__('Unlimited Teams with team detail','edulite').'</span></li>
                        <li><span>'.esc_html__('Unlimited Services','edulite').'</span></li>
                        <li><span>'.esc_html__('Unlimited projects','edulite').'</span></li>
                        <li><span>'.esc_html__('Masonry projects layout','edulite').'</span></li>
                        <li><span>'.esc_html__('Breadcrumbs Settings','edulite').'</span></li>
                        <li><span>'.esc_html__('15+ Shortcodes','edulite').'</span></li>
                        <li><span>'.esc_html__('Four different blog layouts','edulite').'</span></li>
                        <li><span>'.esc_html__('Boxed Layout','edulite').'</span></li>                        
                        <li><span>'.esc_html__('Responsive retina ready theme','edulite').'</span></li>
                        <li><span>'.esc_html__('3 Page layouts (right sidebar, left sidebar, full width)','edulite').'</span></li>
                        <li><span>'.esc_html__('Fully SEO optimized (schema)','edulite').'</span></li>
                        <li><span>'.esc_html__('Fast loading','edulite').'</span></li>
                        <li><span>'.esc_html__('Premium Priority Support','edulite').'</span></li>
                        <li><span>'.esc_html__('A perfect theme to start your Business website of any kind !!!','edulite').'</span></li>
                    </ul>                    
                    <a href="'.esc_url('http://www.hubblethemes.com/recommends/edulite-premium-details/').'" class="implink" target="_blank">'.esc_html__('Pro Demo','edulite').'</a>
                    <a href="'.esc_url('http://www.hubblethemes.com/recommends/edulite-premium-details/').'" class="implink" target="_blank">'.esc_html__('Buy Now','edulite').'</a>
                </span>', 'edulite'),
	      )
	    ));



}
add_action( 'customize_register', 'edulite_customize_register' );

