<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Module_object_model extends CI_Model
{ 
        public function getModulelist(){
                $this->db->select('*');
                $this->db->from('module');
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }            
        }
        public function sub_module_name(){
                $id = $this->input->post('module_name');
                $this->db->select('*');
                $this->db->from('sub_module');
                $this->db->where('module_id',$id);
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }             
        }
        public function get_module_object(){
                $module_name         =  $this->input->post('module_name');
                $sub_module_name     =  $this->input->post('sub_module_name');
                $module_object_name  =  strtolower($this->input->post('module_object_name'));
                $this->db->select('*');
                $this->db->from('modules_object');
                $this->db->where('module_id',$module_name);
                $this->db->where('sub_module_id',$sub_module_name);
                $this->db->where('modules_obj_name',$module_object_name);
                $query = $this->db->get();
                if($this->db->affected_rows() == 0){
                    return 1;
                }
                else{
                    return 0;
                }             
        }
        public function insert_module_object(){
                $module_name         =  $this->input->post('module_name');
                $sub_module_name     =  $this->input->post('sub_module_name');
                $module_object_name  =  $this->input->post('module_object_name');
                $data  =  array (
                        'module_id'         =>  $module_name,
                        'sub_module_id'     =>  $sub_module_name,
                        'modules_obj_name'  => strtolower($module_object_name) 
                );
                $this->db->insert('modules_object',$data);
                if($this->db->affected_rows() > 0){
                    return 1;
                }
                else{
                    return 0;
                }             
        }
        public function view_module_object(){
                $this->db->select('o.*,m.module_name,s.sub_module_name');
                $this->db->from('modules_object as o');
                $this->db->join('module as m','m.module_id = o.module_id','inner');
                $this->db->join('sub_module as s','s.sub_module_id = o.sub_module_id','inner');
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }             
        }
        public function delete_module_project($del_id){
                $this->db->delete('modules_object', array('modules_obj_id' => $del_id)); 
                $this->db->delete('commission_details', array('modules_object_id' => $del_id)); 
                if($this->db->affected_rows() > 0){
                    return 1;
                }
                else{
                    return 1;
                }             
        }
}