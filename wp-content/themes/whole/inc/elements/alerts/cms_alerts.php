<?php
vc_map(array(
    "name" => 'CMS Alerts',
    "base" => "cms_alerts",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', "whole"),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __ ( 'Alerts Text', "whole" ),
            "param_name" => "alerts_text",
            "value" => '',
            "group" => esc_html__("Alerts Settings", "whole")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Icon", 'whole'),
            "param_name" => "alerts_icon",
            "description" => 'Please add class icon. Use the library <a href="https://linearicons.com/free" target="_blank">Linearicons Free</a>, <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">FontAwesome</a>',
            "group" => esc_html__("Alerts Settings", 'whole'),
        ),

        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Alerts Style", "whole"),
            'param_name' => 'alerts_style',
            'value' => array(
                'Classic' => 'classic',      
                'Modern' => 'modern',      
                'Outline' => 'outline',      
                'Flat' => 'flat',      
            ),
            "group" => esc_html__("Alerts Settings", "whole"),
        ),  

    )
));

class WPBakeryShortCode_cms_alerts extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>