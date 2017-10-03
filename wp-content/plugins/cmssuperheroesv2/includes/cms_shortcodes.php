<?php
/* Add extra type on visual composer */
require_once CMS_INCLUDES.'types/cms_template.php';
require_once CMS_INCLUDES.'types/cms_template_img.php';
require_once CMS_INCLUDES.'types/img.php';
require_once CMS_INCLUDES . '/fontlibs/pe7stroke.php';
require_once CMS_INCLUDES . '/fontlibs/rticon.php';
//require_once CMS_INCLUDES . '/fontlibs/glyphicons.php';
/* Get List Shortcodes From Folder*/
require_once CMS_DIR . '/shortcodes/cms_base.php';
//Start adding shortcode

function cms_add_more_shortcode(){
	$shortcodes = array(
	'cms_carousel',
	'cms_grid',
	'cms_fancybox',
	'cms_fancybox_single',
	'cms_counter',
	'cms_progressbar',
	);
	$shortcodes = apply_filters('cms-shorcode-list', $shortcodes);
	foreach($shortcodes as $shortcode){
		require_once CMS_DIR . '/shortcodes/'.$shortcode.'.php';
	}
}
add_action('vc_after_init', 'cms_add_more_shortcode' , 10);