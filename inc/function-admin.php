<?php

/*
=====================
ADMIN PAGE
=====================
*/

function mojo_add_admin_page(){
    
    //Generate Mojo Admin Page
    add_menu_page( 'Mojo Theme Options', 'Mojo', 'manage_options', 'nemus_mojo', 'mojo_rising_create_page', get_template_directory_uri() . '/img/sunset-icon.png', 110 );
    
    //Generate sub page
    add_submenu_page( 'nemus_mojo', 'Mojo Theme Options', 'General', 'manage_options', 'nemus_mojo', 'mojo_rising_create_page' );
    
    add_submenu_page( 'nemus_mojo', 'Mojo CSS Options', 'Custom CSS', 'manage_options', 'nemus_mojo_css', 'mojo_rising_settings_page' );
}

add_action( 'admin_menu', 'mojo_add_admin_page' );

function mojo_rising_settings_page(){
    
    require_once( get_template_directory() . '/inc/templates/mojo-admin.php');
}
function mojo_rising_create_page(){
    echo '<h1>Sisaj karinu</h1>';
}