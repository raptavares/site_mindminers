<?php
extract(shortcode_atts(array(         
    'edge_style' => 'style1',       
    'edge_position' => 'top',             
    'edge_color' => '#fff',             
    'edge_height' => '90px',             
), $atts));
$html_id = cmsHtmlID('cms-edge');
$atts['html_id'] = $html_id;
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-edge-wrapper edge-<?php echo esc_attr($edge_position); ?> edge-<?php echo esc_attr($edge_style); ?>">
    <div class="cms-edge-inner">
    	<?php if($edge_style == 'style1') { ?>
        	<svg style="fill:<?php echo esc_attr($edge_color); ?>" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="<?php echo esc_attr($edge_height); ?>"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"/></svg>
    	<?php } elseif ($edge_style == 'style2') { ?>
    		<svg style="fill:<?php echo esc_attr($edge_color); ?>" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="<?php echo esc_attr($edge_height); ?>"><path stroke="" stroke-width="0" d="M0 0 L50 100 L100 0 L100 100 L0 100"/></svg>
    	<?php } else { ?>
    		<svg style="fill:<?php echo esc_attr($edge_color); ?>" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="<?php echo esc_attr($edge_height); ?>"><path stroke="" stroke-width="0" d="M0 0 L100 0 L50 100 Z"/></svg>
    	<?php } ?>
    </div>
</div>