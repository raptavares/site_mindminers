<?php
extract(shortcode_atts(array(
    'title_pricing' => 'Title Pricing',
    'sub_title_pricing'  => '',
    'currency_type'  => '$',
    'values_price'  => '50',
    'pricing_time' => 'Month',
    'description_pricing'  => '',
    'description_item'  => '',
    'text_button'  => 'Get Started Now',
    'link_button'  => '#',
    'pricing_style'  => 'pricing-style1',
), $atts));
	$link = vc_build_link($link_button);
    $a_href = '';
    if ( strlen( $link['url'] ) > 0 ) {
        $a_href = $link['url'];
    }
    $pricing_lists = (array) vc_param_group_parse_atts($description_pricing);
    
?>
<div class="cms-pricing-wrapper <?php echo esc_attr($pricing_style); ?>">
    <div class="pricingbox text-center"> 

        <div class="pricing-header">
            <h3 class="pricing-title"><?php echo esc_attr($title_pricing);?></h3>
            <div class="pricing-meta">
	            <span class="pricing-currency"><?php echo esc_attr($currency_type); ?></span>
                <span class="pricing-price"><?php echo esc_attr($values_price); ?></span>
                <span class="pricing-time"><?php echo ' / '.esc_attr($pricing_time); ?></span>
            </div>
            <span class="pricing-subtitle"><?php echo esc_attr($sub_title_pricing);?></span>
        </div>

        <div class="pricing-body">
            <ul>
	        	<?php
	        		foreach ($pricing_lists as $key => $value) { ?>
	                	<li><?php echo esc_html($value['description_item']); ?></li>
			    <?php } ?>
            </ul>
        </div>

        <div class="pricing-button">
            <a href="<?php echo esc_url($a_href);?>" class="btn btn-default"><?php echo esc_attr($text_button);?></a>
        </div>

    </div>
</div>