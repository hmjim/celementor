<?php
/**
 * The plugin c-elementor
 *
 *
 * Plugin Name:       c-elementor
 * Description:       somthing
 * Version:           1.0.0
 * Author:            hmjim
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 **/

namespace WPC;

class Widget_Loader {

	private static $_instance = null;

	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ], 99 );
		// $this->_enqueue_styles();
	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function register_widgets() {

		$this->include_widgets_files();

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Celementor() );

	}

	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/celementor.php' );
	}
	// public function _enqueue_styles() {
	// wp_enqueue_style('c-elementor', plugin_dir_url(__DIR__) . 'style.css');
	// }
}

// Instantiate Plugin Class
Widget_Loader::instance();
