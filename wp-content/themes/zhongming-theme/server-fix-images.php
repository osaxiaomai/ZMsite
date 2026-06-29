<?php
/**
 * Script to fix Standard Indoor products on any environment.
 * Auto-imports missing images from the theme folder.
 * Now supports ALTERNATING main images across different products.
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

function zm_get_attachment_id_by_filename( $filename ) {
    global $wpdb;
    $query = $wpdb->prepare(
        "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_wp_attached_file' AND meta_value LIKE %s LIMIT 1",
        '%' . $wpdb->esc_like($filename)
    );
    $id = $wpdb->get_var($query);
    return $id ? (int) $id : 0;
}

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

$img_grey_cabinet = zm_get_attachment_id_by_filename('2-4.jpg');
echo "Grey Cabinet: " . ($img_grey_cabinet ? "Found ID $img_grey_cabinet" : "Missing!") . "\n";

$img_ui_screen = zm_get_attachment_id_by_filename('01_indoor_standard_product_05.jpeg');
if (!$img_ui_screen) {
    $img_ui_screen = zm_get_attachment_id_by_filename('1.jpg'); // Try old name
}
echo "UI Screen: " . ($img_ui_screen ? "Found ID $img_ui_screen" : "Missing!") . "\n";

$img_gradient = zm_get_attachment_id_by_filename('gradient.jpg');
if (!$img_gradient) $img_gradient = zm_get_attachment_id_by_filename('media__1782660549059.jpg');
if (!$img_gradient) {
    $img_gradient = zm_auto_import_image('assets/images/product-screens/gradient.jpg', 'Gradient Screen');
}
echo "Gradient: " . ($img_gradient ? "Found ID $img_gradient" : "Failed!") . "\n";

$img_lake = zm_get_attachment_id_by_filename('lake.jpg');
if (!$img_lake) $img_lake = zm_get_attachment_id_by_filename('media__1782660565233.jpg');
if (!$img_lake) {
    $img_lake = zm_auto_import_image('assets/images/product-screens/lake.jpg', 'Lake Screen');
}
echo "Lake: " . ($img_lake ? "Found ID $img_lake" : "Failed!") . "\n";

$img_iridescent = zm_get_attachment_id_by_filename('iridescent.jpg');
if (!$img_iridescent) $img_iridescent = zm_get_attachment_id_by_filename('media__1782660576944.jpg');
if (!$img_iridescent) {
    $img_iridescent = zm_auto_import_image('assets/images/product-screens/iridescent.jpg', 'Iridescent Screen');
}
echo "Iridescent: " . ($img_iridescent ? "Found ID $img_iridescent" : "Failed!") . "\n";


if (!$img_grey_cabinet || !$img_gradient || !$img_lake || !$img_iridescent) {
    die("<h3>Error: Some essential images are still missing.</h3>");
}

// Full pool of images
$image_pool = array();
if ($img_ui_screen) $image_pool[] = $img_ui_screen;
$image_pool[] = $img_grey_cabinet;
$image_pool[] = $img_gradient;
$image_pool[] = $img_lake;
$image_pool[] = $img_iridescent;

echo "<h2>Fixing Products with Alternating Thumbnails...</h2>";

$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'lang' => '', // Bypass Polylang filtering
    'orderby' => 'ID',
    'order' => 'ASC',
);
$query = new WP_Query($args);

// Group products by language to ensure rotation looks good in both EN and ZH
$zh_products = array();
$en_products = array();

foreach ($query->posts as $post) {
    $is_standard_indoor = false;
    $is_zh = false;
    
    if (strpos($post->post_title, '标准') !== false && strpos($post->post_title, '室内') !== false) {
        $is_standard_indoor = true;
        $is_zh = true;
    } elseif (stripos($post->post_title, 'Standard Indoor') !== false) {
        $is_standard_indoor = true;
    }
    
    if ($is_standard_indoor) {
        if ($is_zh) {
            $zh_products[] = $post;
        } else {
            $en_products[] = $post;
        }
    }
}

function update_product_images($products, $pool) {
    $pool_size = count($pool);
    $idx = 0;
    
    foreach ($products as $post) {
        // Pick an image from the pool sequentially
        $main_img = $pool[$idx % $pool_size];
        
        // Build gallery: Main image first, then the rest of the pool
        $gallery = array($main_img);
        foreach ($pool as $img) {
            if ($img !== $main_img) {
                $gallery[] = $img;
            }
        }
        
        echo "<h4>Processing: " . esc_html($post->post_title) . "</h4>\n";
        
        // 1. Update gallery
        update_post_meta($post->ID, '_product_image_gallery', implode(',', $gallery));
        if (function_exists('update_field')) {
            update_field('product_gallery', $gallery, $post->ID);
        } else {
            update_post_meta($post->ID, 'product_gallery', $gallery);
        }
        
        // 2. Set thumbnail
        set_post_thumbnail($post->ID, $main_img);
        
        echo "Thumbnail set to ID $main_img. Gallery: [" . implode(', ', $gallery) . "]<br>\n";
        $idx++;
    }
}

echo "<h3>Updating Chinese Products...</h3>";
update_product_images($zh_products, $image_pool);

echo "<h3>Updating English Products...</h3>";
update_product_images($en_products, $image_pool);

echo "<h3>Done! Server DB updated with alternating images.</h3>";
