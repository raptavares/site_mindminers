<?php
	$params = array(
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Image Crop", 'whole'),
            "admin_label" => true,
            "param_name" => "image_crop",
            "value" => array(
                "Full" => "full",
                "Size 337x400" => "whole_team_337x400",
                "Size 400x400" => "whole_team_400x400",
            ),
            "group" => esc_html__("Template", 'whole'),
            "template" => array(
                "cms_carousel--layout-team1.php",
                "cms_carousel--layout-team2.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Show Content", 'whole'),
            "admin_label" => true,
            "param_name" => "show_content",
            "value" => array(
                "Yes" => "yes",
                "No" => "no",
            ),
            "group" => esc_html__("Template", 'whole'),
            "template" => array(
                "cms_carousel--layout-team1.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Dots Carousel Style", 'whole'),
            "admin_label" => true,
            "param_name" => "dot_style",
            "value" => array(
                "Dark" => "dark",
                "White" => "white",
                "Gray" => "gray",
            ),
            "group" => esc_html__("Template", 'whole'),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Item Title Color", 'whole'),
            "param_name" => "title_color",
            "value" => "",
            "group" => esc_html__("Template", 'whole'),
            "template" => array(
                "cms_carousel--layout-teatimonial1.php",
                "cms_carousel--layout-team1.php",
                "cms_carousel--layout-team2.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Box Style", 'whole'),
            "admin_label" => true,
            "param_name" => "box_style",
            "value" => array(
                "Light" => "light",
                "Dark" => "dark",
            ),
            "group" => esc_html__("Template", 'whole'),
            "template" => array(
                "cms_carousel--layout-blog1.php",
            ),
        ),
	);
    vc_remove_param('cms_carousel','l_icon_type');
    vc_remove_param('cms_carousel','l_icon_fontawesome');
    vc_remove_param('cms_carousel','l_icon_openiconic');
    vc_remove_param('cms_carousel','l_icon_typicons');
    vc_remove_param('cms_carousel','l_icon_entypo');
    vc_remove_param('cms_carousel','l_icon_glyphicons');
    vc_remove_param('cms_carousel','l_icon_rticon');
    vc_remove_param('cms_carousel','l_icon_pe7stroke');
    vc_remove_param('cms_carousel','l_icon_pixelicons');
    vc_remove_param('cms_carousel','l_icon_linecons');

    vc_remove_param('cms_carousel','r_icon_type');
    vc_remove_param('cms_carousel','r_icon_type');
    vc_remove_param('cms_carousel','r_icon_fontawesome');
    vc_remove_param('cms_carousel','r_icon_openiconic');
    vc_remove_param('cms_carousel','r_icon_typicons');
    vc_remove_param('cms_carousel','r_icon_entypo');
    vc_remove_param('cms_carousel','r_icon_glyphicons');
    vc_remove_param('cms_carousel','r_icon_rticon');
    vc_remove_param('cms_carousel','r_icon_pe7stroke');
    vc_remove_param('cms_carousel','r_icon_pixelicons');
    vc_remove_param('cms_carousel','r_icon_linecons');

	vc_remove_param('cms_carousel','cms_template');
	$cms_template_attribute = array(
		'type' => 'cms_template_img',
	    'param_name' => 'cms_template',
	    "shortcode" => "cms_carousel",
	    "heading" => esc_html__("Shortcode Template", 'whole'),
	    "admin_label" => true,
	    "group" => esc_html__("Template", 'whole'),
		);
	vc_add_param('cms_carousel',$cms_template_attribute);
?>