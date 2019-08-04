    <?php
       /**
       * The template for displaying all pages.
       *
       * This is the template that displays all pages by default.
       * Please note that this is the WordPress construct of pages
       * and that other 'pages' on your WordPress site will use a
       * different template.
       *
       * @package edulite 
       */
       get_header();
       
       ?>
    <section class="page-title">
       <div class="container">
          <?php if (is_home() || is_front_page()) { ?>						
				<h1><?php the_title_attribute(); ?></h1>
			<?php } else { ?>
				<h1><?php wp_title(''); ?></h1>
			<?php } ?>	
		  
         
       </div>
    </section>
    <div class="bg-w sp-100">
       <div class="container">
          <div class="row clearfix">
             <?php if(have_posts()) : ?>
             <?php while(have_posts()) : the_post(); ?>
             <div class="page-content col-md-9 col-sm-12 col-xs-12">
                <div class="image mb-20">
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
             <div class="sidebar-side col-md-3 col-sm-12 col-xs-12">
                <aside class="sidebar default-sidebar">
                   <?php get_sidebar(); ?>
                </aside>
             </div>
          </div>
       </div>
    </div>
    <?php get_footer(); ?>