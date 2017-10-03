<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<div class="cshero-product-meta">
	<span class="share-label"><?php esc_html_e('Share product: ', 'whole'); ?></span>
	<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><span class="share-box"><i class="fa fa-facebook"></i></span></a>
	<a target="_blank" href="https://twitter.com/home?status=<?php esc_html_e('Check out this article', 'whole');?>:%20<?php the_title();?>%20-%20<?php the_permalink();?>"><span class="share-box"><i class="fa fa-twitter"></i></span></a>
	<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><span class="share-box"><i class="fa fa-google-plus"></i></span></a>
	<a target="_blank" href="https://pinterest.com/pin/create/button/??u=<?php the_permalink();?>"><span class="share-box"><i class="fa fa-pinterest"></i></span></a>		
</div>
