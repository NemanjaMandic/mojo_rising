<h1>Mojo Contact Form</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="mojo-general-form">
	<?php settings_fields( 'mojo-contact-options' ); ?>
	<?php do_settings_sections( 'nemus_mojo_theme_contact' ); ?>
	<?php submit_button(); ?>
</form>