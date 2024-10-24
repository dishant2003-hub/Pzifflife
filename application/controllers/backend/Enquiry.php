<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry extends MY_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
    }

    public function index(){
        $data['menu']='Enquiry';
        $data['title']='Enquiry';

        $data['view'] = 'backend/enquiry/page_list';
        $this->renderAdmin($data);
    }

    public function getListData(){
        $this->get_table_data('enquiry', []);
    }

    public function delete(){
        $id = $this->input->post('id');
        $result=$this->Service->set_delete(TBL_ENQUIRY,array('id'=>$id));
        if(!empty($result)){
            echo true;
        }else{ echo false; }
    }


}