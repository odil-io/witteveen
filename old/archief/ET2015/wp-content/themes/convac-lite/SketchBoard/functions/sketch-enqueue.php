<?php
/***********************************************
*  ENQUQUE CSS AND JAVASCRIPT
************************************************/
//ENQUEUE FRONT SCRIPTS
function convac_lite_theme_stylesheet()
{
	$theme = wp_get_theme();

	global $is_IE;
	if($is_IE ) {
		wp_enqueue_style( 'ie-style', get_template_directory_uri().'/css/ie-style.css', false, $theme->Version );
		wp_enqueue_style( 'awesome-theme-stylesheet', get_template_directory_uri().'/css/font-awesome-ie7.css', false, $theme->Version );
	}

	wp_enqueue_script('hoverIntent');
	wp_enqueue_script('superfish', get_template_directory_uri().'/js/superfish.js',array('jquery'),true,'1.0');
	wp_enqueue_script('easing_slide',get_template_directory_uri().'/js/jquery.easing.1.3.js',array('jquery'),'1.0',true);
	wp_enqueue_script('waypoints',get_template_directory_uri().'/js/waypoints.min.js',array('jquery'),'1.0',true );
	
	wp_enqueue_style('convac-style', get_stylesheet_uri());
	wp_enqueue_style('animation', get_template_directory_uri().'/css/convac-animation.css', false, $theme->Version);
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.css', false, $theme->Version);
	wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider.css', false, $theme->Version);
	
	/*PRETTYPHOTO*/
	wp_enqueue_script('prettyPhoto',get_template_directory_uri() .'/js/jquery.prettyPhoto.js',array('jquery'),true,'1.0');
	wp_enqueue_style('pretty-Photo', get_template_directory_uri().'/css/prettyPhoto.css', false, $theme->Version);
	
	/*SUPERFISH*/
	wp_enqueue_style('superfish', get_template_directory_uri().'/css/superfish.css', false, $theme->Version);
	wp_enqueue_style('bootstrap-responsive', get_template_directory_uri().'/css/bootstrap-responsive.css', false, $theme->Version);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script('convac_lite_componentssimple_slide', get_template_directory_uri() .'/js/custom.js',array('jquery'),'1.0',0 );

	/*GOOGLE FONTS*/
	wp_enqueue_style('google-Fonts-Opensans','//fonts.googleapis.com/css?family=Open+Sans:400,600', false, $theme->Version);

}
add_action('wp_enqueue_scripts', 'convac_lite_theme_stylesheet');

function convac_lite_head() {
	
	require_once(get_template_directory().'/includes/convac-custom-css.php');
	
}
add_action('wp_head', 'convac_lite_head');
