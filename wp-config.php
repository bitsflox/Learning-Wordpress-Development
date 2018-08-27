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
define('DB_NAME', 'db_apple');

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
define('AUTH_KEY',         'YE8FSUO~ea4}!F{>J`0K%e8reP[)wf@Hq*w7J6^6Kp_f{,*W9g1Al}O5TF96@dAm');
define('SECURE_AUTH_KEY',  '6~e9R8C{Bx(QpCzC yvD(6Lx7K}9J~^+q?}psvFkpL#2>a.FRJXwPiwO6!VSbsYI');
define('LOGGED_IN_KEY',    'Po+C4))y)K)Y5r5B gEFYKPixXFUC,1Nb)5HWK%(EIqIGAgBM.^h[{z_&JDr>b;1');
define('NONCE_KEY',        'z=sW>}gj#|yAFiXZz&N@Q!ff,+nQR:`CdA exu|9kApyS&%n?^^oOdx5%x*&izo#');
define('AUTH_SALT',        '5m A<@qHlnUW^}M@f[j61i3X5uYp/MAyMpkaApv4 W`j;EsvE.=56)[@!)KV/^-E');
define('SECURE_AUTH_SALT', '?5=Z`Ku9u=pz8ZMLhWbFlaf;N()L|NcN^$PYh)+i7]5~zywMz-/svtgFRE]%gk,$');
define('LOGGED_IN_SALT',   '(20Cn>/a2 #Wsy3<6XK4P_o`(6HsU(Dm/nxX9e&m)`m4!V4xjoYeZne3wxS)b~k!');
define('NONCE_SALT',       '(ak&$]UJR,<|{[:`sgf{Q-VAK(dK5(dI^d8vRsRYn3.xhz%}6=FCVF@FnO8,x3ua');

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
