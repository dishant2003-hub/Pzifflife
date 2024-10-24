<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends MY_Controller
{
    public $user_type;
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->has_userdata('user_type')) {
        //     $this->user_type = $this->session->userdata('user_type');
        // }
    }    

    public function category($slug)
    {
        $data['title'] = "Finished Products";
        $data['menu'] = "Finished Products";
        
        $data['product_type'] = $this->Service->get_all(TBL_PRODUCT_TYPE, '*', array( 'is_footer' => 1, 'is_active'=> 1, 'is_delete' => 0));
        $data['category'] = $this->Service->get_all(TBL_CATEGORY, '*', array('is_active'=> 1, 'is_delete' => 0));

        $data['type'] = $type = $this->Service->get_row(TBL_PRODUCT_TYPE, '*', array('slug'=>$slug, 'is_active'=> 1, 'is_delete' => 0));
        $id = $type['id'];

        $data['resultProduct'] = $this->Service->get_all(TBL_PRODUCT, ['product_name','slug'], array('product_type'=>$id, 'is_active'=> 1, 'is_delete' => 0));

        $data['view'] = 'front/category_finished_product';
        $this->render($data);
    }


    public function category_details($slug )
    {
        $data['title'] = "Finished Products";
        $data['menu'] = "Finished Products";
        
        $data['product_type'] = $this->Service->get_all(TBL_PRODUCT_TYPE, '*', array('is_footer' => 1, 'is_active'=> 1, 'is_delete' => 0));
        $data['category'] = $this->Service->get_all(TBL_CATEGORY, '*', array('is_active'=> 1, 'is_delete' => 0));
        
        $data['cate'] = $cate = $this->Service->get_row(TBL_CATEGORY, ['name', 'slug', 'id'], array('slug'=>$slug, 'is_active'=> 1, 'is_delete' => 0));

        
        $product_type = $this->Service->get_all(TBL_PRODUCT_TYPE, 'id,name,slug,title', array('is_active' => 1));

        $products = [];
        if(!empty($product_type)){
            foreach($product_type as $typeval){

                $product_type = $this->Service->get_all(TBL_PRODUCT, '*', array('category'=>$cate['id'], 'product_type'=>$typeval['id'], 'is_active' => 1));
                if(!empty($product_type)){
                    $products[$typeval['name']] = $product_type;
                }
            }
        }
        $data['products'] = $products;

        $data['view'] = 'front/single_product';
        $this->render($data);
    }

    public function finished($slug)
    {
        $data['product'] = $product = $this->Service->get_row(TBL_PRODUCT,'*', array('slug'=>$slug, 'is_active'=> 1, 'is_delete' => 0));

        $data['title'] = $product['product_name'];
        $data['menu'] = $product['product_name'];
        
        $data['category'] = $this->Service->get_all(TBL_CATEGORY, '*', array('is_active'=> 1, 'is_delete' => 0));

        $data['pro_images'] = $this->Service->get_all(TBL_PRODUCT_IMG, '*', array('product_id' => $product['id']));

        if($this->input->post('inquiresubmit')){
            $saveData=array(                 
                'product_id'    => $this->input->post('product_id'),
                'email'         => $this->input->post('email'),
                'phone_no'      => $this->input->post('phone_no'),
                'country'       => $this->input->post('country'),
                'message'       => $this->input->post('message'),
                'created_time'  => date('Y-m-d H:i:s'),
            );
            $this->Service->insert_row(TBL_ENQUIRY,$saveData);
            redirect(base_url('product/finished/'.$slug));
        }

        $data['view'] = 'front/product_details';
        $this->render($data);
    }



}
