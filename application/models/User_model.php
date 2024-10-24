<?php

class User_model extends MY_Model {
    
    public function admin_login($data) {
        $where = " AND U.email='".$data['email']."' AND U.password = '".md5($data['password'])."' ";
        $sql = "SELECT U.* FROM ".TBL_USERS." U 
        JOIN ".TBL_USER_ROLE." UR ON U.user_role = UR.id AND UR.`is_delete` = 0 AND UR.is_active = 1
        WHERE U.is_delete = 0 ".$where." AND (U.user_role !=2 AND U.user_role!=7) GROUP BY U.user_id ORDER BY U.user_id DESC";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result;
    }

    //for check user login detail
    public function user_login($data) {
        $this->db->where('email', $data['email']);
        $this->db->where('password', $data['password']);
        $this->db->where('user_role', 1);
        return $this->db->get(TBL_USERS)->row_array();
    }

    public function change_pwd($data, $id) {
        $this->db->where('user_id', $id);
        $this->db->update(TBL_USERS, $data);
        return true;
    }

    public function add_user($data) {
        $this->db->insert(TBL_USERS, $data);
        return $this->db->insert_id();
    }

    public function get_users($where = '',$row = false, $no_of_row = false) {
        $sql = "SELECT U.*, CONCAT_WS(' ',U.name, U.last_name) as user_fullname, UR.name as user_role_name, UT.name as technician_name
        from ".TBL_USERS." U
        JOIN ".TBL_USER_ROLE." UR ON UR.id = U.user_role AND UR.`is_delete` = 0
        LEFT JOIN ".TBL_COUNTRIES." c ON c.id = U.country_id AND c.`is_delete` = 0
        LEFT JOIN ".TBL_USERS." UT ON UT.user_id = U.technician_id AND UT.`is_delete` = 0
        WHERE U.is_delete = 0 ".$where." GROUP BY U.user_id ";
        $query = $this->db->query($sql);
        if($row){
            $result = $query->row_array();
        }else{
            $result = $query->result_array();
        }
        if($no_of_row){
            $result = count($result);
        }
        return $result;
    }

    public function edit_user($data, $id) {
        $this->db->where('user_id', $id);
        $this->db->update(TBL_USERS, $data);
        return $id;
    }

    public function delete_user($id) {
        $this->db->where('user_id', $id);
        $this->db->update(TBL_USERS, array('is_delete'=>1));
        return $id;
    }

    public function get_user_role($id) {
        $role = "User";
        if(!empty($id)){
            if($id == 2){
                $role = "Other User";
            }elseif($id == 3){
                $role = "Admin";
            }
        }
        return $role;
    }

    //for get user full name by user_id
    public function getUsername($id) {
        $result = "";
        $this->db->where('user_id', $id);
        $rowData = $this->db->get(TBL_USERS)->row();
        if(!empty($rowData)){
            $result = $rowData->name;
        }
        return $result;
    }

    //for get user full name by UserName
    public function getFullname($username,$user_id='') {
        $result = "";
        if($user_id !=''){
            $this->db->where('user_id !=', $user_id);
        }
        $this->db->where('name', $username);
        $rowData = $this->db->get(TBL_USERS)->row();
        if(!empty($rowData)){
            $result = $rowData->fullname;
        }
        return $result;
    }

    //for check email exist or not
    public function check_username($name, $user_id='') {
        if($user_id !=''){
            $this->db->where('user_id !=', $user_id);
        }
        $this->db->where('username', $name);
        $this->db->where('is_delete', 0);
        return $this->db->get(TBL_USERS)->row();
    }

    //for check email exist or not
    public function check_email($email, $id='') {
        if($id !=''){
            $this->db->where('user_id !=', $id);
        }
        $this->db->where('email', $email);
        $this->db->where('is_delete', 0);
        return $this->db->get(TBL_USERS)->row();
    }

    //for check mobile exist or not
    public function check_mobile($mobile, $user_id='') {
        if($user_id !=''){
            $this->db->where('user_id !=', $user_id);
        }
        $this->db->where('mobile', $mobile);
        $this->db->where('is_delete', 0);
        return $this->db->get(TBL_USERS)->row();
    }

    //for check email id when user update
    public function check_update_email($email ,$id) {
        $this->db->where('user_id !=', $id);
        $this->db->where('email', $email);
        return $this->db->get(TBL_USERS)->row();
    }

    //for check mobile when user update
    public function check_update_mobile($mobile ,$id) {
        $this->db->where('user_id !=', $id);
        $this->db->where('mobile', $mobile);
        return $this->db->get(TBL_USERS)->row();
    }

    //for get user response
    public function getUserResponse($user_id, $isFull=false){
        $response = null;
        if(isset($user_id) && $user_id!=""){
            $userDetail = $this->get_users(" AND U.user_id = '".$user_id."'", true);
            if(!empty($userDetail)){
                $response['user_id'] = $user_id."";
                $response['name'] = (isset($userDetail['name'])) ? $userDetail['name']."" : "";
                $response['fullname'] = $response['name'];
                // $response['username'] = (isset($userDetail['username'])) ? $userDetail['username']."" : "";
                $response['mobile'] = (isset($userDetail['mobile'])) ? $userDetail['mobile']."" : "";
                $response['email'] = (isset($userDetail['email'])) ? $userDetail['email']."" : ""; 
                $response['picture'] = (isset($userDetail['picture']) && $userDetail['picture']!="") ? base_url().PROFILE.$userDetail['picture']."" : "";
                $response['created_time'] = (isset($userDetail['created_time'])) ? $userDetail['created_time']."" : "";
                $response['access_token'] = (isset($userDetail['access_token'])) ? $userDetail['access_token']."" : "";
                if($isFull==true){
                    $response['dob'] = (isset($userDetail['dob'])) ? $userDetail['dob']."" : "";
                    $response['gender'] = (isset($userDetail['gender'])) ? $userDetail['gender']."" : "";
                    // $response['authProvider'] = (isset($userDetail['authProvider'])) ? $userDetail['authProvider']."" : "";
                    // $response['authID'] = (isset($userDetail['authID'])) ? $userDetail['authID']."" : "";
                    $response['device_type'] = (isset($userDetail['device_type'])) ? $userDetail['device_type']."" : "";
                    $response['device_token'] = (isset($userDetail['device_token'])) ? $userDetail['device_token']."" : "";
                    $response['is_active'] = (isset($userDetail['is_active'])) ? $userDetail['is_active']."" : "";
                }
            }
        }
        return $response;
    }

    // for get contractors
    public function get_contractor($where = '',$row = false, $no_of_row = false) {
        $sql = "SELECT U.*, CONCAT_WS(' ',U.name, U.last_name) as user_fullname, UR.name as user_role_name
        from ".TBL_CONTRACTOR." U
        JOIN ".TBL_USER_ROLE." UR ON UR.id = U.user_role AND UR.`is_delete` = 0
        LEFT JOIN ".TBL_COUNTRIES." c ON c.id = U.country_id AND c.`is_delete` = 0
        WHERE U.is_delete = 0 ".$where." GROUP BY U.user_id ";
        $query = $this->db->query($sql);
        if($row){
            $result = $query->row_array();
        }else{
            $result = $query->result_array();
        }
        if($no_of_row){
            $result = count($result);
        }
        return $result;
    }

}
?>