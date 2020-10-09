<?php
/**
 * Sanitization Functions
 *
 * @package wishful-blog
 */

/**
 * Sanitization Function - Checkbox
 *
 * @param $checked
 * @return bool
 */
if( !function_exists( 'wishful_blog_sanitize_checkbox' ) ) :

	function wishful_blog_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

endif;


/**
 * Sanitization Function - Select
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('wishful_blog_sanitize_select') ) :

    function wishful_blog_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_key( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }

endif;

/**
 * Sanitization Function - Choices
 *
 * @param $input, $setting
 * @return $input
 */
if( !function_exists( 'wishful_blog_sanitize_choices' ) ) :

    function wishful_blog_sanitize_choices( $input, $setting ) {
        global $wp_customize;

        if(!empty($input)){
            $input = array_map('absint', $input);
        }

        return $input;
    }

endif;

/**
 * Sanitization Function - Number
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('wishful_blog_sanitize_number') ) :

    function wishful_blog_sanitize_number( $input, $setting ) {

        $number = absint( $input );

        // If the input is a positibe number, return it; otherwise, return the default.
        return ( $number ? $number : $setting->default );
    }

endif;

/**
 * Sanitization Function - Copyright & Credit
 *
 * @param $input
 * @return sanitized output
 *
 */
if ( !function_exists('wishful_blog_sanitize_copyright_credit') ) :

    function wishful_blog_sanitize_copyright_credit( $input ) {

        $allowed_tags = array(
            'a' => array(
                'href' => array(),
                'title' => array(),
                '_target' => array(),
            ),
            'span' => array(),
        );

        return wp_kses( $input, $allowed_tags );
    }

endif;

/**
 * Sanitization callback function for number field with value in range.
 */
if ( ! function_exists( 'wishful_blog_sanitize_range' ) ) {

    function wishful_blog_sanitize_range( $input, $setting ) {

        if(  $input <= $setting->manager->get_control( $setting->id )->input_attrs['max'] ) {

            if( $input >= $setting->manager->get_control( $setting->id )->input_attrs['min'] ) {

                return absint( $input );
            }
        }
    }
}

if ( ! function_exists( 'wishful_blog_sanitize_image' ) ) :
	/**
	 * Image sanitization callback example.
	 *
	 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
	 * send back the filename, otherwise, return the setting default.
	 *
	 * - Sanitization: image file extension
	 * - Control: text, WP_Customize_Image_Control
	 *
	 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
	 *
	 * @param string               $image   Image filename.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return string The image filename if the extension is allowed; otherwise, the setting default.
	 */
	function wishful_blog_sanitize_image( $image, $setting ) {
		/*
		 * Array of valid image file types.
		 *
		 * The array includes image mime types that are included in wp_get_mime_types()
		 */
	    $mimes = array(
	        'jpg|jpeg|jpe' => 'image/jpeg',
	        'gif'          => 'image/gif',
	        'png'          => 'image/png',
	        'bmp'          => 'image/bmp',
	        'tif|tiff'     => 'image/tiff',
	        'ico'          => 'image/x-icon'
	    );
		// Return an array with file extension and mime_type.
	   $file = wp_check_filetype( $image, $mimes );
		// If $image has a valid mime_type, return it; otherwise, return the default.
	   return ( $file['ext'] ? $image : $setting->default );
	}
endif;

