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
    add_theme_support( 'post_formats', $format );
}

$header = get_option( 'custom_header' );
if( @$header == 1 ){
    add_theme_support( 'custom-header' );
}

$header = get_option( 'custom_background' );
if( @$header == 1 ){
    add_theme_support( 'custom-background' );
}