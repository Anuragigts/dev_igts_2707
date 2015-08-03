<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Login_model extends CI_Model
{ 
        public function getLogindetails(){
                $email  =   $this->input->post("login_email");
                $pass   =   $this->input->post("login_password");
                $this->db->select('l.*,p.*,m.*');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('module_access as m','l.login_id = m.login_id','inner');
                $this->db->where('l.login_email',$email);
                $this->db->where('l.login_password',md5($pass));
                $this->db->where('l.is_confirm','confirm');
                $this->db->where('l.status',1);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->row();
                }
                else{
                    return 0;
                }            
        }
}