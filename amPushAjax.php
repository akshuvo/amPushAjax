<?php
/**
 * Plugin Name: amPushAjax
 * Plugin URI: 
 * Bitbucket Plugin URI: 
 * Description: 
 * Author: 
 * Text Domain: ampushajax
 * Domain Path: /lang/
 * Author URI: 
 * Tags: 
 * Version: 1.0.20
 */

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/**
 *	Main Class
 *
 */
if( !class_exists('amPushAjax') ) :
class amPushAjax{

	public function __construct() {
		add_action('plugins_loaded', [ $this, 'load_text_domain' ], 10, 2);		

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ], 100 );

	}

	/**
	* Loading Text Domain
	* 
	*/
	public function load_text_domain() {
		load_plugin_textdomain( 'ampushajax', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
	}


	/**
	 *	Enqueue  scripts
	 *
	 */
	public function enqueue_scripts(){

		wp_enqueue_style('ampushajax', plugin_dir_url( plugin_basename(__FILE__) ) . 'css/amPushAjax.css' );

	    wp_enqueue_script( 'ampushajax', plugin_dir_url( plugin_basename(__FILE__) ) . 'js/amPushAjax.js' );
		
		wp_localize_script( 'ampushajax', 'ampushajax_data', 
			array(
		        'ampushajax_nonce' => wp_create_nonce( 'ampushajax_nonce' ),
		    )
	    );
	}


}
new amPushAjax;
endif;