<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Settings_model extends CI_Model
{ 
        public function change_password(){
                $mobile      =   $this->session->userdata("mobile");
                $pass        =   $this->input->post("pass");
//                echo $mobile;exit;
                $data   =   array(
                        "login_password"        =>     md5($pass)
                );
                $this->db->where("login_mobile",$mobile);
                $this->db->update("login",$data);
                if($this->db->affected_rows()   >   0){
                        return 1;
                }
                else{
                        return 0;
                }
        }
        public function profile($val){
                $this->db->select('l.*,p.*,u.user_type as type_user');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('user_type as u','l.user_type = u.user_type_id','inner');
                $this->db->where('l.login_id',$val);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->row();
                }
                else{
                    return array();
                }   
        }
        public function update_profile($valu){
                $ses_id             =   $valu;
                $first_name         =   $this->input->post("first_name");
                $last_name          =   $this->input->post("last_name");
                $state              =   $this->input->post("state");
                $city               =   $this->input->post("city");
                $address            =   $this->input->post("address");
                        $ins   =   array(
                                "first_name"            =>     $first_name,
                                "last_name"             =>     $last_name,
                                "state"                 =>     $state,
                                "city"                  =>     $city,
                                "updated_by"            =>     $ses_id,
                                "updated_on"            =>     date("Y-m-d H:i:s"),
                                "address"               =>     $address
                        );
                        $this->db->where("login_id",$valu);
                        $this->db->update("profile",$ins);
                        $var2  =   $this->db->affected_rows();
                        if($var2 > 0){
                                return 1;
                        }
                        else{
                                return 0;
                        }
        }
}