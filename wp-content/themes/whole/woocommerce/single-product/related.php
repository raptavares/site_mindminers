<?php
/**
 * Related Products
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     9.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce_loop;

$posts_per_page = 5;
$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$related = wc_get_related_products( $product->get_id() );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters('woocommerce_related_products_args', array(
    'post_type'             => 'product',
    'ignore_sticky_posts'   => 1,
    'no_found_rows'         => 1,
    'posts_per_page'        => $posts_per_page,
    'orderby'               => $orderby,
    'post__in'              => $related,
    'post__not_in'          => array($product->get_id())
) );

$products = new WP_Query( $args );

//$woocommerce_loop['columns']    = $columns;
$woocommerce_loop['columns']    = 4;

ob_start();
$date = time() . '_' . uniqid(true);

wp_register_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', 'jquery', '1.0', TRUE);
wp_register_script('owl-carousel-cms', get_template_directory_uri() . '/assets/js/owl.carousel.cms.js', 'owl-carousel', '1.0', TRUE);
wp_enqueue_style('owl-carousel-cms', get_template_directory_uri() . '/assets/css/owl.carousel.css');
wp_enqueue_script('owl-carousel');
$cms_carousel['related-product-carousel'] = array(
    'margin' => 30,
    'loop' => 'true',
    'mouseDrag' => 'true',
    'nav' => 'false',
    'dots' => 'false',
    'autoplay' => 'false',
    'autoplayTimeout' => 2000,
    'smartSpeed' => 1200,
    'autoplayHoverPause' => 'false',
    'navText' => array('<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'),
    'responsive' => array(
        0 => array(
        "items" => 1,
        ),
        768 => array(
            "items" => 2,
            ),
        992 => array(
            "items" => 3,
            ),
        1200 => array(
            "items" => 3,
            )
        )
);
wp_localize_script('owl-carousel-cms', "cmscarousel", $cms_carousel);
wp_enqueue_script('owl-carousel-cms');

$products = new WP_Query($args);

if ($products->have_posts()) :
    ?>
    <div class="woo-nav-links">
        <ul>
            <?php
                previous_post_link( '<li class="nav-previous">%link</li>', '<span class="page-numbers"><i class="fa fa-angle-left"></i></span>' );
                next_post_link(     '<li class="nav-next">%link</li>',     '<span class="page-numbers"><i class="fa fa-angle-right"></i></span>' );
            ?>
        </ul>
    </div><!-- .nav-links -->
    <div id="cms-related-product-<?php echo esc_attr($date); ?>" class="cms-related-products-wrapper clearfix">
        <div class="cms-related-heading">
            <h3 class="wg-title">
                <span><?php esc_html_e('Related Products', 'whole'); ?></span>
                <span class="line1"></span>
                <span class="line2"></span>
                <span class="line3"></span>
            </h3>
        </div>
        <div class="products">
            <div id="related-product-carousel" class="cms-carousel" data-padding='0'>
                <?php while ($products->have_posts()) : $products->the_post(); ?>
                    <?php
                    global $product;

                    // Ensure visibility
                    if (!$product || !$product->is_visible())
                        return;
                    ?>
                    <div <?php post_class('pb-40 cms-product text-center'); ?>>

                        <div class="cshere-woo-item-wrap" onclick="">
                            <div class="cshero-woo-image">
                            <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                        /**
                                         * woocommerce_before_shop_loop_item_title hook
                                         *
                                         * @hooked woocommerce_show_product_loop_sale_flash - 10
                                         * @hooked woocommerce_template_loop_product_thumbnail - 10
                                         */
                                        do_action( 'woocommerce_before_shop_loop_item_title' );
                                    ?>
                                </a>

                                <?php
                                    /**
                                     * woocommerce_after_shop_loop_item hook
                                     *
                                     * @hooked woocommerce_template_loop_add_to_cart - 10
                                     */
                                    do_action( 'woocommerce_after_shop_loop_item' ); 
                                ?>
                            </div>
                            <div class="cshero-woo-meta">
                                <div class="cshero-product-category">
                                    <?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span>' . _n( '', '', count( $product->get_category_ids() ), 'whole' ) . ' ', '</span>' ); ?>
                                </div>
                                <div class="cshero-product-title">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                </div>
                                <?php
                                    /**
                                     * woocommerce_after_shop_loop_item_title hook
                                     *
                                     * @hooked woocommerce_template_loop_rating - 5
                                     * @hooked woocommerce_template_loop_price - 10
                                     */
                                    do_action( 'woocommerce_after_shop_loop_item_title' );
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; // end of the loop.   ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
wp_reset_postdata();

