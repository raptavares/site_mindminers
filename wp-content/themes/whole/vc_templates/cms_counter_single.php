<?php 
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $icon_custom = isset($atts['icon_custom']) ? $atts['icon_custom'] : '';
    $icon_color = isset($atts['icon_color']) ? $atts['icon_color'] : '';
    
    $digit_color = isset($atts['digit_color']) ? $atts['digit_color'] : '';
    $title_color = isset($atts['title_color']) ? $atts['title_color'] : '';

    $title_fontsize = isset($atts['title_fontsize']) ? $atts['title_fontsize'] : '';
    $title_margin = isset($atts['title_margin']) ? $atts['title_margin'] : '';
    $digit_fontsize = isset($atts['digit_fontsize']) ? $atts['digit_fontsize'] : '';

    $line = isset($atts['line']) ? $atts['line'] : 'show';
    $line_color = isset($atts['line_color']) ? $atts['line_color'] : '';
?>
<div class="cms-counter-wraper cms-counter-default text-center <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">

    <div class="cms-counter-body clearfix">
        
        <div class="cms-counter-icon">
            <?php if( $icon_custom ): ?>
                <i class="<?php echo esc_attr($icon_custom); ?>" style="color:<?php echo esc_attr($icon_color); ?>;"></i>
                <?php else: if( $iconClass ): ?>
                    <i class="<?php echo esc_attr($iconClass); ?>" style="color:<?php echo esc_attr($icon_color); ?>;"></i>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="cms-counter-content">
            <div style="font-size: <?php echo esc_attr($digit_fontsize); ?>; color: <?php echo esc_attr($digit_color)?>" id="counter_<?php echo esc_attr($atts['html_id']);?>" class="cms-counter <?php echo esc_attr(strtolower($atts['type']));?>" data-suffix="<?php echo esc_attr($atts['suffix']);?>" data-prefix="<?php echo esc_attr($atts['prefix']);?>" data-type="<?php echo esc_attr(strtolower($atts['type']));?>" data-digit="<?php echo esc_attr($atts['digit']);?>">
            </div>
            <?php if($line == 'show') { ?>
                <span class="cms-counter-line" style="background-color:<?php echo esc_attr($line_color); ?>;"></span>
            <?php } ?>
            <?php if($atts['c_title']):?>
                <span class="cms-counter-title" style="font-size: <?php echo esc_attr($title_fontsize); ?>; margin: <?php echo esc_attr($title_margin); ?>; color: <?php echo esc_attr($title_color)?>">
                    <?php echo apply_filters('the_title',$atts['c_title']);?>
                </span>
            <?php endif;?>
        </div>
    </div>
</div>