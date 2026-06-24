SET NAMES utf8mb4;

-- Fix P3.91 Rental Screen Titles and IP Rating

-- Update Titles
UPDATE wp_posts SET post_title = '舞台租赁 LED 显示屏 室内 P3.91 — 快速搭建，活动高稳定性', post_name = 'rental-indoor-p3-91-zh' WHERE ID = 783;
UPDATE wp_posts SET post_title = '舞台租赁 LED 显示屏 户外 P3.91 — 全天候户外高亮活动租赁大屏' WHERE ID = 786;

-- Update IP Rating
UPDATE wp_postmeta SET meta_value = 'IP35' WHERE post_id IN (425, 428, 783, 786) AND meta_key = 'ip_rating';
