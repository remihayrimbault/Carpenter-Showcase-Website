<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wishful-blog
 */

get_header();
?>

<!-- Page Content -->
<div id="content" class="container-fluid no-left-padding no-right-padding page-content">
    <!-- Container -->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="error-block">
                    <h1><?php echo esc_html__( '404', 'wishful-blog' ); ?></h1>
                    <span><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wishful-blog' ); ?></span>
                    <p><?php esc_html_e( 'Sorry, but the page you were looking for could not be found.', 'wishful-blog' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/' )); ?>"><?php echo esc_html__( 'Back Home', 'wishful-blog' ); ?></a>
                </div>
            </div>
        </div>
    </div><!-- Container /- -->
</div><!-- Page Content /- -->

<?php
get_footer();
