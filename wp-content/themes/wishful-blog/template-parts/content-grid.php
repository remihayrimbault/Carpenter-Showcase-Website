<?php
/**
 * Template part for displaying in masonary content layout
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wishful-blog
 */

$display_category = wishful_blog_post_list_category_meta();
$display_author = wishful_blog_post_list_author_meta();
$display_date = wishful_blog_post_list_date_meta();
$readmore_text = wishful_blog_post_list_read_text();
$post_style = wishful_blog_post_listing_style();
$post_style_class = wishful_blog_post_listing_style_class();
?>
<div class="<?php wishful_blog_post_list_class(); ?>">
    <div class="type-post<?php echo esc_attr( $post_style_class ); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-cover">
            <div class="post-meta">
                <?php

                wishful_blog_posted_by( $display_author );

                wishful_blog_posted_date( $display_date );

                ?>
            </div>
            <?php wishful_blog_post_thumbnail(); ?>
        </div>
        <div class="entry-content">
            <div class="entry-header">
                <?php

                wishful_blog_category_list( $display_category );

                ?>
                <h3 class="entry-title">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'echo' => true ) ); ?>"><?php the_title(); ?></a>
                </h3>
            </div>
            <?php

            if( $post_style == 'style_one' ) {

                the_excerpt();
            }

            if( !empty( $readmore_text ) ) {

                ?>
                <a class="<?php do_action( 'pro_button_style' ); ?>" href="<?php the_permalink(); ?>">
                    <?php echo esc_html( $readmore_text ); ?></a>
                <?php
            }
            ?>
        </div>
    </div>
</div>
