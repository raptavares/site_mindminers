<?php
/**
 * Meta Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 * 
 * @package     Meta_Framework
 * @subpackage  Core
 * @author      FOX
 */

// Exit if accessed directly
if (! defined('ABSPATH')) {
    exit();
}

// Don't duplicate me!
if (! class_exists('MetaFramework')) {

    /**
     * Main MetaFramework class
     *
     * @since 1.0.0
     */
    class MetaFramework
    {

        private static $instance;
        public static $metaboxs;
        public static $redux;
        public static $args;
        public static $plugin_dir;
        public static $plugin_url;
        public static $css_url;
        public static $js_url;

        public static function init()
        {
            if (! self::$instance) {
                self::$instance = new self();
                self::$instance->setup_globals();
            }
            
            if(! self::$redux){
                self::$redux = new ReduxFramework(array(), self::$args);
            }

            self::$redux->args['meta_mode'] = null;

            self::$args['menu_type'] = 'hidden';

            self::$redux->args = array_merge(self::$redux->args, self::$args);

            // Globals meta options.
            add_action('the_post', array( self::$instance, '_get_values' ));
            add_action('wp', array( self::$instance, '_get_values' ));
            
            // Add meta boxs.
            add_action('add_meta_boxes', array( self::$instance, '_add_meta_box' ));
            
            // Save redux meta box.
            add_action('save_post', array( self::$instance, '_save_meta_data' ));
            
            // This example assumes your opt_name is set to self::$opt_name, replace with your opt_name value
            add_action( "redux/page/".self::$redux->args['opt_name']."/enqueue", array( self::$instance, 'panel_scripts' ));
            
            // Tab active.
            add_action( "redux/page/".self::$redux->args['opt_name']."/content/after", array( self::$instance, '_add_tab_active' ));
        }
        
        /**
         * Globals plugin directorys.
         *
         * @access private
         * @global path + uri.
         * @since 1.0.0
         */
        private function setup_globals()
        {
        	self::$plugin_dir = plugin_dir_path( __FILE__ );
        	self::$plugin_url = plugin_dir_url( __FILE__ );
                
        	self::$css_url = trailingslashit(self::$plugin_url . 'assets/css');
        	self::$js_url = trailingslashit(self::$plugin_url . 'assets/js');
        }

        /* add meta box. */
        public function _add_meta_box()
        {
            if (self::$metaboxs) {
                
                foreach (self::$metaboxs as $meta) {
                    
                    add_meta_box('_box_' . $meta['id'], $meta['label'], array( self::$instance, 'get_meta_box_content'), $meta['post_type'], $meta['context'], $meta['priority'], $meta);
                    
                    // Add class to redux metabox.
                    add_filter( "postbox_classes_{$meta['post_type']}__box_{$meta['id']}", array( self::$instance, '_add_meta_class' ) );
                }

                // Get panel template.
                add_filter('redux/'.self::$redux->args['opt_name'].'/panel/templates_path', array(self::$instance, 'panel_template'));
            }
        }
        
        /**
         * 
         */
        public function _add_tab_active() {
            
            global $post;
            
            if(self::$redux->args['open_expanded'])
                return ;
            
            /* get key. */
            $key = '_meta_box_' . self::$redux->args['meta_box_id'];
                
            /* get redux meta data. */
            $value = isset($GLOBALS[self::$redux->args['opt_name']][$key]) ? $GLOBALS[self::$redux->args['opt_name']][$key] : '';
                
            echo '<input id="_meta_box_'.self::$redux->args['meta_box_id'].'" name="'.self::$redux->args['opt_name'].'[_meta_box_'.self::$redux->args['meta_box_id'].']" class="_meta_box_input" type="hidden" value="'.$value.'">';
        }
        
        /**
         * Add custom class to meta box.
         * 
         * @return class
         */
        public function _add_meta_class($class){
        	
        	$class[] = 'redux-meta';
        	
        	return $class;
        }

        /* get meta box content. */
        public function get_meta_box_content($post, $sections)
        {
            global $opt_meta;
        	// if sections null.
        	if(empty($sections['args']['sections'])) return ;
        	        	
        	// get panel options.
        	self::$redux->args['open_expanded'] = $sections['args']['open_expanded'];
        	
        	// set extra options.
        	self::$redux->args['meta_box_id'] = $sections['args']['id'];
        	
        	/* get sections. */
            self::$redux->sections = $sections['args']['sections'];

            /* get meta data. */
            self::$instance->_get_values();
            
            /* set meta data value for inputs. */
            self::$instance->_set_values();
            
            /* register settings */
            self::$redux->_register_settings();
            
            /* enqueue redux scripts. */
            self::$redux->_enqueue();
            
            /* create panel. */
            self::$redux->generate_panel();
        }
        
        /**
         * Add scripts to metabox.
         * 
         * @since 1.0.0
         */
        function panel_scripts() {
        	
        	wp_enqueue_style('redux-meta-css', self::$css_url . 'redux-meta.css', array( 'redux-admin-css' ), time(), 'all');
        	wp_enqueue_script('redux-meta-js', self::$js_url . 'redux-meta.js', array( 'jquery' ), time(), true);
        }

        /**
         * Used to select the proper template. If it doesn't exist in the path, then the original template file is used.
         *
         * @param $file
         */
        public function panel_template($template){
            
            return apply_filters( "meta/" . self::$redux->args['opt_name'] . "/panel/panel_template", dirname(__FILE__) . '/templates/panel/' );
        }
        
        public static function setArgs($args = array()){
        	self::$args = $args;
        }
        
        public static function setMetabox($metabox = array()){
            self::$metaboxs[$metabox['id']] = $metabox;
        }
        
        /**
         * Set values for redux imputs.
         * 
         * @param array or string
         */
        public function _set_values(){
        	
        	if(!isset($GLOBALS[self::$redux->args['opt_name']])) return;
        	
        	$opt_name = $GLOBALS[self::$redux->args['opt_name']];
        	
        	foreach ( self::$redux->sections as $k => $section ) {
        		
        		if(empty($section['fields'])) continue;
        		
        		foreach ( $section['fields'] as $fieldk => $field ) {
        			
        			if(!isset($opt_name[$field['id']])) continue;
        			
        			self::$redux->sections[$k]['fields'][$fieldk]['default'] = $opt_name[$field['id']];
        		}
        	}
        }
        
        /**
         * Get global options.
         * 
         * @global $opt_name
         */
        public function _get_values(){
        	
        	global $post;
        	 
        	/* Is post. */
        	if(!isset($post->ID)){
        	    return;
            }

            $data = array();

        	/* Get redux meta data. */
            if(self::$redux->args['meta_mode'] == 'multiple'){
                $_custom = get_post_custom($post->ID);
                $_is_update = false;
                foreach ($_custom as $key => $value){
                    if(strpos($key, 'ef3-') !== false) {
                        $data[str_replace('ef3-', null , $key)] = maybe_unserialize($value[0]);
                        $_is_update = true;
                    }
                }

                if(!$_is_update) $data = maybe_unserialize(get_post_meta($post->ID, self::$redux->args['opt_name'], true));

            } else {
                $data = maybe_unserialize(get_post_meta($post->ID, self::$redux->args['opt_name'], true));
            }
        	 
        	/* decode meta data. */
        	$GLOBALS[self::$redux->args['opt_name']] = $data;
        }
        
        /**
         * Save meta data.
         * 
         * @param int $post_id
         * @return true and false
         */
        public function _save_meta_data($post_id)
        {
        	// If this is an autosave, our form has not been submitted,
        	// so we don't want to do anything.
        	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        		return $post_id;
        	
        	// If data null.
        	if (empty($_POST[self::$redux->args['opt_name']]))
        		return $post_id;
        	
            $_post_data = $_POST[self::$redux->args['opt_name']];
        	
        	/* OK, its safe for us to save the data now. */
            if(self::$redux->args['meta_mode'] == 'multiple'){
                foreach ($_post_data as $key => $val){
                    update_post_meta($post_id, 'ef3-' . $key, $val);
                }
            } else {
                $data = maybe_serialize($_POST[self::$redux->args['opt_name']]);
                update_post_meta($post_id, self::$redux->args['opt_name'], $data);
            }
        }
    }
}