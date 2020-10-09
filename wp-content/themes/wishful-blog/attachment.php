<?php
/**
 *
 * For attachment page
 *
 */

get_header();

?>

<!-- Page Content -->
<div id="content" class="container-fluid no-left-padding no-right-padding page-content blog-single post-nosidebar">
    <!-- Container -->
    <div class="container">
        <div class="entry-cover text-center">
        <?php

            $image_size = apply_filters( 'wishful_blog_attachment_image_size', 'large' );
             echo wp_get_attachment_image( get_the_ID(), $image_size );

        ?>
        </div>
        <!-- Content Area -->
        <div class="content-area mt-4">
        <?php
        if ( get_edit_post_link() ) : ?>
            <footer class="entry-footer text-center">
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
    </div><!-- Container /- -->
</div><!-- Page Content /- -->
<?php

get_footer(); ?>
