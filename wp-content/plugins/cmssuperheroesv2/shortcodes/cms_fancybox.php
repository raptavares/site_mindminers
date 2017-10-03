<?php
vc_map(
	array(
		"name" => __("CMS Fancy Box", CMS_NAME),
	    "base" => "cms_fancybox",
	    "class" => "vc-cms-fancy-boxes",
	    "category" => __("CmsSuperheroes Shortcodes", CMS_NAME),
	    "params" => array(
	    	array(
	            "type" => "textfield",
	            "heading" => __("Title",CMS_NAME),
	            "param_name" => "title",
	            "value" => "",
	            "description" => __("Title Of Fancy Icon Box",CMS_NAME),
	            "group" => __("General Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Description",CMS_NAME),
	            "param_name" => "description",
	            "value" => "",
	            "description" => __("Description Of Fancy Icon Box",CMS_NAME),
	            "group" => __("General Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Content Align",CMS_NAME),
	            "param_name" => "content_align",
	            "value" => array(
	            	"Default" => "default",
	            	"Left" => "left",
	            	"Right" => "right",
	            	"Center" => "center"
	            	),
	            "group" => __("General Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Select Number Cols",CMS_NAME),
	            "param_name" => "cms_cols",
	            "value" => array(
	            	"1 Column",
	            	"2 Columns",
	            	"3 Columns",
	            	"4 Columns",
	            	"6 Columns",
	            	),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        /* Start Items */
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 1",CMS_NAME),
	            "param_name" => "heading_1",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 1', CMS_NAME ),
				'param_name' => 'icon1',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Fancy Icon Settings", CMS_NAME)
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 1",CMS_NAME),
	            "param_name" => "image1",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 1",CMS_NAME),
	            "param_name" => "title1",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "value" => "",
	            "description" => __("Title Of Item",CMS_NAME),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 1",CMS_NAME),
	            "param_name" => "description1",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 1",CMS_NAME),
	            "param_name" => "button_link1",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						"1 Column"
						)
	            	),
	            "value" => "#",
	            "description" => __("",CMS_NAME),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 2",CMS_NAME),
	            "param_name" => "heading_2",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 2', CMS_NAME ),
				'param_name' => 'icon2',
				'dependency' => array(
						"element"=>"cms_cols",
						"value"=>array(
							"2 Columns",
							"6 Columns",
							"4 Columns",
							"3 Columns",
						)
					),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Fancy Icon Settings", CMS_NAME)
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 2",CMS_NAME),
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "param_name" => "image2",
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 2",CMS_NAME),
	            "param_name" => "title2",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("Title Of Item",CMS_NAME),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 2",CMS_NAME),
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "param_name" => "description2",
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 2",CMS_NAME),
	            "param_name" => "button_link2",
	            "value" => "#",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("",CMS_NAME),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 3",CMS_NAME),
	            "param_name" => "heading_3",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 3', CMS_NAME ),
				'dependency' => array(
					"element"=>"cms_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
				'param_name' => 'icon3',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Fancy Icon Settings", CMS_NAME)
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 3",CMS_NAME),
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "param_name" => "image3",
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 3",CMS_NAME),
	            "param_name" => "title3",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("Title Of Item",CMS_NAME),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 3",CMS_NAME),
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "param_name" => "description3",
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 3",CMS_NAME),
	            "param_name" => "button_link3",
	            "value" => "#",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
	            	),
	            "description" => __("",CMS_NAME),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 4",CMS_NAME),
	            "param_name" => "heading_4",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 4', CMS_NAME ),
				'param_name' => 'icon4',
				'dependency' => array(
					"element"=>"cms_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Fancy Icon Settings", CMS_NAME)
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 4",CMS_NAME),
	            "param_name" => "image4",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						)
	            	),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 4",CMS_NAME),
	            "param_name" => "title4",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						)
	            	),
	            "description" => __("Title Of Item",CMS_NAME),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 4",CMS_NAME),
	            "param_name" => "description4",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						)
	            	),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 4",CMS_NAME),
	            "param_name" => "button_link4",
	            "value" => "#",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						)
	            	),
	            "description" => __("",CMS_NAME),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 5",CMS_NAME),
	            "param_name" => "heading_5",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>"6 Columns"
					),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 5', CMS_NAME ),
				'param_name' => 'icon5',
				'dependency' => array(
					"element"=>"cms_cols",
					"value"=>"6 Columns"
					),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Fancy Icon Settings", CMS_NAME)
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 5",CMS_NAME),
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>"6 Columns"
	            	),
	            "param_name" => "image5",
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 5",CMS_NAME),
	            "param_name" => "title5",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						)
	            	),
	            "description" => __("Title Of Item",CMS_NAME),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 5",CMS_NAME),
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>"6 Columns"
	            	),
	            "param_name" => "description5",
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 5",CMS_NAME),
	            "param_name" => "button_link5",
	            "value" => "#",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						)
	            	),
	            "description" => __("",CMS_NAME),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Fancy Box 6",CMS_NAME),
	            "param_name" => "heading_6",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>"6 Columns"
					),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item 6', CMS_NAME ),
				'param_name' => 'icon6',
				'dependency' => array(
					"element"=>"cms_cols",
					"value"=>"6 Columns"
					),
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Fancy Icon Settings", CMS_NAME)
			),
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item 6",CMS_NAME),
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>"6 Columns"
	            	),
	            "param_name" => "image6",
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item 6",CMS_NAME),
	            "param_name" => "title6",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						)
	            	),
	            "description" => __("Title Of Item",CMS_NAME),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item 6",CMS_NAME),
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>"6 Columns"
	            	),
	            "param_name" => "description6",
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Link 6",CMS_NAME),
	            "param_name" => "button_link6",
	            "value" => "#",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						)
	            	),
	            "description" => __("",CMS_NAME),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        /* End Items */
	        array(
	            "type" => "dropdown",
	            "heading" => __("Button Type",CMS_NAME),
	            "param_name" => "button_type",
	            "value" => array(
	            	"Button" => "button",
	            	"Text" => "text"
	            	),
	            "group" => __("Buttons Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Text",CMS_NAME),
	            "param_name" => "button_text",
	            "value" => "",
	            "description" => __("",CMS_NAME),
	            "group" => __("Buttons Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Extra Class",CMS_NAME),
	            "param_name" => "class",
	            "value" => "",
	            "description" => __("",CMS_NAME),
	            "group" => __("Template", CMS_NAME)
	        ),
	    	array(
	            "type" => "cms_template",
	            "param_name" => "cms_template",
	            "admin_label" => true,
	            "heading" => __("Shortcode Template",CMS_NAME),
	            "shortcode" => "cms_fancybox",
	            "group" => __("Template", CMS_NAME),
	        )
		)
	)
);
class WPBakeryShortCode_cms_fancybox extends CmsShortCode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'title' => '',
			'description' => '',
			'content_align' => 'default',
			'cms_cols' => '1 Column',
			'button_type'=> 'button',
			'button_text'=> '',
			'button_link'=> '#',
			'cms_template' => 'cms_fancybox.php',
			'class' => '',
			    ), $atts);
		$atts = array_merge($atts_extra,$atts);
        $html_id = cmsHtmlID('cms-fancy-box');
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']). ' content-align-' . $atts['content_align'] . ' '. $atts['class'];
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>