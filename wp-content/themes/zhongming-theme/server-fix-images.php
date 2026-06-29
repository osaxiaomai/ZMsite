<?php
/**
 * Script to fix Standard Indoor products on any environment.
 * It resolves the required images by filename instead of hardcoded IDs.
 * Auto-imports missing images from the theme folder.
 */
$wp_load_path = dirname(dirname(dirname(__DIR__))) . '/wp-load.php';
require_once $wp_load_path;

require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

$is_cli = (php_sapi_name() === 'cli');
if (!$is_cli && (!isset($_GET['secret']) || $_GET['secret'] !== 'zm2026')) {
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

// Helper to auto-import an image from the theme folder
function zm_auto_import_image( $theme_filepath, $title ) {
    $full_path = get_template_directory() . '/' . ltrim($theme_filepath, '/');
    if ( ! file_exists( $full_path ) ) {
        return 0;
    }
    
    $upload_dir = wp_upload_dir();
    $filename = basename( $full_path );
    if ( wp_mkdir_p( $upload_dir['path'] ) ) {
        $file = $upload_dir['path'] . '/' . $filename;
    } else {
        $file = $upload_dir['basedir'] . '/' . $filename;
    }
    
    // Copy file to uploads folder
    copy( $full_path, $file );
    
    $wp_filetype = wp_check_filetype( $filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title'     => sanitize_file_name( $filename ),
        'post_content'   => '',
        'post_status'    => 'inherit'
    );
    
    $attach_id = wp_insert_attachment( $attachment, $file );
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    wp_update_attachment_metadata( $attach_id, $attach_data );
    
    return $attach_id;
}

echo "<h2>Resolving Images...</h2>";

// 1. Grey Cabinet (already exists on server hopefully, if not we can't do much)
$img_grey_cabinet = zm_get_attachment_id_by_filename('2-4.jpg');
echo "Grey Cabinet (2-4.jpg): " . ($img_grey_cabinet ? "Found ID $img_grey_cabinet" : "<b style='color:red;'>Missing!</b>") . "\n";

// 2. The 3 new screens - check by the new filenames first
$img_gradient = zm_get_attachment_id_by_filename('gradient.jpg');
if (!$img_gradient) {
    // Try old name
    $img_gradient = zm_get_attachment_id_by_filename('media__1782660549059.jpg');
}
if (!$img_gradient) {
    echo "Gradient missing, importing...\n";
    $img_gradient = zm_auto_import_image('assets/images/product-screens/gradient.jpg', 'Gradient Screen');
}
echo "Gradient: " . ($img_gradient ? "Found ID $img_gradient" : "<b style='color:red;'>Failed to import!</b>") . "\n";

$img_lake = zm_get_attachment_id_by_filename('lake.jpg');
if (!$img_lake) {
    $img_lake = zm_get_attachment_id_by_filename('media__1782660565233.jpg');
}
if (!$img_lake) {
    echo "Lake missing, importing...\n";
    $img_lake = zm_auto_import_image('assets/images/product-screens/lake.jpg', 'Lake Screen');
}
echo "Lake: " . ($img_lake ? "Found ID $img_lake" : "<b style='color:red;'>Failed to import!</b>") . "\n";


$img_iridescent = zm_get_attachment_id_by_filename('iridescent.jpg');
if (!$img_iridescent) {
    $img_iridescent = zm_get_attachment_id_by_filename('media__1782660576944.jpg');
}
if (!$img_iridescent) {
    echo "Iridescent missing, importing...\n";
    $img_iridescent = zm_auto_import_image('assets/images/product-screens/iridescent.jpg', 'Iridescent Screen');
}
echo "Iridescent: " . ($img_iridescent ? "Found ID $img_iridescent" : "<b style='color:red;'>Failed to import!</b>") . "\n";

$img_ui_screen = zm_get_attachment_id_by_filename('01_indoor_standard_product_05.jpeg');

if (!$img_grey_cabinet || !$img_gradient || !$img_lake || !$img_iridescent) {
    die("<h3>Error: Some images are still missing.</h3>");
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
    
    if (stripos($post->post_title, 'Standard Indoor') !== false) {
        $is_standard_indoor = true;
    }
    if (strpos($post->post_title, '标准') !== false && strpos($post->post_title, '室内') !== false) {
        $is_standard_indoor = true;
    }
    
    if (!$is_standard_indoor) {
        continue;
    }
    
    echo "<h4>Processing: " . esc_html($post->post_title) . "</h4>\n";
    
    update_post_meta($post->ID, '_product_image_gallery', implode(',', $ideal_gallery));
    if (function_exists('update_field')) {
        update_field('product_gallery', $ideal_gallery, $post->ID);
    } else {
        update_post_meta($post->ID, 'product_gallery', $ideal_gallery);
    }
    
    $new_thumb = $img_grey_cabinet;
    if (stripos($post->post_title, 'P1.8') !== false && $img_ui_screen) {
        $new_thumb = $img_ui_screen;
    }
    
    set_post_thumbnail($post->ID, $new_thumb);
}

echo "<h3>Done! Server DB updated.</h3>";
