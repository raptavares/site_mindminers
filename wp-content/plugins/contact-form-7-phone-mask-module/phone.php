<?php
/*
Plugin Name: Contact Form 7 Phone Module
Plugin URI: 
Description: Adds phone field to Contact Form 7 plugin. Use [phone] or [phone*] in your contact form to do it.
Author: omniWP
Author URI: http://www.omniwp.com.br/
Version: 2.3.4.1
*/

/*  Copyright 2012,2013 omniWP

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


/**
** A plugin module for [phone] and [phone*]
**/

add_action( 'wpcf7_init', 'cf7_phone_init' ); // init only after wpcf7 has done its init

function cf7_phone_init() {
	wpcf7_add_shortcode( 'phone',  'wpcf7_phone_shortcode_handler', true );
	wpcf7_add_shortcode( 'phone*', 'wpcf7_phone_shortcode_handler', true );
}

function wpcf7_phone_shortcode_handler( $tag ) {
	global $wpcf7_contact_form;
	
	if ( ! is_array( $tag ) )
		return '';
		
	if ( ! empty( $tag['attr'] ) ) {
		
		// remove our tokens from tag
				
		$tokens = array( 'mask' => 'mask:', 'alternate_mask' => 'aMask:', 're_do' => 'reDo:', 're_undo' => 'reUndo:');
		foreach( $tokens as $var => $token ) { 
			if ( $pos = strpos( $tag['attr'], $token ) ) {
				$end = strpos( $tag['attr'], ' ', $pos );
				if ( $end ) {
					${$var} = substr( $tag['attr'], $pos, $end - $pos );
				} else {
					${$var} = substr( $tag['attr'], $pos);
				}
			} else {
				${$var} = '';
			}
		}
		
		$tag['attr'] = trim( str_replace( array( $mask, $alternate_mask, $re_do, $re_undo ),  '', $tag['attr']) );
		
		// get only values from our tokens, removing token ids
		foreach( $tokens as $var => $token ) { 
			${$var} = str_replace( $token, '', ${$var} );
		}	
		
		// parse the artibutes again 
		global $wpcf7_shortcode_manager;
		$attr = $wpcf7_shortcode_manager->shortcode_parse_atts( $tag['attr'] );	
		
		if ( is_array( $attr ) ) {
			if ( is_array( $attr['options'] ) ) {
				$tag['name'] = array_shift( $attr['options'] );
				$tag['options'] = (array) $attr['options'];
			}
			$tag['raw_values'] = (array) $attr['values'];
			$tag['attr'] ='';
		} else {
			$tag['attr'] = $attr;
		}
	}
	
	
	$type = $tag['type'];
	$name = $tag['name'];
	$options = (array) $tag['options'];
	$values  = (array) $tag['values'];

	if ( empty( $name ) )
		return '';
		
	$validation_error = '';
	if ( is_a( $wpcf7_contact_form, 'WPCF7_ContactForm' ) )
		$validation_error = $wpcf7_contact_form->validation_error( $name );

	$atts = '';
	$id_att = '';
	$class_att = '';
	$size_att = '';
	$maxlength_att = '';
	
	if ( $validation_error )
		$class_att .= ' wpcf7-not-valid';

	foreach ( $options as $option ) {
		if ( preg_match( '%^id:([-0-9a-zA-Z_]+)$%', $option, $matches ) ) {
			$id_att = $matches[1];

		} elseif ( preg_match( '%^class:([-0-9a-zA-Z_]+)$%', $option, $matches ) ) {
			$class_att .= ' ' . $matches[1];

		} elseif ( preg_match( '%^([0-9]*)[/x]([0-9]*)$%', $option, $matches ) ) {
			$size_att = (int) $matches[1];
			$maxlength_att = (int) $matches[2];

		} elseif ( preg_match( '%^tabindex:(\d+)$%', $option, $matches ) ) {
			$tabindex_att = (int) $matches[1];

		}
	}

	if ( empty( $id_att )  ) {
		$id_att = $name;
	}
	$atts .= ' id="' . trim( $id_att ) . '"';

	$class_att .= ' wpcf7-text wpcf7-pm-phone wpcf7-form-control';
	if ( 'phone*' == $type )
		$class_att .= ' wpcf7-validates-as-required';
	$atts .= ' class="' . trim( $class_att ) . '"';
	
	if ( $size_att )
		$atts .= ' size="' . $size_att . '"';
	else
		$atts .= ' size="14"'; // default size

	if ( $maxlength_att )
		$atts .= ' maxlength="' . $maxlength_att . '"';

	// register and enqueue our js masking function
	wp_register_script( 'jquery-mask', plugins_url( 'contact-form-7-phone-mask-module/jquery.maskedinput-1.3.1.js' , dirname(__FILE__) ), array('jquery') );  
	wp_enqueue_script( 'jquery-mask' );

	// set our js masking variables
	wp_localize_script( 'jquery-mask', '_wpcf7pm', array(
		'id' => trim($id_att),
		'mask' => $mask,
		'aMask' => $alternate_mask,
		'reDo' => $re_do,
		'reUndo' => $re_undo,
		 ) );
	

	$value = isset( $values[0] ) ? $values[0] : '';
	$html = '<input ' . $atts . ' type="text" name="' . $name . '" value="' .  $value . '"/>';
	$html = '<span class="wpcf7-form-control-wrap ' . $name . '">' . $html . $validation_error . '</span>';

	return $html;
}

/* Validation filter */

add_filter( 'wpcf7_validate_phone*', 'wpcf7_phone_validation_filter', 10, 2 );

function wpcf7_phone_validation_filter( $result, $tag ) {


	$type = $tag['type'];
	if ( ! empty( $tag['attr'] ) ) {
		
		// remove our tokens from tag
				
		$tokens = array( 'mask' => 'mask:', 'alternate_mask' => 'aMask:', 're_do' => 'reDo:', 're_undo' => 'reUndo:');
		foreach( $tokens as $var => $token ) { 
			if ( $pos = strpos( $tag['attr'], $token ) ) {
				$end = strpos( $tag['attr'], ' ', $pos );
				if ( $end ) {
					${$var} = substr( $tag['attr'], $pos, $end - $pos );
				} else {
					${$var} = substr( $tag['attr'], $pos);
				}
			} else {
				${$var} = '';
			}
		}
		
		$tag['attr'] = trim( str_replace( array( $mask, $alternate_mask, $re_do, $re_undo ),  '', $tag['attr']) );
		
		// get only values from our tokens, removing token ids
		foreach( $tokens as $var => $token ) { 
			${$var} = str_replace( $token, '', ${$var} );
		}	
		
		// parse the artibutes again 
		global $wpcf7_shortcode_manager;
		$attr = $wpcf7_shortcode_manager->shortcode_parse_atts( $tag['attr'] );	
		
		if ( is_array( $attr ) ) {
			if ( is_array( $attr['options'] ) ) {
				$tag['name'] = array_shift( $attr['options'] );
				$tag['options'] = (array) $attr['options'];
			}
			$tag['raw_values'] = (array) $attr['values'];
			$tag['attr'] ='';
		} else {
			$tag['attr'] = $attr;
		}
	}
	$name = $tag['name'];


	$_POST[$name] = trim( strtr( (string) $_POST[$name], "\n", " " ) );

	if ( 'phone*' == $type ) {
		if ( '' == $_POST[$name] ) {
			$result['valid'] = false;
			$result['reason'][$name] = wpcf7_get_message( 'invalid_required' );
		}
	}
	return $result;
}

/* Tag generator */

add_action( 'admin_init', 'wpcf7_add_tag_generator_phone', 15 );

function wpcf7_add_tag_generator_phone() {
	load_plugin_textdomain( 'wpcf7pm', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
	if (function_exists( 'wpcf7_add_tag_generator' ) ) 
		wpcf7_add_tag_generator( 'phone', __( 'Telephone field', 'wpcf7pm' ),
									'wpcf7-tg-pane-phone', 'wpcf7_tg_pane_phone' );
}

function wpcf7_tg_pane_phone( &$contact_form ) {
?>
<div id="wpcf7-tg-pane-phone" class="hidden">
  <form action="">
    <table>
      <tr>
        <td><label for="required">
          <input type="checkbox" name="required" id="required" />
          &nbsp;<?php echo esc_html( __( 'Required field?', 'wpcf7' ) ); ?></label></td><td>&nbsp;</td>
      </tr>
      <tr>
        <td><?php echo esc_html( __( 'Name', 'wpcf7' ) ); ?><br />
          <input type="text" name="name" class="tg-name oneline" />
        </td><td>&nbsp;</td>
      </tr>
      <tr>
        <td><?php echo esc_html( __( 'Mask', 'wpcf7pm' ) ); ?> <br />
          <input type="text" name="mask" class="oneline option" value="(999)999-9999" />
          <br />
          <?php echo esc_html( __( 'Alternative Mask', 'wpcf7pm' ) ); ?> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
          <input type="text" name="aMask" class="alternate oneline option" />
        </td>
        <td><br />
          <?php _e( 'a - Represents an alpha character (A-Z,a-z)<br />
          9 - Represents a numeric character (0-9)<br />
          * - Represents an alphanumeric character (A-Z,a-z,0-9)', 'wpcf7pm'); ?></td>
      </tr>
      <tr>
        <td><?php echo esc_html( __( 'Regular expression to trigger changing to the alternative mask', 'wpcf7pm' ) ); ?> <br />
          <input type="text" name="reDo" class="reTrigger oneline option" />
        </td>
        <td>
          <?php echo esc_html( __( 'Regular expression to change back to the original mask', 'wpcf7pm' ) ); ?> <br />
          <input type="text" name="reUndo" class="reUndo oneline option" />
        </td>
      </tr>
      <tr>
        <td><code>id</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
          <input type="text" name="id" class="idvalue oneline option" />
        </td>
        <td><code>class</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
          <input type="text" name="class" class="classvalue oneline option" />
        </td>
      </tr>
      <tr>
        <td><code>size</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
          <input type="text" name="size" class="numeric oneline option" />
        </td>
        <td><code>maxlength</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
          <input type="text" name="maxlength" class="numeric oneline option" />
        </td>
      </tr>
    </table>
    <div class="tg-tag"><?php echo esc_html( __( "Copy this code and paste it into the form left.", 'wpcf7' ) ); ?><br />
      <input type="text" name="phone" class="tag" readonly="readonly" onfocus="this.select()" />
    </div>
    <div class="tg-mail-tag"><?php echo esc_html( __( "And, put this code into the Mail fields below.", 'wpcf7' ) ); ?><br />
      <span class="arrow">&#11015;</span>&nbsp;
      <input type="text" class="mail-tag" readonly="readonly" onfocus="this.select()" />
    </div>
  </form>
</div>
<?php
}
?>