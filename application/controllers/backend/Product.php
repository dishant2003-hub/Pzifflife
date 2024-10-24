<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
    }

    public function index(){
        $data['menu']='Product';
        $data['title']='Product';

        $data['view'] = 'backend/product/page_list';
        $this->renderAdmin($data);
    }

    public function getListData(){
        $this->get_table_data('product', []);
    }

    public function add($id = "")
    {
        if(!empty($id)){
            $data['menu'] = 'Edit Product';
            $data['title'] = 'Edit Product';
            $data['productData'] = $this->Service->get_row(TBL_PRODUCT, '*', array('id' => $id));
        }else{
            $data['menu'] = 'Add Product';
            $data['title'] = 'Add Product';
        }

        $data['category'] = $this->Service->get_all(TBL_CATEGORY, '*', array('parent_id' => 0, 'is_active' => 1));
        $data['product_type'] = $this->Service->get_all(TBL_PRODUCT_TYPE, '*', array('is_active' => 1));

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('name', 'Product Name', 'required');
            if ($this->form_validation->run() != FALSE) {
                $productArr = array(
                    'category'    => $this->input->post('category'),
                    'product_name'    => $this->input->post('name'),
                    'trade_name' => $this->input->post('trade'),
                    'available_strength'      => $this->input->post('avg_strength'),
                    'packing'  => $this->input->post('packing'),
                    'Insert_Leaflet'  => $this->input->post('Pack'),
                    'therapeutic'          => $this->input->post('therapeutic'),
                    'production_capacity'  => $this->input->post('Pro_capacity'),
                    'product_type'        => $this->input->post('product_type'),
                    'meta_title'    => $this->input->post('meta_title'),
                    'meta_desc'     => $this->input->post('meta_desc'),
                    'meta_tags'     => $this->input->post('meta_tags'),
                    'og_meta_title' => $this->input->post('og_meta_title'),
                    'og_meta_desc'  => $this->input->post('og_meta_desc'),
                    'description'   => $this->input->post('description'),
                );

                if(!empty($id)){
                    // $slug = $categoryData['slug'];
                }else{
                    $slug = $this->Service->categorySlug(TBL_PRODUCT, $productArr['product_name']);
                    $productArr['slug'] = $slug;
                }

                if (!empty($id)) {
                    $productArr['updated_time'] = date('Y-m-d H:i:s');
                    $this->Service->update_row(TBL_PRODUCT, $productArr, array('id' => $id));
                } else {
                    $productArr['created_time'] = date('Y-m-d H:i:s');
                    $pID = $this->Service->insert_row(TBL_PRODUCT, $productArr);
                }
               
                $this->session->set_flashdata('success_msg', ' Successfully Product Upload');
                redirect(base_url('backend/product'));
            }
        }

        $data['view'] = 'backend/product/page_edit';
        $this->renderAdmin($data);
    }

    public function delete(){
        $id = $this->input->post('id');
        $result=$this->Service->set_delete(TBL_PRODUCT,array('id'=>$id));
        echo $result;exit;
    }

    public function change_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if ($this->Service->update_row(TBL_PRODUCT, array('is_active' => $status), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }

    
    public function upload_product_image()
    {
        $data['product_id'] = $product_id = $this->input->post('proid');
        $data['images'] = $this->Service->get_all(TBL_PRODUCT_IMG, '*', array('product_id' => $product_id));
        $this->load->view('backend/product/product_images', $data);
    }

    public function upload_product()
    {
        $targetDir = PRODUCT;
        if (!empty($_FILES)) {
            $product_id = $this->input->post('product_id');
            $proname = $this->Service->getCustomName(TBL_PRODUCT, 'slug', array('id' => $product_id));
            foreach ($_FILES['images']['name'] as $key => $image) {
                if ($_FILES['images']['error'][$key] == 0) {
                    
                    // pr($_FILES);die;

                    $allowTypes = array('jpg', 'png', 'jpeg');
                    $temp_file = $_FILES['images']['tmp_name'][$key];
                    $img_name = $proname . "" . mt_rand(100000, 9999999);
                    $path = $_FILES['images']['name'][$key];
                    $fileType = pathinfo($path, PATHINFO_EXTENSION);
                    $imgUrl = $img_name . "." . $fileType;
                    $targetFilePath = PRODUCT . $imgUrl;
                    if (in_array($fileType, $allowTypes)) {
                        $imgData = array(
                            'product_id'        => $product_id,
                            'file'              => $imgUrl,
                            'created_time'      => date('Y-m-d H:i:s'),
                            'updated_time'      => date('Y-m-d H:i:s')
                        );

                        // Upload file to the server 
                        if (move_uploaded_file($temp_file, $targetFilePath)) {
                            $this->Service->insert_row(TBL_PRODUCT_IMG, $imgData);
                            $this->load->library('image_lib');
                            $configer =  array(
                                'image_library'   => 'gd2',
                                'source_image'    =>  $targetFilePath,
                                'maintain_ratio'  =>  TRUE,
                                'width'           =>  500,
                                'height'          =>  'auto',
                            );
                            $this->image_lib->clear();
                            $this->image_lib->initialize($configer);
                            $this->image_lib->resize();

                            switch ($fileType) {
                                case 'jpg':
                                    $im = imagecreatefromjpeg($targetFilePath);
                                    break;
                                case 'jpeg':
                                    $im = imagecreatefromjpeg($targetFilePath);
                                    break;
                                case 'png':
                                    $im = imagecreatefrompng($targetFilePath);
                                    break;
                                default:
                                    $im = imagecreatefromjpeg($targetFilePath);
                            }

                            // Save image and free memory 
                            imagepng($im, $targetFilePath);
                            imagedestroy($im);

                            if (file_exists($targetFilePath)) {
                                $statusMsg = "The image has been uploaded successfully.";
                            } else {
                                $statusMsg = "Image upload failed, please try again.";
                            }
                        } else {
                            $statusMsg = "Sorry, there was an error uploading your file.";
                        }
                    } else {
                        $statusMsg = 'Sorry, only JPG, JPEG, and PNG files are allowed to upload.';
                    }
                }
            }
            $data['success'] = $statusMsg;
        }
        echo json_encode($data);
        die;
    }
    
    public function delete_image()
    {
        $img = $this->input->post('img');
        $imageData =  $this->Service->get_row(TBL_PRODUCT_IMG, 'file', array('id' => $img));
        if (!empty($imageData)) {
            unlink(PRODUCT . $imageData['file']);
        }
        $this->Service->hard_delete(TBL_PRODUCT_IMG, array('id' => $img));
        echo true;
        die;
    }

}