<?php
extract(shortcode_atts(array(
    'button_text'  => '',
    'link_button'  => '',
    'button_style'  => 'btn-primary-alt',
    'button_align'  => 'cta-right',
    'cta_title'  => '',
    'cta_title_color'  => '',      
), $atts));
 
    $html_id = cmsHtmlID('cms-cta');
    $atts['html_id'] = $html_id;

    $link = vc_build_link($link_button);
    $a_href = '';
    if ( strlen( $link['url'] ) > 0 ) {
        $a_href = $link['url'];
    }
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-cta-wrapper cms-style-default clearfix <?php echo esc_attr($button_align); ?>">
    <div class="cms-cta-inner row">
        <div class="cms-cta-content col-xs-12 col-sm-12 col-md-8 col-lg-8 text-center-sm text-center-xs">
            <?php if (!empty($cta_title) && $cta_title) { ?>
                <h3 class="title" style="color: <?php echo esc_attr($cta_title_color); ?>;">
                    <?php echo esc_attr($cta_title); ?>
                </h3>
            <?php } ?>
        </div>

        <?php if (!empty($button_text) && $button_text) { ?>
            <div class="cms-cta-button col-xs-12 col-sm-12 col-md-4 col-lg-4 text-right text-center-sm text-center-xs">
                <a href="<?php echo esc_url($a_href);?>" class="btn <?php echo esc_attr($button_style); ?>">
                    <?php echo esc_attr($button_text); ?>
                </a>
            </div>
    <?php } ?>
    </div>
</div>