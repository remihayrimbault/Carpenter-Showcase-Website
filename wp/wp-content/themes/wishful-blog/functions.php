<?php
/**
 * wishful-blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wishful-blog
 */

if ( ! function_exists( 'wishful_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wishful_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wishful-blog, use a find and replace
		 * to change 'wishful-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wishful-blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        add_image_size( 'wishful-blog-thumbnail-one', 800, 600, true );
        add_image_size( 'wishful-blog-thumbnail-two', 1200, 900, true );
        add_image_size( 'wishful-blog-thumbnail-three', 900, 450, true );
        add_image_size( 'wishful-blog-thumbnail-four', 780, 600, true );
        add_image_size( 'wishful-blog-thumbnail-five', 390, 298, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wishful-blog' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wishful_blog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
         * Add editor CSS to style to the WordPress visual post / page editor.
         *
         * pulls in all of our front-end css.
         */
         add_editor_style('/wishfulthemes/admin/css/editor-style.css');

         // Add support for gutenberg
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );

        // WooCommerce support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
	}
endif;
add_action( 'after_setup_theme', 'wishful_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wishful_blog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wishful_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'wishful_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wishful_blog_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wishful-blog' ),
		'id'            => 'wishful-blog-sidebar',
		'description'   => esc_html__( 'Add widgets here for sidebar.', 'wishful-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    if( class_exists( 'WooCommerce' ) ) {

        register_sidebar( array(
            'name'          => esc_html__( 'WooCommerce Sidebar', 'wishful-blog' ),
            'id'            => 'wishful-blog-woocommerce-sidebar',
            'description'   => esc_html__( 'Add widgets here for sidebar.', 'wishful-blog' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
    }

    register_sidebar( array(
		'name'          => esc_html__( 'Homepage Top Widget Area', 'wishful-blog' ),
		'id'            => 'wishful-blog-homepage',
		'description'   => esc_html__( 'Add only homepage post widget here.', 'wishful-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    /*
    * Hook for pro widget area - 10
    */
    do_action( 'pro_widget_area' );

    register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area : Left', 'wishful-blog' ),
		'id'            => 'wishful-blog-footer-left',
		'description'   => esc_html__( 'Add widget here for Footer Widget Area : Left.', 'wishful-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area : Middle', 'wishful-blog' ),
		'id'            => 'wishful-blog-footer-middle',
		'description'   => esc_html__( 'Add widget here for Footer Widget Area : Middle.', 'wishful-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area : Right', 'wishful-blog' ),
		'id'            => 'wishful-blog-footer-right',
		'description'   => esc_html__( 'Add widget here for Footer Widget Area : Right.', 'wishful-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_widget( 'Wishful_Blog_Author_Widget' );

    register_widget( 'Wishful_Blog_Homepage_Post_Widget' );

    register_widget( 'Wishful_Blog_Post_Widget_Layout_One' );

    register_widget( 'Wishful_Blog_Post_Widget_Layout_Two' );

    register_widget( 'Wishful_Blog_Social_Widget' );

    register_widget( 'Wishful_Blog_Eclg_Newsletter_Widget' );
}
add_action( 'widgets_init', 'wishful_blog_widgets_init' );

/**
 * Enqueue scripts and styles for admin
 */

function wishful_blog_admin_enqueue_scripts() {

    wp_enqueue_style('wishful-blog-admin-style', get_template_directory_uri(). '/wishfulthemes/admin/css/admin-style.css');
}
add_action('admin_enqueue_scripts', 'wishful_blog_admin_enqueue_scripts');

/**
 * Enqueue scripts and styles.
 */
function wishful_blog_scripts() {
    //Styles
	wp_enqueue_style( 'wishful-blog-style', get_stylesheet_uri() );

	wp_enqueue_style( 'wishful-blog-fonts', wishful_blog_fonts_url() );

    wp_enqueue_style( 'wishful-blog-custom', get_template_directory_uri() . '/wishfulthemes/assets/css/custom.css' );

    wp_enqueue_style( 'wishful-blog-slick', get_template_directory_uri() . '/wishfulthemes/assets/slick/slick.css' );

    wp_enqueue_style( 'wishful-blog-slick-theme', get_template_directory_uri() . '/wishfulthemes/assets/slick/slick-theme.css' );

    //Scripts

	wp_enqueue_script( 'wishful-blog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), wp_get_theme()->get( 'Version' ), true );

    wp_enqueue_script( 'wishful-blog-custom', get_template_directory_uri() . '/wishfulthemes/assets/js/custom.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

    wp_enqueue_script( 'wishful-blog-function', get_template_directory_uri() . '/wishfulthemes/assets/js/functions.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

    wp_enqueue_script( 'wishful-blog-popper', get_template_directory_uri() . '/wishfulthemes/assets/js/popper.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

    wp_enqueue_script( 'wishful-blog-custom-functions', get_template_directory_uri() . '/wishfulthemes/assets/js/custom-functions.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

    wp_enqueue_script( 'wishful-blog-slick', get_template_directory_uri() . '/wishfulthemes/assets/slick/slick.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

	wp_enqueue_script( 'wishful-blog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), wp_get_theme()->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wishful_blog_scripts' );

/**
 * Load welcome section to admin.
 */
if ( is_admin() ) {
    require get_template_directory().'/inc/welcome/welcome.php';
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Customizer active callback.
 */
require get_template_directory() . '/inc/customizer/active-callback.php';

/**
 * Load Author Widget.
 */
require get_template_directory() . '/widgets/wishful-author-widget.php';

/**
 * Load Social Widget.
 */
require get_template_directory() . '/widgets/social-widget.php';

/**
 * Load Post Widget.
 */
require get_template_directory() . '/widgets/post-widget-layout-one.php';
require get_template_directory() . '/widgets/post-widget-layout-two.php';

/**
 * Load Homepage Post Widget.
 */
require get_template_directory() . '/widgets/homepage-post-widget.php';

/**
 * Load Newsletter Widget.
 */
require get_template_directory() . '/widgets/eclg-newsletter-widget.php';

/**
 * Adds Post Sidebar Metas.
 */
require get_template_directory() . '/inc/metabox/post-meta.php';

if ( class_exists( 'WooCommerce' ) ) {
	/**
	 * WooCommerce functions.
	 */
	require get_template_directory() . '/inc/woocommerce-functions.php';
}

