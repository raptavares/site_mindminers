<?php
/**
 * The template for displaying user profile.
 *
 * @package User Press
 * @author FOX
 * @since User Press 1.0.0
 */

if (! defined ( 'ABSPATH' )) {
    exit (); // Exit if accessed directly
}

$current_user = wp_get_current_user();

if ( 0 == $current_user->ID )
    return ;

?>

<div class="user-press-profile">
	<div class="profile-content">
		<div class="user-avatar"><?php echo get_avatar($current_user->user_email, 256); ?></div>
		<div class="user-name"><?php echo esc_attr($current_user->display_name); ?></div>
		<?php up_get_template_part('default/logout'); ?>
	</div>
</div>