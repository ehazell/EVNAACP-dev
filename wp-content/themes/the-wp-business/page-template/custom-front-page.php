<?php
/**
 * Template Name: Custom home page
 */

get_header(); ?>
<?php do_action('the_wp_business_above_slider_section'); ?>
<?php if( get_theme_mod( 'the_wp_business_slider_hide') != '') { ?>
  <?php /** slider section **/ ?>
  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
      <?php $pages = array();
        for ( $count = 1; $count <= 4; $count++ ) {
          $mod = intval( get_theme_mod( 'the_wp_business_slidersettings_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
                $pages[] = $mod;
          }
        }
        if( !empty($pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $pages,
            'orderby' => 'post__in'
          );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
            $i = 1;
      ?>     
      <div class="carousel-inner" role="listbox">
        <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <h2><?php the_title();?></h2> 
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( the_wp_business_string_limit_words( $excerpt,15) ); ?></p>  
                <div class ="read-more">
                  <a href="<?php echo esc_url( get_permalink() );?>"> <?php echo esc_html(get_theme_mod('the_wp_business_slidersettings_page',__('LEARN MORE','the-wp-business'))); ?></a>
                </div>                    
              </div>
            </div>
          </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
      </div>
      <?php else : ?>
      <div class="no-postfound"></div>
      <?php endif;
      endif;?>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
      </a>
    </div>  
    <div class="clearfix"></div>
  </section> 
<?php }?>

<?php do_action('the_wp_business_above_wethink_section'); ?>

<?php if( get_theme_mod( 'the_wp_business_wethink_post_setting') != '') { ?>
  <?php /** second section **/ ?>
  <section id="wethink">
    <div class="container">
      <?php
      $postData1 =  get_theme_mod('the_wp_business_wethink_post_setting');
      if($postData1){
        $args = array( 'name' => esc_html($postData1 ,'the-wp-business'));
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="row">
          <?php if(has_post_thumbnail()){ 
            $thumb_col = 'col-lg-6 col-md-6';
            $desc_col = 'col-lg-6 col-md-6';
            }else{
              $desc_col = 'col-lg-12 col-md-12';
          } ?>
          <div class="<?php echo esc_attr($thumb_col); ?>">
            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          </div>
          <div class="<?php echo esc_attr($desc_col); ?>">
            <h3><?php the_title(); ?></h3>
            <p><?php the_content(); ?></p>
            <div class="clearfix"></div>
            <div class="read-btn"><a class="button"  href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','the-wp-business'); ?></a>
            </div>
          </div>
        </div>
        <?php endwhile; 
        wp_reset_postdata();?>
        <?php else : ?>
           <div class="no-postfound"></div>
         <?php
        endif; }?>
        <div class="clearfix"></div>
    </div> 
  </section>
<?php }?>

<?php do_action('the_wp_business_below_wethink_section'); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>