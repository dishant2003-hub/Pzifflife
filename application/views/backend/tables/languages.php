<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_LANGUAGE;
$aColumns = [
    'id',
    $sTable.'.title',
    $sTable.'.key',
    $sTable.'.is_active',
];
$sIndexColumn = 'id';
$join = [];
$where = [];
array_push($where,$sTable.'.is_delete = 0');

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
    $row[] = $aRow['title'];
    $row[] = $aRow['key'];
    $checked = (isset($aRow['is_active']) && $aRow['is_active']==1) ? 'checked':'';
    $disabled = (isset($aRow['key']) && $aRow['key']=='en') ? "disabled":"";
    $row[] = '<label class="switch switch-primary" for="customSwitch'.$key.'">
                <input type="checkbox" name="is_active" value="'.$id.'" class="switch-input btn_language_status '.$disabled.'" '.$disabled.' id="customSwitch'.$key.'" '.($aRow['is_active']==1 ? 'checked' : '').' >
                <span class="switch-toggle-slider"><span class="switch-on"> <i class="bx bx-check"></i></span><span class="switch-off"> <i class="bx bx-x"></i></span></span>
             </label>';
    $option = '<a href="'.base_url('backend/languages/edit/'.$id).'" data-toggle="tooltip" title="" class="btn btn-sm btn-dark '.$disabled.'" '.$disabled.' data-original-title="Edit"><i class="bx bx-edit"></i></a>&nbsp
    <a href="javascript:void(0);" data-id="'.$id.'" data-toggle="tooltip" title="" class="btn btn-sm btn-danger delete_language '.$disabled.'" '.$disabled.' data-original-title="Remove"><i class="bx bx-trash"></i></a>&nbsp';
    $row[] = $option;
    $output['aaData'][] = $row;
}