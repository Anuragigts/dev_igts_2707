<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Flight extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('flight_model');
        $this->load->model('report_model');
        $this->load->model('common');
        if( $this->session->userdata('login_id') == ''){redirect('login');}
        if( $this->session->userdata('flight') != '1'){redirect('dashboard');}
    }
    /*
     * Search flight
     */
    public function searchFlight(){
        $data = array(
              'title'         => 'SC :: FLIGHT SEARCH',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'flight_search'
             );
         $data['details'] = array();
         $data['ttype'] = array('type'=>'O','fType'=>'I');
        if($this->input->post('search')){
             $this->form_validation->set_rules('fType','Booking Type','required');
             $this->form_validation->set_rules('departure','Departure Date','required');
             $this->form_validation->set_rules('type','Type','required');
             if($this->input->post('type')=='R'){
                $this->form_validation->set_rules('return','Return Date','required');
             }
             $this->form_validation->set_rules('from','From Location','required');
             $this->form_validation->set_rules('to','To Location','required');
             $this->form_validation->set_rules('adult','Adult','required');
             $this->form_validation->set_rules('child','Child','required');
             $this->form_validation->set_rules('class','Class','required');
             $this->form_validation->set_rules('infant','Infant','required');
              if($this->form_validation->run() == TRUE){
                  
                $data['pos'] = array('class' => $this->input->post('class'),'adult' => $this->input->post('adult'), 'child' => $this->input->post('child'), 'infant' => $this->input->post('infant'), 'type' => $this->input->post('type'));
                $data['details'] = $this->flight_model->getFlight();
               
            }
            $data['ttype'] = array('type'=>$this->input->post('type'),'fType'=>$this->input->post('fType'));
        }
        $this->session->unset_userdata('AirlineId');
        $this->session->unset_userdata('FlightId');
        $this->session->unset_userdata('ClassCode');
        $this->session->unset_userdata('Track');
        $this->session->unset_userdata('BasicAmount');
        $this->session->unset_userdata('Adult');
        $this->session->unset_userdata('Child');
        $this->session->unset_userdata('Infrunt');
        
        $this->session->unset_userdata('logo');
        $this->session->unset_userdata('name1');
        $this->session->unset_userdata('dep');
        $this->session->unset_userdata('source');
        $this->session->unset_userdata('arr');
        $this->session->unset_userdata('dest');
        $this->session->unset_userdata('dur');
        $this->session->unset_userdata('stop');
        $this->session->unset_userdata('type');
        $this->session->unset_userdata('class');
        $this->session->unset_userdata('flight_i');
            
         $data['logos'] = $this->flight_model->getLogo();
        $this->load->view('layout/inner_template',$data);
    }
    
    /*
     * Flight History 
     */
     public function flightHistory(){
        $data = array(
              'title'         => 'SC :: FLIGHT SEARCH',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'flight_history'
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
                            $gefr   =   $ex["2"]."-".$ex["0"]."-".$ex["1"];
                            
                            $to   = $this->input->post("to");
                            $exto     =   explode("/",$to);
                            $geto   =   $exto["2"]."-".$exto["0"]."-".$exto["1"];
                            $data["view"]     =   $this->flight_model->flight_reports($gefr,$geto,$val);
                            
                    }
            }else{
				$from   = date('m/d/Y');
				$ex     =   explode("/",$from);
				$gefr   =   $ex["2"]."-".$ex["0"]."-".$ex["1"];
				
				$to   = date('m/d/Y');
				$exto     =   explode("/",$to);
				$geto   =   $exto["2"]."-".$exto["0"]."-".$exto["1"];
				$data["view"]     =   $this->flight_model->flight_reports($gefr,$geto,$val);
			}
        $this->load->view('layout/inner_template',$data);
    }
    
    /*
     * Fare details
     */
    
    public function fare(){
        $airlineId = $_POST['AirlineId'];
        $flightId = $_POST['FlightId'];
        $classCode = $_POST['ClassCode'];
        $track = $_POST['track'];
        $basicAmount = $_POST['BasicAmount'];
        $infant = $_POST['infant'];
        $child = $_POST['child'];
        $adult = $_POST['adult'];
        $tourType = $_POST['tourType'];
        
        $return = $this->flight_model->getFareTax($airlineId, $flightId, $classCode, $track, $basicAmount, $infant, $child, $adult,$tourType);
        echo $return;
    }
    
    /*
     * Flight booking 
     */
    public function book(){
        
            $data = array(
                 'title'         => 'SC :: FLIGHT Book',
                 'metakeyword'   => '',
                 'metadesc'      => '',
                 'content'       => 'flight_book'
                );
           $airlineId = ''; 
           if($this->input->post('AirlineId') != ''){
               $airlineId      = $this->input->post('AirlineId');
               $flightId       = $this->input->post('FlightId');
               $classCode      = $this->input->post('ClassCode');
               $track          = $this->input->post('Track');
               $basicAmount    = $this->input->post('BasicAmount');
               $adult          = $this->input->post('Adult');
               $child          = $this->input->post('Child');
               $infrunt        = $this->input->post('Infrunt');

               $logo           = $this->input->post('logo');
               $name           = $this->input->post('name');
               $dep            = $this->input->post('dep');
               $source         = $this->input->post('source');
               $arr            = $this->input->post('arr');
               $dest           = $this->input->post('dest');
               $dur            = $this->input->post('dur');
               $stop           = $this->input->post('stop');
               $type           = $this->input->post('type');
               $class           = $this->input->post('class');
               $flight_i           = $this->input->post('flight_i');
               $tourType           = $this->input->post('tourType');
           }
           if($airlineId != '' ){
               $this->session->set_userdata('AirlineId',   "$airlineId");
               $this->session->set_userdata('FlightId',    "$flightId");
               $this->session->set_userdata('ClassCode',   "$classCode");
               $this->session->set_userdata('Track',       "$track");
               $this->session->set_userdata('BasicAmount', "$basicAmount");
               $this->session->set_userdata('Adult',       "$adult");
               $this->session->set_userdata('Child',       "$child");
               $this->session->set_userdata('Infrunt',     "$infrunt");

               $this->session->set_userdata('logo',        "$logo");
               $this->session->set_userdata('name1',       "$name");
               $this->session->set_userdata('dep',         "$dep");
               $this->session->set_userdata('source',      "$source");
               $this->session->set_userdata('arr',         "$arr");
               $this->session->set_userdata('dest',        "$dest");
               $this->session->set_userdata('dur',         "$dur");
               $this->session->set_userdata('stop',        "$stop");
               $this->session->set_userdata('type',        "$type");
               $this->session->set_userdata('class',       "$class");
               $this->session->set_userdata('flight_i',       "$flight_i");
               $this->session->set_userdata('tourType',       "$tourType");
           }
           $data['flight'] = array('logo' => $this->session->userdata('logo'),
                           'name'  => $this->session->userdata('name1'),
                           'dep'  => $this->session->userdata('dep'),
                           'source'  => $this->session->userdata('source'),
                           'arr'  => $this->session->userdata('arr'),
                           'dest'  => $this->session->userdata('dest'),
                           'dur'  => $this->session->userdata('dur'),
                           'stop'  => $this->session->userdata('stop')  );

           $airlineId  = $this->session->userdata('AirlineId');
           $flightId   = $this->session->userdata('FlightId');
           $classCode  = $this->session->userdata('ClassCode');
           $track      = $this->session->userdata('Track');
           $basicAmount = $this->session->userdata('BasicAmount');
           $infant     = $this->session->userdata('Infrunt');
           $child      = $this->session->userdata('Child');
           $adult      = $this->session->userdata('Adult');
           $tourType   = $this->session->userdata('tourType');
          // echo $airlineId.','. $flightId.',' .$classCode.','. $track.','. $basicAmount.','. $infant.','. $child.','. $adult;
           if($this->session->userdata('AirlineId') == '')
            {
              redirect('flight/searchFlight');  
            }
           $data['get_details'] = $this->flight_model->getFareTax($airlineId, $flightId, $classCode, $track, $basicAmount, $infant, $child, $adult,$tourType);
           $data['getTotal'] = $this->flight_model->getFareTotal($airlineId, $flightId, $classCode, $track, $basicAmount, $infant, $child, $adult,$tourType);

           if($this->input->post('book_ticket')){
               $this->form_validation->set_rules('first_name[]', 'First Name',   'required');
               $this->form_validation->set_rules('last_name[]',  'Last Name',    'required');
               $this->form_validation->set_rules('mobile_no',  'Mobile Number','required');
               $this->form_validation->set_rules('login_email','Email',        'required');
               $this->form_validation->set_rules('zip',        'ZIP',          'required');
               $this->form_validation->set_rules('pp[]',        'Passport No',          'required');
               $this->form_validation->set_rules('expiry[]',     'Passport Expiry Date',          'required');
               $this->form_validation->set_rules('dob[]',        'Date Of Birth','required');
               $this->form_validation->set_rules('add',        'address','required');
                 if($this->form_validation->run() == TRUE){

                   $booking_details = $this->flight_model->bookTicket($tourType);
                 echo $booking_details;
                   if($booking_details == "1"){
                       $this->session->set_flashdata('msg','Ticket Booked Successfully.');  
                       redirect('flight/Status/'.$this->session->userdata('Track'));
                   }else if($booking_details == "2"){
                       $this->session->set_flashdata('msg','Ticket Status is Pending, Please refresh this page.');  
                       redirect('flight/Status/'.$this->session->userdata('Track'));
                   }else if($booking_details == "0"){
                       $this->session->set_flashdata('msg','Ticket Status is Pending, Please refresh this page.');  
                       redirect('flight/Status/'.$this->session->userdata('Track'));
                   }else{
                       $this->session->set_flashdata('err',"Error: ".$booking_details);  
                       redirect('flight/book');
                   }

               }
            }
            $this->load->view('layout/inner_template',$data);
       
    }
    
    /**
     * Flight booking status
     */
    public function Status(){
        $data = array(
              'title'         => 'SC :: FLIGHT Book',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'flight_status'
             );
        
        $track = $this->uri->segment(3);
        $data['ticket'] = array();
        $data['status'] = $this->flight_model->checkStatus($track);
        $data['ticket_details'] = $this->flight_model->getTicketDetails($track);
        //echo $data['ticket_details']->F_ID;
        if(count( $data['ticket_details']) !=0){
            $data['ticket'] = $this->flight_model->getTicket($data['ticket_details']->F_ID);
        }
        
        $this->session->unset_userdata('AirlineId');
        $this->session->unset_userdata('FlightId');
        $this->session->unset_userdata('ClassCode');
        $this->session->unset_userdata('Track');
        $this->session->unset_userdata('BasicAmount');
        $this->session->unset_userdata('Adult');
        $this->session->unset_userdata('Child');
        $this->session->unset_userdata('Infrunt');
        
        $this->session->unset_userdata('logo');
        $this->session->unset_userdata('name1');
        $this->session->unset_userdata('dep');
        $this->session->unset_userdata('source');
        $this->session->unset_userdata('arr');
        $this->session->unset_userdata('dest');
        $this->session->unset_userdata('dur');
        $this->session->unset_userdata('stop');
        $this->session->unset_userdata('type');
        $this->session->unset_userdata('class');
        $this->session->unset_userdata('flight_i');
        
        $this->load->view('layout/inner_template',$data);
    }
    
    public function cancellation(){
        $data = array(
              'title'         => 'SC :: FLIGHT Book',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'flight_cancellation'
             );
        $data['forcncl'] = array();
             if($this->input->post('cancel')){
                $this->form_validation->set_rules('esyPNR',        'EsyTopup PNR',      'required');
                $this->form_validation->set_rules('airPNR',        'Airline PNR',       'required');
                $this->form_validation->set_rules('cancType',      'Cancellation Type', 'required');
                if($this->form_validation->run() == TRUE){
                  $data1 =  $this->flight_model->cancellation();
                 // print_r($data1);die();
                  if($data1->Status == 1){
                      $data['forcncl'] = $data1;
                  }else if($data1 == ''){
                      $this->session->set_flashdata('msg','Your cancellation request is queued on our server. The request will be processed with in 4 hours of time.');  
                      redirect('flight/cancellation');
                  }else{
                      $myerr = $data1['0'];
                      $this->session->set_flashdata('err',"$myerr");  
                       redirect('flight/cancellation');
                  }
                }
             }
             if($this->input->post('cancle-it')){
                 $cancleit =  $this->flight_model->cancleIt();
                 if($cancleit == 1){
                     $this->session->set_flashdata('msg','Your cancellation request is queued on our server. The request will be processed with in 4 hours of time.');  
                       redirect('flight/cancellation');
                 }else{
                     $this->session->set_flashdata('err',"Error: $cancleit");  
                       redirect('flight/cancellation');
                 }
             }
         $this->load->view('layout/inner_template',$data);
    }
}