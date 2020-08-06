<?php

/**
 * Ensure compatible version of PHP is used
 */
if ( version_compare( '7.4', phpversion(), 'ge' ) ):
  wp_die( __( 'This theme requires PHP 7.4 or greater. Current version is ' . phpversion(), 'o_w'), __( 'Invalid PHP version', 'o_w' ) );
endif;

/**
 * Ensure compatible version of WordPress is used
 */
if ( version_compare( '5.4', get_bloginfo('version'), 'ge' ) ):
    wp_die( __( 'This theme requires WordPress 5.4 or greater. Current version is ' . $wp_version, 'o_w' ), __( 'Invalid WordPress version', 'o_w' ) );
endif;

/*
 * The Theme setup
 */
function setup_theme() {

  // Make theme available for translation
  load_theme_textdomain('o_w', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'o_w'),
    'secondary_navigation' => __('Secondary Navigation', 'o_w'),
    'footer_navigation' => __('Footer Navigation', 'o_w'),
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Enable post formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Add image sizes
  add_image_size('jumbotron', 1920, 600, true);
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup_theme');

/*
 * Theme assets
 */
function load_assets() {

  // Re-register jQuery
  // wp_deregister_script('jquery');
  // wp_enqueue_script('jquery', Assets\load('scripts/jquery.min.js'), null, null, true);

  // Create version number based on last file edit
  // $main_js_version  = date("ymd-Gis", filemtime( Assets\asset_path('scripts/main.min.js') ));
  // $main_css_version  = date("ymd-Gis", filemtime( Assets\asset_path('styles/main.min.css') ));

  // Enqueue main javascript
  // wp_enqueue_script('o-w/js', Assets\load('scripts/main.min.js'), ['jquery'], null, true);

  // Enqueue Google Fonts
  // wp_enqueue_style( 'o-w/fonts', 'http://fonts.googleapis.com/css?family=' . GOOGLE_FONTS . '&display=swap');

  // Enqueue main stylesheet
  wp_enqueue_style('o-w/css', get_stylesheet_directory_uri() . '/style.css', null, null);

}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\load_assets', 100);

/*
 * Customize login
 */
function customize_login() {

  // Create version number based on last file edit
  // $main_js_version  = date("ymd-Gis", filemtime( Assets\load('styles/login.min.js') ));
  wp_register_style('o_w/login', Assets\load('styles/login.min.css') );

  // Enqueue login stylesheet
  wp_enqueue_style( 'o_w/login');

}
// add_action( 'login_enqueue_scripts', __NAMESPACE__ . '\\customize_login' );

/*
 * Remove/disable clutter WordPress code and other unused assets/functions
 */
function remove_clutter(){
    remove_action('wp_head', 'wp_generator');
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
}
