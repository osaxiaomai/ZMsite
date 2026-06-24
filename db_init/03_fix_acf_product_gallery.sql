-- Fix residual ACF product_gallery field containing old wrong image IDs

-- For Flexible LED Module (IDs 450-455, 808-813)
UPDATE wp_postmeta 
SET meta_value = 'a:2:{i:0;i:706;i:1;i:707;}' 
WHERE post_id IN (450,451,452,453,454,455,808,809,810,811,812,813) 
AND meta_key = 'product_gallery';

-- Clean up any other potential stray references in _product_image_gallery just in case
UPDATE wp_postmeta 
SET meta_value = '706,707' 
WHERE post_id IN (450,451,452,453,454,455,808,809,810,811,812,813) 
AND meta_key = '_product_image_gallery';
