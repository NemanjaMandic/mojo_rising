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
    
   add_action( 'add_meta_boxes', 'mojo_contact_add_meta_box' );
   add_action( 'save_post', 'mojo_save_contact_email_data' );
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
            $email = get_post_meta( $post_id, '_contact_email_value_key', true );
            echo '<a href="mailto:' . $email . '">' . $email . '</a>';
            break;
    }
}

/* CONTACT META BOXES */

function mojo_contact_add_meta_box(){
    
    add_meta_box( 'contact_email', 'User Email', 'mojo_contact_email', 'mojo-contact', 'side' );
}

function mojo_contact_email( $post ){
    wp_nonce_field( 'mojo_save_contact_email_data', 'mojo_contact_email_meta_box_nonce');
    
    $value = get_post_meta( $post->ID, '_contact_email_value_key', true );
    
    echo '<label for="mojo_contact_email_field">User Email Address</label>';
    echo ' <input type="email" id="mojo_contact_email_field" name="mojo_contact_email_field"' . esc_attr( $value ) . '" size="25" />';
}

function mojo_save_contact_email_data( $post_id ){
    
    if( ! isset( $_POST['mojo_contact_email_meta_box_nonce'] ) ){
        return; 
    }
    
    if( ! wp_verify_nonce( $_POST['mojo_contact_email_meta_box_nonce'], 'mojo_save_contact_email_data') ){
        return;
    }
    
    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
        return;
    }
    
    if( ! current_user_can( 'edit_post', $post_id) ){
        return;
    }
    
    if( ! isset( $_POST['mojo_contact_email_field'] ) ){
        return;
    }
    
    $my_data = sanitize_text_field( $_POST['mojo_contact_email_field'] );
    
    update_post_meta( $post_id, '_contact_email_value_key', $my_data );
}








