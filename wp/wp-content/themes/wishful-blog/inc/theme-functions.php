<?php

/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'wishful_blog_fonts_url' ) ) :
    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function wishful_blog_fonts_url() {

        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        $font_options = wishful_blog_selected_fonts();

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Poppins font: on or off', 'wishful-blog')) {
            $fonts[] = 'Poppins:400,600,700,900';
        }
        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Montserrat font: on or off', 'wishful-blog')) {
            $fonts[] = 'Montserrat:400,500,700,800';
        }

        $font_options = array_unique( $font_options );

        foreach ( $font_options as $f) {

            $f_family = explode(':', $f);

            $f_family = str_replace('+', ' ', $f_family);

            $font_family = ( !empty( $f_family[1]) ) ? $f_family[1] : '';

            $fonts[] = $f_family[0].':'.$font_family;

        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), '//fonts.googleapis.com/css' );
        }
        return $fonts_url;
    }
endif;

/*
 * Function to get selected dynamic google fonts
 */
if( !function_exists( 'wishful_blog_selected_fonts' ) ) {

	function wishful_blog_selected_fonts() {

		$fonts = array();

        $site_title_font_family = get_theme_mod( 'wishful_blog_font_family_site_title_typography', 'Poppins:400,600,700,900' );

        if( !empty( $site_title_font_family ) ) {

        	$fonts[] = $site_title_font_family;
        }

        $body_font_family = get_theme_mod( 'wishful_blog_font_family_body_typography', 'Poppins:400,600,700,900' );

        if( !empty( $body_font_family ) ) {

        	$fonts[] = $body_font_family;
        }

        $post_listing_title_font_family = get_theme_mod( 'wishful_blog_font_family_post_listing_title_typography', 'Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i' );

        if( !empty( $post_listing_title_font_family ) ) {

        	$fonts[] = $post_listing_title_font_family;
        }

        $widget_title_font_family = get_theme_mod( 'wishful_blog_font_family_widget_title_typography', 'Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i' );

        if( !empty( $widget_title_font_family ) ) {

        	$fonts[] = $widget_title_font_family;
        }

        $newsletter_title_font_family = get_theme_mod( 'wishful_blog_font_family_newsletter_title_typography', 'Ubuntu:400,400i,500,500i,700,700i' );

        if( !empty( $newsletter_title_font_family ) ) {

        	$fonts[] = $newsletter_title_font_family;
        }

        $newsletter_button_font_family = get_theme_mod( 'wishful_blog_font_family_newsletter_button_typography', 'Ubuntu:400,400i,500,500i,700,700i' );

        if( !empty( $newsletter_button_font_family ) ) {

        	$fonts[] = $newsletter_button_font_family;
        }

		$fonts = array_unique( $fonts );

		return $fonts;
	}
}

/**
 * Customize Readmore Link.
 */
function post_excerpt_more( $more ) {

    if( is_admin() ) {
       return $more;
    }

  	return '...';
}
add_filter( 'excerpt_more', 'post_excerpt_more' );

/**
* Filter the except length to 20 words default.
*/
if( !function_exists( 'wishful_blog_excerpt_length' ) ) {
   /*
    * Excerpt Length
    */
   function wishful_blog_excerpt_length( $length ) {

       if( is_admin() ) {
           return $length;
       }

       $excerpt_length = get_theme_mod( 'wishful_blog_excerpt_length', 20 );

       if( absint( $excerpt_length ) > 0 ) {
           $excerpt_length = absint( $excerpt_length );
       }
       return $excerpt_length;
   }
}
add_filter( 'excerpt_length', 'wishful_blog_excerpt_length' );

/**
 * Hook for Search Form
 */
if( !function_exists( 'wishful_blog_search_form' ) ) {
    /**
     * Return custom search HTML template.
     *
     * @since 1.0.0
     * @return HTML markup.
     */
    function wishful_blog_search_form() {

        $form = '<form role="search" method="get" id="search-form" class="clearfix" action="' . esc_url( home_url( '/' ) ) . '"><input class="search-input" type="search" name="s" placeholder="' . esc_attr__( 'Enter Keyword', 'wishful-blog' ) . '" value"' . get_search_query() . '" ><input type="submit" id="submit" value="'. esc_attr__( 'Search', 'wishful-blog' ).'">
        </form>';

        return $form;
    }
}
add_filter( 'get_search_form', 'wishful_blog_search_form' );

/**
 * Fallback For Main Menu
 */
if ( !function_exists( 'wishful_blog_navigation_fallback' ) ) {
	/**
     * Return unordered list.
     *
     * @since 1.0.0
     * @return unordered list.
     */
    function wishful_blog_navigation_fallback() {
        ?>
        <ul id="primary-menu" class="primary-menu">
            <?php
            if( current_user_can( 'edit_theme_options' ) ) {
                ?>
                <li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Add Menu', 'wishful-blog' ); ?></a></li>
                <?php
            } else {
                wp_list_pages( array( 'title_li' => '', 'depth' => 3 ) );
            }
            ?>
        </ul>
        <?php
    }
}

if ( ! function_exists( 'wishful_blog_is_woocommerce_page' ) ) :
    /**
     * Check WooCommerce WooCommerce pages
     *
     * @return bol.
     */
    function wishful_blog_is_woocommerce_page() {

        if ( !class_exists( 'WooCommerce' ) ) {
            return false;
        }

        if( is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url() ) {
            return true;
        }

        return false;
    }
endif;

if ( ! function_exists( 'wishful_blog_fallback_image' ) ) :
	/**
	 * Return the fallback image
	 */
	function wishful_blog_fallback_image( $format, $image_size ) {

        $enable_fallback_image = get_theme_mod( 'wishful_blog_enable_fallback_image', true );

        $is_woocommerce_page = wishful_blog_is_woocommerce_page();

        if( $enable_fallback_image && $is_woocommerce_page == false ) {

            $upload_fallback_image = get_theme_mod( 'wishful_blog_fallback_image', '' );

            if( !empty( $upload_fallback_image ) ) {

                if( $image_size == 'one' || $image_size == 'two' || $image_size == 'three' || $image_size == 'four' || $image_size == 'five' ) {

                $image_size = 'wishful-blog-thumbnail-' . $image_size;

                } else {

                    $image_size = apply_filters( 'pro_fallback_image_size', $image_size );
                }

                if( $format == 'img' ) {

                    $image_id = attachment_url_to_postid( $upload_fallback_image );

                    if( !empty( $image_id ) ) {

                        echo wp_get_attachment_image( $image_id , $image_size , array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
                    }

                } elseif( $format == 'url' ) {

                    $image_id = attachment_url_to_postid( $upload_fallback_image );

                    $image_src = wp_get_attachment_image_src( $image_id, $image_size );

                    return esc_url( $image_src[0] );

                } else {

                    return;
                }

            } else {

                if( $image_size == 'one' || $image_size == 'two' || $image_size == 'three' || $image_size == 'four' || $image_size == 'five' ) {

                    $custom_fallack_image = get_template_directory_uri() . '/wishfulthemes/assets/images/fallback-image-' . $image_size . '.jpg';

                } else {

                    $custom_fallack_image = apply_filters( 'pro_custom_fallback_image', $image_size );
                }

                if( $format == 'img' ) {

                    ?>
                    <img src="<?php echo esc_url( $custom_fallack_image ); ?>" alt="fallback-image">
                    <?php

                } elseif( $format == 'url' ) {

                    return esc_url( $custom_fallack_image );

                } else {

                    return;
                }
            }
        }
    }
endif;

if( !function_exists( 'wishful_blog_upsell_array' ) ) :
	/*
	 * Function to get upsell array
	 */
	function wishful_blog_upsell_array() {

		$upsell = array(
            'title'    => esc_html__( 'Wishful Blog Pro', 'wishful-blog' ),
            'pro_text' => esc_html__( 'Buy Now', 'wishful-blog' ),
            'pro_url'  => 'https://www.wishfulthemes.com/themes/wishful-blog-pro/',
            'priority' => 1,
        );

        if( has_filter( 'pro_upsell_array' ) ) {

            $upsell = apply_filters( 'pro_upsell_array', $upsell );
        }

        return $upsell;
	}
endif;

if( !function_exists( 'wishful_blog_categories_array' ) ) :
	/*
	 * Function to get blog categories
	 */
	function wishful_blog_categories_array() {
		$taxonomy = 'category';
		$terms = get_terms( $taxonomy );
		$blog_cat = array();
        $blog_cat[0] = 'Latest Post Category ';
		foreach( $terms as $term ) {
			$blog_cat[$term->term_id] = $term->name;
		}
		return $blog_cat;
	}
endif;

if( !function_exists( 'wishful_blog_banner_layouts_array' ) ) :
	/*
	 * Function to get banner layouts
	 */
	function wishful_blog_banner_layouts_array() {

		$banner_layouts = array(
            'banner_one'   => esc_html__( 'Banner Layout One', 'wishful-blog' ),
            'banner_two'   => esc_html__( 'Banner Layout Two', 'wishful-blog' ),
        );

        if( has_filter( 'pro_banner_layouts_array' ) ) {

            $banner_layouts = apply_filters( 'pro_banner_layouts_array', $banner_layouts );
        }

        return $banner_layouts;
	}
endif;

if( !function_exists( 'wishful_blog_banner_posts_no_array' ) ) :
	/*
	 * Function to get banner posts no array
	 */
	function wishful_blog_banner_posts_no_array() {

		$banner_posts_no = array(
            'min'  => 2,
            'max'  => 3,
        );

        if( has_filter( 'pro_banner_posts_no_array' ) ) {

            $banner_posts_no = apply_filters( 'pro_banner_posts_no_array', $banner_posts_no );
        }

        return $banner_posts_no;
	}
endif;

if( !function_exists( 'wishful_blog_banner_posts_no_description' ) ) :
	/*
	 * Function to get banner posts no description array
	 */
	function wishful_blog_banner_posts_no_description() {

		$banner_posts_no_description = esc_html__( 'Maximum 3 items and minimum 2 items can be set.', 'wishful-blog' );

        if( has_filter( 'pro_banner_posts_no_description' ) ) {

            $banner_posts_no_description = apply_filters( 'pro_banner_posts_no_description', $banner_posts_no_description );
        }

        return $banner_posts_no_description;
	}
endif;

if( !function_exists( 'wishful_blog_fonts_array' ) ) :
	/*
	 * Function to get google fonts
	 */
	function wishful_blog_fonts_array() {

		$fonts = array(
            'Concert+One' => 'Concert One',
            'Lato:400,400i,700,700i' => 'Lato',
            'Lobster' => 'Lobster',
            'Lora:400,400i,700,700i' => 'Lora',
            'Milonga' => 'Milonga',
            'Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i' => 'Montserrat',
            'Mukta:400,500,600,700,800' => 'Mukta',
            'Oswald:400,500,600,700' => 'Oswald',
            'Oxygen:400,700' => 'Oxygen',
            'Playfair+Display:400,400i,700,700i' => 'Playfair Display',
            'Poppins:400,600,700,900' => 'Poppins',
            'PT+Sans:400,400i,700,700i' => 'PT Sans',
            'Raleway:400,400i,500,500i,600,600i,700,700i,800,800i' => 'Raleway',
            'Roboto:400,400i,500,500i,700,700i' => 'Roboto',
            'Ubuntu:400,400i,500,500i,700,700i' => 'Ubuntu'
        );

        if( has_filter( 'pro_fonts_family_array' ) ) {

            $fonts = apply_filters( 'pro_fonts_family_array', $fonts );
        }

        return $fonts;
	}
endif;

if( !function_exists( 'wishful_blog_font_weight_array' ) ) :
	/*
	 * Function to get font weigth
	 */
	function wishful_blog_font_weight_array() {

		$font_weight = array(
            '400_w'    => '400',
            '500_w'    => '500',
            '600_w'    => '600',
            '700_w'    => '700',
        );

        if( has_filter( 'pro_font_weight_array' ) ) {

            $font_weight = apply_filters( 'pro_font_weight_array', $font_weight );
        }

        return $font_weight;
	}
endif;

if( !function_exists( 'wishful_blog_posts_type_array' ) ) :
	/*
	 * Function to get posts type
	 */
	function wishful_blog_posts_type_array() {

		$posts_type = array(
            'recent_posts'   => esc_html__( 'Recent Posts', 'wishful-blog' ),
            'popular_posts'  => esc_html__( 'Popular Posts', 'wishful-blog' )
        );

        if( has_filter( 'pro_post_type_array' ) ) {

            $posts_type = apply_filters( 'pro_post_type_array', $posts_type );
        }

        return $posts_type;
	}
endif;

if( !function_exists( 'wishful_blog_post_layouts_array' ) ) :
	/*
	 * Function to get post layouts
	 */
	function wishful_blog_post_layouts_array() {

		$post_layouts = array(
            'post_layout_three'   => esc_html__( 'List Layout', 'wishful-blog' ),
            'post_layout_five'    => esc_html__( 'Grid : 2 Column', 'wishful-blog' ),
        );

        if( has_filter( 'pro_post_layouts_array' ) ) {

            $post_layouts = apply_filters( 'pro_post_layouts_array', $post_layouts );
        }

        return $post_layouts;
	}
endif;

if( !function_exists( 'wishful_blog_post_styles_array' ) ) :
	/*
	 * Function to get post styles
	 */
	function wishful_blog_post_styles_array() {

		$post_styles = array(
            'style_one'    => esc_html__( 'Style One', 'wishful-blog' ),
            'style_two'    => esc_html__( 'Style Two', 'wishful-blog' ),
        );

        if( has_filter( 'pro_post_styles_array' ) ) {

            $post_styles = apply_filters( 'pro_post_styles_array', $post_styles );
        }

        return $post_styles;
	}
endif;

if( !function_exists( 'wishful_blog_sidebar_position_array' ) ) :
	/*
	 * Function to get sidebar position
	 */
	function wishful_blog_sidebar_position_array() {

		$sidebar_position = array(
            'none'    => esc_html__( 'Fullwidth', 'wishful-blog' ),
            'right'   => esc_html__( 'Right', 'wishful-blog' ),
            'left'    => esc_html__( 'Left', 'wishful-blog' ),
        );

        if( has_filter( 'pro_sidebar_position_array' ) ) {

            $sidebar_position = apply_filters( 'pro_sidebar_position_array', $sidebar_position );
        }

        return $sidebar_position;
	}
endif;

if( !function_exists( 'wishful_blog_display_metas_array' ) ) :
	/*
	 * Function to get display metas
	 */
	function wishful_blog_display_metas_array() {

		$display_metas = array(
            'category'  => esc_html__( 'Display Category', 'wishful-blog' ),
            'comment'   => esc_html__( 'Display Comment No.', 'wishful-blog' ),
        );

        if( has_filter( 'pro_display_metas_array' ) ) {

            $display_metas = apply_filters( 'pro_display_metas_array', $display_metas );
        }

        return $display_metas;
	}
endif;

if( !function_exists( 'wishful_blog_footer_color_mode_array' ) ) :
	/*
	 * Function to get footer color mode
	 */
	function wishful_blog_footer_color_mode_array() {

		$footer_color_mode = array(
            'footer-light'  => esc_html__( 'Light Mode', 'wishful-blog' ),
            'footer-dark'  => esc_html__( 'Dark Mode', 'wishful-blog' ),
        );

        if( has_filter( 'pro_footer_color_mode_array' ) ) {

            $footer_color_mode = apply_filters( 'pro_footer_color_mode_array', $footer_color_mode );
        }

        return $footer_color_mode;
	}
endif;

if( !function_exists( 'wishful_blog_pagination_format_array' ) ) :
	/*
	 * Function to get pagination format
	 */
	function wishful_blog_pagination_format_array() {

		$pagination_format = array(
            'format-one'  => esc_html__( 'Standard Format', 'wishful-blog' ),
            'format-two'  => esc_html__( 'Number Format', 'wishful-blog' ),
        );

        if( has_filter( 'pro_pagination_format_array' ) ) {

            $pagination_format = apply_filters( 'pro_pagination_format_array', $pagination_format );
        }

        return $pagination_format;
	}
endif;

if( !function_exists( 'wishful_blog_homepage_widget_styles_array' ) ) :
	/*
	 * Function to get homepage widget post styles
	 */
	function wishful_blog_homepage_widget_styles_array() {

		$post_styles = array(
            'style_one'    => esc_html__( 'Style One', 'wishful-blog' ),
            'style_two'    => esc_html__( 'Style Two', 'wishful-blog' ),
        );

        if( has_filter( 'pro_homepage_widget_styles_array' ) ) {

            $post_styles = apply_filters( 'pro_homepage_widget_styles_array', $post_styles );
        }

        return $post_styles;
	}
endif;

if( !function_exists( 'wishful_blog_dynamic_font_weight' ) ) :
	/*
	 * Function to get font weight
	 */
	function wishful_blog_dynamic_font_weight( $font_value ) {

		$font_weight = '';

        if( !empty( $font_value ) ) {

            if( $font_value == '400_w' ) {

                $font_weight = '400';

            } elseif( $font_value == '500_w' ) {

                $font_weight = '500';

            } elseif( $font_value == '600_w' ) {

                $font_weight = '600';

            } elseif( $font_value == '700_w' ) {

                $font_weight = '700';

            } elseif( $font_value == '800_w' ) {

                $font_weight = '800';

            } else {

                $font_weight = '900';
            }
        }

        return $font_weight;
	}
endif;
