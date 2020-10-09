<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wishful-blog
 */

get_header();

/*
* Hook for active pro page top widget area - 10
*/
do_action( 'is_active_pro_page_top_widget_area' );

$sidebar_position = wishful_blog_single_sidebar_position();

?>
<!-- Page Content -->
<div id="content" class="<?php wishful_blog_single_content_class(); ?>">
    <!-- Container -->
    <div class="container">
        <div class="row">
            <?php

            if( true == wishful_blog_is_woocommerce_page() ) {

                if ( $sidebar_position == 'left' && is_active_sidebar( 'wishful-blog-woocommerce-sidebar' ) ) {

                    get_sidebar( 'shop' );
                }

            } else {

                if ( is_page() && $sidebar_position == 'left' && is_active_sidebar( 'wishful-blog-sidebar' ) ) {

                    get_sidebar();
                }
            }

            ?>
            <!-- Content Area -->
            <div class="<?php wishful_blog_single_container_class(); ?>">
            <?php

            if( have_posts() ) :

                while ( have_posts() ) :

                    the_post();

                    get_template_part( 'template-parts/content', 'page' );

                endwhile;

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
            <?php if ( get_edit_post_link() ) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Edit <span class="screen-reader-text">%s</span>', 'wishful-blog' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer><!-- .entry-footer -->
            <?php endif; ?>
            </div><!-- Content Area /- -->
            <?php

            if( true == wishful_blog_is_woocommerce_page() ) {

                if ( $sidebar_position == 'right' && is_active_sidebar( 'wishful-blog-woocommerce-sidebar' ) ) {

                    get_sidebar( 'shop' );
                }

            } else {

                if ( is_page() && $sidebar_position == 'right' && is_active_sidebar( 'wishful-blog-sidebar' ) ) {

                    get_sidebar();
                }
            }

            ?>
        </div>
    </div><!-- Container /- -->
</div><!-- Page Content /- -->
<?php
get_footer();
