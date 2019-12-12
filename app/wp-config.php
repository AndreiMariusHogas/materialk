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
if(file_exists(dirname(__FILE__) . '/local.php')){
	/** The name of the database for WordPress */
	define( 'DB_NAME', 'lepetitformage' );

	/** MySQL database username */
	define( 'DB_USER', 'root' );

	/** MySQL database password */
	define( 'DB_PASSWORD', '' );

	/** MySQL hostname */
	define( 'DB_HOST', 'localhost' );
}else{
	/** The name of the database for WordPress */
	define( 'DB_NAME', 'Your db' );

	/** MySQL database username */
	define( 'DB_USER', 'username' );

	/** MySQL database password */
	define( 'DB_PASSWORD', 'pass' );

	/** MySQL hostname */
	define( 'DB_HOST', 'localhost or specify for host' );
}


/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'S{WV^X]BN%1v.S0|UZ>ls.+69,Ijv2|+23%9.$8y7RP#f^(8_VH7}%9aQ}b|[t8|');
define('SECURE_AUTH_KEY',  'G9@|R_?AJx+!0>r}fsv <9gr8Uh8{7-YWA{24snj+n$9A;~Vc;nnksJ#C2xm.$GS');
define('LOGGED_IN_KEY',    '0D^E)Eg^1vm.=<>dA+:gzUhFrb!1kh^7e)n<{G<~L2UN&R2.|o>?a`Hm+pLyJ!Ns');
define('NONCE_KEY',        'VlP|9v~U}~ZZ&b.]+{,G/ObC--+5?YoZ;:xRW)Oq}g7:-bU?*Tt6VI<gUCJ|*}r)');
define('AUTH_SALT',        'a8OO*Db|yK {T/.Yr|Gd`Qb~:-8-L- YgDUwCv-q3-Ojq7&J ,HEP;Psv=-ej>]m');
define('SECURE_AUTH_SALT', '+|hDyrX4B%bN`m5gBS,_y8X36Z@e}f#!.f}ceTLxHDRbdVl^YUV,@ddGvFc[F<T>');
define('LOGGED_IN_SALT',   '<i~:M>oyA @ Za~g8$=7d|8b;$9|iht5;?Gq02>T|x3&0cdgUe0IT(0-M$*HmjeR');
define('NONCE_SALT',       'aT$?93l>[,P 2<|f.)V3`r@gJD%M6L}btnlh|A=FmD#2_6s3vQ4wq)h$$c$5JpnN');

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
