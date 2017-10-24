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
define('DB_NAME', 'izba');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Y[CsYWvw$)e<-y3?ZS-TzQ#K*E{Lp)0AUD@eP~|ORh57SXy%?A3eM{{s9`gUuT}y');
define('SECURE_AUTH_KEY',  'G>2G3I*}#$XmNv`b3A9L):2:n=xAl_[nKP^gdP!uWu~abe<CIft~i*D>8QttjA.g');
define('LOGGED_IN_KEY',    '@V>(Fw5^?elnj;Amdwiq2dQ1fo1[$m?Q.K^3p ^}4NppIxQ6-1$>d/`-CZbO>g~&');
define('NONCE_KEY',        'T,3B8IY-Ac{*JzsljaAC{%Mc1eMJ3eunF`pCFd$$,!eBX_wC.d]Ua^4 |G|PXHvw');
define('AUTH_SALT',        'U-RIN{7d:AlA50vJ;smd[a;TX-v.*SDz.,.]kp=o7pvm5,C_-.8E1[_X,U$mGz!n');
define('SECURE_AUTH_SALT', 'qB8-dW[:PS+j/#Mwyny{rD1~$m42qnk$[=x`-:oDm{|~l>wW#e[SS~=.8q#-_eFv');
define('LOGGED_IN_SALT',   '!tOcPXfIIeR?HshUeo=(_Qa%R3(^?Pr(ux|P<#Dp~Hr(F|w140t=X!xUA`xQ7c-M');
define('NONCE_SALT',       '?aANd T8]LU?jqX_=6s/IQHqmLGli&prA8E<JgL#/!_ILll 8~k]?8nwb.Kz3xli');

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
