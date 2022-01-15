<?php

namespace SimpleWcAdminReportsExtenderPlugin;

use SimpleWcAdminReportsExtenderPlugin\Includes\Simple_Wc_Admin_Reports_Extender_Activator;
use SimpleWcAdminReportsExtenderPlugin\Includes\Simple_Wc_Admin_Reports_Extender_Deactivator;
use SimpleWcAdminReportsExtenderPlugin\Includes\Simple_Wc_Admin_Reports_Extender_Core;

class Simple_Wc_Admin_Reports_Extender
{
    public function __construct($plugin_file)
    {
        register_activation_hook($plugin_file, array($this, 'activate_simple_wc_admin_reports_extender'));
        register_deactivation_hook($plugin_file, array($this, 'deactivate_simple_wc_admin_reports_extender'));
        $this->run_simple_wc_admin_reports_extender();
    }

    public function activate_simple_wc_admin_reports_extender()
    {
        Simple_Wc_Admin_Reports_Extender_Activator::activate();
    }

    public function deactivate_simple_wc_admin_reports_extender()
    {
        Simple_Wc_Admin_Reports_Extender_Deactivator::deactivate();
    }

    public function run_simple_wc_admin_reports_extender()
    {
        $plugin = new Simple_Wc_Admin_Reports_Extender_Core();
        $plugin->run();
    }
}
