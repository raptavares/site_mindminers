<?php
vc_map(array(
    "name" => 'CMS Pricing',
    "base" => "cms_pricing",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'whole'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __ ( 'Title', 'whole' ),
            "param_name" => "title_pricing",
            "value" => '',
            "group" => esc_html__("Pricing Settings", 'whole')
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Sub Title', 'whole' ),
            "param_name" => "sub_title_pricing",
            "value" => '',
            "group" => esc_html__("Pricing Settings", 'whole')
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Currency', 'whole' ),
            "param_name" => "currency_type",
            "value" => '',
            "group" => esc_html__("Pricing Settings", 'whole')
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Price', 'whole' ),
            "param_name" => "values_price",
            "value" => '',
            "group" => esc_html__("Pricing Settings", 'whole')
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Time', 'whole' ),
            "param_name" => "pricing_time",
            "value" => 'Month',
            "group" => esc_html__("Pricing Settings", 'whole'),
            "description" => 'Week, Month, Year',
        ),
        array(
            'type' => 'param_group',
            "heading" => __ ( 'List Description', 'whole' ),
            'value' => '',
            'param_name' => 'description_pricing',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'value' => '',
                    'heading' => 'Enter your description(multiple field)',
                    'param_name' => 'description_item',
                ),
            ),
            "group" => esc_html__("Pricing Settings", 'whole'),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Text Button', 'whole' ),
            "param_name" => "text_button",
            "value" => '',
            "group" => esc_html__("Pricing Settings", 'whole')
        ),
        array(
            "type" => "vc_link",
            "heading" => __ ( 'Link Button', 'whole' ),
            "param_name" => "link_button",
            "value" => '',
            "group" => esc_html__("Pricing Settings", 'whole')
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Style", 'whole'),
            'param_name' => 'pricing_style',
            'value' => array(
                'Style 1' => 'pricing-style1', 
                'Style 2' => 'pricing-style2', 
            ),
            "group" => esc_html__("Pricing Settings", 'whole'),
        ),  
    )
));

class WPBakeryShortCode_cms_pricing extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>