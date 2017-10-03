<?php
extract(shortcode_atts(array(                                  
    'description' => '',              
    'typingout' => '',                                   
    'font_size' => '',                                   
    'line_height' => '',                                   
    'color' => '',                                   
    'font_family' => 'ft-pr',                                   
), $atts));

?>
<div class="cms-typingout <?php echo esc_attr($font_family); ?>" style="color:<?php echo esc_attr($color);?>;font-size:<?php echo esc_attr($font_size);?>;line-height:<?php echo esc_attr($line_height);?>;">
	<span class="cms-typingout-content"><?php echo esc_attr($description); ?></span>
	<span class="cms-typingout-typed" data-period="2000" data-type='[ <?php echo esc_attr($typingout); ?> ]'>
		<span class="cms-typingout-animation"></span>
	</span>
	<span class="cms-typingout-cursor">_</span>
</div>