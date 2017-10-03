<?php
/**
 * Meta Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 * 
 * @package     EF3Taxonomy_meta
 * @subpackage  Core
 * @author      FOX
 */

// Exit if accessed directly
if (! defined('ABSPATH')) {
    exit();
}

// Don't duplicate me!
if (! class_exists('EF3Taxonomy_meta')) {

    /**
     * Main EF3Taxonomy_meta class
     *
     * @since 1.0.0
     */
    class EF3Taxonomy_meta
    {

        private static $instance;
        public static $taxonomy_meta;
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
                self::$redux = new ReduxFramework();
            }

            self::$redux->args = array_merge(self::$redux->args, self::$args);
            
            // Add meta boxs.
            self::$instance->_add_meta_box();

            /* save and edit term. */
            add_action( 'created_term', array( self::$instance, 'save_taxonomy_fields' ), 10, 3 );
            add_action( 'edit_term', array( self::$instance, 'save_taxonomy_fields' ), 10, 3 );
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
            if (self::$taxonomy_meta) {
                
                foreach (self::$taxonomy_meta as $meta) {

                    /* get sections. */
                    self::$redux->sections = $meta['sections'];

                    /* add custom fields to taxonomy. */
                    add_action("{$meta['taxonomy']}_add_form_fields", array($this, 'add_taxonomy_fields'));
                    add_action("{$meta['taxonomy']}_edit_form_fields", array( $this, 'edit_taxonomy_fields' ), 10 );
                }

                // get panel template.
                add_filter('redux/'.self::$redux->args['opt_name'].'/panel/templates_path', array(self::$instance, 'panel_template'));
            }
        }

        /**
         * add_taxonomy
         */
        public function add_taxonomy_fields()
        {
            echo '<div class="form-field term-ef3-custom-wrap">';
                self::$instance->taxonomy_fields();
            echo '</div>';
        }

        /**
         * edit_taxonomy
         * @param $term_id
         */
        function edit_taxonomy_fields($term_id){

            /* set meta data value for inputs. */
            self::$instance->_set_values($term_id->term_id);

            echo '<tr class="form-field term-ef3-custom-wrap">';
                echo '<th scope="row"><label for="">'.esc_html__('Options', 'EF3-Framework').'</label></th>';
                echo '<td><div>';
                    self::$instance->taxonomy_fields();
                echo '</div></td>';
            echo '</tr>';
        }

        /**
         * redux meta options.
         */
        public function taxonomy_fields(){

            /* register settings */
            self::$redux->_register_settings();

            /* enqueue redux scripts. */
            self::$redux->_enqueue();

            /* create panel. */
            self::$redux->generate_panel();
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
        	self::$taxonomy_meta[] = $metabox;
        }
        
        /**
         * Set values for redux imputs.
         * 
         * @param array or string
         */
        public function _set_values($term_id){

        	foreach ( self::$redux->sections as $k => $section ) {
        		
        		if(empty($section['fields'])) continue;
        		
        		foreach ( $section['fields'] as $fieldk => $field ) {

                    $value = get_term_meta($term_id, $field['id']);

        			if(!isset($value[0]))
                        continue;

        			self::$redux->sections[$k]['fields'][$fieldk]['default'] = $value[0];
        		}
        	}
        }

        /**
         * save_category_fields function.
         *
         * @param mixed $term_id Term ID being saved
         */
        public function save_taxonomy_fields($term_id, $tt_id = '', $taxonomy = '')
        {
            // If data null.
            if (empty($_POST[self::$redux->args['opt_name']]))
                return $term_id;

            foreach($_POST[self::$redux->args['opt_name']] as $key => $value){
                update_term_meta($term_id, $key, $value);
            }
        }
    }
}