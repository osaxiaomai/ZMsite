<?php
/**
 * Script to remove unwanted images (742, 746, 747) from Standard Indoor products.
 */
$wp_load_path = dirname(dirname(dirname(__DIR__))) . '/wp-load.php';
require_once $wp_load_path;

if (!isset($_GET['secret']) || $_GET['secret'] !== 'zm2026') {
    die("Invalid secret key.");
}

$unwanted_ids = array(742, 746, 747);
$preferred_main_id = 743; // Grey cabinet front view

echo "<h2>Removing Unwanted Images (742, 746, 747)</h2>";

$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    's' => 'Standard'
);
$query = new WP_Query($args);

foreach ($query->posts as $post) {
    if (stripos($post->post_title, 'Standard') === false) {
        continue;
    }
    
    echo "<h4>Processing: " . esc_html($post->post_title) . "</h4>";
    
    // 1. Update Gallery
    $gallery_raw = get_field('product_gallery', $post->ID, false);
    $gallery_ids = array();
    if (!empty($gallery_raw)) {
        if (is_array($gallery_raw)) {
            $gallery_ids = $gallery_raw;
        } elseif (is_string($gallery_raw)) {
            $gallery_ids = explode(',', $gallery_raw);
        }
    }
    if (empty($gallery_ids)) {
        $raw_meta = get_post_meta($post->ID, 'product_gallery', true);
        if ($raw_meta && is_array($raw_meta)) {
            $gallery_ids = $raw_meta;
        }
    }
    $gallery_ids = array_map('intval', $gallery_ids);
    
    echo "Old Gallery: [" . implode(', ', $gallery_ids) . "]<br>";
    
    $new_gallery = array();
    foreach ($gallery_ids as $id) {
        if (!in_array($id, $unwanted_ids)) {
            $new_gallery[] = $id;
        }
    }
    
    // Ensure the preferred main image (743) is in the gallery, ONLY FOR INDOOR
    if (stripos($post->post_title, 'Indoor') !== false) {
        if (!in_array($preferred_main_id, $new_gallery)) {
            array_unshift($new_gallery, $preferred_main_id);
        } else {
            // move it to the front
            $new_gallery = array_diff($new_gallery, array($preferred_main_id));
            array_unshift($new_gallery, $preferred_main_id);
        }
    }
    
    echo "New Gallery: [" . implode(', ', $new_gallery) . "]<br>";
    
    update_post_meta($post->ID, '_product_image_gallery', implode(',', $new_gallery));
    if (function_exists('update_field')) {
        update_field('product_gallery', $new_gallery, $post->ID);
    } else {
        update_post_meta($post->ID, 'product_gallery', $new_gallery);
    }
    
    // 2. Update Thumbnail
    $current_thumb = get_post_thumbnail_id($post->ID);
    if (in_array($current_thumb, $unwanted_ids)) {
        echo "Thumbnail was $current_thumb (unwanted).<br>";
        if (!empty($new_gallery)) {
            set_post_thumbnail($post->ID, $new_gallery[0]);
            echo "Set new thumbnail to {$new_gallery[0]}.<br>";
        } else {
            delete_post_thumbnail($post->ID);
            echo "Deleted thumbnail because no valid images left.<br>";
        }
    } elseif (stripos($post->post_title, 'Indoor') !== false && $current_thumb != $preferred_main_id) {
        set_post_thumbnail($post->ID, $preferred_main_id);
        echo "Updated thumbnail to preferred $preferred_main_id.<br>";
    } else {
        echo "Thumbnail is fine.<br>";
    }
}
echo "<h3>Done!</h3>";
