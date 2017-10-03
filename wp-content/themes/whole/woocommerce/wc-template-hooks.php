<?php
/**
 * WooCommerce Template Hooks
 *
 * Action/filter hooks used for WooCommerce functions/templates
 *
 * @author 		WooThemes
 * @category 	Core
 * @package 	WooCommerce/Templates
 * @version     20.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Archive */
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10 );

/* summary */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 30 );

function cms_loop_shop_per_page(){
	global $opt_theme_options;
	if(isset($_REQUEST['loop_shop_per_page']) && !empty($_REQUEST['loop_shop_per_page'])) {
		return $_REQUEST['loop_shop_per_page'];
	} else {
		return isset($opt_theme_options['product_per_page']) ? $opt_theme_options['product_per_page'] : '6' ;
	}
}
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return cms_loop_shop_per_page();' ), 3);