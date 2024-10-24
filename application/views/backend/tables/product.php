<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_PRODUCT;
$aColumns = [
    $sTable.'.id',
    $sTable.'.product_name',
    'cate.name as main_cate',
    'subcate.name as sub_cate',
    $sTable.'.is_active',
    $sTable.'.is_delete',
    $sTable.'.created_time',
    'subcate.color',
    'imgs.file'
];
$sIndexColumn = 'id';
$join = [
    "LEFT JOIN ".TBL_CATEGORY." cate ON cate.id = ".$sTable.".category AND cate.`is_delete` = 0 AND cate.is_active = 1",
    "LEFT JOIN ".TBL_PRODUCT_TYPE." subcate ON subcate.id = ".$sTable.".product_type AND subcate.`is_delete` = 0 AND subcate.is_active = 1",
    "LEFT JOIN ".TBL_PRODUCT_IMG." imgs ON imgs.product_id = ".$sTable.".id AND imgs.`is_delete` = 0 AND imgs.is_active = 1",
];

$where = [];
array_push($where, $sTable.'.is_delete = 0');
$filter = [];
$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where, [], ' GROUP BY '.$sTable.'. id ');

$output = $result['output'];
$rResult = $result['rResult'];
$CI = &get_instance();
$output['token'] = $CI->security->get_csrf_hash();

//$output['aaData'] = $result['rResult'];
foreach ($rResult as $key => $aRow) {

    $id = $aRow['id'];
    $row = [];
    $row[] = $id;
   
    $row[] = isset($aRow['product_name']) ? $aRow['product_name'] : '';

    $color = !empty($aRow['color']) ? $aRow['color'] : '';
    if(!empty($color)){
        $row[] = '<span class="badge '.$color.'" >'.$aRow['sub_cate'].'</span>';
    }else{
        $row[] = $aRow['sub_cate'];
    }
    
    $row[] = $aRow['main_cate'];

    // $row[] = isset($aRow['created_time']) ? date("d-m-Y", strtotime($aRow['created_time'])) : '';

   
    $checked = (isset($aRow['is_active']) && $aRow['is_active'] == 1) ? 'checked' : '';
    $row[] = '<label class="switch switch-primary" for="customSwitch' . $key . '">
                <input type="checkbox" name="is_active" value="' . $id . '" class="switch-input product_status" id="customSwitch' . $key . '" ' . ($aRow['is_active'] == 1 ? 'checked' : '') . ' >
                <span class="switch-toggle-slider"><span class="switch-on"> <i class="bx bx-check"></i></span><span class="switch-off"> <i class="bx bx-x"></i></span></span>
            </label>';

    $edit= '<a href="'.base_url('backend/product/add/'.$id).'" data-toggle="tooltip" title="" class="btn btn-sm btn-primary" data-original-title="Edit">
    <i class="bx bx-edit"></i>
    </a>&nbsp';
    
    $file = isset($aRow['file'])?$aRow['file']:'';
    $cls = "warning";
    if(!empty($file)){
        $cls = "success";
    }
    $uploadimg='<a href="javascript:void(0);" user-id="'.$id.'"  data-bs-toggle="modal" data-bs-target="#modalCenter" class="btn btn-sm btn-'.$cls.'  upload_product_image" ><i class="bx bx-image"></i></a>&nbsp';

    $delete='<a href="javascript:void(0);" category-id="'.$id.'" data-toggle="tooltip" title="" class="btn btn-sm btn-danger  deleteproduct" data-original-title="Remove"><i class="bx bx-trash"></i></a>&nbsp';
    $row[]= '<div class="text-nowrap">'. $uploadimg.$edit.$delete .'</div>';       
        

    $options =  $edit;
    $row[] = $options;
    $output['aaData'][] = $row;
}