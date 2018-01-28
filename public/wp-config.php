<?php

$public_path = __DIR__;
$root_path = dirname( __DIR__ );
$file = $root_path .'/vendor/drivdigital/wordpress-config/wp-config.php';

if ( ! file_exists( $file ) ) {
  die( 'Please run composer install' );
}

require_once( $file );

// Continue
require_once( ABSPATH .'wp-settings.php' );
