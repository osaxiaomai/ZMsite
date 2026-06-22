<?php
/**
 * Template Name: Legal Privacy Policy Template
 *
 * Custom page template for the Privacy Policy page.
 * Includes detailed B2B GDPR & regional compliance content, 
 * styled with a responsive split layout, sticky sidebar, and premium B2B styling.
 */

get_header(); 

$lang = function_exists('pll_current_language') ? pll_current_language() : 'en';
if ( in_array( $lang, array( 'zh', 'zh-cn', 'zh-CN', 'cn' ) ) ) {
    $lang = 'zh';
}
$contact_link = function_exists('zhongming_get_contact_url') ? zhongming_get_contact_url() : site_url('/contact');
?>

<style>
    .legal-container {
        max-width: 1140px;
        margin: 0 auto;
        padding: 0 20px;
    }
    .legal-layout {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 50px;
        align-items: start;
    }
    .legal-sidebar {
        position: sticky;
        top: 100px;
        background-color: var(--color-bg-2, #f9f9f9);
        border: 1px solid var(--color-border, #eee);
        border-radius: 8px;
        padding: 24px 20px;
        transition: all 0.3s ease;
    }
    .legal-sidebar h3 {
        font-size: 15px;
        font-weight: 700;
        color: var(--color-text, #111);
        margin: 0 0 16px 0;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--color-border, #eee);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .legal-nav {
        display: flex;
        flex-direction: column;
        gap: 8px;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .legal-nav a {
        font-size: 13px;
        color: var(--color-text-2, #555);
        text-decoration: none;
        padding: 6px 0 6px 12px;
        transition: all 0.2s ease;
        display: block;
        line-height: 1.4;
        border-left: 2px solid transparent;
    }
    .legal-nav a:hover {
        color: var(--color-accent-blue, #0057b8);
        border-left-color: var(--color-border, #ccc);
    }
    .legal-nav a.active {
        color: var(--color-accent-blue, #0057b8);
        font-weight: 700;
        border-left-color: var(--color-accent-blue, #0057b8);
        background-color: rgba(0, 87, 184, 0.04);
        border-radius: 0 4px 4px 0;
    }
    .legal-text {
        font-size: 14px;
        line-height: 1.8;
        color: var(--color-text-2, #444);
    }
    .legal-text section {
        margin-bottom: 45px;
        padding-bottom: 35px;
        border-bottom: 1px solid var(--color-border, #eee);
    }
    .legal-text section:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    .legal-text h2 {
        font-size: 20px;
        font-weight: 700;
        color: var(--color-text, #111);
        margin: 0 0 20px 0;
        scroll-margin-top: 100px; /* Offset for sticky header */
        position: relative;
    }
    .legal-text h3 {
        font-size: 15px;
        font-weight: 700;
        color: var(--color-text, #222);
        margin: 25px 0 12px 0;
    }
    .legal-text p {
        margin: 0 0 16px 0;
        text-align: justify;
    }
    .legal-text ul {
        margin: 0 0 20px 20px;
        padding: 0;
        list-style-type: square;
    }
    .legal-text li {
        margin-bottom: 10px;
    }
    .legal-text strong {
        color: var(--color-text, #111);
    }
    
    .legal-notice-box {
        background-color: #f4f7fa;
        border-left: 4px solid var(--color-accent-blue, #0057b8);
        padding: 20px;
        border-radius: 4px;
        margin: 25px 0;
    }
    
    .legal-util-btn:hover {
        background-color: #f5f5f5 !important;
        border-color: #bbb !important;
        color: #0057b8 !important;
    }

    /* Breadcrumbs styling */
    .legal-breadcrumbs {
        display: flex;
        gap: 8px;
        list-style: none;
        padding: 0;
        margin: 0 0 15px 0;
        font-size: 12px;
        color: var(--color-text-3, #888);
    }
    .legal-breadcrumbs a {
        color: inherit;
        text-decoration: none;
    }
    .legal-breadcrumbs a:hover {
        color: var(--color-accent-blue, #0057b8);
    }
    
    @media (max-width: 768px) {
        .legal-layout {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        .legal-sidebar {
            position: relative;
            top: 0;
            padding: 16px;
        }
    }

    /* Print styling overrides */
    @media print {
        .site-header, .site-footer, .legal-sidebar, .legal-utilities, .top-bar, .whatsapp-btn, .back-to-top-btn {
            display: none !important;
        }
        body, html {
            background: #fff !important;
            color: #000 !important;
        }
        .legal-layout {
            display: block !important;
        }
        .legal-text {
            width: 100% !important;
        }
        .legal-container {
            max-width: 100% !important;
            padding: 0 !important;
        }
        .legal-text section {
            page-break-inside: avoid;
            border-bottom: none !important;
        }
        .legal-hero {
            padding: 20px 0 !important;
            background: transparent !important;
            border-bottom: 2px solid #000 !important;
        }
    }
</style>

<!-- Hero Section -->
<section class="legal-hero" style="background-color: var(--color-bg-2, #f9f9f9); border-bottom: 1px solid var(--color-border, #eee); padding: 50px 0;">
    <div class="legal-container">
        <ul class="legal-breadcrumbs">
            <li><a href="<?php echo esc_url( home_url('/') ); ?>"><?php echo $lang === 'zh' ? '首页' : 'Home'; ?></a></li>
            <li>/</li>
            <li><?php echo $lang === 'zh' ? '合规与法律' : 'Compliance & Legal'; ?></li>
            <li>/</li>
            <li style="color: var(--color-text, #111);"><?php echo $lang === 'zh' ? '隐私条款' : 'Privacy Policy'; ?></li>
        </ul>
        <span class="hero-eyebrow" style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: var(--color-text-3, #888); display: block; margin-bottom: 8px;">
            <?php echo $lang === 'zh' ? '深圳市中茗光电科技有限公司 · 全球合规' : 'SHENZHEN ZHONGMING TECHNOLOGY CO., LTD. · GLOBAL COMPLIANCE'; ?>
        </span>
        <h1 style="font-size: 32px; font-weight: 800; color: var(--color-text, #111); margin: 0 0 10px 0; line-height: 1.2;">
            <?php echo $lang === 'zh' ? '隐私政策与数据处理规则' : 'Privacy Policy & Data Processing Rules'; ?>
        </h1>
        <p style="font-size: 13px; color: var(--color-text-3, #888); margin: 0;">
            <?php echo $lang === 'zh' ? '最后更新日期：2026年6月15日' : 'Last Updated: June 15, 2026'; ?>
        </p>
    </div>
</section>

<!-- Content Section -->
<section class="legal-content" style="padding: 60px 0; background-color: #ffffff;">
    <div class="legal-container">
        <div class="legal-layout">
            
            <!-- Sidebar Navigation -->
            <aside class="legal-sidebar">
                <h3><?php echo $lang === 'zh' ? '目录索引' : 'TOC Index'; ?></h3>
                <ul class="legal-nav">
                    <?php if ($lang === 'zh') : ?>
                        <li><a href="#section-1" class="active">1. 概述与基本原则</a></li>
                        <li><a href="#section-2">2. 我们收集的信息类型</a></li>
                        <li><a href="#section-3">3. 数据处理的法律依据</a></li>
                        <li><a href="#section-4">4. 我们如何使用您的数据</a></li>
                        <li><a href="#section-5">5. B2B 项目文件与保密性</a></li>
                        <li><a href="#section-6">6. 跨国传输与数据存储</a></li>
                        <li><a href="#section-7">7. 信息共享与第三方披露</a></li>
                        <li><a href="#section-8">8. Cookie 政策及分析工具</a></li>
                        <li><a href="#section-9">9. 数据安全与技术防护</a></li>
                        <li><a href="#section-10">10. 数据保留期限</a></li>
                        <li><a href="#section-11">11. 您的法律权利与选择权</a></li>
                        <li><a href="#section-12">12. 条款变更与联系我们</a></li>
                    <?php else : ?>
                        <li><a href="#section-1" class="active">1. Overview & Core Principles</a></li>
                        <li><a href="#section-2">2. Types of Information We Collect</a></li>
                        <li><a href="#section-3">3. Legal Bases for Data Processing</a></li>
                        <li><a href="#section-4">4. How We Use Your Data</a></li>
                        <li><a href="#section-5">5. B2B Project Files & Confidentiality</a></li>
                        <li><a href="#section-6">6. Cross-Border Transfer & Storage</a></li>
                        <li><a href="#section-7">7. Sharing & Third-Party Disclosures</a></li>
                        <li><a href="#section-8">8. Cookie Policy & Analytics Tools</a></li>
                        <li><a href="#section-9">9. Data Security & Technical Safeguards</a></li>
                        <li><a href="#section-10">10. Data Retention Policy</a></li>
                        <li><a href="#section-11">11. Your Legal Rights & Choices</a></li>
                        <li><a href="#section-12">12. Changes & Contact Details</a></li>
                    <?php endif; ?>
                </ul>
            </aside>
            
            <!-- Legal Detailed Text -->
            <div class="legal-text">
                
                <!-- Utilities Toolbar -->
                <div class="legal-utilities">
                    <div style="font-size: 13px; color: var(--color-text-3, #888);">
                        <?php echo $lang === 'zh' ? '符合中国个人信息保护法(PIPL)及欧盟 GDPR 标准' : 'Compliant with PIPL, GDPR, and global data protection regulations.'; ?>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button onclick="window.print()" class="legal-util-btn" style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; border: 1px solid var(--color-border, #eee); background: #fff; border-radius: 4px; font-size: 12px; cursor: pointer; color: var(--color-text-2, #555); transition: all 0.2s ease;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                            <?php echo $lang === 'zh' ? '打印条款' : 'Print Terms'; ?>
                        </button>
                        <button onclick="window.print()" class="legal-util-btn" style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; border: 1px solid var(--color-border, #eee); background: #fff; border-radius: 4px; font-size: 12px; cursor: pointer; color: var(--color-text-2, #555); transition: all 0.2s ease;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            <?php echo $lang === 'zh' ? '保存为 PDF' : 'Save as PDF'; ?>
                        </button>
                    </div>
                </div>

                <?php if ($lang === 'zh') : ?>
                    <!-- Chinese Version -->
                    <p style="font-size: 15px; font-weight: 500; margin-bottom: 30px; color: var(--color-text, #111);">
                        深圳市中茗光电科技有限公司（以下简称“中茗光电”、“我们”或“本公司”）深知隐私及个人数据对您的重要性。作为全球领先的专业 LED 显示屏解决方案提供商，我们致力于建立安全合规的技术与商务沟通机制。本隐私政策向您详细说明，在您访问本网站、向我们发起 B2B 询盘、申请技术方案或与我们的海外/国内销售代表取得联系时，我们如何处理您的个人及企业数据。
                    </p>

                    <div class="legal-notice-box">
                        <strong>重要提示：</strong> 
                        本网站主要面向 B2B（企业对企业）商业合作客户。如果您代表您的企业在此发起业务询盘、索取 LED 屏图纸及系统拓扑结构，提交个人联系信息将被视为您已获得相关实体的充分授权，并同意本政策的所有条款。
                    </div>

                    <section id="section-1">
                        <h2>1. 概述与基本原则</h2>
                        <p>中茗光电的个人及企业数据处理流程严格遵循《中华人民共和国个人信息保护法》(PIPL)、《中华人民共和国数据安全法》、《中华人民共和国网络安全法》以及欧盟《通用数据保护条例》(GDPR) 等主要国际性法规要求。我们始终秉持以下核心原则：</p>
                        <ul>
                            <li><strong>合法性、正当性与必要性原则：</strong> 仅在满足特定、明确且合法的商务和项目评估目的下收集最少的数据。</li>
                            <li><strong>安全性与保密性：</strong> 在数据传输、存储和使用周期内，采用领先的安全加密机制防范数据遗失或泄露。</li>
                            <li><strong>透明公开与选择权：</strong> 尊重您对数据的修改、删除及退出推广接收的法定权利。</li>
                        </ul>
                    </section>

                    <section id="section-2">
                        <h2>2. 我们收集的信息类型</h2>
                        <p>我们收集和处理的个人及商务信息主要分为以下几类：</p>
                        <h3>(1) 您主动提供的信息：</h3>
                        <ul>
                            <li><strong>询盘与报价表单数据：</strong> 当您在线填写询盘、获取特定 LED 显示屏系列的报价单或申请产品目录时，您提供的<strong>姓名、公司名称、企业邮箱、电话号码/WhatsApp/WeChat、所在国家/地区以及您的具体产品兴趣</strong>。</li>
                            <li><strong>项目技术参数与文件：</strong> 为帮您做屏幕深化设计而提交的<strong>屏幕规格（如像素间距、长宽尺寸、室内或室外环境）、图纸附件（如 CAD 建筑图、钢结构深化图、现场实体照片）</strong>。</li>
                            <li><strong>商务洽谈与合同文件：</strong> 签署合同阶段您所提供的代表性联系人姓名、收款/送货地址、公司税务登记号、银行账户及电汇凭证。</li>
                        </ul>
                        <h3>(2) 网站系统自动收集的信息：</h3>
                        <ul>
                            <li><strong>网络日志数据：</strong> 当您访问本网站时，我们的服务器会自动记录您的<strong> IP 地址、浏览器类型、操作系统、所访问的具体产品页面、停留时长以及跳转来源</strong>。</li>
                            <li><strong>偏好追踪数据：</strong> 通过 Cookies 记录您的语言显示设置（以确保多语言插件能够正确呈现中文或英文界面）。</li>
                        </ul>
                    </section>

                    <section id="section-3">
                        <h2>3. 数据处理的法律依据</h2>
                        <p>根据相关法律，我们仅在拥有至少一项下列法律依据时才处理您的个人数据：</p>
                        <ul>
                            <li><strong>履行合同的必要性 (Article 6(1)(b) GDPR)：</strong> 处理您的联系方式和项目规格，以便为您制作技术渲染方案、核算 BOM 成本并出具正式的 B2B 《形式发票》或《销售合同》。</li>
                            <li><strong>履行法律义务 (Article 6(1)(c) GDPR)：</strong> 为满足海关报关、出境退税审计、外汇结算以及国家安全审查的相关合规要求。</li>
                            <li><strong>合法利益 (Article 6(1)(f) GDPR)：</strong> 维护本网站服务器的安全稳定、监测恶意软件攻击，以及提升本公司 LED 产品信息对您的适配性。</li>
                            <li><strong>基于您的明示同意 (Article 6(1)(a) GDPR)：</strong> 例如您主动订阅我们的 LED 技术发展动态、促销邮件或接受我们的 WhatsApp 售后支持通道。</li>
                        </ul>
                    </section>

                    <section id="section-4">
                        <h2>4. 我们如何使用您的数据</h2>
                        <p>我们仅将所收集的数据用于以下合规、合理的商业用途：</p>
                        <ul>
                            <li><strong>技术评估与深化设计：</strong> 我们的研发和工程团队使用您的建筑 CAD 图纸，以进行钢结构负载、风阻系数（针对户外广告屏）、显示屏拼装拼接缝隙计算、箱体接线图和配电箱功率设计。</li>
                            <li><strong>商务报价与供应链匹配：</strong> 评估您的项目要求以核算合理的出厂价格，确认 LED 灯珠芯片品牌、驱动芯片批次，并出具详细的商务报价。</li>
                            <li><strong>物流履约与清关：</strong> 提供您的出货信息给物流代理商，安排集装箱订舱、陆运送货、深圳口岸报关及国际货运。</li>
                            <li><strong>工程技术支持：</strong> 为您的技术人员提供 NovaStar/Colorlight 等控制系统的配置文件下载、发送点对点配置参数，提供远程屏幕调试协助。</li>
                        </ul>
                    </section>

                    <section id="section-5">
                        <h2>5. B2B 项目文件与保密性</h2>
                        <p>中茗光电承诺对您在项目洽谈中提供的任何<strong>图纸、产品结构、现场排版以及商业合同价格</strong>承担严格保密义务：</p>
                        <ul>
                            <li>我们已建立内部信息隔离机制，所有工程图纸和技术图表仅限参与该项目评估的工程师及对接销售访问。</li>
                            <li>除非在执行项目调试中需要与认可的当地钢结构施工承包商或技术代理方对接，否则在未获得您明示的书面授权下，我们决不向任何第三方公开、租用或出售您的项目资料与图纸。</li>
                        </ul>
                    </section>

                    <section id="section-6">
                        <h2>6. 跨国传输与数据存储</h2>
                        <p>作为一家将产品销往 30 多个国家及地区的跨国制造厂商，中茗光电的主要生产设施和管理服务器位于中国广东省深圳市。这意味着：</p>
                        <ul>
                            <li>当您从中国境外（如欧洲、美洲或中东地区）发起询盘时，您的个人和商业数据将被传输至中茗光电位于中国的服务器中进行项目评估和报价。</li>
                            <li>我们在跨国传输过程中严格使用标准加密技术（TLS 1.3/HTTPS）进行信息通道保护，防止中途遭遇网络嗅探。</li>
                            <li>对于欧盟境内客户，我们承诺按照欧盟标准合同条款（SCCs）执行，以确保您的个人数据在境外处理时享有同等的保护水平。</li>
                        </ul>
                    </section>

                    <section id="section-7">
                        <h2>7. 信息共享与第三方披露</h2>
                        <p>我们绝不将您的个人隐私信息商业化出售给任何广告商或数据代理商。仅在以下必要情况下，我们才会与授权的第三方机构共享有限的必要数据：</p>
                        <ul>
                            <li><strong>供应链与物流履约商：</strong> 国际货代、快递公司（如 DHL、FedEx、UPS）及海关报关行，以将 LED 箱体、控制卡和备品备件按时安全送达您的现场。</li>
                            <li><strong>关联的销售服务商与代表处：</strong> 如果我们在您的所在国家/地区设有指定的授权技术服务代表或售后联络处，且此分配能极大改善您在现场的屏幕调试体验，我们可能会将项目信息与联系方式同步给他们。</li>
                            <li><strong>法律要求与行政司法：</strong> 依照国家税收审计、反洗钱调查或法院开具的强制令，必须合法配合披露相关信息。</li>
                        </ul>
                    </section>

                    <section id="section-8">
                        <h2>8. Cookie 政策及分析工具</h2>
                        <p>本网站使用 Cookies 来维护核心功能和收集分析数据：</p>
                        <ul>
                            <li><strong>必要性 Cookies：</strong> 用于保存您的 Polylang 语言切换选择，防止您在切换产品目录分类时页面自动重置语言。</li>
                            <li><strong>分析与优化 Cookies：</strong> 整合了 Google Analytics（谷歌分析）用于统计网站的访问趋势、页面加载延迟，评估不同像素间距（如 P1.5、P3 等）产品的市场关注度。此类数据均在去标识化（匿名化）状态下处理。</li>
                            <li><strong>如何禁用：</strong> 您可以通过您浏览器的安全设置，选择完全屏蔽或清理本网站的 Cookies。这可能导致本网站的某些高级筛选或语言记忆功能无法正常运行。</li>
                        </ul>
                    </section>

                    <section id="section-9">
                        <h2>9. 数据安全与技术防护</h2>
                        <p>为防止个人数据和商业秘密遭到未经授权的访问、盗用或泄露，中茗光电落实了以下安全措施：</p>
                        <ul>
                            <li><strong>技术防护：</strong> 我们的服务器架设在配置了强固式网络防火墙和入侵检测机制的安全云中心；全站部署高等级的 SSL（HTTPS）加密传输。</li>
                            <li><strong>权限限制：</strong> 对内部员工访问客户关系管理（CRM）数据库实施“最小特权原则”，每个业务员及项目助理仅能查阅自己负责的订单范围。</li>
                            <li><strong>应急响应：</strong> 制定了详尽的数据泄露应急响应机制。一旦发生数据安全事件，我们将在 72 小时内依法通知受影响的客户以及相应的数据监管机构，并采取紧急断网和修补方案。</li>
                        </ul>
                    </section>

                    <section id="section-10">
                        <h2>10. 数据保留期限</h2>
                        <p>我们保留您的信息期限严格对应于 B2B 贸易生命周期的合理需要：</p>
                        <ul>
                            <li><strong>询盘意向及报价记录：</strong> 如果未形成商务订单，您的询盘联系信息及项目需求通常在数据库中保留 3 年，以便您在漫长的项目规划期内随时重新激活报价评估。</li>
                            <li><strong>正式合同与工程图纸：</strong> 因 LED 显示屏属于长期工业设备，通常带有 2-5 年的质保期。为了保证我们在质保期内以及后续终身维护中，能够准确查询您所采购屏幕的 LED 灯珠型号、IC 批次、发送/接收卡配置文件，相应的技术图纸、配置记录和合同数据将至少保留 10 年。</li>
                        </ul>
                    </section>

                    <section id="section-11">
                        <h2>11. 您的法律权利与选择权</h2>
                        <p>无论您位于中国、欧盟还是全球其他国家和地区，中茗光电均全面保障您对自身个人数据的控制权。您依法享有：</p>
                        <ul>
                            <li><strong>知情权与访问权：</strong> 您有权向我们索取所保存的您的联系信息副本，了解我们的处理过程。</li>
                            <li><strong>更正权与删除权：</strong> 当您的联系方式、邮箱或 WhatsApp 号码发生变更，或您希望我们销毁您的所有询盘记录时，我们将在核实您的身份后，在 5 个工作日内予以处理。</li>
                            <li><strong>限制处理与拒收权：</strong> 您有权随时撤回您的同意。如果不想再收到我们的产品目录更新，可随时联系我们的销售人员退订。</li>
                        </ul>
                    </section>

                    <section id="section-12">
                        <h2>12. 条款变更与联系我们</h2>
                        <p>中茗光电保留根据生产和法律标准变化随时更新此隐私政策的权利。本隐私政策若有重大更新，我们将在页面显著位置发布公告，并更新页面最上方的“最后更新日期”。如果您对本数据规则有任何疑问，或需要行使您的数据修改和删除权利，欢迎随时通过以下官方途径与我们联系：</p>
                        
                        <p style="margin-top: 15px; padding: 20px; background-color: var(--color-bg-2, #f9f9f9); border: 1px solid var(--color-border, #eee); border-radius: 6px; font-size: 13px; line-height: 1.8;">
                            <strong>数据保护代表与控制者：</strong> 深圳市中茗光电科技有限公司<br/>
                            <strong>负责人：</strong> 钟先生 / Mr. Zhong<br/>
                            <strong>电子邮箱：</strong> <a href="mailto:571217058@qq.com" style="color: var(--color-accent-blue, #0057b8); text-decoration: none; font-weight: bold;">571217058@qq.com</a><br/>
                            <strong>联系电话/WhatsApp：</strong> +86 18318038616<br/>
                            <strong>工厂地址：</strong> 中国深圳市宝安区石岩街道北环路137号华丰圳宝工业园
                        </p>
                    </section>

                <?php else : ?>
                    <!-- English Version -->
                    <p style="font-size: 15px; font-weight: 500; margin-bottom: 30px; color: var(--color-text, #111);">
                        Shenzhen Zhongming Technology Co., Ltd. ("Zhongming LED", "we", "us", or "our") respects your privacy and is committed to protecting your personal and corporate data. As a global leading manufacturer of professional LED display solutions, we establish secure, transparent communication frameworks. This Privacy Policy outlines how we collect, use, process, and protect your information when you visit our website, submit B2B inquiries, request engineering files, or communicate with our overseas sales executives.
                    </p>

                    <div class="legal-notice-box">
                        <strong>Important B2B Notice:</strong> 
                        Our site is primarily designed for business-to-business (B2B) trade. When you submit inquiries, contact details, or upload drawings, you represent that you have the necessary authorization from your company to provide this information and agree to all terms described herein.
                    </div>

                    <section id="section-1">
                        <h2>1. Overview & Core Principles</h2>
                        <p>Our data handling policies are structured in accordance with China's Personal Information Protection Law (PIPL), the EU General Data Protection Regulation (GDPR), and other global privacy laws. We adhere to the following principles:</p>
                        <ul>
                            <li><strong>Lawfulness, Fairness, & Necessity:</strong> We collect only the minimum data required to evaluate, design, and quote your display projects.</li>
                            <li><strong>Security & Secrecy:</strong> We employ end-to-end encryption and restrict access permissions to guard against data leaks.</li>
                            <li><strong>User Control:</strong> We respect your statutory rights to view, amend, limit, or delete your files at any stage.</li>
                        </ul>
                    </section>

                    <section id="section-2">
                        <h2>2. Types of Information We Collect</h2>
                        <p>We process the following categories of personal and business metadata:</p>
                        <h3>(1) Information You Provide Voluntarily:</h3>
                        <ul>
                            <li><strong>Inquiry & Contact Details:</strong> When you request a B2B quote, download PDF specifications, or send message logs, we collect your <strong>name, work email address, company name, phone/WhatsApp number, country, and product categories of interest</strong>.</li>
                            <li><strong>Engineering Drawings & Project Files:</strong> Any uploaded <strong>CAD layout blueprints, steel frame profiles, structural loading constraints, installation height drawings, and site environment photos</strong> required for screen calculation.</li>
                            <li><strong>Transaction and Accounting Data:</strong> Representative contact details, billing/delivery addresses, corporate Tax IDs, banking info, and wire transfer slips (T/T records).</li>
                        </ul>
                        <h3>(2) Information Gathered Automatically:</h3>
                        <ul>
                            <li><strong>Server & Network Logs:</strong> Standard technical information such as your <strong>IP address, geographical area, browser type, OS type, pages viewed, time spent, and referral paths</strong>.</li>
                            <li><strong>Site Preference Metrics:</strong> Cookies set by Polylang to maintain your language layout preference (retaining Chinese or English views).</li>
                        </ul>
                    </section>

                    <section id="section-3">
                        <h2>3. Legal Bases for Data Processing</h2>
                        <p>We rely on the following legal bases to process your information:</p>
                        <ul>
                            <li><strong>Performance of a Contract (Art. 6(1)(b) GDPR):</strong> Necessary to review technical specs, perform panel splicing calculations, check screen power demands, and formulate a binding B2B quotation.</li>
                            <li><strong>Compliance with Legal Obligations (Art. 6(1)(c) GDPR):</strong> For mandatory export invoicing, customs clearances, tax audits, and cross-border payment verifications.</li>
                            <li><strong>Legitimate Interests (Art. 6(1)(f) GDPR):</strong> To monitor web server security, defend against cyber threats, improve website loading speed, and optimize product listings.</li>
                            <li><strong>Consent (Art. 6(1)(a) GDPR):</strong> When you explicitly subscribe to receive catalog modifications, sales catalogs, or engage with our technical support via WhatsApp.</li>
                        </ul>
                    </section>

                    <section id="section-4">
                        <h2>4. How We Use Your Data</h2>
                        <p>Your B2B files are used only for authorized, practical engineering and business processes:</p>
                        <ul>
                            <li><strong>Engineering Evaluation & Splicing Design:</strong> Our structural engineers review your building drawings to verify cabinet weights, support bracket placement, wind resistance capabilities, and optimal cabinet layout plans.</li>
                            <li><strong>Commercial Quotation:</strong> Reviewing pixel pitches (e.g. SMD P2.5 vs COB P0.9) to estimate production BOM costs, component requirements, and prepare formal commercial contracts.</li>
                            <li><strong>Logistics Coordination:</strong> Sharing recipient shipping details, phone numbers, and company names with logistics freight forwarders for vessel booking and customs clearance.</li>
                            <li><strong>Technical Support:</strong> Generating NovaStar/Colorlight configuration files (.rcfgx/.cfg), configuring remote debugging logs, and managing screen calibration profiles.</li>
                        </ul>
                    </section>

                    <section id="section-5">
                        <h2>5. B2B Project Files & Confidentiality</h2>
                        <p>Zhongming LED treats all client **CAD drawings, site structural profiles, layout files, and pricing quotes** with maximum confidentiality:</p>
                        <ul>
                            <li>We enforce strict access segmentation. Technical plans and drawings are only viewable by engineers and sales reps assigned directly to your project.</li>
                            <li>We will not publish, lease, or distribute your site blueprints to third parties without your written approval.</li>
                        </ul>
                    </section>

                    <section id="section-6">
                        <h2>6. Cross-Border Transfer & Storage</h2>
                        <p>Since Zhongming LED is based in Shenzhen, China and exports globally, your information will be transferred and processed on Chinese servers:</p>
                        <ul>
                            <li>Your data is handled directly by our head office in Shenzhen for cost calculations, production planning, and contract drafting.</li>
                            <li>All transit channels use TLS 1.3/HTTPS secure sockets to prevent interception.</li>
                            <li>For EU and UK clients, we adhere to the European Commission's Standard Contractual Clauses (SCCs) to maintain equivalent data rights.</li>
                        </ul>
                    </section>

                    <section id="section-7">
                        <h2>7. Sharing & Third-Party Disclosures</h2>
                        <p>We do not sell data to advertising brokers. We share limited files only with authorized service partners:</p>
                        <ul>
                            <li><strong>Logistics Providers:</strong> Freight forwarders and express couriers (DHL, FedEx, UPS) to transport heavy LED plywood boxes and electronic modules.</li>
                            <li><strong>Local Agents or Technical Outposts:</strong> If we have localized installers or certified service agencies in your territory, we may share contact details to speed up on-site screen calibrations or configuration support.</li>
                            <li><strong>Governmental Authorities:</strong> When required for compliance, audits, export taxation, or court subpoenas.</li>
                        </ul>
                    </section>

                    <section id="section-8">
                        <h2>8. Cookie Policy & Analytics Tools</h2>
                        <p>Our website utilizes cookies to ensure basic performance:</p>
                        <ul>
                            <li><strong>Essential Session Cookies:</strong> To retain language selection (keeping your page in English instead of resetting to Chinese during page transitions).</li>
                            <li><strong>Traffic Cookies:</strong> Integration of Google Analytics to monitor web performance, page response times, and general product interest, processed in a fully anonymized format.</li>
                            <li><strong>User Control:</strong> You can block cookies in browser settings, but it may cause Polylang's language switching features to malfunction.</li>
                        </ul>
                    </section>

                    <section id="section-9">
                        <h2>9. Data Security & Technical Safeguards</h2>
                        <p>We employ modern technology to protect your corporate secrets:</p>
                        <ul>
                            <li><strong>Infrastructure Security:</strong> Enterprise cloud servers equipped with firewalls, intrusion prevention mechanisms, and SSL data transmission.</li>
                            <li><strong>Strict Permissions:</strong> Staff access to client CRM databases is restricted to account-handling personnel.</li>
                            <li><strong>Breach Response:</strong> In the event of a breach, we are legally committed to notifying affected contacts and regulatory bodies within 72 hours, implementing containment protocols immediately.</li>
                        </ul>
                    </section>

                    <section id="section-10">
                        <h2>10. Data Retention Policy</h2>
                        <p>We retain files in alignment with the long-term B2B equipment lifecycle:</p>
                        <ul>
                            <li><strong>Inquiries and Proposals:</strong> If no sales contract is formed, contact details are kept for 3 years so you can reactivate pending quotes easily.</li>
                            <li><strong>Production Contracts & CAD Files:</strong> Since commercial LED display systems typically operate for 5 to 10 years, we store technical specs, batch numbers, and controller configs for at least 10 years to supply matching spare modules and calibration updates.</li>
                        </ul>
                    </section>

                    <section id="section-11">
                        <h2>11. Your Legal Rights & Choices</h2>
                        <p>Regardless of your geographic location, we protect your personal data rights. You are entitled to:</p>
                        <ul>
                            <li><strong>Access & Copying:</strong> Request a copy of the contacts and info we retain.</li>
                            <li><strong>Correction & Deletion:</strong> Ask us to amend contact info or completely delete your inquiry file. We process requests within 5 business days of verification.</li>
                            <li><strong>Opt-Out:</strong> Stop receiving newsletter catalog specifications by emailing us at any time.</li>
                        </ul>
                    </section>

                    <section id="section-12">
                        <h2>12. Changes & Contact Details</h2>
                        <p>We reserve the right to revise this Privacy Policy to reflect changing B2B practices. Updated policies will show a modified "Last Updated" date at the top. To exercise your rights or contact our Data Protection Officer, reach out to us at:</p>
                        
                        <p style="margin-top: 15px; padding: 20px; background-color: var(--color-bg-2, #f9f9f9); border: 1px solid var(--color-border, #eee); border-radius: 6px; font-size: 13px; line-height: 1.8;">
                            <strong>Data Controller & representative:</strong> Shenzhen Zhongming Technology Co., Ltd.<br/>
                            <strong>Contact Executive:</strong> Mr. Zhong<br/>
                            <strong>Email Address:</strong> <a href="mailto:571217058@qq.com" style="color: var(--color-accent-blue, #0057b8); text-decoration: none; font-weight: bold;">571217058@qq.com</a><br/>
                            <strong>WhatsApp / WeChat:</strong> +86 18318038616<br/>
                            <strong>Factory address:</strong> Huafeng Zhenbao Industrial Park, No. 137 Beihuan Road, Shiyan Street, Bao'an District, Shenzhen, China
                        </p>
                    </section>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</section>

<script>
/**
 * Vanilla JS Scroll-Spy and Nav Highlight
 */
document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.legal-text section');
    const navLinks = document.querySelectorAll('.legal-nav a');

    if (sections.length === 0 || navLinks.length === 0) return;

    function highlightLink() {
        let index = 0;
        const scrollPos = window.scrollY || window.pageYOffset || document.documentElement.scrollTop;

        // Determine which section is currently active
        for (let i = 0; i < sections.length; i++) {
            // Check offset with some headroom (e.g., 140px for sticky navs and titles)
            if (scrollPos + 140 >= sections[i].offsetTop) {
                index = i;
            }
        }
        
        // Remove active class from all links and add to current
        navLinks.forEach((link) => link.classList.remove('active'));
        if (navLinks[index]) {
            navLinks[index].classList.add('active');
        }
    }

    highlightLink();
    window.addEventListener('scroll', highlightLink);
    
    // Smooth scroll offset adjustment for hash anchors
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const hash = this.getAttribute('href');
            if (hash.startsWith('#')) {
                e.preventDefault();
                const targetEl = document.querySelector(hash);
                if (targetEl) {
                    const headerOffset = 110;
                    const elementPosition = targetEl.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: "smooth"
                    });
                    
                    // Update URL hash without jumping
                    history.pushState(null, null, hash);
                }
            }
        });
    });
});
</script>

<?php get_footer(); ?>
