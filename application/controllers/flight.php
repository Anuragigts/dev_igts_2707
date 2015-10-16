<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Flight extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('flight_model');
        $this->load->model('common');
        if( $this->session->userdata('login_id') == ''){redirect('login');}
        if( $this->session->userdata('flight') != '1'){redirect('dashboard');}
    }
    public function searchFlight(){
        $data = array(
              'title'         => 'SC :: FLIGHT SEARCH',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'flight_search'
             );
         $data['details'] = array();
        if($this->input->post('search')){
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
            
         $data['logos'] = $this->flight_model->getLogo();
        $this->load->view('layout/inner_template',$data);
    }
     public function flightHistory(){
        $data = array(
              'title'         => 'SC :: FLIGHT SEARCH',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'flight_history'
             );
        
        $this->load->view('layout/inner_template',$data);
    }
    
    public function fare(){
        $airlineId = $_POST['AirlineId'];
        $flightId = $_POST['FlightId'];
        $classCode = $_POST['ClassCode'];
        $track = $_POST['track'];
        $basicAmount = $_POST['BasicAmount'];
        $infant = $_POST['infant'];
        $child = $_POST['child'];
        $adult = $_POST['adult'];
        
        $return = $this->flight_model->getFareTax($airlineId, $flightId, $classCode, $track, $basicAmount, $infant, $child, $adult);
        echo $return;
    }
    
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
        }
        if($airlineId != '' &&  $airlineId != 0){
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
        //echo $airlineId.','. $flightId.',' .$classCode.','. $track.','. $basicAmount.','. $infant.','. $child.','. $adult;
        $data['get_details'] = $this->flight_model->getFareTax($airlineId, $flightId, $classCode, $track, $basicAmount, $infant, $child, $adult);
        $data['getTotal'] = $this->flight_model->getFareTotal($airlineId, $flightId, $classCode, $track, $basicAmount, $infant, $child, $adult);
        
        if($this->input->post('book_ticket')){
            $this->form_validation->set_rules('first_name', 'First Name',   'required');
            $this->form_validation->set_rules('last_name',  'Last Name',    'required');
            $this->form_validation->set_rules('mobile_no',  'Mobile Number','required');
            $this->form_validation->set_rules('login_email','Email',        'required');
            $this->form_validation->set_rules('zip',        'ZIP',          'required');
            $this->form_validation->set_rules('pp',        'Passport No',          'required');
            $this->form_validation->set_rules('expiry',     'Passport Expiry Date',          'required');
            $this->form_validation->set_rules('dob',        'Date Of Birth','required');
            $this->form_validation->set_rules('add',        'address','required');
              if($this->form_validation->run() == TRUE){
                  
                $booking_details = $this->flight_model->bookTicket();
               
            }
        }
        
        
        $this->load->view('layout/inner_template',$data);
    }
}