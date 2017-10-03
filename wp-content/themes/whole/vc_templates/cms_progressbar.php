<?php 
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $title_color = isset($atts['title_color']) ? $atts['title_color'] : '';
    $value_color = isset($atts['value_color']) ? $atts['value_color'] : '';
    $progress_bg_color = isset($atts['progress_bg_color']) ? $atts['progress_bg_color'] : '';
?>
<div class="cms-progress-wraper cms-progress-layout1 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
        $item_title     = $atts['item_title'];
        $show_value     = ($atts['show_value']=='true')?true:false;
        $value          = $atts['value'];
        $value_suffix   = $atts['value_suffix'];
        $bg_color       = $atts['bg_color'];
        $color          = $atts['color'];
        ?>
        <div class="cms-progress-inner">
            
            <div class="cms-progress-icon">
                <i class="<?php echo esc_attr($iconClass);?>"></i>
            </div> 

            <div class="cms-progress-content">
                <?php if($item_title):?>
                    <h3 class="cms-progress-title ft-nvsb" style="color:<?php echo esc_attr($title_color); ?>;">
                        <?php echo apply_filters('the_title',$item_title);?>
                    </h3>
                <?php endif;?>
                <div class="cms-progress progress" style="background-color:<?php echo esc_attr($progress_bg_color); ?>;">
                    <div id="item-<?php echo esc_attr($atts['html_id']); ?>" class="progress-bar" role="progressbar" data-valuetransitiongoal="<?php echo esc_attr($value); ?>" style="background-color:<?php echo esc_attr($color);?>;">
                        <span class="progress-couter" style="color:<?php echo esc_attr($value_color); ?>;">
                            <?php if($show_value): ?>
                                <?php echo esc_attr($value.$value_suffix);?>
                            <?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
</div>