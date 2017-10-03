<?php
vc_map(array(
    "name" => 'CMS Process',
    "base" => "cms_process",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'whole'),
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'whole'),
            "param_name" => "process_title1",
            "group" => esc_html__("Item 1", 'whole'),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'whole'),
            "param_name" => "process_description1",
            "group" => esc_html__("Item 1", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Icon", 'whole'),
            "param_name" => "icon1",
            "description" => 'Please add class icon. Use the library <a href="https://linearicons.com/free" target="_blank">Linearicons Free</a>, <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">FontAwesome</a>',
            "group" => esc_html__("Item 1", 'whole'),
        ),

        array(
            "type" => "attach_image",
            "heading" => __ ( 'Image', 'whole' ),
            "param_name" => "image1",
            "value" => '',
            "group" => esc_html__("Item 1", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'whole'),
            "param_name" => "process_title2",
            "group" => esc_html__("Item 2", 'whole'),
        ),

        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'whole'),
            "param_name" => "process_description2",
            "group" => esc_html__("Item 2", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Icon", 'whole'),
            "param_name" => "icon2",
            "description" => 'Please add class icon. Use the library <a href="https://linearicons.com/free" target="_blank">Linearicons Free</a>, <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">FontAwesome</a>',
            "group" => esc_html__("Item 2", 'whole'),
        ),

        array(
            "type" => "attach_image",
            "heading" => __ ( 'Image', 'whole' ),
            "param_name" => "image2",
            "value" => '',
            "group" => esc_html__("Item 2", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'whole'),
            "param_name" => "process_title3",
            "group" => esc_html__("Item 3", 'whole'),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'whole'),
            "param_name" => "process_description3",
            "group" => esc_html__("Item 3", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Icon", 'whole'),
            "param_name" => "icon3",
            "description" => 'Please add class icon. Use the library <a href="https://linearicons.com/free" target="_blank">Linearicons Free</a>, <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">FontAwesome</a>',
            "group" => esc_html__("Item 3", 'whole'),
        ),

        array(
            "type" => "attach_image",
            "heading" => __ ( 'Image', 'whole' ),
            "param_name" => "image3",
            "value" => '',
            "group" => esc_html__("Item 3", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'whole'),
            "param_name" => "process_title4",
            "group" => esc_html__("Item 4", 'whole'),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'whole'),
            "param_name" => "process_description4",
            "group" => esc_html__("Item 4", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Icon", 'whole'),
            "param_name" => "icon4",
            "description" => 'Please add class icon. Use the library <a href="https://linearicons.com/free" target="_blank">Linearicons Free</a>, <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">FontAwesome</a>',
            "group" => esc_html__("Item 4", 'whole'),
        ),

        array(
            "type" => "attach_image",
            "heading" => __ ( 'Image', 'whole' ),
            "param_name" => "image4",
            "value" => '',
            "group" => esc_html__("Item 4", 'whole'),
        ),

        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Icon Hover Style", 'whole'),
            "admin_label" => true,
            "param_name" => "icon_style",
            "value" => array(
                "Style 1" => "style1",
                "Style 2" => "style2",
                "Style 3" => "style3"
            ),
            "group" => esc_html__("Icon Settings", 'whole'),
        ),

    )
));

class WPBakeryShortCode_cms_process extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>