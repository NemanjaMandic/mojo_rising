<h1>Mojo Theme Support</h1>

<?php settings_errors(); ?>

<form method="post" action="options.php" class="mojo-general-form">
    <?php settings_fields( 'mojo-theme-support' ); ?>
    <?php do_settings_sections( 'nemus_mojo_theme' ); ?>
    <?php submit_button(); ?>
</form>