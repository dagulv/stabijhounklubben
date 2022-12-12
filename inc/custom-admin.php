<h1>Bestämda sidor för roller</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
    <?php settings_fields('staby-settings-group'); ?>
    <?php do_settings_sections('staby_roles_menu'); ?>
    <?php submit_button(); ?>
</form>