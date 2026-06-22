    </main><!-- #primary -->

    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-col brand-info">
                <div class="footer-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder/logo-light.png" alt="<?php bloginfo( 'name' ); ?>">
                </div>
                <p class="brand-desc">Professional LED Display Manufacturer since 2014. Full-spectrum solutions for indoor, outdoor, and creative scenarios.</p>
                <div class="social-links">
                    <!-- Icons here -->
                </div>
            </div>
            
            <div class="footer-col">
                <h4 class="footer-title">Products</h4>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer_menu', // Use a specific menu or filter products
                    'container'      => false,
                    'menu_class'     => 'footer-links',
                ) );
                ?>
            </div>

            <div class="footer-col">
                <h4 class="footer-title">Solutions</h4>
                <ul class="footer-links">
                    <li><a href="#">Advertising Display</a></li>
                    <li><a href="#">Conference Room</a></li>
                    <li><a href="#">Broadcast Studio</a></li>
                    <li><a href="#">Control Room</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4 class="footer-title">Company</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo site_url('/about-us'); ?>">About Us</a></li>
                    <li><a href="<?php echo site_url('/contact'); ?>">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved. Manufactured in Shenzhen, China.</p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
