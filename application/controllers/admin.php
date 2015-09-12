<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('login_model');
        $this->load->model('common');
        date_default_timezone_set('Asia/Kolkata');  
    }
     public function access()
    {
        if($this->session->userdata("my_type") != ""){redirect("dashboard"); }
            $data = array(
             'title'         => 'ESY TOPUP :: Topup',
             'metakeyword'   => 'ESY TOPUP :: Topup',
             'metadesc'      => 'ESY TOPUP :: Topup',
             'content'       => 'admin_login'
            );
                if($this->input->post('login')){
                    $this->form_validation->set_rules("login_email","Email Id","required");
                    $this->form_validation->set_rules("login_password","Password","required|min_length[4]");
                    if($this->form_validation->run() == TRUE){
                            $getdetails      = $this->login_model->getLogindetails();
                            if($getdetails != 0 && count($getdetails) > 0){
                                if($getdetails->my_type == 1){
                                    $this->session->set_userdata($getdetails);
                                    $this->session->set_flashdata("msg","Welcome to  Swami Communications");
                                    redirect("dashboard");
                               }else{
                                   $this->session->set_flashdata("err","Access Denied");
                                    redirect("admin/access");
                               }
                            }
                            else{
                                $this->session->set_flashdata("err","Access Denied");
                                redirect("admin/access");
                            }
                    }
                }
           $this->load->view('layout/admin_login',$data);		
    }
}