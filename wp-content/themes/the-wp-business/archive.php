<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package The WP Business
 */

get_header(); ?>

<div class="container">
    <?php
        $left_right = get_theme_mod( 'the_wp_business_theme_options','Right Sidebar');
        if($left_right == 'One Column'){ ?>
        <div id="content-tg">
            <div class="bradcrumbs">
                <?php the_wp_business_the_breadcrumb(); ?>
            </div>
            <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
            <?php if ( have_posts() ) :/* Start the Loop */
        
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', get_post_format() ); 
            
                endwhile;
                wp_reset_postdata();
                else :

                    get_template_part( 'no-results' ); 

                endif; 
            ?>
            <div class="navigation">
                <?php
                    // Previous/next page navigation.
                    the_posts_pagination( array(
                        'prev_text' => __( 'Previous page', 'the-wp-business' ),
                        'next_text' => __( 'Next page', 'the-wp-business' ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'the-wp-business' ) . ' </span>',
                    ) );
                ?>
            </div>
        </div>
    <?php }else if($left_right == 'Three Columns'){ ?>
        <div class="row">
            <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?>
            </div>
            <div class="col-lg-6 col-md-6" id="content-tg">
                <div class="bradcrumbs">
                    <?php the_wp_business_the_breadcrumb(); ?>
                </div>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :/* Start the Loop */
            
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', get_post_format() ); 
                
                    endwhile;
                    wp_reset_postdata();
                    else :

                        get_template_part( 'no-results' ); 

                    endif; 
                ?>
                <div class="navigation">
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text' => __( 'Previous page', 'the-wp-business' ),
                            'next_text' => __( 'Next page', 'the-wp-business' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'the-wp-business' ) . ' </span>',
                        ) );
                    ?>
                </div>
            </div>
            <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?>
            </div>
        </div>
    <?php }else if($left_right == 'Four Columns'){ ?>
        <div class="row">
            <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
            <div class="col-lg-3 col-md-3" id="content-tg">
                <div class="bradcrumbs">
                    <?php the_wp_business_the_breadcrumb(); ?>
                </div>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :/* Start the Loop */
            
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', get_post_format() ); 
                
                    endwhile;
                    wp_reset_postdata();
                    else :

                        get_template_part( 'no-results' ); 

                    endif; 
                ?>
                <div class="navigation">
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text' => __( 'Previous page', 'the-wp-business' ),
                            'next_text' => __( 'Next page', 'the-wp-business' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'the-wp-business' ) . ' </span>',
                        ) );
                    ?>
                </div>
            </div>
            <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?>
            </div>
            <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?>
            </div>
        </div>
    <?php }else if($left_right == 'Left Sidebar'){ ?>
        <div class="row">
            <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1');?>
            </div>
            <div class="col-lg-8 col-md-8" id="content-tg">
                <div class="bradcrumbs">
                    <?php the_wp_business_the_breadcrumb(); ?>
                </div>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :/* Start the Loop */
            
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', get_post_format() ); 
                
                    endwhile;
                    wp_reset_postdata();
                    else :

                        get_template_part( 'no-results' ); 

                    endif; 
                ?>
                <div class="navigation">
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text' => __( 'Previous page', 'the-wp-business' ),
                            'next_text' => __( 'Next page', 'the-wp-business' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'the-wp-business' ) . ' </span>',
                        ) );
                    ?>
                </div>
            </div>
        </div>
    <?php }else if($left_right == 'Right Sidebar'){ ?>
        <div class="row">
            <div class="col-lg-8 col-md-8" id="content-tg">
                <div class="bradcrumbs">
                    <?php the_wp_business_the_breadcrumb(); ?>
                </div>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :/* Start the Loop */
            
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', get_post_format() ); 
                
                    endwhile;
                    wp_reset_postdata();
                    else :

                        get_template_part( 'no-results' ); 

                    endif; 
                ?>
                <div class="navigation">
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text' => __( 'Previous page', 'the-wp-business' ),
                            'next_text' => __( 'Next page', 'the-wp-business' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'the-wp-business' ) . ' </span>',
                        ) );
                    ?>
                </div>
            </div>
            <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1');?>
            </div>
        </div>
    <?php }else if($left_right == 'Grid Layout'){ ?>
        <div class="row">
            <div class="col-lg-8 col-md-8" id="content-tg">
                <div class="bradcrumbs">
                    <?php the_wp_business_the_breadcrumb(); ?>
                </div>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <div class="row">
                    <?php if ( have_posts() ) :/* Start the Loop */
                
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/grid-layout' ); 
                    
                        endwhile;
                        wp_reset_postdata();
                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                </div>
                <div class="navigation">
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text' => __( 'Previous page', 'the-wp-business' ),
                            'next_text' => __( 'Next page', 'the-wp-business' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'the-wp-business' ) . ' </span>',
                        ) );
                    ?>
                </div>
            </div>
            <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1');?>
            </div>
        </div>
    <?php }else {?>
        <div class="row">
            <div class="col-lg-8 col-md-8" id="content-tg">
                <div class="bradcrumbs">
                    <?php the_wp_business_the_breadcrumb(); ?>
                </div>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :/* Start the Loop */
            
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', get_post_format() ); 
                
                    endwhile;
                    wp_reset_postdata();
                    else :

                        get_template_part( 'no-results' ); 

                    endif; 
                ?>
                <div class="navigation">
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text' => __( 'Previous page', 'the-wp-business' ),
                            'next_text' => __( 'Next page', 'the-wp-business' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'the-wp-business' ) . ' </span>',
                        ) );
                    ?>
                </div>
            </div>
            <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1');?></div>
        </div>
    <?php } ?>
</div>

<?php get_footer(); ?>