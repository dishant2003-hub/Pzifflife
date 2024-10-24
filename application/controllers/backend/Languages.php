<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Languages extends MY_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
    }

    public function index() {
        $data['title'] = "Languages";
        $data['menu'] = "Languages";
        $data['view'] = 'backend/languages/page_list';
        $this->renderAdmin($data);
    }

    public function getAjaxListData(){
        $this->get_table_data('languages', []); //table name
    }
    
    public function add($id="")
    {
        $data['title'] = "Language";
        $data['menu'] = "Language";
        if($id!=""){
            $rowData = $this->Service->get_row(TBL_LANGUAGE, '*', array('id' =>$id));
            $data['rowData'] = $rowData;
        }

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('key', 'Key', 'required');
            if ($this->form_validation->run() != FALSE) {
                $saveData = array(
                    'title' => $this->input->post('title'),
                    'key' => $this->input->post('key'),
                    'updated_time' => date("Y-m-d H:i:s"),
                );
                if($id!=""){
                    $this->Service->update_row(TBL_LANGUAGE, $saveData, array('id' =>$id));
                    $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
                }else{
                    $saveData['created_time'] = date("Y-m-d H:i:s");
                    $this->Service->insert_row(TBL_LANGUAGE, $saveData);
                    $this->session->set_flashdata('success_msg', $this->getNotification('recAddSuc'));
                }
                redirect(base_url('backend/languages'));
            }
        }
        $data['view'] = 'backend/languages/page_form';
        $this->renderAdmin($data);
    }

    public function delete_record(){
        $id=$this->input->post('record_id');
        if($this->Service->update_row(TBL_LANGUAGE, array('is_delete'=> 1), array('id' =>$id))){
            echo '1';
        }else{
            echo '0';
        }
    }

    public function change_status() {
        $id = $this->input->post('record_id');
        $status = $this->input->post('status');
        if($this->Service->update_row(TBL_LANGUAGE, array('is_active'=> $status), array('id' =>$id))){
            echo '1';
        }else{
            echo '0';
        }
    }

}
?>