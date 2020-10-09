<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wishful-blog
 */

get_header();

    wishful_blog_banner_template();

    if( is_active_sidebar( 'wishful-blog-homepage' ) ) {
        dynamic_sidebar( 'wishful-blog-homepage' );
    }

    wishful_blog_post_layout_template();

    /*
    * Hook for active pro homepage bottom widget area - 10
    */
    do_action( 'is_active_pro_homepage_bottom_widget_area' );

get_footer();
