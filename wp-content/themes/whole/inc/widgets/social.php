<?php
class CS_Social_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'cs_social_widget', // Base ID
            esc_html__('Social', 'whole'), // Name
            array('description' => esc_html__('Social Widget', 'whole'),) // Args
        );
    }

    function widget($args, $instance) {
        global $woocommerce;

        extract($args);
        if (!empty($instance['title'])) {
        $title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Social', 'whole' ) : $instance['title'], $instance, $this->id_base);
        }

        $style = 'style-1';
        if(!empty($instance['style'])){
            $style = $instance['style'];
        }

        $icon_facebook = isset($instance['icon_facebook']) ? (!empty($instance['icon_facebook']) ? $instance['icon_facebook']: 'fa fa-facebook') : 'fa fa-facebook';
        $link_facebook = isset($instance['link_facebook']) ? $instance['link_facebook'] : '';

        $icon_rss = isset($instance['icon_rss']) ? (!empty($instance['icon_rss']) ? $instance['icon_rss']: 'fa fa-rss') : 'fa fa-rss';
        $link_rss = isset($instance['link_rss']) ? $instance['link_rss'] : '';

        $icon_youtube = isset($instance['icon_youtube']) ? (!empty($instance['icon_youtube']) ? $instance['icon_youtube']: 'fa fa-youtube') : 'fa fa-youtube';
        $link_youtube = isset($instance['link_youtube']) ? $instance['link_youtube'] : '';

        $icon_twitter = isset($instance['icon_twitter']) ? (!empty($instance['icon_twitter']) ? $instance['icon_twitter']: 'fa fa-twitter') : 'fa fa-twitter';
        $link_twitter = isset($instance['link_twitter']) ? $instance['link_twitter'] : '';

        $icon_google = isset($instance['icon_google']) ? (!empty($instance['icon_google']) ? $instance['icon_google']: 'fa fa-google-plus') : 'fa fa-google-plus';
        $link_google = isset($instance['link_google']) ? $instance['link_google'] : '';

        $icon_skype = isset($instance['icon_skype']) ? (!empty($instance['icon_skype']) ? $instance['icon_skype']: 'fa fa-skype') : 'fa fa-skype';
        $link_skype = isset($instance['link_skype']) ? $instance['link_skype'] : '';

        $icon_yahoo = isset($instance['icon_yahoo']) ? (!empty($instance['icon_yahoo']) ? $instance['icon_yahoo']: 'fa fa-smile-o') : 'fa fa fa-smile-o';
        $link_yahoo = isset($instance['link_yahoo']) ? $instance['link_yahoo'] : '';

        $icon_dribbble = isset($instance['icon_dribbble']) ? (!empty($instance['icon_dribbble']) ? $instance['icon_dribbble']: 'fa fa-dribbble') : 'fa fa-dribbble';
        $link_dribbble = isset($instance['link_dribbble']) ? $instance['link_dribbble'] : '';

        $icon_flickr = isset($instance['icon_flickr']) ? (!empty($instance['icon_flickr']) ? $instance['icon_flickr']: 'fa fa-flickr') : 'fa fa-flickr';
        $link_flickr = isset($instance['link_flickr']) ? $instance['link_flickr'] : '';

        $icon_linkedin = isset($instance['icon_linkedin']) ? (!empty($instance['icon_linkedin']) ? $instance['icon_linkedin']: 'fa fa-linkedin') : 'fa fa-linkedin';
        $link_linkedin = isset($instance['link_linkedin']) ? $instance['link_linkedin'] : '';

        $icon_vimeo = isset($instance['icon_vimeo']) ? (!empty($instance['icon_vimeo']) ? $instance['icon_vimeo']: 'fa fa-vimeo-square') : 'fa fa-vimeo-square';
        $link_vimeo = isset($instance['link_vimeo']) ? $instance['link_vimeo'] : '';

        $icon_pinterest = isset($instance['icon_pinterest']) ? (!empty($instance['icon_pinterest']) ? $instance['icon_pinterest']: 'fa fa-pinterest') : 'fa fa-pinterest';
        $link_pinterest = isset($instance['link_pinterest']) ? $instance['link_pinterest'] : '';

        $icon_github = isset($instance['icon_github']) ? (!empty($instance['icon_github']) ? $instance['icon_github']: 'fa fa-github') : 'fa fa-github';
        $link_github = isset($instance['link_github']) ? $instance['link_github'] : '';

        $icon_bloglovin = isset($instance['icon_bloglovin']) ? (!empty($instance['icon_bloglovin']) ? $instance['icon_bloglovin']: 'fa fa-heart') : 'fa fa-heart';
        $link_bloglovin = isset($instance['link_bloglovin']) ? $instance['link_bloglovin'] : '';

        $icon_instagram = isset($instance['icon_instagram']) ? (!empty($instance['icon_instagram']) ? $instance['icon_instagram']: 'fa fa-instagram') : 'fa fa-instagram';
        $link_instagram = isset($instance['link_instagram']) ? $instance['link_instagram'] : '';

        $extra_class = !empty($instance['extra_class']) ? $instance['extra_class'] : "";

        // no 'class' attribute - add one with the value of width
        if( strpos($before_widget, 'class') === false ) {
            $before_widget = str_replace('>', 'class="'. $extra_class . '"', $before_widget);
        }
        // there is 'class' attribute - append width value to it
        else {
            $before_widget = str_replace('class="', 'class="'. $extra_class . ' ', $before_widget);
        }
        echo ''.$before_widget;

        if (!empty($title)) { echo ''.$before_title . $title . $after_title; }
            echo "<ul>";
            if ($link_facebook != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Facebook" href="'.esc_url($link_facebook).'"><i class="'.$icon_facebook.'"></i></a></li>';
            }

            if ($link_rss != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Rss" href="'.esc_url($link_rss).'"><i class="'.$icon_rss.'"></i></a></li>';
            }

            if ($link_youtube != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="YouTube" href="'.esc_url($link_youtube).'"><i class="'.$icon_youtube.'"></i></a></li>';
            }

            if ($link_twitter != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Twitter" href="'.esc_url($link_twitter).'"><i class="'.$icon_twitter.'"></i></a></li>';
            }

            if ($link_google != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Google" href="'.esc_url($link_google).'"><i class="'.$icon_google.'"></i></a></li>';
            }

            if ($link_skype != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Skype" href="'.esc_url($link_skype).'"><i class="'.$icon_skype.'"></i></a></li>';
            }

            if ($link_yahoo != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Yahoo" href="'.esc_url($link_yahoo).'"><i class="'.$icon_yahoo.'"></i></a></li>';
            }

            if ($link_dribbble != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Dribbble" href="'.esc_url($link_dribbble).'"><i class="'.$icon_dribbble.'"></i></a></li>';
            }

            if ($link_flickr != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Flickr" href="'.esc_url($link_flickr).'"><i class="'.$icon_flickr.'"></i></a></li>';
            }

            if ($link_linkedin != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Linkedin" href="'.esc_url($link_linkedin).'"><i class="'.$icon_linkedin.'"></i></a></li>';
            }

            if ($link_vimeo != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Vimeo" href="'.esc_url($link_vimeo).'"><i class="'.$icon_vimeo.'"></i></a></li>';
            }

            if ($link_pinterest != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Pinterest" href="'.esc_url($link_pinterest).'"><i class="'.$icon_pinterest.'"></i></li>';
            }

            if ($link_github != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Github" href="'.esc_url($link_github).'"><i class="'.$icon_github.'"></i></a></li>';
            }

            if ($link_bloglovin != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Bloglovin" href="'.esc_url($link_bloglovin).'"><i class="'.$icon_bloglovin.'"></i></a></li>';
            }

            if ($link_instagram != '') {
                echo '<li><a target="_blank" data-rel="tooltip" data-placement="bottom" data-original-title="Instagram" href="'.esc_url($link_instagram).'"><i class="'.$icon_instagram.'"></i></a></li>';
            }

            echo "</ul>";


        echo ''.$after_widget;
    }

    function update( $new_instance, $old_instance ) {
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);

         $instance['style'] = strip_tags($new_instance['style']);

         $instance['icon_facebook'] = strip_tags($new_instance['icon_facebook']);
         $instance['link_facebook'] = strip_tags($new_instance['link_facebook']);

         $instance['icon_rss'] = strip_tags($new_instance['icon_rss']);
         $instance['link_rss'] = strip_tags($new_instance['link_rss']);

         $instance['icon_youtube'] = strip_tags($new_instance['icon_youtube']);
         $instance['link_youtube'] = strip_tags($new_instance['link_youtube']);

         $instance['icon_twitter'] = strip_tags($new_instance['icon_twitter']);
         $instance['link_twitter'] = strip_tags($new_instance['link_twitter']);

         $instance['icon_google'] = strip_tags($new_instance['icon_google']);
         $instance['link_google'] = strip_tags($new_instance['link_google']);

         $instance['icon_skype'] = strip_tags($new_instance['icon_skype']);
         $instance['link_skype'] = strip_tags($new_instance['link_skype']);

         $instance['icon_yahoo'] = strip_tags($new_instance['icon_yahoo']);
         $instance['link_yahoo'] = strip_tags($new_instance['link_yahoo']);

         $instance['icon_dribbble'] = strip_tags($new_instance['icon_dribbble']);
         $instance['link_dribbble'] = strip_tags($new_instance['link_dribbble']);

         $instance['icon_flickr'] = strip_tags($new_instance['icon_flickr']);
         $instance['link_flickr'] = strip_tags($new_instance['link_flickr']);

         $instance['icon_linkedin'] = strip_tags($new_instance['icon_linkedin']);
         $instance['link_linkedin'] = strip_tags($new_instance['link_linkedin']);

         $instance['icon_vimeo'] = strip_tags($new_instance['icon_vimeo']);
         $instance['link_vimeo'] = strip_tags($new_instance['link_vimeo']);

         $instance['icon_pinterest'] = strip_tags($new_instance['icon_pinterest']);
         $instance['link_pinterest'] = strip_tags($new_instance['link_pinterest']);

         $instance['icon_github'] = strip_tags($new_instance['icon_github']);
         $instance['link_github'] = strip_tags($new_instance['link_github']);

         $instance['icon_bloglovin'] = strip_tags($new_instance['icon_bloglovin']);
         $instance['link_bloglovin'] = strip_tags($new_instance['link_bloglovin']);

         $instance['icon_instagram'] = strip_tags($new_instance['icon_instagram']);
         $instance['link_instagram'] = strip_tags($new_instance['link_instagram']);

         $instance['extra_class'] = $new_instance['extra_class'];

         return $instance;
    }

    function form( $instance ) {
         $title = isset($instance['title']) ? esc_attr($instance['title']) : '';

         $style = isset($instance['style']) ? esc_attr($instance['style']) : '';

         $icon_facebook = isset($instance['icon_facebook']) ? esc_attr($instance['icon_facebook']) : '';
         $link_facebook = isset($instance['link_facebook']) ? esc_attr($instance['link_facebook']) : '';

         $icon_rss = isset($instance['icon_rss']) ? esc_attr($instance['icon_rss']) : '';
         $link_rss = isset($instance['link_rss']) ? esc_attr($instance['link_rss']) : '';

         $icon_youtube = isset($instance['icon_youtube']) ? esc_attr($instance['icon_youtube']) : '';
         $link_youtube = isset($instance['link_youtube']) ? esc_attr($instance['link_youtube']) : '';

         $icon_twitter = isset($instance['icon_twitter']) ? esc_attr($instance['icon_twitter']) : '';
         $link_twitter = isset($instance['link_twitter']) ? esc_attr($instance['link_twitter']) : '';

         $icon_google = isset($instance['icon_google']) ? esc_attr($instance['icon_google']) : '';
         $link_google = isset($instance['link_google']) ? esc_attr($instance['link_google']) : '';

         $icon_skype = isset($instance['icon_skype']) ? esc_attr($instance['icon_skype']) : '';
         $link_skype = isset($instance['link_skype']) ? esc_attr($instance['link_skype']) : '';

         $icon_yahoo = isset($instance['icon_yahoo']) ? esc_attr($instance['icon_yahoo']) : '';
         $link_yahoo = isset($instance['link_yahoo']) ? esc_attr($instance['link_yahoo']) : '';

         $icon_dribbble = isset($instance['icon_dribbble']) ? esc_attr($instance['icon_dribbble']) : '';
         $link_dribbble = isset($instance['link_dribbble']) ? esc_attr($instance['link_dribbble']) : '';

         $icon_flickr = isset($instance['icon_flickr']) ? esc_attr($instance['icon_flickr']) : '';
         $link_flickr = isset($instance['link_flickr']) ? esc_attr($instance['link_flickr']) : '';

         $icon_linkedin = isset($instance['icon_linkedin']) ? esc_attr($instance['icon_linkedin']) : '';
         $link_linkedin = isset($instance['link_linkedin']) ? esc_attr($instance['link_linkedin']) : '';

         $icon_vimeo = isset($instance['icon_vimeo']) ? esc_attr($instance['icon_vimeo']) : '';
         $link_vimeo = isset($instance['link_vimeo']) ? esc_attr($instance['link_vimeo']) : '';

         $icon_pinterest = isset($instance['icon_pinterest']) ? esc_attr($instance['icon_pinterest']) : '';
         $link_pinterest = isset($instance['link_pinterest']) ? esc_attr($instance['link_pinterest']) : '';

         $icon_github = isset($instance['icon_github']) ? esc_attr($instance['icon_github']) : '';
         $link_github = isset($instance['link_github']) ? esc_attr($instance['link_github']) : '';

         $icon_bloglovin = isset($instance['icon_bloglovin']) ? esc_attr($instance['icon_bloglovin']) : '';
         $link_bloglovin = isset($instance['link_bloglovin']) ? esc_attr($instance['link_bloglovin']) : '';

         $icon_instagram = isset($instance['icon_instagram']) ? esc_attr($instance['icon_instagram']) : '';
         $link_instagram = isset($instance['link_instagram']) ? esc_attr($instance['link_instagram']) : '';

         $extra_class = isset($instance['extra_class']) ? esc_attr($instance['extra_class']) : '';
         ?>
         <p><label for="<?php echo esc_url($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

         <p><label for="<?php echo esc_url($this->get_field_id('style')); ?>"><?php esc_html_e( 'Style:', 'whole' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('style') ); ?>" name="<?php echo esc_attr( $this->get_field_name('style') ); ?>">
            <option value="default"<?php if( $style == 'default' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Default', 'whole'); ?></option>
        </select>
         </p>

         <p><label for="<?php echo esc_url($this->get_field_id('icon_facebook')); ?>"><?php esc_html_e( 'Icon Facebook:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_facebook') ); ?>" type="text" value="<?php echo esc_attr( $icon_facebook ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_facebook')); ?>"><?php esc_html_e( 'Link Facebook:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_facebook') ); ?>" type="text" value="<?php echo esc_attr( $link_facebook ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_rss')); ?>"><?php esc_html_e( 'Icon rss:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_rss') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_rss') ); ?>" type="text" value="<?php echo esc_attr( $icon_rss ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_rss')); ?>"><?php esc_html_e( 'Link rss:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_rss') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_rss') ); ?>" type="text" value="<?php echo esc_attr( $link_rss ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_youtube')); ?>"><?php esc_html_e( 'Icon youtube:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_youtube') ); ?>" type="text" value="<?php echo esc_attr( $icon_youtube ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_youtube')); ?>"><?php esc_html_e( 'Link youtube:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_youtube') ); ?>" type="text" value="<?php echo esc_attr( $link_youtube ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_twitter')); ?>"><?php esc_html_e( 'Icon twitter:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_twitter') ); ?>" type="text" value="<?php echo esc_attr( $icon_twitter ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_twitter')); ?>"><?php esc_html_e( 'Link twitter:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_twitter') ); ?>" type="text" value="<?php echo esc_attr( $link_twitter ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_google')); ?>"><?php esc_html_e( 'Icon google:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_google') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_google') ); ?>" type="text" value="<?php echo esc_attr( $icon_google ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_google')); ?>"><?php esc_html_e( 'Link google:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_google') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_google') ); ?>" type="text" value="<?php echo esc_attr( $link_google ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_skype')); ?>"><?php esc_html_e( 'Icon skype:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_skype') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_skype') ); ?>" type="text" value="<?php echo esc_attr( $icon_skype ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_skype')); ?>"><?php esc_html_e( 'Link skype:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_skype') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_skype') ); ?>" type="text" value="<?php echo esc_attr( $link_skype ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_yahoo')); ?>"><?php esc_html_e( 'Icon yahoo:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_yahoo') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_yahoo') ); ?>" type="text" value="<?php echo esc_attr( $icon_yahoo ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_yahoo')); ?>"><?php esc_html_e( 'Link yahoo:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_yahoo') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_yahoo') ); ?>" type="text" value="<?php echo esc_attr( $link_yahoo ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_dribbble')); ?>"><?php esc_html_e( 'Icon dribbble:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_dribbble') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_dribbble') ); ?>" type="text" value="<?php echo esc_attr( $icon_dribbble ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_dribbble')); ?>"><?php esc_html_e( 'Link dribbble:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_dribbble') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_dribbble') ); ?>" type="text" value="<?php echo esc_attr( $link_dribbble ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_flickr')); ?>"><?php esc_html_e( 'Icon flickr:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_flickr') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_flickr') ); ?>" type="text" value="<?php echo esc_attr( $icon_flickr ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_flickr')); ?>"><?php esc_html_e( 'Link flickr:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_flickr') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_flickr') ); ?>" type="text" value="<?php echo esc_attr( $link_flickr ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_linkedin')); ?>"><?php esc_html_e( 'Icon linkedin:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_linkedin') ); ?>" type="text" value="<?php echo esc_attr( $icon_linkedin ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_linkedin')); ?>"><?php esc_html_e( 'Link linkedin:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_linkedin') ); ?>" type="text" value="<?php echo esc_attr( $link_linkedin ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_vimeo')); ?>"><?php esc_html_e( 'Icon vimeo:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_vimeo') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_vimeo') ); ?>" type="text" value="<?php echo esc_attr( $icon_vimeo ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_vimeo')); ?>"><?php esc_html_e( 'Link vimeo:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_vimeo') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_vimeo') ); ?>" type="text" value="<?php echo esc_attr( $link_vimeo ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_pinterest')); ?>"><?php esc_html_e( 'Icon pinterest:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_pinterest') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_pinterest') ); ?>" type="text" value="<?php echo esc_attr( $icon_pinterest ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_pinterest')); ?>"><?php esc_html_e( 'Link pinterest:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_pinterest') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_pinterest') ); ?>" type="text" value="<?php echo esc_attr( $link_pinterest ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_github')); ?>"><?php esc_html_e( 'Icon github:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_github') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_github') ); ?>" type="text" value="<?php echo esc_attr( $icon_github ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_github')); ?>"><?php esc_html_e( 'Link github:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_github') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_github') ); ?>" type="text" value="<?php echo esc_attr( $link_github ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_bloglovin')); ?>"><?php esc_html_e( 'Icon bloglovin:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_bloglovin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_bloglovin') ); ?>" type="text" value="<?php echo esc_attr( $icon_bloglovin ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_bloglovin')); ?>"><?php esc_html_e( 'Link bloglovin:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_bloglovin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_bloglovin') ); ?>" type="text" value="<?php echo esc_attr( $link_bloglovin ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_instagram')); ?>"><?php esc_html_e( 'Icon instagram:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_instagram') ); ?>" type="text" value="<?php echo esc_attr( $icon_instagram ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_instagram')); ?>"><?php esc_html_e( 'Link instagram:', 'whole' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_instagram') ); ?>" type="text" value="<?php echo esc_attr( $link_instagram ); ?>" /></p>

         
         <p><label for="<?php echo esc_attr($this->get_field_id('extra_class')); ?>">Extra Class:</label>
         <input class="widefat" id="<?php echo esc_attr($this->get_field_id('extra_class')); ?>" name="<?php echo esc_attr($this->get_field_name('extra_class')); ?>" value="<?php echo ''.$extra_class; ?>" /></p>
         
    <?php
    }

}

/**
* Class CS_Social_Widget
*/

function register_social_widget() {
    register_widget('CS_Social_Widget');
}

add_action('widgets_init', 'register_social_widget');
?>