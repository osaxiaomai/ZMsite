<?php
/**
 * Remove the incorrect P8 module image from Stage Rental products
 * Run with: wp eval-file 09_remove_p8_module.php --skip-wordpress-scripts
 */

if (!defined('ABSPATH')) {
    require_once(dirname(__FILE__) . '/../wp-load.php');
}

global $wpdb;

// The incorrect image is ROMA-FRONT (which is actually a P8 module)
$bad_image_id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM {$wpdb->posts} WHERE post_title = %s AND post_type = 'attachment'", 'ROMA-FRONT'));

if ($bad_image_id) {
    // 1. Remove from all galleries
    $results = $wpdb->get_results("SELECT post_id, meta_value FROM {$wpdb->postmeta} WHERE meta_key = '_product_image_gallery' AND meta_value LIKE '%$bad_image_id%'");

    foreach ($results as $row) {
        $pid = $row->post_id;
        $gallery_str = $row->meta_value;
        
        $gallery_arr = explode(',', $gallery_str);
        $gallery_arr = array_filter($gallery_arr, function($id) use ($bad_image_id) {
            return trim($id) != $bad_image_id;
        });
        
        update_post_meta($pid, '_product_image_gallery', implode(',', $gallery_arr));
        update_post_meta($pid, 'product_gallery', array_values($gallery_arr));
        if (function_exists('update_field')) {
            update_field('product_gallery', array_values($gallery_arr), $pid);
        }
        
        echo "Removed image $bad_image_id from gallery of product $pid\n";
    }

    // 2. If it is used as a main thumbnail, replace it with the first image in its gallery
    $results = $wpdb->get_results("SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_thumbnail_id' AND meta_value = '$bad_image_id'");
    foreach ($results as $row) {
        $pid = $row->post_id;
        $gallery_str = get_post_meta($pid, '_product_image_gallery', true);
        if ($gallery_str) {
            $gallery_arr = explode(',', $gallery_str);
            if (!empty($gallery_arr)) {
                $new_thumb = $gallery_arr[0];
                set_post_thumbnail($pid, $new_thumb);
                
                // Remove the new thumb from the gallery so it's not duplicated
                array_shift($gallery_arr);
                update_post_meta($pid, '_product_image_gallery', implode(',', $gallery_arr));
                update_post_meta($pid, 'product_gallery', array_values($gallery_arr));
                if (function_exists('update_field')) {
                    update_field('product_gallery', array_values($gallery_arr), $pid);
                }
                echo "Replaced main thumbnail for product $pid with image $new_thumb\n";
            }
        }
    }
    
    // Clean cache
    wp_cache_flush();
    echo "Done processing image removal.\n";
} else {
    echo "Image 'ROMA-FRONT' not found.\n";
}
