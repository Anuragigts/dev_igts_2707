<?php
class Report_model extends CI_Model{
        public function recharge_reports($gefr,$geto,$val){
                $this->db->select("r.*,q.*,q.status as st_re,m.module_name");
                $this->db->from("recharge_track as r");
                $this->db->join("module as m","r.recharge_type = m.module_id","inner");
                $this->db->join("refund_req as q","r.recharge_id = q.recharge_id","left");
                $this->db->where("done_by",$val);
                $this->db->where("trans_no !=","");
                $this->db->where("cur_time >=",$gefr);
                $this->db->where("cur_time <=",$geto);
                $this->db->order_by('r.recharge_id', 'desc');
                $qu     =   $this->db->get();
               // echo $this->db->last_query();exit;
                return $qu->result();
        }
        public function user_type($my_type){
                $this->db->select("*");
                $this->db->from("user_type");
                $this->db->where("user_type_id > ",$my_type);
                $au     =     $this->db->get();
                return $au->result();
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
        public function  trasaction_reports($gefr,$geto,$val){
                $this->db->select("t.*,p.first_name as frname,p.last_name as  lrname,po.first_name as tofname,po.last_name as tolname");
                $this->db->from("trans_detail as t");
                $this->db->join('profile as p','t.trans_from = p.login_id','inner');
                $this->db->join('profile as po','t.trans_to = po.login_id','left');
                $this->db->where("( t.trans_from = ".$val." or t.trans_to = ".$val." )");
                $this->db->where("( t.trans_date >= '".$gefr."' and t.trans_date <= '".$geto."' )");
                 $this->db->order_by('trans_id', 'desc');
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
        public function  getUsers($valo,$my_type){
               $this->db->select('l.*,p.*');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->where('l.user_type',$my_type);
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
                $query = $this->db->get();
//                /echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function refund_req(){
                $status     =   $this->input->post('status');
                $reid      =   $this->input->post('reid');
                $amount1     =   $this->input->post('amount');
                $upd        =   array(
                        'recharge_id'   =>  $reid,
                        'trans_amount'   =>  $amount1,
                        'user_id'   => $this->session->userdata("login_id"),
                        'status'    =>  $status
                );                   
                $this->db->insert('refund_req',$upd);
                if($this->db->affected_rows() > 0){
                        return 1;
                }
                else{
                        return 0;
                }
        }
}?>