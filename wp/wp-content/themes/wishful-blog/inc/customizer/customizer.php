<?php
/**
 * wishful-blog Theme Customizer
 *
 * @package wishful-blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wishful_blog_customize_register( $wp_customize ) {

    /**
	 * Sanitization Functions
	 */
	require get_template_directory() . '/inc/customizer/sanitize-callback.php';

    // Upspell
    require_once trailingslashit( get_template_directory() ) . '/inc/customizer/upgrade-to-pro/upgrade.php';

    $wp_customize->register_section_type( 'Wishful_Blog_Customize_Section_Upsell' );

    // Register sections.
    $wp_customize->add_section( new Wishful_Blog_Customize_Section_Upsell( $wp_customize, 'theme_upsell', wishful_blog_upsell_array()
        )
    );

    /**
     * Load Customizer For Theme Options
     */
    require get_template_directory() . '/inc/customizer/customizer-theme-options.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'wishful_blog_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'wishful_blog_customize_partial_blogdescription',
		) );
	}

    $wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'wishful-blog' );
    $wp_customize->get_section( 'background_image' )->title = esc_html__( 'Site Background', 'wishful-blog' );

    $wp_customize->get_control( 'site_icon' )->section = 'wishful_blog_site_logo_section';
    $wp_customize->get_control( 'custom_logo' )->section = 'wishful_blog_site_logo_section';
    $wp_customize->get_control( 'blogname' )->section = 'wishful_blog_site_logo_section';
    $wp_customize->get_control( 'blogdescription' )->section = 'wishful_blog_site_logo_section';
    $wp_customize->get_control( 'display_header_text' )->section = 'wishful_blog_site_logo_section';
    $wp_customize->get_control( 'header_textcolor' )->section = 'wishful_blog_site_logo_section';
    $wp_customize->get_control( 'header_image' )->section = 'wishful_blog_header_section';
    $wp_customize->get_control( 'background_color' )->section = 'background_image';


}
add_action( 'customize_register', 'wishful_blog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wishful_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wishful_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Function to load dynamic styles.
 *
 * @since  1.0.0
 * @access public
 * @return null
 */
function dynamic_style() {

    ?>
    <style type="text/css">

    <?php

    /*-----------------------------------------------------------------------------
                                Sticky Header
    -----------------------------------------------------------------------------*/

    $enable_sticky_header = get_theme_mod( 'wishful_blog_enable_sticky_header', 1 );

    if( $enable_sticky_header ) {

        ?>
        @media (min-width: 992px) {

            .sticky .primary-navigation-wrap {
                position: fixed;
            }
        }
        <?php

    } else {

        ?>
        @media (min-width: 992px) {

            .sticky .primary-navigation-wrap {
                position: initial;
            }
        }
        <?php
    }

    /*-----------------------------------------------------------------------------
                                Theme Color
    -----------------------------------------------------------------------------*/

    $primary_color = get_theme_mod( 'wishful_blog_primary_color', '#fcb811' );

    if( !empty( $primary_color ) ) {

        ?>
       
        .top-header .top-social li>a:hover,
        .copyright>p a,
        .type-post .entry-cover .post-meta>span>a:hover,
        .author.vcard a:hover,
        .slider-section2 .container .row .post-block .post-box .entry-content>span>a:hover,
        .type-post .entry-header>span>a:hover,
        .related-post .related-post-box>h3>a:hover,
        .entry-content .page-link,
        .entry-content .page-link:hover,
        .widget a:hover,
        .search-box span i,
        .woocommerce ul.products li.product .price,
        .woocommerce div.product p.price,
        .woocommerce div.product span.price,
        .widget_latestposts .latest-content span a:hover,
        .footer-light .widget_latestposts .latest-content span a:hover,
        .widget_categories ul li a:hover,
        .widget_archive ul li a:hover,
        .footer-light .widget_categories ul li a:hover,
        .footer-light .widget_archive ul li a:hover {

            color: <?php echo esc_attr( $primary_color ); ?>;
        }

  

        .woocommerce-error,
        .woocommerce-info,
        .woocommerce-message {

            border-top-color: <?php echo esc_attr( $primary_color ); ?>;
        }

        .woocommerce-error::before,
        .woocommerce-info::before,
        .woocommerce-message::before {

            content: "\e015";
            color: <?php echo esc_attr( $primary_color ); ?>;
        }

        <?php

        $enable_custom_button_design = get_theme_mod( 'wishfulblog_pro_enable_custom_button_design', 0 );

        if( !defined( WISHFULBLOG_PRO_CURRENT_VERSION ) && $enable_custom_button_design == false ) {

            ?>
            .blog-paralle .type-post .entry-content>a:hover,
            .type-post .entry-content>a:hover,
        <?php
        }
        ?>
        .wp-block-tag-cloud a.tag-cloud-link:hover,
        article[class*="type-"] .entry-content .entry-footer .tags a:hover,
        .error-block a:hover,
        .footer-light .widget_social>ul li,
        .footer-light .widget_social>ul li a,
        .footer-dark .widget_social>ul li,
        .footer-dark .widget_social>ul li a,
        #search-form [type=submit],
        .widget_search input#submit,
        .post-password-form [type=submit],
        .wp-block-quote,
        .wp-block-quote.has-text-align-right,
        .wp-block-quote.has-text-align-left,
        blockquote,
        q,
        .scroll-top .back-to-top,
        .section-header h3:before,
        .woocommerce span.onsale,
        .woocommerce #respond input#submit.alt,
        .woocommerce a.button.alt,
        .woocommerce button.button.alt,
        .woocommerce input.button.alt {

            background-color: <?php echo esc_attr( $primary_color ); ?>;
        }

        .type-post:not(.post-position) .entry-header .entry-title::before,
        .related-post>h3::before,
        .comments-title::before,
        .comment-reply-title::before,
        .widget-title::before,
        .slider-section5 .post-item .carousel-caption>a:before,
        .slider-section2 .container .row .post-block .post-box .entry-content>a:before {

            background-color: <?php echo esc_attr( $primary_color ); ?>;
            content: "";
        }

        /* - max-width: 991 */
        @media (max-width: 991px) {

            .ownavigation .navbar-nav li .dropdown-menu>li>a:hover {

                color: <?php echo esc_attr( $primary_color ); ?>;
            }

            .site-navigation {

                background-color: <?php echo esc_attr( $primary_color ); ?>;
            }
        }

        /* - min-width: 992 */
        @media (min-width: 992px) {

            .ownavigation .navbar-nav li .dropdown-menu>li>a:hover {

                color: <?php echo esc_attr( $primary_color ); ?>;
            }
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Site Title Padding Top
    -----------------------------------------------------------------------------*/

    $site_title_padding_top = get_theme_mod( 'wishful_blog_site_title_padding_top', '15px' );

    if( !empty( $site_title_padding_top ) ) {

        ?>
        .header_s .top-header {

            padding-top: <?php echo esc_attr( $site_title_padding_top ); ?>;
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Site Title Padding Bottom
    -----------------------------------------------------------------------------*/

    $site_title_padding_bottom = get_theme_mod( 'wishful_blog_site_title_padding_bottom', '15px' );

    if( !empty( $site_title_padding_bottom ) ) {

        ?>
        .header_s .top-header {

            padding-bottom: <?php echo esc_attr( $site_title_padding_bottom ); ?>;
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Main Menu Link Color
    -----------------------------------------------------------------------------*/

    $main_menu_link_color = get_theme_mod( 'wishful_blog_main_menu_link_color', '#333333' );

    if( !empty( $main_menu_link_color ) ) {

        ?>
        .site-navigation>ul>li>a {

            color: <?php echo esc_attr( $main_menu_link_color ); ?>;
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Main Menu Link Hover Color
    -----------------------------------------------------------------------------*/

    $main_menu_link_hover_color = get_theme_mod( 'wishful_blog_main_menu_link_hover_color', '#fcb811' );

    if( !empty( $main_menu_link_hover_color ) ) {

        ?>
        .site-navigation>ul>li>a:hover {

            color: <?php echo esc_attr( $main_menu_link_hover_color ); ?>;
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Sub Menu Link Color
    -----------------------------------------------------------------------------*/

    $sub_menu_link_color = get_theme_mod( 'wishful_blog_sub_menu_link_color', '#333333' );

    if( !empty( $sub_menu_link_color ) ) {

        ?>
        .site-navigation ul li .sub-menu li a,
        .site-navigation ul li .children li a {

            color: <?php echo esc_attr( $sub_menu_link_color ); ?>;
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Sub Menu Link Hover Color
    -----------------------------------------------------------------------------*/

    $sub_menu_link_hover_color = get_theme_mod( 'wishful_blog_sub_menu_link_hover_color', '#fcb811' );

    if( !empty( $sub_menu_link_hover_color ) ) {

        ?>
        .site-navigation ul li .sub-menu li a:hover,
        .site-navigation ul li .children li a:hover {

            color: <?php echo esc_attr( $sub_menu_link_hover_color ); ?>;
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Menu Main Background Color
    -----------------------------------------------------------------------------*/

    $menu_main_bg_color = get_theme_mod( 'wishful_blog_menu_main_bg_color', '#fff' );

    if( !empty( $menu_main_bg_color ) ) {

        ?>
        .header_s .menu-block,
        .menu-toggle {

            background-color: <?php echo esc_attr( $menu_main_bg_color ); ?>;
        }

        @media (min-width: 992px) {

            .sticky .primary-navigation-wrap {

                background-color: <?php echo esc_attr( $menu_main_bg_color ); ?>;
            }

        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Menu Sub Background Color
    -----------------------------------------------------------------------------*/

    $menu_sub_bg_color = get_theme_mod( 'wishful_blog_menu_sub_bg_color', '#fff' );

    if( !empty( $menu_sub_bg_color ) ) {

        ?>
        .site-navigation ul li .sub-menu,
        .site-navigation ul li .children {

            background: <?php echo esc_attr( $menu_sub_bg_color ); ?>;
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Menu Main Border Color
    -----------------------------------------------------------------------------*/

    $menu_main_border_color = get_theme_mod( 'wishful_blog_menu_main_border_color', '#eeeeee' );

    if( !empty( $menu_main_border_color ) ) {

        ?>
        .header_s .menu-block {

            border-top: 1px solid <?php echo esc_attr( $menu_main_border_color ); ?>;
        }

        @media (min-width: 992px) {

            .sticky .primary-navigation-wrap {

                border-top: 1px solid <?php echo esc_attr( $menu_main_border_color ); ?>;
            }

        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Menu Sub Border Color
    -----------------------------------------------------------------------------*/

    $menu_sub_border_color = get_theme_mod( 'wishful_blog_menu_sub_border_color', '#ddd' );

    if( !empty( $menu_sub_border_color ) ) {

        ?>
        .site-navigation ul li .sub-menu li a,
        .site-navigation ul li .children li a {

            border-bottom: 1px solid <?php echo esc_attr( $menu_sub_border_color ); ?>;
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Menu Responsive Background Color
    -----------------------------------------------------------------------------*/

    $menu_responsive_sub_bg_color = get_theme_mod( 'wishful_blog_menu_responsive_sub_bg_color', '#fff' );

    if( !empty( $menu_responsive_sub_bg_color ) ) {

        ?>
        /* - max-width: 991 */
        @media (max-width: 991px) {

            .site-navigation {

                background-color: <?php echo esc_attr( $menu_responsive_sub_bg_color ); ?>;
            }
        }
        <?php

    }

    $fonts = wishful_blog_fonts_array();

    /*-----------------------------------------------------------------------------
                                Site Title Typo
    -----------------------------------------------------------------------------*/

    $site_title_font_family = get_theme_mod( 'wishful_blog_font_family_site_title_typography', 'Poppins:400,600,700,900' );
    $site_title_font_weight = get_theme_mod( 'wishful_blog_font_weight_site_title_typography', '700_w' );
    $site_title_font_size = get_theme_mod( 'wishful_blog_font_size_site_title_typography', '38px' );

    ?>
    .site-title
    {

        <?php

        if( !empty( $site_title_font_family ) ) {

            ?>
            font-family: <?php echo esc_attr( $fonts[ $site_title_font_family ] ); ?>;
            <?php
        }

        if( !empty( $site_title_font_weight ) ) {

            ?>
            font-weight: <?php echo esc_attr( wishful_blog_dynamic_font_weight( $site_title_font_weight ) ); ?>;
            <?php
        }

        if( !empty( $site_title_font_size ) ) {

            ?>
            font-size: <?php echo esc_attr( $site_title_font_size ); ?>;
            <?php
        }

        ?>
    }

    <?php

    /*-----------------------------------------------------------------------------
                                Body Typo
    -----------------------------------------------------------------------------*/

    $body_font_family = get_theme_mod( 'wishful_blog_font_family_body_typography', 'Poppins:400,600,700,900' );
    $body_font_weight = get_theme_mod( 'wishful_blog_font_weight_body_typography', '400_w' );
    $body_font_size = get_theme_mod( 'wishful_blog_font_size_body_typography', '16px' );

    ?>
    body
    {

        <?php

        if( !empty( $body_font_family ) ) {

            ?>
            font-family: <?php echo esc_attr( $fonts[ $body_font_family ] ); ?>;
            <?php
        }

        if( !empty( $body_font_weight ) ) {

            ?>
            font-weight: <?php echo esc_attr( wishful_blog_dynamic_font_weight( $body_font_weight ) ); ?>;
            <?php
        }

        if( !empty( $body_font_size ) ) {

            ?>
            font-size: <?php echo esc_attr( $body_font_size ); ?>;
            <?php
        }

        ?>
    }

    <?php

    /*-----------------------------------------------------------------------------
                                Post Listing Title Typo
    -----------------------------------------------------------------------------*/

    $post_listing_title_font_family = get_theme_mod( 'wishful_blog_font_family_post_listing_title_typography', 'Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i' );
    $post_listing_title_font_weight = get_theme_mod( 'wishful_blog_font_weight_post_listing_title_typography', '700_w' );
    $post_listing_title_font_size = get_theme_mod( 'wishful_blog_font_size_post_listing_title_typography', '24px' );

    ?>
    .page-content .type-post .entry-header .entry-title>a,
    .page-search-content .type-post .entry-header .entry-title>a
    {

        <?php

        if( !empty( $post_listing_title_font_family ) ) {

            ?>
            font-family: <?php echo esc_attr( $fonts[ $post_listing_title_font_family ] ); ?>;
            <?php
        }

        if( !empty( $post_listing_title_font_weight ) ) {

            ?>
            font-weight: <?php echo esc_attr( wishful_blog_dynamic_font_weight( $post_listing_title_font_weight ) ); ?>;
            <?php
        }

        if( !empty( $post_listing_title_font_size ) ) {

            ?>
            font-size: <?php echo esc_attr( $post_listing_title_font_size ); ?>;
            <?php
        }

        ?>
    }

    <?php

    /*-----------------------------------------------------------------------------
                                Widget Title Typo
    -----------------------------------------------------------------------------*/

    $widget_title_font_family = get_theme_mod( 'wishful_blog_font_family_widget_title_typography', 'Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i' );
    $widget_title_font_weight = get_theme_mod( 'wishful_blog_font_weight_widget_title_typography', '500_w' );
    $widget_title_font_size = get_theme_mod( 'wishful_blog_font_size_widget_title_typography', '16px' );

    ?>
    .widget-title,
    .trending-section .section-header h3
    {

        <?php

        if( !empty( $widget_title_font_family ) ) {

            ?>
            font-family: <?php echo esc_attr( $fonts[ $widget_title_font_family ] ); ?>;
            <?php
        }

        ?>
    }

    .widget-title
    {

        <?php

        if( !empty( $widget_title_font_weight ) ) {

            ?>
            font-weight: <?php echo esc_attr( wishful_blog_dynamic_font_weight( $widget_title_font_weight ) ); ?>;
            <?php
        }

        if( !empty( $widget_title_font_size ) ) {

            ?>
            font-size: <?php echo esc_attr( $widget_title_font_size ); ?>;
            <?php
        }

        ?>
    }

    <?php

    /*-----------------------------------------------------------------------------
                                Header Image Opacity
    -----------------------------------------------------------------------------*/

    $header_image_opacity = get_theme_mod( 'wishful_blog_header_image_opacity', 8 );

    $header_image_opacity = $header_image_opacity/10;

        ?>
        .header-img .top-header:before {

            background: rgba(255, 255, 255, <?php echo esc_attr( $header_image_opacity ); ?>);
        }

    <?php

    /*-----------------------------------------------------------------------------
                                Newsletter Title Typo
    -----------------------------------------------------------------------------*/

    $newsletter_title_font_family = get_theme_mod( 'wishful_blog_font_family_newsletter_title_typography', 'Ubuntu:400,400i,500,500i,700,700i' );
    $newsletter_title_font_weight = get_theme_mod( 'wishful_blog_font_weight_newsletter_title_typography', '700_w' );
    $newsletter_title_font_size = get_theme_mod( 'wishful_blog_font_size_newsletter_title_typography', '30px' );

    ?>
    .news-letter-wrap h2
    {

        <?php

        if( !empty( $newsletter_title_font_family ) ) {

            ?>
            font-family: <?php echo esc_attr( $fonts[ $newsletter_title_font_family ] ); ?>;
            <?php
        }

        if( !empty( $newsletter_title_font_weight ) ) {

            ?>
            font-weight: <?php echo esc_attr( wishful_blog_dynamic_font_weight( $newsletter_title_font_weight ) ); ?>;
            <?php
        }

        if( !empty( $newsletter_title_font_size ) ) {

            ?>
            font-size: <?php echo esc_attr( $newsletter_title_font_size ); ?>;
            <?php
        }

        ?>
    }

    <?php

    /*-----------------------------------------------------------------------------
                                Newsletter Button Typo
    -----------------------------------------------------------------------------*/

    $newsletter_button_font_family = get_theme_mod( 'wishful_blog_font_family_newsletter_button_typography', 'Ubuntu:400,400i,500,500i,700,700i' );
    $newsletter_button_font_weight = get_theme_mod( 'wishful_blog_font_weight_newsletter_button_typography', '400_w' );
    $newsletter_button_font_size = get_theme_mod( 'wishful_blog_font_size_newsletter_button_typography', '16px' );

    ?>
    .news-letter-wrap .input-field.input-submit #eclg-submit-btn
    {

        <?php

        if( !empty( $newsletter_button_font_family ) ) {

            ?>
            font-family: <?php echo esc_attr( $fonts[ $newsletter_button_font_family ] ); ?>;
            <?php
        }

        if( !empty( $newsletter_button_font_weight ) ) {

            ?>
            font-weight: <?php echo esc_attr( wishful_blog_dynamic_font_weight( $newsletter_button_font_weight ) ); ?>;
            <?php
        }

        if( !empty( $newsletter_button_font_size ) ) {

            ?>
            font-size: <?php echo esc_attr( $newsletter_button_font_size ); ?>;
            <?php
        }

        ?>
    }

    <?php

    /*-----------------------------------------------------------------------------
                                Newsletter Background Color
    -----------------------------------------------------------------------------*/

    $newsletter_background_color = get_theme_mod( 'wishful_blog_newsletter_background_color', '#fcb811' );

    if( !empty( $newsletter_background_color ) ) {

        ?>
        .news-letter-wrap {

            background-color: <?php echo esc_attr( $newsletter_background_color ); ?>;
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Newsletter Title Color
    -----------------------------------------------------------------------------*/

    $newsletter_title_color = get_theme_mod( 'wishful_blog_newsletter_title_color', '#fff' );

    if( !empty( $newsletter_title_color ) ) {

        ?>
        .news-letter-wrap h2 {

            color: <?php echo esc_attr( $newsletter_title_color ); ?>;
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Newsletter Label Color
    -----------------------------------------------------------------------------*/

    $newsletter_label_color = get_theme_mod( 'wishful_blog_newsletter_label_color', '#444' );

    if( !empty( $newsletter_label_color ) ) {

        ?>
        .news-letter-wrap .input-field label {

            color: <?php echo esc_attr( $newsletter_label_color ); ?>;
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Newsletter Button Text Color
    -----------------------------------------------------------------------------*/

    $newsletter_button_text_color = get_theme_mod( 'wishful_blog_newsletter_button_text_color', '#fff' );

    if( !empty( $newsletter_button_text_color ) ) {

        ?>
        .news-letter-wrap .input-field.input-submit #eclg-submit-btn {

            color: <?php echo esc_attr( $newsletter_button_text_color ); ?>;
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Newsletter Button Text Hover Color
    -----------------------------------------------------------------------------*/

    $newsletter_button_text_hover_color = get_theme_mod( 'wishful_blog_newsletter_button_text_hover_color', '#fff' );

    if( !empty( $newsletter_button_text_hover_color ) ) {

        ?>
        .news-letter-wrap .input-field.input-submit #eclg-submit-btn:hover {

            color: <?php echo esc_attr( $newsletter_button_text_hover_color ); ?>;
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Newsletter Button Background Color
    -----------------------------------------------------------------------------*/

    $newsletter_button_background_color = get_theme_mod( 'wishful_blog_newsletter_button_background_color', '#d35400' );

    if( !empty( $newsletter_button_background_color ) ) {

        ?>
        .news-letter-wrap .input-field.input-submit #eclg-submit-btn {

            background-color: <?php echo esc_attr( $newsletter_button_background_color ); ?>;
        }
        <?php

    }

    /*-----------------------------------------------------------------------------
                                Newsletter Button Background Hover Color
    -----------------------------------------------------------------------------*/

    $newsletter_button_background_hover_color = get_theme_mod( 'wishful_blog_newsletter_button_background_hover_color', '#333' );

    if( !empty( $newsletter_button_background_hover_color ) ) {

        ?>
        .news-letter-wrap .input-field.input-submit #eclg-submit-btn:hover {

            background-color: <?php echo esc_attr( $newsletter_button_background_hover_color ); ?>;
        }
        <?php

    }

    ?>

    </style>

    <?php
}
add_action( 'wp_head', 'dynamic_style' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wishful_blog_customize_preview_js() {
	wp_enqueue_script( 'wishful-blog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'customize_preview_init', 'wishful_blog_customize_preview_js' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wishful_blog_customizer_script() {

    wp_enqueue_style( 'wishful-blog-upgrade', get_template_directory_uri() . '/wishfulthemes/admin/css/upgrade.css' );
	wp_enqueue_style( 'wishful-blog-customizer-custom', get_template_directory_uri() .'/wishfulthemes/admin/css/customizer-custom.css' );
	wp_enqueue_script( 'wishful-blog-chosen', get_template_directory_uri() .'/wishfulthemes/admin/js/chosen.jquery.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true  );
    wp_enqueue_script( 'wishful-blog-upgrade', get_template_directory_uri() . '/wishfulthemes/admin/js/upgrade.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'wishful-blog-custom', get_template_directory_uri() .'/wishfulthemes/admin/js/custom.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true  );
}
add_action( 'customize_controls_enqueue_scripts', 'wishful_blog_customizer_script' );
