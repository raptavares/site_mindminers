<?php
extract(shortcode_atts(array(         
    'video_url' => '',       
    'style_button' => 'style1',           
    'video_intro' => '',           
    'intro_custom' => '',           
    'intro_height' => '',           
    'overlay' => '',           
), $atts));
$html_id = cmsHtmlID('cms-video-popup');
$atts['html_id'] = $html_id;

$image_url = '';
if (!empty($atts['video_intro'])) {
    $attachment_image = wp_get_attachment_image_src($atts['video_intro'], 'full');
    $image_url = $attachment_image[0];
}

?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-video-popup-wrapper <?php if($intro_custom == 'yes') { echo 'intro-active'; } ?>  button-<?php echo esc_attr($style_button); ?>" style="height:<?php echo esc_attr($intro_height); ?>; background-image: url(<?php echo esc_url($image_url); ?>); ">
    <a class="cms-button-video" href="<?php echo esc_url($video_url); ?>"></a>
    <span style="background-color: <?php echo esc_attr($overlay); ?>"></span>
</div>