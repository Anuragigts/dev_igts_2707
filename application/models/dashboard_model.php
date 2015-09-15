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
    public function mamt(){
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id WHERE l.user_type = 2");
        $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
    public function samt(){
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id WHERE l.user_type = 3");
         $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
    public function damt(){
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id WHERE l.user_type = 4");
         $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
     public function aamt(){
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id WHERE l.user_type = 5");
         $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
    
    /*************************/
    public function msamt(){
        $login_id = $this->session->userdata('login_id');
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id "
                . " INNER JOIN profile p ON p.login_id = l.login_id  WHERE l.user_type = 3 AND p.master_distributor_id = $login_id" );
         $val = 0.00;
         //echo $this->db->last_query();die();
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
    public function mdamt(){
        $login_id = $this->session->userdata('login_id');
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id "
                . " INNER JOIN profile p ON p.login_id = l.login_id  WHERE l.user_type = 4 AND p.master_distributor_id = $login_id" );
         $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
     public function maamt(){
         $login_id = $this->session->userdata('login_id');
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id "
                . " INNER JOIN profile p ON p.login_id = l.login_id  WHERE l.user_type = 5 AND p.master_distributor_id = $login_id" );
         $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
    
     public function sdamt(){
        $login_id = $this->session->userdata('login_id');
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id "
                . " INNER JOIN profile p ON p.login_id = l.login_id  WHERE l.user_type = 4 AND p.super_distributor_id = $login_id" );
         $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
     public function saamt(){
         $login_id = $this->session->userdata('login_id');
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id "
                . " INNER JOIN profile p ON p.login_id = l.login_id  WHERE l.user_type = 5 AND p.super_distributor_id = $login_id" );
        //echo $this->db->last_query();die(); 
        $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
    /*************************/
    
     public function notice(){
            $query = $this->db->get_where('notice', array('id' => 1));
            //echo $this->db->last_query();
                if($query && $query->num_rows()>0){
                  return $query->row();
               }else{
                   return array();
               }
        }
    
}