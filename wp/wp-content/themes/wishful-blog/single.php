<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wishful-blog
 */

get_header();

/*
* Hook for active pro post top widget area - 10
*/
do_action( 'is_active_pro_post_top_widget_area' );

$sidebar_position = wishful_blog_single_sidebar_position();
$display_author_box = get_theme_mod( 'wishful_blog_display_single_post_author_box', 1 );
$display_related_posts = get_theme_mod( 'wishful_blog_display_related_posts', 1 );

?>
<!-- Page Content -->
<div id="content" class="<?php wishful_blog_single_content_class(); ?>">
    <!-- Container -->
    <div class="container">
        <div class="row">
            <?php

            if( $sidebar_position == 'left' ) {

                get_sidebar();
            }
            ?>
            <!-- Content Area -->
            <div class="<?php wishful_blog_single_container_class(); ?>">
            <?php

            if( have_posts() ) :

                while ( have_posts() ) :

                    the_post();

                    get_template_part( 'template-parts/content', get_post_type() );

                endwhile;

                wishful_blog_author_box( $display_author_box );

                if( $display_related_posts == true ) {

                    get_template_part( 'template-parts/content', 'related' );
                }

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
            </div><!-- Content Area /- -->
            <?php

            if( $sidebar_position == 'right' ) {

                get_sidebar();
            }
            ?>
        </div>
    </div><!-- Container /- -->
</div><!-- Page Content /- -->


<?php
get_footer();
