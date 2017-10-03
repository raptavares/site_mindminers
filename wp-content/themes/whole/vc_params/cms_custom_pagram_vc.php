<?php
/*
 * VC
 */
vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("CMS Custom Style", 'whole'),
    "param_name" => "el_class",
    "value" => array(
        'None' => '',
        'Row Box Shadow' => 'row-has-boxshadow', 
        'Row Box Shadow Top' => 'row-has-boxshadow-top', 
        'Row Box Shadow Bottom' => 'row-has-boxshadow-bottom', 
        'Row BG Color Primary' => 'bg-primary', 
        'Row Overlay' => 'row-overlay', 
        'Extra Custom Class 1' => 'row-class1', 
        'Extra Custom Class 2' => 'row-class3', 
        'Extra Custom Class 3' => 'row-class3', 
        'Extra Custom Class 4' => 'row-class3', 
        'Extra Custom Class 5' => 'row-class3', 
    ),   
    "description" => 'Select Extra Custom Class (1->5): You user custom class style css: ( row-class1 to row-class5 )',  
));

vc_add_param("vc_column", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("CMS Custom Style", 'whole'),
    "param_name" => "el_class",
    "value" => array(
        'None' => '',
        'Column Overlay' => 'col-overlay', 
        'Column Offset Left' => 'section-offset-left',
        'Column Offset Right' => 'section-offset-right',
        'Column Offset Left - Overlay' => 'section-offset-left col-overlay',
        'Column Offset Right - Overlay' => 'section-offset-right col-overlay',
        'Remove Padding Tablet ( < 992 )' => 'rm-padding-sm',
        'Remove Padding Mobile ( < 767 )' => 'rm-padding-xs',
        'Text Align Center' => 'text-center',
        'Text Align Left' => 'text-left',
        'Text Align Right' => 'text-right',
        'Column Height 100%' => 'col-h100',
        'Extra Custom Class 1' => 'col-class1', 
        'Extra Custom Class 2' => 'col-class3', 
        'Extra Custom Class 3' => 'col-class3', 
        'Extra Custom Class 4' => 'col-class3', 
        'Extra Custom Class 5' => 'col-class3', 
    ),   
    "description" => 'Select Extra Custom Class (1->5): You user custom class style css: ( col-class1 to col-class5 )',  
));