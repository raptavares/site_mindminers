<?php

/**
 * Auto create css from Meta Options.
 * 
 * @author Fox
 * @version 1.0.0
 */
class CMSSuperHeroes_DynamicCss
{

    function __construct()
    {
        add_action('wp_head', array($this, 'generate_css'));
    }

    /**
     * generate css inline.
     *
     * @since 1.0.0
     */
    public function generate_css()
    {
        echo '<style type="text/css" data-type="custom-css">'.$this->css_render().'</style>';
    }

    /**
     * header css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $opt_theme_options, $opt_meta_options;
        ob_start();

        /* Start Style */
        if (is_page() && isset($opt_meta_options['page_pagetitle_padding']['padding-top'])) {
            echo "body #cms-page-title { 
                padding-top: ".esc_attr($opt_meta_options['page_pagetitle_padding']['padding-top']).";
            }";
        }
        if (is_page() && isset($opt_meta_options['page_pagetitle_padding']['padding-bottom'])) {
            echo "body #cms-page-title {
                padding-bottom: ".esc_attr($opt_meta_options['page_pagetitle_padding']['padding-bottom']).";
            }";
        }

        /* Page Title */
        if(!empty($opt_meta_options['custom_page_title']) && !empty($opt_meta_options['pagetitle_overlay']['rgba'])) {
            echo "body #cms-page-title:before {
                background-color:".esc_attr($opt_meta_options['pagetitle_overlay']['rgba']).";
            }";
        }

        if (is_page() && isset($opt_meta_options['page_title_padding']['padding-top'])) {
            echo "#cms-page-title .cms-page-title-inner h1 { 
                padding-top: ".esc_attr($opt_meta_options['page_title_padding']['padding-top']).";
            }";
        }
        if (is_page() && isset($opt_meta_options['page_title_padding']['padding-bottom'])) {
            echo "#cms-page-title .cms-page-title-inner h1 {
                padding-bottom: ".esc_attr($opt_meta_options['page_title_padding']['padding-bottom']).";
            }";
        }

        if (is_page() && isset($opt_meta_options['page_subtitle_padding']['padding-top'])) {
            echo "#cms-page-title .cms-page-title-inner span { 
                padding-top: ".esc_attr($opt_meta_options['page_subtitle_padding']['padding-top']).";
            }";
        }
        if (is_page() && isset($opt_meta_options['page_subtitle_padding']['padding-bottom'])) {
            echo "#cms-page-title .cms-page-title-inner span {
                padding-bottom: ".esc_attr($opt_meta_options['page_subtitle_padding']['padding-bottom']).";
            }";
        }

        if (is_page() && isset($opt_meta_options['page_content_padding']['padding-top'])) {
            echo "body #cms-content.site-content { 
                padding-top: ".esc_attr($opt_meta_options['page_content_padding']['padding-top']).";
            }";
        }
        if (is_page() && isset($opt_meta_options['page_content_padding']['padding-bottom'])) {
            echo "body #cms-content.site-content {
                padding-bottom: ".esc_attr($opt_meta_options['page_content_padding']['padding-bottom']).";
            }";
        }

        if (is_page() && isset($opt_meta_options['page_title_color'])) {
            echo "#cms-theme #cms-page-title.page-title .cms-page-title-inner h1 {
                color: ".esc_attr($opt_meta_options['page_title_color']).";
            }";
        }

        if (is_page() && isset($opt_meta_options['page_title_font_size'])) {
            echo "#cms-theme #cms-page-title.page-title .cms-page-title-inner h1 {
                font-size: ".esc_attr($opt_meta_options['page_title_font_size']).";
            }";
        }

        if (is_page() && isset($opt_meta_options['page_title_line_height'])) {
            echo "#cms-theme #cms-page-title.page-title .cms-page-title-inner h1 {
                line-height: ".esc_attr($opt_meta_options['page_title_line_height']).";
            }";
        }

        if (is_page() && isset($opt_meta_options['breadcrumb_color'])) {
            echo "#cms-theme #cms-page-title.page-title .cms-breadcrumb .breadcrumbs li, #cms-theme #cms-page-title.page-title .cms-breadcrumb .breadcrumbs li a, #cms-theme #cms-page-title.page-title .cms-breadcrumb .breadcrumbs li::after {
                color: ".esc_attr($opt_meta_options['breadcrumb_color']).";
            }";
        }


        /* Header */

        if (is_page() && isset($opt_meta_options['main_logo_height']['height'])) {
            echo "@media screen and (min-width: 992px) { body #cshero-header-inner #cshero-header-logo a img {
                height: ".esc_attr($opt_meta_options['main_logo_height']['height']).";
            }}";
        }
        if (is_page() && isset($opt_meta_options['main_logo_height']['width'])) {
            echo "@media screen and (min-width: 992px) { body #cshero-header-inner #cshero-header-logo a img {
                width: ".esc_attr($opt_meta_options['main_logo_height']['width']).";
            }}";
        }

        if (is_page() && !empty($opt_meta_options['header_full_width'])) {
            echo "body #cshero-header > .container {
                width: 100%;
                padding: 0 50px;
            }";
        }

        if (is_page() && ($opt_meta_options['header_line_bottom_style'] == 'h-line-style1')) {
            echo ".header-trans #cshero-header:not(.header-fixed) {
                border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            }";
        }

        if (is_page() && ($opt_meta_options['header_line_bottom_style'] == 'h-line-style2')) {
            echo ".header-trans #cshero-header:not(.header-fixed) > .container {
                position: relative;
            }";
            echo ".header-trans #cshero-header:not(.header-fixed) > .container:before {
                content: '';
                position: absolute;
                left: 15px;
                right: 15px;
                bottom: 0;
                background-color: rgba(255, 255, 255, 0.15);
                height: 1px;
                display: block;
            }";
        }

        /* Body */
        if (is_page() && !empty($opt_meta_options['content_bg_color'])) {
            echo "body #cms-content {
                background-color: ".esc_attr($opt_meta_options['content_bg_color']).";
            }";
        }

        /* Footer */
        if(!empty($opt_meta_options['custom_footer']) && !empty($opt_meta_options['bg_footer_color']['rgba'])) {
            echo "#cms-theme #colophon.site-footer::before {
                background-color:".esc_attr($opt_meta_options['bg_footer_color']['rgba']).";
            }";
        }
        if(!empty($opt_meta_options['bg_footer']['background-image']) && !empty($opt_meta_options['bg_footer']['background-image'])) {
            echo "#cms-theme #colophon.site-footer {
                background-image: url(".$opt_meta_options['bg_footer']['background-image'].");
            }";
        }
        

        /* Custom CSS */
        if(!empty($opt_theme_options['custom_css']))
            echo esc_html($opt_theme_options['custom_css']);
        
        return ob_get_clean();
    }
}

new CMSSuperHeroes_DynamicCss();