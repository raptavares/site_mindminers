<?php
if (! defined('ABSPATH')) {
    exit();
}
/**
 * Add User Press Core.
 *
 * @name UserPress_Ajax
 * @since 1.0.0
 */
if (! class_exists('UserPress_Ajax')) {

    class UserPress_Ajax
    {

        function __construct() {
            
            /* action login */
            add_action('wp_ajax_nopriv_user_press_login', array(
                $this,
                'form_ajax_login_callback'
            ));
            /* action login facebook */
            add_action('wp_ajax_nopriv_facebook_ajax_login', array(
                $this,
                'facebook_ajax_login_callback'
            ));
            /* action register */
            add_action('wp_ajax_nopriv_form_ajax_register', array(
                $this,
                'form_ajax_register_callback'
            ));
        }

        /**
         * Register callback
         *
         * @package UserPress*/
        function form_ajax_register_callback() {
            header('Content-Type: application/json');
            check_ajax_referer( UserPress::NONCE );
            /* if login data null. */
            if( empty($_REQUEST['data']) )
                die(json_encode((object)array('error'=> true, 'message' => esc_html__('Request Null', 'user-press'))));

            $register_data = $_REQUEST['data'];
            $register_data['user']  = sanitize_user($register_data['user']);
            $register_data['pass']  = esc_attr($register_data['pass']);
            $register_data['email'] = sanitize_email($register_data['email']);

            /* check user null */
            if( empty($register_data['user']) )
                die(json_encode((object)array('error'=> true, 'user_null' => esc_html__('User name null', 'user-press'))));
            /* check pass null */
            if( empty($register_data['pass']) )
                die(json_encode((object)array('error'=> true, 'pass_null' => esc_html__('Password null', 'user-press'))));
            /* check email null */
            if( empty($register_data['email']) )
                die(json_encode((object)array('error'=> true, 'email_null' => esc_html__('Email null', 'user-press'))));
            /* check valid email */
            if( $register_data['passconfirm'] != $register_data['pass'] )
                die(json_encode((object)array('error'=> true, 'passconfirm' => esc_html__('Password and confirmation password do not match.', 'user-press'))));

            /* check valid user name */
            if ( ! validate_username( $register_data['user'] ) )
                die(json_encode((object)array('error'=> true, 'user_invalid' => esc_html__('The username is not valid!', 'user-press'))));
            /* check user name exists */
            if ( username_exists( $register_data['user'] ) )
                die(json_encode((object)array('error'=> true, 'user_exists' => esc_html__('Username already exists!', 'user-press'))));
            /* check email already registed */
            if ( email_exists( $register_data['email'] ) )
                die(json_encode((object)array('error'=> true, 'email_exists' => esc_html__('Email Already in use.', 'user-press'))));
            if( $this->register_action($register_data['user'], $register_data['pass'], $register_data['email']) )
                die( json_encode((object)array('error'=> false)) );
            exit();
        }

        /**
         * To register
         *
         **/
        function register_action( $user, $pass, $email ) {
            $userdata = array(
                'user_login' => $user,
                'user_pass'  => $pass,
                'user_email' => $email
            );

            if( wp_insert_user( $userdata ) ) {
                /* check user & pass */
                if (! wp_login($user, $pass))
                    return false;

                /* get user by name. */
                $user = get_user_by('slug', $user);

                /* set login. */
                wp_set_auth_cookie( $user->data->ID, false, false );
                return true;
            }
            return false;
        }

        /**
         * Login callback.
         *
         * @package UserPress
         */
        function form_ajax_login_callback()
        {
            header('Content-Type: application/json');
            check_ajax_referer( UserPress::NONCE );
            /* if login data null. */
            if(empty($_REQUEST['data']))
                die(json_encode((object)array('error'=> true, 'message' => esc_html__('Request Null', 'user-press'))));

            $login_data = $_REQUEST['data'];

            /* if user null. */
            if(empty($login_data['user']))
                die(json_encode((object)array('error'=> true, 'user' => esc_html__('User name null', 'user-press'))));

            /* if pass null. */
            if(empty($login_data['pass']))
                die(json_encode((object)array('error'=> true, 'pass' => esc_html__('Password null', 'user-press'))));

            /* rememberme */
            $login_data->rememberme = (isset($login_data['rememberme']) && $login_data['rememberme']) ? true : false;

            /* login. */
            if($this->login_action($login_data['user'], $login_data['pass'], $login_data['rememberme']))
                die(json_encode((object)array('error'=> false)));

            /* error */
            if(username_exists($login_data['user']))
                die(json_encode((object)array('error'=> true, 'pass'=> esc_html__('Password incorrect', 'user-press'))));

            die(json_encode((object)array('error'=> true, 'user'=> esc_html__('User incorrect', 'user-press'))));
        }

        /**
         * Login action
         **/
        function login_action($user, $pass, $rememberme = false)
        {
            /* check user & pass */
            if (! wp_login($user, $pass))
                return false;

            /* get user by name. */
            $user = get_user_by('slug', $user);

            /* set login. */
            wp_set_auth_cookie( $user->data->ID, $rememberme, false );

            return true;
        }

        /**
         * Login Facebook call back
         *
         */
        function facebook_ajax_login_callback() {
            check_ajax_referer( UserPress::NONCE );
            if( empty($_REQUEST['data']) )
                die(json_encode((object)array('error'=> true, 'message' => esc_html__('Request Null', 'user-press'))));

            $login_data = $_REQUEST['data'];

            if( empty($login_data['name']) )
                die(json_encode((object)array('error'=> true, 'name_null' => esc_html__('Facebook user name null', 'user-press'))));

            if( empty($login_data['email']) )
                die(json_encode((object)array('error'=> true, 'email_null' => esc_html__('Email null', 'user-press'))));

            $userdata = array(
                'user_login' => 'Facebook - ' . sanitize_user($login_data['name']),
                'user_pass'  => 'u$3r' . str_replace(' ', '', strtolower($login_data['name'])) . 'pr3$$',
                'user_email' => sanitize_email($login_data['email'])
            );

            if( username_exists( $userdata['user_login'] ) ) {

                /* check user & pass */
                if (! wp_login( $userdata['user_login'], $userdata['user_pass']) )
                    die(json_encode((object)array('error'=> true, 'user'=> esc_html__('The user is incorrect', 'user-press'))));

                /* get user by name. */
                $user = get_user_by( 'email', $userdata['user_email'] );

                /* set login. */
                wp_set_auth_cookie( $user->data->ID, false, false );
                die( json_encode((object)array('error' => false)) );
            } else {
                if( $this->register_action($userdata['user_login'], $userdata['user_pass'], $userdata['user_email']) )
                    die( json_encode((object)array('error' => false)) );
            }
            die(json_encode((object)array('error'=> true, 'user'=> esc_html__('The user is incorrect', 'user-press'))));
        }
    }
    
    new UserPress_Ajax();
}