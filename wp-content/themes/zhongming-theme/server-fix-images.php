<?php
/**
 * Script to fix Standard Indoor products on any environment.
 * It resolves the required images by filename instead of hardcoded IDs.
 */
$wp_load_path = dirname(dirname(dirname(__DIR__))) . '/wp-load.php';
require_once $wp_load_path;

if (!isset($_GET['secret']) || $_GET['secret'] !== 'zm2026') {
    die("Invalid secret key.");
}

// Helper to find attachment ID by filename
function zm_get_attachment_id_by_filename( $filename ) {
    global $wpdb;
    $query = $wpdb->prepare(
        "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_wp_attached_file' AND meta_value LIKE %s LIMIT 1",
        '%' . $wpdb->esc_like($filename)
    );
    $id = $wpdb->get_var($query);
    return $id ? (int) $id : 0;
}

// Find required images
$img_grey_cabinet = zm_get_attachment_id_by_filename('2-4.jpg');
$img_gradient = zm_get_attachment_id_by_filename('media__1782660549059.jpg');
$img_lake = zm_get_attachment_id_by_filename('media__1782660565233.jpg');
$img_iridescent = zm_get_attachment_id_by_filename('media__1782660576944.jpg');
$img_ui_screen = zm_get_attachment_id_by_filename('01_indoor_standard_product_05.jpeg');

echo "<h2>Resolving Images...</h2>";
echo "Grey Cabinet (2-4.jpg): " . ($img_grey_cabinet ? "Found ID $img_grey_cabinet" : "<b style='color:red;'>Missing!</b>") . "<br>";
echo "Gradient: " . ($img_gradient ? "Found ID $img_gradient" : "<b style='color:red;'>Missing!</b>") . "<br>";
echo "Lake: " . ($img_lake ? "Found ID $img_lake" : "<b style='color:red;'>Missing!</b>") . "<br>";
echo "Iridescent: " . ($img_iridescent ? "Found ID $img_iridescent" : "<b style='color:red;'>Missing!</b>") . "<br>";

if (!$img_grey_cabinet || !$img_gradient || !$img_lake || !$img_iridescent) {
    die("<h3>Error: Some images are missing in the Media Library. Please upload them first.</h3>");
}

$ideal_gallery = array($img_grey_cabinet, $img_gradient, $img_lake, $img_iridescent);

echo "<h2>Fixing Products...</h2>";

$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'lang' => '', // Bypass Polylang filtering
);
$query = new WP_Query($args);

foreach ($query->posts as $post) {
    $is_standard_indoor = false;
    
    // Check if it's standard indoor (English or Chinese)
    if (stripos($post->post_title, 'Standard Indoor') !== false) {
        $is_standard_indoor = true;
    }
    // Check Chinese titles like "标准" and "室内"
    if (strpos($post->post_title, '标准') !== false && strpos($post->post_title, '室内') !== false) {
        $is_standard_indoor = true;
    }
    
    if (!$is_standard_indoor) {
        continue;
    }
    
    echo "<h4>Processing: " . esc_html($post->post_title) . "</h4>";
    
    // 1. Force the correct gallery
    update_post_meta($post->ID, '_product_image_gallery', implode(',', $ideal_gallery));
    if (function_exists('update_field')) {
        update_field('product_gallery', $ideal_gallery, $post->ID);
    } else {
        update_post_meta($post->ID, 'product_gallery', $ideal_gallery);
    }
    echo "Gallery restored to: [" . implode(', ', $ideal_gallery) . "]<br>";
    
    // 2. Set the correct thumbnail
    $new_thumb = $img_grey_cabinet;
    if (stripos($post->post_title, 'P1.8') !== false && $img_ui_screen) {
        $new_thumb = $img_ui_screen; // UI screen for P1.8
    }
    
    set_post_thumbnail($post->ID, $new_thumb);
    echo "Thumbnail set to $new_thumb.<br>";
}

echo "<h3>Done! Server DB updated.</h3>";
