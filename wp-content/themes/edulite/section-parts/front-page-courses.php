<?php
/**
 * Template part - Service Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package edulite
*/
$edulite_courses_section = get_theme_mod( 'edulite_courses_section_hideshow','hide');
$edulite_courses_title   =  get_theme_mod('edulite_courses_title');  
$edulite_courses_subtitle   =  get_theme_mod('edulite_courses_subtitle'); 

$edulite_course_no = 6;

$edulite_course_page      = array();
for( $x = 1; $x <= $edulite_course_no; $x++ ) {
    $edulite_course_page[]    =  get_theme_mod( "edulite_course_page_$x", 1 );

}

$edulite_course_args  = array(
    'post_type' => 'page',
    'post__in' => array_map( 'absint', $edulite_course_page ),
    'posts_per_page' => absint($edulite_course_no),
    'orderby' => 'post__in'
); 

$edulite_course_query = new wp_Query( $edulite_course_args );

if( $edulite_courses_section == "show") {

    ?>

    <section class="services-section-three bg-grey">
        <div class="container">
            <!--Sec Title-->
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="sec-title">
                        <?php if($edulite_courses_title != "")
                        {?>
                            <h2><?php echo esc_html($edulite_courses_title); ?></h2>
                            <p class="text">
                                <?php echo esc_html($edulite_courses_subtitle); ?>
                            </p>
                            <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="four-item-carousel owl-carousel owl-theme">
                    <?php
                  $count = 0;
                  while($edulite_course_query->have_posts()) :
                   $edulite_course_query->the_post();
                   ?>
                        <div class="services-block-three">
                            <div class="inner-box">
                                <div class="image">
                                    <?php 
                                      if(has_post_thumbnail()) : 
                                       the_post_thumbnail();
                                        endif; 
                                    ?>
                                        <div class="content-overlay">
                                            <div class="overlay-inner">
                                                <div class="content-box">
                                                    <a href="<?php the_permalink(); ?>" class="read-more">
                                                        <?php echo esc_html__('Buy Now','edulite'); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="overlay-box">
                                    <h3>
                                     <a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a>
                                    </h3>
                                    <ul class="course-author">
                                        <li>
                                            <?php echo esc_html__('By','edulite'); ?>:
                                                <span><?php the_author(); ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                $count = $count + 1;
                endwhile;
                wp_reset_postdata();
                ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>