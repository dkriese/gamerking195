<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_gamerking195');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'diana');

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
define('AUTH_KEY',         'njLv~o.W;Y~Hi2|#qe*nrU-Bl{zLXb*[ j!~:|XzYq94X<U_K_Z@(x)z8jr1X7rL');
define('SECURE_AUTH_KEY',  '@]@3,FJ-G{GH}sgMLa) TpAWwM+es[3FvKL(nLdUI]Y:-B_YFkp$`hT-|HRpQN|A');
define('LOGGED_IN_KEY',    'L8Nx)Qpprt<Mn$]iIo#Qx-0R-$zSpV?m)4+]o31eqTKod2nVSx7x|Z+e}gA#wz+w');
define('NONCE_KEY',        'Q}//-T^-l-Q*&%I;9,=2*fgYrzl>^yL-k`|U23aEM>wY;(W-Dx:gAF||ca~Nh)+Y');
define('AUTH_SALT',        '9X(/u{{o?{b$Y2nMB[6(x6;mPo[I1dG{10Y<6s=1LP!5I}&KW6M7%]`ERR9jz!^a');
define('SECURE_AUTH_SALT', '4sg#caBA)rp6@C h_:!tb:LGMhL7#<8(+4Ej2n5|?-J5Tu`~s*>88qY? ZMbb)DC');
define('LOGGED_IN_SALT',   'RXYbee4)o@~&{]S/0qAL!0)S!+<BYkv[yKS5(h08lw:H WV%eio+*G`qitTVb`ZI');
define('NONCE_SALT',       '[7w<^pfRYomW#Rf_nJN?C|?KEQ^,ej[S8&k0^  d+zUqVz)BZitFsH#?9)Ioo~(_');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
/* Sets up 'direct' method for wordpress, auto update without FTP */
define('FS_METHOD','direct');
