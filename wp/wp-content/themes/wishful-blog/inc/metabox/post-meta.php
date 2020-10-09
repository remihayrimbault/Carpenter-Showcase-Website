<?php
/**
 * Class to create custom post meta fields and save and update the meta values.
 *
 */

class Wishful_Blog_Post_Meta {

    /*
      * Initialize the class and start calling our hooks and filters
      * @since 1.0.0
     */
	public function __construct() {
        //
	}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function init() {
		// Register post meta fields and save meta fields values.
		add_action( 'admin_init', array( $this, 'register_post_meta' ) );
		add_action( 'save_post', array( $this, 'save_sidebar_position_meta' ) );
	}

	/**
	 * Register post custom meta fields.
	 *
	 * @since    1.0.0
	 */
	public function register_post_meta() {

	    add_meta_box( 'sidebar_position_metabox', esc_html__( 'Sidebar Position', 'wishful-blog' ), array( $this, 'sidebar_position_meta' ), array( 'post', 'page' ), 'side', 'default' );
	}

	/**
	 * Custom Sidebar Post Meta.
	 *
	 * @since    1.0.0
	 */
	public function sidebar_position_meta() {

		global $post;

		$sidebar = get_post_meta( $post->ID, 'wishful_blog_sidebar_position', true );

		if( empty( $sidebar ) ) {
			$sidebar = 'right';
		}

	    wp_nonce_field( 'wishful_blog_sidebar_position_meta_nonce', 'wishful_blog_sidebar_position_meta_nonce_id' );

	    $sidebar_positions = array(
	        'right' => esc_html__( 'Right', 'wishful-blog' ),
	        'left' => esc_html__( 'Left', 'wishful-blog' ),
	        'none' => esc_html__( 'None', 'wishful-blog' ),
	    );

	    ?>

	    <table width="100%" border="0" class="options" cellspacing="5" cellpadding="5">
	        <tr>
	            <?php
	                foreach( $sidebar_positions as $key => $option ) {
	                    ?>
	                    <td width="10%">
	                        <input type="radio" name="sidebar_position" id="sidebar_position" value="<?php echo esc_attr( $key ); ?>" <?php if( $sidebar == $key ) { esc_attr_e( 'checked', 'wishful-blog' ); } ?>><label><?php echo esc_html( $option ); ?></label>
	                    </td>
	                    <?php
	                }
	            ?>
	        </tr>
	    </table>
	    <?php
	}

	/**
	 * Save Custom Sidebar Position Post Meta.
	 *
	 * @since    1.0.0
	 */
	public function save_sidebar_position_meta() {

	    global $post;

	    // Bail if we're doing an auto save
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
	        return;
	    }

	    // if our nonce isn't there, or we can't verify it, bail
	    if( !isset( $_POST['wishful_blog_sidebar_position_meta_nonce_id'] ) || !wp_verify_nonce( sanitize_key( $_POST['wishful_blog_sidebar_position_meta_nonce_id'] ), 'wishful_blog_sidebar_position_meta_nonce' ) ) {
	        return;
	    }

	    // if our current user can't edit this post, bail
	    if ( ! current_user_can( 'edit_post', $post->ID ) ) {
	        return;
	    }

	    if( isset( $_POST['sidebar_position'] ) ) {
			update_post_meta( $post->ID, 'wishful_blog_sidebar_position', sanitize_text_field( wp_unslash( $_POST['sidebar_position'] ) ) );
		}
	}

}

$Wishful_Blog_Post_Meta = new Wishful_Blog_Post_Meta();
$Wishful_Blog_Post_Meta -> init();
