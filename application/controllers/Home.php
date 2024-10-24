<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public $user_type;
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->has_userdata('user_type')) {
        //     $this->user_type = $this->session->userdata('user_type');
        // }
    }

    public function index()
    {   
        $data['product_type'] = $this->Service->get_all(TBL_PRODUCT_TYPE, '*', array('is_active'=> 1, 'is_delete' => 0));

        $product_type = $this->Service->get_all(TBL_PRODUCT_TYPE, '*', array('is_active' => 1), 'id', 'desc');

        $products = [];
        if(!empty($product_type)){
            foreach($product_type as $typeval){

                $product_type = $this->Service->get_all(TBL_PRODUCT_TYPE, '*', array('type'=>$typeval['type'], 'is_active' => 1));
                if(!empty($product_type)){
                    $products[$typeval['type']] = $product_type;
                }
            }
        }
        $data['type'] = $products;

        $data['view'] = 'front/home';
        $this->render($data);
    }

    public function searchproduct(){    
        $value = $this->input->post('value');

        $result = $this->db->select('*')->from(TBL_PRODUCT)->where("product_name LIKE '%$value%'")->get()->result_array();

        $html = "";
        if (!empty($result)) {
            $html .= ' <div class="search" style="position:absolute; z-index:99999;  max-height: 500px; overflow-y: auto; overflow-x:hidden;">'; 
            foreach ($result as $data) {
                $html .=
                    '<ul class="ui-widget-content ui-autocomplete ui-front p-0" style="display: block; background: #f6f6f6; top: 78px; left: 842.844px; width: 337px; margin:0; border-bottom:0.5px solid #dad9d9;">
                        <li class="search-item ui-menu-item" style= "padding: 10px 2px;"><a href="'. base_url('product/finished/' . $data['slug']) .'" class="ui-menu-item-wrapper">'. $data['product_name'] .'</a></li>
                    </ul>';
            }
            $html .= ' </div>'; 

            echo json_encode($html);
        }
    }

    public function profile()
    {
        $user_id = ($this->session->has_userdata('user_id')) ? $this->session->userdata('user_id') : "";
        $data['title'] = SITE_TITLE;
        $data['menu'] = "Profile";
        $data['user_id'] = $user_id;
        $data['userData'] = $data['rowData'] = $userData = $this->user->get_users(" AND U.user_id = '" . $user_id . "'", true);

        $today = date('Y-m-d');
        if ($this->input->post('ProfileSubmitBtn')) {
            $saveProfile = array(
                // 'name'=>$this->input->post('name'),
                // 'last_name'=>$this->input->post('last_name'),
                // 'email'=>$this->input->post('email'),
                // 'mobile'=>$this->input->post('mobile'),
                'dob' => $this->input->post('dob'),
                'pincode' => $this->input->post('pincode'),
                'city' => $this->input->post('city'),
                'address' => $this->input->post('address'),
            );

            if (!empty($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
                $temp_file = $_FILES['picture']['tmp_name'];
                $img_name = "picture_" . mt_rand(10000, 999999999) . time();
                $path = $_FILES['picture']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $saveProfile['picture'] = $img_name . "." . $ext;
                $fileurl = PICTURE . $saveProfile['picture'];
                if (isset($rowData['picture']) && $rowData['picture'] != "" && file_exists(PICTURE . $rowData['picture'])) {
                    unlink(PICTURE . $rowData['picture']);
                }
                move_uploaded_file($temp_file, $fileurl);
            }

            if ($this->input->post('password') != "") {
                $password = $this->input->post('password');
                $saveProfile['password'] = md5($password);
            }
            $this->user->edit_user($saveProfile, $user_id);
            $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
            redirect(base_url('profile'));
        }

        $data['view'] = 'front/profile';
        $this->render($data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }

    public function about()
    {
        $data['title'] = "About";
        $data['menu'] = "About";
        $data['view'] = 'front/about';
        $this->render($data);
    }

    public function mission()
    {
        $data['title'] = "Mission & Vision";
        $data['menu'] = "Mission & Vision";
        $data['view'] = 'front/mission-vision';
        $this->render($data);
    }

    public function business()
    {
        $data['title'] = "Business Values";
        $data['menu'] = "Business Values";
        $data['view'] = 'front/business-values';
        $this->render($data);
    }

    public function management()
    {
        $data['title'] = "Management Message";
        $data['menu'] = "Management Message";
        $data['view'] = 'front/management-message';
        $this->render($data);
    }

    public function why_us()
    {
        $data['title'] = "Why Us";
        $data['menu'] = "Why Us";
        $data['view'] = 'front/why_us';
        $this->render($data);
    }

    public function quality_policy()
    {
        $data['title'] = "Quality Policy";
        $data['menu'] = "Quality Policy";
        $data['view'] = 'front/quality_policy';
        $this->render($data);
    }

    public function client_satisfaction()
    {
        $data['title'] = "Client Satisfaction";
        $data['menu'] = "Client Satisfaction";
        $data['view'] = 'front/client_satisfaction';
        $this->render($data);
    }

    public function global_pressance()
    {
        $data['title'] = "Global Pressance";
        $data['menu'] = "Global Pressance";
        $data['view'] = 'front/global_pressance';
        $this->render($data);
    }

    public function manufacturing()
    {
        $data['title'] = "Manufacturing";
        $data['menu'] = "Manufacturing";
        $data['view'] = 'front/manufacturing';
        $this->render($data);
    }

    public function packaging()
    {
        $data['title'] = "Packaging";
        $data['menu'] = "Packaging";
        $data['view'] = 'front/packaging';
        $this->render($data);
    }

    public function research_development()
    {
        $data['title'] = "Research Development";
        $data['menu'] = "Research Development";
        $data['view'] = 'front/research_development';
        $this->render($data);
    }

    public function product()
    {
        $data['title'] = "Finished Products";
        $data['menu'] = "Finished Products";

        $data['product_type'] = $this->Service->get_all(TBL_PRODUCT_TYPE, '*', array('is_footer' => 1, 'is_active'=> 1, 'is_delete' => 0));
        
        $data['product_type2'] = $this->Service->get_all(TBL_PRODUCT_TYPE, '*', array('is_active'=> 1, 'is_delete' => 0));
        $data['category'] = $this->Service->get_all(TBL_CATEGORY, '*', array('is_active'=> 1, 'is_delete' => 0));

        $data['view'] = 'front/finished_product';
        $this->render($data);
    }

    public function contract_manufacturing()
    {
        $data['title'] = "Contract Manufacturing";
        $data['menu'] = "Contract Manufacturing";
        $data['view'] = 'front/contract_manufacturing';
        $this->render($data);
    }

    public function third_party_manufacturing()
    {
        $data['title'] = " 3rd Party Manufacturing";
        $data['menu'] = " 3rd Party Manufacturing";
        $data['view'] = 'front/third_party_manufacturing';
        $this->render($data);
    }

    public function institutional_tenders()
    {
        $data['title'] = " Institutional Tenders";
        $data['menu'] = " Institutional Tenders";
        $data['view'] = 'front/institutional_tenders';
        $this->render($data);
    }

    public function generic_medicines()
    {
        $data['title'] = " Generic Medicines";
        $data['menu'] = " Generic Medicines";
        $data['view'] = 'front/generic_medicines';
        $this->render($data);
    }

    public function otc_products()
    {
        $data['title'] = " Otc Products";
        $data['menu'] = " Otc Products";
        $data['view'] = 'front/otc_products';
        $this->render($data);
    }

    public function regulatory_service()
    {
        $data['title'] = " Regulatory Service";
        $data['menu'] = " Regulatory Service";
        $data['view'] = 'front/regulatory_service';
        $this->render($data);
    }

    public function quality_control_assurance()
    {
        $data['title'] = " Quality  Control and Quality Assurance";
        $data['menu'] = " Quality  Control and Quality Assurance";
        $data['view'] = 'front/quality_control_assurance';
        $this->render($data);
    }

    public function contact()
    {
        $data['title'] = "Contact";
        $data['menu'] = "Contact";

        if(!empty($this->input->post('submit'))){

            $saveData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'country' => $this->input->post('country'),
                'message' => $this->input->post('message'),
            );
                $saveData['created_time'] = date('Y-m-d H:i:s');
                $this->Service->insert_row(TBL_CONTACT_US,$saveData);
           
        }

        $data['view'] = 'front/contact_us';
        $this->render($data);
    }

    public function gallery()
    {
        $data['title'] = "Gallery";
        $data['menu'] = "Gallery";

        $data['producttype'] = $this->Service->get_all(TBL_PRODUCT_TYPE, '*', array('is_footer' => 1,'is_active'=> 1, 'is_delete' => 0));

        $product = $this->Service->get_all(TBL_PRODUCT, '*', array('is_active'=> 1, 'is_delete' => 0));

        $proimage = array();
        if(!empty($product)){
            foreach($product as $row){
                $image = $this->Service->get_row(TBL_PRODUCT_IMG, '*', array('product_id' => $row['id'], 'is_active'=> 1, 'is_delete' => 0));
                if(!empty($image)){
                    $image['product_slug'] = $row['slug'];
                    $proimage[$row['product_name']] = $image;
                }
            }
        }
        $data['gallery'] = $proimage;

        $data['view'] = 'front/gallery';
        $this->render($data);
    }

    public function gallery_filter(){
        $id = $this->input->post('id');

        if($id == 0){
            $product = $this->Service->get_all(TBL_PRODUCT, '*', array('is_active'=>1, 'is_delete'=>0),);
        }else{
            $product = $this->Service->get_all(TBL_PRODUCT, '*', array('product_type' => $id, 'is_active'=>1, 'is_delete'=>0),);
        }

        $proimage = array();
        if(!empty($product)){
            foreach($product as $row){
                $image = $this->Service->get_row(TBL_PRODUCT_IMG, '*', array('product_id' => $row['id'], 'is_active'=> 1, 'is_delete' => 0));
                if(!empty($image)){
                    $image['product_slug'] = $row['slug'];
                    $proimage[$row['product_name']] = $image;
                }
            }
        }

        $html = "";
        if (!empty($proimage)) {
            foreach($proimage as $proname => $productimg){ 
        $html .= 
            '<div class="g_img_box gp_type_suspensions_syrups">
                <div class="g_img_box_inner">
                    <a  href="' .base_url(PRODUCT . $productimg['file']) .' " class="tip_trigger magnifi-image-popup" style="cursor: pointer;">
                        <img class="marker" src="'. base_url(PRODUCT . $productimg['file']) .'" alt="image" />
                    </a>  
                </div>
                <div class="g_img_box_content" link_path="'. base_url('product/finished/'.$productimg['product_slug']) .'>">
                    <h4><a href="'. base_url('product/finished/'.$productimg['product_slug']) . '">'. $proname .' </a></h4>
                </div>
            </div> ';
            }
        }
        
        echo json_encode($html);
    }

    public function blog()
    {
        $data['title'] = "Blog";
        $data['menu'] = "Blog";

        $limit = 10;
        $data['topblog'] = $this->Service->get_all(TBL_BLOG, '*', array('is_active'=>1, 'is_delete'=>0),'id','desc', $limit);


        $search = isset($_GET['search']) ? $this->input->get('search') : '';
        $where = "is_active=1 AND is_delete=0";
        if(!empty($search)){
            $where .= " AND title LIKE '%".$search."%'";
        }

        $limit = 5;
        $total_records = count($this->Service->get_all(TBL_BLOG, '*', $where));
        $data['url'] = 'blog/';
        $data['total_page'] = ceil($total_records / $limit);
        $data['page'] = $page = isset($_GET['page']) ? $this->input->get('page') : 1;
        $offset = 0;
        if ($page != "") {
            $offset = ($limit * ($page - 1));
        }
        $data["blog"] = $this->Service->get_all(TBL_BLOG, '*', $where, $limit, $offset);
        
        $data['view'] = 'front/blog';
        $this->render($data);
    }

    public function privacy()
    {
        $data['title']  = "Privacy";
        $data['menu']   = "Privacy";
        $data['privacy'] = $this->Service->getCustomName('tblsetting', 'privacy', array('setting_id' => 1));
        $data['view']   = 'front/privacy';
        $this->render($data);
    }

    public function marketing()
    {
        $data['title']  = "Marketing";
        $data['menu']   = "Marketing";

        $data['view']   = 'front/marketing';
        $this->render($data);
    }
    
    public function career()
    {
        $data['title']  = "Career";
        $data['menu']   = "Career";

        $data['view']   = 'front/career';
        $this->render($data);
    }

    public function certificate()
    {
        $data['title']  = "Certificate";
        $data['menu']   = "Certificate";

        $data['view']   = 'front/certificate';
        $this->render($data);
    }
}

