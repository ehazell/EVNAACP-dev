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
      <h1><?php wp_title(''); ?></h1>
   </div>
</section>
<div class="bg-w sp-100">
   <div class="container">
      <div class="row clearfix">
         <!--Content Side / Our Blog-->
         <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
            <?php 
               if(have_posts()) : 
                  ?>
            <?php while(have_posts()) : the_post(); ?>
            <div class="blog-single blog-detail padding-right">
               <?php  get_template_part( 'content-parts/content','single' ); ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
         </div>
         <!--Sidebar Side-->
         <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
            <aside class="sidebar default-sidebar">
               <?php get_sidebar(); ?>
            </aside>
         </div>
      </div>
   </div>
</div>
<?php get_footer(); ?>