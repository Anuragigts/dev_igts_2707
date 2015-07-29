<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Package_model extends CI_Model
{   
        public function usertype(){
                $val = $this->session->userdata('user_type');
                $this->db->select('*');
                $this->db->from('user_type');
                $this->db->where('user_type_id > '.$val);
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }  
        }
        public function get_package_object(){
                $val                =     $this->session->userdata('user_type');
                $usertype           =     $this->input->post('usertype');
                $package_name       =     strtolower($this->input->post('package_name'));
                $package_remarks    =     $this->input->post('package_remarks');
                $this->db->select('*');
                $this->db->from('package');
                $this->db->where('user_type',$usertype);
                $this->db->where('package_name',$package_name);
                $this->db->where('p_created_by',$val);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() == 0){
                    return 1;
                }
                else{
                    return 0;
                }             
        }
        public function view_package(){
                $val                =     $this->session->userdata('user_type');
                $this->db->select('u.user_type as user_name_type,l.first_name,p.*');
                $this->db->from('package as p');
                $this->db->join('user_type as u','u.user_type_id = p.user_type');
                $this->db->join('profile as l','l.login_id = p.p_created_by');
//                $this->db->where('p_created_by',$val);
//                $this->db->where('p_created_by',$val);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }             
        }
        public function get_recharge(){
                $this->db->select('o.*,m.module_name,s.sub_module_name');
                $this->db->from('modules_object as o');
                $this->db->join('module as m','m.module_id = o.module_id','inner');
                $this->db->join('sub_module as s','s.sub_module_id = o.sub_module_id','inner');
                $this->db->where('m.module_name','recharge');
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }             
        }
        public function get_utility(){
                $this->db->select('o.*,m.module_name,s.sub_module_name');
                $this->db->from('modules_object as o');
                $this->db->join('module as m','m.module_id = o.module_id','inner');
                $this->db->join('sub_module as s','s.sub_module_id = o.sub_module_id','inner');
                $this->db->where('m.module_name','utility payment');
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }             
        }
        public function get_dmr(){
                $this->db->select('o.*,m.module_name,s.sub_module_name');
                $this->db->from('modules_object as o');
                $this->db->join('module as m','m.module_id = o.module_id','inner');
                $this->db->join('sub_module as s','s.sub_module_id = o.sub_module_id','inner');
                $this->db->where('m.module_name','dmr');
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }             
        }
        public function insert_package_object(){
                $val              =     $this->session->userdata('login_id');
                $usertype         =     $this->session->userdata('user_type_pac');
                $package_name     =     $this->session->userdata('package_name');
                $package_remarks  =     $this->session->userdata('package_remarks');
                $val1   = $this->getmodules();    
                $data   =   array(
                            'user_type'         => $usertype,
                            'package_name'      => $package_name,
                            'package_remarks'   => $package_remarks,
                            'p_created_by'      => $val
                    );
                $this->db->insert('package',$data);
                if($this->db->affected_rows() > 0){
                        foreach($val1 as $id){
                            if($this->input->post('commission-'.$id->modules_obj_id)){
                                    $comm_amt   =   $this->input->post('commission-'.$id->modules_obj_id);
                            }
                            else{
                                    $comm_amt   =   0;
                            }
                            $comm   =   array(
                                    'package_id'            =>  $this->db->insert_id(),
                                    'modules_object_id'     =>  $id->modules_obj_id,
                                    'commission_amt'        =>  $comm_amt,
                                    'c_created_by'          =>  $val
                            );
                            $this->db->insert('commission_details',$comm);
                        }
                        if($this->db->affected_rows() > 0){
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
        public function getmodules(){
                $this->db->select('modules_obj_id');
                $this->db->from('modules_object');
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
