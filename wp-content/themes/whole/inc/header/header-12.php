<?php
/**
 * @name : Default Header
 * @package : CMSSuperHeroes
 * @author : Fox
 */
global $opt_theme_options;

?>
<div id="cshero-header-left">
    <div id="cshero-header-left-wrapper">
        <div id="cshero-header">
            <div id="cshero-header-logo">
                <?php whole_header_logo_dark(); ?>
            </div><!-- #site-logo -->
            <div id="cshero-header-left-navigation">
                <div class="cshero-header-left-navigation-inner clearfix">
                    <?php whole_menu_sidebar(); ?>
                </div>
            </div>
            <div id="cshero-header-social">
                <?php whole_top_social(); ?>
                <div class="cms-copyright">
                    <?php if(!empty($opt_theme_options['cms_copyright'])) { 
                        echo wp_kses_post($opt_theme_options['cms_copyright']);
                    } else {
                        echo '© 2017 Whole';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="cshero-menu-mobile">
    <i class="open-menu-sidebar lnr lnr-menu"></i>
    <?php if ($opt_theme_options['show_search_icon']) { ?>
        <i class="open-search lnr lnr-magnifier"></i>
    <?php } ?>
</div><!-- #menu-mobile -->