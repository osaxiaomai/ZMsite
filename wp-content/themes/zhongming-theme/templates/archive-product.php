<?php
/**
 * Template Name: Product Archive Template
 * 
 * Custom template for displaying product archives, category taxonomies, and pitch taxonomies.
 */

// SEO Hook before get_header()
add_filter( 'document_title_parts', function( $title_parts ) {
    $queried_obj = get_queried_object();
    if ( is_tax() && $queried_obj ) {
        $title_parts['title'] = $queried_obj->name;
    } else {
        $title_parts['title'] = zm_is_zh() ? '产品中心' : 'Products';
    }
    $title_parts['site'] = zm_is_zh() ? 'LED显示屏' : 'LED Display';
    $title_parts['tagline'] = zm_is_zh() ? '中茗光电' : 'Zhongming Technology';
    return $title_parts;
} );

add_action( 'wp_head', function() {
    $queried_obj = get_queried_object();
    if ( is_tax() && $queried_obj ) {
        $page_title = $queried_obj->name;
        $desc = $queried_obj->description ? wp_strip_all_tags($queried_obj->description) : '';
        if ( empty($desc) ) {
            $desc = sprintf( zm_is_zh() ? '探索专为卓越性能与高稳定性设计的 %s 系列产品。' : 'Explore our advanced %s series designed for ultimate performance and stability.', $page_title );
        }
    } else {
        $page_title = zm_is_zh() ? '产品中心' : 'All Products';
        $desc = zm_is_zh() ? '探索我们的全系列专业 LED 显示屏解决方案，包括室内标准屏、超微间距 COB、户外标准屏以及定制创意异形显示系统。' : 'Discover our full range of professional LED display solutions, including standard indoor, fine pitch COB, standard outdoor, and creative custom displays.';
    }
    
    // Auto-generate keywords
    $base_keywords = zm_is_zh() ? 'LED显示屏, LED大屏, 中茗光电' : 'LED display, LED screen, Zhongming LED';
    $keywords = $page_title . ', ' . $base_keywords;
    
    echo '<meta name="description" content="' . esc_attr( wp_html_excerpt($desc, 150, '...') ) . '" />' . "\n";
    echo '<meta name="keywords" content="' . esc_attr( $keywords ) . '" />' . "\n";
}, 5 );

get_header();

// Get queried object to determine current category/pitch context
$queried_obj = get_queried_object();
$active_term_id = 0;
$active_taxonomy = '';

if ( is_tax() && $queried_obj ) {
    $active_term_id = $queried_obj->term_id;
    $active_taxonomy = $queried_obj->taxonomy;
}

// Dynamic Title & Description
$page_title = __( 'All Products', 'zhongming' );
$page_desc = __( 'Discover our full range of professional LED display solutions, including standard indoor, fine pitch COB, standard outdoor, and creative custom displays.', 'zhongming' );

if ( is_tax() && $queried_obj ) {
    $page_title = $queried_obj->name;
    $page_desc = $queried_obj->description ? $queried_obj->description : sprintf( __( 'Explore our advanced %s series designed for ultimate performance and stability.', 'zhongming' ), $queried_obj->name );
}

// Active parameters
$active_pitches = ! empty( $_GET['pitch'] ) ? explode( ',', sanitize_text_field( $_GET['pitch'] ) ) : array();
$active_apps = ! empty( $_GET['app'] ) ? explode( ',', sanitize_text_field( $_GET['app'] ) ) : array();
$current_sort = ! empty( $_GET['orderby'] ) ? sanitize_text_field( $_GET['orderby'] ) : 'default';

?>

<!-- Category Hero Bar -->
<section class="category-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumbs">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'zhongming' ); ?></a>
            <span class="sep">›</span>
            <?php if ( is_tax() ) : ?>
                <a href="<?php echo esc_url( zm_product_archive_link() ); ?>"><?php esc_html_e( 'Products', 'zhongming' ); ?></a>
                <span class="sep">›</span>
                <span class="current" aria-current="page"><?php echo esc_html( $page_title ); ?></span>
            <?php else : ?>
                <span class="current" aria-current="page"><?php esc_html_e( 'Products', 'zhongming' ); ?></span>
            <?php endif; ?>
        </nav>
        <h1 class="category-title"><?php echo esc_html( $page_title ); ?></h1>
        <?php if ( ! empty( $page_desc ) ) : ?>
            <p class="category-desc"><?php echo esc_html( $page_desc ); ?></p>
        <?php endif; ?>
    </div>
</section>

<!-- Product List Layout Container -->
<section class="product-archive-layout">
    <div class="container">
        
        <!-- Mobile Filters Accordion Button -->
        <div class="mobile-filter-bar" style="margin-bottom: 20px;">
            <button class="mobile-filter-toggle btn btn-outline" id="mobileFilterToggleBtn" style="width: 100%; display: none; align-items: center; justify-content: center; gap: 8px; padding: 12px 24px; font-weight: 600;" data-show-text="<?php esc_attr_e('Filter Products ▾', 'zhongming'); ?>" data-hide-text="<?php esc_attr_e('Hide Filters ▲', 'zhongming'); ?>">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-top: -1px;"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
                <span class="btn-toggle-text"><?php esc_html_e( 'Filter Products ▾', 'zhongming' ); ?></span>
            </button>
        </div>

        <div class="layout-grid">

            <!-- Left Sidebar Filters (220px Fixed) -->
            <aside class="sidebar-filters" id="sidebar-filters">
                
                <!-- Filter Section: Categories Tree -->
                <div class="filter-card category-tree-card">
                    <h3 class="filter-title"><?php esc_html_e( 'Categories', 'zhongming' ); ?></h3>
                    <ul class="category-tree">
                        <?php
                        // "All Products" top-level link
                        $is_all_products = ( ! is_tax() && is_post_type_archive( 'product' ) );
                        $all_link_class  = $is_all_products ? ' class="active"' : '';
                        ?>
                        <li<?php echo $all_link_class; ?>>
                            <div class="tree-item-wrapper">
                                <a href="<?php echo esc_url( zm_product_archive_link() ); ?>" class="category-link">
                                    <?php esc_html_e( 'All Products', 'zhongming' ); ?>
                                </a>
                            </div>
                        </li>
                        <?php
                        // Get all parent categories
                        $parent_categories = get_terms( array(
                             'taxonomy'   => 'product_category',
                             'parent'     => 0,
                             'hide_empty' => false,
                        ) );

                        if ( ! is_wp_error( $parent_categories ) && ! empty( $parent_categories ) ) :
                            foreach ( $parent_categories as $parent ) :
                                // Skip empty parent categories that have no children with products
                                $child_terms_for_count = get_terms( array(
                                    'taxonomy'   => 'product_category',
                                    'parent'     => $parent->term_id,
                                    'hide_empty' => true,
                                ) );
                                $has_children_with_products = ( ! is_wp_error( $child_terms_for_count ) && ! empty( $child_terms_for_count ) );
                                if ( $parent->count === 0 && ! $has_children_with_products ) {
                                    continue; // Skip this empty parent category
                                }
                                // Check if current page is this parent category
                                $is_parent_active = ( $active_taxonomy === 'product_category' && $active_term_id === $parent->term_id );
                                
                                // Get children
                                $child_categories = get_terms( array(
                                    'taxonomy'   => 'product_category',
                                    'parent'     => $parent->term_id,
                                    'hide_empty' => true,
                                ) );

                                // Detect if child is active to keep parent expanded
                                $has_active_child = false;
                                if ( ! empty( $child_categories ) && ! is_wp_error( $child_categories ) ) {
                                    foreach ( $child_categories as $child ) {
                                        if ( $active_taxonomy === 'product_category' && $active_term_id === $child->term_id ) {
                                            $has_active_child = true;
                                            break;
                                        }
                                    }
                                }

                                $parent_classes = array();
                                if ( $is_parent_active ) {
                                    $parent_classes[] = 'active';
                                }
                                if ( $has_active_child ) {
                                    $parent_classes[] = 'child-active';
                                }
                                if ( ! empty( $child_categories ) ) {
                                    $parent_classes[] = 'has-children';
                                }
                                // Expand active parents by default
                                if ( $is_parent_active || $has_active_child ) {
                                    $parent_classes[] = 'expanded';
                                }

                                $class_str = ! empty( $parent_classes ) ? ' class="' . esc_attr( implode( ' ', $parent_classes ) ) . '"' : '';
                                ?>
                                <li<?php echo $class_str; ?>>
                                    <div class="tree-item-wrapper">
                                        <a href="<?php echo esc_url( get_term_link( $parent ) ); ?>" class="category-link">
                                            <?php echo esc_html( $parent->name ); ?>
                                        </a>
                                        <?php if ( ! empty( $child_categories ) ) : ?>
                                            <button class="submenu-toggle-btn" aria-label="<?php esc_attr_e( 'Toggle Submenu', 'zhongming' ); ?>">
                                                <svg width="8" height="5" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ( ! empty( $child_categories ) && ! is_wp_error( $child_categories ) ) : ?>
                                        <ul class="subcategories">
                                            <?php foreach ( $child_categories as $child ) : ?>
                                                <?php 
                                                // Get grandchildren (Level 3)
                                                $grandchild_categories = get_terms( array(
                                                    'taxonomy'   => 'product_category',
                                                    'parent'     => $child->term_id,
                                                    'hide_empty' => true,
                                                ) );
                                                
                                                $has_active_grandchild = false;
                                                if ( ! empty( $grandchild_categories ) && ! is_wp_error( $grandchild_categories ) ) {
                                                    foreach ( $grandchild_categories as $grandchild ) {
                                                        if ( $active_taxonomy === 'product_category' && $active_term_id === $grandchild->term_id ) {
                                                            $has_active_grandchild = true;
                                                            break;
                                                        }
                                                    }
                                                }
                                                
                                                $is_child_active = ( $active_taxonomy === 'product_category' && $active_term_id === $child->term_id );
                                                $child_classes = array();
                                                if ( $is_child_active ) $child_classes[] = 'active';
                                                if ( $has_active_grandchild ) $child_classes[] = 'expanded child-active';
                                                
                                                $child_class_str = ! empty( $child_classes ) ? ' class="' . esc_attr( implode( ' ', $child_classes ) ) . '"' : '';
                                                ?>
                                                <li<?php echo $child_class_str; ?>>
                                                    <div class="tree-item-wrapper">
                                                        <a href="<?php echo esc_url( get_term_link( $child ) ); ?>" class="category-link">
                                                            <?php echo esc_html( $child->name ); ?>
                                                        </a>
                                                        <?php if ( ! empty( $grandchild_categories ) && ! is_wp_error( $grandchild_categories ) ) : ?>
                                                            <button class="submenu-toggle-btn" aria-label="<?php esc_attr_e( 'Toggle Submenu', 'zhongming' ); ?>">
                                                                <svg width="8" height="5" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </button>
                                                        <?php endif; ?>
                                                    </div>
                                                    
                                                    <?php if ( ! empty( $grandchild_categories ) && ! is_wp_error( $grandchild_categories ) ) : ?>
                                                        <ul class="subcategories">
                                                            <?php foreach ( $grandchild_categories as $grandchild ) : 
                                                                $is_grandchild_active = ( $active_taxonomy === 'product_category' && $active_term_id === $grandchild->term_id );
                                                                $grandchild_class = $is_grandchild_active ? ' class="active"' : '';
                                                                ?>
                                                                <li<?php echo $grandchild_class; ?>>
                                                                    <a href="<?php echo esc_url( get_term_link( $grandchild ) ); ?>">
                                                                        <?php echo esc_html( $grandchild->name ); ?>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>

                <!-- Filter Section: Pixel Pitch Pills -->
                <div class="filter-card pitch-filter-card">
                    <h3 class="filter-title"><?php esc_html_e( 'Pixel Pitch (mm)', 'zhongming' ); ?></h3>
                    <div class="pitch-pills-container">
                        <?php
                        $pitch_terms = get_terms( array(
                            'taxonomy'   => 'pixel_pitch_tax',
                            'hide_empty' => false,
                            'orderby'    => 'slug',
                            'order'      => 'ASC',
                        ) );

                        if ( ! is_wp_error( $pitch_terms ) && ! empty( $pitch_terms ) ) :
                            // Custom sort pitches numerically
                            usort($pitch_terms, function($a, $b) {
                                $numA = (float) filter_var($a->name, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                                $numB = (float) filter_var($b->name, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                                return $numA <=> $numB;
                            });

                            $idx = 0;
                            foreach ( $pitch_terms as $term ) :
                                $is_selected = in_array( $term->slug, $active_pitches );
                                $pill_classes = array( 'pitch-pill' );
                                if ( $is_selected ) {
                                    $pill_classes[] = 'selected';
                                }
                                $inline_style = '';
                                if ( $idx >= 10 && !$is_selected ) {
                                    $pill_classes[] = 'hidden-pill';
                                    $inline_style = ' style="display: none;"';
                                }
                                $pill_class = implode( ' ', $pill_classes );
                                ?>
                                <a href="#" class="<?php echo esc_attr( $pill_class ); ?>" data-pitch="<?php echo esc_attr( $term->slug ); ?>"<?php echo $inline_style; ?>>
                                    <?php echo esc_html( $term->name ); ?>
                                </a>
                                <?php
                                $idx++;
                            endforeach;
                            
                            if ( count( $pitch_terms ) > 10 ) : ?>
                                <div class="show-more-pitches-wrapper" style="width: 100%; margin-top: 12px; border-top: 1px dashed var(--color-border); padding-top: 10px;">
                                    <button class="show-more-pitches-btn" style="background: none; border: none; color: var(--color-accent-blue, #0057b8); font-size: 13px; font-weight: 600; cursor: pointer; text-align: left; padding: 4px 0; outline: none; display: flex; align-items: center; gap: 4px;" data-more-text="<?php esc_attr_e('Show More (+)', 'zhongming'); ?>" data-less-text="<?php esc_attr_e('Show Less (-)', 'zhongming'); ?>">
                                        <span class="btn-text"><?php esc_html_e('Show More (+)', 'zhongming'); ?></span>
                                    </button>
                                </div>
                            <?php endif;
                        endif;
                        ?>
                    </div>
                </div>

                <!-- Filter Section: Applications -->
                <div class="filter-card app-filter-card">
                    <h3 class="filter-title"><?php esc_html_e( 'Applications', 'zhongming' ); ?></h3>
                    <div class="app-checkboxes-container">
                        <?php
                        // Retrieve dynamic applications choices from ACF Field specs definition
                        $app_choices = array();
                        if ( function_exists( 'acf_get_field' ) ) {
                            $app_field = acf_get_field( 'field_prod_apps' );
                            if ( $app_field && ! empty( $app_field['choices'] ) ) {
                                $app_choices = $app_field['choices'];
                            }
                        }

                        // Fallback choices
                        if ( empty( $app_choices ) ) {
                            $app_choices = array(
                                'conference'   => 'Conference Room',
                                'broadcast'    => 'Broadcast Studio',
                                'security'     => 'Security & Control',
                                'advertising'  => 'Indoor/Outdoor Advertising',
                                'exhibition'   => 'Exhibition',
                                'retail'       => 'Retail Window',
                                'stage-events' => 'Stage & Events',
                                'tourism'      => 'Tourism & Culture',
                                'hotel'        => 'Hotel & Restaurant',
                                'mall'         => 'Shopping Mall',
                            );
                        }

                        foreach ( $app_choices as $key => $label ) :
                            $is_checked = in_array( $key, $active_apps );
                            ?>
                            <label class="filter-checkbox-label">
                                <input type="checkbox" class="app-checkbox" value="<?php echo esc_attr( $key ); ?>" <?php checked( $is_checked ); ?>>
                                <span class="checkbox-custom"></span>
                                <span class="checkbox-text"><?php echo esc_html( __( $label, 'zhongming' ) ); ?></span>
                            </label>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>

            </aside>

            <!-- Right Side Product Area -->
            <main class="products-grid-container" style="flex: 1; min-width: 0;">

                <!-- Toolbar (Header of listings) -->
                <header class="grid-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 1px solid var(--color-border); flex-wrap: wrap; gap: 16px;">
                    <div class="grid-summary">
                        <span class="results-count" style="font-size: 14px; color: var(--color-text-2);">
                            <strong style="color: var(--color-text); font-weight: 700;"><?php echo esc_html( $wp_query->found_posts ); ?></strong> 
                            <?php esc_html_e( 'products found', 'zhongming' ); ?>
                        </span>
                        
                        <?php if ( ! empty( $active_pitches ) || ! empty( $active_apps ) ) : ?>
                            <div class="active-filter-chips" style="display: flex; flex-wrap: wrap; gap: 8px; align-items: center; margin-top: 8px;">
                                <?php if ( ! empty( $active_pitches ) ) : ?>
                                    <?php foreach ( $active_pitches as $p ) : 
                                        $p_term = get_term_by( 'slug', $p, 'pixel_pitch_tax' );
                                        if ( $p_term ) : ?>
                                            <span class="filter-chip" data-type="pitch" data-val="<?php echo esc_attr( $p ); ?>">
                                                <?php echo esc_html( $p_term->name ); ?>
                                                <span class="chip-remove">×</span>
                                            </span>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <?php if ( ! empty( $active_apps ) ) : ?>
                                    <?php foreach ( $active_apps as $a ) : 
                                        $app_label = isset( $app_choices[$a] ) ? $app_choices[$a] : $a; ?>
                                        <span class="filter-chip" data-type="app" data-val="<?php echo esc_attr( $a ); ?>">
                                            <?php echo esc_html( __( $app_label, 'zhongming' ) ); ?>
                                            <span class="chip-remove">×</span>
                                        </span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                
                                <a href="#" class="clear-all-filters" style="font-size: 12px; font-weight: 600; color: var(--color-text-3); text-decoration: underline; margin-left: 4px;"><?php esc_html_e( 'Clear All', 'zhongming' ); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Sorting Selector -->
                    <div class="grid-sorting" style="display: flex; align-items: center; gap: 12px;">
                        <label for="product-sort" class="sort-label" style="font-size: 13px; color: var(--color-text-2);"><?php esc_html_e( 'Sort by:', 'zhongming' ); ?></label>
                        <select id="product-sort" class="sort-select" style="font-size: 13px; font-weight: 600; color: var(--color-text); border: 1px solid var(--color-border); border-radius: 4px; background-color: var(--color-white); padding: 8px 32px 8px 12px; cursor: pointer; outline: none; transition: var(--transition); appearance: none; background-image: url(&quot;data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2210%22%20height%3D%226%22%20viewBox%3D%220%200%2010%206%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M1%201L5%205L9%201%22%20stroke%3D%22%25231a1a18%22%20stroke-width%3D%221.5%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%2F%3E%3C%2Fsvg%3E&quot;); background-repeat: no-repeat; background-position: right 12px center;">
                            <option value="default" <?php selected( $current_sort, 'default' ); ?>><?php esc_html_e( 'Default Order', 'zhongming' ); ?></option>
                            <option value="title_asc" <?php selected( $current_sort, 'title_asc' ); ?>><?php esc_html_e( 'Product Name (A-Z)', 'zhongming' ); ?></option>
                            <option value="title_desc" <?php selected( $current_sort, 'title_desc' ); ?>><?php esc_html_e( 'Product Name (Z-A)', 'zhongming' ); ?></option>
                            <option value="pitch_asc" <?php selected( $current_sort, 'pitch_asc' ); ?>><?php esc_html_e( 'Pixel Pitch (Finer First)', 'zhongming' ); ?></option>
                            <option value="pitch_desc" <?php selected( $current_sort, 'pitch_desc' ); ?>><?php esc_html_e( 'Pixel Pitch (Coarser First)', 'zhongming' ); ?></option>
                        </select>
                    </div>
                </header>

                <!-- Product Grid (Unified with Homepage Class .product-grid) -->
                <?php if ( have_posts() ) : ?>
                    <div class="product-grid">
                        <?php while ( have_posts() ) : the_post(); 
                            // Fetch specifications
                            $pitch = get_field( 'pixel_pitch_mm' );
                            $cabinet = get_field( 'cabinet_size_mm' );
                            $brightness = get_field( 'brightness_nit' );
                            $view_dist = get_field( 'best_viewing_distance' );
                            $badge_raw = get_field( 'badge_type' );
                            $badge = is_array( $badge_raw ) ? ( isset( $badge_raw['value'] ) ? $badge_raw['value'] : '' ) : $badge_raw;

                            $badge_class = '';
                            $badge_text = '';

                            if ( ! empty( $badge ) ) {
                                switch ( $badge ) {
                                    case 'indoor':
                                        $badge_class = 'badge-indoor';
                                        $badge_text = zm_t( 'Indoor', '室内' );
                                        break;
                                    case 'outdoor':
                                        $badge_class = 'badge-outdoor';
                                        $badge_text = zm_t( 'Outdoor', '户外' );
                                        break;
                                    case 'special':
                                        $badge_class = 'badge-special';
                                        $badge_text = zm_t( 'Special', '创意' );
                                        break;
                                    case 'rental':
                                        $badge_class = 'badge-rental';
                                        $badge_text = zm_t( 'Rental', '租赁' );
                                        break;
                                }
                            }
                            ?>
                            <!-- Card component (.product-card) -->
                            <article class="product-card">
                                
                                <!-- Card Thumbnail (.product-card-img) -->
                                <div class="product-card-img">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php 
                                        $has_second_img = false;
                                        $second_img_url = '';
                                        $gallery_raw = get_field('product_gallery');
                                        if ( ! empty( $gallery_raw ) && is_array( $gallery_raw ) && count($gallery_raw) > 1 ) {
                                            $second_item = $gallery_raw[1];
                                            if ( is_array( $second_item ) && isset( $second_item['sizes']['medium'] ) ) {
                                                $second_img_url = $second_item['sizes']['medium'];
                                                $has_second_img = true;
                                            } elseif ( is_numeric( $second_item ) ) {
                                                $second_img_url = wp_get_attachment_image_url( $second_item, 'medium' );
                                                if ( $second_img_url ) $has_second_img = true;
                                            } elseif ( is_string( $second_item ) ) {
                                                $second_img_url = $second_item;
                                                $has_second_img = true;
                                            }
                                        }
                                        
                                        if ( has_post_thumbnail() ) : 
                                            the_post_thumbnail( 'medium', array( 'class' => 'product-img' ) ); 
                                            if ( $has_second_img ) : ?>
                                                <img src="<?php echo esc_url($second_img_url); ?>" class="product-img secondary-img" alt="<?php the_title_attribute(); ?>">
                                            <?php endif;
                                        else : ?>
                                            <!-- SVG premium placeholder box with gray background -->
                                            <div class="product-image-fallback">
                                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" style="opacity: 0.6;"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect><line x1="7" y1="2" x2="7" y2="22"></line><line x1="17" y1="2" x2="17" y2="22"></line><line x1="2" y1="12" x2="22" y2="12"></line><line x1="2" y1="7" x2="22" y2="7"></line><line x1="2" y1="17" x2="22" y2="17"></line></svg>
                                            </div>
                                        <?php endif; ?>
                                    </a>
                                    
                                    <?php if ( ! empty( $badge_text ) ) : ?>
                                        <span class="badge <?php echo esc_attr( $badge_class ); ?>">
                                            <?php echo esc_html( $badge_text ); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <!-- Card Body (.product-info) -->
                                <div class="product-info">
                                    <h3>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    
                                    <!-- Specs List (.product-specs) -->
                                    <ul class="product-specs">
                                        <?php if ( zm_is_valid_spec( $pitch ) ) : ?>
                                            <li>
                                                <span class="spec-label"><?php esc_html_e( 'Pixel Pitch:', 'zhongming' ); ?></span>
                                                <strong class="spec-value"><?php echo is_numeric($pitch) ? esc_html($pitch) . 'mm' : esc_html(zm_translate_spec_val($pitch)); ?></strong>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ( zm_is_valid_spec( $cabinet ) ) : ?>
                                            <li>
                                                <span class="spec-label"><?php esc_html_e( 'Cabinet Size:', 'zhongming' ); ?></span>
                                                <strong class="spec-value"><?php echo esc_html(zm_translate_spec_val($cabinet)); ?></strong>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ( zm_is_valid_spec( $brightness ) ) : ?>
                                            <li>
                                                <span class="spec-label"><?php esc_html_e( 'Brightness:', 'zhongming' ); ?></span>
                                                <strong class="spec-value"><?php echo esc_html(zm_translate_spec_val($brightness)); ?><?php echo ( stripos( $brightness, 'nit' ) === false ) ? ' nit' : ''; ?></strong>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ( zm_is_valid_spec( $view_dist ) ) : ?>
                                            <li>
                                                <span class="spec-label"><?php esc_html_e( 'Viewing Distance:', 'zhongming' ); ?></span>
                                                <strong class="spec-value"><?php echo esc_html(zm_translate_spec_val($view_dist)); ?></strong>
                                            </li>
                                        <?php endif; ?>
                                    </ul>

                                    <!-- Action Buttons (.product-btns) -->
                                    <div class="product-btns">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-outline"><?php esc_html_e( 'View Details', 'zhongming' ); ?></a>
                                        <a href="<?php echo esc_url( zhongming_get_contact_url() . '?product_title=' . urlencode( html_entity_decode( get_the_title() ) ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Get Quote', 'zhongming' ); ?></a>
                                    </div>
                                </div>

                            </article>
                        <?php endwhile; ?>
                    </div>

                    <!-- Custom Standard Pagination -->
                    <div class="product-pagination" style="margin-top: 48px; display: flex; justify-content: center;">
                        <?php
                        $big = 999999999;
                        echo paginate_links( array(
                            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format'    => '?paged=%#%',
                            'current'   => max( 1, get_query_var( 'paged' ) ),
                            'total'     => $wp_query->max_num_pages,
                            'prev_text' => __( '← Prev', 'zhongming' ),
                            'next_text' => __( 'Next →', 'zhongming' ),
                            'type'      => 'list',
                        ) );
                        ?>
                    </div>

                <?php else : ?>
                    <!-- Empty state -->
                    <div class="no-products-wrapper" style="text-align: center; padding: 80px 40px; background-color: var(--color-white); border: 1px dashed var(--color-border-2); border-radius: 8px; max-width: 500px; margin: 0 auto;">
                        <div class="no-products-icon" style="font-size: 48px; margin-bottom: 16px; opacity: 0.6;">🔍</div>
                        <h3 class="no-products-heading" style="font-size: 20px; font-weight: 700; color: var(--color-text); margin-bottom: 10px;"><?php esc_html_e( 'No Products Found', 'zhongming' ); ?></h3>
                        <p class="no-products-desc" style="font-size: 13px; color: var(--color-text-2); margin-bottom: 24px; line-height: 1.5;"><?php esc_html_e( 'No products match your active filtering combination. Try clearing some filters to expand your search.', 'zhongming' ); ?></p>
                        <a href="#" class="btn btn-primary clear-all-filters" style="text-transform: uppercase; font-size: 12px; letter-spacing: 0.8px;"><?php esc_html_e( 'Reset Filters', 'zhongming' ); ?></a>
                    </div>
                <?php endif; ?>

            </main>
        </div>
    </div>
</section>

<!-- Interactive Filtering Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const pitchPills = document.querySelectorAll('.pitch-pill');
    const appCheckboxes = document.querySelectorAll('.app-checkbox');
    const sortSelect = document.getElementById('product-sort');
    const clearFiltersLinks = document.querySelectorAll('.clear-all-filters');
    const activeChips = document.querySelectorAll('.filter-chip');
    
    const sidebar = document.getElementById('sidebar-filters');
    const mobileToggle = document.getElementById('mobileFilterToggleBtn');

    // Helper: Get active query parameters
    function getQueryParams() {
        return new URLSearchParams(window.location.search);
    }

    // Helper: Redirect with new parameters
    function updateUrl(params) {
        window.location.href = window.location.pathname + '?' + params.toString();
    }

    // 1. Toggle Pitch Filter Pills
    pitchPills.forEach(pill => {
        pill.addEventListener('click', function(e) {
            e.preventDefault();
            const pitch = this.dataset.pitch;
            const params = getQueryParams();
            let pitches = params.get('pitch') ? params.get('pitch').split(',') : [];

            if (pitches.includes(pitch)) {
                pitches = pitches.filter(p => p !== pitch);
            } else {
                pitches.push(pitch);
            }

            if (pitches.length > 0) {
                params.set('pitch', pitches.join(','));
            } else {
                params.delete('pitch');
            }

            params.delete('paged');
            updateUrl(params);
        });
    });

    // 2. Toggle Application Checkboxes
    appCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const params = getQueryParams();
            const checkedApps = [];
            
            document.querySelectorAll('.app-checkbox:checked').forEach(cb => {
                checkedApps.push(cb.value);
            });

            if (checkedApps.length > 0) {
                params.set('app', checkedApps.join(','));
            } else {
                params.delete('app');
            }

            params.delete('paged');
            updateUrl(params);
        });
    });

    // 3. Sorting Dropdown Selection Change
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            const params = getQueryParams();
            const sortVal = this.value;
            
            if (sortVal && sortVal !== 'default') {
                params.set('orderby', sortVal);
            } else {
                params.delete('orderby');
            }

            params.delete('paged');
            updateUrl(params);
        });
    }

    // 4. Remove Specific Filter Chips
    activeChips.forEach(chip => {
        chip.querySelector('.chip-remove').addEventListener('click', function(e) {
            e.stopPropagation();
            const type = chip.dataset.type;
            const val = chip.dataset.val;
            const params = getQueryParams();

            if (type === 'pitch') {
                let pitches = params.get('pitch') ? params.get('pitch').split(',') : [];
                pitches = pitches.filter(p => p !== val);
                if (pitches.length > 0) {
                    params.set('pitch', pitches.join(','));
                } else {
                    params.delete('pitch');
                }
            } else if (type === 'app') {
                let apps = params.get('app') ? params.get('app').split(',') : [];
                apps = apps.filter(a => a !== val);
                if (apps.length > 0) {
                    params.set('app', apps.join(','));
                } else {
                    params.delete('app');
                }
            }

            params.delete('paged');
            updateUrl(params);
        });
    });

    // 5. Clear All Filters Action
    clearFiltersLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const params = getQueryParams();
            params.delete('pitch');
            params.delete('app');
            params.delete('paged');
            updateUrl(params);
        });
    });

    // 6. Sidebar Category Tree Collapsible Submenus
    const submenuToggles = document.querySelectorAll('.submenu-toggle-btn');
    submenuToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.stopPropagation();
            const parentLi = this.closest('li');
            parentLi.classList.toggle('expanded');
        });
    });

    // Automatically expand parent of active child
    const activeSubItems = document.querySelectorAll('.subcategories li.active');
    activeSubItems.forEach(item => {
        const parentLi = item.closest('.category-tree > li');
        if (parentLi) {
            parentLi.classList.add('expanded');
        }
    });

    // Expand current category if active parent has children
    const activeParentWithChildren = document.querySelectorAll('.category-tree > li.active.has-children');
    activeParentWithChildren.forEach(item => {
        item.classList.add('expanded');
    });

    // 7. Mobile Filter Panel Toggle Accordion
    if (mobileToggle && sidebar) {
        mobileToggle.addEventListener('click', function() {
            sidebar.classList.toggle('open');
            this.classList.toggle('active');
            if (sidebar.classList.contains('open')) {
                sidebar.style.display = 'block';
                this.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-top:-1px;"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> ' + this.dataset.hideText;
            } else {
                sidebar.style.display = '';
                this.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-top:-1px;"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg> ' + this.dataset.showText;
            }
        });
    }

    // 8. Sidebar Show More Pitches Toggle
    const showMorePitchesBtn = document.querySelector('.show-more-pitches-btn');
    if (showMorePitchesBtn) {
        showMorePitchesBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const hiddenPills = document.querySelectorAll('.pitch-pill.hidden-pill');
            const btnText = this.querySelector('.btn-text');
            const isExpanded = btnText.textContent.includes('Less') || btnText.textContent.includes('收起');

            hiddenPills.forEach(pill => {
                pill.style.display = isExpanded ? 'none' : 'inline-block';
            });

            if (isExpanded) {
                btnText.textContent = this.dataset.moreText;
            } else {
                btnText.textContent = this.dataset.lessText;
            }
        });
    }
});
</script>

<?php get_footer(); ?>
