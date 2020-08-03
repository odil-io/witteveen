<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  load_theme_textdomain('sage', get_template_directory() . '/lang');
  add_theme_support('title-tag');
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage')
  ]);
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

/**
 * Manage google fonts of load_google_font()
 * set GOOGLE_FONTS constant in functions.php
 */
function load_google_fonts() {

  wp_register_style('imaga/google-fonts', 'http://fonts.googleapis.com/css?family=Open Sans');
  wp_enqueue_style( 'imaga/google-fonts');

}
add_action( 'wp_head', __NAMESPACE__ . '\\load_google_fonts' , 1);

function acf_google_map_api( $api ){

  if( ! defined( 'GOOGLE_FONTS' ) ) return;
	$api['key'] = GOOGLE_MAPS;

	return $api;

}

add_filter('acf/fields/google_map/api', __NAMESPACE__ . '\\acf_google_map_api');

function unregister_tags_for_posts() {
    unregister_taxonomy_for_object_type( 'category', 'post' );
}
add_action( 'init', __NAMESPACE__ . '\\unregister_tags_for_posts' );


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_landen',
	'title' => 'Landen',
	'fields' => array(
		array(
			'key' => 'field_landen',
			'label' => 'Landen',
			'name' => 'landen',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'Leeuwarden' => 'Leeuwarden',
        'Duitsland' => 'Duitsland',
				'Polen' => 'Polen'
			),
			'allow_custom' => 0,
			'default_value' => array(
			),
			'layout' => 'horizontal',
			'toggle' => 0,
			'return_format' => 'value',
			'save_custom' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_locatie',
	'title' => 'Post Location',
	'fields' => array(
		array(
			'key' => 'field_locatie',
			'label' => 'Location',
			'name' => 'location',
			'type' => 'google_map',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'center_lat' => '',
			'center_lng' => '',
			'zoom' => '',
			'height' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
