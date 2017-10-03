<?php
/**
 * The template for displaying register form.
 *
 * Override this template by copying it to yourtheme/userpress/layoutname/form-register.php
 *
 * @author 		UserPress
 * @package 	UserPress/Templates
 * @version     1.0.0
 */
if (! defined('ABSPATH')) {
    exit(); // Exit if accessed directly
}
?>

<div class="user-press-register">
	<div class="register-form">
		<div class="fields-content">
			<div class="field-group">
				<input id="res_user" type="text" class="input" placeholder="<?php esc_html_e('User name', 'whole'); ?>" data-validate="<?php esc_html_e('Required Field', 'whole'); ?>" data-user-length="<?php esc_html_e('Username too short. At least 4 characters is required.', 'whole'); ?>" data-special-char="<?php esc_html_e("The value of text field can't contain any of the following characters: \ / : * ? \" < > space", 'whole'); ?>">
			</div>
			<div class="field-group">
				<input id="res_pass1" type="password" class="input" data-type="password" placeholder="<?php esc_html_e('Password', 'whole'); ?>" data-validate="<?php esc_html_e('Required Field', 'whole'); ?>" data-pass-length="<?php esc_html_e( 'Password length must be greater than 5.', 'whole' ); ?>">
			</div>
			<div class="field-group">
				<input id="res_pass2" type="password" class="input" data-type="password" placeholder="<?php esc_html_e('Confirm Password', 'whole'); ?>" data-validate="<?php esc_html_e('Required Field', 'whole'); ?>" data-pass-confirm="<?php esc_html_e('Your password and confirmation password do not match.', 'whole'); ?>">
			</div>
			<div class="field-group">
				<input id="res_email" type="text" class="input" placeholder="<?php esc_html_e('Email', 'whole'); ?>" data-validate="<?php esc_html_e('Required Field', 'whole'); ?>"  data-email-format="<?php esc_html_e('The Email address is incorrect!', 'whole'); ?>">
			</div>
			<div class="field-group field-end">
				<button type="button" class="button btn-up-register"><?php esc_html_e('Register', 'whole');?></button>
			</div>
		</div>
	</div>
</div>