<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Common_model extends CI_Model
{ 
        public function getCountries(){
                $this->db->select('*');
                $this->db->from('countries');
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }            
        }
        public function getStates(){
                $id     =       $this->input->post('country');
                $this->db->select('*');
                $this->db->from('states');
                $this->db->where('Country_id',$id);
                $this->db->order_by('State_name');
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }            
        }
        public function getCities(){
                $id     =       $this->input->post('state');
                $this->db->select('*');
                $this->db->from('cities');
                $this->db->where('State_id',$id);
                $this->db->order_by('City_name');
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }            
        }
        public function getMasterdistributors(){
                $this->db->select('l.*,p.*,g.package_name');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','inner');
                $this->db->join('package as g','g.package_id = c.package_id','inner');
                $this->db->where('l.is_confirm','confirm');
                $this->db->where('l.user_type',2);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return 0;
                } 
        }
        public function getPackages(){
                $id             =   $this->input->post("master");
                $valdist        =   $this->input->post("valdist");
                $this->db->select('l.*,p.*,g.package_name,g.package_id');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','inner');
                $this->db->join('package as g','g.package_id = c.package_id','inner');
                $this->db->where('l.user_type',$valdist);
                $this->db->where('c.login_id',$id);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return 0;
                } 
        }
        
        public function getSuperdistributors(){
                $master     = $this->input->post("master");
                $this->db->select('l.*,p.*,g.package_name');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','inner');
                $this->db->join('package as g','g.package_id = c.package_id','inner');
                $this->db->where('l.user_type',3);
                $this->db->where('p.master_distributor_id',$master);
//                $this->db->where('l.user_type',3);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function getDistributors(){
                $master     = $this->input->post("master");
                $this->db->select('l.*,p.*,g.package_name');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','inner');
                $this->db->join('package as g','g.package_id = c.package_id','inner');
                $this->db->where('l.user_type',4);
                $this->db->where('p.super_distributor_id',$master);
//                $this->db->where('l.user_type',3);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function common_off_actdeact(){
                $status     =   $this->input->post('status');
                $login      =   $this->input->post('login');
                $upd        =   array(
                        'status'    =>  $status
                );
                $this->db->where('login_id',$login);
                $this->db->update('login',$upd);
                if($this->db->affected_rows() > 0){
                        return 1;
                }
                else{
                        return 0;
                }
        }
        public function getallStates(){
                $this->db->select('*');
                $this->db->from('states');
                $this->db->order_by('State_name');
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }            
        }
        public function getallCities(){
                $this->db->select('*');
                $this->db->from('cities');
                $this->db->order_by('City_name');
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }            
        }
}