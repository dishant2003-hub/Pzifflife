<?php

use PhpOffice\PhpSpreadsheet\Calculation\Financial\CashFlow\Constant\Periodic;

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
        $this->load->library('pagination');
    }


    public function index(){
        $data['menu'] = 'Gallery';
        $data['title'] = 'Gallery';

        $limit = 11;
		    $total_records = count($this->Service->get_all(TBL_GALLERY, '*', array('is_active' => 1, 'is_delete' =>0)));
            $url = 'backend/gallery/';
            $total_page = ceil($total_records / $limit);

            $page = isset($_GET['page']) ? $this->input->get('page') : 1;
            $data['links'] = generatePagination($page, $total_page, 5, $url);
            $offset = 0;
            if ($page != "") {
                $offset = ($limit * ($page - 1));
            }
            $data["savedata"] = $this->Service->get_all(TBL_GALLERY, '*', array('is_active'=>1, 'is_delete'=>0), [], [], $limit, $offset);
        $data['view'] = 'backend/gallery/page_list';
        $this->renderAdmin($data);
    }

    public function dropzone()
    {
        if (isset($_FILES['files']['name']) && !empty($_FILES['files']['error'])) {
            for ($i = 0; $i <= count($_FILES['files']['name']); $i++) {
                if(!empty($_FILES['files']['name'])) {
                    $temp_file = $_FILES['files']['tmp_name'];
                    $file_name = $_FILES['files']['name'];
                    $ext = pathinfo($file_name,PATHINFO_EXTENSION);
                    $imgname ='gallery'.time().'.'.$ext;
                    $file_url=GALLERY.$imgname; 
                
                    move_uploaded_file($temp_file,$file_url);       
                    $saveData['image']=$imgname;
                }
            }
        }
        // pr($saveData['image']);die; 
        $saveData['created_time'] = date('Y-m-d H:i:s');
        $this->Service->insert_row(TBL_GALLERY,$saveData);
    }

    public function delete(){
        $id = $this->input->post('id');
        
        $imageData =  $this->Service->get_row(TBL_GALLERY, 'image', array('id' => $id));
        if (!empty($imageData)) {
            unlink(GALLERY . $imageData['image']);
        }
        $result = $this->Service->hard_delete(TBL_GALLERY, array('id' => $id));
        echo $result;exit;

    }


}