<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wishful-blog
 */

if ( ! is_active_sidebar( 'wishful-blog-sidebar' ) ) {
	return;
}

$sidebar_position = $sticky_class = '';

$sticky_class = apply_filters( 'pro_blog_sidebar_sticky_class', $sidebar_position );
?>

<!-- Widget Area -->
<div class="col-lg-4 col-md-6 col-12 widget-area<?php echo esc_attr( $sticky_class ); ?>">
    <?php
    dynamic_sidebar( 'wishful-blog-sidebar' );
    ?>
</div><!-- Widget Area /- -->
