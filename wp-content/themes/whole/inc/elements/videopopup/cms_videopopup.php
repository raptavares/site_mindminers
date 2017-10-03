<?php
vc_map(array(
    "name" => 'CMS Video Popup',
    "base" => "cms_videopopup",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'whole'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __ ( 'Video Url', 'whole' ),
            "param_name" => "video_url",
            "value" => '',
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Button Style", 'whole'),
            "admin_label" => true,
            "param_name" => "style_button",
            "value" => array(
                "Style 1" => "style1",
                "Style 2" => "style2",
                "Style 3" => "style3",
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Add Intro Video", 'whole'),
            "admin_label" => true,
            "param_name" => "intro_custom",
            "value" => array(
                "No" => "",
                "Yes" => "yes",
            ),
        ),
        array(
            "type" => "attach_image",
            "heading" => __ ( 'Video Intro', 'whole' ),
            "param_name" => "video_intro",
            "value" => '',
            "dependency" => array(
                "element"=>"intro_custom",
                "value"=>array(
                    "yes",
                )
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Intro Heiht', 'whole' ),
            "param_name" => "intro_height",
            "value" => '',
            "dependency" => array(
                "element"=>"intro_custom",
                "value"=>array(
                    "yes",
                )
            ),
            "description" => 'Enter: ..px (Default 360px)'
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Overlay", 'whole'),
            "param_name" => "overlay",
            "value" => "",
            "dependency" => array(
                "element"=>"intro_custom",
                "value"=>array(
                    "yes",
                )
            ),
        ),
    )
));

class WPBakeryShortCode_cms_videopopup extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>