<?php
/**
 * Extra Functions
 *
 */


/**
 * Banner Posts Query
 */
if( !function_exists( 'wishful_blog_banner_posts_query' ) ) {

    function wishful_blog_banner_posts_query() {

        $banner_category = get_theme_mod( 'wishful_blog_banner_posts_categories', '' );

        $banner_posts_type = get_theme_mod( 'wishful_blog_banner_posts_type', 'recent_posts' );

        $banner_posts_no = get_theme_mod( 'wishful_blog_banner_posts_no', 3 );

        $banner_args = array(
          'post_type'      => 'post',
        );

        if( !empty( $banner_category ) || $banner_category > 0 ) {

            $banner_args['cat'] = $banner_category;
        }

        if( has_filter( 'pro_banner_posts_types_args' ) ) {

            $banner_posts_type = apply_filters( 'pro_banner_posts_types_args', $banner_posts_type );

            $banner_args['orderby'] = $banner_posts_type;

        } else {

            if( $banner_posts_type == 'popular_posts' ) {

                $banner_args['orderby'] = 'comment_count';

            } else {

                $banner_args['orderby'] = 'date';
            }
        }

        if( !empty( $banner_posts_no ) ) {

            $banner_args['posts_per_page'] = absint( $banner_posts_no );
        }

        $banner_query = new WP_Query( $banner_args );

        return $banner_query;
    }
}
