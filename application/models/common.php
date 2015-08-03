<?php
class Common extends CI_Model
{
    public function getState($india){
        $this->db->order_by("State_name", "asc");
        $query = $this->db->get_where('states', array('Country_id' => $india));
        if($query && $query->num_rows()>0){            
            	return $query->result();
        }else{
            return array();
        }
    }
    public function getcity(){
        $this->db->order_by("City_name", "asc");
        $query = $this->db->get_where('cities', array('City_iso' => 'IN'));
        if($query && $query->num_rows()>0){            
            	return $query->result();
        }else{
            return array();
        }
    }
     public function getCityChanged($state){
        $this->db->order_by("City_name", "asc");
        $query = $this->db->get_where('cities', array('State_id' => $state));
        if($query && $query->num_rows()>0){            
            	return $query->result();
        }else{
            return array();
        }
    }
    
    public function bank_name(){
        $query = $this->db->query("SELECT distinct(Bank_Name)as name FROM bank_details ");
        
        if($query && $query->num_rows()>0){            
            	return $query->result();
        }else{
            return array();
        }
    }
    
    public function getBranch($bnk, $state, $city){
        $myst = strtoupper($state);
        $mycity = strtoupper($city);
        $query = $this->db->query("SELECT distinct(Branch)as name FROM bank_details  WHERE Bank_Name = '$bnk' AND State = '$myst' AND City = '$mycity'");
        //return $this->db->last_query();
        if($query && $query->num_rows()>0){            
            	return $query->result();
        }else{
            return array();
        }
    }
    public function getIfsc($bn){
        $query = $this->db->query("SELECT IFSC_Code FROM bank_details  WHERE Branch = '$bn'");
        //return $this->db->last_query();
        if($query && $query->num_rows()>0){            
            	return $query->row();
        }else{
            return array();
        }
    }
}