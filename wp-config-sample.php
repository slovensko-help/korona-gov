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
define( 'DB_NAME', '' );

/** MySQL database username */
define( 'DB_USER', '' );

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
define( 'AUTH_KEY',         'LIKQXF3p`x|V&{{bY*kcEN(}:|07:|HaGTL; K?C@fy]1/F`:yuE4d8egs*rR#}r' );
define( 'SECURE_AUTH_KEY',  'FJ&pqi$hBW ;ek2Z^9W^]nu?X~>YoFR`;)Q[0qg#*#M]2m8823r,Lj~!c<(_hOBO' );
define( 'LOGGED_IN_KEY',    '/hX@_CP4.[.L/<{Yi9egd`H^j<@#PE+yF,(?ZXz^ 0EV}Ta$dFl98JfzSgtLe1 K' );
define( 'NONCE_KEY',        'frI]&y$m.;KU&LpDEv=N< d)Q tBt?~MY/W8S-4BEuf_ZSlbO>ua&  (/u__wXh!' );
define( 'AUTH_SALT',        ' nH6;.bm0b>:$13YR>~4!Nu]8k[YI`F:hWuM?Ex<[3R]6D;zy)m6]^#{sJS+tO5[' );
define( 'SECURE_AUTH_SALT', 'q&YkKrZ!P0.y4h_tK;^OS)!4A]]ln>I[jVD*Ne-@Bxk~Ff|I,pZrE=I?xOTuO2{f' );
define( 'LOGGED_IN_SALT',   '7^J~S54tM>iLsO3l!R?DHXU79>~J_bt+^q@qX0s|orXMVWj9D|~[ucZpm^$F?DtH' );
define( 'NONCE_SALT',       ']{LU;<XZ9h/^Yh!OuL3d2!BJ<Y%`ozr0*^H88v`mUW*,?$z/DG$;<ec;v5~etpo{' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
