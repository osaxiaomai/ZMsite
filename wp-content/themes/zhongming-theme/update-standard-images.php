<?php
/**
 * Script to update gallery images for Standard products.
 * Place this file in your theme folder and access it via browser:
 * https://yourdomain.com/wp-content/themes/zhongming-theme/update-standard-images.php
 */

// Bootstrap WordPress
$wp_load_path = dirname(dirname(dirname(__DIR__))) . '/wp-load.php';
if (!file_exists($wp_load_path)) {
    die("Cannot find wp-load.php at " . $wp_load_path);
}
require_once $wp_load_path;

if (!current_user_can('manage_options')) {
    die("You must be logged in as an administrator to run this script.");
}

echo "<h2>Starting Standard Images Update...</h2>";

// The 3 new images from the theme assets
$images = array(
    get_template_directory() . '/assets/images/standard/img_gradient.jpg',
    get_template_directory() . '/assets/images/standard/img_lake.jpg',
    get_template_directory() . '/assets/images/standard/img_iridescent.jpg'
);

$new_ids = array();

// Helper to sideload an image if it doesn't exist
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');

foreach ($images as $img_path) {
    if (!file_exists($img_path)) {
        die("Missing image: " . $img_path);
    }
    
    // Check if we already uploaded this
    $filename = basename($img_path);
    global $wpdb;
    $existing = $wpdb->get_var($wpdb->prepare("
        SELECT post_id FROM $wpdb->postmeta 
        WHERE meta_key = '_zm_local_source_standard' AND meta_value = %s LIMIT 1
    ", $filename));
    
    if ($existing) {
        $new_ids[] = $existing;
        echo "<p>Found existing attachment for $filename: ID $existing</p>";
    } else {
        // Upload it
        $file_array = array(
            'name'     => $filename,
            'tmp_name' => $img_path
        );
        $id = media_handle_sideload($file_array, 0);
        if (is_wp_error($id)) {
            die("Error uploading $filename: " . $id->get_error_message());
        }
        update_post_meta($id, '_zm_local_source_standard', $filename);
        $new_ids[] = $id;
        echo "<p>Uploaded $filename -> Attachment ID $id</p>";
    }
}

echo "<h3>New Image IDs: " . implode(', ', $new_ids) . "</h3>";

// Find all products with "Standard" in the title
$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    's' => 'Standard' // search for standard
);
$query = new WP_Query($args);

echo "<p>Found " . $query->found_posts . " products matching 'Standard'.</p>";

foreach ($query->posts as $post) {
    // Make sure title actually contains 'Standard'
    if (stripos($post->post_title, 'Standard') === false) {
        continue;
    }
    
    echo "<h4>Processing Product: " . esc_html($post->post_title) . " (ID: " . $post->ID . ")</h4>";
    
    // Get current gallery
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
        // Fallback: check raw postmeta
        $raw_meta = get_post_meta($post->ID, 'product_gallery', true);
        if ($raw_meta && is_array($raw_meta)) {
            $gallery_ids = $raw_meta;
        }
    }
    
    // Normalize to ints
    $gallery_ids = array_map('intval', $gallery_ids);
    
    echo "<p>Old Gallery IDs: [" . implode(', ', $gallery_ids) . "]</p>";
    
    if (count($gallery_ids) >= 1) {
        $first = $gallery_ids[0];
        $last = (count($gallery_ids) >= 5) ? end($gallery_ids) : ((count($gallery_ids) > 1) ? end($gallery_ids) : $first);
        
        if (count($gallery_ids) >= 5) {
            $gallery_ids[1] = $new_ids[0];
            $gallery_ids[2] = $new_ids[1];
            $gallery_ids[3] = $new_ids[2];
        } else {
            $gallery_ids = array($first, $new_ids[0], $new_ids[1], $new_ids[2], $last);
        }
        
        echo "<p>New Gallery IDs: [" . implode(', ', $gallery_ids) . "]</p>";
        
        // Update postmeta
        update_post_meta($post->ID, '_product_image_gallery', implode(',', $gallery_ids));
        update_post_meta($post->ID, 'product_gallery', $gallery_ids);
    } else {
        echo "<p>Skipping... no existing images in gallery to replace.</p>";
    }
}

echo "<h2>Done!</h2>";
echo "<p>You can now delete this script from your server for security.</p>";
