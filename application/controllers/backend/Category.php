<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
    }


    public function index(){
        $data['menu']='Category';
        $data['title']='Category';

        $data['view'] = 'backend/category/page_list';
        $this->renderAdmin($data);
    }

    public function getcategoryListData(){
        $this->get_table_data('category', []);
    }

    public function add($id='')
    {
        $data['menu']='ADD CATEGORY';
        $data['title']='ADD CATEGORY';
        // $data['main_category'] = $this->Service->get_all(TBL_CATEGORY,'*',array('parent_id'=>0,'category'=>0));

        if($id!=''){
            $data['menu']='EDIT CATEGORY';
            $data['title']='EDIT CATEGORY';
            $data['CategoryData'] =$categoryData= $this->Service->get_row(TBL_CATEGORY,'*',array('id'=>$id));
        }

        if (!empty($this->input->post('submit'))) {
          $saveData = array(
                'name'       => $this->input->post('category_name'), 
                'cate_type'  => $this->input->post('cate_type'), 
                'desc'  => $this->input->post('desc'), 
                );
               !empty($_POST['category_id']) ? $saveData['parent_id'] = $this->input->post('category_id'):'';
               $saveData['updated_time'] = date('Y-m-d H:i:s');
            if(!empty($id)){
                $slug = $categoryData['slug'];
            }else{
                $slug = $this->Service->categorySlug(TBL_CATEGORY, $saveData['name']);
                $saveData['slug'] = $slug;
            }
            if(!empty($id)){
                $this->Service->update_row(TBL_CATEGORY,$saveData,array('id' => $id));
            }else{ 
                $saveData['created_time'] = date('Y-m-d H:i:s');
                $this->Service->insert_row(TBL_CATEGORY,$saveData);
            }

            $this->session->set_flashdata('success_msg', ' Successfully Category Upload');
            redirect(base_url('backend/category'));
        }

        $data['view'] = 'backend/category/page_edit';
        $this->renderAdmin($data);
    }

    public function delete(){
        $id = $this->input->post('id');
        $result=$this->Service->set_delete(TBL_CATEGORY,array('id'=>$id));
        echo $result;exit;
    }

    public function change_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if ($this->Service->update_row(TBL_CATEGORY, array('is_active' => $status), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }

}