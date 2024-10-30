<?php

// Output the options page
function brring_live_dialer_options_page()
{
    // Get options
    $options = get_option('brring_live_dialer_settings');

    // Check to see if Brring is enabled
    $brring_activated = false;
    if (esc_attr($options['brring_live_dialer_enabled']) == "on") {
        $brring_activated = true;
        wp_cache_flush();
    }

    ?>
    <div class="wrap">
        <form name="Brring-form" action="options.php" method="post" enctype="multipart/form-data">
            <?php settings_fields('brring_live_dialer_settings_group'); ?>

            <h1>Brring</h1>
            <h3>Basic Options</h3>
            <?php if (!$brring_activated) { ?>
                <div style="margin:10px auto; border:3px #f00 solid; background-color:#fdd; color:#000; padding:10px; text-align:center;">
                    Brring Live Dialer is currently <strong>DISABLED</strong>.
                </div>
            <?php } ?>
            <?php do_settings_sections('brring_live_dialer_settings_group'); ?>

            <table class="form-table" cellspacing="2" cellpadding="5" width="100%">
                <tr>
                    <th width="30%" valign="top" style="padding-top: 10px;">
                        <label for="brring_live_dialer_enabled">Brring (Live Dialer) is:</label>
                    </th>
                    <td>
                        <?php
                        echo "<select name=\"brring_live_dialer_settings[brring_live_dialer_enabled]\"  id=\"brring_live_dialer_enabled\">\n";

                        echo "<option value=\"on\"";
                        if ($brring_activated) {
                            echo " selected='selected'";
                        }
                        echo ">Enabled</option>\n";

                        echo "<option value=\"off\"";
                        if (!$brring_activated) {
                            echo " selected='selected'";
                        }
                        echo ">Disabled</option>\n";
                        echo "</select>\n";
                        ?>
                    </td>
                </tr>
            </table>
            <table class="form-table" cellspacing="2" cellpadding="5" width="100%">
                <tr>
                    <th valign="top" style="padding-top: 10px;">
                        <label for="Brring_widget_code">Brring JS code snippet:</label>
                    </th>
                    <td>
                        <textarea rows="15" cols="100" placeholder="<!-- Insert the Brring Live Dialer tag here -->"
                                  name="brring_live_dialer_settings[brring_live_dialer_widget_code]"><?php echo esc_attr($options['brring_live_dialer_widget_code']); ?></textarea>
                        <p style="margin: 5px 10px;">Enter your Brring Live Dialer JS code snippet. You can find your <a
                                    href="https://app.brring.com/account/profile/live-dialer" target="_blank"
                                    title="Open Brring Settings">Brring JS code snippet here</a>. An <a
                                    href="https://www.brring.com/?ref=wordpress" target="_blank" title="Brring"> account
                                is required to use this plugin.</p>
                    </td>
                </tr>
            </table>
            <p class="submit">
                <?php echo submit_button('Save Changes'); ?>
            </p>
    </div>
    </form>

    <?php
}

?>
