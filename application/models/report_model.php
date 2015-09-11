<?php
class Report_model extends CI_Model{
        public function recharge_reports($gefr,$val){
                $this->db->select("r.*,m.module_name");
                $this->db->from("recharge_track as r");
                $this->db->join("module as m","r.recharge_type = m.module_id","inner");
                $this->db->where("done_by",$val);
                $this->db->like("responce_time",$gefr."","after");
                $qu     =   $this->db->get();
                return $qu->result();
        }
        public function  getNames($valo,$my_type){
               $this->db->select('l.*,p.*');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->where('l.user_type >',$my_type);
                if($this->session->userdata("my_type") == "2"){ 
                        $this->db->where('p.master_distributor_id',$valo);
                }
                if($this->session->userdata("my_type") == "3"){ 
                        $this->db->where('p.super_distributor_id',$valo);
                }
                if($this->session->userdata("my_type") == "4"){ 
                        $this->db->where('p.distributor_id',$valo);
                }
                $query = $this->db->get();
//                /echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function  commission_reports($gefr,$geto,$val){
                 $this->db->select("*");
                $this->db->from("trans_detail");
                $this->db->where("trans_to",$val);
                $this->db->where("( trans_date >= '".$gefr."' and trans_date <= '".$geto."' )");
                $qu     =   $this->db->get();
               // echo $this->db->last_query();exit;
                return $qu->result();
        }
        public function  offline_reports($gefr,$geto,$val){
                $this->db->select("o.*,p.*");
                $this->db->from("offtime as o");
                $this->db->where("done_by",$val);
                $this->db->join('profile as p','o.done_by = p.login_id','inner');
                $this->db->where("( done >= '".$gefr."' and done <= '".$geto."' )");
                $qu     =   $this->db->get();
               // echo $this->db->last_query();exit;
                return $qu->result();
        }
        
}?>