<?php

/*

======================
THEME SUPPORT OPTIONS
======================

*/

$options = get_option( 'post_formats' );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();

foreach( $formats as $format ){
    $output[] = ( @$options[$format] == 1 ? $format : '');
}
if( !empty( $options )){
    add_theme_support( 'post_formats', $output );
}

$header = get_option( 'custom_header' );
if( @$header == 1 ){
    add_theme_support( 'custom-header' );
}

$header = get_option( 'custom_background' );
if( @$header == 1 ){
    add_theme_support( 'custom-background' );
}

add_theme_support( 'post-thumbnails' );

/* Activate Nav Menu Option */

function mojo_register_nav_menu(){
    register_nav_menu( 'primary_menu', 'Primary Navigation Menu' );
}

add_action( 'after_setup_theme', 'mojo_register_nav_menu' );

/*
    ============================
    BLOG LOOP CUSTOM FUNCTIONS
    ===========================
*/

function mojo_posted_meta(){
    return 'category name and publishing time';
}



















