<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wishful-blog
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
    <div class="comments-area">
        <h2 class="comments-title"><?php comments_number( 'No Comment', '1 Comment', '% Comments' ); ?></h2>
        <?php
            if ( have_comments() ) {

                wishful_blog_comments_navigation();
        ?>
        <ol class="comment-list">

        <?php

            wp_list_comments( array(
            'style'      => '<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1 parent">',
            'short_ping' => true,
            ) );

            ?>
        </ol><!-- comment-list /- -->
        <?php } ?><!-- comment-list /- -->
        <!-- Comment Form -->
        <?php

            wishful_blog_comments_navigation();

            if ( ! comments_open() ) :
                ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wishful-blog' ); ?></p>
                <?php
            endif; // Check for have_comments().
            comment_form(); ?>
        <!-- Comment Form /- -->
    </div>
