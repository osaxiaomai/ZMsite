<?php
/**
 * Safe database search and replace for WordPress
 */
define('WP_USE_THEMES', false);
require_once(dirname(__DIR__) . '/wp-load.php');

if (php_sapi_name() !== 'cli' && !current_user_can('manage_options')) {
    wp_die('Unauthorized. Only admin or CLI can execute this script.');
}

global $wpdb;

$replace = 'http://43.133.36.40:8001';

// Also allow overriding via query parameters or CLI arguments
if (isset($_GET['replace'])) {
    $replace = $_GET['replace'];
}

$search_replace_pairs = array(
    'https://[PRODUCTION_DOMAIN]' => $replace,
    'http://[PRODUCTION_DOMAIN]'  => $replace,
    'http://zhongming.local'      => $replace,
    'https://zhongming.local'     => $replace,
);

if (isset($_GET['search'])) {
    $search_replace_pairs = array($_GET['search'] => $replace);
}

echo "=== WordPress DB Serialization-Safe Search and Replace ===\n";
foreach ($search_replace_pairs as $s => $r) {
    echo "Pair: '$s' => '$r'\n";
}
echo "\n";

function recursive_replace(&$data, $search, $replace) {
    if (is_string($data)) {
        if (is_serialized($data)) {
            $unserialized = maybe_unserialize($data);
            recursive_replace($unserialized, $search, $replace);
            $data = maybe_serialize($unserialized);
        } else {
            $data = str_replace($search, $replace, $data);
        }
    } elseif (is_array($data)) {
        foreach ($data as $key => &$value) {
            recursive_replace($value, $search, $replace);
        }
        unset($value);
    } elseif (is_object($data)) {
        $properties = get_object_vars($data);
        foreach ($properties as $name => $value) {
            recursive_replace($data->$name, $search, $replace);
        }
    }
}

// Get all tables
$tables = $wpdb->get_col("SHOW TABLES LIKE '{$wpdb->prefix}%'");

foreach ($tables as $table) {
    echo "Processing table: $table\n";
    
    $columns = $wpdb->get_results("SHOW COLUMNS FROM `$table`", ARRAY_A);
    $primary_key = '';
    $text_columns = array();
    
    foreach ($columns as $column) {
        if ($column['Key'] === 'PRI') {
            $primary_key = $column['Field'];
        }
        $type = strtolower($column['Type']);
        if (strpos($type, 'char') !== false || strpos($type, 'text') !== false) {
            $text_columns[] = $column['Field'];
        }
    }
    
    if (empty($text_columns)) {
        echo "  No text columns found. Skipping.\n";
        continue;
    }
    
    if (empty($primary_key)) {
        $primary_key = $columns[0]['Field'];
    }
    
    // Fetch all rows
    $rows = $wpdb->get_results("SELECT `$primary_key`, " . implode(', ', array_map(function($c) { return "`$c`"; }, $text_columns)) . " FROM `$table`", ARRAY_A);
    
    $updated_count = 0;
    foreach ($rows as $row) {
        $pk_val = $row[$primary_key];
        $update_data = array();
        
        foreach ($text_columns as $col) {
            $val = $row[$col];
            if (empty($val)) continue;
            
            $new_val = $val;
            foreach ($search_replace_pairs as $search_str => $replace_str) {
                recursive_replace($new_val, $search_str, $replace_str);
            }
            
            if ($new_val !== $val) {
                $update_data[$col] = $new_val;
            }
        }
        
        if (!empty($update_data)) {
            $result = $wpdb->update($table, $update_data, array($primary_key => $pk_val));
            if ($result !== false) {
                $updated_count++;
            }
        }
    }
    
    echo "  Updated $updated_count rows.\n";
}

echo "\nDatabase search and replace completed successfully!\n";
