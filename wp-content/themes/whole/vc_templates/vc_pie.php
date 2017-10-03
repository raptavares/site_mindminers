<?php
$title = $el_class = $value = $label_value= $units = $cl_hide_icon = $title_pie = $cl_hide_value = '';
extract(shortcode_atts(array(
    'title' => '',
    'title_color' => '',
    'el_class' => '',
    'value' => '50',
    'units' => '',
    'pie_border_color' => '',
    'pie_border' => '1',
    'color' => '',
    'pie_custom_icon' => '',
), $atts));
wp_register_script( 'progressCircle', get_template_directory_uri().'/js/process_cycle.js' );
wp_register_script('vc_pie_custom',get_template_directory_uri().'/js/vc_pie_custom.js');
wp_enqueue_script('progressCircle');
wp_enqueue_script('vc_pie_custom');
wp_enqueue_script('waypoints');

$el_class = $this->getExtraClass( $el_class );
$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_pie_chart wpb_content_element'.$el_class, $this->settings['base']);
    $output = "\n\t".'<div class= "'.esc_attr($css_class).' '.'" data-pie-border="'.esc_attr($pie_border).'" data-pie-border-back="'.esc_attr($pie_border_color).'" data-pie-value="'.esc_attr($value).'" data-pie-units="'.esc_attr($units).'" data-pie-color="'.esc_attr(htmlspecialchars($color)).'">';
        $output .= "\n\t\t".'<div class="wpb_wrapper">';
            $output .= "\n\t\t\t".'<div class="vc_pie_wrapper">';

                $output .= "\n\t\t\t".'<span class="vc_pie_chart_back"></span>';
                $output .= "\n\t\t\t".'<div class="content"><span class="vc_pie_chart_value '.$cl_hide_value.'"></span><i class="'.$pie_custom_icon.'"></i>';
                $output .= "\n\t\t\t".'</div><canvas width="100" height="100"></canvas>';
                $output .= "\n\t\t\t".'</div>';
                if ($title!='') {
                    $output .= '<h4 class="wpb_heading wpb_pie_chart_heading" style="color:'.$title_color.';">'.$title.'</h4>';
                }

            /* wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_pie_chart_heading')); */
        $output .= "\n\t\t".'</div>'.$this->endBlockComment('.wpb_wrapper');
    $output .= "\n\t".'</div>'.$this->endBlockComment('.wpb_pie_chart')."\n";
echo $output;