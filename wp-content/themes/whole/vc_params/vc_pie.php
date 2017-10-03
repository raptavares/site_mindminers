<?php
/**
 * Add row params
 * 
 * @author Fox
 * @since 1.0.0
 */

vc_add_param("vc_pie", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("CMS Custom Style", 'whole'),
    "param_name" => "el_class",
    "value" => array(
        'Style 1' => 'style1',
        'Style 2' => 'style2', 
    ),                    
));


vc_add_param("vc_pie", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => esc_html__('Title Color', 'whole'),
    "param_name" => "title_color",
    "description" => ''
));

vc_remove_param("vc_pie", "color");
vc_remove_param("vc_pie", "label_value");
vc_remove_param("vc_pie", "units");
vc_add_param("vc_pie", array(
    "type" => "textfield",
    "heading" => esc_html__("Border", 'whole'),
    "param_name" => "pie_border",
    "description" => esc_html__("Enter number", 'whole'),
));
vc_add_param("vc_pie", array(
    'type' => 'colorpicker',
    'heading' => esc_html__('Pie Color Progress', 'whole'),
    'param_name' => 'color',
    'value' => '#dd543d', // $pie_colors,
    'description' => esc_html__('Select pie chart color.', 'whole'),
    'admin_label' => true,
    'param_holder_class' => 'vc-colored-dropdown',
));
vc_add_param("vc_pie", array(
    'type' => 'colorpicker',
    'heading' => esc_html__('Pie Border Color', 'whole'),
    'param_name' => 'pie_border_color',
    'value' => '#ebebeb',
    'admin_label' => true,  
));
vc_add_param("vc_pie", array(
    "type" => "textfield",
    "heading" => esc_html__("Custom Icon", 'whole'),
    "param_name" => "pie_custom_icon",
    "description" => 'Please add class icon. Use the library <a href="https://linearicons.com/free" target="_blank">Linearicons Free</a>, <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">FontAwesome</a>',
    'dependency' => array(
        'element' => 'el_class',
        'value' => 'style2'
    ),
));
