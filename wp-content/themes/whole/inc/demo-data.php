<?php
/**
 * Set home page.
 *
 * get home title and update options.
 *
 * @return Home page title.
 * @author FOX
 */
function whole_set_home_page(){

    $home_page = 'Home';

    $page = get_page_by_title($home_page);

    if(!isset($page->ID))
        return ;

    update_option('show_on_front', 'page');
    update_option('page_on_front', $page->ID);
}

add_action('cms_import_finish', 'whole_set_home_page');

/**
 * Set menu locations.
 *
 * get locations and menu name and update options.
 *
 * @return string[]
 * @author FOX
 */
function whole_set_menu_location(){

    $setting = array(
        'Footer menu' => 'second',
        'Main menu' => 'primary'
    );

    $navs = wp_get_nav_menus();

    $new_setting = array();

    foreach ($navs as $nav){

        if(!isset($setting[$nav->name]))
            continue;

        $id = $nav->term_id;
        $location = $setting[$nav->name];

        $new_setting[$location] = $id;
    }

    set_theme_mod('nav_menu_locations', $new_setting);
}

add_action('cms_import_finish', 'whole_set_menu_location');