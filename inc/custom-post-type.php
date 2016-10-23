<?php

/*

======================
THEME CUSTOM POST TYEPS
======================

*/


$contact = get_option( 'activate_contact' );
if( @$contact == 1 ){
    
   add_action( 'init', 'sunset_contact_custom_post_type' );
    
   add_filter( 'manage_mojo-contact_posts_columns', 'mojo_set_contact_column' );
   add_action( 'manage_mojo-contact_posts_custom_column', 'mojo_contact_custom_column', 10, 2 );
}

function sunset_contact_custom_post_type(){
    $labels = array(
        'name'           => 'Messages',
        'singular_name'  => 'Message',
        'menu_name'      => 'Messages',
        'name_admin_bar' => 'Message'
        
    );
    
    $args = array(
       'labels'           => $labels,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierarchical'    => false,
        'menu_position'   => 26,
        'menu_icon'       => 'dashicons-email-alt',
        'supports'        => array( 'title', 'editor', 'author')
    );
    
    register_post_type('mojo-contact', $args);
}

function mojo_set_contact_column( $columns ){
   
    $newColumns = array();
    $newColumns['title'] = 'Full Name';
    $newColumns['message'] = 'Message';
    $newColumns['email'] = 'Email';
    $newColumns['date'] = 'Date';
    return $newColumns;
}

function mojo_contact_custom_column( $column, $post_id ){
    
    switch( $column ){
            
        case 'message' :
            echo get_the_excerpt();
            break;
            
        case 'email' :
            echo 'email address';
            break;
    }
}











