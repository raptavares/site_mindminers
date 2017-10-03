<?php
/**
 * @name : Default Header
 * @package : CMSSuperHeroes
 * @author : Fox
 */
global $opt_theme_options;
?>
<footer id="colophon" class="site-footer cms-footer2">
    <div id="cms-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="cms-footer-bottom-item1 text-center-xs col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php if(!empty($opt_theme_options['cms_copyright'])) { 
                        echo wp_kses_post($opt_theme_options['cms_copyright']);
                    } else {
                        echo '© 2017 Whole, With Love by <a target="_blank" href="http://cmssuperheroes.com/">CMSSuperHeroes & 7oroof</a>';
                    } ?>
                </div>
                <div class="cms-footer-bottom-item2 text-right pt-xs-10 text-center-xs col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php dynamic_sidebar( 'footer-bottom' ); ?>
                </div>
            </div>
        </div>
    </div>
</footer><!-- .site-footer -->