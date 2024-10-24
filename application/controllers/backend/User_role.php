<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_role extends MY_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
    }

    public function index() {
        if(!check_permission('user_role', 'can_view', $this->user_permission)){
            redirect(base_url().'backend/access_denied');
        }
        $data['title'] = "User Role";
        $data['menu'] = "User Role";
        $data['view'] = 'backend/user_role/page_list';
        $this->renderAdmin($data);
    }

    public function getAjaxListData(){
        $this->get_table_data('user_role', []); //table name
    }
    
    public function add($id="")
    {
        $id=decrypt_String($id);
        $data['title'] = "Add Role";
        $data['menu'] = "Add Role";
        if($id!=""){
            $data['title'] = "Edit Role";
            $data['menu'] = "edit Role";
            $rowData = $this->Service->get_row(TBL_USER_ROLE, '*', array('id' =>$id));
            $data['rowData'] = $rowData;
        }

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run() != FALSE) {
                $saveData = array(
                    'name' => $this->input->post('name'),
                    'role_type' => (isset($_POST['role_type']))? $this->input->post('role_type'):0,
                    'updated_time' => date("Y-m-d H:i:s"),
                );
                if($id!=""){
                    $this->Service->update_row(TBL_USER_ROLE, $saveData, array('id' =>$id));
                    $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
                }else{
                    $saveData['created_time'] = date("Y-m-d H:i:s");
                    $this->Service->insert_row(TBL_USER_ROLE, $saveData);
                    $this->session->set_flashdata('success_msg', $this->getNotification('recAddSuc'));
                }
                redirect(base_url('backend/user_role'));
            }
        }
        $data['view'] = 'backend/user_role/page_form';
        $this->renderAdmin($data);
    }

    public function delete_record(){
        $id=$this->input->post('record_id');
        $id=decrypt_String($id);
        if($this->Service->update_row(TBL_USER_ROLE, array('is_delete'=> 1), array('id' =>$id))){
            echo '1';
        }else{
            echo '0';
        }
    }

    public function change_status() {
        $id = $this->input->post('record_id');
        $id=decrypt_String($id);
        $status = $this->input->post('status');
        if($this->Service->update_row(TBL_USER_ROLE, array('is_active'=> $status), array('id' =>$id))){
            echo '1';
        }else{
            echo '0';
        }
    }
    public function permission($role_id=""){
        $data['title'] = "Role Permission";
        $data['menu'] = "Role Permission";
        $data['role_id'] = $role_id;
        $data['permissions'] = $this->Service->get_all(TBL_PERMISSION, '*', array('is_active'=> 1),  'permissionid','asc');
        // $data['results_data'] = $this->Service->get_all(TBL_USER_PERMISSION, '*', array('role_id' => $role_id), 'permission_id','asc');

        if (!empty($this->input->post('submit'))) 
        {
            $postData =  $this->input->post();
            $id_array = $postData['permission_id'];
            $role_per_add_arr = [];
            $role_per_up_arr = [];
            if(!empty($id_array) && is_array($id_array)){
                foreach($id_array as $permissionid){
                    $saveData = array(
                        'role_id' => $role_id,
                        'permission_id' => $permissionid,
                        'can_view' => $postData['can_view'.$permissionid],
                        'can_edit' => $postData['can_edit'.$permissionid],
                        'can_create' => $postData['can_create'.$permissionid],
                        'can_delete' => $postData['can_delete'.$permissionid],
                        'created_time' => date("Y-m-d H:i:s"),
                        'updated_time' => date("Y-m-d H:i:s"),
                    );
                    $exitsdata = $this->Service->get_row(TBL_USER_PERMISSION,'*',array('role_id' => $role_id, 'permission_id' => $permissionid));
                   if(!empty($exitsdata)){
                        $saveData['id'] =  $exitsdata['id'] ;
                        $role_per_up_arr[] = $saveData;
                    }else{
                    $role_per_add_arr[] = $saveData;
                    }
                }

                if(!empty($role_per_add_arr)){
                    $this->session->set_flashdata('success_msg', $this->getNotification('recAddSuc'));
                    $this->Service->multiple_insert(TBL_USER_PERMISSION, $role_per_add_arr);
                }
                if(!empty($role_per_up_arr)){
                    $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
                    $this->Service->multiple_insert(TBL_USER_PERMISSION, $role_per_up_arr, 'id');
                }
                redirect(base_url('backend/user_role/permission/'.$role_id),'refresh');
            }
        }
        $data['view'] = 'backend/user_role/user_permissions';
        $this->renderAdmin($data);
    }

}
?>