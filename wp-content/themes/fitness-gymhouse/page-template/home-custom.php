<?php
/**
 * Template Name: Home Custom Page
 */
?>


<?php do_action( 'fitness_gymhouse_before_slider' ); ?>

<?php if( get_theme_mod('fitness_gymhouse_slider_hide') != ''){ ?>
  <section id="slider-section">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
      <?php $pages = array();
        for ( $count = 1; $count <=4; $count++ ) {
          $mod = intval( get_theme_mod( 'fitness_gymhouse_slide_page' . $count ));
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
                <h2><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title();?></a></h2>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( fitness_gymhouse_string_limit_words( $excerpt,25 ) ); ?></p> 
                <div class="slide-button">
                  <a href="<?php echo esc_url( get_permalink() );?>"><?php esc_html_e( 'READ MORE','fitness-gymhouse' ); ?></a>
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
        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-circle-left"></i></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-circle-right"></i></span>
      </a>
    </div>
    <div class="clearfix"></div>
  </section>
<?php }?>

<?php do_action( 'fitness_gymhouse_after_slider' ); ?>

<?php if( get_theme_mod('fitness_gymhouse_about') != ''){ ?>
  <?php /*--About Us--*/?>
  <section class="about">
    <div class="container">
      <?php
        $postData1=  get_theme_mod('fitness_gymhouse_about');
       if($postData1){
       $args = array( 'name' => esc_html($postData1 ,'fitness-gymhouse'));
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="row">
              <div class="col-lg-7 col-md-7">
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
                <div class ="about-btn">
                  <a href="<?php echo esc_url( the_permalink() ); ?>"><span><?php echo esc_html(get_theme_mod('fitness_gymhouse_about_btn_name',__('KNOW MORE ABOUT US','fitness-gymhouse'))); ?></span></a>
                </div>
              </div>
              <div class="col-lg-5 col-md-5">
                <img src="<?php the_post_thumbnail_url('full'); ?>"/>
              </div>
            </div>
        <?php endwhile; 
        wp_reset_postdata();?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php
      endif; }?>
    </div>
  </section>
<?php }?>

<?php do_action( 'fitness_gymhouse_after_about' ); ?>

<?php get_footer(); ?>