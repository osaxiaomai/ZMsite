<?php
// Find wp-load.php
$wp_load = null;
$paths = [
    __DIR__ . '/../app/public/wp-load.php', // Local structure
    '/var/www/html/wp-load.php',            // Typical server structure
    '/var/www/html/app/public/wp-load.php',
    __DIR__ . '/../wp-load.php'
];
foreach ($paths as $path) {
    if (file_exists($path)) {
        $wp_load = $path;
        break;
    }
}
if (!$wp_load) {
    die("Cannot find wp-load.php\n");
}
require_once $wp_load;
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

function insert_attachment($file_path) {
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($file_path);
    $filename = basename($file_path);
    
    // Create unique filename to avoid overwrites
    $filename = wp_unique_filename($upload_dir['path'], $filename);
    $upload_file = file_put_contents($upload_dir['path'] . '/' . $filename, $image_data);
    $file = $upload_dir['path'] . '/' . $filename;
    
    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file );
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    wp_update_attachment_metadata( $attach_id, $attach_data );
    return $attach_id;
}

$p1_path = __DIR__ . '/../P1.jpg';
$p2_path = __DIR__ . '/../P2.jpg';

if (!file_exists($p1_path) || !file_exists($p2_path)) {
    die("P1.jpg or P2.jpg not found in parent directory. Looking for: " . $p1_path . "\n");
}

echo "Importing P1 and P2...\n";
$p1_id = insert_attachment($p1_path);
$p2_id = insert_attachment($p2_path);

echo "P1 ID: $p1_id, P2 ID: $p2_id\n";

$product_ids = [416, 417, 418, 419, 420, 421, 422, 774, 775, 776, 777, 778, 779, 780];

foreach ($product_ids as $index => $pid) {
    // Check if post exists
    if (!get_post($pid)) continue;

    // Alternate P1 and P2 based on index parity
    $main_id = ($index % 2 === 0) ? $p1_id : $p2_id;
    $gallery_add_id = ($index % 2 === 0) ? $p2_id : $p1_id;

    // Set featured image
    update_post_meta($pid, '_thumbnail_id', $main_id);
    
    // Prepend the other image to gallery
    $gallery = get_post_meta($pid, '_product_image_gallery', true);
    if ($gallery) {
        $gallery_arr = explode(',', $gallery);
        // Remove both if they exist to prevent duplicates
        $gallery_arr = array_diff($gallery_arr, [$p1_id, $p2_id]);
        array_unshift($gallery_arr, $gallery_add_id);
        $new_gallery = implode(',', $gallery_arr);
    } else {
        $new_gallery = $gallery_add_id;
    }
    update_post_meta($pid, '_product_image_gallery', $new_gallery);
    
    // Also update ACF product_gallery if it exists
    $acf_gallery = get_post_meta($pid, 'product_gallery', true);
    if ($acf_gallery && is_array($acf_gallery)) {
        $acf_gallery = array_diff($acf_gallery, [$p1_id, $p2_id]);
        array_unshift($acf_gallery, $gallery_add_id);
        update_post_meta($pid, 'product_gallery', $acf_gallery);
    } elseif (is_string($acf_gallery)) {
        $acf_arr = @unserialize($acf_gallery);
        if (is_array($acf_arr)) {
            $acf_arr = array_diff($acf_arr, [$p1_id, $p2_id]);
            array_unshift($acf_arr, $gallery_add_id);
            update_post_meta($pid, 'product_gallery', $acf_arr);
        }
    }
}
echo "Products updated successfully!\n";
