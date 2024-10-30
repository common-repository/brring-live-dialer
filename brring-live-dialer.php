<?php

/**
 * Plugin Name: Brring Live Dialer
 * Plugin URI: https://www.brring.com/product?ref=wordpress
 * Description: Making it easy for a prospect to reach an agent can make the difference between closing or losing their custom. Adds live calls to your site so your visitors can dial your sales team with just one click.
 * Version: 1.0.1
 * Author: Brring
 * Author URI: https://www.brring.com/?ref=wordpress
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: brring-live-dialer
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/*
* Setup plugin constants
*/
// Plugin version
define('BRRING_LIVE_DIALER_VERSION', '1.0.1');
// Plugin path
define('BRRING_LIVE_DIALER_PLUGIN_DIR', plugin_dir_path(__FILE__));

/*
 * Include necessary files
 */
require_once(BRRING_LIVE_DIALER_PLUGIN_DIR . 'includes/core.php');
require_once(BRRING_LIVE_DIALER_PLUGIN_DIR . 'includes/menus.php');
require_once(BRRING_LIVE_DIALER_PLUGIN_DIR . 'includes/admin.php');
require_once(BRRING_LIVE_DIALER_PLUGIN_DIR . 'includes/embed.php');

// Add Settings to plugin page
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'brring_live_dialer_add_action_links');

function brring_live_dialer_add_action_links($links)
{
    $mylinks = array(
        '<a href="' . admin_url('options-general.php?page=brring-live-dialer-settings') . '">Settings</a>',
    );
    return array_merge($links, $mylinks);
}
