<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MY_Controller
{
    /*
    * Status codes :
    * 0 - Fail/ No data
    * 1 - Success
    * 2 - Invalid accesstoken
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('Api_model', 'api');
    }

    //for get splash screen data
    public function splashScreen()
    {
        $response['status'] = 1;
        $data = array();
        $response['data'] = $data;
        $response['message'] = $this->getNotification('recListSuc');
        $this->response($response);
    }
}
