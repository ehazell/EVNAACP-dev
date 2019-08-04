<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'evnaacp_dev');

/** MySQL database username */
define('DB_USER', 'evnaacp_admin');

/** MySQL database password */
define('DB_PASSWORD', 'Ju$tice4all');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'RuZkT4BzAM07Ak4vIjYEOIjbSQXrjOnZR8F65q4QlYJcP7cED0IvgmB48HkYzSOo');
define('SECURE_AUTH_KEY',  'xgqLWbMpiZ4EwYHgPqjPrvjxMMiLG8m0VFWYUD648k53NTVIWQZ8yplqIxbLYjkS');
define('LOGGED_IN_KEY',    'hVBFZCTBaMIieMk0ZBKwOracO30D4XKhOBKQdkjZGfljBjIefGpwo6YQRkjWXkHw');
define('NONCE_KEY',        'UVOQbpOBaa9n17UTP8KqXjYNgio8YSgesrbYkvWGIwmmqar8IQZbA6smuM4Z5pp7');
define('AUTH_SALT',        'FJWJqjunhMJpdCEDWlrsH7pYcZ3QCfuUX6T0SmXwQ6ArTybl8tnlkV8FFtnxQt7k');
define('SECURE_AUTH_SALT', 'KxfUg7hbKlcAlCJ7eIufUhdHglWj644gCmCO2SXd5hPBMgWisGL4P6dgoOmOVV1c');
define('LOGGED_IN_SALT',   'WJLce019QAU4X4YmTbwovvzZbqOqR15Aka7R0fRnm0Edu5g2Vf3L6oFSBhPbdMmU');
define('NONCE_SALT',       '9xOrh8NjshtHp3umbYCNiU3Pes6ae8egl4FSA1ZSjufOPoTDpdQXF0rqfO90IPEU');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('WP_MEMORY_LIMIT', '256M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');