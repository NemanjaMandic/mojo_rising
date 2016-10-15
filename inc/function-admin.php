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
    
    //activate custom settings
    add_action( 'admin_init', 'mojo_custom_settings' );
}

add_action( 'admin_menu', 'mojo_add_admin_page' );

function mojo_custom_settings(){
    register_setting( 'mojo-settings-group', 'first_name' );
    register_setting( 'mojo-settings-group', 'last_name' );
    register_setting( 'mojo-settings-group', 'twitter_handler', 'mojo_sanitize_twitter_handler' );
    register_setting( 'mojo-settings-group', 'facebook_handler' );
    register_setting( 'mojo-settings-group', 'gplus_handler' );
    
    add_settings_section( 'mojo-sidebar-options', 'Sidebar Options', 'mojo_sidebar_options', 'nemus_mojo' );
    add_settings_field( 'sidebar-name', 'Full Name', 'mojo_sidebar_name', 'nemus_mojo', 'mojo-sidebar-options' );
    add_settings_field( 'sidebar-twitter', 'Twitter Handler', 'mojo_sidebar_twitter', 'nemus_mojo', 'mojo-sidebar-options' );
    add_settings_field( 'sidebar-facebook', 'Facebook Handler', 'mojo_sidebar_facebook', 'nemus_mojo', 'mojo-sidebar-options' );
    add_settings_field( 'sidebar-gplus', 'Google+ Handler', 'mojo_sidebar_gplus', 'nemus_mojo', 'mojo-sidebar-options' );
    
}

function mojo_sidebar_twitter(){
    
    $twitter = esc_attr(get_option( 'twitter_handler' ));
    
    echo '<input type="text" name="twitter_handler" value="'. $twitter .'" placeholder="Twitter Handler" />';
}

function mojo_sidebar_facebook(){
    
    $facebook = esc_attr(get_option( 'facebook_handler' ));
    
    echo '<input type="text" name="facebook_handler" value="'. $facebook .'" placeholder="Facebook Handler" />';
}

function mojo_sidebar_gplus(){
    
    $gplus = esc_attr(get_option( 'gplus_handler' ));
    
    echo '<input type="text" name="gplus_handler" value="'. $gplus .'" placeholder="Google+ Handler" />';
}

//Sanitization settings
function mojo_sanitize_twitter_handler(){
    
}
function mojo_sidebar_name(){
    
    $firstName = esc_attr(get_option( 'first_name' ));
    $lastName = esc_attr(get_option( 'last_name' ));
    
    echo '<input type="text" name="first_name" value="'. $firstName .'" placeholder="First Name" /> <input type="text" name="last_name" value="'. $lastName .'" placeholder="Last Name" />';
}
function mojo_sidebar_options(){
    echo "Kustomajz svoj sajdbar informajsn";
}

function mojo_rising_settings_page(){
    
    require_once( get_template_directory() . '/inc/templates/mojo-admin.php');
}

function mojo_rising_create_page(){
    echo '<h1>Sisaj karinu</h1>';
}