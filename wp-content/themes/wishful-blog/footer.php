<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wishful-blog
 */

?>

	</main> <!--Header main-->
</div> <!--Header div-->
<!-- Footer Main -->
<?php

$footer_color_mode = get_theme_mod( 'wishful_blog_footer_color_mode', 'footer-light' );

?>
<footer class="container-fluid no-left-padding no-right-padding footer-main footer-section1 <?php echo esc_attr( $footer_color_mode ); ?>">
    <?php
    if( is_active_sidebar( 'wishful-blog-footer-left' ) || is_active_sidebar( 'wishful-blog-footer-middle' ) || is_active_sidebar( 'wishful-blog-footer-right' ) ) {

        ?>
        <!-- Container Widget -->
        <div class="container">
            <div class="row">
                <!-- Widget Area Left-->
                <div class="col-lg-4 col-md-6 widget-area footer-widget-area">
                    <?php

                    if( is_active_sidebar( 'wishful-blog-footer-left' ) ) {

                        dynamic_sidebar( 'wishful-blog-footer-left' );

                    }

                    ?>
                </div><!-- Widget Area Left/- -->
                <!-- Widget Area Middle-->
                <div class="col-lg-4 col-md-6 widget-area footer-widget-area">
                    <?php

                    if( is_active_sidebar( 'wishful-blog-footer-middle' ) ) {

                        dynamic_sidebar( 'wishful-blog-footer-middle' );

                    }

                    ?>
                </div><!-- Widget Area Middle/- -->
                <!-- Widget Area Right-->
                <div class="col-lg-4 col-md-6 widget-area footer-widget-area">
                    <?php

                    if( is_active_sidebar( 'wishful-blog-footer-right' ) ) {

                        dynamic_sidebar( 'wishful-blog-footer-right' );

                    }

                    ?>
                </div><!-- Widget Area Right/- -->
            </div>
        </div><!-- Container Widget /- -->
        <?php
    }

    wishful_blog_header_social_links_template('footer');

    /*
    * Hook for footer menu template - 10
    */
    do_action( 'pro_footer_menu_template' );

    ?>
    <div class="copyright">
        <p>
        <?php

        $footer_copyright_text = get_theme_mod( 'wishful_blog_footer_copyright_text', esc_html__( 'Copyright.', 'wishful-blog' ) );

        if( has_filter( 'pro_blog_copyright_text' ) ) {

            $footer_copyright_text = apply_filters( 'pro_blog_copyright_text', $footer_copyright_text );

        } else {

            if( !empty( $footer_copyright_text ) ) {

                /* translators: 1: Copyright Text 2: Theme name, 3: Theme author. */
                printf( esc_html__( '%1$s %2$s | %3$s by %4$s','wishful-blog' ), $footer_copyright_text, get_bloginfo( 'name' ), esc_html__( 'Wishful Blog', 'wishful-blog' ), '<a href="'. esc_url( 'https://wishfulthemes.com' ) . '">' . esc_html__( 'Wishfulthemes', 'wishful-blog' ) . '</a>' );

            } else {

                /* translators: 1: Theme name, 2: Theme author. */
                printf( esc_html__( '%1$s by %2$s', 'wishful-blog' ), get_bloginfo( 'name' ), '<a href="'. esc_url( 'https://wishfulthemes.com' ) . '">' . esc_html__( 'Wishfulthemes', 'wishful-blog' ) . '</a>' );
            }
        }
        ?>
        </p>
    </div>
    <?php

    $enable_site_scroll_top = get_theme_mod( 'wishful_blog_enable_site_scroll_top', 1 );

    if( $enable_site_scroll_top == 1 ) {

        ?>
        <div class="scroll-top">
            <a href="#" class="back-to-top"><i class="fa fa-arrow-up"></i></a>
        </div>
        <?php
    }
    ?>
</footer><!-- Footer Main /- -->
<?php wp_footer(); ?>

</body>
</html>
