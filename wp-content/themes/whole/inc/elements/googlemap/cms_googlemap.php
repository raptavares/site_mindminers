<?php
vc_map(array(
    "name" => 'CMS Google Map',
    "base" => "cms_googlemap",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'whole'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__('API Key', 'whole'),
            "param_name" => "api",
            "value" => '',
            "description" => esc_html__('Enter you api key of map, get key from (https://console.developers.google.com)', 'whole')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Address', 'whole'),
            "param_name" => "address",
            "value" => 'New York, United States',
            "description" => esc_html__('Enter address of Map', 'whole')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Coordinate', 'whole'),
            "param_name" => "coordinate",
            "value" => '',
            "description" => esc_html__('Enter coordinate of Map, format input (latitude, longitude)', 'whole')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Click Show Info window', 'whole'),
            "param_name" => "infoclick",
            "value" => array(
                esc_html__("Yes, please", 'whole') => true
            ),
            "description" => esc_html__('Click a marker and show info window (Default Show).', 'whole')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Marker Coordinate', 'whole'),
            "param_name" => "markercoordinate",
            "value" => '',
            "description" => esc_html__('Enter marker coordinate of Map, format input (latitude, longitude)', 'whole')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Marker Title', 'whole'),
            "param_name" => "markertitle",
            "value" => '',
            "description" => esc_html__('Enter Title Info windows for marker', 'whole')
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__('Marker Description', 'whole'),
            "param_name" => "markerdesc",
            "value" => '',
            "description" => esc_html__('Enter Description Info windows for marker', 'whole')
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__('Marker Icon', 'whole'),
            "param_name" => "markericon",
            "value" => '',
            "description" => esc_html__('Select image icon for marker', 'whole')
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => esc_html__('Marker List', 'whole'),
            "param_name" => "markerlist",
            "value" => '',
            "description" => esc_html__('[{"coordinate":"41.058846,-73.539423","icon":"","title":"title demo 1","desc":"desc demo 1"},{"coordinate":"40.975699,-73.717636","icon":"","title":"title demo 2","desc":"desc demo 2"},{"coordinate":"41.082606,-73.469718","icon":"","title":"title demo 3","desc":"desc demo 3"}]', 'whole')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Info Window Max Width', 'whole'),
            "param_name" => "infowidth",
            "value" => '200',
            "description" => esc_html__('Set max width for info window', 'whole')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Map Type", 'whole'),
            "param_name" => "type",
            "value" => array(
                "ROADMAP" => "ROADMAP",
                "HYBRID" => "HYBRID",
                "SATELLITE" => "SATELLITE",
                "TERRAIN" => "TERRAIN"
            ),
            "description" => esc_html__('Select the map type.', 'whole')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style Template", 'whole'),
            "param_name" => "style",
            "value" => array(
                "Default" => "",
                "Custom" => "custom",
                "Light Monochrome" => "light-monochrome",
                "Blue water" => "blue-water",
                "Midnight Commander" => "midnight-commander",
                "Paper" => "paper",
                "Red Hues" => "red-hues",
                "Hot Pink" => "hot-pink"
            ),
            "description" => 'Select your heading size for title.'
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => esc_html__('Custom Template', 'whole'),
            "param_name" => "content",
            "value" => '',
            "description" => esc_html__('Get template from http://snazzymaps.com', 'whole')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Zoom', 'whole'),
            "param_name" => "zoom",
            "value" => '13',
            "description" => esc_html__('zoom level of map, default is 13', 'whole')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Width', 'whole'),
            "param_name" => "width",
            "value" => 'auto',
            "description" => esc_html__('Width of map without pixel, default is auto', 'whole')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Height', 'whole'),
            "param_name" => "height",
            "value" => '350px',
            "description" => esc_html__('Height of map without pixel, default is 350px', 'whole')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Scroll Wheel', 'whole'),
            "param_name" => "scrollwheel",
            "value" => array(
                esc_html__("Yes, please", 'whole') => true
            ),
            "description" => esc_html__('If false, disables scrollwheel zooming on the map. The scrollwheel is disable by default.', 'whole')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Pan Control', 'whole'),
            "param_name" => "pancontrol",
            "value" => array(
                esc_html__("Yes, please", 'whole') => true
            ),
            "description" => esc_html__('Show or hide Pan control.', 'whole')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Zoom Control', 'whole'),
            "param_name" => "zoomcontrol",
            "value" => array(
                esc_html__("Yes, please", 'whole') => true
            ),
            "description" => esc_html__('Show or hide Zoom Control.', 'whole')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Scale Control', 'whole'),
            "param_name" => "scalecontrol",
            "value" => array(
                esc_html__("Yes, please", 'whole') => true
            ),
            "description" => esc_html__('Show or hide Scale Control.', 'whole')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Map Type Control', 'whole'),
            "param_name" => "maptypecontrol",
            "value" => array(
                esc_html__("Yes, please", 'whole') => true
            ),
            "description" => esc_html__('Show or hide Map Type Control.', 'whole')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Street View Control', 'whole'),
            "param_name" => "streetviewcontrol",
            "value" => array(
                esc_html__("Yes, please", 'whole') => true
            ),
            "description" => esc_html__('Show or hide Street View Control.', 'whole')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Over View Map Control', 'whole'),
            "param_name" => "overviewmapcontrol",
            "value" => array(
                esc_html__("Yes, please", 'whole') => true
            ),
            "description" => esc_html__('Show or hide Over View Map Control.', 'whole')
        )
    )
));

class WPBakeryShortCode_cms_googlemap extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>