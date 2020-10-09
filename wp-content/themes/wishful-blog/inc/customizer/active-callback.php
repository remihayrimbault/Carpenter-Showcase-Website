<?php
/**
 * Active Callback Functions For Customizer Options
 *
 * @package wishful-blog
 */

/*
 *	Active Callback For Header Social Links
 */
if( ! function_exists( 'wishful_blog_is_active_header_user_icon' ) ) {

	function wishful_blog_is_active_header_user_icon( $control ) {
		if( $control->manager->get_setting( 'wishful_blog_enable_header_user_icon' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
}


/*
 *	Active Callback For Banner
 */
if( ! function_exists( 'wishful_blog_is_active_banner' ) ) {

	function wishful_blog_is_active_banner( $control ) {
		if( $control->manager->get_setting( 'wishful_blog_enable_banner' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
}


/*
 *	Active Callback For Banner Layout Two
 */
if( ! function_exists( 'wishful_blog_is_active_banner_layout_two' ) ) {

	function wishful_blog_is_active_banner_layout_two( $control ) {
		if( $control->manager->get_setting( 'wishful_blog_banner_layout' )->value() == 'banner_two' && $control->manager->get_setting( 'wishful_blog_enable_banner' )->value() == 1 ) {
			return false;
		} elseif( $control->manager->get_setting( 'wishful_blog_enable_banner' )->value() == 1 ) {
			return true;
		} else {
            return false;
        }
	}
}


/*
 *	Active Callback For Homepage Post Listing Grid
 */
if( ! function_exists( 'wishful_blog_is_active_homepage_post_listing_grid' ) ) {

	function wishful_blog_is_active_homepage_post_listing_grid( $control ) {
		if( $control->manager->get_setting( 'wishful_blog_homepage_post_layout' )->value() == 'post_layout_three' ) {
			return false;
		} else {
			return true;
		}
	}
}


/*
 *	Active Callback For Archive Post Listing Grid
 */
if( ! function_exists( 'wishful_blog_is_active_archive_post_listing_grid' ) ) {

	function wishful_blog_is_active_archive_post_listing_grid( $control ) {
		if( $control->manager->get_setting( 'wishful_blog_archive_post_layout' )->value() == 'post_layout_three' ) {
			return false;
		} else {
			return true;
		}
	}
}


/*
 *	Active Callback For Search Post Listing Grid
 */
if( ! function_exists( 'wishful_blog_is_active_search_post_listing_grid' ) ) {

	function wishful_blog_is_active_search_post_listing_grid( $control ) {
		if( $control->manager->get_setting( 'wishful_blog_search_post_layout' )->value() == 'post_layout_three' ) {
			return false;
		} else {
			return true;
		}
	}
}


/*
 *	Active Callback For Single Related Posts
 */
if( ! function_exists( 'wishful_blog_is_active_related_posts' ) ) {

	function wishful_blog_is_active_related_posts( $control ) {
		if( $control->manager->get_setting( 'wishful_blog_display_related_posts' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
}


/*
 *	Active Callback For Fallback Image
 */
if( ! function_exists( 'wishful_blog_is_active_fallback_image' ) ) {

	function wishful_blog_is_active_fallback_image( $control ) {
		if( $control->manager->get_setting( 'wishful_blog_enable_fallback_image' )->value() == 1 ) {
			return true;
		} else {
			return false;
		}
	}
}


/*
 *	Active Callback For Pagination format one
 */
if( ! function_exists( 'wishful_blog_is_active_pagination_format_one' ) ) {

	function wishful_blog_is_active_pagination_format_one( $control ) {
		if( $control->manager->get_setting( 'wishful_blog_pagination_format' )->value() == 'format-one' ) {
			return true;
		} else {
			return false;
		}
	}
}
