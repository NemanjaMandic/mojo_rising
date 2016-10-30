<?php

/*

@package mojorising

========================
ADMIN ENQUEUE FUNCTIONS
========================

*/

function mojo_load_admin_scripts( $hook ){
   // echo $hook;
    
   if( 'toplevel_page_nemus_mojo' == $hook ){
    
    wp_register_style( 'mojo_admin', get_template_directory_uri() . '/css/mojo.admin.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'mojo_admin' );
    
    wp_enqueue_media();
    
    wp_register_script( 'mojo-admin-script', get_template_directory_uri() . '/js/mojo.admin.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'mojo-admin-script' );
       
   }else if('mojo_page_nemus_mojo_css' == $hook){
      
       wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/mojo.ace.css', array(), '1.0.0', 'all' );
       
       wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.0.0', true );
       wp_enqueue_script( 'mojo-custom-css-script', get_template_directory_uri() . '/js/mojo.custom_css.js', array('jquery'), '1.2.1', true);
   }else{
        return;
   }
}

add_action( 'admin_enqueue_scripts', 'mojo_load_admin_scripts' );

/*

===========================
FRONTEND ENQUEUE FUNCTIONS
===========================

*/


function mojo_load_scripts(){
    
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'mojo', get_template_directory_uri() . '/css/mojo.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'railway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
    
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', false, '3.1.1', true );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
}

add_action( 'wp_enqueue_scripts', 'mojo_load_scripts' );








