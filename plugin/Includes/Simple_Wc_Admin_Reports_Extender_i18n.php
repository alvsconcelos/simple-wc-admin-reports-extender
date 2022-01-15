<?php

namespace SimpleWcAdminReportsExtenderPlugin\Includes;

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://alvsconcelos.me
 * @since      1.0.0
 *
 * @package    SimpleWcAdminReportsExtender
 * @subpackage SimpleWcAdminReportsExtender/Includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    SimpleWcAdminReportsExtender
 * @subpackage SimpleWcAdminReportsExtender/Includes
 * @author     Alvaro Vasconcelos <ialvsconcelos@gmail.com>
 */
class Simple_Wc_Admin_Reports_Extender_i18n
{


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain()
	{

		load_plugin_textdomain(
			'simple-wc-admin-reports-extender',
			false,
			dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
		);
	}
}
