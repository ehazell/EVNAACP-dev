    <?php
       /**
        * Template Name: Full-width 
        *
        * Description: Use this page template to remove the sidebar from any page.
        *  @package blossom
        */
       
       get_header(); 
       
       
       
       ?>
    <section class="page-title" style="background-image:url(<?php header_image(); ?>)">
       <div class="container">
          <h1><?php wp_title(''); ?></h1>
       </div>
    </section>
    <section class="bg-w sp-100">
       <div class="container">
          <div class="row clearfix">
             <?php if(have_posts()) : ?>
             <?php while(have_posts()) : the_post(); ?>
             <div class="col-sm-12">
                <div class="image">
                   <?php the_post_thumbnail(); ?>    
                </div>
                <div class="para">
                  <?php the_content(); ?>
                  <?php
                   wp_link_pages( array(
                     'before' => '<div class="page-links">' . esc_html__('Pages: ', 'edulite' ),
                    'after'  => '</div>',
                    ) );
                  ?> 
                </div>
                  
                <div class="col-md-12">
                   <?php if ( comments_open() || get_comments_number() ) :
                      comments_template();
                      endif; ?> 
                </div>
             </div>
             <?php endwhile; ?>
             <?php endif; ?>
          </div>
       </div>
    </section>
    <?php get_footer(); ?>