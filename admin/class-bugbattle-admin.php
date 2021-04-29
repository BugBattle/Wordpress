<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://bugbattle.io
 * @since      1.0.0
 *
 * @package    Bugbattle
 * @subpackage Bugbattle/admin
 */

class Bugbattle_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->load_dependencies();

	}

    /**
     * Load the required dependencies for the Admin facing functionality.
     *
     * Include the following files that make up the plugin:
     *
     * - Carbon
     *
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies() {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        //require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/class-bugbattle-settings.php';

    }

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bugbattle-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bugbattle-admin.js', array( 'jquery' ), $this->version, false );

	}

    public function setup_settings_ui()
    {
        Container::make('theme_options', __('Bugbattle'))
            ->set_page_parent( 'options-general.php' )
            ->add_fields(array(
                Field::make('text', 'bugbattle_token', 'SDK Token')->set_required( true )->set_help_text("Create your SDK Token within the <a href=\"https://app.bugbattle.io/\">Bugbattle Dashboard.</a>"),
            ))
            ->add_fields(array(
                Field::make('color', 'bugbattle_color', 'Custom Color')->set_help_text("Change the default color of the Bugbattle widget."),
            ))
            ->add_fields(array(
                Field::make('checkbox', 'bugbattle_enable_crash_detector', 'Enable Crash Detector')->set_default_value(false)->set_help_text("Enable or disable the Bugbattle crash detector. This will automatically send a silent bug report in the background, once a JS crash occurs."),
            ))
            ->add_fields(array(
                Field::make('checkbox', 'bugbattle_enable_replays', 'Enable Replays')->set_default_value(false)->set_help_text("Enable or disable Bugbattle Replays."),
            ))
            ->add_fields(array(
                Field::make('checkbox', 'bugbattle_enable_network_logs', 'Enable Network Logs')->set_default_value(false)->set_help_text("Enable or disable network logs."),
            ))
            ->add_fields(array(
                Field::make('checkbox', 'bugbattle_enable_privacy_policy', 'Enable Privacy Policy')->set_default_value(false)->set_help_text("Enable or disable the privacy policy check."),
            ))
            ->add_fields(array(
                Field::make('text', 'bugbattle_privacy_policy_url', 'Custom URL for your Privacy Policy')->set_help_text("Optionally set your own privacy policy for Bugbattle."),
            ))
            ->add_fields(array(
                Field::make('checkbox', 'bugbattle_editors_only', 'Enable just for logged in editors')->set_default_value(false)->set_help_text('Widget will only be visible for users with editor or higher role.')
            ));
    }

    public function crb_load()
    {
        \Carbon_Fields\Carbon_Fields::boot();
    }

}
