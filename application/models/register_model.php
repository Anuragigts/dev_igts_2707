<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Register_model extends CI_Model
{ 
        public function register(){
                $email      =   $this->input->post("email");
                $pass       =   $this->input->post("pass");
                $stat1      =   $this->input->post("state");
                $mobile     =   $this->input->post("mobile");
                $city1      =   $this->input->post("city");
                $refer1     =   $this->input->post("refer");
                $zip        =   $this->input->post("zip");
                
                $this->db->select("State_id");
                $this->db->from("states");
                $this->db->where("State_name",$stat1);
                $qu             =   $this->db->get()->row();
                $state          =   $qu->State_id;
                
                $this->db->select("City_id");
                $this->db->from("cities");
                $this->db->where("City_name",$city1);
                $qu1            =   $this->db->get()->row();
                $city           =   $qu1->City_id;
                
                
                
                $this->db->select("user_type_id");
                $this->db->from("user_type");
                $this->db->where("user_type",$refer1);
                $qu2         =   $this->db->get()->row();
                $ref        =   $qu2->user_type_id;  
                $pass       =   $this->input->post("pass");
                
                    $this->email->set_newline("\r\n");
                    // Set to, from, message, etc.
                    $this->email->from('info@igravitas.in', 'Admin');
                    $this->email->to($email);
                    $this->email->subject('CONFIRMATION LINK');
                    $message = 'Dear '.$email.", <br/><br/>";
                    $message .= 'Click on this ';
                    $message .='<a href="'.base_url().'register/confirm/'.md5($email).'">Confirmation Link</a> ';
                    $message .= '<br/><br/><br/>';
                    $message .='<div>Regards ,<br/> Admin </div>'; 
                    $this->email->message($message);
//                    print_r($data);exit;
//                    echo $message;exit;
                    if($this->email->send()){
                            $data   =   array(
                                    "login_email"           =>     $email,
                                    "login_mobile"          =>     $mobile,
                                    "login_password"        =>     md5($pass),
                                    "is_confirm"            =>     md5($email),
                                    "user_type"             =>     2,
                                    "status"                =>     1
                            );
                            $this->db->insert("login",$data);
                            $val_id     =   $this->db->insert_id();
                                if($this->db->affected_rows()   >   0){
                                    $ins             =   array(
                                            "login_id"              =>     $val_id,
                                            "mobile"                =>     $mobile,
                                            "country"               =>     101,
                                            "state"                 =>     $state,
                                            "city"                  =>     $city1,
                                            "zip_code"              =>     $zip,
                                            "preferred_for"         =>     $ref,
                                            "admin_id"              =>     1
                                    );
                                    $ins_access      =   array(
                                            "login_id"              =>      $val_id,
                                            "recharge"              =>      0,
                                            "prepaid_mobile"        =>      0,
                                            "postpaid_mobile"       =>      0,
                                            'data_card'             =>      0,
                                            "dth"                   =>      0,
                                            "utility"               =>      0,
                                            "electricity"           =>      0,
                                            "gas"                   =>      0,
                                            "dmr"                   =>      0,
                                            "add_beneficiary"       =>      0,
                                            "money_transfer"        =>      0
                                    );
                                    $this->db->insert("profile",$ins);
                                    $this->db->insert("module_access",$ins_access);
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
                else{
                    return 2;
                }
        }
        public function confirm($con){
                $da     =   array(
                            "is_confirm"    =>      "confirm"
                );
                $this->db->where("is_confirm",$con);
                $this->db->update("login",$da);
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows()   >   0){
                        return 1;
                }
                else{
                        return 0;
                }
        }
}