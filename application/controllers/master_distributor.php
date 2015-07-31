<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_distributor extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('common_model');
            $this->load->model('master_distributor_model');
            date_default_timezone_set('Asia/Kolkata');  
        }
	public function create_master_distributor(){
                $data = array(
                        'title'         => 'SC :: CREATE MASTER DISTRIBUTOR',
                        'metakeyword'   => 'SC :: CREATE MASTER DISTRIBUTOR',
                        'metadesc'      => 'SC :: CREATE MASTER DISTRIBUTOR',
                        'content'       => 'create_master_distributor'
                );
                if($this->input->post('create_master_distributor')){
                        $this->form_validation->set_rules("first_name",         "First Name",       "required|min_length[4]");
                        $this->form_validation->set_rules("last_name",          "Last Name",        "required|min_length[4]");
                        $this->form_validation->set_rules("mobile_no",          "Mobile No.",       "required|is_unique[login.login_mobile]");
                        $this->form_validation->set_rules("login_email",        "Email Id",         "required|is_unique[login.login_email]");
                        $this->form_validation->set_rules("password",           "Password",         "required|min_length[4]");
                        $this->form_validation->set_rules("con_password",       "Confirm Password", "required|matches[password]");
                        $this->form_validation->set_rules("country",            "Country",          "callback_select_country");
                        $this->form_validation->set_rules("state",              "State",            "callback_select_state");
                        $this->form_validation->set_rules("city",               "City",             "callback_select_city");
                        $this->form_validation->set_rules("package",            "Package",          "callback_select_package");
                        $this->form_validation->set_rules("address",            "Address",          "required");
                        if($this->form_validation->run() == TRUE){
                                $get    =   $this->master_distributor_model->insert_master_distributor();
                                if($get == 1){
                                        $this->session->set_flashdata("msg","Master Distributor has been created successfully");
                                        redirect("master_distributor/create_master_distributor");
                                }
                                else{
                                        $this->session->set_flashdata("err","Internal error occurred while creating master distributor");
                                        redirect("master_distributor/create_master_distributor");
                                }
                        }
                }
                $data['val']   =  $this->countries();
                $data['pkg']   =  $this->packages();
                $this->load->view('layout/inner_template',$data);		
	}
        public function select_country($val){
                if($val == "Select Country"){
                        $this->form_validation->set_message("select_country", "Please Select Country.");
                        return false;
                }
                else{
                    return true;
                }
        }
        public function select_state($val){
                if($val == "Select State"){
                        $this->form_validation->set_message('select_state', "Please Select State.");
                        return false;
                }
                else{
                    return true;
                }
        }
        public function select_city($val){
                if($val == "Select City"){
                        $this->form_validation->set_message("select_city", "Please Select City.");
                        return false;
                }
                else{
                    return true;
                }
        }
        public function select_package($val){
                if($val == "Select Package"){
                        $this->form_validation->set_message("select_package", "Please Select Package.");
                        return false;
                }
                else{
                    return true;
                }
        }
        public function view_master_distributor(){
                $data = array(
                        'title'         => 'SC :: VIEW MASTER DISTRIBUTOR',
                        'metakeyword'   => 'SC :: VIEW MASTER DISTRIBUTOR',
                        'metadesc'      => 'SC :: VIEW MASTER DISTRIBUTOR',
                        'content'       => 'view_master_distributor'
                );
                $data['view_dis']   =  $this->master_distributor_model->view_master_distributor();
                $this->load->view('layout/inner_template',$data);		
	}
        public function edit_master_distributor(){
                $data = array(
                        'title'         => 'SC :: EDIT MASTER DISTRIBUTOR',
                        'metakeyword'   => 'SC :: EDIT MASTER DISTRIBUTOR',
                        'metadesc'      => 'SC :: EDIT MASTER DISTRIBUTOR',
                        'content'       => 'edit_master_distributor'
                );
                $valu    = $this->uri->segment(3);
                if($valu !=  ""){
                        $this->session->set_userdata("value",$valu);
                        $valu   =   $this->session->userdata("value");
                }
                else{
                        $valu   =   $this->session->userdata("value");
                }
                if($this->input->post('update_master_distributor')){
                        $this->form_validation->set_rules("first_name",         "First Name",       "required|min_length[4]");
                        $this->form_validation->set_rules("last_name",          "Last Name",        "required|min_length[4]");
                        $this->form_validation->set_rules("country",            "Country",          "callback_select_country");
                        $this->form_validation->set_rules("state",              "State",            "callback_select_state");
                        $this->form_validation->set_rules("city",               "City",             "callback_select_city");
                        $this->form_validation->set_rules("package",            "Package",          "callback_select_package");
                        $this->form_validation->set_rules("address",            "Address",          "required");
                        if($this->form_validation->run() == TRUE){
                                $get    =   $this->master_distributor_model->update_master_distributor($valu);
                                if($get == 1){
                                        $this->session->set_flashdata("msg","Master Distributor has been updated successfully");
                                        redirect("master_distributor/edit_master_distributor/".$valu);
                                }
                                else{
                                        $this->session->set_flashdata("err","Internal error occurred while updating master distributor");
                                        redirect("master_distributor/edit_master_distributor/".$valu);
                                }
                        }
                }
                $data['view']       =  $this->master_distributor_model->edit_master_distributor($valu);
                $data['val']        =  $this->countries();
                $data['state']      =  $this->states();
                $data['city']       =  $this->cities();
                $data['pkg']        =  $this->packages();
                $this->load->view('layout/inner_template',$data);		
	}
        public function packages(){
                $pkg1    =  $this->master_distributor_model->getMasterPackages();
                return $pkg1;
        }
        public function countries(){
                $cou    =  $this->common_model->getCountries();
                return $cou;
        }
        public function states(){
                $cou    =  $this->common_model->getallStates();
                return $cou;
        }
        public function cities(){
                $cou    =  $this->common_model->getallCities();
                return $cou;
        }
}