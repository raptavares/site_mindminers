<?php 
    $number = isset($atts['number']) ? $atts['number'] : '';
    $font_family_custom = isset($atts['font_family_custom']) ? $atts['font_family_custom'] : '';
    $title_font_size = isset($atts['title_font_size']) ? $atts['title_font_size'] : '';
    $title_line_height = isset($atts['title_line_height']) ? $atts['title_line_height'] : '';
    $title_margin = isset($atts['title_margin']) ? $atts['title_margin'] : '';
    $title_color = isset($atts['title_color']) ? $atts['title_color'] : '';
    $subtitle = isset($atts['subtitle']) ? $atts['subtitle'] : '';
    $subtitle_color = isset($atts['subtitle_color']) ? $atts['subtitle_color'] : '';
    $decs_color = isset($atts['decs_color']) ? $atts['decs_color'] : '';
    $numbered_align = isset($atts['numbered_align']) ? $atts['numbered_align'] : 'left';

?>
<div class="cms-fancyboxes-wraper cms-fancyboxes-layout3 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="cms-fancybox-item">
        <div class="cms-fancybox-header number-<?php echo esc_attr($numbered_align); ?>">
            <?php if(!empty($number)) { ?>
                <span class="cms-fancybox-number"><?php echo esc_attr($number).'.'; ?></span>
            <?php } ?>
            <span class="cms-fancybox-subtitle" style="color:<?php echo esc_attr($subtitle_color); ?>;"><?php echo esc_attr($subtitle); ?></span>
            <?php if($atts['title_item']):?>
                <h3 class="cms-fancybox-title <?php echo esc_attr($font_family_custom); ?>" style="font-size:<?php echo esc_attr($title_font_size); ?>;line-height:<?php echo esc_attr($title_line_height); ?>;color:<?php echo esc_attr($title_color); ?>;margin:<?php echo esc_attr($title_margin); ?>;">
                    <?php echo apply_filters('the_title',$atts['title_item']);?>
                </h3>
            <?php endif;?>
        </div>
        <div class="cms-fancybox-content">
            <?php if($atts['description_item']): ?>
                <div class="cms-fancybox-description" style="color:<?php echo esc_attr($decs_color); ?>;">
                    <?php echo apply_filters('the_content',$atts['description_item']);?>
                </div>
            <?php endif; ?>

            <?php if($atts['button_text']!=''):?>
                <div class="cms-button-wrapper">
                    <a href="<?php echo esc_url($atts['button_link']);?>"><span class="btn-text"><?php echo esc_attr($atts['button_text']);?></span></a>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>