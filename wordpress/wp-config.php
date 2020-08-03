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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         ',(;(D)>p.@`9^k,qc}8kxR$I(ED;?Istc&2uZ`]*/IJ;vG%!XjgXvhn%xxayEy)+' );
define( 'SECURE_AUTH_KEY',  'r+uUT-kI-ER;oj7{wW`Sl^dJl5HfwA63h^7H=6}eIkn);o}W><WMEE5(#0zI{,[8' );
define( 'LOGGED_IN_KEY',    '!%42aizg)Xr@9sXPb:Mc+tR%6g#fZ`qua0fFRyn[9,X|WY}zI>G?:1JJC/i:(AZY' );
define( 'NONCE_KEY',        'eNM&Rko);n<,zRyTlPU<tD$QK0(:r>9z,1p[|)tT[=W+sTDr8[Yikt~:N(wCp>ov' );
define( 'AUTH_SALT',        '?j*Pin(fk7s./6(Y} _<G8kt?[Vz:L_sK}K[1U*{VHi+0p(.jc4W+tLF{q:Oojg_' );
define( 'SECURE_AUTH_SALT', '$BU_90]~<AFeb8/^xX$^xIlNcHt`PQ$u?*({wkeII[4$N){}ubR:{Zt.kpwzSq>p' );
define( 'LOGGED_IN_SALT',   'WXOfj jg_/}-GR+rB|!.1{E&NMB]^}vB,(H/FO=_i-9=k/XVMH%ZrgSb$ca@KF_t' );
define( 'NONCE_SALT',       'uSF5XCa3:kS-${4]l?meI@00eiO112[=etI3v*iyiK:x|H{q!2b-Nr8tPVr`Zb=j' );

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
define( 'WP_DEBUG', true );
define('WP_HOME', 'http://localhost:8888/witteveen/wordpress/');
define('WP_SITEURL', 'http://localhost:8888/witteveen/wordpress/');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
