<?php

namespace SimpleWcAdminReportsExtenderPlugin\Includes;

use SimpleWcAdminReportsExtenderPlugin\Includes\Simple_Wc_Admin_Reports_Extender_Loader;
use SimpleWcAdminReportsExtenderPlugin\Includes\Simple_Wc_Admin_Reports_Extender_i18n;
use SimpleWcAdminReportsExtenderPlugin\Admin\Simple_Wc_Admin_Reports_Extender_Admin;
use SimpleWcAdminReportsExtenderPlugin\Frontend\Simple_Wc_Admin_Reports_Extender_Frontend;

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://alvsconcelos.me
 * @since      1.0.0
 *
 * @package    SimpleWcAdminReportsExtender
 * @subpackage SimpleWcAdminReportsExtender/Includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    SimpleWcAdminReportsExtender
 * @subpackage SimpleWcAdminReportsExtender/Includes
 * @author     Alvaro Vasconcelos <ialvsconcelos@gmail.com>
 */
class Simple_Wc_Admin_Reports_Extender_Core
{

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Simple_Wc_Admin_Reports_Extender_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct()
	{
		if (defined('SIMPLE_WC_ADMIN_REPORTS_EXTENDER_VERSION')) {
			$this->version = SIMPLE_WC_ADMIN_REPORTS_EXTENDER_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'simple-wc-admin-reports-extender';

		$this->set_loader();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_frontend_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Simple_Wc_Admin_Reports_Extender_Loader. Orchestrates the hooks of the plugin.
	 * - Simple_Wc_Admin_Reports_Extender_i18n. Defines internationalization functionality.
	 * - Simple_Wc_Admin_Reports_Extender_Admin. Defines all hooks for the admin area.
	 * - Simple_Wc_Admin_Reports_Extender_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_loader()
	{
		$this->loader = new Simple_Wc_Admin_Reports_Extender_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Simple_Wc_Admin_Reports_Extender_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale()
	{
		$plugin_i18n = new Simple_Wc_Admin_Reports_Extender_i18n();

		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks()
	{

		$plugin_admin = new Simple_Wc_Admin_Reports_Extender_Admin($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_frontend_hooks()
	{

		$plugin_public = new Simple_Wc_Admin_Reports_Extender_Frontend($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run()
	{
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Simple_Wc_Admin_Reports_Extender_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}
}
