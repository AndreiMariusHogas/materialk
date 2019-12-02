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
define( 'DB_NAME', 'lepetitformage' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'esAdNz|!]3{is]$[sp.rE})k|]^ /$t_e{&?n}k:HdFlbqK+S)V$_>eDxr{6%$I0' );
define( 'SECURE_AUTH_KEY',  '#2%o`[jYuSI5&##Z!9$1?a<kb897c(N=]t-<UvT95(b&LXdksj[~ZBF;]OlypJ20' );
define( 'LOGGED_IN_KEY',    'khvxeR,]tpD9ur`tdm7M8P4|DaDdZ4Rs}r)H8#.#31;jNUUyj&cj[RP|HyR+6p9@' );
define( 'NONCE_KEY',        'q@hoVkK#dh~XB$Kk~9mxuXWrH?f]P:hsKiSGX1IzU]vLOIB0{ 0$P; McYqDHBJC' );
define( 'AUTH_SALT',        '8NOeJiRI! S<]=%.^~}Wr/D2t$~Z;d^_tjf~*8T;_n>z-_~-!7xj;zoB9VjD+FQ5' );
define( 'SECURE_AUTH_SALT', 'P:p*BJlEk/ZE`cH4(!!eb:z:DQ..95&}RE:T@OSYk*R=bu8}@GzmlaYDj0F}ZHSp' );
define( 'LOGGED_IN_SALT',   'fz)E[/)]WE3sOWXmAF_&AJfyzB#49tsJK;9g$f+cZ< nNr3l@OxlL;N(k7!,Gr$D' );
define( 'NONCE_SALT',       'ovsAg5<|PY)v9<{hV-##:{)c5iHLN9[NE$8;J{QPGWI)I 0+4LH04-c(cOR.I,(J' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
