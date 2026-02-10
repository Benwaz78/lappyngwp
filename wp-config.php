<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lappyng_db' );

/** Database username */
define( 'DB_USER', 'lappyng_user' );

/** Database password */
define( 'DB_PASSWORD', '9=)UtQ+KeIS0yt-d' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '7[`iZ24jKv sq@[+`jN=8+)_)=p3@4YMz<R=H68ZYwq< 6@.AHW7t^~X[eC?Pht.' );
define( 'SECURE_AUTH_KEY',  'NBDU??D;Ls{YwbSyb==B7b!&?,qZt~K7=-YC8W;))cz<dB]EHeK0r`%gfTQ5~S#-' );
define( 'LOGGED_IN_KEY',    '.VVH5c*[rX!b%.&!`zzbNU&Ib6%6(qjL:>/1cl;+1^l7I!F*) h[6)>fBRX-F`L{' );
define( 'NONCE_KEY',        ')~]*x@gupyHK-;7<:+6/o[.<UyS|rk+U}eUM2/TjA6hqt)uBq?tAUc[/w>R?v3?#' );
define( 'AUTH_SALT',        'a<q4T1)4;FO!{Dy~G$NamF|zC:Q-)7Huf<&G9>x?5uOg.lOoIK1m@%|d=N-p`16V' );
define( 'SECURE_AUTH_SALT', 'd}&y2UoDx-][FJ3amC!2#KoZb/g7g>{xe!c8t%msS43]bcD:i8@DMj|ia{=8_&oN' );
define( 'LOGGED_IN_SALT',   '*%m|HEX5HjSTk%S>F&v.GzX%#l`82kj>!4dxacBGS4mqRc4ZTHgKO~f-4!(!.;6v' );
define( 'NONCE_SALT',       'wKLTl)7pq]uDBG3l4QP&o?Ml_y:>+:9#.7r{QfEn|tjH;Ii??-0naWnzz0<3{58t' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'lappy_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
