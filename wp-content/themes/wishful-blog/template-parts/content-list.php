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
?>
<div class="<?php wishful_blog_post_list_class(); ?>">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-cover">
            <?php
            if( $display_author || $display_date ) {

                ?>
                <div class="post-meta">
                <?php

                // Author tag meta
                wishful_blog_posted_by( $display_author );

                // Posted date meta
                wishful_blog_posted_date( $display_date );

                ?>
                </div>
                <?php
            }

            wishful_blog_post_thumbnail();

            ?>
        </div>
        <div class="entry-content">
            <div class="entry-header">
                <?php

                //Category list
                wishful_blog_category_list( $display_category );

                ?>
                <h3 class="entry-title">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'echo' => true ) ); ?>"><?php the_title(); ?></a>
                </h3>
            </div>
            <?php

            the_excerpt();

            if( !empty( $readmore_text ) ) {

                ?>
                <a class="<?php do_action( 'pro_button_style' ); ?>" href="<?php the_permalink(); ?>">
                    <?php echo esc_html( $readmore_text ); ?>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</div>
