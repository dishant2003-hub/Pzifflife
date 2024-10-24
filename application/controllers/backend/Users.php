<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
    }

    public function index() {
        if(!check_permission('users', 'can_view', $this->user_permission)){
            redirect(base_url().'backend/access_denied');
        }
        $data['title'] = "Users";
        $data['menu'] = "Users";
        $data['user_role_list'] = $this->Service->get_all(TBL_USER_ROLE, '*','id NOT IN (1,6) AND is_active=1');
        $data['postArr']=isset($_GET) ? $_GET:'';
        // pr($data['postArr']);die();
        $data['view'] = 'backend/users/user_list';
        $this->renderAdmin($data);
    }

    public function getAjaxListData() {
        $filter = array(
            'user_role'=>isset($_REQUEST['user_role'])? $_REQUEST['user_role']:'',
            'status'=>isset($_REQUEST['status'])?$_REQUEST['status']:'',
         );
        
        $this->get_table_data('user',$filter); //table name
    }
    
    public function add($user_id="")
    {
        $user_id = decrypt_String($user_id);
        if($user_id!=""){
            if(!check_permission('users', 'can_edit', $this->user_permission)){
                redirect(base_url().'backend/access_denied');
            }
            $data['title'] = "Edit User";
            $data['menu'] = "edit User";
            $data['rowData'] = $userData = $this->user->get_users(" AND U.user_id = '".$user_id."'", true);
        }else{
            $data['title'] = "Add User";
            $data['menu'] = "Add User";
            if(!check_permission('users', 'can_create', $this->user_permission)){
                redirect(base_url().'backend/access_denied');
            }
        }
        $data['user_role_list'] = $this->Service->get_all(TBL_USER_ROLE, '*', array('id !='=>1, 'is_active' => 1));

        if ($this->input->post('submit')) {
            // pr($_POST); pr($_FILES); die();
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            if ($this->form_validation->run() != FALSE) {
                $saveData = array(
                    'name' => $this->input->post('name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    'mobile' => $this->input->post('mobile'),
                    'address' => $this->input->post('address'),
                    'dob' => $this->input->post('dob'),
                    'pincode' => $this->input->post('pincode'),
                    'city' => $this->input->post('city'),
                    'contractor_id' => $this->input->post('contractor_id'),
                    // 'technician_id' => $this->input->post('technician_id'),
                    'license_plate' => $this->input->post('license_plate'),
                    'user_role' => $this->input->post('user_role'),
                    'alocation' => $this->input->post('alocation'),
                    'notes' => (isset($_POST['notes'])) ? $this->input->post('notes'):"",
                    'is_active' => $this->input->post('is_active'),
                    'updated_time' => date("Y-m-d H:i:s"),
                );

                $emailExits = $this->user->check_email($saveData['email'], $user_id);
                if(!empty($usernameExits)){
                    $this->session->set_flashdata('error_msg', $this->getNotification('usernameExist'));
                }elseif(!empty($emailExits)){
                    $this->session->set_flashdata('error_msg', $this->getNotification('emailExist'));
                }else{

                    if (!empty($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
                        $temp_file = $_FILES['picture']['tmp_name'];
                        $img_name = "picture_" . mt_rand(10000, 999999999) . time();
                        $path = $_FILES['picture']['name'];
                        $ext = pathinfo($path, PATHINFO_EXTENSION);
                        $saveData['picture'] = $img_name . "." . $ext;
                        $fileurl = PICTURE . $saveData['picture'];
                        if (isset($userData['picture']) && $userData['picture'] != "" && file_exists(PICTURE . $userData['picture'])) {
                            unlink(PICTURE . $userData['picture']);
                        }
                        move_uploaded_file($temp_file, $fileurl);
                    }

                    if($user_id!=""){
                        if($this->input->post('password')!=""){
                            $password = $this->input->post('password');
                            $saveData['password'] = md5($password);
                        }
                        $this->user->edit_user($saveData, $user_id);
                        $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
                    }else{
                        $password = (!empty($_POST['password'])) ? $this->input->post('password'):$this->Service->generateRandomString();
                        $saveData['password'] = md5($password);
                        $saveData['created_time'] = date("Y-m-d H:i:s");
                        $user_id = $this->user->add_user($saveData);
                        $this->session->set_flashdata('success_msg', $this->getNotification('recAddSuc'));
                    }
                }
                redirect(base_url('backend/users'));
            }
        }
        $data['view'] = 'backend/users/user_edit';
        $this->renderAdmin($data);
    }

    public function view($user_id = 0) {
        if(!check_permission('users', 'can_view', $this->user_permission)){
            redirect(base_url().'backend/access_denied');
        }
        $user_id = decrypt_String($user_id);

        $data['title'] = "View User";
        $data['menu'] = "view user";
        $data['user_id'] = $user_id;
        $data['rowData'] = $rowData = $this->user->get_users(" AND U.user_id = '".$user_id."'", true);
        if(empty($rowData)){
            redirect(base_url('backend/users'));
        }
        $data['title'] = "View ".$rowData['user_fullname'];
        $data['menu'] = "User #".$rowData['user_fullname'];

        $curr_tab = (isset($_GET['tab']))? $this->input->get('tab'):"";
        if($curr_tab=='statistics'){
            $start_date = $input_start_date = $bonus_start_date = date('Y-m-01');
            $end_date = $input_end_date = $bonus_end_date = date('Y-m-t');
            $input_chart_where = " AND TCI.user_id = '".$user_id."' AND (DATE(TCI.input_date) >='".$bonus_start_date."' AND DATE(TCI.input_date) <='".$bonus_end_date."') ";
            $bonus_chart_where = " AND TI.user_id = '".$user_id."' AND (DATE(input_date) >='".$bonus_start_date."' AND DATE(input_date) <='".$bonus_end_date."') ";
            if(!empty($_GET['input_filter_date'])){
                $date_array = explode('/', $_GET['input_filter_date']);
                $input_start_date = $date_array[0];
                $input_end_date = $date_array[1];
                $input_chart_where = " AND TCI.user_id = '".$user_id."' AND (DATE(TCI.input_date) >='".$input_start_date."' AND DATE(TCI.input_date) <='".$input_end_date."') ";
            }
            if(!empty($_GET['bonus_filter_date'])){
                $date_array = explode('/', $_GET['bonus_filter_date']);
                $bonus_start_date = $date_array[0];
                $bonus_end_date = $date_array[1];
                $bonus_chart_where = " AND TI.user_id = '".$user_id."' AND (DATE(input_date) >='".$bonus_start_date."' AND DATE(input_date) <='".$bonus_end_date."') ";
            }
            $data['input_filter_start_date'] = $input_start_date;
            $data['input_filter_end_date'] = $input_end_date;
            $data['bonus_filter_start_date'] = $bonus_start_date;
            $data['bonus_filter_end_date'] = $bonus_end_date;
            $data['inputChart'] = $this->Service->getTechnicianInputs($input_chart_where);
            // $data['inputBonusChart'] = $this->Service->getTechnicianBonus($bonus_chart_where);
        }

        $data['view'] = 'backend/users/user_view';
        $this->renderAdmin($data);
    }

    public function delete(){
        if(!check_permission('users', 'can_delete', $this->user_permission)){
            echo '0'; exit();
        }
        $id = $this->input->post('record_id');
        $id = decrypt_String($id);
        if($this->Service->update_row(TBL_USERS, array('is_delete'=> 1, 'updated_time'=> date("Y-m-d H:i:s")), array('user_id' =>$id))){
            echo '1';
        }else{
            echo '0';
        }
    }

    public function change_user_status() {

        $id = $this->input->post('record_id');
        $id = decrypt_String($id);
        $status = $this->input->post('status');
        if($this->Service->update_row(TBL_USERS, array('is_active'=> $status, 'updated_time'=> date("Y-m-d H:i:s")), array('user_id' =>$id))){
            echo '1';
        }else{
            echo '0';
        }
    }

    public function getTechnicianInputData($user_id){
        $user_id = decrypt_String($user_id);
        $this->get_table_data('user_technician_input', array('user_id'=>$user_id));
    }

    public function getMeterialOrderData($user_id){
        $user_id = decrypt_String($user_id);
        $this->get_table_data('user_material_order', array('user_id'=>$user_id));
    }
}
?>