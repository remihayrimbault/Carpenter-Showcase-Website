<?php
/**
 * Post Widget One Class
 *
 * @package wishful-blog
 */

if( ! class_exists( 'Wishful_Blog_Post_Widget_Layout_One' ) ) {

    class Wishful_Blog_Post_Widget_Layout_One extends WP_Widget {

        /**
         * Sets up the Author widgets name etc
         */
       public function __construct() {

           $widget_ops = array(
               'classname'     => 'wishful-blog-post-widget-layout-one',
               'description'   => esc_html__( 'Custom Wishful Blog Post Widget Layout One', 'wishful-blog' ),
           );
           parent::__construct(
               'wishful_blog_post_widget_layout_one',
               esc_html__( 'WB : Post Widget Layout One', 'wishful-blog' ),
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

            $post_type     = !empty( $instance[ 'post_type' ] ) ? $instance[ 'post_type' ] : 'recent_posts';

            $post_no       = !empty( $instance['post_no'] ) ? $instance['post_no'] : 4;

            $select_cat    = !empty( $instance['select_cat'] ) ? $instance['select_cat'] : 0;

            $display       = !empty( $instance['display'] ) ? $instance['display'] : '';

            $post_args = array(

                'post_type'     => 'post',
            );

            if( has_filter( 'pro_widget_posts_types_args' ) ) {

                $post_type = apply_filters( 'pro_widget_posts_types_args', $post_type );

                $post_args['orderby'] = $post_type;

            } else {

                if( $post_type == 'popular_posts' ) {

                    $post_args['orderby'] = 'comment_count';

                } else {

                    $post_args['orderby'] = 'date';
                }
            }

            if( absint( $select_cat ) > 0) {

                $post_args['cat'] = absint( $select_cat );
            }

            if( absint( $post_no ) > 0) {

                $post_args['posts_per_page'] = absint( $post_no );
            }

            $post_query = new WP_QUERY( $post_args );

            if( $post_query->have_posts() ) {

                if( $args['id'] != 'wishful-blog-homepage' ) {
                ?>
                <!-- Widget : Layout One -->
                <aside class="widget widget_latestposts">
                   <?php if( !empty( $title ) ) : ?>
                    <h3 class="widget-title"><?php echo esc_html( $title ); ?></h3>
                    <?php endif; ?>
                    <?php
                    while( $post_query->have_posts() ) :

                        $post_query->the_post();
                        ?>
                        <div class="latest-content">
                            <a href="<?php the_permalink(); ?>"><i>
                                <?php
                                if( has_post_thumbnail() ) {

                                    the_post_thumbnail( 'wishful-blog-thumbnail-five', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );

                                } else {

                                    wishful_blog_fallback_image( 'img', 'five' );
                                }
                                ?>
                                </i>
                            </a>
                            <h5>
                                <a title="<?php the_title_attribute( array( 'echo' => true ) ); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h5>
                            <?php

                            if( $display == 'display_cat' ) {

                                wishful_blog_category_list( true );

                            } elseif( $display == 'display_cmt_no' ) {

                                wishful_blog_comments_no( true );

                            } else {

                                echo '';
                            }
                            ?>
                        </div>
                        <?php

                    endwhile;
                    wp_reset_postdata();

                    ?>
                </aside><!-- Widget : Layout One /- -->
                <?php

                } else {

                    ?>
                    <!-- Section Header -->
                    <div class="section-header">
                        <h3 class="text-danger">
                            <strong>
                                <?php esc_html_e( 'Place "Post Widget Layout One" in "Sidebar or Footer Widget Area".', 'wishful-blog' ); ?>
                            </strong>
                        </h3>
                    </div><!-- Section Header /- -->
                    <?php
                }
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
                'post_type'         => 'recent_posts',
                'post_no'           => 4,
                'select_cat'        => 0,
                'display'           => 'display_cat',
            );

            $instance = wp_parse_args( (array) $instance , $defaults );

            $post_types = wishful_blog_posts_type_array();

            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                    <strong><?php esc_html_e( 'Title' , 'wishful-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'select_cat' ) ); ?>">
                    <strong><?php esc_html_e( 'Select Category' , 'wishful-blog' ); ?></strong>
                </label>
                <?php
                    wp_dropdown_categories( array(
                        'id'               => esc_attr( $this->get_field_id( 'select_cat' ) ),
                        'class'            => 'widefat',
                        'name'             => esc_attr( $this->get_field_name( 'select_cat' ) ),
                        'orderby'          => 'name',
                        'selected'         => esc_attr( $instance [ 'select_cat' ] ),
                        'show_option_all'  => esc_html__( 'Show All Category Posts' , 'wishful-blog' ),
                        )
                    );
                ?>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name( 'post_type' ) ); ?>">
                    <strong><?php esc_html_e( 'Post Type' , 'wishful-blog' ); ?></strong>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_type' ) ); ?>">
                <?php

                foreach( $post_types as $key => $post_type ){
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['post_type'], $key ); ?>>
                        <?php
                            echo esc_html( $post_type );
                        ?>
                    </option>
                    <?php
                }
                ?>
                </select>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'post_no' ) ); ?>">
                    <strong><?php esc_html_e( 'No of Posts' , 'wishful-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_no' ) ); ?>" type="number" value="<?php echo esc_attr( $instance['post_no'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'display' ) ); ?>">
                    <strong><?php esc_html_e( 'Display Options' , 'wishful-blog' ); ?></strong>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'display' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'display' ) ); ?>">
                <?php
                    $display_choices = array(
                        'display_cat'     => esc_html__( 'Display Category', 'wishful-blog' ),
                        'display_cmt_no'  => esc_html__( 'Display Comment No.', 'wishful-blog' ),
                    );

                    foreach( $display_choices as $key => $display ){
                        ?>
                        <option value="<?php echo esc_attr( $key ); ?>" <?php if( $instance['display'] == $key ) { echo esc_attr( 'selected' ); } ?>>
                            <?php
                                echo esc_html( $display );
                            ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
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

            $instance['select_cat']            = absint( $new_instance['select_cat'] );

            $instance['post_type']             = sanitize_text_field( $new_instance['post_type'] );

            $instance['display']               = sanitize_text_field( $new_instance['display'] );

            $instance['post_no']               = absint( $new_instance['post_no'] );

            return $instance;
        }
    }
}
