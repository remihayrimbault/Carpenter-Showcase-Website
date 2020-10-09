<?php
/**
 * Template part for displaying banner one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

$banner_query = wishful_blog_banner_posts_query();
if ( $banner_query -> have_posts() ) {

    $display_banner_category = get_theme_mod( 'wishful_blog_display_banner_category', 1 );

    ?>
   <div class="container-fluid no-left-padding no-right-padding slider-section slider-section5">
        <!-- Container -->
        <div class="container">
            <div class="slider-carousel-5">
            <?php
            while ( $banner_query -> have_posts() ) {

                $banner_query -> the_post();
                ?>
                <div class="post-item active">
                    <?php
                    if ( has_post_thumbnail() ) {

                       the_post_thumbnail( 'wishful-blog-thumbnail-three', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );

                    } else {

                        $enable_banner_fallback_image = get_theme_mod( 'wishful_blog_enable_banner_fallback_image', 1 );

                        if( $enable_banner_fallback_image ) {

                            wishful_blog_fallback_image( 'img', 'three' );
                        }
                    }
                    ?>
                    <div class="carousel-caption">
                        <?php

                        wishful_blog_category_list( $display_banner_category );

                        ?>
                        <h3>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'echo' => true ) ); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <?php
                        $button_title = get_theme_mod( 'wishful_blog_banner_button_title', esc_html__( 'Read More', 'wishful-blog' ) );
                        if( !empty($button_title) ) {

                            ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php echo esc_html( $button_title ); ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
            ?>
            </div>
        </div><!-- Container /- -->
    </div>
    <?php
}
