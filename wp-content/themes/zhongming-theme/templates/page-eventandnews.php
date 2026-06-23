<?php
$current_lang = function_exists('pll_current_language') ? pll_current_language() : 'en';
if ( in_array( $current_lang, array( 'zh', 'zh-cn', 'zh-CN', 'cn' ) ) ) {
    get_template_part('templates/page-eventandnews-zh');
    return;
}


/**
 * Template Name: Events & News Template
 *
 * Custom page template for displaying the company news, event releases, and blog posts.
 */

get_header(); 
$contact_link = function_exists('zhongming_get_contact_url') ? zhongming_get_contact_url() : site_url('/contact/');
?>

<!-- Events & News Hero Header -->
<section class="about-hero" style="background-color: var(--color-bg-2); border-bottom: 1px solid var(--color-border); padding: 60px 0;">
    <div class="container">
        <span class="hero-eyebrow" style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: var(--color-text-3); display: block; margin-bottom: 8px;">
            <?php esc_html_e( 'Events & News', 'zhongming' ); ?>
        </span>
        <h1 class="hero-h1" style="font-size: 32px; font-weight: 800; color: var(--color-text); margin-bottom: 12px; line-height: 1.2;">
            <?php esc_html_e( 'Company Updates & Industry Insights', 'zhongming' ); ?>
        </h1>
        <p class="hero-sub" style="font-size: 15px; color: var(--color-text-2); line-height: 1.7; max-width: 720px; margin: 0;">
            <?php esc_html_e( 'Stay informed with the latest news on Zhongming LED product launches, global exhibitions, technical guides, and case studies.', 'zhongming' ); ?>
        </p>
    </div>
</section>

<!-- News Archive Section -->
<section class="news-archive" style="padding: 60px 0; background-color: #ffffff;">
    <div class="container">
        <div class="news-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
            <?php
            // Query for blog posts
            $args = array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 9,
                'orderby'        => 'date',
                'order'          => 'DESC'
            );
            $query = new WP_Query( $args );

            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post();
                    // Get post categories
                    $categories = get_the_category();
                    $cat_name = !empty($categories) ? $categories[0]->name : 'Updates';
            ?>
                    <article class="news-card" style="border: 1px solid var(--color-border); border-radius: 8px; overflow: hidden; display: flex; flex-direction: column; transition: box-shadow 0.2s ease-in-out; background-color: #ffffff;">
                        <!-- Post Thumbnail -->
                        <div class="news-thumb-wrapper" style="height: 180px; overflow: hidden; background-color: var(--color-bg-2); position: relative;">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'medium_large', array( 'style' => 'width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s ease;' ) ); ?>
                            <?php else : ?>
                                <!-- Fallback default B2B photo -->
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/app-indoor.jpg' ); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s ease;">
                            <?php endif; ?>
                            <span class="news-cat-badge" style="position: absolute; top: 12px; left: 12px; background-color: var(--color-accent-blue, #0057b8); color: #ffffff; font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 4px 8px; border-radius: 3px; letter-spacing: 0.5px;">
                                <?php echo esc_html( $cat_name ); ?>
                            </span>
                        </div>

                        <!-- Post Body -->
                        <div style="padding: 24px; display: flex; flex-direction: column; flex: 1;">
                            <div style="font-size: 11px; color: var(--color-text-3); margin-bottom: 8px; font-weight: 600;">
                                📅 <?php echo get_the_date(); ?>
                            </div>
                            <h3 style="font-size: 16px; font-weight: 700; color: var(--color-text); margin: 0 0 10px 0; line-height: 1.4; transition: color 0.2s ease;">
                                <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin: 0 0 16px 0;">
                                <?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" style="font-size: 13px; font-weight: 700; color: var(--color-accent-blue, #0057b8); text-decoration: none; margin-top: auto; display: inline-flex; align-items: center; gap: 4px;">
                                <?php esc_html_e( 'Read More', 'zhongming' ); ?> →
                            </a>
                        </div>
                    </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <p style="grid-column: 1 / -1; text-align: center; color: var(--color-text-3); font-size: 14px; padding: 40px 0;">
                    <?php esc_html_e( 'No news posts found.', 'zhongming' ); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Concluding CTA Section -->
<section class="about-cta" style="padding: 60px 0; background-color: var(--color-text); text-align: center;">
    <div class="container">
        <h2 style="font-size: 26px; font-weight: 800; color: #ffffff; margin-bottom: 12px; line-height: 1.3;">Ready to Partner with Zhongming Technology?</h2>
        <p style="font-size: 15px; color: rgba(255,255,255,0.75); max-width: 600px; margin: 0 auto 28px; line-height: 1.7;">
            Tell us your display requirements — size, pixel pitch, installation environment — and our engineering team will provide a tailored quote and layout drawing within 24 hours.
        </p>
        <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo $contact_link; ?>" class="btn btn-primary" style="padding: 12px 28px; font-size: 15px;">Get a Free Quote →</a>
            <a href="<?php echo zm_product_archive_link(); ?>" class="btn btn-outline" style="padding: 12px 28px; font-size: 15px; color: #ffffff; border-color: rgba(255,255,255,0.5);">Browse All Products</a>
        </div>
    </div>
</section>

<style>
.news-card:hover {
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
}
.news-card:hover h3 {
    color: var(--color-accent-blue, #0057b8);
}
.news-card:hover img {
    transform: scale(1.05);
}
@media (max-width: 1024px) {
    .news-grid { grid-template-columns: repeat(2, 1fr) !important; }
}
@media (max-width: 768px) {
    .news-grid { grid-template-columns: 1fr !important; }
}
</style>

<?php get_footer(); ?>
