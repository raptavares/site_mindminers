<?php

/* Ajax update cart total number */
add_filter( 'woocommerce_add_to_cart_fragments', 'whole_woocommerce_header_add_to_cart_fragment' );
function whole_woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<span class="couter_items"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, "whole" ), WC()->cart->cart_contents_count ); ?></span>
	<?php
	
	$fragments['span.couter_items'] = ob_get_clean();
	
	return $fragments;
}

/* Add Images Category */
add_action( 'woocommerce_archive_description', 'wp_experts_woocommerce_category_image', 2 );
function wp_experts_woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    echo '<img class="woo-image-categries" src="' . esc_url($image) . '" alt="" />';
		}
	}
}

/* Ajax update cart item */
add_filter('woocommerce_add_to_cart_fragments', 'whole_woo_mini_cart_item_fragment');
function whole_woo_mini_cart_item_fragment( $fragments ) {
	global $woocommerce;
    ob_start();
    ?>
    <div class="widget_shopping_cart">
        <div class="widget_shopping_cart_content">
            <?php
            	$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
            ?>
            <ul class="cart_list product_list_widget">

			<?php if ( ! WC()->cart->is_empty() ) : ?>

				<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

							$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
							$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
							<li class="dsd">
								<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
									esc_html__( 'Remove this item',  'whole' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
								?>
								<?php if ( ! $_product->is_visible() ) : ?>
									<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
								<?php else : ?>
									<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
										<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
										<?php echo esc_html($product_name); ?>
									</a>
								<?php endif; ?>	

									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
							</li>
							<?php
						}
					}
				?>

				<?php else : ?>

					<li class="empty"><?php esc_html_e( 'No products in the cart.',  'whole' ); ?></li>

				<?php endif; ?>

			</ul><!-- end product list -->
			<?php if ( ! WC()->cart->is_empty() ) : ?>

				<p class="total"><strong><?php esc_html_e( 'Subtotal',  'whole' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

				<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

				<p class="buttons">
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="button wc-forward"><?php esc_html_e( 'View Cart',  'whole' ); ?></a>
					<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button checkout wc-forward"><?php esc_html_e( 'Checkout',  'whole' ); ?></a>
				</p>

			<?php endif; ?>
        </div>
    </div>
    <?php
    $fragments['div.widget_shopping_cart'] = ob_get_clean();
    return $fragments;
}

?>
