<?php
extract(shortcode_atts(array(                                  
    'title' => '',              
    'description' => '',                                     
    'price' => '',                                     
), $atts));

?>
<div class="cmsrt">
	<div class="cmsrt-item">
		<div class="cmsrt-meta">
			<div class="cmsrt-title-line"></div>
			<div class="cmsrt-title-holder"><h3><?php echo esc_attr($title); ?></h3></div>
			<div class="cmsrt-price"><?php echo esc_attr($price); ?></div>
		</div>
		<div class="cmsrt-desc"><?php echo esc_attr($description); ?></div>
	</div>
</div>