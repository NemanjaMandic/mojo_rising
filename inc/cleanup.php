<?php

/*

================================
REMOVE GENERATOR VERSION NMUBER
================================

*/

//Remove version string from js
function mojo_remove_wp_version_string( $src ){
    global $wp_version;
    
    parse_str( parse_url( $src, PHP_URL_QUERY ), $query );
    if( !empty( $query['ver'] ) && $query['ver'] === $wp_version ){
        $src = remove_query_arg( 'ver', $src );
    }
    
    return $src;
}

add_filter( 'script_loader_src', 'mojo_remove_wp_version_string' );
add_filter( 'style_loader_src', 'mojo_remove_wp_version_string' );

//remove metatag generator from header
function mojo_remove_meta_version(){
    return '';
}

add_filter( 'the_generator', 'mojo_remove_meta_version' );