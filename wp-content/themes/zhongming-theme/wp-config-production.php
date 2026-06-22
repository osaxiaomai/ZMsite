<?php
/**
 * Zhongming LED — Production WordPress Configuration
 * 
 * IMPORTANT: Rename this file to wp-config.php on the production server.
 * Replace all [PLACEHOLDER] values with real credentials before uploading.
 * 
 * NEVER commit this file with real credentials to git or version control.
 */

// ============================================================
// DATABASE SETTINGS — Fill in SiteGround DB credentials
// ============================================================
define( 'DB_NAME',     '[DB_NAME]' );       // e.g. 'zmled_db'
define( 'DB_USER',     '[DB_USER]' );       // e.g. 'zmled_user'
define( 'DB_PASSWORD', '[DB_PASSWORD]' );   // Your SiteGround DB password
define( 'DB_HOST',     'localhost' );       // Usually 'localhost' on SiteGround
define( 'DB_CHARSET',  'utf8mb4' );
define( 'DB_COLLATE',  '' );
$table_prefix = 'wp_'; // Matches the exported database table prefix


// ============================================================
// SECURITY KEYS — Generate new ones at:
// https://api.wordpress.org/secret-key/1.1/salt/
// ============================================================
define( 'AUTH_KEY',         '[AUTH_KEY]' );
define( 'SECURE_AUTH_KEY',  '[SECURE_AUTH_KEY]' );
define( 'LOGGED_IN_KEY',    '[LOGGED_IN_KEY]' );
define( 'NONCE_KEY',        '[NONCE_KEY]' );
define( 'AUTH_SALT',        '[AUTH_SALT]' );
define( 'SECURE_AUTH_SALT', '[SECURE_AUTH_SALT]' );
define( 'LOGGED_IN_SALT',   '[LOGGED_IN_SALT]' );
define( 'NONCE_SALT',       '[NONCE_SALT]' );

// ============================================================
// PRODUCTION ENVIRONMENT SETTINGS
// ============================================================
define( 'WP_DEBUG',         false );   // NEVER enable in production
define( 'WP_DEBUG_LOG',     false );
define( 'WP_DEBUG_DISPLAY', false );
define( 'SCRIPT_DEBUG',     false );

// Use SiteGround's system cron instead of WP-Cron
define( 'DISABLE_WP_CRON', true );

// Force HTTPS for admin panel
define( 'FORCE_SSL_ADMIN', true );

// Set absolute path for extra security (SiteGround recommends this)
define( 'ABSPATH', __DIR__ . '/' );

// ============================================================
// SITEGROUND HTTPS PROXY DETECTION
// Ensures WordPress generates https:// URLs even behind SG proxy
// ============================================================
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) &&
     strtolower( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) === 'https' ) {
    $_SERVER['HTTPS'] = 'on';
}

// ============================================================
// PRODUCTION DOMAIN
// ============================================================
// Uncomment and set if needed (usually auto-detected from DB):
// define( 'WP_HOME',    'https://[PRODUCTION_DOMAIN]' );
// define( 'WP_SITEURL', 'https://[PRODUCTION_DOMAIN]' );

// ============================================================
// PERFORMANCE (SiteGround Specific)
// ============================================================
define( 'WP_MEMORY_LIMIT',       '256M' );
define( 'WP_MAX_MEMORY_LIMIT',   '512M' );
define( 'WP_POST_REVISIONS',     3 );       // Limit post revisions stored
define( 'EMPTY_TRASH_DAYS',      14 );      // Auto-empty trash after 14 days
define( 'AUTOSAVE_INTERVAL',     300 );     // Autosave every 5 minutes

// ============================================================
// FILE EDITING (disable for security)
// ============================================================
define( 'DISALLOW_FILE_EDIT', true );       // Disable Theme/Plugin editor in WP admin
define( 'DISALLOW_FILE_MODS', false );      // Set true to also block plugin installs

// ============================================================
// REQUIRED BOOTSTRAP FILE
// ============================================================
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
