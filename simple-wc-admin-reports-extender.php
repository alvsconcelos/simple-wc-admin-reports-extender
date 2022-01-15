<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://alvsconcelos.me
 * @since             1.0.0
 * @package           Simple_Wc_Admin_Reports_Extender
 *
 * @wordpress-plugin
 * Plugin Name:       Simple WC Admin Reports Extender
 * Plugin URI:        https://alvsconcelos.me
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Alvaro Vasconcelos
 * Author URI:        https://alvsconcelos.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-wc-admin-reports-extender
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('SIMPLE_WC_ADMIN_REPORTS_EXTENDER_VERSION', '1.0.0');
define('SIMPLE_WC_ADMIN_REPORTS_EXTENDER_PATH', plugin_dir_path(__FILE__));
define('SIMPLE_WC_ADMIN_REPORTS_EXTENDER_URL', plugin_dir_url(__FILE__));

require __DIR__ . '/vendor/autoload.php';

use SimpleWcAdminReportsExtenderPlugin\Simple_Wc_Admin_Reports_Extender;
new Simple_Wc_Admin_Reports_Extender(__FILE__);