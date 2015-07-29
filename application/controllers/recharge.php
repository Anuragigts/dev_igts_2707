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
       if($this->input->post('recharge')){
           $result = $this->recharge_model->getOperator();
       }
       $operator_type = 1;
        $data['all_operator'] = $this->recharge_model->getAllOperator($operator_type);
        $this->load->view('layout/inner_template',$data);
    }
     public function dth_recharge(){
        //print_r( $this->session->all_userdata());
        $data = array(
              'title'         => 'SC :: DTH RECHARGE',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'recharge_dth'
             );
       
        $this->load->view('layout/inner_template',$data);
    }
    
    public function getAjaxOperator(){
        $number = $_POST['number'];
        $details =  $this->recharge_model->getOperator($number);
        echo $details;
    }
}