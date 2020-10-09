<?php
/**
 * Template part for displaying post lists
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

$sidebar_position = wishful_blog_sidebar_position();

?>
<!-- Page Content -->
<div id="content" class="<?php wishful_blog_page_content_class(); ?>">
    <!-- Container -->
    <div class="container">
        <div class="<?php wishful_blog_page_row_class(); ?>">
            <?php

            if( $sidebar_position == 'left' ) {
                get_sidebar();
            }
            ?>
            <!-- Content Area -->
            <div class="<?php wishful_blog_main_container_class(); ?>">
            <?php
            if( have_posts() ) :
                ?>
                <!-- Row -->
                <div class="<?php wishful_blog_page_row_content_class(); ?>">
                <?php
                /* Start the Loop */
                while ( have_posts() ) :

                    the_post();

                    $post_layout = wishful_blog_post_layout();

                    /*
                     * Include the Post-Type-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                     */
                    switch( $post_layout ) {

                        case 'post_layout_three':

                            get_template_part( 'template-parts/content', 'list' );
                            break;

                        case 'post_layout_five':

                            get_template_part( 'template-parts/content', 'grid' );
                            break;

                        default:

                        $post_layout_template = apply_filters( 'pro_post_layout_content_template', $post_layout );
                    }

                endwhile;

                ?>
                </div><!-- Row /- -->
                <?php
                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;

                wishful_blog_pagination();

                ?>
            </div><!-- Content Area /- -->
            <?php

            if( $sidebar_position == 'right' ) {
                get_sidebar();
            }
            ?>
        </div>
    </div><!-- Container /- -->
</div><!-- Page Content /- -->
