<?php
namespace RegionalStripe\RegionalStripe\Core;

/**
 * Default setup routine
 *
 * @uses add_action()
 * @uses do_action()
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'init', $n( 'i18n' ) );
	add_action( 'init', $n( 'init' ) );

	add_action( 'wp_enqueue_scripts', $n( 'enqueue_scripts' ) );

	do_action( 'regstr_loaded' );
}

/**
 * Registers the default textdomain.
 *
 * @uses apply_filters()
 * @uses get_locale()
 * @uses load_textdomain()
 * @uses load_plugin_textdomain()
 * @uses plugin_basename()
 *
 * @return void
 */
function i18n() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'regstr' );
	load_textdomain( 'regstr', WP_LANG_DIR . '/regstr/regstr-' . $locale . '.mo' );
	load_plugin_textdomain( 'regstr', false, plugin_basename( REGSTR_PATH ) . '/languages/' );
}

/**
 * Initializes the plugin and fires an action other plugins can hook into.
 *
 * @uses do_action()
 *
 * @return void
 */
function init() {
	do_action( 'regstr_init' );
}

/**
 * Activate the plugin
 *
 * @uses init()
 * @uses flush_rewrite_rules()
 *
 * @return void
 */
function activate() {
	// First load the init scripts in case any rewrite functionality is being loaded
	init();
	flush_rewrite_rules();
}

/**
 * Deactivate the plugin
 *
 * Uninstall routines should be in uninstall.php
 *
 * @return void
 */
function deactivate() {

}

/**
 * Enqueue
 */
function enqueue_scripts() {
	wp_register_script( 'regional-stripe', REGSTR_URL . 'assets/js/regional-stripe.js', [ 'jquery' ], REGSTR_VERSION );
	wp_localize_script( 'regional-stripe', 'regstr', [
		'timeout'   => PHP_INT_MAX,
		'originLat' => apply_filters( 'regstr_originlat', '39.283493' ),
		'originLon' => apply_filters( 'regstr_originlon', '-76.580451' ),
		'maxRange'  => 50
	] );
	if( ! is_admin() ) {
		wp_enqueue_script( 'regional-stripe' );
	}
}
