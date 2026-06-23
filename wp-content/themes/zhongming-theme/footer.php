</main><!-- #primary -->

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <h4 style="color: #fff; font-weight: 800; margin-bottom: 20px;"><?php zm_te('ZHONGMING LED', '中茗光电'); ?></h4>
                <p style="font-size: 13px; line-height: 1.8;"><?php zm_te('Leading manufacturer of professional LED display solutions. Dedicated to delivering high-performance visual experiences worldwide.', '领先的专业 LED 显示屏解决方案制造商。致力于为全球客户提供高性能的视觉体验。'); ?></p>
            </div>

            <div class="footer-col">
                <h4><?php _e('Products', 'zhongming'); ?></h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url( zm_category_link('standard-indoor') ); ?>"><?php zm_te('Indoor LED', '室内 LED'); ?></a></li>
                    <li><a href="<?php echo esc_url( zm_category_link('standard-outdoor') ); ?>"><?php zm_te('Outdoor LED', '户外 LED'); ?></a></li>
                    <li><a href="<?php echo esc_url( zm_category_link('transparent-screen') ); ?>"><?php zm_te('Creative Screens', '创意屏'); ?></a></li>
                    <li><a href="<?php echo esc_url( zm_product_archive_link() ); ?>"><?php zm_te('All Products', '所有产品'); ?></a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4><?php _e('Solutions', 'zhongming'); ?></h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url( function_exists('pll_get_post') ? get_permalink( pll_get_post( 646 ) ) : site_url('/solutions') ); ?>"><?php zm_te('Solutions', '解决方案'); ?></a></li>
                    <li><a href="<?php echo esc_url( function_exists('pll_get_post') ? get_permalink( pll_get_post( 644 ) ) : site_url('/about') ); ?>"><?php zm_te('About Us', '关于我们'); ?></a></li>
                    <li><a href="<?php echo esc_url( function_exists('pll_get_post') ? get_permalink( pll_get_post( 748 ) ) : site_url('/eventandnews') ); ?>"><?php zm_te('Events & News', '新闻动态'); ?></a></li>
                    <li><a href="<?php echo esc_url( function_exists('pll_get_post') ? get_permalink( pll_get_post( 645 ) ) : site_url('/contact') ); ?>"><?php zm_te('Contact Us', '联系我们'); ?></a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4><?php _e('Contact Us', 'zhongming'); ?></h4>
                <ul class="footer-links" style="font-size: 13px;">
                    <li><?php _e('Email', 'zhongming'); ?>: <a href="mailto:571217058@qq.com" style="color: inherit; text-decoration: none;">571217058@qq.com</a></li>
                    <li><?php zm_te('Phone/WhatsApp', '联系电话/微信'); ?>: <?php if ( zm_is_zh() ) : ?>+86 18318038616<?php else : ?><a href="https://wa.me/8618318038616" target="_blank" rel="noopener" style="color: inherit; text-decoration: none;">+86 18318038616</a><?php endif; ?></li>
                    <li><?php _e('Address', 'zhongming'); ?>: <?php _e("Huafeng Zhenbao Industrial Park, No. 137 Beihuan Road, Shiyan Street, Bao'an District, Shenzhen, China", 'zhongming'); ?></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <div>&copy; <?php echo date('Y'); ?> <?php zm_te('Shenzhen Zhongming Technology Co., Ltd.', '深圳市中茗光电科技有限公司'); ?></div>
            <div style="display: flex; gap: 20px;">
                <?php 
                $privacy_id = 821;
                $terms_id = 823;
                if ( function_exists('pll_get_post') ) {
                    $privacy_id = pll_get_post($privacy_id) ?: $privacy_id;
                    $terms_id = pll_get_post($terms_id) ?: $terms_id;
                }
                $privacy_url = get_permalink($privacy_id) ?: site_url('/privacy-policy');
                $terms_url = get_permalink($terms_id) ?: site_url('/terms-of-service');
                ?>
                <a href="<?php echo esc_url($privacy_url); ?>"><?php zm_te('Privacy Policy', '隐私条款'); ?></a>
                <a href="<?php echo esc_url($terms_url); ?>"><?php zm_te('Terms of Service', '服务条款'); ?></a>
            </div>
        </div>
    </div>
</footer>

<!-- Floating WhatsApp Button -->
<?php if ( ! zm_is_zh() ) : ?>
<a href="https://wa.me/8618318038616" target="_blank" rel="noopener" class="whatsapp-btn" aria-label="Contact us on WhatsApp">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.455L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.42 9.864-9.858.002-2.634-1.02-5.11-2.881-6.974-1.862-1.863-4.341-2.887-6.979-2.889-5.441 0-9.865 4.42-9.869 9.858-.002 1.808.475 3.578 1.38 5.172l-.963 3.512 3.628-.952zm10.102-7.433c-.229-.115-1.353-.667-1.561-.742-.208-.075-.36-.112-.511.112-.151.225-.584.742-.715.892-.132.15-.264.169-.493.054-.229-.115-.968-.356-1.846-1.14-.683-.609-1.144-1.362-1.277-1.592-.133-.23-.014-.354.101-.468.103-.103.229-.268.344-.403.115-.134.153-.229.229-.383.076-.153.038-.287-.019-.402-.057-.115-.511-1.228-.7-1.688-.184-.442-.37-.383-.511-.39-.132-.007-.284-.008-.436-.008-.153 0-.402.057-.613.287-.211.23-.805.787-.805 1.918 0 1.13.822 2.222.936 2.375.115.153 1.618 2.47 3.92 3.467.548.237.975.378 1.309.484.55.175 1.05.15 1.446.091.44-.066 1.353-.553 1.543-1.087.19-.533.19-.991.133-1.087-.057-.095-.208-.153-.437-.268z"/>
    </svg>
</a>
<?php endif; ?>

<!-- Back to Top Button -->
<button id="backToTopBtn" class="back-to-top-btn" aria-label="Back to Top">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="18 15 12 9 6 15"></polyline>
    </svg>
</button>
<?php wp_footer(); ?>
</body>
</html>
