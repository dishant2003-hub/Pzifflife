<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_CONTACT_US;
$aColumns = [
    $sTable.'.id',
    $sTable.'.name',
    $sTable.'.email',
    $sTable.'.phone',
    $sTable.'.country',
    $sTable.'.message',
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
    $row[] = $aRow['email'];
    $row[] = $aRow['phone'];

    $row[] = $aRow['country'];
    $row[] = $aRow['message'];

    $delete='<a href="javascript:void(0);" id="'.$id.'" data-toggle="tooltip" title="" class="btn btn-sm btn-danger  deletecontact" data-original-title="Remove"><i class="bx bx-trash"></i></a>&nbsp';

    $row[]= $delete;       
        

    $options =  $delete;
    $row[] = $options;
    $output['aaData'][] = $row;
}