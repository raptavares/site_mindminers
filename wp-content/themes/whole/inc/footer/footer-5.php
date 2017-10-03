<?php
/**
 * @name : Default Header
 * @package : CMSSuperHeroes
 * @author : Fox
 */
global $opt_theme_options;
?>
<footer id="colophon" class="site-footer cms-footer5">
    <div id="cms-footer-top">
        <div class="container">
            <div class="row">
               <?php dynamic_sidebar( 'footer-fixed' ); ?>
            </div>
        </div>
    </div>
    <div id="cms-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="cms-footer-bottom-item text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php if(!empty($opt_theme_options['cms_copyright'])) { 
                        echo wp_kses_post($opt_theme_options['cms_copyright']);
                    } else {
                        echo '© 2017 Whole, With Love by <a target="_blank" href="http://cmssuperheroes.com/">CMSSuperHeroes & 7oroof</a>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</footer><!-- .site-footer -->