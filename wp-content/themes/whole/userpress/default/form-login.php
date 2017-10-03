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
<div class="user-press-login">
	<div class="login-form">
		<div class="fields-content">
			<div class="field-group">
				<input id="user" type="text" class="input user_name" placeholder="Username" data-validate="<?php esc_html_e('Required Field', 'whole'); ?>">
			</div>
			<div class="field-group">
				<input id="pass" type="password" class="input password" placeholder="Password" data-validate="<?php esc_html_e('Required Field', 'whole'); ?>">
			</div>
			<div class="field-group field-end">
				<a class="forget" href="<?php echo wp_lostpassword_url(get_permalink()); ?>"><?php esc_html_e('Forgot your password ?', 'whole') ?></a>
				<button type="button" class="button button-login"><?php esc_html_e('Login', 'whole');?></button>
			</div>
		</div>
	</div>
</div>
