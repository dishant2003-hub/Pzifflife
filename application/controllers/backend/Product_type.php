<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_type extends MY_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
    }

    public function index(){
        $data['menu']='Product Type';
        $data['title']='Product Type';

        $data['view'] = 'backend/product_type/page_list';
        $this->renderAdmin($data);
    }

    public function getListData(){
        $this->get_table_data('product_type', []);
    }

    public function add($id='') 
    {
        $data['menu']='Add Product Type';
        $data['title']='Add Product Type';
        
        if($id!=''){
            $data['menu']='Edit Product Type';
            $data['title']='Edit Product Type';
            $data['savedata'] = $this->Service->get_row(TBL_PRODUCT_TYPE,'*',array('id'=>$id,'is_delete'=>0));  
        }
        $data['categorylist'] = $this->Service->get_all(TBL_CATEGORY,'*',array('parent_id' => 0,'is_active'=>1,'is_delete' => 0));
        
        if(!empty($this->input->post('submit')))
        {
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run() != FALSE) {
            $saveData=array(                 
                'type'  =>  $this->input->post('dosage'),
                'name'      =>  $this->input->post('name'),
                'slug'      =>  $this->input->post('slug'),
                'image'      =>  $this->input->post('image'),
                'color'      =>  $this->input->post('color'),
                'title'      =>  $this->input->post('title'),
                'desc'      =>  $this->input->post('desc'),
            );
            if(!empty($id)){
                $saveData['updated_time'] = date('Y-m-d H:i:s');
                $this->Service->update_row(TBL_PRODUCT_TYPE,$saveData,array('id' => $id));
                $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
            }else{ 
                $saveData['created_time'] = date('Y-m-d H:i:s');
                $this->Service->insert_row(TBL_PRODUCT_TYPE,$saveData);
                $this->session->set_flashdata('success_msg', $this->getNotification('recAddSuc'));
            }
            
            redirect(base_url('backend/product_type'));
        }
        }
        $data['view'] ='backend/product_type/page_edit';
        $this->renderAdmin($data);  
    }

    public function footer_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if ($this->Service->update_row(TBL_PRODUCT_TYPE, array('is_footer' => $status), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }

}