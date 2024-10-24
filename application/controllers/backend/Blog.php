<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
    }

    public function index(){
        $data['menu']='Blog';
        $data['title']='Blog';

        $data['view'] = 'backend/blog/page_list';
        $this->renderAdmin($data);
    }

    public function getListData(){
        $this->get_table_data('blog', []);
    }

    public function add($id='') 
    {
        $data['menu']='Add Blog';
        $data['title']='Add Blog';
        
        if($id!=''){
            $data['menu']='Edit Blog';
            $data['title']='Edit Blog';
            $data['BlogData']=$BlogData=$this->Service->get_row(TBL_BLOG,'*',array('id'=>$id,'is_delete'=>0));  
        }
        $data['categorylist'] = $this->Service->get_all(TBL_CATEGORY,'*',array('parent_id' => 0,'is_active'=>1,'is_delete' => 0));
        
        if(!empty($this->input->post('submit')))
        {
            // pr($_FILES);
            // pr($_POST);die;
            $title = $this->input->post('title');
            $category = $this->input->post('category');
            $saveData=array(                 
                'category'  =>  $category,
                'title'     =>  $title,
                'short_desc'      =>  $this->input->post('short_desc'),
                'type'      =>  $this->input->post('type'),
                'desc'      =>  $this->input->post('desc'),
                'meta_title'      => isset($_POST['meta_title']) ?   $this->input->post('meta_title'):'',
                'meta_keyword'      => isset($_POST['meta_keyword']) ?   $this->input->post('meta_keyword'):'',
                'meta_desc'      => isset($_POST['meta_desc']) ?   $this->input->post('meta_desc'):'',
                'og_title'      => isset($_POST['og_title']) ?   $this->input->post('og_title'):'',
                'og_desc'      => isset($_POST['og_desc']) ?   $this->input->post('og_desc'):'',
                'created_time'=>    date('Y-m-d H:i:s'),
            );
            if(!empty($_FILES['image']['name'])) {
                $temp_file = $_FILES['image']['tmp_name'];
                $file_name = $_FILES['image']['name'];
                $ext = pathinfo($file_name,PATHINFO_EXTENSION);
                $imgname ='blog'.time().'.'.$ext;
                $file_url=BLOG.$imgname; 
                if (isset($BlogData['image']) && $BlogData['image'] != "" && file_exists(BLOG . $BlogData['image'])) {
                    unlink(BLOG . $BlogData['image']);
                }
                move_uploaded_file($temp_file,$file_url);
                $saveData['image']=$imgname;
            }
            if($id!=''){
                $this->Service->update_row('tblblog',$saveData,array('id'=>$id));
            }else{
                $saveData['slug'] = $this->Service->categorySlug(TBL_BLOG, $title);
                $id=$this->Service->insert_row('tblblog',$saveData);
            }
            
            redirect(base_url('backend/blog'));
        }
        $data['view'] ='backend/blog/page_edit';
        $this->renderAdmin($data);  
    }

    public function delete(){
        $blog_id = $this->input->post('id');
        $result=$this->Service->set_delete(TBL_BLOG,array('id'=>$blog_id));
        if(!empty($result)){
            echo true;
        }else{ echo false; }
    }


}