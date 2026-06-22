# Zhongming LED Display — WordPress Theme

**Professional LED Display Manufacturer Website**  
Built with a custom WordPress theme: `zhongming-theme`

---

## 📁 Directory Structure

```
wp-content/themes/zhongming-theme/
├── style.css                  # Theme declaration + global CSS
├── functions.php              # Theme setup, CPT, ACF, performance hooks
├── front-page.php             # Homepage template (with hero slider)
├── header.php                 # Site header, mega-menu navigation
├── footer.php                 # Site footer (4-column layout)
├── 404.php                    # Friendly 404 error page
├── index.php                  # Fallback template
├── single.php                 # Standard single post fallback
├── archive.php                # Archive fallback
├── page.php                   # Page fallback
│
├── template-parts/
│   ├── header.php             # Header partial
│   ├── footer.php             # Footer partial
│   ├── nav-mega-menu.php      # Mega menu products dropdown
│   ├── topbar.php             # Top announcement bar
│   └── cta-banner.php        # CTA call-to-action section
│
├── templates/
│   ├── front-page-zh.php      # Homepage (Chinese)
│   ├── page-about.php         # About Us page
│   ├── page-about-zh.php      # About Us (Chinese)
│   ├── page-contact.php       # Contact / Quote page
│   ├── page-contact-zh.php    # Contact (Chinese)
│   ├── page-solutions.php     # Solutions page
│   ├── page-solutions-zh.php  # Solutions (Chinese)
│   ├── page-eventandnews.php  # Events & News page
│   ├── archive-product.php    # Product listing with sidebar filters
│   └── single-product.php     # Product detail (tabs, gallery, specs)
│
├── assets/
│   ├── css/
│   │   ├── main.css           # CSS variables design system + base reset
│   │   ├── components.css     # UI components (cards, hero, badges)
│   │   └── responsive.css     # Mobile/tablet responsive breakpoints
│   ├── js/
│   │   ├── main.js            # Global JS utilities
│   │   └── mega-menu.js       # Mega menu interaction logic
│   └── images/                # Theme images (banners, logos, icons)
│
├── acf-json/                  # ACF field group JSON (auto-synced)
│
├── setup-menus.php            # WP-CLI: Create & assign nav menus
└── setup-seo.php              # WP-CLI: Configure RankMath SEO settings
```

---

## 🔌 Plugin Dependencies

| Plugin | Purpose | Required? |
|--------|---------|-----------|
| Advanced Custom Fields PRO | Product spec fields | ✅ Required |
| Contact Form 7 | Inquiry form on contact page | ✅ Required |
| Rank Math SEO | SEO meta + product schema | Recommended |
| Polylang | English/Chinese bilingual | Optional |
| WP Super Cache | Page caching | Recommended |
| ShortPixel | Image optimization | Recommended |
| Wordfence | Security firewall | Recommended |

---

## 🖥 Local Development Setup

### Prerequisites
- [Local by Flywheel](https://localwp.com/) — PHP 8.2, MySQL 8.0, WordPress latest
- WP-CLI available in Local shell

### Starting the Site
1. Open **Local** app → Start `zhongming` site
2. Visit: `http://zhongming.local/`
3. Admin: `http://zhongming.local/wp-admin/`

### Running WP-CLI Scripts
```bash
# From Local shell or SSH
cd /app/public

# Set up navigation menus
wp eval-file wp-content/themes/zhongming-theme/setup-menus.php

# Configure RankMath SEO
wp eval-file wp-content/themes/zhongming-theme/setup-seo.php

# Flush permalinks
wp rewrite flush
```

---

## 🚀 SiteGround Deployment Steps

See [`DEPLOY_CHECKLIST.md`](./DEPLOY_CHECKLIST.md) for the complete checklist.

### Quick Overview
1. Export local DB: `wp db export zhongming-local.sql`
2. Search-replace URLs: `wp search-replace 'http://zhongming.local' 'https://[PRODUCTION_DOMAIN]'`
3. Package theme: `tar -czf zhongming-wp-content.tar.gz wp-content/`
4. Upload to SiteGround via File Manager, extract
5. Import SQL via phpMyAdmin
6. Update `wp-config.php` with production DB credentials
7. Activate SSL via Let's Encrypt

---

## 📝 Placeholder Information to Fill In

See [`PLACEHOLDERS.md`](./PLACEHOLDERS.md) for the complete list.

**Critical placeholders:**
- `[PRODUCTION_DOMAIN]` — Final website domain
- `[SALES_EMAIL]` — Primary sales email
- Product images — Upload real product photos to replace placeholders

---

## 🔑 Key URLs

| Page | URL |
|------|-----|
| Homepage | `/` |
| All Products | `/products/` |
| Indoor LED | `/product-category/indoor-led-display/` |
| COB Series | `/product-category/cob-series/` |
| Outdoor LED | `/product-category/outdoor-led-display/` |
| Rental Screen | `/product-category/rental-screen/` |
| About Us | `/about/` |
| Contact | `/contact/` |
| Sitemap | `/sitemap_index.xml` |

---

*Theme Version: v2.0 | Built: 2025 | Zhongming Technology LED Display*
