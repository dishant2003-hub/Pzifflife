<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_CATEGORY;
$aColumns = [
    $sTable.'.id',
    $sTable.'.parent_id',
    // $sTable.'.category',
    $sTable.'.name',
    $sTable.'.desc',
    'cate.name as parent',
    $sTable.'.is_active',

];
$sIndexColumn = 'id';
$join = [
    "LEFT JOIN ".TBL_CATEGORY." cate ON cate.id = ".$sTable.".parent_id AND cate.`is_delete` = 0 AND cate.is_active = 1",
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
   
    // $row[] = isset($aRow['parent']) ? $aRow['parent'] : '';
    $row[] = $aRow['name'];
    // $row[] = isset($aRow['desc']) ? $aRow['desc'] : '';
   
    $checked = (isset($aRow['is_active']) && $aRow['is_active'] == 1) ? 'checked' : '';
    $row[] = '<label class="switch switch-primary" for="customSwitch' . $key . '">
                <input type="checkbox" name="is_active" value="' . $id . '" class="switch-input category_status" id="customSwitch' . $key . '" ' . ($aRow['is_active'] == 1 ? 'checked' : '') . ' >
                <span class="switch-toggle-slider"><span class="switch-on"> <i class="bx bx-check"></i></span><span class="switch-off"> <i class="bx bx-x"></i></span></span>
            </label>';

    $edit= '<a href="'.base_url('backend/category/add/'.$id).'" data-toggle="tooltip" title="" class="btn btn-sm btn-primary" data-original-title="Edit">
    <i class="bx bx-edit"></i>
    </a>&nbsp';
    $delete='<a href="javascript:void(0);" category-id="'.$id.'" data-toggle="tooltip" title="" class="btn btn-sm btn-danger  deletecategory" data-original-title="Remove"><i class="bx bx-trash"></i></a>&nbsp';
    // $uploadimg='<a href="'.base_url('backend/category/desc/'.$id).'" category-id="'.$id.'"   class="btn btn-sm btn-warning  add_cate_desc" ><i class="bx bx-image"></i></a>&nbsp';
    $row[]= $edit.$delete;       
        

    $options =  $edit;
    $row[] = $options;
    $output['aaData'][] = $row;
}