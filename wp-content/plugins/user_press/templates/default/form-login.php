<?php
/**
 * The template for displaying login form.
 *
 * Override this template by copying it to yourtheme/userpress/layoutname/form-login.php
 *
 * @author 		UserPress
 * @package 	UserPress/Templates
 * @version     1.0.0
 */

if (! defined ( 'ABSPATH' )) {
	exit (); // Exit if accessed directly
}
?>
<div class="user-press-login" style="background:url(<?php echo esc_url(get_option ( 'user_press_bg_img', '' )).') no-repeat center' ?>">
	<div class="login-form" style="background:<?php echo esc_attr(get_option ( 'user_press_bg_color', '' )) ;?>" >
		<div class="fields-content">
			<div class="field-group">
				<label for="user" class="label"><?php esc_html_e('Username', 'user-press');?></label>
				<input id="user" type="text" class="input user_name" data-validate="<?php esc_html_e('Required Field', 'user-press'); ?>">
			</div>
			<div class="field-group">
				<label for="pass" class="label"><?php esc_html_e('Password', 'user-press');?></label>
				<input id="pass" type="password" class="input password" data-validate="<?php esc_html_e('Required Field', 'user-press'); ?>">
			</div>
			<div class="field-group">
				<label for="check"><?php esc_html_e('Keep me Signed in', 'user-press');?></label>
				<input id="check" type="checkbox" class="check" checked>
			</div>
			<div class="field-group">
				<button type="button" class="button button-login"><?php esc_html_e('Sign In', 'user-press');?></button>
			</div>
		</div>
		<div class="form-footer">
			<a href="<?php echo wp_lostpassword_url(get_permalink()); ?>"><?php esc_html_e('Forgot Password?', 'user-press') ?></a>
		</div>
	</div>
</div>
