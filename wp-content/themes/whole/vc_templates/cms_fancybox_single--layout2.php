<?php 
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $number = isset($atts['number']) ? $atts['number'] : '';
    $font_family_custom = isset($atts['font_family_custom']) ? $atts['font_family_custom'] : '';
    $title_font_size = isset($atts['title_font_size']) ? $atts['title_font_size'] : '';
    $title_line_height = isset($atts['title_line_height']) ? $atts['title_line_height'] : '';
    $title_margin = isset($atts['title_margin']) ? $atts['title_margin'] : '';
    $title_color = isset($atts['title_color']) ? $atts['title_color'] : '';
    $decs_color = isset($atts['decs_color']) ? $atts['decs_color'] : '';

?>
<div class="cms-fancyboxes-wraper cms-fancyboxes-layout2 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="cms-fancybox-item">
        <?php 
            $image_url = '';
            if (!empty($atts['image'])) {
                $attachment_image = wp_get_attachment_image_src($atts['image'], 'full');
                $image_url = $attachment_image[0];
            }
        ?>
        
        <?php if($image_url):?>
            <div class="cms-fancybox-icon">
                <a href="<?php echo esc_url($atts['button_link']);?>"><img src="<?php echo esc_attr($image_url);?>" alt="" /></a>
            </div>
        <?php else:?>
            <div class="cms-fancybox-icon">
                <i class="<?php echo esc_attr($iconClass); ?>"></i>
            </div>
        <?php endif;?>
        
        <div class="cms-fancybox-content">
            <?php if($atts['title_item']):?>
                <h3 class="cms-fancybox-title <?php echo esc_attr($font_family_custom); ?>" style="font-size:<?php echo esc_attr($title_font_size); ?>;line-height:<?php echo esc_attr($title_line_height); ?>;color:<?php echo esc_attr($title_color); ?>;margin:<?php echo esc_attr($title_margin); ?>;">
                    <span><?php echo esc_attr($number).'.'; ?></span><?php echo apply_filters('the_title',$atts['title_item']);?>
                </h3>
            <?php endif;?>
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