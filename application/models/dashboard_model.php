<?php
class Dashboard_model extends CI_Model
{ 
    public function masterCnt(){
        $query = $this->db->query("SELECT COUNT(login_id)cnt FROM login WHERE user_type = 2");
        return $query->row()->cnt;
    }
     public function superCnt(){
        $query = $this->db->query("SELECT COUNT(login_id)cnt FROM login WHERE user_type = 3");
        return $query->row()->cnt;
    }
     public function disCnt(){
        $query = $this->db->query("SELECT COUNT(login_id)cnt FROM login WHERE user_type = 4");
        return $query->row()->cnt;
    }
     public function agCnt(){
        $query = $this->db->query("SELECT COUNT(login_id)cnt FROM login WHERE user_type = 5");
        return $query->row()->cnt;
    }
    
    public function amounts(){
        $query = $this->db->query("SELECT v.amount, CONCAT(p.first_name,' ',p.last_name)as name,u.user_type FROM current_virtual_amount v"
                . " INNER JOIN profile p ON p.login_id = v.user_id"
                . " INNER JOIN login l ON l.login_id = v.user_id"
                . " INNER JOIN user_type u ON u.user_type_id = l.user_type WHERE l.status = 1");
        //echo $this->db->last_query();die();
        return $query->result();
    }
}