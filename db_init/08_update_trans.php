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
    $term = term_exists($name, 'product_category', $parent_id);
    if ($term !== 0 && $term !== null) {
        return $term['term_id'];
    }
    $result = wp_insert_term($name, 'product_category', array(
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
    wp_set_object_terms($pid, [(int)$parent_cat, (int)$cat_id], 'product_category', false);
    
    // Instead of overriding everything, append the new 4 images to their ORIGINAL gallery
    
    // First, find the original images (they have these specific names in the media library)
    $orig_717 = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type = 'attachment'", '06_transparent_screen_product_03-1'));
    $orig_718 = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type = 'attachment'", '06_transparent_screen_product_01-2'));
    $orig_719 = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type = 'attachment'", '06_transparent_screen_product_04-1'));
    
    // Map of product ID to its intended [thumbnail_id, [gallery_ids]]
    $orig_mapping = [
        430 => [$orig_719, [$orig_717, $orig_718]],
        431 => [$orig_717, [$orig_719, $orig_718]],
        432 => [$orig_719, [$orig_717, $orig_718]],
        433 => [$orig_717, [$orig_719, $orig_718]],
        434 => [$orig_719, [$orig_717, $orig_718]],
        435 => [$orig_717, [$orig_719, $orig_718]],
        436 => [$orig_719, [$orig_717, $orig_718]],
        788 => [$orig_719, [$orig_717, $orig_718]],
        789 => [$orig_717, [$orig_719, $orig_718]],
        790 => [$orig_719, [$orig_717, $orig_718]],
        791 => [$orig_717, [$orig_719, $orig_718]],
        792 => [$orig_719, [$orig_717, $orig_718]],
        793 => [$orig_717, [$orig_719, $orig_718]],
        794 => [$orig_719, [$orig_717, $orig_718]],
    ];
    
    if (isset($orig_mapping[$pid])) {
        $thumb_id = $orig_mapping[$pid][0];
        $orig_gallery = $orig_mapping[$pid][1];
        
        // Append the new images (Trans_1, Trans_2, Trans_3, Trans_4)
        $final_gallery = array_merge($orig_gallery, $image_ids);
        
        // 1. Restore Thumbnail
        if ($thumb_id) {
            set_post_thumbnail($pid, $thumb_id);
        }
        
        // 2. Set WooCommerce Gallery
        update_post_meta($pid, '_product_image_gallery', implode(',', $final_gallery));
        
        // 3. Set ACF Gallery (required by single-product.php)
        update_post_meta($pid, 'product_gallery', $final_gallery);
        if (function_exists('update_field')) {
            update_field('product_gallery', $final_gallery, $pid);
        }
    }
}

// 4. Recount terms so the new categories show up in the frontend sidebar widget!
global $wpdb;
$wpdb->query("UPDATE {$wpdb->term_taxonomy} tt SET count = (SELECT COUNT(DISTINCT tr.object_id) FROM {$wpdb->term_relationships} tr WHERE tr.term_taxonomy_id = tt.term_taxonomy_id) WHERE taxonomy='product_category'");

delete_option("product_category_children");
clean_term_cache(array(), 'product_category');
wp_cache_flush();

echo "Successfully categorized transparent screen products, replaced images, and recounted terms.\n";
