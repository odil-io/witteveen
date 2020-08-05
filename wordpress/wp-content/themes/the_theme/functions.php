<?php

// require_once( trailingslashit( get_template_directory() ) . '/core/setup.php');

// Setting up the theme
$files = [
  'core/setup.php',
  'core/walker.php',
];

foreach ( $files as $file ):
    if ( !$filepath = locate_template( $file ) ):
        wp_die( sprintf( __( 'Error locating %s for inclusion', 'o_w' ), $file ), E_USER_ERROR );
    endif;
    require_once $filepath;
endforeach;
unset( $file, $filepath );
