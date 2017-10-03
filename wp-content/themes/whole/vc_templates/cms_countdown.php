<?php
	$date_count_down = !empty($atts['date_count_down'])?$atts['date_count_down']:'2020/10/10';
?>
<div class="cms-countdown-wraper <?php echo esc_attr($atts['template']);?> clearfix" id="<?php echo esc_attr($atts['html_id']);?>">
	<div id="getting-started" data-count-down="<?php echo esc_attr($date_count_down);?>"></div>
</div>
