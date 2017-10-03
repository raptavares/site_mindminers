<?php
	$params = array(
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", 'whole'),
            "param_name" => "title_color",
            "value" => "",
            "group" => esc_html__("Template", 'whole'),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Value Color", 'whole'),
            "param_name" => "value_color",
            "value" => "",
            "group" => esc_html__("Template", 'whole'),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Progress Background Color", 'whole'),
            "param_name" => "progress_bg_color",
            "value" => "",
            "group" => esc_html__("Template", 'whole'),
        ),
	);
	vc_remove_param('cms_progressbar','cms_template');
	$cms_template_attribute = array(
		'type' => 'cms_template_img',
	    'param_name' => 'cms_template',
	    "shortcode" => "cms_progressbar",
	    "heading" => esc_html__("Shortcode Template", 'whole'),
	    "admin_label" => true,
	    "group" => esc_html__("Template", 'whole'),
		);
	vc_add_param('cms_progressbar',$cms_template_attribute);
	vc_remove_param( "cms_progressbar", "width" );
	vc_remove_param( "cms_progressbar", "height" );
	vc_remove_param( "cms_progressbar", "border_radius" );
	vc_remove_param( "cms_progressbar", "striped" );
	vc_remove_param( "cms_progressbar", "bg_color" );
	vc_remove_param( "cms_progressbar", "mode" );
?>