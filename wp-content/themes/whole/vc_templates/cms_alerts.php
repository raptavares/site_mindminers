<?php
extract(shortcode_atts(array(
    'alerts_text' => '',       
    'alerts_icon' => '',       
    'alerts_style' => '',       
), $atts));

?>
<div class="cms-alert-wrapper cms-alert-<?php echo esc_attr($alerts_style); ?>">
    <div class="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">
            <i class="zmdi zmdi-close"></i>
        </a>
        <span class="alert-icon"><i class="<?php echo esc_attr($alerts_icon); ?>"></i></span>
        <span class="text"><?php echo esc_attr($alerts_text); ?></span>
    </div>
</div>
