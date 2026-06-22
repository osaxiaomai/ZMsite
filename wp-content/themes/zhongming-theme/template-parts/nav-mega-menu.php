<?php
/**
 * Template part for displaying the Products Mega Menu
 */
?>
<div class="mega-menu" id="mega-menu-products">
    <div class="mega-inner">
        <!-- Column 1: Indoor -->
        <div class="mega-col">
            <h4><?php zm_te('Indoor LED', '室内 LED'); ?></h4>
            <a href="<?php echo zm_category_link('standard-indoor'); ?>" class="mega-item">
                <div class="mega-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/nav/indoor.jpg" alt=""></div>
                <div class="mega-content">
                    <span><?php zm_te('Standard Indoor', '室内标准屏'); ?></span>
                    <small>P1.2 – P2.5 · SMD / Aluminum</small>
                </div>
            </a>
            <a href="<?php echo zm_category_link('cob-series'); ?>" class="mega-item">
                <div class="mega-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/nav/cob.jpg" alt=""></div>
                <div class="mega-content">
                    <span><?php zm_te('COB Series', 'COB 小间距系列'); ?></span>
                    <small><?php zm_te('P0.7 – P1.5 · Flip chip', 'P0.7 – P1.5 · 倒装芯片'); ?></small>
                </div>
            </a>
            <a href="<?php echo zm_category_link('169-indoor'); ?>" class="mega-item">
                <div class="mega-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/nav/169.jpg" alt=""></div>
                <div class="mega-content">
                    <span><?php zm_te('16:9 Indoor', '16:9 黄金比例屏'); ?></span>
                    <small>P0.9 – P2 · 600×337.5mm</small>
                </div>
            </a>
            <a href="<?php echo zm_category_link('indoor-rental'); ?>" class="mega-item">
                <div class="mega-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/nav/rental.jpg" alt=""></div>
                <div class="mega-content">
                    <span><?php zm_te('Indoor Rental', '室内租赁屏'); ?></span>
                    <small><?php zm_te('P2.6 – P4.8 · High refresh', 'P2.6 – P4.8 · 高刷新率'); ?></small>
                </div>
            </a>
        </div>

        <!-- Column 2: Outdoor -->
        <div class="mega-col">
            <h4><?php zm_te('Outdoor LED', '户外 LED'); ?></h4>
            <a href="<?php echo zm_category_link('standard-outdoor'); ?>" class="mega-item">
                <div class="mega-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/nav/outdoor.jpg" alt=""></div>
                <div class="mega-content">
                    <span><?php zm_te('Standard Outdoor', '户外标准屏'); ?></span>
                    <small>P2.5 – P10 · IP65</small>
                </div>
            </a>
            <a href="<?php echo zm_category_link('outdoor-rental'); ?>" class="mega-item">
                <div class="mega-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/nav/rental.jpg" alt=""></div>
                <div class="mega-content">
                    <span><?php zm_te('Outdoor Rental', '户外租赁屏'); ?></span>
                    <small><?php zm_te('P2.9 – P4.8 · IP65 Waterproof', 'P2.9 – P4.8 · IP65 防水'); ?></small>
                </div>
            </a>
            <a href="<?php echo zm_category_link('panel-series'); ?>" class="mega-item">
                <div class="mega-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/nav/panel.jpg" alt=""></div>
                <div class="mega-content">
                    <span><?php zm_te('Panel Series', '显示面板/模组'); ?></span>
                    <small><?php zm_te('Single module units', '单模组单元'); ?></small>
                </div>
            </a>
        </div>

        <!-- Column 3: Special & Creative -->
        <div class="mega-col">
            <h4><?php zm_te('Special & Creative', '创意与特种屏'); ?></h4>
            <a href="<?php echo zm_category_link('transparent-screen'); ?>" class="mega-item">
                <div class="mega-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/nav/transparent.jpg" alt=""></div>
                <div class="mega-content">
                    <span><?php zm_te('Transparent Screen', 'LED透明屏'); ?></span>
                    <small><?php zm_te('55–87% transparency', '55–87% 通透率'); ?></small>
                </div>
            </a>
            <a href="<?php echo zm_category_link('film-screen'); ?>" class="mega-item">
                <div class="mega-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/nav/film.jpg" alt=""></div>
                <div class="mega-content">
                    <span><?php zm_te('Film Screen', 'LED 贴膜屏'); ?></span>
                    <small><?php zm_te('≤3mm thin · Glass-mount', '≤3mm 纤薄 · 玻璃贴装'); ?></small>
                </div>
            </a>
            <a href="<?php echo zm_category_link('floor-tile-screen'); ?>" class="mega-item">
                <div class="mega-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/nav/floor.jpg" alt=""></div>
                <div class="mega-content">
                    <span><?php zm_te('Floor Tile Screen', '智能地砖屏'); ?></span>
                    <small><?php zm_te('500KG load · Interactive', '500KG 承重 · 智能互动'); ?></small>
                </div>
            </a>
            <a href="<?php echo zm_category_link('flexible-led'); ?>" class="mega-item">
                <div class="mega-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/nav/flexible.jpg" alt=""></div>
                <div class="mega-content">
                    <span><?php zm_te('Flexible LED', '柔性软模组'); ?></span>
                    <small><?php zm_te('Curve / column / arch', '弧形 / 圆柱 / 拱形拼接'); ?></small>
                </div>
            </a>
            <a href="<?php echo zm_category_link('customized-xr'); ?>" class="mega-item">
                <div class="mega-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/nav/custom.jpg" alt=""></div>
                <div class="mega-content">
                    <span><?php zm_te('Customized / XR', '定制化 / XR虚拟拍摄'); ?></span>
                    <small><?php zm_te('Sphere · Cylinder · 5-face', '球形屏 · 圆柱屏 · 5面体'); ?></small>
                </div>
            </a>
            <a href="<?php echo zm_category_link('photoelectric-glass'); ?>" class="mega-item">
                <div class="mega-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/nav/glass.jpg" alt=""></div>
                <div class="mega-content">
                    <span><?php zm_te('Photoelectric Glass', '光电玻璃屏'); ?></span>
                    <small><?php zm_te('Transparent glass LED', '透明玻璃 LED'); ?></small>
                </div>
            </a>
        </div>
    </div>
</div>
