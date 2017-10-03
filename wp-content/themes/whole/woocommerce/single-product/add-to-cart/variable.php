<?php
/**
 * Variable product add to cart
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 20.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $post;
?>

<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo ''.$post->ID; ?>" data-product_variations="<?php echo esc_attr( json_encode( $available_variations ) ) ?>">
	<?php if ( ! empty( $available_variations ) ) : ?>
		<div class="variations clearfix" cellspacing="0">
				<?php $loop = 0; foreach ( $attributes as $name => $options ) : $loop++; ?>
						<div class="variations-item clearfix">
							<div class="label"><label for="<?php echo sanitize_title( $name ); ?>"><?php echo wc_attribute_label( $name ); ?></label></div>
							<div class="value clearfix"><span class="arrow-down"><i class="fa fa-angle-down"></i>
</span><select id="<?php echo esc_attr( sanitize_title( $name ) ); ?>" name="attribute_<?php echo sanitize_title( $name ); ?>" data-attribute_name="attribute_<?php echo sanitize_title( $name ); ?>">
							
								<?php
									if ( is_array( $options ) ) {

										if ( isset( $_REQUEST[ 'attribute_' . sanitize_title( $name ) ] ) ) {
											$selected_value = $_REQUEST[ 'attribute_' . sanitize_title( $name ) ];
										} elseif ( isset( $selected_attributes[ sanitize_title( $name ) ] ) ) {
											$selected_value = $selected_attributes[ sanitize_title( $name ) ];
										} else {
											$selected_value = '';
										}

										// Get terms if this is a taxonomy - ordered
										if ( taxonomy_exists( $name ) ) {

											$terms = wc_get_product_terms( $post->ID, $name, array( 'fields' => 'all' ) );

											foreach ( $terms as $term ) {
												if ( ! in_array( $term->slug, $options ) ) {
													continue;
												}
												echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $term->slug ), false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name ) . '</option>';
											}

										} else {

											foreach ( $options as $option ) {
												echo '<option value="' . esc_attr( sanitize_title( $option ) ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $option ), false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
											}

										}
									}
								?>
							</select> <?php
								if ( sizeof( $attributes ) === $loop ) {
									echo '<a class="reset_variations" href="#reset">' . esc_html__( 'Clear selection', 'whole' ) . '</a>';
								}
							?></div>
						</div>
		        <?php endforeach;?>
		        <div class="variations-item-quanity">
		        <label for="quanity"><?php echo wc_attribute_label( 'QUANITY' ); ?></label>
			        <?php woocommerce_quantity_input( array(
						'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
					) ); ?>
				</div>
		</div>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="single_variation_wrap" style="display:none;">
			<?php do_action( 'woocommerce_before_single_variation' ); ?>

			<div class="single_variation"></div>

			<div class="variations_button">
				<button type="submit" class="single_add_to_cart_button btn btn-primary-alt size-default"><?php echo ''.$product->single_add_to_cart_text(); ?></button>
                <a class="add-whish-list" href="<?php the_permalink(); ?><?php echo (strpos(get_the_permalink(), '?') > 0) ? '&' : '?' ; ?>wl_pid=<?php the_ID(); ?>"><i class="pe-7s-like"></i><?php echo wc_attribute_label( 'ADD TO WISHLIST' ); ?></a>
			</div>

			<input type="hidden" name="add-to-cart" value="<?php echo ''.$product->get_id(); ?>" />
			<input type="hidden" name="product_id" value="<?php echo esc_attr( $post->ID ); ?>" />
			<input type="hidden" name="variation_id" class="variation_id" value="" />

			<?php do_action( 'woocommerce_after_single_variation' ); ?>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<?php else : ?>

		<p class="stock out-of-stock"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'whole' ); ?></p>

	<?php endif; ?>

</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
