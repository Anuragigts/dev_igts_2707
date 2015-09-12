<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {
    public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('report_model');
            date_default_timezone_set('Asia/Kolkata');  
    }
    public function  recharge_reports(){
             if($this->session->userdata('my_type') == ""){redirect('/');}
            $data = array(
                    'title'         => 'ESY TOPUP :: Recharge Reports',
                    'metakeyword'   => 'ESY TOPUP :: Recharge Reports',
                    'metadesc'      => 'ESY TOPUP :: Recharge Reports',
                    'content'       => 'recharge_reports'
            );
            $data["view"]   =   array();
            $val    =   $this->session->userdata("login_id");
            if($this->session->userdata("my_type") != "5"){ 
                    $valo    =   $this->session->userdata("login_id");
                    $my_type    =   $this->session->userdata("my_type");
                    $data["type"]   =   $this->report_model->user_type($my_type);
                    $data['name1']       =  $this->report_model->getNames($valo,$my_type);
            }
            if($this->input->post("search")){
                    $this->form_validation->set_rules("from",  "From Date",  "required");
                    $this->form_validation->set_rules("to",     "To Date",   "required");
                    if($this->session->userdata("my_type") != "5"){
                        //$this->form_validation->set_rules("fname","Name","required");
                         $val = $this->input->post("fname")?$this->input->post("fname"):$val;
                    }
                    if( $this->form_validation->run() == TRUE ){
                            $from   = $this->input->post("from");
                            $ex     =   explode("/",$from);
                            $gefr   =   $ex["2"]."-".$ex["0"]."-".$ex["1"]." 00:00:00";
                            
                            $to   = $this->input->post("to");
                            $exto     =   explode("/",$to);
                            $geto   =   $exto["2"]."-".$exto["0"]."-".$exto["1"]." 23:59:59";
                            $data["view"]     =   $this->report_model->recharge_reports($gefr,$geto,$val);
                            
                    }
            }
            
            $this->load->view('layout/inner_template',$data);
    }
    public function getUsers(){
             $valo    =   $this->session->userdata("login_id");
            $my_type    =   $this->input->post("user");
            $name1      =   $this->report_model->getUsers($valo,$my_type);
            $val = '<option value=""> Select Name</option>';
            foreach ($name1 as $na){ 
              $val  .=    '<option value="'.$na->login_id.'" >'.$na->first_name." ".$na->last_name.'</option>';
            }
            echo $val;
    }
    public function  commission_reports(){
             if($this->session->userdata('my_type') == ""){redirect('/');}
            $data = array(
                    'title'         => 'ESY TOPUP :: Commission Reports',
                    'metakeyword'   => 'ESY TOPUP :: Commission Reports',
                    'metadesc'      => 'ESY TOPUP :: Commission Reports',
                    'content'       => 'commission_reports'
            );
            $data["view"]   =   array();
            $val    =   $this->session->userdata("login_id");
            if($this->session->userdata("my_type") != "5"){ 
                    $valo    =   $this->session->userdata("login_id");
                    $my_type    =   $this->session->userdata("my_type");
                    $data["type"]   =   $this->report_model->user_type($my_type);
                    $data['name1']       =  $this->report_model->getNames($valo,$my_type);
            }
            if($this->input->post("search")){
                    $this->form_validation->set_rules("from",  "From Date",  "required");
                    $this->form_validation->set_rules("to",     "To Date",   "required");
                    if($this->session->userdata("my_type") != "5"){ 
                            //$this->form_validation->set_rules("fname",     "Name",   "required");
                           $val = $this->input->post("fname")?$this->input->post("fname"):$val;
                    }
                    if( $this->form_validation->run() == TRUE ){
                            $from   = $this->input->post("from");
                            $ex     =   explode("/",$from);
                            $gefr   =   $ex["2"]."-".$ex["0"]."-".$ex["1"]." 00:00:00";
                            
                            $to   = $this->input->post("to");
                            $exto     =   explode("/",$to);
                            $geto   =   $exto["2"]."-".$exto["0"]."-".$exto["1"]." 23:59:59";
                            
                            $data["view"]     =   $this->report_model->commission_reports($gefr,$geto,$val);
                            
                    }
            }
            
            $this->load->view('layout/inner_template',$data);
    }
    public function  offline_reports(){
             if($this->session->userdata('my_type') == ""){redirect('/');}
            $data = array(
                    'title'         => 'ESY TOPUP :: Offline Reports',
                    'metakeyword'   => 'ESY TOPUP :: Offline Reports',
                    'metadesc'      => 'ESY TOPUP :: Offline Reports',
                    'content'       => 'offline_reports'
            );
            $data["view"]   =   array();
            $val    =   $this->session->userdata("login_id");
            if($this->session->userdata("my_type") != "5"){ 
                    $valo    =   $this->session->userdata("login_id");
                    $my_type    =   $this->session->userdata("my_type");
                    $data["type"]   =   $this->report_model->user_type($my_type);
                    $data['name1']       =  $this->report_model->getNames($valo,$my_type);
            }
            if($this->input->post("search")){
                    $this->form_validation->set_rules("from",  "From Date",  "required");
                    $this->form_validation->set_rules("to",     "To Date",   "required");
                    if($this->session->userdata("my_type") != "5"){ 
                           $val = $this->input->post("fname")?$this->input->post("fname"):$val;
                    }
                    if( $this->form_validation->run() == TRUE ){
                            $from   = $this->input->post("from");
                            $ex     =   explode("/",$from);
                            $gefr   =   $ex["2"]."-".$ex["0"]."-".$ex["1"]." 00:00:00";
                            
                            $to   = $this->input->post("to");
                            $exto     =   explode("/",$to);
                            $geto   =   $exto["2"]."-".$exto["0"]."-".$exto["1"]." 23:59:59";
                            
                            $data["view"]     =   $this->report_model->offline_reports($gefr,$geto,$val);
                            
                    }
            }
            
            $this->load->view('layout/inner_template',$data);
    }
    public function  dmr_reports(){
             if($this->session->userdata('my_type') == ""){redirect('/');}
            $data = array(
                    'title'         => 'ESY TOPUP :: DMR Reports',
                    'metakeyword'   => 'ESY TOPUP :: DMR Reports',
                    'metadesc'      => 'ESY TOPUP :: DMR Reports',
                    'content'       => 'dmr_reports'
            );
            $data["view"]   =   array();
            
            $this->load->view('layout/inner_template',$data);
    }
    public function  trasaction_reports(){
             if($this->session->userdata('my_type') == ""){redirect('/');}
            $data = array(
                    'title'         => 'ESY TOPUP :: Transaction Reports',
                    'metakeyword'   => 'ESY TOPUP :: Transaction Reports',
                    'metadesc'      => 'ESY TOPUP :: Transaction Reports',
                    'content'       => 'trasaction_reports'
            );
            $data["view"]   =   array();
            $val    =   $this->session->userdata("login_id");
            if($this->input->post("search")){
                    $this->form_validation->set_rules("from",  "From Date",  "required");
                    $this->form_validation->set_rules("to",     "To Date",   "required");
                    if( $this->form_validation->run() == TRUE ){
                            $from   = $this->input->post("from");
                            $ex     =   explode("/",$from);
                            $gefr   =   $ex["2"]."-".$ex["0"]."-".$ex["1"]." 00:00:00";
                            
                            $to   = $this->input->post("to");
                            $exto     =   explode("/",$to);
                            $geto   =   $exto["2"]."-".$exto["0"]."-".$exto["1"]." 23:59:59";
                            
                            $data["view"]     =   $this->report_model->trasaction_reports($gefr,$geto,$val);
                            
                    }
            }
            $this->load->view('layout/inner_template',$data);
    }
    public function refund_req(){
            $val    =   $this->report_model->refund_req();
            echo $val;
    }
}
?>