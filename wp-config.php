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
define('DB_NAME', 'garnetmachine');

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
define('AUTH_KEY',         'W} %O;-+aqf6Q.}|a-<xb[J=|fv<+)SW94s^GY& )ngd4)gK?+KnM^r^`t1P+S#|');
define('SECURE_AUTH_KEY',  '+A9?YF>vae?Q[jcBU]_=+JuSLapQi>0,:qk6H#|BxLyW95r5A78~sVLBxxF.Y!Vp');
define('LOGGED_IN_KEY',    'AR`-+}BoCIDb:<tTm+V+-+4]j!CyIL4Z9j*wJ1rg4@U2a$e-`:j:xWd<J/Bo4xZt');
define('NONCE_KEY',        'z@=++2M4JkzA-q;*re5d0t~B!*x(o??DT@D&Zb{[LKXa,ugKor7tPjt+NZ(~zdNP');
define('AUTH_SALT',        ')M|v;.-D[G2m*K(O$u~?uY|lIgC3Rg9irqnzV;K9y@h6=c>/wbb(n;eU--4+Q,cW');
define('SECURE_AUTH_SALT', 'k8[pV_YYJhj+HFkn`/<h9z|pHWYX)A_w4px=K9uJP-{)haq0,byx#jGt. *.Y+FV');
define('LOGGED_IN_SALT',   'c),.3+fA{i@,w?&H~C.|In]eZ=9]Z/ZD./3KB0t6Q-V+]#At!V bZ&?TAp;v>ULc');
define('NONCE_SALT',       '+Xup W)W>E>Ry^-`r-}2+8IXp`Lr*KI,HGHm&s|9Yj~pVEQ;]Le9K5O:dml-T)k0');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gm_';

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
