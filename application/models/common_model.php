<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Common_model extends CI_Model
{ 
        public function getCountries(){
                $this->db->select('*');
                $this->db->from('countries');
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }            
        }
        public function getStates(){
                $id     =       $this->input->post('country');
                $this->db->select('*');
                $this->db->from('states');
                $this->db->where('Country_id',$id);
                $this->db->order_by('State_name');
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }            
        }
        public function getCities(){
                $id     =       $this->input->post('state');
                $this->db->select('*');
                $this->db->from('cities');
                $this->db->where('State_id',$id);
                $this->db->order_by('City_name');
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }            
        }
        public function getMasterdistributors(){
                $this->db->select('l.*,p.*,g.package_name');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','left');
                $this->db->join('package as g','g.package_id = c.package_id','left');
                $this->db->where('l.is_confirm','confirm');
                $this->db->where('l.user_type',2);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function getPackages(){
                $id             =   $this->input->post("master");
                $valdist        =   $this->input->post("valdist");
                $super1        =   $this->input->post("super1");
                $query = $this->db->query("SELECT `g`.`package_name`, `g`.`package_id` FROM "
                        . "(`package` as g) WHERE ( `g`.`p_created_by` = '".$this->session->userdata("login_id").""
                        . "' or `g`.`p_created_by` = 1 or `g`.`p_created_by` = '".$this->session->userdata("master_distributor_id")
                        ."' or `g`.`p_created_by` = ".$super1." or `g`.`p_created_by` = '$id')"
                        . " AND `g`.`status` = 1 and g.user_type = ".$valdist);
//                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function getallPackages($id){
                if($this->session->userdata("my_type") == 1){
                        $this->db->select('package_name,package_id');
                        $this->db->from('package');
                        $this->db->where("user_type",$id);
                        $this->db->where('status',1);
                }
                else{
                        $this->db->select('g.package_name,g.package_id');
                        $this->db->from('package as g');
//                        $this->db->join('commission as c','c.login_id = g.p_created_by',"inner");
                        $this->db->where("( g.p_created_by = ".$this->session->userdata("admin_id").
                                " or g.p_created_by = ".$this->session->userdata("login_id").
                                " or g.p_created_by = ".$this->session->userdata("master_distributor_id").
                                " or g.p_created_by = ".$this->session->userdata("super_distributor_id").
                                " or g.p_created_by = ".$this->session->userdata("distributor_id").")");
                        $this->db->where("user_type",$id);
                        $this->db->where('g.status',1);
                }
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        
        public function getSuperdistributors(){
                $master     = $this->input->post("master");
                $this->db->select('l.*,p.*,g.package_name');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','left');
                $this->db->join('package as g','g.package_id = c.package_id','left');
                $this->db->where('l.user_type',3);
                $this->db->where('p.master_distributor_id',$master);
//                $this->db->where('l.user_type',3);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function getDistributors(){
                $master     = $this->input->post("master");
                $this->db->select('l.*,p.*,g.package_name');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','left');
                $this->db->join('package as g','g.package_id = c.package_id','left');
                $this->db->where('l.user_type',4);
                $this->db->where('p.super_distributor_id',$master);
//                $this->db->where('l.user_type',3);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function common_off_actdeact(){
                $status     =   $this->input->post('status');
                $login      =   $this->input->post('login');
                $upd        =   array(
                        'status'    =>  $status
                );
                $this->db->where('login_id',$login);
                $this->db->update('login',$upd);
                if($this->db->affected_rows() > 0){
                        return 1;
                }
                else{
                        return 0;
                }
        }
        public function getallStates(){
                $this->db->select('*');
                $this->db->from('states');
                $this->db->order_by('State_name');
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }            
        }
        public function getallCities(){
                $this->db->select('*');
                $this->db->from('cities');
                $this->db->order_by('City_name');
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }            
        }
        public function getallSupers($id){
                $this->db->select('l.*,p.*,g.package_name,g.package_id');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','left');
                $this->db->join('package as g','g.package_id = c.package_id','left');
                $this->db->where('l.user_type',3);
                $this->db->where('p.master_distributor_id',$id);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function getallDistributors($id){
                $this->db->select('l.*,p.*,g.package_name,g.package_id');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','left');
                $this->db->join('package as g','g.package_id = c.package_id','left');
                $this->db->where('l.user_type',4);
                $this->db->where('p.super_distributor_id',$id);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function getAgents($id){
                $this->db->select('l.*,p.*,g.package_name,g.package_id');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','left');
                $this->db->join('package as g','g.package_id = c.package_id','left');
                $this->db->where('l.user_type',5);
                $this->db->where('p.distributor_id',$id);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function getallSuperdistributors(){
                $this->db->select('l.*,p.*,g.package_name');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','left');
                $this->db->join('package as g','g.package_id = c.package_id','left');
                $this->db->where('l.user_type',3);
                if($this->session->userdata("my_type") == 2){
                        $this->db->where("p.master_distributor_id",  $this->session->userdata("login_id"));
                }
                else if($this->session->userdata("my_type") == 3){
                    $this->db->where("p.master_distributor_id",  $this->session->userdata("master_distributor_id"));    
                    $this->db->or_where("p.super_distributor_id",  $this->session->userdata("login_id"));
                }
                else if($this->session->userdata("my_type") == 4){
                        $this->db->where("p.master_distributor_id",  $this->session->userdata("master_distributor_id"));    
                        $this->db->or_where("p.super_distributor_id",  $this->session->userdata("super_distributor_id"));
                }
//                $this->db->where('l.user_type',3);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function allDistributors(){
                $this->db->select('l.*,p.*,g.package_name');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','left');
                $this->db->join('package as g','g.package_id = c.package_id','left');
                $this->db->where('l.user_type',4);
//                $this->db->where('l.user_type',3);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function details($id,$type){
                $this->db->select('l.*,p.*,g.package_name,g.package_id,o.Country_name,s.State_name,y.City_name');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','left');
                $this->db->join('package as g','g.package_id = c.package_id','left');
                $this->db->join('countries as o','o.Country_id = p.country','left');
                $this->db->join('states as s','s.State_id = p.state','left');
                $this->db->join('cities as y','y.City_id = p.city','left');
                $this->db->where('l.user_type',$type);
                $this->db->where('l.login_id',$id);
                $query = $this->db->get();
           //   echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->row();
                }
                else{
                    return array();
                } 
        }
        public function access_details($valu){
                $this->db->select('*');
                $this->db->from('module_access');
                $this->db->where('login_id',$valu);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->row();
                }
                else{
                    return array();
                } 
        }
        public function update_access($valu){
                $dmr                    =   $this->input->post("dmr");
                $recharge               =   $this->input->post("recharge");
                $utility                =   $this->input->post("utility");
                $prepaid_mobile         =   $this->input->post("prepaid_mobile");
                $postpaid_mobile        =   $this->input->post("postpaid_mobile");
                $data_card              =   $this->input->post("data_card");
                $dth                    =   $this->input->post("dth");
                $electricity            =   $this->input->post("electricity");
                $gas                    =   $this->input->post("gas");
                $add_beneficiary        =   $this->input->post("add_beneficiary");
                $money_transfer         =   $this->input->post("money_transfer");
                $data           =   array(
                        "recharge"              =>      $recharge,
                        "prepaid_mobile"        =>      $prepaid_mobile,
                        "postpaid_mobile"       =>      $postpaid_mobile,
                        'data_card'             =>      $data_card,
                        "dth"                   =>      $dth,
                        "utility"               =>      $utility,
                        "electricity"           =>      $electricity,
                        "gas"                   =>      $gas,
                        "dmr"                   =>      $dmr,
                        "add_beneficiary"       =>      $add_beneficiary,
                        "money_transfer"        =>      $money_transfer,
                        "flight"                =>      $this->input->post("flight"),     
                        "search_flight"         =>      $this->input->post("search"),     
                        "book_flight"           =>      $this->input->post("book"),
                        "hotel"                 =>      $this->input->post("hotel"),
                        "search_hotel"          =>      $this->input->post("search_hotel"),
                        "book_hotel"            =>      $this->input->post("book_hotel"),
                        "bus"                   =>      $this->input->post("bus"),
                        "search_bus"            =>      $this->input->post("search_bus"),
                        "book_bus"              =>      $this->input->post("book_bus"),
                );
//                print_r($data);exit;
                $this->db->where('login_id',$valu);
                $this->db->update('module_access',$data);
//                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return 1;
                }
                else{
                    return array();
                } 
        }
        public function get_commission($uri){
                $this->db->select('c.*,o.*,d.login_id,m.module_id,m.module_name,s.sub_module_name');
                $this->db->from('commission_details as c');
                $this->db->join('commission as d',"d.package_id = c.package_id",'inner');
                $this->db->from('modules_object as o','o.modules_obj_id = c.modules_object_id','inner');
                $this->db->join('module as m','m.module_id = o.module_id','inner');
                $this->db->join('sub_module as s','s.sub_module_id = o.sub_module_id','inner');
                $this->db->where('c.modules_object_id = o.modules_obj_id');
               // $this->db->where('m.module_name','recharge');
                $this->db->where('d.login_id',$uri);
                $query = $this->db->get();
//               /echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }
        }
        public function getmodules($uri){
                $this->db->select('c_detail_id');
                $this->db->from('commission_details as c');
                $this->db->join('commission as d',"d.package_id = c.package_id",'inner');
                $this->db->join('modules_object as o','o.modules_obj_id = c.modules_object_id','inner');
                $this->db->join('module as m','m.module_id = o.module_id','inner');
                $this->db->join('sub_module as s','s.sub_module_id = o.sub_module_id','inner');
                $this->db->where('c.modules_object_id = o.modules_obj_id');
               // $this->db->where('m.module_name','recharge');
                $this->db->where('d.login_id',$uri);
                $query = $this->db->get();
                //echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                        return $query->result();
                }
                else{
                        return array();
                } 
        }
        public function update_commission($uri){
                $val1   = $this->getmodules($uri); 
                foreach($val1 as $v1){
                        $vamt = $this->input->post("commission-".$v1->c_detail_id);
                        $comm   =   array(
                                'commission_amt'        =>  $vamt
                        );
                        $this->db->update('commission_details',$comm,array("c_detail_id" => $v1->c_detail_id));
                }
                //exit
        }
        public function get_plug($uri){
                $this->db->select('w.*,c.*,o.*,d.login_id,m.module_id,m.module_name,s.sub_module_name');
                $this->db->from('commission_details as c');
                $this->db->join('commission as d',"d.package_id = c.package_id",'inner');
                $this->db->join('switch_det as w',"w.module_obj_id = c.modules_object_id and w.user_id = d.login_id",'left');
                $this->db->join('modules_object as o','o.modules_obj_id = c.modules_object_id','inner');
                $this->db->join('module as m','m.module_id = o.module_id','inner');
                $this->db->join('sub_module as s','s.sub_module_id = o.sub_module_id','inner');
                $this->db->where('c.modules_object_id = o.modules_obj_id');
               // $this->db->where('m.module_name','recharge');
                $this->db->where('d.login_id',$uri);
                $query = $this->db->get();
                //echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                }
        }
        public function get_api(){
                $va = $this->db->get("api")->result();
                return $va;
        }
        public function update_plug($uwri){
                $usdp     = $this->get_plug($uwri);
                foreach ($usdp as $v1){
                        if($v1->switch_det_id != ""){
                                $vamt = $this->input->post($v1->modules_obj_id."_".$v1->switch_det_id."_api_name");
                                $vstatus = $this->input->post($v1->modules_obj_id."_".$v1->switch_det_id."_api_status");
                                //  echo $vstatus;
                                $comm   =   array(
                                        'api_id'            =>  $vamt,
                                        "status"            =>  $vstatus
                                );
                                $this->db->update('switch_det',$comm,array("switch_det_id" => $v1->switch_det_id));
                        }
                        else{
                                $vamt = $this->input->post($v1->modules_obj_id."__api_name");
                                $vstatus = $this->input->post($v1->modules_obj_id."__api_status");
                                // echo $vstatus;
                                $data = array(
                                        "user_id"           =>  $uwri,
                                        "module_id"         =>  $v1->module_id,
                                        "module_obj_id"     =>  $v1->modules_obj_id,
                                        "api_id"            =>  $vamt,
                                        "status"            =>  $vstatus
                                );
                                $this->db->insert("switch_det",$data);
                        }
                }
        }
}