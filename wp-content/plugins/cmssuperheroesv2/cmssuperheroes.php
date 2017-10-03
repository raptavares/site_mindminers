<?php
/**
*
* Plugin Name: Cmssuperheroes
* Plugin URI: http://cmssuperheroes.com
* Description: This plugin is package compilation some addons, which is developed by CMSSUPERHEROES Team for Visual Comporser plugin.
* Version: 1.0.9.3
* Author: Luan Nguyen, Cong Nguyen
* Author URI: http://ncluan.com
* Copyright 2007-2014 Cmssuperheroes.com. All rights reserved.
* Text Domain: cmssuperheroes
*/
define( 'CMS_NAME', 'cmssuperheroes' );
define( 'CMS_DIR', plugin_dir_path(__FILE__) );
define( 'CMS_URL', plugin_dir_url(__FILE__) );
define( 'CMS_LIBRARIES', CMS_DIR  . "libraries" . DIRECTORY_SEPARATOR );
define( 'CMS_LANGUAGES', CMS_DIR . "languages" . DIRECTORY_SEPARATOR );
define( 'CMS_TEMPLATES', CMS_DIR . "templates" . DIRECTORY_SEPARATOR );
define( 'CMS_INCLUDES', CMS_DIR . "includes" . DIRECTORY_SEPARATOR );

define( 'CMS_CSS', CMS_URL . "assets/css/" );
define( 'CMS_JS', CMS_URL . "assets/js/" );
define( 'CMS_IMAGES', CMS_URL . "assets/images/" );
/**
* Require functions on plugin
*/
require_once CMS_INCLUDES . "functions.php";
/**
* Use CmssuperheroesCore class
*/
new CmssuperheroesCore();
/**
* Cmssuperheroes Class
* 
*/
class CmssuperheroesCore{
	public function __construct(){
		/**
		* Init function, which is run on site init and plugin loaded
		*/
		add_action('plugins_loaded', array( $this, 'cmsActionInit'));
		add_filter('style_loader_tag', array( $this, 'cmsValidateStylesheet'));
		
		/**
		* Enqueue Scripts on plugin
		*/
		add_action('wp_enqueue_scripts', array( $this, 'cms_register_style'));
		add_action('wp_enqueue_scripts', array( $this, 'cms_register_script'));
		add_action('admin_enqueue_scripts', array( $this, 'cms_admin_script'));
		/**
		* Ajax Dummy Data
		*/
		add_action( 'wp_ajax_cmsdummy', array( $this, 'cms_ajax_cmsdummy'));
		/**
		* Visual Composer action
		*/
		add_action('vc_before_init', array($this, 'cmsShortcodeRegister'));
		add_action('vc_after_init', array($this, 'cmsShortcodeAddParams'), 11);
		/**
		* widget text apply shortcode
		*/
		add_filter('widget_text', 'do_shortcode');
	}
	function cmsActionInit(){
	    global $wp_filesystem;
	    // Localization
	    load_plugin_textdomain(CMS_NAME, false, CMS_LANGUAGES);
	    
	    /* Add WP_Filesystem. */
        if ( !class_exists('WP_Filesystem') ) {
        
        	require_once(ABSPATH . 'wp-admin/includes/file.php');
        
        	WP_Filesystem();
        }
	}
	function cmsShortcodeRegister() {
	    //Load required libararies
	    require_once CMS_INCLUDES . 'cms_shortcodes.php';
	}
	function cmsShortcodeAddParams(){
		$extra_params_folder = get_template_directory() . '/vc_params';
		$files = cmsFileScanDirectory($extra_params_folder,'/cms_.*\.php/');
		if(!empty($files)){
			foreach($files as $file){
				if(WPBMap::exists($file->name)){
					if(isset($params)){
						unset($params);
					}
					include $file->uri;
					if(isset($params) && is_array($params)){
						foreach($params as $param){
							if(is_array($param)){
								$param['group'] = __('Template', CMS_NAME);
								$param['edit_field_class'] = isset($param['edit_field_class'])? $param['edit_field_class'].' cms_custom_param vc_col-sm-12 vc_column':'cms_custom_param vc_col-sm-12 vc_column';
								$param['class'] = 'cms-extra-param';
								if(isset($param['template']) && !empty($param['template'])){
									if(!is_array($param['template'])){
										$param['template'] = array($param['template']);
									}
									$param['dependency'] = array("element"=>"cms_template", "value" => $param['template']);
									
								}
								vc_add_param($file->name, $param);
							}
						}
					}
				}
			}
		}
	}
	/**
	* Function register stylesheet on plugin
	*/
	function cms_register_style(){
		wp_enqueue_style('cms-plugin-stylesheet', CMS_CSS. 'cms-style.css');
	}
	/**
	 * replace rel on stylesheet (Fix validator link style tag attribute)
	 */
	function cmsValidateStylesheet($src) {
	    if(strstr($src,'widget_search_modal-css')||strstr($src,'owl-carousel-css') || strstr($src,'vc_google_fonts')){
	        return str_replace('rel', 'property="stylesheet" rel', $src);
	    }
	    else{
	        return $src;
	    }
	}
	/**
	* Function register script on plugin
	*/
	function cms_register_script(){
		wp_register_script('modernizr', CMS_JS. 'modernizr.min.js', array('jquery'));
		wp_register_script('waypoints', CMS_JS. 'waypoints.min.js', array('jquery'));
		wp_register_script('imagesloaded', CMS_JS. 'jquery.imagesloaded.js', array('jquery'));
		wp_register_script('jquery-shuffle', CMS_JS . 'jquery.shuffle.js', array('jquery','modernizr','imagesloaded'));
		if(file_exists(get_template_directory().'/assets/js/jquery.shuffle.cms.js')){
			wp_register_script('cms-jquery-shuffle', get_template_directory_uri().'/assets/js/jquery.shuffle.cms.js', array('jquery-shuffle'));
		}
		else{
			wp_register_script('cms-jquery-shuffle', CMS_JS. 'jquery.shuffle.cms.js', array('jquery-shuffle'));
		}
	}
	function cms_admin_script(){
		wp_register_script('cms-dummy-data', CMS_JS. 'dummy.cms.js', array(),'1.0.0',true);
		wp_enqueue_style('cms-dummy-data-css', CMS_CSS. 'dummy.cms.css', '','1.0.0','all');
		wp_enqueue_script('cms-dummy-data');
		wp_enqueue_style('cmssuperheroes-font-stroke7', CMS_CSS . 'Pe-icon-7-stroke.css', array(), '1.2.0');
		wp_enqueue_style('cmssuperheroes-font-rticon', CMS_CSS . 'rticon.css', array(), '1.0.0');
		//wp_enqueue_style('cmssuperheroes-font-glyphicons', CMS_CSS . 'glyphicons.css', array(), '1.0.0');
	}
	/**
	* Ajax Function Dummy Data
	*/
	function cms_ajax_cmsdummy(){
		require_once CMS_INCLUDES . 'cms_dummy.php';
    	cmsDummyData();
	}
}
?>
