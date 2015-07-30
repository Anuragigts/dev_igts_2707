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
}