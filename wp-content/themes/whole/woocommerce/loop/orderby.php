<?php
/**
 * Show options for ordering
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $wp_query;

if ( ! woocommerce_products_will_display() )
	return;

?>
<div class="cms-product-meta clearfix">
	<div class="woocommerce-result-count">
		<?php
		$paged    = max( 1, $wp_query->get( 'paged' ) );
		$per_page = $wp_query->get( 'posts_per_page' );
		$total    = $wp_query->found_posts;
		$first    = ( $per_page * $paged ) - $per_page + 1;
		$last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

		if ( 1 == $total ) {
			_e( 'Showing the single result', 'whole' );
		} elseif ( $total <= $per_page || -1 == $per_page ) {
			printf( esc_html__( 'Showing all %d results', 'whole' ), $total );
		} else {
			printf( _x( 'Showing %1$d: %2$d of <span class="color-primary">%3$d</span> product', '%1$d = first, %2$d = last, %3$d = total', 'whole' ), $first, $last, $total );
		}
		?>
	</div>
	<div class="form-effect right">
		<form class="woocommerce-ordering" method="get">
			<span class="arrow-down">
				<i class="fa fa-angle-down"></i>
			</span>
			<select name="orderby" class="orderby">
				<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
					<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
				<?php endforeach; ?>
			</select>
			<?php
				// Keep query string vars intact
				foreach ( $_GET as $key => $val ) {
					if ( 'orderby' === $key || 'submit' === $key ) {
						continue;
					}
					if ( is_array( $val ) ) {
						foreach( $val as $innerVal ) {
							echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
						}
					} else {
						echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
					}
				}
			?>
		</form>
	</div>
</div>

