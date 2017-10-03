<?php
extract(shortcode_atts(array(         
    'cms_navpage_meta' => 'next-page',         
), $atts));
$html_id = cmsHtmlID('cms-navpage');
$atts['html_id'] = $html_id;
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-navpage-wrapper clearfix">
    <?php if($cms_navpage_meta == 'prev-page') { ?>
        <div class="cms-navpage-prev">
            <?php whole_page_nav_prev(); ?>
        </div>
    <?php } ?>

    <?php if($cms_navpage_meta == 'next-page') { ?>
        <div class="cms-navpage-next">
            <?php whole_page_nav_next(); ?>
        </div>
    <?php } ?>
</div>