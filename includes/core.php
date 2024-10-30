<?php

// Register settings
function brring_live_dialer_register_settings()
{
    register_setting('brring_live_dialer_settings_group', 'brring_live_dialer_settings');
}

add_action('admin_init', 'brring_live_dialer_register_settings');

// Delete options on uninstall
function brring_live_dialer_uninstall()
{
    delete_option('brring_live_dialer_settings');
}

register_uninstall_hook(__FILE__, 'brring_live_dialer_uninstall');