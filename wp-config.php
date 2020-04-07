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
define( 'DB_NAME', 'wpkorona' );

/** MySQL database username */
define( 'DB_USER', 'wpkorona' );

/** MySQL database password */
define( 'DB_PASSWORD', '6g5efmt7h0' );

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
define( 'AUTH_KEY',         'TA*;W]6${I1A$zJ3}iUR+W&yIZKN0asg:u*g:oQ}I:*9_P,J7CqF$NRpx|tSA]ei' );
define( 'SECURE_AUTH_KEY',  'dp2:KlqL2/a:ZZl/l#]jx{KW0b[FZ|yb&.Ct-Op$$D/}*/wM0$gDW!a%b|01;+]9' );
define( 'LOGGED_IN_KEY',    '**&ALxi} 5-,}3$4u~YmRW/7(wW71!d5QVepA-,^Rm~[65aICBfvN*(mxlrLw8-W' );
define( 'NONCE_KEY',        'AQ~249_]LT`hDmWJE5UtwHuNhW!apKe1<bd9o_t=3xX[Z(@U%9n~7B&O2^z-VEl;' );
define( 'AUTH_SALT',        '548Dd{>B1A0{WxzwGrxy0yNdLr.*6lQ_f1ig7Kl.wyHq?HPJzS/TgyY;Dbc5>kWi' );
define( 'SECURE_AUTH_SALT', ']+2#z^4EZA/U]oeIm5q8jCvcHm6Fv*8>~Bv@P {8O3V-}y@&Oa]]w^-gfdKo5U0E' );
define( 'LOGGED_IN_SALT',   ']qM]^vWq%v pqT&,5.=-I#ocZys6yXQ:umGj,YFr$#N,m]8}&}4+;l4{RRlM|UE[' );
define( 'NONCE_SALT',       'ts02M.6a,HAH)9OI8nrrpQe/le<F<&zvalmLgvc`[,VT*9/&Z[]@e$:.JW}1<Cv~' );

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
define( 'WP_DEBUG', false );

/** force admin via https **/
define('FORCE_SSL_ADMIN', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
