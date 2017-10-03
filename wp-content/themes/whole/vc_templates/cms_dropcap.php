<?php
extract(shortcode_atts(array(       
    'dropcap_content' => '',                                          
    'dropcap_style' => 'style1',                                          
), $atts));
$first_letter = substr($dropcap_content, 0, 1);
?>
<div class="cms-dropcap">
	<div class="cms-dropcap-content <?php echo esc_attr($dropcap_style); ?>">
        <span class="first-letter"><?php echo esc_attr($first_letter); ?></span>
		<?php echo substr($dropcap_content, 1, strlen($dropcap_content)); ?>
	</div>
</div>