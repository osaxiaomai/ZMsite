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
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php get_template_part('template-parts/topbar'); ?>

    <header class="site-header">
        <div class="container header-container">
            <div class="logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="site-logo">
                    <!-- Or SVG / Text Logo -->
                </a>
            </div>

            <nav class="main-nav">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary_menu',
                    'container'      => false,
                    'menu_class'     => 'nav-list',
                    'walker'         => new Zhongming_Mega_Menu_Walker() // Optional, but let's keep it simple for now
                ) );
                ?>
                <!-- Custom Products Trigger for Mega Menu -->
                <div class="nav-item has-mega" id="products-trigger">
                    <a href="<?php echo zm_product_archive_link(); ?>">Products <span class="arrow-down"></span></a>
                    <?php get_template_part('template-parts/nav-mega-menu'); ?>
                </div>
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
            </div>
        </div>
    </header>

    <main id="primary" class="site-main">
