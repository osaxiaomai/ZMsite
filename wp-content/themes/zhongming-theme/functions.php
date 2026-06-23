<?php
/**
 * Zhongming Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// 1. Theme Setup
function zhongming_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'zhongming' ),
        'footer_menu'  => __( 'Footer Menu', 'zhongming' ),
    ) );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
}
add_action( 'after_setup_theme', 'zhongming_setup' );

// 2. Enqueue Assets
function zhongming_scripts() {
    wp_enqueue_style( 'zhongming-main-css', get_template_directory_uri() . '/assets/css/main.css', array(), '1.5.1' );
    wp_enqueue_style( 'zhongming-style', get_stylesheet_uri(), array(), '1.5.1' );
    wp_enqueue_style( 'zhongming-components', get_template_directory_uri() . '/assets/css/components.css', array(), '1.5.1' );
    wp_enqueue_style( 'zhongming-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.5.1' );
    wp_enqueue_script( 'zhongming-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.5.1', true );
    wp_enqueue_script( 'zhongming-mega-menu', get_template_directory_uri() . '/assets/js/mega-menu.js', array(), '1.5.1', true );
}
add_action( 'wp_enqueue_scripts', 'zhongming_scripts' );

// 3. Mega Menu Walker Placeholder
class Zhongming_Mega_Menu_Walker extends Walker_Nav_Menu {
    // Basic walker logic if needed later
}

// 3. Custom Post Types & Taxonomies
function zhongming_register_cpt_taxonomy() {
    // Product Category Taxonomy
    $taxonomy_labels = array(
        'name'              => _x( 'Product Categories', 'taxonomy general name', 'zhongming' ),
        'singular_name'     => _x( 'Product Category', 'taxonomy singular name', 'zhongming' ),
        'search_items'      => __( 'Search Product Categories', 'zhongming' ),
        'all_items'         => __( 'All Product Categories', 'zhongming' ),
        'parent_item'       => __( 'Parent Product Category', 'zhongming' ),
        'parent_item_colon' => __( 'Parent Product Category:', 'zhongming' ),
        'edit_item'         => __( 'Edit Product Category', 'zhongming' ),
        'update_item'       => __( 'Update Product Category', 'zhongming' ),
        'add_new_item'      => __( 'Add New Product Category', 'zhongming' ),
        'new_item_name'     => __( 'New Product Category Name', 'zhongming' ),
        'menu_name'         => __( 'Categories', 'zhongming' ),
    );

    register_taxonomy( 'product_category', array( 'product' ), array(
        'hierarchical'      => true,
        'labels'            => $taxonomy_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product-category' ),
        'show_in_rest'      => true,
    ) );

    // Pixel Pitch Taxonomy
    $pitch_labels = array(
        'name'              => _x( 'Pixel Pitch', 'taxonomy general name', 'zhongming' ),
        'singular_name'     => _x( 'Pixel Pitch', 'taxonomy singular name', 'zhongming' ),
        'search_items'      => __( 'Search Pixel Pitch', 'zhongming' ),
        'all_items'         => __( 'All Pixel Pitch', 'zhongming' ),
        'edit_item'         => __( 'Edit Pixel Pitch', 'zhongming' ),
        'update_item'       => __( 'Update Pixel Pitch', 'zhongming' ),
        'add_new_item'      => __( 'Add New Pixel Pitch', 'zhongming' ),
        'new_item_name'     => __( 'New Pixel Pitch Name', 'zhongming' ),
        'menu_name'         => __( 'Pixel Pitch', 'zhongming' ),
    );

    register_taxonomy( 'pixel_pitch_tax', array( 'product' ), array(
        'hierarchical'      => true,
        'labels'            => $pitch_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'pixel-pitch' ),
        'show_in_rest'      => true,
    ) );

    // Product CPT
    $product_labels = array(
        'name'               => _x( 'Products', 'post type general name', 'zhongming' ),
        'singular_name'      => _x( 'Product', 'post type singular name', 'zhongming' ),
        'menu_name'          => _x( 'Products', 'admin menu', 'zhongming' ),
        'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'zhongming' ),
        'add_new'            => _x( 'Add New', 'product', 'zhongming' ),
        'add_new_item'       => __( 'Add New Product', 'zhongming' ),
        'new_item'           => __( 'New Product', 'zhongming' ),
        'edit_item'          => __( 'Edit Product', 'zhongming' ),
        'view_item'          => __( 'View Product', 'zhongming' ),
        'all_items'          => __( 'All Products', 'zhongming' ),
        'search_items'       => __( 'Search Products', 'zhongming' ),
        'not_found'          => __( 'No products found.', 'zhongming' ),
        'not_found_in_trash' => __( 'No products found in Trash.', 'zhongming' ),
    );

    $product_args = array(
        'labels'             => $product_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'products' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-products',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'product', $product_args );
}
add_action( 'init', 'zhongming_register_cpt_taxonomy' );

// 4. ACF Options Page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// 5. ACF JSON Support
add_filter('acf/settings/save_json', 'zhongming_acf_json_save_point');
function zhongming_acf_json_save_point( $path ) {
    $path = get_template_directory() . '/acf-json';
    return $path;
}

add_filter('acf/settings/load_json', 'zhongming_acf_json_load_point');
function zhongming_acf_json_load_point( $paths ) {
    unset($paths[0]);
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
}

// 5. Flush rewrite rules on theme activation
function zhongming_flush_rewrite_rules() {
    zhongming_register_cpt_taxonomy();
    zhongming_custom_rewrite_rules();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'zhongming_flush_rewrite_rules' );

// 6. Custom Template Routing for /templates/ subfolder
function zhongming_custom_templates( $template ) {
    if ( is_post_type_archive( 'product' ) || is_tax( 'product_category' ) || is_tax( 'pixel_pitch_tax' ) ) {
        $new_template = get_template_directory() . '/templates/archive-product.php';
        if ( file_exists( $new_template ) ) {
            return $new_template;
        }
    }
    if ( is_singular( 'product' ) ) {
        $new_template = get_template_directory() . '/templates/single-product.php';
        if ( file_exists( $new_template ) ) {
            return $new_template;
        }
    }
    if ( is_page( array( 'about', 'about-us', 'about-zh', 'about-us-zh' ) ) ) {
        $new_template = get_template_directory() . '/templates/page-about.php';
        if ( file_exists( $new_template ) ) {
            return $new_template;
        }
    }
    if ( is_page( array( 'contact', 'contact-us', 'contact-zh', 'contact-us-zh' ) ) ) {
        $new_template = get_template_directory() . '/templates/page-contact.php';
        if ( file_exists( $new_template ) ) {
            return $new_template;
        }
    }
    if ( is_page( array( 'solutions', 'solutions-applications', 'solutions-zh', 'solutions-applications-zh' ) ) ) {
        $new_template = get_template_directory() . '/templates/page-solutions.php';
        if ( file_exists( $new_template ) ) {
            return $new_template;
        }
    }
    if ( is_page( array( 'eventandnews', 'eventandnews-zh', 'news', 'news-zh' ) ) ) {
        $new_template = get_template_directory() . '/templates/page-eventandnews.php';
        if ( file_exists( $new_template ) ) {
            return $new_template;
        }
    }
    if ( is_page( array( 'privacy-policy', 'privacy-policy-zh' ) ) ) {
        $new_template = get_template_directory() . '/templates/page-privacy-policy.php';
        if ( file_exists( $new_template ) ) {
            return $new_template;
        }
    }
    if ( is_page( array( 'terms-of-service', 'terms-of-service-zh' ) ) ) {
        $new_template = get_template_directory() . '/templates/page-terms-of-service.php';
        if ( file_exists( $new_template ) ) {
            return $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'zhongming_custom_templates' );

// 7. Custom Rewrite Rules for Category URL mapping /products/category/...
function zhongming_custom_rewrite_rules() {
    add_rewrite_rule(
        '^products/category/([^/]+)/?',
        'index.php?product_category=$matches[1]',
        'top'
    );
}
add_action( 'init', 'zhongming_custom_rewrite_rules' );

// 8. Intercept Product Archive Main Query via pre_get_posts Hook
function zhongming_modify_product_archive_query( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if ( is_post_type_archive( 'product' ) || is_tax( 'product_category' ) || is_tax( 'pixel_pitch_tax' ) ) {
        // Set posts per page to 12
        $query->set( 'posts_per_page', 12 );

        // Tax Query array
        $tax_query = array( 'relation' => 'AND' );

        // 1. Pixel Pitch Filter (?pitch=P1.2,P1.5)
        if ( ! empty( $_GET['pitch'] ) ) {
            $pitches = explode( ',', sanitize_text_field( $_GET['pitch'] ) );
            $tax_query[] = array(
                'taxonomy' => 'pixel_pitch_tax',
                'field'    => 'slug',
                'terms'    => $pitches,
                'operator' => 'IN',
            );
        }

        // Add tax_query if we added anything
        if ( count( $tax_query ) > 1 ) {
            $query->set( 'tax_query', $tax_query );
        }

        // 2. Application Filter (?app=conference,broadcast)
        if ( ! empty( $_GET['app'] ) ) {
            $apps = explode( ',', sanitize_text_field( $_GET['app'] ) );
            $meta_query = array( 'relation' => 'OR' );
            foreach ( $apps as $app ) {
                $meta_query[] = array(
                    'key'     => 'applications',
                    'value'   => '"' . sanitize_text_field( $app ) . '"',
                    'compare' => 'LIKE',
                );
            }
            $query->set( 'meta_query', $meta_query );
        }

        // 3. Sorting (?orderby=...)
        if ( ! empty( $_GET['orderby'] ) ) {
            $orderby = sanitize_text_field( $_GET['orderby'] );
            switch ( $orderby ) {
                case 'title_asc':
                    $query->set( 'orderby', 'title' );
                    $query->set( 'order', 'ASC' );
                    break;
                case 'title_desc':
                    $query->set( 'orderby', 'title' );
                    $query->set( 'order', 'DESC' );
                    break;
                case 'pitch_asc':
                    $query->set( 'meta_key', 'pixel_pitch_mm' );
                    $query->set( 'orderby', 'meta_value_num' );
                    $query->set( 'order', 'ASC' );
                    break;
                case 'pitch_desc':
                    $query->set( 'meta_key', 'pixel_pitch_mm' );
                    $query->set( 'orderby', 'meta_value_num' );
                    $query->set( 'order', 'DESC' );
                    break;
                case 'date_desc':
                default:
                    $query->set( 'orderby', 'date' );
                    $query->set( 'order', 'DESC' );
                    break;
            }
        }
    }
}
add_action( 'pre_get_posts', 'zhongming_modify_product_archive_query' );

// 9. Auto-create About & Contact pages if missing (runs once and caches with option)
function zhongming_auto_create_pages() {
    if ( get_option( 'zhongming_pages_created' ) ) {
        return;
    }
    
    // Check About Us page
    $about_page = get_page_by_path( 'about' );
    if ( ! $about_page ) {
        $about_page = get_page_by_path( 'about-us' );
    }
    if ( ! $about_page ) {
        wp_insert_post( array(
            'post_title'   => 'About Us',
            'post_name'    => 'about',
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => 'Professional LED display manufacturer.',
        ) );
    }

    // Check Contact page
    $contact_page = get_page_by_path( 'contact' );
    if ( ! $contact_page ) {
        $contact_page = get_page_by_path( 'contact-us' );
    }
    if ( ! $contact_page ) {
        wp_insert_post( array(
            'post_title'   => 'Contact',
            'post_name'    => 'contact',
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => 'Get a Free Quote or Technical Consultation.',
        ) );
    }

    // Check Solutions page
    $solutions_page = get_page_by_path( 'solutions' );
    if ( ! $solutions_page ) {
        wp_insert_post( array(
            'post_title'   => 'Solutions',
            'post_name'    => 'solutions',
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => 'LED Display Solutions for Every Scenario.',
        ) );
    }
    
    update_option( 'zhongming_pages_created', 1 );
}
add_action( 'init', 'zhongming_auto_create_pages' );

// 10. Add columns to product post list in admin (Featured Image & Gallery Images before Title)
function zhongming_set_product_columns($columns) {
    $new_columns = [];
    foreach ($columns as $key => $value) {
        if ($key === 'title') {
            $new_columns['featured_image_thumb'] = __( '主图/特色图', 'zhongming' );
            $new_columns['gallery_images_thumb'] = __( '产品多图', 'zhongming' );
        }
        $new_columns[$key] = $value;
    }
    return $new_columns;
}
add_filter( 'manage_product_posts_columns', 'zhongming_set_product_columns' );

// Render custom columns content in admin
function zhongming_custom_product_column( $column, $post_id ) {
    if ( $column === 'featured_image_thumb' ) {
        if ( has_post_thumbnail( $post_id ) ) {
            $thumb_id = get_post_thumbnail_id( $post_id );
            $thumb_url = wp_get_attachment_image_url( $thumb_id, 'full' );
            $img_html = get_the_post_thumbnail( $post_id, array( 60, 60 ), array( 'style' => 'max-width: 60px; max-height: 60px; height: auto; border: 1px solid #ccc; padding: 2px; border-radius: 4px; display: block;' ) );
            if ( $img_html ) {
                echo '<a href="' . esc_url( $thumb_url ) . '" target="_blank" title="点击查看原图" style="display: inline-block;">' . $img_html . '</a>';
            } else {
                echo '<span style="color: #bbb; font-size: 11px;">无主图</span>';
            }
        } else {
            echo '<span style="color: #bbb; font-size: 11px;">无主图</span>';
        }
    }
    
    if ( $column === 'gallery_images_thumb' ) {
        $gallery = get_field( 'product_gallery', $post_id );
        if ( empty( $gallery ) ) {
            $gallery = get_post_meta( $post_id, 'product_gallery', true );
        }
        if ( ! empty( $gallery ) && ( is_array( $gallery ) || is_serialized( $gallery ) || is_string( $gallery ) ) ) {
            if ( is_string( $gallery ) && is_serialized( $gallery ) ) {
                $gallery = maybe_unserialize( $gallery );
            }
            if ( is_string( $gallery ) ) {
                $gallery = explode( ',', $gallery );
            }
            
            if ( is_array( $gallery ) ) {
                echo '<div style="display: flex; flex-wrap: wrap; gap: 6px; align-items: center; max-width: 320px;">';
                $count = 0;
                foreach ( $gallery as $item ) {
                    $img_id = 0;
                    if ( is_numeric( $item ) ) {
                        $img_id = (int)$item;
                    } elseif ( is_array( $item ) && isset( $item['ID'] ) ) {
                        $img_id = (int)$item['ID'];
                    } elseif ( is_object( $item ) && isset( $item->ID ) ) {
                        $img_id = (int)$item->ID;
                    }
                    
                    if ( $img_id ) {
                        $img_url = wp_get_attachment_image_url( $img_id, 'full' );
                        $thumb_url = wp_get_attachment_image_url( $img_id, array( 60, 60 ) );
                        if ( $thumb_url ) {
                            echo '<a href="' . esc_url( $img_url ) . '" target="_blank" title="点击查看原图" style="display: inline-block; vertical-align: middle;">';
                            echo '<img src="' . esc_url( $thumb_url ) . '" style="width: 50px; height: 50px; object-fit: cover; border: 1px solid #ddd; padding: 1px; border-radius: 3px; display: block;" />';
                            echo '</a>';
                            $count++;
                        }
                    } else if ( is_string( $item ) && filter_var($item, FILTER_VALIDATE_URL) ) {
                        echo '<a href="' . esc_url( $item ) . '" target="_blank" style="display: inline-block; vertical-align: middle;">';
                        echo '<img src="' . esc_url( $item ) . '" style="width: 50px; height: 50px; object-fit: cover; border: 1px solid #ddd; padding: 1px; border-radius: 3px; display: block;" />';
                        echo '</a>';
                        $count++;
                    }
                }
                echo '</div>';
                if ($count === 0) {
                    echo '<span style="color: #bbb; font-size: 11px;">无多图</span>';
                }
            } else {
                echo '<span style="color: #bbb; font-size: 11px;">无多图</span>';
            }
        } else {
            echo '<span style="color: #bbb; font-size: 11px;">无多图</span>';
        }
    }
}
add_action( 'manage_product_posts_custom_column' , 'zhongming_custom_product_column', 10, 2 );

// Set columns layout widths and micro-animations
function zhongming_admin_columns_css() {
    global $typenow;
    if ( $typenow === 'product' ) {
        echo '<style type="text/css">';
        echo '.column-featured_image_thumb { width: 90px; text-align: center; }';
        echo '.column-gallery_images_thumb { min-width: 140px; max-width: 380px; }';
        echo '.column-featured_image_thumb a, .column-gallery_images_thumb a { transition: transform 0.15s ease-in-out, box-shadow 0.15s ease-in-out; display: inline-block; }';
        echo '.column-featured_image_thumb a:hover, .column-gallery_images_thumb a:hover { transform: scale(1.15); box-shadow: 0 4px 12px rgba(0,0,0,0.2); z-index: 10; position: relative; }';
        echo '</style>';
    }
}
add_action( 'admin_head', 'zhongming_admin_columns_css' );

/**
 * Get the dynamic permalink of the Contact page using the page template.
 * Falls back to standard slugs or the root home_url.
 */
function zhongming_get_contact_url() {
    $pages = get_pages( array(
        'meta_key'   => '_wp_page_template',
        'meta_value' => 'templates/page-contact.php',
        'number'     => 1,
    ) );
    if ( ! empty( $pages ) ) {
        return get_permalink( $pages[0]->ID );
    }
    
    $contact_page = get_page_by_path( 'contact' );
    if ( ! $contact_page ) {
        $contact_page = get_page_by_path( 'contact-us' );
    }
    if ( $contact_page ) {
        return get_permalink( $contact_page->ID );
    }
    
    return home_url( '/contact/' );
}

/**
 * Intercept parse_request to prevent WooCommerce/CPT 'product' conflict on pages.
 * If 'product' parameter is appended to page or archive URLs, WordPress interprets it
 * as a single CPT product query, causing 404 errors. We unset 'product' from query_vars
 * if the request is not a single product page rewrite.
 */
function zhongming_fix_product_query_conflict( $wp ) {
    if ( isset( $wp->query_vars['product'] ) ) {
        // If the matched rule is not a single product route, unset it
        if ( empty( $wp->matched_rule ) || strpos( $wp->matched_rule, 'products/([^/]+)' ) !== 0 ) {
            $_GET['product_title'] = $wp->query_vars['product'];
            unset( $wp->query_vars['product'] );
        }
    }
}
add_action( 'parse_request', 'zhongming_fix_product_query_conflict' );

/**
 * 12. Multilingual Translations Hook and Inline Helpers
 */
function zm_is_zh() {
    if ( function_exists('pll_current_language') ) {
        $lang = pll_current_language();
        return in_array( $lang, array( 'zh', 'zh-cn', 'zh-CN', 'cn' ) );
    }
    return false;
}

function zm_is_valid_spec( $val ) {
    if ( empty( $val ) ) {
        return false;
    }
    $val_str = trim( (string)$val );
    $invalid_vals = array( '—', '-', '不支持', '无', '没有', 'n/a', 'none', 'not supported', 'na', 'not-supported', 'not_supported' );
    if ( in_array( strtolower( $val_str ), $invalid_vals ) ) {
        return false;
    }
    return true;
}


function zm_t( $en_text, $zh_text ) {
    if ( zm_is_zh() ) {
        return $zh_text;
    }
    return $en_text;
}

function zm_te( $en_text, $zh_text ) {
    echo zm_t( $en_text, $zh_text );
}

/**
 * Translate spec values dynamically based on current language
 */
function zm_translate_spec_val( $val ) {
    if ( empty( $val ) || $val === '—' || $val === '-' ) {
        return zm_is_zh() ? '定制' : 'Custom';
    }
    $val_str = (string)$val;
    if ( strtolower( trim( $val_str ) ) === 'custom' ) {
        return zm_is_zh() ? '定制' : 'Custom';
    }
    if ( strtolower( trim( $val_str ) ) === 'custom size' ) {
        return zm_is_zh() ? '定制尺寸' : 'Custom Size';
    }
    
    if ( zm_is_zh() ) {
        $replacements = array(
            'Custom' => '定制',
            'custom' => '定制',
            'Custom size' => '定制尺寸',
            'Custom Size' => '定制尺寸',
            'custom size' => '定制尺寸',
            'Front' => '前维护',
            'Back' => '后维护',
            'Front & Back' => '前/后维护',
            'Front/Back' => '前/后维护',
            'Front maintenance' => '前维护',
            'Back maintenance' => '后维护',
            'IP50 Protection' => 'IP50防护等级',
            'IP65 Protection' => 'IP65防护等级',
            'Hanging Installation' => '吊装',
            'Inlaid / Recessed Installation' => '嵌入式安装',
            'Wall-mounted Installation' => '壁挂式安装',
            'Floor-standing Installation' => '落地式安装',
            'Conference Room' => '会议室/会议厅',
            'Broadcast Studio' => '广播电视/演播室',
            'Security & Control' => '安防监控/控制室',
            'Commercial Billboard' => '商业广告看板',
            'Exhibition & Showroom' => '展览展示/展厅',
            'Retail Window & Mall' => '零售橱窗/商场',
            'Stage & Events Rental' => '舞台租赁/活动',
            'Tourism & Culture Display' => '文旅创意显示',
            'Hotel & Lobby Screen' => '酒店大堂/宴会厅',
            'Shopping Center Atrium' => '购物中心中庭',
            // Maintenance access types
            'Rear access' => '后维护',
            'Front access' => '前维护',
            'Front/Rear access' => '前/后维护',
            'Top access' => '上方维护',
            'N/A' => '不适用',
            // LED Technologies
            'SMD' => 'SMD 表贴',
            'COB' => 'COB 集成封装',
            'GOB' => 'GOB 正装封装',
            'Flex PCB' => '柔性 PCB',
            'LED Strip' => 'LED 灯条',
        );
        if ( isset( $replacements[$val_str] ) ) {
            return $replacements[$val_str];
        }
        
        if ( stripos($val_str, 'custom') !== false ) {
            return '定制';
        }
        
        if ( stripos($val_str, 'Protection') !== false ) {
            return str_ireplace('Protection', '防护等级', $val_str);
        }
    }
    return $val;
}

add_filter( 'gettext', 'zhongming_theme_translations', 20, 3 );
function zhongming_theme_translations( $translated_text, $text, $domain ) {
    if ( $domain === 'zhongming' ) {
        if ( zm_is_zh() ) {
            $translations = array(
                // Menu & Header
                'Home' => '首页',
                'Products' => '产品中心',
                'Solutions' => '解决方案',
                'About Us' => '关于我们',
                'Contact' => '联系我们',
                'Get a Quote' => '获取报价',
                'ALL CATEGORIES' => '所有分类',
                'Search products...' => '搜索产品...',
                'Company' => '公司介绍',
                'Product Center' => '产品中心',
                'Events & News' => '动态与新闻',
                'Indoor LED' => '室内 LED',
                'Outdoor LED' => '户外 LED',
                'Special & Creative' => '创意/异形 LED',
                
                // Categories
                'Standard Indoor' => '室内标准屏',
                'COB Series' => 'COB 系列',
                '16:9 Indoor' => '16:9 室内屏',
                'Standard Outdoor' => '户外标准屏',
                'Rental Screen' => '舞台租赁屏',
                'Indoor Rental' => '室内租赁屏',
                'Outdoor Rental' => '户外租赁屏',
                'Panel Series' => '面板显示屏',
                'Transparent Screen' => 'LED透明屏',
                'Film Screen' => 'LED 贴膜屏',
                'Floor Tile Screen' => '智能地砖屏',
                'Flexible LED' => 'LED 软模组',
                'Customized / XR' => '定制化/XR虚拟拍摄',
                'Photoelectric Glass' => '光电玻璃屏',
                'Customized / XR' => '定制化 / XR',
                'Customized XR' => '定制化 XR',

                // Footer
                'Contact Us' => '联系我们',
                'Email' => '邮箱',
                'Phone/WhatsApp' => '联系电话/微信',
                'Address' => '地址',
                "Huafeng Zhenbao Industrial Park, No. 137 Beihuan Road, Shiyan Street, Bao'an District, Shenzhen, China" => '中国深圳市宝安区石岩街道北环路137号华丰圳宝工业园',
                'Privacy Policy' => '隐私政策',
                'Terms of Service' => '服务条款',
                
                // About Us Page (page-about.php)
                'Shenzhen Zhongming Technology Co., Ltd.' => '深圳市中茗光电科技有限公司',
                'Professional LED display manufacturer based in Bao\'an District, Shenzhen. Established with a focus on R&D-driven quality — from fine-pitch indoor panels to large-format outdoor billboards and immersive creative installations.' => '位于深圳市宝安区的高端专业 LED 显示屏制造商。坚持以研发和品质为导向——涵盖室内超微间距屏、户外高亮大屏以及沉浸式创意展示系统。',
                'Company Overview' => '公司简介',
                'Who we are and what we do' => '了解我们的企业实力与核心业务',
                'Zhongming Technology is a comprehensive technology enterprise integrating LED display system R&D, production, and sales. The company maintains strong technical capabilities with excellent production and testing facilities.' => '中茗光电是一家集 LED 显示屏系统研发、生产、销售于一体的综合性技术企业。公司拥有强大的技术实力和先进的生产及检测设备。',
                'We adhere to "continuous optimization from the customer\'s perspective" — providing reliable CQTS (Cost, Quality, Time, Service) across all our products. Each product goes through R&D, design validation, quality testing, material selection, trial production, and full-run QC before shipment.' => '我们坚持“站在客户的角度持续优化”的理念——为客户提供最具竞争力的 CQTS（成本、质量、交期、服务）。每一款产品从研发立项、设计验证、品质测试、材料采购、试产到出货都经过严格的品质检测和老化测试。',
                'Our LED displays have been successfully deployed in the USA, Mexico, Russia, Saudi Arabia, Kuwait, Iran, Egypt, France, Australia, Japan, India, South Korea, Taiwan, and 30+ other countries and regions.' => '我们的 LED 显示屏产品已被广泛应用在美国、墨西哥、俄罗斯、沙特、科威特、伊朗、埃及、法国、澳大利亚、日本、印度、韩国、中国台湾等 30 多个国家和地区。',
                'Company at a Glance' => '企业概况',
                'Zhongming LED at a glance' => '快速了解中茗光电',
                'Key statistics of our manufacturing capability' => '我们制造能力的核心数据',
                'Countries & Regions' => '出口国家与地区',
                'Product Lifespan' => '产品设计寿命',
                'Quality Test Types' => '品质检测分类',
                'Custom Service Available' => '支持 OEM/ODM 定制',
                'Certifications & Honors' => '资质荣誉与认证',
                'International conformity checks & production credentials' => '国际合规检测与生产认证',
                'CE Certification' => 'CE 认证',
                'European Conformity' => '欧盟 CE 认证',
                'RoHS Compliant' => 'RoHS 环保合规',
                'Hazardous substances restriction' => 'RoHS 环保指令',
                'FCC Certification' => 'FCC 认证',
                'US market standards' => '美国 FCC 认证',
                'EMC Tested' => 'EMC 电磁兼容测试',
                'Electromagnetic compatibility' => '电磁兼容性认证',
                'Quality Management System' => '质量管理体系',
                '* Certificate images are available as high-resolution scans upon partner request.' => '* 合作伙伴如需高分辨率证书扫描件，可联系我们提供。',
                'Quality Assurance' => '品质保证体系',
                '100+ testing categories conducted before every single shipment' => '出厂前经 100+ 项严苛检测分类',
                'Environmental Testing' => '环境适应测试',
                'Thermal shock · High-temperature aging · Low-temperature storage · Humidity cycling · Salt spray corrosion validation.' => '冷热冲击测试 · 高温老化测试 · 低温存储测试 · 双85温湿度循环测试 · 盐雾防腐蚀验证。',
                'Electrical Testing' => '电气安全检测',
                'Current impact spike tests · Power ON/OFF cycling · ESD protection testing · Electromagnetic compatibility (EMC) check · LED bead high voltage aging.' => '电流冲击测试 · 开关机循环测试 · 防静电（ESD）测试 · 电磁兼容性（EMC）检查 · 灯珠高压老化测试。',
                'Display Performance' => '显示性能检测',
                'Luminance consistency scanning · Chroma calibration · Refresh rate validation · Multi-angle viewing quality control · Grayscale accuracy validation.' => '亮度一致性扫描 · 逐点色度校正 · 刷新率稳定性验证 · 多视角显示品质评估 · 灰阶准确性及平滑度校准。',
                'Global Markets' => '全球市场布局',
                'Export footprint and international client distribution' => '出口足迹与国际客户分布',
                'Our high-performance LED displays have been exported to 30+ countries and regions across North America, Europe, the Middle East, Southeast Asia, and Oceania.' => '我们的高性能 LED 显示屏已远销北美、欧洲、中东、东南亚和大洋洲 of 30 多个国家和地区。',
                '+ 17 more' => '+ 17 更多',
                'Ready to Partner with Zhongming Technology?' => '准备好与中茗光电合作了吗？',
                'Tell us your display requirements — size, pixel pitch, installation environment — and our engineering team will provide a tailored quote and layout drawing within 24 hours.' => '将您的显示屏需求（如屏幕尺寸、像素间距、安装环境 等）告知我们，我们的工程技术团队将在 24 小时内为您提供定制方案和效果排版图。',
                'Get a Free Quote →' => '获取免费报价 →',
                'Browse All Products' => '浏览全系列产品',
                
                // Contact Page (page-contact.php)
                'Get a Free Quote or Technical Consultation' => '获取免费报价或技术咨询',
                'Tell us your project requirements — display size, pixel pitch, installation environment, and intended use — and our team will respond with a tailored proposal within 24 hours.' => '告诉我们您的项目需求（如屏体尺寸、像素间距、安装环境及应用场景），我们的专业团队将在 24 小时内为您提供定制化方案及报价。',
                'Inquiry Form' => '在线询盘表单',

                // Product Archive (archive-product.php)
                'All Products' => '所有产品',
                'Discover our full range of professional LED display solutions, including standard indoor, fine pitch COB, standard outdoor, and creative custom displays.' => '探索我们的全系列专业 LED 显示屏解决方案，包括室内标准屏、超微间距 COB、户外标准屏以及定制创意异形显示系统。',
                'Explore our advanced %s series designed for ultimate performance and stability.' => '探索专为卓越性能与高稳定性设计的 %s 系列产品。',
                'Filter Products ▾' => '筛选产品 ▾',
                'Show More (+)' => '展开更多 (+)',
                'Show Less (-)' => '收起 (-)',
                'Sort by:' => '排序方式:',
                'Default Order' => '默认排序',
                'Product Name (A-Z)' => '产品名称 (A-Z)',
                'Product Name (Z-A)' => '产品名称 (Z-A)',
                'Pixel Pitch (Finer First)' => '像素间距 (细距优先)',
                'Pixel Pitch (Coarser First)' => '像素间距 (粗距优先)',
                'products found' => '件产品',
                'Pixel Pitch:' => '像素间距:',
                'Cabinet Size:' => '箱体尺寸:',
                'Brightness:' => '屏幕亮度:',
                'Viewing Distance:' => '最佳视距:',
                'View Details' => '查看详情',
                'Get Quote' => '获取报价',
                'No Products Found' => '未找到产品',
                'No products match your active filtering combination. Try clearing some filters to expand your search.' => '没有符合当前筛选条件的产品。请尝试重置筛选条件。',
                'Reset Filters' => '重置筛选',
                'Clear All' => '清除全部',

                // Single Product (single-product.php)
                'Indoor' => '室内',
                'Outdoor' => '户外',
                'Special' => '创意',
                'Rental' => '租赁',
                'Pixel Pitch' => '像素间距',
                'Cabinet Size' => '箱体尺寸',
                'Brightness' => '屏幕亮度',
                'Refresh Rate' => '刷新率',
                'Resolution' => '分辨率',
                'Lifespan' => '使用寿命',
                'Request a Quote →' => '获取报价 →',
                'Datasheet PDF' => '技术规格书 PDF',
                'Specifications' => '技术参数',
                'Details' => '产品详情',
                'Key Features' => '核心特性',
                'Installation' => '安装方式',
                'Applications' => '应用场景',
                'Series Models' => '同系列型号',
                'Technical Specifications Table' => '技术参数表',
                'Parameter' => '参数',
                'Value / Details' => '数值 / 详情',
                'Product Series' => '产品系列',
                'Product Model' => '产品型号',
                'Pixel Pitch (mm)' => '像素间距 (mm)',
                'LED Splicing Technology' => 'LED 封装/拼接技术',
                'Panel/Module Size (mm)' => '模组尺寸 (mm)',
                'Panel/Module Resolution' => '模组分辨率',
                'Pixel Density (dots/m²)' => '像素密度 (点/m²)',
                'Cabinet Dimensions' => '箱体尺寸',
                'Cabinet Weight (kg)' => '箱体重量 (kg)',
                'Brightness Rating' => '屏幕亮度',
                'Refresh Rate (Hz)' => '刷新率 (Hz)',
                'Grayscale (bit)' => '灰度等级 (bit)',
                'Horizontal Viewing Angle' => '水平视角',
                'Vertical Viewing Angle' => '垂直视角',
                'Color Temperature (K)' => '色彩温度 (K)',
                'Optimal Viewing Distance' => '最佳视距',
                'Ingress Protection (IP)' => '防护等级 (IP)',
                'Maintenance Access Type' => '维护方式',
                'Max Power Consumption (W/m²)' => '最大功耗 (W/m²)',
                'Average Power Consumption (W/m²)' => '平均功耗 (W/m²)',
                'Operating Temperature Range' => '工作温度范围',
                'Working Humidity Level' => '工作湿度等级',
                'Diode Operational Lifespan' => '灯珠使用寿命',
                'Detailed specifications will be updated soon.' => '详细规格参数即将更新。',
                'Discover %1$s LED screen. Pixel pitch: %2$smm. Cabinet size: %3$s. Premium quality, highly stable B2B LED display solution by Zhongming Technology.' => '探索 %1$s LED 显示屏。像素间距：%2$smm，箱体尺寸：%3$s。由中茗光电为您提供品质卓越、稳定可靠的专业级 LED 显示屏解决方案。',
                
                // Single Product Tab Headers & Compare table
                'Model / Product Name' => '产品型号/名称',
                'IP Protection' => 'IP 防护等级',
                'Actions' => '操作',
                'Current' => '当前型号',
                'Compare' => '对比详情',
                'COMPARE' => '对比详情',
                'Related LED Screens' => '相关产品推荐',
                'Dynamic Application Fields' => '主要应用领域',
                'Compare Series Siblings' => '同系列型号对比',
                'Outstanding Product Features' => '核心产品特性',
                
                // Installation Methods
                'Hanging Installation' => '吊装',
                'Suspended from ceilings using dedicated rigging beams. Ideal for stage rental, events, and shopping malls.' => '使用专用吊梁悬挂在天花板上。非常适合舞台租赁、活动和商场。',
                'Inlaid / Recessed Installation' => '嵌入式安装',
                'Embedded directly into a wall recess. Saves space and delivers a seamless, clean architectural integration.' => '直接嵌入墙体凹槽中。节省空间，提供无缝、整洁的建筑融合。',
                'Wall-mounted Installation' => '壁挂式安装',
                'Mounted flat against solid walls with back frames. Highly popular for corporate lobbies and conference screens.' => '通过后架平贴在实心墙壁上。非常适用于企业大堂和会议屏幕。',
                'Floor-standing Installation' => '落地式安装',
                'Supported by base frames standing directly on the floor. Perfect for exhibitions and creative display structures.' => '通过直接立在地板上的底架支撑。非常适合展览和创意展示结构。',
                
                // Application scenarios
                'Conference Room' => '会议室/会议厅',
                'Broadcast Studio' => '广播电视/演播室',
                'Security & Control' => '安防监控/控制室',
                'Commercial Billboard' => '商业广告看板',
                'Exhibition & Showroom' => '展览展示/展厅',
                'Retail Window & Mall' => '零售橱窗/商场',
                'Stage & Events Rental' => '舞台租赁/活动',
                'Tourism & Culture Display' => '文旅创意显示',
                'Hotel & Lobby Screen' => '酒店大堂/宴会厅',
                'Shopping Center Atrium' => '购物中心中庭',

                // Archive Product Page additional strings
                'Categories' => '产品分类',
                'Toggle Submenu' => '展开子菜单',
                'Hide Filters ▲' => '收起筛选 ▲',
                'No Image Available' => '暂无图片',
                'Cabinet Resolution' => '箱体分辨率',
                'Brightness' => '亮度',

                // Events & News Page
                'Company Updates & Industry Insights' => '公司动态与行业洞察',
                'Stay informed with the latest news on Zhongming LED product launches, global exhibitions, technical guides, and case studies.' => '了解中茗光电最新产品发布、全球展会、技术指南及案例分享。',
                'Read More' => '阅读更多',
                'No news posts found.' => '暂无新闻。',

                // Pagination
                '← Prev' => '← 上一页',
                'Next →' => '下一页 →',

                // Archive fallback app labels
                'Indoor/Outdoor Advertising' => '室内外广告',
                'Exhibition' => '展览',
                'Retail Window' => '零售橱窗',
                'Stage & Events' => '舞台活动',
                'Tourism & Culture' => '文旅创意',
                'Hotel & Restaurant' => '酒店餐饮',
                'Shopping Mall' => '购物中心',

                // Solutions page
                'Solutions Overview' => '解决方案概览',
                'Learn More' => '了解更多',
                'View Products →' => '查看产品 →',

                // General misc
                'Creative Screens' => '创意屏',
                'Series' => '系列',
                'Customized' => '定制化',
                
                // Installation Methods status and details
                'Recommended' => '推荐',
                'Unsupported' => '不支持',
                'Recommended Installation Methods' => '推荐安装方式',
                'Seamless Splicing' => '无缝拼接',
                'Precision-machined structures ensure perfectly aligned gaps and seamless screen surfaces for premium imagery.' => '高精度机械结构，确保拼装缝隙完美对齐，呈现无缝连贯的优质画面。',
                'Super High Contrast' => '超高对比度',
                'Excellent black LED mask integration delivers ultra-deep blacks and vibrant brightness levels for dynamic pictures.' => '优质黑色面罩整合设计，提供深邃 of 暗部表现与鲜艳的亮度水平，画面更具动感。',
                'Broad Viewing Angle' => '超宽视角',
                'Up to 160 degree viewing angles without brightness degradation or color distortion in multi-perspective displays.' => '提供高达 160 度的宽广视角，多方位观看均无亮度衰减或色彩失真现象。',
            );
            if ( isset( $translations[$text] ) ) {
                return $translations[$text];
            }
        }
    }
    return $translated_text;
}

/**
 * Get category link bilingually, bypassing Polylang term filters during DB query
 */
function zm_category_link( $slug ) {
    global $wpdb;
    $term_id = $wpdb->get_var( $wpdb->prepare( "
        SELECT t.term_id 
        FROM {$wpdb->terms} t
        INNER JOIN {$wpdb->term_taxonomy} tt ON t.term_id = tt.term_id
        WHERE t.slug = %s AND tt.taxonomy = 'product_category'
        LIMIT 1
    ", $slug ) );
    
    if ( $term_id ) {
        if ( function_exists('pll_get_term') ) {
            $translated_id = pll_get_term( $term_id );
            if ( $translated_id ) {
                $term_id = $translated_id;
            }
        }
        $link = get_term_link( (int)$term_id, 'product_category' );
        if ( ! is_wp_error( $link ) ) {
            return $link;
        }
    }
    return '#';
}

/**
 * Get product archive link bilingually
 */
function zm_product_archive_link() {
    if ( zm_is_zh() ) {
        return home_url( '/zh/products/' );
    }
    return home_url( '/products/' );
}

/**
 * Dynamically translate Contact Form 7 form labels and placeholders for Chinese visitors
 */
function zhongming_translate_cf7_form( $html ) {
    if ( zm_is_zh() ) {
        // Split into HTML tags and text chunks to safely translate only text nodes and submit button values
        $html = preg_replace_callback( '/(<[^>]+>|[^<]+)/', function( $matches ) {
            $part = $matches[1];
            if ( strpos( $part, '<' ) === 0 ) {
                // This is an HTML tag. Only replace submit values inside submit inputs.
                if ( (stripos( $part, 'type="submit"' ) !== false || stripos( $part, "type='submit'" ) !== false) ||
                     (stripos( $part, 'class="wpcf7-submit"' ) !== false) ) {
                    $part = str_ireplace( 'value="Submit"', 'value="提交"', $part );
                    $part = str_ireplace( "value='Submit'", "value='提交'", $part );
                    $part = str_ireplace( 'value="Send"', 'value="发送"', $part );
                    $part = str_ireplace( "value='Send'", "value='发送'", $part );
                    $part = str_ireplace( 'value="Send Inquiry"', 'value="发送询盘"', $part );
                    $part = str_ireplace( "value='Send Inquiry'", "value='发送询盘'", $part );
                }
                return $part;
            } else {
                // This is text content outside of HTML tags. Perform translations.
                $replacements = array(
                    'Your Name (required)' => '您的姓名 (必填)',
                    'Your Name' => '您的姓名',
                    'Your Email (required)' => '您的邮箱 (必填)',
                    'Your Email' => '电子邮箱',
                    'Subject' => '主题',
                    'Your Message (optional)' => '您的留言（可选）',
                    'Your Message' => '您的留言',
                    'Submit' => '提交',
                    'Send Inquiry' => '发送询盘',
                    'Send' => '发送',
                    'Company Name' => '公司名称',
                    'Product Interest' => '感兴趣的产品',
                    'Display Size / Project Description' => '显示屏尺寸 / 项目需求描述',
                    'Attach Files (optional)' => '添加附件 (可选)',
                    'Attach Files' => '添加附件',
                    'Click to attach' => '点击上传图纸',
                    'Click to attach drawings, specs, or photos (PDF, JPG, max 10MB)' => '点击上传图纸、规格说明或照片（支持 PDF、JPG 格式，最大 10MB）',
                    'e.g. "Indoor conference room, approx 4m×2m, need P1.5 or similar, to be installed next quarter"' => '例如：室内会议室，面积约 4米×2米，需要 P1.5 或类似间距，预计下季度安装...',
                );
                foreach ( $replacements as $en => $zh ) {
                    $part = str_ireplace( $en, $zh, $part );
                }
                return $part;
            }
        }, $html );
    }
    return $html;
}
add_filter( 'wpcf7_form_elements', 'zhongming_translate_cf7_form' );

/**
 * Dynamically translate English segments in product post titles for Chinese visitors
 */
function zm_translate_product_title( $title, $id = null ) {
    if ( zm_is_zh() ) {
        if ( $id && get_post_type( $id ) === 'product' ) {
            $replacements = array(
                'Indoor LED Display' => '室内 LED 显示屏',
                'Outdoor LED Display' => '户外 LED 显示屏',
                'Indoor LED Screen' => '室内 LED 显示屏',
                'Outdoor LED Screen' => '户外 LED 显示屏',
                'Rental LED Screen' => '舞台租赁屏',
                'Transparent LED Screen' => '玻璃格栅屏',
                'Film Screen' => '贴膜屏',
                'Flexible LED Module' => '柔性软模组',
                'Photoelectric Glass' => '光电玻璃屏',
                'Glass Wall' => '玻璃幕墙',
                'Immersive Solution' => '沉浸式解决方案',
                'Virtual Production' => '虚拟拍摄',
                'Immersive Studio' => '沉浸式演播室',
                'Floor Tile LED Screen' => '智能地砖屏',
                'Creative Shaped Screen' => '创意异形屏',
                'LED Display' => 'LED 显示屏',
                'LED Screen' => 'LED 显示屏',
                'Indoor' => '室内',
                'Outdoor' => '户外',
                'Rental' => '租赁',
                'Creative' => '创意'
            );
            foreach ( $replacements as $en => $zh ) {
                $title = str_ireplace( $en, $zh, $title );
            }
        }
    }
    return $title;
}
add_filter( 'the_title', 'zm_translate_product_title', 10, 2 );

// ============================================================
// PHASE 6: PERFORMANCE OPTIMIZATIONS
// ============================================================

/**
 * 6.1 Remove unnecessary WP default scripts for performance
 */
function zhongming_remove_default_scripts() {
    // Remove emoji detection script, CSS, and DNS prefetch
    remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles',     'print_emoji_styles' );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles',  'print_emoji_styles' );
    remove_filter( 'the_content_feed',    'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss',    'wp_staticize_emoji' );
    remove_filter( 'wp_mail',            'wp_staticize_emoji_for_email' );
    remove_action( 'wp_head',             'rsd_link' );
    remove_action( 'wp_head',             'wlwmanifest_link' );
    remove_action( 'wp_head',             'wp_shortlink_wp_head' );
    remove_action( 'wp_head',             'adjacent_posts_rel_link_wp_head', 10 );
    remove_action( 'wp_head',             'wp_generator' );

    // Remove wp-embed.min.js
    wp_deregister_script( 'wp-embed' );
}
add_action( 'init', 'zhongming_remove_default_scripts' );

/**
 * 6.2 Disable XML-RPC interface (security hardening)
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * 6.3 Add loading="lazy" attribute to all img tags for performance
 */
function zhongming_add_lazy_load_to_images( $content ) {
    if ( is_admin() ) {
        return $content;
    }
    // Only add if not already present
    $content = preg_replace_callback(
        '/<img([^>]*)>/i',
        function( $matches ) {
            $attrs = $matches[1];
            if ( strpos( $attrs, 'loading=' ) === false ) {
                $attrs .= ' loading="lazy"';
            }
            return '<img' . $attrs . '>';
        },
        $content
    );
    return $content;
}
add_filter( 'the_content',         'zhongming_add_lazy_load_to_images' );
add_filter( 'post_thumbnail_html', 'zhongming_add_lazy_load_to_images' );
add_filter( 'get_avatar',          'zhongming_add_lazy_load_to_images' );

/**
 * 6.4 Register WebP MIME type support for product images
 */
function zhongming_add_webp_support( $mimes ) {
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter( 'upload_mimes', 'zhongming_add_webp_support' );

/**
 * 6.5 Correct WebP file type detection (WordPress < 5.8 compatibility)
 */
function zhongming_fix_webp_filetype( $types, $file, $filename, $mimes ) {
    if ( ! $types['ext'] && ! $types['type'] ) {
        if ( substr( $filename, -5 ) === '.webp' ) {
            $types['ext']  = 'webp';
            $types['type'] = 'image/webp';
        }
    }
    return $types;
}
add_filter( 'wp_check_filetype_and_ext', 'zhongming_fix_webp_filetype', 10, 4 );

/**
 * 6.6 Preconnect to Google Fonts for performance
 */
function zhongming_preconnect_google_fonts() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action( 'wp_head', 'zhongming_preconnect_google_fonts', 1 );

/**
 * 6.7 Automatically translate nav menu items for bilingual support.
 * Translates custom links titles and URLs when Chinese is active.
 */
function zhongming_translate_menu_items( $items, $args ) {
    if ( ! zm_is_zh() ) {
        return $items;
    }
    
    // Translation mapping for English titles to Chinese
    $title_map = array(
        'Home'                => '首页',
        'Products'            => '产品中心',
        'Indoor LED Display'  => '室内 LED',
        'COB Series'          => 'COB 系列',
        '16:9 Indoor'         => '16:9 室内屏',
        'Outdoor LED Display' => '户外 LED',
        'Rental Screen'       => '舞台租赁屏',
        'Special &amp; Creative' => '创意/异形 LED',
        'Special & Creative'  => '创意/异形 LED',
        'Poster Screen'       => '智能海报屏',
        'Solutions'           => '解决方案',
        'About Us'            => '关于我们',
        'Contact'             => '联系我们',
        'Privacy Policy'      => '隐私政策',
        'Terms of Service'    => '服务条款',
    );
    
    foreach ( $items as $item ) {
        // Translate title if mapped
        $raw_title = trim( $item->title );
        if ( isset( $title_map[ $raw_title ] ) ) {
            $item->title = $title_map[ $raw_title ];
        }
        
        // Translate URLs for custom links to prepend /zh
        if ( $item->type === 'custom' ) {
            $url = $item->url;
            $parsed = parse_url( $url );
            if ( isset( $parsed['path'] ) ) {
                $path = $parsed['path'];
                
                // If it doesn't already start with /zh/
                if ( strpos( $path, '/zh/' ) !== 0 ) {
                    $new_path = '/zh' . $path;
                    if ( $path === '/' ) {
                        $new_path = '/zh/';
                    }
                    
                    // Reconstruct absolute URL
                    $scheme = isset( $parsed['scheme'] ) ? $parsed['scheme'] . '://' : '';
                    $host = isset( $parsed['host'] ) ? $parsed['host'] : '';
                    $port = isset( $parsed['port'] ) ? ':' . $parsed['port'] : '';
                    $query = isset( $parsed['query'] ) ? '?' . $parsed['query'] : '';
                    $fragment = isset( $parsed['fragment'] ) ? '#' . $parsed['fragment'] : '';
                    
                    $item->url = $scheme . $host . $port . $new_path . $query . $fragment;
                }
            }
        }
    }
    
    return $items;
}
add_filter( 'wp_nav_menu_objects', 'zhongming_translate_menu_items', 10, 2 );


