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
            $data['post_ary'] = array();
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
                            $data['post_ary'] = array('getfr' => $gefr, 'geto' => $geto , 'val' => $val );
                            if($this->session->userdata("my_type") == "1"){
                                    $val = $this->input->post("fname")?$this->input->post("fname"):'';
                                }
                            $data["view"]     =   $this->report_model->recharge_reports($gefr,$geto,$val);
                            
                    }else{
                        $gefr = ''; $geto='';$val='aa';
                        $data['post_ary'] = array('getfr' => $gefr, 'geto' => $geto , 'val' => $val );
                    }
                }else{
				$from   = date('m/d/Y');
				$ex     =   explode("/",$from);
				$gefr   =   $ex["2"]."-".$ex["0"]."-".$ex["1"]." 00:00:00";
				
				$to   = date('m/d/Y');
				$exto     =   explode("/",$to);
				$geto   =   $exto["2"]."-".$exto["0"]."-".$exto["1"]." 23:59:59";
                                if($this->session->userdata("my_type") == "1"){
                                    $val='';
                                }
                                $data['post_ary'] = array('getfr' => $gefr, 'geto' => $geto , 'val' => $val );
				$data["view"]     =   $this->report_model->recharge_reports($gefr,$geto,$val);
		}
               
            $this->load->view('layout/inner_template',$data);
    }
    
    public function recharge_reportsEXL(){
        $this->load->helper('php-excel');
        $gefr = $this->uri->segment(3);
        $geto = $this->uri->segment(4);
        $val = $this->uri->segment(5);
        $data['users'] = $this->report_model->recharge_reports($gefr,$geto,$val); 
        $data['profile'] = $this->report_model->profile($val); 
        $data_array[] = array( "Done By", "Date & Time", "Tractarians No", "Amount",   "Details", "Number", "Status");
        foreach ($data['users'] as $row)
            {
                    if($row->recharge_type == 1){
                        $detail = strtolower($row->op_name). "Prepaid , ".$row->number ;
                    }else if($row->recharge_type == 2){
                        $detail =  strtolower($row->op_name). "DTH, ".$row->number ;
                    }else if($row->recharge_type == 4){
                        $detail =  strtolower($row->op_name). " ".$row->number ;
                    }else{
                        $detail =  " ";
                    }
                    if($row->trans_no != ''){$val = "Success";}else{$val = "Fail";}
                    $data_array[] = array($data['profile']->first_name.' '.$data['profile']->last_name, $row->cur_time, 'SCR-0'.$row->rid, $row->amount, $detail, $row->number, $val );
            }
            $xls = new Excel_XML;
            $xls->addArray ($data_array);
            $xls->generateXML ( "RechargeDetails" );
    }

    public function getUsers(){
             $valo    =   $this->session->userdata("login_id");
            $my_type    =   $this->input->post("user");
            $name1      =   $this->report_model->getUsers($valo,$my_type);
            $val = '<option value=""> Get All</option>';
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
            $data['post_ary'] = array();
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
                            $data['post_ary'] = array('getfr' => $gefr, 'geto' => $geto , 'val' => $val );
                            if($this->session->userdata("my_type") == "1"){
                                    $val = $this->input->post("fname")?$this->input->post("fname"):'';
                                }
                            $data["view"]     =   $this->report_model->offline_reports($gefr,$geto,$val);
                            
                    }else{
                        $gefr = ''; $geto='';$val='';
                        $data['post_ary'] = array('getfr' => $gefr, 'geto' => $geto , 'val' => $val );
                    }
            }else{
				$from   = date('m/d/Y');
				$ex     =   explode("/",$from);
				$gefr   =   $ex["2"]."-".$ex["0"]."-".$ex["1"]." 00:00:00";
				
				$to   = date('m/d/Y');
				$exto     =   explode("/",$to);
				$geto   =   $exto["2"]."-".$exto["0"]."-".$exto["1"]." 23:59:59";
				$data['post_ary'] = array('getfr' => $gefr, 'geto' => $geto , 'val' => $val );
                                 if($this->session->userdata("my_type") == "1"){
                                     $val = '';
                                    $data['post_ary'] = array('getfr' => '', 'geto' => '' , 'val' => '' );
                                }
				$data["view"]     =   $this->report_model->offline_reports($gefr,$geto,$val);
			}
            
            $this->load->view('layout/inner_template',$data);
    }
     public function offline_reportsEXL(){
        $this->load->helper('php-excel');
        $gefr = $this->uri->segment(3);
        $geto = $this->uri->segment(4);
        $val = $this->uri->segment(5);
        $data['users'] = $this->report_model->offline_reports($gefr,$geto,$val); 
        $data['profile'] = $this->report_model->profile($val); 
        $data_array[] = array( "Done By", "Date & Time", "Sender", "Description",   "Response");
        foreach ($data['users'] as $row)
            {                   
                    $url = explode(" ",$row->descp);
                    if(count($url) == 4){$val = $url['3'];}else{$val = $url['2'];}
                    if($row->respons != ''){$res =  $row->respons;}else{$res = "Recharge fail, Please Try again";}
                    $data_array[] = array($row->first_name." ".$row->last_name, $row->done, $val, $row->descp, $res );
            }
            $xls = new Excel_XML;
            $xls->addArray ($data_array);
            $xls->generateXML ( "offline_Details" );
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
             if($this->session->userdata("my_type") != "5"){ 
                    $valo    =   $this->session->userdata("login_id");
                    $my_type    =   $this->session->userdata("my_type");
                    $data["type"]   =   $this->report_model->user_type($my_type);
                    $data['name1']       =  $this->report_model->getNames($valo,$my_type);
            }
            $data['post_ary'] = array();
            if($this->input->post("search")){
                $val    =   ($this->input->post("fname") == '')? $this->session->userdata("login_id"):$this->input->post("fname");
                    $this->form_validation->set_rules("from",  "From Date",  "required");
                    $this->form_validation->set_rules("to",     "To Date",   "required");
                    if( $this->form_validation->run() == TRUE ){
                            $from   = $this->input->post("from");
                            $ex     =   explode("/",$from);
                            $gefr   =   $ex["2"]."-".$ex["0"]."-".$ex["1"]." 00:00:00";
                            
                            $to   = $this->input->post("to");
                            $exto     =   explode("/",$to);
                            $geto   =   $exto["2"]."-".$exto["0"]."-".$exto["1"]." 23:59:59";
                            $data['post_ary'] = array('getfr' => $gefr, 'geto' => $geto , 'val' => $val );
                             if($this->session->userdata("my_type") == "1"){
                                    $val = $this->input->post("fname")?$this->input->post("fname"):'';                                    
                                }
                            $data["view"]     =   $this->report_model->trasaction_reports($gefr,$geto,$val);
                            
                    }else{
                        $gefr = ''; $geto='';$val='';
                        $data['post_ary'] = array('getfr' => $gefr, 'geto' => $geto , 'val' => $val );
                    }
            }else{
				$from   = date('m/d/Y');
				$ex     =   explode("/",$from);
				$gefr   =   $ex["2"]."-".$ex["0"]."-".$ex["1"]." 00:00:00";
				
				$to   = date('m/d/Y');
				$exto     =   explode("/",$to);
				$geto   =   $exto["2"]."-".$exto["0"]."-".$exto["1"]." 23:59:59";
				$data['post_ary'] = array('getfr' => $gefr, 'geto' => $geto , 'val' => $val );
                                if($this->session->userdata("my_type") == "1"){
                                    $val = '';
                                }
				$data["view"]     =   $this->report_model->trasaction_reports($gefr,$geto,$val);
			}
            $this->load->view('layout/inner_template',$data);
    }
     public function trasaction_reportsEXL(){
        $this->load->helper('php-excel');
        $gefr = $this->uri->segment(3);
        $geto = $this->uri->segment(4);
        $val = $this->uri->segment(5);
        $data['users'] = $this->report_model->trasaction_reports($gefr,$geto,$val); 
        $data['profile'] = $this->report_model->profile($val); 
        $data_array[] = array( "Done By", "Track Number", "Amount", "Type",   "Balance", "Date & Time", "Remarks");
        foreach ($data['users'] as $row)
            {                   
                    
                    if($row->type == 1){ $val = "Credited";}else if($row->type == 2){ $val = "Debited";}else{ $val = "N/A";}
                    
                    $data_array[] = array($data['profile']->first_name.' '.$data['profile']->last_name, "SCT-0".$row->trans_id, $row->trans_amt, $val, $row->cur_amount, $row->trans_date, $row->trans_remark );
            }
            $xls = new Excel_XML;
            $xls->addArray ($data_array);
            $xls->generateXML ( "trasactionDetails" );
    }
    public function refund_req(){
            $val    =   $this->report_model->refund_req();
            echo $val;
    }
}
?>