<?php
/**
 * Template part for displaying banner two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

$banner_query = wishful_blog_banner_posts_query();
$banner_posts_no = get_theme_mod( 'wishful_blog_banner_posts_no', 3 );
if ( $banner_query -> have_posts() ) {

    $display_banner_category = get_theme_mod( 'wishful_blog_display_banner_category', 1 );
    ?>
    <div class="container-fluid no-left-padding no-right-padding slider-section slider-section2">
        <!-- Container -->
        <div class="container">
            <div id="slider-carousel-2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-8 col-sm-12 post-block post-big">
                                <?php
                                $count = 1;

                                while( $banner_query->have_posts() ) {

                                    $banner_query->the_post();

                                    if( $count == 1 ) {

                                    ?>
                                    <div class="post-box">
                                        <?php

                                        if ( has_post_thumbnail() ) {

                                           the_post_thumbnail( 'wishful-blog-thumbnail-four', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );

                                        } else {

                                            $enable_banner_fallback_image = get_theme_mod( 'wishful_blog_enable_banner_fallback_image', 1 );

                                            if( $enable_banner_fallback_image ) {

                                                wishful_blog_fallback_image( 'img', 'four' );
                                            }
                                        }
                                        ?>
                                        <div class="entry-content">
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

                                            if( !empty( $button_title ) ) {

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
                                $count++;
                                }
                                wp_reset_postdata();
                                ?>
                            </div>
                            <div class="col-lg-4 col-sm-12 post-block post-thumb">
                               <?php

                                $count = 1;

                                while( $banner_query->have_posts() ) {

                                    $banner_query->the_post();

                                    if( $count > 1 && $count <= 3 ) {

                                        ?>
                                        <div class="post-box">
                                            <?php

                                            if ( has_post_thumbnail() ) {

                                               the_post_thumbnail( 'wishful-blog-thumbnail-five', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );

                                            } else {

                                                $enable_banner_fallback_image = get_theme_mod( 'wishful_blog_enable_banner_fallback_image', 1 );

                                                if( $enable_banner_fallback_image ) {

                                                    wishful_blog_fallback_image( 'img', 'five' );
                                                }
                                            }
                                            ?>
                                            <div class="entry-content">
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

                                                if( !empty( $button_title ) ) {

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
                                    $count++;
                                }
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Container /- -->
    </div>
    <?php
}
