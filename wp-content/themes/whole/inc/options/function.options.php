<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if (! class_exists('Redux')) {
    return;
}

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('opt_name', 'opt_theme_options');

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'menu',
    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => $theme->get('Name'),
    'page_title' => $theme->get('Name'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key' => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => true,
    // Use a asynchronous font on the front end or font string
    // 'disable_google_fonts_link' => true, // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-smiley',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Show the time the page took to load, etc
    'update_notice' => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => true,
    // Enable basic customizer support
    // 'open_expanded' => true, // Allow you to start the panel in an expanded way initially.
    // 'disable_save_warn' => true, // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => 'dashicons-nametag',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'dashicons-smiley',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit' => '', // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'red',
            'shadow' => true,
            'rounded' => false,
            'style' => ''
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right'
        ),
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover'
            ),
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave'
            )
        )
    )
);

Redux::setArgs($opt_name, $args);

/**
 * Header Options
 * 
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Header', 'whole'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'title' => esc_html__('Layouts', 'whole'),
            'subtitle' => esc_html__('select a layout for header', 'whole'),
            'default' => '1',
            'type' => 'image_select',
            'options' => array(
                '1' => get_template_directory_uri().'/assets/images/header/h1.jpg',
                '2' => get_template_directory_uri().'/assets/images/header/h2.jpg',
                '3' => get_template_directory_uri().'/assets/images/header/h3.jpg',
                '4' => get_template_directory_uri().'/assets/images/header/h4.jpg',
                '5' => get_template_directory_uri().'/assets/images/header/h5.jpg',
                '6' => get_template_directory_uri().'/assets/images/header/h6.jpg',
                '7' => get_template_directory_uri().'/assets/images/header/h7.jpg',
                '8' => get_template_directory_uri().'/assets/images/header/h8.jpg',
                '9' => get_template_directory_uri().'/assets/images/header/h9.jpg',
                '10' => get_template_directory_uri().'/assets/images/header/h10.jpg',
                '11' => get_template_directory_uri().'/assets/images/header/h11.jpg',
                '12' => get_template_directory_uri().'/assets/images/header/h12.jpg',
                '13' => get_template_directory_uri().'/assets/images/header/h13.jpg',
                '14' => get_template_directory_uri().'/assets/images/header/h14.jpg',
            )
        ),
        array(
            'subtitle' => esc_html__('enable sticky mode for menu.', 'whole'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Header', 'whole'),
            'default' => true,
        ),
        array(
            'id'       => 'header_line_bottom_style',
            'type'     => 'button_set',
            'title'    => esc_html__('Line Bottom Style', 'whole'),
            'options' => array(
                '' => 'None', 
                'h-line-style1' => 'Style 1', 
                'h-line-style2' => 'Style 2',
             ), 
            'default' => ''
        ),
        array(
            'id' => 'header_full_width',
            'type' => 'switch',
            'title' => esc_html__('Header Full Width', 'whole'),
            'default' => false,
        ),
        array(
            'id' => 'show_search_icon',
            'type' => 'switch',
            'title' => esc_html__('Show Search Icon', 'whole'),
            'default' => true,
        ),
        array(
            'id' => 'show_cart_icon',
            'type' => 'switch',
            'title' => esc_html__('Show Cart Icon', 'whole'),
            'default' => false,
        ),
        array(
            'id' => 'show_hidden_sidebar',
            'type' => 'switch',
            'title' => esc_html__('Show Hidden Sidebar', 'whole'),
            'default' => false,
        ),
    )
));

/* Top Bar */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Top Bar', 'whole'),
    'icon' => 'el el-resize-vertical',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'top_bar_phone',
            'type' => 'text',
            'title' => esc_html__('Phone', 'whole'),
            'default' => '002 01065370701',
        ),
        array(
            'id' => 'top_bar_email',
            'type' => 'text',
            'title' => esc_html__('Email', 'whole'),
            'default' => '7oroof@7oroof.com',
        ),
        array(
            'id' => 'top_bar_address',
            'type' => 'text',
            'title' => esc_html__('Address', 'whole'),
            'default' => 'Tanta AlGharbia, Egypt.',
        ),
        array(
            'id'      => 'top_bar_social',
            'type'    => 'sorter',
            'title'   => 'Social',
            'desc'    => 'Choose which social networks are displayed and edit where they link to.',
            'options' => array(
                'enabled'  => array(
                    'facebook'  => 'Facebook', 
                    'twitter'   => 'Twitter', 
                    'linkedin'  => 'Linkedin',
                    'skype'     => 'Skype',
                ),
                'disabled' => array(
                    'google'    => 'Google',
                    'youtube'   => 'Youtube', 
                    'vimeo'     => 'Vimeo', 
                    'tumblr'    => 'Tumblr', 
                    'rss'       => 'RSS', 
                    'pinterest' => 'Pinterest',
                    'instagram' => 'Instagram',
                    'yelp'      => 'Yelp'
                )
            ),
        ),
    )
));

/* Logo */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Logo', 'whole'),
    'icon' => 'el-icon-picture',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Transparent Logo', 'whole'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => false,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/main-logo.png'
            )
        ),

        array(
            'title' => esc_html__('Dark Logo', 'whole'),
            'id' => 'main_logo_dark',
            'type' => 'media',
            'url' => false,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/main-logo-dark.png'
            )
        ),

        array(
            'title' => esc_html__('Sticky Logo', 'whole'),
            'id' => 'sticky_logo',
            'type' => 'media',
            'url' => false,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/sticky-logo.png'
            )
        ),

        array(
            'title' => esc_html__('Mobile Logo + Tablet Logo', 'whole'),
            'id' => 'mobile_logo',
            'type' => 'media',
            'url' => false,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/sticky-logo.png'
            )
        ),
      
        array(
            'id'       => 'main_logo_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => esc_html__('Logo (Width/Height)', 'whole'),
            'default'  => array(
                'Width'   => '', 
                'Height'  => ''
            ),
            'output' => array('#cshero-header-inner #cshero-header #cshero-header-logo a img'),
        ),
    )
));

/* Menu */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Menu', 'whole'),
    'icon' => 'el el-lines',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Set menu color first level.', 'whole'),
            'id' => 'menu_color',
            'type' => 'color',
            'title' => esc_html__('Menu Color', 'whole'),
            'default' => '',
            'output'  => array('#cms-theme .cshero-header-navigation .main-navigation .menu-main-menu > li > a'),
        ),
        array(
            'id' => 'font_menu',
            'type' => 'typography',
            'title' => esc_html__('Menu Font', 'whole'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'color' => false,
            'font-style' => false,
            'font-weight' => true,
            'font-subsets' => false,
            'font-size' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('.cshero-header-navigation .main-navigation .menu-main-menu li a'),
            'units' => 'px',
            'subtitle' => esc_html__('Set menu font.', 'whole'),
            'default' => array(
                'font-family' => '',
                'google' => true,
            )
        ),
    )
));

/**
 * Page Title
 *
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Page Title', 'whole'),
    'icon' => 'el-icon-map-marker',
    'fields' => array(
        array(
            'id' => 'page_title_layout',
            'title' => esc_html__('Layouts', 'whole'),
            'subtitle' => esc_html__('select a layout for page title', 'whole'),
            'default' => '1',
            'type' => 'image_select',
            'options' => array(
                '1' => get_template_directory_uri().'/assets/images/pagetitle/p1.jpg',
                '2' => get_template_directory_uri().'/assets/images/pagetitle/p2.jpg',
                '3' => get_template_directory_uri().'/assets/images/pagetitle/p3.jpg',
                '4' => get_template_directory_uri().'/assets/images/pagetitle/p4.jpg',
            )
        ),
        array(
            'title' => esc_html__('Select Background Image', 'whole'),
            'id' => 'bg_page_title',
            'type' => 'media',
            'url' => false,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/bg-page-title.jpg'
            )
        ),
        array(
            'id' => 'pagetitle_overlay',
            'type' => 'color_rgba',
            'title' => __('Overlay Color', 'whole'),
            'default' => '',
        ),
        array(
            'id' => 'page_title_color',
            'type' => 'color',
            'title' => esc_html__('Page Title Color', 'whole'),
            'default' => '',
            'output'  => array('#cms-theme #cms-page-title .cms-page-title-inner h1'),
        ),
        array(
            'id' => 'page_subtitle_color',
            'type' => 'color',
            'title' => esc_html__('Sub Title Color', 'whole'),
            'default' => '',
            'output'  => array('#cms-theme #cms-page-title .cms-page-title-inner span'),
        ),
        array(
            'id' => 'breadcrumb_color',
            'type' => 'color',
            'title' => esc_html__('Breadcrumb Color', 'whole'),
            'default' => '',
            'output'  => array('#cms-page-title.page-title .cms-breadcrumb .breadcrumbs li, #cms-page-title.page-title .cms-breadcrumb .breadcrumbs li a, #cms-page-title.page-title .cms-breadcrumb .breadcrumbs li::after '),
        ),
        array(
            'id'       => 'page_title_align',
            'type'     => 'button_set',
            'title'    => esc_html__('Content Align', 'whole'),
            'options' => array(
                'left' => 'Left', 
                'center' => 'Center',
                'right' => 'Right',
             ), 
            'default' => 'center'
        ),
        array(
            'id'       => 'hidden_breadcrumb',
            'type'     => 'button_set',
            'title'    => esc_html__('Hidden Breadcrumb', 'whole'),
            'options' => array(
                '' => 'No', 
                'yes' => 'Yes',
             ), 
            'default' => ''
        ),
    )
));

/**
 * Body
 *
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Body', 'whole'),
    'icon' => 'el el-website',
    'fields' => array(
        array(
            'id' => 'rtl',
            'type' => 'switch',
            'title' => esc_html__('RTL', 'whole'),
            'default' => false,
        ),
        array(
            'id' => 'body_border',
            'type' => 'switch',
            'title' => esc_html__('Bordered', 'whole'),
            'default' => false,
        ),
        array(
            'id' => 'body_border_color',
            'type' => 'color',
            'title' => __('Border Color', 'whole'),
            'default' => '',
            'required' => array( 0 => 'body_border', 1 => '=', 2 => '1' ),
        ),
        array(
            'id' => 'page_loadding',
            'type' => 'switch',
            'title' => esc_html__('Page Loadding', 'whole'),
            'default' => false,
        ),
        array(
            'id'             => 'content_padding',
            'type'           => 'spacing',
            'output'         => array('body #cms-content'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'whole'),
            'desc'           => esc_html__('Default: Top-100px, Bottom-100px', 'whole'),
            'default'            => array(
                'padding-top'   => '',  
                'padding-bottom'   => '',  
                'units'          => 'px', 
            )
        ),
    )
));


/**
 * Footer
 *
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'whole'),
    'icon' => 'el el-credit-card',
    'fields' => array(
        array(
            'id' => 'footer_layout',
            'title' => esc_html__('Layouts', 'whole'),
            'subtitle' => esc_html__('select a layout for footer', 'whole'),
            'default' => '1',
            'type' => 'image_select',
            'options' => array(
                '1' => get_template_directory_uri().'/assets/images/footer/f1.jpg',
                '2' => get_template_directory_uri().'/assets/images/footer/f2.jpg',
                '3' => get_template_directory_uri().'/assets/images/footer/f3.jpg',
                '4' => get_template_directory_uri().'/assets/images/footer/f4.jpg',
                '5' => get_template_directory_uri().'/assets/images/footer/f5.jpg',
            )
        ),
        array(
            'id' => 'footer_button_back_to_top',
            'title' => esc_html__('Back To Top', 'whole'),
            'subtitle' => esc_html__('Enable button back to top.', 'whole'),
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Footer Top', 'whole'),
            'type'  => 'section',
            'id' => 'footer_top_start',
            'indent' => true
        ),
        array(
            'title' => esc_html__('Background Image', 'whole'),
            'id' => 'bg_footer',
            'type' => 'media',
            'url' => false,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/bg-footer.jpg'
            )
        ),
        array(
            'id' => 'bg_footer_color',
            'type' => 'color_rgba',
            'title' => __('Background Color', 'whole'),
            'default' => '',
        ),
        array(
            'id'       => 'bg_footer',
            'type'     => 'background',
            'background-color'     => false,
            'title'    => esc_html__( 'Background Image', 'whole' ),
            'output'   => array('#colophon.site-footer'),
            'default'  => array(
                'background-image' => get_template_directory_uri().'/assets/images/bg-footer.jpg'
            )
        ),

        array(
            'id'       => 'footer-top-column',
            'type'     => 'button_set',
            'title'    => esc_html__('Column', 'whole'),
            'options' => array( 
                '2' => '2 Columns', 
                '3' => '3 Columns',
                '4' => '4 Columns',
             ), 
            'default' => '4'
        ),
        array(
                'id'       => 'footer_top_bgcolor',
                'type'     => 'background',
                'background-image' => false,
                'background-position' => false,
                'background-repeat' => false,
                'background-size' => false,
                'background-attachment' => false,
                'title'    => esc_html__( 'Bacgkround Color', 'whole' ),
                'subtitle' => esc_html__( 'Set background color for Footer Top.', 'whole' ),
                'output'   => array('#cms-theme #cms-footer-top'),
            ),
        array(
            'subtitle' => esc_html__('Set title heading color', 'whole'),
            'id' => 'footer_heading_color',
            'type' => 'color',
            'title' => esc_html__('Heading Color', 'whole'),
            'default' => '',
            'output'  => array('body #cms-footer-top .wg-title'),
        ),
        array(
            'subtitle' => esc_html__('Set text color', 'whole'),
            'id' => 'footer_text_color',
            'type' => 'color',
            'title' => esc_html__('Text Color', 'whole'),
            'default' => '',
            'output'  => array('body #cms-footer-top'),
        ),
        array(
            'subtitle' => esc_html__('Set link color', 'whole'),
            'id' => 'footer_link_color',
            'type' => 'color',
            'title' => esc_html__('Link Color', 'whole'),
            'default' => '',
            'output'  => array('body #cms-footer-top a, #cms-footer-top ul.menu li a'),
        ),
        array(
            'subtitle' => esc_html__('Set link color hover', 'whole'),
            'id' => 'footer_link_color_hover',
            'type' => 'color',
            'title' => esc_html__('Link Color Hover', 'whole'),
            'default' => '',
            'output'  => array('body #cms-footer-top a:hover, #cms-footer-top ul.menu li a:hover'),
        ),
        array(
            'title' => esc_html__('Footer Bottom', 'whole'),
            'type'  => 'section',
            'id' => 'footer_bottom_start',
            'indent' => true
        ),
        array(
            'id'       => 'footer_bottom_bgcolor',
            'type'     => 'background',
            'background-image' => false,
            'background-position' => false,
            'background-repeat' => false,
            'background-size' => false,
            'background-attachment' => false,
            'title'    => esc_html__( 'Bacgkround Color', 'whole' ),
            'subtitle' => esc_html__( 'Set background color for Footer Bottom.', 'whole' ),
            'output'   => array('#cms-theme #cms-footer-bottom'),
        ),
        array(
            'subtitle' => esc_html__('Set text color', 'whole'),
            'id' => 'footer_bottom_text_color',
            'type' => 'color',
            'title' => esc_html__('Text Color', 'whole'),
            'default' => '',
            'output'  => array('body #cms-footer-bottom'),
        ),
        array(
            'subtitle' => esc_html__('Set link color', 'whole'),
            'id' => 'footer_bottom_link_color',
            'type' => 'color',
            'title' => esc_html__('Link Color', 'whole'),
            'default' => '',
            'output'  => array('body #cms-footer-bottom a, body #cms-footer-bottom .cms-footer-bottom-item1 a'),
        ),
        array(
            'subtitle' => esc_html__('Set link color hover', 'whole'),
            'id' => 'footer_bottom_link_color_hover',
            'type' => 'color',
            'title' => esc_html__('Link Color Hover', 'whole'),
            'default' => '',
            'output'  => array('body #cms-footer-bottom a:hover, body #cms-footer-bottom .cms-footer-bottom-item1 a:hover'),
        ),
        array(
            'id'=>'cms_copyright',
            'type' => 'textarea',
            'title' => esc_html__('Copyright', 'whole'),
            'validate' => 'html_custom',
            'default' => '© 2017 Whole, With Love by <a href="7oroof.com">7oroof.com</a>',
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array()
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'span' => array(),
            )
        ),
    )
));

/**
 * Styling
 * 
 * css color.
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Styling', 'whole'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Set primary color.', 'whole'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'whole'),
            'default' => '#dd543d'
        ),
        array(
            'subtitle' => esc_html__('Set secondary color.', 'whole'),
            'id' => 'secondary_color',
            'type' => 'color',
            'title' => esc_html__('Secondary Color', 'whole'),
            'default' => '#222222'
        ),
        array(
            'subtitle' => esc_html__('Set link color.', 'whole'),
            'id' => 'link_color',
            'type' => 'color',
            'title' => esc_html__('Link Color', 'whole'),
            'default' => '#dd543d',
            'output'  => array('a'),
        ),
        array(
            'subtitle' => esc_html__('Set link color hover.', 'whole'),
            'id' => 'link_color_hover',
            'type' => 'color',
            'title' => esc_html__('Link Color Hover', 'whole'),
            'default' => '#ce452e',
            'output'  => array('a:hover'),
        ),
    )
));

/**
 * Typography
 * 
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Typography', 'whole'),
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => esc_html__('Body Font', 'whole'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'output'  => array('body'),
            'units' => 'px',
            'text-align' => false,
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'whole'),
            'default' => array(
                'color' => '#9b9b9b',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => 'Poppins',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '23px',
            )
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => esc_html__('H1', 'whole'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'text-align' => false,
            'output'  => array('h1'),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
            )
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => esc_html__('H2', 'whole'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'text-align' => false,
            'output'  => array('h2'),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
            )
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => esc_html__('H3', 'whole'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'text-align' => false,
            'output'  => array('h3'),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
            )
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => esc_html__('H4', 'whole'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'text-align' => false,
            'output'  => array('h4'),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
            )
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => esc_html__('H5', 'whole'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'text-align' => false,
            'output'  => array('h5'),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
            )
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => esc_html__('H6', 'whole'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => true,
            'text-align' => false,
            'output'  => array('h6'),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
            )
        ),
    )
));

/* Extra Font. */
$custom_font_1 = Redux::getOption($opt_name, 'google-font-selector-1');
$custom_font_1 = !empty($custom_font_1) ? explode(',', $custom_font_1) : array();

Redux::setSection($opt_name, array(
    'title' => esc_html__('Extra Fonts', 'whole'),
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => esc_html__('Custom Font', 'whole'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  =>  $custom_font_1,
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'whole'),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'google-font-selector-1',
            'type' => 'textarea',
            'title' => esc_html__('Selector 1', 'whole'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'whole'),
            'validate' => 'no_html',
            'default' => '',
        )
    )
));

/**
 * Blog Option
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog', 'whole'),
    'icon' => 'el el-blogger',
    'subsection' => false,
    'fields' => array(
        array(
            'id'       => 'blog_sidebar',
            'type'     => 'button_set',
            'title'    => esc_html__('Set sidebar for Blog', 'whole'),
            'options' => array(
                'left-sidebar' => 'Sidebar Left', 
                'no-sidebar' => 'No Sidebar', 
                'right-sidebar' => 'Sidebar Right'
             ), 
            'default' => 'right-sidebar'
        )
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Single Post', 'whole'),
    'icon' => 'el el-file-edit',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'single_sidebar',
            'type'     => 'button_set',
            'title'    => esc_html__('Set sidebar for Single Post', 'whole'),
            'options' => array(
                'left-sidebar' => 'Sidebar Left', 
                'no-sidebar' => 'No Sidebar', 
                'right-sidebar' => 'Sidebar Right'
             ), 
            'default' => 'right-sidebar'
        ),
        array(
            'id'       => 'post_comment',
            'type'     => 'button_set',
            'title' => esc_html__('Show/Hide Comment', 'whole'),
            'options' => array(
                'show' => 'Show', 
                'hide' => 'Hide',
             ), 
            'default' => 'show'
        ),
        array(
            'id'       => 'post_nav',
            'type'     => 'button_set',
            'title' => esc_html__('Show/Hide Pagination', 'whole'),
            'options' => array(
                'show' => 'Show', 
                'hide' => 'Hide',
             ), 
            'default' => 'hide'
        ),
        array(
            'id'       => 'post_author',
            'type'     => 'button_set',
            'title' => esc_html__('Show/Hide Author Info', 'whole'),
            'options' => array(
                'show' => 'Show', 
                'hide' => 'Hide',
             ), 
            'default' => 'hide'
        ),
    )
));

/**
 * Portfolio Option
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Portfolio', 'whole'),
    'icon' => 'el el-folder-close',
    'subsection' => false,
    'fields' => array(
        array(
            'id'       => 'theme_portfolio_layout',
            'type'     => 'select',
            'title'    => esc_html__( 'Layout', 'whole' ),
            'options'  => array(
                'layout1' => 'Layout 1 (Default)',
                'layout2' => 'Layout 2 (Samll Images)',
                'layout3' => 'Layout 3 (Small Slider)',
                'layout4' => 'Layout 4 (Big Slider)',
                'layout5' => 'Layout 5 (Gallery)',
                'layout6' => 'Layout 6 (Small Masonry)',
                'layout7' => 'Layout 7 (Big Masonry)',
                'layout8' => 'Layout 8 (Small Pinterest)',
                'layout9' => 'Layout 9 (Big Pinterest)',
            ),
            'default' => 'layout1'
        ),
        array(
            'title' => esc_html__('Background Images', 'whole'),
            'subtitle' => esc_html__('Change background image for Page Title', 'whole'),
            'id' => 'portfolio_bg_page_title',
            'type' => 'media',
            'url' => false,
            'default' => '',
        ),
    )
));

/**
 * Shop Option
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('WooCommerce', 'whole'),
    'icon' => 'el el-shopping-cart',
    'subsection' => false,
    'fields' => array(
        array(
            'subtitle' => 'Shop Category Layout',
            'id' => 'shop_layout',
            'type' => 'image_select',
            'default' => 'right-sidebar',
            'options' => array(
                'full-width' => get_template_directory_uri().'/assets/images/1col.png',
                'right-sidebar' => get_template_directory_uri().'/assets/images/2cr.png',
                'left-sidebar' => get_template_directory_uri().'/assets/images/2cl.png'
            ),
            'title' => 'Shop Category Layout',
        ),
        array(
            'title' => esc_html__('Products displayed per page', 'whole'),
            'id' => 'product_per_page',
            'type' => 'slider',
            'subtitle' => esc_html__('Number product to show', 'whole'),
            'default' => 9,
            'min'  => 6,
            'step' => 1,
            'max' => 50,
            'display_value' => 'text'
        ),
        array(
            'title' => esc_html__('Background Images', 'whole'),
            'subtitle' => esc_html__('Change background image for Page Title', 'whole'),
            'id' => 'shop_bg_page_title',
            'type' => 'media',
            'url' => false,
            'default' => '',
        ),
    )
));

/**
 * Optimal Core
 * 
 * Optimal options for theme. optimal speed
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Optimal Core', 'whole'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => esc_html__('no minimize , generate css over time...', 'whole'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => esc_html__('Dev Mode (not recommended)', 'whole'),
            'default' => true
        )
    )
));

/* Social Media */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Social Media', 'whole'),
    'icon' => 'el el-twitter',
    'subsection' => false,
    'fields' => array(
        array(
            'id' => 'social_facebook_url',
            'type' => 'text',
            'title' => esc_html__('Facebook URL', 'whole'),
            'default' => '',
        ),
        array(
            'id' => 'social_twitter_url',
            'type' => 'text',
            'title' => esc_html__('Twitter URL', 'whole'),
            'default' => '',
        ),
        array(
            'id' => 'social_inkedin_url',
            'type' => 'text',
            'title' => esc_html__('Inkedin URL', 'whole'),
            'default' => '',
        ),
        array(
            'id' => 'social_rss_url',
            'type' => 'text',
            'title' => esc_html__('Rss URL', 'whole'),
            'default' => '',
        ),
        array(
            'id' => 'social_instagram_url',
            'type' => 'text',
            'title' => esc_html__('Instagram URL', 'whole'),
            'default' => '',
        ),
        array(
            'id' => 'social_google_url',
            'type' => 'text',
            'title' => esc_html__('Google URL', 'whole'),
            'default' => '',
        ),
        array(
            'id' => 'social_skype_url',
            'type' => 'text',
            'title' => esc_html__('Skype URL', 'whole'),
            'default' => '',
        ),
        array(
            'id' => 'social_pinterest_url',
            'type' => 'text',
            'title' => esc_html__('Pinterest URL', 'whole'),
            'default' => '',
        ),
        array(
            'id' => 'social_vimeo_url',
            'type' => 'text',
            'title' => esc_html__('Vimeo URL', 'whole'),
            'default' => '',
        ),
        array(
            'id' => 'social_youtube_url',
            'type' => 'text',
            'title' => esc_html__('Youtube URL', 'whole'),
            'default' => '',
        ),
        array(
            'id' => 'social_yelp_url',
            'type' => 'text',
            'title' => esc_html__('Yelp URL', 'whole'),
            'default' => '',
        ),
        array(
            'id' => 'social_tumblr_url',
            'type' => 'text',
            'title' => esc_html__('Tumblr URL', 'whole'),
            'default' => '',
        ),

    )
));
