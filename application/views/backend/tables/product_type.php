<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_PRODUCT_TYPE;
$aColumns = [
    $sTable.'.id',
    $sTable.'.name',
    $sTable.'.slug',
    $sTable.'.image',
    $sTable.'.color',
    // $sTable.'.desc',
    $sTable.'.is_footer',
    $sTable.'.is_active',
    $sTable.'.is_delete',
    $sTable.'.created_time',
];
$sIndexColumn = 'id';
$join = [
];

$where = [];
array_push($where, $sTable.'.is_delete = 0');
$filter = [];
$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where);

$output = $result['output'];
$rResult = $result['rResult'];
$CI = &get_instance();
$output['token'] = $CI->security->get_csrf_hash();

//$output['aaData'] = $result['rResult'];
foreach ($rResult as $key => $aRow) {

    $id = $aRow['id'];
    $row = [];
    $row[] = $id;
   
    $row[] = isset($aRow['name']) ? $aRow['name'] : '';
    $row[] = isset($aRow['slug']) ? $aRow['slug'] : '';
    $row[] = isset($aRow['image']) ? $aRow['image'] : '';
    $row[] = isset($aRow['color']) ? $aRow['color'] : '';

   
    // $checked = (isset($aRow['is_footer']) && $aRow['is_footer'] == 1) ? 'checked' : '';
    // $row[] = '<label class="switch switch-primary" for="customSwitch' . $key . '">
    //             <input type="checkbox" name="is_active" value="' . $id . '" class="switch-input footer_status" id="customSwitch' . $key . '" ' . ($aRow['is_footer'] == 1 ? 'checked' : '') . ' >
    //             <span class="switch-toggle-slider"><span class="switch-on"> <i class="bx bx-check"></i></span><span class="switch-off"> <i class="bx bx-x"></i></span></span>
    //         </label>';

    $edit= '<a href="'.base_url('backend/product_type/add/'.$id).'" data-toggle="tooltip" title="" class="btn btn-sm btn-primary" data-original-title="Edit">
    <i class="bx bx-edit"></i>
    </a>&nbsp';
    $row[]= $edit;       
        

    $options =  $edit;
    $row[] = $options;
    $output['aaData'][] = $row;
}