<?php
/**
 * Diagnostic script for ZMsite deployment
 */
define('WP_USE_THEMES', false);
require_once(dirname(__DIR__) . '/wp-load.php');

echo "=== ZMsite Server Diagnostics ===\n\n";

// 1. Check Site URLs
$siteurl = get_option('siteurl');
$home = get_option('home');
echo "1. Site Options:\n";
echo "   - siteurl: $siteurl\n";
echo "   - home: $home\n\n";

// 2. Check Database Domain Placeholders
global $wpdb;
$placeholders = array('[PRODUCTION_DOMAIN]', 'zhongming.local');
echo "2. Database Domain Placeholders:\n";
foreach ($placeholders as $ph) {
    $found_count = 0;
    $tables = $wpdb->get_col("SHOW TABLES LIKE '{$wpdb->prefix}%'");
    foreach ($tables as $table) {
        $columns = $wpdb->get_results("SHOW COLUMNS FROM `$table`", ARRAY_A);
        $text_cols = array();
        foreach ($columns as $col) {
            $type = strtolower($col['Type']);
            if (strpos($type, 'char') !== false || strpos($type, 'text') !== false) {
                $text_cols[] = $col['Field'];
            }
        }
        if (empty($text_cols)) continue;
        
        $where_clauses = array();
        foreach ($text_cols as $col) {
            $where_clauses[] = "`$col` LIKE '%" . esc_sql($ph) . "%'";
        }
        $query = "SELECT COUNT(*) FROM `$table` WHERE " . implode(' OR ', $where_clauses);
        $count = $wpdb->get_var($query);
        $found_count += $count;
    }
    echo "   - '$ph' occurrences in DB: $found_count\n";
}
echo "\n";

// 3. Check Active Plugins in DB vs Filesystem
echo "3. Plugin Status:\n";
$active_plugins_raw = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'active_plugins'");
if (is_serialized($active_plugins_raw)) {
    $active_plugins = unserialize($active_plugins_raw);
    echo "   - Active plugins in DB (unserialized successfully):\n";
    foreach ($active_plugins as $plugin) {
        $path = WP_CONTENT_DIR . '/plugins/' . $plugin;
        $exists = file_exists($path) ? "EXISTS" : "MISSING";
        echo "     * $plugin ($exists)\n";
    }
} else {
    echo "   - WARNING: active_plugins option is NOT serialized correctly! Raw value: $active_plugins_raw\n";
}
echo "\n";

// 4. Check Key Directories and Files
echo "4. Directory Check:\n";
$dirs = array(
    'wp-content/themes/zhongming-theme' => WP_CONTENT_DIR . '/themes/zhongming-theme',
    'wp-content/plugins' => WP_CONTENT_DIR . '/plugins',
    'wp-content/uploads' => WP_CONTENT_DIR . '/uploads'
);

foreach ($dirs as $name => $path) {
    if (file_exists($path)) {
        if (is_dir($path)) {
            $files = scandir($path);
            $count = count($files) - 2; // exclude . and ..
            echo "   - $name: EXISTS (contains $count items)\n";
            if ($name === 'wp-content/uploads') {
                // List some subfolders
                $subfolders = array_filter($files, function($f) use ($path) {
                    return $f !== '.' && $f !== '..' && is_dir($path . '/' . $f);
                });
                echo "     * Subfolders: " . implode(', ', $subfolders) . "\n";
            }
        } else {
            echo "   - $name: EXISTS but is a FILE (unexpected)\n";
        }
    } else {
        echo "   - $name: MISSING\n";
    }
}
echo "\n";

// 5. Check PHP Error Log
echo "5. PHP Error Log Check:\n";
$log_path = WP_CONTENT_DIR . '/debug.log';
if (file_exists($log_path)) {
    $size = filesize($log_path);
    echo "   - debug.log: EXISTS ($size bytes)\n";
    echo "     * Last 5 lines of debug.log:\n";
    $lines = file($log_path);
    $last_lines = array_slice($lines, -5);
    foreach ($last_lines as $line) {
        echo "       " . trim($line) . "\n";
    }
} else {
    echo "   - debug.log: MISSING (or WP_DEBUG_LOG is disabled)\n";
}

echo "\nDiagnostics completed.\n";
