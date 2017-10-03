<?php
	$params = array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Hide Feature Image", 'whole'),
            "param_name" => "hide_feature_image",
            "value" => array(
            	"No" => "",
                "Yes" => "yes",                          
            ),
            "template" => array(
                "cms_grid--layout-blog1.php",
            ),
            "group" => esc_html__("Template", 'whole'),
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
                "cms_grid--layout-team1.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Image Crop", 'whole'),
            "admin_label" => true,
            "param_name" => "image_crop",
            "value" => array(
                "No" => "no",
                "Yes" => "yes",
            ),
            "group" => esc_html__("Template", 'whole'),
            "template" => array(
                "cms_grid--portfolio-standard.php",
                "cms_grid--portfolio-grid.php",
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Item Space","whole"),
            "param_name" => "item_space",
            "value" => "",
            "description" => "Default: 15px",
            "group" => esc_html__("Template", 'whole'),
            "template" => array(
                "cms_grid--portfolio-grid.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Paging Nav Show/Hide", 'whole'),
            "admin_label" => true,
            "param_name" => "nav_show_hide",
            "value" => array(
                "Show" => "show",
                "Hidden" => "hiden",
            ),
            "group" => esc_html__("Template", 'whole'),
            "template" => array(
                "cms_grid--portfolio-standard.php",
                "cms_grid--portfolio-grid.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Paging Nav Style", 'whole'),
            "admin_label" => true,
            "param_name" => "nav_style",
            "value" => array(
                "Default" => "nav",
                "Load More" => "loadmore",
            ),
            "group" => esc_html__("Template", 'whole'),
            "template" => array(
                "cms_grid--portfolio-standard.php",
                "cms_grid--portfolio-grid.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Button Loadmore Style", 'whole'),
            "admin_label" => true,
            "param_name" => "btn_load_style",
            "value" => array(
                "Modern" => "modern",
                "Outline" => "outline",
            ),
            "group" => esc_html__("Template", 'whole'),
            "template" => array(
                "cms_grid--portfolio-standard.php",
                "cms_grid--portfolio-grid.php",
            ),
        ),
	);
	vc_remove_param('cms_grid','cms_template');
	$cms_template_attribute = array(
		'type' => 'cms_template_img',
	    'param_name' => 'cms_template',
	    "shortcode" => "cms_grid",
	    "heading" => esc_html__("Shortcode Template", 'whole'),
	    "admin_label" => true,
	    "group" => esc_html__("Template", 'whole'),
		);
	vc_add_param('cms_grid',$cms_template_attribute);
?>