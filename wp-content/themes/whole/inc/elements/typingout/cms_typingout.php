<?php
vc_map(array(
    "name" => 'CMS Typing Out',
    "base" => "cms_typingout",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'whole'),
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Content", 'whole'),
            "param_name" => "description",
        ),

        array(
            "type" => "textarea",
            "heading" => esc_html__("Typing Out", 'whole'),
            "param_name" => "typingout",
            'description' => 'Please add text: "intensely.", "brightly.", "brilliantly." '
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Font Size", 'whole'),
            "param_name" => "font_size",
            'description' => 'Enter: ..px;'
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Line Height", 'whole'),
            "param_name" => "line_height",
            'description' => 'Enter: ..px;'
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color", 'whole'),
            "param_name" => "color",
            "value" => "",
        ),

        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Font Family", 'whole'),
            "param_name" => "font_family",
            "value" => array(
                "Default" => "ft-pr",
                "Poppins Medium" => "ft-pm",
                "Poppins Semibold" => "ft-psb",
                "Poppins Bold" => "ft-pb",
            ),
        ),

    )
));

class WPBakeryShortCode_cms_typingout extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        wp_enqueue_script('typingout', get_template_directory_uri() . '/assets/js/typingout.js', array( 'jquery' ), '1.0.0', true);
        return parent::content($atts, $content);
    }
}

?>