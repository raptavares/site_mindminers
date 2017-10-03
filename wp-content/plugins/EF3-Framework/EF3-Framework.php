<?php
/**
 * Plugin Name: EF3-Framework
 * Plugin URI: http://cmssuperheroes.com/
 * Description: EF3-Framework add Redux Framework, Redux Meta Framework and SCSS Framework only for themes developer.
 * Version: 1.0.6
 * Author: FOX
 * Author URI: https://twitter.com/TuDaTinh
 * License: GPLv2 or later
 * Text Domain: EF3-Framework
 */
if (!defined('ABSPATH')) {
    exit();
}

if (!class_exists('EF3_Framework')) :

    /**
     * Main Class
     *
     * @class EF3_Framework
     *
     * @version 1.0.0
     */
    final class EF3_Framework
    {

        /* single instance of the class */
        public $file = '';

        public $basename = '';

        /* base plugin_dir. */
        public $plugin_dir = '';
        public $plugin_url = '';

        /* base acess folder. */
        public $acess_dir = '';
        public $acess_url = '';


        /**
         * Main EF3_Framework Instance
         *
         * Ensures only one instance of EF3_Framework is loaded or can be loaded.
         *
         * @since 1.0.0
         * @static
         *
         * @see EF3_Framework()
         * @return EF3_Framework - Main instance
         */
        public static function instance()
        {
            static $_instance = null;

            if (is_null($_instance)) {

                $_instance = new EF3_Framework();

                // globals.
                $_instance->setup_globals();

                // includes.
                $_instance->includes();

                // actions.
                $_instance->setup_actions();
            }

            return $_instance;
        }

        /**
         * globals value.
         *
         * @package EF3_Framework
         * @global path + uri.
         */
        private function setup_globals()
        {
            $this->file = __FILE__;

            /* base name. */
            $this->basename = plugin_basename($this->file);

            /* base plugin. */
            $this->plugin_dir = plugin_dir_path($this->file);
            $this->plugin_url = plugin_dir_url($this->file);

            /* base assets. */
            $this->acess_dir = trailingslashit($this->plugin_dir . 'assets');
            $this->acess_url = trailingslashit($this->plugin_url . 'assets');
        }

        /**
         * Setup all actions + filter.
         *
         * @package EF3_Framework
         * @version 1.0.0
         */
        private function setup_actions()
        {
            // front-end scripts.
            add_action('wp_enqueue_scripts', array($this, 'add_scrips'));

            // admin scripts.
            add_action('admin_enqueue_scripts', array($this, 'add_admin_script'));
        }

        /**
         * include files.
         *
         * @package EF3_Framework
         * @version 1.0.0
         */
        private function includes()
        {
            /* inc scss lip. */
            if(!class_exists('scssc'))
                require_once $this->plugin_dir . 'frameworks/SCSS/scss.inc.php';

            /* add WP_Filesystem. */
            if ( !class_exists('WP_Filesystem') ) {
                require_once(ABSPATH . 'wp-admin/includes/file.php');
                WP_Filesystem();
            }

            /* inc redux framework */
            require_once $this->plugin_dir . 'frameworks/ReduxCore/framework.php';

            /* inc redux meta framework */
            require_once $this->plugin_dir . 'frameworks/Metacore/framework.php';

            /* inc redux taxonomy meta */
            require_once $this->plugin_dir . 'frameworks/Taxonomy/framework.php';
        }

        /**
         * Load the translation file for current language. Checks the languages
         * folder inside the bbPress plugin first, and then the default WordPress
         * languages folder.
         */
        public function load_textdomain() {
        }

        /**
         * add front-end scripts.
         *
         * @package EF3_Framework
         * @version 1.0.0
         */
        function add_scrips()
        {
        }

        /**
         * add back-end scripts.
         *
         * @package EF3_Framework
         * @version 1.0.0
         */
        function add_admin_script()
        {
        }
    }
endif;

/**
 * Returns the main instance of ef3_framework() to prevent the need to use globals.
 *
 * @since 1.0
 * @return EF3_Framework
 */
if (!function_exists('ef3_framework')) {

    function ef3_framework()
    {
        return EF3_Framework::instance();
    }
}

if (defined('EF3_FRAMEWORK_LATE_LOAD')) {
    add_action('plugins_loaded', 'ef3_framework', (int)EF3_FRAMEWORK_LATE_LOAD);
} else {
    ef3_framework();
}