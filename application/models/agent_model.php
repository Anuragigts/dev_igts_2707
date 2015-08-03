<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Agent_model extends CI_Model{ 
        public function insert_agent(){
                $ses_id             =   $this->session->userdata("login_id");
                $first_name         =   $this->input->post("first_name");
                $last_name          =   $this->input->post("last_name");
                $country            =   $this->input->post("country");
                $state              =   $this->input->post("state");
                $city               =   $this->input->post("city");
                $address            =   $this->input->post("address");
                $login_email        =   $this->input->post("login_email");
                $mobile_no          =   $this->input->post("mobile_no");
                $password           =   $this->input->post("password");
                $master_id          =   $this->input->post("master");
                $super_id           =   $this->input->post("super");
                $dis_id             =   $this->input->post("distributor");
                $pkg_id             =   $this->input->post("package");
                $data   =   array(
                        "login_email"           =>     $login_email,
                        "login_mobile"          =>     $mobile_no,
                        "login_password"        =>     md5($password),
                        "is_confirm"            =>     "confirm",
                        "user_type"             =>     5,
                        "status"                =>     1
                );
                $this->db->insert("login",$data);
                $val_id     =   $this->db->insert_id();
                    if($this->db->affected_rows()   >   0){
                        $ins   =   array(
                                "login_id"              =>     $val_id,
                                "first_name"            =>     $first_name,
                                "last_name"             =>     $last_name,
                                "mobile"                =>     $mobile_no,
                                "country"               =>     $country,
                                "state"                 =>     $state,
                                "city"                  =>     $city,
                                "created_by"            =>     $ses_id,
                                "mobile"                =>     $mobile_no,
                                "address"               =>     $address,
                                "admin_id"              =>     $ses_id,
                                "master_distributor_id" =>     $master_id,
                                "super_distributor_id"  =>     $super_id,
                                "distributor_id"        =>     $dis_id
                        );
                        $ins_comm   =   array(
                                "login_id"              =>     $val_id,
                                "package_id"            =>     $pkg_id,
                                "status"                =>     1
                        );
                        $this->db->insert("profile",$ins);
                        $this->db->insert("commission",$ins_comm);
                        if($this->db->affected_rows()   >   0){
                                return 1;
                        }
                        else{
                                return 0;
                        }
                    }
                    else{
                            return 0;
                    }
        }
        public function view_agent(){
                $this->db->select('l.*,p.*,g.package_name');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
//                $this->db->join('profile as pl','l.login_id = pl.login_id and pl.master_distributor_id = pl.login_id');
                $this->db->join('commission as c','c.login_id = l.login_id','inner');
                $this->db->join('package as g','g.package_id = c.package_id','inner');
                $this->db->where('l.user_type',5);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
}
