<?php
/**
 * Plugin Name: Regional Stripe
 * Plugin URI:  https://github.com/technosailor/regional-stripe
 * Description: Allows Stripe to be used within a certain geographic region
 * Version:     0.1.0
 * Author:      Aaron Brazell
 * Author URI:  http://technosailor.com
 * Text Domain: regstr
 * Domain Path: /languages
 * License:     GPL-2.0+
 */

/**
 * Copyright (c) 2016 Aaron Brazell (email : aaron@technosailor.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * Built using yo wp-make:plugin
 * Copyright (c) 2016 10up, LLC
 * https://github.com/10up/generator-wp-make
 */

// Useful global constants
define( 'REGSTR_VERSION', '0.1.0' );
define( 'REGSTR_URL',     plugin_dir_url( __FILE__ ) );
define( 'REGSTR_PATH',    dirname( __FILE__ ) . '/' );
define( 'REGSTR_INC',     REGSTR_PATH . 'includes/' );

// Include files
require_once REGSTR_INC . 'functions/core.php';


// Activation/Deactivation
register_activation_hook( __FILE__, '\RegionalStripe\RegionalStripe\Core\activate' );
register_deactivation_hook( __FILE__, '\RegionalStripe\RegionalStripe\Core\deactivate' );

// Bootstrap
RegionalStripe\RegionalStripe\Core\setup();