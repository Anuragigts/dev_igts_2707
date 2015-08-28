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
    
}