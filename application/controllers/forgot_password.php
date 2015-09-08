<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_password extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->library('email');
            $this->load->model('forgot_model');
            date_default_timezone_set('Asia/Kolkata');  
        }
	public function index(){
                $data = array(
                 'title'         => ' ESY TOPUP :: Reset Password',
                 'metakeyword'   => ' ESY TOPUP :: Reset Password',
                 'metadesc'      => ' ESY TOPUP :: Reset Password',
                 'content'       => 'forgot_password'
                );
                    if($this->input->post('forgot_password')){
                            $this->form_validation->set_rules("reset_email","Email Id","required|valid_email");
                            if($this->form_validation->run() == TRUE){
                                    $getdetails      = $this->forgot_model->getDetails();
                                    if($getdetails == 1){
                                            $val    =     $this->forgot_model->updateDetails();
                                            if($val == 1){
                                                    $this->session->set_flashdata("msg","Please check your mail to reset your password");
                                                    redirect("forgot_password");
                                            }
                                            else{
                                                    $this->session->set_flashdata("err","Internal error occurred while resetting the password");
                                                    redirect("forgot_password");
                                            }
                                    }
                                    else{
                                            $this->session->set_flashdata("err","Your Email Id doesnot exists");
                                            redirect("forgot_password");
                                    }
                            }
                    }
                
               $this->load->view('layout/forgot_password',$data);		
	}
        public function reset(){
                $data = array(
                    'title'         => ' ESY TOPUP :: Reset Password',
                    'metakeyword'   => ' ESY TOPUP :: Reset Password',
                    'metadesc'      => ' ESY TOPUP :: Reset Password',
                    'content'       => 'reset_password'
                );
                $id = $this->uri->segment(3);
                $getdetails      = $this->forgot_model->getConfirm($id);
                if($getdetails == 1){
                    if($this->input->post('reset_password')){
                            $this->form_validation->set_rules("password","Password","required|min_length[4]|callback_password_check");
                            $this->form_validation->set_rules("confirm_password","Confirm Password","required|min_length[4]|matches[password]");
                            if($this->form_validation->run() == TRUE){
                                    if($getdetails == 1){
                                            $val    =  $this->forgot_model->updatePassword($id);
                                            if($val == 1){
                                                    $this->session->set_flashdata("msg","Your password has been resetted.Now you can Log In");
                                                    redirect("/");
                                            }
                                            else{
                                                    $this->session->set_flashdata("err","Internal error occurred while resetting the password");
                                                    redirect("reset_password");
                                            }
                                    }
                            }
                    }
                }
                else{
                        $this->session->set_flashdata("err","Your link has been expired");
                        redirect("forgot_password");
                }
               $this->load->view('layout/reset_password',$data);
        }
        public function password_check($str) {
               if ((preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) || preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/',$str)) {
                    return TRUE;
               }
               $this->form_validation->set_message('password_check', "Please add alphabets and  numeric charcters in your password.");
               return FALSE;
        }
}
