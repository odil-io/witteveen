<?php

function convac_lite_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->remove_control('header_textcolor');

	// ====================================
	// = Convac Lite Theme Pannel
	// ====================================
	$wp_customize->add_panel( 'sketchthemes', array(
		'title' 	=> esc_html__( 'Convac Lite Options','convac-lite'),
		'description' => esc_html__( 'This section allows you to change and preview theme options before saving them.','convac-lite'),
		'priority' 	=> 10,
	) );
	// ====================================
	// = Convac Lite Theme Sections
	// ====================================
	$wp_customize->add_section( 'general_default' , array(
		'title' 		=> esc_html__('General Settings','convac-lite'),
		'panel' 		=> 'sketchthemes',
	) );
	$wp_customize->add_section( 'header_settings' , array(
		'title' 		=> esc_html__('Header Settings','convac-lite'),
		'panel' 		=> 'sketchthemes',
	) );
	$wp_customize->add_section( 'author_settings' , array(
		'title' 		=> esc_html__('Author Settings','convac-lite'),
		'panel' 		=> 'sketchthemes',
	) );
	$wp_customize->add_section( 'social_links' , array(
		'title' 		=> esc_html__('Header Social Links','convac-lite'),
		'panel' 		=> 'sketchthemes',
	) );
	$wp_customize->add_section( 'innerpage_settings' , array(
		'title' 		=> esc_html__('Inner Page Settings','convac-lite'),
		'panel' 		=> 'sketchthemes',
	) );
	$wp_customize->add_section( 'blog_settings' , array(
		'title' 		=> esc_html__('Blog Settings','convac-lite'),
		'panel' 		=> 'sketchthemes',
	) );
	$wp_customize->add_section( 'footer_section' , array(
		'title' 		=> esc_html__('Footer Settings','convac-lite'),
		'panel' 		=> 'sketchthemes',
	) );

	// ====================================
	// = General Settings Sections
	// ====================================
	$wp_customize->add_setting( '_colorpicker', array(
		'default'           => '#f65e13' ,
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '_colorpicker', array(
		'priority' 		=> 1,
		'section'     	=> 'general_default',
		'label'       	=> esc_html__( 'Primary Color Scheme', 'convac-lite' ),
	) ) );
	$wp_customize->add_setting( '_show_pagination', array(
		'default'           => 'on',
		'sanitize_callback' => 'convac_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( '_show_pagination', array(
		'type' => 'radio',
		'section' => 'general_default',
		'label' => esc_html__( 'Show Pagination', 'convac-lite' ),
		'choices' => array(
			'on' => esc_html__('ON', 'convac-lite' ),
			'off'=> esc_html__('OFF', 'convac-lite' ),
		),
	) );

	// ====================================
	// = Header Settings Sections
	// ====================================
	$wp_customize->add_setting( '_logo_img', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control(  new WP_Customize_Image_Control( $wp_customize, '_logo_img', array(
		'section' 		=> 'header_settings',
		'label' 		=> esc_html__( 'Logo Image', 'convac-lite' ),
		'description' 	=> esc_html__('Uplaod your beautiful logo image from here. Maximum Recomended size 370x68 px.', 'convac-lite' ),
	) ) );

	$wp_customize->add_setting( '_moblie_menu', array(
		'default'           => 'on',
		'sanitize_callback' => 'convac_lite_sanitize_textarea',
	) );
	$wp_customize->add_control( '_moblie_menu', array(
		'type' => 'range',
		'section' => 'header_settings',
		'label' => esc_html__( 'Mobile Menu Activate Width', 'convac-lite' ),
		'description' => esc_html__( 'Layout width after which mobile menu will get activated', 'convac-lite' ),
		'input_attrs' => array(
			'min' => 100,
			'max' => 1180,
			'step' => 1,
		),
	) );

	$wp_customize->add_setting( '_headserach', array(
		'default'           => 'on',
		'sanitize_callback' => 'convac_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( '_headserach', array(
		'type' => 'radio',
		'section' => 'header_settings',
		'label' => esc_html__( 'Search Form In Header', 'convac-lite' ),
		'choices' => array(
			'on' => esc_html__('ON', 'convac-lite' ),
			'off'=> esc_html__('OFF', 'convac-lite' ),
		),
	) );

	//==================================================================
	// AUTHOR SETTINGS SECTION STARTS ============================
	//==================================================================
	$wp_customize->add_setting( '_author_img', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control(  new WP_Customize_Image_Control( $wp_customize, '_author_img', array(
		'section' 		=> 'author_settings',
		'label' 		=> esc_html__( 'Upload Author Image', 'convac-lite' ),
	) ) );

	$wp_customize->add_setting( '_author_name', array(
		'default'           => '',
		'sanitize_callback' => 'convac_lite_sanitize_textarea',
	) );
	$wp_customize->add_control( '_author_name', array(
		'section'  		=> 'author_settings',
		'label'    		=> esc_html__( 'Author Name', 'convac-lite' ),
	) );

	$wp_customize->add_setting( '_author_desp', array(
		'default'           => '',
		'sanitize_callback' => 'convac_lite_sanitize_textarea',
	) );
	$wp_customize->add_control( '_author_desp', array(
		'type'	=> 'textarea',
		'section'  		=> 'author_settings',
		'label'    		=> esc_html__( 'Author Discrbtion', 'convac-lite' ),
	) );

	//==================================================================
	// SOCIAL LINKS SETTINGS SECTION STARTS ============================
	//==================================================================

	$wp_customize->add_setting( '_sconnect_txt', array(
		'default'           => '',
		'sanitize_callback' => 'convac_lite_sanitize_textarea',
	) );
	$wp_customize->add_control( '_sconnect_txt', array(
		'type'	=> 'textarea',
		'section'  		=> 'social_links',
		'label'    		=> esc_html__( 'Enter text for connect label', 'convac-lite' ),
	) );
	// Facebook
	$wp_customize->add_setting( '_fbook_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( '_fbook_link', array(
		'type'     		=> 'url',
		'section'  		=> 'social_links',
		'label'    		=> esc_html__( 'Facebook URL', 'convac-lite' ),
	) );
	// Twitter
	$wp_customize->add_setting( '_twitter_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( '_twitter_link', array(
		'type'     		=> 'url',
		'section'  		=> 'social_links',
		'label'    		=> esc_html__( 'Twitter URL', 'convac-lite' ),
	) );
	// Goggle+
	$wp_customize->add_setting( '_gplus_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( '_gplus_link', array(
		'type'     		=> 'url',
		'section'  		=> 'social_links',
		'label'    		=> esc_html__( 'Google+ URL', 'convac-lite' ),
	) );
	// LinkedIn
	$wp_customize->add_setting( '_linkedin_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( '_linkedin_link', array(
		'type'     		=> 'url',
		'section'  		=> 'social_links',
		'label'    		=> esc_html__( 'LinkedIn URL', 'convac-lite' ),
	) );
	// Pinterest
	$wp_customize->add_setting( '_pinterest_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( '_pinterest_link', array(
		'type'     		=> 'url',
		'section'  		=> 'social_links',
		'label'    		=> esc_html__( 'Pinterest URL', 'convac-lite' ),
	) );
	// Flickr
	$wp_customize->add_setting( '_flickr_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( '_flickr_link', array(
		'type'     		=> 'url',
		'section'  		=> 'social_links',
		'label'    		=> esc_html__( 'Flickr URL', 'convac-lite' ),
	) );
	// Foursquare
	$wp_customize->add_setting( '_foursquare_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( '_foursquare_link', array(
		'type'     		=> 'url',
		'section'  		=> 'social_links',
		'label'    		=> esc_html__( 'Foursquare URL', 'convac-lite' ),
	) );
	// YouTube
	$wp_customize->add_setting( '_youtube_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( '_youtube_link', array(
		'type'     		=> 'url',
		'section'  		=> 'social_links',
		'label'    		=> esc_html__( 'YouTube URL', 'convac-lite' ),
	) );

	$wp_customize->add_setting( '_skype_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( '_skype_link', array(
		'type'     		=> 'url',
		'section'  		=> 'social_links',
		'label'    		=> esc_html__( 'Skype URL', 'convac-lite' ),
	) );

	$wp_customize->add_setting( '_instagram_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( '_instagram_link', array(
		'type'     		=> 'url',
		'section'  		=> 'social_links',
		'label'    		=> esc_html__( 'Instagram URL', 'convac-lite' ),
	) );

	$wp_customize->add_setting( '_vk_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( '_vk_link', array(
		'type'     		=> 'url',
		'section'  		=> 'social_links',
		'label'    		=> esc_html__( 'Vk URL', 'convac-lite' ),
	) );

	$wp_customize->add_setting( '_Vimeo_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( '_Vimeo_link', array(
		'type'     		=> 'url',
		'section'  		=> 'social_links',
		'label'    		=> esc_html__( 'Vimeo URL', 'convac-lite' ),
	) );

	$wp_customize->add_setting( '_whatsapp_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( '_whatsapp_link', array(
		'type'     		=> 'url',
		'section'  		=> 'social_links',
		'label'    		=> esc_html__( 'Whatsapp URL', 'convac-lite' ),
	) );
	
	// ====================================
	// = Home Page Settings Sections
	// ====================================
	$wp_customize->add_setting( '_innerpage_img', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control(  new WP_Customize_Image_Control( $wp_customize, '_innerpage_img', array(
		'section' 		=> 'innerpage_settings',
		'label' 		=> esc_html__( 'Upload Inner Page Header Image', 'convac-lite' ),
	) ) );
	
	// ====================================
	// = Blog Page Settings Sections
	// ====================================
	$wp_customize->add_setting( '_blogpage_heading', array(
		'default'        => esc_html__('Blog', 'convac-lite'),
		'sanitize_callback' => 'convac_lite_sanitize_textarea',
	));
	$wp_customize->add_control('_blogpage_heading', array(
		'priority' => 1,
		'section' => 'blog_settings',
		'label' => esc_html__('Blog Page Title','convac-lite'),
	));
	// ====================================
	// = Footer Settings Sections
	// ====================================
	$wp_customize->add_setting( '_copyright', array(
		'default'        => esc_html__('Copyright... Powered by WordPress', 'convac-lite'),
		'sanitize_callback' => 'convac_lite_sanitize_textarea',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control('_copyright', array(
		'section' => 'footer_section',
		'label' => esc_html__('Copyright Text','convac-lite'),
		'description' => esc_html__('You can use HTML for links', 'convac-lite'),
	));
}
add_action( 'customize_register', 'convac_lite_customize_register' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Convac Lite 1.0
 */
function convac_lite_customize_preview_js() {
	wp_enqueue_script( 'convac-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'convac_lite_customize_preview_js' );


// sanitize textarea
function convac_lite_sanitize_textarea( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function convac_lite_sanitize_on_off( $input ) {
	$valid = array(
		'on' => esc_html__('ON', 'convac-lite' ),
		'off'=> esc_html__('OFF', 'convac-lite' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

?>