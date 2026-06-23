<?php
/**
 * Template Name: 关于我们 Template
 *
 * Custom page template for the 关于我们 page, featuring the company overview,
 * glance statistics, certificates grid, QA testing modules, and global export markets map.
 */

get_header(); 
$contact_link = function_exists('zhongming_get_contact_url') ? zhongming_get_contact_url() : site_url('/contact/');
?>

<!-- 关于我们 Page Header/Hero -->
<section class="about-hero" style="background-color: var(--color-bg-2); border-bottom: 1px solid var(--color-border); padding: 60px 0;">
    <div class="container">
        <span class="hero-eyebrow" style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: var(--color-text-3); display: block; margin-bottom: 8px;">
            <?php esc_html_e( '关于我们', 'zhongming' ); ?>
        </span>
        <h1 class="hero-h1" style="font-size: 32px; font-weight: 800; color: var(--color-text); margin-bottom: 12px; line-height: 1.2;">
            <?php esc_html_e( '深圳市中茗光电科技有限公司', 'zhongming' ); ?>
        </h1>
        <p class="hero-sub" style="font-size: 15px; color: var(--color-text-2); line-height: 1.7; max-width: 720px; margin: 0;">
            <?php esc_html_e( '专业LED显示屏制造商，总部位于深圳市宝安区。自成立以来，始终以研发驱动品质为核心，提供从室内小间距显示屏、户外大规格广告牌到沉浸式创意定制装置的全系列解决方案。', 'zhongming' ); ?>
        </p>
    </div>
</section>

<!-- Section 1: 公司简介 -->
<section class="about-overview" style="padding: 60px 0; background-color: #ffffff;">
    <div class="container">
        <div class="about-section-header" style="margin-bottom: 40px; display: flex; align-items: center; gap: 12px;">
            <span class="section-num-badge" style="width: 28px; height: 28px; border-radius: 50%; background-color: var(--color-text); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700;">1</span>
            <div>
                <h2 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin: 0;"><?php esc_html_e( '公司简介', 'zhongming' ); ?></h2>
                <span style="font-size: 12px; color: var(--color-text-3);"><?php esc_html_e( '我们是谁，我们做什么', 'zhongming' ); ?></span>
            </div>
        </div>

        <div class="about-overview-grid" style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 60px; align-items: start;">
            <!-- Left Column: Copywriting -->
            <div class="about-copy" style="font-size: 14px; color: var(--color-text-2); line-height: 1.8; display: flex; flex-direction: column; gap: 16px;">
                <p>
                    <?php esc_html_e( '中茗光电是一家集 LED 显示屏系统研发、生产、销售于一体的科技型综合企业。公司技术力量雄厚，拥有精良的生产及检测设备。', 'zhongming' ); ?>
                </p>
                <p>
                    <?php esc_html_e( '我们严格秉承“持续从客户角度出发优化”的理念，为所有产品提供可靠的 CQTS（性价比、品质、交期、服务）。每件产品在出厂前均经过研发设计验证、品质检测、材料筛选、试产及全流程品控。', 'zhongming' ); ?>
                </p>
                <p>
                    <?php esc_html_e( '我们的 LED 显示屏已成功部署于美国、墨西哥、俄罗斯、沙特阿拉伯、科威特、伊朗、埃及、法国、澳大利亚、日本、印度、韩国、中国台湾等 30 多个国家和地区。', 'zhongming' ); ?>
                </p>

                <!-- 3 Inline Stat Cards -->
                <div class="about-inline-stats" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-top: 24px;">
                    <div style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 6px; padding: 16px; text-align: center;">
                        <div style="font-size: 20px; font-weight: 700; color: var(--color-text); margin-bottom: 4px;">30+</div>
                        <div style="font-size: 11px; color: var(--color-text-3); text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">出口国家</div>
                    </div>
                    <div style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 6px; padding: 16px; text-align: center;">
                        <div style="font-size: 20px; font-weight: 700; color: var(--color-text); margin-bottom: 4px;">10年+</div>
                        <div style="font-size: 11px; color: var(--color-text-3); text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">行业经验</div>
                    </div>
                    <div style="background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 6px; padding: 16px; text-align: center;">
                        <div style="font-size: 20px; font-weight: 700; color: var(--color-text); margin-bottom: 4px;">OEM/ODM</div>
                        <div style="font-size: 11px; color: var(--color-text-3); text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">支持定制</div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Visual Image Grid -->
            <div class="about-images-column" style="display: flex; flex-direction: column; gap: 12px;">
                <!-- Main factory visual block -->
                <div class="factory-image-container" style="width: 100%; height: 360px; border-radius: 6px; overflow: hidden; border: 1px solid var(--color-border); background-color: var(--color-bg-2);">
                    <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about-factory.jpg'); ?>" alt="Zhongming Factory Building" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>

                <!-- Triple secondary thumbnails -->
                <div class="about-secondary-images" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;">
                    <div class="about-thumb" onclick="switchAboutImage(this)" style="height: 90px; border-radius: 4px; overflow: hidden; border: 2px solid var(--color-border); background-color: var(--color-bg-2); position: relative; cursor: pointer; transition: all 0.2s ease-in-out;">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/page2_img10.jpeg'); ?>" alt="生产线" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                        <span style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.6); color: #fff; font-size: 9px; text-align: center; padding: 2px 0;">生产线</span>
                    </div>
                    <div class="about-thumb" onclick="switchAboutImage(this)" style="height: 90px; border-radius: 4px; overflow: hidden; border: 2px solid var(--color-border); background-color: var(--color-bg-2); position: relative; cursor: pointer; transition: all 0.2s ease-in-out;">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/page2_img11.jpeg'); ?>" alt="质检测试" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                        <span style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.6); color: #fff; font-size: 9px; text-align: center; padding: 2px 0;">质检测试</span>
                    </div>
                    <div class="about-thumb" onclick="switchAboutImage(this)" style="height: 90px; border-radius: 4px; overflow: hidden; border: 2px solid var(--color-border); background-color: var(--color-bg-2); position: relative; cursor: pointer; transition: all 0.2s ease-in-out;">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/page2_img5.jpeg'); ?>" alt="团队与研发" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                        <span style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.6); color: #fff; font-size: 9px; text-align: center; padding: 2px 0;">展厅 / 研发</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: 企业一览 -->
<section class="about-glance" style="padding: 60px 0; background-color: var(--color-bg-2); border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border);">
    <div class="container">
        <div class="about-section-header" style="margin-bottom: 40px; display: flex; align-items: center; gap: 12px;">
            <span class="section-num-badge" style="width: 28px; height: 28px; border-radius: 50%; background-color: var(--color-text); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700;">2</span>
            <div>
                <h2 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin: 0;"><?php esc_html_e( '企业一览', 'zhongming' ); ?></h2>
                <span style="font-size: 12px; color: var(--color-text-3);"><?php esc_html_e( '我们制造能力的核心数据', 'zhongming' ); ?></span>
            </div>
        </div>

        <div class="about-glance-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
            <div class="stat-card" style="background-color: #ffffff; border: 1px solid var(--color-border); border-radius: 6px; padding: 24px; text-align: center; box-shadow: 0 2px 8px rgba(0,0,0,0.02); transition: all 0.2s ease-in-out;">
                <div class="stat-num" style="font-size: 32px; font-weight: 800; color: var(--color-text); margin-bottom: 6px;">30+</div>
                <div class="stat-label" style="font-size: 12px; color: var(--color-text-2); font-weight: 500;"><?php esc_html_e( '出口国家与地区', 'zhongming' ); ?></div>
            </div>
            <div class="stat-card" style="background-color: #ffffff; border: 1px solid var(--color-border); border-radius: 6px; padding: 24px; text-align: center; box-shadow: 0 2px 8px rgba(0,0,0,0.02); transition: all 0.2s ease-in-out;">
                <div class="stat-num" style="font-size: 32px; font-weight: 800; color: var(--color-text); margin-bottom: 6px;">10万小时</div>
                <div class="stat-label" style="font-size: 12px; color: var(--color-text-2); font-weight: 500;"><?php esc_html_e( '产品设计寿命', 'zhongming' ); ?></div>
            </div>
            <div class="stat-card" style="background-color: #ffffff; border: 1px solid var(--color-border); border-radius: 6px; padding: 24px; text-align: center; box-shadow: 0 2px 8px rgba(0,0,0,0.02); transition: all 0.2s ease-in-out;">
                <div class="stat-num" style="font-size: 32px; font-weight: 800; color: var(--color-text); margin-bottom: 6px;">100+</div>
                <div class="stat-label" style="font-size: 12px; color: var(--color-text-2); font-weight: 500;"><?php esc_html_e( '品质检测分类', 'zhongming' ); ?></div>
            </div>
            <div class="stat-card" style="background-color: #ffffff; border: 1px solid var(--color-border); border-radius: 6px; padding: 24px; text-align: center; box-shadow: 0 2px 8px rgba(0,0,0,0.02); transition: all 0.2s ease-in-out;">
                <div class="stat-num" style="font-size: 32px; font-weight: 800; color: var(--color-text); margin-bottom: 6px;">OEM/ODM</div>
                <div class="stat-label" style="font-size: 12px; color: var(--color-text-2); font-weight: 500;"><?php esc_html_e( '支持 OEM/ODM 定制', 'zhongming' ); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: 国际资质认证 & Honors -->
<section class="about-certs" style="padding: 60px 0; background-color: #ffffff;">
    <div class="container">
        <div class="about-section-header" style="margin-bottom: 40px; display: flex; align-items: center; gap: 12px;">
            <span class="section-num-badge" style="width: 28px; height: 28px; border-radius: 50%; background-color: var(--color-text); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700;">3</span>
            <div>
                <h2 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin: 0;"><?php esc_html_e( '资质荣誉与认证', 'zhongming' ); ?></h2>
                <span style="font-size: 12px; color: var(--color-text-3);"><?php esc_html_e( '国际合规检测与生产认证', 'zhongming' ); ?></span>
            </div>
        </div>

        <div class="about-certs-grid" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px;">
            <div class="cert-badge" style="background-color: #ffffff; border: 1px solid var(--color-border); border-radius: 6px; padding: 20px 16px; text-align: center; transition: all 0.2s ease-in-out;">
                <div class="cert-icon" style="width: 48px; height: 48px; border-radius: 50%; background-color: var(--color-bg-2); color: var(--color-text-2); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; margin: 0 auto 12px;">CE</div>
                <h4 style="font-size: 13px; font-weight: 700; color: var(--color-text); margin-bottom: 4px;"><?php esc_html_e( 'CE 认证', 'zhongming' ); ?></h4>
                <p style="font-size: 11px; color: var(--color-text-3); margin: 0;"><?php esc_html_e( '欧盟 CE 认证', 'zhongming' ); ?></p>
            </div>
            <div class="cert-badge" style="background-color: #ffffff; border: 1px solid var(--color-border); border-radius: 6px; padding: 20px 16px; text-align: center; transition: all 0.2s ease-in-out;">
                <div class="cert-icon" style="width: 48px; height: 48px; border-radius: 50%; background-color: var(--color-bg-2); color: var(--color-text-2); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; margin: 0 auto 12px;">RoHS</div>
                <h4 style="font-size: 13px; font-weight: 700; color: var(--color-text); margin-bottom: 4px;"><?php esc_html_e( 'RoHS 环保合规', 'zhongming' ); ?></h4>
                <p style="font-size: 11px; color: var(--color-text-3); margin: 0;"><?php esc_html_e( 'RoHS 环保指令', 'zhongming' ); ?></p>
            </div>
            <div class="cert-badge" style="background-color: #ffffff; border: 1px solid var(--color-border); border-radius: 6px; padding: 20px 16px; text-align: center; transition: all 0.2s ease-in-out;">
                <div class="cert-icon" style="width: 48px; height: 48px; border-radius: 50%; background-color: var(--color-bg-2); color: var(--color-text-2); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; margin: 0 auto 12px;">FCC</div>
                <h4 style="font-size: 13px; font-weight: 700; color: var(--color-text); margin-bottom: 4px;"><?php esc_html_e( 'FCC 认证', 'zhongming' ); ?></h4>
                <p style="font-size: 11px; color: var(--color-text-3); margin: 0;"><?php esc_html_e( '美国 FCC 认证', 'zhongming' ); ?></p>
            </div>
            <div class="cert-badge" style="background-color: #ffffff; border: 1px solid var(--color-border); border-radius: 6px; padding: 20px 16px; text-align: center; transition: all 0.2s ease-in-out;">
                <div class="cert-icon" style="width: 48px; height: 48px; border-radius: 50%; background-color: var(--color-bg-2); color: var(--color-text-2); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; margin: 0 auto 12px;">EMC</div>
                <h4 style="font-size: 13px; font-weight: 700; color: var(--color-text); margin-bottom: 4px;"><?php esc_html_e( 'EMC 电磁兼容测试', 'zhongming' ); ?></h4>
                <p style="font-size: 11px; color: var(--color-text-3); margin: 0;"><?php esc_html_e( '电磁兼容性认证', 'zhongming' ); ?></p>
            </div>
            <div class="cert-badge" style="background-color: #ffffff; border: 1px solid var(--color-border); border-radius: 6px; padding: 20px 16px; text-align: center; transition: all 0.2s ease-in-out;">
                <div class="cert-icon" style="width: 48px; height: 48px; border-radius: 50%; background-color: var(--color-bg-2); color: var(--color-text-2); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; margin: 0 auto 12px;">ISO</div>
                <h4 style="font-size: 13px; font-weight: 700; color: var(--color-text); margin-bottom: 4px;"><?php esc_html_e( 'ISO 9001', 'zhongming' ); ?></h4>
                <p style="font-size: 11px; color: var(--color-text-3); margin: 0;"><?php esc_html_e( '质量管理体系', 'zhongming' ); ?></p>
            </div>
        </div>
        <p style="font-size: 11px; color: var(--color-text-3); margin-top: 20px; font-style: italic;">
            <?php esc_html_e( '* 合作伙伴如需高分辨率证书扫描件，可联系我们提供。', 'zhongming' ); ?>
        </p>
    </div>
</section>

<!-- Section 4: 品质保证体系 -->
<section class="about-qa" style="padding: 60px 0; background-color: var(--color-bg-2); border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border);">
    <div class="container">
        <div class="about-section-header" style="margin-bottom: 40px; display: flex; align-items: center; gap: 12px;">
            <span class="section-num-badge" style="width: 28px; height: 28px; border-radius: 50%; background-color: var(--color-text); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700;">4</span>
            <div>
                <h2 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin: 0;"><?php esc_html_e( '品质保证体系', 'zhongming' ); ?></h2>
                <span style="font-size: 12px; color: var(--color-text-3);"><?php esc_html_e( '出厂前经 100+ 项严苛检测分类', 'zhongming' ); ?></span>
            </div>
        </div>

        <div class="about-qa-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
            <div style="background-color: #ffffff; border: 1px solid var(--color-border); border-radius: 6px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
                    <span style="font-size: 20px;">🌲</span>
                    <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;"><?php esc_html_e( '环境适应测试', 'zhongming' ); ?></h3>
                </div>
                <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.7; margin: 0;">
                    <?php esc_html_e( '冷热冲击测试 · 高温老化测试 · 低温存储测试 · 双85温湿度循环测试 · 盐雾防腐蚀验证。', 'zhongming' ); ?>
                </p>
            </div>
            <div style="background-color: #ffffff; border: 1px solid var(--color-border); border-radius: 6px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
                    <span style="font-size: 20px;">⚡</span>
                    <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;"><?php esc_html_e( '电气安全检测', 'zhongming' ); ?></h3>
                </div>
                <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.7; margin: 0;">
                    <?php esc_html_e( '电流冲击测试 · 开关机循环测试 · 防静电（ESD）测试 · 电磁兼容性（EMC）检查 · 灯珠高压老化测试。', 'zhongming' ); ?>
                </p>
            </div>
            <div style="background-color: #ffffff; border: 1px solid var(--color-border); border-radius: 6px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
                    <span style="font-size: 20px;">🖥️</span>
                    <h3 style="font-size: 15px; font-weight: 700; color: var(--color-text); margin: 0;"><?php esc_html_e( '显示性能检测', 'zhongming' ); ?></h3>
                </div>
                <p style="font-size: 13px; color: var(--color-text-2); line-height: 1.7; margin: 0;">
                    <?php esc_html_e( '亮度一致性扫描 · 逐点色度校正 · 刷新率稳定性验证 · 多视角显示品质评估 · 灰阶准确性及平滑度校准。', 'zhongming' ); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: 全球市场布局 -->
<section class="about-markets" style="padding: 60px 0; background-color: #ffffff;">
    <div class="container">
        <div class="about-section-header" style="margin-bottom: 40px; display: flex; align-items: center; gap: 12px;">
            <span class="section-num-badge" style="width: 28px; height: 28px; border-radius: 50%; background-color: var(--color-text); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700;">5</span>
            <div>
                <h2 style="font-size: 20px; font-weight: 700; color: var(--color-text); margin: 0;"><?php esc_html_e( '全球市场布局', 'zhongming' ); ?></h2>
                <span style="font-size: 12px; color: var(--color-text-3);"><?php esc_html_e( '出口足迹与国际客户分布', 'zhongming' ); ?></span>
            </div>
        </div>

        <div class="about-markets-grid" style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 40px; align-items: start;">
            <!-- Left Side Country Pills -->
            <div class="markets-pills-column" style="display: flex; flex-direction: column; gap: 16px;">
                <p style="font-size: 14px; color: var(--color-text-2); line-height: 1.7; margin: 0;">
                    <?php esc_html_e( '我们的高性能 LED 显示屏已远销北美、欧洲、中东、东南亚和大洋洲的 30 多个国家和地区。', 'zhongming' ); ?>
                </p>

                <div class="markets-pill-container" style="display: flex; flex-wrap: wrap; gap: 8px; margin-top: 8px;">
                    <span class="country-pill" style="font-size: 12px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 6px 12px; transition: all 0.2s ease;">🇺🇸 美国</span>
                    <span class="country-pill" style="font-size: 12px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 6px 12px; transition: all 0.2s ease;">🇲🇽 墨西哥</span>
                    <span class="country-pill" style="font-size: 12px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 6px 12px; transition: all 0.2s ease;">🇷🇺 俄罗斯</span>
                    <span class="country-pill" style="font-size: 12px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 6px 12px; transition: all 0.2s ease;">🇸🇦 沙特</span>
                    <span class="country-pill" style="font-size: 12px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 6px 12px; transition: all 0.2s ease;">🇰🇼 科威特</span>
                    <span class="country-pill" style="font-size: 12px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 6px 12px; transition: all 0.2s ease;">🇮🇷 伊朗</span>
                    <span class="country-pill" style="font-size: 12px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 6px 12px; transition: all 0.2s ease;">🇪🇬 埃及</span>
                    <span class="country-pill" style="font-size: 12px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 6px 12px; transition: all 0.2s ease;">🇫🇷 法国</span>
                    <span class="country-pill" style="font-size: 12px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 6px 12px; transition: all 0.2s ease;">🇦🇺 澳大利亚</span>
                    <span class="country-pill" style="font-size: 12px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 6px 12px; transition: all 0.2s ease;">🇯🇵 日本</span>
                    <span class="country-pill" style="font-size: 12px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 6px 12px; transition: all 0.2s ease;">🇮🇳 印度</span>
                    <span class="country-pill" style="font-size: 12px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 6px 12px; transition: all 0.2s ease;">🇰🇷 韩国</span>
                    <span class="country-pill" style="font-size: 12px; font-weight: 600; color: var(--color-text-2); background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 4px; padding: 6px 12px; transition: all 0.2s ease;">🇹🇼 中国台湾</span>
                    <span class="more-pill" style="font-size: 12px; font-weight: 600; color: var(--color-text-3); background-color: transparent; border: 1px dashed var(--color-border-2); border-radius: 4px; padding: 6px 12px;">+ 17 更多</span>
                </div>
            </div>

            <!-- Right Side Map Graphics -->
            <div class="markets-map-column">
                <div class="map-visual-container" style="width: 100%; height: 280px; border-radius: 6px; border: 1px solid var(--color-border); background-color: var(--color-bg-2); position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">
                    <style>
                        @keyframes map-dash {
                            to {
                                stroke-dashoffset: -20;
                            }
                        }
                        @keyframes map-pulse {
                            0% { r: 2px; opacity: 1; stroke-width: 1px; }
                            50% { opacity: 0.6; }
                            100% { r: 9px; opacity: 0; stroke-width: 0.5px; }
                        }
                        .map-flow-line {
                            stroke: var(--color-accent-blue, #0057b8);
                            stroke-width: 1.2;
                            stroke-linecap: round;
                            stroke-dasharray: 4, 4;
                            fill: none;
                            opacity: 0.75;
                            animation: map-dash 1.2s linear infinite;
                        }
                        .map-pulse-circle {
                            fill: none;
                            stroke: var(--color-accent-blue, #0057b8);
                            transform-origin: center;
                            animation: map-pulse 2s ease-out infinite;
                        }
                        .map-dot {
                            fill: var(--color-accent-blue, #0057b8);
                        }
                        .map-source-dot {
                            fill: #ef4444;
                        }
                        .map-source-pulse {
                            stroke: #ef4444;
                            animation: map-pulse 1.8s ease-out infinite;
                        }
                        .map-continent {
                            fill: var(--color-border);
                            opacity: 0.45;
                            transition: fill 0.3s ease;
                        }
                        .map-label {
                            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                            font-size: 8px;
                            fill: var(--color-text-2);
                            font-weight: 700;
                            opacity: 0.95;
                        }
                    </style>
                    <svg viewBox="0 0 600 280" width="100%" height="100%" style="background-color: transparent;">
                        <!-- Stylized continents shapes -->
                        <polygon points="160,30 200,30 190,50 170,50" class="map-continent" />
                        <polygon points="40,50 160,50 170,100 130,130 90,125 70,80" class="map-continent" />
                        <polygon points="130,135 150,165 140,240 115,250 110,200" class="map-continent" />
                        <polygon points="230,60 310,60 320,110 270,125 240,100" class="map-continent" />
                        <polygon points="260,130 330,130 340,200 300,240 270,210" class="map-continent" />
                        <polygon points="310,60 480,60 500,120 460,180 360,185 320,110" class="map-continent" />
                        <polygon points="480,210 530,210 520,245 475,235" class="map-continent" />

                        <!-- Bezier curved routes connecting Shenzhen (450,145) to global cities -->
                        <path d="M450,145 Q275,80 100,90" class="map-flow-line" /> <!-- USA East -->
                        <path d="M450,145 Q285,100 120,140" class="map-flow-line" /> <!-- Mexico -->
                        <path d="M450,145 Q355,90 260,90" class="map-flow-line" /> <!-- France -->
                        <path d="M450,145 Q395,90 340,80" class="map-flow-line" /> <!-- Russia -->
                        <path d="M450,145 Q375,130 300,150" class="map-flow-line" /> <!-- Egypt -->
                        <path d="M450,145 Q395,140 340,155" class="map-flow-line" /> <!-- Saudi Arabia -->
                        <path d="M450,145 Q430,150 410,160" class="map-flow-line" /> <!-- India -->
                        <path d="M450,145 Q470,125 490,120" class="map-flow-line" /> <!-- Japan -->
                        <path d="M450,145 Q462,130 475,125" class="map-flow-line" /> <!-- South Korea -->
                        <path d="M450,145 Q495,185 520,230" class="map-flow-line" /> <!-- Australia -->

                        <!-- Shenzhen source node -->
                        <circle cx="450" cy="145" r="4" class="map-source-pulse map-pulse-circle" />
                        <circle cx="450" cy="145" r="5" class="map-source-pulse map-pulse-circle" style="animation-delay: 0.6s;" />
                        <circle cx="450" cy="145" r="3.5" class="map-source-dot" />

                        <!-- Destinations dots and labels -->
                        <circle cx="100" cy="90" r="3.5" class="map-pulse-circle" />
                        <circle cx="100" cy="90" r="2.5" class="map-dot" />
                        <text x="100" y="80" text-anchor="middle" class="map-label">美国</text>

                        <circle cx="120" cy="140" r="3.5" class="map-pulse-circle" />
                        <circle cx="120" cy="140" r="2.5" class="map-dot" />
                        <text x="120" y="152" text-anchor="middle" class="map-label">墨西哥</text>

                        <circle cx="260" cy="90" r="3.5" class="map-pulse-circle" />
                        <circle cx="260" cy="90" r="2.5" class="map-dot" />
                        <text x="260" y="80" text-anchor="middle" class="map-label">法国</text>

                        <circle cx="340" cy="80" r="3.5" class="map-pulse-circle" />
                        <circle cx="340" cy="80" r="2.5" class="map-dot" />
                        <text x="340" y="70" text-anchor="middle" class="map-label">俄罗斯</text>

                        <circle cx="300" cy="150" r="3.5" class="map-pulse-circle" />
                        <circle cx="300" cy="150" r="2.5" class="map-dot" />
                        <text x="300" y="162" text-anchor="middle" class="map-label">埃及</text>

                        <circle cx="340" cy="155" r="3.5" class="map-pulse-circle" />
                        <circle cx="340" cy="155" r="2.5" class="map-dot" />
                        <text x="340" y="167" text-anchor="middle" class="map-label">中东</text>

                        <circle cx="410" cy="160" r="3.5" class="map-pulse-circle" />
                        <circle cx="410" cy="160" r="2.5" class="map-dot" />
                        <text x="410" y="172" text-anchor="middle" class="map-label">印度</text>

                        <circle cx="475" cy="125" r="2" class="map-dot" />
                        <text x="475" y="117" text-anchor="middle" class="map-label" style="font-size: 7px;">韩国</text>

                        <circle cx="490" cy="120" r="3.5" class="map-pulse-circle" />
                        <circle cx="490" cy="120" r="2.5" class="map-dot" />
                        <text x="495" y="112" text-anchor="start" class="map-label">日本</text>

                        <circle cx="520" cy="230" r="3.5" class="map-pulse-circle" />
                        <circle cx="520" cy="230" r="2.5" class="map-dot" />
                        <text x="520" y="242" text-anchor="middle" class="map-label">澳大利亚</text>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 6: Concluding CTA Banner -->
<section class="about-cta" style="padding: 60px 0; background-color: var(--color-text); text-align: center;">
    <div class="container">
        <h2 style="font-size: 26px; font-weight: 800; color: #ffffff; margin-bottom: 12px; line-height: 1.3;">准备好与中茗光电合作了吗？</h2>
        <p style="font-size: 15px; color: rgba(255,255,255,0.75); max-width: 600px; margin: 0 auto 28px; line-height: 1.7;">
            将您的显示屏需求（如屏幕尺寸、像素间距、安装环境 等）告知我们，我们的工程技术团队将在 24 小时内为您提供定制方案和效果排版图。
        </p>
        <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo $contact_link; ?>" class="btn btn-primary" style="padding: 12px 28px; font-size: 15px;">获取免费报价 →</a>
            <a href="<?php echo zm_product_archive_link(); ?>" class="btn btn-outline" style="padding: 12px 28px; font-size: 15px; color: #ffffff; border-color: rgba(255,255,255,0.5);">浏览全系列产品</a>
        </div>
    </div>
</section>
 
<script>
function switchAboutImage(thumb) {
    const mainImg = document.querySelector('.factory-image-container img');
    if (!mainImg) return;
    const img = thumb.querySelector('img');
    if (!img) return;
    
    // Fade animation
    mainImg.style.transition = 'opacity 0.15s ease-in-out';
    mainImg.style.opacity = '0';
    
    setTimeout(() => {
        mainImg.src = img.src;
        mainImg.alt = img.alt;
        mainImg.style.opacity = '1';
    }, 150);
    
    // Active border outline
    const thumbs = document.querySelectorAll('.about-thumb');
    thumbs.forEach(t => t.style.borderColor = 'var(--color-border)');
    thumb.style.borderColor = 'var(--color-accent-blue, #0057b8)';
}

// Keep the event listener as an additional binding just in case
document.addEventListener('DOMContentLoaded', function() {
    const thumbs = document.querySelectorAll('.about-thumb');
    if (thumbs.length > 0) {
        thumbs[0].style.borderColor = 'var(--color-accent-blue, #0057b8)';
    }
});
</script>
 
<?php get_footer(); ?>
