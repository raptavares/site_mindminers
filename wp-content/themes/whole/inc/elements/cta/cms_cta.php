<?php
vc_map(array(
    "name" => 'CMS Call To Action',
    "base" => "cms_cta",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'whole'),
    "params" => array(
        array(
            "type" => "textarea",
            "heading" => __ ( 'Title', 'whole' ),
            "param_name" => "cta_title",
            "value" => '',
            "group" => esc_html__("Settings", 'whole')
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", "whole"),
            "param_name" => "cta_title_color",
            "value" => "",
            "group" => esc_html__("Settings", 'whole')
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Text Button', 'whole' ),
            "param_name" => "button_text",
            "value" => '',
            "group" => esc_html__("Settings", 'whole')
        ),
        array(
            "type" => "vc_link",
            "class" => "",
            "heading" => esc_html__("Link Button", 'whole'),
            "param_name" => "link_button",
            "value" => '',
            "group" => esc_html__("Settings", 'whole')
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Style", 'whole'),
            'param_name' => 'button_style',
            'value' => array(      
                'Primary Alt' => 'btn-primary-alt',   
                'Primary White' => 'btn-primary-white',         
                'Default White' => 'btn-default-white',         
            ),
            "group" => esc_html__("Settings", 'whole'),
        ),  
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Align", 'whole'),
            'param_name' => 'button_align',
            'value' => array(
                'Right' => 'cta-right',   
                'Left' => 'cta-left',        
            ),
            "group" => esc_html__("Settings", 'whole'),
        ),  
    )
));

class WPBakeryShortCode_cms_cta extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>