<?php
$current_lang = function_exists('pll_current_language') ? pll_current_language() : 'en';
if ( in_array( $current_lang, array( 'zh', 'zh-cn', 'zh-CN', 'cn' ) ) ) {
    get_template_part('templates/front-page-zh');
    return;
}
get_header(); ?>

<!-- Section 2: Hero Banner Slider -->
<section class="hero-section">
    <div class="hero-slider">
        <!-- Slide 1: Stage Rental Screen P3.91 (Main Featured Product) -->
        <div class="hero-slide active">
            <div class="hero-visual">
                <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/banner_rental.png'); ?>" alt="Zhongming Stage Rental LED Display P3.91">
            </div>
            <div class="hero-container">
                <div class="hero-content hero-slide-right">
                    <div class="hero-content-inner">
                        <div class="hero-eyebrow">STAGE RENTAL LED DISPLAY</div>
                        
                        <h1 class="hero-h1">
                            Stage Rental Display<br>
                            <span class="highlight">Slim Structure · Seamless Splicing</span><br>
                            Delicate Image · Low-Light High-Grey
                        </h1>
                        
                        <p class="hero-sub">
                            High-performance stage rental display with ultra-high refresh rate, seamless splicing, and durable design. Engineered for fast setup, easy transport, and exceptional visual clarity in indoor & outdoor events.
                        </p>
                        
                        <div class="hero-btns">
                            <a href="<?php echo site_url('/products/?category=rental-screen'); ?>" class="btn btn-primary">Explore Rental Series →</a>
                            <a href="<?php echo site_url('/contact'); ?>" class="btn btn-outline" style="color: #fff;">Request a Quote</a>
                        </div>
                        
                        <!-- Technical Features Grid (Mockup Icons) - Vertically Stacked -->
                        <div class="tech-features-grid">
                            <div class="tech-feature-item">
                                <div class="tech-icon-box highlight">Hz</div>
                                <div class="tech-feature-text">
                                    <span class="val">≥3840Hz</span>
                                    <span class="lbl">Refresh Rate</span>
                                </div>
                            </div>
                            
                            <div class="tech-feature-item">
                                <div class="tech-icon-box">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: rgba(255,255,255,0.85);"><path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path><line x1="16" y1="8" x2="2" y2="22"></line><line x1="17.5" y1="15" x2="9" y2="15"></line></svg>
                                </div>
                                <div class="tech-feature-text">
                                    <span class="val">Die-cast</span>
                                    <span class="lbl">Light & Durable</span>
                                </div>
                            </div>
                            
                            <div class="tech-feature-item">
                                <div class="tech-icon-box">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: rgba(255,255,255,0.85);"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                                </div>
                                <div class="tech-feature-text">
                                    <span class="val">IP65 / IP50</span>
                                    <span class="lbl">Weather Resist</span>
                                </div>
                            </div>
                            
                            <div class="tech-feature-item">
                                <div class="tech-icon-box">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: rgba(255,255,255,0.85);"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                </div>
                                <div class="tech-feature-text">
                                    <span class="val">Quick Lock</span>
                                    <span class="lbl">Fast Splicing</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Parameter Table Strip -->
                        <div class="param-table-strip">
                            <div class="param-table-col">
                                <span class="param-lbl">Pixel Pitch</span>
                                <span class="param-val">P3.91</span>
                            </div>
                            <div class="param-table-col">
                                <span class="param-lbl">Brightness</span>
                                <span class="param-val">≥800 / ≥4000 nit</span>
                            </div>
                            <div class="param-table-col">
                                <span class="param-lbl">Cabinet Size</span>
                                <span class="param-val">500×500/1000 mm</span>
                            </div>
                            <div class="param-table-col">
                                <span class="param-lbl">Weight</span>
                                <span class="param-val">7.0 / 12.25 kg</span>
                            </div>
                            <div class="param-table-col">
                                <span class="param-lbl">IP Rating</span>
                                <span class="param-val">IP50 / IP65</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2: Global LED Leader -->
        <div class="hero-slide">
            <div class="hero-visual">
                <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/banner_home1.png'); ?>" alt="Zhongming LED Display Background">
            </div>
            <div class="hero-container">
                <div class="hero-content">
                    <div class="hero-content-inner">
                        <div class="hero-eyebrow">Global LED Leader</div>
                        <h1 class="hero-h1">
                            Professional<br>
                            <span class="highlight">LED Display Solutions</span><br>
                            Worldwide
                        </h1>
                        <p class="hero-sub">From ultra-fine-pitch COB to large-format outdoor displays — full product range, OEM/ODM available, exported to 30+ countries.</p>
                        
                        <div class="hero-btns">
                            <a href="<?php echo site_url('/products'); ?>" class="btn btn-primary">View All Products →</a>
                            <a href="<?php echo site_url('/contact'); ?>" class="btn btn-outline" style="color:#fff;">Request a Quote</a>
                        </div>
                        
                        <div class="hero-pills">
                            <span class="pill">✓ CE / RoHS Certified</span>
                            <span class="pill">✓ 100,000h Lifespan</span>
                            <span class="pill">✓ OEM / ODM Available</span>
                            <span class="pill">✓ 30+ Countries</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3: Standard Indoor Display (pdf_banner2) -->
        <div class="hero-slide">
            <div class="hero-visual">
                <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/pdf_banner2.png'); ?>" alt="Zhongming Standard Indoor LED Display">
            </div>
            <div class="hero-container">
                <div class="hero-content">
                    <div class="hero-content-inner">
                        <div class="hero-eyebrow">Standard Indoor LED</div>
                        <h1 class="hero-h1">
                            High-Definition<br>
                            <span class="highlight">Standard Indoor Display</span><br>
                            For Mission Critical
                        </h1>
                        <p class="hero-sub">Features low-light high-grey technology with 3840Hz–7680Hz ultra-high refresh rate. Extremely light, high-precision seamless aluminum cabinets tailored for control rooms, TV studios, and meeting halls.</p>
                        
                        <div class="hero-btns">
                            <a href="<?php echo site_url('/products'); ?>" class="btn btn-primary">Explore Indoor Series →</a>
                            <a href="<?php echo site_url('/contact'); ?>" class="btn btn-outline" style="color:#fff;">Get a Quote</a>
                        </div>
                        
                        <div class="hero-pills">
                            <span class="pill">✓ 3840-7680Hz Refresh</span>
                            <span class="pill">✓ Low-Light High-Grey</span>
                            <span class="pill">✓ Fast Front Maintenance</span>
                            <span class="pill">✓ Seamless Flat Joining</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 4: Flexible LED Soft Module (pdf_banner3) -->
        <div class="hero-slide">
            <div class="hero-visual">
                <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/pdf_banner3.png'); ?>" alt="Zhongming Flexible LED Display">
            </div>
            <div class="hero-container">
                <div class="hero-content">
                    <div class="hero-content-inner">
                        <div class="hero-eyebrow">Flexible & Creative LED</div>
                        <h1 class="hero-h1">
                            Unleash Creativity<br>
                            <span class="highlight">Flexible LED Soft Module</span><br>
                            Bendable & Ultra-Thin
                        </h1>
                        <p class="hero-sub">Perfect combination of rubber base and soft face mask, supporting free twisting, bending, and rolling. Achieves a minimum column diameter of 406.6mm (composed of 4x 320x160mm modules). Equipped with magnetic front access and anti-ghosting circuitry for clean, lag-free visuals, easily supporting modular mounting into columns, curves, ribbon shapes, or hanging installations.</p>
                        
                        <div class="hero-btns">
                            <a href="<?php echo site_url('/products'); ?>" class="btn btn-primary">Explore Flexible Series →</a>
                            <a href="<?php echo site_url('/contact'); ?>" class="btn btn-outline" style="color:#fff;">Request Solution</a>
                        </div>
                        
                        <div class="hero-pills">
                            <span class="pill">✓ Min 406.6mm Columns</span>
                            <span class="pill">✓ Magnetic Front Access</span>
                            <span class="pill">✓ Anti-Ghosting Visuals</span>
                            <span class="pill">✓ 360° All-Around Viewing</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 5: 16:9 Premium Indoor Display (pdf_banner4) -->
        <div class="hero-slide">
            <div class="hero-visual">
                <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/pdf_banner4.png'); ?>" alt="Zhongming 16:9 Golden Proportion LED Display">
            </div>
            <div class="hero-container">
                <div class="hero-content">
                    <div class="hero-content-inner">
                        <div class="hero-eyebrow">16:9 Golden Ratio LED</div>
                        <h1 class="hero-h1">
                            Golden Ratio 16:9<br>
                            <span class="highlight">Premium Indoor Display</span><br>
                            Point-to-Point 4K/8K
                        </h1>
                        <p class="hero-sub">Perfect point-to-point scaling for standard 16:9 displays. Engineered with LED HDR optimization for stunning contrast, dual-channel power/signal backups, and pixel-perfect UHD resolution.</p>
                        
                        <div class="hero-btns">
                            <a href="<?php echo site_url('/products'); ?>" class="btn btn-primary">Explore 16:9 Series →</a>
                            <a href="<?php echo site_url('/contact'); ?>" class="btn btn-outline" style="color:#fff;">Get a Quote</a>
                        </div>
                        
                        <div class="hero-pills">
                            <span class="pill">✓ 16:9 Golden Proportion</span>
                            <span class="pill">✓ LED HDR Color Engine</span>
                            <span class="pill">✓ Dual Backup Reliability</span>
                            <span class="pill">✓ Perfect UHD Scaling</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slide Indicators / Navigation -->
    <div class="hero-dots">
        <span class="hero-dot active" data-slide="0"></span>
        <span class="hero-dot" data-slide="1"></span>
        <span class="hero-dot" data-slide="2"></span>
        <span class="hero-dot" data-slide="3"></span>
        <span class="hero-dot" data-slide="4"></span>
    </div>
    <button class="hero-arrow prev" aria-label="Previous Slide">‹</button>
    <button class="hero-arrow next" aria-label="Next Slide">›</button>
</section>

<!-- Hero Slider JS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');
    const prevBtn = document.querySelector('.hero-arrow.prev');
    const nextBtn = document.querySelector('.hero-arrow.next');
    
    let currentIndex = 0;
    const totalSlides = slides.length;
    let timer = null;
    let isTouchDevice = false;
    let isMouseOver = false;
    
    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        currentIndex = (index + totalSlides) % totalSlides;
        
        slides[currentIndex].classList.add('active');
        dots[currentIndex].classList.add('active');
    }
    
    function nextSlide() {
        showSlide(currentIndex + 1);
    }
    
    function prevSlide() {
        showSlide(currentIndex - 1);
    }
    
    function startTimer() {
        stopTimer();
        if (!isMouseOver || isTouchDevice) {
            timer = setInterval(nextSlide, 5000);
        }
    }
    
    function stopTimer() {
        clearInterval(timer);
    }
    
    // Dot Indicators
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            startTimer();
        });
    });
    
    // Arrows
    if (prevBtn && nextBtn) {
        prevBtn.addEventListener('click', () => {
            prevSlide();
            startTimer();
        });
        nextBtn.addEventListener('click', () => {
            nextSlide();
            startTimer();
        });
    }
    
    // Hover pause - with isTouchDevice guard to keep mobile swiping compatible
    const heroSection = document.querySelector('.hero-section');
    if (heroSection) {
        heroSection.addEventListener('touchstart', () => {
            isTouchDevice = true;
        }, {passive: true});
        
        heroSection.addEventListener('mouseenter', () => {
            isMouseOver = true;
            if (!isTouchDevice) {
                stopTimer();
            }
        });
        
        heroSection.addEventListener('mouseleave', () => {
            isMouseOver = false;
            if (!isTouchDevice) {
                startTimer();
            }
        });
        
        // Touch gestures for mobile swiping
        let startX = 0;
        let endX = 0;
        
        heroSection.addEventListener('touchstart', e => {
            startX = e.touches[0].clientX;
        }, {passive: true});
        
        heroSection.addEventListener('touchend', e => {
            endX = e.changedTouches[0].clientX;
            const diffX = startX - endX;
            if (Math.abs(diffX) > 50) {
                if (diffX > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
                startTimer();
            }
        }, {passive: true});
    }
    
    // Initialize Auto-play
    startTimer();
});
</script>

<!-- Section 3: Featured Products -->
<section class="wf-section">
    <div class="container">
        <div class="section-header">
            <div class="hero-eyebrow">Product Range</div>
            <h2 class="section-title">Full-Spectrum LED Display Solutions</h2>
            <p class="section-sub">From boardroom to stadium — indoor, outdoor, creative, and custom LED display types for every scenario.</p>
        </div>

        <div class="product-grid">
            <?php
            $featured_query = new WP_Query([
                'post_type' => 'product',
                'posts_per_page' => 6,
                'meta_key' => 'is_featured',
                'meta_value' => '1',
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ]);
            if ($featured_query->have_posts()) :
                while ($featured_query->have_posts()) : $featured_query->the_post();
                    $pid       = get_the_ID();
                    $badge     = get_field('badge_type', $pid);
                    $pitch     = get_field('pixel_pitch_mm', $pid);
                    $cabinet   = get_field('cabinet_size_mm', $pid);
                    $brightness= get_field('brightness_nit', $pid);
                    $viewing   = get_field('best_viewing_distance', $pid);
            ?>
                <div class="product-card">
                    <div class="product-card-img">
                        <?php 
                        if (has_post_thumbnail()) : 
                            the_post_thumbnail('medium'); 
                        else : 
                            $title = get_the_title();
                            $fallback_img = '';
                            if (stripos($title, 'Outdoor') !== false) {
                                $fallback_img = get_template_directory_uri() . '/assets/images/product-outdoor-placeholder.jpg';
                            } elseif (stripos($title, 'Transparent') !== false) {
                                $fallback_img = get_template_directory_uri() . '/assets/images/product-transparent-placeholder.jpg';
                            }
                            
                            if ($fallback_img) : ?>
                                <img loading="lazy" src="<?php echo esc_url($fallback_img); ?>" alt="<?php the_title_attribute(); ?>" style="width:100%; height:100%; object-fit:cover;">
                            <?php else : ?>
                                <div style="width:100%;height:100%;background:#f0f0f0;display:flex;align-items:center;justify-content:center;color:#ccc;font-size:36px;">🖼</div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($badge) : ?>
                            <span class="badge badge-<?php echo esc_attr($badge); ?>"><?php 
                                $badge_upper = strtoupper($badge);
                                if ($badge_upper === 'INDOOR') echo esc_html(zm_t('INDOOR', '室内'));
                                elseif ($badge_upper === 'OUTDOOR') echo esc_html(zm_t('OUTDOOR', '户外'));
                                elseif ($badge_upper === 'SPECIAL') echo esc_html(zm_t('SPECIAL', '创意'));
                                elseif ($badge_upper === 'RENTAL') echo esc_html(zm_t('RENTAL', '租赁'));
                                else echo esc_html($badge_upper);
                            ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="product-info">
                        <h3><?php the_title(); ?></h3>
                        <ul class="product-specs">
                            <li><strong>Pixel Pitch:</strong> <?php echo $pitch  ? (is_numeric($pitch) ? esc_html($pitch).'mm' : esc_html(zm_translate_spec_val($pitch))) : '—'; ?></li>
                            <li><strong>Cabinet:</strong>     <?php echo $cabinet ? esc_html(zm_translate_spec_val($cabinet))   : '—'; ?></li>
                            <li><strong>Brightness:</strong>  <?php echo $brightness ? esc_html(zm_translate_spec_val($brightness)) : '—'; ?></li>
                            <li><strong>Viewing Dist:</strong><?php echo $viewing ? esc_html(zm_translate_spec_val($viewing))   : '—'; ?></li>
                        </ul>
                        <div class="product-btns">
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="padding:8px 12px;">View Details</a>
                            <a href="<?php echo esc_url( zhongming_get_contact_url() . '?product_title=' . urlencode( html_entity_decode( get_the_title() ) ) ); ?>" class="btn btn-primary" style="padding:8px 12px;"><?php esc_html_e( 'Get Quote', 'zhongming' ); ?></a>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
        <div style="text-align:center; margin-top:40px;">
            <a href="<?php echo site_url('/products'); ?>" class="btn btn-outline">View All Products →</a>
        </div>
    </div>
</section>

<!-- Section 3.5: Company Overview -->
<section class="wf-section">
    <div class="container">
        <div class="company-split">
            <div class="company-visual">
                <div class="company-visual-container">
                    <div class="company-slider">
                        <div class="slider-wrapper">
                            <div class="slider-slide">
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/page2_img5.jpeg" alt="Zhongming R&D Office">
                            </div>
                            <div class="slider-slide">
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/page2_img10.jpeg" alt="Zhongming Production Line">
                            </div>
                            <div class="slider-slide">
                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/page2_img11.jpeg" alt="Zhongming LED Testing">
                            </div>
                        </div>
                        <!-- Navigation dots -->
                        <div class="slider-dots">
                            <span class="slider-dot active"></span>
                            <span class="slider-dot"></span>
                            <span class="slider-dot"></span>
                        </div>
                        <!-- Navigation arrows -->
                        <button class="slider-arrow prev" aria-label="Previous Slide">‹</button>
                        <button class="slider-arrow next" aria-label="Next Slide">›</button>
                    </div>
                    <div class="company-badge">
                        <div class="badge-num">10+</div>
                        <div class="badge-label">Years Experience</div>
                    </div>
                </div>
                
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const wrapper = document.querySelector('.slider-wrapper');
                    const slides = document.querySelectorAll('.slider-slide');
                    const dots = document.querySelectorAll('.slider-dot');
                    const prevBtn = document.querySelector('.slider-arrow.prev');
                    const nextBtn = document.querySelector('.slider-arrow.next');
                    
                    let currentIndex = 0;
                    const totalSlides = slides.length;
                    let timer = null;
                    
                    function updateSlider() {
                        wrapper.style.transform = `translate3d(-${currentIndex * 33.3333}%, 0, 0)`;
                        dots.forEach((dot, idx) => {
                            if (idx === currentIndex) {
                                dot.classList.add('active');
                            } else {
                                dot.classList.remove('active');
                            }
                        });
                    }
                    
                    function nextSlide() {
                        currentIndex = (currentIndex + 1) % totalSlides;
                        updateSlider();
                    }
                    
                    function prevSlide() {
                        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                        updateSlider();
                    }
                    
                    function startAutoPlay() {
                        timer = setInterval(nextSlide, 4000);
                    }
                    
                    function stopAutoPlay() {
                        clearInterval(timer);
                    }
                    
                    // Dot navigation
                    dots.forEach((dot, idx) => {
                        dot.addEventListener('click', () => {
                            currentIndex = idx;
                            updateSlider();
                            stopAutoPlay();
                            startAutoPlay();
                        });
                    });
                    
                    // Arrow navigation
                    if (prevBtn && nextBtn) {
                        prevBtn.addEventListener('click', () => {
                            prevSlide();
                            stopAutoPlay();
                            startAutoPlay();
                        });
                        nextBtn.addEventListener('click', () => {
                            nextSlide();
                            stopAutoPlay();
                            startAutoPlay();
                        });
                    }
                    
                    // Pause on hover
                    const sliderContainer = document.querySelector('.company-slider');
                    if (sliderContainer) {
                        sliderContainer.addEventListener('mouseenter', stopAutoPlay);
                        sliderContainer.addEventListener('mouseleave', startAutoPlay);
                    }
                    
                    startAutoPlay();
                });
                </script>
            </div>
            <div class="company-text">
                <div class="hero-eyebrow">About Zhongming Technology</div>
                <h2 class="section-title" style="text-align: left; margin: 12px 0 24px;">Leading LED Display System Manufacturer</h2>
                <p style="font-size: 16px; line-height: 1.7; color: var(--color-text-2); margin-bottom: 20px;">
                    Shenzhen Zhongming Technology Co., Ltd. is a comprehensive technology enterprise integrating LED display system R&D, production, and sales. With strong technical force and advanced photoelectric technology, we specialize in high-fidelity LED solutions.
                </p>
                <p style="font-size: 15px; line-height: 1.7; color: var(--color-text-3); margin-bottom: 32px;">
                    We strictly adhere to the business philosophy of "Reputation First, Quality Reliable, Customer First, Service First". Every product follows strict standard control procedures from R&D to mass production to ensure the best CQTS (Cost, Quality, Time, Service).
                </p>
                <ul class="company-advantages-list">
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--color-text);">
                        <span style="color: var(--color-accent-blue);">✓</span> ISO 9001 Certified
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--color-text);">
                        <span style="color: var(--color-accent-blue);">✓</span> 30+ Countries Exported
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--color-text);">
                        <span style="color: var(--color-accent-blue);">✓</span> In-House R&D Team
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--color-text);">
                        <span style="color: var(--color-accent-blue);">✓</span> 24/7 Technical Support
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Section 4: Key Numbers -->
<section class="wf-section" style="background: var(--color-bg-2);">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card" style="background:var(--color-white);">
                <div class="stat-num">30+</div>
                <div class="stat-label">Countries & Regions</div>
            </div>
            <div class="stat-card" style="background:var(--color-white);">
                <div class="stat-num">100K h</div>
                <div class="stat-label">Product Lifespan</div>
            </div>
            <div class="stat-card" style="background:var(--color-white);">
                <div class="stat-num">CE / RoHS</div>
                <div class="stat-label">Certifications</div>
            </div>
            <div class="stat-card" style="background:var(--color-white);">
                <div class="stat-num">OEM/ODM</div>
                <div class="stat-label">Custom Service</div>
            </div>
        </div>
    </div>
</section>

<!-- Section 4.5: Global Projects Gallery -->
<section class="wf-section">
    <div class="container">
        <div class="section-header">
            <div class="hero-eyebrow">Success Stories</div>
            <h2 class="section-title">Global Installation Projects</h2>
            <p class="section-sub">Providing reliable LED solutions for command centers, retail spaces, and creative venues worldwide.</p>
        </div>
        <div class="cases-grid">
            <?php
            $cases = [
                ['img'=>'case-1.jpg', 'title'=>'Immersive Studio'],
                ['img'=>'case-2.jpg', 'title'=>'Indoor Video Wall'],
                ['img'=>'case-3.jpg', 'title'=>'Outdoor Billboard'],
                ['img'=>'case-4.jpg', 'title'=>'Transparent Screen'],
            ];
            foreach ($cases as $case) : ?>
                <div class="case-item" style="position: relative; aspect-ratio: 4/3; overflow: hidden; border-radius: 8px; group">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $case['img']; ?>" 
                         alt="<?php echo esc_attr($case['title']); ?>" 
                         style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s;">
                    <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 100%); display: flex; align-items: flex-end; padding: 20px; opacity: 1;">
                        <h4 style="color: white; font-size: 14px; font-weight: 600;"><?php echo esc_html($case['title']); ?></h4>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section 5: Why Choose Us -->
<section class="wf-section">
    <div class="container">
        <div class="section-header">
            <div class="hero-eyebrow">Our Advantages</div>
            <h2 class="section-title">Why Choose Zhongming Technology</h2>
        </div>
        <div class="adv-grid">
            <?php
            $advantages = [
                ['icon'=>'🏭','title'=>'In-House Manufacturing','desc'=>'Complete production line from R&D to QC. We control every stage of the manufacturing process to ensure consistent quality.'],
                ['icon'=>'🔬','title'=>'100+ Quality Tests','desc'=>'Every product undergoes rigorous testing: thermal shock, high-temp aging, ESD, and EMC tests before global shipment.'],
                ['icon'=>'🔄','title'=>'High Refresh Rate','desc'=>'3840Hz–7680Hz high refresh rate ensures flicker-free performance, making it ideal for cameras and broadcast studios.'],
                ['icon'=>'🛡️','title'=>'CQTS Management','desc'=>'We provide the best CQTS (Cost, Quality, Time, Service) through a full-process management system from order to after-sales.'],
                ['icon'=>'⚙️','title'=>'OEM / ODM Expertise','desc'=>'Custom cabinet dimensions, private labeling, and customized solutions for complex installation environments.'],
                ['icon'=>'🛠','title'=>'Easy Maintenance','desc'=>'Professional front-access design allows for module hot-swaps in seconds, reducing downtime and maintenance costs.']
            ];
            foreach ($advantages as $adv) : ?>
                <div class="adv-item">
                    <div class="adv-icon"><?php echo $adv['icon']; ?></div>
                    <div class="adv-content">
                        <h3><?php echo $adv['title']; ?></h3>
                        <p><?php echo $adv['desc']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section 6: Application Scenarios — SVG icons -->
<section class="wf-section" style="background: var(--color-bg-2);">
    <div class="container">
        <div class="section-header">
            <div class="hero-eyebrow">Applications</div>
            <h2 class="section-title">Serving Every Industry & Venue</h2>
        </div>
        <div class="apps-grid">
            <?php
            $scenarios = [
                ['name'=>'Commercial Ads',    'img'=>'app-outdoor.jpg'],
                ['name'=>'Conference Room',   'img'=>'app-indoor.jpg'],
                ['name'=>'Broadcast Studio',  'img'=>'app-immersive.jpg'],
                ['name'=>'Command Center',    'img'=>'case-2.jpg'],
                ['name'=>'Stage & Events',    'img'=>'case-5.jpg'],
                ['name'=>'Retail & Malls',    'img'=>'case-7.jpg'],
                ['name'=>'Stadium & Sports',  'img'=>'case-3.jpg'],
                ['name'=>'Architecture LED',  'img'=>'case-8.jpg'],
                ['name'=>'Exhibition Hall',   'img'=>'case-6.jpg'],
                ['name'=>'Security & Monitor','img'=>'case-2.jpg'],
            ];
            foreach ($scenarios as $s) : ?>
                <div class="app-card">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $s['img']; ?>" alt="">
                    <div class="app-content">
                        <div class="app-label"><?php echo $s['name']; ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section 7: Case Gallery -->
<section class="wf-section">
    <div class="container">
        <div class="section-header">
            <div class="hero-eyebrow">Recent Projects</div>
            <h2 class="section-title">Proven Installations Worldwide</h2>
        </div>
        <div class="tabs">
            <div class="tab-btn active" data-tab="all">All</div>
            <div class="tab-btn" data-tab="indoor">Indoor</div>
            <div class="tab-btn" data-tab="outdoor">Outdoor</div>
            <div class="tab-btn" data-tab="rental">Rental / Stage</div>
            <div class="tab-btn" data-tab="special">Special / XR</div>
        </div>
        <div class="gallery-grid">
            <?php 
            $gallery_cases = [
                ['img'=>'case-1.jpg', 'cat'=>'special', 'title'=>'Immersive Studio'],
                ['img'=>'case-2.jpg', 'cat'=>'indoor',  'title'=>'Command Center'],
                ['img'=>'case-3.jpg', 'cat'=>'outdoor', 'title'=>'Outdoor P5 Wall'],
                ['img'=>'case-4.jpg', 'cat'=>'special', 'title'=>'Transparent Glass'],
                ['img'=>'case-5.jpg', 'cat'=>'rental',  'title'=>'Stage Concert'],
                ['img'=>'case-6.jpg', 'cat'=>'indoor',  'title'=>'Exhibition Mall'],
                ['img'=>'case-7.jpg', 'cat'=>'indoor',  'title'=>'Retail Display'],
                ['img'=>'case-8.jpg', 'cat'=>'outdoor', 'title'=>'Stadium Screen'],
            ];
            foreach ($gallery_cases as $c) : ?>
                <div class="gallery-item" data-category="<?php echo $c['cat']; ?>" style="position:relative; aspect-ratio:1/1; overflow:hidden; border-radius:4px;">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $c['img']; ?>" 
                         alt="<?php echo esc_attr($c['title']); ?>"
                         style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s;">
                    <div class="gallery-overlay" style="position:absolute; inset:0; background:rgba(26,26,24,0.8); opacity:0; display:flex; align-items:center; justify-content:center; transition:opacity 0.3s; padding:20px; text-align:center;">
                        <span style="color:white; font-size:13px; font-weight:600;"><?php echo esc_html($c['title']); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section 8: Certifications Carousel -->
<section class="wf-section" style="background: #ffffff; border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border); padding: 50px 0; overflow: hidden;">
    <div class="container">
        <div class="section-header" style="margin-bottom: 30px;">
            <div class="hero-eyebrow" style="text-align: center;">Credentials</div>
            <h2 class="section-title" style="font-size: 24px; margin-top: 5px;">Compliance & International Certifications</h2>
        </div>
        
        <div class="cert-carousel-wrapper" style="width: 100%; position: relative; overflow: hidden; padding: 10px 0;">
            <style>
                @keyframes cert-scroll {
                    0% { transform: translateX(0); }
                    100% { transform: translateX(-50%); }
                }
                .cert-track {
                    display: flex;
                    width: max-content;
                    gap: 30px;
                    animation: cert-scroll 25s linear infinite;
                }
                .cert-track:hover {
                    animation-play-state: paused;
                }
                .cert-item-card {
                    width: 160px;
                    height: 220px;
                    background: #ffffff;
                    border: 1px solid var(--color-border);
                    border-radius: 6px;
                    padding: 10px;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.03);
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: space-between;
                    transition: all 0.3s ease;
                    cursor: pointer;
                }
                .cert-item-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
                    border-color: var(--color-accent-blue, #0057b8);
                }
                .cert-img-box {
                    width: 100%;
                    height: 170px;
                    overflow: hidden;
                    border-radius: 4px;
                    background-color: #f8fafc;
                    border: 1px solid #f1f5f9;
                }
                .cert-img-box img {
                    width: 100%;
                    height: 100%;
                    object-fit: contain;
                    display: block;
                }
                .cert-card-label {
                    font-size: 11px;
                    font-weight: 700;
                    color: var(--color-text-2);
                    text-align: center;
                    margin-top: 8px;
                }
            </style>
            
            <div class="cert-track">
                <!-- Cert 1 -->
                <div class="cert-item-card" onclick="openCertModal('<?php echo esc_url(get_template_directory_uri() . '/assets/images/real_cert_ce.jpg'); ?>', 'CE Certificate')">
                    <div class="cert-img-box">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/real_cert_ce.jpg'); ?>" alt="CE Certificate">
                    </div>
                    <div class="cert-card-label">CE Certificate</div>
                </div>
                <!-- Cert 2 -->
                <div class="cert-item-card" onclick="openCertModal('<?php echo esc_url(get_template_directory_uri() . '/assets/images/real_cert_rohs.jpg'); ?>', 'RoHS Directive')">
                    <div class="cert-img-box">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/real_cert_rohs.jpg'); ?>" alt="RoHS Certificate">
                    </div>
                    <div class="cert-card-label">RoHS Compliant</div>
                </div>
                <!-- Cert 3 -->
                <div class="cert-item-card" onclick="openCertModal('<?php echo esc_url(get_template_directory_uri() . '/assets/images/fcc_cert.png'); ?>', 'FCC Declaration')">
                    <div class="cert-img-box">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/fcc_cert.png'); ?>" alt="FCC Certificate">
                    </div>
                    <div class="cert-card-label">FCC Declaration</div>
                </div>
                <!-- Cert 4 -->
                <div class="cert-item-card" onclick="openCertModal('<?php echo esc_url(get_template_directory_uri() . '/assets/images/real_cert_ce2.jpg'); ?>', 'CE Certificate')">
                    <div class="cert-img-box">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/real_cert_ce2.jpg'); ?>" alt="CE Certificate">
                    </div>
                    <div class="cert-card-label">CE Certificate</div>
                </div>
                <!-- Cert 5 -->
                <div class="cert-item-card" onclick="openCertModal('<?php echo esc_url(get_template_directory_uri() . '/assets/images/iso_cert.png'); ?>', 'ISO 9001:2015')">
                    <div class="cert-img-box">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/iso_cert.png'); ?>" alt="ISO 9001 Certificate">
                    </div>
                    <div class="cert-card-label">ISO 9001:2015</div>
                </div>
                
                <!-- Repeat for infinite scroll loop -->
                <!-- Cert 1 -->
                <div class="cert-item-card" onclick="openCertModal('<?php echo esc_url(get_template_directory_uri() . '/assets/images/real_cert_ce.jpg'); ?>', 'CE Certificate')">
                    <div class="cert-img-box">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/real_cert_ce.jpg'); ?>" alt="CE Certificate">
                    </div>
                    <div class="cert-card-label">CE Certificate</div>
                </div>
                <!-- Cert 2 -->
                <div class="cert-item-card" onclick="openCertModal('<?php echo esc_url(get_template_directory_uri() . '/assets/images/real_cert_rohs.jpg'); ?>', 'RoHS Directive')">
                    <div class="cert-img-box">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/real_cert_rohs.jpg'); ?>" alt="RoHS Certificate">
                    </div>
                    <div class="cert-card-label">RoHS Compliant</div>
                </div>
                <!-- Cert 3 -->
                <div class="cert-item-card" onclick="openCertModal('<?php echo esc_url(get_template_directory_uri() . '/assets/images/fcc_cert.png'); ?>', 'FCC Declaration')">
                    <div class="cert-img-box">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/fcc_cert.png'); ?>" alt="FCC Certificate">
                    </div>
                    <div class="cert-card-label">FCC Declaration</div>
                </div>
                <!-- Cert 4 -->
                <div class="cert-item-card" onclick="openCertModal('<?php echo esc_url(get_template_directory_uri() . '/assets/images/real_cert_ce2.jpg'); ?>', 'CE Certificate')">
                    <div class="cert-img-box">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/real_cert_ce2.jpg'); ?>" alt="CE Certificate">
                    </div>
                    <div class="cert-card-label">CE Certificate</div>
                </div>
                <!-- Cert 5 -->
                <div class="cert-item-card" onclick="openCertModal('<?php echo esc_url(get_template_directory_uri() . '/assets/images/iso_cert.png'); ?>', 'ISO 9001:2015')">
                    <div class="cert-img-box">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/iso_cert.png'); ?>" alt="ISO 9001 Certificate">
                    </div>
                    <div class="cert-card-label">ISO 9001:2015</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Lightbox Modal to view full certificate image on click -->
<div id="certModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.85); z-index: 99999; align-items: center; justify-content: center; opacity: 0; transition: opacity 0.3s ease; padding: 20px;">
    <div style="position: relative; max-width: 500px; width: 100%; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.3); transform: scale(0.9); transition: transform 0.3s ease; display: flex; flex-direction: column;" id="certModalContent">
        <!-- Close Button -->
        <button onclick="closeCertModal()" style="position: absolute; top: 15px; right: 15px; width: 30px; height: 30px; border-radius: 50%; border: none; background: rgba(0,0,0,0.5); color: #fff; font-size: 16px; font-weight: bold; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background 0.2s; z-index: 10;">&times;</button>
        <!-- Content image container -->
        <div style="padding: 20px; display: flex; justify-content: center; background: #f8fafc; border-bottom: 1px solid #f1f5f9;">
            <img loading="lazy" id="certModalImage" src="" alt="Certificate" style="max-height: 70vh; max-width: 100%; object-fit: contain; border-radius: 4px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
        </div>
        <div id="certModalTitle" style="padding: 15px 20px; font-size: 14px; font-weight: bold; color: var(--color-text); text-align: center;">Certificate</div>
    </div>
</div>

<script>
function openCertModal(imgSrc, title) {
    const modal = document.getElementById('certModal');
    const modalContent = document.getElementById('certModalContent');
    const modalImg = document.getElementById('certModalImage');
    const modalTitle = document.getElementById('certModalTitle');
    
    modalImg.src = imgSrc;
    modalTitle.textContent = title;
    
    modal.style.display = 'flex';
    // Trigger layout flush
    modal.offsetHeight;
    modal.style.opacity = '1';
    modalContent.style.transform = 'scale(1)';
}

function closeCertModal() {
    const modal = document.getElementById('certModal');
    const modalContent = document.getElementById('certModalContent');
    
    modal.style.opacity = '0';
    modalContent.style.transform = 'scale(0.9)';
    
    setTimeout(() => {
        modal.style.display = 'none';
    }, 300);
}

// Close when clicking background
document.getElementById('certModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeCertModal();
    }
});
</script>


<!-- Section 8.5: Homepage Quick Inquiry & Social Links -->
<section class="wf-section homepage-inquiry-section" style="background: var(--color-bg-2); border-top: 1px solid var(--color-border); padding: 60px 0;">
    <div class="container">
        <div class="inquiry-split-layout">
            <!-- Left Panel: Text & Social Media -->
            <div class="inquiry-text-panel">
                <div class="hero-eyebrow" style="text-align: left; color: var(--color-accent-blue);">Quick Consultation</div>
                <h2 class="section-title" style="text-align: left; margin-top: 12px; margin-bottom: 20px; font-size: 28px;">Request a Custom Proposal</h2>
                <p style="font-size: 15px; line-height: 1.7; color: var(--color-text-2); margin-bottom: 30px;">
                    Submit your email and project details, and our B2B technical consultants will reply within 24 hours with exact specifications, layout plans, and pricing options.
                </p>
                <!-- Social Media Buttons -->
                <div class="social-links-wrapper">
                    <span style="font-size: 13px; font-weight: 700; color: var(--color-text-3); text-transform: uppercase; display: block; margin-bottom: 12px; letter-spacing: 0.05em;">Follow Us</span>
                    <div style="display: flex; gap: 12px;">
                        <a href="https://www.facebook.com/share/18dKL3bYuj/" target="_blank" rel="noopener" class="social-btn facebook-btn" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: #ffffff; border: 1px solid var(--color-border); color: #1877f2; text-decoration: none; transition: all 0.3s;" aria-label="Facebook">
                            <svg style="width: 18px; height: 18px; fill: currentColor;" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/></svg>
                        </a>
                        <a href="#" target="_blank" rel="noopener" class="social-btn youtube-btn" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: #ffffff; border: 1px solid var(--color-border); color: #ff0000; text-decoration: none; transition: all 0.3s;" aria-label="YouTube">
                            <svg style="width: 18px; height: 18px; fill: currentColor;" viewBox="0 0 24 24"><path d="M23.498 6.163a3.003 3.003 0 0 0-2.11-2.108C19.53 3.5 12 3.5 12 3.5s-7.53 0-9.388.555A3.002 3.002 0 0 0 .502 6.163C0 8.07 0 12 0 12s0 3.93.502 5.837a3.002 3.002 0 0 0 2.11 2.108C4.47 20.5 12 20.5 12 20.5s7.53 0 9.388-.555a3.003 3.003 0 0 0 2.11-2.108C24 15.93 24 12 24 12s0-3.93-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                        <a href="#" target="_blank" rel="noopener" class="social-btn linkedin-btn" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: #ffffff; border: 1px solid var(--color-border); color: #0a66c2; text-decoration: none; transition: all 0.3s;" aria-label="LinkedIn">
                            <svg style="width: 18px; height: 18px; fill: currentColor;" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    </div>
                    <style>
                        .social-btn:hover {
                            background-color: var(--color-accent-blue) !important;
                            color: #ffffff !important;
                            transform: translateY(-2px);
                            box-shadow: 0 4px 12px rgba(0, 87, 184, 0.2);
                        }
                    </style>
                </div>
            </div>
            <!-- Right Panel: Simple Inquiry Form Card -->
            <div class="inquiry-form-card" style="background: #ffffff; border: 1px solid var(--color-border); border-radius: 12px; padding: 32px; box-shadow: 0 8px 30px rgba(0,0,0,0.04);">
                <?php 
                $homepage_form_submitted = false;
                if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['homepage_inquiry_submit'] ) ) {
                    $client_email = sanitize_email( $_POST['client_email'] );
                    $client_msg = sanitize_textarea_field( $_POST['client_message'] );
                    
                    if ( is_email( $client_email ) && !empty( $client_msg ) ) {
                        $to = get_bloginfo('admin_email');
                        $subject = 'New Homepage Quick Inquiry';
                        $headers = array('Content-Type: text/html; charset=UTF-8', 'Reply-To: ' . $client_email);
                        $body = "<p><strong>Email:</strong> {$client_email}</p>";
                        $body .= "<p><strong>Message:</strong><br>" . nl2br($client_msg) . "</p>";
                        
                        wp_mail($to, $subject, $body, $headers);
                        $homepage_form_submitted = true;
                    }
                }
                ?>
                <?php if ( $homepage_form_submitted ) : ?>
                    <div style="background: #eaf5e8; border: 1px solid #1a5c1a; color: #1a5c1a; padding: 16px; border-radius: 6px; text-align: center; font-size: 14px;">
                        ✓ Thank you! Your inquiry has been sent. We will reply to your email shortly.
                    </div>
                <?php else : ?>
                    <form action="" method="post" style="display: flex; flex-direction: column; gap: 16px;">
                        <div class="form-group">
                            <label for="client_email" style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--color-text-2); margin-bottom: 6px; letter-spacing: 0.5px;">Email Address *</label>
                            <input type="email" id="client_email" name="client_email" required class="wf-input" placeholder="e.g. yourname@company.com" style="width: 100%; height: 44px; border: 1px solid var(--color-border); border-radius: 6px; padding: 0 16px; font-size: 14px; background-color: var(--color-bg-2);">
                        </div>
                        <div class="form-group">
                            <label for="client_message" style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--color-text-2); margin-bottom: 6px; letter-spacing: 0.5px;">Project Requirements *</label>
                            <textarea id="client_message" name="client_message" required class="wf-textarea" placeholder="e.g. Size, application, models required..." style="width: 100%; height: 100px; border: 1px solid var(--color-border); border-radius: 6px; padding: 12px 16px; font-size: 14px; background-color: var(--color-bg-2); font-family: inherit; resize: vertical;"></textarea>
                        </div>
                        <input type="hidden" name="homepage_inquiry_submit" value="1">
                        <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; height: 44px; font-size: 14px; font-weight: 700; text-transform: uppercase; border-radius: 6px; background-color: #0057b8 !important; border: 1px solid #0057b8 !important; color: #ffffff !important; transition: all 0.2s;">
                            Submit Inquiry →
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Section 9: CTA Banner -->
<section class="wf-section" style="background: var(--color-primary); color: white; text-align: center;">
    <div class="container">
        <h2 class="section-title" style="color:white;">Ready to Start Your LED Project?</h2>
        <p class="section-sub" style="color:rgba(255,255,255,0.8); max-width:600px; margin:0 auto 32px;">Tell us your requirements — size, pixel pitch, installation environment — and we'll provide a custom solution and quote within 24 hours.</p>
        <div style="display:flex; gap:16px; justify-content:center;">
            <a href="<?php echo site_url('/contact'); ?>" class="btn btn-primary" style="background:white;color:var(--color-primary);padding:14px 32px;font-size:15px;">Get a Free Quote →</a>
            <a href="#" class="btn btn-outline btn-outline-white">Download Catalog</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
