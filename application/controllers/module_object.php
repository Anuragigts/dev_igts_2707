<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module_object extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            date_default_timezone_set('Asia/Kolkata');  
        }
	public function create_module_object()
	{
                $data = array(
                 'title'         => 'SC :: CREATE MODULE OBJECT',
                 'metakeyword'   => 'SC :: CREATE MODULE OBJECT',
                 'metadesc'      => 'SC :: CREATE MODULE OBJECT',
                 'content'       => 'create_module_object'
                );
                if($this->input->post('create_module_object')){
                        $this->form_validation->set_rules("login_email","Email Id","required|valid_email");
                }
               $this->load->view('layout/inner_template',$data);		
	}
}
