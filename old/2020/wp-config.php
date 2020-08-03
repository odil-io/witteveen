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
define('AUTH_KEY',         '|IqnGQ&]:B*=@dP-@AkY>8T.GUX`bByd_q{xrDJu7`sC f<+n{ wln(bwY0-0Jo#');
define('SECURE_AUTH_KEY',  'WFs T+y{_UdlCv{ R=Z,-se6s}$JWpxG[#N>%aCH!8O18Av,50y]iSO~x:*[BdVC');
define('LOGGED_IN_KEY',    'u<AGfJfCqPyD~)f]O|7$=N0Q~[Io[s_&j5hn~oaHzc(9#ZqQFCyYt6f-9/Xoxki/');
define('NONCE_KEY',        '?vAK$y8#}8@eKcci@{96A.ff[-2S3w<|nG?ID8bEVeS)Nl:b.D_1b>5dKIzSyp#V');
define('AUTH_SALT',        '&n{xF;]o 6-S1jKgoc,[uVA=/SUY|Q}EeCq=WJij@t{^H09~9K|K@EbmL]ZpT j`');
define('SECURE_AUTH_SALT', 'f4qP|cKS?~a8sH5ygZW@=sJDq9ONdH^t2FXkV%o#rXaA6Z7T7c?*WS&db00cAyBa');
define('LOGGED_IN_SALT',   'g6o]MP[5D)M}Hq99U-u9K_>YYn$edm^aeVcs8dU&OVoJIOn,#AJ;)N_ m#EV1hZo');
define('NONCE_SALT',       'd(hfD/Lv{Lub7z6Dc<#h)8vdAh3C9Gn{,?7&jV!o4Iz$my%y;>(&DmuGDaLn_H;8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'TOUR2020_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
