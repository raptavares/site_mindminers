<?php
/**
 * Add custom headding params
 * 
 * @author Fox
 * @since 1.0.0
 */

    vc_add_param("vc_custom_heading", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Custom Font Family", 'whole'),
        "admin_label" => true,
        "param_name" => "custom_font_family",
        "value" => array(
            "Default" => "",
            "Poppins Regular" => "ft-pr",
            "Poppins Light" => "ft-pl",
            "Poppins Medium" => "ft-pm",
            "Poppins Semibold" => "ft-psb",
            "Poppins Bold" => "ft-pb",
            "Droidserif" => "ft-ds",
            "Droidserif Italic" => "ft-dsi",
            "Droidserif Bold" => "ft-dsb",
        ),
        'group' => 'CMS Customs'
    ));
    vc_add_param("vc_custom_heading", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Heading Letter Spacing", 'whole'),
        "admin_label" => true,
        "param_name" => "letter_spacing",
        "value" => array(
            '0' => '0em',
            '-0.05em' => '-0.05em',
            '-0.04em' => '-0.04em',
            '-0.03em' => '-0.03em',
            '-0.02em' => '-0.02em',
            '-0.01em' => '-0.01em',
            '0.01em' => '0.01em',
            '0.015em' => '0.015em',
            '0.02em' => '0.02em',
            '0.025em' => '0.025em',
            '0.03em' => '0.03em',
            '0.035em' => '0.035em',
            '0.04em' => '0.04em',
            '0.045em' => '0.045em',
            '0.05em' => '0.05em',
            '0.055em' => '0.055em',
            '0.06em' => '0.06em',
            '0.065em' => '0.065em',
            '0.07em' => '0.07em',
            '0.075em' => '0.075em',
            '0.08em' => '0.08em',
            '0.085em' => '0.085em',
            '0.09em' => '0.09em',
            '0.095em' => '0.095em',
            '0.1em' => '0.1em',
            '0.15em' => '0.15em',
            '0.2em' => '0.2em',
            '0.3em' => '0.3em',
            '0.4em' => '0.4em',
            '0.5em' => '0.5em',
            '0.6em' => '0.6em',
            '0.7em' => '0.7em',
            '0.8em' => '0.8em',
            '0.9em' => '0.9em',
        ),
        'group' => 'CMS Customs'
    ));

