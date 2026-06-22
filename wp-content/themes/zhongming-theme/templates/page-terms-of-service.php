<?php
/**
 * Template Name: Legal Terms of Service Template
 *
 * Custom page template for the Terms of Service page.
 * Includes detailed B2B commercial terms, warranty policy disclaimers,
 * styled with a responsive split layout, sticky sidebar, and premium B2B styling.
 */

get_header(); 

$lang = function_exists('pll_current_language') ? pll_current_language() : 'en';
if ( in_array( $lang, array( 'zh', 'zh-cn', 'zh-CN', 'cn' ) ) ) {
    $lang = 'zh';
}
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
        scroll-margin-top: 100px;
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
            <li style="color: var(--color-text, #111);"><?php echo $lang === 'zh' ? '服务条款' : 'Terms of Service'; ?></li>
        </ul>
        <span class="hero-eyebrow" style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: var(--color-text-3, #888); display: block; margin-bottom: 8px;">
            <?php echo $lang === 'zh' ? '深圳市中茗光电科技有限公司 · 商业合规' : 'SHENZHEN ZHONGMING TECHNOLOGY CO., LTD. · COMMERCIAL COMPLIANCE'; ?>
        </span>
        <h1 style="font-size: 32px; font-weight: 800; color: var(--color-text, #111); margin: 0 0 10px 0; line-height: 1.2;">
            <?php echo $lang === 'zh' ? 'B2B 商务与服务条款' : 'B2B Commercial & Service Terms'; ?>
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
                        <li><a href="#section-1" class="active">1. 商务接受与定义</a></li>
                        <li><a href="#section-2">2. 知识产权与技术版权</a></li>
                        <li><a href="#section-3">3. LED 产品参数与技术变更</a></li>
                        <li><a href="#section-4">4. B2B 商业合同与付款规则</a></li>
                        <li><a href="#section-5">5. 国际物流、发货与风险转移</a></li>
                        <li><a href="#section-6">6. 标准质保政策与售后范围</a></li>
                        <li><a href="#section-7">7. RMA（退料修整）具体规范</a></li>
                        <li><a href="#section-8">8. 用户使用守则与限制行为</a></li>
                        <li><a href="#section-9">9. 免责声明与有限责任条款</a></li>
                        <li><a href="#section-10">10. 适用法律与争议诉讼管辖</a></li>
                    <?php else : ?>
                        <li><a href="#section-1" class="active">1. Acceptance & Definitions</a></li>
                        <li><a href="#section-2">2. Intellectual Property & Copyright</a></li>
                        <li><a href="#section-3">3. LED Specifications & R&D Changes</a></li>
                        <li><a href="#section-4">4. B2B Contracts & Payment Terms</a></li>
                        <li><a href="#section-5">5. Logistics, Shipping & Transfer of Risk</a></li>
                        <li><a href="#section-6">6. Warranty Policies & Support Scope</a></li>
                        <li><a href="#section-7">7. RMA & Spare Parts Procedures</a></li>
                        <li><a href="#section-8">8. Website Terms of Use & Restraints</a></li>
                        <li><a href="#section-9">9. Limitation of Liability</a></li>
                        <li><a href="#section-10">10. Governing Law & Jurisdiction</a></li>
                    <?php endif; ?>
                </ul>
            </aside>
            
            <!-- Legal Detailed Text -->
            <div class="legal-text">
                
                <!-- Utilities Toolbar -->
                <div class="legal-utilities">
                    <div style="font-size: 13px; color: var(--color-text-3, #888);">
                        <?php echo $lang === 'zh' ? '本条款适用于所有在线询盘与 B2B 国际商务合同' : 'These terms apply to all online queries and global B2B contracts.'; ?>
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
                        欢迎访问深圳市中茗光电科技有限公司（“中茗光电”或“本公司”）官方网站。通过访问、浏览或使用本网站，即代表您（或您所代表的企业实体）已阅读、理解并同意受本《服务条款》（以下简称“本条款”）的约束，并遵守所有适用的海关、进出口管制和商业法律。如果您不同意本条款中的任何内容，请立即停止使用本网站。
                    </p>

                    <div class="legal-notice-box">
                        <strong>国际商务提示：</strong>
                        本公司生产的 LED 显示屏主要销售给海外工程商、系统集成商、租赁商及终端广告大户。除本网站条款外，具体的采购数量、产品定制图纸、出厂检验及售后质保期均以双方盖章签署的纸质/PDF版<strong>《销售合同》或《形式发票》(Proforma Invoice)</strong> 的具体内容为准。
                    </div>

                    <section id="section-1">
                        <h2>1. 商务接受与定义</h2>
                        <p>本条款适用于所有通过本网站获取资料、发送询盘或寻求产品技术配置的全球用户。条款中“LED 显示屏”涵盖本公司生产的室内屏、户外屏、透明屏、贴膜屏、光电玻璃屏、柔性软屏等所有整屏及模组配件。“B2B 交易”指由您所代表的企业采购用于工程安装、再租赁或系统集成的商业采购行为。</p>
                    </section>

                    <section id="section-2">
                        <h2>2. 知识产权与技术版权声明</h2>
                        <p>本网站的所有要素均包含本公司重要的商业与技术资产。我们受《中华人民共和国商标法》、《中华人民共和国著作权法》以及国际知识产权协定保护：</p>
                        <ul>
                            <li><strong>受版权保护的资料：</strong> 包括但不限于所有的产品技术表格、模组高清图片、箱体组装图纸、钢结构建议 CAD 渲染图、PDF 版产品目录、操作教学视频和动态网页布局，均属中茗光电所有。</li>
                            <li><strong>限制使用：</strong> 未经中茗光电的事先书面授权，严禁任何竞争对手或个人为了商业目的抓取网页、盗用产品图纸或将我们的技术文档去除水印重新发布。</li>
                        </ul>
                    </section>

                    <section id="section-3">
                        <h2>3. LED 产品参数与技术变更</h2>
                        <p>LED 显示屏属于科技研发类硬件，我们持续提升显示性能。因此：</p>
                        <ul>
                            <li><strong>参数参考值：</strong> 网站上列出的技术规格（如像素间距、模组尺寸、箱体重量、色温范围、最大/平均功耗、视角等）属于实验室条件下的典型测量数据。中茗光电有权为了改善性能，在不事先通知的情况下，微调箱体结构、升级 PCB 走线或停产特定批次型号。</li>
                            <li><strong>LED 光学批次偏差：</strong> 鉴于 LED 发光晶圆的物理特性，不同生产批次之间的灯珠在波长和亮度上存在微小的合理公差。<strong>如您是针对老屏幕进行局部扩建或更换备件，请务必在询盘时注明先前订单批次</strong>，以便我们进行针对性的配光和色差兼容测试。</li>
                        </ul>
                    </section>

                    <section id="section-4">
                        <h2>4. B2B 商业合同与付款规则</h2>
                        <p>通过本网站询盘框提交的信息，代表您的询盘意向，不构成法律上的销售要约：</p>
                        <ul>
                            <li><strong>报价有效期限：</strong> 我们的业务代表向您出具的正式报价单有效期默认在发出之日起的 30 天内。由于 PCB 覆铜板、半导体驱动 IC 芯片等原材料价格波动剧烈，逾期报价需重新审核。</li>
                            <li><strong>支付条件标准：</strong> 除非销售合同另有特殊约定，标准国际商务订单结算为：<strong>30% T/T（电汇）定金下发启动生产，70% T/T 尾款在工厂完成 72 小时通电老化测试检验合格、并在装船/发货前一次性付清</strong>。</li>
                        </ul>
                    </section>

                    <section id="section-5">
                        <h2>5. 国际物流、发货与风险转移</h2>
                        <p>由于大屏设备体积大、重量高，我们在国际交付中严格执行国际商会 (ICC) 规定的 Incoterms 规则：</p>
                        <ul>
                            <li><strong>交付条款默认：</strong> 默认按照 <strong>FOB 深圳</strong>（深圳港船上交货）或 <strong>EXW 深圳工厂</strong>（工厂交货）条款执行。</li>
                            <li><strong>风险划分时点：</strong> 货物灭失或损坏的风险自我们将 LED 木箱或航空箱交付至您指定的货运代理人（Freight Forwarder）或装上集装箱承运工具时，即行转移给买方。</li>
                            <li><strong>包装规范：</strong> 我们出厂的模组采用防静电袋密封包装；箱体默认使用坚固的多层胶合板木箱（Plywood Case）加防震珍珠棉包装，确保长途海运不受潮不撞坏。租赁屏可定制配带刹车轮的航空箱（Flight Case）。</li>
                        </ul>
                    </section>

                    <section id="section-6">
                        <h2>6. 标准质保政策与售后范围</h2>
                        <p>中茗光电作为质量责任人，为销售的 LED 显示屏硬件产品提供以下标准质保：</p>
                        <ul>
                            <li><strong>标准质保期：</strong> 自出厂之日起提供 <strong>2年（24个月）</strong> 的免费工厂硬件质保（特殊合同签署 3-5 年的，按合同执行）。</li>
                            <li><strong>质保涵盖范围：</strong> 正常安装和规定电力环境（如无波涌电流、电网稳定）下，由于原厂材料或生产工艺缺陷造成的 LED 灯珠死灯、LED 驱动 IC 烧毁、电源损坏、接收卡故障等。</li>
                            <li><strong>死灯率与物理容差公差：</strong> 出厂整屏失控点率低于 0.01%（十万分之一），符合并优于中国及国际行业标准。在质保期内，屏幕死灯若超出上述标准，我们负责提供免费硬件更换件。</li>
                            <li><strong>免责条款（不属于质保范围）：</strong>
                                <br/>a) 因买方自行搭建的钢结构支撑不够导致变形变形，或户外屏因未做避雷针导致雷击、强电流突波烧坏；
                                <br/>b) 未能按照产品说明书进行必要的散热排风设计，导致显示屏在超温状态下运行；
                                <br/>c) 买方在屏幕带电状态下插拔排线、转接板引起短路，或使用非原厂的开关电源导致电压超载。
                            </li>
                        </ul>
                    </section>

                    <section id="section-7">
                        <h2>7. RMA（退料修整）具体规范</h2>
                        <p>若屏幕在运行期间发生硬件故障，将根据本公司规定的 RMA 流程执行：</p>
                        <ul>
                            <li><strong>备品预拨机制：</strong> 每批出厂的 LED 大屏，我们都会免费随货配送 2%-5% 的零配件（包括备用模组、驱动 IC、排线、开关电源等），供客户现场快速拔插更换。</li>
                            <li><strong>故障品返修：</strong> 如果随货备品耗尽，客户需把损坏的模组、接收卡或电源集攒打包发回深圳工厂修整。<strong>保修期内运费划分原则为：买方承担将故障件运回中国的运费；中茗光电承担将修复件发回给客户的运费。</strong></li>
                            <li><strong>现场差旅限制：</strong> 我们的标准出厂价中不包含销售后的海外现场派遣服务。如确需派遣我们的工程师去海外协助拼接校准，差旅、签证、住宿等费用需由客户另行支付。</li>
                        </ul>
                    </section>

                    <section id="section-8">
                        <h2>8. 用户使用守则与限制行为</h2>
                        <p>访问本网站时，您承诺不进行以下损害网站运行及本公司商业利益的行为：</p>
                        <ul>
                            <li>严禁通过任何自动抓取技术（蜘蛛、机器人、爬虫）大批量提取我们的产品数据库、ACF 字段和报价逻辑。</li>
                            <li>严禁将本网站的产品参数在保留排版的情况下伪造为其他品牌的研发成果。</li>
                        </ul>
                    </section>

                    <section id="section-9">
                        <h2>9. 免责声明与有限责任条款</h2>
                        <p>在适用法律允许的最大范围内，中茗光电对以下情形不承担间接损失赔偿责任：</p>
                        <ul>
                            <li><strong>大屏运行宕机损失：</strong> 因屏体电源跳闸、软件系统故障或接收卡断线导致的广告业务中断损失、活动赛事延误罚款及任何间接商业收益损失。</li>
                            <li><strong>网站技术滞后免责：</strong> 尽管我们努力保持网站信息的准确性，但不对网站在极端网络情况下的实时性、零错漏做明示的合同保证。</li>
                        </ul>
                    </section>

                    <section id="section-10">
                        <h2>10. 适用法律与争议诉讼管辖</h2>
                        <p>本《服务条款》的解释、履行及纠纷解决均适用中华人民共和国法律。</p>
                        <p>任何因本条款的履行或采购订单产生的商业纠纷，双方应首先本着友好合作态度协商解决。如果协商无法在 30 天内达成一致，任何一方均可向<strong>本公司住所地有管辖权的人民法院（即中国广东省深圳市宝安区人民法院）</strong>提起诉讼。</p>
                    </section>

                <?php else : ?>
                    <!-- English Version -->
                    <p style="font-size: 15px; font-weight: 500; margin-bottom: 30px; color: var(--color-text, #111);">
                        Welcome to the official website of Shenzhen Zhongming Technology Co., Ltd. ("Zhongming LED", "we", "us", or "our"). By accessing, browsing, or using this website, you ("you", "user", or "buyer") acknowledge that you have read, understood, and agree to be bound by these Terms of Service (these "Terms") and to comply with all applicable export controls, import clearances, and commercial trade laws. If you do not agree to these terms, please stop using this website immediately.
                    </p>

                    <div class="legal-notice-box">
                        <strong>Commercial B2B Notice:</strong>
                        Our LED display products are primarily sold to international engineering companies, system integrators, distributors, and leasing entities. In addition to these website policies, specific order quantities, customized CAD drawings, testing certifications, and custom warranty periods are strictly governed by the signed B2B <strong>Sales Contract or Proforma Invoice (PI)</strong>.
                    </div>

                    <section id="section-1">
                        <h2>1. Acceptance & Definitions</h2>
                        <p>These Terms apply to all global users utilizing this website to request quotes, review cabinet specs, or download catalogs. The term "LED Display" includes indoor, outdoor, transparent, film, photoelectric glass, floor tile, and flexible screens produced by us. "B2B Transaction" means commercial purchases by business entities for projects, screen rental fleets, or systems integration.</p>
                    </section>

                    <section id="section-2">
                        <h2>2. Intellectual Property & Technical Copyright</h2>
                        <p>All items on this website are the proprietary assets of Zhongming LED. We are protected by China's Copyright Law, Trademark Law, and international intellectual property agreements:</p>
                        <ul>
                            <li><strong>Copyright Assets:</strong> All technical parameter tables, module rendering photos, cabinet design diagrams, CAD steel frame suggestions, product catalog PDFs, and operational videos belong exclusively to us.</li>
                            <li><strong>Restrictions on Use:</strong> Any competitive copying, web scraping, removal of logos/watermarks, or reposting of our technical literature for commercial distribution is strictly prohibited.</li>
                        </ul>
                    </section>

                    <section id="section-3">
                        <h2>3. LED Specifications & R&D Changes</h2>
                        <p>LED display hardware is subject to continuous R&D improvements. Accordingly:</p>
                        <ul>
                            <li><strong>Technical Specs as Guidelines:</strong> Values listed (pixel pitch, weight, brightness, contrast, viewing angles, maximum/average power, etc.) represent typical laboratory configurations. We reserve the right to alter cabinet frameworks, upgrade PCB layouts, or discontinue specific models without notice.</li>
                            <li><strong>LED Batch Deviations:</strong> Due to physical parameters of LED diode encapsulation, slight deviations in color wavelength and luminance can occur between production batches. <strong>If purchasing backup parts or expanding an existing screen, please specify your previous PO batch details</strong> so we can cross-match components.</li>
                        </ul>
                    </section>

                    <section id="section-4">
                        <h2>4. B2B Contracts & Payment Terms</h2>
                        <p>Information submitted through our online inquiry forms does not constitute a legally binding offer to sell:</p>
                        <ul>
                            <li><strong>Validity of Quotes:</strong> Formal quotations issued by our sales managers are valid for 30 days. Material fluctuations (e.g. PCB copper, IC semiconductors, shipping freight) may require price adjustments thereafter.</li>
                            <li><strong>Standard Payment Structures:</strong> Unless stated otherwise in the Sales Contract, standard payment is <strong>30% T/T deposit to initiate raw material purchasing and production, and 70% T/T balance cleared after 72-hour burn-in tests and prior to shipment</strong>.</li>
                        </ul>
                    </section>

                    <section id="section-5">
                        <h2>5. Logistics, Shipping & Transfer of Risk</h2>
                        <p>For heavy display shipments, we enforce standard International Chamber of Commerce (ICC) Incoterms:</p>
                        <ul>
                            <li><strong>Default Logistics Terms:</strong> Handled under <strong>FOB Shenzhen</strong> or <strong>EXW Shenzhen</strong> rules.</li>
                            <li><strong>Transfer of Risk:</strong> The risk of damage or loss transfers to the buyer once the plywood or flight cases are delivered to your appointed freight forwarder or loaded onto container trucks at our factory.</li>
                            <li><strong>Export Packaging:</strong> LED modules are sealed in anti-static bags. Cabinets are packaged in heavy-duty plywood crates lined with anti-vibration polyethylene foam to withstand marine voyages. Flight cases with wheels are optional for rental screen orders.</li>
                        </ul>
                    </section>

                    <section id="section-6">
                        <h2>6. Warranty Policies & Support Scope</h2>
                        <p>We provide a manufacturer's warranty for all LED display hardware under normal use:</p>
                        <ul>
                            <li><strong>Standard Warranty Period:</strong> A <strong>2-year (24-month)</strong> factory hardware warranty starting from the date of dispatch (unless extended up to 3-5 years by specific sales contract).</li>
                            <li><strong>Coverage Scope:</strong> Covers LED diode failures, driver IC defects, power supply breakdowns, and control card malfunctions arising from original manufacturing anomalies.</li>
                            <li><strong>Pixel/Diode Tolerance:</strong> Blind spot/失控点 limits are kept below 0.01% (one in ten thousand), exceeding industry averages. In-warranty pixel anomalies exceeding this rate will receive free replacement parts.</li>
                            <li><strong>Warranty Exclusions:</strong>
                                <br/>a) Structural deformation caused by incorrect steel frames or lightning/electrical surges bypassing necessary surge protections;
                                <br/>b) Cabinet overheating due to inadequate ventilation design (operating outside temperature bounds of -30°C to +60°C);
                                <br/>c) Short circuits caused by hot-plugging cables, incorrect wiring, or utilizing non-original power supplies.
                            </li>
                        </ul>
                    </section>

                    <section id="section-7">
                        <h2>7. RMA & Spare Parts Procedures</h2>
                        <p>Hardware failures are processed under our RMA protocol:</p>
                        <ul>
                            <li><strong>Free Spare Parts:</strong> We allocate 2% to 5% free spares (modules, ICs, ribbon cables, power modules) with each shipment for immediate replacement on site.</li>
                            <li><strong>RMA Repairs:</strong> If spares are exhausted, defective parts must be returned to our Shenzhen facility. <strong>The buyer covers freight shipping items back to China; Zhongming LED covers shipping costs to return repaired components.</strong></li>
                            <li><strong>On-Site Technical Travel:</strong> Standard pricing does not include overseas on-site service. If field engineers are requested for screen assembly or calibration, visa, travel, and lodging expenses are billed separately.</li>
                        </ul>
                    </section>

                    <section id="section-8">
                        <h2>8. Website Terms of Use & Restraints</h2>
                        <p>When accessing our website, you agree not to engage in actions harmful to our digital infrastructure:</p>
                        <ul>
                            <li>Do not use automated scraping systems (crawlers, scrapers) to extract product datasets, ACF specs, or email addresses.</li>
                            <li>Do not crop or re-edit our project photos and CAD diagrams to pass off as your own design assets.</li>
                        </ul>
                    </section>

                    <section id="section-9">
                        <h2>9. Limitation of Liability</h2>
                        <p>To the maximum extent permitted by law, Zhongming LED is not liable for indirect or consequential damages:</p>
                        <ul>
                            <li><strong>Screen Downtime Losses:</strong> We are not liable for advertising revenue loss, event cancellations, stadium penalties, or rental claims due to screen power issues or control system disconnections.</li>
                            <li><strong>Parameter Guidelines:</strong> While we aim for technical accuracy, site specifications represent guidelines and do not bind us to error-free contract guarantees.</li>
                        </ul>
                    </section>

                    <section id="section-10">
                        <h2>10. Governing Law & Jurisdiction</h2>
                        <p>These Terms of Service are governed by and construed in accordance with the laws of the People's Republic of China.</p>
                        <p>Any commercial disputes arising from site use or sales transactions shall first be settled through amicable consultation. If agreement is not reached within 30 days, disputes shall be submitted to the **competent People's Court of Bao'an District, Shenzhen, China**.</p>
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
                    
                    history.pushState(null, null, hash);
                }
            }
        });
    });
});
</script>

<?php get_footer(); ?>
