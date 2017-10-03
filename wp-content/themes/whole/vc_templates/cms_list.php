<?php
extract(shortcode_atts(array(       
    'list_style' => 'list-style1',                  
    'cms_list_fontsize' => '',                  
    'cms_list_lineheight' => '',                  
    'cms_list_color' => '',                  
    'cms_list' => '',                  
    'cms_list_item' => '',                  
), $atts));

$cms_lists = array();
$cms_lists = (array) vc_param_group_parse_atts($cms_list);

?>
<div class="cms-lists">
    <div class="cms-list-inner">
        <div class="cms-list-content">
            <?php if($list_style == 'list-style8') { ?>
                <ol class="list-style <?php echo esc_attr($list_style); ?>" style="font-size: <?php echo esc_attr($cms_list_fontsize); ?>; line-height: <?php echo esc_attr($cms_list_lineheight); ?>; color: <?php echo esc_attr($cms_list_color); ?>">
                    <?php foreach ($cms_lists as $key => $value) { ?>
                        <li><?php echo esc_html($value['cms_list_item']); ?></li>
                    <?php } ?>
                </ol>
            <?php } else { ?>
                <ul class="list-style <?php echo esc_attr($list_style); ?>" style="font-size: <?php echo esc_attr($cms_list_fontsize); ?>; line-height: <?php echo esc_attr($cms_list_lineheight); ?>; color: <?php echo esc_attr($cms_list_color); ?>">
                    <?php foreach ($cms_lists as $key => $value) { ?>
                        <li><?php echo esc_html($value['cms_list_item']); ?></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>