<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recharge extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('recharge_model'); 
        $this->load->model('settings_model');
        
    }
    public function getRechargeDetails(){
        $data['recharges'] = $this->recharge_model->getRechargeDetails1(); 
        
    } 
    public function getamt(){
         $data['amt'] = $this->recharge_model->getamt();         
         echo $data['amt']->REMAININGAMOUNT;
    }
  
    
    public function offLineRecharge(){
        $req = $this->recharge_model->insertOff();
        $recharge_type = 0;
        $codeval = "";
        $V ="";
       $val = $this->input->get('message', TRUE);
       $url = explode(" ",$val);
       
      if(count($url) == 2){
          if(strtoupper($url['0']) == 'RC' && strtoupper($url['1']) == 'BAL' ){
           $balance = $this->recharge_model->bal($req);
       }else{
            $this->recharge_model->updateOff($req,"Incorrect pattern, Please Send Correct");
               $number = $this->input->get('number', TRUE);
                $ch = curl_init();
                        $optArray = array(
			CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$number&from=ESYTOP&message=Incorrect+pattern,+Please+Send+Correct",
			CURLOPT_RETURNTRANSFER => true
		);
                        curl_setopt_array($ch, $optArray);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		$result = curl_exec($ch);
		curl_close($ch);
       }
      }else{
      
        $rc = $url['0'];        
        if($rc == 'RC' || $rc == 'rc' || $rc == 'Rc'){
           $code = strtoupper ($url['1']);
           if($code == "AC" ){
               $recharge_type = 1;
               $codeval = "AIRCEL";
               $V ="HACL";
           }else if($code == "AT"){
               $recharge_type = 1;
               $codeval = "AIRTEL";
                $V ="HART";
           }else if($code == "BN"){
               $recharge_type = 1;
               $codeval = "BSNL";
               $V ="HBST";
           }else if($code == "BV"){
               $recharge_type = 1;
               $codeval = "BSNL VALIDITY";
               $V ="HBSV";
           }else if($code == "ID"){
               $recharge_type = 1;
               $codeval = "IDEA";
                $V ="HIDE";
           }else if($code == "LO"){
               $recharge_type = 1;
               $codeval = "LOOP";
               $V ="HBPL";           
           }else if($code == "MT"){
               $recharge_type = 1;
               $codeval = "MTNL";
               $V ="HMDT";
           }else if($code == "MS"){
               $recharge_type = 1;
               $codeval = "MTS";
               $V ="HMTS";
           }else if($code == "RC"){
               $recharge_type = 1;
               $codeval = "RELIANCE CDMA";
               $V ="HREC";
           }else if($code == "RG"){
               $recharge_type = 1;
               $codeval = "RELIANCE GSM";
               $V ="HREG";
           }else if($code == "TI"){
               $recharge_type = 1;
               $codeval = "TATA INDICOM";
               $V ="HTAI";
           }else if($code == "TD"){
               $recharge_type = 1;
               $codeval = "TATA DOCOMO";
               $V ="HTAD";
           }else if($code == "TS"){
               $recharge_type = 1;
               $codeval = "TATA DOCOMO SPECIAL";
               $V ="HTDS";
           }else if($code == "UT"){
               $recharge_type = 1;
               $codeval = "UNINOR";
               $V ="HUNI";
           }else if($code == "US"){
               $recharge_type = 1;
               $codeval = "UNINOR SPECIAL";
               $V ="HUNS";           
           }else if($code == "VT"){
               $recharge_type = 1;
               $codeval = "VIDEOCON";
               $V ="HVID";
           }else if($code == "VS"){
               $recharge_type = 1;
               $codeval = "VIDEOCON SPECIAL";
               $V ="HVIS";
           }else if($code == "VG"){
               $recharge_type = 1;
               $codeval = "VIRGIN GSM";
               $V ="HVIG";
           }else if($code == "VC"){
               $recharge_type = 1;
               $codeval = "VIRGIN CDMA";
               $V ="HVIC";
           }else if($code == "VF"){
               $recharge_type = 1;
               $codeval = "VODAFONE";
               $V ="HVOD";
           }else if($code == "AD"){
                $recharge_type = 2;
                $codeval = "AIRTEL DTH";
               $V ="HADH";
           }else if($code == "BT"){
               $recharge_type = 2;
                $codeval = "BIGTV";
               $V ="HBTV";
           }else if($code == "DT"){
               $recharge_type = 2;
                $codeval = "DISH TV";
               $V ="HDIS";
           }else if($code == "TS"){
               $recharge_type = 2;
                $codeval = "TATASKY";
               $V ="HTSY";
           }else if($code == "SD"){
               $recharge_type = 2;
                $codeval = "SUN DIRECT";
               $V ="HSUN";
           }else if($code == "VD"){
               $recharge_type = 2;
                $codeval = "VIDEOCON D2H";
               $V ="HVIH";
           }else{
               $recharge_type = 0;
               $codeval = "";
               $V ="";
               
                $this->recharge_model->updateOff($req,"Incorrect pattern, Please Send Correct");
               $number = $this->input->get('number', TRUE);
                $ch = curl_init();
                        $optArray = array(
			CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$number&from=ESYTOP&message=Incorrect+pattern,+Please+Send+Correct",
			CURLOPT_RETURNTRANSFER => true
		);
                        curl_setopt_array($ch, $optArray);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		$result = curl_exec($ch);
		curl_close($ch);
           }
           
        }
        
        $result = $this->recharge_model->doRechargeoff( $recharge_type,$codeval,$V,$url['2'],$url['3'],$req);
      }
    }
   
    public function mobile_recharge(){
        if( $this->session->userdata('login_id') == ''){redirect('login');}
        if( $this->session->userdata('recharge') != '1'){$this->session->set_flashdata('err','Access Denied, Please contact to administrator.');redirect('dashboard');}
        if( $this->session->userdata('prepaid_mobile') != '1'){$this->session->set_flashdata('err','Access Denied, Please contact to administrator.'); redirect('dashboard');}
        if($this->session->userdata('my_type') != 4 && $this->session->userdata('my_type') != 5 ){$this->session->set_flashdata('err','Access Denied, Please contact to administrator.'); redirect('dashboard');}
        //print_r( $this->session->all_userdata());
        $data = array(
              'title'         => 'ESY TOPUP :: PRE PAID RECHARGE',
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
		$amt = $this->settings_model->checkVirtual();	
                
                if($amt >= $this->input->post('amount')){ 
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
                }else{
                    $this->session->set_flashdata('err','Recharge fail : You are not having sufficient balance amount for recharge.');  
                    redirect('recharge/mobile_recharge');
                }
            }
       }
       $data['details'] = $this->recharge_model->getrechargeDetails();
       $operator_type = 1;
	   $data['amt'] = $this->recharge_model->getamt();
	   $data['circle'] = $this->recharge_model->circle();
	   //$data['amt'] = $this->recharge_model->getamt1();
        $data['all_operator'] = $this->recharge_model->getAllOperator($operator_type);
        $this->load->view('layout/inner_template',$data);
    }
     public function post_recharge(){
         if( $this->session->userdata('login_id') == ''){redirect('login');}
        if( $this->session->userdata('recharge') != '1'){$this->session->set_flashdata('err','Access Denied, Please contact to administrator.'); redirect('dashboard');}
        if( $this->session->userdata('postpaid_mobile') != '1'){$this->session->set_flashdata('err','Access Denied, Please contact to administrator.'); redirect('dashboard');}
        if($this->session->userdata('my_type') != 4 && $this->session->userdata('my_type') != 5 ){$this->session->set_flashdata('err','Access Denied, Please contact to administrator.'); redirect('dashboard');}
        $data = array(
              'title'         => 'ESY TOPUP :: POST PAID RECHARGE',
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
                 $amt = $this->settings_model->checkVirtual();	
                if($amt >= $this->input->post('amount')){
                    $result = $this->recharge_model->doPostRecharge( $recharge_type);
                    if($result == 0){                    
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
                }else{
                    $this->session->set_flashdata('err','Recharge fail : You are not having sufficient balance amount for recharge.');  
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
        if( $this->session->userdata('recharge') != '1'){$this->session->set_flashdata('err','Access Denied, Please contact to administrator.'); redirect('dashboard');}
        if( $this->session->userdata('dth') != '1'){$this->session->set_flashdata('err','Access Denied, Please contact to administrator.'); redirect('dashboard');}
        if($this->session->userdata('my_type') != 4 && $this->session->userdata('my_type') != 5 ){$this->session->set_flashdata('err','Access Denied, Please contact to administrator.'); redirect('dashboard');}
        $data = array(
              'title'         => 'ESY TOPUP :: DTH RECHARGE',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'recharge_dth'
             );
         if($this->input->post('amount')){
            $this->form_validation->set_rules('mobile','Mobile','required|numeric');
            $this->form_validation->set_rules('code','Operator Code','required');
            $this->form_validation->set_rules('oprator_name','Operator Name','required');
            $this->form_validation->set_rules('amount','amount','required|max_length[4]|numeric');
           // $this->form_validation->set_rules('circle','Circle','required');
             if($this->form_validation->run() == TRUE){
                 $recharge_type = 2;
                 $amt = $this->settings_model->checkVirtual();	
                if($amt >= $this->input->post('amount')){
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
                }else{
                    $this->session->set_flashdata('err','Recharge fail : You are not having sufficient balance amount for recharge.');  
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
              'title'         => 'ESY TOPUP :: RECHARGE DETAILS',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'recharge_details'
             );
         $data['details'] = $this->recharge_model->getrechargeDetails();
        $this->load->view('layout/inner_template',$data);
    }
}