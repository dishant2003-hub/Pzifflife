<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $method = $this->router->fetch_method();
    }

    public function checkUserlogin()
    {
        if ($this->session->has_userdata('user_id')) {
            redirect(base_url());
        }elseif($this->session->has_userdata('is_admin_login')){
            redirect(base_url('backend/dashboard'));
        }
    }

    public function error_404() {
        $data['title'] = '404';
        $data['menu'] = "404";
        $data['view'] = 'front/error_404';
        $this->renderPartial($data);
    }

    public function index()
    {
        $this->checkUserlogin();
        $current_time = date("Y-m-d H:i:s");

        $data['title'] = "Login";
        $data['menu'] = "Login";
        $loginUserRole = 2;
        if ($this->input->post('btnsubmit')) {
            $this->form_validation->set_rules('user_email', 'Email', 'trim|required');
            $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'email' => $this->input->post('user_email'),
                    'password' => $this->input->post('user_password')
                );
                $remember_me = (!empty($_POST['remember_me']))?1:0;
                $checkUser = $this->Service->get_row(TBL_USERS, "*,  CONCAT_WS(' ',name, last_name) as fullname", array('email' => $this->input->post('user_email'), 'password' => md5($this->input->post('user_password'))) );
                if (!empty($checkUser)) {
                    if ($checkUser['is_active'] == 0) {
                        $data['msg'] = "Your account in under review. Please login after some time.";
                    } else {
                        $user_id = $checkUser['user_id'];
                        if (!empty($remember_me)) {
                            $new_expiration = (60*60*24*365); // 604800
                            $this->config->set_item('sess_expiration', $new_expiration);
                            $this->config->set_item('sess_expire_on_close', FALSE);
                            $this->session->sess_expiration = $new_expiration;
                            $this->session->sess_expire_on_close = FALSE;
                        }

                        $loginUserRole = (isset($checkUser['user_role'])) ? $checkUser['user_role'] : $loginUserRole;
                        $role_type = $this->Service->getCustomName(TBL_USER_ROLE, 'role_type', array('id'=>$loginUserRole));
                        $this->Service->update_row(TBL_USERS, array('last_login' => $current_time), array('user_id' => $user_id));

                        $admin_data = array(
                            'admin_id' => $user_id,
                            'name' => $checkUser['fullname'],
                            'email' => $checkUser['email'],
                            'is_admin_login' => TRUE,
                            'user_type' => $loginUserRole,
                        );
                        $this->session->set_userdata($admin_data);
                        redirect(base_url('backend/dashboard'), 'refresh');
                    }
                } else {
                    $data['msg'] = $this->getNotification('invalidLogin');
                }
            }
        }

        if ($this->input->post('SubmitForgot')) {
            $this->form_validation->set_rules('email_id', 'Email', 'trim|required');
            if ($this->form_validation->run() != FALSE) {
                $checkUser = $this->Service->get_row(TBL_USERS, array('email', 'user_id'), array('email' => $this->input->post('email_id')));
                if (!empty($checkUser)) {
                    $verification_code = $this->Service->rand_string();
                    $this->Service->update_row(TBL_USERS, array('otp' => $verification_code), array('user_id' => $checkUser['user_id']));

                    // send email
                    if (!empty($checkUser['email'])) {
                        $to_email = $checkUser['email'];
                        $mailSubject = "Forgot Password";

                        $mailBodyHtml = "<h4>Reset password</h4>";
                        $mailBodyHtml .= '<p>Reset password link: <a href="' . base_url('home/reset_password?verification_code=' . $verification_code) . '">Click here</a></p>';
                        $mailBody = $this->load->view('mail/default_mail', array('html' => $mailBodyHtml), true);
                        $this->sendMail($to_email, $mailSubject, $mailBody);
                    }

                    $this->session->set_flashdata('success_msg', 'Successfully! Please check email.');
                    redirect(base_url('login'), 'refresh');
                } else {
                    // $data['msg'] = "Email id not found!";
                    $data['msg'] = "Email id not found!";
                }
            }
        }
        $data['view'] = 'front/login';
        $this->renderPartial($data);
    }

    public function register()
    {
        $this->checkUserlogin();
        $data['title'] = "Register";
        $data['menu'] = "Register";
        $where = " id NOT IN(1, 2) AND is_active = 1";
        $data['user_role_list'] = $this->Service->get_all(TBL_USER_ROLE, '*', $where);
        if ($this->input->post('SubmitRegister')) {
            // pr($_POST); pr($_FILES); die();
            $this->form_validation->set_rules('user_fullname', 'Name', 'trim|required');
            $this->form_validation->set_rules('user_email', 'Email', 'trim|required');
            $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
            $this->form_validation->set_rules('user_mobile', 'Phone', 'trim|required');
            if ($this->form_validation->run() != FALSE) {
                $emailExits = $this->user->check_email($this->input->post('user_email'));
                if (!empty($emailExits)) {
                    $this->session->set_flashdata('error_msg', 'Email already exits, Please login!');
                    redirect(base_url('register'), 'refresh');
                }
                $savedata = array(
                    'name' => $this->input->post('user_fullname'),
                    'last_name' => $this->input->post('user_last_name'),
                    'email' => $this->input->post('user_email'),
                    'mobile' => $this->input->post('user_mobile'),
                    'password' => md5($this->input->post('user_password')),
                    'pincode' => $this->input->post('user_pincode'),
                    'address' => $this->input->post('user_address'),
                    'city' => $this->input->post('user_city'),
                    'dob' => $this->input->post('dob'),
                    'license_plate' => (isset($_POST['license_plate'])) ? $this->input->post('license_plate') : null,
                    'register_role' => (isset($_POST['register_role'])) ? $this->input->post('register_role') : null,
                    'user_role' => 2,
                    'is_active' => 0,
                    'created_time' => date("Y-m-d H:i:s"),
                    'updated_time' => date("Y-m-d H:i:s"),
                );

                if (isset($_FILES['picture']['name']) && $_FILES['picture']['error'] == 0) {
                    $temp_file = $_FILES['picture']['tmp_name'];
                    $img_name = "picture" . mt_rand(1000000, 999999999) . time();
                    $path = $_FILES['picture']['name'];
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    $savedata['picture'] = $img_name . "." . $ext;
                    $fileurl = PICTURE . $savedata['picture'];
                    if (isset($rowData['picture']) && $rowData['picture'] != "" && file_exists(PICTURE . $rowData['picture'])) {
                        unlink(PICTURE . $rowData['picture']);
                    }
                    move_uploaded_file($temp_file, $fileurl);
                }
                $this->user->add_user($savedata);

                $this->session->set_flashdata('success_msg', 'Register success!');
                redirect(base_url('login'));
            }
        }

        $data['view'] = 'front/register';
        $this->renderPartial($data);
    }

    public function reset_password()
    {
        $data['title'] = "Reset Password";
        $verification_code = (isset($_GET['verification_code'])) ? $_GET['verification_code'] : "";
        $userData = $data['userData'] = $this->Service->get_row(TBL_USERS, '*', array('otp' => $verification_code));
        if ($verification_code == "" || empty($userData)) {
            redirect(base_url('login'));
        }

        if ($this->input->post('SubmitLogin')) {
            $newpassword = $this->input->post('user_password');
            $this->Service->update_row(TBL_USERS, array('password' => md5($newpassword), 'otp' => null), array('user_id' => $userData['user_id']));

            $this->session->set_flashdata('success_msg', 'Password update Successfully!');
            redirect(base_url('login'), 'refresh');
        }
        $data['view'] = 'front/reset_password';
        $this->render($data);
    }

}
