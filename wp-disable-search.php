<?php
/**
 * Plugin Name: WP Disable Search
 * Version:     1.0.0
 * Plugin URI:  https://wordpress.org/plugins/wp-disable-search/
 * Author:      Web Scripts
 * Author URI:  http://webscripts.tech
 * Text Domain: wp-disable-search
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Description: Disable the WordPress Default search from front-end.
 *
 * Compatible with WordPress 4.6 through 4.9+.
 *
 * =>> Read the accompanying readme.txt file for instructions and documentation.
 * =>> Or visit: https://wordpress.org/plugins/wp-disable-search/
 *
 * @package WP_Disable_Search
 * @author  Web Scripts
 * @version 1.0.0
 */

defined( 'ABSPATH' ) or die();

if ( ! class_exists( 'WP_Disable_Search' ) ) :

class WP_Disable_Search {

	/**
	 * Returns version of the plugin.
	 *
	 * @since 1.0.0
	 */
	public static function version() {
		return '1.0.0';
	}

	/**
	 * Prevent instantiation.
	 *
	 * @since 1.0.0
	 */
	private function __construct() {}

	/**
	 * Prevent unserializing an instance.
	 *
	 * @since 1.0.0
	 */
	private function __wakeup() {}

	/**
	 * Initializes the plugin.
	 */
	public static function init() {
		add_action( 'plugins_loaded', array( __CLASS__, 'do_init' ) );
	}

	/**
	 * Performs actual initialization tasks.
	 *
	 * @since 1.0.0
	 */
	public static function do_init() {
		// Load textdomain.
		load_plugin_textdomain( 'wp-disable-search' );

		// Register hooks.
		add_action( 'widgets_init', function () {
			unregister_widget( 'WP_Widget_Search' );
		} );
		if ( ! is_admin() ) {
			add_action( 'parse_query', array( __CLASS__, 'wp_disable_filter_query' ), 5 );
		}
		add_filter( 'get_search_form',function ( $form ) {
			return '';
		} );

		add_action( 'admin_bar_menu', function ( $wp_admin_bar ) {
			$wp_admin_bar->remove_menu( 'search' );
		});
	}

	/**
	 * Unsets all search-related variables in WP_Query object and sets the
	 * request as a 404 if a search was attempted.
	 *
	 * @param WP_Query $obj A query object.
	 */
	public static function wp_disable_filter_query( $query, $error = true ) {

		if ( is_search() ) {
			$query->is_search = false;
			$query->query_vars['s'] = false;
			$query->query['s'] = false;

			if ( $error == true )
			$query->is_404 = true;
		}
	}

} // end WP_Disable_Search


WP_Disable_Search::init();

endif; // end if !class_exists()
