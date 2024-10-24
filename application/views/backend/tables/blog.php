<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_BLOG;
$aColumns = [
    $sTable.'.id',
    'cate.name category',
    $sTable.'.title',
    $sTable.'.short_desc',
    $sTable.'.image',
    $sTable.'.is_active',
    $sTable.'.is_delete',
    $sTable.'.created_time',
];
$sIndexColumn = 'id';
$join = [
    "LEFT JOIN ".TBL_CATEGORY." cate ON cate.slug = ".$sTable.".category  AND cate.`is_delete` = 0 AND cate.is_active = 1",
];

$where = [];
array_push($where, $sTable.'.is_delete = 0');

$filter = [];
$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where);

$output = $result['output'];
$rResult = $result['rResult'];
$CI = &get_instance();
$output['token'] = $CI->security->get_csrf_hash();

foreach ($rResult as $key => $aRow) {

    $id = $aRow['id'];
    $row = [];
    $row[] = $id;
 
   
    $row[] = $aRow['category'];
    $row[] = $aRow['title'];
    $row[] = $aRow['short_desc'];
    if(!empty($aRow['image'])){
        $row[] = '<img src="'.base_url(BLOG.$aRow['image']).'" width="50px" height="50px" alt="">';
    }else{ 
        $row[]='';
    }
     
    $row[] = !empty($aRow['created_time']) ? date("d-m-Y",strtotime($aRow['created_time'])) : '';
  
    $row[] = '<label class="switch switch-primary">
                <input type="checkbox" class="switch-input" checked="">
                <span class="switch-toggle-slider">
                        <span class="switch-on"> <i class="bx bx-check"></i>   </span>
                        <span class="switch-off"> <i class="bx bx-x"></i></span>
                </span>
             </label>';
    $edit= '<a href="'.base_url('backend/blog/add/'.$id).'" data-toggle="tooltip" title="" class="btn btn-sm btn-primary" data-original-title="Edit">
            <i class="bx bx-edit"></i>
            </a>&nbsp';

    $delete='<a href="javascript:void(0);" blog-id="'.$id.'" data-toggle="tooltip" title="" class="btn btn-sm btn-danger  deleteblog" data-original-title="Remove"><i class="bx bx-trash"></i></a>&nbsp';

    $row[]= $edit.$delete;       
        

    $options =  $edit;
    $row[] = $options;
    $output['aaData'][] = $row;
}