<?php 
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
?>
<div class="cms-counter-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
	<?php if($atts['title']!=''):?>
        <div class="cms-counter-head">
            <div class="cms-counter-title">
                <?php echo apply_filters('the_title',$atts['title']);?>
            </div>
            <div class="cms-counter-description">
                <?php echo apply_filters('the_content',$atts['description']);?>
            </div>
        </div>
    <?php endif;?>
    <div class="cms-counter-body">
        <div class="cms-counter-single">
	        <?php if( $iconClass ): ?>
				<span class="cms-icon"><i class="<?php echo esc_attr($iconClass); ?>"></i></span>
			<?php endif; ?>
			<div id="counter_<?php echo esc_attr($atts['html_id']);?>" class="cms-counter <?php echo esc_attr(strtolower($atts['type']));?>" data-suffix="<?php echo esc_attr($atts['suffix']);?>" data-prefix="<?php echo esc_attr($atts['prefix']);?>" data-type="<?php echo esc_attr(strtolower($atts['type']));?>" data-digit="<?php echo esc_attr($atts['digit']);?>">
			</div>
	        <?php if($atts['c_title']):?>
	            <h3><?php echo apply_filters('the_title',$atts['c_title']);?></h3>
	        <?php endif;?>
		</div>
    </div>
</div>