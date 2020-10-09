<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wishful-blog
 */

if ( ! function_exists( 'wishful_blog_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function wishful_blog_posted_on( $display_meta ) {

        if( $display_meta == true ) {

            $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {

                $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $time_string = sprintf( $time_string,
                esc_attr( get_the_date( DATE_W3C ) ),
                esc_html( get_the_date() ),
                esc_attr( get_the_modified_date( DATE_W3C ) ),
                esc_html( get_the_modified_date() )
            );

            $posted_on = sprintf(
                /* translators: %s: post date. */
                esc_html_x( '&emsp%s', 'post date', 'wishful-blog' ),
                '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
            );

            echo '<span class="post-date">' . wp_kses_post( $posted_on ) . '</span>'; // WPCS: XSS OK.
        }
	}
endif;


if( ! function_exists( 'wishful_blog_posted_date' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function wishful_blog_posted_date( $display_meta ) {

        if( $display_meta == true ) {

            $time_string = sprintf( esc_html( get_the_date() ) );

            $archive_year  = get_the_time('Y');

            $archive_month = get_the_time('m');

            $archive_day   = get_the_time('d');

            $archive_date_link = get_day_link( $archive_year, $archive_month, $archive_day );

            $posted_on = sprintf(
                /* translators: %s: post date. */
                esc_html( '%s' ),
                '<a href="' . $archive_date_link . '" rel="bookmark">' . $time_string . '</a>'
            );

            echo '<span class="post-date">' . wp_kses_post( $posted_on ) . '</span>'; // WPCS: XSS OK.
        }
	}
endif;


if ( ! function_exists( 'wishful_blog_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function wishful_blog_posted_by( $display_meta ) {

        if( $display_meta == true ) {

            $byline = sprintf(
                    /* translators: %1$s: author image, %2$s: post author. */
                    '<figure>%1$s</figure>%2$s', get_avatar( get_the_author_meta( 'ID' ), 300 ),
                    '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
            );

            echo '<span class="byline"> ' . wp_kses_post( $byline ) . '</span>'; // WPCS: XSS OK.
        }
	}
endif;


if( ! function_exists( 'wishful_blog_category_list' ) ) {
    /**
     * Category listing
     */
    function wishful_blog_category_list( $display_meta ) {

        if( $display_meta == true ) {

            // Hide category and tag text for pages.
            if ( 'post' === get_post_type() ) {

            $categories_list = get_the_category_list(' <span>|</span> ');

                if ( $categories_list ) {
                    /* translators: %1$s: category list. */
                    printf( '<span class="post-category">' . esc_html__( '&nbsp;%1$s', 'wishful-blog' ) . '</span>', wp_kses_post( $categories_list ) );
                }
            }
        }
    }
}


if ( ! function_exists( 'wishful_blog_comments_no' ) ) :
	/**
	 * Prints HTML with meta information for no of comments.
	 */
	function wishful_blog_comments_no( $display_meta ) {

		if( $display_meta == true && get_post_type() === 'post' ) {

        	if( ( comments_open() || get_comments_number() ) ) {
        		?>
        		<span class="post-comments">
        		    <a href="<?php the_permalink(); ?>">
                        <?php
        				if( get_comments_number() <= 1 ) {
        					if( get_comments_number() == 0 ) {
        						echo esc_html__( '0 Comment', 'wishful-blog' );
        					} else {
		        				/* translators: %s: comments number. */
		        				printf( esc_html__( "%s comment", 'wishful-blog' ), absint( get_comments_number() ) );
		        			}
	        			} else {
	        				/* translators: %s: comments number. */
	        				printf( esc_html__( "%s comments", 'wishful-blog' ), absint( get_comments_number() ) );
	        			}
        				?>
        		      </a>
        		  </span>
	          	<?php
	        }
	    }
	}
endif;


if ( ! function_exists( 'wishful_blog_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function wishful_blog_post_thumbnail() {
		if ( post_password_required() || is_attachment() ) {
			return;
		}

        $thumbnail_size = '';

		if ( is_singular() ) :

            $sidebar_position = wishful_blog_single_sidebar_position();

            if( $sidebar_position == 'none' ) {

                $thumbnail_size = 'two';

            } else {

                $thumbnail_size = 'one';
            }
            ?>
            <div class="entry-cover">
            <?php

            if( has_post_thumbnail() ) {

                the_post_thumbnail( 'wishful-blog-thumbnail-' . $thumbnail_size, array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );

            } else {

                wishful_blog_fallback_image( 'img', $thumbnail_size );
            }

            ?>
            </div>
		<?php

        else :

            ?>
            <a href="<?php the_permalink(); ?>">
                <?php

                if( has_post_thumbnail() ) {

                    the_post_thumbnail( 'wishful-blog-thumbnail-four' , array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );

                } else {

                    wishful_blog_fallback_image( 'img', 'four' );
                }

                ?>
            </a>
		<?php
		endif; // End is_singular().
	}
endif;


if( ! function_exists( 'wishful_blog_author_box' ) ) {
    /**
     * Author box
     */
    function wishful_blog_author_box( $display_author_box ) {

        if( $display_author_box == true ) {

            ?>
            <div class="about-author-box">
                <div class="author" id="author-<?php the_author_meta('ID'); ?>">
                    <i><?php echo get_avatar( get_the_author_meta( 'ID' ), 300 ); ?></i>
                    <h4><?php echo esc_html( get_the_author() ); ?></h4>
                    <?php
                    $author_description = get_the_author_meta( 'description' );

                    if( !empty( $author_description ) ) {

                        ?>
                        <p><?php echo esc_html( $author_description ); ?></p>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
}


if( ! function_exists( 'wishful_blog_tags_list' ) ) {
    /**
     * Category listing
     */
    function wishful_blog_tags_list() {
        ?>
        <div class="tags">
            <?php
            echo wp_kses_post( get_the_tag_list() );
            ?>
        </div>
        <?php
    }
}


if ( ! function_exists( 'wishful_blog_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function wishful_blog_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'wishful-blog' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'wishful-blog' ) . '</span>', wp_kses_post( $categories_list ) ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'wishful-blog' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'wishful-blog' ) . '</span>', wp_kses_post( $tags_list ) ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'wishful-blog' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

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
	}
endif;
