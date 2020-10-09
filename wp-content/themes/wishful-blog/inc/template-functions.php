<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package wishful-blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wishful_blog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    if( has_header_image() ) {

        $classes[] = 'header-img';
    }

    if( get_background_image() || get_background_color() != 'ffffff'  ) {

        $classes[] = 'boxed';
    }

	// Adds a class of no-sidebar when there is no sidebar present.
    if( !is_singular() ) {

        $sidebar_position = wishful_blog_sidebar_position();

    } else {

        $sidebar_position = wishful_blog_single_sidebar_position();
    }

    if ( $sidebar_position == 'none' ) {

		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'wishful_blog_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

function wishful_blog_pingback_header() {

    if ( is_singular() && pings_open() ) {

        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }

    if( is_user_logged_in() ) {
        ?>
        <style>
            .logged-in.sticky .header-fix .site-navigation {
                padding-top: 30px;
            }
        </style>
        <?php
    }
}

add_action( 'wp_head', 'wishful_blog_pingback_header' );

/**
 * Function that defines posts pagination.
 */
if( ! function_exists( 'wishful_blog_pagination' ) ) {

    function wishful_blog_pagination() {

        $args = array();

        $pagination_format = get_theme_mod( 'wishful_blog_pagination_format', 'format-one' );

        if( $pagination_format == 'format-one' ) {

            $args['prev_next']  = true;

        } else {

            $args['prev_next']  = false;
        }

        $pagination_mid_size = get_theme_mod( 'wishful_blog_pagination_mid_size', 2 );

        if( !empty( $pagination_mid_size ) ) {

            $args['mid_size']   = absint( $pagination_mid_size );
        }

        $pagination_previous_text = get_theme_mod( 'wishful_blog_pagination_previous_text', 'Prev' );

        if( !empty( $pagination_previous_text ) ) {

            $args['prev_text']  = esc_html( $pagination_previous_text );
        }

        $pagination_next_text = get_theme_mod( 'wishful_blog_pagination_next_text', 'Next' );

        if( !empty( $pagination_next_text ) ) {

            $args['next_text']  = esc_html( $pagination_next_text );
        }

        if( has_filter( 'pro_blog_pagination_args' ) ) {

            $args = apply_filters( 'pro_blog_pagination_args', $args );
        }

        the_posts_pagination( $args );
	}
}

/**
 * Function that defines pages links.
 */
if( ! function_exists('wishful_blog_pages_links') ) {

    function wishful_blog_pages_links() {

        $pages_links_args = array(
            'before'    => '<span class="page-link">' . esc_html__( 'Pages:', 'wishful-blog' ),
            'after'     => '</span>',
            'next_or_number'   => 'next',
            'separator'    => ' | ',
            'nextpagelink'    => esc_html__( 'Next', 'wishful-blog' ),
            'previouspagelink'    => esc_html__( 'Previous', 'wishful-blog' ),
        );

        wp_link_pages( $pages_links_args );
    }
}

/**
 * Function that defines comments paginations.
 */
if( ! function_exists( 'wishful_blog_comments_navigation' ) ) {

    function wishful_blog_comments_navigation() {

        $comments_navigation_args = array(
            'prev_text'  => esc_html__( 'Older Comments', 'wishful-blog' ),
            'next_text'  => esc_html__( 'Newer Comments', 'wishful-blog' ),
            'screen_reader_text'  => esc_html__( 'Comments Pagination', 'wishful-blog' ),
        );

        the_comments_navigation( $comments_navigation_args );
    }
}

/**
 * Selects header template according to the customizer's header option
 */
if( ! function_exists( 'wishful_blog_header_template' ) ) {

    function wishful_blog_header_template() {

        $header_layout = '';

        if( has_filter( 'pro_header_layout_options' ) ) {

            $header_layout = apply_filters( 'pro_header_layout_options', $header_layout );

        } else {

            $header_layout = 'header_one';
        }

        if( $header_layout == 'header_one' ) {

            get_template_part( 'template-parts/header/header', 'one' );
        }

        $header_layout = apply_filters( 'pro_header_layout_template', $header_layout );
    }
}

/**
 * Header Social Links Template
 */
if( ! function_exists( 'wishful_blog_header_social_links_template' ) ) {

    function wishful_blog_header_social_links_template( $position ) {
        $enable_header_social_links = get_theme_mod( 'wishful_blog_enable_header_social_links', 0 );
        $enable_footer_social_links = get_theme_mod( 'wishful_blog_enable_footer_social_links', 0 );
        if( $position == 'header' ) {
            $ul_class          = "top-social";
            $facebook_class    = "fa fa-facebook";
            $twitter_class     = "fa fa-twitter";
            $instagram_class   = "fa fa-instagram";
            $pinterest_class   = "fa fa-pinterest-p";
            $youtube_class     = "fa fa-youtube";

            $facebook_title    = "";
            $twitter_title     = "";
            $instagram_title   = "";
            $pinterest_title   = "";
            $youtube_title     = "";
        }

        if( $position == 'footer' ) {
            $ul_class          = "ftr-social";
            $facebook_class    = "fa fa-facebook";
            $twitter_class     = "fa fa-twitter";
            $instagram_class   = "fa fa-instagram";
            $pinterest_class   = "fa fa-pinterest-p";
            $youtube_class     = "fa fa-youtube";

            $facebook_title    = "Facebook";
            $twitter_title     = "Twitter";
            $instagram_title   = "Instagram";
            $pinterest_title   = "Pinterest";
            $youtube_title     = "Youtube";
        }

        if( $enable_header_social_links == 1 && $position == 'header' || $enable_footer_social_links == 1 && $position == 'footer' ) {

            $facebook_link    = get_theme_mod( 'wishful_blog_facebook_link' );
            $twitter_link     = get_theme_mod( 'wishful_blog_twitter_link' );
            $pinterest_link   = get_theme_mod( 'wishful_blog_pinterest_link' );
            $instagram_link   = get_theme_mod( 'wishful_blog_instagram_link' );
            $youtube_link     = get_theme_mod( 'wishful_blog_youtube_link' );
        ?>
        <ul class="<?php echo esc_attr( $ul_class ); ?>">

            <?php if( !empty( $facebook_link ) ) { ?>
            <li><a href="<?php echo esc_url( $facebook_link ); ?>" title="Facebook"><i class="<?php echo esc_attr( $facebook_class ); ?>"></i><?php echo esc_html( $facebook_title ); ?></a></li>
            <?php } ?>

            <?php if( !empty( $twitter_link ) ) { ?>
            <li><a href="<?php echo esc_url( $twitter_link ); ?>" title="Twitter"><i class="<?php echo esc_attr( $twitter_class ); ?>"></i><?php echo esc_html( $twitter_title ); ?></a></li>
            <?php } ?>

            <?php if( !empty( $instagram_link ) ) { ?>
            <li><a href="<?php echo esc_url( $instagram_link ); ?>" title="Instagram"><i class="<?php echo esc_attr( $instagram_class ); ?>"></i><?php echo esc_html( $instagram_title ); ?></a></li>
            <?php } ?>

            <?php if( !empty( $pinterest_link ) ) { ?>
            <li><a href="<?php echo esc_url( $pinterest_link ); ?>" title="Pinterest"><i class="<?php echo esc_attr( $pinterest_class ); ?>"></i><?php echo esc_html( $pinterest_title ); ?></a></li>
            <?php } ?>

            <?php if( !empty( $youtube_link ) ) { ?>
            <li><a href="<?php echo esc_url( $youtube_link ); ?>" title="Youtube"><i class="<?php echo esc_attr( $youtube_class ); ?>"></i><?php echo esc_html( $youtube_title ); ?></a></li>
            <?php } ?>

        </ul>
        <?php
        }
	}
}

/**
 * Header Search Button Template
 */
if( ! function_exists( 'wishful_blog_header_search_button_template' ) ) {

    function wishful_blog_header_search_button_template( $display ) {

        $enable_header_search_button = get_theme_mod( 'wishful_blog_enable_header_search_button', 1 );

        if( $enable_header_search_button == 1 ) {

            if( $display == 'icon' ) {
            ?>
            <li><a href="#" data-toggle="collapse" class="search-btn collapsed" title="<?php echo esc_attr( 'Search'); ?>"><i class="fa fa-search"></i><i class=""></i></a></li>
            <?php
            }

            if( $display == 'form' ) {
            ?>
            <!-- Search Box -->
            <div class="search-box collapse" id="search-box">
                <div class="container">
                <?php get_search_form(); ?>
                <button class="search-form-close-btn"><i class="fa fa-close"></i></button>
                </div>
            </div><!-- Search Box /- -->
            <?php
            }
        }
	}
}

/**
 * Header User Icon Template
 */
if( ! function_exists( 'wishful_blog_header_user_template' ) ) {

    function wishful_blog_header_user_template() {

        $enable_header_user_icon = get_theme_mod( 'wishful_blog_enable_header_user_icon', 0 );

        if( $enable_header_user_icon == 1 ) {

            $header_user_register_text      = get_theme_mod( 'wishful_blog_header_user_register_text', esc_html__( 'Sign Up', 'wishful-blog' ) );
            $header_user_login_text         = get_theme_mod( 'wishful_blog_header_user_login_text', esc_html__( 'Log In', 'wishful-blog' ) );
            $header_user_lost_password_text = get_theme_mod( 'wishful_blog_header_user_lost_password_text', esc_html__( 'Reset Password', 'wishful-blog' ) );
            $header_user_edit_profile_text  = get_theme_mod( 'wishful_blog_header_user_edit_profile_text', esc_html__( 'Edit Profile', 'wishful-blog' ) );
            $header_user_logout_text        = get_theme_mod( 'wishful_blog_header_user_logout_text', esc_html__( 'Log Out', 'wishful-blog' ) );
        ?>
        <li class="dropdown">

            <?php if( ! is_user_logged_in() ) : ?>

            <a class="dropdown-toggle" href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>"><i class="fa fa-user"></i></a>

            <ul class="dropdown-menu">

                 <li><a class="dropdown-item" href="<?php echo esc_url( wp_registration_url() ); ?>"><?php echo esc_html( $header_user_register_text ); ?></a></li>

                <li><a class="dropdown-item" href="<?php echo esc_url( wp_login_url( home_url() ) ); ?>"><?php echo esc_html( $header_user_login_text ); ?></a></li>

                <li><a class="dropdown-item" href="<?php echo esc_url( wp_lostpassword_url( home_url() ) ); ?>"><?php echo esc_html( $header_user_lost_password_text ); ?></a></li>
            </ul>

            <?php else : ?>

            <a class="dropdown-toggle" href="<?php echo esc_url( get_edit_user_link() ); ?>"><i class="fa fa-user"></i></a>

            <ul class="dropdown-menu">

                <li><a class="dropdown-item" href="<?php echo esc_url( get_edit_user_link() ); ?>"><?php echo esc_html( $header_user_edit_profile_text ); ?></a></li>

                <li><a class="dropdown-item" href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>"><?php echo esc_html( $header_user_logout_text ); ?></a></li>
            </ul>

                <?php endif; ?>

        </li>

        <?php
        }
    }
}

/**
 * Displays woo cart for woocommerce
 */
if( ! function_exists( 'wishful_blog_header_woo_cart_template' ) ) {

    function wishful_blog_header_woo_cart_template() {

        $enable_header_woo_cart = get_theme_mod( 'wishful_blog_enable_header_woo_cart', 1 );

        if ( class_exists('WooCommerce') && $enable_header_woo_cart ) {

            global $woocommerce;

            if($woocommerce && is_object( WC()->cart )) {
            ?>
            <li>
                <span class="cart-contents">
                    <a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php _e('View Cart', 'wishful-blog'); ?>" class="header-cart">
                        <i class="fa fa-shopping-cart"></i>
                        <strong>
                           <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'wishful-blog'), $woocommerce->cart->cart_contents_count);?>
                        </strong>
                        <?php echo $woocommerce->cart->get_cart_total(); ?>
                    </a>
                </span>
            </li>
            <?php
            }
        }
    }
}

/**
 * Selects banner template according to the customizer's banner options
 */
if( ! function_exists( 'wishful_blog_banner_template' ) ) {

    function wishful_blog_banner_template() {

        $enable_banner = get_theme_mod( 'wishful_blog_enable_banner', 0 );

        $banner_layout = get_theme_mod( 'wishful_blog_banner_layout', 'banner_one' );

        if( $enable_banner == 1 ) {

            if( $banner_layout == 'banner_one' ){
                get_template_part( 'template-parts/banner/banner', 'one' );
            }

            if( $banner_layout == 'banner_two' ){
                get_template_part( 'template-parts/banner/banner', 'two' );
            }

            $banner_layout = apply_filters( 'pro_banner_layout_template', $banner_layout );

        }
    }
}

/**
 * Selects post template according to the customizer's layout options
 */
if( ! function_exists( 'wishful_blog_post_layout_template' ) ) {

    function wishful_blog_post_layout_template() {

        get_template_part( 'template-parts/post-list/post', 'list' );
    }
}

/**
 * Return post layout according to the customizer's post layout options
 */
if( ! function_exists( 'wishful_blog_post_layout' ) ) {

    function wishful_blog_post_layout() {

        $post_layout = '';

        if( is_home() ) {

            $post_layout = get_theme_mod( 'wishful_blog_homepage_post_layout', 'post_layout_three' );
        }

        if( is_archive() ) {

            $post_layout = get_theme_mod( 'wishful_blog_archive_post_layout', 'post_layout_three' );
        }

        if( is_search() ) {

            $post_layout = get_theme_mod( 'wishful_blog_search_post_layout', 'post_layout_three' );
        }

        return $post_layout;
    }
}

/**
 * Function to get post and page sidebar position.
 */
if( ! function_exists( 'wishful_blog_single_sidebar_position' ) ) {

	function wishful_blog_single_sidebar_position() {

        if( class_exists( 'WooCommerce' ) ) {

            $is_woocommerce_page = wishful_blog_is_woocommerce_page();

            if ( ( is_woocommerce() || $is_woocommerce_page ) ) {

                if( is_active_sidebar( 'wishful-blog-woocommerce-sidebar' ) ) {

                    $woocommerce_sidebar_position = get_theme_mod( 'wishful_blog_woocommerce_sidebar_position', esc_html__( 'right', 'wishful-blog' ) );

                    if( empty( $woocommerce_sidebar_position ) ) {

                        $woocommerce_sidebar_position = 'right';
                    }

                } else {

                    $woocommerce_sidebar_position = 'none';
                }

                return $woocommerce_sidebar_position;
            }
		}

		$sidebar_position_key = 'wishful_blog_sidebar_position';

        if( is_active_sidebar( 'wishful-blog-sidebar' ) ) {

            $single_sidebar_position = get_post_meta( get_the_ID(), $sidebar_position_key, true );

            if( empty( $single_sidebar_position ) ) {

                $single_sidebar_position = 'right';
            }

        } else {

            $single_sidebar_position = 'none';
        }

		return $single_sidebar_position;
	}
}

/**
 * Function to check position of sidebar.
 */
if( !function_exists( 'wishful_blog_sidebar_position' ) ) {

    function wishful_blog_sidebar_position() {

    	$sidebar_position = '';

        if( is_active_sidebar( 'wishful-blog-sidebar' ) ) {

            if( !is_singular() ) {

                $post_layout = wishful_blog_post_layout();

                if( is_archive() ) {

                    $sidebar_position = get_theme_mod( 'wishful_blog_archive_sidebar_position', 'right' );

                    if( has_filter( 'pro_sidebar_position' ) ) {

                        $sidebar_position = apply_filters( 'pro_sidebar_position', $post_layout, $sidebar_position );
                    }
                }

                if( is_search() ) {

                    $sidebar_position = get_theme_mod( 'wishful_blog_search_sidebar_position', 'right' );

                    if( has_filter( 'pro_sidebar_position' ) ) {

                        $sidebar_position = apply_filters( 'pro_sidebar_position', $post_layout, $sidebar_position );
                    }
                }

                if( is_home() ) {

                    $sidebar_position = get_theme_mod( 'wishful_blog_homepage_sidebar_position', 'right' );

                    if( has_filter( 'pro_sidebar_position' ) ) {

                        $sidebar_position = apply_filters( 'pro_sidebar_position', $post_layout, $sidebar_position );
                    }
                }
            }

            if( empty( $sidebar_position ) ) {

                $sidebar_position = 'right';
            }
        } else {

            $sidebar_position = 'none';
        }

    	return $sidebar_position;
    }
}

/**
 * Add custom class for page content containing posts.
 */
if( ! function_exists( 'wishful_blog_page_content_class' ) ) {

	function wishful_blog_page_content_class() {

        $sidebar_position = wishful_blog_sidebar_position();

        $post_layout = wishful_blog_post_layout();

        $content_class = 'container-fluid no-left-padding no-right-padding';

        if( $sidebar_position == 'none' ) {

            if( $post_layout == 'post_layout_three' ) {

                if( is_home() ) {

                    $content_class .= ' page-content blog-paralle-post-no-sidebar';

                } else {

                    $content_class .= ' page-search-content blog-paralle-post-no-sidebar';
                }

            } elseif( $post_layout == 'post_layout_five' ) {

                if( is_home() ) {

                    $content_class .= ' page-content blog-2-col-no-sidebar';

                } else {

                    $content_class .= ' page-search-content blog-2-col-no-sidebar';
                }

            } else {

                $content_class .= apply_filters( 'pro_full_page_content_class', $post_layout );
            }

        } else {

            if( $post_layout == 'post_layout_three' ) {

                if( is_home() ) {

                    $content_class .= ' page-content blog-paralle-post';

                } else {

                    $content_class .= ' page-search-content blog-paralle-post';
                }

            } elseif( $post_layout == 'post_layout_five' ) {

                if( is_home() ) {

                    $content_class .= ' page-content';

                } else {

                    $content_class .= ' page-search-content';
                }

            } else {

                $content_class .= apply_filters( 'pro_sidebar_page_content_class', $post_layout );
            }
        }

		echo esc_attr( $content_class );
	}
}

/**
 * Add custom class for page row containing posts.
 */
if( ! function_exists( 'wishful_blog_page_row_class' ) ) {

	function wishful_blog_page_row_class() {

		$row_class = 'row';

        $sidebar_position = wishful_blog_sidebar_position();

        $post_layout = wishful_blog_post_layout();

        if( $sidebar_position == 'none' ) {

            $row_class .= ' justify-content-md-center';

            if( has_filter( 'pro_blog_full_page_row_class' ) ) {

                $row_class = apply_filters( 'pro_blog_full_page_row_class', $post_layout );
            }
        }

		echo esc_attr( $row_class );
	}
}

/**
 * Add custom class for main container containing posts.
 */
if( ! function_exists( 'wishful_blog_main_container_class' ) ) {

	function wishful_blog_main_container_class() {

		$container_class = '';

        $sidebar_position = wishful_blog_sidebar_position();

        $post_layout = wishful_blog_post_layout();

		if( $sidebar_position == 'none' || !is_active_sidebar( 'wishful-blog-sidebar' ) ) {

            if( $post_layout == 'post_layout_three' ) {

                $container_class = 'col-xl-10 col-lg-12 col-md-12';

            } elseif( $post_layout == 'post_layout_five' ) {

                $container_class = 'col-lg-10 col-md-12';

            } else {

                $container_class = apply_filters( 'pro_full_main_container_class', $post_layout );
            }

		} else {

            $container_class = 'col-lg-8 col-md-6';

            if( has_filter( 'pro_blog_sidebar_main_container_class' ) ) {

                $container_class = apply_filters( 'pro_blog_sidebar_main_container_class', $post_layout );
            }
		}

        $container_class .= ' content-area';

        $container_class .= apply_filters( 'pro_blog_sidebar_sticky_class', $sidebar_position );

		echo esc_attr( $container_class );
	}
}

/**
 * Add custom class for page row content containing posts.
 */
if( ! function_exists( 'wishful_blog_page_row_content_class' ) ) {

	function wishful_blog_page_row_content_class() {

		$row_content_class = 'row';

        if( has_filter( 'pro_blog_page_row_content_class' ) ) {

            $post_layout = wishful_blog_post_layout();

            $row_content_class .= apply_filters( 'pro_blog_page_row_content_class', $post_layout );
        }

		echo esc_attr( $row_content_class );
	}
}

/**
 * Add custom class for single content containing posts.
 */
if( ! function_exists( 'wishful_blog_single_content_class' ) ) {

	function wishful_blog_single_content_class() {

        $sidebar_position = wishful_blog_single_sidebar_position();

        $content_class = 'container-fluid no-left-padding no-right-padding page-content blog-single';

        if( $sidebar_position == 'none' ) {

            if( is_single() ) {

                $content_class .= ' post-nosidebar single-post';

            } else {

                $content_class .= ' post-nosidebar single-page';
            }

        } else {

            if( is_single() ) {

                $content_class .= ' single-post';

            } else {

                $content_class .= ' single-page';
            }
        }

		echo esc_attr( $content_class );
	}
}

/**
 * Add custom class for single container containing posts.
 */
if( ! function_exists( 'wishful_blog_single_container_class' ) ) {

	function wishful_blog_single_container_class() {

		$container_class = '';

        $sidebar_position = wishful_blog_single_sidebar_position();

		if( $sidebar_position == 'none' ) {

            $container_class = 'col-xl-12 col-lg-12 col-md-12 col-12';

		} else {

            $container_class = 'col-xl-8 col-lg-8 col-md-6 col-12';
		}

        $container_class .= ' content-area';

        $container_class .= apply_filters( 'pro_blog_sidebar_sticky_class', $sidebar_position );

		echo esc_attr( $container_class );
	}
}

/**
 * Add custom class for post list content containing posts.
 */
if( ! function_exists( 'wishful_blog_post_list_class' ) ) {

	function wishful_blog_post_list_class() {

        $sidebar_position = wishful_blog_sidebar_position();

        $post_layout = wishful_blog_post_layout();

        $content_class = 'col-sm-6';

        if( $sidebar_position == 'none' ) {

            if( $post_layout == 'post_layout_three' ) {

                $content_class .= ' col-12 col-lg-12 col-md-6 blog-paralle';

            } elseif( $post_layout == 'post_layout_five' ) {

                $content_class .= ' col-lg-6 col-md-6 col-sm-6';

            } else {

                $content_class = apply_filters( 'pro_full_post_list_class', $post_layout );
            }

        } else {

            if( $post_layout == 'post_layout_three' ) {

                $content_class .= ' col-12 col-md-12 blog-paralle';

            } elseif( $post_layout == 'post_layout_five' ) {

                $content_class .= ' col-lg-6 col-md-12 col-sm-6';

            } else {

                $content_class = apply_filters( 'pro_sidebar_post_list_class', $post_layout );
            }
        }

		echo esc_attr( $content_class );
	}
}

/**
 * Return for post list category meta.
 */
if( ! function_exists( 'wishful_blog_post_list_category_meta' ) ) {

	function wishful_blog_post_list_category_meta() {

        $display_category = 0;

        if( is_home() ) {

            $display_category = get_theme_mod( 'wishful_blog_display_homepage_category', 1 );
        }

        if( is_archive() ) {

            $display_category = get_theme_mod( 'wishful_blog_display_archive_category', 1 );
        }

        if( is_search() ) {

            $display_category = get_theme_mod( 'wishful_blog_display_search_category', 1 );
        }

        if( is_single() ) {

            $display_category = get_theme_mod( 'wishful_blog_display_single_post_category', 1 );
        }

        return $display_category;
	}
}

/**
 * Return for post list author meta.
 */
if( ! function_exists( 'wishful_blog_post_list_author_meta' ) ) {

	function wishful_blog_post_list_author_meta() {

        $display_author = 0;

        if( is_home() ) {

            $display_author = get_theme_mod( 'wishful_blog_display_homepage_author', 1 );
        }

        if( is_archive() ) {

            $display_author = get_theme_mod( 'wishful_blog_display_archive_author', 1 );
        }

        if( is_search() ) {

            $display_author = get_theme_mod( 'wishful_blog_display_search_author', 1 );
        }

        if( is_single() ) {

            $display_author = get_theme_mod( 'wishful_blog_display_single_post_author', 1 );
        }

        return $display_author;
	}
}

/**
 * Return for post list date meta.
 */
if( ! function_exists( 'wishful_blog_post_list_date_meta' ) ) {

	function wishful_blog_post_list_date_meta() {

        $display_date = 0;

        if( is_home() ) {

            $display_date = get_theme_mod( 'wishful_blog_display_homepage_date', 1 );
        }

        if( is_archive() ) {

            $display_date = get_theme_mod( 'wishful_blog_display_archive_date', 1 );
        }

        if( is_search() ) {

            $display_date = get_theme_mod( 'wishful_blog_display_search_date', 1 );
        }

        if( is_single() ) {

            $display_date = get_theme_mod( 'wishful_blog_display_single_post_date', 1 );
        }

        return $display_date;
	}
}

/**
 * Return for post list read text content.
 */
if( ! function_exists( 'wishful_blog_post_list_read_text' ) ) {

	function wishful_blog_post_list_read_text() {

        $readmore_text = '';

        if( is_home() ) {

            $readmore_text = get_theme_mod( 'wishful_blog_homepage_readmore_text', esc_html__( 'Read More', 'wishful-blog' ) );
        }

        if( is_archive() ) {

            $readmore_text = get_theme_mod( 'wishful_blog_archive_readmore_text', esc_html__( 'Read More', 'wishful-blog' ) );
        }

        if( is_search() ) {

            $readmore_text = get_theme_mod( 'wishful_blog_search_readmore_text', esc_html__( 'Read More', 'wishful-blog' ) );
        }

        return $readmore_text;
	}
}

/**
 * Return for post listing style
 */
if( ! function_exists( 'wishful_blog_post_listing_style' ) ) {

	function wishful_blog_post_listing_style() {

        if( is_home() ) {

            $style = get_theme_mod( 'wishful_blog_homepage_post_style', 'style_one' );
        }

        if( is_archive() ) {

            $style = get_theme_mod( 'wishful_blog_archive_post_style', 'style_one' );
        }

        if( is_search() ) {

            $style = get_theme_mod( 'wishful_blog_search_post_style', 'style_one' );
        }

        return $style;
	}
}

/**
 * Return for post listing style class
 */
if( ! function_exists( 'wishful_blog_post_listing_style_class' ) ) {

	function wishful_blog_post_listing_style_class() {

        $style_class = '';

        $style = wishful_blog_post_listing_style();

        if( $style == 'style_two' ) {

            $style_class = ' post-position';
        }

        return $style_class;
	}
}
