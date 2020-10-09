<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wishful-blog
 */

if ( ! is_active_sidebar( 'wishful-blog-woocommerce-sidebar' ) ) {
	return;
}
?>

<!-- Widget Area -->
<div class="col-lg-4 col-md-6 col-12 widget-area">
    <?php
    dynamic_sidebar( 'wishful-blog-woocommerce-sidebar' );
    ?>
</div><!-- Widget Area /- -->
