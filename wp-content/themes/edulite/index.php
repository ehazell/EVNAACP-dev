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
      <h1><?php echo esc_html__('Blog', 'edulite') ?></h1>
      <?php } else { ?>
      <h1><?php wp_title(''); ?></h1>
      <?php } ?>
   </div>
</section>
<div class="bg-w sp-100">
   <div class="container">
      <div class="row clearfix">
         <!--Content Side / Our Blog-->
         <div class="content-side col-md-9 col-sm-12 col-xs-12">
            <div class="blog-classic">
               <?php if(have_posts()) : ?>
               <?php while(have_posts()) : the_post(); ?>                    
               <div class="news-block-three">
                  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                     <?php get_template_part('content-parts/content', get_post_format()); ?>
                  </div>
               </div>
               <?php endwhile; ?>
               <?php else : 
                  get_template_part( 'content-parts/content', 'none' );
                  endif; ?>                     
               <ul class="styled-pagination">
                  <?php the_posts_pagination(
                     array(
                     'prev_text' => esc_html__('&lt;','edulite'),
                     'next_text' => esc_html__('&gt;','edulite')
                     )
                     ); ?>
               </ul>
            </div>
         </div>
         <div class="sidebar-side col-md-3 col-sm-12 col-xs-12">
            <aside class="sidebar default-sidebar right-sidebar">
               <?php get_sidebar(); ?>
            </aside>
         </div>
      </div>
   </div>
</div>
<?php get_footer(); ?>