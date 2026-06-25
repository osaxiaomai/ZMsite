<?php
/**
 * Add 4 transparent screen images and categorize transparent screens
 * Run with: wp eval-file 08_update_trans.php --skip-wordpress-scripts
 */

if (!defined('ABSPATH')) {
    require_once(dirname(__FILE__) . '/../wp-load.php');
}
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');

$upload_dir = wp_upload_dir();
$month_dir = $upload_dir['basedir'] . '/2026/06';
if (!file_exists($month_dir)) { wp_mkdir_p($month_dir); }

$images = ['Trans_1.png', 'Trans_2.png', 'Trans_3.png', 'Trans_4.png'];
$image_ids = [];

foreach ($images as $img) {
    $source = dirname(ABSPATH) . '/' . $img;
    $dest = $month_dir . '/' . $img;
    if (file_exists($source) && !file_exists($dest)) {
        copy($source, $dest);
    }
    
    // Insert attachment
    global $wpdb;
    $title = pathinfo($img, PATHINFO_FILENAME);
    $existing = $wpdb->get_var($wpdb->prepare("SELECT ID FROM {$wpdb->posts} WHERE post_title = %s AND post_type = 'attachment'", $title));
    
    if ($existing) {
        $image_ids[] = $existing;
    } else {
        $filetype = wp_check_filetype(basename($dest), null);
        $attachment = array(
            'guid'           => wp_upload_dir()['url'] . '/' . basename($dest), 
            'post_mime_type' => $filetype['type'],
            'post_title'     => preg_replace('/\.[^.]+$/', '', basename($dest)),
            'post_content'   => '',
            'post_status'    => 'inherit'
        );
        $attach_id = wp_insert_attachment($attachment, $dest);
        $attach_data = wp_generate_attachment_metadata($attach_id, $dest);
        wp_update_attachment_metadata($attach_id, $attach_data);
        $image_ids[] = $attach_id;
    }
}

echo "Image IDs: " . implode(', ', $image_ids) . "\n";

// 2. Create Categories
function create_cat($name, $slug, $parent_id) {
    $term = term_exists($name, 'product_cat', $parent_id);
    if ($term !== 0 && $term !== null) {
        return $term['term_id'];
    }
    $result = wp_insert_term($name, 'product_cat', array(
        'slug' => $slug,
        'parent' => $parent_id
    ));
    if (is_wp_error($result)) {
        echo "Error creating $name: " . $result->get_error_message() . "\n";
        return 0;
    }
    return $result['term_id'];
}

$parent_en = 11; // Transparent Screen
$parent_zh = 123; // LED透明屏

$indoor_en_id = create_cat('Indoor Transparent Screen', 'indoor-transparent-screen', $parent_en);
$outdoor_en_id = create_cat('Outdoor Transparent Screen', 'outdoor-transparent-screen', $parent_en);

$indoor_zh_id = create_cat('室内透明屏', 'indoor-transparent-screen-zh', $parent_zh);
$outdoor_zh_id = create_cat('室外透明屏', 'outdoor-transparent-screen-zh', $parent_zh);

// 3. Update products
$products = [
    // Indoor English
    430 => $indoor_en_id, 431 => $indoor_en_id, 433 => $indoor_en_id, 434 => $indoor_en_id,
    // Outdoor English
    432 => $outdoor_en_id, 435 => $outdoor_en_id, 436 => $outdoor_en_id,
    // Indoor Chinese
    788 => $indoor_zh_id, 789 => $indoor_zh_id, 791 => $indoor_zh_id, 792 => $indoor_zh_id,
    // Outdoor Chinese
    790 => $outdoor_zh_id, 793 => $outdoor_zh_id, 794 => $outdoor_zh_id
];

foreach ($products as $pid => $cat_id) {
    if (!get_post($pid)) continue;
    
    // Assign category
    // We add the new category, but keep the parent category to be safe
    $parent_cat = ($cat_id == $indoor_en_id || $cat_id == $outdoor_en_id) ? $parent_en : $parent_zh;
    wp_set_object_terms($pid, [(int)$parent_cat, (int)$cat_id], 'product_cat', false);
    
    // Set thumbnail to Trans_1
    set_post_thumbnail($pid, $image_ids[0]);
    
    // Set gallery to Trans_2, Trans_3, Trans_4 (completely replacing any flowers or poster screens)
    $gallery_str = $image_ids[1] . ',' . $image_ids[2] . ',' . $image_ids[3];
    update_post_meta($pid, '_product_image_gallery', $gallery_str);
    
    // Remove ACF gallery to avoid conflicts
    delete_post_meta($pid, 'product_gallery');
}

// 4. Recount terms so the new categories show up in the frontend sidebar widget!
_wc_term_recount(
    get_terms( 'product_cat', array( 'hide_empty' => false, 'fields' => 'ids' ) ),
    get_taxonomy( 'product_cat' ),
    true,
    false
);
delete_transient( 'wc_term_counts' );

echo "Successfully categorized transparent screen products, replaced images, and recounted terms.\n";
