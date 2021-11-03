<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'amadeusnoah_dkungdomsbyen' );

/** MySQL database username */
define( 'DB_USER', 'amadeusnoah_dkungdomsbyen' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Hejmeddig1' );

/** MySQL hostname */
define( 'DB_HOST', 'amadeusnoah.dk.mysql' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'LU+.mI.P^2Yb@%nTSP13Hq=?>]%aAws]RyelJz_M>}6eF5iC/SIz,9JtXq8xDFPf' );
define( 'SECURE_AUTH_KEY',  'bK]`4i3}8weX%,8Wx9d@j~BgSAm]( 80k&YC{o~Pi!eNU;xpyA52GiCo,&*kNqu-' );
define( 'LOGGED_IN_KEY',    'ZwM@z;CMPU;i_Z4J>QiJp!~`{TW(zL%#741UISXE+t%9FCc`9mGG$(Wad1H97xsH' );
define( 'NONCE_KEY',        'w,o,51}r|jX%EZw09 G.lCiH6zRSCYC|3bdBbxR&v+J7tV<`lrK>&LpUe8nvrzw)' );
define( 'AUTH_SALT',        'ms$|SL1IE&|qS9v3M>3i}`,oFe}Cs;>7j[J;7IP+d_Q*X$<7?PrfAbA2n^,LhyTF' );
define( 'SECURE_AUTH_SALT', ')j$RoTe:+{3mDoM+Ds8Vy#T-WS>>o.V.-s%$5t-!)zhq7=;Zci))tmR{+eq%TZ:s' );
define( 'LOGGED_IN_SALT',   'L{7jj=X(!*]l;YS]I!R]irI`|:,,7.7~*5E=lV]b4^%6;@KXttNZ8_=ZyU^V1iHx' );
define( 'NONCE_SALT',       ',fn8s;w(4pI8TGp-=SpUyTfBXPe}6Z-h[>F^bWttOH@*f_C>*B0(L..FtR3z)wbH' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ungdomsbyen_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
