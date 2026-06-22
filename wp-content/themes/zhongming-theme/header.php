<?php
// Retrieve Polylang active languages if available
$polylang_active = false;
$languages = array();
if ( function_exists( 'pll_the_languages' ) ) {
    $languages = pll_the_languages( array( 'raw' => 1, 'hide_if_no_translation' => 0 ) );
    if ( ! empty( $languages ) ) {
        $polylang_active = true;
    }
}

// Find current language and define helper labels
$current_lang_name = 'EN';
if ( $polylang_active ) {
    foreach ( $languages as $lang ) {
        if ( ! empty( $lang['current_lang'] ) ) {
            $current_lang_name = ( $lang['slug'] === 'zh' || $lang['slug'] === 'zh-CN' || $lang['slug'] === 'cn' ) ? 'CN' : 'EN';
            break;
        }
    }
}

// Dynamic multilingual links resolver
$home_link = function_exists('pll_home_url') ? pll_home_url() : home_url('/');
$about_link = function_exists('pll_get_post') ? get_permalink( pll_get_post( 644 ) ) : site_url('/about');
$contact_link = function_exists('pll_get_post') ? get_permalink( pll_get_post( 645 ) ) : site_url('/contact');
$solutions_link = function_exists('pll_get_post') ? get_permalink( pll_get_post( 646 ) ) : site_url('/solutions');
$news_link = function_exists('pll_get_post') ? get_permalink( pll_get_post( 748 ) ) : site_url('/eventandnews');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicon.png' ); ?>" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Section 0: Top Announcement Bar -->
<div class="top-bar">
    <div class="container">
        🌍 <?php zm_te('Exporting to 30+ Countries', '产品销往全球 30+ 国家'); ?> · <strong><?php zm_te('CE/RoHS Certified', 'CE/RoHS 国际认证'); ?></strong> · <?php zm_te('Free sample available', '提供免费样品'); ?>
        <span class="close-btn">✕</span>
    </div>
</div>

<!-- Section 1: Navigation -->
<header class="site-header">
    <div class="container header-inner">
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="font-weight: 800; font-size: 20px; letter-spacing: -1px;">
                ZHONGMING <span style="color: var(--color-text-3);">LED</span>
            </a>
        </div>

        <nav class="nav-main">
            <ul id="main-menu">
                <li><a href="<?php echo esc_url( $home_link ); ?>"><?php _e('Home', 'zhongming'); ?></a></li>
                <li class="has-mega" id="nav-products">
                    <a href="<?php echo zm_product_archive_link(); ?>"><?php _e('Products', 'zhongming'); ?> ▾</a>
                    <?php get_template_part('template-parts/nav-mega-menu'); ?>
                </li>
                <li><a href="<?php echo esc_url( $solutions_link ); ?>"><?php _e('Solutions', 'zhongming'); ?></a></li>
                <li><a href="<?php echo esc_url( $about_link ); ?>"><?php _e('About Us', 'zhongming'); ?></a></li>
                <li><a href="<?php echo esc_url( $contact_link ); ?>"><?php _e('Contact', 'zhongming'); ?></a></li>
            </ul>
        </nav>

        <div class="header-right">
            <div class="lang-switch-container lang-switch">
                <button class="lang-switch-btn" aria-label="Select Language">
                    <span class="lang-current"><?php echo esc_html( $current_lang_name ); ?></span>
                    <svg class="lang-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="1 1 5 5 9 1"></polyline>
                    </svg>
                </button>
                <ul class="lang-dropdown">
                    <?php if ( $polylang_active ) : ?>
                        <?php foreach ( $languages as $lang ) : 
                            $lang_label = ( $lang['slug'] === 'zh' || $lang['slug'] === 'zh-CN' || $lang['slug'] === 'cn' ) ? '中文 (CN)' : 'English (EN)';
                            $active_class = ! empty( $lang['current_lang'] ) ? 'active' : '';
                        ?>
                            <li class="<?php echo esc_attr( $active_class ); ?>">
                                <a href="<?php echo esc_url( $lang['url'] ); ?>">
                                    <?php echo esc_html( $lang_label ); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li class="active"><a href="#">English (EN)</a></li>
                        <li><a href="#">中文 (CN)</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <a href="<?php echo esc_url( $contact_link ); ?>" class="btn btn-primary"><?php _e('Get a Quote', 'zhongming'); ?> →</a>
            
            <!-- Mobile Header Triggers -->
            <div class="mobile-header-triggers">
                <button class="mobile-search-trigger" id="mobileSearchTriggerBtn" aria-label="Toggle Search">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
                <button class="mobile-menu-trigger" id="mobileMenuTriggerBtn" aria-label="Toggle Menu">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu Drawer -->
<div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>
<div class="mobile-menu-drawer" id="mobileMenuDrawer">
    <div class="drawer-header">
        <h3><?php _e('ALL CATEGORIES', 'zhongming'); ?></h3>
        <button class="drawer-close" id="drawerCloseBtn" aria-label="Close Menu">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div>
    <div class="drawer-content">
        <!-- Search inside mobile drawer -->
        <div class="drawer-search" id="drawerSearchBox">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="search" placeholder="<?php esc_attr_e('Search products...', 'zhongming'); ?>" value="" name="s" />
                <button type="submit">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
            </form>
        </div>
        
        <!-- Mobile Language Switcher -->
        <div class="drawer-lang-switch">
            <span class="drawer-lang-title">Language / 语言</span>
            <div class="drawer-lang-options">
                <?php if ( $polylang_active ) : ?>
                    <?php 
                    $first = true;
                    foreach ( $languages as $lang ) : 
                        if ( ! $first ) {
                            echo '<span class="divider">|</span>';
                        }
                        $first = false;
                        $lang_display_label = ( $lang['slug'] === 'zh' || $lang['slug'] === 'zh-CN' || $lang['slug'] === 'cn' ) ? 'CN' : 'EN';
                        $active_class = ! empty( $lang['current_lang'] ) ? 'active' : '';
                    ?>
                        <a href="<?php echo esc_url( $lang['url'] ); ?>" class="mobile-lang-btn <?php echo esc_attr( $active_class ); ?>" style="text-decoration:none;">
                            <?php echo esc_html( $lang_display_label ); ?>
                        </a>
                    <?php endforeach; ?>
                <?php else : ?>
                    <a href="#" class="mobile-lang-btn active">EN</a>
                    <span class="divider">|</span>
                    <a href="#" class="mobile-lang-btn">CN</a>
                <?php endif; ?>
            </div>
        </div>
        
        <ul class="drawer-nav">
            <li><a href="<?php echo esc_url( $home_link ); ?>"><?php _e('Home', 'zhongming'); ?></a></li>
            <li><a href="<?php echo esc_url( $about_link ); ?>"><?php _e('Company', 'zhongming'); ?></a></li>
            <li class="drawer-has-submenu">
                <div class="drawer-submenu-trigger">
                    <a href="<?php echo zm_product_archive_link(); ?>"><?php _e('Product Center', 'zhongming'); ?></a>
                    <button class="submenu-toggle-btn" aria-label="Toggle Submenu">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                </div>
                <div class="drawer-submenu">
                    <!-- Group 1: Indoor -->
                    <div class="submenu-group">
                        <span class="group-title"><?php _e('Indoor LED', 'zhongming'); ?></span>
                        <ul>
                            <li><a href="<?php echo zm_category_link('standard-indoor'); ?>"><?php _e('Standard Indoor', 'zhongming'); ?></a></li>
                            <li><a href="<?php echo zm_category_link('cob-series'); ?>"><?php _e('COB Series', 'zhongming'); ?></a></li>
                            <li><a href="<?php echo zm_category_link('169-indoor'); ?>"><?php _e('16:9 Indoor', 'zhongming'); ?></a></li>
                            <li><a href="<?php echo zm_category_link('indoor-rental'); ?>"><?php _e('Indoor Rental', 'zhongming'); ?></a></li>
                        </ul>
                    </div>
                    <!-- Group 2: Outdoor -->
                    <div class="submenu-group">
                        <span class="group-title"><?php _e('Outdoor LED', 'zhongming'); ?></span>
                        <ul>
                            <li><a href="<?php echo zm_category_link('standard-outdoor'); ?>"><?php _e('Standard Outdoor', 'zhongming'); ?></a></li>
                            <li><a href="<?php echo zm_category_link('outdoor-rental'); ?>"><?php _e('Outdoor Rental', 'zhongming'); ?></a></li>
                            <li><a href="<?php echo zm_category_link('panel-series'); ?>"><?php _e('Panel Series', 'zhongming'); ?></a></li>
                        </ul>
                    </div>
                    <!-- Group 3: Special & Creative -->
                    <div class="submenu-group">
                        <span class="group-title"><?php _e('Special & Creative', 'zhongming'); ?></span>
                        <ul>
                            <li><a href="<?php echo zm_category_link('transparent-screen'); ?>"><?php _e('Transparent Screen', 'zhongming'); ?></a></li>
                            <li><a href="<?php echo zm_category_link('film-screen'); ?>"><?php _e('Film Screen', 'zhongming'); ?></a></li>
                            <li><a href="<?php echo zm_category_link('floor-tile-screen'); ?>"><?php _e('Floor Tile Screen', 'zhongming'); ?></a></li>
                            <li><a href="<?php echo zm_category_link('flexible-led'); ?>"><?php _e('Flexible LED', 'zhongming'); ?></a></li>
                            <li><a href="<?php echo zm_category_link('customized-xr'); ?>"><?php _e('Customized / XR', 'zhongming'); ?></a></li>
                            <li><a href="<?php echo zm_category_link('photoelectric-glass'); ?>"><?php _e('Photoelectric Glass', 'zhongming'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li><a href="<?php echo esc_url( $solutions_link ); ?>"><?php _e('Solutions', 'zhongming'); ?></a></li>
            <li><a href="<?php echo esc_url( $news_link ); ?>"><?php _e('Events & News', 'zhongming'); ?></a></li>
            <li><a href="<?php echo esc_url( $contact_link ); ?>"><?php _e('Contact', 'zhongming'); ?></a></li>
        </ul>
        <div class="drawer-footer">
            <a href="<?php echo esc_url( $contact_link ); ?>" class="btn btn-primary" style="width: 100%; text-align: center;"><?php _e('Get a Quote', 'zhongming'); ?></a>
        </div>
    </div>
</div>

<main id="primary" class="site-main">
