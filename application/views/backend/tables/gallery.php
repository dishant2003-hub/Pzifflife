<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_GALLERY;
$aColumns = [
    $sTable.'.id',
    $sTable.'.name',
    $sTable.'.image',
    $sTable.'.is_active',
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

foreach ($rResult as $key => $aRow) {

    $id = $aRow['id'];
    $row = [];
    $row[] = $id;
   
    $row[] = $aRow['name'];
    if(!empty($aRow['image'])){
        $row[] = '<img src="'.base_url(GALLERY.$aRow['image']).'" width="50px" height="50px" alt="">';
    }else{ 
        $row[]='';
    }
   

    $edit= '<a href="'.base_url('backend/gallery/add/'.$id).'" data-toggle="tooltip" title="" class="btn btn-sm btn-primary" data-original-title="Edit">
    <i class="bx bx-edit"></i>
    </a>&nbsp';
    $delete='<a href="javascript:void(0);" gallery-id="'.$id.'" data-toggle="tooltip" title="" class="btn btn-sm btn-danger  deletegallery" data-original-title="Remove"><i class="bx bx-trash"></i></a>&nbsp';
    $row[]= $edit.$delete;       
        

    $options =  $edit;
    $row[] = $options;
    $output['aaData'][] = $row;
}