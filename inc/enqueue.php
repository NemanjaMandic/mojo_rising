<?php

/*

@package mojorising

========================
ADMIN ENQUEUE FUNCTIONS
========================

*/

function mojo_load_admin_scripts( $hook ){
    echo $hook;
    
   if( 'toplevel_page_nemus_mojo' == $hook ){
    
    wp_register_style( 'mojo_admin', get_template_directory_uri() . '/css/mojo.admin.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'mojo_admin' );
    
    wp_enqueue_media();
    
    wp_register_script( 'mojo-admin-script', get_template_directory_uri() . '/js/mojo.admin.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'mojo-admin-script' );
       
   }else if('mojo_page_nemus_mojo_css' == $hook){
      wp_enqueue_script( 'mojo-admin-script', get_template_directory_uri() . '/js/mojo.admin.js', array('jquery'), '1.0.0', true );
   }else{
        return;
   }
}

add_action( 'admin_enqueue_scripts', 'mojo_load_admin_scripts' );