<?php
 
 class Widget_Staby_Sponsors extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        add_action('admin_enqueue_scripts', array($this, 'scripts'));
        parent::__construct(
            'sponsors_widget', // Base ID
            'Sponsors_Widget', // Name
            array( 'description' => __( 'Sponsors Widget', 'text_domain' ), ) // Args
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
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Default title', 'text_domain' ) : $instance['title'] );
        $image = !empty( $instance['image'] ) ? $instance['image'] : '';
        echo $before_widget;
        if (!empty($title)){
            if (!empty($image)) {
                ?><a href="<?php echo esc_url($title)?>"><img src="<?php echo esc_url($image) ?>" alt=""></a><?php
            }
        else {
             ?><img src="<?php echo esc_url($image) ?>" alt=""> <?php
        }
        }
        echo $after_widget;
    }
 
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
        $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Link:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
            
            <button class="upload_image_button button button-primary">Upload Image</button>
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
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';
        return $instance;
    }

    public function scripts()
    {
        wp_enqueue_script( 'media-upload' );
        wp_enqueue_media();
        wp_enqueue_script('our_admin', get_template_directory_uri() . '/js/our_admin.js', array('jquery'));
    }
 
}
 
?>