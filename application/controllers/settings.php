<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('common_model');
            $this->load->model('settings_model');
            date_default_timezone_set('Asia/Kolkata');  
        }
        public function change_password(){
            if($this->session->userdata('my_type') == ""){redirect('/');}
            $data = array(
                    'title'         => 'SC :: CHANGE PASSWORD',
                    'metakeyword'   => 'SC :: CHANGE PASSWORD',
                    'metadesc'      => 'SC :: CHANGE PASSWORD',
                    'content'       => 'change_password'
            );
            if($this->input->post('change_password')){
                    $this->form_validation->set_rules("pass",               "Password",             "required|min_length[4]");
                    $this->form_validation->set_rules("con_pass",           "Confirm Password",     "required|min_length[4]|matches[pass]");
                    if($this->form_validation->run() == TRUE){
                            $insert     =   $this->settings_model->change_password();
                            if($insert == 1){
                                    $this->session->set_flashdata("msg","Password has been changed");
                                    redirect("settings/change_password");
                            }
                            else{
                                    $this->session->set_flashdata("err","Password has not been changed");
                                    redirect("settings/change_password");
                            }
                    }
            }
            $this->load->view('layout/inner_template',$data);
        }
        public function profile(){
            if($this->session->userdata('my_type') == ""){redirect('/');}
            $data = array(
                    'title'         => 'SC :: PROFILE',
                    'metakeyword'   => 'SC :: PROFILE',
                    'metadesc'      => 'SC :: PROFILE',
                    'content'       => 'profile'
            );
                $valu               =  $this->session->userdata("login_id");
                if($this->input->post('update_profile')){
                        $this->form_validation->set_rules("first_name",         "First Name",       "required|min_length[4]");
                        $this->form_validation->set_rules("last_name",          "Last Name",        "required|min_length[4]");
                         $this->form_validation->set_rules("state",              "State",            "callback_select_state");
                        $this->form_validation->set_rules("city",               "City",             "callback_select_city");
                        $this->form_validation->set_rules("address",            "Address",          "required");
                        if($this->form_validation->run() == TRUE){
                                $get    =   $this->settings_model->update_profile($valu);
                                if($get == 1){
                                        $this->session->set_flashdata("msg","Profile has been updated successfully");
                                        redirect("settings/profile");
                                }
                                else{
                                        $this->session->set_flashdata("err","Internal error occurred while updating your profile");
                                        redirect("settings/profile");
                                }
                        }
                }
                $data['view']       =  $this->settings_model->profile($valu);
                $data['state']      =  $this->states();
                $data['city']       =  $this->cities();
                $this->load->view('layout/inner_template',$data);		
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
        public function states(){
                $cou    =  $this->common_model->getallStates();
                return $cou;
        }
        public function cities(){
                $cou    =  $this->common_model->getallCities();
                return $cou;
        }
}