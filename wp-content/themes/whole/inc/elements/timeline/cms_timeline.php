<?php
vc_map(array(
    "name" => 'CMS Timeline',
    "base" => "cms_timeline",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'whole'),
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Year", 'whole'),
            "param_name" => "year1",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 1", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'whole'),
            "param_name" => "timeline_title1",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 1", 'whole'),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'whole'),
            "param_name" => "timeline_description1",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 1", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Year", 'whole'),
            "param_name" => "year2",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 2", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'whole'),
            "param_name" => "timeline_title2",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 2", 'whole'),
        ),

        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'whole'),
            "param_name" => "timeline_description2",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 2", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Year", 'whole'),
            "param_name" => "year3",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 3", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'whole'),
            "param_name" => "timeline_title3",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 3", 'whole'),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'whole'),
            "param_name" => "timeline_description3",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 3", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Year", 'whole'),
            "param_name" => "year4",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 4", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'whole'),
            "param_name" => "timeline_title4",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 4", 'whole'),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'whole'),
            "param_name" => "timeline_description4",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 4", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Year", 'whole'),
            "param_name" => "year5",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 5", 'whole'),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'whole'),
            "param_name" => "timeline_title5",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 5", 'whole'),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'whole'),
            "param_name" => "timeline_description5",
            "description" => esc_html__("", 'whole'),
            "group" => esc_html__("Item 5", 'whole'),
        ),

    )
));

class WPBakeryShortCode_cms_timeline extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>