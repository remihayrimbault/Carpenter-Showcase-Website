<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wishful-blog
 */

get_header();

$sidebar_position = wishful_blog_single_sidebar_position();

?>
<!-- Page Content -->
<div id="content" class="<?php wishful_blog_single_content_class(); ?>">
    <!-- Container -->
    <div class="container">
        <div class="row">
            <?php
            if( $sidebar_position == 'left' && is_active_sidebar( 'wishful-blog-woocommerce-sidebar' ) ) {
                get_sidebar( 'shop' );
            }
            ?>
            <!-- Content Area -->
            <div class="<?php wishful_blog_single_container_class(); ?>">
            <?php woocommerce_content(); ?>
            </div><!-- Content Area /- -->
            <?php
            if( $sidebar_position == 'right' && is_active_sidebar( 'wishful-blog-woocommerce-sidebar' ) ) {
                get_sidebar( 'shop' );
            }
            ?>
        </div>
    </div><!-- Container /- -->
</div><!-- Page Content /- -->
<?php
get_footer();
