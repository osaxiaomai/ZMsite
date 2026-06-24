<?php
/**
 * Import Film_1.jpg and Film_2.jpg and assign to Film Screen products
 * Run with: wp eval-file 07_import_film.php --skip-wordpress-scripts
 */

if (!defined('ABSPATH')) {
    require_once(dirname(__FILE__) . '/../wp-load.php');
}
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');

$upload_dir = wp_upload_dir();
$month_dir = $upload_dir['basedir'] . '/2026/06';

if (!file_exists($month_dir)) {
    wp_mkdir_p($month_dir);
}

// Ensure the files are available (OpenClaw will put them in /data/zmsite/)
$f1_source = dirname(ABSPATH) . '/Film_1.jpg';
$f2_source = dirname(ABSPATH) . '/Film_2.jpg';
$f1_dest = $month_dir . '/Film_1.jpg';
$f2_dest = $month_dir . '/Film_2.jpg';

if (file_exists($f1_source) && !file_exists($f1_dest)) {
    copy($f1_source, $f1_dest);
}
if (file_exists($f2_source) && !file_exists($f2_dest)) {
    copy($f2_source, $f2_dest);
}

function insert_attachment($filename) {
    global $wpdb;
    $title = pathinfo($filename, PATHINFO_FILENAME);
    $existing = $wpdb->get_var($wpdb->prepare("SELECT ID FROM {$wpdb->posts} WHERE post_title = %s AND post_type = 'attachment'", $title));
    if ($existing) return $existing;

    $filetype = wp_check_filetype(basename($filename), null);
    $attachment = array(
        'guid'           => wp_upload_dir()['url'] . '/' . basename($filename), 
        'post_mime_type' => $filetype['type'],
        'post_title'     => preg_replace('/\.[^.]+$/', '', basename($filename)),
        'post_content'   => '',
        'post_status'    => 'inherit'
    );
    $attach_id = wp_insert_attachment($attachment, $filename);
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata($attach_id, $filename);
    wp_update_attachment_metadata($attach_id, $attach_data);
    return $attach_id;
}

$f1_id = insert_attachment($f1_dest);
$f2_id = insert_attachment($f2_dest);

echo "Film_1 ID: $f1_id\n";
echo "Film_2 ID: $f2_id\n";

$film_products = [437, 438, 439, 440, 441, 442, 443, 444, 795, 796, 797, 798, 799, 800, 801, 802];

// Get the old thumbnail ID (assuming product 437 still has it before we run this)
$old_id = get_post_meta(437, '_thumbnail_id', true);

foreach ($film_products as $index => $pid) {
    if (!get_post($pid)) continue;

    $main_id = ($index % 2 === 0) ? $f1_id : $f2_id;
    $gallery_add_id = ($index % 2 === 0) ? $f2_id : $f1_id;

    update_post_meta($pid, '_thumbnail_id', $main_id);
    
    $gallery = get_post_meta($pid, '_product_image_gallery', true);
    if ($gallery) {
        $gallery_arr = explode(',', $gallery);
        // Remove old black pedestal image if it exists
        if ($old_id) {
            $gallery_arr = array_diff($gallery_arr, [$old_id]);
        }
        $gallery_arr = array_diff($gallery_arr, [$f1_id, $f2_id]);
        array_unshift($gallery_arr, $gallery_add_id);
        $new_gallery = implode(',', $gallery_arr);
    } else {
        $new_gallery = $gallery_add_id;
    }
    update_post_meta($pid, '_product_image_gallery', $new_gallery);
    
    // Also update ACF product_gallery if it exists
    $acf_gallery = get_post_meta($pid, 'product_gallery', true);
    if ($acf_gallery && is_array($acf_gallery)) {
        if ($old_id) $acf_gallery = array_diff($acf_gallery, [$old_id]);
        $acf_gallery = array_diff($acf_gallery, [$f1_id, $f2_id]);
        array_unshift($acf_gallery, $gallery_add_id);
        update_post_meta($pid, 'product_gallery', $acf_gallery);
    } elseif (is_string($acf_gallery)) {
        $acf_arr = @unserialize($acf_gallery);
        if (is_array($acf_arr)) {
            if ($old_id) $acf_arr = array_diff($acf_arr, [$old_id]);
            $acf_arr = array_diff($acf_arr, [$f1_id, $f2_id]);
            array_unshift($acf_arr, $gallery_add_id);
            update_post_meta($pid, 'product_gallery', $acf_arr);
        }
    }
}

echo "Successfully updated Film Screen products.\n";
