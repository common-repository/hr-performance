<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://theinnovs.com
 * @since      1.0.0
 *
 * @package    Hr_Performance
 * @subpackage Hr_Performance/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Hr_Performance
 * @subpackage Hr_Performance/admin
 * @author     theinnovs <theinnovs@gmail.com>
 */
class Hr_Performance_Admin {

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
		$this->hr_performance_admin_menu_hook();

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
		 * defined in Hr_Performance_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hr_Performance_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name . '_admin-css', plugin_dir_url( __FILE__ ) . 'css/hr-performance-admin.css', array(), $this->version, 'all' );

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
		 * defined in Hr_Performance_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hr_Performance_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui' );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/hr-performance-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name.'_ajax', plugin_dir_url( __FILE__ ) . 'js/hr-performance-ajax.js', array( 'jquery' ), $this->version, true );
		wp_localize_script( $this->plugin_name.'_ajax','hr_performance_ajax_url', array(admin_url('admin-ajax.php'))); 

	}


		/**
	 * This menu action hook
	 */
	public function hr_performance_admin_menu_hook(){
		
		add_action( "admin_menu", array( $this, "hr_performance_menu" ), 110 );
		
	}

    public function hr_performance_menu(){

        $parent_slug = 'innovs_dashboard';
		$capability = 'manage_options';
		$icon = 'dashicons-buddicons-buddypress-logo';
                          		
		// add_menu_page( 'Performance', 'Performance', $capability, $parent_sulg, array( $this,'hr_performance_cb' ), $icon, 20);

		add_submenu_page( $parent_slug, 'Performance', 'Performance', $capability, 'hr-performance', [ $this, 'hr_performance_cb'], 1 );
    }
    

    public function hr_performance_cb(){
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/hr-performance.php';
	}
	


}
