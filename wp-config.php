<?php

define( 'SMTP_USER', 'website@kaymera.com' );  
define( 'SMTP_PASS', 'Fu6idVUAus3Tqcc4IFrKWY8bEcddvoWo' );
define( 'SMTP_HOST', 'smtp-relay.gmail.com' );
define( 'SMTP_FROM', 'website@kaymera.com' );
define( 'SMTP_NAME', 'Kaymera Website' );
define( 'SMTP_PORT', '587' );
define( 'SMTP_SECURE', 'tls' );
define( 'SMTP_AUTH', true );
define( 'SMTP_DEBUG', 0 );

/** Direct access to the File System  */
define( 'FS_METHOD', 'direct' );

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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'r4U2tZLkT60zB63gEIaiUIo1qOrevKiX' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'zGA0I76TArleHVAEwwwUIOblXZHDtKXN8QHlIljMeYkaBnB8ELpE9q9AV9aEasme' );
define( 'SECURE_AUTH_KEY',  'AY0EhkXiQsLDBWrs3CKUPAdG1czOwF72p4OqDHmXHzkQCdP8GRVRb3lC308mYhyR' );
define( 'LOGGED_IN_KEY',    'mD1BDo62Gd3fkdpgXtyWNmwbHjdlWYUsooiooxSb0jaXiX3ac0ggXL3OcI8LgiEt' );
define( 'NONCE_KEY',        'eMRKcoKnFXuFn06Xex16bLBgUQcDITI4CanTkbYLB9zMdYTAxZx7szO56zYwDuUX' );
define( 'AUTH_SALT',        'hUMk0gtZZCiE3oaoc3Nrspds8cRnd2w2jRHuEte55673EAZIuUHNqyIss2x382ud' );
define( 'SECURE_AUTH_SALT', 'tm5bIJyrvVF1MvbjYaMhjyb6Z6DrwX1SFuPaxxfRyuIzJgBjdfsn3ZmfNcAHlrCZ' );
define( 'LOGGED_IN_SALT',   'QMosE5IamapX0VBYrK6l4WGRRO7Zy8u5v3bVOdrn42sxkwsDxG7O9A0bCYl8Gc4w' );
define( 'NONCE_SALT',       'mlr6AF5WtG7SnsbLalafwH8TzctqQhjUo2yg4BAuzkNm1BIzzlZCM1nSFUdttzqd' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

