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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'quinyx' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define( 'WP_DEBUG', true );


/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '<v5: )_y$<as,S@]+%:C]J_Qc !H#a%GqFkq.7.]N.*Tbw h>BM;F;6:y`ud-)3i' );
define( 'SECURE_AUTH_KEY',   '+Zg~Ws:;/9}>Qxk89KtzK+qJ@wmYpoj?Tu^OP.14N<7^UMbZ;CAC>/^m<%~ KHa=' );
define( 'LOGGED_IN_KEY',     'hKU_zU|KEUyiK^.Wh6%n~/%lQ;oVF:Xe8W?H@B.|1 [hXiLjyDv>XO;-zZ_y!c=W' );
define( 'NONCE_KEY',         '*g^U,SniXJe!omAVTps8y)H2.EeY(A{iM<!nqP/wA^wK=V=SUyrnNP7zVL#%Ck#v' );
define( 'AUTH_SALT',         '$<Fv6!Zm|wh/IoLq4~e(x;>uxEP0r1B5@2F/~(xI2(BX{u((cgTtRhy#QV$<`DX4' );
define( 'SECURE_AUTH_SALT',  'FC]:#=Ok{;=ru0GP/vM~e12&vjUYCW]a(Z)!@c{l-Cu~!59Em@EVZ3C&cj8-mO!l' );
define( 'LOGGED_IN_SALT',    '1^CysQ#;][VIg4*OvN?2~:rWB*km6~93rvAy+|@r><?mxcK^!~=`$D7iYSfl;a~`' );
define( 'NONCE_SALT',        'JnY%i0*1:tF}~i{qT/XC1-euCSFcHF)Q+6%tFX$9U7sVVF9##h@$NE*x_8OroGrZ' );
define( 'WP_CACHE_KEY_SALT', 'JKvK`*eR4ZgzFMNA4TjppL8[{%2zAs`O*+Kpt;&j1!j_Hw?+n|$[Y(.3N~5d9w]8' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
