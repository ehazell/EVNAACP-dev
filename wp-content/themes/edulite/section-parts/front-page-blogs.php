<?php           
    $edulite_blog_section =  get_theme_mod( 'edulite_blog_section_hideshow', 'show' );
    $edulite_blog_title=get_theme_mod('edulite_blog_title');
    if ($edulite_blog_section =='show') { ?>

    <section class="news-section sp-100-70">
        <div class="container">
            <div class="row clearfix">
                <!--Title Column-->
                <div class="col-sm-12">
                    <div class="sec-title mb-55 type-3">
                        <?php if($edulite_blog_title != "")
                            {?>
                            <h2><?php echo esc_html(get_theme_mod('edulite_blog_title')); ?></h2>
                            <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <?php 
                  $edulite_latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
                   if ( $edulite_latest_blog_posts->have_posts() ) : 
                     while ( $edulite_latest_blog_posts->have_posts() ) : $edulite_latest_blog_posts->the_post(); 
                ?>
                    <div class="news-block col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <?php
                          if(has_post_thumbnail()){ ?>
                                <figure class="image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail();  ?>
                                   
                                    </a>
                                </figure>
                                <?php }  ?>
                                    <div class="lower-box">
                                        <ul class="post-info">
                                            <li>
                                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                    <?php echo esc_html__('By','edulite'); ?> :
                                                        <?php the_author(); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <?php echo  get_the_date(); ?>
                                            </li>
                                            
                                        </ul>
                                         <h3>
                                          <a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a>
                                         </h3>
                                          <a href="<?php the_permalink(); ?>" class="theme-btn read-more">
                                            <?php echo esc_html__('Read More','edulite'); ?>
                                          </a>
                                    </div>
                        </div>
                    </div>

                    <?php endwhile; 
                        endif; 
                    ?>
            
            </div>
        </div>
    </section>
    <?php } ?>