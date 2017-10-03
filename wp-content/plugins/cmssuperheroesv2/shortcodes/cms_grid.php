<?php
vc_map(
	array(
		"name" => __("CMS Grid", CMS_NAME),
	    "base" => "cms_grid",
	    "class" => "vc-cms-grid",
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
	            "heading" => __("Layout Type",CMS_NAME),
	            "param_name" => "layout",
	            "value" => array(
	            	"Basic" => "basic",
	            	"Masonry" => "masonry",
	            	),
	            "group" => __("Grid Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns XS Devices",CMS_NAME),
	            "param_name" => "col_xs",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 1,
	            "group" => __("Grid Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns SM Devices",CMS_NAME),
	            "param_name" => "col_sm",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 2,
	            "group" => __("Grid Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns MD Devices",CMS_NAME),
	            "param_name" => "col_md",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 3,
	            "group" => __("Grid Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Columns LG Devices",CMS_NAME),
	            "param_name" => "col_lg",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 4,
	            "group" => __("Grid Settings", CMS_NAME)
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Filter on Masonry",CMS_NAME),
	            "param_name" => "filter",
	            "value" => array(
	            	"Enable" => "true",
	            	"Disable" => "false"
	            	),
	            "dependency" => array(
	            	"element" => "layout",
	            	"value" => "masonry"
	            	),
	            "group" => __("Grid Settings", CMS_NAME)
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
	            "shortcode" => "cms_grid",
	            "admin_label" => true,
	            "heading" => __("Shortcode Template",CMS_NAME),
	            "group" => __("Template", CMS_NAME),
	        )
	    )
	)
);
class WPBakeryShortCode_cms_grid extends CmsShortCode{
	protected function content($atts, $content = null){
		global $wp_query,$post;
		$atts_extra = shortcode_atts(array(
            'source' => '',
            'col_lg' => 4,
            'col_md' => 3,
            'col_sm' => 2,
            'col_xs' => 1,
            'layout' => 'basic',
            'filter' => 'true',
            'not__in'=> 'false', 
            'cms_template' => 'cms_grid.php',
            'class' => '',
                ), $atts);
		$atts = array_merge($atts_extra, $atts);

		//media script
		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_script( 'wp-mediaelement' );
		
		if(file_exists(get_template_directory().'/assets/js/cmsgrid.pagination.js')){
			wp_enqueue_script('cms-grid-pagination',get_template_directory_uri().'/assets/js/cmsgrid.pagination.js',array('jquery'),'1.0.0',true);
		}
		else{
			wp_enqueue_script('cms-grid-pagination',CMS_JS.'cmsgrid.pagination.js',array('jquery'),'1.0.0',true);
		}
        $html_id = cmsHtmlID('cms-grid');
        $source = $atts['source'];
        if (get_query_var('paged')){ 
        	$paged = get_query_var('paged'); 
        }
	    elseif(get_query_var('page')){ 
	    	$paged = get_query_var('page'); 
	    }
	    else{ 
	    	$paged = 1; 
	    }
        if(isset($atts['not__in']) && $atts['not__in']){
	    	list($args, $wp_query) = vc_build_loop_query($source, get_the_ID());
	    }
        else{
        	list($args, $wp_query) = vc_build_loop_query($source);
        }
        //default categories selected
        $args['cat_tmp'] = isset($args['cat'])?$args['cat']:'';
        // if select term on custom post type, move term item to cat.
        if(strstr($source, 'tax_query')){
        	$source_a = explode('|', $source);
        	foreach ($source_a as $key => $value) {
        		$tmp = explode(':', $value);
        		if($tmp[0] == 'tax_query'){
        			$args['cat_tmp'] = $tmp[1];
        		}
        	}
        }
	    if($paged > 1){
	    	$args['paged'] = $paged;
	    	$wp_query = new WP_Query($args);
	    }
        $atts['cat'] = isset($args['cat_tmp'])?$args['cat_tmp']:'';
        $atts['limit'] = isset($args['posts_per_page'])?$args['posts_per_page']:5;
        /* get posts */
        $atts['posts'] = $wp_query;
        
        
        $col_lg = 12 / $atts['col_lg'];
        $col_md = 12 / $atts['col_md'];
        $col_sm = 12 / $atts['col_sm'];
        $col_xs = 12 / $atts['col_xs'];
        $atts['item_class'] = "cms-grid-item col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-xs-{$col_xs}";
        $atts['grid_class'] = "cms-grid";
        $class = $atts['class'];
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']). ' '. $class;
        if ($atts['layout'] == 'masonry') {
            wp_enqueue_script('cms-jquery-shuffle');
            $atts['grid_class'] .= " cms-grid-{$atts['layout']}";
        }
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>