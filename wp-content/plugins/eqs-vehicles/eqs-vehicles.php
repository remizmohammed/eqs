<?php
/*
Plugin Name: EQS Vehicles
Plugin URI: https://github.com/remizmohammed/
Description: A plugin to Store/Manage Vehicles.
Version: 1.0
Author: Mohammed Remeez
Author URI: https://github.com/remizmohammed
License: GPLv2 or later
Text Domain: eqs-vehicles
 */

define('EQS_VEHICLES_PATH', plugin_dir_path(__FILE__));
define('EQS_VEHICLES_URL', plugin_dir_url(__FILE__));
define('EQS_VEHICLES_BASENAME', plugin_basename(__FILE__));

function activate_eqs_vehicles()
{
    require_once EQS_VEHICLES_PATH . 'includes/class-eqs-vehicles-activator.php';
    Eqs_Vehicles_Activator::activate();
}

function deactivate_eqs_vehicles()
{
    require_once EQS_VEHICLES_PATH . 'includes/class-eqs-vehicles-deactivator.php';
    Eqs_Vehicles_DeActivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_eqs_vehicles');
register_deactivation_hook(__FILE__, 'deactivate_eqs_vehicles');


function run_eqs_vehicles()
{
    require EQS_VEHICLES_PATH . 'includes/class-eqs-vehicles.php';
    new Eqs_Vehicles();
}
run_eqs_vehicles();