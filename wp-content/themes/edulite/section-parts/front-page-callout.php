     <?php
        $edulite_contact_section_hideshow = get_theme_mod('edulite_contact_section_hideshow','hide');
        if ($edulite_contact_section_hideshow =='show') { ?>
        <?php $edulite_ctah_btn_text = get_theme_mod('ctah_btn_text'); ?> 
        <?php $edulite_ctah_callout_text = get_theme_mod('ctah_heading'); ?> 

    <section class="call-to-action" style="background-image:url(<?php header_image(); ?>)">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-8 b-right">
                            <h2><?php echo esc_html($edulite_ctah_callout_text); ?>
                                
                            </h2>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="number-box clearfix">
                                <?php if (!empty($edulite_ctah_btn_text)) { ?>
                                <a href="<?php echo esc_url(get_theme_mod('ctah_btn_url')); ?>" class="theme-btn btn-style-one"><?php echo esc_html($edulite_ctah_btn_text); ?>
                                    
                                </a>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php } ?>