<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wishful-blog
 */

get_header();

    /*
    * Hook for active pro archive top widget area - 10
    */
    do_action( 'is_active_pro_archive_top_widget_area' );

    ?>
   <!-- archive-title -->
     <div class="container">
        <div class="block-title container-fluid archive-block">
        <?php

        the_archive_title( '<h1 class="page-title">', '</h1>' );

        the_archive_description( '<div class="archive-description">', '</div>' );

        ?>
        </div><!-- archive-title /-->
    </div><!-- container /-->

    <?php

    wishful_blog_post_layout_template();

get_footer();
