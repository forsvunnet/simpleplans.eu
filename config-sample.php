<?php

/**
 * # Local development installation
 * Copy this file and rename it to "config-dev.php".
 * Then fill inn the required parameters below.
 */

/**
 * # Testing / Stage
 * Copy this file and rename it to "config.php".
 * Fill inn the required parameters below.
 * Uncomment the following line:
 */
// define( 'APP_ENV', 'testing' );

/**
 * # Production
 * Copy this file and rename it to "config.php".
 * Fill inn the required parameters below.
 */

define( 'APP_NAME', 'application_name_here');


/**
 * Database credentials
 */
define( 'DB_NAME', 'database_name_here');
define( 'DB_USER', 'username_here');
define( 'DB_PASSWORD', 'password_here');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );
