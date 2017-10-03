<?php
/**
 * @name : Default Header
 * @package : CMSSuperHeroes
 * @author : Fox
 */
global $opt_theme_options;

?>
<div id="cshero-header-inner" class="header-5 no-header-top <?php echo whole_header_class_wrap(); ?>">
    <div id="cshero-header-wrapper">
        <div id="cshero-header" class="<?php whole_header_class('cshero-main-header'); ?>">
            <div class="container">
                <div class="row">
                    <div id="cshero-header-logo" class="col-xs-12 col-sm-5 col-md-3 col-lg-3">
                        <?php whole_header_logo_dark(); ?>
                    </div><!-- #site-logo -->
                    <div id="cshero-header-navigation" class="effect-line col-xs-12 col-sm-7 col-md-9 col-lg-9">
                        <div class="cshero-header-navigation-inner clearfix">
                            <div id="cshero-header-navigation-primary" class="cshero-header-navigation">
                                <div class="cshero-navigation-right">
                                    <div class="h-nav-menu h-icon">
                                        <span class="h-button-menu open-menu-popup"><span></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="cshero-menu-mobile">
                        <i class="open-menu-popup lnr lnr-menu"></i>
                    </div><!-- #menu-mobile -->
                </div>
            </div>
        </div>
    </div>
</div>