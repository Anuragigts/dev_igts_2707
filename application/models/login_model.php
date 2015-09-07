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
                $this->db->select('l.*,p.*,m.*,t.*,l.user_type as my_type');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('module_access as m','l.login_id = m.login_id','inner');
                $this->db->join('user_type as t','t.user_type_id = l.user_type','inner');
                $this->db->where('( l.login_email = "'.$email .'" or l.login_mobile = "'.$email.'")');
                $this->db->where('l.login_password',md5($pass));
                $this->db->where('l.is_confirm','confirm');
                $this->db->where('l.status',1);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    $this->db->where("login_email",$email);
                    $this->db->update("login",array('last_login' => date("Y-m-d H:i:s")));
                    return $query->row();
                }
                else{
                    return 0;
                }            
        }
}