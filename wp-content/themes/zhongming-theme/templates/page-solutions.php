<?php
/**
 * Template Name: Solutions Template
 *
 * Solutions & Applications page template for Zhongming LED.
 * Showcases application scenarios with case study photos.
 */

$current_lang = function_exists('pll_current_language') ? pll_current_language() : 'en';
if ( in_array( $current_lang, array( 'zh', 'zh-cn', 'zh-CN', 'cn' ) ) ) {
    get_template_part('templates/page-solutions-zh');
    return;
}

get_header(); ?>

<!-- Solutions Page Hero -->
<section class="about-hero" style="background-color: var(--color-bg-2); border-bottom: 1px solid var(--color-border); padding: 60px 0;">
    <div class="container">
        <span class="hero-eyebrow" style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: var(--color-text-3); display: block; margin-bottom: 8px;">
            Solutions & Applications
        </span>
        <h1 class="hero-h1" style="font-size: 32px; font-weight: 800; color: var(--color-text); margin-bottom: 12px; line-height: 1.2;">
            LED Display Solutions for Every Scenario
        </h1>
        <p class="hero-sub" style="font-size: 15px; color: var(--color-text-2); line-height: 1.7; max-width: 720px; margin: 0;">
            From retail storefronts to immersive XR studios, from sports stadiums to corporate command centers — Zhongming LED delivers tailored solutions across 10+ major application fields in 30+ countries worldwide.
        </p>
    </div>
</section>

<!-- Application Scenarios Grid -->
<section class="solutions-scenarios" style="padding: 60px 0; background-color: #ffffff;">
    <div class="container">
        <div class="about-section-header" style="margin-bottom: 40px; display: flex; align-items: center; gap: 12px;">
            <div>
                <h2 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin: 0;">Application Scenarios</h2>
                <span style="font-size: 12px; color: var(--color-text-3);">Where our LED displays make an impact</span>
            </div>
        </div>

        <div class="solutions-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">

            <!-- Scenario 1: Indoor Commercial -->
            <div class="solution-card" style="border: 1px solid var(--color-border); border-radius: 8px; overflow: hidden; transition: box-shadow 0.2s ease-in-out;">
                <div style="height: 180px; overflow: hidden; background-color: var(--color-bg-2);">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/app-indoor.jpg'); ?>" alt="Indoor Commercial LED Display" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s ease;">
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                        <span style="width: 32px; height: 32px; border-radius: 6px; background-color: #e8f0fe; display: flex; align-items: center; justify-content: center; font-size: 16px;">🏢</span>
                        <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;">Indoor Commercial</h3>
                    </div>
                    <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin-bottom: 14px;">Control rooms, conference halls, broadcast studios, lobbies, and retail environments. Fine-pitch solutions from P0.7 to P2.5 for uncompromising image quality.</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Control Room</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Conference</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Broadcast</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Exhibition</span>
                    </div>
                    <a href="<?php echo zm_category_link('standard-indoor'); ?>" class="btn btn-outline" style="margin-top: 14px; padding: 7px 14px; font-size: 12px; display: inline-block;">View Indoor Products →</a>
                </div>
            </div>

            <!-- Scenario 2: Outdoor Advertising -->
            <div class="solution-card" style="border: 1px solid var(--color-border); border-radius: 8px; overflow: hidden; transition: box-shadow 0.2s ease-in-out;">
                <div style="height: 180px; overflow: hidden; background-color: var(--color-bg-2);">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/app-outdoor.jpg'); ?>" alt="Outdoor LED Billboard" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s ease;">
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                        <span style="width: 32px; height: 32px; border-radius: 6px; background-color: #e8f5e9; display: flex; align-items: center; justify-content: center; font-size: 16px;">🏗️</span>
                        <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;">Outdoor Advertising</h3>
                    </div>
                    <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin-bottom: 14px;">IP65-rated large-format billboards, building facades, roadside signage, and sports stadiums. High brightness up to 8000 nit for brilliant daylight visibility.</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Billboard</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Stadium</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Facade</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Signage</span>
                    </div>
                    <a href="<?php echo zm_category_link('standard-outdoor'); ?>" class="btn btn-outline" style="margin-top: 14px; padding: 7px 14px; font-size: 12px; display: inline-block;">View Outdoor Products →</a>
                </div>
            </div>

            <!-- Scenario 3: XR / Immersive -->
            <div class="solution-card" style="border: 1px solid var(--color-border); border-radius: 8px; overflow: hidden; transition: box-shadow 0.2s ease-in-out;">
                <div style="height: 180px; overflow: hidden; background-color: var(--color-bg-2);">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/app-immersive.jpg'); ?>" alt="XR Immersive Studio" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s ease;">
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                        <span style="width: 32px; height: 32px; border-radius: 6px; background-color: #f3e5f5; display: flex; align-items: center; justify-content: center; font-size: 16px;">🎬</span>
                        <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;">XR & Immersive Studio</h3>
                    </div>
                    <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin-bottom: 14px;">5-face XR virtual production environments for film, TV, automotive showcases, and cultural experiences. Custom geometry for 360° total immersion.</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Virtual Production</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Film Studio</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Automotive</span>
                    </div>
                    <a href="<?php echo zm_category_link('customized-xr'); ?>" class="btn btn-outline" style="margin-top: 14px; padding: 7px 14px; font-size: 12px; display: inline-block;">View XR Products →</a>
                </div>
            </div>

            <!-- Scenario 4: Stage & Events -->
            <div class="solution-card" style="border: 1px solid var(--color-border); border-radius: 8px; overflow: hidden; transition: box-shadow 0.2s ease-in-out;">
                <div style="height: 180px; overflow: hidden; background-color: var(--color-bg-2);">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/case-1.jpg'); ?>" alt="Stage Event LED Screen" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s ease;">
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                        <span style="width: 32px; height: 32px; border-radius: 6px; background-color: #fff8e1; display: flex; align-items: center; justify-content: center; font-size: 16px;">🎤</span>
                        <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;">Stage & Events</h3>
                    </div>
                    <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin-bottom: 14px;">Rental-grade magnesium alloy cabinet screens for concerts, conventions, corporate events, and trade shows. Fast setup with single-person quick-lock system.</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Concert</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Trade Show</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Convention</span>
                    </div>
                    <a href="<?php echo zm_category_link('indoor-rental'); ?>" class="btn btn-outline" style="margin-top: 14px; padding: 7px 14px; font-size: 12px; display: inline-block; margin-right: 8px;">Indoor Rental →</a>
                    <a href="<?php echo zm_category_link('outdoor-rental'); ?>" class="btn btn-outline" style="margin-top: 14px; padding: 7px 14px; font-size: 12px; display: inline-block;">Outdoor Rental →</a>
                </div>
            </div>

            <!-- Scenario 5: Retail & Glass -->
            <div class="solution-card" style="border: 1px solid var(--color-border); border-radius: 8px; overflow: hidden; transition: box-shadow 0.2s ease-in-out;">
                <div style="height: 180px; overflow: hidden; background-color: var(--color-bg-2);">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/case-3.jpg'); ?>" alt="Retail Transparent LED Display" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s ease;">
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                        <span style="width: 32px; height: 32px; border-radius: 6px; background-color: #e3f2fd; display: flex; align-items: center; justify-content: center; font-size: 16px;">🛍️</span>
                        <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;">Retail & Glass Facade</h3>
                    </div>
                    <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin-bottom: 14px;">Transparent LED and Photoelectric Glass for storefronts, car showrooms, malls, airports. Up to 90% transparency maintains natural daylight while displaying vivid content.</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Storefront</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Showroom</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Airport</span>
                    </div>
                    <a href="<?php echo zm_category_link('transparent-screen'); ?>" class="btn btn-outline" style="margin-top: 14px; padding: 7px 14px; font-size: 12px; display: inline-block;">View Transparent Products →</a>
                </div>
            </div>

            <!-- Scenario 6: Interactive Floor -->
            <div class="solution-card" style="border: 1px solid var(--color-border); border-radius: 8px; overflow: hidden; transition: box-shadow 0.2s ease-in-out;">
                <div style="height: 180px; overflow: hidden; background-color: var(--color-bg-2);">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/case-5.jpg'); ?>" alt="Interactive Floor LED" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s ease;">
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                        <span style="width: 32px; height: 32px; border-radius: 6px; background-color: #fbe9e7; display: flex; align-items: center; justify-content: center; font-size: 16px;">🎯</span>
                        <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;">Interactive Floor Display</h3>
                    </div>
                    <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin-bottom: 14px;">Floor Tile LED with 500KG/m² load capacity and optional pressure sensor tracking for interactive visitor experiences in museums, hotels, and themed entertainment.</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Museum</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Hotel</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">Theme Park</span>
                    </div>
                    <a href="<?php echo zm_category_link('floor-tile-screen'); ?>" class="btn btn-outline" style="margin-top: 14px; padding: 7px 14px; font-size: 12px; display: inline-block;">View Floor Products →</a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Case Studies Section -->
<section class="solutions-cases" style="padding: 60px 0; background-color: var(--color-bg-2); border-top: 1px solid var(--color-border);">
    <div class="container">
        <div class="about-section-header" style="margin-bottom: 40px; display: flex; align-items: center; gap: 12px;">
            <div>
                <h2 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin: 0;">Recent Project Case Studies</h2>
                <span style="font-size: 12px; color: var(--color-text-3);">Selected installations across diverse environments worldwide</span>
            </div>
        </div>

        <!-- Case Photo Gallery Grid -->
        <div class="case-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 32px;">
            <?php
            $case_images = [
                ['src' => 'case-1.jpg', 'label' => 'Rental Stage Event'],
                ['src' => 'case-2.jpg', 'label' => 'Outdoor Billboard'],
                ['src' => 'case-3.jpg', 'label' => 'Retail Transparent Screen'],
                ['src' => 'case-4.jpg', 'label' => 'Indoor Control Room'],
                ['src' => 'case-5.jpg', 'label' => 'Interactive Floor'],
                ['src' => 'case-6.jpg', 'label' => 'Exhibition Hall'],
                ['src' => 'case-7.jpg', 'label' => 'Conference Center'],
                ['src' => 'case-8.jpg', 'label' => 'Creative Architecture'],
            ];
            foreach ($case_images as $case) : ?>
                <div style="position: relative; border-radius: 6px; overflow: hidden; aspect-ratio: 4/3; background-color: var(--color-bg-3);">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/' . $case['src']); ?>"
                         alt="<?php echo esc_attr($case['label']); ?>"
                         style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.35s ease;">
                    <div class="case-overlay" style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.7)); padding: 16px 10px 8px; pointer-events: none;">
                        <span style="font-size: 11px; font-weight: 600; color: #ffffff; display: block;"><?php echo esc_html($case['label']); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Why Choose Zhongming Section -->
<section class="solutions-why" style="padding: 60px 0; background-color: #ffffff; border-top: 1px solid var(--color-border);">
    <div class="container">
        <div class="about-section-header" style="margin-bottom: 40px; display: flex; align-items: center; gap: 12px;">
            <div>
                <h2 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin: 0;">Why Choose Zhongming LED?</h2>
                <span style="font-size: 12px; color: var(--color-text-3);">Our technical and service advantages as your LED display partner</span>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
            <?php
            $advantages = [
                ['icon' => '🔬', 'title' => 'R&D-Driven Quality', 'desc' => 'In-house R&D team developing proprietary LED solutions. Each product validated through 100+ test categories before mass production.'],
                ['icon' => '🌍', 'title' => '30+ Countries Deployed', 'desc' => 'Trusted by clients in USA, Russia, Saudi Arabia, Australia, Japan, and 25+ other markets. Proven global track record.'],
                ['icon' => '⚡', 'title' => 'Fast Delivery', 'desc' => 'Standardized production process with buffer stock on key SKUs. Typical lead time 15–25 days depending on configuration.'],
                ['icon' => '🛡️', 'title' => 'CE, RoHS, FCC Certified', 'desc' => 'Full international certification compliance for seamless import into Europe, Americas, and Asia-Pacific markets.'],
                ['icon' => '🔧', 'title' => 'OEM/ODM Available', 'desc' => 'Flexible branding arrangements for distributors and system integrators. Custom form factors and private label support.'],
                ['icon' => '📞', 'title' => '24h Technical Support', 'desc' => 'Dedicated after-sales engineering team. Remote diagnostic support, on-site commissioning, and spare parts supply guaranteed.'],
            ];
            foreach ($advantages as $adv) : ?>
                <div style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 8px; padding: 24px; transition: box-shadow 0.2s ease-in-out;">
                    <div style="font-size: 28px; margin-bottom: 12px;"><?php echo $adv['icon']; ?></div>
                    <h3 style="font-size: 14px; font-weight: 700; color: var(--color-text); margin-bottom: 8px;"><?php echo esc_html($adv['title']); ?></h3>
                    <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin: 0;"><?php echo esc_html($adv['desc']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="padding: 60px 0; background-color: var(--color-text); text-align: center;">
    <div class="container">
        <h2 style="font-size: 26px; font-weight: 800; color: #ffffff; margin-bottom: 12px; line-height: 1.3;">Ready to Start Your LED Display Project?</h2>
        <p style="font-size: 15px; color: rgba(255,255,255,0.75); max-width: 600px; margin: 0 auto 28px; line-height: 1.7;">
            Share your project requirements with our team. We'll respond within 24 hours with product recommendations and a preliminary pricing estimate.
        </p>
        <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo site_url('/contact'); ?>" class="btn btn-primary" style="padding: 12px 28px; font-size: 15px;">Get a Free Quote →</a>
            <a href="<?php echo zm_product_archive_link(); ?>" class="btn btn-outline" style="padding: 12px 28px; font-size: 15px; color: #ffffff; border-color: rgba(255,255,255,0.5);">Browse All Products</a>
        </div>
    </div>
</section>

<style>
.solution-card:hover {
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
}
.solution-card:hover img {
    transform: scale(1.05);
}
.case-grid > div:hover img {
    transform: scale(1.08);
}
.solutions-why div:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,0.06);
}

@media (max-width: 1024px) {
    .solutions-grid { grid-template-columns: repeat(2, 1fr) !important; }
    .case-grid { grid-template-columns: repeat(2, 1fr) !important; }
}

@media (max-width: 768px) {
    .solutions-grid { grid-template-columns: 1fr !important; }
    .case-grid { grid-template-columns: repeat(2, 1fr) !important; }
    .solutions-why > div > div { grid-template-columns: 1fr !important; }
}
</style>

<?php get_footer(); ?>
