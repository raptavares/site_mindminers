<?php
if (! defined ( 'ABSPATH' )) {
	exit (); // Exit if accessed directly
}
/**
 * add shortcode to VC.
 *
 * @name UserPress_shortcodes
 * @since 1.0.0
 */
if (! class_exists ( 'UserPress_shortcodes' )) {
	class UserPress_shortcodes {
		function __construct() {
			add_action ( 'vc_before_init', array (
					$this,
					'add_shortcodes_params' 
			) );
			
			// shortcode login form.
			add_shortcode ( 'user-press', array (
					$this,
					'add_shortcode_user_press' 
			) );
		}
		
		/**
		 * add shortcodes params to VC
		 */
		function add_shortcodes_params() {
			vc_map ( array (
					"name" => __ ( "User Press Forms", 'user-press' ),
					"base" => "user-press",
					"category" => __ ( "User Press", 'user-press' ),
					"params" => array (
							array (
									"type" => "dropdown",
									"heading" => esc_html__ ( "Layout", "user-press" ),
									"param_name" => "layout",
									"description" => esc_html__ ( "Select layout type for form.", "user-press" ),
									"value" => array (
											esc_html__ ( 'Default', 'user-press' ) => '',
									),
									"std" => '' 
							),
							array (
									"type" => "dropdown",
									"heading" => esc_html__ ( "Form", "user-press" ),
									"param_name" => "form_type",
									"description" => esc_html__ ( "Select form type (login form, register from, forgot password form, tabs forms).", "user-press" ),
									"value" => array (
											esc_html__ ( 'Login', 'user-press' ) => 'login',
											esc_html__ ( 'Register', 'user-press' ) => 'register',
									),
									"std" => '' 
							),
							array (
									"type" => "dropdown",
									"heading" => esc_html__ ( "Logged", "user-press" ),
									"param_name" => "is_logged",
									"description" => esc_html__ ( "Select logged type (Null, Text, Profile).", "user-press" ),
									"value" => array (
											esc_html__ ( 'Null', 'user-press' ) => '',
											esc_html__ ( 'Text', 'user-press' ) => 'text',
											esc_html__ ( 'Profile', 'user-press' ) => 'profile' 
									),
									"group" => esc_html__ ( 'Logged', 'user-press' ),
									"std" => '' 
							),
							array (
									"type" => "textfield",
									"heading" => esc_html__ ( "Text", "user-press" ),
									"param_name" => "is_logged_text",
									"description" => esc_html__ ( "logged text.", "user-press" ),
									"group" => esc_html__ ( 'Logged', 'user-press' ),
									"dependency" => array (
											'element' => 'is_logged',
											'value' => 'text' 
									) 
							) 
					)
			) );
		}
		
		/**
		 * display shortcode user press login form.
		 *
		 * @package UserPress
		 * @version 1.0.0
		 */
		function add_shortcode_user_press($atts, $content = '') {
			global $user_press;
			
			// if options null.
			if (! $atts)
				$atts = array ();
				
				// default array.
			$atts = array_merge ( array (
					'layout' => '',
					'template' => get_option ( 'user_press_layout', 'default' ),
					'form_type' => 'login',
					'is_logged' => '',
					'is_logged_text' => esc_html__ ( "Logout", "user-press" ) 
			), $atts );
			
			// if template null.
			if (! $atts ['template']) {
				$atts ['template'] = 'default';
			}
			
			$user_press = $atts;
			
			ob_start();
			
			// if user logned.
			if (is_user_logged_in ()) {
				
				switch ($atts ['is_logged']) {
					case 'text' :
						up_get_template_part ( $atts ['template'] . '/logout' );
						break;
					case 'profile' :
						up_get_template_part ( $atts ['template'] . '/profile' );
						break;
				}
			} else {
			
    			// if not logned
    			switch ($atts ['layout']) {
    				case 'dropdown' :
    					up_get_template_part ( $atts ['template'] . '/layout', 'dropdown' );
    					break;
    				
    				case 'popup' :
    					up_get_template_part ( $atts ['template'] . '/layout', 'popup' );
    					break;
    				
    				default :
    					up_get_template_part ( $atts ['template'] . '/layout' );
    					break;
    			}
			}
			
			return ob_get_clean();
		}
	}
	// start.
	new UserPress_shortcodes ();
}
