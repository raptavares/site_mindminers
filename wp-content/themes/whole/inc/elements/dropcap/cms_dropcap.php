<?php
vc_map(array(
    "name" => 'CMS Dropcap',
    "base" => "cms_dropcap",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'whole'),
    "params" => array(

        array(
            "type" => "textarea",
            "heading" => esc_html__("Content", 'whole'),
            "param_name" => "dropcap_content",
            "description" => esc_html__("", 'whole'),
        ),

         array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Style", 'whole'),
            'param_name' => 'dropcap_style',
            'value' => array(
                'Default' => 'style1',
                'Box Dark' => 'style2',
                'Box Gray' => 'style3',
            ),
        ),  


    )
));

class WPBakeryShortCode_cms_dropcap extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>