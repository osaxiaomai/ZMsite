<?php
/**
 * Template Name: Solutions Template
 *
 * 解决方案与应用场景 page template for Zhongming LED.
 * Showcases application scenarios with case study photos.
 */

get_header(); ?>

<!-- Solutions Page Hero -->
<section class="about-hero" style="background-color: var(--color-bg-2); border-bottom: 1px solid var(--color-border); padding: 60px 0;">
    <div class="container">
        <span class="hero-eyebrow" style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: var(--color-text-3); display: block; margin-bottom: 8px;">
            解决方案与应用场景
        </span>
        <h1 class="hero-h1" style="font-size: 32px; font-weight: 800; color: var(--color-text); margin-bottom: 12px; line-height: 1.2;">
            适合各种场景的 LED 显示屏解决方案
        </h1>
        <p class="hero-sub" style="font-size: 15px; color: var(--color-text-2); line-height: 1.7; max-width: 720px; margin: 0;">
            从零售店面到沉浸式 XR 影棚，从体育场馆到企业指挥中心——中茗光电为全球 30 多个国家的 10 多个主要应用领域提供定制化解决方案。
        </p>
    </div>
</section>

<!-- 应用场景 Grid -->
<section class="solutions-scenarios" style="padding: 60px 0; background-color: #ffffff;">
    <div class="container">
        <div class="about-section-header" style="margin-bottom: 40px; display: flex; align-items: center; gap: 12px;">
            <div>
                <h2 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin: 0;">应用场景</h2>
                <span style="font-size: 12px; color: var(--color-text-3);">我们的 LED 显示屏大显身手的地方</span>
            </div>
        </div>

        <div class="solutions-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">

            <!-- Scenario 1: 室内商用显示 -->
            <div class="solution-card" style="border: 1px solid var(--color-border); border-radius: 8px; overflow: hidden; transition: box-shadow 0.2s ease-in-out;">
                <div style="height: 180px; overflow: hidden; background-color: var(--color-bg-2);">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/app-indoor.jpg'); ?>" alt="室内商用显示 LED Display" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s ease;">
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                        <span style="width: 32px; height: 32px; border-radius: 6px; background-color: #e8f0fe; display: flex; align-items: center; justify-content: center; font-size: 16px;">🏢</span>
                        <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;">室内商用显示</h3>
                    </div>
                    <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin-bottom: 14px;">控制室、会议厅、广播演播室、大堂和零售环境。提供 P0.7 至 P2.5 的小间距解决方案，呈现无妥协的画质。</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">控制室</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">会议室</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">广播演播</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">展会展厅</span>
                    </div>
                    <a href="<?php echo zm_category_link('standard-indoor'); ?>" class="btn btn-outline" style="margin-top: 14px; padding: 7px 14px; font-size: 12px; display: inline-block;">查看室内产品 →</a>
                </div>
            </div>

            <!-- Scenario 2: 户外广告大屏 -->
            <div class="solution-card" style="border: 1px solid var(--color-border); border-radius: 8px; overflow: hidden; transition: box-shadow 0.2s ease-in-out;">
                <div style="height: 180px; overflow: hidden; background-color: var(--color-bg-2);">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/app-outdoor.jpg'); ?>" alt="Outdoor LED Billboard" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s ease;">
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                        <span style="width: 32px; height: 32px; border-radius: 6px; background-color: #e8f5e9; display: flex; align-items: center; justify-content: center; font-size: 16px;">🏗️</span>
                        <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;">户外广告大屏</h3>
                    </div>
                    <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin-bottom: 14px;">IP65 防护等级户外超大规格广告牌、建筑幕墙、路边标识和体育场馆。高亮度可达 8000 nit，白日光照下依旧清晰可见。</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">户外广告牌</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">体育场馆</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">建筑幕墙</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">路边标识</span>
                    </div>
                    <a href="<?php echo zm_category_link('standard-outdoor'); ?>" class="btn btn-outline" style="margin-top: 14px; padding: 7px 14px; font-size: 12px; display: inline-block;">查看户外产品 →</a>
                </div>
            </div>

            <!-- Scenario 3: XR & 虚拟摄影棚 -->
            <div class="solution-card" style="border: 1px solid var(--color-border); border-radius: 8px; overflow: hidden; transition: box-shadow 0.2s ease-in-out;">
                <div style="height: 180px; overflow: hidden; background-color: var(--color-bg-2);">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/app-immersive.jpg'); ?>" alt="XR 虚拟摄影棚" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s ease;">
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                        <span style="width: 32px; height: 32px; border-radius: 6px; background-color: #f3e5f5; display: flex; align-items: center; justify-content: center; font-size: 16px;">🎬</span>
                        <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;">XR & 虚拟摄影棚</h3>
                    </div>
                    <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin-bottom: 14px;">面向电影拍摄、电视演播、汽车发布及文化体验的 5 面体 XR 虚拟拍摄环境。定制几何形状实现 360° 全方位沉浸体验。</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">虚拟拍摄</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">影视基地</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">汽车发布</span>
                    </div>
                    <a href="<?php echo zm_category_link('customized-xr'); ?>" class="btn btn-outline" style="margin-top: 14px; padding: 7px 14px; font-size: 12px; display: inline-block;">查看虚拟拍摄产品 →</a>
                </div>
            </div>

            <!-- Scenario 4: 舞台演艺活动 -->
            <div class="solution-card" style="border: 1px solid var(--color-border); border-radius: 8px; overflow: hidden; transition: box-shadow 0.2s ease-in-out;">
                <div style="height: 180px; overflow: hidden; background-color: var(--color-bg-2);">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/case-1.jpg'); ?>" alt="Stage Event LED Screen" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s ease;">
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                        <span style="width: 32px; height: 32px; border-radius: 6px; background-color: #fff8e1; display: flex; align-items: center; justify-content: center; font-size: 16px;">🎤</span>
                        <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;">舞台演艺活动</h3>
                    </div>
                    <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin-bottom: 14px;">专为演唱会、大型会议、企业活动和展会设计的租赁级镁铝合金箱体屏。单人快速锁扣系统，支持极速搭建拆卸。</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">演唱会</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">展览会</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">大型会议</span>
                    </div>
                    <a href="<?php echo zm_category_link('indoor-rental'); ?>" class="btn btn-outline" style="margin-top: 14px; padding: 7px 14px; font-size: 12px; display: inline-block; margin-right: 8px;">室内租赁屏 →</a>
                    <a href="<?php echo zm_category_link('outdoor-rental'); ?>" class="btn btn-outline" style="margin-top: 14px; padding: 7px 14px; font-size: 12px; display: inline-block;">户外租赁屏 →</a>
                </div>
            </div>

            <!-- Scenario 5: 商场LED透明屏 -->
            <div class="solution-card" style="border: 1px solid var(--color-border); border-radius: 8px; overflow: hidden; transition: box-shadow 0.2s ease-in-out;">
                <div style="height: 180px; overflow: hidden; background-color: var(--color-bg-2);">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/case-3.jpg'); ?>" alt="Retail Transparent LED Display" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s ease;">
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                        <span style="width: 32px; height: 32px; border-radius: 6px; background-color: #e3f2fd; display: flex; align-items: center; justify-content: center; font-size: 16px;">🛍️</span>
                        <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;">商场LED透明屏</h3>
                    </div>
                    <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin-bottom: 14px;">适用于临街橱窗、汽车展厅、商场和机场的 LED 透明屏和光电玻璃。高达 90% 的通透率，在采光不受阻碍的同时呈现炫酷显示。</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">沿街橱窗</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">展厅展馆</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">机场车站</span>
                    </div>
                    <a href="<?php echo zm_category_link('transparent-screen'); ?>" class="btn btn-outline" style="margin-top: 14px; padding: 7px 14px; font-size: 12px; display: inline-block;">查看透明屏产品 →</a>
                </div>
            </div>

            <!-- Scenario 6: 互动式地砖屏 -->
            <div class="solution-card" style="border: 1px solid var(--color-border); border-radius: 8px; overflow: hidden; transition: box-shadow 0.2s ease-in-out;">
                <div style="height: 180px; overflow: hidden; background-color: var(--color-bg-2);">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/case-5.jpg'); ?>" alt="Interactive Floor LED" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s ease;">
                </div>
                <div style="padding: 20px;">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                        <span style="width: 32px; height: 32px; border-radius: 6px; background-color: #fbe9e7; display: flex; align-items: center; justify-content: center; font-size: 16px;">🎯</span>
                        <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;">互动式地砖屏</h3>
                    </div>
                    <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.6; margin-bottom: 14px;">承重可达 500KG/m²，可选压力传感器追踪功能，为博物馆、酒店和主题乐园提供互动式访客体验。</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">博物馆</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">酒店</span>
                        <span style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 3px; font-size: 10px; font-weight: 600; padding: 2px 6px; color: var(--color-text-2);">主题乐园</span>
                    </div>
                    <a href="<?php echo zm_category_link('floor-tile-screen'); ?>" class="btn btn-outline" style="margin-top: 14px; padding: 7px 14px; font-size: 12px; display: inline-block;">查看地砖屏产品 →</a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 案例展示 Section -->
<section class="solutions-cases" style="padding: 60px 0; background-color: var(--color-bg-2); border-top: 1px solid var(--color-border);">
    <div class="container">
        <div class="about-section-header" style="margin-bottom: 40px; display: flex; align-items: center; gap: 12px;">
            <div>
                <h2 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin: 0;">最新工程案例展示</h2>
                <span style="font-size: 12px; color: var(--color-text-3);">精选全球各种环境下的成功安装部署实例</span>
            </div>
        </div>

        <!-- Case Photo Gallery Grid -->
        <div class="case-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 32px;">
            <?php
            $case_images = [
                ['src' => 'case-1.jpg', 'label' => '舞台租赁活动'],
                ['src' => 'case-2.jpg', 'label' => '户外广告牌'],
                ['src' => 'case-3.jpg', 'label' => '零售透明屏'],
                ['src' => 'case-4.jpg', 'label' => '室内控制室'],
                ['src' => 'case-5.jpg', 'label' => '互动地砖屏'],
                ['src' => 'case-6.jpg', 'label' => '展厅展馆'],
                ['src' => 'case-7.jpg', 'label' => '会议中心'],
                ['src' => 'case-8.jpg', 'label' => '创意建筑'],
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
                <h2 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin: 0;">为什么选择中茗光电？</h2>
                <span style="font-size: 12px; color: var(--color-text-3);">作为您的 LED 显示屏合作伙伴，我们的技术与服务优势</span>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
            <?php
            $advantages = [
                ['icon' => '🔬', 'title' => '研发驱动高品质', 'desc' => '自主研发团队开发专属 LED 显示屏解决方案。每款产品在大批量生产前均通过 100+ 项测试验证。'],
                ['icon' => '🌍', 'title' => '行销全球 30+ 国家', 'desc' => '深受美国、俄罗斯、沙特、澳大利亚、日本等 25+ 区域市场的客户信赖。全球实力见证。'],
                ['icon' => '⚡', 'title' => '快速响应交期', 'desc' => '标准化的生产流程，核心备件库缓冲。根据具体配置规格，交期一般在 15-25 天左右。'],
                ['icon' => '🛡️', 'title' => 'CE, RoHS, FCC 国际准入', 'desc' => '齐全的国际认证证书，确保能顺利进口并通关进入欧洲、美洲及亚太地区市场。'],
                ['icon' => '🔧', 'title' => '支持 OEM/ODM 定制', 'desc' => '为分销商和系统集成商提供灵活的贴牌合作形式。支持箱体尺寸定制及专属品牌丝印 LOGO。'],
                ['icon' => '📞', 'title' => '24 小时技术保障', 'desc' => '专职的技术售后工程师团队。承诺提供远程故障诊断、现场协助调试及配件保障供应。'],
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
        <h2 style="font-size: 26px; font-weight: 800; color: #ffffff; margin-bottom: 12px; line-height: 1.3;">准备好开始您的 LED 显示屏项目了吗？</h2>
        <p style="font-size: 15px; color: rgba(255,255,255,0.75); max-width: 600px; margin: 0 auto 28px; line-height: 1.7;">
            将您的项目需求与我们分享，我们将在 24 小时内回复您，并提供合理的产品建议与初步预算评估。
        </p>
        <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo $contact_link; ?>" class="btn btn-primary" style="padding: 12px 28px; font-size: 15px;">免费获取报价方案 →</a>
            <a href="<?php echo zm_product_archive_link(); ?>" class="btn btn-outline" style="padding: 12px 28px; font-size: 15px; color: #ffffff; border-color: rgba(255,255,255,0.5);">浏览全系列产品</a>
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
