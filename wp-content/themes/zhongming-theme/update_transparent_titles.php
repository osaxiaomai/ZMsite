<?php
/**
 * Update Transparent Screen Titles
 * Run this script from the browser or via CLI to update product titles on the production server.
 */

// Try to load WordPress environment
$wp_load_paths = array(
    __DIR__ . '/../../../wp-load.php',
    __DIR__ . '/../../../../wp-load.php',
    $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php'
);

$loaded = false;
foreach ( $wp_load_paths as $path ) {
    if ( file_exists( $path ) ) {
        require_once $path;
        $loaded = true;
        break;
    }
}

if ( ! $loaded ) {
    die( "Error: Could not find wp-load.php. Please run this script within a WordPress environment.\n" );
}

echo "Starting transparent product titles update...\n<br>";

// We know the exact IDs and their new titles from our local database check.
// We'll update them directly by ID to ensure it applies perfectly on production.

$updates = array(
    // English Indoor
    430 => 'Indoor Transparent LED Screen P2.6 · 65% Transparency, Glass Curtain Wall Specialist',
    431 => 'Indoor Transparent LED Screen P2.97 · 65% Transparency, Glass Curtain Wall Specialist',
    433 => 'Indoor Transparent LED Screen P3.91-S · 65% Transparency, Glass Curtain Wall Specialist',
    434 => 'Indoor Transparent LED Screen P3.91-L · 65% Transparency, Glass Curtain Wall Specialist',
    
    // Chinese Indoor
    788 => '室内LED透明屏 P2.6 · 65% 高通透率 · 玻璃幕墙专用',
    789 => '室内LED透明屏 P2.97 · 65% 高通透率 · 玻璃幕墙专用',
    791 => '室内LED透明屏 P3.91-S · 65% 高通透率 · 玻璃幕墙专用',
    792 => '室内LED透明屏 P3.91-L · 65% 高通透率 · 玻璃幕墙专用',
    
    // English Outdoor
    432 => 'Outdoor Transparent LED Screen P3.91-H · 65% Transparency, Glass Curtain Wall Specialist',
    435 => 'Outdoor Transparent LED Screen P7.81 · 65% Transparency, Glass Curtain Wall Specialist',
    436 => 'Outdoor Transparent LED Screen P10.42 · 65% Transparency, Glass Curtain Wall Specialist',
    
    // Chinese Outdoor
    790 => '户外LED透明屏 P3.91-H · 65% 高通透率 · 玻璃幕墙专用',
    793 => '户外LED透明屏 P7.81 · 65% 高通透率 · 玻璃幕墙专用',
    794 => '户外LED透明屏 P10.42 · 65% 高通透率 · 玻璃幕墙专用',
);

$success_count = 0;

foreach ( $updates as $post_id => $new_title ) {
    $post = get_post( $post_id );
    if ( $post && $post->post_type === 'product' ) {
        if ( $post->post_title !== $new_title ) {
            $update_args = array(
                'ID'         => $post_id,
                'post_title' => $new_title,
                'post_name'  => $post->post_name // Keep original slug
            );
            wp_update_post( $update_args );
            echo "Updated ID {$post_id} -> {$new_title}\n<br>";
            $success_count++;
        } else {
            echo "Skipped ID {$post_id} - already up to date.\n<br>";
        }
    } else {
        echo "Error: Post ID {$post_id} not found or is not a product.\n<br>";
    }
}

echo "<strong>Update complete! {$success_count} products updated.</strong>\n<br>";
echo "You can now safely delete this script.";
