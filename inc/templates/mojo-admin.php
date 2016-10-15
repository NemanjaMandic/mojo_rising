<h1>Mojo Theme Options</h1>

<?php settings_errors(); ?>
<form method="post" action="options.php">
    <?php settings_fields( 'mojo-settings-group' ); ?>
    <?php do_settings_sections( 'nemus_mojo' ); ?>
    <?php submit_button(); ?>
</form>