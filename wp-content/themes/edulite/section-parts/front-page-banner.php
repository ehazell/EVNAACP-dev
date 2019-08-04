  <?php
  $edulite_i_section = get_theme_mod("edulite_image_section_hideshow",'hide');
  $edulite_image_start = get_theme_mod("edulite_image_start",'');
  $edulite_image_contact = get_theme_mod("edulite_image_contact",''); 
  $edulite_b_image = get_theme_mod("edulite_b_image",''); 
  $edulite_image_heading = get_theme_mod("edulite_image_heading",'');
  $edulite_image_subheading = get_theme_mod("edulite_image_subheading",'');

  if( $edulite_i_section == "show") :
    ?>   
    <section class="theme-banner" style="background-image: url('<?php echo esc_url($edulite_b_image); ?>');">
        <div class="slide-table">
            <div class="slide-table-cell">
                <div class="container">
                    <div class="banner-content">
                        <h2><?php echo esc_html($edulite_image_heading); ?></h2>
                        <p><?php echo esc_html($edulite_image_subheading); ?></p>
                        <?php if (!empty($edulite_image_start)) { ?>
                        <a href="<?php echo esc_url(get_theme_mod('edulite_image_start_url')); ?>" class="theme-btn btn-style-two mr-10 banner-btn-1"><?php echo esc_html($edulite_image_start); ?></a>
                      <?php } ?>
                      <?php if (!empty($edulite_image_contact)) { ?>
                        <a href="<?php echo esc_url(get_theme_mod('edulite_image_contact_url')); ?>" class="theme-btn btn-style-two mr-10"><?php echo esc_html($edulite_image_contact); ?></a>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
endif;
?>