<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
    }

    public function access_denied(){
        $data['menu']='Access denied';
        $data['title']='Access denied';
        $data['view'] = 'backend/access_denied';
        $this->renderAdmin($data);
    }

    public function dashboard(){
        if(!check_permission('dashboard', 'can_view', $this->user_permission)){
            redirect(base_url().'backend/access_denied');
        }
        $data['menu']='Dashboard';
        $data['title']='Dashboard'; 

        $data['view'] = 'backend/dashboard';
        $this->renderAdmin($data);
    }

    public function getListData(){
        $this->get_table_data('visiters', []);
    }

    // profile
    public function profile(){
        $data['title'] = " Profile View";
        $data['menu'] = "Profile ";
        $user_id = $this->session->userdata('admin_id');
        $data['userData'] = $this->user->get_users(" AND U.user_id = '".$user_id."'", true);
        if($this->input->post('submit')){
            $saveData = array(
                'name' =>$this->input->post('name'),
                'email' =>$this->input->post('email'),
                'mobile' =>$this->input->post('mobile'),
                'address' =>$this->input->post('address'),
                'updated_time' => date('Y-m-d H:i:s'),
            );
            if(!empty($_POST['password'])) {
                $saveData['password'] = md5($this->input->post('password'));
            }

            if(!empty($_FILES['image']['name'])) {
                $temp_file = $_FILES['image']['tmp_name'];
                $file_name = $_FILES['image']['name'];
                $ext = pathinfo($file_name,PATHINFO_EXTENSION);
                $imgname ='profile'.time().'.'.$ext;
                $file_url=PROFILE.$imgname; 
                // if (isset($orderData['challen_image']) && $orderData['challen_image'] != "" && file_exists(ORDER_IMAGE . $orderData['challen_image'])) {
                //     unlink(ORDER_IMAGE . $orderData['challen_image']);
                // }
                move_uploaded_file($temp_file,$file_url);
                $saveData['picture']=$imgname;
            }
            $emailExits = $this->user->check_update_email($saveData['email'], $user_id);
            if(!empty($emailExits)){
                $this->session->set_flashdata('success_msg', $this->getNotification('emailExist'));
            }else{
                $user_id = $this->user->edit_user($saveData, $user_id);
                $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
            }
            redirect(base_url('backend/profile'));
        }
        $data['view'] = 'backend/users/profile_edit';
        $this->renderAdmin($data);
    }

    //for change password
    public function change_login_password(){
        $data['title'] = "change password";
        $data['menu'] = "change password";
        $user_id = $this->session->userdata('admin_id');
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');;
            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'password' => md5($this->input->post('password')),
                    'updated_time' => date("Y-m-d H:i:s")
                );
                $result = $this->user->edit_user($data, $user_id);
                $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
                redirect(base_url('backend/change-login-password'));
            }
        }
        $data['view'] = 'backend/users/change_login_password';
        $this->renderAdmin($data);
    }

    //for setting
    public function system_setting(){
        if(!check_permission('system-setting', 'can_view', $this->user_permission)){
            redirect(base_url().'backend/access_denied');
        }
        $data['title'] = "Settings";
        $data['menu'] = "Settings";
        $user_id = $this->session->userdata('admin_id');
        $data['rowData'] = $settingData = $this->Service->get_row(TBL_SETTING,'*');
        // $data['admin_device_id'] = $this->Service->getCustomName(TBL_USERS, 'device_id', array('user_id' => 1, 'user_role' => 1));
        if($this->input->post('submit')){
            $saveData = array(
                /*'footer' => $this->input->post('footer'),
                'header' => $this->input->post('header'),
                'address' => $this->input->post('address'),*/
                'site_name' => $this->input->post('site_name'),
                'phone' => $this->input->post('phone'),
                'mobile' => $this->input->post('mobile'),
                'fax' => $this->input->post('fax'),
                'email' => $this->input->post('email'),
                // 'wa_number' => $this->input->post('wa_number'),
                'linkedin_link' => (isset($_POST['linkedin_link']))? $this->input->post('linkedin_link'):"",
                'fb_link' => (isset($_POST['fb_link']))? $this->input->post('fb_link'):"",
                'twitter_link' => (isset($_POST['twitter_link']))? $this->input->post('twitter_link'):"",
                'youtube_link' => (isset($_POST['youtube_link']))? $this->input->post('youtube_link'):"",
                'instagram_link' => (isset($_POST['instagram_link']))? $this->input->post('instagram_link'):"",
                'google_link' => (isset($_POST['google_link']))? $this->input->post('google_link'):"",
                'googlemap_link' => (isset($_POST['googlemap_link']))? $this->input->post('googlemap_link'):"",

                // 'default_lat' => (isset($_POST['latitude']))? $this->input->post('latitude'):"",
                // 'default_long' => (isset($_POST['longitude']))? $this->input->post('longitude'):"",
                // 'pushsafer_key' => (isset($_POST['pushsafer_key']))? $this->input->post('pushsafer_key'):"",
                // 'sms_server_url' => (isset($_POST['sms_server_url']))? $this->input->post('sms_server_url'):"",
                // 'sms_api_key' => (isset($_POST['sms_api_key']))? $this->input->post('sms_api_key'):"",
                // 'from_email' => $this->input->post('from_email'),
            );
            if ($_FILES['site_logo']['error'] == 0) {
                $temp_file = $_FILES['site_logo']['tmp_name'];
                $img_name = "tray_img" . mt_rand(10000, 999999999) . time();
                $path = $_FILES['site_logo']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $saveData['site_logo'] = $img_name . "." . $ext;
                $fileurl = UPLOAD . $saveData['site_logo'];
                if (isset($settingData['site_logo']) && $settingData['site_logo'] != "" && file_exists(UPLOAD . $settingData['site_logo'])) {
                    unlink(UPLOAD . $settingData['site_logo']);
                }
                move_uploaded_file($temp_file, $fileurl);
            }
            if ($_FILES['favicon']['error'] == 0) {
                $temp_file = $_FILES['favicon']['tmp_name'];
                $img_name = "tray_img" . mt_rand(10000, 999999999) . time();
                $path = $_FILES['favicon']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $saveData['favicon'] = $img_name . "." . $ext;
                $fileurl = UPLOAD . $saveData['favicon'];
                if (isset($settingData['favicon']) && $settingData['favicon'] != "" && file_exists(UPLOAD . $settingData['favicon'])) {
                    unlink(UPLOAD . $settingData['favicon']);
                }
                move_uploaded_file($temp_file, $fileurl);
            }
            
            $this->Service->update_row(TBL_SETTING, $saveData, array('setting_id' =>  $settingData['setting_id']));

            $admin_device_id = (isset($_POST['admin_device_id']))? $this->input->post('admin_device_id'):"";
            if(!empty($admin_device_id)){
                $this->Service->update_row(TBL_USERS, array('device_id'=> $admin_device_id, 'updated_time'=> date("Y-m-d H:i:s")), array('user_id' => 1, 'user_role' => 1));
            }

            $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
            redirect(base_url('backend/system-setting'));
        }
        $data['view'] = 'backend/setting/system_setting';
        $this->renderAdmin($data);
    }

    public function terms(){
        $data['title'] = "setting System";
        $data['menu'] = "setting";
        $data['rowData'] = $settingData= $this->Service->get_row(TBL_SETTING,'*');
        if($this->input->post('termssubmit')){
            $saveData = array(
                'terms' => $this->input->post('terms')
            );
            $this->Service->update_row(TBL_SETTING, $saveData, array('setting_id' =>  $settingData['setting_id']));
            $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
            redirect(base_url('backend/terms-setting'));
        }
        $data['view'] = 'backend/setting/terms_setting';
        $this->renderAdmin($data);
    }

    public function privacy(){
        $data['title'] = "setting System";
        $data['menu'] = "setting";
        $settingData= $this->Service->get_row(TBL_SETTING,'*');
        $data['rowData'] = $settingData;
        if($this->input->post('privacysubmit')){
            $saveData = array(
                'privacy' => $this->input->post('privacy')
            );
            $this->Service->update_row(TBL_SETTING, $saveData, array('setting_id' =>  $settingData['setting_id']));
            $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
            redirect(base_url('backend/privacy-setting'));
        }
        $data['view'] = 'backend/setting/privacy_setting';
        $this->renderAdmin($data);
    }

}
