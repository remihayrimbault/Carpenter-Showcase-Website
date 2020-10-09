<?php
/**
 * Template part for displaying header one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
?>

<?php
 

if( has_header_image() ) {

    if ( get_theme_mod( 'wishful_blog_enable_header_image_img' )) {

        ?>
            <header class="container-fluid no-left-padding no-right-padding header_s header-fix header_s1 espwf">
                <div class="header-image-wrap">
            <img class="header-lmage" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>">
            </div>
            
        <?php
        
     }else

            {

            ?>
            <header class="container-fluid no-left-padding no-right-padding header_s header-fix header_s1" style="background-image: url( <?php header_image(); ?> );">
            <?php

            }
        

} else {
    ?>
    <header class="container-fluid no-left-padding no-right-padding header_s header-fix header_s1">
    <?php
}
?>
    <!-- Top Header -->
    <div class="container-fluid no-right-padding no-left-padding top-header">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                <?php
                    //template-functions for social links
                    wishful_blog_header_social_links_template('header');
                ?>
                </div>

                <div class="col-lg-4 logo-block">
                   <?php
                    the_custom_logo();
                    if ( is_front_page() && is_home() ) :
                        ?>
                        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                    else :
                        ?>
                        <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title"><?php bloginfo( 'name' ); ?></a></p>
                        <?php
                    endif;
                    $wishful_blog_description = get_bloginfo( 'description', 'display' );
                    if ( $wishful_blog_description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo $wishful_blog_description; /* WPCS: xss ok. */ ?></p>
                    <?php endif; ?>
                </div>
                <div class="col-lg-4 col-12">
                    <?php

                    $enable_header_search_button = get_theme_mod( 'wishful_blog_enable_header_search_button', 1 );
                    $enable_header_user_icon = get_theme_mod( 'wishful_blog_enable_header_user_icon', 0 );
                    $enable_header_woo_cart = get_theme_mod( 'wishful_blog_enable_header_woo_cart', 1 );

                    ?>
                    <ul class="top-right user-info">
                        <?php

                        //template-function for social icon
                        wishful_blog_header_search_button_template('icon');

                        //template-function for user icon
                        wishful_blog_header_user_template();

                        //template-function for woo cart
                        wishful_blog_header_woo_cart_template();

                        ?>
                    </ul>
                </div>
            </div>
        </div><!-- Container /- -->
    </div><!-- Top Header /- -->

    <!-- Menu Block -->
    <div class="container-fluid no-left-padding no-right-padding menu-block">
        <!-- Container -->
        <div class="container">
            <div class="primary-navigation-wrap">
                <button class="menu-toggle" data-toggle="collapse" data-target="#site-navigation" aria-controls="site-navigation" aria-expanded="false" >
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                </button> <!-- .menu-toggle -->
                <nav id="site-navigation" class="site-navigation">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'container'      => '',
                        'menu_class'     => 'primary-menu nav-menu',
                        'depth'          => 3,
                        'fallback_cb'    => 'wishful_blog_navigation_fallback',
                    ) );
                    ?>
                </nav>
            </div><!-- // primary-navigation-wrap -->
        </div><!-- Container /- -->
    </div><!-- Menu Block /- -->
    <?php
    //template-function for social form
    wishful_blog_header_search_button_template('form');
    ?>

</header><!-- Header Section /- -->
