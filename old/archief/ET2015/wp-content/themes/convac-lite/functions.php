<?php
/**
 * Convac functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 */
/**
 * Registers widget areas.
 *
 */
function convac_lite_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__('Page Sidebar', 'convac-lite'),
		'id' => 'page-sidebar',
		'before_widget' => '<li id="%1$s" class="ske-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="ske-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => esc_html__('Blog Sidebar', 'convac-lite'),
		'id' => 'blog-sidebar',
		'before_widget' => '<li id="%1$s" class="ske-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="ske-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Sidebar', 'convac-lite'),
		'id' => 'footer-sidebar',
		'before_widget' => '<div id="%1$s" class="ske-footer-container span3 ske-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="ske-title ske-footer-title">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'convac_lite_widgets_init' );

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Convac supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
*/
function convac_lite_theme_setup() {
	/*
	 * Makes Convac available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'convac-lite' to the name of your theme in all
	 * template files.
	 */
	 load_theme_textdomain( 'convac-lite', get_template_directory() . '/languages' );
	 
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	add_theme_support( 'title-tag' );

	$header_image = get_template_directory_uri() . '/images/header-static-img.jpg';

	add_theme_support( 'custom-header', array( 'flex-width' => true, 'width' => 1600, 'flex-height' => true, 'height' => 750, 'default-image' => $header_image ) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'avis_custom_background_args', array('default-color' => 'ffffff', ) ) );

	/**
	* SETS UP THE CONTENT WIDTH VALUE BASED ON THE THEME'S DESIGN.
	*/
	global $content_width;
	if ( ! isset( $content_width ) ){
	      $content_width = 900;
	}

	 // Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support('post-thumbnails');


	/**
	 * Enable support for Post Formats
	 */
	set_post_thumbnail_size( 636, 352, true );
	add_image_size( 'convac_lite_standard_img',636,352,true); 
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'Header' => esc_html__( 'Main Navigation', 'convac-lite' ),
	));
}
add_action( 'after_setup_theme', 'convac_lite_theme_setup' ); 

/**
* Funtion to add CSS class to body
*/
function convac_lite_add_class( $classes ) {

	if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && is_front_page() ) {
		$classes[] = 'front-page';
	}
	
	return $classes;
}
add_filter( 'body_class','convac_lite_add_class' );

/**
 * Filter content with empty post title
 *
 */

add_filter('the_title', 'convac_lite_untitled');
function convac_lite_untitled($title) {
	if ($title == '') {
		return esc_html__('Untitled','convac-lite');
	} else {
		return $title;
	}
}

// retrieves the attachment ID from the file URL
function convac_lite_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
    return $attachment[0]; 
}

function convac_lite_get_all_authors() {
	global $wpdb;
	$order = 'user_nicename';
	$user_ids = $wpdb->get_col("SELECT ID FROM $wpdb->users ORDER BY $order");

	foreach($user_ids as $user_id) :
		$user = get_userdata($user_id);
		if(count_user_posts( $user_id ) > 0) {
			$all_authors[] = array(
								'value' => $user_id,
								'label' => $user->display_name
							);
		}
	endforeach;
	return $all_authors;
}

/*---------------------------------------------------------------------------*/
/* ADMIN SCRIPT: Enqueue scripts in back-end
/*---------------------------------------------------------------------------*/
if( !function_exists('convac_lite_page_admin_enqueue_scripts') ){
    add_action('admin_print_scripts-appearance_page_ot-theme-options','convac_lite_page_admin_enqueue_scripts');
    /**
     * Register scripts for admin panel
     * @return void
     */
    function convac_lite_page_admin_enqueue_scripts(){	
		wp_enqueue_style( 'convac-lite-admin-stylesheet', get_template_directory_uri().'/SketchBoard/css/sketch-admin.css', false);
    }
}

/**
 * Add Customizer 
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Add Config File 
 */
require_once(get_template_directory() . '/SketchBoard/functions/admin-init.php');


//---------------------------------------------------------------------
//---------------------------------------------------------------------
/* Theme Recommended Plugins
/*---------------------------------------------------------------------------*/
if ( !defined( 'CONVAC_REQUIRED_PLUGINS' ) ) {
	define( 'CONVAC_REQUIRED_PLUGINS', trailingslashit(get_theme_root()) . 'convac-lite/includes/plugins' );
}
include_once('includes/skt-required-plugins.php');
//---------------------------------------------------------------------
/* Upsell Pro Theme
/*---------------------------------------------------------------------------*/
require_once( trailingslashit( get_template_directory() ) . 'sketchthemes-upsell/class-customize.php' );
?>