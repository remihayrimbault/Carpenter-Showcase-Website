<?php
/**
 * ECLG Newsletter Widget
 *
 * @package wishful-blog
 */

if( ! class_exists( 'Wishful_Blog_Eclg_Newsletter_Widget' ) ) {

    class Wishful_Blog_Eclg_Newsletter_Widget extends WP_Widget {

        /**
        * Sets up the Author widgets name etc
        */
        public function __construct() {

           $widget_ops = array(
               'classname'     => 'wishful-blog-eclg-newsletter-widget',
               'description'   => esc_html__( 'Custom Wishful Blog Newsletter Plugin compatible with ECLG Newsletter.', 'wishful-blog' ),
           );
           parent::__construct(
               'wishful_blog_eclg_newsletter_widget',
               esc_html__( 'WB : Newsletter Widget', 'wishful-blog' ),
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

            $title   = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance , $this->id_base );

            $display_first_name  = !empty( $instance['display_first_name'] ) ? $instance['display_first_name'] : false;

            $display_last_name  = !empty( $instance['display_last_name'] ) ? $instance['display_last_name'] : false;

            $button_title = !empty( $instance['button_title'] ) ? $instance['button_title'] : esc_html__( 'Submit' , 'wishful-blog' );

            if( $display_first_name ) {

                $first_status = 'yes';
                $firstname_class = 'show-firstname';

            } else {

                $first_status = 'no';
                $firstname_class = 'hide-firstname';
            }

            if( $display_last_name ) {

                $last_status = 'yes';
                $lasname_class = 'show-lastname';

            } else {

                $last_status = 'no';
                $lasname_class = 'hide-lastname';
            }

            $name_classes = $firstname_class . ' ' . $lasname_class;

            $news_top_class = '';

            if( $args['id'] == 'wishfulblog-pro-archive-top' || $args['id'] == 'wishfulblog-pro-search-top' || $args['id'] == 'wishfulblog-pro-page-top' || $args['id'] == 'wishfulblog-pro-post-top' || $args['id'] == 'wishful-blog-homepage' ) {
                $news_top_class = ' top-area';
            }

            ?>
            <div class="news-letter-wrap<?php echo esc_attr( $news_top_class ); ?>">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                            <div class="newsletter-detail has-email <?php echo esc_attr( $name_classes ); ?>">
                                <?php if( !empty( $title ) ) : ?>
                                <h2><?php echo esc_html( $title ); ?></h2>
                                <?php endif; ?>
                                <?php

                                $string = '[eclg_capture lastname="'. esc_html($last_status) .'" firstname="'. esc_html($first_status) .'" button_text="'. esc_html($button_title) .'"]';

                                echo do_shortcode( $string );

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
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
                'title'              => '',
                'display_first_name' => true,
                'display_last_name'  => true,
                'button_title'       => esc_html__( 'Submit', 'wishful-blog' ),
            );

            $instance = wp_parse_args( (array) $instance , $defaults );

            if( !defined( 'ECLG_VERSION' ) ) {

                ?>
                <p>
                    <strong>
                        <?php
                        /* translators: %1$s: plugin name. */
                        printf( esc_html__('Please install and activate %1$s plugin to use Newsletter widget.', 'wishful-blog' ),
                                '<a href="'. esc_url( 'https://wordpress.org/plugins/email-capture-lead-generation/' ) . '" target="_blank">' . esc_html__( 'Email Capture &amp; Lead Generation', 'wishful-blog' ) . '</a>'
                        );
                        ?>
                    </strong>
                </p>
                <?php

            } else {

                ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                        <strong><?php esc_html_e( 'Title' , 'wishful-blog' ); ?></strong>
                    </label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
                </p>

                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( 'display_first_name' ) ); ?>">
                      <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'display_first_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'display_first_name' ) ); ?>" <?php checked( $instance['display_first_name'], true ); ?>>
                      <strong><?php esc_html_e( 'Display First Name Field', 'wishful-blog' ); ?></strong>
                    </label>
                </p>

                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( 'display_last_name' ) ); ?>">
                      <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'display_last_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'display_last_name' ) ); ?>" <?php checked( $instance['display_last_name'], true ); ?>>
                      <strong><?php esc_html_e( 'Display Last Name Field', 'wishful-blog' ); ?></strong>
                    </label>
                </p>

                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( 'button_title' ) ); ?>">
                        <strong><?php esc_html_e( 'Button Title' , 'wishful-blog' ); ?></strong>
                    </label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['button_title'] ); ?>" />
                </p>
                <?php
            }

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

            $instance['display_first_name']    = wp_validate_boolean( $new_instance['display_first_name'] );

            $instance['display_last_name']     = wp_validate_boolean( $new_instance['display_last_name'] );

            $instance['button_title']          = sanitize_text_field( $new_instance['button_title'] );

            return $instance;
        }
    }
}
