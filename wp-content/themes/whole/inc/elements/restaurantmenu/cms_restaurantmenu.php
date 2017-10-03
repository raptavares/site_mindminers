<?php
vc_map(array(
    "name" => 'CMS Restaurant Menu',
    "base" => "cms_restaurantmenu",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'whole'),
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'whole'),
            "param_name" => "title",
        ),

        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'whole'),
            "param_name" => "description",
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Price", 'whole'),
            "param_name" => "price",
        ),

    )
));

class WPBakeryShortCode_cms_restaurantmenu extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>