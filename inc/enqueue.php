<?php

/*

@package mojorising

========================
ADMIN ENQUEUE FUNCTIONS
========================

*/

function mojo_load_admin_scripts( $hook ){
    
   if( 'mojo_page_nemus_mojo_css' != $hook ){
       return;
   }
   
    
    wp_register_style( 'mojo_admin', get_template_directory_uri() . '/css/mojo.admin.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'mojo_admin' );
}

add_action( 'admin_enqueue_scripts', 'mojo_load_admin_scripts' );