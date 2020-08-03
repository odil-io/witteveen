<?php

Class Initialize {
    public $current_path;
    public $site_title;

    public function __construct( string $PATH ){
        $this->setup( $PATH );
    }

    public function setup( string $PATH ){
        $this->current_path = $PATH;
    }

    public function get_the_path(){
        return $this->current_path;
    }

    // Add Menu

    // Return Menu Object

    // Add Custom Post Type
        // Single name
        // Plural name
        // Menu name
}
