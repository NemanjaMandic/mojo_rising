<h1>Mojo Custom CSS</h1>

<?php settings_errors(); ?>


<form id="save-custom-css-form" method="post" action="options.php" class="mojo-general-form">
    <?php settings_fields( 'mojo-custom-css-options' ); ?>
    <?php do_settings_sections( 'nemus_mojo_css' ); ?>
    <?php submit_button(); ?>
</form>
