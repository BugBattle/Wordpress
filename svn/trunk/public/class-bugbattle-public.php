<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://bugbattle.io
 * @since      1.0.0
 *
 * @package    Bugbattle
 * @subpackage Bugbattle/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bugbattle
 * @subpackage Bugbattle/public
 * @author     BugBattle <hello@bugbattle.io>
 */
class Bugbattle_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bugbattle_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bugbattle_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
        $bugbattle_token = carbon_get_theme_option('bugbattle_token');
        if ($bugbattle_token) {
			wp_register_script( 'bugbattle-sdk-js', 'https://jssdk.bugbattle.io/latest/index.js', null, null, true );
            wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bugbattle-public.js', array( 'bugbattle-sdk-js' ), $this->version, true );
			
			wp_localize_script($this->plugin_name, 'bugbattle_token', $bugbattle_token);
			$bugbattle_color = carbon_get_theme_option('bugbattle_color');
			wp_localize_script($this->plugin_name, 'bugbattle_color', $bugbattle_color);
			$bugbattle_enable_privacy_policy = carbon_get_theme_option('bugbattle_enable_privacy_policy');
			wp_localize_script($this->plugin_name, 'bugbattle_enable_privacy_policy', $bugbattle_enable_privacy_policy);
			$bugbattle_privacy_policy_url = carbon_get_theme_option('bugbattle_privacy_policy_url');
			wp_localize_script($this->plugin_name, 'bugbattle_privacy_policy_url', $bugbattle_privacy_policy_url);
        }
	}

}
