<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-09-30 09:32:30 --> Query error: Table 'wellonapharma.tblcategory' doesn't exist - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 09:32:56 --> Query error: Table 'wellonapharma.tblcategory' doesn't exist - Invalid query: SELECT *
FROM `tblcategory`
WHERE `parent_id` =0
AND `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
ERROR - 2024-09-30 09:36:51 --> Query error: Unknown column 'parent_id' in 'where clause' - Invalid query: SELECT *
FROM `tblcategory`
WHERE `parent_id` =0
AND `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
ERROR - 2024-09-30 09:46:45 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: SELECT `product_name`, `slug`
FROM `tblproduct`
WHERE `product_type` = '1'
AND `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
ERROR - 2024-09-30 10:26:42 --> Query error: Table 'wellonapharma.tblblog' doesn't exist - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblblog.id, cate.name category, tblblog.title, tblblog.short_desc, tblblog.image, tblblog.is_active, tblblog.is_delete, tblblog.created_time 
    FROM tblblog
    LEFT JOIN tblcategory cate ON cate.slug = tblblog.category  AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblblog.is_delete = 0
    
    
    ORDER BY tblblog.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:32:32 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:32:35 --> Query error: Unknown column 'category' in 'where clause' - Invalid query: SELECT *
FROM `tblcategory`
WHERE `parent_id` =0
AND `category` =0
AND `is_delete` =0
ERROR - 2024-09-30 10:35:08 --> Query error: Unknown column 'category' in 'where clause' - Invalid query: SELECT *
FROM `tblcategory`
WHERE `parent_id` =0
AND `category` =0
AND `is_delete` =0
ERROR - 2024-09-30 10:35:09 --> Query error: Unknown column 'category' in 'where clause' - Invalid query: SELECT *
FROM `tblcategory`
WHERE `parent_id` =0
AND `category` =0
AND `is_delete` =0
ERROR - 2024-09-30 10:35:44 --> Query error: Unknown column 'category' in 'where clause' - Invalid query: SELECT *
FROM `tblcategory`
WHERE `parent_id` =0
AND `category` =0
AND `is_delete` =0
ERROR - 2024-09-30 10:35:47 --> Query error: Unknown column 'category' in 'where clause' - Invalid query: SELECT *
FROM `tblcategory`
WHERE `parent_id` =0
AND `category` =0
AND `is_delete` =0
ERROR - 2024-09-30 10:37:20 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:37:40 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:37:49 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:37:59 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:38:04 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:38:11 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:38:25 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:38:32 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:38:38 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:38:44 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:38:50 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:38:57 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:39:03 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:39:10 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:39:19 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:39:26 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:39:33 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:39:46 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:39:53 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:39:59 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:40:04 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:40:12 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:40:18 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:40:23 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:40:30 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:40:36 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:40:44 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:40:59 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:41:04 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:41:12 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:41:19 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:41:26 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:41:33 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:41:39 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:41:47 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:41:53 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:41:58 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:42:05 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:42:11 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:42:17 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:42:23 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:42:30 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:42:37 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:42:43 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:42:49 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:42:55 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:43:01 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:43:10 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:43:16 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:43:22 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:43:32 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:43:38 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:43:43 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:43:49 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:43:56 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:44:03 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:44:09 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:44:16 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:44:22 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:44:32 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:44:39 --> Query error: Unknown column 'tblcategory.category' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblcategory.id, tblcategory.parent_id, tblcategory.category, tblcategory.name, tblcategory.desc, cate.name as parent, tblcategory.is_active 
    FROM tblcategory
    LEFT JOIN tblcategory cate ON cate.id = tblcategory.parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblcategory.is_delete = 0
    
    
    ORDER BY tblcategory.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 10:47:03 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: SELECT *
FROM `tblproduct`
WHERE `product_type` = '1'
AND `is_active` = 1
AND `is_delete` =0
ERROR - 2024-09-30 10:47:38 --> Query error: Unknown column 'tblblog.image' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblblog.id, cate.name category, tblblog.title, tblblog.short_desc, tblblog.image, tblblog.is_active, tblblog.is_delete, tblblog.created_time 
    FROM tblblog
    LEFT JOIN tblcategory cate ON cate.slug = tblblog.category  AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblblog.is_delete = 0
    
    
    ORDER BY tblblog.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 11:37:00 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: SELECT `product_name`, `slug`
FROM `tblproduct`
WHERE `product_type` = '1'
AND `is_active` = 1
AND `is_delete` =0
AND `is_delete` =0
ERROR - 2024-09-30 11:42:27 --> Severity: error --> Exception: syntax error, unexpected end of file, expecting function (T_FUNCTION) or const (T_CONST) C:\wamp64\www\wellonapharma\application\controllers\backend\Contact.php 19
ERROR - 2024-09-30 11:56:49 --> Severity: error --> Exception: syntax error, unexpected '}' C:\wamp64\www\wellonapharma\application\controllers\Home.php 240
ERROR - 2024-09-30 12:01:28 --> Query error: Unknown column 'countey' in 'field list' - Invalid query: INSERT INTO `tblcontact_us` (`name`, `email`, `phone`, `countey`, `message`, `created_time`) VALUES ('q', 'q', 'q', NULL, 'q', '2024-09-30 12:01:28')
ERROR - 2024-09-30 12:01:56 --> Query error: Unknown column 'countey' in 'field list' - Invalid query: INSERT INTO `tblcontact_us` (`name`, `email`, `phone`, `countey`, `message`, `created_time`) VALUES ('Dishant', 'rohit@mail.com', '7842810405', NULL, 'test', '2024-09-30 12:01:56')
ERROR - 2024-09-30 12:09:20 --> Severity: Warning --> include_once(C:\wamp64\www\wellonapharma\application\views\backend/tables/contact.php): failed to open stream: No such file or directory C:\wamp64\www\wellonapharma\application\core\MY_Controller.php 73
ERROR - 2024-09-30 12:09:20 --> Severity: Warning --> include_once(): Failed opening 'C:\wamp64\www\wellonapharma\application\views\backend/tables/contact.php' for inclusion (include_path='.;C:\php\pear') C:\wamp64\www\wellonapharma\application\core\MY_Controller.php 73
ERROR - 2024-09-30 12:09:20 --> Severity: Notice --> Undefined variable: output C:\wamp64\www\wellonapharma\application\core\MY_Controller.php 74
ERROR - 2024-09-30 12:10:32 --> Severity: Warning --> include_once(C:\wamp64\www\wellonapharma\application\views\backend/tables/contact.php): failed to open stream: No such file or directory C:\wamp64\www\wellonapharma\application\core\MY_Controller.php 73
ERROR - 2024-09-30 12:10:32 --> Severity: Warning --> include_once(): Failed opening 'C:\wamp64\www\wellonapharma\application\views\backend/tables/contact.php' for inclusion (include_path='.;C:\php\pear') C:\wamp64\www\wellonapharma\application\core\MY_Controller.php 73
ERROR - 2024-09-30 12:10:32 --> Severity: Notice --> Undefined variable: output C:\wamp64\www\wellonapharma\application\core\MY_Controller.php 74
ERROR - 2024-09-30 12:10:54 --> Severity: Warning --> include_once(C:\wamp64\www\wellonapharma\application\views\backend/tables/contact.php): failed to open stream: No such file or directory C:\wamp64\www\wellonapharma\application\core\MY_Controller.php 73
ERROR - 2024-09-30 12:10:54 --> Severity: Warning --> include_once(): Failed opening 'C:\wamp64\www\wellonapharma\application\views\backend/tables/contact.php' for inclusion (include_path='.;C:\php\pear') C:\wamp64\www\wellonapharma\application\core\MY_Controller.php 73
ERROR - 2024-09-30 12:10:54 --> Severity: Notice --> Undefined variable: output C:\wamp64\www\wellonapharma\application\core\MY_Controller.php 74
ERROR - 2024-09-30 12:12:34 --> Query error: Unknown column 'tblblog.image' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblblog.id, cate.name category, tblblog.title, tblblog.short_desc, tblblog.image, tblblog.is_active, tblblog.is_delete, tblblog.created_time 
    FROM tblblog
    LEFT JOIN tblcategory cate ON cate.slug = tblblog.category  AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblblog.is_delete = 0
    
    
    ORDER BY tblblog.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 12:17:45 --> Query error: Table 'wellonapharma.tblproduct' doesn't exist - Invalid query: SELECT *
FROM `tblproduct`
WHERE `product_type` = '1'
AND `is_active` = 1
AND `is_delete` =0
ERROR - 2024-09-30 14:01:17 --> Query error: Unknown column 'tblblog.image' in 'field list' - Invalid query: 
    SELECT SQL_CALC_FOUND_ROWS tblblog.id, cate.name category, tblblog.title, tblblog.short_desc, tblblog.image, tblblog.is_active, tblblog.is_delete, tblblog.created_time 
    FROM tblblog
    LEFT JOIN tblcategory cate ON cate.slug = tblblog.category  AND cate.`is_delete` = 0 AND cate.is_active = 1
     WHERE 
    
    
    tblblog.is_delete = 0
    
    
    ORDER BY tblblog.id ASC
    LIMIT 0, 100
    
ERROR - 2024-09-30 14:04:24 --> Query error: Unknown column 'slug' in 'where clause' - Invalid query: SELECT *
FROM `tblblog`
WHERE `slug` = 'bortenat-injection-manufacturers-suppliers-in-india'
AND `is_delete` =0
ERROR - 2024-09-30 14:05:18 --> Query error: Unknown column 'slug' in 'where clause' - Invalid query: SELECT *
FROM `tblblog`
WHERE `slug` = 'bortenat-injection-manufacturers-suppliers-in-india'
AND `is_delete` =0
ERROR - 2024-09-30 14:07:26 --> Query error: Unknown column 'image' in 'field list' - Invalid query: INSERT INTO `tblblog` (`category`, `title`, `short_desc`, `type`, `desc`, `meta_title`, `meta_keyword`, `meta_desc`, `og_title`, `og_desc`, `created_time`, `image`, `slug`) VALUES ('anaesthetic', 'Bortenat Injection Manufacturers / Suppliers in India', 'In the ever-evolving pharmaceutical landscape, the demand for effective and high-quality medications is paramount. Bortenat Injection, a crucial drug used in treating multiple myeloma and other conditions, is among those essential medicines. For healthcare providers and pharmaceutical companies in India, finding reliable Bortenat Injection manufacturers and suppliers is vital.', '0', '<p><strong>What is Bortenat Injection?</strong></p>\r\n\r\n<p><a href=\"https://wellonapharma.com/product/finished/bortenat\">Bortenat Injection</a>&nbsp;is a brand of Bortezomib, a proteasome inhibitor used in the treatment of multiple myeloma and certain types of lymphoma. By targeting and disrupting the proteasome, Bortezomib helps in controlling cancer cell growth and survival. This medication is crucial for improving patient outcomes in oncology treatments.</p>\r\n\r\n<p><strong>Why Choose Wellona Pharma?</strong></p>\r\n\r\n<p>At Wellona Pharma, we are committed to providing top-tier pharmaceutical solutions, including Bortenat Injection. Our state-of-the-art manufacturing facilities adhere to stringent quality standards, ensuring that our products meet international guidelines. Here&rsquo;s why Wellona Pharma stands out:</p>\r\n\r\n<ol>\r\n	<li><strong>Quality Assurance:</strong>&nbsp;Our Bortenat Injection is manufactured under strict quality control measures, ensuring purity, efficacy, and safety.</li>\r\n	<li><strong>Regulatory Compliance:</strong>&nbsp;We comply with all necessary regulatory standards and certifications to provide reliable and compliant pharmaceutical products.</li>\r\n	<li><strong>Expert Team:</strong>&nbsp;Our team of experts ensures that the production processes are continually optimized for the best results.</li>\r\n</ol>\r\n\r\n<p><strong>Finding Reliable Suppliers</strong></p>\r\n\r\n<p>When searching for Bortenat Injection suppliers in India, it&rsquo;s crucial to partner with companies that have a proven track record of reliability and quality. Wellona Pharma not only manufactures Bortenat Injection but also offers it through a network of trusted distributors and partners.</p>\r\n\r\n<p><strong>Why Wellona Pharma for Bortenat Injection?</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Reputation:</strong>&nbsp;We are known for our commitment to quality and excellence in the pharmaceutical industry.</li>\r\n	<li><strong>Customer Support:</strong>&nbsp;Our dedicated support team is always ready to assist with your queries and requirements.</li>\r\n	<li><strong>Competitive Pricing:</strong>&nbsp;We offer competitive pricing without compromising on quality, making our products accessible to a wider range of customers.</li>\r\n</ul>\r\n\r\n<p><strong>Contact Us</strong></p>\r\n\r\n<p>For more information on Bortenat Injection and to explore our range of pharmaceutical products, visit&nbsp;<a href=\"https://wellonapharma.com/contact-us\">Wellona&nbsp;</a><a href=\"https://wellonapharma.com/\">Pharma</a>&nbsp;or contact us directly. Our team is here to provide the best solutions tailored to your needs.</p>\r\n', '', '', 'In the ever-evolving pharmaceutical landscape, the demand for effective and high-quality medications is paramount. Bortenat Injection, a crucial drug used in treating multiple myeloma and other conditions, is among those essential medicines. For healthcare providers and pharmaceutical companies in India, finding reliable Bortenat Injection manufacturers and suppliers is vital.', '', 'In the ever-evolving pharmaceutical landscape, the demand for effective and high-quality medications is paramount. Bortenat Injection, a crucial drug used in treating multiple myeloma and other conditions, is among those essential medicines. For healthcare providers and pharmaceutical companies in India, finding reliable Bortenat Injection manufacturers and suppliers is vital.', '2024-09-30 14:07:26', 'blog1727685446.jpg', 'bortenat-injection-manufacturers-suppliers-in-india')
ERROR - 2024-09-30 14:08:16 --> Severity: Warning --> Use of undefined constant TBL_BLOG_IMG - assumed 'TBL_BLOG_IMG' (this will throw an Error in a future version of PHP) C:\wamp64\www\wellonapharma\application\controllers\backend\Blog.php 34
ERROR - 2024-09-30 14:08:16 --> Query error: Table 'wellonapharma.tbl_blog_img' doesn't exist - Invalid query: SELECT `file`
FROM `TBL_BLOG_IMG`
WHERE `blog_id` = '1'
AND `is_delete` =0
ERROR - 2024-09-30 14:30:41 --> Severity: Warning --> trim() expects parameter 1 to be string, array given C:\wamp64\www\wellonapharma\system\database\DB_query_builder.php 1198
