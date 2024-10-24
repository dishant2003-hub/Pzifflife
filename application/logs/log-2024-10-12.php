<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-10-12 09:59:36 --> Query error: Table 'wellonapharma.tblgallery' doesn't exist - Invalid query: SELECT *
FROM `tblgallery`
WHERE `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
ERROR - 2024-10-12 09:59:54 --> Query error: Table 'wellonapharma.tblgallery' doesn't exist - Invalid query: SELECT *
FROM `tblgallery`
WHERE `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
ERROR - 2024-10-12 10:05:49 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: SELECT *
FROM `tblproduct`
WHERE `product_type` = '1'
AND `is_active` = 1
AND `is_delete` =0
ERROR - 2024-10-12 10:05:53 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: SELECT *
FROM `tblproduct`
WHERE `product_type` = '1'
AND `is_active` = 1
AND `is_delete` =0
ERROR - 2024-10-12 10:06:06 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblproduct.id, tblproduct.product_name, cate.name as main_cate, subcate.name as sub_cate, tblproduct.is_active, tblproduct.is_delete, tblproduct.created_time, subcate.color, imgs.file 
    FROM tblproduct
    LEFT JOIN tblcategory cate ON cate.id = tblproduct.category AND cate.`is_delete` = 0 AND cate.is_active = 1 LEFT JOIN tblproduct_type subcate ON subcate.id = tblproduct.product_type AND subcate.`is_delete` = 0 AND subcate.is_active = 1 LEFT JOIN tblproduct_img imgs ON imgs.product_id = tblproduct.id AND imgs.`is_delete` = 0 AND imgs.is_active = 1
     WHERE 
    
    
    tblproduct.is_delete = 0
     GROUP BY tblproduct. id 
    
    ORDER BY tblproduct.id DESC
    LIMIT 0, 100
    
ERROR - 2024-10-12 10:06:16 --> Query error: Unknown column 'category' in 'where clause' - Invalid query: SELECT *
FROM `tblcategory`
WHERE `parent_id` =0
AND `category` =0
AND `is_delete` =0
ERROR - 2024-10-12 10:06:32 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblproduct.id, tblproduct.product_name, cate.name as main_cate, subcate.name as sub_cate, tblproduct.is_active, tblproduct.is_delete, tblproduct.created_time, subcate.color, imgs.file 
    FROM tblproduct
    LEFT JOIN tblcategory cate ON cate.id = tblproduct.category AND cate.`is_delete` = 0 AND cate.is_active = 1 LEFT JOIN tblproduct_type subcate ON subcate.id = tblproduct.product_type AND subcate.`is_delete` = 0 AND subcate.is_active = 1 LEFT JOIN tblproduct_img imgs ON imgs.product_id = tblproduct.id AND imgs.`is_delete` = 0 AND imgs.is_active = 1
     WHERE 
    
    
    tblproduct.is_delete = 0
     GROUP BY tblproduct. id 
    
    ORDER BY tblproduct.id DESC
    LIMIT 0, 100
    
ERROR - 2024-10-12 10:06:44 --> Query error: Unknown column 'category' in 'where clause' - Invalid query: SELECT *
FROM `tblcategory`
WHERE `parent_id` =0
AND `category` =0
AND `is_delete` =0
ERROR - 2024-10-12 10:14:35 --> Query error: Unknown column 'category' in 'where clause' - Invalid query: SELECT *
FROM `tblcategory`
WHERE `parent_id` =0
AND `category` =0
AND `is_delete` =0
ERROR - 2024-10-12 10:25:30 --> Query error: Unknown column 'slug' in 'field list' - Invalid query: SELECT `product_name`, `slug`
FROM `tblproduct`
WHERE `product_type` = '3'
AND `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
ERROR - 2024-10-12 10:30:47 --> Query error: Unknown column 'category' in 'where clause' - Invalid query: SELECT *
FROM `tblcategory`
WHERE `parent_id` =0
AND `category` =0
AND `is_delete` =0
ERROR - 2024-10-12 10:39:23 --> Severity: Warning --> include_once(C:\wamp64\www\wellonapharma\application\views\backend/tables/contact.php): failed to open stream: No such file or directory C:\wamp64\www\wellonapharma\application\core\MY_Controller.php 73
ERROR - 2024-10-12 10:39:23 --> Severity: Warning --> include_once(): Failed opening 'C:\wamp64\www\wellonapharma\application\views\backend/tables/contact.php' for inclusion (include_path='.;C:\php\pear') C:\wamp64\www\wellonapharma\application\core\MY_Controller.php 73
ERROR - 2024-10-12 10:39:23 --> Severity: Notice --> Undefined variable: output C:\wamp64\www\wellonapharma\application\core\MY_Controller.php 74
