<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('hotel_model');
        $this->load->model('report_model');
        $this->load->model('common');
         date_default_timezone_set('Asia/Kolkata');
        if( $this->session->userdata('login_id') == ''){redirect('login');}
        if( $this->session->userdata('flight') != '1'){redirect('dashboard');}
    }
    /*
     * Search flight
     */
    public function searchHotel(){
        $data = array(
              'title'         => 'SC :: HOTEL SEARCH',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'hotel_search'
             );
         $data['details'] = array();
         $data['pos'] = array('hType'=>'I');
        if($this->input->post('search')){
             $this->form_validation->set_rules('hType','Booking Type','required');
             $this->form_validation->set_rules('loc','Location','required');
             $this->form_validation->set_rules('in','CheckIn Date','required');
             $this->form_validation->set_rules('out','CheckOut Date','required');
            
             $this->form_validation->set_rules('room','Room','required');
             $this->form_validation->set_rules('adult','Adult','required');
             $this->form_validation->set_rules('child','Child','required');
              if($this->form_validation->run() == TRUE){
                  
                $data['pos'] = array('room' => $this->input->post('room'), 'adult' => $this->input->post('adult'), 'child' => $this->input->post('chils'), 'hType' => $this->input->post('hType'));
                $data['details'] = $this->hotel_model->getHotel();
               
            }
           
        }
       $data['cityLoc'] = $this->hotel_model->getCity();
        $this->load->view('layout/inner_template',$data);
    }
}