<?php

/*
=====================
ADMIN PAGE
=====================
*/

function mojo_add_admin_page(){
    
    add_menu_page('Mojo Theme Options', 'Mojo', 'manage_options', 'nemus-mojo', 'mojo_rising_create_page', get_template_directory_uri() . '/img/sunset-icon.png', 110);
}

add_action( 'admin_menu', 'mojo_add_admin_page' );

function mojo_rising_create_page(){
    echo '<h1>Sisaj karinu</h1>';
}