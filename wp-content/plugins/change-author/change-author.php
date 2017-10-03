<?php
 
/*
Plugin Name: Change Author
Plugin URI: 
Description: Lets you select any user to be credited as author.
Author: Martin Teley
Version: 1.3
*/

/**
 * Adds a meta box to the post editing screen
 */
function ca_custom_meta() {
	$args = array(
		'public'   => true,
	);
	$post_types = get_post_types( $args );

    add_meta_box( 'authordiv', __('Author'), 'ca_meta_callback', $post_types, 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'ca_custom_meta' );

/**
 * Outputs the content of the meta box
 */
function ca_meta_callback( $post ) {
	global $user_ID;
?>
<label class="screen-reader-text" for="post_author_override"><?php _e('Author'); ?></label>
<?php
	wp_dropdown_users( array(
		'name' => 'post_author_override',
		'selected' => empty($post->ID) ? $user_ID : $post->post_author,
		'include_selected' => true
	) );
}



?>