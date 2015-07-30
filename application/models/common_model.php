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
}