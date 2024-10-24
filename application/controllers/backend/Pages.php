<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
    }
    public function index()
    {
        $data['title'] = "Pages";
        $data['menu'] = "Pages";
        $data['view'] = 'backend/pages/page_list';
        $this->renderAdmin($data);
    }

    public function getAjaxListData()
    {
        $this->get_table_data('pages', []); //table name
    }

    public function change_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if ($this->Service->update_row(TBL_PAGES, array('is_active' => $status), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function delete_record()
    {
        $id = $this->input->post('record_id');
        if ($this->Service->update_row(TBL_PAGES, array('is_delete' => 1), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function add($id = "")
    {
        $data['title'] = "Pages";
        $data['menu'] = "Pages";
        if ($id != "") {
            $data['rowData'] = $rowData = $this->Service->get_row(TBL_PAGES, '*', array('id' => $id));
            $data['pageSections'] = $this->Service->get_all(TBL_PAGE_SECTIONS, '*, JSON_EXTRACT(title, "$.en") AS title_en', array('page_id' => $id));
        }
        if ($this->input->post('submit')) {
            // pr($_POST); die();
            $this->form_validation->set_rules('title[]', 'Title', 'required');
            $this->form_validation->set_rules('content[]', 'Content', 'required');
            if ($this->form_validation->run() != FALSE) {
                $saveData = array(
                    'title' => (!empty($_POST['title'])) ? json_encode($this->input->post('title'), true):'',
                    'content' => (!empty($_POST['content'])) ? json_encode($this->input->post('content'), true):'',
                    'seo' => (!empty($_POST['seo'])) ? json_encode($this->input->post('seo'), true):'',
                    // 'video_link' =>$this->input->post('v_link'),
                    'updated_time' => date("Y-m-d H:i:s"),
                );
                $en_title = (isset($_POST['title']['en']))? $_POST['title']['en']:rand(10000,99999);
                if (!empty($_POST['slug'])) {
                    $saveData['slug'] = json_encode($this->input->post('slug'), true);
                }else{
                    if (($id == "") || (empty($rowData['slug']))) {
                        $slug = array();
                        if(!empty($_POST['title'])){
                            foreach($_POST['title'] as $key=>$title){
                                $slug[$key] = $this->Service->generateSlug(TBL_PAGES, 'slug', $title, $key);
                            }
                        }
                        $saveData['slug'] = (!empty($slug)) ? json_encode($slug, true):'';
                    }
                }
                
                if (!empty($_FILES['picture']['name'])) {
                    $temp_file = $_FILES['picture']['tmp_name'];
                    $file_name = $_FILES['picture']['name'];
                    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                    // $imgname = 'picture_'.time().'.'.$ext;
                    $imgname = $en_title . '-' . rand(100, 99999) . '.' . $ext;
                    $file_url = PAGES . $imgname;
                    if (isset($rowData['picture']) && $rowData['picture'] != "" && file_exists(PAGES . $rowData['picture'])) {
                        unlink(PAGES . $rowData['picture']);
                    }
                    move_uploaded_file($temp_file, $file_url);
                    $saveData['picture'] = $imgname;
                }

                if ($id != "") {
                    $saveData['updated_time'] = date("Y-m-d H:i:s");
                    $this->Service->update_row(TBL_PAGES, $saveData, array('id' => $id));
                    $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
                } else {
                    $saveData['created_time'] = date("Y-m-d H:i:s");
                    $this->Service->insert_row(TBL_PAGES, $saveData);
                    $this->session->set_flashdata('success_msg', $this->getNotification('recAddSuc'));
                }
                redirect(base_url('backend/pages'));
            }
        }
        $data['view'] = 'backend/pages/page_edit';
        $this->renderAdmin($data);
    }

    public function add_section($page_id, $section_id = "")
    {
        $data['title'] = "Page Section";
        $data['menu'] = "Page Section";
        $data['page_id'] = $page_id;
        if ($section_id != "") {
            $data['rowData'] = $rowData = $this->Service->get_row(TBL_PAGE_SECTIONS, '*', array('section_id' => $section_id));
        }
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('title[]', 'Title', 'required');
            $this->form_validation->set_rules('content[]', 'Content', 'required');
            if ($this->form_validation->run() != FALSE) {
                $saveData = array(
                    'page_id' => $page_id,
                    'title' => (!empty($_POST['title'])) ? json_encode($this->input->post('title'), true):'',
                    'content' => (!empty($_POST['content'])) ? json_encode($this->input->post('content'), true):'',
                    'video_link' =>$this->input->post('video_link'),
                    'updated_time' => date("Y-m-d H:i:s")
                );

                if (($section_id == "") || (empty($rowData['slug']))) {
                    $slug = array();
                    if(!empty($_POST['title'])){
                        foreach($_POST['title'] as $key=>$title){
                            $slug[$key] = $this->Service->generateSlug(TBL_PAGE_SECTIONS, 'slug', $title, $key);
                        }
                    }
                    $saveData['slug'] = (!empty($slug)) ? json_encode($slug, true):'';
                }


                if (!empty($_FILES['picture']['name'])) {
                    $temp_file = $_FILES['picture']['tmp_name'];
                    $file_name = $_FILES['picture']['name'];
                    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                    // $imgname = 'picture_'.time().'.'.$ext;
                    $imgname = $this->input->post('title_en') . '-' . rand(10, 99) . '.' . $ext;
                    $file_url = PAGES . $imgname;
                    if (isset($rowData['picture']) && $rowData['picture'] != "" && file_exists(PAGES . $rowData['picture'])) {
                        unlink(PAGES . $rowData['picture']);
                    }
                    move_uploaded_file($temp_file, $file_url);
                    $saveData['picture'] = $imgname;
                }

                if ($section_id != "") {
                    $this->Service->update_row(TBL_PAGE_SECTIONS, $saveData, array('section_id' => $section_id));
                    $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
                } else {
                    $saveData['created_time'] = date("Y-m-d H:i:s");
                    $this->Service->insert_row(TBL_PAGE_SECTIONS, $saveData);
                    $this->session->set_flashdata('success_msg', $this->getNotification('recAddSuc'));
                }
                redirect(base_url('backend/pages/edit/'.$page_id));
            }
        }
        $data['view'] = 'backend/pages/page_section_form';
        $this->renderAdmin($data);
    }

    public function delete_page_section()
    {
        $id = $this->input->post('record_id');
        if ($this->Service->update_row(TBL_PAGE_SECTIONS, array('is_delete' => 1), array('section_id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }

}