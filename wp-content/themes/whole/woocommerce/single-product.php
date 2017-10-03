<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<section id="primary" class="content-area ">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
                <div class="pr-single-product col-lg-9 col-md-9 col-sm-8 col-xs-12">
                	<?php
                		/**
                		 * woocommerce_before_main_content hook
                		 *
                		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                		 * @hooked woocommerce_breadcrumb - 20
                		 */
                		do_action( 'woocommerce_before_main_content' );
                	?>
                
                		<?php while ( have_posts() ) : the_post(); ?>
                
                			<?php wc_get_template_part( 'content', 'single-product' ); ?>
                
                		<?php endwhile; // end of the loop. ?>
                
                	<?php
                		/**
                		 * woocommerce_after_main_content hook
                		 *
                		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                		 */
                		do_action( 'woocommerce_after_main_content' );
                	?>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                    <?php if ( is_active_sidebar( 'woocommerce-widget-area' ) ) : ?>
                        <div id="sidebar" class="widget-area woocommerce-widget" role="complementary">
                            <?php dynamic_sidebar( 'woocommerce-widget-area' ); ?>
                        </div><!-- #secondary -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
</section>
<?php get_footer( 'shop' ); ?>
