<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wishful-blog
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php wishful_blog_post_thumbnail(); ?>
    <div class="entry-content">
        <div class="entry-header">
           <h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="post-meta">
                <?php

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
        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
