<?php

/*

================================
REMOVE GENERATOR VERSION NMUBER
================================

*/

function mojo_remove_wp_version_string( $src ){
    global $wp_version;
    
    parse_str( parse_url( $src, PHP_URL_QUERY ), $query );
    if( !empty( $query['ver'] ) && $query['ver'] === $wp_version ){
        $src = remove_query_arg( 'ver', $src );
    }
    
    return $src;
}