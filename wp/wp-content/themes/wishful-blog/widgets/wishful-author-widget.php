<?php
/**
 * Author Widget Class
 *
 * @package wishful-blog
 */

if( ! class_exists( 'Wishful_Blog_Author_Widget' ) ) {

    class Wishful_Blog_Author_Widget extends WP_Widget {

        /**
         * Sets up the Author widgets name etc
         */
        public function __construct() {

           $widget_ops = array(
               'classname'     => 'wishful-blog-author-widget',
               'description'   => esc_html__( 'Custom Wishful Blog Author Widget', 'wishful-blog' ),
           );
           parent::__construct(
               'wishful_blog_author_widget',
               esc_html__( 'WB : Author Widget', 'wishful-blog' ),
               $widget_ops
           );
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget( $args , $instance ) {

            $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance , $this->id_base );

            $author_page = !empty( $instance['author_page'] ) ? $instance['author_page'] : '';

            $author_link_title = !empty( $instance['author_link_title'] ) ? $instance['author_link_title'] : '';

            $author_args = array(
                'post_type'        => 'page',
                'posts_per_page'   => 1,
            );

            if( $author_page > 0 ) {

                $author_args['page_id'] = absint( $author_page );
            }

            $author = new WP_Query( $author_args );

            if( $author->have_posts() ) :

                while( $author->have_posts() ) :

                    $author->the_post();

                    if( $args['id'] != 'wishful-blog-homepage' ) {
                        ?>
                        <!-- Widget : Aboutme -->
                        <aside class="widget widget_aboutme">
                           <?php if( !empty( $title ) ) : ?>
                            <h3 class="widget-title"><?php echo esc_html( $title ); ?></h3>
                            <?php endif; ?>
                            <div class="about-info">
                                <figure>
                                <?php
                                if( has_post_thumbnail() ) {

                                    the_post_thumbnail( 'wishful-blog-thumbnail-five', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );

                                } else {

                                    wishful_blog_fallback_image( 'img', 'five' );
                                }
                                ?>
                                </figure>
                                <?php

                                the_excerpt();

                                if( !empty( $author_link_title ) ) :

                                    ?>
                                    <a href="<?php the_permalink(); ?>"><?php echo esc_html( $author_link_title ); ?></a>
                                    <?php
                                endif;
                                ?>
                            </div>
                        </aside><!-- Widget : Aboutme /- -->
                        <?php

                    } else {

                        ?>
                        <!-- Section Header -->
                        <div class="section-header">
                            <h3 class="text-danger">
                                <strong>
                                    <?php esc_html_e( 'Place "Author Widget" in "Sidebar or Footer Widget Area".', 'wishful-blog' ); ?>
                                </strong>
                            </h3>
                        </div><!-- Section Header /- -->
                    <?php
                    }
                endwhile;
                wp_reset_postdata();
            endif;
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form( $instance ) {

            $defaults = array(
                'title'             => '',
                'author_page'       => '',
                'author_link_title' => '',
            );

            $instance = wp_parse_args( (array) $instance , $defaults );

            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                    <strong><?php esc_html_e( 'Title' , 'wishful-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'author_page' ) ); ?>">
                    <strong><?php esc_html_e( 'Author Page' , 'wishful-blog' ); ?></strong>
                </label>
                <?php
                    wp_dropdown_pages( array(
                        'id'               => esc_attr( $this->get_field_id( 'author_page' ) ),
                        'class'            => 'widefat',
                        'name'             => esc_attr( $this->get_field_name( 'author_page' ) ),
                        'selected'         => esc_attr( $instance [ 'author_page' ] ),
                        'show_option_none' => esc_html__( '&mdash; Select Page &mdash;' , 'wishful-blog' ),
                        )
                    );
                ?>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'author_link_title' ) ); ?>">
                    <strong><?php esc_html_e( 'Author Link Title' , 'wishful-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'author_link_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author_link_title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['author_link_title'] ); ?>" />
            </p>

            <?php
        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update( $new_instance , $old_instance ) {

            $instance = $old_instance;

            $instance['title']                 = sanitize_text_field( $new_instance['title'] );

            $instance['author_page']           = absint( $new_instance['author_page'] );

            $instance['author_link_title']     = sanitize_text_field( $new_instance['author_link_title'] );

            return $instance;
        }
    }
}
