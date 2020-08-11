<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body>

    <?php

    if( !is_front_page() ):
        get_template_part('template-parts/navigation/navigation');

        get_template_part('template-parts/jumbotron/jumbotron');
    endif;
