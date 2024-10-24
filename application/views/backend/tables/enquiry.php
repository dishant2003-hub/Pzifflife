<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_ENQUIRY;
$aColumns = [
    $sTable.'.id',
    $sTable.'.email',
    $sTable.'.phone_no',
    $sTable.'.country',
    $sTable.'.message',
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

foreach ($rResult as $key => $aRow) {

    $id = $aRow['id'];
    $row = [];
    $row[] = $id;
 
   
    $row[] = $aRow['email'];
    $row[] = $aRow['phone_no'];
    $row[] = $aRow['country'];
    $row[] = $aRow['message'];

  
    $delete='<a href="javascript:void(0);" data-id="'.$id.'" data-toggle="tooltip" title="" class="btn btn-sm btn-danger  deleteenquiry" data-original-title="Remove"><i class="bx bx-trash"></i></a>&nbsp';

    $row[]= $delete;       
        

    $output['aaData'][] = $row;
}