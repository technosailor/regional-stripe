<?php
namespace RegionalStripe\Utilities;

/**
 * Returns the Stripe Test Secret key which can be set as a constant
 * @return mixed|void
 */
function get_test_secret_key() {
	$key = false;

	if( defined( 'REGSTR_STRIPE_TEST_SECRET_KEY' ) && REGSTR_STRIPE_TEST_SECRET_KEY ) {
		$key = REGSTR_STRIPE_TEST_SECRET_KEY;
	}

	return apply_filters( 'regstr_stripe_test_secret_key', $key );
}

/**
 * Returns the Stripe Test Publishable key which can be set as a constant
 * @return mixed|void
 */
function get_test_publishable_key() {
	$key = false;

	if( defined( 'REGSTR_STRIPE_TEST_PUBLISHABLE_KEY' ) && REGSTR_STRIPE_TEST_PUBLISHABLE_KEY ) {
		$key = REGSTR_STRIPE_TEST_PUBLISHABLE_KEY;
	}

	return apply_filters( 'regstr_test_publishable_key', $key );
}

/**
 * Returns the Stripe Live Secret key which can be set as a constant
 * @return mixed|void
 */
function get_live_secret_key() {
	$key = false;

	if( defined( 'REGSTR_STRIPE_LIVE_SECRET_KEY' ) && REGSTR_STRIPE_LIVE_SECRET_KEY ) {
		$key = REGSTR_STRIPE_LIVE_SECRET_KEY;
	}

	return apply_filters( 'regstr_stripe_live_secret_key', $key );
}

/**
 * Returns the Stripe Live Secret key which can be set as a constant
 * @return mixed|void
 */
function get_live_publishable_key() {
	$key = false;

	if( defined( 'REGSTR_STRIPE_LIVE_PUBLISHABLE_KEY' ) && REGSTR_STRIPE_LIVE_PUBLISHABLE_KEY ) {
		$key = REGSTR_STRIPE_LIVE_PUBLISHABLE_KEY;
	}

	return apply_filters( 'regstr_live_publishable_key', $key );
}

/**
 * Returns if Stripe is in Test or Live mode which can be set by constant
 */
function is_live() {
	$live = false;

	if( defined( 'REGSTR_MODE' ) && 'live' === REGSTR_MODE ) {
		$live = true;
	}

	return apply_filters( 'regstr_is_live', (bool) $live );
}


