# SiteGround Deployment Checklist
# Zhongming LED Display Website

Complete all items before going live.

---

## Phase A: Local Preparation

- [ ] Run `wp rewrite flush` to ensure clean permalinks
- [ ] Run `wp eval-file setup-menus.php` and verify menus in wp-admin → Appearance → Menus
- [ ] Run `wp eval-file setup-seo.php` to configure RankMath
- [ ] Verify sitemap: `http://zhongming.local/sitemap_index.xml`
- [ ] Test Contact form submission (check fallback HTML form works)
- [ ] Upload all real product images (replace placeholder images)
- [ ] Upload company/factory images for About Us page
- [ ] Review all pages in mobile view (375px width)
- [ ] Check Chrome DevTools Console: no JS errors on any page
- [ ] Export local database: `wp db export zhongming-export.sql`

---

## Phase B: SiteGround Account Setup

- [ ] Log in to SiteGround cPanel
- [ ] Create MySQL database: e.g. `zmled_db`
- [ ] Create MySQL user with all privileges on that database
- [ ] Note down: DB_NAME, DB_USER, DB_PASSWORD, DB_HOST

---

## Phase C: File Upload

- [ ] Package wp-content: `tar -czf zhongming-wp-content.tar.gz wp-content/`
- [ ] Upload `zhongming-wp-content.tar.gz` via SiteGround File Manager to `/public_html/`
- [ ] Extract the archive in File Manager
- [ ] Confirm `wp-content/themes/zhongming-theme/` is present
- [ ] Upload `wp-config-production.php` and rename to `wp-config.php`
- [ ] Fill in real DB credentials in `wp-config.php`
- [ ] Set `WP_DEBUG` to `false` in production `wp-config.php`

---

## Phase D: Database Import

- [ ] In cPanel → phpMyAdmin, select the new database
- [ ] Search-replace URLs in SQL before import:
      Replace `http://zhongming.local` → `https://[PRODUCTION_DOMAIN]`
      Use: `sed -i 's/zhongming.local/[PRODUCTION_DOMAIN]/g' zhongming-export.sql`
- [ ] Import the modified SQL file
- [ ] Verify post count: Products should show all entries

---

## Phase E: WordPress Configuration

- [ ] Visit `https://[PRODUCTION_DOMAIN]/wp-admin/` and log in
- [ ] Settings → General: Update Site URL and Home URL
- [ ] Settings → Permalinks: Set to "Post name" and Save (flushes rewrites)
- [ ] Appearance → Themes: Activate `Zhongming LED Theme` if not active
- [ ] Run WP-CLI menu setup: `wp eval-file wp-content/themes/zhongming-theme/setup-menus.php`
- [ ] Verify navigation menus work in Appearance → Menus
- [ ] Verify product pages load: `https://[PRODUCTION_DOMAIN]/products/`

---

## Phase F: SSL & Security

- [ ] SiteGround cPanel → Security → SSL/TLS: Install Let's Encrypt certificate
- [ ] Enable HTTPS redirect in SiteGround → Security → HTTPS Enforce
- [ ] Verify site loads on `https://` without SSL warnings
- [ ] Activate Wordfence plugin and run initial scan
- [ ] Activate SiteGround Security plugin if available

---

## Phase G: Performance

- [ ] Activate SiteGround Optimizer plugin
- [ ] Enable browser caching in SiteGround Optimizer
- [ ] Enable GZIP compression
- [ ] Enable CDN in SiteGround (if available with your plan)
- [ ] Install and activate WP Super Cache or SG Optimizer cache
- [ ] ShortPixel: Configure and run bulk image optimization
- [ ] Run Google PageSpeed Insights — target score ≥ 70

---

## Phase H: Content Verification

- [ ] Test all 5 main pages: Home / Products / About / Contact / Solutions
- [ ] Open 5 different product detail pages — verify specs display correctly
- [ ] Test sidebar filters on /products/ (pixel pitch and application)
- [ ] Submit Contact form → verify email is received at sales email
- [ ] Verify Chinese language toggle works (if Polylang configured)
- [ ] Check breadcrumbs on product detail pages

---

## Phase I: SEO Setup

- [ ] Submit sitemap to Google Search Console: `https://[PRODUCTION_DOMAIN]/sitemap_index.xml`
- [ ] Verify product pages appear in sitemap
- [ ] Set up Google Analytics (add GA4 tracking code to functions.php or via RankMath)
- [ ] Configure RankMath social OG tags (logo, company name)
- [ ] Submit sitemap to Bing Webmaster Tools

---

## Phase J: Final Live Checks

- [ ] Fill all PLACEHOLDER values (see PLACEHOLDERS.md)
- [ ] Update copyright year in footer if needed
- [ ] Remove `zhongming-export.sql` from public directory
- [ ] Test site on iPhone Safari and Android Chrome
- [ ] Verify 404 error page shows correctly on a bad URL
- [ ] Run final Lighthouse audit: Performance / SEO / Accessibility

---

✅ **Site is ready to go live!**

*Checklist version: 1.0 | Zhongming Technology*
