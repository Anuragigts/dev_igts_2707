<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Common extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('common_model');
            date_default_timezone_set('Asia/Kolkata');  
        }
//	public function country(){
//                $val    =   $this->common_model->getCountries();
//                return $val;
//        }
	public function state(){
                $val    =   $this->common_model->getStates();
                $opt    =   '<option value="Select State"> Select State </option>';
                foreach($val as $op){
                        $opt    .=  '<option value="'.$op->State_id.'">'.$op->State_name.'</option>';
                }
                echo $opt;
        }
	public function city(){
                $val    =   $this->common_model->getCities();
                $opt    =   '<option value="Select City"> Select city </option>';
                foreach($val as $op){
                        $opt    .=  '<option value="'.$op->City_id.'">'.$op->City_name.'</option>';
                }
                echo $opt;
        }
	public function packages(){
                $pkg    =   $this->common_model->getPackages();
                $opt    =   '<option value="Select Package"> Select Package </option>';
                foreach($pkg as $pg){ 
                        $opt    .=  '<option value="'.$pg->package_id.'">'.ucfirst($pg->package_name).'</option>';
                }
                echo $opt;
        }
	public function superdistributors(){
                $val    =   $this->common_model->getSuperdistributors();
                $opt    =   '<option value="Select Super Distributor"> Select Super Distributor </option>';
                foreach($val as $pg){ 
                        $opt    .=  '<option value="'.$pg->login_id.'">'.ucfirst($pg->first_name." ".$pg->middle_name." ".$pg->last_name).'</option>';
                }
                echo $opt;
        }
	public function distributors(){
                $val    =   $this->common_model->getDistributors();
                $opt    =   '<option value="Select Distributor"> Select Distributor </option>';
                foreach($val as $pg){ 
                        $opt    .=  '<option value="'.$pg->login_id.'">'.ucfirst($pg->first_name." ".$pg->middle_name." ".$pg->last_name).'</option>';
                }
                echo $opt;
        }
        public function common_off_actdeact(){
                $ins    =   $this->common_model->common_off_actdeact();
                echo $ins;
        }
        public function getallSupers(){
                $val    = $this->uri->segment(3);
                if($val !=  ''){
                        $this->session->set_userdata('dis1',$val);
                        $id     =   $this->session->userdata('dis1');
                }
                else{
                        $id     =   $this->session->userdata('dis1');
                }
                $view["get"]   =   $this->common_model->getallSupers($id);
                $this->load->view('super',$view);    
        }
        public function getallDistributors(){
                $val    = $this->uri->segment(3);
                if($val !=  ''){
                        $this->session->set_userdata('dis',$val);
                        $id     =   $this->session->userdata('dis');
                }
                else{
                        $id     =   $this->session->userdata('dis');
                }
                $view["get"]   =   $this->common_model->getallDistributors($id);
                $this->load->view('distributor',$view);    
        }
        public function getAgents(){
                $val    = $this->uri->segment(3);
                if($val !=  ''){
                        $this->session->set_userdata('dis',$val);
                        $id     =   $this->session->userdata('dis');
                }
                else{
                        $id     =   $this->session->userdata('dis');
                }
                $view["get"]   =   $this->common_model->getAgents($id);
                $this->load->view('agents',$view);    
        }
}