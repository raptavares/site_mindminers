<?php
vc_map(
	array(
		"name" => __("CMS Counter", CMS_NAME),
	    "base" => "cms_counter",
	    "class" => "vc-cms-counter",
	    "category" => __("CmsSuperheroes Shortcodes", CMS_NAME),
	    "params" => array(
	    	array(
	            "type" => "textfield",
	            "heading" => __("Title",CMS_NAME),
	            "param_name" => "title",
	            "value" => "",
	            "description" => __("",CMS_NAME),
	            "group" => __("General Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Description",CMS_NAME),
	            "param_name" => "description",
	            "value" => "",
	            "description" => __("",CMS_NAME),
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
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        /* Counters */
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 1",CMS_NAME),
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
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 1",CMS_NAME),
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
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 1",CMS_NAME),
	            "param_name" => "type1",
	            "value" => array(
	            	"Zero",
	            	"Random"
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
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 1', CMS_NAME ),
				'param_name' => 'icon1',
	            'value' => '',
	            'dependency' => array(
					'element' => 'cms_cols',
					'value' => '1 Column',
				),
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Counters Settings", CMS_NAME)
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 1",CMS_NAME),
	            "param_name" => "digit1",
	            "value" => "69",
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
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 1",CMS_NAME),
	            "param_name" => "suffix1",
	            "value" => "",
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
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Prefix 1",CMS_NAME),
	            "param_name" => "prefix1",
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
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 2",CMS_NAME),
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
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 2",CMS_NAME),
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
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 2",CMS_NAME),
	            "param_name" => "type2",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"2 Columns",
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 2', CMS_NAME ),
				'param_name' => 'icon2',
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
						)
					),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Counters Settings", CMS_NAME)
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 2",CMS_NAME),
	            "param_name" => "digit2",
	            "value" => "69",
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
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 2",CMS_NAME),
	            "param_name" => "suffix2",
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
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Prefix 2",CMS_NAME),
	            "param_name" => "prefix2",
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
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 3",CMS_NAME),
	            "param_name" => "heading_3",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 3",CMS_NAME),
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
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 3",CMS_NAME),
	            "param_name" => "type3",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 3', CMS_NAME ),
				'param_name' => 'icon3',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Counters Settings", CMS_NAME)
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 3",CMS_NAME),
	            "param_name" => "digit3",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "value" => "69",
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 3",CMS_NAME),
	            "param_name" => "suffix3",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "value" => "",
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Prefix 3",CMS_NAME),
	            "param_name" => "prefix3",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						"3 Columns",
						)
					),
	            "value" => "",
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 4",CMS_NAME),
	            "param_name" => "heading_4",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 4",CMS_NAME),
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
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 4",CMS_NAME),
	            "param_name" => "type4",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 4', CMS_NAME ),
				'param_name' => 'icon4',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Counters Settings", CMS_NAME)
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 4",CMS_NAME),
	            "param_name" => "digit4",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
	            "value" => "69",
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 4",CMS_NAME),
	            "param_name" => "suffix4",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
	            "value" => "",
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Prefix 4",CMS_NAME),
	            "param_name" => "prefix4",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>array(
						"6 Columns",
						"4 Columns",
						)
					),
	            "value" => "",
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "heading",
	            "heading" => __("Counter 6",CMS_NAME),
	            "param_name" => "heading_6",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>"6 Columns"
					),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter 6",CMS_NAME),
	            "param_name" => "title6",
	            "value" => "",
	            'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						)
	            	),
	            "description" => __("Title Of Item",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type 6",CMS_NAME),
	            "param_name" => "type6",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>"6 Columns"
					),
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Counter 6', CMS_NAME ),
				'param_name' => 'icon6',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
	            	"element"=>"cms_cols",
	            	"value"=>array(
						"6 Columns",
						)
					),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Counters Settings", CMS_NAME)
			),
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit 6",CMS_NAME),
	            "param_name" => "digit6",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>"6 Columns"
					),
	            "value" => "69",
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Prefix 6",CMS_NAME),
	            "param_name" => "prefix6",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>"6 Columns"
					),
	            "value" => "",
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix 6",CMS_NAME),
	            "param_name" => "suffix6",
	            'dependency' => array(
					"element"=>"cms_cols",
					"value"=>"6 Columns"
					),
	            "value" => "",
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        /* End Counters */
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
	            "heading" => __("Shortcode Template",CMS_NAME),
	            "param_name" => "cms_template",
	            "shortcode" => "cms_counter",
	            "admin_label" => true,
	            "group" => __("Template", CMS_NAME),
	        )
		)
	)
);
class WPBakeryShortCode_cms_counter extends CmsShortCode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'title' => '',
			'description' => '',
			'content_align' => 'default',
			'cms_cols' => '1 Column',
			'cms_template' => 'cms_counter.php',
			'class' => '',
			    ), $atts);
		$atts = array_merge($atts_extra,$atts);
		wp_register_script('counter', CMS_JS. 'counter.min.js', array('jquery'),'1.0.0',true);
		if(file_exists(get_template_directory().'/assets/js/counter.cms.js')){
			wp_register_script('counter-cms', get_template_directory_uri().'/assets/js/counter.cms.js', array('counter','waypoints'),'1.0.0',true);
		}else{
			wp_register_script('counter-cms', CMS_JS. 'counter.cms.js', array('counter','waypoints'),'1.0.0',true);
		}
		
		wp_enqueue_script('counter-cms');
        $html_id = cmsHtmlID('cms-counter');
        $class = ($atts['class'])?$atts['class']:'';
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']). ' content-align-' . $atts['content_align'] . ' '. $class;
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>