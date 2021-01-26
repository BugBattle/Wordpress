<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://bugbattle.io
 * @since      1.0.0
 *
 * @package    Bugbattle
 * @subpackage Bugbattle/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Bugbattle
 * @subpackage Bugbattle/includes
 * @author     BugBattle <hello@bugbattle.io>
 */
class Bugbattle_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        global $wp_roles;

        $delete_caps = array(
            'report_bugs'
        );

        foreach ($delete_caps as $cap) {
            foreach (array_keys($wp_roles->roles) as $role) {
                $wp_roles->remove_cap($role, $cap);
            }
        }
	}

}
