<?php
/**
 * Custom CSS for Canuck WordPress Theme
 *
 * This file loads the custom css for the theme
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017-2018  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

/**
 * Simple array for knowing which sections are being loaded to be used in selectively loading custom css.
 */
function canuck_home_selections() {
	$home_area   = array();
	$home_area[] = get_theme_mod( 'canuck_home_area_1', 'none' );
	$home_area[] = get_theme_mod( 'canuck_home_area_2', 'none' );
	$home_area[] = get_theme_mod( 'canuck_home_area_3', 'none' );
	$home_area[] = get_theme_mod( 'canuck_home_area_4', 'none' );
	$home_area[] = get_theme_mod( 'canuck_home_area_5', 'none' );
	$home_area[] = get_theme_mod( 'canuck_home_area_6', 'none' );
	$home_area[] = get_theme_mod( 'canuck_home_area_7', 'none' );
	$home_area[] = get_theme_mod( 'canuck_home_area_8', 'none' );
	$home_area[] = get_theme_mod( 'canuck_home_area_9', 'none' );
	$home_area[] = get_theme_mod( 'canuck_home_area_10', 'none' );
	$home_area[] = get_theme_mod( 'canuck_home_area_11', 'none' );
	$home_area[] = get_theme_mod( 'canuck_home_area_12', 'none' );
	$home_area[] = get_theme_mod( 'canuck_home_area_13', 'none' );
	return $home_area;
}

/**
 * Enqueues front-end CSS for canuck Theme
 * Modified from Twenty Fifteen 1.0.
 *
 * @see wp_add_inline_style() to use this function to append the
 * custom styles to style.css.
 *
 * Bring your options into this function to set up your conditional css.
 */
function canuck_custom_css() {
	// First get the color scheme to allow defaults button hovers.
	$color_scheme = get_theme_mod( 'canuck_color_scheme', 'gray_pink' );
	if ( 'gray-green' === $color_scheme ) {
		$button_hover_default = '#19c143';
	} elseif ( 'gray-red' === $color_scheme ) {
		$button_hover_default = '#f20202';
	} elseif ( 'gray-blue' === $color_scheme ) {
		$button_hover_default = '#16aee5';
	} else {
		$button_hover_default = '#ed1651';
	}
	$ka_css = '';
	// Background-image header logo.
	$custom_logo_id  = get_theme_mod( 'custom_logo', '' );
	$custom_logo     = wp_get_attachment_image_src( $custom_logo_id, 'full' );
	$wp_logo_url     = esc_url( $custom_logo[0] );
	$option_logo_url = esc_url( get_theme_mod( 'canuck_image_header_logo', '' ) );
	$home_feature    = get_theme_mod( 'canuck_home_feature', 'background_image' );
	$blog_feature    = get_theme_mod( 'canuck_blog_feature', 'background_image' );
	// Home background image.
	if ( is_front_page() && 'background_image' === $home_feature ) {
		// Image overlay logo.
		if ( '' !== $option_logo_url ) {
			$ka_css .= '.header-wide-image .header-logo-menu-wide .header-logo-menu-strip .header-image-left a { background-image:url(\'' . $option_logo_url . '\');}' . PHP_EOL;
		} elseif ( '' !== $wp_logo_url ) {
			$ka_css .= '.header-wide-image .header-logo-menu-wide .header-logo-menu-strip .header-image-left a { background-image:url(\'' . $wp_logo_url . '\');}' . PHP_EOL;
		}
		// Sticky logo.
		if ( '' !== $wp_logo_url ) {
			$ka_css .= 'body.sticky .header-wide-image .header-logo-menu-wide .header-logo-menu-strip .header-image-left a { background-image:url(\'' . $wp_logo_url . '\');}' . PHP_EOL;
		}
	}
	// Blog background image.
	if ( is_home() && 'background_image' === $blog_feature ) {
		// Image overlay logo.
		if ( '' !== $option_logo_url ) {
			$ka_css .= '.header-wide-image .header-logo-menu-wide .header-logo-menu-strip .header-image-left a { background-image:url(\'' . $option_logo_url . '\');}' . PHP_EOL;
		} elseif ( '' !== $wp_logo_url ) {
			$ka_css .= '.header-wide-image .header-logo-menu-wide .header-logo-menu-strip .header-image-left a { background-image:url(\'' . $wp_logo_url . '\');}' . PHP_EOL;
		}
		// Sticky logo.
		if ( '' !== $wp_logo_url ) {
			$ka_css .= 'body.sticky .header-wide-image .header-logo-menu-wide .header-logo-menu-strip .header-image-left a { background-image:url(\'' . $wp_logo_url . '\');}' . PHP_EOL;
		}
	}
	// background color.
	$background_color = '#' . esc_html( get_theme_mod( 'background_color', 'ffffff' ) );
	if ( '#' === $background_color ) {
		$background_color = '#ffffff';
	}
	$ka_css .= '.header-wide-no-feature,.header-wide-slider,#page-title-wide,#main-section,#fullwidth { background-color:' . $background_color . '; }';
	// Image header background.
	$image_header_color   = esc_html( get_theme_mod( 'canuck_image_header_background_color', '#000000' ) );
	$image_header_opacity = esc_html( get_theme_mod( 'canuck_image_header_background_opacity', 0.5 ) );
	$ka_css              .= '.header-wide-image { background-color:' . canuck_hex_to_rgba( $image_header_color, $image_header_opacity ) . ';}' . PHP_EOL;
	// Theme fonts.
	$theme_fonts = canuck_fonts();
	if ( 'default' !== $theme_fonts['header']['family'] ) {
		$ka_css .= 'h1, h2, h3, h4, h5, h6, span.title  {font-family:' . $theme_fonts['header']['family'] . ';}' . PHP_EOL;
	}
	if ( 'default' !== $theme_fonts['body']['family'] ) {
		$ka_css .= 'body {font-family:' . $theme_fonts['body']['family'] . ';}' . PHP_EOL;
	}
	if ( 'default' !== $theme_fonts['page']['family'] ) {
		$ka_css .= '#page-title-wide .page-title-wrap h1 {font-family:' . $theme_fonts['page']['family'] . '!important;}' . PHP_EOL;
	}
	// Post galleries
	$use_post_gallery_captions = get_theme_mod( 'canuck_use_post_gallery_captions' ) ? true : false;
	//wp_die($use_post_gallery_captions);
	if ( true === $use_post_gallery_captions ) {
		$ka_css .= '.gallery .gallery-caption{ display: block!important; }';
	} else {
		$ka_css .= '.gallery .gallery-caption{ display: none!important; }';
	}
	// Home page areas, do not insert css if not needed.
	$home_area = canuck_home_selections();
	if ( in_array( 'Section 1', $home_area, true ) ) {
		// Home page Section 1.
		$sec1_bg                = esc_html( get_theme_mod( 'canuck_section1_background_color', '#ffffff' ) );
		$sec1_bg_o              = esc_html( get_theme_mod( 'canuck_section1_background_color_opacity', 1 ) );
		$sec1_bg_image          = esc_url( get_theme_mod( 'canuck_section1_background_image', '' ) );
		$sec1_overlay_opacity   = esc_html( get_theme_mod( 'canuck_section1_overlay_opacity', 0 ) );
		$sec1_text              = esc_html( get_theme_mod( 'canuck_section1_text_color', '#4c4c4c' ) );
		$sec1_button_bg         = esc_html( get_theme_mod( 'canuck_section1_button_background_color', '#ffffff' ) );
		$sec1_button_text       = esc_html( get_theme_mod( 'canuck_section1_button_text_color', $button_hover_default ) );
		$sec1_button_hover_bg   = esc_html( get_theme_mod( 'canuck_section1_button_hover_background_color', $button_hover_default ) );
		$sec1_button_hover_text = esc_html( get_theme_mod( 'canuck_section1_button_hover_text_color', '#ffffff' ) );
		if ( '#19c143' === $sec1_button_hover_bg || '#f20202' === $sec1_button_hover_bg || '#16aee5' === $sec1_button_hover_bg || '#ed1651' === $sec1_button_hover_bg ) {
			$sec1_button_hover_bg = $button_hover_default;
		}
		if ( '#19c143' === $sec1_button_text || '#f20202' === $sec1_button_text || '#16aee5' === $sec1_button_text || '#ed1651' === $sec1_button_text ) {
			$sec1_button_text = $button_hover_default;
		}
		if ( '' !== $sec1_bg_image ) {
			$ka_css .= '.home-1-wide-overlay { background-color: rgba( 0, 0, 0, ' . $sec1_overlay_opacity . '); }' . PHP_EOL;
		} else {
			$ka_css .= '.home-1-wide { background-color:' . canuck_hex_to_rgba( $sec1_bg, $sec1_bg_o ) . ';color: ' . $sec1_text . '; }' . PHP_EOL;
		}
		$ka_css .= '.home-1-wrap { color: ' . $sec1_text . '; opacity: 1; }' . PHP_EOL;
		$ka_css .= '.home-1-button a.button1 { background-color: ' . $sec1_button_bg . ';color: ' . $sec1_button_text . '; border: 1px solid ' . $sec1_button_text . '; }' . PHP_EOL;
		$ka_css .= '.home-1-button a.button1:before { background-color: ' . $sec1_button_hover_bg . '; }' . PHP_EOL;
		$ka_css .= '.home-1-button a.button1:hover { color: ' . $sec1_button_hover_text . '; }' . PHP_EOL;
	}
	if ( in_array( 'Section 2', $home_area, true ) ) {
		// Home page section 2.
		$sec2_bg                = esc_html( get_theme_mod( 'canuck_section2_background_color', '#ffffff' ) );
		$sec2_bg_o              = esc_html( get_theme_mod( 'canuck_section2_background_color_opacity', 1 ) );
		$sec2_bg_image          = esc_url( get_theme_mod( 'canuck_section2_background_image', '' ) );
		$sec2_overlay_opacity   = esc_html( get_theme_mod( 'canuck_section2_overlay_opacity', 0 ) );
		$sec2_text              = esc_html( get_theme_mod( 'canuck_section2_text_color', '#4c4c4c' ) );
		$sec2_button_bg         = esc_html( get_theme_mod( 'canuck_section2_button_background_color', '#ffffff' ) );
		$sec2_button_text       = esc_html( get_theme_mod( 'canuck_section2_button_text_color', $button_hover_default ) );
		$sec2_button_hover_bg   = esc_html( get_theme_mod( 'canuck_section2_button_hover_background_color', $button_hover_default ) );
		$sec2_button_hover_text = esc_html( get_theme_mod( 'canuck_section2_button_hover_text_color', '#ffffff' ) );
		if ( '#19c143' === $sec2_button_hover_bg || '#f20202' === $sec2_button_hover_bg || '#16aee5' === $sec2_button_hover_bg || '#ed1651' === $sec2_button_hover_bg ) {
			$sec2_button_hover_bg = $button_hover_default;
		}
		if ( '#19c143' === $sec2_button_text || '#f20202' === $sec2_button_text || '#16aee5' === $sec2_button_text || '#ed1651' === $sec2_button_text ) {
			$sec2_button_text = $button_hover_default;
		}
		if ( '' !== $sec2_bg_image ) {
			$ka_css .= '.home-2-wide-overlay { background-color: rgba( 0, 0, 0, ' . $sec2_overlay_opacity . '); }' . PHP_EOL;
		} else {
			$ka_css .= '.home-2-wide { background-color:' . canuck_hex_to_rgba( $sec2_bg, $sec2_bg_o ) . ';color: ' . $sec2_text . '; }' . PHP_EOL;
		}
		$ka_css .= '.home-2-wrap { color: ' . $sec2_text . '; opacity: 1; }' . PHP_EOL;
		$ka_css .= '.home-2-button a.button1 { background-color: ' . $sec2_button_bg . '; color: ' . $sec2_button_text . '; border: 1px solid ' . $sec2_button_text . '; }' . PHP_EOL;
		$ka_css .= '.home-2-button a.button1:before { background-color: ' . $sec2_button_hover_bg . '; }' . PHP_EOL;
		$ka_css .= '.home-2-button a.button1:hover { color: ' . $sec2_button_hover_text . '; }' . PHP_EOL;
		$ka_css .= '.section2-linked-fi,.section2-graphic i.no-link { color: ' . $sec2_button_text . ';background-color: ' . $sec2_button_bg . ';border: 2px solid ' . $sec2_button_text . '; }' . PHP_EOL;
		$ka_css .= '.section2-linked-fi:hover{ color: ' . $sec2_button_hover_text . '; background-color: ' . $sec2_button_hover_bg . '; border: 2px solid ' . $sec2_button_hover_bg . '; }' . PHP_EOL;
	}
	if ( in_array( 'Section 3', $home_area, true ) ) {
		// Home page Section 3.
		$sec3_bg                = esc_html( get_theme_mod( 'canuck_section3_background_color', '#ffffff' ) );
		$sec3_bg_o              = esc_html( get_theme_mod( 'canuck_section3_background_color_opacity', 1 ) );
		$sec3_bg_image          = esc_url( get_theme_mod( 'canuck_section3_background_image', '' ) );
		$sec3_overlay_opacity   = esc_html( get_theme_mod( 'canuck_section3_overlay_opacity', 0 ) );
		$sec3_text              = esc_html( get_theme_mod( 'canuck_section3_text_color', '#4c4c4c' ) );
		$sec3_button_bg         = esc_html( get_theme_mod( 'canuck_section3_button_background_color', '#ffffff' ) );
		$sec3_button_text       = esc_html( get_theme_mod( 'canuck_section3_button_text_color', $button_hover_default ) );
		$sec3_button_hover_bg   = esc_html( get_theme_mod( 'canuck_section3_button_hover_background_color', $button_hover_default ) );
		$sec3_button_hover_text = esc_html( get_theme_mod( 'canuck_section3_button_hover_text_color', '#ffffff' ) );
		if ( '#19c143' === $sec3_button_hover_bg || '#f20202' === $sec3_button_hover_bg || '#16aee5' === $sec3_button_hover_bg || '#ed1651' === $sec3_button_hover_bg ) {
			$sec3_button_hover_bg = $button_hover_default;
		}
		if ( '#19c143' === $sec3_button_text || '#f20202' === $sec3_button_text || '#16aee5' === $sec3_button_text || '#ed1651' === $sec3_button_text ) {
			$sec3_button_text = $button_hover_default;
		}
		if ( '' !== $sec3_bg_image ) {
			$ka_css .= '.home-3-wide-overlay { background-color: rgba( 0, 0, 0, ' . $sec3_overlay_opacity . '); }' . PHP_EOL;
		} else {
			$ka_css .= '.home-3-wide { background-color:' . canuck_hex_to_rgba( $sec3_bg, $sec3_bg_o ) . ';color: ' . $sec3_text . '; }' . PHP_EOL;
		}
		$ka_css .= '.home-3-wrap { color: ' . $sec3_text . '; opacity: 1; }' . PHP_EOL;
		$ka_css .= '.home-3-button a.button1 { background-color: ' . $sec3_button_bg . ';color: ' . $sec3_button_text . ';border: 1px solid ' . $sec3_button_text . '; }' . PHP_EOL;
		$ka_css .= '.home-3-button a.button1:before { background-color: ' . $sec3_button_hover_bg . '; }' . PHP_EOL;
		$ka_css .= '.home-3-button a.button1:hover { color: ' . $sec3_button_hover_text . '; }' . PHP_EOL;
	}
	if ( in_array( 'Section 4', $home_area, true ) ) {
		// Home page section 4.
		$sec4_bg                = esc_html( get_theme_mod( 'canuck_section4_background_color', '#ffffff' ) );
		$sec4_bg_o              = esc_html( get_theme_mod( 'canuck_section4_background_color_opacity', 1 ) );
		$sec4_bg_image          = esc_url( get_theme_mod( 'canuck_section4_background_image', '' ) );
		$sec4_overlay_opacity   = esc_html( get_theme_mod( 'canuck_section4_overlay_opacity', 0 ) );
		$sec4_text              = esc_html( get_theme_mod( 'canuck_section4_text_color', '#4c4c4c' ) );
		$sec4_button_bg         = esc_html( get_theme_mod( 'canuck_section4_button_background_color', '#ffffff' ) );
		$sec4_button_text       = esc_html( get_theme_mod( 'canuck_section4_button_text_color', $button_hover_default ) );
		$sec4_button_hover_bg   = esc_html( get_theme_mod( 'canuck_section4_button_hover_background_color', $button_hover_default ) );
		$sec4_button_hover_text = esc_html( get_theme_mod( 'canuck_section4_button_hover_text_color', '#ffffff' ) );
		if ( '#19c143' === $sec4_button_hover_bg || '#f20202' === $sec4_button_hover_bg || '#16aee5' === $sec4_button_hover_bg || '#ed1651' === $sec4_button_hover_bg ) {
			$sec4_button_hover_bg = $button_hover_default;
		}
		if ( '#19c143' === $sec4_button_text || '#f20202' === $sec4_button_text || '#16aee5' === $sec4_button_text || '#ed1651' === $sec4_button_text ) {
			$sec4_button_text = $button_hover_default;
		}
		if ( '' !== $sec4_bg_image ) {
			$ka_css .= '.home-4-wide-overlay { background-color: rgba( 0, 0, 0, ' . $sec4_overlay_opacity . '); }' . PHP_EOL;
		} else {
			$ka_css .= '.home-4-wide { background-color:' . canuck_hex_to_rgba( $sec4_bg, $sec4_bg_o ) . ';color: ' . $sec4_text . '; }' . PHP_EOL;
		}
		$ka_css .= '.home-4-wrap { color: ' . $sec4_text . '; opacity: 1; }' . PHP_EOL;
		$ka_css .= '.home-4-button a.button1 { background-color: ' . $sec4_button_bg . ';color: ' . $sec4_button_text . ';border: 1px solid ' . $sec4_button_text . '; }' . PHP_EOL;
		$ka_css .= '.home-4-button a.button1:before { background-color: ' . $sec4_button_hover_bg . '; }' . PHP_EOL;
		$ka_css .= '.home-4-button a.button1:hover { color: ' . $sec4_button_hover_text . '; }' . PHP_EOL;
		$ka_css .= '.section4-linked-fi,.section4-graphic i.no-link { color: ' . $sec4_button_text . ';background-color: ' . $sec4_button_bg . ';border: 2px solid ' . $sec4_button_text . '; }' . PHP_EOL;
		$ka_css .= '.section4-linked-fi:hover{ color: ' . $sec4_button_hover_text . '; background-color: ' . $sec4_button_hover_bg . '; border: 2px solid ' . $sec4_button_hover_bg . '; }' . PHP_EOL;
	}
	if ( in_array( 'Section 5', $home_area, true ) ) {
		// Home page Section 5.
		$sec5_bg                = esc_html( get_theme_mod( 'canuck_section5_background_color', '#ffffff' ) );
		$sec5_bg_o              = esc_html( get_theme_mod( 'canuck_section5_background_color_opacity', 1 ) );
		$sec5_bg_image          = esc_url( get_theme_mod( 'canuck_section5_background_image', '' ) );
		$sec5_overlay_opacity   = esc_html( get_theme_mod( 'canuck_section5_overlay_opacity', 0 ) );
		$sec5_text              = esc_html( get_theme_mod( 'canuck_section5_text_color', '#4c4c4c' ) );
		$sec5_button_bg         = esc_html( get_theme_mod( 'canuck_section5_button_background_color', '#ffffff' ) );
		$sec5_button_text       = esc_html( get_theme_mod( 'canuck_section5_button_text_color', $button_hover_default ) );
		$sec5_button_hover_bg   = esc_html( get_theme_mod( 'canuck_section5_button_hover_background_color', $button_hover_default ) );
		$sec5_button_hover_text = esc_html( get_theme_mod( 'canuck_section5_button_hover_text_color', '#ffffff' ) );
		if ( '#19c143' === $sec5_button_hover_bg || '#f20202' === $sec5_button_hover_bg || '#16aee5' === $sec5_button_hover_bg || '#ed1651' === $sec5_button_hover_bg ) {
			$sec5_button_hover_bg = $button_hover_default;
		}
		if ( '#19c143' === $sec5_button_text || '#f20202' === $sec5_button_text || '#16aee5' === $sec5_button_text || '#ed1651' === $sec5_button_text ) {
			$sec5_button_text = $button_hover_default;
		}
		if ( '' !== $sec5_bg_image ) {
			$ka_css .= '.home-5-wide-overlay { background-color: rgba( 0, 0, 0, ' . $sec5_overlay_opacity . '); }' . PHP_EOL;
		} else {
			$ka_css .= '.home-5-wide { background-color:' . canuck_hex_to_rgba( $sec5_bg, $sec5_bg_o ) . ';color: ' . $sec5_text . '; }' . PHP_EOL;
		}
		$ka_css .= '.home-5-wrap { color: ' . $sec5_text . '; opacity: 1; }' . PHP_EOL;
		$ka_css .= '.home-5-button a.button1 { background-color: ' . $sec5_button_bg . ';color: ' . $sec5_button_text . ';border: 1px solid ' . $sec5_button_text . '; }' . PHP_EOL;
		$ka_css .= '.home-5-button a.button1:before { background-color: ' . $sec5_button_hover_bg . '; }' . PHP_EOL;
		$ka_css .= '.home-5-button a.button1:hover { color: ' . $sec5_button_hover_text . '; }' . PHP_EOL;
	}
	if ( in_array( 'Section 6', $home_area, true ) ) {
		// Home page section 6.
		$sec6_bg                = esc_html( get_theme_mod( 'canuck_section6_background_color', '#ffffff' ) );
		$sec6_bg_o              = esc_html( get_theme_mod( 'canuck_section6_background_color_opacity', 1 ) );
		$sec6_bg_image          = esc_url( get_theme_mod( 'canuck_section6_background_image', '' ) );
		$sec6_overlay_opacity   = esc_html( get_theme_mod( 'canuck_section6_overlay_opacity', 0 ) );
		$sec6_text              = esc_html( get_theme_mod( 'canuck_section6_text_color', '#4c4c4c' ) );
		$sec6_button_bg         = esc_html( get_theme_mod( 'canuck_section6_button_background_color', '#ffffff' ) );
		$sec6_button_text       = esc_html( get_theme_mod( 'canuck_section6_button_text_color', $button_hover_default ) );
		$sec6_button_hover_bg   = esc_html( get_theme_mod( 'canuck_section6_button_hover_background_color', $button_hover_default ) );
		$sec6_button_hover_text = esc_html( get_theme_mod( 'canuck_section6_button_hover_text_color', '#ffffff' ) );
		if ( '#19c143' === $sec6_button_hover_bg || '#f20202' === $sec6_button_hover_bg || '#16aee5' === $sec6_button_hover_bg || '#ed1651' === $sec6_button_hover_bg ) {
			$sec6_button_hover_bg = $button_hover_default;
		}
		if ( '#19c143' === $sec6_button_text || '#f20202' === $sec6_button_text || '#16aee5' === $sec6_button_text || '#ed1651' === $sec6_button_text ) {
			$sec6_button_text = $button_hover_default;
		}
		if ( '' !== $sec6_bg_image ) {
			$ka_css .= '.home-6-wide-overlay { background-color: rgba( 0, 0, 0, ' . $sec6_overlay_opacity . '); }' . PHP_EOL;
		} else {
			$ka_css .= '.home-6-wide { background-color:' . canuck_hex_to_rgba( $sec6_bg, $sec6_bg_o ) . ';color: ' . $sec6_text . '; }' . PHP_EOL;
		}
		$ka_css .= '.home-6-wrap { color: ' . $sec6_text . '; opacity: 1; }' . PHP_EOL;
		$ka_css .= '.home-6-button a.button1 { background-color: ' . $sec6_button_bg . ';color: ' . $sec6_button_text . ';border: 1px solid ' . $sec6_button_text . '; }' . PHP_EOL;
		$ka_css .= '.home-6-button a.button1:before { background-color: ' . $sec6_button_hover_bg . '; }' . PHP_EOL;
		$ka_css .= '.home-6-button a.button1:hover { color: ' . $sec6_button_hover_text . '; }' . PHP_EOL;
		$ka_css .= '.section6-linked-fi,.section6-graphic i.no-link { color: ' . $sec6_button_text . ';background-color: ' . $sec6_button_bg . ';border: 2px solid ' . $sec6_button_text . '; }' . PHP_EOL;
		$ka_css .= '.section6-linked-fi:hover{ color: ' . $sec6_button_hover_text . '; background-color: ' . $sec6_button_hover_bg . ';border: 2px solid ' . $sec6_button_hover_bg . '; }' . PHP_EOL;
	}
	if ( in_array( 'Section 7', $home_area, true ) ) {
		// Home page Section 7.
		$sec7_bg                = esc_html( get_theme_mod( 'canuck_section7_background_color', '#ffffff' ) );
		$sec7_bg_o              = esc_html( get_theme_mod( 'canuck_section7_background_color_opacity', 1 ) );
		$sec7_bg_image          = esc_url( get_theme_mod( 'canuck_section7_background_image', '' ) );
		$sec7_overlay_opacity   = esc_html( get_theme_mod( 'canuck_section7_overlay_opacity', 0 ) );
		$sec7_text              = esc_html( get_theme_mod( 'canuck_section7_text_color', '#4c4c4c' ) );
		$sec7_button_bg         = esc_html( get_theme_mod( 'canuck_section7_button_background_color', '#ffffff' ) );
		$sec7_button_text       = esc_html( get_theme_mod( 'canuck_section7_button_text_color', $button_hover_default ) );
		$sec7_button_hover_bg   = esc_html( get_theme_mod( 'canuck_section7_button_hover_background_color', $button_hover_default ) );
		$sec7_button_hover_text = esc_html( get_theme_mod( 'canuck_section7_button_hover_text_color', '#ffffff' ) );
		if ( '#19c143' === $sec7_button_hover_bg || '#f20202' === $sec7_button_hover_bg || '#16aee5' === $sec7_button_hover_bg || '#ed1651' === $sec7_button_hover_bg ) {
			$sec7_button_hover_bg = $button_hover_default;
		}
		if ( '#19c143' === $sec7_button_text || '#f20202' === $sec7_button_text || '#16aee5' === $sec7_button_text || '#ed1651' === $sec7_button_text ) {
			$sec7_button_text = $button_hover_default;
		}
		if ( '' !== $sec7_bg_image ) {
			$ka_css .= '.home-7-wide-overlay { background-color: rgba( 0, 0, 0, ' . $sec7_overlay_opacity . '); }' . PHP_EOL;
		} else {
			$ka_css .= '.home-7-wide { background-color:' . canuck_hex_to_rgba( $sec7_bg, $sec7_bg_o ) . ';color: ' . $sec7_text . '; }' . PHP_EOL;
		}
		$ka_css .= '.home-7-wrap { color: ' . $sec7_text . '; opacity: 1; }' . PHP_EOL;
		$ka_css .= '.home-7-button a.button1 { background-color: ' . $sec7_button_bg . ';color: ' . $sec7_button_text . ';border: 1px solid ' . $sec7_button_text . '; }' . PHP_EOL;
		$ka_css .= '.home-7-button a.button1:before { background-color: ' . $sec7_button_hover_bg . '; }' . PHP_EOL;
		$ka_css .= '.home-7-button a.button1:hover { color: ' . $sec7_button_hover_text . '; }' . PHP_EOL;
	}
	if ( in_array( 'Section 8', $home_area, true ) ) {
		// Home page section 8.
		$sec8_bg                = esc_html( get_theme_mod( 'canuck_section8_background_color', '#ffffff' ) );
		$sec8_bg_o              = esc_html( get_theme_mod( 'canuck_section8_background_color_opacity', 1 ) );
		$sec8_bg_image          = esc_url( get_theme_mod( 'canuck_section8_background_image', '' ) );
		$sec8_overlay_opacity   = esc_html( get_theme_mod( 'canuck_section8_overlay_opacity', 0 ) );
		$sec8_text              = esc_html( get_theme_mod( 'canuck_section8_text_color', '#4c4c4c' ) );
		$sec8_button_bg         = esc_html( get_theme_mod( 'canuck_section8_button_background_color', '#ffffff' ) );
		$sec8_button_text       = esc_html( get_theme_mod( 'canuck_section8_button_text_color', $button_hover_default ) );
		$sec8_button_hover_bg   = esc_html( get_theme_mod( 'canuck_section8_button_hover_background_color', $button_hover_default ) );
		$sec8_button_hover_text = esc_html( get_theme_mod( 'canuck_section8_button_hover_text_color', '#ffffff' ) );
		if ( '#19c143' === $sec8_button_hover_bg || '#f20202' === $sec8_button_hover_bg || '#16aee5' === $sec8_button_hover_bg || '#ed1651' === $sec8_button_hover_bg ) {
			$sec8_button_hover_bg = $button_hover_default;
		}
		if ( '#19c143' === $sec8_button_text || '#f20202' === $sec8_button_text || '#16aee5' === $sec8_button_text || '#ed1651' === $sec8_button_text ) {
			$sec8_button_text = $button_hover_default;
		}
		if ( '' !== $sec8_bg_image ) {
			$ka_css .= '.home-8-wide-overlay { background-color: rgba( 0, 0, 0, ' . $sec8_overlay_opacity . '); }' . PHP_EOL;
		} else {
			$ka_css .= '.home-8-wide { background-color:' . canuck_hex_to_rgba( $sec8_bg, $sec8_bg_o ) . ';color: ' . $sec8_text . '; }' . PHP_EOL;
		}
		$ka_css .= '.home-8-wrap { color: ' . $sec8_text . '; opacity: 1; }' . PHP_EOL;
		$ka_css .= '.home-8-button a.button1 { background-color: ' . $sec8_button_bg . ';color: ' . $sec8_button_text . ';border: 1px solid ' . $sec8_button_text . '; }' . PHP_EOL;
		$ka_css .= '.home-8-button a.button1:before { background-color: ' . $sec8_button_hover_bg . '; }' . PHP_EOL;
		$ka_css .= '.home-8-button a.button1:hover { color: ' . $sec8_button_hover_text . '; }' . PHP_EOL;
		$ka_css .= '.section8-linked-fi,.section8-graphic i.no-link { color: ' . $sec8_button_text . ';background-color: ' . $sec8_button_bg . ';border: 2px solid ' . $sec8_button_text . '; }' . PHP_EOL;
		$ka_css .= '.section8-linked-fi:hover{ color: ' . $sec8_button_hover_text . '; background-color: ' . $sec8_button_hover_bg . '; border: 2px solid ' . $sec8_button_hover_bg . '; }' . PHP_EOL;
	}
	if ( in_array( 'Section 9', $home_area, true ) ) {
		// Home page section 9.
		$sec9_bg              = esc_html( get_theme_mod( 'canuck_section9_background_color', '#ffffff' ) );
		$sec9_bg_o            = esc_html( get_theme_mod( 'canuck_section9_background_color_opacity', 1 ) );
		$sec9_bg_image        = esc_url( get_theme_mod( 'canuck_section9_background_image', '' ) );
		$sec9_overlay_opacity = esc_html( get_theme_mod( 'canuck_section9_overlay_opacity', 0 ) );
		$sec9_text            = esc_html( get_theme_mod( 'canuck_section9_text_color', '#4c4c4c' ) );
		if ( '' !== $sec9_bg_image ) {
			$ka_css .= '.home-9-wide-overlay { background-color: rgba( 0, 0, 0, ' . $sec9_overlay_opacity . '); }' . PHP_EOL;
		} else {
			$ka_css .= '.home-9-wide { background-color:' . canuck_hex_to_rgba( $sec9_bg, $sec9_bg_o ) . ';color: ' . $sec9_text . '; }' . PHP_EOL;
		}
		$ka_css .= '.home-9-wrap { color: ' . $sec9_text . '; opacity: 1; }' . PHP_EOL;
	}
	if ( in_array( 'Section 10', $home_area, true ) ) {
		// Home page Section 10.
		$sec10_bg                = esc_html( get_theme_mod( 'canuck_section10_background_color', '#ffffff' ) );
		$sec10_bg_o              = esc_html( get_theme_mod( 'canuck_section10_background_color_opacity', 1 ) );
		$sec10_bg_image          = esc_url( get_theme_mod( 'canuck_section10_background_image', '' ) );
		$sec10_overlay_opacity   = esc_html( get_theme_mod( 'canuck_section10_overlay_opacity', 0 ) );
		$sec10_text              = esc_html( get_theme_mod( 'canuck_section10_text_color', '#4c4c4c' ) );
		$sec10_button_bg         = esc_html( get_theme_mod( 'canuck_section10_button_background_color', '#ffffff' ) );
		$sec10_button_text       = esc_html( get_theme_mod( 'canuck_section10_button_text_color', $button_hover_default ) );
		$sec10_button_hover_bg   = esc_html( get_theme_mod( 'canuck_section10_button_hover_background_color', $button_hover_default ) );
		$sec10_button_hover_text = esc_html( get_theme_mod( 'canuck_section10_button_hover_text_color', '#ffffff' ) );
		if ( '#19c143' === $sec10_button_hover_bg || '#f20202' === $sec10_button_hover_bg || '#16aee5' === $sec10_button_hover_bg || '#ed1651' === $sec10_button_hover_bg ) {
			$sec10_button_hover_bg = $button_hover_default;
		}
		if ( '#19c143' === $sec10_button_text || '#f20202' === $sec10_button_text || '#16aee5' === $sec10_button_text || '#ed1651' === $sec10_button_text ) {
			$sec10_button_text = $button_hover_default;
		}
		if ( '' !== $sec10_bg_image ) {
			$ka_css .= '.home-10-wide-overlay { background-color: rgba( 0, 0, 0, ' . $sec10_overlay_opacity . '); }' . PHP_EOL;
		} else {
			$ka_css .= '.home-10-wide { background-color:' . canuck_hex_to_rgba( $sec10_bg, $sec10_bg_o ) . ';color: ' . $sec10_text . '; }' . PHP_EOL;
		}
		$ka_css .= '.home-10-wrap { color: ' . $sec10_text . '; opacity: 1; }' . PHP_EOL;
		$ka_css .= '.home-10-text { border-top: 1px solid ' . canuck_hex_to_rgba( $sec10_text, 0.1 ) . ';border-bottom: 1px solid ' . canuck_hex_to_rgba( $sec10_text, 0.1 ) . '; }' . PHP_EOL;
		$ka_css .= '.home-10-button a.button1 { background-color: ' . $sec10_button_bg . ';color: ' . $sec10_button_text . ';border: 1px solid ' . $sec10_button_text . '; }' . PHP_EOL;
		$ka_css .= '.home-10-button a.button1:before { background-color: ' . $sec10_button_hover_bg . '; }' . PHP_EOL;
		$ka_css .= '.home-10-button a.button1:hover { color: ' . $sec10_button_hover_text . '; }' . PHP_EOL;
	}
	if ( in_array( 'Section 11', $home_area, true ) ) {
		// Home page Section 11.
		$sec11_bg                = esc_html( get_theme_mod( 'canuck_section11_background_color', '#ffffff' ) );
		$sec11_bg_o              = esc_html( get_theme_mod( 'canuck_section11_background_color_opacity', 1 ) );
		$sec11_bg_image          = esc_url( get_theme_mod( 'canuck_section11_background_image', '' ) );
		$sec11_overlay_opacity   = esc_html( get_theme_mod( 'canuck_section11_overlay_opacity', 0 ) );
		$sec11_text              = esc_html( get_theme_mod( 'canuck_section11_text_color', '#4c4c4c' ) );
		$sec11_button_bg         = esc_html( get_theme_mod( 'canuck_section11_button_background_color', '#ffffff' ) );
		$sec11_button_text       = esc_html( get_theme_mod( 'canuck_section11_button_text_color', $button_hover_default ) );
		$sec11_button_hover_bg   = esc_html( get_theme_mod( 'canuck_section11_button_hover_background_color', $button_hover_default ) );
		$sec11_button_hover_text = esc_html( get_theme_mod( 'canuck_section11_button_hover_text_color', '#ffffff' ) );
		if ( '#19c143' === $sec11_button_hover_bg || '#f20202' === $sec11_button_hover_bg || '#16aee5' === $sec11_button_hover_bg || '#ed1651' === $sec11_button_hover_bg ) {
			$sec11_button_hover_bg = $button_hover_default;
		}
		if ( '#19c143' === $sec11_button_text || '#f20202' === $sec11_button_text || '#16aee5' === $sec11_button_text || '#ed1651' === $sec11_button_text ) {
			$sec11_button_text = $button_hover_default;
		}
		if ( '' !== $sec11_bg_image ) {
			$ka_css .= '.home-11-wide-overlay { background-color: rgba( 0, 0, 0, ' . $sec11_overlay_opacity . '); }' . PHP_EOL;
		} else {
			$ka_css .= '.home-11-wide { background-color:' . canuck_hex_to_rgba( $sec11_bg, $sec11_bg_o ) . ';color: ' . $sec11_text . '; }' . PHP_EOL;
		}
		$ka_css .= '.home-11-wrap { color: ' . $sec11_text . '; opacity: 1; }' . PHP_EOL;
		$ka_css .= '.home-11-text { border-top: 1px solid ' . canuck_hex_to_rgba( $sec11_text, 0.1 ) . ';border-bottom: 1px solid ' . canuck_hex_to_rgba( $sec11_text, 0.1 ) . '; }' . PHP_EOL;
		$ka_css .= '.home-11-button a.button1 { background-color: ' . $sec11_button_bg . ';color: ' . $sec11_button_text . ';border: 1px solid ' . $sec11_button_text . '; }' . PHP_EOL;
		$ka_css .= '.home-11-button a.button1:before { background-color: ' . $sec11_button_hover_bg . '; }' . PHP_EOL;
		$ka_css .= '.home-11-button a.button1:hover { color: ' . $sec11_button_hover_text . '; }' . PHP_EOL;
	}
	if ( in_array( 'Section 12', $home_area, true ) ) {
		// Home page Section 12.
		$sec12_bg              = esc_html( get_theme_mod( 'canuck_section12_background_color', '#ffffff' ) );
		$sec12_bg_o            = esc_html( get_theme_mod( 'canuck_section12_background_color_opacity', 1 ) );
		$sec12_bg_image        = esc_url( get_theme_mod( 'canuck_section12_background_image', '' ) );
		$sec12_overlay_opacity = esc_html( get_theme_mod( 'canuck_section12_overlay_opacity', 0 ) );
		$sec12_text            = esc_html( get_theme_mod( 'canuck_section12_text_color', '#4c4c4c' ) );
		if ( '' !== $sec12_bg_image ) {
			$ka_css .= '.home-12-wide-overlay { background-color: rgba( 0, 0, 0, ' . $sec12_overlay_opacity . '); }' . PHP_EOL;
		} else {
			$ka_css .= '.home-12-wide { background-color:' . canuck_hex_to_rgba( $sec12_bg, $sec12_bg_o ) . ';color: ' . $sec12_text . '; }' . PHP_EOL;
		}
		$ka_css .= '.home-12-wrap { color: ' . $sec12_text . '; opacity: 1; }' . PHP_EOL;
	}
	if ( in_array( 'Section 13', $home_area, true ) ) {
		// Home page Section 13.
		$sec13_bg              = esc_html( get_theme_mod( 'canuck_section13_background_color', '#ffffff' ) );
		$sec13_bg_o            = esc_html( get_theme_mod( 'canuck_section13_background_color_opacity', 1 ) );
		$sec13_bg_image        = esc_url( get_theme_mod( 'canuck_section13_background_image', '' ) );
		$sec13_overlay_opacity = esc_html( get_theme_mod( 'canuck_section13_overlay_opacity', 0 ) );
		$sec13_text            = esc_html( get_theme_mod( 'canuck_section13_text_color', '#4c4c4c' ) );
		if ( '' !== $sec13_bg_image ) {
			$ka_css .= '.home-13-wide-overlay { background-color: rgba( 0, 0, 0, ' . $sec13_overlay_opacity . '); }' . PHP_EOL;
		} else {
			$ka_css .= '.home-13-wide { background-color:' . canuck_hex_to_rgba( $sec13_bg, $sec13_bg_o ) . ';color: ' . $sec13_text . '; }' . PHP_EOL;
		}
		$ka_css .= '.home-13-wrap { color: ' . $sec13_text . '; opacity: 1; }' . PHP_EOL;
	}
	// Footer custom css.
	$show_footer             = get_theme_mod( 'canuck_show_footer', true );
	$footer_bg_image         = esc_url( get_theme_mod( 'canuck_footer_background_image', '' ) );
	$footer_overlay_opacity  = esc_html( get_theme_mod( 'canuck_footer_overlay_opacity', 0 ) );
	$footer_background_color = esc_html( get_theme_mod( 'canuck_footer_background_color', '#161616' ) );
	$footer_text_color       = esc_html( get_theme_mod( 'canuck_footer_text_color', '#ffffff' ) );
	$footer_link_color       = esc_html( get_theme_mod( 'canuck_footer_link_color', '#c9c9c9' ) );
	$footer_hover_color      = esc_html( get_theme_mod( 'canuck_footer_link_hover_color', '#ffffff' ) );
	if ( true === $show_footer && '' !== $footer_bg_image ) {
		$ka_css .= '.footer-overlay { background-color: rgba( 0, 0, 0, ' . $footer_overlay_opacity . '); }' . PHP_EOL;
	}
	$ka_css .= '#canuck-footer { background-color:' . $footer_background_color . '; }' . PHP_EOL;
	$ka_css .= '#footer-wrap,#footer-wrap h1,#footer-wrap h2,#footer-wrap h3,#footer-wrap h4,#footer-wrap h5,#footer-wrap h6 { color: ' . $footer_text_color . ';}' . PHP_EOL;
	$ka_css .= '#copyright { color: ' . $footer_text_color . ';}' . PHP_EOL;
	$ka_css .= '#canuck-footer .canuck_recent_posts li span { color: ' . $footer_text_color . ';}' . PHP_EOL;
	$ka_css .= '#footer-wrap a,#copyright a,#footer-wrap #social-menu-id-footer li a { color: ' . $footer_link_color . ';}' . PHP_EOL;
	$ka_css .= '#footer-wrap a:hover,#copyright a:hover { color: ' . $footer_hover_color . ';}' . PHP_EOL;
	$ka_css .= '#footer-wrap .footer-topstrip-left { color: ' . $footer_text_color . ';}' . PHP_EOL;
	$ka_css .= '#footer-wrap .footer-topstrip-left a { color: ' . $footer_link_color . ';}' . PHP_EOL;
	$ka_css .= '#footer-wrap .footer-topstrip-left a:hover { background-color: ' . $footer_text_color . '; color: ' . $footer_background_color . ';}' . PHP_EOL;
	$ka_css .= '#canuck-footer #wp-calendar thead th, #canuck-footer #calendar_wrap td#today { background-color:' . $footer_background_color . '; }' . PHP_EOL;
	$ka_css .= '#footer-wrap #wp-calendar tbody td a,#footer-wrap #wp-calendar #prev a, #footer-wrap #wp-calendar #next a { color:' . $footer_link_color . '; }' . PHP_EOL;
	$ka_css .= '#canuck-footer #calendar_wrap td#today { border: 1px solid' . $footer_link_color . '; }' . PHP_EOL;
	$ka_css .= '#footer-wrap #wp-calendar tbody td a:hover,#footer-wrap #wp-calendar #prev a:hover, #footer-wrap #wp-calendar #next a:hover  { color:' . $footer_hover_color . ';}' . PHP_EOL;
	$ka_css .= '#canuck-footer .tagcloud a { background-color: ' . $footer_background_color . ';border: 1px solid ' . canuck_hex_to_rgba( $footer_link_color, 0.5 ) . ';color: ' . $footer_link_color . '}' . PHP_EOL;
	$ka_css .= '#canuck-footer .tagcloud a:hover { background-color: ' . $footer_background_color . ';border: 1px solid ' . canuck_hex_to_rgba( $footer_hover_color, 0.5 ) . ';color: ' . $footer_hover_color . '}' . PHP_EOL;
	$ka_css .= 'footer .widget_recent_entries li,footer .widget_recent_entries li:last-child,footer .canuck_recent_posts li,footer .canuck_recent_posts li:last-child{ border-bottom: 1px solid ' . canuck_hex_to_rgba( $footer_link_color, 0.25 ) . '; }' . PHP_EOL;
	return $ka_css;
}

/**
 * Enqueues back-end CSS for Gutenberg editor
 *
 * @see wp_add_inline_style() to use this function to append the
 * custom styles to style.css.
 *
 * Bring your options into this function to set up your conditional css.
 */
function canuck_custom_css_gutenberg() {
	$ka_gutenberg_css = '';
	// Theme fonts.
	$theme_fonts = canuck_fonts();
	if ( 'default' !== $theme_fonts['header']['family'] ) {
		$ka_gutenberg_css .= '.wp-block-heading h1,.wp-block-heading h2,.wp-block-heading h3,.wp-block-heading h4,.wp-block-heading h5,.wp-block-heading h6,#page-title-wide .page-title-wrap h1,.editor-post-title editor-post-title__block textarea,.editor-post-title__block .editor-post-title__input,span.title {font-family:' . $theme_fonts['header']['family'] . ';}' . PHP_EOL;
	}
	if ( 'default' !== $theme_fonts['body']['family'] ) {
		$ka_gutenberg_css .= '.edit-post-visual-editor .editor-block-list__block-edit,
.edit-post-visual-editor .editor-block-list__block {font-family:' . $theme_fonts['body']['family'] . ';}' . PHP_EOL;
	}
	if ( 'default' !== $theme_fonts['page']['family'] ) {
		$ka_gutenberg_css .= '#page-title-wide .page-title-wrap h1 {font-family:' . $theme_fonts['page']['family'] . '!important;}' . PHP_EOL;
	}
	
	// Post galleries
	$use_post_gallery_captions = get_theme_mod( 'canuck_use_post_gallery_captions' ) ? true : false;
	if ( true === $use_post_gallery_captions ) {
		$ka_gutenberg_css .= '.gallery .gallery-caption{ display: block!important; }';
	} else {
		$ka_gutenberg_css .= '.gallery .gallery-caption{ display: none!important; }';
	}
	return $ka_gutenberg_css;
}
