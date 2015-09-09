<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('register_model');
        $this->load->library('email');
        $this->load->model('common');
        date_default_timezone_set('Asia/Kolkata');  
    }
    public function index()
    {
        if($this->session->userdata("my_type") != ""){redirect("dashboard"); }
        $data = array(
             'title'         => 'ESY TOPUP :: REGISTER',
             'metakeyword'   => 'ESY TOPUP :: REGISTER',
             'metadesc'      => 'ESY TOPUP :: REGISTER',
             'content'       => 'register'
            );
        $india = '101';
            if($this->input->post('create_account')){
                    $this->form_validation->set_rules("first_name",             "First Name",                "required");
                    $this->form_validation->set_rules("last_name",             "Last Name",                "required");
                     $this->form_validation->set_rules("agreed",             "Agree",                "required");
                    $this->form_validation->set_rules("email",              "Email Id",             "required|valid_email|is_unique[login.login_email]");
                    $this->form_validation->set_rules("mobile",             "Mobile No.",           "required|is_unique[login.login_mobile]|min_length[10]");
                    $this->form_validation->set_rules("pass",               "Password",             "required|min_length[4]|callback_password_check");
                    $this->form_validation->set_rules("con_pass",           "Confirm Password",     "required|min_length[4]|matches[pass]");
                    $this->form_validation->set_rules("refer",              "Reffered for ",        "required");
                    $this->form_validation->set_rules("state",              "State ",               "required");
                    $this->form_validation->set_rules("city",               "City",                 "required");
                    $this->form_validation->set_rules("zip",                "Zip Code",             "required|min_length[6]");
                    $this->form_validation->set_rules("door",               "Door No.",             "required");
                    $this->form_validation->set_rules("street",             "Street",               "required");
                    $this->form_validation->set_rules("area",               "Area",                 "required");
                    $this->form_validation->set_rules("agreed",             "Agree",                "required");
                    
                    
                    if($this->form_validation->run() == TRUE){
                        $idP = '';$addp='';
                        if($_FILES['idproof']['name'] != ''){
                            $config['upload_path'] = './doc';
                            $config['allowed_types'] = 'gif|jpg|png';
                            $file = $_FILES['idproof'];
                            $uid = date('Y-m-d_i-s');
                            $uid = 'i'.$uid;
                            $filename = basename($file['name']); 
                            $fv=explode(".",$filename);
                            $idP = $uid.".".$fv['1'];
                            $name = $config['file_name'] = $idP; //set file name
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $this->upload->do_upload('idproof');
                        }
                        if($_FILES['addproof']['name'] != ''){
                            $config['upload_path'] = './doc';
                            $config['allowed_types'] = 'gif|jpg|png';
                            $file = $_FILES['addproof'];
                            $uid = date('Y-m-d_i-s');
                            $uid = 'p'.$uid;
                            $filename = basename($file['name']); 
                            $fv=explode(".",$filename);
                            $addp = $uid.".".$fv['1'];
                            $name = $config['file_name'] = $addp; //set file name
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $this->upload->do_upload('addproof');
                        }
                        
                            $insert     =   $this->register_model->register($idP,$addp);
                            if($insert == 1){
                                    $this->session->set_flashdata("msg","Please check your Email for confirmation link");
                                    redirect("register");
                            }
                            else if($insert == 2){
                                    $this->session->set_flashdata("war","Your confirmation link has not been sent to your mail id.Please try again");
                                    redirect("register");
                            }
                            else{
                                    $this->session->set_flashdata("err","Access Denied");
                                    redirect("register");
                            }
                    }
            }
        $data['states']=$this->common->getState($india);
        $data['city']=$this->common->getcity();
        $this->load->view('layout/register',$data);
    }
     public function password_check($str)
            {
               if ((preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) || preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/',$str)) {
                    return TRUE;
               }
               $this->form_validation->set_message('password_check', "Please add alphabets and  numeric charcters in your password.");
               return FALSE;
            }
    public function confirm(){
            if($this->session->userdata("my_type") != ""){redirect("dashboard"); }
            $con        =   $this->uri->segment(3);
            $insert     =   $this->register_model->confirm($con);
            if($insert == 1){
                    $this->session->set_flashdata("msg","You have confirmed successfully.Please Login");
                    redirect("/");
            }
            else{
                    $this->session->set_flashdata("err","Your confirmation link has been expired");
                    redirect("/");
            }
    }
    public function getCityChanged(){
            $state = $this->input->post("state");
            $val    =   $this->common->getCityChanged($state);
            $opt    =   '<option value="Select City"> Select City </option>';
            foreach($val as $op){
                    $opt    .=  '<option value="'.$op->City_id.'">'.$op->City_name.'</option>';
            }
            echo $opt;
    }
}