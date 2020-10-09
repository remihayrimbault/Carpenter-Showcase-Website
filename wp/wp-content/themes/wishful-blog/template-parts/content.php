<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wishful-blog
 */

$display_category = wishful_blog_post_list_category_meta();
$display_author = wishful_blog_post_list_author_meta();
$display_date = wishful_blog_post_list_date_meta();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php wishful_blog_post_thumbnail(); ?>
    <div class="entry-content">
        <div class="entry-header">
            <?php

            wishful_blog_category_list( $display_category );

            ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="post-meta">
                <?php

                // Author tag meta
                wishful_blog_posted_by( $display_author );

                // Posted date meta
                wishful_blog_posted_date( $display_date );

                /**
                * Hook - pro_social_share
                *
                * @hooked pro_social_share - 10
                */
                do_action( 'pro_social_share' );

                ?>
            </div>
        </div>
        <?php

        the_content();

        wishful_blog_pages_links();

        wishful_blog_tags_list();

        if ( get_edit_post_link() ) :

        ?>
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
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
