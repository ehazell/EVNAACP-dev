<?php
/**
 * Template part - About Us Section of FrontPage
 *
 *
 * @package edulite
 */

$edulite_enable_about     = get_theme_mod( 'edulite_aboutus_section_hideshow','hide');

$edulite_about_no        = 1;
$edulite_about_pages      = array();
for( $i = 1; $i <= $edulite_about_no; $i++ ) {
    $edulite_about_pages[]    =  get_theme_mod( "edulite_about_page_$i", 1 );
    $edulite_about_btntxt    =  get_theme_mod( "edulite_about_btntxt_$i", '' );
    $edulite_about_btnurl    =  get_theme_mod( "edulite_about_btnurl_$i", '' );

}

$edulite_about_args  = array(
    'post_type' => 'page',
    'post__in' => array_map( 'absint', $edulite_about_pages ),
    'posts_per_page' => absint($edulite_about_no),
    'orderby' => 'post__in'
    
); 

$edulite_about_query = new   wp_Query( $edulite_about_args );

if( $edulite_enable_about == "show" && $edulite_about_query->have_posts() ) :
    $count = 0;
    while($edulite_about_query->have_posts()) :
        $edulite_about_query->the_post();
        ?>

        <section class="approach-section style-two">
            <div class="container">
                <div class="row clearfix">

                    <!--Image Column-->
                    <div class="image-column col-md-4 col-sm-6 col-xs-12">
                        <div class="image">
                            <?php 
        				        if(has_post_thumbnail()) : 
        					      the_post_thumbnail();
        				        endif; 
        				    ?>
                    </div>
                </div>

                <!--Content Column-->
                    <div class="content-column col-md-8 col-sm-6 col-xs-12">
                        <div class="inner-column">
                             <div class="sec-title type-2">
                                <h2><?php the_title_attribute(); ?></h2>
                             </div>
                             <div class="text">
                                 <?php the_content(); ?>
                             </div>

                                 <?php if (!empty($edulite_about_btnurl)) { ?>
                                 <a href="<?php echo esc_url($edulite_about_btnurl); ?>" class="theme-btn btn-style-one"><?php echo esc_html($edulite_about_btntxt); ?>
                            
                                 </a>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php $count = $count + 1;
    endwhile;
    wp_reset_postdata();
endif; ?>