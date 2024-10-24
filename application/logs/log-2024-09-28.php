<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-09-28 09:33:13 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'quiz_web' C:\wamp64\www\wellonapharma\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2024-09-28 09:33:13 --> Unable to connect to the database
ERROR - 2024-09-28 09:43:32 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'quiz_web' C:\wamp64\www\wellonapharma\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2024-09-28 09:43:32 --> Unable to connect to the database
ERROR - 2024-09-28 09:43:35 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'quiz_web' C:\wamp64\www\wellonapharma\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2024-09-28 09:43:35 --> Unable to connect to the database
ERROR - 2024-09-28 09:43:50 --> Query error: Table 'wellonapharma.tblproduct_type' doesn't exist - Invalid query: SELECT *
FROM `tblproduct_type`
WHERE `is_footer` =0
AND `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
ERROR - 2024-09-28 09:50:10 --> Query error: Unknown column 'is_footer' in 'where clause' - Invalid query: SELECT *
FROM `tblproduct_type`
WHERE `is_footer` =0
AND `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
ERROR - 2024-09-28 09:51:29 --> Query error: Table 'wellonapharma.tblgallery' doesn't exist - Invalid query: SELECT *
FROM `tblgallery`
WHERE `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
ERROR - 2024-09-28 09:51:32 --> Query error: Table 'wellonapharma.tblcategory' doesn't exist - Invalid query: SELECT *
FROM `tblcategory`
WHERE `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
ERROR - 2024-09-28 09:52:16 --> Query error: Table 'wellonapharma.tblcategory' doesn't exist - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-28 09:52:26 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblproduct.id, tblproduct.product_name, cate.name as main_cate, subcate.name as sub_cate, tblproduct.is_active, tblproduct.is_delete, tblproduct.created_time, subcate.color, imgs.file 
    FROM tblproduct
    LEFT JOIN tblcategory cate ON cate.id = tblproduct.category AND cate.`is_delete` = 0 AND cate.is_active = 1 LEFT JOIN tblproduct_type subcate ON subcate.id = tblproduct.product_type AND subcate.`is_delete` = 0 AND subcate.is_active = 1 LEFT JOIN tblproduct_img imgs ON imgs.product_id = tblproduct.id AND imgs.`is_delete` = 0 AND imgs.is_active = 1
     WHERE 
    
    
    tblproduct.is_delete = 0
     GROUP BY tblproduct. id 
    
    ORDER BY tblproduct.id DESC
    LIMIT 0, 100
    
ERROR - 2024-09-28 09:52:41 --> Query error: Table 'wellonapharma.tblblog' doesn't exist - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblblog.id, cate.name category, tblblog.title, tblblog.short_desc, tblblog.image, tblblog.is_active, tblblog.is_delete, tblblog.created_time 
    FROM tblblog
    LEFT JOIN tblcategory cate ON cate.slug = tblblog.category  AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblblog.is_delete = 0
    
    
    ORDER BY tblblog.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-28 09:53:07 --> Query error: Table 'wellonapharma.tblblog' doesn't exist - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblblog.id, cate.name category, tblblog.title, tblblog.short_desc, tblblog.image, tblblog.is_active, tblblog.is_delete, tblblog.created_time 
    FROM tblblog
    LEFT JOIN tblcategory cate ON cate.slug = tblblog.category  AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblblog.is_delete = 0
    
    
    ORDER BY tblblog.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-28 09:57:27 --> Query error: Unknown column 'mobile' in 'field list' - Invalid query: UPDATE `tblsetting` SET `site_name` = 'Surveys', `phone` = '+32 1234567890', `mobile` = '7227063294', `fax` = '7485555110', `email` = 'info@surveys.be', `linkedin_link` = 'https://www.linkedin.com/', `fb_link` = 'https://facebook.com', `twitter_link` = 'https://twitter.com', `youtube_link` = 'https://facebook.com', `instagram_link` = 'https://www.instagram.com', `google_link` = ''
WHERE `setting_id` = '1'
ERROR - 2024-09-28 09:58:25 --> Query error: Unknown column 'fax' in 'field list' - Invalid query: UPDATE `tblsetting` SET `site_name` = 'Surveys', `phone` = '+32 1234567890', `mobile` = '7227063294', `fax` = '7485555110', `email` = 'info@surveys.be', `linkedin_link` = 'https://www.linkedin.com/', `fb_link` = 'https://facebook.com', `twitter_link` = 'https://twitter.com', `youtube_link` = 'https://facebook.com', `instagram_link` = 'https://www.instagram.com', `google_link` = ''
WHERE `setting_id` = '1'
ERROR - 2024-09-28 09:59:07 --> Query error: Unknown column 'google_link' in 'field list' - Invalid query: UPDATE `tblsetting` SET `site_name` = 'Surveys', `phone` = '+32 1234567890', `mobile` = '7227063294', `fax` = '7485555110', `email` = 'info@surveys.be', `linkedin_link` = 'https://www.linkedin.com/', `fb_link` = 'https://facebook.com', `twitter_link` = 'https://twitter.com', `youtube_link` = 'https://facebook.com', `instagram_link` = 'https://www.instagram.com', `google_link` = ''
WHERE `setting_id` = '1'
ERROR - 2024-09-28 10:10:00 --> Query error: Table 'wellonapharma.tblcategory' doesn't exist - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-28 10:10:29 --> Query error: Table 'wellonapharma.tblcategory' doesn't exist - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-28 10:14:34 --> Query error: Table 'wellonapharma.tblcategory' doesn't exist - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-28 10:18:17 --> Query error: Table 'wellonapharma.tblcategory' doesn't exist - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-28 10:18:38 --> Query error: Table 'wellonapharma.tblcategory' doesn't exist - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-28 10:44:09 --> Query error: Table 'wellonapharma.tblcategory' doesn't exist - Invalid query: SELECT *
FROM `tblcategory`
WHERE `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
ERROR - 2024-09-28 10:58:05 --> Query error: Table 'wellonapharma.tblgallery' doesn't exist - Invalid query: SELECT *
FROM `tblgallery`
WHERE `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
ERROR - 2024-09-28 10:58:21 --> Query error: Table 'wellonapharma.tblgallery' doesn't exist - Invalid query: SELECT *
FROM `tblgallery`
WHERE `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
