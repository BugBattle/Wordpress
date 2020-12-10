<?php
require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.bugbattle.io
 * @since             1.0.0
 * @package           Bugbattle
 *
 * @wordpress-plugin
 * Plugin Name:       Bugbattle
 * Plugin URI:        https://www.bugbattle.io
 * Description:       Bugbattle helps developers build the best software faster. It is your affordable in-app bug reporting tool for apps, websites and industrial applications.
 * Version:           1.0.0
 * Author:            BugBattle
 * Author URI:        https://www.bugbattle.io
 * License:           Commercial
 * License URI:       https://github.com/BugBattle/Wordpress/blob/main/README.txt
 * Text Domain:       bugbattle
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BUGBATTLE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bugbattle-activator.php
 */
function activate_bugbattle() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bugbattle-activator.php';
	Bugbattle_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bugbattle-deactivator.php
 */
function deactivate_bugbattle() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bugbattle-deactivator.php';
	Bugbattle_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bugbattle' );
register_deactivation_hook( __FILE__, 'deactivate_bugbattle' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bugbattle.php';

add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'bugbattle_add_plugin_page_settings_link');
function bugbattle_add_plugin_page_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'options-general.php?page=crb_carbon_fields_container_bugbattle.php' ) .
		'">' . __('Settings') . '</a>';
	return $links;
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bugbattle() {
	$plugin = new Bugbattle();
	$plugin->run();
}
run_bugbattle();
