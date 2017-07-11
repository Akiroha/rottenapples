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
define('DB_NAME', 'rottenapples_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '3V{(,TGs&nnq|cQuq9kA][1ZD9t+4nkY<CdL1Tr++(J~hI@ZF.[TCg&5FcX3$dzW');
define('SECURE_AUTH_KEY',  '5f?+z,?~7O-c>5t`[Rzpt/GEkXO!)ctv*}Bz+S!Sk,ny$Vx#erMj=^Ww,741G|@n');
define('LOGGED_IN_KEY',    'v5orD3%go;,3pP_:aAWs<@s,4mxqMaZd!{vU-_Z6DQfH5vOw>tGT5WyTd;IyPXGM');
define('NONCE_KEY',        'G)vxxbr{H7`[XLfjo+:{>GI9Xr5fld }A]NBv%5WH$9@olw$<`NmJ5_-y=<:h.Ap');
define('AUTH_SALT',        ']s@G)t5 |`2Z`s~U)/j__PXpwnNl>tLd?<r(jgN-LdbG|_@)[yZZ.~?[gF>yW/zg');
define('SECURE_AUTH_SALT', ',n)YIj{%1iw}fnOG592Krvm{$$/LZ@Im|HEs0{<Rmiw*qR)uq7Gs$S#T+g!9lcE4');
define('LOGGED_IN_SALT',   'M8x!4A21b{pD)GEbUWR=1]9!=Tum3a=zu>1,l4~CT92]5o4/!c$A$UD,+#b|<dCE');
define('NONCE_SALT',       'X0C.WlH*@D1pY[kZ+W!/N%JSn5&i&7|<Lv<T7m&/jUe-#m+Pzj3;[UIv,gXx[;G5');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
