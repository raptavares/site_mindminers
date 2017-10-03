<?php
/**
 * @name : Default Header
 * @package : CMSSuperHeroes
 * @author : Fox
 */
global $opt_theme_options;

?>
<div id="cshero-header-inner" class="header-6 header-top <?php echo whole_header_class_wrap(); ?>">
    <div id="cshero-header-wrapper">

        <div id="cshero-header-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 text-center-sm text-center-xs">
                        <ul class="contact-top">
                            <?php if(!empty($opt_theme_options['top_bar_address'])) { ?>
                                <li class="top-address"><i class="fa fa-map-marker"></i><?php echo wp_kses_post($opt_theme_options['top_bar_address']); ?></li>
                            <?php } ?>
                            <?php if(!empty($opt_theme_options['top_bar_email'])) { ?>
                                <li class="top-mail"><a href="mailto:<?php echo wp_kses_post($opt_theme_options['top_bar_email']); ?>"><i class="fa fa-envelope"></i><?php echo wp_kses_post($opt_theme_options['top_bar_email']); ?></a></li>
                            <?php } ?>
                            <?php if(!empty($opt_theme_options['top_bar_phone'])) { ?>
                                <li class="top-phone"><a href="tel:<?php echo wp_kses_post($opt_theme_options['top_bar_phone']); ?>"><i class="fa fa-phone"></i><?php echo wp_kses_post($opt_theme_options['top_bar_phone']); ?></a></li>
                            <?php } ?>
                        </ul>
                        
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 text-center-sm text-center-xs text-right">
                        <?php whole_top_social(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="cshero-header" class="<?php whole_header_class('cshero-main-header'); ?>">
            <div class="container">
                <div class="row">
                    <div id="cshero-header-logo" class="col-xs-12 col-sm-5 col-md-3 col-lg-3">
                        <?php whole_header_logo_dark(); ?>
                    </div><!-- #site-logo -->
                    <div id="cshero-header-navigation" class="effect-line col-xs-12 col-sm-7 col-md-9 col-lg-9">
                        <div class="cshero-header-navigation-inner clearfix">
                            <div id="cshero-header-navigation-primary" class="cshero-header-navigation">
                                <div class="cshero-navigation-right hidden-xs hidden-sm">
                                    <?php if ($opt_theme_options['show_search_icon']) { ?>
                                        <div class="h-search-wrapper h-icon">
                                            <i class="search open-search fa fa-search"></i>
                                        </div>
                                    <?php } ?>

                                    <?php if ($opt_theme_options['show_cart_icon']) { ?>
                                        <div class="h-cart-wrapper h-icon">
                                            <span class="icon-cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <?php if(class_exists('Woocommerce')){ ?>
                                                    <span class="couter_items"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'whole' ), WC()->cart->cart_contents_count ); ?></span>
                                                <?php } ?>
                                            </span>
                                            <?php if ( class_exists( 'WC_Widget_Cart' ) ): ?>
                                                <div class="widget_shopping_cart">
                                                    <div class="widget_shopping_cart_content">
                                                        <?php woocommerce_mini_cart(); ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if ($opt_theme_options['show_hidden_sidebar']) { ?>
                                        <div class="h-hidden-sidebar h-icon">
                                            <span class="h-button-hide"><span></span></span>
                                        </div>
                                    <?php } ?>
                                </div>

                                <nav id="site-navigation" class="main-navigation">
                                    <?php whole_header_navigation_primary(); ?>
                                </nav><!-- #site-navigation -->
                            </div>
                        </div>
                    </div>
                    <div id="cshero-menu-mobile">
                        <i class="open-menu lnr lnr-menu"></i>
                        <?php if ($opt_theme_options['show_search_icon']) { ?>
                            <i class="open-search lnr lnr-magnifier"></i>
                        <?php } ?>
                        <?php if ($opt_theme_options['show_cart_icon']) { ?>
                            <?php if(class_exists('Woocommerce')){ ?>
                                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                                    <i class="open-cart lnr lnr-cart">
                                        <cite class="couter_items"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'whole' ), WC()->cart->cart_contents_count ); ?></cite> 
                                    </i>
                                </a>
                            <?php } ?>
                        <?php } ?>
                    </div><!-- #menu-mobile -->
                </div>
            </div>
        </div>

    </div>
</div>