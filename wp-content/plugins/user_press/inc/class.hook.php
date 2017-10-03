<?php
/**
 * Define User-Press hook
 *
 * @author Jax
 **/
add_action( 'user-press/form/login/after', 'up_hook_login_form_social' );
add_action( 'user-press/form/login/after', 'up_hook_login_form_recaptcha' );

/**
 * Providing an implementation for 'user-press/form/login/after'
 * to add login social button
 *
 * @author Jax
 */
function up_hook_login_form_social() {
    global $user_press;
    $user_press['template'] = (isset($user_press['template']) && $user_press['template'] != '')? $user_press['template'] : 'default';
    up_get_template_part( "{$user_press['template']}/social" );
}

/**
 * Providing an implementation for 'up_hook_login_form_recaptcha'
 * to add Google recatcha to login form
 *
 * @author Jax
 */
function up_hook_login_form_recaptcha() {
    global $user_press;
    $user_press['template'] = (isset($user_press['template']) && $user_press['template'] != '')? $user_press['template'] : 'default';
    up_get_template_part( "{$user_press['template']}/recaptcha" );
}