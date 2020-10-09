<?php
/**
 * Social Widget Class
 *
 * @package wishful-blog
 */

if( ! class_exists( 'Wishful_Blog_Social_Widget' ) ) {

    class Wishful_Blog_Social_Widget extends WP_Widget {

        /**
         * Sets up the Author widgets name etc
         */
        public function __construct() {

           $widget_ops = array(
               'classname'     => 'wishful-blog-social-widget',
               'description'   => esc_html__( 'Custom Wishful Blog Social Widget', 'wishful-blog' ),
           );
           parent::__construct(
               'wishful_blog_social_widget',
               esc_html__( 'WB : Social Widget', 'wishful-blog' ),
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

            $title       = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

            $facebook    = !empty( $instance['facebook'] ) ? $instance['facebook'] : '';
            $twitter     = !empty( $instance['twitter'] ) ? $instance['twitter'] : '';
            $youtube     = !empty( $instance['youtube'] ) ? $instance['youtube'] : '';
            $pinterest   = !empty( $instance['pinterest'] ) ? $instance['pinterest'] : '';
            $instagram   = !empty( $instance['instagram'] ) ? $instance['instagram'] : '';
            $pinterest   = !empty( $instance['pinterest'] ) ? $instance['pinterest'] : '';
            $vimeo       = !empty( $instance['vimeo'] ) ? $instance['vimeo'] : '';

            if( $args['id'] != 'wishful-blog-homepage' ) {

                ?>
                <!-- Widget : Follow Us -->
                <aside class="widget widget_social">
                   <?php if( !empty( $title ) ) : ?>
                    <h3 class="widget-title"><?php echo esc_html( $title ); ?></h3>
                    <?php endif; ?>
                    <ul>
                       <?php if( !empty( $facebook ) ) : ?>
                        <li><a href="<?php echo esc_url( $facebook ); ?>" title="<?php esc_attr_e( 'Facebook', 'wishful-blog' ); ?>"><i class="fa fa-facebook"></i></a></li>
                        <?php endif; ?>

                        <?php if( !empty( $twitter ) ) : ?>
                        <li><a href="<?php echo esc_url( $twitter ); ?>" title="<?php esc_attr_e( 'Twitter', 'wishful-blog' ); ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php endif; ?>

                        <?php if( !empty( $youtube ) ) : ?>
                        <li><a href="<?php echo esc_url( $youtube ); ?>" title="<?php esc_attr_e( 'Youtube', 'wishful-blog' ); ?>"><i class="fa fa-youtube-play"></i></a></li>
                        <?php endif; ?>

                        <?php if( !empty( $instagram ) ) : ?>
                        <li><a href="<?php echo esc_url( $instagram ); ?>" title="<?php esc_attr_e( 'instagram', 'wishful-blog' ); ?>"><i class="fa fa-instagram"></i></a></li>
                        <?php endif; ?>

                        <?php if( !empty( $pinterest ) ) : ?>
                        <li><a href="<?php echo esc_url( $pinterest ); ?>" title="<?php esc_attr_e( 'Pinterest', 'wishful-blog' ); ?>"><i class="fa fa-pinterest"></i></a></li>
                        <?php endif; ?>

                        <?php if( !empty( $vimeo ) ) : ?>
                        <li><a href="<?php echo esc_url( $vimeo ); ?>" title="<?php esc_attr_e( 'Vimeo', 'wishful-blog' ); ?>"><i class="fa fa-vimeo"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </aside><!-- Widget : Follow Us /- -->
                <?php

            } else {

                ?>
                <!-- Section Header -->
                <div class="section-header">
                    <h3 class="text-danger">
                        <strong>
                            <?php esc_html_e( 'Place "Social Widget" in "Sidebar or Footer Widget Area".', 'wishful-blog' ); ?>
                        </strong>
                    </h3>
                </div><!-- Section Header /- -->
                <?php
            }
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
                'facebook'          => '',
                'twitter'           => '',
                'youtube'           => '',
                'instagram'         => '',
                'pinterest'         => '',
                'vimeo'             => '',
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
                <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>">
                    <strong><?php esc_html_e( 'Facebook Link' , 'wishful-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['facebook'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>">
                    <strong><?php esc_html_e( 'Twitter Link' , 'wishful-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['twitter'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>">
                    <strong><?php esc_html_e( 'Youtube Link' , 'wishful-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['youtube'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>">
                    <strong><?php esc_html_e( 'Instagram Link' , 'wishful-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['instagram'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>">
                    <strong><?php esc_html_e( 'Pinterest Link' , 'wishful-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['pinterest'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>">
                    <strong><?php esc_html_e( 'Vimeo Link' , 'wishful-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vimeo' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['vimeo'] ); ?>" />
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

            $instance['facebook']              = esc_url_raw( $new_instance['facebook'] );

            $instance['twitter']               = esc_url_raw( $new_instance['twitter'] );

            $instance['youtube']               = esc_url_raw( $new_instance['youtube'] );

            $instance['instagram']             = esc_url_raw( $new_instance['instagram'] );

            $instance['pinterest']             = esc_url_raw( $new_instance['pinterest'] );

            $instance['vimeo']                 = esc_url_raw( $new_instance['vimeo'] );

            return $instance;
        }
    }
}
