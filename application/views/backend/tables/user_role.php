<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_USER_ROLE;
$aColumns = [
    'id',
    $sTable.'.name',
    "IF(".$sTable.".role_type=1,'Backend','Frontend') as role_type_text",
    $sTable.'.created_time',
    $sTable.'.is_active',
    $sTable.'.role_type',
];
$sIndexColumn = 'id';
$join = [];

$where = [];
array_push($where,$sTable.'.is_delete = 0');
array_push($where,'AND '.$sTable.'.id != 1');

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
    $row[] = $aRow['role_type_text'];
    
    $permission_btn = "";
    $user_not_arr = array(2,6,7);
    // if(!in_array($aRow['id'], $user_not_arr)){
    if($aRow['role_type']==1){
        $permission_btn = '<a href="'.base_url('backend/user_role/permission/'.$id).'" class="btn btn-outline-danger btn-sm"><i class="fa fa-lock" aria-hidden="true"></i></a>';
    }
    $row[] = $permission_btn;
    $row[] = format_date($aRow['created_time']);
    
    $id = encrypt_String($id);
    
    $row[] = '<label class="switch switch-primary" for="customSwitch'.$key.'">
                <input type="checkbox" name="is_active" value="'.$id.'" class="switch-input btn_user_role_status" id="customSwitch'.$key.'" '.($aRow['is_active']==1 ? 'checked' : '').' >
                <span class="switch-toggle-slider"><span class="switch-on"> <i class="bx bx-check"></i></span><span class="switch-off"> <i class="bx bx-x"></i></span></span>
            </label>';
   
    $option = '<div class="d-inline-block text-nowrap">';
    if(check_permission('user_role', 'can_edit', $this->user_permission)){ 
        $option .='<a href="'.base_url('backend/user_role/edit/'.$id).'" data-toggle="tooltip" title="" class="btn btn-sm btn-icon" data-original-title="Edit"><i class="bx bx-edit"></i></a>&nbsp'; 
    }
    if(check_permission('user_role', 'can_delete', $this->user_permission)){ 
        $option .='<a href="javascript:void(0);" data-id="'.$id.'" data-toggle="tooltip" title="" class="btn btn-sm btn-icon delete_user_role" data-original-title="Remove"><i class="bx bx-trash"></i></a>';
    }

    $option .= '</div>';
    $row[] = $option;
    $output['aaData'][] = $row;
}