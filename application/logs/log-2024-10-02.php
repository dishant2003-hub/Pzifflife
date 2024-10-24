<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-10-02 10:27:59 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: SELECT *
FROM `tblproduct`
WHERE `product_type` = '1'
AND `is_active` = 1
AND `is_delete` =0
ERROR - 2024-10-02 10:27:59 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: SELECT *
FROM `tblproduct`
WHERE `product_type` = '1'
AND `is_active` = 1
AND `is_delete` =0
ERROR - 2024-10-02 10:28:18 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: SELECT *
FROM `tblproduct`
WHERE `product_type` = '1'
AND `is_active` = 1
AND `is_delete` =0
ERROR - 2024-10-02 10:28:22 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: SELECT *
FROM `tblproduct`
WHERE `product_type` = '1'
AND `is_active` = 1
AND `is_delete` =0
ERROR - 2024-10-02 10:28:24 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: SELECT *
FROM `tblproduct`
WHERE `product_type` = '1'
AND `is_active` = 1
AND `is_delete` =0
ERROR - 2024-10-02 10:55:50 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: SELECT `product_name`, `slug`
FROM `tblproduct`
WHERE `product_type` = '1'
AND `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
ERROR - 2024-10-02 11:00:37 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblproduct.id, tblproduct.product_name, cate.name as main_cate, subcate.name as sub_cate, tblproduct.is_active, tblproduct.is_delete, tblproduct.created_time, subcate.color, imgs.file 
    FROM tblproduct
    LEFT JOIN tblcategory cate ON cate.id = tblproduct.category AND cate.`is_delete` = 0 AND cate.is_active = 1 LEFT JOIN tblproduct_type subcate ON subcate.id = tblproduct.product_type AND subcate.`is_delete` = 0 AND subcate.is_active = 1 LEFT JOIN tblproduct_img imgs ON imgs.product_id = tblproduct.id AND imgs.`is_delete` = 0 AND imgs.is_active = 1
     WHERE 
    
    
    tblproduct.is_delete = 0
     GROUP BY tblproduct. id 
    
    ORDER BY tblproduct.id DESC
    LIMIT 0, 100
    
