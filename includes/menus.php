<?php

// Create a option page for settings
add_action('admin_menu', 'brring_live_dialer_add_settings_page');

// Hook in the options page function
function brring_live_dialer_add_settings_page()
{
    add_options_page('Brring Settings', 'Brring', 'manage_options', "brring-live-dialer-settings", 'brring_live_dialer_options_page');
}