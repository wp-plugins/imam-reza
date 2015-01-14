<?php
/*
Plugin Name: Razavi TV
Description: Online watching Mashhad-Harame emam Reza
author:Reza nasrollahi in 7learn.com
Plugin URI: http://7learn.com/

*/
/* Start Adding Functions Bezamenw this Line */


/* Stop Adding Functions Bezamenw this Line */
?>
<?php // Creating the widget 
class zamen_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'zamen_widget', 

// Widget name will appear in UI
__('زیارت امام رئوف (علیه السلام)', 'zamen_widget_domain'), 

// Widget description
array( 'description' => __( 'زیارت مجازی حضرت امام رضا (علیه السام)', 'zamen_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
print __( '
  <div id="velayattv_wrapper" style="position: relative; width: 100%; height: 100%;">
    <object type="application/x-shockwave-flash" data="http://shiayan.ir/wp-content/themes/shiayan/swf/player.swf" width="100%" height="100%" bgcolor="#000000" id="velayattv" name="velayattv" tabindex="0">
      <param name="allowfullscreen" value="true">
      <param name="allowscriptaccess" value="always">
      <param name="seamlesstabbing" value="true">
      <param name="wmode" value="opaque">
      <param name="flashvars" value="netstreambasepath=http%3A%2F%2Fshiayan.ir%2F%25D9%25BE%25D8%25AE%25D8%25B4-%25D8%25B2%25D9%2586%25D8%25AF%25D9%2587-%25D8%25AD%25D8%25B1%25D9%2585-%25D8%25A7%25D9%2585%25D8%25A7%25D9%2585-%25D8%25B1%25D8%25B6%25D8%25A7-%25D8%25B1%25D9%2588%25D8%25B6%25D9%2587-%25D9%2585%25D9%2586%25D9%2588%25D8%25B1%25D9%2587%2F&amp;id=velayattv&amp;file=flv%3Arozeh2&amp;streamer=rtmp%3A%2F%2F185.23.131.187%2Flive%2F&amp;smoothing=true&amp;menu=false&amp;autostart=true&amp;bufferlength=2&amp;controlbar.position=bottom">
    </object>
  </div>


', 'zamen_widget_domain' );
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'زیارت امام رئوف (علیه السلام)', 'zamen_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class zamen_widget ends here

// Register and zamenad the widget
function zamen_zamenad_widget() {
	register_widget( 'zamen_widget' );
}
add_action( 'widgets_init', 'zamen_zamenad_widget' );?>
