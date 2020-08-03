<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

define( 'AUTOMATIC_UPDATER_DISABLED', true );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'odil_io_databas');

/** MySQL database username */
define('DB_USER', 'odil_io_databas');

/** MySQL database password */
define('DB_PASSWORD', 'RV207a3$dT8kaKsWn|*x');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '6371T|5ZFWU#26/miTyG+XAQK{JsqX|VVC6)HIgzX![qe+)iw%G&totm@>fDw~B`');
define('SECURE_AUTH_KEY',  '_l~{B]@pC>2!qV`S!k~^U:3-61_&x} $$|:|n}X~F2=)gA88&+D{$#cTX5w7/5-^');
define('LOGGED_IN_KEY',    '/>uC(TR48$R,Vd)wL%[~p}+.4chSPO3&/SVRB/2p[LcS8eyrCu+e[b<YY:E2tSl*');
define('NONCE_KEY',        '[]1p?W:=jw>S@#3[aP5N>n;hC8mD.P--k;{MQDFR[~@r7n@&XVLlb_U<}eQX0J|k');
define('AUTH_SALT',        'SiC+17w=nUUPtuw-IEi0]u#C6Y?ndP1d,Mg J#&<(.dZAG2)*+WN0Fw@x84E0fqo');
define('SECURE_AUTH_SALT', '+M+}25HwII$ o .>MUsDg0PRTYU:O$81QD~G=W=)ped*^joSZMf/SH5Ueer<q,H@');
define('LOGGED_IN_SALT',   'MPVm+ZsKMN)9#8S 0qP97E+A1X+H-Gp#vgDbhs(wk?t29-4-JgHyF[;R`]T!**j ');
define('NONCE_SALT',       'Yt^%g!~Rez]fPmWoE+`-q wIG_zh%i,_vA<R:4YJIVzgI!z7fhh^I)EQ)#)O3+Xu');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ET2015_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
