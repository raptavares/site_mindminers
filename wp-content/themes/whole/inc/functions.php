<?php
/**
 * Created by PhpStorm.
 * User: FOX
 * Date: 2/23/2016
 * Time: 3:48 PM
 */

/* load list plugins */

require_once( get_template_directory() . '/inc/options/require.plugins.php' );

/* load demo data setting */
require_once( get_template_directory() . '/inc/demo-data.php' );

/* lip font-awesome */
require_once get_template_directory() . '/inc/libs/font-awesome.php';

/* load mega menu. */
require_once( get_template_directory() . '/inc/mega-menu/mega-menu-framework.php' );

/* load theme options. */
require_once( get_template_directory() . '/inc/options/function.options.php' );

/* load mata options */
require_once( get_template_directory() . '/inc/options/meta-options.php' );

/* load template functions */
require_once( get_template_directory() . '/inc/template.functions.php' );

/* load static css. */
require_once( get_template_directory() . '/inc/dynamic/static.css.php' );

/* load dynamic css*/
require_once( get_template_directory() . '/inc/dynamic/dynamic.css.php' );