<?php
/**
 * Template Name: Contact Template
 *
 * Custom page template for the 联系我们 / Request a Quote page.
 * Includes Contact Form 7 integration, custom HTML fallback form, 
 * direct B2B coordinates (电子邮箱, Phone, WhatsApp, Address), PDF catalog download,
 * and Google Maps embed, with URL parameter parsing script.
 */

get_header(); 

// Contact email — always use updated B2B address
$company_email = '571217058@qq.com'; // 钟先生 / Mr. Zhong

$company_phone = get_field( 'company_phone', 'option' );
$whatsapp_number = get_field( 'whatsapp_number', 'option' );
if ( empty( $whatsapp_number ) ) {
    $whatsapp_number = '+86 18318038616'; // WhatsApp — 钟先生
}

$company_address = '中国深圳市宝安区石岩街道北环路137号华丰圳宝工业园';

$catalog_pdf = get_field( 'catalog_pdf', 'option' );
if ( empty( $catalog_pdf ) ) {
    $catalog_pdf = '#'; // placeholder catalog link
}
?>

<!-- Contact Hero Header -->
<section class="contact-hero" style="background-color: var(--color-bg-2); border-bottom: 1px solid var(--color-border); padding: 50px 0; text-align: center;">
    <div class="container">
        <span class="hero-eyebrow" style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: var(--color-text-3); display: block; margin-bottom: 8px;">
            <?php esc_html_e( '联系我们', 'zhongming' ); ?>
        </span>
        <h1 class="hero-h1" style="font-size: 28px; font-weight: 800; color: var(--color-text); margin-bottom: 10px; line-height: 1.2;">
            <?php esc_html_e( '获取免费报价或技术咨询', 'zhongming' ); ?>
        </h1>
        <p class="hero-sub" style="font-size: 14px; color: var(--color-text-2); line-height: 1.6; max-width: 680px; margin: 0 auto;">
            <?php esc_html_e( '请将您的项目需求（如屏幕尺寸、像素间距、安装环境、用途等）告知我们，我们的团队将在24小时内为您提供定制方案和效果设计。', 'zhongming' ); ?>
        </p>
    </div>
</section>

<!-- Contact Form & Info Grid Section -->
<section class="contact-section" style="padding: 60px 0; background-color: #ffffff;">
    <div class="container">
        
        <div class="contact-layout-grid" style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 60px; align-items: start;">
            
            <!-- Left Column: 询盘留言 -->
            <div class="contact-form-container">
                <h2 style="font-size: 18px; font-weight: 700; color: var(--color-text); margin-bottom: 24px; border-bottom: 1px solid var(--color-border); padding-bottom: 12px;">
                    <?php esc_html_e( '询盘留言', 'zhongming' ); ?>
                </h2>
                
                <?php 
                $cf7_rendered = false;
                if ( function_exists( 'wpcf7_contact_form' ) || shortcode_exists( 'contact-form-7' ) ) {
                    // Try to retrieve existing forms in the database
                    $cf7_forms = get_posts( array(
                        'post_type'   => 'wpcf7_contact_form',
                        'numberposts' => 1,
                    ) );
                    
                    if ( ! empty( $cf7_forms ) ) {
                        $form_id = $cf7_forms[0]->ID;
                        echo do_shortcode( '[contact-form-7 id="' . $form_id . '" title="' . esc_attr( $cf7_forms[0]->post_title ) . '"]' );
                        $cf7_rendered = true;
                    } else {
                        // Attempt fallback default title shortcode
                        $output = do_shortcode( '[contact-form-7 title="询盘留言"]' );
                        if ( ! empty( $output ) && strpos( $output, '[contact-form-7' ) === false ) {
                            echo $output;
                            $cf7_rendered = true;
                        }
                    }
                }
                
                // Fallback HTML form (styled with the same premium classes) if CF7 is not active or not created
                if ( ! $cf7_rendered ) : 
                    $contact_form_submitted = false;
                    if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['contact_fallback_submit'] ) ) {
                        $name = sanitize_text_field( $_POST['your-name'] );
                        $company = sanitize_text_field( $_POST['company-name'] );
                        $email = sanitize_email( $_POST['your-email'] );
                        $phone = sanitize_text_field( $_POST['whatsapp-phone'] );
                        $interest = sanitize_text_field( $_POST['product-interest'] );
                        $desc = sanitize_textarea_field( $_POST['display-size'] );
                        
                        if ( is_email( $email ) && !empty( $name ) && !empty( $desc ) ) {
                            $to = get_bloginfo('admin_email');
                            $subject = 'New B2B Contact Page Inquiry - ' . $name;
                            $headers = array('Content-Type: text/html; charset=UTF-8', 'Reply-To: ' . $email);
                            
                            $body = "<h3>New Inquiry Received from Contact Page</h3>";
                            $body .= "<p><strong>Name:</strong> {$name}</p>";
                            $body .= "<p><strong>Company:</strong> {$company}</p>";
                            $body .= "<p><strong>电子邮箱:</strong> {$email}</p>";
                            $body .= "<p><strong>联系电话/微信:</strong> {$phone}</p>";
                            $body .= "<p><strong>感兴趣的产品:</strong> {$interest}</p>";
                            $body .= "<p><strong>Project Description:</strong><br>" . nl2br($desc) . "</p>";
                            
                            $attachments = array();
                            if ( isset( $_FILES['file-attachment'] ) && $_FILES['file-attachment']['error'] == UPLOAD_ERR_OK ) {
                                $uploaded_file = $_FILES['file-attachment'];
                                if ( ! function_exists( 'wp_handle_upload' ) ) {
                                    require_once( ABSPATH . 'wp-admin/includes/file.php' );
                                }
                                $movefile = wp_handle_upload( $uploaded_file, array( 'test_form' => false ) );
                                if ( $movefile && ! isset( $movefile['error'] ) ) {
                                    $attachments[] = $movefile['file'];
                                }
                            }
                            
                            wp_mail($to, $subject, $body, $headers, $attachments);
                            
                            if ( ! empty( $attachments ) ) {
                                foreach ( $attachments as $file_path ) {
                                    @unlink( $file_path );
                                }
                            }
                            
                            $contact_form_submitted = true;
                        }
                    }
                ?>
                    <?php if ( $contact_form_submitted ) : ?>
                        <div style="background: #eaf5e8; border: 1px solid #1a5c1a; color: #1a5c1a; padding: 20px; border-radius: 6px; text-align: center; font-size: 14px; font-weight: 600; margin-bottom: 20px;">
                            ✓ <?php esc_html_e( '✓ 感谢您的垂询！您的信息已成功提交，我们将尽快与您取得联系。', 'zhongming' ); ?>
                        </div>
                    <?php else : ?>
                        <form action="" method="post" enctype="multipart/form-data" class="fallback-inquiry-form" style="display: flex; flex-direction: column; gap: 16px;">
                            <div class="form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                                <div class="form-group">
                                    <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--color-text-2); margin-bottom: 6px;"><?php esc_html_e( '您的姓名 *', 'zhongming' ); ?></label>
                                    <input type="text" name="your-name" required class="wf-input" placeholder="例如：张先生" style="width: 100%; height: 40px; border: 1px solid var(--color-border); border-radius: 4px; padding: 0 12px; font-size: 13px; background-color: var(--color-bg-2);">
                                </div>
                                <div class="form-group">
                                    <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--color-text-2); margin-bottom: 6px;"><?php esc_html_e( '公司名称', 'zhongming' ); ?></label>
                                    <input type="text" name="company-name" class="wf-input" placeholder="例如：中茗集成" style="width: 100%; height: 40px; border: 1px solid var(--color-border); border-radius: 4px; padding: 0 12px; font-size: 13px; background-color: var(--color-bg-2);">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--color-text-2); margin-bottom: 6px;"><?php esc_html_e( '电子邮箱 *', 'zhongming' ); ?></label>
                                <input type="email" name="your-email" required class="wf-input" placeholder="例如：username@company.com" style="width: 100%; height: 40px; border: 1px solid var(--color-border); border-radius: 4px; padding: 0 12px; font-size: 13px; background-color: var(--color-bg-2);">
                            </div>
                            
                            <div class="form-group">
                                <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--color-text-2); margin-bottom: 6px;"><?php esc_html_e( '电话/微信', 'zhongming' ); ?></label>
                                <input type="text" name="whatsapp-phone" class="wf-input" placeholder="例如：+86 138-0000-0000" style="width: 100%; height: 40px; border: 1px solid var(--color-border); border-radius: 4px; padding: 0 12px; font-size: 13px; background-color: var(--color-bg-2);">
                            </div>
                            
                            <div class="form-group">
                                <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--color-text-2); margin-bottom: 6px;"><?php esc_html_e( '感兴趣的产品', 'zhongming' ); ?></label>
                                <select name="product-interest" class="wf-select" style="width: 100%; height: 40px; border: 1px solid var(--color-border); border-radius: 4px; padding: 0 12px; font-size: 13px; background-color: var(--color-bg-2); color: var(--color-text);">
                                    <option value=""><?php esc_html_e( '-- 请选择产品分类 --', 'zhongming' ); ?></option>
                                    <option value="室内标准 LED"><?php esc_html_e( '室内标准 LED', 'zhongming' ); ?></option>
                                    <option value="COB 小间距系列"><?php esc_html_e( 'COB 小间距系列', 'zhongming' ); ?></option>
                                    <option value="16:9 黄金比例屏"><?php esc_html_e( '16:9 黄金比例屏', 'zhongming' ); ?></option>
                                    <option value="户外标准 LED"><?php esc_html_e( '户外标准 LED', 'zhongming' ); ?></option>
                                    <option value="舞台租赁屏"><?php esc_html_e( '舞台租赁屏', 'zhongming' ); ?></option>
                                    <option value="LED透明屏"><?php esc_html_e( 'LED透明屏', 'zhongming' ); ?></option>
                                    <option value="LED 贴膜屏"><?php esc_html_e( 'LED 贴膜屏', 'zhongming' ); ?></option>
                                    <option value="智能地砖屏"><?php esc_html_e( '智能地砖屏', 'zhongming' ); ?></option>
                                    <option value="柔性软模组"><?php esc_html_e( '柔性软模组', 'zhongming' ); ?></option>
                                    <option value="定制化 / XR 虚拟拍摄"><?php esc_html_e( '定制化 / XR 虚拟拍摄', 'zhongming' ); ?></option>
                                    <option value="暂不确定"><?php esc_html_e( '暂不确定', 'zhongming' ); ?></option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--color-text-2); margin-bottom: 6px;"><?php esc_html_e( '显示屏尺寸 / 项目需求描述 *', 'zhongming' ); ?></label>
                                <textarea name="display-size" required class="wf-textarea" placeholder="例如：室内会议室，面积约4米×2米，需要P1.5或类似间距，预计下季度安装..." style="width: 100%; height: 90px; border: 1px solid var(--color-border); border-radius: 4px; padding: 10px 12px; font-size: 13px; background-color: var(--color-bg-2); font-family: inherit; resize: vertical;"></textarea>
                                <span style="font-size: 10px; color: var(--color-text-3); margin-top: 4px; display: block;"><?php esc_html_e( '例如：“室内会议室，面积约4米×2米，需要P1.5或类似间距，预计下季度安装”', 'zhongming' ); ?></span>
                            </div>
                            
                            <div class="form-group">
                                <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--color-text-2); margin-bottom: 6px;"><?php esc_html_e( '添加附件（可选）', 'zhongming' ); ?></label>
                                <div style="border: 1px dashed var(--color-border-2); border-radius: 4px; padding: 12px; text-align: center; font-size: 11px; color: var(--color-text-3); background-color: var(--color-bg-2);">
                                    📎 <?php esc_html_e( '点击上传图纸、规格说明或照片（支持 PDF、JPG 格式，最大 10MB）', 'zhongming' ); ?>
                                    <input type="file" name="file-attachment" style="margin-top: 8px; font-size: 11px; width: 100%;">
                                </div>
                            </div>
                            
                            <input type="hidden" name="contact_fallback_submit" value="1">
                            <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; height: 44px; font-size: 14px; font-weight: 600; text-transform: uppercase; border-radius: 4px; margin-top: 6px; background-color: var(--color-accent-blue, #0057b8) !important; border-color: var(--color-accent-blue, #0057b8) !important; color: #ffffff !important; transition: var(--transition);">
                                <?php esc_html_e( '提交咨询 →→', 'zhongming' ); ?>
                            </button>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
                
                <p style="font-size: 11px; color: var(--color-text-3); text-align: center; margin-top: 12px; margin-bottom: 0;">
                    ✓ <?php esc_html_e( '我们将在 24 小时内回复 · 您的信息将被严格保密', 'zhongming' ); ?>
                </p>
            </div>
            
            <!-- Right Column: 直接联系 & Location Coordinates -->
            <div class="contact-info-container">
                <h2 style="font-size: 18px; font-weight: 700; color: var(--color-text); margin-bottom: 24px; border-bottom: 1px solid var(--color-border); padding-bottom: 12px;">
                    <?php esc_html_e( '直接联系', 'zhongming' ); ?>
                </h2>
                
                <div class="contact-details-list" style="display: flex; flex-direction: column; gap: 20px; margin-bottom: 30px;">
                    
                    <!-- 电子邮箱 detail row -->
                    <div style="display: flex; gap: 16px; align-items: flex-start;">
                        <div style="width: 36px; height: 36px; background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 16px; color: var(--color-text-2); flex-shrink: 0;">✉</div>
                        <div>
                            <span style="font-size: 11px; color: var(--color-text-3); text-transform: uppercase; font-weight: 700; display: block; margin-bottom: 2px; letter-spacing: 0.5px;"><?php esc_html_e( '电子邮箱', 'zhongming' ); ?></span>
                            <a href="mailto:<?php echo esc_attr( $company_email ); ?>" style="font-size: 14px; color: var(--color-text); font-weight: 600; text-decoration: none; transition: var(--transition);"><?php echo esc_html( $company_email ); ?></a>
                            <span style="font-size: 11px; color: var(--color-text-3); display: block; margin-top: 2px;"><?php esc_html_e( '24小时内响应', 'zhongming' ); ?></span>
                        </div>
                    </div>
                    
                    <!-- Phone / WhatsApp detail row -->
                    <div style="display: flex; gap: 16px; align-items: flex-start;">
                        <div style="width: 36px; height: 36px; background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 16px; color: var(--color-text-2); flex-shrink: 0;">💬</div>
                        <div>
                            <span style="font-size: 11px; color: var(--color-text-3); text-transform: uppercase; font-weight: 700; display: block; margin-bottom: 2px; letter-spacing: 0.5px;"><?php esc_html_e( '电话/微信', 'zhongming' ); ?></span>
                            <a href="tel:+8618318038616" style="font-size: 14px; color: var(--color-text); font-weight: 600; text-decoration: none; transition: var(--transition);">+86 18318038616</a>
                            <span style="font-size: 11px; color: var(--color-text-3); display: block; margin-top: 2px;"><?php esc_html_e( '周一至周六 9:00–18:00', 'zhongming' ); ?></span>
                        </div>
                    </div>

                    <!-- 销售联系人 detail row -->
                    <div style="display: flex; gap: 16px; align-items: flex-start;">
                        <div style="width: 36px; height: 36px; background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 16px; color: var(--color-text-2); flex-shrink: 0;">👤</div>
                        <div>
                            <span style="font-size: 11px; color: var(--color-text-3); text-transform: uppercase; font-weight: 700; display: block; margin-bottom: 6px; letter-spacing: 0.5px;">销售联系人</span>
                            <div style="display: flex; flex-direction: column; gap: 6px;">
                                <div>
                                    <span style="font-size: 13px; color: var(--color-text); font-weight: 600;">钟先生</span>
                                    <span style="font-size: 12px; color: var(--color-text-2); margin-left: 8px;">
                                        <a href="tel:+8613380304454" style="color: inherit; text-decoration: none;">+86 133 8030 4454</a>
                                    </span>
                                </div>
                                <div>
                                    <span style="font-size: 13px; color: var(--color-text); font-weight: 600;">张先生</span>
                                    <span style="font-size: 12px; color: var(--color-text-2); margin-left: 8px;">
                                        <a href="tel:+8618126103513" style="color: inherit; text-decoration: none;">+86 181 2610 3513</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 工厂地址 detail row -->
                    <div style="display: flex; gap: 16px; align-items: flex-start;">
                        <div style="width: 36px; height: 36px; background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 16px; color: var(--color-text-2); flex-shrink: 0;">📍</div>
                        <div>
                            <span style="font-size: 11px; color: var(--color-text-3); text-transform: uppercase; font-weight: 700; display: block; margin-bottom: 2px; letter-spacing: 0.5px;"><?php esc_html_e( '工厂地址', 'zhongming' ); ?></span>
                            <p style="font-size: 13px; color: var(--color-text); line-height: 1.5; margin: 0; font-weight: 500;">
                                <?php echo esc_html( $company_address ); ?>
                            </p>
                        </div>
                    </div>
                    
                    <!-- 产品目录 detail row -->
                    <div style="display: flex; gap: 16px; align-items: flex-start;">
                        <div style="width: 36px; height: 36px; background-color: var(--color-bg-2); border: 1px solid var(--color-border); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 16px; color: var(--color-text-2); flex-shrink: 0;">⬇</div>
                        <div>
                            <span style="font-size: 11px; color: var(--color-text-3); text-transform: uppercase; font-weight: 700; display: block; margin-bottom: 4px; letter-spacing: 0.5px;"><?php esc_html_e( '产品目录', 'zhongming' ); ?></span>
                            <a href="<?php echo esc_url( $catalog_pdf ); ?>" class="btn btn-outline" style="font-size: 12px; padding: 6px 14px; font-weight: 600; display: inline-flex; border-radius: 4px; text-decoration: none;" download>
                                <?php esc_html_e( '下载 PDF 产品目录', 'zhongming' ); ?>
                            </a>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Baidu Maps Iframe Embed -->
                <div class="google-map-embed-wrapper" style="border: 1px solid var(--color-border); border-radius: 6px; overflow: hidden; height: 200px; background-color: var(--color-bg-2); position: relative;">
                    <!-- Embedded standard iframe pointing to Bao'an, Shenzhen (Baidu Maps) -->
                    <iframe 
                        src="<?php echo esc_url( get_template_directory_uri() . '/map-baidu.html' ); ?>" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- URL query selector parsing JS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Parse URL search parameters
    const urlParams = new URLSearchParams(window.location.search);
    const productVal = urlParams.get('product_title') || urlParams.get('product');
    
    if (productVal) {
        // Attempt to find the selector tag
        const selectElem = document.getElementById('product-interest') || 
                           document.querySelector('select[name="product-interest"]') || 
                           document.querySelector('.wpcf7-form select') || 
                           document.querySelector('.fallback-inquiry-form select');
                           
        if (selectElem) {
            const decodedVal = decodeURIComponent(productVal).trim().toLowerCase();
            let matched = false;
            
            // Step 1: Try exact matching
            for (let i = 0; i < selectElem.options.length; i++) {
                const optVal = selectElem.options[i].value.toLowerCase();
                const optText = selectElem.options[i].text.toLowerCase();
                
                if (optVal === decodedVal || optText === decodedVal) {
                    selectElem.selectedIndex = i;
                    matched = true;
                    break;
                }
            }
            
            // Step 2: Try fuzzy/partial matching if exact fails
            if (!matched) {
                for (let i = 0; i < selectElem.options.length; i++) {
                    const optText = selectElem.options[i].text.toLowerCase();
                    const optVal = selectElem.options[i].value.toLowerCase();
                    
                    if (optText.includes(decodedVal) || decodedVal.includes(optText) ||
                        optVal.includes(decodedVal) || decodedVal.includes(optVal)) {
                        selectElem.selectedIndex = i;
                        matched = true;
                        break;
                    }
                }
            }
            
            // Step 3: Specific series categorization mappings if details page sends specific models
            if (!matched) {
                // e.g. "cob-p1.5" or "cob series" or similar
                if (decodedVal.indexOf('cob') !== -1) {
                    for (let i = 0; i < selectElem.options.length; i++) {
                        if (selectElem.options[i].value.toLowerCase().indexOf('cob') !== -1) {
                            selectElem.selectedIndex = i;
                            matched = true;
                            break;
                        }
                    }
                } else if (decodedVal.indexOf('indoor') !== -1) {
                    for (let i = 0; i < selectElem.options.length; i++) {
                        if (selectElem.options[i].value.toLowerCase().indexOf('indoor') !== -1) {
                            selectElem.selectedIndex = i;
                            matched = true;
                            break;
                        }
                    }
                } else if (decodedVal.indexOf('outdoor') !== -1) {
                    for (let i = 0; i < selectElem.options.length; i++) {
                        if (selectElem.options[i].value.toLowerCase().indexOf('outdoor') !== -1) {
                            selectElem.selectedIndex = i;
                            matched = true;
                            break;
                        }
                    }
                } else if (decodedVal.indexOf('rental') !== -1) {
                    for (let i = 0; i < selectElem.options.length; i++) {
                        if (selectElem.options[i].value.toLowerCase().indexOf('rental') !== -1) {
                            selectElem.selectedIndex = i;
                            matched = true;
                            break;
                        }
                    }
                }
            }
            
            // Dispatch change event in case of listeners/CF7 dynamic bindings
            selectElem.dispatchEvent(new Event('change', { bubbles: true }));
        }
    }
});
</script>

<?php get_footer(); ?>
