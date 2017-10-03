<?php
vc_map(
	array(
		"name" => __("CMS Single Fancy Box", CMS_NAME),
	    "base" => "cms_fancybox_single",
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
	        /* Start Items */
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
				'param_name' => 'icon_type',
				'description' => __( 'Select icon library.', 'js_composer' ),
				"group" => __("Fancy Icon Settings", CMS_NAME)
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
				"group" => __("Fancy Icon Settings", CMS_NAME)
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
				"group" => __("Fancy Icon Settings", CMS_NAME)
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
				"group" => __("Fancy Icon Settings", CMS_NAME)
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
				"group" => __("Fancy Icon Settings", CMS_NAME)
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
				"group" => __("Fancy Icon Settings", CMS_NAME)
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
				"group" => __("Fancy Icon Settings", CMS_NAME)
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
				"group" => __("Fancy Icon Settings", CMS_NAME)
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
				"group" => __("Fancy Icon Settings", CMS_NAME)
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
				"group" => __("Fancy Icon Settings", CMS_NAME)
			),
			/* End Icon */
			array(
	            "type" => "attach_image",
	            "heading" => __("Image Item",CMS_NAME),
	            "param_name" => "image",
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Title Item",CMS_NAME),
	            "param_name" => "title_item",
	            "value" => "",
	            "description" => __("Title Of Item",CMS_NAME),
	            "group" => __("Fancy Icon Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => __("Content Item",CMS_NAME),
	            "param_name" => "description_item",
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
	            "heading" => __("Link",CMS_NAME),
	            "param_name" => "button_link",
	            "value" => "#",
	            "description" => __("",CMS_NAME),
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
	            "shortcode" => "cms_fancybox_single",
	            "group" => __("Template", CMS_NAME),
	        )
		)
	)
);
class WPBakeryShortCode_cms_fancybox_single extends CmsShortCode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'title' => '',
			'description' => '',
			'content_align' => 'default',
			'button_type'=> 'button',
			'button_text'=> '',
			'button_link'=> '#',
			'icon_type' => 'fontawesome',
			'icon_fontawesome' => '',
			'icon_openiconic' => '',
			'icon_typicons' => '',
			'icon_entypoicons' => '',
			'icon_linecons' => '',
			'icon_entypo' => '',
			'icon_pe7stroke' => '',
			'icon_glyphicons' => '',
			'description_item' => '',
			'title_item' => '',
			'cms_template' => 'cms_fancybox_single.php',
			'class' => '',
			    ), $atts);
		$atts = array_merge($atts_extra,$atts);
		$atts['icon_type'] = isset($atts['icon_type'])?$atts['icon_type']:'fontawesome';
		$atts['description_item'] = isset($atts['description_item'])?$atts['description_item']:'';
		$atts['title_item'] = isset($atts['title_item'])?$atts['title_item']:'';
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
        $html_id = cmsHtmlID('cms-fancy-box-single');
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']). ' content-align-' . $atts['content_align'] . ' '. $atts['class'];
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>