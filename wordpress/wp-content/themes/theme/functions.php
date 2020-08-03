<?php

require_once( trailingslashit( get_template_directory() ) . '/core/initialize.php');

if ( class_exists('Initialize') ) {
    $theme = New Initialize( get_template_directory() );

    $theme->set_site_title('Odilio Witteveen');
}
