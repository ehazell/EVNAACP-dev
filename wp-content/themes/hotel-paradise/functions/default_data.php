<?php 
function hotel_paradise_data(){
	$startdata = array(
		'switcher_hide'=> true,
		
		'header_tb_hide' => false,
		'header_tb_icon1'=> 'fa-map',
		'header_tb_text1'=> '1750 East 4th Street Santa Ana',
		'header_tb_icon2'=> 'fa-phone',
		'header_tb_text2'=> '657-328-6000',
		'header_facebook_link'=> '#',
		'header_twitter_link'=> '#',
		'header_linkedin_link'=> '#',
		'header_googleplus_link'=> '#',
		'header_skype_link'=> '#',
		
		'hide_preloader' => false,
		'preloader_speed' => 0,
		'theme_color'=> '#85D13D',
		'theme_color_custom_show'=> false,
		'theme_color_custom_color'=> '#85D13D',
		'site_layout'=> false,
		'nav_padding'=> 18,	
		'primary_sidebar'=> 'right',
		'animation_effect_hide'=> false,
		'google_fonts_hide'=> false,
		'single_image_hide'=> false,
		'single_meta_hide'=> false,
		'btt_disable' => false,
		'copyright' => esc_html__('Copyright 2019, WordPress Theme theme by Redfoxthemes','hotel-paradise'),
		'footer_logo_image' => '',
		'papal_icon_hide' => false,
		'stripe_icon_hide' => false,
		'visa_icon_hide' => false,
		'mc_icon_hide' => false,
		'ae_icon_hide' => false,
		
		'hero_section_hide' => false,
		'hero_animation_type' => 'slide',
		'hero_speed' => 3000,
		'hero_media' => '',
		'hero_largetext' => '',
		'hero_large_effect' => 'zoomIn',		
		'hero_smalltext' => '',
		'hero_small_effect' => 'zoomIn',
		'hero_btn_text' => '',
		'hero_btn_link' => '#',
		'hero_btn_effect' => 'rotateIn',

		'service_s_hide' => false,
		'service_s_column' => 4,
		'service_s_title' => '',
		'service_s_subtitle' => '',
		'service_s_content' => '',
		'service_s_bgcolor' => '#162541',
		'service_s_bgimage' => '',
		
		'room_s_hide' => false,
		'room_s_column' => 4,
		'room_s_title' => '',
		'room_s_subtitle' => '',
		'room_s_content' => '',
		'room_s_bgcolor' => '#ffffff',
		'room_s_bgimage' => '',
		
		
		'blog_s_hide' => false,
		'blog_s_title' => '',
		'blog_s_subtitle' => '',
		'blog_s_noofshow' => 4,
		'blog_s_orderby' => 0,
		'blog_s_order' => 'desc',
		'blog_s_cat' => 0,
		'blog_s_bgcolor' => '#ffffff',
		'blog_s_bgimage' => '',
		
		'contact_s_hide' => false,
		'contact_s_map_html' => '',
		'contact_s_address' => '',
		'contact_s_phone' => '',
		'contact_s_email' => '',
		'contact_s_bgcolor' => '',
		'contact_s_bgimage' => '',
		
		'subheader_hide'=> false,
		'subheader_p_top'=> 80,
		'subheader_p_bottom'=> 80,
		'subheader_color'=> '',
		'subheader_align'=> 'center',
		'subheader_overlay_bg'=> '',
		
		'footer_logo'=> '',
		'footer_menu_hide'=> false,
		'footer_bttopBtn_hide'=> false,
		'footer_w_bg_color'=> '',
		'footer_w_t_color'=> '',
		'footer_w_l_color'=> '',
		'footer_w_l_h_color'=> '',
		'footer_widget_hide'=> false,
		'footer_bg_color'=> '',
		'footer_t_color'=> '',
		'footer_l_color'=> '',
		'footer_l_h_color'=> '',
		
		'ap_section_hide' => false,
		'ap_section_title' => '',
		'ap_section_contents' => '',
		
		'p_fontsize' => '',
		'm_fontsize' => '',
		'h1_fontsize' => '',
		'h2_fontsize' => '',
		'h3_fontsize' => '',
		'h4_fontsize' => '',
		'h5_fontsize' => '',
		'h6_fontsize' => '',
	);

	$startdata = apply_filters('hotel_paradise_default_data',$startdata);
	return $startdata;
}
?>