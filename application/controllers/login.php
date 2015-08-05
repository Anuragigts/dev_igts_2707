<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('login_model');
        $this->load->model('common');
        date_default_timezone_set('Asia/Kolkata');  
    }
    public function index()
    {
            $data = array(
             'title'         => 'SC :: LOGIN',
             'metakeyword'   => 'SC :: LOGIN',
             'metadesc'      => 'SC :: LOGIN',
             'content'       => 'login'
            );
                if($this->input->post('login')){
                    $this->form_validation->set_rules("login_email","Email Id","required|valid_email");
                    $this->form_validation->set_rules("login_password","Password","required|min_length[4]");
                    if($this->form_validation->run() == TRUE){
                            $getdetails      = $this->login_model->getLogindetails();
                            if($getdetails != 0 && count($getdetails) > 0){
                                //print_r($getdetails);
                                $this->session->set_userdata($getdetails);
                                $this->session->set_flashdata("msg","Welcome to  Swami Communications");
                                redirect("dashboard");
                            }
                            else{
                                $this->session->set_flashdata("err","Access Denied");
                                redirect("/");
                            }
                    }
                }
           $this->load->view('layout/login',$data);		
    }
    public function register(){
        $data = array(
             'title'         => 'SC :: REGISTER',
             'metakeyword'   => 'SC :: REGISTER',
             'metadesc'      => 'SC :: REGISTER',
             'content'       => 'register'
            );
        
        $india = '101';
        $data['states']=$this->common->getState($india);
        $data['citys']=$this->common->getcity();
        $this->load->view('layout/register',$data);
    }
}
