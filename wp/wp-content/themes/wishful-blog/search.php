<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wishful-blog
 */

get_header();

/*
* Hook for active pro search top widget area - 10
*/
do_action( 'is_active_pro_search_top_widget_area' );

$search_enable_search_title = get_theme_mod( 'wishful_blog_search_enable_search_title', 1 );

if( $search_enable_search_title == 1 ) {

    ?>
    <div class="container">
        <div class="block-title container-fluid search-block">
            <h1>
                <?php
                /* translators: %s: search query. */
                printf( esc_html__( 'Search Results For : %s', 'wishful-blog' ), '<span class="search-text-transform">' . get_search_query() . '</span>' );
                ?>
            </h1>
        </div><!-- .blog-title -->
    </div><!-- container -->
<?php

}

wishful_blog_post_layout_template();

get_footer();
