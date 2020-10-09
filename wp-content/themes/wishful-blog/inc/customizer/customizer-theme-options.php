<?php
/**
 * Customizer Options Declaration
 *
 * @package wishful-blog
 */

$categories = wishful_blog_categories_array();
$banner_layouts = wishful_blog_banner_layouts_array();
$banner_posts_no = wishful_blog_banner_posts_no_array();
$banner_posts_no_description = wishful_blog_banner_posts_no_description();
$fonts = wishful_blog_fonts_array();
$font_weight = wishful_blog_font_weight_array();
$posts_type = wishful_blog_posts_type_array();
$post_layouts = wishful_blog_post_layouts_array();
$post_styles = wishful_blog_post_styles_array();
$sidebar_position = wishful_blog_sidebar_position_array();
$display_metas = wishful_blog_display_metas_array();
$pagination_format = wishful_blog_pagination_format_array();
$footer_color_mode = wishful_blog_footer_color_mode_array();

/*-----------------------------------------------------------------------------
							GENERAL OPTIONS PANEL
-----------------------------------------------------------------------------*/

//General Options Panel
$wp_customize->add_panel( 'wishful_blog_general_options', array(
    'title'        => esc_html__( 'General Options', 'wishful-blog' ),
    'priority'     => 6,
) );



/*-----------------------------------------------------------------------------
							GLOBAL COLOR SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Global Color
$wp_customize->add_section( 'wishful_blog_global_color_options', array(
    'priority'      => 10,
    'title'         => esc_html__( 'Global Color', 'wishful-blog' ),
    'panel'         => 'wishful_blog_general_options',
) );

/*------------------------- Primary Color -------------------------*/

//Option : Primary Color
$wp_customize->add_setting( 'wishful_blog_primary_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#fcb811',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_primary_color', array(
    'label'                    => esc_html__('Primary Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_global_color_options',
) ) );



/*-----------------------------------------------------------------------------
							MENU COLOR SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Menu Color
$wp_customize->add_section( 'wishful_blog_menu_color_options', array(
    'priority'      => 20,
    'title'         => esc_html__( 'Menu Color', 'wishful-blog' ),
    'panel'         => 'wishful_blog_general_options',
) );

/*------------------------- Menu Color -------------------------*/

//Option : Main Menu Link Color
$wp_customize->add_setting( 'wishful_blog_main_menu_link_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#333333',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_main_menu_link_color', array(
    'label'                    => esc_html__('Main Menu Link Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_menu_color_options',
) ) );

//Option : Main Menu Link Hover Color
$wp_customize->add_setting( 'wishful_blog_main_menu_link_hover_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#fcb811',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_main_menu_link_hover_color', array(
    'label'                    => esc_html__('Main Menu Link Hover Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_menu_color_options',
) ) );

//Option : Sub Menu Link Color
$wp_customize->add_setting( 'wishful_blog_sub_menu_link_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#333333',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_sub_menu_link_color', array(
    'label'                    => esc_html__('Sub Menu Link Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_menu_color_options',
) ) );

//Option : Sub Menu Link Hover Color
$wp_customize->add_setting( 'wishful_blog_sub_menu_link_hover_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#fcb811',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_sub_menu_link_hover_color', array(
    'label'                    => esc_html__('Sub Menu Link Hover Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_menu_color_options',
) ) );

//Option : Menu Main Background Color
$wp_customize->add_setting( 'wishful_blog_menu_main_bg_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#fff',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_menu_main_bg_color', array(
    'label'                    => esc_html__('Main Menu Background Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_menu_color_options',
) ) );

//Option : Menu Sub Background Color
$wp_customize->add_setting( 'wishful_blog_menu_sub_bg_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#fff',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_menu_sub_bg_color', array(
    'label'                    => esc_html__('Sub Menu Background Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_menu_color_options',
) ) );

//Option : Menu Main Border Color
$wp_customize->add_setting( 'wishful_blog_menu_main_border_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#eeeeee',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_menu_main_border_color', array(
    'label'                    => esc_html__('Main Menu Border Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_menu_color_options',
) ) );

//Option : Menu Sub Border Color
$wp_customize->add_setting( 'wishful_blog_menu_sub_border_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#ddd',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_menu_sub_border_color', array(
    'label'                    => esc_html__('Sub Menu Border Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_menu_color_options',
) ) );

//Option : Responsive Menu Sub Background Color
$wp_customize->add_setting( 'wishful_blog_menu_responsive_sub_bg_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#fff',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_menu_responsive_sub_bg_color', array(
    'label'                    => esc_html__('Responsive : Sub Menu Background Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_menu_color_options',
) ) );



/*-----------------------------------------------------------------------------
							BODY TYPOGRAPHY SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Body Typography
$wp_customize->add_section( 'wishful_blog_body_typography', array(
    'priority'     => 30,
    'title'        => esc_html__( 'Body Typography', 'wishful-blog' ),
    'panel'        => 'wishful_blog_general_options',
) );

/*------------------------- Body Typography -------------------------*/

//Option : Body Font Family
$wp_customize->add_setting( 'wishful_blog_font_family_body_typography', array(
    'sanitize_callback'   => 'sanitize_text_field',
    'default'             => 'Poppins:400,600,700,900',
) );

$wp_customize->add_control( 'wishful_blog_font_family_body_typography', array(
    'label'                    => esc_html__('Font Family', 'wishful-blog' ),
    'section'                  => 'wishful_blog_body_typography',
    'type'                     => 'select',
    'choices'                  => $fonts,
) );

//Option : Body Font Weight
$wp_customize->add_setting( 'wishful_blog_font_weight_body_typography', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_select',
    'default'             => '400_w',
) );

$wp_customize->add_control( 'wishful_blog_font_weight_body_typography', array(
    'label'                    => esc_html__('Font Weight', 'wishful-blog' ),
    'section'                  => 'wishful_blog_body_typography',
    'type'                     => 'select',
    'choices'                  => $font_weight,
) );

//Option : Body Font Size
$wp_customize->add_setting( 'wishful_blog_font_size_body_typography', array(
    'sanitize_callback'   => 'sanitize_text_field',
    'default'             => '16px',
) );

$wp_customize->add_control( 'wishful_blog_font_size_body_typography', array(
    'label'                    => esc_html__('Font Size', 'wishful-blog' ),
    'description'              => esc_html__( 'You can set font size in pixel or normal. Eg: 24px, 1.3em etc.', 'wishful-blog' ),
    'section'                  => 'wishful_blog_body_typography',
    'type'                     => 'text',
) );



/*-----------------------------------------------------------------------------
							POST LISTING TITLE TYPOGRAPHY SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Post Listing Title Typography
$wp_customize->add_section( 'wishful_blog_post_listing_title_typography', array(
    'priority'     => 40,
    'title'        => esc_html__( 'Post Listing Title Typography', 'wishful-blog' ),
    'panel'        => 'wishful_blog_general_options',
) );

/*------------------------- Post Listing Title Typography -------------------------*/

//Option : Post Listing Title Font Family
$wp_customize->add_setting( 'wishful_blog_font_family_post_listing_title_typography', array(
    'sanitize_callback'   => 'sanitize_text_field',
    'default'             => 'Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i',
) );

$wp_customize->add_control( 'wishful_blog_font_family_post_listing_title_typography', array(
    'label'                    => esc_html__('Font Family', 'wishful-blog' ),
    'section'                  => 'wishful_blog_post_listing_title_typography',
    'type'                     => 'select',
    'choices'                  => $fonts,
) );

//Option : Post Listing Title Font Weight
$wp_customize->add_setting( 'wishful_blog_font_weight_post_listing_title_typography', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_select',
    'default'             => '700_w',
) );

$wp_customize->add_control( 'wishful_blog_font_weight_post_listing_title_typography', array(
    'label'                    => esc_html__('Font Weight', 'wishful-blog' ),
    'section'                  => 'wishful_blog_post_listing_title_typography',
    'type'                     => 'select',
    'choices'                  => $font_weight,
) );

//Option : Post Listing Title Font Size
$wp_customize->add_setting( 'wishful_blog_font_size_post_listing_title_typography', array(
    'sanitize_callback'   => 'sanitize_text_field',
    'default'             => '24px',
) );

$wp_customize->add_control( 'wishful_blog_font_size_post_listing_title_typography', array(
    'label'                    => esc_html__('Font Size', 'wishful-blog' ),
    'description'              => esc_html__( 'You can set font size in pixel or normal. Eg: 24px, 1.3em etc.', 'wishful-blog' ),
    'section'                  => 'wishful_blog_post_listing_title_typography',
    'type'                     => 'text',
) );



/*-----------------------------------------------------------------------------
							WIDGET TITLE TYPOGRAPHY SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Widget Title Typography
$wp_customize->add_section( 'wishful_blog_widget_title_typography', array(
    'priority'     => 50,
    'title'        => esc_html__( 'Widget Title Typography', 'wishful-blog' ),
    'panel'        => 'wishful_blog_general_options',
) );

/*------------------------- Widget Title Typography -------------------------*/

//Option : Widget Title Font Family
$wp_customize->add_setting( 'wishful_blog_font_family_widget_title_typography', array(
    'sanitize_callback'   => 'sanitize_text_field',
    'default'             => 'Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i',
) );

$wp_customize->add_control( 'wishful_blog_font_family_widget_title_typography', array(
    'label'                    => esc_html__('Font Family', 'wishful-blog' ),
    'section'                  => 'wishful_blog_widget_title_typography',
    'type'                     => 'select',
    'choices'                  => $fonts,
) );

//Option : Widget Title Font Weight
$wp_customize->add_setting( 'wishful_blog_font_weight_widget_title_typography', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_select',
    'default'             => '500_w',
) );

$wp_customize->add_control( 'wishful_blog_font_weight_widget_title_typography', array(
    'label'                    => esc_html__('Font Weight', 'wishful-blog' ),
    'section'                  => 'wishful_blog_widget_title_typography',
    'type'                     => 'select',
    'choices'                  => $font_weight,
) );

//Option : Widget Title Font Size
$wp_customize->add_setting( 'wishful_blog_font_size_widget_title_typography', array(
    'sanitize_callback'   => 'sanitize_text_field',
    'default'             => '16px',
) );

$wp_customize->add_control( 'wishful_blog_font_size_widget_title_typography', array(
    'label'                    => esc_html__('Font Size', 'wishful-blog' ),
    'description'              => esc_html__( 'You can set font size in pixel or normal. Eg: 24px, 1.3em etc.', 'wishful-blog' ),
    'section'                  => 'wishful_blog_widget_title_typography',
    'type'                     => 'text',
) );



/*-----------------------------------------------------------------------------
							SOCIAL LINKS SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Social Links
$wp_customize->add_section( 'wishful_blog_social_links_options', array(
    'priority'      => 60,
    'title'         => esc_html__( 'Social Links', 'wishful-blog' ),
    'panel'         => 'wishful_blog_general_options',
) );

// Option - Facebook Link
$wp_customize->add_setting( 'wishful_blog_facebook_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> '',
) );

$wp_customize->add_control( 'wishful_blog_facebook_link', array(
	'label'				=> esc_html__( 'Facebook Link', 'wishful-blog' ),
	'section'			=> 'wishful_blog_social_links_options',
	'type'				=> 'url',
) );

// Option - Twitter Link
$wp_customize->add_setting( 'wishful_blog_twitter_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> '',
) );

$wp_customize->add_control( 'wishful_blog_twitter_link', array(
	'label'				=> esc_html__( 'Twitter Link', 'wishful-blog' ),
	'section'			=> 'wishful_blog_social_links_options',
	'type'				=> 'url',
) );

// Option - Pinterest Link
$wp_customize->add_setting( 'wishful_blog_pinterest_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> '',
) );

$wp_customize->add_control( 'wishful_blog_pinterest_link', array(
	'label'				=> esc_html__( 'Pinterest Link', 'wishful-blog' ),
	'section'			=> 'wishful_blog_social_links_options',
	'type'				=> 'url',
) );

// Option - Instagram Link
$wp_customize->add_setting( 'wishful_blog_instagram_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> '',
) );

$wp_customize->add_control( 'wishful_blog_instagram_link', array(
	'label'				=> esc_html__( 'Instagram Link', 'wishful-blog' ),
	'section'			=> 'wishful_blog_social_links_options',
	'type'				=> 'url',
) );

// Option - Youtube Link
$wp_customize->add_setting( 'wishful_blog_youtube_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> '',
) );

$wp_customize->add_control( 'wishful_blog_youtube_link', array(
	'label'				=> esc_html__( 'Youtube Link', 'wishful-blog' ),
	'section'			=> 'wishful_blog_social_links_options',
	'type'				=> 'url',
) );



/*-----------------------------------------------------------------------------
							SCROLL TOP SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Scroll Top
$wp_customize->add_section( 'wishful_blog_site_scroll_top', array(
    'priority'     => 70,
    'title'        => esc_html__( 'Scroll Top', 'wishful-blog' ),
    'panel'        => 'wishful_blog_general_options',
) );

//Option : Enable Scroll Top
$wp_customize->add_setting( 'wishful_blog_enable_site_scroll_top', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_enable_site_scroll_top', array(
    'label'        => esc_html__( 'Enable Scroll Top', 'wishful-blog' ),
    'section'      => 'wishful_blog_site_scroll_top',
    'type'         => 'checkbox',
) );



/*-----------------------------------------------------------------------------
							EXCERPT LENGTH SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Excerpt Length
$wp_customize->add_section( 'wishful_blog_excerpt_length_options', array(
    'priority'      => 80,
    'title'         => esc_html__( 'Excerpt Length', 'wishful-blog' ),
    'panel'         => 'wishful_blog_general_options',
) );

// Option - Default Excerpt Length
$wp_customize->add_setting( 'wishful_blog_excerpt_length', array(
	'sanitize_callback'		=> 'wishful_blog_sanitize_range',
	'default'				=> 20,
) );

$wp_customize->add_control( 'wishful_blog_excerpt_length', array(
	'label'					=> esc_html__( 'Excerpt Length', 'wishful-blog' ),
	'description'			=> esc_html__( 'Excerpt is the short post content. Excerpt length sets the number of words that the excerpt can contain. This is the default excerpt length used for other pages too. Maximum excerpt length 40 and minimum excerpt length 20 can be set.', 'wishful-blog' ),
	'section'				=> 'wishful_blog_excerpt_length_options',
	'type'					=> 'number',
    'input_attrs'           => array(
        'min'  => 20,
        'max'  => 40,
    ),
) );



/*-----------------------------------------------------------------------------
							FALLBACK IMAGE SECTION OPTIONS
-----------------------------------------------------------------------------*/

$wp_customize->add_section( 'wishful_blog_fallback_image_section', array(
    'priority'     => 4,
    'title'        => esc_html__( 'Fallback Image', 'wishful-blog' ),
) );

//Option : Enable Fallback Image
$wp_customize->add_setting( 'wishful_blog_enable_fallback_image', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => true,
) );

$wp_customize->add_control( 'wishful_blog_enable_fallback_image', array(
    'label'         => esc_html__( 'Enable Fallback Image', 'wishful-blog' ),
    'section'       => 'wishful_blog_fallback_image_section',
    'type'          => 'checkbox',
) );

$wp_customize->add_setting( 'wishful_blog_fallback_image', array(
    'sanitize_callback' => 'wishful_blog_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wishful_blog_fallback_image', array(
        'label'       		=> esc_html__( 'Upload Fallback Image', 'wishful-blog' ),
        'section'     		=> 'wishful_blog_fallback_image_section',
        'active_callback'   => 'wishful_blog_is_active_fallback_image',
) ) );



/*-----------------------------------------------------------------------------
							LOGO & HEADER PANEL OPTIONS
-----------------------------------------------------------------------------*/

//Logo & Header Panel
$wp_customize->add_panel( 'wishful_blog_header_options', array(
    'title'        => esc_html__( 'Logo & Header Options', 'wishful-blog' ),
    'priority'     => 6,
) );



/*-----------------------------------------------------------------------------
							SITE LOGO SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Site Logo
$wp_customize->add_section( 'wishful_blog_site_logo_section', array(
    'priority'     => 10,
    'title'        => esc_html__( 'Site Logo', 'wishful-blog' ),
    'panel'        => 'wishful_blog_header_options',
) );

//Option : Site Title Padding Top
$wp_customize->add_setting( 'wishful_blog_site_title_padding_top', array(
    'sanitize_callback'   => 'sanitize_text_field',
    'default'             => '15px',
) );

$wp_customize->add_control( 'wishful_blog_site_title_padding_top', array(
    'label'                    => esc_html__('Padding Top', 'wishful-blog' ),
    'description'              => esc_html__( 'You have to use in px. Eg: 20px.', 'wishful-blog' ),
    'section'                  => 'wishful_blog_site_logo_section',
    'type'                     => 'text',
) );

//Option : Site Title Padding Bottom
$wp_customize->add_setting( 'wishful_blog_site_title_padding_bottom', array(
    'sanitize_callback'   => 'sanitize_text_field',
    'default'             => '15px',
) );

$wp_customize->add_control( 'wishful_blog_site_title_padding_bottom', array(
    'label'                    => esc_html__('Padding Bottom', 'wishful-blog' ),
    'description'              => esc_html__( 'You have to use in px. Eg: 20px.', 'wishful-blog' ),
    'section'                  => 'wishful_blog_site_logo_section',
    'type'                     => 'text',
) );

//Option : Site Title Font Family
$wp_customize->add_setting( 'wishful_blog_font_family_site_title_typography', array(
    'sanitize_callback'   => 'sanitize_text_field',
    'default'             => 'Poppins:400,600,700,900',
) );

$wp_customize->add_control( 'wishful_blog_font_family_site_title_typography', array(
    'label'                    => esc_html__('Site Title Font Family', 'wishful-blog' ),
    'section'                  => 'wishful_blog_site_logo_section',
    'type'                     => 'select',
    'choices'                  => $fonts,
) );

//Option : Site Title Font Weight
$wp_customize->add_setting( 'wishful_blog_font_weight_site_title_typography', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_select',
    'default'             => '700_w',
) );

$wp_customize->add_control( 'wishful_blog_font_weight_site_title_typography', array(
    'label'                    => esc_html__('Site Title Font Weight', 'wishful-blog' ),
    'section'                  => 'wishful_blog_site_logo_section',
    'type'                     => 'select',
    'choices'                  => $font_weight,
) );

//Option : Site Title Font Size
$wp_customize->add_setting( 'wishful_blog_font_size_site_title_typography', array(
    'sanitize_callback'   => 'sanitize_text_field',
    'default'             => '38px',
) );

$wp_customize->add_control( 'wishful_blog_font_size_site_title_typography', array(
    'label'                    => esc_html__('Site Title Font Size', 'wishful-blog' ),
    'description'              => esc_html__( 'You can set font size in pixel or normal. Eg: 24px, 1.3em etc.', 'wishful-blog' ),
    'section'                  => 'wishful_blog_site_logo_section',
    'type'                     => 'text',
) );

/*-----------------------------------------------------------------------------
							HEADER SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Header
$wp_customize->add_section( 'wishful_blog_header_section', array(
    'priority'     => 10,
    'title'        => esc_html__( 'Main Header', 'wishful-blog' ),
    'panel'        => 'wishful_blog_header_options',
) );

//Option : Header image opacity
$wp_customize->add_setting( 'wishful_blog_header_image_opacity', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_range',
    'default'             => '8',
) );

$wp_customize->add_control( 'wishful_blog_header_image_opacity', array(
    'label'                    => esc_html__('Header Image Opacity', 'wishful-blog' ),
    'description'              => esc_html__( 'You can set opacity from 0 to 10', 'wishful-blog' ),
    'section'                  => 'wishful_blog_header_section',
    'input_attrs'              => array(
        'min'  => 0,
        'max'  => 10,
        'step' => 1,
    ),
    'type'                     => 'number',
) );

//Option : Enable Sticky Header
$wp_customize->add_setting( 'wishful_blog_enable_sticky_header', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_enable_sticky_header', array(
    'label'                  => esc_html__( 'Enable Sticky Header', 'wishful-blog' ),
    'section'                => 'wishful_blog_header_section',
    'type'                   => 'checkbox',
) );

$wp_customize->add_setting( 'wishful_blog_enable_header_image_img', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 0,
) );


$wp_customize->add_control( 'wishful_blog_enable_header_image_img', array(
    'label'                  => esc_html__( 'Enable Header IMG Tag', 'wishful-blog' ),
    'section'                => 'wishful_blog_header_section',
    'type'                   => 'checkbox',
) );

//Option : Enable Social Links For Header Layout One
$wp_customize->add_setting( 'wishful_blog_enable_header_social_links', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_enable_header_social_links', array(
    'label'                  => esc_html__( 'Enable Social Links', 'wishful-blog' ),
    'section'                => 'wishful_blog_header_section',
    'type'                   => 'checkbox',
) );

//Option : Enable Search Button
$wp_customize->add_setting( 'wishful_blog_enable_header_search_button', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_enable_header_search_button', array(
    'label'        => esc_html__( 'Enable Search Button', 'wishful-blog' ),
    'section'      => 'wishful_blog_header_section',
    'type'         => 'checkbox',
) );

//Option : Enable User Registraion/Login Icon
$wp_customize->add_setting( 'wishful_blog_enable_header_user_icon', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 0,
) );

$wp_customize->add_control( 'wishful_blog_enable_header_user_icon', array(
    'label'        => esc_html__( 'Display User Login/Register Icon', 'wishful-blog' ),
    'section'      => 'wishful_blog_header_section',
    'type'         => 'checkbox',
) );

//Option : User Register Text
$wp_customize->add_setting( 'wishful_blog_header_user_register_text', array(
    'sanitize_callback'        => 'sanitize_text_field',
    'default'                  => 'Sign Up',
) );

$wp_customize->add_control( 'wishful_blog_header_user_register_text', array(
    'label'                    => esc_html__( 'User Register Text', 'wishful-blog' ),
    'section'                  => 'wishful_blog_header_section',
    'type'                     => 'text',
    'active_callback'          => 'wishful_blog_is_active_header_user_icon',
) );

//Option : User Login Text
$wp_customize->add_setting( 'wishful_blog_header_user_login_text', array(
    'sanitize_callback'        => 'sanitize_text_field',
    'default'                  => 'Log In',
) );

$wp_customize->add_control( 'wishful_blog_header_user_login_text', array(
    'label'                    => esc_html__( 'User Login Text', 'wishful-blog' ),
    'section'                  => 'wishful_blog_header_section',
    'type'                     => 'text',
    'active_callback'          => 'wishful_blog_is_active_header_user_icon',
) );

//Option : User Lost Password Text
$wp_customize->add_setting( 'wishful_blog_header_user_lost_password_text', array(
    'sanitize_callback'        => 'sanitize_text_field',
    'default'                  => 'Reset Password',
) );

$wp_customize->add_control( 'wishful_blog_header_user_lost_password_text', array(
    'label'                    => esc_html__( 'User Lost Password Text', 'wishful-blog' ),
    'section'                  => 'wishful_blog_header_section',
    'type'                     => 'text',
    'active_callback'          => 'wishful_blog_is_active_header_user_icon',
) );

//Option : User Edit Profile Text
$wp_customize->add_setting( 'wishful_blog_header_user_edit_profile_text', array(
    'sanitize_callback'        => 'sanitize_text_field',
    'default'                  => 'Edit Profile',
) );

$wp_customize->add_control( 'wishful_blog_header_user_edit_profile_text', array(
    'label'                    => esc_html__( 'User Edit Profile Text', 'wishful-blog' ),
    'section'                  => 'wishful_blog_header_section',
    'type'                     => 'text',
    'active_callback'          => 'wishful_blog_is_active_header_user_icon',
) );

//Option : User Logout Text
$wp_customize->add_setting( 'wishful_blog_header_user_logout_text', array(
    'sanitize_callback'        => 'sanitize_text_field',
    'default'                  => 'Log Out',
) );

$wp_customize->add_control( 'wishful_blog_header_user_logout_text', array(
    'label'                    => esc_html__( 'User Logout Text', 'wishful-blog' ),
    'section'                  => 'wishful_blog_header_section',
    'type'                     => 'text',
    'active_callback'          => 'wishful_blog_is_active_header_user_icon',
) );

if ( class_exists('WooCommerce') ) {

    //Option : Enable woo cart icon for header
    $wp_customize->add_setting( 'wishful_blog_enable_header_woo_cart', array(
        'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
        'default'             => 1,
    ) );

    $wp_customize->add_control( 'wishful_blog_enable_header_woo_cart', array(
        'label'                  => esc_html__( 'Enable WooCommerce Cart', 'wishful-blog' ),
        'section'                => 'wishful_blog_header_section',
        'type'                   => 'checkbox',
    ) );

}



/*-----------------------------------------------------------------------------
							BANNER SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Banner
$wp_customize->add_section( 'wishful_blog_banner_options', array(
    'priority'      => 6,
    'title'         => esc_html__( 'Banner Options', 'wishful-blog' ),
) );

//Option : Enable Banner Section
$wp_customize->add_setting( 'wishful_blog_enable_banner', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 0,
) );

$wp_customize->add_control( 'wishful_blog_enable_banner', array(
    'label'         => esc_html__( 'Enable Banner Section', 'wishful-blog' ),
    'section'       => 'wishful_blog_banner_options',
    'type'          => 'checkbox',
) );

//Option : Banner Layout
$wp_customize->add_setting( 'wishful_blog_banner_layout', array(
    'sanitize_callback'       => 'wishful_blog_sanitize_select',
    'default'                 => 'banner_one',
) );

$wp_customize->add_control( 'wishful_blog_banner_layout', array(
    'label'                   => esc_html__( 'Select Banner Layout', 'wishful-blog' ),
    'description'             => esc_html__( 'Posts must have featured image in order to display content.', 'wishful-blog' ),
    'section'                 => 'wishful_blog_banner_options',
    'type'                    => 'select',
    'choices'                 => $banner_layouts,
    'active_callback'         => 'wishful_blog_is_active_banner',
) );

//Option : Banner Posts Category
$wp_customize->add_setting( 'wishful_blog_banner_posts_categories', array(
    'sanitize_callback'       => 'wishful_blog_sanitize_select',
    'default'                 => '0',
) );

$wp_customize->add_control( 'wishful_blog_banner_posts_categories', array(
    'label'                   => esc_html__( 'Select Post Category', 'wishful-blog' ),
    'section'                 => 'wishful_blog_banner_options',
    'type'                    => 'select',
    'choices'                 => $categories,
    'active_callback'         => 'wishful_blog_is_active_banner',
) );

//Option : Banner Posts Type
$wp_customize->add_setting( 'wishful_blog_banner_posts_type', array(
    'sanitize_callback'       => 'wishful_blog_sanitize_select',
    'default'                 => 'recent_posts',
) );

$wp_customize->add_control( 'wishful_blog_banner_posts_type', array(
    'label'                   => esc_html__( 'Select Post Type', 'wishful-blog' ),
    'section'                 => 'wishful_blog_banner_options',
    'type'                    => 'select',
    'choices'                 => $posts_type,
    'active_callback'         => 'wishful_blog_is_active_banner',
) );

//Option : Banner Posts Number
$wp_customize->add_setting( 'wishful_blog_banner_posts_no', array(
    'sanitize_callback'        => 'wishful_blog_sanitize_range',
    'default'                  => 3,
) );

$wp_customize->add_control( 'wishful_blog_banner_posts_no', array(
    'label'                    => esc_html__( 'Number of Posts', 'wishful-blog' ),
    'description'              => $banner_posts_no_description,
    'section'                  => 'wishful_blog_banner_options',
    'type'                     => 'number',
    'input_attrs'              => $banner_posts_no,
    'active_callback'          => 'wishful_blog_is_active_banner_layout_two',
) );

//Option : Banner Button Title
$wp_customize->add_setting( 'wishful_blog_banner_button_title', array(
    'sanitize_callback'        => 'sanitize_text_field',
    'default'                  => 'Read More',
) );

$wp_customize->add_control( 'wishful_blog_banner_button_title', array(
    'label'                    => esc_html__( 'Button Title', 'wishful-blog' ),
    'section'                  => 'wishful_blog_banner_options',
    'type'                     => 'text',
    'active_callback'          => 'wishful_blog_is_active_banner',
) );

//Option : Enable Banner Fallback Image
$wp_customize->add_setting( 'wishful_blog_enable_banner_fallback_image', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_enable_banner_fallback_image', array(
    'label'                    => esc_html__( 'Enable Fallback Image in Banner', 'wishful-blog' ),
    'section'                  => 'wishful_blog_banner_options',
    'type'                     => 'checkbox',
    'active_callback'          => 'wishful_blog_is_active_banner',
) );

//Option : Display Banner Category
$wp_customize->add_setting( 'wishful_blog_display_banner_category', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_banner_category', array(
    'label'                    => esc_html__( 'Display Category', 'wishful-blog' ),
    'section'                  => 'wishful_blog_banner_options',
    'type'                     => 'checkbox',
    'active_callback'          => 'wishful_blog_is_active_banner',
) );



/*-----------------------------------------------------------------------------
				        HOMEPAGE POST LAYOUT SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Homepage Post Layout
$wp_customize->add_section( 'wishful_blog_homepage_post_layout_options', array(
    'priority'      => 6,
    'title'         => esc_html__( 'Homepage Options', 'wishful-blog' ),
) );

//Option : Homepage Post Layout
$wp_customize->add_setting( 'wishful_blog_homepage_post_layout', array(
    'sanitize_callback'       => 'wishful_blog_sanitize_select',
    'default'                 => 'post_layout_three',
) );

$wp_customize->add_control( 'wishful_blog_homepage_post_layout', array(
    'label'                   => esc_html__( 'Select Post Listing Layout', 'wishful-blog' ),
    'section'                 => 'wishful_blog_homepage_post_layout_options',
    'type'                    => 'select',
    'choices'                 => $post_layouts,
    'priority'                 => '5',
) );

//Option : Homepage Post Style
$wp_customize->add_setting( 'wishful_blog_homepage_post_style', array(
    'sanitize_callback'       => 'wishful_blog_sanitize_select',
    'default'                 => 'style_one',
) );

$wp_customize->add_control( 'wishful_blog_homepage_post_style', array(
    'label'                   => esc_html__( 'Select Post Listing Style', 'wishful-blog' ),
    'section'                 => 'wishful_blog_homepage_post_layout_options',
    'type'                    => 'select',
    'choices'                 => $post_styles,
    'active_callback'         => 'wishful_blog_is_active_homepage_post_listing_grid',
    'priority'                 => '10',
) );

//Option : Homepage Sidebar Position
$wp_customize->add_setting( 'wishful_blog_homepage_sidebar_position', array(
    'sanitize_callback'       => 'wishful_blog_sanitize_select',
    'default'                 => 'right',
) );

$wp_customize->add_control( 'wishful_blog_homepage_sidebar_position', array(
    'label'                   => esc_html__( 'Select Sidebar Position', 'wishful-blog' ),
    'section'                 => 'wishful_blog_homepage_post_layout_options',
    'type'                    => 'select',
    'choices'                 => $sidebar_position,
    'priority'                 => '15',
) );

//Option : Homepage Read More Text
$wp_customize->add_setting( 'wishful_blog_homepage_readmore_text', array(
    'sanitize_callback'        => 'sanitize_text_field',
    'default'                  => 'Read More',
) );

$wp_customize->add_control( 'wishful_blog_homepage_readmore_text', array(
    'label'                    => esc_html__( 'Button Text', 'wishful-blog' ),
    'section'                  => 'wishful_blog_homepage_post_layout_options',
    'type'                     => 'text',
    'priority'                 => '20',
) );

//Option : Display Homepage Category
$wp_customize->add_setting( 'wishful_blog_display_homepage_category', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_homepage_category', array(
    'label'                    => esc_html__( 'Display Category', 'wishful-blog' ),
    'section'                  => 'wishful_blog_homepage_post_layout_options',
    'type'                     => 'checkbox',
    'priority'                 => '25',
) );

//Option : Display Homepage Author
$wp_customize->add_setting( 'wishful_blog_display_homepage_author', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_homepage_author', array(
    'label'                    => esc_html__( 'Display Post Author', 'wishful-blog' ),
    'section'                  => 'wishful_blog_homepage_post_layout_options',
    'type'                     => 'checkbox',
    'priority'                 => '30',
) );

//Option : Display Homepage Posted Date
$wp_customize->add_setting( 'wishful_blog_display_homepage_date', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_homepage_date', array(
    'label'                    => esc_html__( 'Display Posted Date', 'wishful-blog' ),
    'section'                  => 'wishful_blog_homepage_post_layout_options',
    'type'                     => 'checkbox',
    'priority'                 => '35',
) );



/*-----------------------------------------------------------------------------
							SITE PAGES OPTIONS PANEL
-----------------------------------------------------------------------------*/

//Site Pages Panel
$wp_customize->add_panel( 'wishful_blog_site_pages_options', array(
    'title'        => esc_html__( 'Site Pages Options', 'wishful-blog' ),
    'priority'     => 10,
) );


/*-----------------------------------------------------------------------------
							ARCHIVE POST LAYOUT SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Archive Post Layout
$wp_customize->add_section( 'wishful_blog_archive_post_layout_options', array(
    'priority'      => 10,
    'title'         => esc_html__( 'Archive Page', 'wishful-blog' ),
    'panel'         => 'wishful_blog_site_pages_options',
) );

//Option : Archive Post Layout
$wp_customize->add_setting( 'wishful_blog_archive_post_layout', array(
    'sanitize_callback'       => 'wishful_blog_sanitize_select',
    'default'                 => 'post_layout_three',
) );

$wp_customize->add_control( 'wishful_blog_archive_post_layout', array(
    'label'                   => esc_html__( 'Select Post Listing Layout', 'wishful-blog' ),
    'section'                 => 'wishful_blog_archive_post_layout_options',
    'type'                    => 'select',
    'choices'                 => $post_layouts,
    'priority'                 => '5',
) );

//Option : Archive Post Style
$wp_customize->add_setting( 'wishful_blog_archive_post_style', array(
    'sanitize_callback'       => 'wishful_blog_sanitize_select',
    'default'                 => 'style_one',
) );

$wp_customize->add_control( 'wishful_blog_archive_post_style', array(
    'label'                   => esc_html__( 'Select Post Listing Style', 'wishful-blog' ),
    'section'                 => 'wishful_blog_archive_post_layout_options',
    'type'                    => 'select',
    'choices'                 => $post_styles,
    'active_callback'         => 'wishful_blog_is_active_archive_post_listing_grid',
    'priority'                 => '10',
) );

//Option : Archive Sidebar Position
$wp_customize->add_setting( 'wishful_blog_archive_sidebar_position', array(
    'sanitize_callback'       => 'wishful_blog_sanitize_select',
    'default'                 => 'right',
) );

$wp_customize->add_control( 'wishful_blog_archive_sidebar_position', array(
    'label'                   => esc_html__( 'Select Sidebar Position', 'wishful-blog' ),
    'section'                 => 'wishful_blog_archive_post_layout_options',
    'type'                    => 'select',
    'choices'                 => $sidebar_position,
    'priority'                 => '15',
) );

//Option : Archive Read More Text
$wp_customize->add_setting( 'wishful_blog_archive_readmore_text', array(
    'sanitize_callback'        => 'sanitize_text_field',
    'default'                  => 'Read More',
) );

$wp_customize->add_control( 'wishful_blog_archive_readmore_text', array(
    'label'                    => esc_html__( 'Button Text', 'wishful-blog' ),
    'section'                  => 'wishful_blog_archive_post_layout_options',
    'type'                     => 'text',
    'priority'                 => '20',
) );

//Option : Display Archive Category
$wp_customize->add_setting( 'wishful_blog_display_archive_category', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_archive_category', array(
    'label'                    => esc_html__( 'Display Category', 'wishful-blog' ),
    'section'                  => 'wishful_blog_archive_post_layout_options',
    'type'                     => 'checkbox',
    'priority'                 => '25',
) );

//Option : Display Archive Author
$wp_customize->add_setting( 'wishful_blog_display_archive_author', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_archive_author', array(
    'label'                    => esc_html__( 'Display Post Author', 'wishful-blog' ),
    'section'                  => 'wishful_blog_archive_post_layout_options',
    'type'                     => 'checkbox',
    'priority'                 => '30',
) );

//Option : Display Archive Posted Date
$wp_customize->add_setting( 'wishful_blog_display_archive_date', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_archive_date', array(
    'label'                    => esc_html__( 'Display Posted Date', 'wishful-blog' ),
    'section'                  => 'wishful_blog_archive_post_layout_options',
    'type'                     => 'checkbox',
    'priority'                 => '35',
) );



/*-----------------------------------------------------------------------------
							SEARCH POST LAYOUT SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Search Post Layout
$wp_customize->add_section( 'wishful_blog_search_post_layout_options', array(
    'priority'      => 10,
    'title'         => esc_html__( 'Search Page', 'wishful-blog' ),
    'panel'         => 'wishful_blog_site_pages_options',
) );

//Option : Search Post Layout
$wp_customize->add_setting( 'wishful_blog_search_post_layout', array(
    'sanitize_callback'       => 'wishful_blog_sanitize_select',
    'default'                 => 'post_layout_three',
) );

$wp_customize->add_control( 'wishful_blog_search_post_layout', array(
    'label'                   => esc_html__( 'Select Post Listing Layout', 'wishful-blog' ),
    'section'                 => 'wishful_blog_search_post_layout_options',
    'type'                    => 'select',
    'choices'                 => $post_layouts,
    'priority'                 => '5',
) );

//Option : Search Post Style
$wp_customize->add_setting( 'wishful_blog_search_post_style', array(
    'sanitize_callback'       => 'wishful_blog_sanitize_select',
    'default'                 => 'style_one',
) );

$wp_customize->add_control( 'wishful_blog_search_post_style', array(
    'label'                   => esc_html__( 'Select Post Listing Style', 'wishful-blog' ),
    'section'                 => 'wishful_blog_search_post_layout_options',
    'type'                    => 'select',
    'choices'                 => $post_styles,
    'active_callback'         => 'wishful_blog_is_active_search_post_listing_grid',
    'priority'                 => '10',
) );

//Option : Search Sidebar Position
$wp_customize->add_setting( 'wishful_blog_search_sidebar_position', array(
    'sanitize_callback'       => 'wishful_blog_sanitize_select',
    'default'                 => 'right',
) );

$wp_customize->add_control( 'wishful_blog_search_sidebar_position', array(
    'label'                   => esc_html__( 'Select Sidebar Position', 'wishful-blog' ),
    'section'                 => 'wishful_blog_search_post_layout_options',
    'type'                    => 'select',
    'choices'                 => $sidebar_position,
    'priority'                 => '15',
) );

//Option : Search Read More Text
$wp_customize->add_setting( 'wishful_blog_search_readmore_text', array(
    'sanitize_callback'        => 'sanitize_text_field',
    'default'                  => 'Read More',
) );

$wp_customize->add_control( 'wishful_blog_search_readmore_text', array(
    'label'                    => esc_html__( 'Button Text', 'wishful-blog' ),
    'section'                  => 'wishful_blog_search_post_layout_options',
    'type'                     => 'text',
    'priority'                 => '20',
) );

//Option : Display Search Category
$wp_customize->add_setting( 'wishful_blog_display_search_category', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_search_category', array(
    'label'                    => esc_html__( 'Display Category', 'wishful-blog' ),
    'section'                  => 'wishful_blog_search_post_layout_options',
    'type'                     => 'checkbox',
    'priority'                 => '25',
) );

//Option : Display Search Author
$wp_customize->add_setting( 'wishful_blog_display_search_author', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_search_author', array(
    'label'                    => esc_html__( 'Display Post Author', 'wishful-blog' ),
    'section'                  => 'wishful_blog_search_post_layout_options',
    'type'                     => 'checkbox',
    'priority'                 => '30',
) );

//Option : Display Search Posted Date
$wp_customize->add_setting( 'wishful_blog_display_search_date', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_search_date', array(
    'label'                    => esc_html__( 'Display Posted Date', 'wishful-blog' ),
    'section'                  => 'wishful_blog_search_post_layout_options',
    'type'                     => 'checkbox',
    'priority'                 => '35',
) );



/*-----------------------------------------------------------------------------
							SINGLE POST SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Single Post
$wp_customize->add_section( 'wishful_blog_single_post_options', array(
    'priority'      => 10,
    'title'         => esc_html__( 'Single Post', 'wishful-blog' ),
    'panel'         => 'wishful_blog_site_pages_options',
) );

//Option : Display Single Post Category
$wp_customize->add_setting( 'wishful_blog_display_single_post_category', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_single_post_category', array(
    'label'                    => esc_html__( 'Display Category', 'wishful-blog' ),
    'section'                  => 'wishful_blog_single_post_options',
    'type'                     => 'checkbox',
) );

//Option : Display Single Post Author
$wp_customize->add_setting( 'wishful_blog_display_single_post_author', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_single_post_author', array(
    'label'                    => esc_html__( 'Display Post Author', 'wishful-blog' ),
    'section'                  => 'wishful_blog_single_post_options',
    'type'                     => 'checkbox',
) );

//Option : Display Single Post Posted Date
$wp_customize->add_setting( 'wishful_blog_display_single_post_date', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_single_post_date', array(
    'label'                    => esc_html__( 'Display Posted Date', 'wishful-blog' ),
    'section'                  => 'wishful_blog_single_post_options',
    'type'                     => 'checkbox',
) );

//Option : Display Single Post Author Box
$wp_customize->add_setting( 'wishful_blog_display_single_post_author_box', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_single_post_author_box', array(
    'label'                    => esc_html__( 'Display Author Box', 'wishful-blog' ),
    'section'                  => 'wishful_blog_single_post_options',
    'type'                     => 'checkbox',
) );

//Option : Display Related Posts
$wp_customize->add_setting( 'wishful_blog_display_related_posts', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 1,
) );

$wp_customize->add_control( 'wishful_blog_display_related_posts', array(
    'label'                    => esc_html__( 'Display Related Posts', 'wishful-blog' ),
    'section'                  => 'wishful_blog_single_post_options',
    'type'                     => 'checkbox',
) );

//Option : Related Post Title
$wp_customize->add_setting( 'wishful_blog_related_posts_title', array(
    'sanitize_callback'        => 'sanitize_text_field',
    'default'                  => 'Related Posts',
) );

$wp_customize->add_control( 'wishful_blog_related_posts_title', array(
    'label'                    => esc_html__( 'Related Posts : Title', 'wishful-blog' ),
    'section'                  => 'wishful_blog_single_post_options',
    'type'                     => 'text',
    'active_callback'          => 'wishful_blog_is_active_related_posts',
) );

//Option : Select Related Posts Meta
$wp_customize->add_setting( 'wishful_blog_display_related_posts_meta', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_select',
    'default'             => 'category',
) );

$wp_customize->add_control( 'wishful_blog_display_related_posts_meta', array(
    'label'                    => esc_html__( 'Related Posts : Meta Options', 'wishful-blog' ),
    'section'                  => 'wishful_blog_single_post_options',
    'type'                     => 'select',
    'choices'                  => $display_metas,
    'active_callback'          => 'wishful_blog_is_active_related_posts',
) );


/*-----------------------------------------------------------------------------
							PAGINATION OPTIONS
-----------------------------------------------------------------------------*/

//Pagination Panel
$wp_customize->add_panel( 'wishful_blog_pagination_options', array(
    'title'        => esc_html__( 'Pagination Options', 'wishful-blog' ),
    'priority'     => 15,
) );

//Section Pagination Options
$wp_customize->add_section( 'wishful_blog_pagination_sections', array(
    'priority'      => 5,
    'title'         => esc_html__( 'Pagination Setting', 'wishful-blog' ),
    'panel'         => 'wishful_blog_pagination_options',
) );

//Option : Pagination mid size
$wp_customize->add_setting( 'wishful_blog_pagination_mid_size', array(
    'sanitize_callback'        => 'wishful_blog_sanitize_range',
    'default'                  => 2,
) );

$wp_customize->add_control( 'wishful_blog_pagination_mid_size', array(
    'label'                    => esc_html__( 'Paination Middle Size', 'wishful-blog' ),
    'description'              => esc_html__( 'Sets numbers to either side of current page, but not including current page. Maximum 5 and minimum 0 can be set.', 'wishful-blog' ),
    'section'                  => 'wishful_blog_pagination_sections',
    'type'                     => 'number',
    'input_attrs'              => array(
        'min'    => 0,
        'max'    => 5,
    ),
    'priority'      => 5,
) );

//Option : Pagination Format
$wp_customize->add_setting( 'wishful_blog_pagination_format', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_select',
    'default'             => 'format-one',
) );

$wp_customize->add_control( 'wishful_blog_pagination_format', array(
    'label'         => esc_html__( 'Pagination Format', 'wishful-blog' ),
    'section'       => 'wishful_blog_pagination_sections',
    'type'          => 'select',
    'choices'       => $pagination_format,
    'priority'      => 5,
) );

//Option : Pagination Previous text
$wp_customize->add_setting( 'wishful_blog_pagination_previous_text', array(
    'sanitize_callback'        => 'sanitize_text_field',
    'default'                  => 'Prev',
) );

$wp_customize->add_control( 'wishful_blog_pagination_previous_text', array(
    'label'                    => esc_html__( 'Previous Text', 'wishful-blog' ),
    'section'                  => 'wishful_blog_pagination_sections',
    'type'                     => 'text',
    'active_callback'          => 'wishful_blog_is_active_pagination_format_one',
) );

//Option : Pagination Next text
$wp_customize->add_setting( 'wishful_blog_pagination_next_text', array(
    'sanitize_callback'        => 'sanitize_text_field',
    'default'                  => 'Next',
) );

$wp_customize->add_control( 'wishful_blog_pagination_next_text', array(
    'label'                    => esc_html__( 'Next Text', 'wishful-blog' ),
    'section'                  => 'wishful_blog_pagination_sections',
    'type'                     => 'text',
    'active_callback'          => 'wishful_blog_is_active_pagination_format_one',
) );



/*-----------------------------------------------------------------------------
							FOOTER SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Footer
$wp_customize->add_section( 'wishful_blog_footer_options', array(
    'priority'      => 20,
    'title'         => esc_html__( 'Footer Options', 'wishful-blog' ),
) );

//Option : Footer Color Mode
$wp_customize->add_setting( 'wishful_blog_footer_color_mode', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_select',
    'default'             => 'footer-light',
) );

$wp_customize->add_control( 'wishful_blog_footer_color_mode', array(
    'label'         => esc_html__( 'Footer Color Mode', 'wishful-blog' ),
    'section'       => 'wishful_blog_footer_options',
    'type'          => 'select',
    'choices'       => $footer_color_mode,
    'priority'      => 5,
) );

//Option : Enable Footer Social Links
$wp_customize->add_setting( 'wishful_blog_enable_footer_social_links', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_checkbox',
    'default'             => 0,
) );

$wp_customize->add_control( 'wishful_blog_enable_footer_social_links', array(
    'label'         => esc_html__( 'Enable Social Links', 'wishful-blog' ),
    'section'       => 'wishful_blog_footer_options',
    'type'          => 'checkbox',
    'priority'      => 5,
) );

//Option : Footer Copyright Text
$wp_customize->add_setting( 'wishful_blog_footer_copyright_text', array(
    'sanitize_callback'        => 'wishful_blog_sanitize_copyright_credit',
    'default'                  => 'Copyright',
) );

$wp_customize->add_control( 'wishful_blog_footer_copyright_text', array(
    'label'                    => esc_html__( 'Copyright & Credit Text', 'wishful-blog' ),
    'description'		       => esc_html__( 'You can use <a> & <span> tags with the copyright and credit text.', 'wishful-blog' ),
    'section'                  => 'wishful_blog_footer_options',
    'type'                     => 'text',
    'priority'                 => 15,
) );

/*-----------------------------------------------------------------------------
							NEWSLETTER OPTIONS PANEL
-----------------------------------------------------------------------------*/

//Newsletter Options Panel
$wp_customize->add_panel( 'wishful_blog_newsletter_options', array(
    'title'        => esc_html__( 'Newsletter Options', 'wishful-blog' ),
    'priority'     => 20,
) );

/*-----------------------------------------------------------------------------
							NEWSLETTER TYPOGRAPHY SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Newsletter typography
$wp_customize->add_section( 'wishful_blog_newsletter_typography_options', array(
    'priority'      => 10,
    'title'         => esc_html__( 'Typography', 'wishful-blog' ),
    'description'  => esc_html__( 'You need to install Email Capture &amp; Lead Generation plugin for this option.', 'wishful-blog' ),
    'panel'         => 'wishful_blog_newsletter_options',
) );

/*------------------------- Title Typography -------------------------*/

//Option : Newsletter Title Font Family
$wp_customize->add_setting( 'wishful_blog_font_family_newsletter_title_typography', array(
    'sanitize_callback'   => 'sanitize_text_field',
    'default'             => 'Ubuntu:400,400i,500,500i,700,700i',
) );

$wp_customize->add_control( 'wishful_blog_font_family_newsletter_title_typography', array(
    'label'                    => esc_html__('Title Font Family', 'wishful-blog' ),
    'section'                  => 'wishful_blog_newsletter_typography_options',
    'type'                     => 'select',
    'choices'                  => $fonts,
) );

//Option : Newsletter Title Font Weight
$wp_customize->add_setting( 'wishful_blog_font_weight_newsletter_title_typography', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_select',
    'default'             => '700_w',
) );

$wp_customize->add_control( 'wishful_blog_font_weight_newsletter_title_typography', array(
    'label'                    => esc_html__('Title Font Weight', 'wishful-blog' ),
    'section'                  => 'wishful_blog_newsletter_typography_options',
    'type'                     => 'select',
    'choices'                  => $font_weight,
) );

//Option : Newsletter Title Font Size
$wp_customize->add_setting( 'wishful_blog_font_size_newsletter_title_typography', array(
    'sanitize_callback'   => 'sanitize_text_field',
    'default'             => '30px',
) );

$wp_customize->add_control( 'wishful_blog_font_size_newsletter_title_typography', array(
    'label'                    => esc_html__('Title Font Size', 'wishful-blog' ),
    'description'              => esc_html__( 'You can set font size in pixel or normal. Eg: 24px, 1.3em etc.', 'wishful-blog' ),
    'section'                  => 'wishful_blog_newsletter_typography_options',
    'type'                     => 'text',
) );

/*------------------------- Button Typography -------------------------*/

//Option : Newsletter Button Font Family
$wp_customize->add_setting( 'wishful_blog_font_family_newsletter_button_typography', array(
    'sanitize_callback'   => 'sanitize_text_field',
    'default'             => 'Ubuntu:400,400i,500,500i,700,700i',
) );

$wp_customize->add_control( 'wishful_blog_font_family_newsletter_button_typography', array(
    'label'                    => esc_html__('Button Font Family', 'wishful-blog' ),
    'section'                  => 'wishful_blog_newsletter_typography_options',
    'type'                     => 'select',
    'choices'                  => $fonts,
) );

//Option : Newsletter Button Font Weight
$wp_customize->add_setting( 'wishful_blog_font_weight_newsletter_button_typography', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_select',
    'default'             => '400_w',
) );

$wp_customize->add_control( 'wishful_blog_font_weight_newsletter_button_typography', array(
    'label'                    => esc_html__('Button Font Weight', 'wishful-blog' ),
    'section'                  => 'wishful_blog_newsletter_typography_options',
    'type'                     => 'select',
    'choices'                  => $font_weight,
) );

//Option : Newsletter Button Font Size
$wp_customize->add_setting( 'wishful_blog_font_size_newsletter_button_typography', array(
    'sanitize_callback'   => 'sanitize_text_field',
    'default'             => '16px',
) );

$wp_customize->add_control( 'wishful_blog_font_size_newsletter_button_typography', array(
    'label'                    => esc_html__('Button Font Size', 'wishful-blog' ),
    'description'              => esc_html__( 'You can set font size in pixel or normal. Eg: 24px, 1.3em etc.', 'wishful-blog' ),
    'section'                  => 'wishful_blog_newsletter_typography_options',
    'type'                     => 'text',
) );

/*-----------------------------------------------------------------------------
							NEWSLETTER COLOR SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Newsletter typography
$wp_customize->add_section( 'wishful_blog_newsletter_color_options', array(
    'priority'      => 10,
    'title'         => esc_html__( 'Color', 'wishful-blog' ),
    'description'  => esc_html__( 'You need to install Email Capture &amp; Lead Generation plugin for this option.', 'wishful-blog' ),
    'panel'         => 'wishful_blog_newsletter_options',
) );

//Option : Background Color
$wp_customize->add_setting( 'wishful_blog_newsletter_background_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#fcb811',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_newsletter_background_color', array(
    'label'                    => esc_html__('Background Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_newsletter_color_options',
) ) );

//Option : Title Color
$wp_customize->add_setting( 'wishful_blog_newsletter_title_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#fff',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_newsletter_title_color', array(
    'label'                    => esc_html__('Title Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_newsletter_color_options',
) ) );

//Option : Label Color
$wp_customize->add_setting( 'wishful_blog_newsletter_label_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#444',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_newsletter_label_color', array(
    'label'                    => esc_html__('Label Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_newsletter_color_options',
) ) );

//Option : Button Text Color
$wp_customize->add_setting( 'wishful_blog_newsletter_button_text_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#fff',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_newsletter_button_text_color', array(
    'label'                    => esc_html__('Button Text Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_newsletter_color_options',
) ) );

//Option : Button Text Hover Color
$wp_customize->add_setting( 'wishful_blog_newsletter_button_text_hover_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#fff',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_newsletter_button_text_hover_color', array(
    'label'                    => esc_html__('Button Text Hover Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_newsletter_color_options',
) ) );

//Option : Button Background Color
$wp_customize->add_setting( 'wishful_blog_newsletter_button_background_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#d35400',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_newsletter_button_background_color', array(
    'label'                    => esc_html__('Button Background Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_newsletter_color_options',
) ) );

//Option : Button Background Hover Color
$wp_customize->add_setting( 'wishful_blog_newsletter_button_background_hover_color', array(
    'sanitize_callback'   => 'sanitize_hex_color',
    'default'             => '#333',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wishful_blog_newsletter_button_background_hover_color', array(
    'label'                    => esc_html__('Button Background Hover Color', 'wishful-blog' ),
    'section'                  => 'wishful_blog_newsletter_color_options',
) ) );

/*-----------------------------------------------------------------------------
							WOOCOMMERCE SECTION OPTIONS
-----------------------------------------------------------------------------*/

//Section Woocommerce
$wp_customize->add_section( 'wishful_blog_woocommerce_sidebar_options', array(
    'title'         => esc_html__( 'WooCommerce Sidebar', 'wishful-blog' ),
    'panel'			=> 'woocommerce'
) );

//Option : Woocommerce Sidebar Position
$wp_customize->add_setting( 'wishful_blog_woocommerce_sidebar_position', array(
    'sanitize_callback'   => 'wishful_blog_sanitize_select',
    'default'             => 'right',
) );

$wp_customize->add_control( 'wishful_blog_woocommerce_sidebar_position', array(
    'label'         => esc_html__( 'Select Sidebar Position', 'wishful-blog' ),
    'section'       => 'wishful_blog_woocommerce_sidebar_options',
    'type'          => 'select',
    'choices'       => $sidebar_position,
) );
