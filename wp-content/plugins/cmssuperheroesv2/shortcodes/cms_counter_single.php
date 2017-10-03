<?php
vc_map(
	array(
		"name" => __("CMS Counter Single", CMS_NAME),
	    "base" => "cms_counter_single",
	    "class" => "vc-cms-counter-single",
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
	        /* Counters */
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Counter",CMS_NAME),
	            "param_name" => "c_title",
	            "description" => __("Title Of Item",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type",CMS_NAME),
	            "param_name" => "type",
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        /* Start icon */
	        array(
				'type' => 'dropdown',
				'heading' => __( 'Icon library', CMS_NAME ),
				'value' => array(
					__( 'Font Awesome', CMS_NAME ) => 'fontawesome',
					__( 'Open Iconic', CMS_NAME ) => 'openiconic',
					__( 'Typicons', CMS_NAME ) => 'typicons',
					__( 'Entypo', CMS_NAME ) => 'entypo',
					__( 'Linecons', CMS_NAME ) => 'linecons',
					__( 'Pixel', CMS_NAME ) => 'pixelicons',
					__( 'P7 Stroke', CMS_NAME ) => 'pe7stroke',
					__( 'RT Icon', CMS_NAME ) => 'rticon',
					//__( 'Glyphicons Icon', CMS_NAME ) => 'glyphicons',
				),
				'param_name' => 'icon_type',
				'description' => __( 'Select icon library.', 'js_composer' ),
				"group" => __("Counters Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', CMS_NAME ),
				'param_name' => 'icon_fontawesome',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'fontawesome',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Counters Settings", CMS_NAME)
			),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', CMS_NAME ),
				'param_name' => 'icon_openiconic',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'openiconic',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'openiconic',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Counters Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', CMS_NAME ),
				'param_name' => 'icon_typicons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'typicons',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Counters Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', CMS_NAME ),
				'param_name' => 'icon_entypo',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'entypo',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Counters Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', CMS_NAME ),
				'param_name' => 'icon_linecons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Counters Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', CMS_NAME ),
				'param_name' => 'icon_pixelicons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'pixelicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'pixelicons',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Counters Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', CMS_NAME ),
				'param_name' => 'icon_pe7stroke',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'pe7stroke',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'pe7stroke',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Counters Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', CMS_NAME ),
				'param_name' => 'icon_rticon',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'rticon',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'rticon',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Counters Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon Item', CMS_NAME ),
				'param_name' => 'icon_glyphicons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'glyphicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'glyphicons',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Counters Settings", CMS_NAME)
			),
			/* End Icon */
	        array(
	            "type" => "textfield",
	            "heading" => __("Digit",CMS_NAME),
	            "param_name" => "digit",
	            "value" => "69",
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix",CMS_NAME),
	            "param_name" => "suffix",
	            "value" => "",
	            "description" => __("",CMS_NAME),
	            "group" => __("Counters Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Prefix",CMS_NAME),
	            "param_name" => "prefix",
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
	            "shortcode" => "cms_counter_single",
	            "admin_label" => true,
	            "group" => __("Template", CMS_NAME),
	        )
		)
	)
);
class WPBakeryShortCode_cms_counter_single extends CmsShortCode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'title' => '',
			'c_title' => '',
			'type' => 'Zero',
			'icon_type' => 'fontawesome',
			'icon_fontawesome' => '',
			'icon_openiconic' => '',
			'icon_typicons' => '',
			'icon_entypoicons' => '',
			'icon_linecons' => '',
			'icon_entypo' => '',
			'icon_pe7stroke' => '',
			'icon_glyphicons' => '',
			'description' => '',
			'content_align' => 'default',
			'cms_template' => 'cms_counter_single.php',
			'digit' => '69',
			'suffix' => '',
			'prefix' => '',
			'class' => '',
			    ), $atts);
		$atts = array_merge($atts_extra,$atts);
		wp_register_script('counter', CMS_JS. 'counter.min.js', array('jquery'),'1.0.0',true);
		if(file_exists(get_template_directory().'/assets/js/counter.cms.js')){
			wp_register_script('counter-cms', get_template_directory_uri().'/assets/js/counter.cms.js', array('counter','waypoints'),'1.0.0',true);
		}else{
			wp_register_script('counter-cms', CMS_JS. 'counter.cms.js', array('counter','waypoints'),'1.0.0',true);
		}
		$atts['icon_type'] = isset($atts['icon_type'])?$atts['icon_type']:'fontawesome';
		switch ($atts['icon_type']) {
			case 'pe7stroke':
				wp_enqueue_style('cms-icon-pe7stroke', CMS_CSS. 'Pe-icon-7-stroke.css');
				break;
			case 'glyphicons':
				wp_enqueue_style('cms-icon-glyphicons', CMS_CSS. 'glyphicons.css');
				break;
			case 'rticon':
				wp_enqueue_style('cms-icon-rticon', CMS_CSS. 'rticon.css');
				break;
			default:
				vc_icon_element_fonts_enqueue( $atts['icon_type'] );
				break;
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