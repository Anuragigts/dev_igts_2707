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
}