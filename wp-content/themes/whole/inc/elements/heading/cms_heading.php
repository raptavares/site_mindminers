<?php
vc_map(array(
    "name" => 'CMS Heading',
    "base" => "cms_heading",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'whole'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __ ( 'Sub Title', 'whole' ),
            "param_name" => "subtitle",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'whole'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                )
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Sub Title Color", 'whole'),
            "param_name" => "subtitle_color",
            "value" => "",
            "group" => esc_html__("Heading Settings", 'whole'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                )
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Title', 'whole' ),
            "param_name" => "title",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'whole')
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Typing Out", 'whole'),
            "param_name" => "typingout",
            'description' => 'Please add text: "intensely.", "brightly.", "brilliantly." ',
            "group" => esc_html__("Heading Settings", 'whole')
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", 'whole'),
            "param_name" => "title_color",
            "value" => "",
            "group" => esc_html__("Heading Settings", 'whole'),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Title Font Size', 'whole' ),
            "param_name" => "title_font_size",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'whole'),
            "description" => "Enter: ..px",
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Title Line Height', 'whole' ),
            "param_name" => "title_line_height",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'whole'),
            "description" => "Enter: ..px",
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Title Font Margin', 'whole' ),
            "param_name" => "title_margin",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'whole'),
            "description" => "Enter: ..px",
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Title Font Family", 'whole'),
            "admin_label" => true,
            "param_name" => "title_font_family",
            "value" => array(
                "Default" => "ft-df",
                "Poppins Bold" => "ft-pb",
                "Poppins Semibold" => "ft-psb",
                "Poppins Medium" => "ft-pm",
                "Poppins Regular" => "ft-pr",
                "Poppins Light" => "ft-pl",
                "Droidserif" => "ft-ds",
                "Droidserif Italic" => "ft-dsi",
                "Droidserif Bold" => "ft-dsb",
            ),
            "group" => esc_html__("Heading Settings", 'whole'),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Title Resize", 'whole'),
            "admin_label" => true,
            "description" => "Title font size 40px for Tablet + Mobile",
            "param_name" => "title_resize",
            "value" => array(
                "No" => "no",
                "Yes" => "title-resize",
            ),
            "group" => esc_html__("Heading Settings", 'whole'),
        ),
        array(
            "type" => "textarea",
            "heading" => __ ( 'Description', 'whole' ),
            "param_name" => "description",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'whole'),
        ),  
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Description Color", 'whole'),
            "param_name" => "description_color",
            "value" => "",
            "group" => esc_html__("Heading Settings", 'whole'),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Description Font Family", 'whole'),
            "admin_label" => true,
            "param_name" => "desc_font_family",
            "value" => array(
                "Default" => "ft-df",
                "Poppins Bold" => "ft-pb",
                "Poppins Semibold" => "ft-psb",
                "Poppins Medium" => "ft-pm",
                "Poppins Regular" => "ft-pr",
                "Poppins Light" => "ft-pl",
                "Droidserif" => "ft-ds",
                "Droidserif Italic" => "ft-dsi",
                "Droidserif Bold" => "ft-dsb",
            ),
            "group" => esc_html__("Heading Settings", 'whole'),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Line Position", 'whole'),
            "admin_label" => true,
            "param_name" => "line_position",
            "value" => array(
                "Default" => "bottom-title",
                "Bottom Content" => "bottom-content",
                "Hide" => "hide",
            ),
            "group" => esc_html__("Heading Settings", 'whole'),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Icon", 'whole'),
            "admin_label" => true,
            "param_name" => "icon",
            "value" => array(
                "Hide" => "hide",
                "Show" => "show",
            ),
            "group" => esc_html__("Heading Settings", 'whole'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                )
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icon Background Color", 'whole'),
            "param_name" => "icon_bg_color",
            "value" => "",
            "group" => esc_html__("Heading Settings", 'whole'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                )
            ),
        ),
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_heading",
            "heading" => esc_html__("Heading Template", 'whole'),
            "admin_label" => true,
            "group" => esc_html__("Template", 'whole'),
        ),
    )
));

class WPBakeryShortCode_cms_heading extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>