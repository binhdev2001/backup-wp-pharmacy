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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pharmacy_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          've}2`xBi2Xaa#ryS/A,=r#-Tw%{X/qCn[2e=8ZS7^,J;+2iixI3*QX( JUu?%_`,' );
define( 'SECURE_AUTH_KEY',   'Cl2ld=tZW@I&(3:^2R*[(T|M1X-w8V(L)^ONi6!gmQmpbn^BdMao]N;ES#E2So,A' );
define( 'LOGGED_IN_KEY',     '?0[^rT|* MS)u<8Lg6,AO=aX|d2,khod`}41SY<JhO.tsW@hld?tx*2pW`Pa4blr' );
define( 'NONCE_KEY',         'oo 9wDX]q(!rwm4#Qq9G5D}hB )3D;50c`Id)LGmu7#=|(8F2vtnqTc?4Pi*=]s8' );
define( 'AUTH_SALT',         'QfcZ_(cSB!Y2f7k[<R/YUMr0s|6ru_Lo6f{N~Jix*!{S_z/?vQ^`EN8:wRi(#={P' );
define( 'SECURE_AUTH_SALT',  '4ty#2&~FQ=7Q_BSIE{c(:@d0?l3u<$NhIh;yu`59x}Tl7o0AwcYJU~QC:D5|1Ia-' );
define( 'LOGGED_IN_SALT',    '<%@Zjtf|@s4U Waz}6nTT3)/^(^?p$& ,5$jQQ~++6q%+jmRv]p`n]fz7~N{Qa(z' );
define( 'NONCE_SALT',        '/zB@JC~Tul8n;28jlt*x8#U(Z#&X}(W|>,K@Ep=T5cC7c)lLoyF.J:ne+h;.c,DQ' );
define( 'WP_CACHE_KEY_SALT', 'hKh4Wv^VE5,UGHB4*ltOao[oO!bGKw|tsLD{-dDMt.j~qyqFWh1ID_#P0Xkux s:' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
