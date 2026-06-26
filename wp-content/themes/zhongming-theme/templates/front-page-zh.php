<?php
get_header(); ?>
<!-- DEBUG: RUNNING TEMPLATES/FRONT-PAGE-ZH.PHP -->

<!-- Section 2: Hero Banner Slider -->
<section class="hero-section">
    <div class="hero-slider">
        <!-- Slide 1: 舞台租赁屏 P3.91 (主推产品) -->
        <div class="hero-slide active">
            <div class="hero-visual">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/banner_rental.png'); ?>" alt="Zhongming 舞台租赁 LED 显示屏 P3.91">
            </div>
            <div class="hero-container">
                <div class="hero-content hero-content--right">
                    <div class="hero-content-inner">
                        <div class="hero-eyebrow">STAGE RENTAL LED DISPLAY</div>
                        
                        <h1 class="hero-h1">
                            舞台租赁屏<br>
                            <span class="highlight" style="white-space: nowrap;">极致轻薄 · 无缝拼接</span><br>
                            <span style="white-space: nowrap;">画面生动 · 极佳灰阶</span>
                        </h1>
                        
                        <p class="hero-sub">
                            专为高端舞台打造的租赁显示屏。箱体轻薄，支持快速无缝拼装。具备高亮高灰与超高刷新率，画面细腻生动。PCB 采用防撞焊盘设计，无惧死灯；支持吊装、置装等多种灵活安装方式，是户内外演出、展会、大型活动的不二之选。
                        </p>
                        
                        <div class="hero-btns">
                            <a href="<?php echo zm_product_archive_link(); ?>?badge=rental" class="btn btn-primary">探索租赁系列 →</a>
                            <a href="<?php echo $contact_link; ?>" class="btn btn-outline" style="color:#fff;">在线获取报价</a>
                        </div>
                        
                        <div class="hero-pills">
                            <span class="pill">✓ ≥3840Hz 高刷新率</span>
                            <span class="pill">✓ 压铸铝轻便耐用箱体</span>
                            <span class="pill">✓ IP65/IP35 防护等级</span>
                            <span class="pill">✓ 快速锁无缝拼接</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2: Digital Signage / Poster (banner2) -->
        <div class="hero-slide">
            <div class="hero-visual">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/banner2.png'); ?>" alt="Zhongming 智能数字广告机 LED Poster">
            </div>
            <div class="hero-container">
                <div class="hero-content">
                    <div class="hero-content-inner">
                        <div class="hero-eyebrow">智能数字广告机</div>
                        <h1 class="hero-h1">
                            智能商显广告机<br>
                            <span class="highlight">高清高亮 · 智慧营销</span><br>
                            吸引每一道目光
                        </h1>
                        <p class="hero-sub">采用一体化超薄设计，支持无线投屏与远程云端管理。高清高亮度显示效果，色彩真实生动；支持视频、图片、文字等多种素材混合分屏播放。适用于商场、零售门店、酒店大堂等高端商业场所，是提升品牌形象的完美数字看板。</p>
                        
                        <div class="hero-btns">
                            <a href="<?php echo zm_category_link('poster-screen'); ?>" class="btn btn-primary">探索商显系列 →</a>
                            <a href="<?php echo $contact_link; ?>" class="btn btn-outline" style="color:#fff;">在线获取报价</a>
                        </div>
                        
                        <div class="hero-pills">
                            <span class="pill">✓ 远程云端集群管理</span>
                            <span class="pill">✓ 超薄极简一体化设计</span>
                            <span class="pill">✓ 即插即用无线投屏</span>
                            <span class="pill">✓ 灵活多样的分屏播放</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide 2: 全球 LED 行业领跑者 -->
        <div class="hero-slide">
            <div class="hero-visual">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/banner_home1.png'); ?>" alt="Zhongming LED Display Background">
            </div>
            <div class="hero-container">
                <div class="hero-content">
                    <div class="hero-content-inner">
                        <div class="hero-eyebrow">全球 LED 行业领跑者</div>
                        <h1 class="hero-h1">
                            专业级<br>
                            <span class="highlight">LED 显示屏解决方案</span><br>
                            服务全球市场
                        </h1>
                        <p class="hero-sub">从超细间距 COB 到户外超大规格广告屏——全系列产品提供，支持 OEM/ODM 定制，产品销往全球 30 多个国家。</p>
                        
                        <div class="hero-btns">
                            <a href="<?php echo zm_product_archive_link(); ?>" class="btn btn-primary">查看全部产品 →</a>
                            <a href="<?php echo $contact_link; ?>" class="btn btn-outline" style="color:#fff;">在线获取报价</a>
                        </div>
                        
                        <div class="hero-pills">
                            <span class="pill">✓ 一站式系统解决方案</span>
                            <span class="pill">✓ 100,000小时超长寿命</span>
                            <span class="pill">✓ 支持 OEM / ODM 定制</span>
                            <span class="pill">✓ 销往全球 30+ 国家</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3: Standard Indoor Display (pdf_banner2) -->
        <div class="hero-slide">
            <div class="hero-visual">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/pdf_banner2.png'); ?>" alt="Zhongming 室内标准屏系列 Display">
            </div>
            <div class="hero-container">
                <div class="hero-content">
                    <div class="hero-content-inner">
                        <div class="hero-eyebrow">室内标准屏系列</div>
                        <h1 class="hero-h1">
                            高画质<br>
                            <span class="highlight">室内标准显示屏</span><br>
                            适用于关键控制中心
                        </h1>
                        <p class="hero-sub">采用低亮高灰技术，拥有 3840Hz–7680Hz 的超高刷新率。超轻、高精度的无缝拼接铝质箱体，专为控制室、电视台演播厅及大型会议厅打造。</p>
                        
                        <div class="hero-btns">
                            <a href="<?php echo zm_category_link('standard-indoor'); ?>" class="btn btn-primary">探索室内标准系列 →</a>
                            <a href="<?php echo $contact_link; ?>" class="btn btn-outline" style="color:#fff;">在线获取报价</a>
                        </div>
                        
                        <div class="hero-pills">
                            <span class="pill">✓ 3840-7680Hz 超高刷</span>
                            <span class="pill">✓ 极佳的低亮高灰表现</span>
                            <span class="pill">✓ 全前维护便捷拆装</span>
                            <span class="pill">✓ 无缝高精度拼装</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 4: Flexible LED Soft Module (pdf_banner3) -->
        <div class="hero-slide">
            <div class="hero-visual">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/pdf_banner3.png'); ?>" alt="Zhongming Flexible LED Display">
            </div>
            <div class="hero-container">
                <div class="hero-content">
                    <div class="hero-content-inner">
                        <div class="hero-eyebrow">柔性创意显示屏</div>
                        <h1 class="hero-h1">
                            释放创意火花<br>
                            <span class="highlight">LED 柔性软模组</span><br>
                            纤薄灵动可弯曲
                        </h1>
                        <p class="hero-sub">橡胶底壳与面罩完美结合，支持任意弯曲、卷绕。最小拼接直径仅 406.6mm (由四张 320x160 模组组成)。采用强磁吸前维护及专用消影电路设计，画面高清细腻无拖尾，支持模块化贴装，轻松无缝组装出圆柱、弧形、吊装等艺术造型。</p>
                        
                        <div class="hero-btns">
                            <a href="<?php echo zm_category_link('flexible-led'); ?>" class="btn btn-primary">探索柔性创意系列 →</a>
                            <a href="<?php echo $contact_link; ?>" class="btn btn-outline" style="color:#fff;">获取专属方案</a>
                        </div>
                        
                        <div class="hero-pills">
                            <span class="pill">✓ 最小直径 406.6mm 拼接</span>
                            <span class="pill">✓ 强磁吸前维护设计</span>
                            <span class="pill">✓ 专用电路消影无拖尾</span>
                            <span class="pill">✓ 360° 全方位观看视角</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 5: 16:9 Premium Indoor Display (pdf_banner4) -->
        <div class="hero-slide">
            <div class="hero-visual">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/pdf_banner4.png'); ?>" alt="Zhongming 16:9 Golden Proportion LED Display">
            </div>
            <div class="hero-container">
                <div class="hero-content">
                    <div class="hero-content-inner">
                        <div class="hero-eyebrow">16:9 黄金比例屏</div>
                        <h1 class="hero-h1">
                            黄金比例 16:9<br>
                            <span class="highlight">高端室内拼接显示屏</span><br>
                            点对点还原 4K/8K
                        </h1>
                        <p class="hero-sub">完美实现点对点拼装，符合标准 16:9 黄金比例。配备 LED HDR 图像优化系统，具有惊人的对比度，并支持双系统双电源信号备份，画面纤毫毕现。</p>
                        
                        <div class="hero-btns">
                            <a href="<?php echo zm_category_link('169-indoor'); ?>" class="btn btn-primary">探索 16:9 黄金屏 →</a>
                            <a href="<?php echo $contact_link; ?>" class="btn btn-outline" style="color:#fff;">在线获取报价</a>
                        </div>
                        
                        <div class="hero-pills">
                            <span class="pill">✓ 16:9 黄金视效比例</span>
                            <span class="pill">✓ LED HDR 图像调色引擎</span>
                            <span class="pill">✓ 双信号双电源热备份</span>
                            <span class="pill">✓ 完美的超高清分辨率点对点</span>
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
        <span class="hero-dot" data-slide="5"></span>
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
            <div class="hero-eyebrow">产品系列分类</div>
            <h2 class="section-title">全品类 LED 显示屏整体解决方案</h2>
            <p class="section-sub">从会议室到体育馆——为您量身定制室内、户外、创意等各种场景的 LED 显示屏。</p>
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
                                <img src="<?php echo esc_url($fallback_img); ?>" alt="<?php the_title_attribute(); ?>" style="width:100%; height:100%; object-fit:cover;">
                            <?php else : ?>
                                <div style="width:100%;height:100%;background:#f0f0f0;display:flex;align-items:center;justify-content:center;color:#ccc;font-size:36px;">🖼</div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($badge) : ?>
                            <span class="badge badge-<?php echo esc_attr($badge); ?>"><?php 
                                $badge_upper = strtoupper($badge);
                                if ($badge_upper === 'INDOOR') echo '室内';
                                elseif ($badge_upper === 'OUTDOOR') echo '户外';
                                elseif ($badge_upper === 'SPECIAL') echo '创意';
                                elseif ($badge_upper === 'RENTAL') echo '租赁';
                                else echo esc_html($badge_upper);
                            ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="product-info">
                        <h3><?php the_title(); ?></h3>
                        <ul class="product-specs">
                            <li><strong>像素间距:</strong> <?php echo $pitch  ? (is_numeric($pitch) ? esc_html($pitch).'mm' : esc_html(zm_translate_spec_val($pitch))) : '—'; ?></li>
                            <li><strong>箱体尺寸:</strong>     <?php echo $cabinet ? esc_html(zm_translate_spec_val($cabinet))   : '—'; ?></li>
                            <li><strong>屏幕亮度:</strong>  <?php echo $brightness ? esc_html(zm_translate_spec_val($brightness)) : '—'; ?></li>
                            <li><strong>最佳视距:</strong><?php echo $viewing ? esc_html(zm_translate_spec_val($viewing))   : '—'; ?></li>
                        </ul>
                        <div class="product-btns">
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="padding:8px 12px;">查看详情</a>
                            <a href="<?php echo esc_url( zhongming_get_contact_url() . '?product_title=' . urlencode( html_entity_decode( get_the_title() ) ) ); ?>" class="btn btn-primary" style="padding:8px 12px;"><?php esc_html_e( '获取报价', 'zhongming' ); ?></a>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
        <div style="text-align:center; margin-top:40px;">
            <a href="<?php echo zm_product_archive_link(); ?>" class="btn btn-outline">查看全部产品 →</a>
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
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/page2_img5.jpeg" alt="Zhongming R&D Office">
                            </div>
                            <div class="slider-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/page2_img10.jpeg" alt="Zhongming Production Line">
                            </div>
                            <div class="slider-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/page2_img11.jpeg" alt="Zhongming LED Testing">
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
                        <div class="badge-label">余年行业经验</div>
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
                <div class="hero-eyebrow">关于中茗光电</div>
                <h2 class="section-title" style="text-align: left; margin: 12px 0 24px;">领先的 LED 显示屏系统制造商</h2>
                <p style="font-size: 16px; line-height: 1.7; color: var(--color-text-2); margin-bottom: 20px;">
                    深圳市中茗光电科技有限公司是一家集 LED 显示屏系统研发、生产、销售于一体的科技型综合企业。凭借雄厚的技术实力和先进的光电技术，我们专注于高品质的 LED 显示屏解决方案。
                </p>
                <p style="font-size: 15px; line-height: 1.7; color: var(--color-text-3); margin-bottom: 32px;">
                    我们严格秉承“信誉第一、质量可靠、客户至上、服务第一”的经营理念。从研发到量产，每一件产品都遵循严苛的标准控制流程，以确保最佳的性价比、质量、交期和服务（CQTS）。
                </p>
                <ul class="company-advantages-list">
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--color-text);">
                        <span style="color: var(--color-accent-blue);">✓</span> ISO 9001 质量管理体系认证
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--color-text);">
                        <span style="color: var(--color-accent-blue);">✓</span> 30+ 出口国家与地区
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--color-text);">
                        <span style="color: var(--color-accent-blue);">✓</span> 自主研发设计团队
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--color-text);">
                        <span style="color: var(--color-accent-blue);">✓</span> 24/7 技术支持
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
                <div class="stat-label">出口国家与地区</div>
            </div>
            <div class="stat-card" style="background:var(--color-white);">
                <div class="stat-num">100K h</div>
                <div class="stat-label">产品设计寿命</div>
            </div>
            <div class="stat-card" style="background:var(--color-white);">
                <div class="stat-num">CE / RoHS</div>
                <div class="stat-label">国际准入认证</div>
            </div>
            <div class="stat-card" style="background:var(--color-white);">
                <div class="stat-num">OEM/ODM</div>
                <div class="stat-label">OEM/ODM 定制服务</div>
            </div>
        </div>
    </div>
</section>

<!-- Section 4.5: Global Projects Gallery -->
<section class="wf-section">
    <div class="container">
        <div class="section-header">
            <div class="hero-eyebrow">成功案例展示</div>
            <h2 class="section-title">全球项目部署案例</h2>
            <p class="section-sub">为全球控制中心、商业零售和创意展示场所提供可靠的 LED 显示屏系统。</p>
        </div>
        <div class="cases-grid">
            <?php
            $cases = [
                ['img'=>'case-1.jpg', 'title'=>'沉浸式演播摄影棚'],
                ['img'=>'case-2.jpg', 'title'=>'室内高清视频墙'],
                ['img'=>'case-3.jpg', 'title'=>'户外广告牌'],
                ['img'=>'case-4.jpg', 'title'=>'LED透明屏'],
            ];
            foreach ($cases as $case) : ?>
                <div class="case-item" style="position: relative; aspect-ratio: 4/3; overflow: hidden; border-radius: 8px; group">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $case['img']; ?>" 
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
            <div class="hero-eyebrow">企业优势</div>
            <h2 class="section-title">为什么选择中茗光电</h2>
        </div>
        <div class="adv-grid">
            <?php
            $advantages = [
                ['icon'=>'🏭','title'=>'自主研发制造','desc'=>'拥有从产品研发设计到质量检测老化的完整生产链。我们对生产的每个环节进行全面把控，以确保始终如一的品质。'],
                ['icon'=>'🔬','title'=>'100+ 项严格质量检测','desc'=>'每件出厂产品均通过冷热冲击、高温满载老化、防静电（ESD）及电磁兼容（EMC）等全方位测试，确保全球放心使用。'],
                ['icon'=>'🔄','title'=>'极高刷新率表现','desc'=>'支持 3840Hz–7680Hz 超高刷新率，保障画面无频闪、无扫描线，完美契合摄像机抓拍和电视台演播厅要求。'],
                ['icon'=>'🛡️','title'=>'完善的 CQTS 管理','desc'=>'通过从订单下达到售后服务的全流程科学管理体系，为您提供具有竞争力性价比、卓越品质、准时交期和无忧服务。'],
                ['icon'=>'⚙️','title'=>'OEM / ODM 定制经验','desc'=>'支持定制箱体尺寸、丝印客户 LOGO（贴牌）及针对各种复杂安装环境的定制化特形屏工程技术方案。'],
                ['icon'=>'🛠','title'=>'便捷拆装维护','desc'=>'成熟的模块化前维护设计，模组热插拔仅需数秒即可完成，大大降低后期维护时间成本与人工费用。']
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
            <div class="hero-eyebrow">应用领域</div>
            <h2 class="section-title">服务于全球各行各业和多种场所</h2>
        </div>
        <div class="apps-grid">
            <?php
            $scenarios = [
                ['name'=>'户外商业广告',    'img'=>'app-outdoor.jpg'],
                ['name'=>'多功能会议室',   'img'=>'app-indoor.jpg'],
                ['name'=>'广电/演播大厅',  'img'=>'app-immersive.jpg'],
                ['name'=>'指挥监控中心',    'img'=>'case-2.jpg'],
                ['name'=>'舞台演艺活动',    'img'=>'case-5.jpg'],
                ['name'=>'零售连锁商超',    'img'=>'case-7.jpg'],
                ['name'=>'体育场馆显示',  'img'=>'case-3.jpg'],
                ['name'=>'建筑格栅亮化',  'img'=>'case-8.jpg'],
                ['name'=>'创意展厅展馆',   'img'=>'case-6.jpg'],
                ['name'=>'安防监控大屏','img'=>'case-2.jpg'],
            ];
            foreach ($scenarios as $s) : ?>
                <div class="app-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $s['img']; ?>" alt="">
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
            <div class="hero-eyebrow">最新工程案例</div>
            <h2 class="section-title">全球各地成功部署实例</h2>
        </div>
        <div class="tabs">
            <div class="tab-btn active" data-tab="all">全部</div>
            <div class="tab-btn" data-tab="indoor">室内屏</div>
            <div class="tab-btn" data-tab="outdoor">户外屏</div>
            <div class="tab-btn" data-tab="rental">舞台租赁</div>
            <div class="tab-btn" data-tab="special">创意设计</div>
        </div>
        <div class="gallery-grid">
            <?php 
            $gallery_cases = [
                ['img'=>'case-1.jpg', 'cat'=>'special', 'title'=>'沉浸式演播摄影棚'],
                ['img'=>'case-2.jpg', 'cat'=>'indoor',  'title'=>'指挥控制中心屏'],
                ['img'=>'case-3.jpg', 'cat'=>'outdoor', 'title'=>'户外 P5 LED 显示屏'],
                ['img'=>'case-4.jpg', 'cat'=>'special', 'title'=>'商场LED透明屏'],
                ['img'=>'case-5.jpg', 'cat'=>'rental',  'title'=>'舞台演唱会租用屏'],
                ['img'=>'case-6.jpg', 'cat'=>'indoor',  'title'=>'企业展厅创意屏'],
                ['img'=>'case-7.jpg', 'cat'=>'indoor',  'title'=>'新零售橱窗展示屏'],
                ['img'=>'case-8.jpg', 'cat'=>'outdoor', 'title'=>'体育馆赛事直播屏'],
            ];
            foreach ($gallery_cases as $c) : ?>
                <div class="gallery-item" data-category="<?php echo $c['cat']; ?>" style="position:relative; aspect-ratio:1/1; overflow:hidden; border-radius:4px;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $c['img']; ?>" 
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

<!-- Section 8.5: Homepage Quick Inquiry & Social Links -->
<section class="wf-section homepage-inquiry-section" style="background: var(--color-bg-2); border-top: 1px solid var(--color-border); padding: 60px 0;">
    <div class="container">
        <div class="inquiry-split-layout">
            <!-- Left Panel: Text & Social Media -->
            <div class="inquiry-text-panel">
                <div class="hero-eyebrow" style="text-align: left; color: var(--color-accent-blue);">快速咨询通道</div>
                <h2 class="section-title" style="text-align: left; margin-top: 12px; margin-bottom: 20px; font-size: 28px;">获取定制方案与报价</h2>
                <p style="font-size: 15px; line-height: 1.7; color: var(--color-text-2); margin-bottom: 30px;">
                    提交您的邮箱和项目要求，我们的 B2B 技术顾问将在 24 小时内回复您，并提供详细的技术规格、排版接线方案及具体报价选项。
                </p>
                <!-- Social Media Buttons -->
                <div class="social-links-wrapper">
                    <span style="font-size: 13px; font-weight: 700; color: var(--color-text-3); text-transform: uppercase; display: block; margin-bottom: 12px; letter-spacing: 0.05em;">关注我们</span>
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
                        ✓ 感谢您的垂询！您的信息已成功提交，我们将尽快与您取得联系。
                    </div>
                <?php else : ?>
                    <form action="" method="post" style="display: flex; flex-direction: column; gap: 16px;">
                        <div class="form-group">
                            <label for="client_email" style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--color-text-2); margin-bottom: 6px; letter-spacing: 0.5px;">邮箱地址 *</label>
                            <input type="email" id="client_email" name="client_email" required class="wf-input" placeholder="例如 yourname@company.com" style="width: 100%; height: 44px; border: 1px solid var(--color-border); border-radius: 6px; padding: 0 16px; font-size: 14px; background-color: var(--color-bg-2);">
                        </div>
                        <div class="form-group">
                            <label for="client_message" style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--color-text-2); margin-bottom: 6px; letter-spacing: 0.5px;">项目具体需求 *</label>
                            <textarea id="client_message" name="client_message" required class="wf-textarea" placeholder="例如：尺寸、像素间距、安装环境、所需产品型号等... / 模组或整屏需求" style="width: 100%; height: 100px; border: 1px solid var(--color-border); border-radius: 6px; padding: 12px 16px; font-size: 14px; background-color: var(--color-bg-2); font-family: inherit; resize: vertical;"></textarea>
                        </div>
                        <input type="hidden" name="homepage_inquiry_submit" value="1">
                        <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; height: 44px; font-size: 14px; font-weight: 700; text-transform: uppercase; border-radius: 6px; background-color: #0057b8 !important; border: 1px solid #0057b8 !important; color: #ffffff !important; transition: all 0.2s;">
                            提交咨询 →
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
        <h2 class="section-title" style="color:white;">准备好开始您的 LED 项目了吗？</h2>
        <p class="section-sub" style="color:rgba(255,255,255,0.8); max-width:600px; margin:0 auto 32px;">将您的项目具体需求（如屏幕尺寸、像素间距、安装环境等）发给我们，我们将在 24 小时内为您定制方案及具体报价。</p>
        <div style="display:flex; gap:16px; justify-content:center;">
            <a href="<?php echo $contact_link; ?>" class="btn btn-primary" style="background:white;color:var(--color-primary);padding:14px 32px;font-size:15px;">获取免费方案与报价 →</a>
            <a href="#" class="btn btn-outline btn-outline-white">下载产品目录 (PDF)</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
