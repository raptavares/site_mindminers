<?php
extract(shortcode_atts(array(         
    'description' => '',              
    'description_color' => '',  
    'desc_font_family' => '',             
    'title' => '',              
    'title_color' => '',              
    'title_font_size' => '',              
    'title_line_height' => '', 
    'title_font_family' => 'ft-df',             
    'title_margin' => '',    
    'title_resize' => '',    
    'line_position' => 'bottom-title',  
    'typingout' => '', 

), $atts));
$html_id = cmsHtmlID('cms-heading');
$atts['html_id'] = $html_id;
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-heading-wrapper cms-heading-layout1">
    <div class="cms-heading-inner">
        <div class="cms-heading-content">
            <h3 class="title <?php echo esc_attr($title_resize); ?> <?php echo esc_attr($title_font_family); ?>" style="font-size:<?php echo esc_attr($title_font_size); ?>;color:<?php echo esc_attr($title_color); ?>;margin:<?php echo esc_attr($title_margin); ?>;line-height:<?php echo esc_attr($title_line_height); ?>;">
                <?php echo wp_kses_post($title); ?>
                <span class="cms-typingout-typed" data-period="2000" data-type='[ <?php echo esc_attr($typingout); ?> ]'>
                    <span class="cms-typingout-animation"></span>
                </span>
            </h3>
            <?php if($line_position == 'bottom-title'){ ?>
                <div class="h-line">
                    <span class="line1"></span>
                    <span class="line2"></span>
                    <span class="line3"></span>
                    <span class="line4"></span>
                    <span class="line5"></span>
                    <span class="line6"></span>
                </div>
            <?php } ?>
            <div class="description <?php echo esc_attr($desc_font_family); ?>" style="color:<?php echo esc_attr($description_color); ?>;"><?php echo wp_kses_post($description); ?></div>
            <?php if($line_position == 'bottom-content'){ ?>
                <div class="h-line">
                    <span class="line1"></span>
                    <span class="line2"></span>
                    <span class="line3"></span>
                    <span class="line4"></span>
                    <span class="line5"></span>
                    <span class="line6"></span>
                </div>
            <?php } ?>
        </div>
    </div>
</div>