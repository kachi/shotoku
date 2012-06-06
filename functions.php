<?php

/*----------------------------------------------*/
/*_________Add Menu Support____________________*/

	add_theme_support( 'post-thumbnails' );
	add_theme_support('menus');
	add_theme_support('automatic-feed-links');
	add_custom_background();
	register_nav_menu( 'main', __( 'main menu', 'shotoku' ) );


/*----------------------------------------------*/
/*_________Comments____________________________*/

function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>">
				<div class="comment-author vcard">
		<?php echo get_avatar($comment,$size='45',$default='<path_to_url>' ); ?>

		<?php printf(__('<div class="name-label"><cite class="fn">%s</cite><br> '), get_comment_author_link()) ?>
					<div class="comment-meta commentmetadata"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
					</div>
						<div class="clear"></div>
			</div>
				<?php if ($comment->comment_approved == '0') : ?>
	<em><?php _e('Your comment is awaiting moderation.') ?></em><br />
		<?php endif; ?>
		<?php comment_text() ?>

		<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
	 </div>
<?php
        }


/*----------------------------------------------*/
/*_________Add jQueryCDN_______________________*/


function load_cdn() {
	if ( !is_admin() ) {
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js', array(), '1.6.4');
		}
	}
	add_action('init', 'load_cdn');



/*----------------------------------------------*/
/*_________Add Widget__________________________*/

if ( function_exists('register_sidebar') )
	register_sidebar();




/*----------------------------------------------*/
/*_________Social Links Widget_________________*/

/* Code by Yoko Theme( http://www.elmastudio.de/wordpress-themes/yoko/ ) */
/* Lisence:GNU GENERAL PUBLIC LICENSE */

class sociallinks_wp_widget extends WP_Widget {
	function sociallinks_wp_widget() {
		$widget_ops = array(
		'classname' => 'widget_social_links', 
		'description' => __('Link to your social profiles like twitter, facebook or flickr.', 'resp'));
		$this->WP_Widget('social_links', 'Your Social Links', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		
		$rss_title = empty($instance['rss_title']) ? ' ' : apply_filters('widget_rss_title', $instance['rss_title']);	
		$rss_url = empty($instance['rss_url']) ? ' ' : apply_filters('widget_rss_url', $instance['rss_url']);
		$twitter_title = empty($instance['twitter_title']) ? ' ' : apply_filters('widget_twitter_title', $instance['twitter_title']);	
		$twitter_url = empty($instance['twitter_url']) ? ' ' : apply_filters('widget_twitter_url', $instance['twitter_url']);		
		$facebook_title = empty($instance['facebook_title']) ? ' ' : apply_filters('widget_facebook_title', $instance['facebook_title']);
		$facebook_url = empty($instance['facebook_url']) ? ' ' : apply_filters('widget_facebook_url', $instance['facebook_url']);
		$youtube_title = empty($instance['youtube_title']) ? ' ' : apply_filters('widget_youtube_title', $instance['youtube_title']);
		$youtube_url = empty($instance['youtube_url']) ? ' ' : apply_filters('widget_youtube_url', $instance['youtube_url']);
		$tumblr_title = empty($instance['tumblr_title']) ? ' ' : apply_filters('widget_tumblr_title', $instance['tumblr_title']);
		$tumblr_url = empty($instance['tumblr_url']) ? ' ' : apply_filters('widget_tumblr_url', $instance['tumblr_url']);
		$google_title = empty($instance['google_title']) ? ' ' : apply_filters('widget_google_title', $instance['google_title']);
		$google_url = empty($instance['google_url']) ? ' ' : apply_filters('widget_google_url', $instance['google_url']);
		$skype_title = empty($instance['skype_title']) ? ' ' : apply_filters('widget_skype_title', $instance['skype_title']);
		$skype_url = empty($instance['skype_url']) ? ' ' : apply_filters('widget_skype_url', $instance['skypee_url']);
		$flickr_title = empty($instance['flickr_title']) ? ' ' : apply_filters('widget_flickr_title', $instance['flickr_title']);
		$flickr_url = empty($instance['flickr_url']) ? ' ' : apply_filters('widget_flickr_url', $instance['flickr_url']);
		$vimeo_title = empty($instance['vimeo_title']) ? ' ' : apply_filters('widget_vimeo_title', $instance['vimeo_title']);
		$vimeo_url = empty($instance['vimeo_url']) ? ' ' : apply_filters('widget_vimeo_url', $instance['vimeo_url']);
		$linkedin_title = empty($instance['linkedin_title']) ? ' ' : apply_filters('widget_linkedin_title', $instance['linkedin_title']);
		$linkedin_url = empty($instance['linkedin_url']) ? ' ' : apply_filters('widget_linkedin_url', $instance['linkedin_url']);
		$delicious_title = empty($instance['delicious_title']) ? ' ' : apply_filters('widget_delicious_title', $instance['delicious_title']);
		$delicious_url = empty($instance['delicious_url']) ? ' ' : apply_filters('widget_delicious_url', $instance['delicious_url']);
		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		echo '<ul>';
	if($rss_title == ' ') { echo ''; } else {  echo  '<li class="widget_sociallinks"><a href="'. $rss_url .'" class="rss">'. $rss_title .'</a></li>'; }
		if($twitter_title == ' ') { echo ''; } else {  echo  '<li class="widget_sociallinks"><a href="'. $twitter_url .'" class="twitter">'. $twitter_title .'</a></li>'; }
		if($facebook_title == ' ') { echo ''; } else {  echo  '<li class="widget_sociallinks"><a href="'. $facebook_url .'" class="facebook">'. $facebook_title .'</a></li>'; }
		if($youtube_title == ' ') { echo ''; } else {  echo  '<li class="widget_sociallinks"><a href="'. $youtube_url .'" class="youtube">'. $youtube_title .'</a></li>'; }
		if($tumblr_title == ' ') { echo ''; } else {  echo  '<li class="widget_sociallinks"><a href="'. $tumblr_url .'" class="tumblr">'. $tumblr_title .'</a></li>'; }
		if($google_title == ' ') { echo ''; } else {  echo  '<li class="widget_sociallinks"><a href="'. $google_url .'" class="google">'. $google_title .'</a></li>'; }
		if($skype_title == ' ') { echo ''; } else {  echo  '<li class="widget_sociallinks"><a href="'. $skype_url .'" class="skype">'. $skype_title .'</a></li>'; }
		if($flickr_title == ' ') { echo ''; } else {  echo  '<li class="widget_sociallinks"><a href="'. $flickr_url .'" class="flickr">'. $flickr_title .'</a></li>'; }
		if($vimeo_title == ' ') { echo ''; } else {  echo  '  <li class="widget_sociallinks"><a href="'. $vimeo_url .'" class="vimeo">'. $vimeo_title .'</a></li>'; }
		if($linkedin_title == ' ') { echo ''; } else {  echo  '<li class="widget_sociallinks"><a href="'. $linkedin_url .'" class="linkedin">'. $linkedin_title .'</a></li>'; }
		if($delicious_title == ' ') { echo ''; } else {  echo  '<li class="widget_sociallinks"><a href="'. $delicious_url .'" class="delicious">'. $delicious_title .'</a></li>'; }
		echo '</ul>';
		echo $after_widget;
		
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		$instance['rss_title'] = strip_tags($new_instance['rss_title']);
		$instance['rss_url'] = strip_tags($new_instance['rss_url']);
		$instance['twitter_title'] = strip_tags($new_instance['twitter_title']);
		$instance['twitter_url'] = strip_tags($new_instance['twitter_url']);
		$instance['facebook_title'] = strip_tags($new_instance['facebook_title']);
		$instance['facebook_url'] = strip_tags($new_instance['facebook_url']);
		$instance['youtube_title'] = strip_tags($new_instance['youtube_title']);
		$instance['youtube_url'] = strip_tags($new_instance['youtube_url']);
		$instance['tumblr_title'] = strip_tags($new_instance['tumblr_title']);
		$instance['tumblr_url'] = strip_tags($new_instance['tumblr_url']);
		$instance['google_title'] = strip_tags($new_instance['google_title']);
		$instance['google_url'] = strip_tags($new_instance['google_url']);
		$instance['skype_title'] = strip_tags($new_instance['skype_title']);
		$instance['skype_url'] = strip_tags($new_instance['skype_url']);
		$instance['flickr_title'] = strip_tags($new_instance['flickr_title']);
		$instance['flickr_url'] = strip_tags($new_instance['flickr_url']);
		$instance['vimeo_title'] = strip_tags($new_instance['vimeo_title']);
		$instance['vimeo_url'] = strip_tags($new_instance['vimeo_url']);
		$instance['linkedin_title'] = strip_tags($new_instance['linkedin_title']);
		$instance['linkedin_url'] = strip_tags($new_instance['linkedin_url']);
		$instance['delicious_title'] = strip_tags($new_instance['delicious_title']);
		$instance['delicious_url'] = strip_tags($new_instance['delicious_url']);
		return $instance;
	}
	function form($instance) {
		$instance = wp_parse_args(
		(array) $instance, array( 
			'title' => '',
			'rss_title' => '',
			'rss_url' => '',
			'twitter_title' => '',
			'twitter_url' => '',
			'facebook_title' => '',
			'facebook_url' => '',
			'youtube_title' => '',
			'youtube_url' => '',
			'tumblr_title' => '',
			'tumblr_url' => '',
			'google_title' => '',
			'google_url' => '',
			'skype_title' => '',
			'skype_url' => '',
			'flickr_title' => '',
			'flickr_url' => '',
			'vimeo_title' => '',
			'vimeo_url' => '',
			'linkedin_title' => '',
			'linkedin_url' => '',
			'delicious_title' => '',
			'delicious_url' => ''
		) );
		$title = strip_tags($instance['title']);
		$rss_title = strip_tags($instance['rss_title']);
		$rss_url = strip_tags($instance['rss_url']);
		$twitter_title = strip_tags($instance['twitter_title']);
		$twitter_url = strip_tags($instance['twitter_url']);
		$facebook_title = strip_tags($instance['facebook_title']);
		$facebook_url = strip_tags($instance['facebook_url']);
		$youtube_title = strip_tags($instance['youtube_title']);
		$youtube_url = strip_tags($instance['youtube_url']);
		$tumblr_title = strip_tags($instance['tumblr_title']);
		$tumblr_url = strip_tags($instance['tumblr_url']);
		$google_title = strip_tags($instance['google_title']);
		$google_url = strip_tags($instance['google_url']);
		$skype_title = strip_tags($instance['skype_title']);
		$skype_url = strip_tags($instance['skype_url']);
		$flickr_title = strip_tags($instance['flickr_title']);
		$flickr_url = strip_tags($instance['flickr_url']);
		$vimeo_title = strip_tags($instance['vimeo_title']);
		$vimeo_url = strip_tags($instance['vimeo_url']);
		$linkedin_title = strip_tags($instance['linkedin_title']);
		$linkedin_url = strip_tags($instance['linkedin_url']);
		$delicious_title = strip_tags($instance['delicious_title']);
		$delicious_url = strip_tags($instance['delicious_url']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('rss_title'); ?>"><?php _e( 'RSS Text:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('rss_title'); ?>" name="<?php echo $this->get_field_name('rss_title'); ?>" type="text" value="<?php echo esc_attr($rss_title); ?>" /></label></p>	
			<p><label for="<?php echo $this->get_field_id('rss_url'); ?>"><?php _e( 'RSS  URL:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('rss_url'); ?>" name="<?php echo $this->get_field_name('rss_url'); ?>" type="text" value="<?php echo esc_attr($rss_url); ?>" /></label></p>	
			<p><label for="<?php echo $this->get_field_id('twitter_title'); ?>"><?php _e( 'Twitter Text:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('twitter_title'); ?>" name="<?php echo $this->get_field_name('twitter_title'); ?>" type="text" value="<?php echo esc_attr($twitter_title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('twitter_url'); ?>"><?php _e( 'Twitter  URL:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('twitter_url'); ?>" name="<?php echo $this->get_field_name('twitter_url'); ?>" type="text" value="<?php echo esc_attr($twitter_url); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('facebook_title'); ?>"><?php _e( 'Facebook Text:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('facebook_title'); ?>" name="<?php echo $this->get_field_name('facebook_title'); ?>" type="text" value="<?php echo esc_attr($facebook_title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('facebook_url'); ?>"><?php _e( 'Facebook URL:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('facebook_url'); ?>" name="<?php echo $this->get_field_name('facebook_url'); ?>" type="text" value="<?php echo esc_attr($facebook_url); ?>" /></label></p>	
			<p><label for="<?php echo $this->get_field_id('youtube_title'); ?>"><?php _e( 'Youtube Text:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('youtube_title'); ?>" name="<?php echo $this->get_field_name('youtube_title'); ?>" type="text" value="<?php echo esc_attr($youtube_title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('youtube_url'); ?>"><?php _e( 'Youtube URL:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('youtube_url'); ?>" name="<?php echo $this->get_field_name('youtube_url'); ?>" type="text" value="<?php echo esc_attr($youtube_url); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('tumblr_title'); ?>"><?php _e( 'Tumblr Text:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('tumblr_title'); ?>" name="<?php echo $this->get_field_name('tumblr_title'); ?>" type="text" value="<?php echo esc_attr($tumblr_title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('tumblr_url'); ?>"><?php _e( 'Tumblr URL:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('tumblr_url'); ?>" name="<?php echo $this->get_field_name('tumblr_url'); ?>" type="text" value="<?php echo esc_attr($tumblr_url); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('google_title'); ?>"><?php _e( 'Google Text:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('google_title'); ?>" name="<?php echo $this->get_field_name('google_title'); ?>" type="text" value="<?php echo esc_attr($google_title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('google_url'); ?>"><?php _e( 'Google URL:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('google_url'); ?>" name="<?php echo $this->get_field_name('google_url'); ?>" type="text" value="<?php echo esc_attr($google_url); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('skype_title'); ?>"><?php _e( 'Skype Text:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('skype_title'); ?>" name="<?php echo $this->get_field_name('skype_title'); ?>" type="text" value="<?php echo esc_attr($skype_title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('skype_url'); ?>"><?php _e( 'Skype URL:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('skype_url'); ?>" name="<?php echo $this->get_field_name('skype_url'); ?>" type="text" value="<?php echo esc_attr($skype_url); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('flickr_title'); ?>"><?php _e( 'Flickr Text:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('flickr_title'); ?>" name="<?php echo $this->get_field_name('flickr_title'); ?>" type="text" value="<?php echo esc_attr($flickr_title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('flickr_url'); ?>"><?php _e( 'Flickr URL:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('flickr_url'); ?>" name="<?php echo $this->get_field_name('flickr_url'); ?>" type="text" value="<?php echo esc_attr($flickr_url); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('vimeo_title'); ?>"><?php _e( 'Vimeo Text:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('vimeo_title'); ?>" name="<?php echo $this->get_field_name('vimeo_title'); ?>" type="text" value="<?php echo esc_attr($vimeo_title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('vimeo_url'); ?>"><?php _e( 'Vimeo URL:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('vimeo_url'); ?>" name="<?php echo $this->get_field_name('vimeo_url'); ?>" type="text" value="<?php echo esc_attr($vimeo_url); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('linkedin_title'); ?>"><?php _e( 'LinkedIn Text:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('linkedin_title'); ?>" name="<?php echo $this->get_field_name('linkedin_title'); ?>" type="text" value="<?php echo esc_attr($linkedin_title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('linkedin_url'); ?>"><?php _e( 'LinkedIn URL:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('linkedin_url'); ?>" name="<?php echo $this->get_field_name('linkedin_url'); ?>" type="text" value="<?php echo esc_attr($linkedin_url); ?>" /></label></p>	
			<p><label for="<?php echo $this->get_field_id('delicious_title'); ?>"><?php _e( 'Delicious Text:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('delicious_title'); ?>" name="<?php echo $this->get_field_name('delicious_title'); ?>" type="text" value="<?php echo esc_attr($delicious_title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('delicious_url'); ?>"><?php _e( 'Delicious URL:', 'resp' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('delicious_url'); ?>" name="<?php echo $this->get_field_name('delicious_url'); ?>" type="text" value="<?php echo esc_attr($delicious_url); ?>" /></label></p>
<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("sociallinks_wp_widget");'));


?>