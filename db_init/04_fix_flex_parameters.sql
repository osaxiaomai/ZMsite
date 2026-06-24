-- Fix corrupted parameter text
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, '1≥1000', '11000') WHERE meta_value LIKE '%1≥1000%';
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, '1≥5000', '15000') WHERE meta_value LIKE '%1≥5000%';
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, '-20°°C', '-20°C') WHERE meta_value LIKE '%-20°°C%';
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, '+50°°C', '+50°C') WHERE meta_value LIKE '%+50°°C%';
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, '≤≥800', '≤800') WHERE meta_value LIKE '%≤≥800%';
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, '≤≥220', '≤220') WHERE meta_value LIKE '%≤≥220%';
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, '0-≥800', '0-800') WHERE meta_value LIKE '%0-≥800%';
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, '0-≥5000', '0-5000') WHERE meta_value LIKE '%0-≥5000%';
