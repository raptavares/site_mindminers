<?php
/**
 * MegaMenu Functions
 *
 * WARNING: This file is part of the Mega Menu Framework.
 * Do not edit the core files.
 * Add any modifications necessary under a child theme.
 *
 * @package  Fusion/MegaMenu
 * @author   FOX
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	die;
}

// Don't duplicate me!
if( ! class_exists( 'EF3MegaMenuFramework' ) ) {

	/**
	 * Main EF3MegaMenuFramework Class
	 *
	 */
	class EF3MegaMenuFramework {

		function __construct() {

			/* include. */
			$this->include_functions();

			/* load scripts. */
			add_action( 'admin_enqueue_scripts', 	array( $this, 'register_scripts' ) );
			add_action( 'admin_enqueue_scripts',	array( $this, 'register_stylesheets' ) );

			/* nav custom fields. */
			add_filter( 'wp_edit_nav_menu_walker', array( $this, 'custom_fields' ) );

			add_action( 'wp_update_nav_menu_item', array( $this, 'nav_update' ), 10, 3 );
			add_filter( 'wp_setup_nav_menu_item', array( $this, 'nav_setup' ) );

		}

		/**
		 * include
		 */
		public function include_functions() {
			// Load functions
			require_once( get_template_directory() . '/inc/mega-menu/mega-menu.php' );
		}

		/**
		 * Function to replace normal edit nav walker for fusion core mega menus
		 *
		 * @return string Class name of new navwalker
		 */
		function custom_fields() {
			return 'Walker_Nav_Menu_Edit_Custom';
		}

		/**
		 * Add the custom menu style fields menu item data to fields in database
		 *
		 * @return void
		 */
		function nav_update($menu_id, $menu_item_db_id, $args){

			$fields = array(
				'submenu_type',
				'dropdown',
				'widget_area',
				'column_width',
				'group',
				'hide_link',
				'bg_image',
				'bg_image_attachment',
				'bg_image_size',
				'bg_image_position',
				'bg_image_repeat',
				'bg_color',
				'icon_color',
				'icon_font_size',
				'menu_icon',
				'el_class'
			);

			foreach($fields as $i=>$field){

				if (isset($_REQUEST['menu-item-'.$field][$menu_item_db_id])) {

					$mega_value = $_REQUEST['menu-item-'.$field][$menu_item_db_id];

					update_post_meta( $menu_item_db_id, '_menu_item_'.$field, $mega_value );
				}else{

					update_post_meta( $menu_item_db_id, '_menu_item_'.$field, '');
				}
			}
		}

		/**
		 * Add custom menu style fields data to the menu
		 *
		 * @return object the menu item
		 */
		function nav_setup($menu_item) {

			$fields = array(
				'submenu_type',
				'dropdown',
				'widget_area',
				'column_width',
				'group',
				'hide_link',
				'bg_image',
				'bg_image_attachment',
				'bg_image_size',
				'bg_image_position',
				'bg_image_repeat',
				'bg_color',
				'icon_color',
				'icon_font_size',
				'menu_icon',
				'el_class'
			);

			foreach($fields as $i=>$field){
				$menu_item->$field = get_post_meta( $menu_item->ID, '_menu_item_'.$field, true );
			}

			return $menu_item;
		}

		/**
		 * Register megamenu javascript assets
		 *
		 * @return void
		 *
		 * @since  3.4
		 */
		function register_scripts( $hook ) {
			if( $hook == 'nav-menus.php' ) {

				$theme_info = wp_get_theme();

				// scripts
				wp_enqueue_media();
				add_thickbox();
				wp_enqueue_script( 'set_background', get_template_directory_uri() . '/inc/mega-menu/js/mega-menu.js', array( 'jquery', 'jquery-ui-sortable' ), $theme_info->get( 'Version' ), true );
			}
		}

		/**
		 * Enqueue megamenu stylesheets
		 *
		 * @return void
		 *
		 * @since  3.4
		 */
		function register_stylesheets( $hook ) {
			if( $hook == 'nav-menus.php' ) {

				$theme_info = wp_get_theme();

				wp_enqueue_style( 'css_backend_megamenu', get_template_directory_uri() . '/inc/mega-menu/css/mega-menu.css', false, $theme_info->get( 'Version' ) );
			}
		}
	}
	
	$mega_menu_framework = new EF3MegaMenuFramework();
}