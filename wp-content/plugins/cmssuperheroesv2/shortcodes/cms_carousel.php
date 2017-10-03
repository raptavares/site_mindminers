<?php
vc_map(
	array(
		"name" => __("CMS Carousel", CMS_NAME),
	    "base" => "cms_carousel",
	    "class" => "vc-cms-carousel",
	    "category" => __("CmsSuperheroes Shortcodes", CMS_NAME),
	    "params" => array(
	    	array(
	            "type" => "loop",
	            "heading" => __("Source",CMS_NAME),
	            "param_name" => "source",
	            'settings' => array(
	                'size' => array('hidden' => false, 'value' => 10),
	                'order_by' => array('value' => 'date')
	            ),
	            "group" => __("Source Settings", CMS_NAME),
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("XSmall Devices",CMS_NAME),
	            "param_name" => "xsmall_items",
	            "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
	            "value" => array(1,2,3,4,5,6),
	            "std" => 1,
	            "group" => __("Carousel Settings", CMS_NAME)
	        ),
	    	array(
	            "type" => "dropdown",
	            "heading" => __("Small Devices",CMS_NAME),
	            "param_name" => "small_items",
	            "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
	            "value" => array(1,2,3,4,5,6),
	            "std" => 2,
	            "group" => __("Carousel Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Medium Devices",CMS_NAME),
	            "param_name" => "medium_items",
	            "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
	            "value" => array(1,2,3,4,5,6),
	            "std" => 3,
	            "group" => __("Carousel Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Large Devices",CMS_NAME),
	            "param_name" => "large_items",
	            "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
	            "value" => array(1,2,3,4,5,6),
	           	"std" => 4,
	            "group" => __("Carousel Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Margin Items",CMS_NAME),
	            "param_name" => "margin",
	            "value" => "10",
	            "description" => __("",CMS_NAME),
	            "group" => __("Carousel Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Loop Items",CMS_NAME),
	            "param_name" => "loop",
	            "value" => array(
	            	"True" => "true",
	            	"False" => "false"
	            	),
	            "group" => __("Carousel Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Mouse Drag",CMS_NAME),
	            "param_name" => "mousedrag",
	            "value" => array(
	            	"True" => "true",
	            	"False" => "false"
	            	),
	            "group" => __("Carousel Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Show Nav",CMS_NAME),
	            "param_name" => "nav",
	            "value" => array(
	            	"True" => "true",
	            	"False" => "false"
	            	),
	            "group" => __("Carousel Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Show Dots",CMS_NAME),
	            "param_name" => "dots",
	            "value" => array(
	            	"True" => "true",
	            	"False" => "false"
	            	),
	            "group" => __("Carousel Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Auto Play",CMS_NAME),
	            "param_name" => "autoplay",
	            "value" => array(
	            	"True" => "true",
	            	"False" => "false"
	            	),
	            "group" => __("Carousel Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Auto Play TimeOut",CMS_NAME),
	            "param_name" => "autoplaytimeout",
	            "value" => "5000",
	            "dependency" => array(
	            	"element"=>"autoplay",
	            	"value" => "true"
	            	),
	            "description" => __("",CMS_NAME),
	            "group" => __("Carousel Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Smart Speed",CMS_NAME),
	            "param_name" => "smartspeed",
	            "value" => "1000",
	            "description" => __("Speed scroll of each item",CMS_NAME),
	            "group" => __("Carousel Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Pause On Hover",CMS_NAME),
	            "param_name" => "autoplayhoverpause",
	            "dependency" => array(
	            	"element"=>"autoplay",
	            	"value" => "true"
	            	),
	            "value" => array(
	            	"True" => "true",
	            	"False" => "false"
	            	),
	            "group" => __("Carousel Settings", CMS_NAME)
	        ),
	        /* Start Icon */
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
				'param_name' => 'l_icon_type',
				'description' => __( 'Select icon library.', 'js_composer' ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Prev Icon', CMS_NAME ),
				'param_name' => 'l_icon_fontawesome',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'fontawesome',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'l_icon_type',
					'value' => 'fontawesome',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Prev Icon', CMS_NAME ),
				'param_name' => 'l_icon_openiconic',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'openiconic',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'l_icon_type',
					'value' => 'openiconic',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Prev Icon', CMS_NAME ),
				'param_name' => 'l_icon_typicons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'l_icon_type',
					'value' => 'typicons',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Prev Icon', CMS_NAME ),
				'param_name' => 'l_icon_entypo',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'entypo',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'l_icon_type',
					'value' => 'entypo',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Prev Icon', CMS_NAME ),
				'param_name' => 'l_icon_linecons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'l_icon_type',
					'value' => 'linecons',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Prev Icon', CMS_NAME ),
				'param_name' => 'l_icon_pixelicons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'pixelicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'l_icon_type',
					'value' => 'pixelicons',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Prev Icon', CMS_NAME ),
				'param_name' => 'l_icon_pe7stroke',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'pe7stroke',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'l_icon_type',
					'value' => 'pe7stroke',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Prev Icon', CMS_NAME ),
				'param_name' => 'l_icon_rticon',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'rticon',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'l_icon_type',
					'value' => 'rticon',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Prev Icon', CMS_NAME ),
				'param_name' => 'l_icon_glyphicons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'glyphicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'l_icon_type',
					'value' => 'glyphicons',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			/* End Icon */
			/* Start Icon */
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
				'param_name' => 'r_icon_type',
				'description' => __( 'Select icon library.', 'js_composer' ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Next Icon', CMS_NAME ),
				'param_name' => 'r_icon_fontawesome',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'fontawesome',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'r_icon_type',
					'value' => 'fontawesome',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
	        array(
				'type' => 'iconpicker',
				'heading' => __( 'Next Icon', CMS_NAME ),
				'param_name' => 'r_icon_openiconic',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'openiconic',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'r_icon_type',
					'value' => 'openiconic',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Next Icon', CMS_NAME ),
				'param_name' => 'r_icon_typicons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'r_icon_type',
					'value' => 'typicons',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Next Icon', CMS_NAME ),
				'param_name' => 'r_icon_entypo',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'entypo',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'r_icon_type',
					'value' => 'entypo',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Next Icon', CMS_NAME ),
				'param_name' => 'r_icon_linecons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'r_icon_type',
					'value' => 'linecons',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Next Icon', CMS_NAME ),
				'param_name' => 'r_icon_pixelicons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'pixelicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'r_icon_type',
					'value' => 'pixelicons',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Next Icon', CMS_NAME ),
				'param_name' => 'r_icon_pe7stroke',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'pe7stroke',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'r_icon_type',
					'value' => 'pe7stroke',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Next Icon', CMS_NAME ),
				'param_name' => 'r_icon_rticon',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'rticon',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'r_icon_type',
					'value' => 'rticon',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Next Icon', CMS_NAME ),
				'param_name' => 'r_icon_glyphicons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'glyphicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'r_icon_type',
					'value' => 'glyphicons',
				),
				'description' => __( 'Select icon from library.', CMS_NAME ),
				"group" => __("Carousel Settings", CMS_NAME)
			),
			/* End Icon */
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
	            "shortcode" => "cms_carousel",
	            "admin_label" => true,
	            "heading" => __("Shortcode Template",CMS_NAME),
	            "group" => __("Template", CMS_NAME),
	        )
	    )
	)
);
global $cms_carousel;
$cms_carousel = array();
class WPBakeryShortCode_cms_carousel extends CmsShortCode{
	protected function content($atts, $content = null){
		//default value
		$atts_extra = shortcode_atts(array(
			'source' => '',
			'xsmall_items' => 1,
			'small_items' => 2,
			'medium_items' => 3,
			'large_items' => 4,
			'margin' => 10,
			'loop' => 'true',
			'mousedrag' => 'true',
			'nav' => 'true',
			'dots' => 'true',
			'autoplay' => 'true',
			'autoplaytimeout' => '5000',
			'smartspeed' => '1000',
			'autoplayhoverpause' => 'true',
			'l_icon_type' => 'fontawesome',
			'l_icon_fontawesome' => '',
			'l_icon_openiconic' => '',
			'l_icon_typicons' => '',
			'l_icon_entypoicons' => '',
			'l_icon_linecons' => '',
			'l_icon_entypo' => '',
			'l_icon_pe7stroke' => '',
			'l_icon_glyphicons' => '',
			'r_icon_type' => 'fontawesome',
			'r_icon_fontawesome' => '',
			'r_icon_openiconic' => '',
			'r_icon_typicons' => '',
			'r_icon_entypoicons' => '',
			'r_icon_linecons' => '',
			'r_icon_entypo' => '',
			'r_icon_pe7stroke' => '',
			'r_icon_glyphicons' => '',
			'left_arrow' => 'fa fa-arrow-left',
			'right_arrow' => 'fa fa-arrow-right',
			'cms_template' => 'cms_carousel.php',
			'not__in'=> 'false', 
			'class' => '',
			    ), $atts);

		$atts = array_merge($atts_extra,$atts);
		global $cms_carousel;
		//icon lib
		switch ($atts['r_icon_type']) {
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
				vc_icon_element_fonts_enqueue( $atts['r_icon_type'] );
				break;
		}
		switch ($atts['l_icon_type']) {
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
				vc_icon_element_fonts_enqueue( $atts['l_icon_type'] );
				break;
		}
		$r_icon_name = "r_icon_" . $atts['r_icon_type'];
    	$r_iconClass = empty($atts[$r_icon_name])? $atts['right_arrow'] : $atts[$r_icon_name];
    	$l_icon_name = "l_icon_" . $atts['l_icon_type'];
    	$l_iconClass = empty($atts[$l_icon_name])? $atts['left_arrow'] : $atts[$l_icon_name];


		wp_enqueue_style('owl-carousel',CMS_CSS.'owl.carousel.css','','2.0.0b','all');
		wp_enqueue_script('owl-carousel',CMS_JS.'owl.carousel.min.js',array('jquery'),'2.0.0b',true);
		if(file_exists(get_template_directory().'/assets/js/owl.carousel.cms.js')){
			wp_enqueue_script('owl-carousel-cms',get_template_directory_uri().'/assets/js/owl.carousel.cms.js',array('jquery'),'1.0.0',true);
		}else{
			wp_enqueue_script('owl-carousel-cms',CMS_JS.'owl.carousel.cms.js',array('jquery'),'1.0.0',true);
		}
		$source = $atts['source'];
        if(isset($atts['not__in']) and $atts['not__in'] == 'true'){
        	list($args, $post) = vc_build_loop_query($source, get_the_ID());
        	
        }else{
        	list($args, $post) = vc_build_loop_query($source);
        }
        $atts['posts'] = $post;
        $html_id = cmsHtmlID('cms-carousel');
        $atts['autoplaytimeout'] = isset($atts['autoplaytimeout'])?(int)$atts['autoplaytimeout']:5000;
        $atts['smartspeed'] = isset($atts['smartspeed'])?(int)$atts['smartspeed']:1000;
        $cms_carousel[$html_id] = array(
        	'margin' => $atts['margin'],
        	'loop' => $atts['loop'],
        	'mouseDrag' => $atts['mousedrag'],
        	'nav' => $atts['nav'],
        	'dots' => $atts['dots'],
        	'autoplay' => $atts['autoplay'],
        	'autoplayTimeout' => $atts['autoplaytimeout'],
        	'smartSpeed' => $atts['smartspeed'],
        	'autoplayHoverPause' => $atts['autoplayhoverpause'],
        	'navText' => array('<i class="'.$l_iconClass.'"></i>','<i class="'.$r_iconClass.'"></i>'),
        	'dotscontainer' => $html_id.' .cms-dots',
        	'responsive' => array(
        		0 => array(
        		"items" => (int)$atts['xsmall_items'],
        		),
	        	768 => array(
	        		"items" => (int)$atts['small_items'],
	        		),
	        	992 => array(
	        		"items" => (int)$atts['medium_items'],
	        		),
	        	1200 => array(
	        		"items" => (int)$atts['large_items'],
	        		)
	        	)
        );
        wp_localize_script('owl-carousel-cms', "cmscarousel", $cms_carousel);
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']). ' '. $atts['class'];
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>