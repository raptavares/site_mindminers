<?php
	$params = array(
		array(
			'type' => 'cms_template_img',
		    'param_name' => 'cms_template',
		    "shortcode" => "cms_counter_single",
		    "heading" => esc_html__("Shortcode Template", 'whole'),
		    "admin_label" => true,
		    "group" => esc_html__("Template", 'whole'),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Title Color", 'whole'),
			"param_name" => "title_color",
			"value" => "",
			"group" => esc_html__("Template", 'whole')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Font Size", 'whole'),
			"param_name" => "title_fontsize",
			"value" => "",
			"group" => esc_html__("Template", 'whole'),
			"description" => esc_html__("Enter: ...px", 'whole'),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Margin", 'whole'),
			"param_name" => "title_margin",
			"value" => "",
			"group" => esc_html__("Template", 'whole'),
			"description" => esc_html__("Enter: ...px", 'whole'),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Digit Color", 'whole'),
			"param_name" => "digit_color",
			"value" => "",
			"group" => esc_html__("Template", 'whole')
		),	
		array(
			"type" => "textfield",
			"heading" => esc_html__("Digit Font Size", 'whole'),
			"param_name" => "digit_fontsize",
			"value" => "",
			"group" => esc_html__("Template", 'whole'),
			"description" => esc_html__("Enter: ...px", 'whole'),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Custom Icon -  Add Class Icon","whole"),
			"param_name" => "icon_custom",
			"value" => "",
			"group" => esc_html__("Template", 'whole'),
			"description" => 'Please add class icon. Use the library <a href="https://linearicons.com/free" target="_blank">Linearicons Free</a>, <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">FontAwesome</a>',
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Icon Color", 'whole'),
			"param_name" => "icon_color",
			"value" => "",
			"group" => esc_html__("Template", 'whole')
		),
		array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Line Counter", 'whole'),
            'param_name' => 'line',
            'value' => array(
                'Show' => 'show',   
                'Hide' => 'hide',  
            ),
            "group" => esc_html__("Template", 'whole'),
        ), 
        array(
			"type" => "colorpicker",
			"heading" => esc_html__("Line Color", 'whole'),
			"param_name" => "line_color",
			"value" => "",
			"group" => esc_html__("Template", 'whole')
		),	 
	);
	vc_remove_param( "cms_counter_single", "title" );
	vc_remove_param( "cms_counter_single", "description" );
	vc_remove_param( "cms_counter_single", "content_align" );
	vc_remove_param( "cms_counter_single", "suffix" );
	vc_remove_param( "cms_counter_single", "prefix" );
?>