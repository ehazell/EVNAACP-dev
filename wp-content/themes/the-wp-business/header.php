<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-tg">
 *
 * @package The WP Business
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'the-wp-business' ) ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="header">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="top-contact col-lg-3 col-md-3">
            <?php if( get_theme_mod( 'the_wp_business_contact_corporate','' ) != '') { ?>
              <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('the_wp_business_contact_corporate','' )); ?></span>
            <?php } ?>
          </div>   
          <div class="top-contact col-lg-3 col-md-4">
            <?php if( get_theme_mod( 'the_wp_business_email_corporate','' ) != '') { ?>
              <span class="email_corporate"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('the_wp_business_email_corporate','') ); ?></span>
            <?php } ?>
          </div>
          <div class="social-media col-lg-6 col-md-5">
            <?php if( get_theme_mod( 'the_wp_business_youtube_url') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'the_wp_business_youtube_url','' ) ); ?>"><i class="fab fa-youtube" aria-hidden="true"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'the_wp_business_facebook_url') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'the_wp_business_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'the_wp_business_twitter_url' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'the_wp_business_twitter_url','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'the_wp_business_rss_url') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'the_wp_business_rss_url','' ) ); ?>"><i class="fas fa-rss" aria-hidden="true"></i></a>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="menu-sec">
      <div class="container">
        <div class="row">
          <div class="logo col-lg-3 col-md-3 wow bounceInDown">
            <?php if( has_custom_logo() ){ the_wp_business_the_custom_logo();
              }else{ ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?> 
              <p class="site-description"><?php echo esc_html($description); ?></p>    <?php endif; }?>
          </div>
          <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','the-wp-business'); ?></a>
          </div>
          <div class="menubox col-lg-6 col-md-6 ">
            <div class="nav">
              <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
            </div>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class ="testbutton">
              <span class="search-box">
                <span><i class="fas fa-search"></i></span>
              </span>
              <span>
                <?php if ( get_theme_mod('the_wp_business_button_url','') != "" ) {?>
                  <a href="<?php echo esc_url(get_theme_mod('the_wp_business_button_url','')); ?>"><?php echo esc_html(get_theme_mod('the_wp_business_button_text','')); ?> </a>
                <?php }?>
              </span>
            </div>
          </div>
        </div>
        <div class="serach_outer">
          <div class="closepop"><i class="far fa-window-close"></i></div>
          <div class="serach_inner">
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

   