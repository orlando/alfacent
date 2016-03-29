<?php

class HashCore_Widgets_Widget_Manager {
	/**
	 * Regsitered widgets
	 *
	 * @var
	 */
	private $regisrered;

	function __construct(){
		$this->regisrered = array();
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
	}

	/**
	 * Get the single instance.
	 *
	 * @return HashCore_Widgets_Widget_Manager
	 */
	static function single() {
		static $single;

		if( empty($single) ) {
			$single = new HashCore_Widgets_Widget_Manager ();
		}

		return $single;
	}

	/**
	 * @param $id
	 * @param $path
	 * @param bool|false $class
	 */
	public function register( $id, $path, $class = false ){
		$path = realpath( $path );
		if ( empty( $class ) ) {
			$class = 'HashCore_Widget_' . str_replace( ' ', '', ucwords( str_replace('-', ' ', $id) ) ) . '_Widget';
		}

		$this->regisrered[$id] = new stdClass();
		$this->regisrered[$id]->path = $path;
		$this->regisrered[$id]->class = $class;
		$this->regisrered[$id]->registered = false;

		return $this->regisrered[$id];
	}

	/**
	 * Initialize all the widgets.
	 */
	public function widgets_init(){
		foreach( $this->regisrered as $id => & $info ) {
			if( $info->registered ) continue;
			register_widget( $info->class );
			$info->registered = true;
		}
	}

	/**
	 * Get the path of the widget
	 *
	 * @param $id
	 *
	 * @return bool
	 */
	public function get_plugin_path( $id ) {
		if( empty($this->regisrered[$id]) ) {
			// This call might be using the incorrect ID convention
			if( substr($id, 0, 4) == 'sow-' ) $id = substr($id, 4);
			else $id = 'sow-' . $id;
		}

		return !empty($this->regisrered[$id]) ? $this->regisrered[$id]->path : false;
	}

	/**
	 * @param $id
	 *
	 * @return string
	 *
	 * @todo examine this when using a widget in a theme folder.
	 */
	function get_plugin_dir_path( $id ){
		return plugin_dir_path( $this->get_plugin_path( $id ) );
	}

	function get_plugin_dir_url( $id ){
		return plugin_dir_url( $this->get_plugin_path( $id ) );
	}
}
HashCore_Widgets_Widget_Manager::single();

/**
 * Register a widget
 *
 * @param string $id The ID of the widget
 * @param string $path The path of the widget
 * @param bool|string $class The name of the class
 */
function hashcore_widget_register( $id, $path, $class = false ){
	HashCore_Widgets_Widget_Manager::single()->register( $id, $path, $class );
}

/**
 * Get the base file of a widget plugin
 *
 * @param $name
 * @return bool
 */
function hashcore_widget_get_plugin_path($id){
	return HashCore_Widgets_Widget_Manager::single()->get_plugin_path( $id );
}

/**
 * Get the base path folder of a widget plugin.
 *
 * @param $id
 * @return string
 */
function hashcore_widget_get_plugin_dir_path($id){
	return HashCore_Widgets_Widget_Manager::single()->get_plugin_dir_path($id);
}

/**
 * Get the base path URL of a widget plugin.
 *
 * @param $id
 * @return string
 */
function hashcore_widget_get_plugin_dir_url($id){
	return HashCore_Widgets_Widget_Manager::single()->get_plugin_dir_url($id);
}
