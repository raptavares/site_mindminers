<?php
/**
 * The template for displaying logout text.
 *
 * @package User Press
 * @author FOX
 * @since User Press 1.0.0
 */

if (! defined ( 'ABSPATH' )) {
	exit ();
}

global $user_press;

?>

<div class="user-press user-press-default">
<?php
switch ($user_press['form_type']) {
	case 'login' :
		up_get_template_part ( $user_press['template'] . '/form', 'login' );
		break;
	case 'register' :
		up_get_template_part ( $user_press['template'] . '/form', 'register' );
		break;
}
?>
</div>