<?php
	$params = array(
		array(
			'type' => 'cms_template_img',
		    'param_name' => 'cms_template',
		    "shortcode" => "cms_fancybox_single",
		    "heading" => esc_html__("Shortcode Template", 'whole'),
		    "admin_label" => true,
		    "group" => esc_html__("Template", 'whole'),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Sub Title","whole"),
			"param_name" => "subtitle",
			"value" => "",
			"group" => esc_html__("Template", 'whole'),
			"template" => array(
                "cms_fancybox_single--layout3.php",
                "cms_fancybox_single--layout4.php",
            ),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Numbered","whole"),
			"param_name" => "number",
			"value" => "",
			"group" => esc_html__("Template", 'whole'),
			"template" => array(
                "cms_fancybox_single--layout2.php",
                "cms_fancybox_single--layout3.php",
            ),
		),
		array(
            "type" => "dropdown",
            "heading" => esc_html__("Numbered Align", 'whole'),
            "param_name" => "numbered_align",
            "value" => array(
	            "Left" => "left",             
	            "Right" => "right",             
            ),
            "group" => esc_html__("Template", 'whole'),
            "template" => array(
                "cms_fancybox_single--layout3.php",
            ),
        ),
		array(
            "type" => "dropdown",
            "heading" => esc_html__("Content Align", 'whole'),
            "param_name" => "fancybox_content_align",
            "value" => array(
                "Center" => "center",
	            "Left" => "left",             
	            "Right" => "right",             
            ),
            "group" => esc_html__("Template", 'whole'),
            "template" => array(
                "cms_fancybox_single.php",
            ),
        ),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Font Size", 'whole'),
			"param_name" => "title_font_size",
			"value" => "",
			"group" => esc_html__("Template", 'whole'),
			"description" => "Enter: ...px"
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Line Height", 'whole'),
			"param_name" => "title_line_height",
			"value" => "",
			"group" => esc_html__("Template", 'whole'),
			"description" => "Enter: ...px"
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Margin", 'whole'),
			"param_name" => "title_margin",
			"value" => "",
			"group" => esc_html__("Template", 'whole'),
			"description" => "Enter: ...px"
		),
		array(
            "type" => "dropdown",
            "heading" => esc_html__("Title Custom Font Family", 'whole'),
            "param_name" => "font_family_custom",
            "value" => array(
                "Default" => "ft-pr",
	            "Poppins Light" => "ft-pl",
	            "Poppins Medium" => "ft-pm",
	            "Poppins Semibold" => "ft-psb",
	            "Poppins Bold" => "ft-pb",              
            ),
            "group" => esc_html__("Template", 'whole'),
        ),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Icon Color", 'whole'),
			"param_name" => "icon_color",
			"value" => "",
			"group" => esc_html__("Template", 'whole'),
			"template" => array(
                "cms_fancybox_single.php",
                "cms_fancybox_single--layout1.php",
            ),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Title Color", 'whole'),
			"param_name" => "title_color",
			"value" => "",
			"group" => esc_html__("Template", 'whole'),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Sub Color", 'whole'),
			"param_name" => "subtitle_color",
			"value" => "",
			"group" => esc_html__("Template", 'whole'),
			"template" => array(
                "cms_fancybox_single--layout3.php",
                "cms_fancybox_single--layout4.php",
            ),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Description Color", 'whole'),
			"param_name" => "decs_color",
			"value" => "",
			"group" => esc_html__("Template", 'whole')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Custom Icon -  Add Class Icon","whole"),
			"param_name" => "icon_custom",
			"value" => "",
			"group" => esc_html__("Template", 'whole'),
			"description" => 'Please add class icon. Use the library <a href="https://linearicons.com/free" target="_blank">Linearicons Free</a>, <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">FontAwesome</a>',
			"template" => array(
                "cms_fancybox_single.php",
                "cms_fancybox_single--layout1.php",
            ),
		),
	);
    vc_remove_param( "cms_fancybox_single", "title" );
    vc_remove_param( "cms_fancybox_single", "description" );
    vc_remove_param( "cms_fancybox_single", "content_align" );
    vc_remove_param( "cms_fancybox_single", "button_type" );
?>