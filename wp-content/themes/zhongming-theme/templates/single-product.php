<?php
/**
 * Template Name: Product Single Template
 * 
 * Custom template for displaying single product detail pages with comprehensive specifications,
 * key features repeater, interactive image gallery, 5-tab navigation, and series models.
 */

// SEO Title & Description Hook before get_header()
add_filter( 'document_title_parts', function( $title_parts ) {
    $title_parts['title'] = get_the_title();
    $title_parts['site'] = 'LED Display';
    $title_parts['tagline'] = 'Zhongming Technology';
    return $title_parts;
} );

add_action( 'wp_head', function() {
    global $post;
    $pitch = get_field( 'pixel_pitch_mm', $post->ID );
    $cabinet = get_field( 'cabinet_size_mm', $post->ID );
    $desc = get_the_excerpt( $post->ID );
    if ( empty( $desc ) ) {
        $desc = wp_strip_all_tags( $post->post_content );
    }
    
    // Auto-generate professional B2B meta description
    $seo_desc = sprintf(
        __( 'Discover %1$s LED screen. Pixel pitch: %2$smm. Cabinet size: %3$s. Premium quality, highly stable B2B LED display solution by Zhongming Technology.', 'zhongming' ),
        get_the_title(),
        zm_is_valid_spec($pitch) ? $pitch : 'custom',
        zm_is_valid_spec($cabinet) ? $cabinet : 'custom size'
    );
    if ( ! empty( $desc ) ) {
        $seo_desc = wp_html_excerpt( $desc, 150, '...' );
    }
    echo '<meta name="description" content="' . esc_attr( $seo_desc ) . '" />' . "\n";
}, 5 );

get_header();

global $post;

// 1. Safe ACF Retrieval & Normalization
$pitch = get_field( 'pixel_pitch_mm', $post->ID );
$cabinet = get_field( 'cabinet_size_mm', $post->ID );
$brightness = get_field( 'brightness_nit', $post->ID );
$refresh = get_field( 'refresh_rate_hz', $post->ID );
$cab_res = get_field( 'cabinet_resolution', $post->ID );
$lifespan = get_field( 'lifespan_hours', $post->ID );
$panel_size = get_field( 'panel_size_mm', $post->ID );
$panel_res = get_field( 'panel_resolution', $post->ID );

$maintenance = get_field( 'maintenance_type', $post->ID );
$ip_rating = get_field( 'ip_rating', $post->ID );

$badge_raw = get_field( 'badge_type', $post->ID );
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

// Normalize Series Label
$series_raw = get_field( 'product_series', $post->ID );
$series_label = '';
if ( is_array( $series_raw ) ) {
    $series_label = isset( $series_raw['label'] ) ? $series_raw['label'] : ( isset( $series_raw['name'] ) ? $series_raw['name'] : '' );
} else {
    $series_label = $series_raw;
}

// Safely unpack gallery images
$gallery_imgs = array();
if ( has_post_thumbnail( $post->ID ) ) {
    $gallery_imgs[] = get_the_post_thumbnail_url( $post->ID, 'large' );
}
$gallery_raw = get_field( 'product_gallery', $post->ID );
if ( ! empty( $gallery_raw ) && is_array( $gallery_raw ) ) {
    foreach ( $gallery_raw as $item ) {
        if ( is_array( $item ) && isset( $item['url'] ) ) {
            $gallery_imgs[] = $item['url'];
        } elseif ( is_numeric( $item ) ) {
            $url = wp_get_attachment_image_url( $item, 'large' );
            if ( $url ) {
                $gallery_imgs[] = $url;
            }
        } elseif ( is_string( $item ) ) {
            $gallery_imgs[] = $item;
        }
    }
}
$gallery_imgs = array_unique( $gallery_imgs );

// Safely unpack Datasheet PDF
$datasheet_url = '';
$datasheet_raw = get_field( 'datasheet_pdf', $post->ID );
if ( ! empty( $datasheet_raw ) ) {
    if ( is_array( $datasheet_raw ) && isset( $datasheet_raw['url'] ) ) {
        $datasheet_url = $datasheet_raw['url'];
    } elseif ( is_numeric( $datasheet_raw ) ) {
        $datasheet_url = wp_get_attachment_url( $datasheet_raw );
    } elseif ( is_string( $datasheet_raw ) ) {
        $datasheet_url = $datasheet_raw;
    }
}

// Category details for Breadcrumb
$terms = get_the_terms( $post->ID, 'product_category' );
$cat_link = '';
$cat_name = '';
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $cat = $terms[0];
    $cat_link = get_term_link( $cat );
    $cat_name = $cat->name;
}
?>

<!-- Breadcrumbs Hero Section -->
<section class="single-product-breadcrumbs category-hero" style="padding: 24px 0; background-color: var(--color-bg-2);">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumbs" style="display: flex; align-items: center; gap: 8px; font-size: 12px; color: var(--color-text-3);">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: var(--color-text-2); text-decoration: none;"><?php esc_html_e( 'Home', 'zhongming' ); ?></a>
            <span class="sep" style="color: var(--color-border-2);">›</span>
            <a href="<?php echo esc_url( zm_product_archive_link() ); ?>" style="color: var(--color-text-2); text-decoration: none;"><?php esc_html_e( 'Products', 'zhongming' ); ?></a>
            <?php if ( ! empty( $cat_name ) ) : ?>
                <span class="sep" style="color: var(--color-border-2);">›</span>
                <a href="<?php echo esc_url( $cat_link ); ?>" style="color: var(--color-text-2); text-decoration: none;"><?php echo esc_html( $cat_name ); ?></a>
            <?php endif; ?>
            <span class="sep" style="color: var(--color-border-2);">›</span>
            <span class="current" aria-current="page" style="color: var(--color-text); font-weight: 500;"><?php the_title(); ?></span>
        </nav>
    </div>
</section>

<!-- Single Product Details Container -->
<section class="single-product-details" style="padding: 60px 0; background-color: #ffffff;">
    <div class="container">
        
        <div class="single-product-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: start; margin-bottom: 60px;">
            
            <!-- Left Side Gallery Component -->
            <div class="product-gallery-column" style="display: flex; flex-direction: column; gap: 16px;">
                <div class="main-gallery-frame" style="width: 100%; aspect-ratio: 4/3; border: 1px solid var(--color-border); border-radius: 8px; overflow: hidden; background-color: var(--color-bg-2); position: relative; display: flex; align-items: center; justify-content: center;">
                    <?php if ( ! empty( $gallery_imgs ) ) : ?>
                        <img loading="lazy" id="main-product-gallery-image" src="<?php echo esc_url( $gallery_imgs[0] ); ?>" alt="<?php the_title_attribute(); ?>" style="max-width: 100%; max-height: 100%; width: auto; height: auto; object-fit: contain; transition: opacity 0.3s ease;">
                    <?php else : ?>
                        <div class="product-image-fallback" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 10px; color: var(--color-text-3);">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="opacity: 0.5;"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect><line x1="7" y1="2" x2="7" y2="22"></line><line x1="17" y1="2" x2="17" y2="22"></line><line x1="2" y1="12" x2="22" y2="12"></line><line x1="2" y1="7" x2="22" y2="7"></line><line x1="2" y1="17" x2="22" y2="17"></line></svg>
                            <span style="font-size: 13px; font-weight: 500;"><?php esc_html_e( 'No Image Available', 'zhongming' ); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ( ! empty( $badge_text ) ) : ?>
                        <span class="badge <?php echo esc_attr( $badge_class ); ?>" style="position: absolute; top: 16px; left: 16px; font-size: 11px; font-weight: 700; padding: 6px 14px; border-radius: 4px; text-transform: uppercase; letter-spacing: 0.8px;">
                            <?php echo esc_html( $badge_text ); ?>
                        </span>
                    <?php endif; ?>
                </div>
                
                <?php if ( count( $gallery_imgs ) > 1 ) : ?>
                    <div class="gallery-thumbnails-strip" style="display: flex; gap: 12px; flex-wrap: wrap; margin-top: 4px;">
                        <?php 
                        $thumb_idx = 0;
                        foreach ( $gallery_imgs as $img_url ) : 
                            if ( $thumb_idx >= 5 ) break; // Limit to 5 thumbnail choices including main
                            $active_class = $thumb_idx === 0 ? ' active' : '';
                            ?>
                            <div class="gallery-thumb-item<?php echo $active_class; ?>" data-src="<?php echo esc_url( $img_url ); ?>" style="width: 72px; height: 54px; border: 1px solid var(--color-border); border-radius: 4px; overflow: hidden; cursor: pointer; transition: all 0.2s ease-in-out; background-color: var(--color-bg-2); display: flex; align-items: center; justify-content: center;">
                                <img loading="lazy" src="<?php echo esc_url( $img_url ); ?>" alt="Thumbnail <?php echo $thumb_idx + 1; ?>" style="max-width: 100%; max-height: 100%; width: auto; height: auto; object-fit: contain; display: block;">
                            </div>
                            <?php 
                            $thumb_idx++;
                        endforeach; 
                        ?>
                    </div>
                    
                    <!-- Inline JavaScript switcher for thumbnails -->
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const thumbs = document.querySelectorAll('.gallery-thumb-item');
                        const mainImg = document.getElementById('main-product-gallery-image');
                        if (thumbs.length > 0 && mainImg) {
                            thumbs.forEach(thumb => {
                                thumb.addEventListener('click', function() {
                                    thumbs.forEach(t => t.classList.remove('active'));
                                    this.classList.add('active');
                                    mainImg.style.opacity = '0.3';
                                    setTimeout(() => {
                                        mainImg.src = this.dataset.src;
                                        mainImg.style.opacity = '1';
                                    }, 150);
                                });
                            });
                        }
                    });
                    </script>
                <?php endif; ?>
            </div>
            
            <!-- Right Side Overview Column -->
            <div class="product-info-column" style="display: flex; flex-direction: column; gap: 20px;">
                
                <?php if ( ! empty( $series_label ) ) : ?>
                    <span class="product-series-tag" style="font-size: 11px; font-weight: 700; color: var(--color-accent-blue, #0057b8); text-transform: uppercase; letter-spacing: 2px;">
                        <?php printf( zm_t('%s SERIES', '%s 系列'), esc_html( zm_translate_spec_val( $series_label ) ) ); ?>
                    </span>
                <?php endif; ?>
                
                <h1 class="product-title-h1" style="font-size: 32px; font-weight: 700; color: var(--color-text); margin: 0; line-height: 1.2;">
                    <?php the_title(); ?>
                </h1>
                
                <!-- Quick dynamic tag descriptors -->
                <div class="product-tags-line" style="display: flex; flex-wrap: wrap; gap: 8px; align-items: center; margin-top: -8px;">
                    <?php if ( ! empty( $ip_rating ) && $ip_rating !== '—' && $ip_rating !== '-' ) : ?>
                        <span class="meta-tag-pill" style="font-size: 11px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 4px 10px;">
                            <?php printf( zm_t('%s Protection', '%s 防护等级'), esc_html( zm_translate_spec_val( $ip_rating ) ) ); ?>
                        </span>
                    <?php endif; ?>
                    <?php if ( ! empty( $maintenance ) && $maintenance !== '—' && $maintenance !== '-' ) : ?>
                        <span class="meta-tag-pill" style="font-size: 11px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 4px 10px;">
                            <?php echo esc_html( zm_translate_spec_val( $maintenance ) ); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Product Excerpt description -->
                <div class="product-short-description" style="font-size: 14px; color: var(--color-text-2); line-height: 1.6; border-top: 1px solid var(--color-border); padding-top: 16px;">
                    <?php
                    $excerpt = get_the_excerpt();
                    if ( empty( $excerpt ) ) {
                        // Extract first 200 chars of standard body content
                        $excerpt = wp_html_excerpt( wp_strip_all_tags( $post->post_content ), 200, '...' );
                    }
                    echo wp_kses_post( wpautop( $excerpt ) );
                    ?>
                </div>
                
                <!-- 6 Quick Specs Grid (2x3 Layout) -->
                <div class="quick-specs-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin: 10px 0;">
                    
                    <!-- Spec Card 1: Pixel Pitch -->
                    <?php if ( zm_is_valid_spec( $pitch ) ) : ?>
                    <div class="quick-spec-card" style="border: 1px solid var(--color-border); border-radius: 6px; padding: 12px 16px; background-color: var(--color-bg-2); transition: all 0.2s ease-in-out; display: flex; align-items: center; gap: 12px;">
                        <div class="spec-card-icon" style="color: var(--color-accent-blue, #0057b8); opacity: 0.85;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"></path></svg>
                        </div>
                        <div>
                            <span style="font-size: 11px; font-weight: 500; color: var(--color-text-3); text-transform: uppercase; letter-spacing: 0.5px; display: block;"><?php esc_html_e( 'Pixel Pitch', 'zhongming' ); ?></span>
                            <strong style="font-size: 14px; font-weight: 700; color: var(--color-text);"><?php echo is_numeric($pitch) ? esc_html($pitch) . ' mm' : esc_html(zm_translate_spec_val($pitch)); ?></strong>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Spec Card 2: Cabinet / Panel Size -->
                    <?php if ( zm_is_valid_spec( $cabinet ) || zm_is_valid_spec( $panel_size ) ) : ?>
                    <div class="quick-spec-card" style="border: 1px solid var(--color-border); border-radius: 6px; padding: 12px 16px; background-color: var(--color-bg-2); transition: all 0.2s ease-in-out; display: flex; align-items: center; gap: 12px;">
                        <div class="spec-card-icon" style="color: var(--color-accent-blue, #0057b8); opacity: 0.85;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line><line x1="15" y1="3" x2="15" y2="21"></line><line x1="3" y1="9" x2="21" y2="9"></line><line x1="3" y1="15" x2="21" y2="15"></line></svg>
                        </div>
                        <div>
                            <span style="font-size: 11px; font-weight: 500; color: var(--color-text-3); text-transform: uppercase; letter-spacing: 0.5px; display: block;">
                                <?php 
                                if (zm_is_valid_spec($cabinet)) {
                                    zm_te('Cabinet Size', '箱体尺寸');
                                } else {
                                    zm_te('Panel Size', '模组尺寸');
                                }
                                ?>
                            </span>
                            <strong style="font-size: 14px; font-weight: 700; color: var(--color-text);">
                                <?php 
                                if (zm_is_valid_spec($cabinet)) {
                                    echo esc_html(zm_translate_spec_val($cabinet));
                                } else {
                                    echo esc_html(zm_translate_spec_val($panel_size));
                                }
                                ?>
                            </strong>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Spec Card 3: Brightness -->
                    <?php if ( zm_is_valid_spec( $brightness ) ) : ?>
                    <div class="quick-spec-card" style="border: 1px solid var(--color-border); border-radius: 6px; padding: 12px 16px; background-color: var(--color-bg-2); transition: all 0.2s ease-in-out; display: flex; align-items: center; gap: 12px;">
                        <div class="spec-card-icon" style="color: var(--color-accent-blue, #0057b8); opacity: 0.85;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></svg>
                        </div>
                        <div>
                            <span style="font-size: 11px; font-weight: 500; color: var(--color-text-3); text-transform: uppercase; letter-spacing: 0.5px; display: block;"><?php esc_html_e( 'Brightness', 'zhongming' ); ?></span>
                            <strong style="font-size: 14px; font-weight: 700; color: var(--color-text);"><?php echo esc_html(zm_translate_spec_val($brightness)); ?></strong>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Spec Card 4: Refresh Rate -->
                    <?php if ( zm_is_valid_spec( $refresh ) ) : ?>
                    <div class="quick-spec-card" style="border: 1px solid var(--color-border); border-radius: 6px; padding: 12px 16px; background-color: var(--color-bg-2); transition: all 0.2s ease-in-out; display: flex; align-items: center; gap: 12px;">
                        <div class="spec-card-icon" style="color: var(--color-accent-blue, #0057b8); opacity: 0.85;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 4v6h-6M1 20v-6h6"></path><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                        </div>
                        <div>
                            <span style="font-size: 11px; font-weight: 500; color: var(--color-text-3); text-transform: uppercase; letter-spacing: 0.5px; display: block;"><?php esc_html_e( 'Refresh Rate', 'zhongming' ); ?></span>
                            <strong style="font-size: 14px; font-weight: 700; color: var(--color-text);"><?php echo esc_html(zm_translate_spec_val($refresh)); ?></strong>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Spec Card 5: Cabinet / Panel Resolution -->
                    <?php if ( zm_is_valid_spec( $cab_res ) || zm_is_valid_spec( $panel_res ) ) : ?>
                    <div class="quick-spec-card" style="border: 1px solid var(--color-border); border-radius: 6px; padding: 12px 16px; background-color: var(--color-bg-2); transition: all 0.2s ease-in-out; display: flex; align-items: center; gap: 12px;">
                        <div class="spec-card-icon" style="color: var(--color-accent-blue, #0057b8); opacity: 0.85;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                        </div>
                        <div>
                            <span style="font-size: 11px; font-weight: 500; color: var(--color-text-3); text-transform: uppercase; letter-spacing: 0.5px; display: block;">
                                <?php 
                                if (zm_is_valid_spec($cab_res)) {
                                    zm_te('Resolution', '分辨率');
                                } else {
                                    zm_te('Panel Resolution', '模组分辨率');
                                }
                                ?>
                            </span>
                            <strong style="font-size: 14px; font-weight: 700; color: var(--color-text);">
                                <?php 
                                if (zm_is_valid_spec($cab_res)) {
                                    echo esc_html(zm_translate_spec_val($cab_res));
                                } else {
                                    echo esc_html(zm_translate_spec_val($panel_res));
                                }
                                ?>
                            </strong>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Spec Card 6: Lifespan -->
                    <?php if ( zm_is_valid_spec( $lifespan ) ) : ?>
                    <div class="quick-spec-card" style="border: 1px solid var(--color-border); border-radius: 6px; padding: 12px 16px; background-color: var(--color-bg-2); transition: all 0.2s ease-in-out; display: flex; align-items: center; gap: 12px;">
                        <div class="spec-card-icon" style="color: var(--color-accent-blue, #0057b8); opacity: 0.85;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        </div>
                        <div>
                            <span style="font-size: 11px; font-weight: 500; color: var(--color-text-3); text-transform: uppercase; letter-spacing: 0.5px; display: block;"><?php esc_html_e( 'Lifespan', 'zhongming' ); ?></span>
                            <strong style="font-size: 14px; font-weight: 700; color: var(--color-text);"><?php echo esc_html(zm_translate_spec_val($lifespan)); ?></strong>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                </div>
                
                <!-- CTA buttons block -->
                <div class="product-cta-buttons" style="display: flex; gap: 16px; margin-top: 10px; align-items: center;">
                    <a href="<?php echo esc_url( zhongming_get_contact_url() . '?product_title=' . urlencode( html_entity_decode( get_the_title() ) ) ); ?>" class="btn btn-primary" style="flex: 1.2; justify-content: center; height: 48px; border-radius: 4px; font-size: 15px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.8px; text-decoration: none; display: inline-flex; align-items: center; background-color: var(--color-accent-blue, #0057b8) !important; border-color: var(--color-accent-blue, #0057b8) !important; color: #ffffff !important; transition: var(--transition);">
                        <?php esc_html_e( 'Request a Quote →', 'zhongming' ); ?>
                    </a>
                    
                    <?php if ( ! empty( $datasheet_url ) ) : ?>
                        <a href="<?php echo esc_url( $datasheet_url ); ?>" class="btn btn-outline" download style="flex: 1; justify-content: center; height: 48px; border-radius: 4px; font-size: 14px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; background-color: #ffffff !important; border: 1px solid var(--color-accent-blue, #0057b8) !important; color: var(--color-accent-blue, #0057b8) !important; transition: var(--transition);" target="_blank">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 6px;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3"></path></svg>
                            <?php esc_html_e( 'Datasheet PDF', 'zhongming' ); ?>
                        </a>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>

        <!-- 5-Tab Content Navigation System -->
        <div class="product-tabs-section" style="margin-top: 80px; border-top: 1px solid var(--color-border); padding-top: 40px;">
            
            <!-- Tab Headers Navigation -->
            <div class="tabs-nav-bar" style="display: flex; gap: 4px; border-bottom: 2px solid var(--color-border); margin-bottom: 30px; flex-wrap: wrap; justify-content: start;">
                <button class="tab-nav-btn active" data-tab="specs" style="background: none; border: none; padding: 14px 24px; font-size: 14px; font-weight: 700; color: var(--color-text-2); cursor: pointer; border-bottom: 3px solid transparent; transition: all 0.2s ease-in-out; margin-bottom: -2px; outline: none;">
                    <?php esc_html_e( 'Specifications', 'zhongming' ); ?>
                </button>
                <button class="tab-nav-btn" data-tab="details" style="background: none; border: none; padding: 14px 24px; font-size: 14px; font-weight: 700; color: var(--color-text-2); cursor: pointer; border-bottom: 3px solid transparent; transition: all 0.2s ease-in-out; margin-bottom: -2px; outline: none;">
                    <?php esc_html_e( 'Details', 'zhongming' ); ?>
                </button>
                <button class="tab-nav-btn" data-tab="features" style="background: none; border: none; padding: 14px 24px; font-size: 14px; font-weight: 700; color: var(--color-text-2); cursor: pointer; border-bottom: 3px solid transparent; transition: all 0.2s ease-in-out; margin-bottom: -2px; outline: none;">
                    <?php esc_html_e( 'Key Features', 'zhongming' ); ?>
                </button>
                <button class="tab-nav-btn" data-tab="installation" style="background: none; border: none; padding: 14px 24px; font-size: 14px; font-weight: 700; color: var(--color-text-2); cursor: pointer; border-bottom: 3px solid transparent; transition: all 0.2s ease-in-out; margin-bottom: -2px; outline: none;">
                    <?php esc_html_e( 'Installation', 'zhongming' ); ?>
                </button>
                <button class="tab-nav-btn" data-tab="applications" style="background: none; border: none; padding: 14px 24px; font-size: 14px; font-weight: 700; color: var(--color-text-2); cursor: pointer; border-bottom: 3px solid transparent; transition: all 0.2s ease-in-out; margin-bottom: -2px; outline: none;">
                    <?php esc_html_e( 'Applications', 'zhongming' ); ?>
                </button>
                <button class="tab-nav-btn" data-tab="series" style="background: none; border: none; padding: 14px 24px; font-size: 14px; font-weight: 700; color: var(--color-text-2); cursor: pointer; border-bottom: 3px solid transparent; transition: all 0.2s ease-in-out; margin-bottom: -2px; outline: none;">
                    <?php esc_html_e( 'Series Models', 'zhongming' ); ?>
                </button>
            </div>
            
            <!-- Tab Contents Wrapper -->
            <div class="tabs-content-panels" style="min-height: 200px;">
                
                <!-- Tab Panel 1: Full Specifications -->
                <div class="tab-panel active" id="tab-specs">
                    <h3 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin-bottom: 20px;"><?php esc_html_e( 'Technical Specifications Table', 'zhongming' ); ?></h3>
                    <div class="specs-table-container" style="border: 1px solid var(--color-border); border-radius: 6px; overflow: hidden;">
                        <table class="specs-data-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px; color: var(--color-text);">
                            <thead>
                                <tr style="background-color: var(--color-bg-2); border-bottom: 1px solid var(--color-border);">
                                    <th style="padding: 14px 20px; font-weight: 700; width: 30%;"><?php esc_html_e( 'Parameter', 'zhongming' ); ?></th>
                                    <th style="padding: 14px 20px; font-weight: 700;"><?php esc_html_e( 'Value / Details', 'zhongming' ); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Define all parameter rows to inspect
                                $specs_rows = array(
                                    'product_series'          => __( 'Product Series', 'zhongming' ),
                                    'product_model'           => __( 'Product Model', 'zhongming' ),
                                    'pixel_pitch_mm'          => __( 'Pixel Pitch (mm)', 'zhongming' ),
                                    'technology'              => __( 'LED Splicing Technology', 'zhongming' ),
                                    'panel_size_mm'           => __( 'Panel/Module Size (mm)', 'zhongming' ),
                                    'panel_resolution'        => __( 'Panel/Module Resolution', 'zhongming' ),
                                    'pixel_density'           => __( 'Pixel Density (dots/m²)', 'zhongming' ),
                                    'cabinet_size_mm'         => __( 'Cabinet Dimensions', 'zhongming' ),
                                    'cabinet_resolution'      => __( 'Cabinet Resolution', 'zhongming' ),
                                    'cabinet_weight_kg'       => __( 'Cabinet Weight (kg)', 'zhongming' ),
                                    'brightness_nit'          => __( 'Brightness Rating', 'zhongming' ),
                                    'refresh_rate_hz'         => __( 'Refresh Rate (Hz)', 'zhongming' ),
                                    'grayscale_bit'           => __( 'Grayscale (bit)', 'zhongming' ),
                                    'horizontal_view_angle'   => __( 'Horizontal Viewing Angle', 'zhongming' ),
                                    'vertical_view_angle'     => __( 'Vertical Viewing Angle', 'zhongming' ),
                                    'color_temp_k'            => __( 'Color Temperature (K)', 'zhongming' ),
                                    'best_viewing_distance'   => __( 'Optimal Viewing Distance', 'zhongming' ),
                                    'ip_rating'               => __( 'Ingress Protection (IP)', 'zhongming' ),
                                    'maintenance_type'        => __( 'Maintenance Access Type', 'zhongming' ),
                                    'max_power_w_m2'          => __( 'Max Power Consumption (W/m²)', 'zhongming' ),
                                    'avg_power_w_m2'          => __( 'Average Power Consumption (W/m²)', 'zhongming' ),
                                    'working_temp'            => __( 'Operating Temperature Range', 'zhongming' ),
                                    'working_humidity'        => __( 'Working Humidity Level', 'zhongming' ),
                                    'lifespan_hours'          => __( 'Diode Operational Lifespan', 'zhongming' ),
                                );
                                
                                $row_count = 0;
                                foreach ( $specs_rows as $key => $label ) {
                                    $val = get_field( $key, $post->ID );
                                    if ( zm_is_valid_spec( $val ) ) {
                                        $row_style = $row_count % 2 === 1 ? ' style="background-color: var(--color-bg-2); border-bottom: 1px solid var(--color-border);"' : ' style="border-bottom: 1px solid var(--color-border);"';
                                        
                                        // Unit adjustments in table representation
                                        if ( $key === 'pixel_pitch_mm' && is_numeric($val) ) {
                                            $val .= ' mm';
                                        } else {
                                            $val = zm_translate_spec_val($val);
                                        }
                                        
                                        echo '<tr' . $row_style . '>';
                                        echo '<td style="padding: 12px 20px; font-weight: 600; color: var(--color-text-2);">' . esc_html( $label ) . '</td>';
                                        echo '<td style="padding: 12px 20px; font-weight: 500;">' . esc_html( $val ) . '</td>';
                                        echo '</tr>';
                                        $row_count++;
                                    }
                                }
                                
                                if ( $row_count === 0 ) {
                                    echo '<tr><td colspan="2" style="padding: 20px; text-align: center; color: var(--color-text-3);">' . esc_html__( 'Detailed specifications will be updated soon.', 'zhongming' ) . '</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Tab Panel: Details -->
                <div class="tab-panel" id="tab-details" style="display: none;">
                    <h3 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin-bottom: 20px;"><?php esc_html_e( 'Product Details', 'zhongming' ); ?></h3>
                    <div class="product-details-content" style="font-size: 14px; line-height: 1.7; color: var(--color-text-2);">
                        <?php 
                        $product_details = get_field('product_details', $post->ID);
                        if (!empty($product_details)) {
                            echo wp_kses_post(wpautop($product_details));
                        } else {
                            // Fallback: display standard post content
                            the_content();
                        }
                        ?>
                    </div>
                </div>
                
                <!-- Tab Panel 2: Key Features -->
                <div class="tab-panel" id="tab-features" style="display: none;">
                    <h3 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin-bottom: 20px;"><?php esc_html_e( 'Outstanding Product Features', 'zhongming' ); ?></h3>
                    
                    <?php 
                    $features = get_field( 'key_features', $post->ID );
                    if ( ! empty( $features ) && is_array( $features ) ) : 
                    ?>
                        <div class="features-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
                            <?php foreach ( $features as $feat ) : ?>
                                <div class="feature-card" style="border: 1px solid var(--color-border); border-radius: 8px; padding: 24px; background-color: #ffffff; box-shadow: 0 2px 8px rgba(0,0,0,0.02); transition: all 0.2s ease-in-out; border-top: 3px solid var(--color-accent-blue, #0057b8);">
                                    <h4 style="font-size: 16px; font-weight: 700; color: var(--color-text); margin-bottom: 12px;"><?php echo esc_html( $feat['title'] ); ?></h4>
                                    <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin: 0;"><?php echo esc_html( $feat['description'] ); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <!-- Gorgeous fallbacks for key features -->
                        <div class="features-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
                            <div class="feature-card" style="border: 1px solid var(--color-border); border-radius: 8px; padding: 24px; background-color: #ffffff; box-shadow: 0 2px 8px rgba(0,0,0,0.02); border-top: 3px solid var(--color-accent-blue, #0057b8);">
                                <h4 style="font-size: 16px; font-weight: 700; color: var(--color-text); margin-bottom: 12px;"><?php esc_html_e( 'Seamless Splicing', 'zhongming' ); ?></h4>
                                <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin: 0;"><?php esc_html_e( 'Precision-machined structures ensure perfectly aligned gaps and seamless screen surfaces for premium imagery.', 'zhongming' ); ?></p>
                            </div>
                            <div class="feature-card" style="border: 1px solid var(--color-border); border-radius: 8px; padding: 24px; background-color: #ffffff; box-shadow: 0 2px 8px rgba(0,0,0,0.02); border-top: 3px solid var(--color-accent-blue, #0057b8);">
                                <h4 style="font-size: 16px; font-weight: 700; color: var(--color-text); margin-bottom: 12px;"><?php esc_html_e( 'Super High Contrast', 'zhongming' ); ?></h4>
                                <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin: 0;"><?php esc_html_e( 'Excellent black LED mask integration delivers ultra-deep blacks and vibrant brightness levels for dynamic pictures.', 'zhongming' ); ?></p>
                            </div>
                            <div class="feature-card" style="border: 1px solid var(--color-border); border-radius: 8px; padding: 24px; background-color: #ffffff; box-shadow: 0 2px 8px rgba(0,0,0,0.02); border-top: 3px solid var(--color-accent-blue, #0057b8);">
                                <h4 style="font-size: 16px; font-weight: 700; color: var(--color-text); margin-bottom: 12px;"><?php esc_html_e( 'Broad Viewing Angle', 'zhongming' ); ?></h4>
                                <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin: 0;"><?php esc_html_e( 'Up to 160 degree viewing angles without brightness degradation or color distortion in multi-perspective displays.', 'zhongming' ); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Tab Panel 3: Installation Methods -->
                <div class="tab-panel" id="tab-installation" style="display: none;">
                    <h3 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin-bottom: 20px;"><?php esc_html_e( 'Recommended Installation Methods', 'zhongming' ); ?></h3>
                    
                    <?php
                    $install_active = get_field( 'installation_methods', $post->ID );
                    if ( ! is_array( $install_active ) ) {
                        $install_active = array();
                    }
                    
                    // Map of exact keys defined in ACF group_product_specs
                    $all_install_methods = array(
                        'hanging'        => array(
                            'title' => __( 'Hanging Installation', 'zhongming' ),
                            'desc'  => __( 'Suspended from ceilings using dedicated rigging beams. Ideal for stage rental, events, and shopping malls.', 'zhongming' ),
                        ),
                        'inlaid'         => array(
                            'title' => __( 'Inlaid / Recessed Installation', 'zhongming' ),
                            'desc'  => __( 'Embedded directly into a wall recess. Saves space and delivers a seamless, clean architectural integration.', 'zhongming' ),
                        ),
                        'wall-mounted'   => array(
                            'title' => __( 'Wall-mounted Installation', 'zhongming' ),
                            'desc'  => __( 'Mounted flat against solid walls with back frames. Highly popular for corporate lobbies and conference screens.', 'zhongming' ),
                        ),
                        'floor-standing' => array(
                            'title' => __( 'Floor-standing Installation', 'zhongming' ),
                            'desc'  => __( 'Supported by base frames standing directly on the floor. Perfect for exhibitions and creative display structures.', 'zhongming' ),
                        )
                    );

                    // Customize description for Film Screens
                    $is_film_screen = ( stripos( $series_label, 'Film' ) !== false || stripos( $series_label, '贴膜' ) !== false );
                    if ( $is_film_screen ) {
                        $all_install_methods = array(
                            'hanging'        => array(
                                'title' => zm_t( 'Hanging Installation', '吊装' ),
                                'desc'  => zm_t( 'Unsupported for film screens. Adhesive film screens require solid glass backing.', '贴膜屏不支持传统吊装，需贴附在玻璃表面。' ),
                            ),
                            'inlaid'         => array(
                                'title' => zm_t( 'Glass Frame Inlaid', '玻璃龙骨嵌入安装' ),
                                'desc'  => zm_t( 'Adhered directly to the inside of glass and embedded in structural frames, providing seamless integration with glass curtain walls.', '直接贴附于玻璃内侧并嵌入龙骨，提供无缝、整洁的玻璃幕墙融合。' ),
                            ),
                            'wall-mounted'   => array(
                                'title' => zm_t( 'Glass Surface Adhesive Mounting', '玻璃表面贴附安装' ),
                                'desc'  => zm_t( 'Pasted directly onto clean glass surfaces using built-in high-adhesion optical glue, requiring no steel structure, extremely thin.', '通过自带的高粘性光学胶直接贴附在清洁的玻璃表面，无需钢结构，极其轻薄美观。' ),
                            ),
                            'floor-standing' => array(
                                'title' => zm_t( 'Floor-standing Installation', '落地式安装' ),
                                'desc'  => zm_t( 'Unsupported for film screens. Film screens are designed specifically for glass pasting and do not support floor structures.', '贴膜屏不支持落地式支架安装，专为玻璃贴附设计。' ),
                            )
                        );
                    }

                    // Customize description for Transparent Screens
                    $is_transparent_screen = ( stripos( $series_label, 'Transparent' ) !== false || stripos( $series_label, '透明' ) !== false || stripos( $series_label, '格栅' ) !== false );
                    if ( $is_transparent_screen ) {
                        $all_install_methods = array(
                            'hanging'        => array(
                                'title' => zm_t( 'Facade Hanging', '玻璃幕墙吊装' ),
                                'desc'  => zm_t( 'Suspended behind glass curtain walls or mall atriums using dedicated rigging beams. Ideal for street-facing windows and high-altitude locations.', '使用专用吊装结构悬挂在玻璃幕墙内侧或商场中庭。非常适合临街橱窗及中庭高空采光位置。' ),
                            ),
                            'inlaid'         => array(
                                'title' => zm_t( 'Frame Inlaid', '龙骨嵌入安装' ),
                                'desc'  => zm_t( 'Embedded directly into window frames or steel structures of the glass curtain wall. Fully integrates with building structure and saves space.', '直接嵌入玻璃幕墙的窗框或钢结构龙骨中。与建筑结构融为一体，节省空间且极其整洁美观。' ),
                            ),
                            'wall-mounted'   => array(
                                'title' => zm_t( 'Structure Mounted', '幕墙支架固定安装' ),
                                'desc'  => zm_t( 'Mounted onto support structures behind glass curtain walls using dedicated brackets, keeping the display floating and transparent.', '通过专用支撑架固定安装在玻璃幕墙内侧钢架上，保持屏体悬空通透，不破坏原有墙体与采光。' ),
                            ),
                            'floor-standing' => array(
                                'title' => zm_t( 'Floor Base Supported', '落地底座支撑安装' ),
                                'desc'  => zm_t( 'Supported by custom base frames standing directly on the floor. Perfect for retail windows, showrooms, and exhibition spaces.', '通过立于地板上的底座架进行支撑固定。非常适合零售橱窗、展厅展示、以及临时舞台租赁活动。' ),
                            )
                        );
                    }
                    ?>
                    
                    <div class="install-methods-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px;">
                        <?php 
                        $has_any_install = false;
                        foreach ( $all_install_methods as $key => $data ) {
                            if ( in_array( $key, $install_active ) ) {
                                $has_any_install = true;
                                ?>
                                <div class="install-card" style="border-radius: 8px; padding: 24px; display: flex; gap: 16px; align-items: start; transition: all 0.2s ease-in-out; border: 2px solid var(--color-accent-blue, #0057b8); background-color: var(--color-bg-2);">
                                    <div class="install-icon-box" style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; background-color: var(--color-primary, #0057b8); color: #ffffff;">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                    <div class="install-details">
                                        <h4 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0 0 6px 0;">
                                            <?php echo esc_html( $data['title'] ); ?>
                                            <span style="font-size: 10px; font-weight: 700; color: #1a5c1a; background-color: #eaf5e8; border-radius: 3px; padding: 2px 6px; margin-left: 8px; text-transform: uppercase;"><?php esc_html_e( 'Recommended', 'zhongming' ); ?></span>
                                        </h4>
                                        <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.5; margin: 0;"><?php echo esc_html( $data['desc'] ); ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <?php if ( !$has_any_install ) : ?>
                        <div class="custom-installation-notice" style="border: 1px dashed var(--color-border); border-radius: 8px; padding: 32px; text-align: center; background-color: var(--color-bg-2);">
                            <div style="font-size: 40px; margin-bottom: 16px; color: var(--color-accent-blue, #0057b8); opacity: 0.85; display: flex; justify-content: center;">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                            </div>
                            <h4 style="font-size: 18px; font-weight: 700; color: var(--color-text); margin: 0 0 10px 0;">
                                <?php zm_te('Custom Engineering Structures Available', '支持定制化结构设计'); ?>
                            </h4>
                            <p style="font-size: 14px; color: var(--color-text-2); line-height: 1.6; max-width: 600px; margin: 0 auto 20px auto;">
                                <?php zm_te('This product supports tailored mechanical structures and installation designs. Please contact our professional engineering team to design a customized plan for your project.', '本产品支持定制化机械结构与安装方案设计。请联系我们的专业工程团队，为您量身定制专属的系统方案。'); ?>
                            </p>
                            <?php 
                            $contact_url = function_exists('zhongming_get_contact_url') ? zhongming_get_contact_url() : site_url('/contact');
                            $contact_url = esc_url($contact_url . '?product_title=' . urlencode(html_entity_decode(get_the_title())));
                            ?>
                            <a href="<?php echo $contact_url; ?>" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none; padding: 12px 24px; font-weight: 600; background-color: var(--color-accent-blue, #0057b8); border-color: var(--color-accent-blue, #0057b8); color: #ffffff; border-radius: 4px;">
                                <span><?php zm_te('Contact Engineering Team', '联系工程团队'); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Tab Panel 4: Applications -->
                <div class="tab-panel" id="tab-applications" style="display: none;">
                    <h3 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin-bottom: 20px;"><?php esc_html_e( 'Dynamic Application Fields', 'zhongming' ); ?></h3>
                    
                    <?php
                    $apps_active = get_field( 'applications', $post->ID );
                    if ( ! is_array( $apps_active ) ) {
                        $apps_active = array();
                    }
                    
                    // Standard B2B Application mapping
                    $all_apps = array(
                        'conference'   => array( 'title' => __( 'Conference Room', 'zhongming' ), 'emoji' => '🏢' ),
                        'broadcast'    => array( 'title' => __( 'Broadcast Studio', 'zhongming' ), 'emoji' => '🎥' ),
                        'security'     => array( 'title' => __( 'Security & Control', 'zhongming' ), 'emoji' => '🛡️' ),
                        'advertising'  => array( 'title' => __( 'Commercial Billboard', 'zhongming' ), 'emoji' => '📢' ),
                        'exhibition'   => array( 'title' => __( 'Exhibition & Showroom', 'zhongming' ), 'emoji' => '🖼️' ),
                        'retail'       => array( 'title' => __( 'Retail Window & Mall', 'zhongming' ), 'emoji' => '🛍️' ),
                        'stage-events' => array( 'title' => __( 'Stage & Events Rental', 'zhongming' ), 'emoji' => '🎭' ),
                        'tourism'      => array( 'title' => __( 'Tourism & Culture Display', 'zhongming' ), 'emoji' => '🌋' ),
                        'hotel'        => array( 'title' => __( 'Hotel & Lobby Screen', 'zhongming' ), 'emoji' => '🏨' ),
                        'mall'         => array( 'title' => __( 'Shopping Center Atrium', 'zhongming' ), 'emoji' => '🏬' ),
                    );
                    
                    // Filter to active apps
                    $active_display_list = array();
                    foreach ( $all_apps as $key => $data ) {
                        if ( in_array( $key, $apps_active ) ) {
                            $active_display_list[$key] = $data;
                        }
                    }
                    
                    // Fallback to exhibition, retail, conference if empty
                    if ( empty( $active_display_list ) ) {
                        $active_display_list = array(
                            'conference' => $all_apps['conference'],
                            'exhibition' => $all_apps['exhibition'],
                            'retail'     => $all_apps['retail'],
                        );
                    }
                    ?>
                    
                    <div class="apps-grid-detail" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
                        <?php foreach ( $active_display_list as $key => $data ) : ?>
                            <div class="app-detail-card" style="border: 1px solid var(--color-border); border-radius: 8px; padding: 20px; text-align: center; background-color: var(--color-bg-2); transition: all 0.2s ease-in-out;">
                                <div class="app-emoji-display" style="font-size: 32px; margin-bottom: 12px;"><?php echo esc_html( $data['emoji'] ); ?></div>
                                <h4 style="font-size: 14px; font-weight: 700; color: var(--color-text); margin: 0;"><?php echo esc_html( $data['title'] ); ?></h4>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Tab Panel 5: Series Models Comparison -->
                <div class="tab-panel" id="tab-series" style="display: none;">
                    <h3 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin-bottom: 20px;"><?php esc_html_e( 'Compare Series Siblings', 'zhongming' ); ?></h3>
                    
                    <?php
                    // Retrieve sibling products in series
                    $series_name = get_field( 'product_series', $post->ID );
                    $sibling_posts = get_field( 'series_siblings', $post->ID );

                    $series_query_posts = array();

                    if ( ! empty( $sibling_posts ) && is_array( $sibling_posts ) ) {
                        foreach ( $sibling_posts as $sib ) {
                            if ( is_object( $sib ) && isset( $sib->ID ) ) {
                                $series_query_posts[] = $sib;
                            } elseif ( is_numeric( $sib ) ) {
                                $post_obj = get_post( $sib );
                                if ( $post_obj ) {
                                    $series_query_posts[] = $post_obj;
                                }
                            }
                        }
                    }

                    if ( empty( $series_query_posts ) && ! empty( $series_name ) ) {
                        $siblings_query = new WP_Query( array(
                            'post_type'      => 'product',
                            'posts_per_page' => 10,
                            'post__not_in'   => array( $post->ID ),
                            'meta_query'     => array(
                                array(
                                    'key'     => 'product_series',
                                    'value'   => $series_name,
                                    'compare' => '='
                                )
                            )
                        ) );
                        if ( $siblings_query->have_posts() ) {
                            $series_query_posts = $siblings_query->posts;
                        }
                        wp_reset_postdata();
                    }
                    ?>
                    
                    <?php
                    // Initialize comparison column flags
                    $show_pitch = false;
                    $show_cabinet = false;
                    $show_brightness = false;
                    $show_ip = false;

                    // Check current post values
                    if ( zm_is_valid_spec( $pitch ) ) $show_pitch = true;
                    if ( zm_is_valid_spec( $cabinet ) || zm_is_valid_spec( $panel_size ) ) $show_cabinet = true;
                    if ( zm_is_valid_spec( $brightness ) ) $show_brightness = true;
                    if ( zm_is_valid_spec( $ip_rating ) ) $show_ip = true;

                    // Check sibling values
                    if ( ! empty( $series_query_posts ) ) {
                        foreach ( $series_query_posts as $sib_post ) {
                            $sib_pitch = get_field( 'pixel_pitch_mm', $sib_post->ID );
                            $sib_cabinet = get_field( 'cabinet_size_mm', $sib_post->ID );
                            $sib_panel = get_field( 'panel_size_mm', $sib_post->ID );
                            $sib_brightness = get_field( 'brightness_nit', $sib_post->ID );
                            $sib_ip = get_field( 'ip_rating', $sib_post->ID );
                            
                            if ( zm_is_valid_spec( $sib_pitch ) ) $show_pitch = true;
                            if ( zm_is_valid_spec( $sib_cabinet ) || zm_is_valid_spec( $sib_panel ) ) $show_cabinet = true;
                            if ( zm_is_valid_spec( $sib_brightness ) ) $show_brightness = true;
                            if ( zm_is_valid_spec( $sib_ip ) ) $show_ip = true;
                        }
                    }

                    // Check if we should label it "Cabinet Size" or "Panel Size"
                    $cabinet_column_label = __( 'Cabinet Size', 'zhongming' );
                    if ( $show_cabinet ) {
                        $has_any_cabinet = zm_is_valid_spec( $cabinet );
                        if ( ! $has_any_cabinet && ! empty( $series_query_posts ) ) {
                            foreach ( $series_query_posts as $sib_post ) {
                                $sib_cabinet = get_field( 'cabinet_size_mm', $sib_post->ID );
                                if ( zm_is_valid_spec( $sib_cabinet ) ) {
                                    $has_any_cabinet = true;
                                    break;
                                }
                            }
                        }
                        if ( ! $has_any_cabinet ) {
                            $cabinet_column_label = __( 'Panel Size', 'zhongming' );
                        }
                    }
                    ?>
                    <div class="series-models-table-container" style="border: 1px solid var(--color-border); border-radius: 6px; overflow: hidden;">
                        <table class="specs-data-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13px; color: var(--color-text);">
                            <thead>
                                <tr style="background-color: var(--color-bg-2); border-bottom: 1px solid var(--color-border);">
                                    <th style="padding: 14px 16px; font-weight: 700;"><?php esc_html_e( 'Model / Product Name', 'zhongming' ); ?></th>
                                    <?php if ( $show_pitch ) : ?>
                                        <th style="padding: 14px 16px; font-weight: 700;"><?php esc_html_e( 'Pixel Pitch', 'zhongming' ); ?></th>
                                    <?php endif; ?>
                                    <?php if ( $show_cabinet ) : ?>
                                        <th style="padding: 14px 16px; font-weight: 700;"><?php echo esc_html( $cabinet_column_label ); ?></th>
                                    <?php endif; ?>
                                    <?php if ( $show_brightness ) : ?>
                                        <th style="padding: 14px 16px; font-weight: 700;"><?php esc_html_e( 'Brightness', 'zhongming' ); ?></th>
                                    <?php endif; ?>
                                    <?php if ( $show_ip ) : ?>
                                        <th style="padding: 14px 16px; font-weight: 700;"><?php esc_html_e( 'IP Protection', 'zhongming' ); ?></th>
                                    <?php endif; ?>
                                    <th style="padding: 14px 16px; font-weight: 700; text-align: center;"><?php esc_html_e( 'Actions', 'zhongming' ); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Current Model Row -->
                                <tr style="background-color: #f0f7ff; border-bottom: 1px solid #cce2ff; font-weight: 600;">
                                    <td style="padding: 12px 16px; color: var(--color-accent-blue, #0057b8);">
                                        <?php the_title(); ?>
                                        <span style="font-size: 10px; font-weight: 700; color: #004085; background-color: #cce5ff; border-radius: 3px; padding: 2px 6px; margin-left: 8px; text-transform: uppercase;"><?php esc_html_e( 'Current', 'zhongming' ); ?></span>
                                    </td>
                                    <?php if ( $show_pitch ) : ?>
                                        <td style="padding: 12px 16px;"><?php echo zm_is_valid_spec($pitch) ? (is_numeric($pitch) ? esc_html($pitch) . 'mm' : esc_html(zm_translate_spec_val($pitch))) : '—'; ?></td>
                                    <?php endif; ?>
                                    <?php if ( $show_cabinet ) : ?>
                                        <td style="padding: 12px 16px;">
                                            <?php 
                                            $size_val = zm_is_valid_spec($cabinet) ? $cabinet : $panel_size;
                                            echo zm_is_valid_spec($size_val) ? esc_html(zm_translate_spec_val($size_val)) : '—'; 
                                            ?>
                                        </td>
                                    <?php endif; ?>
                                    <?php if ( $show_brightness ) : ?>
                                        <td style="padding: 12px 16px;"><?php echo zm_is_valid_spec($brightness) ? esc_html(zm_translate_spec_val($brightness)) : '—'; ?></td>
                                    <?php endif; ?>
                                    <?php if ( $show_ip ) : ?>
                                        <td style="padding: 12px 16px;"><?php echo zm_is_valid_spec($ip_rating) ? esc_html(zm_translate_spec_val($ip_rating)) : '—'; ?></td>
                                    <?php endif; ?>
                                    <td style="padding: 12px 16px; text-align: center; color: var(--color-text-3);">—</td>
                                </tr>
                                
                                <?php 
                                if ( ! empty( $series_query_posts ) ) :
                                    foreach ( $series_query_posts as $sib_post ) :
                                        $sib_pitch = get_field( 'pixel_pitch_mm', $sib_post->ID );
                                        $sib_cabinet = get_field( 'cabinet_size_mm', $sib_post->ID );
                                        $sib_panel = get_field( 'panel_size_mm', $sib_post->ID );
                                        $sib_brightness = get_field( 'brightness_nit', $sib_post->ID );
                                        $sib_ip = get_field( 'ip_rating', $sib_post->ID );
                                        ?>
                                        <tr style="border-bottom: 1px solid var(--color-border);">
                                            <td style="padding: 12px 16px; font-weight: 600;">
                                                <a href="<?php echo esc_url( get_permalink( $sib_post->ID ) ); ?>" style="color: var(--color-text); text-decoration: none; transition: var(--transition);">
                                                    <?php echo esc_html( $sib_post->post_title ); ?>
                                                </a>
                                            </td>
                                            <?php if ( $show_pitch ) : ?>
                                                <td style="padding: 12px 16px;"><?php echo zm_is_valid_spec($sib_pitch) ? (is_numeric($sib_pitch) ? esc_html($sib_pitch) . 'mm' : esc_html(zm_translate_spec_val($sib_pitch))) : '—'; ?></td>
                                            <?php endif; ?>
                                            <?php if ( $show_cabinet ) : ?>
                                                <td style="padding: 12px 16px;">
                                                    <?php 
                                                    $sib_size_val = zm_is_valid_spec($sib_cabinet) ? $sib_cabinet : $sib_panel;
                                                    echo zm_is_valid_spec($sib_size_val) ? esc_html(zm_translate_spec_val($sib_size_val)) : '—'; 
                                                    ?>
                                                </td>
                                            <?php endif; ?>
                                            <?php if ( $show_brightness ) : ?>
                                                <td style="padding: 12px 16px;"><?php echo zm_is_valid_spec($sib_brightness) ? esc_html(zm_translate_spec_val($sib_brightness)) : '—'; ?></td>
                                            <?php endif; ?>
                                            <?php if ( $show_ip ) : ?>
                                                <td style="padding: 12px 16px;"><?php echo zm_is_valid_spec($sib_ip) ? esc_html(zm_translate_spec_val($sib_ip)) : '—'; ?></td>
                                            <?php endif; ?>
                                            <td style="padding: 12px 16px; text-align: center;">
                                                <a href="<?php echo esc_url( get_permalink( $sib_post->ID ) ); ?>" style="font-size: 11px; font-weight: 700; color: var(--color-accent-blue, #0057b8); text-decoration: underline; text-transform: uppercase;">
                                                    <?php esc_html_e( 'Compare', 'zhongming' ); ?>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php 
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            
            <!-- JavaScript Tab Switcher -->
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tabBtns = document.querySelectorAll('.tab-nav-btn');
                const tabPanels = document.querySelectorAll('.tab-panel');
                
                tabBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const targetTab = this.dataset.tab;
                        
                        // Set active header
                        tabBtns.forEach(b => b.classList.remove('active'));
                        this.classList.add('active');
                        
                        // Set active content panel
                        tabPanels.forEach(panel => {
                            if (panel.id === 'tab-' + targetTab) {
                                panel.style.display = 'block';
                            } else {
                                panel.style.display = 'none';
                            }
                        });
                    });
                });
            });
            </script>
            
        </div>

        <!-- Related Products Section (Bottom, 4 Items in Row) -->
        <?php
        $related_args = array(
            'post_type'      => 'product',
            'posts_per_page' => 4,
            'post__not_in'   => array( $post->ID ),
            'orderby'        => 'rand'
        );
        
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            $related_args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_category',
                    'field'    => 'term_id',
                    'terms'    => array( $terms[0]->term_id )
                )
            );
        }
        
        $related_query = new WP_Query( $related_args );
        if ( $related_query->have_posts() ) :
        ?>
            <div class="single-product-related" style="margin-top: 90px; border-top: 1px solid var(--color-border); padding-top: 60px;">
                <h3 style="font-size: 24px; font-weight: 700; color: var(--color-text); text-align: center; margin-bottom: 40px;"><?php esc_html_e( 'Related LED Screens', 'zhongming' ); ?></h3>
                
                <div class="product-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px;">
                    <?php 
                    while ( $related_query->have_posts() ) : $related_query->the_post(); 
                        $rel_pitch = get_field( 'pixel_pitch_mm' );
                        $rel_cabinet = get_field( 'cabinet_size_mm' );
                        $rel_brightness = get_field( 'brightness_nit' );
                        $rel_view_dist = get_field( 'best_viewing_distance' );
                        
                        $rel_badge_raw = get_field( 'badge_type' );
                        $rel_badge = is_array( $rel_badge_raw ) ? ( isset( $rel_badge_raw['value'] ) ? $rel_badge_raw['value'] : '' ) : $rel_badge_raw;
                        
                        $rel_badge_class = '';
                        $rel_badge_text = '';
                        if ( ! empty( $rel_badge ) ) {
                            switch ( $rel_badge ) {
                                case 'indoor':
                                    $rel_badge_class = 'badge-indoor';
                                    $rel_badge_text = zm_t( 'Indoor', '室内' );
                                    break;
                                case 'outdoor':
                                    $rel_badge_class = 'badge-outdoor';
                                    $rel_badge_text = zm_t( 'Outdoor', '户外' );
                                    break;
                                case 'special':
                                    $rel_badge_class = 'badge-special';
                                    $rel_badge_text = zm_t( 'Special', '创意' );
                                    break;
                                case 'rental':
                                    $rel_badge_class = 'badge-rental';
                                    $rel_badge_text = zm_t( 'Rental', '租赁' );
                                    break;
                            }
                        }
                        ?>
                        <article class="product-card" style="background-color: #ffffff; border: 1px solid #e0ddd8; border-radius: 4px; overflow: hidden; display: flex; flex-direction: column; height: 100%; transition: all 0.2s ease-in-out;">
                            <div class="product-card-img" style="aspect-ratio: 4/3; position: relative; overflow: hidden; background-color: var(--color-bg-2);">
                                <a href="<?php the_permalink(); ?>" style="display: block; width: 100%; height: 100%;">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'medium', array( 'class' => 'product-img', 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
                                    <?php else : ?>
                                        <div class="product-image-fallback" style="display: flex; align-items: center; justify-content: center; height: 100%; background-color: var(--color-bg-2); color: var(--color-text-3);">
                                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" style="opacity: 0.6;"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect><line x1="7" y1="2" x2="7" y2="22"></line><line x1="17" y1="2" x2="17" y2="22"></line><line x1="2" y1="12" x2="22" y2="12"></line><line x1="2" y1="7" x2="22" y2="7"></line><line x1="2" y1="17" x2="22" y2="17"></line></svg>
                                        </div>
                                    <?php endif; ?>
                                </a>
                                <?php if ( ! empty( $rel_badge_text ) ) : ?>
                                    <span class="badge <?php echo esc_attr( $rel_badge_class ); ?>" style="position: absolute; top: 12px; left: 12px; font-size: 10px; font-weight: 700; padding: 4px 10px; border-radius: 3px; text-transform: uppercase;">
                                        <?php echo esc_html( $rel_badge_text ); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="product-info" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1; gap: 12px;">
                                <h3 style="font-size: 15px; font-weight: 700; line-height: 1.4; margin: 0; min-height: 42px;">
                                    <a href="<?php the_permalink(); ?>" style="color: var(--color-text); text-decoration: none;"><?php the_title(); ?></a>
                                </h3>
                                
                                <ul class="product-specs" style="list-style: none; margin: 0; padding: 0; display: flex; flex-direction: column; gap: 6px;">
                                    <?php if ( ! empty( $rel_pitch ) && $rel_pitch !== '—' && $rel_pitch !== '-' ) : ?>
                                        <li style="display: flex; justify-content: space-between; font-size: 11px;">
                                            <span class="spec-label" style="color: var(--color-text-3);"><?php esc_html_e( 'Pixel Pitch:', 'zhongming' ); ?></span>
                                            <strong class="spec-value" style="color: var(--color-text); font-weight: 600;"><?php echo esc_html( $rel_pitch ); ?>mm</strong>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $rel_cabinet ) && $rel_cabinet !== '—' && $rel_cabinet !== '-' ) : ?>
                                        <li style="display: flex; justify-content: space-between; font-size: 11px;">
                                            <span class="spec-label" style="color: var(--color-text-3);"><?php esc_html_e( 'Cabinet:', 'zhongming' ); ?></span>
                                            <strong class="spec-value" style="color: var(--color-text); font-weight: 600; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; max-width: 65%;"><?php echo esc_html( $rel_cabinet ); ?></strong>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $rel_brightness ) && $rel_brightness !== '—' && $rel_brightness !== '-' ) : ?>
                                        <li style="display: flex; justify-content: space-between; font-size: 11px;">
                                            <span class="spec-label" style="color: var(--color-text-3);"><?php esc_html_e( 'Brightness:', 'zhongming' ); ?></span>
                                            <strong class="spec-value" style="color: var(--color-text); font-weight: 600;"><?php echo esc_html( $rel_brightness ); ?> nit</strong>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                                
                                <div class="product-btns" style="display: flex; gap: 8px; margin-top: auto; padding-top: 10px;">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="flex: 1; justify-content: center; padding: 8px 12px; font-size: 12px; background-color: #ffffff !important; border: 1px solid var(--color-accent-blue, #0057b8) !important; color: var(--color-accent-blue, #0057b8) !important; border-radius: 4px; text-decoration: none; font-weight: 600; text-align: center; display: inline-flex; align-items: center; transition: var(--transition);"><?php esc_html_e( 'Details', 'zhongming' ); ?></a>
                                    <a href="<?php echo esc_url( zhongming_get_contact_url() . '?product_title=' . urlencode( html_entity_decode( get_the_title() ) ) ); ?>" class="btn btn-primary" style="flex: 1.2; justify-content: center; padding: 8px 12px; font-size: 12px; background-color: var(--color-accent-blue, #0057b8) !important; border-color: var(--color-accent-blue, #0057b8) !important; color: #ffffff !important; border-radius: 4px; text-decoration: none; font-weight: 600; text-align: center; display: inline-flex; align-items: center; transition: var(--transition);"><?php esc_html_e( 'Get Quote', 'zhongming' ); ?></a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php 
        endif;
        wp_reset_postdata();
        ?>

    </div>
</section>

<!-- Beautiful Custom Styles for Tabs and Product Details Page -->
<style>
/* CSS styles for the Single Product Layout */
.single-product-grid {
    grid-template-columns: 1fr 1fr;
}
@media (max-width: 991px) {
    .single-product-grid {
        grid-template-columns: 1fr !important;
        gap: 40px !important;
    }
    .product-gallery-column {
        max-width: 580px;
        margin: 0 auto;
        width: 100%;
    }
}
@media (max-width: 767px) {
    .specs-grid-detail, .features-grid, .install-methods-grid, .apps-grid-detail, .product-grid {
        grid-template-columns: 1fr !important;
    }
    .product-grid {
        grid-template-columns: 1fr 1fr !important;
        gap: 16px !important;
    }
    .product-cta-buttons {
        flex-direction: column;
        align-items: stretch !important;
    }
}
@media (max-width: 479px) {
    .product-grid {
        grid-template-columns: 1fr !important;
    }
    .tabs-nav-bar button {
        padding: 10px 16px !important;
        font-size: 13px !important;
        flex: 1 1 auto;
        text-align: center;
    }
}

/* Image Switching Thumbnails Hover State */
.gallery-thumb-item {
    box-sizing: border-box;
}
.gallery-thumb-item:hover, .gallery-thumb-item.active {
    border-color: var(--color-accent-blue, #0057b8) !important;
    box-shadow: var(--shadow-sm);
}

/* Spec Card Hover Effects */
.quick-spec-card:hover {
    border-color: var(--color-accent-blue, #0057b8) !important;
    background-color: #ffffff !important;
    box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}

/* Request a Quote Button hover adjustments */
.product-cta-buttons a.btn-primary:hover {
    background-color: #004494 !important;
    border-color: #004494 !important;
    box-shadow: 0 4px 12px rgba(0,87,184,0.25);
}
.product-cta-buttons a.btn-outline:hover {
    background-color: #e8f0fa !important;
    color: var(--color-accent-blue, #0057b8) !important;
    border-color: var(--color-accent-blue, #0057b8) !important;
}

/* Tab Headers Style override */
.tab-nav-btn {
    border-bottom: 3px solid transparent !important;
}
.tab-nav-btn:hover {
    color: var(--color-text) !important;
}
.tab-nav-btn.active {
    color: var(--color-accent-blue, #0057b8) !important;
    border-bottom: 3px solid var(--color-accent-blue, #0057b8) !important;
}

/* Specs Table Rows Hover */
.specs-data-table tbody tr {
    transition: background-color 0.2s ease;
}
.specs-data-table tbody tr:hover {
    background-color: #f9f9f9 !important;
}

/* Features Cards Hover */
.feature-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(0,0,0,0.06) !important;
}

/* Related card hover matching archive layout */
.product-card:hover {
    border-color: var(--color-accent-blue, #0057b8) !important;
    box-shadow: 0 8px 24px rgba(0, 87, 184, 0.08) !important;
    transform: translateY(-2px);
}
.product-btns a.btn-primary {
    background-color: var(--color-accent-blue, #0057b8) !important;
    border-color: var(--color-accent-blue, #0057b8) !important;
    color: #ffffff !important;
}
.product-btns a.btn-primary:hover {
    background-color: #004494 !important;
    border-color: #004494 !important;
}
.product-btns a.btn-outline:hover {
    background-color: #e8f0fa !important;
    color: var(--color-accent-blue, #0057b8) !important;
    border-color: var(--color-accent-blue, #0057b8) !important;
}
</style>

<?php get_footer(); ?>
