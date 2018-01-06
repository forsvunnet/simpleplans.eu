<?php
$root_path = dirname( __DIR__ );


// Load database credentials etc..
if ( file_exists( $root_path .'/config.php' ) ) {
	// Get the database credentials
	require_once $root_path .'/config.php';
	// Set WP_LOCAL_DEV as false
	defined( 'WP_LOCAL_DEV' ) || define( 'WP_LOCAL_DEV', false );
	// By default make this a production site
	defined( 'APP_ENV' ) || define( 'APP_ENV', 'production' );
	// Toggle WP_DEBUG for produciton/test sites
	if ( ! defined( 'WP_DEBUG' ) && APP_ENV == 'production' ) {
		// Turn of WP_DEBUG on production sites
		define( 'WP_DEBUG', false );
	} else {
		// On all other instances WP_DEBUG should be on
		define( 'WP_DEBUG', true );
		define( 'SCRIPT_DEBUG', true );
	}
} else if ( file_exists( $root_path .'/config-dev.php' ) ) {
	// Get the database credentials
	require_once $root_path .'/config-dev.php';
	// Set development constants
	define( 'WP_DEBUG', true );
	define( 'SCRIPT_DEBUG', true );
    define( 'WP_LOCAL_DEV', true );
	define( 'APP_ENV', 'local' );
} else {
	require( $root_path .'/instructions.php' );
	die;
}

if ( APP_ENV == 'local' ) {
	// Run some basic checks on the project
	$content = file_get_contents( $root_path .'/composer.json' );
	$data = json_decode( $content, true );
	if ( ! $data ) {
		throw new Exception( 'You have a syntax error in your composer.json file!' );
	}
	if ( ! isset( $data['name'] ) || $data['name'] == 'Wordpress Project' ) {
		throw new Exception( 'You need to give your project a name in composer.json' );
	}
	if ( APP_NAME == 'application_name_here' ) {
		throw new Exception( 'You need to give your project a name in config.php or config-dev.php' );
	}
}

// Define common DB properties
defined( 'DB_HOST' )    || define( 'DB_HOST', 'localhost' );
defined( 'DB_CHARSET' ) || define( 'DB_CHARSET', 'utf8' );
defined( 'DB_COLLATE' ) || define( 'DB_COLLATE', '' );

// Define the rooth path for the website
defined( 'ABSPATH' ) || define( 'ABSPATH', __DIR__ );

$ssl = isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] != 'off';
$protocol = ( $ssl ? 'https' : 'http' ) .'://';
$domain = $_SERVER['HTTP_HOST'];

// Configure the correct site paths
define( 'WP_HOME', $protocol . $domain );
define( 'WP_SITEURL', $protocol . $domain .'/wp' );

// Set the correct path for wp-content
define( 'WP_CONTENT_URL', $protocol . $domain .'/wp-content' );
define( 'WP_CONTENT_DIR', __DIR__ .'/wp-content/' );

// Continue
require_once(ABSPATH . 'wp-settings.php');
