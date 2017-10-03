<?php
/**
 * The template for the main panel container.
 * Override this template by specifying the path where it is stored (templates_path) in your Redux config.
 *
 * @author        Redux Framework
 * @package       ReduxFramework/Templates
 * @version: 3.5.4.18
 */
$expanded = ($this->parent->args ['open_expanded']) ? ' fully-expanded' : '' . (! empty ( $this->parent->args ['class'] ) ? ' ' . esc_attr ( $this->parent->args ['class'] ) : '');
?>
<div class="redux-container<?php echo esc_attr( $expanded ); ?>">
        
        <?php do_action( "redux/page/{$this->parent->args['opt_name']}/content/before", $this ); ?>
        
        <?php $this->get_template( 'content.tpl.php' ); ?>
        
        <?php do_action( "redux/page/{$this->parent->args['opt_name']}/content/after", $this ); ?>
</div>
