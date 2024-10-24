<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
    }

    public function getListData(){
        $this->get_table_data('contact', []);
    }

    public function index(){
        $data['menu']='Contact';
        $data['title']='Contact';

        $data['view'] = 'backend/contact_us/page_list';
        $this->renderAdmin($data);
    }

    public function delete(){
        $blog_id = $this->input->post('id');
        $result=$this->Service->set_delete(TBL_CONTACT_US,array('id'=>$blog_id));
        if(!empty($result)){
            echo true;
        }else{ echo false; }
    }

}