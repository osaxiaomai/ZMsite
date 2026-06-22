<?php get_header(); ?>

<style>
.error-404-section {
    padding: 80px 0 60px;
    background: var(--color-bg-2);
    min-height: 60vh;
    display: flex;
    align-items: flex-start;
}
.error-404-inner {
    text-align: center;
    max-width: 680px;
    margin: 0 auto;
}
.error-404-code {
    font-family: 'Outfit', sans-serif;
    font-size: 120px;
    font-weight: 900;
    line-height: 1;
    color: var(--color-border);
    margin-bottom: 16px;
    letter-spacing: -4px;
}
.error-404-title {
    font-size: 28px;
    font-weight: 800;
    color: var(--color-text);
    margin-bottom: 12px;
    line-height: 1.2;
}
.error-404-sub {
    font-size: 15px;
    color: var(--color-text-2);
    line-height: 1.7;
    margin-bottom: 32px;
}
.error-404-search {
    display: flex;
    max-width: 480px;
    margin: 0 auto 24px;
    gap: 0;
    border: 1.5px solid var(--color-border-2);
    border-radius: 6px;
    overflow: hidden;
    background: #fff;
}
.error-404-search input[type="search"] {
    flex: 1;
    border: none;
    outline: none;
    padding: 12px 16px;
    font-size: 14px;
    font-family: inherit;
    color: var(--color-text);
    background: transparent;
}
.error-404-search button {
    background: var(--color-text);
    color: #fff;
    border: none;
    padding: 12px 20px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    font-family: inherit;
    transition: background 0.2s ease;
}
.error-404-search button:hover {
    background: var(--color-accent-blue, #0057b8);
}
.error-404-btns {
    display: flex;
    gap: 12px;
    justify-content: center;
    flex-wrap: wrap;
}
.error-404-products {
    padding: 60px 0;
    background: #fff;
    border-top: 1px solid var(--color-border);
}
</style>

<section class="error-404-section">
    <div class="container">
        <div class="error-404-inner">
            <div class="error-404-code">404</div>
            <h1 class="error-404-title"><?php esc_html_e( 'Page Not Found', 'zhongming' ); ?></h1>
            <p class="error-404-sub">
                <?php esc_html_e( "The page you're looking for may have been moved, deleted, or never existed. Try searching for LED display products below.", 'zhongming' ); ?>
            </p>

            <!-- Search Form -->
            <form class="error-404-search" role="search" method="get" action="<?php echo esc_url( home_url( '/products/' ) ); ?>">
                <input
                    type="search"
                    id="search-404"
                    name="s"
                    placeholder="<?php esc_attr_e( 'Search LED products…', 'zhongming' ); ?>"
                    value="<?php echo get_search_query(); ?>"
                    autocomplete="off"
                >
                <button type="submit" aria-label="Search">
                    <?php esc_html_e( 'Search', 'zhongming' ); ?>
                </button>
            </form>

            <!-- Action Buttons -->
            <div class="error-404-btns">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                    ← <?php esc_html_e( 'Return Home', 'zhongming' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" class="btn btn-outline">
                    <?php esc_html_e( 'Browse All Products', 'zhongming' ); ?>
                </a>
                <a href="<?php echo function_exists('zhongming_get_contact_url') ? esc_url( zhongming_get_contact_url() ) : esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline">
                    <?php esc_html_e( 'Contact Us', 'zhongming' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Recommended Products Section -->
<?php
$featured_404 = new WP_Query( array(
    'post_type'      => 'product',
    'posts_per_page' => 3,
    'meta_key'       => 'is_featured',
    'meta_value'     => '1',
    'orderby'        => 'rand',
) );

if ( $featured_404->have_posts() ) : ?>

<section class="error-404-products">
    <div class="container">
        <div class="section-header" style="margin-bottom: 36px; text-align: center;">
            <div class="hero-eyebrow"><?php esc_html_e( 'Featured Products', 'zhongming' ); ?></div>
            <h2 class="section-title" style="font-size: 22px;"><?php esc_html_e( 'You Might Be Interested In', 'zhongming' ); ?></h2>
        </div>
        <div class="product-grid" style="grid-template-columns: repeat(3, 1fr);">
            <?php while ( $featured_404->have_posts() ) : $featured_404->the_post();
                $pid       = get_the_ID();
                $badge     = get_field( 'badge_type', $pid );
                $pitch     = get_field( 'pixel_pitch_mm', $pid );
                $cabinet   = get_field( 'cabinet_size_mm', $pid );
                $brightness= get_field( 'brightness_nit', $pid );
                $viewing   = get_field( 'best_viewing_distance', $pid );
                $badge_class = '';
                $badge_text  = '';
                if ( $badge ) {
                    switch ( strtolower( $badge ) ) {
                        case 'indoor':  $badge_class = 'badge-indoor';  $badge_text = zm_t( 'Indoor', '室内' );  break;
                        case 'outdoor': $badge_class = 'badge-outdoor'; $badge_text = zm_t( 'Outdoor', '户外' ); break;
                        case 'special': $badge_class = 'badge-special'; $badge_text = zm_t( 'Special', '创意' ); break;
                        case 'rental':  $badge_class = 'badge-rental';  $badge_text = zm_t( 'Rental', '租赁' );  break;
                    }
                }
            ?>
            <div class="product-card">
                <div class="product-card-img">
                    <?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'medium' );
                    else : ?>
                        <div style="width:100%;height:100%;background:#f0f4f8;display:flex;align-items:center;justify-content:center;color:#bbb;font-size:36px;">🖥</div>
                    <?php endif; ?>
                    <?php if ( $badge_text ) : ?>
                        <span class="badge <?php echo esc_attr( $badge_class ); ?>"><?php echo esc_html( $badge_text ); ?></span>
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <h3><?php the_title(); ?></h3>
                    <ul class="product-specs">
                        <?php if ( $pitch )     : ?><li><strong><?php esc_html_e( 'Pixel Pitch:', 'zhongming' ); ?></strong> <?php echo is_numeric($pitch) ? esc_html($pitch).'mm' : esc_html($pitch); ?></li><?php endif; ?>
                        <?php if ( $cabinet )   : ?><li><strong><?php esc_html_e( 'Cabinet:', 'zhongming' ); ?></strong> <?php echo esc_html( $cabinet ); ?></li><?php endif; ?>
                        <?php if ( $brightness ): ?><li><strong><?php esc_html_e( 'Brightness:', 'zhongming' ); ?></strong> <?php echo esc_html( $brightness ); ?></li><?php endif; ?>
                    </ul>
                    <div class="product-btns">
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="padding:8px 14px;"><?php esc_html_e( 'View Details', 'zhongming' ); ?></a>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php endif; ?>

<?php get_footer(); ?>
