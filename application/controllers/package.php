<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Package extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('package_model');
            date_default_timezone_set('Asia/Kolkata');  
            if( $this->session->userdata('login_id') == ''){redirect('login');}
            if( $this->session->userdata('my_type') == 5){redirect('dashboard');}
        }
	public function create_package(){
                $data = array(
                        'title'         => ' ESY TOPUP :: CREATE PACKAGE',
                        'metakeyword'   => ' ESY TOPUP :: CREATE PACKAGE',
                        'metadesc'      => ' ESY TOPUP :: CREATE PACKAGE',
                        'content'       => 'create_package'
                );
                if($this->input->post('create_package')){
                    $this->form_validation->set_rules("usertype","User Type","callback_select_usertype");
                    $this->form_validation->set_rules("package_name","Package Name","required");
                    $this->form_validation->set_rules("package_remarks","Package Remarks","required");
                        if($this->form_validation->run() == TRUE){
                                $get    =   $this->package_model->get_package_object();
                                if($get == 1){
                                    $val              =     $this->session->userdata('login_id');
                                    $usertype         =     $this->input->post('usertype');
                                    $package_name     =     strtolower($this->input->post('package_name'));
                                    $package_remarks  =     $this->input->post('package_remarks');
                                    $data   =   array(
                                            'user_type_pac'         => $usertype,
                                            'package_name'          => $package_name,
                                            'package_remarks'       => $package_remarks,
                                            'p_created_by'          => $val
                                    );
                                    $this->session->set_userdata($data);
                                    redirect("package/create_commission");
                                }
                                else{
                                        $this->session->set_flashdata("err","Package already exists");
                                        redirect("package/create_package");
                                }
                        }
                }
                $data['usertype']   =  $this->package_model->usertype();
                $this->load->view('layout/inner_template',$data);		
	}
        public function select_usertype($val){
                if($val == 'Select user type'){
                        $this->form_validation->set_message('select_usertype', 'Please Select User type.');
                        return false;
                }
                else{
                    return true;
                }
        }
        public function view_package(){
                $data = array(
                        'title'         => ' ESY TOPUP :: VIEW PACKAGE',
                        'metakeyword'   => ' ESY TOPUP :: VIEW PACKAGE',
                        'metadesc'      => ' ESY TOPUP :: VIEW PACKAGE',
                        'content'       => 'view_package'
                );
                $data['view_package']   =  $this->package_model->view_package();
                $this->load->view('layout/inner_template',$data);		
	}
        public function create_commission(){
                $data = array(
                        'title'         => ' ESY TOPUP :: COMMISSION',
                        'metakeyword'   => ' ESY TOPUP :: COMMISSION',
                        'metadesc'      => ' ESY TOPUP :: COMMISSION',
                        'content'       => 'create_commission'
                );
                $data['recharge']   =   $this->package_model->get_recharge();
                $data['utility']    =   $this->package_model->get_utility();
                $data['dmr']        =   $this->package_model->get_dmr();
                if($this->input->post('save')){
                        $val     =  $this->package_model->insert_package_object();
                        if($val == 1){
                             $this->session->unset_userdata('user_type_pac');
                             $this->session->unset_userdata('package_name');
                             $this->session->unset_userdata('package_remarks');
                                $this->session->set_flashdata("msg","Package has been created successfully");
                                redirect("package/create_package");
                        }
                        else{
                                $this->session->set_flashdata("err","Package has been not created");
                                redirect("package/create_package");
                        }
                }
                $this->load->view('layout/inner_template',$data);		
	}
        public function view_package_details(){
                $id     =   $this->uri->segment(3);
                if($id  != ''){
                        $this->session->set_userdata("view_id",$id);
                        $val    =   $this->session->userdata("view_id");
                        $g_id   =   $val;
                }
                else{
                        $g_id   =   $this->session->userdata("view_id");
                }
                $data = array(
                        'title'         => ' ESY TOPUP :: VIEW PACKAGE DETAILS',
                        'metakeyword'   => ' ESY TOPUP :: VIEW PACKAGE DETAILS',
                        'metadesc'      => ' ESY TOPUP :: VIEW PACKAGE DETAILS',
                        'content'       => 'view_package_details'
                );
                $data["view_det"]   =   $this->package_model->view_package_details($g_id);
                $this->load->view('layout/inner_template',$data);
        }
        public function package_off_actdeact(){
                $ins    =   $this->package_model->package_off_actdeact();
                echo $ins;
        }
//        public function insert_commission(){
//                $ins    =   $this->package_model->insert_package_object();
//                echo $ins;
//        }
}
