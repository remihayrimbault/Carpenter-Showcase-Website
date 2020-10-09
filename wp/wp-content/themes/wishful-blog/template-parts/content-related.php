<?php

$current_object = get_queried_object();

if ( $current_object instanceof WP_Post ) {

    $current_id = $current_object->ID;

    if ( absint( $current_id ) > 0 ) {

        // Exclude current post.
        $related_query_args['post__not_in'] = array( absint( $current_id ) );

        // Posts number.
        $related_query_args['posts_per_page'] = absint( 4 );
    }

    // Include current posts categories.
    $categories = wp_get_post_categories( $current_id );

    if ( ! empty( $categories ) ) {

        $related_query_args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $categories,
                'operator' => 'IN',
            )
        );
    }
}

$related_cats_post = new WP_Query( $related_query_args );

if( $related_cats_post->have_posts() ):

    $related_posts_title = get_theme_mod( 'wishful_blog_related_posts_title', 'Related Posts' );
    $display_related_posts_meta = get_theme_mod( 'wishful_blog_display_related_posts_meta', 'category' );

    ?>
    <div class="related-post">
        <?php
        if( !empty( $related_posts_title ) ) {
            ?>
            <h3><?php echo esc_html( $related_posts_title ); ?></h3>
            <?php
        }
        ?>
        <div class="related-post-block">
        <?php
        while( $related_cats_post->have_posts() ):

            $related_cats_post->the_post();

            ?>
            <div class="related-post-box">
                <a href="<?php the_permalink(); ?>">
                    <?php
                    if( has_post_thumbnail() ) {

                        the_post_thumbnail( 'wishful-blog-thumbnail-five', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );

                    } else {

                        wishful_blog_fallback_image( 'img', 'five' );
                    }
                    ?>
                </a>
                <?php

                if( $display_related_posts_meta == 'category' ) {

                    //Category list
                    wishful_blog_category_list( true );

                } else {

                    wishful_blog_comments_no( true );
                }
                ?>
                <h3>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'echo' => true ) ); ?>"><?php the_title(); ?></a>
                </h3>
            </div>
            <?php
        endwhile;
        // Restore original Post Data
        wp_reset_postdata();
        ?>
        </div>
    </div>
 <?php endif;
