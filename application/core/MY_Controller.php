<?php
require_once 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MY_Controller extends CI_Controller {

    public $setting_data;
    public $language_list;
    public $non_sterile;
    public $sterile;
    public $login_user_data;
    public $user_permission;
    public $user_notifications;
    public $user_type;

    function __construct() {
        parent::__construct();
        $this->load->library('upload');

        $this->setting_data = $this->Service->get_row(TBL_SETTING,'*', array('setting_id' => 1));
        $this->language_list = $this->Service->get_all(TBL_LANGUAGE,'*', array('is_active' => 1));
        $this->non_sterile = $this->Service->get_all(TBL_PRODUCT_TYPE, '*', array('is_footer'=>0, 'is_active'=> 1, 'is_delete' => 0));
        $this->sterile = $this->Service->get_all(TBL_PRODUCT_TYPE, '*', array('is_footer'=>1, 'is_active'=> 1, 'is_delete' => 0));

        // for get login user data
        // $backend_userroles = array(1,3,4,5);
        if ($this->session->has_userdata('user_type')) {
            $user_type = $this->user_type = $this->session->userdata('user_type');
            $role_type = $this->Service->getCustomName(TBL_USER_ROLE, 'role_type', array('id'=>$user_type));
            // if(in_array($user_type, $backend_userroles)){
            if($role_type==1 || $user_type==1){
                $login_user_id = $this->session->userdata('admin_id');
            }else{
                $login_user_id = $this->session->userdata('user_id');
            }
            $this->login_user_data = $this->Service->get_row(TBL_USERS, "*,  CONCAT_WS(' ',name, last_name) as fullname", array('user_id' => $login_user_id));
            if(!empty($login_user_id)){
                $this->user_permission = $this->Service->getUserPermission($user_type);
            }
        }
    }
    
    public function getNotification($key=""){
        $result = "No notification found";
        if(!empty($key)){
            $query = $this->db->get_where(TBL_LANGUAGE_KEY, array('is_active' => 1,'key' => $key));
            $notificationData = $query->row_array();
            if(!empty($notificationData)){
                $result = $notificationData['value_en'];
            }
        }
        return $result;
    }

    protected function get_table_data($table, $params = [], $is_front=false)
    {
        foreach ($params as $key => $val) {
            $$key = $val;
        }
        $customFieldsColumns = [];
        if($is_front){
            $path = VIEWPATH . 'front/tables/' . $table . '.php';
            if (file_exists(VIEWPATH . 'front/tables/my_' . $table . '.php')) {
                $path = VIEWPATH . 'front/tables/my_' . $table . '.php';
            }
        }else{
            $path = VIEWPATH . 'backend/tables/' . $table . '.php';
            if (file_exists(VIEWPATH . 'backend/tables/my_' . $table . '.php')) {
                $path = VIEWPATH . 'backend/tables/my_' . $table . '.php';
            }
        }
        include_once($path);
        echo json_encode($output);
        exit;
    }

    public function generateLog($response=""){
        //$requestParameter = file_get_contents('php://input');
        $requestParameter = $_REQUEST;
        $requestUrl = base_url(uri_string());
        //echo "<pre>"; print_r($requestParameter); die();
        $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL;
        $log .= "URL: ".$requestUrl.PHP_EOL;
        $log .= "Parameter: ".json_encode($requestParameter).PHP_EOL;
        if(!empty($response)){
            //$log .= "Response: ".json_encode($response).PHP_EOL;
        }
        $log .= "--------------------------------------------------".PHP_EOL.PHP_EOL;
        file_put_contents('application/logs/log_'.date("d_M_Y").'.log', $log, FILE_APPEND);
    }

    public function response($response) {
        if(empty($response['data'])){
            $response['data'] = null;
        }
        if(empty($response['status'])){
            $response['status'] = 0;
        }
        if(empty($response['message'])){
            $response['message'] = "No Message found.";
        }
        header('Content-Type:application/json');
        echo json_encode($response);
        // $this->generateLog($response);
        exit();
    }

    public function renderPartial($data=""){
        if(!empty($data['view'])){
            if(is_array($data['view'])){
                foreach($data['view'] as $view){
                    $this->load->view($view, $data);
                }
            }else{
                $this->load->view($data['view'], $data);
            }
        }
    }

    public function render($data=""){
        $this->visitorss("tblvisitors");

        $this->load->view('front/layout/header', $data);
        $this->load->view('front/layout/navbar', $data);
        if(!empty($data['view'])){
            if(is_array($data['view'])){
                foreach($data['view'] as $view){
                    $this->load->view($view, $data);
                }
                // $this->load->view($data['view']);
            }else{
                $this->load->view($data['view'], $data);
            }
        }
        $this->load->view('front/layout/footer', $data);
    }
    
    public function renderAdmin($data=""){
        $this->load->view('backend/layout/header', $data);
        // $this->load->view('backend/layout/sidebar', $data);
        $this->load->view('backend/layout/navbar', $data);
        if(!empty($data['view'])){
            if(is_array($data['view'])){
                foreach($data['view'] as $view){
                    $this->load->view($view, $data);
                }
            }else{
                $this->load->view($data['view'], $data);
            }
        }
        $this->load->view('backend/layout/footer', $data);
    }

    public function details_visitor(){
        $date = $this->input->post('date');
        if(!empty($date)){
            $sql = "SELECT country, count(ID) as total
                    FROM `tblvisitors`
                    WHERE date(created_time) = '".$date."'
                    GROUP by country
                    ORDER BY count(ID) DESC";
            $data['resultData'] = $this->db->query($sql)->result_array();
            $this->load->view('backend/country_visitor',$data);
        }
    }

    public function visitorss($tab=TBL_VISITOR){
        $ip_address = $this->input->ip_address(); 
        $cr_date=date("Y-m-d");
        $savedata=array(
            'ip_address' => $ip_address, 
            'created_time' => date("Y-m-d H:i:s"),
            'updated_time' => date("Y-m-d H:i:s"),
        );
        $ExitVisitrecord=$this->Service->get_row($tab, 'ID', array('ip_address' => $ip_address, 'DATE(created_time)'=>$cr_date));
        if (empty($ExitVisitrecord)) {
            $link = $_SERVER['PHP_SELF'];
            $segment = $this->uri->segment_array();
            $savedata['type'] = end($segment);
            $Ipdata = $this->ip_info($ip_address);
            $savedata['country'] = !empty($Ipdata['country']) ? $Ipdata['country']:'';
            $savedata['state'] = !empty($Ipdata['state']) ? $Ipdata['state']:'';
            $this->Service->insert_row($tab, $savedata);
        } 
    }

    function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), '', strtolower(trim($purpose))); 
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        return $output;
    }
  
    /**
     *
     * @param string $to email to
     * @param string $subject email subject
     * @param string $message email message
     * @param array $attachments email attachments
     * @return boolean
     */
    public function sendMail($to, $subject, $message, $attachments = null) {
        $mail = new PHPMailer(true);

        $from_email = (!empty($this->setting_data['from_email']))?$this->setting_data['from_email']:$this->config->item('from_email');
        try {
            if(isset($this->config->item('mail')['protocol']) && $this->config->item('mail')['protocol']=='smtp'){
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Mailer = "smtp";
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $from_email;
                $mail->Password = "";
                $mail->SMTPSecure = "tls";
                $mail->Port = 587;
            }
            $mail->setFrom($from_email, SITE_TITLE);
            if(strpos($to, ",") == false ) {
                $mail->addAddress($to);
            } else {
                $toEmailArray = explode(",",$to);
                $mail->addAddress($mail->Username);
                foreach($toEmailArray as $toEmail) {
                    $mail->addBCC($toEmail);
                }
            }
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            if(is_array($attachments)) {
                foreach($attachments as $attachment) {
                    if(file_exists($attachment)) {
                        $mail->addAttachment($attachment);
                    }
                }
            }
            if(!$mail->send()) {
                $this->generateLog($mail->ErrorInfo);
            }
        } catch (Exception $e) {
            $this->generateLog($e->getMessage());
        }
        $mail->clearAddresses();
        $mail->clearAttachments();
        return true;
    }

} ?>