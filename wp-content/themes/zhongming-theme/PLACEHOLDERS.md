# Placeholders Reference
# Zhongming LED Display Website

All placeholder values that need to be replaced before or after going live.

---

## 🔑 Critical — Must Replace Before Launch

| Placeholder | Location | Description | Action Required |
|-------------|----------|-------------|-----------------|
| `[PRODUCTION_DOMAIN]` | `wp-config-production.php`, `deploy.sh`, Google Search Console | Final website domain (e.g. `www.zmled.com`) | Replace with real domain during deployment |
| `[SALES_EMAIL]` | Contact Form 7 email settings | Primary sales inquiry email address | Fill in real email in CF7 admin → Contact → Edit Form → Mail tab |
| `[WHATSAPP_NUMBER]` | `page-contact.php` line ~26 | WhatsApp business number with country code | Currently hardcoded as `+86 18318038616` — verify this is correct |
| Real product images | All product posts | 65+ product posts need real product images | Upload high-res product photos via wp-admin → Products → Edit → Featured Image |

---

## 📧 Contact Information

| Placeholder | File | Current Value | Replace With |
|-------------|------|---------------|--------------|
| Sales email (Mr. Zhong) | `page-contact.php` | `571217058@qq.com` | Confirm or update |
| WhatsApp (Mr. Zhong) | `page-contact.php` | `+86 18318038616` | Confirm or update |
| Sales phone (Mr. Zhong) | `page-contact.php` | `+86 133 8030 4454` | Confirm or update |
| Sales (Mr. Zhang) | `page-contact.php` | `+86 181 2610 3513` | Confirm or update |
| Company address | `page-contact.php` | Huafeng Zhenbao Industrial Park, 137 Beihuan Rd | Confirm full address |

---

## 🗺 Maps & Embeds

| Placeholder | Location | Description |
|-------------|----------|-------------|
| Google Maps embed | `page-contact.php` line ~288 | Currently uses free Google Maps embed — may need API key for reliable loading |
| Baidu Maps embed | `map-baidu.html` | Available for Chinese version — ensure Baidu AK key is configured |

---

## 📄 Documents & Media

| Placeholder | Location | Description |
|-------------|----------|-------------|
| `[CATALOG_PDF_URL]` | `page-contact.php` | Product catalog PDF download link — upload PDF to WP Media Library and replace `#` |
| Company logo | `assets/images/logo.png` | Ensure hi-res logo (PNG with transparency) is in place |
| Factory photos | `assets/images/about-factory.jpg` | About Us page main factory image |
| About page sub-images | `assets/images/page2_img5.jpeg`, `page2_img10.jpeg`, `page2_img11.jpeg` | Factory/production photos on About page |

---

## 🖼 Product Images (65 products)

All products currently show either a featured image or placeholder. Upload real images for each:

**Indoor LED Display Series:**
- Standard Indoor P1.25 / P1.5 / P1.8 / P2 / P2.5 / P3 / P4
- COB Series P0.7 / P0.9 / P1.2 / P1.5
- 16:9 Indoor P1.5 / P1.8 / P2 / P2.5 / P3 / P4 / P5

**Outdoor LED Display Series:**
- Standard Outdoor P3.91 / P4 / P5 / P6 / P8 / P10 / P16
- Rental Screen P2.6 / P2.9 / P3.91 / P4.81 / P5.95 / P3.9 / P7.8

**Special & Creative Series:**
- Transparent Screen P3.9 / P7.8 / P10.4 / P15.6 / P25 / P31.25 / P39
- Film Screen P5 / P6 / P7 / P8 / P10 / P12 / P15 / P20
- Floor Tile Screen P3.9 / P4.81 / P6 / P8 / P10
- Flexible LED P2 / P2.5 / P3 / P4 / P5 / P6
- **Poster Screen P1.875 / P2.5** ← Recently updated with die-cast specs

**How to upload product images:**
1. wp-admin → Products → select a product → Edit
2. Set Featured Image (main product photo)
3. In ACF fields: scroll to "Product Gallery" → upload multiple product angles

---

## 🔐 WordPress Security

| Placeholder | File | Action |
|-------------|------|--------|
| `DB_NAME` | `wp-config-production.php` | Enter SiteGround database name |
| `DB_USER` | `wp-config-production.php` | Enter SiteGround database username |
| `DB_PASSWORD` | `wp-config-production.php` | Enter SiteGround database password |
| `DB_HOST` | `wp-config-production.php` | Usually `localhost` on SiteGround |
| `AUTH_KEY`, `SECURE_AUTH_KEY` etc. | `wp-config-production.php` | Generate new keys at https://api.wordpress.org/secret-key/1.1/salt/ |

---

## 📊 Analytics & Tracking

| Service | Status | Action |
|---------|--------|--------|
| Google Analytics (GA4) | ❌ Not set up | Create GA4 property, add Measurement ID to RankMath or functions.php |
| Google Search Console | ❌ Not verified | Add site, submit sitemap after launch |
| Bing Webmaster | ❌ Optional | Submit sitemap to Bing |
| Facebook Pixel | ❌ Optional | Add if running FB/Instagram ads |

---

*Last updated: 2025 | Zhongming Technology LED Display*
