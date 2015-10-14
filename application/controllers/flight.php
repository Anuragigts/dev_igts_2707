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
                $data['pos'] = array('adult' => $this->input->post('adult'), 'child' => $this->input->post('child'), 'infant' => $this->input->post('infant'));
                $data['details'] = $this->flight_model->getFlight();
               
            }
        }
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
}