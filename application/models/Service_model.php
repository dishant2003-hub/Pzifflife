<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getNotification($key = "") {
        $result = "No notification found";
        if (!empty($key)) {
            $query = $this->db->get_where(TBL_LANGUAGE_KEY, array('is_active' => 1,'key' => $key));
            $notificationData = $query->row_array();
            if(!empty($notificationData)){
                $result = $notificationData['value_en'];
            }
        }
        return $result;
    }

    //for get site setting value
    public function getSiteSetting($key = "") {
        $result = "";
        if (!empty($key)) {
            $query = $this->db->get_where(TBL_SETTING, array('is_active' => 1, 'is_delete' => 0, 'settingKey' => $key));
            $resultData = $query->row_array();
            if (!empty($resultData)) {
                $result = $resultData['settingValue'];
            }
        }
        return $result;
    }

    public function getSetting($key = "") {
        $result = "";
        if (!empty($key)) {
            $this->db->select('*');
            $this->db->where('setting_id',1);
            $dd = $this->db->get(TBL_SETTING)->row_array();
            $result = $dd[$key];
        }
        return $result;
    }

    //for get current currency data

    public function getCurrency() {
        return $this->getSiteSetting('currency');
    }

    public function rand_string($length = 8) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }

    public function rand_code($length = 4) {
        $chars = "0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }

    //for send push notification to User
    public function sendPushNotification($deviceId, $title="", $message="",$user_id="",$betID="") {
        $time = date('Y-m-d H:i:s');
        $unreadcount = 0;
        $fcmApiKey = $this->getSiteSetting('fcm_api_key');
        if(empty($fcmApiKey)){
            $fcmApiKey = "";
        }
        //Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';
        $msg = array(
            "title" => $title,
            'body' => $message,
            'alert' => $message,
            'time' => $time,
            'status' => '4',
            'badge' => (int) $unreadcount,
            'friendID' => $user_id,
            'betID' => $betID,
            'priority' => 'high',
            'sound' => 'default'
        );
        //$pushmessage = json_encode($json, JSON_UNESCAPED_SLASHES);
        $fields = array(
            'to' => $deviceId,
            'data' => $msg,
            'notification' => $msg,
        );
        $headers = array(
            'Authorization: key=' . $fcmApiKey,
            'Content-Type: application/json'
        );
        //Open connection
        try {
            $ch = curl_init();
            //Set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            //Execute post
            $result = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e) {

        }
    }

    //for send SMS
    public function sendSMS($number, $msg="") {
        //for send message content
    }
    
    public function get_row($table, $columns = "*", $where = '1 = 1', $order_by = null, $sort_by = 'DESC') {
        $this->db->select($columns)
        ->from($table)
        ->where($where)
        ->where('is_delete', 0);
        if($order_by != null) {
            if($order_by=='rand'){
                $this->db->order_by('RAND()');
            }else{
                $this->db->order_by($order_by, $sort_by);
            }
        }
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }
    
    public function insert_row($table, $data) {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function update_row($table, $data, $where) {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function insert_update_betch($table, $data, $where='') {
        if(!empty($where)){
            return $this->db->update_batch($table, $data, $where); 
        }else{
            return $this->db->insert_batch($table, $data); 
        }
    }
    
    public function set_delete($table, $where) {
        $this->db->where($where)
        ->update($table, ['is_delete' => 1]);
        return $this->db->affected_rows();
    }
    
    public function hard_delete($table, $where) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function checkExists($table,$where = '1=1'){
        if($this->db->select("*")->from($table)->where($where)->get()->num_rows() > 0){
            return true;
        }
        return false;
    }
   
    public function generateSlug($table, $columns, $string, $lang = ''){
        $result = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        $result = trim($result, '-');
        $result = strtolower($result);
        if(!empty($lang)){
            $where = " (JSON_EXTRACT(".$columns.", '$.".$lang."') in ('".$result."')) ";
            $checkExists = $this->get_row($table, $columns, $where);
        }else{
            $checkExists = $this->get_row($table, '*', array($columns => $result));
        }
        if(!empty($checkExists)){
            $string = $string.rand(10,99);
            $result = $this->generateSlug($table, $columns, $string, $lang);
        }
        return $result; 
    }

    public function categorySlug($table,$string){
        $result = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        $result = trim($result, '-');
        $result = strtolower($result);
        $checkExists = $this->Service->get_all($table,'*',array('slug'=>$result));
        if(!empty($checkExists)){
            $string = $string.rand(10,99);
            $result = $this->Service->categorySlug($table,$string);
        }
        return $result;
    }
  
    public function generateRandomString($alpha = true, $nums = true, $usetime = false, $string = '', $length = 10) {
        $alpha = ($alpha == true) ? 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' : '';
        // $alpha = ($alpha == true) ? 'abcdefghijklmnopqrstuvwxyz' : '';
        $nums = ($nums == true) ? '1234567890' : '';
        
        if ($alpha == true || $nums == true || !empty($string)) {
            if ($alpha == true) {
                $alpha = $alpha;
                $alpha .= strtoupper($alpha);
            }
        }
        $randomstring = '';
        $totallength = $length;
        for ($na = 0; $na < $totallength; $na++) {
                $var = (bool)rand(0,1);
                if ($var == 1 && $alpha == true) {
                    $randomstring .= $alpha[(rand() % mb_strlen($alpha))];
                } else {
                    $randomstring .= $nums[(rand() % mb_strlen($nums))];
                }
        }
        if ($usetime == true) {
            $randomstring = $randomstring.time();
        }
        return($randomstring);
    }
    
    public function get_all($table, $columns = '*', $where = '1 = 1', $order_by = null, $sort_by = 'DESC', $limit="",$offset="",$group_by = '',$no_of_row=false,$searchQuery='',$where_in="", $join='') {
        $this->db->select($columns)
        ->from($table);
        if(!empty($join) && !empty($join['table'])){
            if(!empty($join['where'])){
                $this->db->join($join['table'],$join['where'],$join['type']);
            }
        }
        $this->db->where($where);
        // ->where('is_active', 1);
        if(!empty($join)){
            $this->db->where($table.'.is_delete', 0);
        }else{
            $this->db->where('is_delete', 0);
        }
        if($where_in != '')
        $this->db->where_in($where_in);

        if($searchQuery != '')
        $this->db->where($searchQuery);

        if($order_by != null) {
            if($order_by=='rand'){
                $this->db->order_by('RAND()');
            }else{
                $this->db->order_by($order_by, $sort_by);
            }
        }
        if($limit!="" && $offset!=""){
            $this->db->limit($limit, $offset);
        }elseif($limit!=""){
            $this->db->limit($limit);
        }
        if($group_by != "") {
            $this->db->group_by($group_by);
        }
        $result =  $this->db->get()->result_array();
        if ($no_of_row) {
            $result = count($result);
        }
        // echo "<pre>"; pr($this->db->last_query()); 
        return $result;
    }

    public function multiple_insert($table, $data,$whr='') {
        if(!empty($whr)){
            $this->db->update_batch($table, $data, $whr);
        }else{
            $this->db->insert_batch($table, $data);
         }
        return true;
    }
    
    public function getCustomName($table, $column, $where) {
        $result = "";
        $this->db->where($where);
        $rowData = $this->db->get($table)->row();
        if(!empty($rowData)){
            $result = (!empty($column))?$rowData->$column:"";
        }
        return $result;
    }

    public function do_in_background($url, $params=array())
    {
        $post_string = http_build_query($params);
        $parts = parse_url($url);
        $errno = 0;
        $errstr = "";

        //Use SSL & port 443 for secure servers
        //Use otherwise for localhost and non-secure servers
        //For secure server
        // $fp = fsockopen('ssl://' . $parts['host'], isset($parts['port'])  ? $parts['port'] : 443, $errno, $errstr, 30);
        //For localhost and un-secure server
        // $fp = fsockopen($parts['host'], isset($parts['port']) ? $parts['port'] : 80, $errno, $errstr, 30);

        if ($this->config->item('ssl_enable') == 'Y') {
            $fp = fsockopen('ssl://' . $parts['host'], isset($parts['port']) ? $parts['port'] : 443, $errno, $errstr, 30);
        } else {
            $fp = fsockopen($parts['host'], isset($parts['port']) ? $parts['port'] : 80, $errno, $errstr, 30);
        }
        $out = '';
        if (!$fp) {
            $out .=  "Some thing Problem". "\r\n";
        }
        $out .= "POST " . $parts['path'] . " HTTP/1.1\r\n";
        $out .= "Host: " . $parts['host'] . "\r\n";
        $out .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $out .= "Content-Length: " . strlen($post_string) . "\r\n";
        $out .= "Connection: Close\r\n\r\n";
        if (isset($post_string)) {
            $out .= $post_string;
        }

        fwrite($fp, $out);
        fclose($fp);

        // generate log
        $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL;
        $log .= "URL: ".$url.PHP_EOL;
        $log .= $out;
        $log .= "--------------------------------------------------".PHP_EOL.PHP_EOL;
        file_put_contents('application/logs/curl_log_'.date("d_M_Y").'.log', $log, FILE_APPEND);
    }

    public function send_web_push_notification($title, $msg, $notification_data, $is_scheduled='', $schedule='') {
        $onesignal_app_id = !empty($this->setting_data['onesignal_app_id'])? $this->setting_data['onesignal_app_id']:"";
        $onesignal_auth_key = !empty($this->setting_data['onesignal_auth_key'])? $this->setting_data['onesignal_auth_key']:"";
        $site_logo = (isset($this->setting_data['site_logo']) && !empty($this->setting_data['site_logo'])) ?  base_url() . UPLOAD . $this->setting_data['site_logo'] : ADMIN_ASSETS_PATH . "img/logo.png";
        $favicon = (isset($this->setting_data['favicon']) && !empty($this->setting_data['favicon']))?  base_url().UPLOAD.$this->setting_data['favicon']:ADMIN_ASSETS_PATH."img/favicon.ico";

        $content = array(
            "en" => $msg
        );
        $fields = array(
            'app_id' => $onesignal_app_id,
            'contents' => $content,
            'web_url' => base_url(),
            'big_picture' => $site_logo,
            'chrome_web_image' => $site_logo,
            'chrome_web_icon' => $favicon,
            'small_icon' => $favicon,
            'headings' => array("en" => $title)
        );
        if($notification_data['type']=='users'){
            $fields['include_player_ids'] = (is_array($notification_data['device_id']))? $notification_data['device_id']:array($notification_data['device_id']);
        }else{
            $fields['included_segments'] = array('Active Users', 'Inactive Users', 'Subscribed Users');
        }

        if($is_scheduled==true && !empty($schedule)){
            // Convert datetime to Unix timestamp
            $timestamp = strtotime($schedule);
            $time = ($timestamp - (1 * 60));

            // $fields['send_after'] = date('Y-m-d H:i:s', $time).' UTC-0400';
            $fields['data'] = array(
                'isScheduled' => $is_scheduled,
                'scheduledTime' => $schedule,
            );
            $fields['send_after'] = date('Y-m-d H:i:s TO', $time);
            $fields['delayed_option'] ='timezone';
            $fields['delivery_time_of_day'] = date('H:i', $timestamp)."";
        }
        $fields = json_encode($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            "Authorization: Basic ".$onesignal_auth_key.""
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        
        $error_msg = "";
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }
        curl_close($ch);
        return $response;
    }

    // for send pushsafer notification
    public function send_pushsafer_notification($title, $message, $device){
        $private_key = !empty($this->setting_data['pushsafer_key'])? $this->setting_data['pushsafer_key']:"9bOpGRfmHFUoM5FcAceO ";
        $url = base_url();
        $urltitle = "Open Link";
        $ch = curl_init();
        $data = array(
            't' => urlencode($title),
            'm' => urlencode($message),
            's' => '',
            'v' => '',
            'i' => '1',
            'c' => '',
            'd' => $device,
            'u' => urlencode($url),
            'ut' => urlencode($urltitle),
            // 'p' => $picture,
            'k' => $private_key
        );
        $postString = http_build_query($data, '', '&');
        curl_setopt($ch, CURLOPT_URL, 'https://www.pushsafer.com/api' );
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    // for get input user wise
    public function getTechnicianInputs($where=''){
        $sql = "SELECT io.id, io.title, io.type,
        (SELECT COUNT(TCI.id) FROM ".TBL_TECHNICIAN_INPUT." TCI 
            JOIN ".TBL_USERS." U ON U.user_id = TCI.user_id AND U.`is_delete` = 0 
            WHERE FIND_IN_SET(io.id, TCI.type) > 0 ".$where." AND TCI.`is_delete` = 0 LIMIT 1
        ) as total_type,
        (SELECT COUNT(TCI.id) FROM ".TBL_TECHNICIAN_INPUT." TCI
            JOIN ".TBL_USERS." U ON U.user_id = TCI.user_id AND U.`is_delete` = 0 
            WHERE FIND_IN_SET(io.id, TCI.elekticiteit) > 0 ".$where." AND TCI.`is_delete` = 0 LIMIT 1) as total_elekticiteit,
        (SELECT COUNT(TCI.id) FROM ".TBL_TECHNICIAN_INPUT." TCI
            JOIN ".TBL_USERS." U ON U.user_id = TCI.user_id AND U.`is_delete` = 0 
            WHERE FIND_IN_SET(io.id, TCI.gas) > 0 ".$where." AND TCI.`is_delete` = 0 LIMIT 1) as total_gas,
        (SELECT COUNT(TCI.id) FROM ".TBL_TECHNICIAN_INPUT." TCI
            JOIN ".TBL_USERS." U ON U.user_id = TCI.user_id AND U.`is_delete` = 0 
            WHERE FIND_IN_SET(io.id, TCI.water) > 0 ".$where." AND TCI.`is_delete` = 0 LIMIT 1) as total_water,
        (SELECT COUNT(TCI.id) FROM ".TBL_TECHNICIAN_INPUT." TCI
            JOIN ".TBL_USERS." U ON U.user_id = TCI.user_id AND U.`is_delete` = 0 
            WHERE FIND_IN_SET(io.id, TCI.supplement) > 0 ".$where." AND TCI.`is_delete` = 0 LIMIT 1) as total_supplement
        FROM ".TBL_INPUT_OPTIONS." io 
        WHERE io.`is_delete` = '0' AND io.`is_active` = '1' AND io.id != 21 GROUP BY io.id ORDER BY 1 DESC";
        $query = $this->db->query($sql);
        $technician_list = $query->result_array();
        $total_count = 0;
        $result = array();
        if(!empty($technician_list)){
            foreach($technician_list as $row){
                if($row['type']==1){
                    $total = $row['total_type'];
                }elseif($row['type']==2){
                    $total = $row['total_elekticiteit'];
                }elseif($row['type']==3){
                    $total = $row['total_gas'];
                }elseif($row['type']==4){
                    $total = $row['total_water'];
                }elseif($row['type']==5){
                    $total = $row['total_supplement'];
                }
                $result[] = array('title'=>$row['title'], 'total' => $total);
                $total_count = ($total_count + $total);
            }
        }
        if(!empty($result)){
            array_sort_by_column($result, 'total', SORT_DESC);
        }
        $response['data'] = $result;
        $response['total_count'] = $total_count;
        return $response;
    }

    public function getTechnicianInputsChart($where=''){
        $response = array();
        $input_options = $this->Service->get_all(TBL_INPUT_OPTIONS, "id, title, type", array('is_delete'=>0));

        $sql = "SELECT tti.id, tti.user_id, input_date, CONCAT_WS(' ',U.name, U.last_name) as username, tti.created_time
            FROM ".TBL_TECHNICIAN_INPUT." tti
            JOIN ".TBL_USERS." U ON U.user_id = tti.user_id AND U.`is_delete` = 0 
            WHERE tti.is_delete = 0 ".$where." GROUP BY tti.user_id ORDER BY tti.id DESC";
        $query = $this->db->query($sql);
        $technician_list = $query->result_array();
        
        $usernames = array();
        if(!empty($technician_list)){
            $usernames = array_column($technician_list, 'username');
        }
        $response['usernames'] = $usernames;
        
        $series_data = array();
        if(!empty($input_options)){
            foreach($input_options as $option){
                $option_id = $option['id'];
                $option_type = $option['type'];

                $tech_data = array();
                if(!empty($technician_list)){
                    foreach($technician_list as $tech){
                        $tech_id = $tech['user_id'];

                        if($option_type==1){
                            $sql2 = "SELECT COUNT(tti.id) as total_count FROM ".TBL_TECHNICIAN_INPUT." tti 
                            JOIN ".TBL_USERS." U ON U.user_id = tti.user_id AND U.`is_delete` = 0 
                            WHERE FIND_IN_SET('".$option_id."', tti.type) > 0 ".$where." AND tti.user_id = '".$tech_id."' AND tti.`is_delete` = 0 LIMIT 1";
                        }
                        elseif($option_type==2){
                            $sql2 = "SELECT COUNT(tti.id) as total_count FROM ".TBL_TECHNICIAN_INPUT." tti 
                            JOIN ".TBL_USERS." U ON U.user_id = tti.user_id AND U.`is_delete` = 0 
                            WHERE FIND_IN_SET('".$option_id."', tti.elekticiteit) > 0 ".$where." AND tti.user_id = '".$tech_id."' AND tti.`is_delete` = 0 LIMIT 1";
                        }
                        elseif($option_type==3){
                            $sql2 = "SELECT COUNT(tti.id) as total_count FROM ".TBL_TECHNICIAN_INPUT." tti 
                            JOIN ".TBL_USERS." U ON U.user_id = tti.user_id AND U.`is_delete` = 0 
                            WHERE FIND_IN_SET('".$option_id."', tti.gas) > 0 ".$where." AND tti.user_id = '".$tech_id."' AND tti.`is_delete` = 0 LIMIT 1";
                        }
                        elseif($option_type==4){
                            $sql2 = "SELECT COUNT(tti.id) as total_count FROM ".TBL_TECHNICIAN_INPUT." tti 
                            JOIN ".TBL_USERS." U ON U.user_id = tti.user_id AND U.`is_delete` = 0 
                            WHERE FIND_IN_SET('".$option_id."', tti.water) > 0 ".$where." AND tti.user_id = '".$tech_id."' AND tti.`is_delete` = 0 LIMIT 1";
                        }
                        elseif($option_type==5){
                            $sql2 = "SELECT COUNT(tti.id) as total_count FROM ".TBL_TECHNICIAN_INPUT." tti 
                            JOIN ".TBL_USERS." U ON U.user_id = tti.user_id AND U.`is_delete` = 0 
                            WHERE FIND_IN_SET('".$option_id."', tti.supplement) > 0 ".$where." AND tti.user_id = '".$tech_id."' AND tti.`is_delete` = 0 LIMIT 1";
                        }
                        if(!empty($sql)){
                            $query = $this->db->query($sql2);
                        }
                        $countData = $query->row_array();
                        $totalCount = (!empty($countData['total_count'])) ? $countData['total_count']: 0;
                        $tech_data[] = $totalCount;
                    }
                }
                $series_data[] = array('name' => $option['title'], 'data' => $tech_data);

            }
        }
        $response['series'] = $series_data;
        return $response;
    }

    public function getTechnicianBonus($where=''){
        $sql = "SELECT TI.id, input_date, U.name as username, coalesce(COUNT(DISTINCT TI.id), 0) as total_inputs 
        FROM ".TBL_TECHNICIAN_INPUT." TI 
        JOIN ".TBL_USERS." U ON U.user_id = TI.user_id AND U.`is_delete` = 0
        WHERE TI.is_delete = 0 ".$where." 
        GROUP BY TI.user_id, TI.input_date ORDER BY TI.id DESC, total_inputs DESC";
        $query = $this->db->query($sql);
        $technician_list = $query->result_array();
        $total_bonus = 0;
        $result = array();
        if(!empty($technician_list)){
            foreach($technician_list as &$row){
                $bonus = ($row['total_inputs'] - 6);
                $input_bonus = ($bonus > 0) ? $bonus:0;
                if($input_bonus > 0){
                    $result[] = array('username'=>$row['username'], 'total' => $input_bonus);
                    $total_bonus = ($total_bonus + $input_bonus);
                }
            }
        }
        // for merge same user array
        if(!empty($result)){
            $result = merge_same_key_array_and_sum($result, 'username', 'total');
        }
        if(!empty($result)){
            array_sort_by_column($result, 'total', SORT_DESC);
        }
        $response['data'] = $result;
        $response['total_count'] = $total_bonus;
        return $response;
    }

    public function getWorkspacesList($where='', $edit_workspace=''){
        $user_id = $this->session->userdata('admin_id');
        if(empty($user_id)){
            $user_id = $this->session->userdata('user_id');
        }
        $order_by = $not_in='';
        $workspace_id = $this->Service->get_row('tbluser_workspaces',array('workspace_id','remove_workspace_id'),array('user_id'=>$user_id));
        if(!empty($workspace_id['workspace_id'])){
            $order_by = 'ORDER BY FIELD(W.id, '.$workspace_id['workspace_id'].')';
        }else{
            $order_by = 'ORDER BY W.custom_order ASC, W.title DESC';
        }
        if(!empty($workspace_id['remove_workspace_id']) && $edit_workspace==true ){
            $not_in = ' AND W.id NOT IN ('.$workspace_id['remove_workspace_id'].')' ;
        }else{
            $not_in = '';
        }
        
        $sql = "SELECT W.*, Group_concat(DISTINCT UR.name SEPARATOR ', ') as role_names FROM ".TBL_WORKSPACES." W 
              LEFT JOIN ".TBL_USER_ROLE." UR ON FIND_IN_SET(UR.id, W.roles) > 0 AND UR.`is_delete` = 0 
              WHERE W.is_delete = 0 ".$not_in."  ".$where."  GROUP BY W.id  ".$order_by." ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function getUserPermission($role_id){
        $sql = "SELECT ps.*,rp.url, rp.name as permission_name FROM ".TBL_PERMISSION." rp
        JOIN ".TBL_USER_PERMISSION." ps ON ps.permission_id = rp.permissionid AND ps.is_active =1 AND ps.is_delete =0
        WHERE ps.role_id='" . $role_id . "' AND rp.is_active =1 AND rp.is_delete =0 ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function getUserMeldingData($where='',$is_single_row=false){
        $sql = "SELECT M.*, CONCAT_WS(' ',U.name, U.last_name) as technician_name, C.name as contractor_name, 
        ( CASE
            WHEN M.melding_status = 1 THEN 'OPEN'
            WHEN M.melding_status = 2 THEN 'BEZIG'
            WHEN M.melding_status = 3 THEN 'GESLOTEN'
            ELSE '-' END) as melding_status_name,
        ( CASE
            WHEN M.regie_status = 1 THEN 'APPROVED'
            WHEN M.regie_status = 2 THEN 'DISAPPROVED'
            ELSE '-' END) as regie_status_name,
        ( CASE
            WHEN M.verlof_status = 1 THEN 'APPROVED'
            WHEN M.verlof_status = 2 THEN 'DISAPPROVED'
            ELSE '-' END) as verlof_status_name, 
        MT.title as melding_type, U.pincode as user_pincode FROM ".TBL_MELDING." M
        JOIN ".TBL_MELDING_TYPE." MT ON MT.id = M.type_id AND MT.`is_delete` = 0
        JOIN ".TBL_USERS." U ON U.user_id = M.technician_id AND U.`is_delete` = 0
        LEFT JOIN ".TBL_CONTRACTOR." C ON C.user_id = U.contractor_id AND C.`is_delete` = 0
        WHERE M.is_delete=0 AND M.is_active=1 ".$where." ";
        $query = $this->db->query($sql);
        if($is_single_row){
            $result = $query->row_array();
        }else{
            $result = $query->result_array();
         }
        return $result;
    }

    public function categoyList($where=''){
        $sql="SELECT * FROM ".TBL_PHONEBOOK." AS P 
            JOIN ".TBL_PHONE_CATEGORY." as P_CAT ON P_CAT.id=P.category_id AND P_CAT.is_active=1 AND P_CAT.is_delete=0
            WHERE P.is_delete=0 AND P.is_active=1 ".$where." ";
       $query = $this->db->query($sql);
       $result = $query->result_array();
       return $result;
    }
    
    public function getMaterialOrderCount($where=''){
        $sql = "SELECT MOS.id, COUNT(MO.id) as total_count FROM ".TBL_MATERIAL_ORDER_STATUS." AS MOS 
            LEFT JOIN ".TBL_MATERIAL_ORDER." MO ON MO.status = MOS.id AND MO.is_active = 1 AND MO.is_delete = 0
            WHERE MOS.is_active = 1 AND MOS.is_delete = 0 ".$where." 
            GROUP BY MO.status ORDER BY MOS.id;";
        $query = $this->db->query($sql);
        $resultList = $query->result_array();
        $result = array();
        if(!empty($resultList)){
            foreach($resultList as $row){
                $result[$row['id']] = $row['total_count'];
            }
        }
        return $result;
    }

    public function getUserMaterialOrderData($where='', $is_single_row = false){
        $sql = "SELECT mo.*, M.name as material_name, MS.name as status_name, U.name as technician_name FROM ".TBL_MATERIAL_ORDER." AS mo 
            JOIN ".TBL_USERS." U ON U.user_id = mo.user_id AND U.`is_delete` = 0 
            JOIN ".TBL_MATERIAL." M ON M.id = mo.material_id AND M.`is_delete` = 0 
            JOIN ".TBL_MATERIAL_ORDER_STATUS." MS ON MS.id = mo.status AND MS.`is_delete` = 0 
            WHERE mo.is_active = 1 AND mo.is_delete = 0 ".$where." 
            GROUP BY mo.id ORDER BY mo.id; ";
        $query = $this->db->query($sql);
        if($is_single_row){
            $result = $query->row_array();
        }else{
            $result = $query->result_array();
         }
        return $result;
    }

    public function getUserNotifications($where="", $role=''){
        $response = array();
        $sql = "SELECT n.*, nt.roles FROM ".TBL_NOTIFICATIONS." n
            JOIN ".TBL_NOTIFICATION_TYPE." nt ON nt.id = n.type_id AND nt.is_active = 1 
            LEFT JOIN ".TBL_USER_ROLE." UR ON FIND_IN_SET(UR.id, n.user_roles) > 0 AND UR.`is_delete` = 0
            LEFT JOIN ".TBL_USERS." u ON u.user_id = n.user_id AND u.is_active = 1 AND u.is_delete = 0
            WHERE n.is_active = 1 AND n.is_delete =0 ";
        if(!empty($role)){
            $sql .= " AND (FIND_IN_SET(".$role.", n.user_roles) > 0 AND FIND_IN_SET(".$role.", nt.roles) > 0 ) ";    
        }
        $sql .= $where . " GROUP BY n.id ORDER BY n.id DESC";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if(!empty($result)){
            foreach($result as &$row){
                $row_id = $row['row_id'];
                $row['redirect_url'] = "javascript:void(0)";
                if($row['type'] == 'material_order_alert'){
                    $where = ' AND mo.id=' . $row_id . ' ';
                    $notificationRowData = $this->getUserMaterialOrderData($where, true);
                    
                    $notification_string = "";
                    if(!empty($notificationRowData)){
                        $notification_string .= $notificationRowData['material_name']. " order by " .$notificationRowData['technician_name'];
                    }
                    $row['notification_string'] = $notification_string;
                    $row['redirect_url'] = base_url('backend/material/order');
                }elseif($row['type'] == 'melding_alerts'){
                    $where = ' AND M.id=' . $row_id . ' ';
                    $notificationRowData = $this->getUserMeldingData($where, true);

                    $notification_string = "Melding ";
                    if(!empty($notificationRowData)){
                        $notification_string .= $notificationRowData['melding_type']. " - " .$notificationRowData['technician_name'];
                    }
                    $row['notification_string'] = $notification_string;
                    $row['redirect_url'] = base_url('backend/melding?tab=open');
                }
                if(!empty($notificationRowData)){
                   $response[] = $row;
                }
            }
        }
        return $response;
    }

    // for get timeline post data
    public function getUserTimelineData($where='', $is_row = false, $no_rows='', $order_by='', $limit='', $offset=''){
        // $sql = "SELECT T.*, IF(T.is_contractor = 1, CONCAT_WS(' ',C.name, C.last_name), CONCAT_WS(' ',U.name, U.last_name)) as technician_name, 
        //     IF(T.picture !='', CONCAT('".base_url(TIMELINE)."', T.picture), '') as timeline_picture,
        //     IF(T.is_contractor = 1, 
        //         IF(C.picture !='', CONCAT('".base_url(PICTURE)."', C.picture), '".ADMIN_ASSETS_PATH."img/avatars/5.png'), 
        //         IF(U.picture !='', CONCAT('".base_url(PICTURE)."', U.picture), '".ADMIN_ASSETS_PATH."img/avatars/5.png')
        //     ) as technician_picture
        //     FROM ".TBL_TIMELINE." AS T 
        //     LEFT JOIN ".TBL_USERS." U ON U.user_id = T.user_id AND U.`is_delete` = 0 
        //     LEFT JOIN ".TBL_CONTRACTOR." C ON C.user_id = T.user_id AND C.`is_delete` = 0 
        //     WHERE T.is_delete = 0 ".$where." GROUP BY T.id ";

        $sql = "SELECT T.*, CONCAT_WS(' ',U.name, U.last_name) as technician_name, 
            IF(T.picture !='', CONCAT('".base_url(TIMELINE)."', T.picture), '') as timeline_picture,
            IF(U.picture !='', CONCAT('".base_url(PICTURE)."', U.picture), '".ADMIN_ASSETS_PATH."img/avatars/5.png')  as technician_picture 
            FROM tbltimeline AS T
            LEFT JOIN tbluser U ON U.user_id = T.user_id AND U.`is_delete` = 0 
             WHERE T.is_delete = 0 ".$where."  GROUP BY T.id";   

        if($order_by != null) {
            $sql .= " ORDER BY ".$order_by." ";
        }else{
            $sql .= " ORDER BY T.id DESC ";
        }
        if($is_row == true){
            $query = $this->db->query($sql);
            return $query->row_array();
        }else{
            if($limit!="" && $offset!=""){
                $sql .= " LIMIT ".$offset.", ".$limit;
            }elseif($limit!=""){
                $sql .= " LIMIT ".$limit;
            }
            $this->db->query('SET SQL_BIG_SELECTS=1');
            $query = $this->db->query($sql);
            if($no_rows!=''){
                return $query->num_rows();
            }else{
                return $query->result_array();
            }
        }
    }

    public function getPollAnswersData($where=''){
        $sql = "SELECT PA.*, IF(PA.is_contractor = 1, CONCAT_WS(' ',U.name, U.last_name)) as fullname, 
            T.poll_title, PO.title as option_title FROM ".TBL_POLL_ANSWER." AS PA 
            LEFT JOIN ".TBL_USERS." U ON U.user_id = PA.user_id AND U.`is_delete` = 0 
            LEFT JOIN ".TBL_TIMELINE." T ON T.id = PA.timeline_id AND T.`is_delete` = 0 
            LEFT JOIN ".TBL_POLL_OPTIONS." PO ON PO.id = PA.option_id AND PO.`is_delete` = 0 
            WHERE PA.is_active = 1 AND PA.is_delete = 0 ".$where." GROUP BY PA.id ORDER BY PA.id DESC ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getSurveyData($where=''){
        $sql = "SELECT S.*, CONCAT_WS(' ',U.name, U.last_name) as user_fullname, SS.name as status_name FROM ".TBL_SURVEYS." S
        LEFT JOIN " . TBL_USERS . " U ON U.user_id = S.user_id AND U.`is_delete` = 0
        LEFT JOIN " . TBL_SURVEY_STATUS . " SS ON SS.id = S.status AND SS.`is_delete` = 0
        WHERE S.is_delete=0 AND S.is_active=1 ".$where." ";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result;
    }

    public function getSurveyRecordData($where=''){
        $sql = "SELECT SR.*, CONCAT_WS(' ',U.name, U.last_name) as user_fullname, SS.name as status_name FROM ".TBL_SURVEY_RECORDS." SR
        LEFT JOIN " . TBL_SURVEYS . " S ON SR.survey_id = S.id AND S.`is_delete` = 0
        LEFT JOIN " . TBL_USERS . " U ON U.user_id = S.user_id AND U.`is_delete` = 0
        LEFT JOIN " . TBL_SURVEY_STATUS . " SS ON SS.id = SR.status AND SS.`is_delete` = 0
        WHERE SR.is_delete=0 AND SR.is_active=1 ".$where." ";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        if(!empty($result)){
            $record_id = $result['record_id'];
            $survey_id = $result['survey_id'];

            $image_select ="record_id, survey_id, type, document, document_edited, 
            IF(document !='', CONCAT('".base_url(RECORD_PHOTOS)."', document), '') as document_url,
            IF(document_edited !='', CONCAT('".base_url(RECORD_PHOTOS)."', document_edited), '') as document_edited_url";

            $imgwhere = " record_id = '".$record_id."' AND survey_id = '".$survey_id."' AND is_active = 1 AND document !='' ";
            $result['photos_type1'] = $this->Service->get_all(TBL_RECORD_PHOTOS, $image_select, $imgwhere." AND type=1");
            $result['photos_type2'] = $this->Service->get_all(TBL_RECORD_PHOTOS, $image_select, $imgwhere." AND type=2");
        }
        return $result;
    }

    public function getSurveyRecordImages($where=''){
        $sql = "SELECT SR.*, CONCAT_WS(' ',U.name, U.last_name) as user_fullname, SS.name as status_name FROM ".TBL_SURVEY_RECORDS." SR
            LEFT JOIN " . TBL_SURVEYS . " S ON SR.survey_id = S.id AND S.`is_delete` = 0
            LEFT JOIN " . TBL_USERS . " U ON U.user_id = S.user_id AND U.`is_delete` = 0
            LEFT JOIN " . TBL_SURVEY_STATUS . " SS ON SS.id = SR.status AND SS.`is_delete` = 0
            WHERE SR.is_delete = 0 AND SR.is_active = 1 ".$where." GROUP BY SR.id ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $response = array();
        if(!empty($result)){
            foreach($result as $row){
                $record_id = $row['record_id'];
                $survey_id = $row['survey_id'];

                $image_select ="id, record_id, survey_id, type, document, document_edited,document_admin, IF(document !='', CONCAT('".base_url(RECORD_PHOTOS)."', document), '') as document_url,
                    IF(document_edited !='', CONCAT('".base_url(RECORD_PHOTOS)."', document_edited), '') as document_edited_url,
                    IF(document_admin !='', CONCAT('".base_url(RECORD_PHOTOS)."', document_admin), '') as document_admin_url";

                $imgwhere = " record_id = '".$record_id."' AND survey_id = '".$survey_id."' AND is_active = 1 AND document !='' ";
                $photos = $this->Service->get_all(TBL_RECORD_PHOTOS, $image_select, $imgwhere);
                if(!empty($photos)){
                    $response = array_merge($photos, $response);
                }
            }
        }
        return $response;
    }

    
    public function getExportTimelineList($where='', $order = '', $no_rows='', $limit='', $offset='')
    {
        $sql = "SELECT T.*,CONCAT_WS(' ',U.name, U.last_name) as user_fullname,
        Group_concat(DISTINCT UR.name SEPARATOR ', ') as show_roles_name,
        Group_concat(DISTINCT CONCAT_WS(' ',U2.name, U2.last_name) SEPARATOR ', ') as show_users_name
        FROM ".TBL_TIMELINE." T 
        LEFT JOIN " . TBL_USERS . " U ON U.user_id = T.user_id AND U.`is_delete` = 0
        LEFT JOIN ".TBL_USER_ROLE." UR ON FIND_IN_SET(UR.id, T.show_roles) > 0 AND UR.`is_delete` = 0
        LEFT JOIN " . TBL_USERS . " U2 ON FIND_IN_SET(U2.user_id, T.show_users) > 0 AND U2.`is_delete` = 0
        WHERE T.`is_delete` = '0' ".$where." ";
        $sql .= " GROUP BY T.id ORDER BY ";
        if($order!=""){
            $sql .= $order;
        }else{
            $sql .= " T.id DESC";
        }
        if($limit!=""){
            $sql .= " LIMIT ".$offset.", ".$limit;
        }
        $query = $this->db->query($sql);
        if($no_rows!=''){
            return $query->num_rows();
        }else{
            return $query->result_array();
        }
    }

    public function getExportFaqList($where='', $order = '', $no_rows='', $limit='', $offset='')
    {
        $sql = "SELECT F.*, FC.title as category_name FROM ".TBL_FAQ." F 
        JOIN ".TBL_FAQ_CATEGORY." FC ON FC.id = F.category_id AND FC.`is_delete` = 0
        WHERE F.`is_delete` = '0' ".$where." ";
        $sql .= " GROUP BY F.id ORDER BY ";
        if($order!=""){
            $sql .= $order;
        }else{
            $sql .= " F.id DESC";
        }
        if($limit!=""){
            $sql .= " LIMIT ".$offset.", ".$limit;
        }
        $query = $this->db->query($sql);
        if($no_rows!=''){
            return $query->num_rows();
        }else{
            return $query->result_array();
        }
    }

    public function getNextDrawingUserID()
    {
        $drawing_user_id = "";
        $surveyData = $this->Service->get_row(TBL_USERS, '*', array('user_role' => 7, 'is_image_assign' => 0));
        if(!empty($surveyData)){
            $drawing_user_id = $surveyData['user_id'];
            $this->Service->update_row(TBL_USERS, array('is_image_assign' => 1, 'updated_time' => date("Y-m-d H:i:s")), array('user_id'=> $drawing_user_id));
        }else{
            $surveyData = $this->Service->get_row(TBL_USERS, '*', array('user_role' => 7));
            if(!empty($surveyData)){
                $this->Service->update_row(TBL_USERS, array('is_image_assign' => 0, 'updated_time' => date("Y-m-d H:i:s")), array('user_role' => 7, 'is_image_assign' => 1));
                $drawing_user_id = $this->getNextDrawingUserID();
            }
        }
        return $drawing_user_id;
    }
    
    public function getSurveyVisitQty($where=''){
        $sql = "SELECT COUNT(SA.id) as total FROM " . TBL_SURVEY_ACTION . " SA
            JOIN " . TBL_SURVEYS . " S ON SA.survey_id = S.id AND S.is_active = '1' AND S.`is_delete` = 0
            JOIN " . TBL_USERS . " U ON U.user_id = SA.user_id AND U.is_active = '1' AND U.`is_delete` = 0
            JOIN " . TBL_PROJECT . " P ON P.id = S.project_id AND P.`is_delete` = 0
            WHERE SA.is_active = '1' AND SA.is_delete = '0' ".$where." ";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        $response = (isset($result['total']))? $result['total']:0;
        return $response;
    }

    public function getSurveyCounts($user_id, $where="") {
        $sql = "SELECT S.id FROM " . TBL_SURVEYS . " S 
            LEFT JOIN " . TBL_SURVEY_STATUS . " SS ON SS.id = S.status AND SS.`is_delete` = 0 
            LEFT JOIN " . TBL_USERS . " user ON user.user_id = S.sucess_user_id AND user.`is_delete` = 0 
            LEFT JOIN " . TBL_RECORD_PHOTOS . " RP ON RP.survey_id = S.id AND RP.`is_delete` = 0 
            LEFT JOIN " . TBL_USERS . " DU ON DU.user_id = S.drawing_user_id AND DU.`is_delete` = 0 
            WHERE S.is_active = 1 AND S.is_delete = 0 ".$where." GROUP BY S.id ";
        // pr($sql); die();
        $surveyData = $this->db->query($sql)->result_array();
        return (!empty($surveyData)) ? count($surveyData):0;
    }

    public function getSurveyActionDate($survey_id="") {
        $SQL = 'SELECT action.*, CONCAT_WS(" ",user.name,user.last_name) AS full_name,status.name as surveys_status,
            (CASE
                WHEN surveys.drawing_status = 1 THEN "Finish"
                WHEN surveys.drawing_status = 2 THEN CONCAT("Return", " (", surveys.drawing_user_remark, ")")
                WHEN surveys.drawing_status = 3 THEN CONCAT("Drawing Return", " (", surveys.drawing_user_remark, ")")
                WHEN surveys.drawing_status = 4 THEN "Checkup"
                WHEN surveys.drawing_status = 5 THEN "Confirmed"
                ELSE IF(surveys.status = 11, "Drawing", "") 
            END) as surveys_drawing_status FROM tblsurvey_action as action 
            LEFT JOIN tblsurveys AS surveys ON surveys.id=action.survey_id
            LEFT JOIN tblsurvey_status AS status ON  status.id=action.status
            LEFT JOIN tbluser as user ON user.user_id = action.user_id 
            WHERE action.survey_id='.$survey_id.' ORDER BY action.id ASC ';
        return $this->db->query($SQL)->result_array();
    }

    public function getSurveyLastActionDate($survey_id="") {
        $SQL = 'SELECT action.*, CONCAT_WS(" ",user.name,user.last_name) AS full_name,status.name as surveys_status,
            (CASE
                WHEN surveys.drawing_status = 1 THEN "Finish"
                WHEN surveys.drawing_status = 2 THEN CONCAT("Return", " (", surveys.drawing_user_remark, ")")
                WHEN surveys.drawing_status = 3 THEN CONCAT("Drawing Return", " (", surveys.drawing_user_remark, ")")
                WHEN surveys.drawing_status = 4 THEN "Checkup"
                WHEN surveys.drawing_status = 5 THEN "Confirmed"
                ELSE IF(surveys.status = 11, "Drawing", "") 
            END) as drawing_status_name 
            FROM tblsurvey_action as action 
            LEFT JOIN tblsurveys AS surveys ON surveys.id=action.survey_id
            LEFT JOIN tblsurvey_status AS status ON  status.id=action.status
            LEFT JOIN tbluser as user ON user.user_id = action.user_id 
            WHERE action.survey_id='.$survey_id.' ORDER BY action.id DESC ';
        $row = $this->db->query($SQL)->row_array();

        $result = "";
        if(!empty($row)){
            $full_name = isset($row['full_name']) ? $row['full_name'] : '';
            $created_time = isset($row['created_time']) ? $row['created_time'] : '';
            $surveys_status = isset($row['surveys_status']) ? $row['surveys_status'] : '';
            $drawing_status_name = isset($row['drawing_status_name']) ? $row['drawing_status_name'] : '';
            if ($row['type'] == 'change_status') {
                $result .= $full_name." set status to ".$surveys_status." at ".$created_time;
            }
            if ($row['type'] == 'change_drawing_status') {
                $result .= $full_name." set drawing status to ".$drawing_status_name." at ".$created_time;
            }
            else if ($row['type'] == 'create_record') {
                $result .= $full_name." created record at ".$created_time;
            }
            else if ($row['type'] == 'assign_address') {
                $result .= "Assign address to ".$full_name." at ".$created_time;
            }
        }
        return $result;
    }

    public function generate_blank_record($survey_id) {
        $surveyData = $this->Service->get_row(TBL_SURVEYS, '*', array('id' => $survey_id));
        
        if(empty($surveyData['drawing_user_id'])){
            $drawing_user_id = $this->Service->getNextDrawingUserID();
            if(!empty($drawing_user_id)){
                $this->Service->update_row(TBL_SURVEYS, array('drawing_user_id' => $drawing_user_id, 'updated_time' => date("Y-m-d H:i:s")), array('id'=> $survey_id));
            }
        }
        
        $recordData = $this->Service->get_row(TBL_SURVEY_RECORDS, '*', array('survey_id' => $survey_id));
        if(!empty($recordData)){
            $record_id = $recordData['record_id'];
        }else{
            $record_id = strtoupper(generateUniqueCode('RC', TBL_SURVEY_RECORDS, 'record_id'));
            $saveData = array(
                'record_id' => $record_id,
                'survey_id' => $survey_id,
                'address' => (isset($surveyData['address']))? $surveyData['address']:'',
                'postal_code' => (isset($surveyData['postal_code']))? $surveyData['postal_code']:'',
                'house_number' => (isset($surveyData['house_number']))? $surveyData['house_number']:'',
                'bus_number' => (isset($surveyData['bus_number']))? $surveyData['bus_number']:'',
                'status' => 9,
                'updated_time' => date("Y-m-d H:i:s"),
                'created_time' => date("Y-m-d H:i:s"),
            );
            $surey_record_id = $this->Service->insert_row(TBL_SURVEY_RECORDS, $saveData);

            $recordData = $this->Service->get_row(TBL_SURVEY_RECORDS, '*', array('record_id' => $record_id));
        }
        return $recordData;
    }

} ?>
