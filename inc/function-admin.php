<?php
/*
	
@package mojorising
	
	========================
		ADMIN PAGE
	========================
*/
function mojo_add_admin_page() {
	
	//Generate Sunset Admin Page
	add_menu_page( 'Mojo Theme Options', 'Mojo', 'manage_options', 'nemus_mojo', 'mojo_theme_create_page', get_template_directory_uri() . '/img/mojo-icon.png', 110 );
	
	//Generate Sunset Admin Sub Pages
	add_submenu_page( 'nemus_mojo', 'Mojo Sidebar Options', 'Sidebar', 'manage_options', 'nemus_mojo', 'mojo_theme_create_page' );
	add_submenu_page( 'nemus_mojo', 'Mojo Theme Options', 'Theme Options', 'manage_options', 'nemus_mojo_theme', 'mojo_theme_support_page' );
	add_submenu_page( 'nemus_mojo', 'Mojo Contact Form', 'Contact Form', 'manage_options', 'nemus_mojo_theme_contact', 'mojo_contact_form_page' );
	add_submenu_page( 'nemus_mojo', 'Mojo CSS Options', 'Custom CSS', 'manage_options', 'nemus_mojo_css', 'mojo_theme_settings_page');
	
}
add_action( 'admin_menu', 'mojo_add_admin_page' );
//Activate custom settings
add_action( 'admin_init', 'mojo_custom_settings' );
function mojo_custom_settings() {
	//Sidebar Options
	register_setting( 'mojo-settings-group', 'profile_picture' );
	register_setting( 'mojo-settings-group', 'first_name' );
	register_setting( 'mojo-settings-group', 'last_name' );
	register_setting( 'mojo-settings-group', 'user_description' );
	register_setting( 'mojo-settings-group', 'twitter_handler', 'mojo_sanitize_twitter_handler' );
	register_setting( 'mojo-settings-group', 'facebook_handler' );
	register_setting( 'mojo-settings-group', 'gplus_handler' );
	
	add_settings_section( 'mojo-sidebar-options', 'Sidebar Option', 'mojo_sidebar_options', 'nemus_mojo');
	
	add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'mojo_sidebar_profile', 'nemus_mojo', 'mojo-sidebar-options');
	add_settings_field( 'sidebar-name', 'Full Name', 'mojo_sidebar_name', 'nemus_mojo', 'mojo-sidebar-options');
	add_settings_field( 'sidebar-description', 'Description', 'mojo_sidebar_description', 'nemus_mojo', 'mojo-sidebar-options');
	add_settings_field( 'sidebar-twitter', 'Twitter handler', 'mojo_sidebar_twitter', 'nemus_mojo', 'mojo-sidebar-options');
	add_settings_field( 'sidebar-facebook', 'Facebook handler', 'mojo_sidebar_facebook', 'nemus_mojo', 'mojo-sidebar-options');
	add_settings_field( 'sidebar-gplus', 'Google+ handler', 'mojo_sidebar_gplus', 'nemus_mojo', 'mojo-sidebar-options');
	
	//Theme Support Options
	register_setting( 'mojo-theme-support', 'post_formats' );
	register_setting( 'mojo-theme-support', 'custom_header' );
	register_setting( 'mojo-theme-support', 'custom_background' );
	
	add_settings_section( 'mojo-theme-options', 'Theme Options', 'mojo_theme_options', 'nemus_mojo_theme' );
	
	add_settings_field( 'post-formats', 'Post Formats', 'mojo_post_formats', 'nemus_mojo_theme', 'mojo-theme-options' );
	add_settings_field( 'custom-header', 'Custom Header', 'mojo_custom_header', 'nemus_mojo_theme', 'mojo-theme-options' );
	add_settings_field( 'custom-background', 'Custom Background', 'mojo_custom_background', 'nemus_mojo_theme', 'mojo-theme-options' );
	
	//Contact Form Options
	register_setting( 'mojo-contact-options', 'activate_contact' );
	
	add_settings_section( 'mojo-contact-section', 'Contact Form', 'mojo_contact_section', 'nemus_mojo_theme_contact');
	
	add_settings_field( 'activate-form', 'Activate Contact Form', 'mojo_activate_contact', 'nemus_mojo_theme_contact', 'mojo-contact-section' );
	
	//Custom CSS Options
	register_setting( 'mojo-custom-css-options', 'mojo_css', 'mojo_sanitize_custom_css' );
	
	add_settings_section( 'mojo-custom-css-section', 'Custom CSS', 'mojo_custom_css_section_callback', 'nemus_mojo_css' );
	
	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'mojo_custom_css_callback', 'nemus_mojo_css', 'mojo-custom-css-section' );
	
}
function mojo_custom_css_section_callback() {
	echo 'Customize Mojo Theme with your own CSS';
}
function mojo_custom_css_callback() {
	$css = get_option( 'mojo_css' );
	$css = ( empty($css) ? '/* Mojo Theme Custom CSS */' : $css );
	echo '<div id="customCss">'.$css.'</div><textarea id="mojo_css" name="mojo_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}
function mojo_theme_options() {
	echo 'Activate and Deactivate specific Theme Support Options';
}
function mojo_contact_section() {
	echo 'Activate and Deactivate the Built-in Contact Form';
}
function mojo_activate_contact() {
	$options = get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="activate_contact" value="1" '.$checked.' /></label>';
}
function mojo_post_formats() {
	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ){
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}
function mojo_custom_header() {
	$options = get_option( 'custom_header' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}
function mojo_custom_background() {
	$options = get_option( 'custom_background' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}
// Sidebar Options Functions
function mojo_sidebar_options() {
	echo 'Customize your Sidebar Information';
}
function mojo_sidebar_profile() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<button type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><span class="mojo-icon-button dashicons-before dashicons-format-image"></span> Upload Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<button type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><span class="sunset-icon-button dashicons-before dashicons-format-image"></span> Replace Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <button type="button" class="button button-secondary" value="Remove" id="remove-picture"><span class="mojo-icon-button dashicons-before dashicons-no"></span> Remove</button>';
	}
	
}
function mojo_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}
function mojo_sidebar_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /><p class="description">Write something smart.</p>';
}
function mojo_sidebar_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}
function mojo_sidebar_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}
function mojo_sidebar_gplus() {
	$gplus = esc_attr( get_option( 'gplus_handler' ) );
	echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google+ handler" />';
}
//Sanitization settings
function mojo_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}
function mojo_sanitize_custom_css( $input ){
	$output = esc_textarea( $input );
	return $output;
}
//Template submenu functions
function mojo_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/mojo-admin.php' );
}
function mojo_theme_support_page() {
	require_once( get_template_directory() . '/inc/templates/mojo-theme-support.php' );
}
function mojo_contact_form_page() {
	require_once( get_template_directory() . '/inc/templates/mojo-contact-form.php' );
}
function mojo_theme_settings_page() {
	require_once( get_template_directory() . '/inc/templates/mojo-custom-css.php' );
}
