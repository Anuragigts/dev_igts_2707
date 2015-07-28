<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('dashboard_model');
    }
    //index funs
     public function index(){
        //print_r( $this->session->all_userdata());
//         if($this->session->userdata('user_type') == ""){ redirect("/");}
        $data = array(
              'title'         => 'SC :: DASHBOARD',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'dashboard'
             );
       
        $this->load->view('layout/inner_template',$data);
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('/');
    }
}