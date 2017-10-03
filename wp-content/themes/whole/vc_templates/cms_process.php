<?php
extract(shortcode_atts(array(                                  
    'process_title1' => '',              
    'process_title2' => '',              
    'process_title3' => '',              
    'process_title4' => '',               
    'process_description1' => '',              
    'process_description2' => '',       
    'process_description3' => '',       
    'process_description4' => '',                      
    'icon1' => '',                      
    'icon2' => '',                      
    'icon3' => '',                      
    'icon4' => '',                      
    'image1' => '',                      
    'image2' => '',                      
    'image3' => '',                      
    'image4' => '',                      
    'icon_style' => 'style1',                      
), $atts));

?>
<div class="cms-process cms-process-layout-default text-center icon-<?php echo esc_attr($icon_style); ?>">
	<ul class="cms-process-list clearfix">
		<?php
	        for($i=1;$i<5;$i++){
	            $title = ${"process_title".$i};
	            $description = ${"process_description".$i};
	            $icon = ${"icon".$i};

	            $image_url = '';

				if (!empty($atts['image'.$i])) {
				    $attachment_image = wp_get_attachment_image_src($atts['image'.$i], 'full');
				    $image_url = $attachment_image[0];
				}

	            if(!empty($title) && !empty($description)): ?>
		            <li class="cms-process-item col-md-3 col-sm-6 col-xs-12 clearfix">
		            	<span class="cms-process-icon rda_zoomIn" style="background-image: url(<?php echo esc_url($image_url); ?>);">
		            		<i class="<?php echo esc_attr($icon); ?>"></i>
		            	</span>
		            	<div class="cms-process-content">
		            		<h3 class="cms-process-title"><span><?php echo '0'.esc_attr($i-0).'.'; ?></span><?php echo esc_attr($title); ?></h3>
		                	<div class="cms-process-desc"><?php echo apply_filters('the_content', $description); ?></div>
		                	<div class="h-line">
			                    <span class="line1"></span>
			                    <span class="line2"></span>
			                </div>
		            	</div>
		            </li>
	            <?php endif;
	        }
	    ?>
	</ul>
</div>