<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Super_distributor_model extends CI_Model{ 
        public function insert_super_distributor(){
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
                $pkg_id             =   $this->input->post("package");
                $data   =   array(
                        "login_email"           =>     $login_email,
                        "login_mobile"          =>     $mobile_no,
                        "login_password"        =>     md5($password),
                        "is_confirm"            =>     "confirm",
                        "user_type"             =>     3,
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
                                "master_distributor_id" =>     $master_id
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
        public function view_super_distributor(){
                $this->db->select('l.*,p.*,g.package_name');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
//                $this->db->join('profile as pl','l.login_id = pl.login_id and pl.master_distributor_id = pl.login_id');
                $this->db->join('commission as c','c.login_id = l.login_id','inner');
                $this->db->join('package as g','g.package_id = c.package_id','inner');
                $this->db->where('l.user_type',3);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function edit_super_distributor($val){
                $this->db->select('l.*,p.*,g.package_name,g.package_id');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','inner');
                $this->db->join('package as g','g.package_id = c.package_id','inner');
                $this->db->where('l.user_type',3);
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
        public function update_super_distributor($valu){
                $ses_id             =   $this->session->userdata("login_id");
                $first_name         =   $this->input->post("first_name");
                $last_name          =   $this->input->post("last_name");
                $country            =   $this->input->post("country");
                $state              =   $this->input->post("state");
                $city               =   $this->input->post("city");
                $address            =   $this->input->post("address");
                $master             =   $this->input->post("master");
                $pkg_id             =   $this->input->post("package");
                        $ins   =   array(
                                "first_name"            =>     $first_name,
                                "last_name"             =>     $last_name,
                                "country"               =>     $country,
                                "state"                 =>     $state,
                                "city"                  =>     $city,
                                "master_distributor_id" =>     $master,
                                "updated_by"            =>     $ses_id,
                                "updated_on"            =>     date("Y-m-d H:i:s"),
                                "address"               =>     $address
                        );
//                        print_r($ins);exit;
                        $this->db->where("login_id",$valu);
                        $this->db->update("profile",$ins);
                        $var1   =  $this->db->affected_rows(); 
                        $ins_comm   =   array(
                                "package_id"            =>     $pkg_id,
                                "status"                =>     1
                        );
                        $this->db->where("login_id",$valu);
                        $this->db->update("commission",$ins_comm);
                        $var2  =   $this->db->affected_rows();
                        if($var1 == 1 && ( $var2 == 0 || $var2 == 1)){
                                return 1;
                        }
                        else{
                                return 0;
                        }
        }
}
