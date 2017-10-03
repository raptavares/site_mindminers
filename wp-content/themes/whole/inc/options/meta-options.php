<?php
/**
 * Meta box config file
 */
if (! class_exists('MetaFramework')) {
    return;
}

add_action('admin_head', 'whole_metabox');

function whole_metabox() {
  wp_enqueue_style('metabox', get_template_directory_uri() . '/inc/options/css/metabox.css');
}

/**
 * get list menu.
 * @return array
 */
function whole_get_nav_menu(){

    $menus = array(
        '' => esc_html__('Default', 'whole')
    );

    $obj_menus = wp_get_nav_menus();

    foreach ($obj_menus as $obj_menu){
        $menus[$obj_menu->term_id] = $obj_menu->name;
    }

    return $menus;
}

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => apply_filters('opt_meta', 'opt_meta_options'),
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Allow you to start the panel in an expanded way initially.
    'open_expanded' => false,
    // Disable the save warning when a user changes a field
    'disable_save_warn' => true,
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => false,

    'output' => false,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // 'disable_google_fonts_link' => true, // Disable this in case you want to create your own google fonts loader
    'admin_bar' => false,
    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => false,
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => false,
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => false
);

// -> Set Option To Panel.
MetaFramework::setArgs($args);

/** Page Options */
MetaFramework::setMetabox(array(
    'id' => '_page_main_options',
    'label' => esc_html__('Page Setting', 'whole'),
    'post_type' => 'page',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('Header', 'whole'),
            'id' => 'tab-page-header',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'id'       => 'custom_header',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Custom', 'whole'),
                    'subtitle' => esc_html__('', 'whole'),
                    'options' => array(
                        '1' => 'Yes', 
                        '' => 'No',
                     ), 
                    'default' => ''
                ),
                array(
                    'id' => 'header_layout',
                    'title' => esc_html__('Layouts', 'whole'),
                    'subtitle' => esc_html__('Select a layout for header', 'whole'),
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
                    ),
                    'required' => array( 'custom_header', '=', '1' )
                ),
                array(
                    'id' => 'header_full_width',
                    'type' => 'switch',
                    'title' => esc_html__('Header Full Width', 'whole'),
                    'default' => false,
                    'required' => array( 'custom_header', '=', '1' )
                ),
                array(
                    'id' => 'header_sticky_dark',
                    'type' => 'switch',
                    'title' => esc_html__('Header Sticky Dark', 'whole'),
                    'default' => false,
                    'required' => array( 'custom_header', '=', '1' ),
                    'desc' => esc_html__('Apply Header layout1.', 'whole'),
                ),
                array(
                    'id'       => 'header_line_bottom_style',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Line Bottom Style', 'whole'),
                    'subtitle' => esc_html__('', 'whole'),
                    'options' => array(
                        'h-line-none' => 'None', 
                        'h-line-style1' => 'Style 1', 
                        'h-line-style2' => 'Style 2',
                     ), 
                    'default' => 'h-line-none',
                    'required' => array( 'custom_header', '=', '1' )
                ),
                array(
                    'title' => esc_html__('Main Logo', 'whole'),
                    'id' => 'main_logo',
                    'type' => 'media',
                    'url' => false,
                    'default' => '',
                    'required' => array( 'custom_header', '=', '1' )
                ),

                array(
                    'title' => esc_html__('Sticky Logo', 'whole'),
                    'id' => 'sticky_logo',
                    'type' => 'media',
                    'url' => false,
                    'default' => '',
                    'required' => array( 'custom_header', '=', '1' )
                ),
              
                array(
                    'id'       => 'main_logo_height',
                    'type'     => 'dimensions',
                    'units'    => array('px'),
                    'title'    => esc_html__('Logo (Width/Height)', 'whole'),
                    'subtitle' => esc_html__('', 'whole'),
                    'default'  => array(
                        'Width'   => '', 
                        'Height'  => ''
                    ),
                    'required' => array( 'custom_header', '=', '1' )
                ),
                array(
                    'id'       => 'header_menu',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Select Menu', 'whole' ),
                    'subtitle' => esc_html__( 'custom menu for current page', 'whole' ),
                    'options'  => whole_get_nav_menu(),
                    'default' => '',
                    'required' => array( 'custom_header', '=', '1' )
                ),
            )
        ),
        array(
            'title' => esc_html__('Page Title', 'whole'),
            'id' => 'tab-page-title-bc',
            'icon' => 'el el-map-marker',
            'fields' => array(
                array(
                    'id'       => 'custom_page_title',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Custom Layout', 'whole'),
                    'subtitle' => esc_html__('', 'whole'),
                    'options' => array(
                        '1' => 'Yes',
                        '' => 'No',
                    ),
                    'default' => ''
                ),
                array(
                    'title' => esc_html__('Page Title', 'whole'),
                    'type'  => 'section',
                    'id' => 'heading_page_title',
                    'indent' => true,
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id' => 'page_title_layout',
                    'title' => esc_html__('Layouts', 'whole'),
                    'subtitle' => esc_html__('select a layout for page title', 'whole'),
                    'default' => '1',
                    'type' => 'image_select',
                    'options' => array(
                        '' => get_template_directory_uri().'/assets/images/pagetitle/p0.jpg',
                        '1' => get_template_directory_uri().'/assets/images/pagetitle/p1.jpg',
                        '2' => get_template_directory_uri().'/assets/images/pagetitle/p2.jpg',
                        '3' => get_template_directory_uri().'/assets/images/pagetitle/p3.jpg',
                        '4' => get_template_directory_uri().'/assets/images/pagetitle/p4.jpg',
                        
                    ),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'title' => esc_html__('Select Background Image', 'whole'),
                    'id' => 'page_bg_page_title',
                    'type' => 'media',
                    'url' => false,
                    'default' => '',
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id' => 'pagetitle_overlay',
                    'type' => 'color_rgba',
                    'title' => __('Overlay Color', 'whole'),
                    'default' => array('color'=>'#1b1a1a','alpha'=>'0.5', 'rgba'=>'rgba(27,26,26,0.5)'),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id' => 'page_title_text',
                    'type' => 'text',
                    'title' => esc_html__('Page Title', 'whole'),
                    'subtitle' => esc_html__('Custom current page title.', 'whole'),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id' => 'page_title_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Title Color', 'whole'),
                    'default' => '',
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id' => 'page_title_font_size',
                    'type' => 'text',
                    'title' => esc_html__('Page Title - Font Size', 'whole'),
                    'subtitle' => esc_html__('Enter: ...px', 'whole'),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id' => 'page_title_line_height',
                    'type' => 'text',
                    'title' => esc_html__('Page Title - Line Hegiht', 'whole'),
                    'subtitle' => esc_html__('Enter: ...px', 'whole'),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id'             => 'page_title_padding',
                    'type'           => 'spacing',
                    'right'   => false,
                    'left'    => false,
                    'mode'           => 'padding',
                    'units'          => array('px'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Title Padding', 'whole'),
                    'default'            => array(
                        'padding-top'   => '',  
                        'padding-bottom'   => '',  
                        'units'          => 'px', 
                    ),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id' => 'page_title_sub',
                    'type' => 'text',
                    'title' => esc_html__('Sub Title', 'whole'),
                    'subtitle' => esc_html__('', 'whole'),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id'             => 'page_subtitle_padding',
                    'type'           => 'spacing',
                    'right'   => false,
                    'left'    => false,
                    'mode'           => 'padding',
                    'units'          => array('px'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Sub Title Padding', 'whole'),
                    'desc'           => esc_html__('', 'whole'),
                    'default'            => array(
                        'padding-top'   => '',  
                        'padding-bottom'   => '',  
                        'units'          => 'px', 
                    ),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id'             => 'page_pagetitle_padding',
                    'type'           => 'spacing',
                    'right'   => false,
                    'left'    => false,
                    'mode'           => 'padding',
                    'units'          => array('px'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Content Padding', 'whole'),
                    'desc'           => esc_html__('', 'whole'),
                    'default'            => array(
                        'padding-top'   => '',  
                        'padding-bottom'   => '',  
                        'units'          => 'px', 
                    ),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id'       => 'page_pagetitle_align',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Text Align', 'whole'),
                    'subtitle' => esc_html__('', 'whole'),
                    'options' => array(
                        '' => 'Default', 
                        'left' => 'Left', 
                        'center' => 'Center',
                        'right' => 'Right',
                     ), 
                    'default' => '',
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id'       => 'page_pagetitle_fullscreen',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Page Title Fullscreen', 'whole'),
                    'options' => array(
                        '' => 'No', 
                        'yes' => 'Yes',
                     ), 
                    'default' => '',
                    'desc'           => esc_html__('Apply Page Title layout1, layout2', 'whole'),
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'title' => esc_html__('Breadcrumb', 'whole'),
                    'type'  => 'section',
                    'id' => 'heading_breadcrumb',
                    'indent' => true,
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id'       => 'hidden_breadcrumb',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Hidden Breadcrumb', 'whole'),
                    'options' => array(
                        '' => 'No', 
                        'yes' => 'Yes',
                     ), 
                    'default' => '',
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
                array(
                    'id' => 'breadcrumb_color',
                    'type' => 'color',
                    'title' => esc_html__('Breadcrumb Color', 'whole'),
                    'default' => '',
                    'required' => array( 'custom_page_title', '=', '1' )
                ),
            )
        ),
        array(
            'title' => esc_html__('Footer', 'whole'),
            'id' => 'tab-footer-bc',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'id'       => 'custom_footer',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Custom', 'whole'),
                    'subtitle' => esc_html__('', 'whole'),
                    'options' => array(
                        '1' => 'Yes', 
                        '' => 'No',
                     ), 
                    'default' => ''
                ),
                array(
                    'id' => 'footer_layout',
                    'title' => esc_html__('Layouts', 'whole'),
                    'subtitle' => esc_html__('select a layout for page title', 'whole'),
                    'default' => '1',
                    'type' => 'image_select',
                    'options' => array(
                        '0' => get_template_directory_uri().'/assets/images/footer/f0.jpg',
                        '1' => get_template_directory_uri().'/assets/images/footer/f1.jpg',
                        '2' => get_template_directory_uri().'/assets/images/footer/f2.jpg',
                        '3' => get_template_directory_uri().'/assets/images/footer/f3.jpg',
                        '4' => get_template_directory_uri().'/assets/images/footer/f4.jpg',
                        '5' => get_template_directory_uri().'/assets/images/footer/f5.jpg',
                    ),
                    'required' => array( 'custom_footer', '=', '1' )
                ),
                array(
                    'id' => 'bg_footer_color',
                    'type' => 'color_rgba',
                    'title' => __('Background Color', 'whole'),
                    'default' => array('color'=>'#222222','alpha'=>'1', 'rgba'=>'rgba(34,34,34,1)'),
                    'required' => array( 'custom_footer', '=', '1' )
                ),
                array(
                    'id'       => 'bg_footer',
                    'type'     => 'background',
                    'background-color'     => false,
                    'background-repeat'     => false,
                    'background-attachment'     => false,
                    'background-position'     => false,
                    'background-size'     => false,
                    'title'    => esc_html__( 'Background Image', 'whole' ),
                    'output'   => array('#colophon.site-footer'),
                    'default'  => array(
                        'background-image' => get_template_directory_uri().'/assets/images/bg-footer.jpg'
                    ),
                    'required' => array( 'custom_footer', '=', '1' )
                ),
            )
        ),
        array(
            'title' => esc_html__('Page', 'whole'),
            'id' => 'tab-page-bc',
            'icon' => 'el el-photo',
            'fields' => array(
                array(
                    'id'       => 'enable_sidebar',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Custom Sidebar', 'whole'),
                    'subtitle' => esc_html__('', 'whole'),
                    'options' => array(
                        '1' => 'Yes', 
                        '' => 'No',
                     ), 
                    'default' => ''
                ),
                array(
                    'id'       => 'page_sidebar',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Set sidebar for Page', 'whole'),
                    'subtitle' => esc_html__('', 'whole'),
                    'options' => array(
                        'left-sidebar' => 'Sidebar Left', 
                        'no-sidebar' => 'No Sidebar', 
                        'right-sidebar' => 'Sidebar Right'
                     ), 
                    'default' => 'no-sidebar',
                    'required' => array( 'enable_sidebar', '=', '1' )
                ),
                array(
                    'id'       => 'page_border',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Body Border', 'whole'),
                    'subtitle' => esc_html__('', 'whole'),
                    'options' => array(
                        '1' => 'Yes', 
                        '' => 'No',
                     ), 
                    'default' => ''
                ),
                array(
                    'id'             => 'page_content_padding',
                    'type'           => 'spacing',
                    'right'   => false,
                    'left'    => false,
                    'mode'           => 'padding',
                    'units'          => array('px'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Padding', 'whole'),
                    'desc'           => esc_html__('Default: Top-100px, Bottom-100px', 'whole'),
                    'default'            => array(
                        'padding-top'   => '',  
                        'padding-bottom'   => '',  
                        'units'          => 'px', 
                    )
                ),
                array(
                    'id' => 'content_bg_color',
                    'type' => 'color',
                    'title' => esc_html__('Content Background Color', 'whole'),
                    'default' => '',
                ),
            )
        ),
        array(
            'title' => esc_html__('One Page', 'whole'),
            'id' => 'tab-one-page',
            'icon' => 'el el-download-alt',
            'fields' => array(
                array(
                    'subtitle' => esc_html__('Enable one page mode for current page.', 'whole'),
                    'id' => 'page_one_page',
                    'type' => 'switch',
                    'title' => esc_html__('Enable', 'whole'),
                    'default' => false,
                )
            )
        )
    )
));

/** Post Extra Option */
MetaFramework::setMetabox(array(
    'id' => '_post_extra_options',
    'label' => esc_html__('Post Settings', 'whole'),
    'post_type' => 'post',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('Page Title', 'whole'),
            'id' => 'tab-page-header',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'title' => esc_html__('Change Background Images', 'whole'),
                    'id' => 'post_bg_page_title',
                    'type' => 'media',
                    'url' => false,
                    'default' => '',
                ),
                array(
                    'id' => 'post_title_sub',
                    'type' => 'text',
                    'title' => esc_html__('Sub Title', 'whole'),
                    'subtitle' => esc_html__('', 'whole'),
                ),
                array(
                    'id'       => 'single_sidebar',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Sidebar', 'whole'),
                    'options' => array(
                        '' => 'Default Theme Option', 
                        'left-sidebar' => 'Sidebar Left', 
                        'no-sidebar' => 'No Sidebar', 
                        'right-sidebar' => 'Sidebar Right'
                     ), 
                    'default' => ''
                ),
            )
        ),
    )
));

/** Post Options */
MetaFramework::setMetabox(array(
    'id' => '_page_post_format_options',
    'label' => esc_html__('Post Format', 'whole'),
    'post_type' => 'post',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => true,
    'sections' => array(
        array(
            'title' => '',
            'id' => 'color-Color',
            'icon' => 'el el-laptop',
            'fields' => array(
                array(
                    'id'       => 'opt-video-type',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Select Video Type', 'whole' ),
                    'subtitle' => esc_html__( 'Local video, Youtube, Vimeo', 'whole' ),
                    'options'  => array(
                        'local' => esc_html__('Upload', 'whole' ),
                        'youtube' => esc_html__('Youtube', 'whole' ),
                        'vimeo' => esc_html__('Vimeo', 'whole' ),
                    )
                ),
                array(
                    'id'       => 'otp-video-local',
                    'type'     => 'media',
                    'url'      => true,
                    'mode'       => false,
                    'title'    => esc_html__( 'Local Video', 'whole' ),
                    'subtitle' => esc_html__( 'Upload video media using the WordPress native uploader', 'whole' ),
                    'required' => array( 'opt-video-type', '=', 'local' )
                ),
                array(
                    'id'       => 'opt-video-youtube',
                    'type'     => 'text',
                    'title'    => esc_html__('Youtube', 'whole'),
                    'subtitle' => esc_html__('Load video from Youtube.', 'whole'),
                    'placeholder' => esc_html__('https://youtu.be/iNJdPyoqt8U', 'whole'),
                    'required' => array( 'opt-video-type', '=', 'youtube' )
                ),
                array(
                    'id'       => 'opt-video-vimeo',
                    'type'     => 'text',
                    'title'    => esc_html__('Vimeo', 'whole'),
                    'subtitle' => esc_html__('Load video from Vimeo.', 'whole'),
                    'placeholder' => esc_html__('https://vimeo.com/155673893', 'whole'),
                    'required' => array( 'opt-video-type', '=', 'vimeo' )
                ),
                array(
                    'id'       => 'otp-video-thumb',
                    'type'     => 'media',
                    'url'      => true,
                    'mode'       => false,
                    'title'    => esc_html__( 'Video Thumb', 'whole' ),
                    'subtitle' => esc_html__( 'Upload thumb media using the WordPress native uploader', 'whole' ),
                    'required' => array( 'opt-video-type', '=', 'local' )
                ),
                array(
                    'id'       => 'otp-audio',
                    'type'     => 'media',
                    'url'      => true,
                    'mode'       => false,
                    'title'    => esc_html__( 'Audio Media', 'whole' ),
                    'subtitle' => esc_html__( 'Upload audio media using the WordPress native uploader', 'whole' ),
                ),
                array(
                    'id'       => 'opt-gallery',
                    'type'     => 'gallery',
                    'title'    => esc_html__( 'Add/Edit Gallery', 'whole' ),
                    'subtitle' => esc_html__( 'Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'whole' ),
                ),
                array(
                    'id'       => 'opt-quote-title',
                    'type'     => 'text',
                    'title'    => esc_html__('Quote Title', 'whole'),
                    'subtitle' => esc_html__('Quote title or quote name...', 'whole'),
                ),
                array(
                    'id'       => 'opt-quote-content',
                    'type'     => 'textarea',
                    'title'    => esc_html__('Quote Content', 'whole'),
                ),
            )
        ),
    )
));

/** Testimonial Options */
MetaFramework::setMetabox(array(
    'id' => '_testimonial_options',
    'label' => esc_html__('Testimonial Setting', 'whole'),
    'post_type' => 'testimonial',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('General', 'whole'),
            'id' => 'tab-page-header',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'id' => 'testimonial_position',
                    'type' => 'text',
                    'title' => esc_html__('Position', 'whole'),
                    'default' => '',
                ),
            )
        ),
    )
));

/** Team Options */
MetaFramework::setMetabox(array(
    'id' => '_team_options',
    'label' => esc_html__('Team Setting', 'whole'),
    'post_type' => 'team',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('Social', 'whole'),
            'id' => 'tab-page-header',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'id' => 'team_icon1',
                    'type' => 'text',
                    'title' => esc_html__('Icon 1', 'whole'),
                    'default' => '',
                    'desc' => 'Please add class icon. Use the library <a href="https://linearicons.com/free" target="_blank">Linearicons Free</a>, <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">FontAwesome</a>',
                ),
                array(
                    'id' => 'team_link1',
                    'type' => 'text',
                    'title' => esc_html__('Link 1', 'whole'),
                    'default' => '',
                ),
                array(
                    'id' => 'team_icon2',
                    'type' => 'text',
                    'title' => esc_html__('Icon 2', 'whole'),
                    'default' => '',
                ),
                array(
                    'id' => 'team_link2',
                    'type' => 'text',
                    'title' => esc_html__('Link 2', 'whole'),
                    'default' => '',
                ),
                array(
                    'id' => 'team_icon3',
                    'type' => 'text',
                    'title' => esc_html__('Icon 3', 'whole'),
                    'default' => '',
                ),
                array(
                    'id' => 'team_link3',
                    'type' => 'text',
                    'title' => esc_html__('Link 3', 'whole'),
                    'default' => '',
                ),
                array(
                    'id' => 'team_icon4',
                    'type' => 'text',
                    'title' => esc_html__('Icon 4', 'whole'),
                    'default' => '',
                ),
                array(
                    'id' => 'team_link4',
                    'type' => 'text',
                    'title' => esc_html__('Link 4', 'whole'),
                    'default' => '',
                ),
            )
        ),
        array(
            'title' => esc_html__('Position', 'whole'),
            'id' => 'tab-page-position',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'id' => 'team_position',
                    'type' => 'text',
                    'title' => esc_html__('Position', 'whole'),
                    'default' => '',
                ),
            )
        ),
    )
));

/** Client Options */
MetaFramework::setMetabox(array(
    'id' => '_client_options',
    'label' => esc_html__('Client Setting', 'whole'),
    'post_type' => 'client',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('General', 'whole'),
            'id' => 'tab-page-header',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'id' => 'client_link',
                    'type' => 'text',
                    'title' => esc_html__('Link', 'whole'),
                    'default' => '',
                ),
            )
        ),
    )
));

/** Portfolio Options */
MetaFramework::setMetabox(array(
    'id' => '_portfolio_options',
    'label' => esc_html__('Portfolio Setting', 'whole'),
    'post_type' => 'portfolio',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('General', 'whole'),
            'id' => 'tab-page-header',
            'icon' => 'el el-credit-card',
            'fields' => array(
                array(
                    'id'       => 'portfolio_layout_show',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Select Layout', 'whole'),
                    'subtitle' => esc_html__('', 'whole'),
                    'options' => array(
                        '1' => 'Yes', 
                        '' => 'No',
                     ), 
                    'default' => ''
                ),

                array(
                    'id'       => 'single_portfolio_layout',
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
                    'default' => 'layout1',
                    'required' => array( 'portfolio_layout_show', '=', '1' )
                ),

                array(
                    'id'       => 'single_portfolio_gallery',
                    'type'     => 'gallery',
                    'title'    => esc_html__( 'Gallery', 'whole' ),
                ),

                array(
                    'id'       => 'width_item',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Custom Width Item', 'whole'),
                    'options' => array( 
                        'w_default' => 'Default', 
                        'w75' => '75%', 
                        'w50' => '50%', 
                        'w33' => '33%', 
                        'w25' => '25%', 
                     ), 
                    'default' => '',
                    'description' => 'Apply layout CMS Grid - Portfolio Masonry'
                ),
                array(
                    'title' => esc_html__('Featured Image', 'whole'),
                    'id' => 'portfolio_featured_image',
                    'type' => 'media',
                    'url' => false,
                    'default' => '',
                    'description' => 'Apply layout CMS Grid - Portfolio Masonry'
                ),
            )
        ),
        array(
            'title' => esc_html__('About', 'whole'),
            'id' => 'tab-page-header',
            'icon' => 'el el-adult',
            'fields' => array(
                array(
                    'id' => 'portfolio_client',
                    'type' => 'text',
                    'title' => esc_html__('Client', 'whole'),
                    'default' => '',
                ),
                array(
                    'id' => 'portfolio_location',
                    'type' => 'text',
                    'title' => esc_html__('Location', 'whole'),
                    'default' => '',
                ),
            )
        ),
    )
));

/** Demo Options */
MetaFramework::setMetabox(array(
    'id' => '_demo_options',
    'label' => esc_html__('Demo Setting', 'whole'),
    'post_type' => 'demo',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('Demo', 'whole'),
            'id' => 'tab-page-header',
            'icon' => 'el el-adult',
            'fields' => array(
                array(
                    'id'    => 'demo_url',
                    'type'  => 'select',
                    'title' => __( 'Select Page Demo', 'whole' ), 
                    'data'  => 'page',
                    'args'  => array(
                        'post_type'      => 'page',
                        'posts_per_page' => -1,
                        'orderby'        => 'title',
                        'order'          => 'ASC',
                    )
                )
            )
        ),
    )
));

/** Showcase Options */
MetaFramework::setMetabox(array(
    'id' => '_showcase_options',
    'label' => esc_html__('Showcase Setting', 'whole'),
    'post_type' => 'showcase',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('Showcase', 'whole'),
            'id' => 'tab-page-header',
            'icon' => 'el el-adult',
            'fields' => array(
                array(
                    'id'    => 'showcase_url',
                    'type'  => 'select',
                    'title' => __( 'Select Page Showcase', 'whole' ), 
                    'data'  => 'page',
                    'args'  => array(
                        'post_type'      => 'page',
                        'posts_per_page' => -1,
                        'orderby'        => 'title',
                        'order'          => 'ASC',
                    )
                )
            )
        ),
    )
));

/** Icon Text Options */
MetaFramework::setMetabox(array(
    'id' => '_icontext_options',
    'label' => esc_html__('Icon Text Setting', 'whole'),
    'post_type' => 'icon_text',
    'context' => 'advanced',
    'priority' => 'default',
    'open_expanded' => false,
    'sections' => array(
        array(
            'title' => esc_html__('Icon Text', 'whole'),
            'id' => 'tab-page-header',
            'icon' => 'el el-adult',
            'fields' => array(
                array(
                    'id' => 'icon_text',
                    'type' => 'text',
                    'title' => esc_html__('Icon Text', 'whole'),
                    'default' => '',
                    'desc' => 'Please add class icon. Use the library <a href="https://linearicons.com/free" target="_blank">Linearicons Free</a>, <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">FontAwesome</a>',
                ),
            )
        ),
    )
));

MetaFramework::init();