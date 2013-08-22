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
define('DB_NAME', 'wp_eric');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'anthony7');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'M+@yasM,fB`joG=X<&o1.<&s*Ly$cCp&W{P#u|SEh]`lJm+DX)Q^RRu4#m[vW?&:');
define('SECURE_AUTH_KEY',  '~PAl+=s(bD9-WF[nsA+MESo#WV?75O7wMm5sjlng|]{MfYK(r1Q_Ukl_E#U>}O;[');
define('LOGGED_IN_KEY',    'O/dZ;[wh_OY{<BP+03Y%|xBfo<+-y-lR.N}|k/13+GI!0A7#fIRx=8 ?|b0M^p<S');
define('NONCE_KEY',        'xq*fF:Rx(B2?2H-BhW(e+M5Yz-f3)[7:D|+9){BrY3[-tn!3N3vpzg0-nI &b[X`');
define('AUTH_SALT',        'l|z#a&6w-|wV1F1Fw|~I P!!G*;<,j)XyO-+6&+zYg{O+#G%=Zw6+.g2s|#[;?Du');
define('SECURE_AUTH_SALT', 'p9p,IjZeL{@77S?q:AsXmJvy)fr5bSC<rnE2YqW|RD1GlCP*cF>8)(0Lm;h-eNap');
define('LOGGED_IN_SALT',   '[$3Nx@f9|8,e<Ul79ea*g([]G$A,N-yy]L<.e%VR+~%K4SNn[L99@&JVa;qsqo#X');
define('NONCE_SALT',       'DS`!8tO^-TU|<Mchn^t0Vd^Lrn|S|Ih[#,YX8%w@RN~F`M5 !KB~+kC=4RFaP6E3');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_eric';

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
