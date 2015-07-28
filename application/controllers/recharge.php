<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recharge extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('recharge_model');
    }
    
     public function mobile_recharge(){
        //print_r( $this->session->all_userdata());
        $data = array(
              'title'         => 'SC :: MOBILE RECHARGE',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'recharge_mobile'
             );
       
        $this->load->view('layout/inner_template',$data);
    }
}