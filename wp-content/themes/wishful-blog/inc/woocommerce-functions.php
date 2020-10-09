<?php

/**
 * Column per row
 */

add_filter( 'loop_shop_columns', 'wishful_blog_loop_columns', 999 );

/**
 * Funtion for woocommerce products columns
 */
if ( !function_exists( 'wishful_blog_loop_columns' ) ) {

	function wishful_blog_loop_columns() {

		return 3; // 3 products per row
	}
}

add_filter('add_to_cart_fragments', 'wishful_blog_header_add_to_cart');

function wishful_blog_header_add_to_cart( $fragments ) {

	global $woocommerce;

	ob_start();

	?>
	<span class="cart-contents">
	    <a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php _e('View Cart', 'wishful-blog'); ?>" class="header-cart">
            <i class="fa fa-shopping-cart"></i>
            <strong>
               <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'wishful-blog'), $woocommerce->cart->cart_contents_count);?>
            </strong>
            <?php echo $woocommerce->cart->get_cart_total(); ?>
        </a>
	</span>
	<?php

	$fragments['span.cart-contents'] = ob_get_clean();

	return $fragments;

}
