<?php
/*
	Plugin Name: Elements - Erwin Wijnveld
	Description: Elementor widgets by Erwin Wijnveld
	Author: Erwin Wijnveld
	Author URI: https://erwinwijnveld.nl
	Plugin URI: https://erwinwijnveld.nl
	Version: 0.1.0
	Text Domain: elements-erwinwijnveld
*/

namespace ErwinWijnveld;

if (!defined('ABSPATH')) {
	exit();
} // Exit if accessed directly

class Widget_Loader
{
	private static $_instance = null;

	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function register_widgets()
	{
		$widget_files = glob(__DIR__ . '/widgets/*.php');

		foreach ($widget_files as $widget_file) {
			require_once $widget_file;
			$widget_class = $this->get_widget_class_from_file($widget_file);
			if ($widget_class) {
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type(
					new $widget_class()
				);
			}
		}
	}

	private function get_widget_class_from_file($file_path)
	{
		$widget_class = false;
		$file_contents = file_get_contents($file_path);

		if ($file_contents !== false) {
			$namespace_regex = '/\s*namespace\s+([^\s;]+)\s*;/';
			$class_regex = '/\s*class\s+([^\s]+)\s*/';

			preg_match($namespace_regex, $file_contents, $namespace_matches);
			preg_match($class_regex, $file_contents, $class_matches);

			if (isset($namespace_matches[1]) && isset($class_matches[1])) {
				$namespace = $namespace_matches[1];
				$class = $class_matches[1];
				$widget_class = $namespace . '\\' . $class;
			}
		}

		return $widget_class;
	}

	public function add_elementor_widget_categories($elements_manager)
	{
		$elements_manager->add_category('erwinwijnveld', [
			'title' => esc_html__(
				'Elements - Erwin Wijnveld',
				'elements-erwinwijnveld'
			),
			'icon' => 'fa fa-plug',
		]);
	}

	function load_plugin_css()
	{
		$plugin_url = plugin_dir_url(__FILE__);

		wp_enqueue_style(
			'elements-erwinwijnveld-style',
			$plugin_url . 'assets/styles/style.css'
		);
	}

	public function __construct()
	{
		require_once __DIR__ . '/app/helpers.php';
		add_action('wp_enqueue_scripts', [$this, 'load_plugin_css']);
		add_action('elementor/elements/categories_registered', [
			$this,
			'add_elementor_widget_categories',
		]);
		add_action(
			'elementor/widgets/widgets_registered',
			[$this, 'register_widgets'],
			99
		);
	}
}

// Instantiate Plugin Class
Widget_Loader::instance();
?>
