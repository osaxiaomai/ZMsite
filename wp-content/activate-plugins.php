<?php
/**
 * Helper script to activate required plugins automatically
 */
define('WP_USE_THEMES', false);
require_once(dirname(__DIR__) . '/wp-load.php');

$plugins_to_activate = array(
    'advanced-custom-fields/acf.php',
    'polylang/polylang.php',
    'contact-form-7/wp-contact-form-7.php'
);

foreach ($plugins_to_activate as $plugin) {
    if (!is_plugin_active($plugin)) {
        $result = activate_plugin($plugin);
        if (is_wp_error($result)) {
            echo "Failed to activate: $plugin. Error: " . $result->get_error_message() . "\n";
        } else {
            echo "Successfully activated: $plugin\n";
        }
    } else {
        echo "Already active: $plugin\n";
    }
}
echo "Plugin activation script completed.\n";
