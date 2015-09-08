<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module_object extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('module_object_model');
            date_default_timezone_set('Asia/Kolkata');  
            if( $this->session->userdata('login_id') == ''){redirect('login');}
             if( $this->session->userdata('my_type') == 5){redirect('dashboard');}
        }
	public function create_module_object(){
                $data = array(
                 'title'         => ' ESY TOPUP :: CREATE MODULE OBJECT',
                 'metakeyword'   => ' ESY TOPUP :: CREATE MODULE OBJECT',
                 'metadesc'      => ' ESY TOPUP :: CREATE MODULE OBJECT',
                 'content'       => 'create_module_object'
                );
                if($this->input->post('create_module_object')){
                        $this->form_validation->set_rules("module_name","Module Name","callback_select_module");
                        $this->form_validation->set_rules("sub_module_name","Sub Module Name","callback_select_sub_module");
                        $this->form_validation->set_rules("module_object_name","Module Object Name","required");
                        if($this->form_validation->run() == TRUE){
                            
                                $get    =   $this->module_object_model->get_module_object();
                                if($get == 1){
                                    $ins    =   $this->module_object_model->insert_module_object();
                                    if($ins == 1){
                                            $this->session->set_flashdata("msg","Module Object has been created successfully");
                                            redirect("module_object/create_module_object");
                                    }
                                    else{
                                            $this->session->set_flashdata("err","Internal error occurred while creating module Object");
                                            redirect("module_object/create_module_object");
                                    }
                                }
                                else{
                                        $this->session->set_flashdata("err","Module Object already exists");
                                        redirect("module_object/create_module_object");
                                }
                        }
                }
                $data['module_name1']    =   $this->module_object_model->getModulelist();
                $this->load->view('layout/inner_template',$data);		
	}
        public function select_module($val){
                if($val == 'Select Module'){
                        $this->form_validation->set_message('select_module', 'Please Select Module Name.');
                        return false;
                }
                else{
                    return true;
                }
        }
        public function select_sub_module($val){
                if($val == 'Select Sub Module'){
                        $this->form_validation->set_message('select_sub_module', 'Please Select Sub Module Name.');
                        return false;
                }
                else{
                    return true;
                }
        }
        public function  sub_module_name(){
                $val = $this->module_object_model->sub_module_name();
                $opt = '<option value="Select Sub Module"> Select Sub Module </option>';
                foreach($val as $op){
                        $opt    .=  '<option value="'.$op->sub_module_id.'" '.set_select('sub_module_name',$op->sub_module_id).'>'.$op->sub_module_name.'</option>';
                }
                echo $opt;
        }
        public function view_module_object(){
                $data = array(
                 'title'         => ' ESY TOPUP :: VIEW MODULE OBJECTS',
                 'metakeyword'   => ' ESY TOPUP :: VIEW MODULE OBJECTS',
                 'metadesc'      => ' ESY TOPUP :: VIEW MODULE OBJECTS',
                 'content'       => 'view_module_object'
                );
                $data['view_module']    =   $this->module_object_model->view_module_object();
                $this->load->view('layout/inner_template',$data);		
	}
        public function delete_module_project(){
                $del_id =   $this->uri->segment(3);
                $del    =   $this->module_object_model->delete_module_project($del_id);
                $this->session->set_flashdata("msg","Module Object has been deleted successfully");
                redirect("module_object/view_module_object");
	}
}
