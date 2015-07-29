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
            $this->form_validation->set_rules('mobile','Mobile','required|min_length[10]|max_length[10]|numeric');
            $this->form_validation->set_rules('code','Operator Code','required');
            $this->form_validation->set_rules('oprator_name','Operator Name','required');
            $this->form_validation->set_rules('amount','amount','required|max_length[4]|numeric');
            $this->form_validation->set_rules('circle','Circle','required');
             if($this->form_validation->run() == TRUE){
                 $recharge_type = 1;
                $result = $this->recharge_model->doRecharge( $recharge_type);
                if($result == 1){                    
                    $this->session->set_flashdata('msg','Your Recharge is success full.');  
                    redirect('recharge/mobile_recharge');
                }
                else if($result == 2){
                    $this->session->set_flashdata('err','Recharge fail : Some surver error occurred.');  
                   redirect('recharge/mobile_recharge');
                }else{
                     $this->session->set_flashdata('err','Recharge fail : Some internal error occurred.');  
                    redirect('recharge/mobile_recharge');
                }
            }
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
    
    public function getAjaxPlans(){
        $operator = $_POST['operator'];
        $circle = $_POST['circle'];
        $details =  $this->recharge_model->getMobilePlans($operator,$circle);
        print_r($details);
        //echo $circle;
    }
    
    public function recharge_details(){
         $data = array(
              'title'         => 'SC :: RECHARGE DETAILS',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'recharge_details'
             );
         $data['details'] = $this->recharge_model->getrechargeDetails();
        $this->load->view('layout/inner_template',$data);
    }
}