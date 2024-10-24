<?php
class Api_model extends MY_Model {

    public function __construct() {
        parent::__construct();
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

    //for generate unique acces access_token for user
    public function generateToken($uniqval = '', $len = 30) {
        if ($uniqval == "" || $uniqval == null) {
            $uniqval = time();
            //echo $uniqval;
        }
        $hex = md5($uniqval . uniqid("", true));
        $pack = pack('H*', $hex);
        $uid = base64_encode($pack);
        $uid = str_replace("==", "", $uid);
        $uid = str_replace("+", "", $uid);
        $uid = str_replace("/", "", $uid);
        $uid = preg_replace("[^A-Z0-9]", "", strtoupper($uid));
        if ($len < 4)
            $len = 4;
        if ($len > 128)
            $len = 128;
        while (strlen($uid) < $len)
            $uid = $uid . $this->generateToken($uniqval, 20);
        return substr($uid, 0, $len);
    }
    
    // for get list
    public function getResultList(){
        $sql = "";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
?>