<?php
extract(shortcode_atts(array(         
    'subtitle' => '',              
    'subtitle_color' => '',              
    'title' => '',              
    'title_color' => '',              
    'title_font_size' => '',              
    'title_line_height' => '',              
    'title_font_family' => 'ft-df',              
    'title_resize' => '',              
    'title_margin' => '',              
    'description' => '',              
    'description_color' => '',              
    'desc_font_family' => '',              
    'line_position' => 'bottom-title',              
    'icon' => 'hide',              
    'icon_bg_color' => '',              
    'typingout' => '',              
), $atts));
$html_id = cmsHtmlID('cms-heading');
$atts['html_id'] = $html_id;

if(!empty($typingout)) {
    wp_enqueue_script('typingout', get_template_directory_uri() . '/assets/js/typingout.js', array( 'jquery' ), '1.0.0', true);
}
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-heading-wrapper cms-heading-default line-<?php echo esc_attr($line_position); ?>">
    <div class="cms-heading-inner">
        <div class="cms-heading-content">
            <?php if($icon == 'show'){ ?>
                <span class="h-icon" style="background-color: <?php echo esc_attr($icon_bg_color); ?>"></span>
            <?php } ?>
            <span class="subtitle" style="color:<?php echo esc_attr($subtitle_color); ?>;"><?php echo wp_kses_post($subtitle); ?></span>
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
                </div>
            <?php } ?>

            <div class="description <?php echo esc_attr($desc_font_family); ?>" style="color:<?php echo esc_attr($description_color); ?>;"><?php echo wp_kses_post($description); ?></div>

            <?php if($line_position == 'bottom-content'){ ?>
                <div class="h-line">
                    <span class="line1"></span>
                    <span class="line2"></span>
                    <span class="line3"></span>
                </div>
            <?php } ?>
        </div>
    </div>
</div>