<?php
/**
 * The template for displaying all single posts
 */

get_header();

$current_lang = function_exists('pll_current_language') ? pll_current_language() : 'en';
$is_zh = in_array($current_lang, ['zh', 'zh-cn', 'zh-CN', 'cn']);

// Find News List URL
$news_url = site_url('/eventandnews/');
if (function_exists('pll_get_post_language')) {
    $pages = get_pages([
        'meta_key' => '_wp_page_template',
        'meta_value' => 'templates/page-eventandnews.php',
        'hierarchical' => 0
    ]);
    foreach ($pages as $p) {
        $p_lang = pll_get_post_language($p->ID);
        if ($is_zh && $p_lang === 'zh') {
            $news_url = get_permalink($p->ID);
            break;
        } elseif (!$is_zh && $p_lang === 'en') {
            $news_url = get_permalink($p->ID);
            break;
        }
    }
}

$back_text = $is_zh ? '← 返回新闻列表' : '← Back to News List';
$recent_title = $is_zh ? '最新动态' : 'Latest News';
$cta_title = $is_zh ? '获取免费报价' : 'Get a Free Quote';
$cta_text = $is_zh ? '将您的显示屏需求（尺寸、像素间距、安装环境等）发送给我们，我们将在 24 小时内提供定制方案与报价。' : 'Send us your screen size, pixel pitch, and installation environment. We will provide a custom solution and quotation within 24 hours.';
$cta_btn = $is_zh ? '立即咨询 →' : 'Inquire Now →';
$contact_link = function_exists('zhongming_get_contact_url') ? zhongming_get_contact_url() : site_url('/contact/');
?>

<style>
.post-detail-wrapper {
    padding: 60px 0 80px;
    background-color: #ffffff;
}
.post-layout-grid {
    display: grid;
    grid-template-columns: 8fr 4fr;
    gap: 50px;
}
.post-main-content {
    min-width: 0;
}
.post-meta-top {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 20px;
    font-size: 13px;
    color: var(--color-text-3, #999);
}
.post-back-link {
    color: var(--color-accent-blue, #0057b8);
    font-weight: 700;
    text-decoration: none;
    transition: var(--transition);
}
.post-back-link:hover {
    color: #0046a0;
    transform: translateX(-2px);
}
.post-meta-date {
    display: flex;
    align-items: center;
    gap: 4px;
}
.post-detail-title {
    font-size: 34px;
    font-weight: 800;
    line-height: 1.3;
    color: var(--color-text, #1a1a18);
    margin: 0 0 32px;
}
.post-featured-banner {
    width: 100%;
    height: 420px;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 40px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    background-color: var(--color-bg-2, #f7f7f5);
}
.post-featured-banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.post-content-body {
    font-size: 16px;
    line-height: 1.85;
    color: var(--color-text-2, #666660);
}
.post-content-body p {
    color: var(--color-text-2, #666660);
    margin-bottom: 24px;
}
.post-content-body h2 {
    font-size: 22px;
    font-weight: 800;
    color: var(--color-text, #1a1a18);
    margin: 48px 0 20px;
    padding-left: 14px;
    border-left: 4px solid var(--color-accent-blue, #0057b8);
    line-height: 1.4;
}
.post-content-body h3 {
    font-size: 18px;
    font-weight: 700;
    color: var(--color-text, #1a1a18);
    margin: 36px 0 16px;
}
.article-image-box {
    margin: 36px 0;
    background-color: var(--color-bg-2, #f7f7f5);
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid var(--color-border, #e0ddd8);
    padding: 16px;
    text-align: center;
}
.article-body-img {
    max-width: 100%;
    height: auto;
    border-radius: 4px;
    display: block;
    margin: 0 auto;
}
.article-img-caption {
    display: block;
    margin-top: 12px;
    font-size: 13px;
    color: var(--color-text-3, #999990);
    font-weight: 600;
}

/* Sidebar styling */
.post-sidebar {
    display: flex;
    flex-direction: column;
    gap: 32px;
}
.sidebar-widget {
    background-color: var(--color-bg-2, #f7f7f5);
    border: 1px solid var(--color-border, #e0ddd8);
    border-radius: 8px;
    padding: 28px;
}
.widget-title {
    font-size: 16px;
    font-weight: 800;
    color: var(--color-text, #1a1a18);
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid var(--color-border, #e0ddd8);
    letter-spacing: 0.5px;
}
.recent-post-item {
    display: flex;
    gap: 16px;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--color-border, #e0ddd8);
}
.recent-post-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}
.recent-post-thumb {
    width: 80px;
    height: 60px;
    border-radius: 4px;
    overflow: hidden;
    background-color: var(--color-border, #e0ddd8);
    flex-shrink: 0;
}
.recent-post-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.recent-post-info {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.recent-post-title {
    font-size: 13px;
    font-weight: 700;
    line-height: 1.4;
    color: var(--color-text, #1a1a18);
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-decoration: none;
    transition: var(--transition);
}
.recent-post-title:hover {
    color: var(--color-accent-blue, #0057b8);
}
.recent-post-date {
    font-size: 11px;
    color: var(--color-text-3, #999990);
}
.cta-sidebar-card {
    background: linear-gradient(135deg, var(--color-accent-blue, #0057b8) 0%, #002d62 100%);
    border-radius: 8px;
    padding: 36px 28px;
    color: #ffffff;
    text-align: center;
    box-shadow: 0 8px 24px rgba(0,87,184,0.15);
}
.cta-sidebar-title {
    font-size: 20px;
    font-weight: 800;
    margin-bottom: 14px;
    line-height: 1.3;
    color: #ffffff;
}
.cta-sidebar-text {
    font-size: 13px;
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.85);
    margin-bottom: 24px;
}
.cta-sidebar-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #ffffff;
    color: var(--color-accent-blue, #0057b8);
    padding: 12px 28px;
    font-size: 14px;
    font-weight: 700;
    border-radius: 4px;
    text-decoration: none;
    transition: var(--transition);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    width: 100%;
}
.cta-sidebar-btn:hover {
    background-color: #f0f4f8;
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.25);
    color: #0046a0;
}

@media (max-width: 992px) {
    .post-layout-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
}
@media (max-width: 768px) {
    .post-detail-wrapper {
        padding: 40px 0 60px;
    }
    .post-detail-title {
        font-size: 26px;
        margin-bottom: 24px;
    }
    .post-featured-banner {
        height: 240px;
        margin-bottom: 30px;
    }
}
</style>

<div class="post-detail-wrapper">
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="post-layout-grid">
                <!-- Main Content Column -->
                <main class="post-main-content">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <!-- Top Meta -->
                        <div class="post-meta-top">
                            <a href="<?php echo esc_url($news_url); ?>" class="post-back-link">
                                <?php echo esc_html($back_text); ?>
                            </a>
                            <span class="divider">|</span>
                            <span class="post-meta-date">
                                📅 <?php echo get_the_date(); ?>
                            </span>
                        </div>

                        <!-- Post Title -->
                        <h1 class="post-detail-title"><?php the_title(); ?></h1>

                        <!-- Featured Banner -->
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-featured-banner">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Content Body -->
                        <div class="post-content-body entry-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                </main>

                <!-- Sidebar Column -->
                <aside class="post-sidebar">
                    <!-- Recent Posts Widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title"><?php echo esc_html($recent_title); ?></h3>
                        <div class="recent-posts-list">
                            <?php
                            $recent_query = new WP_Query([
                                'post_type'      => 'post',
                                'post_status'    => 'publish',
                                'posts_per_page' => 3,
                                'post__not_in'   => [ get_the_ID() ],
                                'orderby'        => 'date',
                                'order'          => 'DESC'
                            ]);
                            if ( $recent_query->have_posts() ) :
                                while ( $recent_query->have_posts() ) : $recent_query->the_post();
                            ?>
                                    <div class="recent-post-item">
                                        <div class="recent-post-thumb">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                            <?php else : ?>
                                                <img loading="lazy" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/app-indoor.jpg' ); ?>" alt="<?php the_title_attribute(); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="recent-post-info">
                                            <a href="<?php the_permalink(); ?>" class="recent-post-title">
                                                <?php the_title(); ?>
                                            </a>
                                            <span class="recent-post-date">
                                                📅 <?php echo get_the_date(); ?>
                                            </span>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                            ?>
                                <p style="font-size: 13px; color: var(--color-text-3);"><?php esc_html_e( 'No recent posts.', 'zhongming' ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Quick Quote CTA Widget -->
                    <div class="cta-sidebar-card">
                        <h3 class="cta-sidebar-title"><?php echo esc_html($cta_title); ?></h3>
                        <p class="cta-sidebar-text"><?php echo esc_html($cta_text); ?></p>
                        <a href="<?php echo esc_url($contact_link); ?>" class="cta-sidebar-btn">
                            <?php echo esc_html($cta_btn); ?>
                        </a>
                    </div>
                </aside>
            </div>
        <?php endwhile; endif; ?>
    </div>
</div>

<?php get_footer(); ?>
