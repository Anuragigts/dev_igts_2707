<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('dashboard_model');
    }
    
     public function index(){
        //print_r( $this->session->all_userdata());
        $data = array(
              'title'         => 'SC :: DASHBOARD',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'dashboard'
             );
       
        $this->load->view('layout/inner_template',$data);
    }
}