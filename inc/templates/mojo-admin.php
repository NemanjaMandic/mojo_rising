<h1>Mojo Theme Options</h1>

<?php settings_errors(); ?>
<?php
  
  $firstName = esc_attr( get_option( 'first_name' ));
  $lastName = esc_attr( get_option( 'last_name' ));
  $fullName = $firstName . ' ' . $lastName;
  $description = esc_attr( get_option( 'user_description' ));
?>
<div class="mojo-sidebar-preview">
    <div class="mojo-sidebar">
        <h1 class="mojo-username"><?php print $fullName; ?></h1>
        <h2 class="mojo-description"><?php print $description; ?> </h2>
        <div class="icons-wrapper">
            
        </div>
    </div>
</div>
<form method="post" action="options.php" class="mojo-general-form">
    <?php settings_fields( 'mojo-settings-group' ); ?>
    <?php do_settings_sections( 'nemus_mojo' ); ?>
    <?php submit_button(); ?>
</form>