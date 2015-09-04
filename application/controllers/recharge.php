<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recharge extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('recharge_model');        
        
    }
    public function getRechargeDetails(){
        $data['recharges'] = $this->recharge_model->getRechargeDetails1(); 
        
    } 
    public function getamt(){
         $data['amt'] = $this->recharge_model->getamt();         
         echo $data['amt']->REMAININGAMOUNT;
    }
    
    public function offLinePrepaidRecharge(){
        $rc = $this->uri->segment(3);
        $recharge_type = 1;
        if($rc == 'RC' || $rc == 'rc' || $rc == 'Rc'){
           $code = $this->uri->segment(4);
           if($code == "AC"){
               $codeval = "AIRCEL";
               $V ="HACL";
           }else if($code == "AT"){
               $codeval = "AIRTEL";
                $V ="HART";
           }else if($code == "BN"){
               $codeval = "BSNL";
               $V ="HBST";
           }else if($code == "BV"){
               $codeval = "BSNL VALIDITY";
               $V ="HBSV";
           }else if($code == "ID"){
               $codeval = "IDEA";
                $V ="HIDE";
           }else if($code == "LO"){
               $codeval = "LOOP";
               $V ="HBPL";           
           }else if($code == "MT"){
               $codeval = "MTNL";
               $V ="HMDT";
           }else if($code == "MS"){
               $codeval = "MTS";
               $V ="HMTS";
           }else if($code == "RC"){
               $codeval = "RELIANCE CDMA";
               $V ="HREC";
           }else if($code == "RG"){
               $codeval = "RELIANCE GSM";
               $V ="HREG";
           }else if($code == "TI"){
               $codeval = "TATA INDICOM";
               $V ="HTAI";
           }else if($code == "TD"){
               $codeval = "TATA DOCOMO";
               $V ="HTAD";
           }else if($code == "TS"){
               $codeval = "TATA DOCOMO SPECIAL";
               $V ="HTDS";
           }else if($code == "UT"){
               $codeval = "UNINOR";
               $V ="HUNI";
           }else if($code == "US"){
               $codeval = "UNINOR SPECIAL";
               $V ="HUNS";           
           }else if($code == "VT"){
               $codeval = "VIDEOCON";
               $V ="HVID";
           }else if($code == "VS"){
               $codeval = "VIDEOCON SPECIAL";
               $V ="HVIS";
           }else if($code == "VG"){
               $codeval = "VIRGIN GSM";
               $V ="HVIG";
           }else if($code == "VC"){
               $codeval = "VIRGIN CDMA";
               $V ="HVIC";
           }else if($code == "VF"){
               $codeval = "VODAFONE";
               $V ="HVOD";
           }else{
               $codeval = "";
               $V ="";
           }
           
        }
        
        $result = $this->recharge_model->doRechargeoff( $recharge_type,$codeval,$V);
    }
    public function offLineDTHRecharge(){
        $rc = $this->uri->segment(3);
        $recharge_type = 1;
        if($rc == 'dth' || $rc == 'DTH' || $rc == 'Sth'){
           $code = $this->uri->segment(4);
           if($code == "AD"){
                $codeval = "AIRTEL DTH";
               $V ="HADH";
           }else if($code == "BT"){
                $codeval = "BIGTV";
               $V ="HBTV";
           }else if($code == "DT"){
                $codeval = "DISH TV";
               $V ="HDIS";
           }else if($code == "TS"){
                $codeval = "TATASKY";
               $V ="HTSY";
           }else if($code == "SD"){
                $codeval = "SUN DIRECT";
               $V ="HSUN";
           }else if($code == "VD"){
                $codeval = "VIDEOCON D2H";
               $V ="HVIH";
           }else{
               $codeval = "";
               $V ="";
           }
        }
        $recharge_type = 2;
        $result = $this->recharge_model->doRechargeoff( $recharge_type,$codeval,$V);
    }
    public function mobile_recharge(){
        if( $this->session->userdata('login_id') == ''){redirect('login');}
        if( $this->session->userdata('recharge') != '1'){redirect('dashboard');}
        //print_r( $this->session->all_userdata());
        $data = array(
              'title'         => 'SC :: PRE PAID RECHARGE',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'recharge_mobile'
             );
       if($this->input->post('amount')){
           //echo "hiii"; die();            
            $this->form_validation->set_rules('mobile','Mobile','required|min_length[10]|max_length[10]|numeric');
            //$this->form_validation->set_rules('code','Operator Code','required');
            $this->form_validation->set_rules('oprator_name','Operator Name','required');
            $this->form_validation->set_rules('amount','amount','required|max_length[4]|numeric');
           // $this->form_validation->set_rules('circle','Circle','required');
             if($this->form_validation->run() == TRUE){
                 $recharge_type = 1;
				 
                $result = $this->recharge_model->doRecharge( $recharge_type);
                //$result = $this->recharge_model->doRecharge1( );
                //if($result == 1){                    
                if($result == 0){                    
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
       $data['details'] = $this->recharge_model->getrechargeDetails();
       $operator_type = 1;
	   $data['amt'] = $this->recharge_model->getamt();
	   //$data['amt'] = $this->recharge_model->getamt1();
        $data['all_operator'] = $this->recharge_model->getAllOperator($operator_type);
        $this->load->view('layout/inner_template',$data);
    }
     public function post_recharge(){
         if( $this->session->userdata('login_id') == ''){redirect('login');}
        if( $this->session->userdata('recharge') != '1'){redirect('dashboard');}
        //print_r( $this->session->all_userdata());
        $data = array(
              'title'         => 'SC :: POST PAID RECHARGE',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'recharge_post_mobile'
             );
       if($this->input->post('amount')){
           //echo "hiii"; die();
           $this->form_validation->set_rules('mobile','Mobile','required|min_length[10]|numeric');
            $this->form_validation->set_rules('code','Operator Code','required');
            $this->form_validation->set_rules('oprator_name','Operator Name','required');
            if($this->input->post('oprator_name') == 'BSNL POSTPAID OR LANDLINE'){
                $this->form_validation->set_rules('circle','Circle Code','required');
                $this->form_validation->set_rules('accc','Account No','required');
                $this->form_validation->set_rules('std','STD Code','required');
            }if($this->input->post('oprator_name') == 'RELIANCE POSTPAID'){
                $this->form_validation->set_rules('std','STD Code','required');
            }
            $this->form_validation->set_rules('amount','amount','required|max_length[4]|numeric');
             if($this->form_validation->run() == TRUE){
                 $recharge_type = 4;
                $result = $this->recharge_model->doPostRecharge( $recharge_type);
                if($result == 1){                    
                    $this->session->set_flashdata('msg','Your Recharge is success full.');  
                    redirect('recharge/post_recharge');
                }
                else if($result == 2){
                    $this->session->set_flashdata('err','Recharge fail : Some surver error occurred.');  
                   redirect('recharge/post_recharge');
                }else{
                     $this->session->set_flashdata('err','Recharge fail : Some internal error occurred.');  
                    redirect('recharge/post_recharge');
                }
            }
       }
       $data['details'] = $this->recharge_model->getrechargeDetails();
      $data['amt'] = $this->recharge_model->getamt();
        $data['all_operator'] = $this->recharge_model->getPaymentDetail();
        $this->load->view('layout/inner_template',$data);
    }
     public function dth_recharge(){
         if( $this->session->userdata('login_id') == ''){redirect('login');}
        if( $this->session->userdata('recharge') != '1'){redirect('dashboard');}
        //print_r( $this->session->all_userdata());
        $data = array(
              'title'         => 'SC :: DTH RECHARGE',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'recharge_dth'
             );
         if($this->input->post('amount')){
            $this->form_validation->set_rules('mobile','Mobile','required|min_length[10]|numeric');
            $this->form_validation->set_rules('code','Operator Code','required');
            $this->form_validation->set_rules('oprator_name','Operator Name','required');
            $this->form_validation->set_rules('amount','amount','required|max_length[4]|numeric');
           // $this->form_validation->set_rules('circle','Circle','required');
             if($this->form_validation->run() == TRUE){
                 $recharge_type = 2;
                $result = $this->recharge_model->doRecharge( $recharge_type);
                if($result == 0){                    
                    $this->session->set_flashdata('msg','Your Recharge is success full.');  
                    redirect('recharge/dth_recharge');
                }
                else if($result == 2){
                    $this->session->set_flashdata('err','Recharge fail : Some surver error occurred.');  
                   redirect('recharge/dth_recharge');
                }else{
                     $this->session->set_flashdata('err','Recharge fail : Some internal error occurred.');  
                    redirect('recharge/dth_recharge');
                }
            }
       }
       $data['details'] = $this->recharge_model->getrechargeDetails();
        $data['amt'] = $this->recharge_model->getamt();
        $operator_type = 2;
        $data['all_operator'] = $this->recharge_model->getAllOperator($operator_type);
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