<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://gleap.io
 * @since      1.0.0
 *
 * @package    Gleap
 * @subpackage Gleap/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Gleap
 * @subpackage Gleap/public
 * @author     Gleap <hello@gleap.io>
 */
class Gleap_Public
{

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
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Gleap_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gleap_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		if(FLBuilderModel::is_builder_active()) {
			return;
		}

		if (did_action('elementor/loaded') && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
			return;
		}
		
		$gleap_token = carbon_get_theme_option('gleap_token');
		if ($gleap_token) {
			$gleap_editors_only = carbon_get_theme_option('gleap_editors_only');
			if ($gleap_editors_only == true && !current_user_can('report_bugs')) {
				return;
			}

			$gleap_script_url = 'https://widget.gleap.io/widget/' . $gleap_token;
			wp_register_script('gleap-sdk-js', $gleap_script_url, null, null, false);
			wp_enqueue_script('gleap-sdk-js');
		}
	}
}
