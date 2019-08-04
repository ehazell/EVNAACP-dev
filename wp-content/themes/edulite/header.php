
<?php 
/**
* The header for our theme.
*
* Displays all of the <head> section 
*
* @package edulite
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Shortcut icon-->

	<?php wp_head(); ?>

	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>

</head>
	



<body class="<?php body_class(); ?>">
	 <div class="scroll-to-top scroll-to-target">
		<span class="icon fa fa-angle-double-up" title="<?php esc_attr__( 'Go to top', 'edulite' ); ?>" >
			<?php esc_html__( 'Top', 'edulite' ); ?>			
		</span>
	</div>

	<header class="main-header header-style-one">
	            <!--Header-Upper-->

               
	            <div class="header-upper">
	                <div class="container clearfix">
	                    <div class="pull-left logo-outer">
	                        <div class="logo">
	                      <?php if (has_custom_logo()) : ?> 

	                         <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
	                               <?php the_custom_logo(); ?>
	                          </a>
                                
	                    <?php  
                            else : 
                             if (display_header_text()==true){ ?>
            	      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            	        <h2 style="color: #<?php header_textcolor(); ?>">
                        <?php bloginfo( 'title' ); ?>
                        </h2> </a>
            	        <?php bloginfo( 'description' ); ?>
            	      
	                  <?php 
                            
                             } endif; ?>

	                  </div>
	                    </div>
				 <?php  
					$edulite_header_section = get_theme_mod('edulite_header_section_hideshow' ,esc_html__('hide','edulite'));
						if ($edulite_header_section =='show') { 
					$edulite_mail_value = get_theme_mod('edulite_header_mail_value');
					$edulite_phone_value = get_theme_mod('edulite_header_phone_value');
					$edulite_btn_text1 = get_theme_mod('edulite_btn_text1');
					$edulite_btn_text2 = get_theme_mod('edulite_btn_text2');
					$edulite_btn_value2 = get_theme_mod('edulite_btn_text3');
					$edulite_btn_text3 = get_theme_mod('edulite_btn_text4');
					$edulite_btn_value3 = get_theme_mod('edulite_btn_text5');


						?>
                <div class="pull-right upper-right clearfix">

                    <?php if (!empty($edulite_btn_text2)) { ?>
                    <div class="upper-column info-box">
                        <div class="icon-box">
                            <span class="fa fa-envelope"></span>
                        </div>
                        <ul>
                            <li>
                                <strong><?php echo esc_html($edulite_btn_text2); ?></strong><?php echo esc_html($edulite_btn_value2); ?>
                            </li>
                        </ul>
                    </div>
                    <?php } ?>
                    <?php if (!empty($edulite_btn_text3)) { ?>
                    <div class="upper-column info-box">
                        <div class="icon-box">
                            <span class="fa fa-phone"></span>
                        </div>
                        <ul>
                            <li>
                                <strong><?php echo esc_html($edulite_btn_text3); ?></strong><?php echo esc_html($edulite_btn_value3); ?></li>
                        </ul>
                    </div>
                    <?php } ?>
                    <?php if (!empty($edulite_btn_text1)) { ?>
                    <div class="upper-column info-box">
                        <a href="<?php echo esc_url(get_theme_mod('edulite_btn_url1')); ?>" class="theme-btn btn-style-one"><?php echo esc_html($edulite_btn_text1); ?></a>
                    </div>
                  <?php } ?>
                </div>
<?php } ?>
            </div>
        </div>
	            <!--End Header Upper-->

	            <!--Header Lower-->
        <div class="header-lower">
            <div class="container">
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                           <?php wp_nav_menu( 
						    array(
						       'container'        => 'ul', 
						       'theme_location'    => 'primary', 
						       'menu_class'        => 'dropdown', 
						       'items_wrap'        => '<ul class="navigation clearfix">%3$s</ul>',
						       'fallback_cb'       => 'edulite_wp_bootstrap_navwalker::fallback',
						        'walker'            => new edulite_wp_bootstrap_navwalker()
						    )
						    ); 
						    ?>
                        </div>
                    </nav>
   <?php  
    $edulite_header_social_section = get_theme_mod('edulite_header_social_section_hideshow' ,esc_html__('hide','edulite'));
        if ($edulite_header_social_section =='show') {

    $edulite_header_social_link_1 = get_theme_mod('edulite_header_social_link_1');
    $edulite_header_social_link_2 = get_theme_mod('edulite_header_social_link_2');
    $edulite_header_social_link_3 = get_theme_mod('edulite_header_social_link_3');
    $edulite_header_social_link_4 = get_theme_mod('edulite_header_social_link_4');

        ?>
                    <div class="social-icons">
                        <?php if (!empty($edulite_header_social_link_1)) { ?>
                        <a href="<?php echo esc_url(get_theme_mod('edulite_header_social_link_1')) ?>">
                            <span class="fa fa-facebook"></span>
                        </a>
                    <?php } ?>
                    <?php if (!empty($edulite_header_social_link_2)) { ?>
                        <a href="<?php echo esc_url(get_theme_mod('edulite_header_social_link_2')) ?>">
                            <span class="fa fa-linkedin"></span>
                        </a>
                    <?php } ?>
                    <?php if (!empty($edulite_header_social_link_3)) { ?>
                        <a href="<?php echo esc_url(get_theme_mod('edulite_header_social_link_3')) ?>">
                            <span class="fa fa-twitter"></span>
                        </a>
                    <?php } ?>
                    <?php if (!empty($edulite_header_social_link_4)) { ?>
                        <a href="<?php echo esc_url(get_theme_mod('edulite_header_social_link_4')) ?>">
                            <span class="fa fa-google-plus"></span>
                        </a>
                    <?php } ?>
                    </div>
<?php } ?>
                </div>
            </div>
        </div>
        <!--End Header Lower-->
    </header>
