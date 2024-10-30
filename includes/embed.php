<?php

// Add the Brring Javascript
add_action('wp_footer', 'brring_live_dialer_add_script');

// The guts of the Brring script
function brring_live_dialer_add_script()
{
    // Ignore admin, feed, robots or trackbacks
    if (is_feed() || is_robots() || is_trackback()) {
        return;
    }

    $options = get_option('brring_live_dialer_settings');

    // If options is empty then exit
    if (empty($options)) {
        return;
    }

    // Check to see if Brring is enabled
    if (esc_attr($options['brring_live_dialer_enabled']) == "on") {
        $brring_tag = $options['brring_live_dialer_widget_code'];

        // Insert tracker code
        if ('' != $brring_tag) {
            echo "<!-- Start of async Brring Live Dialer code -->\n";
            echo $brring_tag;
            echo "<!-- End of async Brring Live Dialer code -->\n";
        }
    }
}
