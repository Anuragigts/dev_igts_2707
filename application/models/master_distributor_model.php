<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Master_distributor_model extends CI_Model{ 
        public function insert_master_distributor(){
                $ses_id             =   $this->session->userdata("login_id");
                $first_name         =   $this->session->userdata("first_name");
                $last_name          =   $this->session->userdata("last_name");
                $country            =   $this->session->userdata("country");
                $state              =   $this->session->userdata("state");
                $city               =   $this->session->userdata("city");
                $address            =   $this->session->userdata("address");
                $login_email        =   $this->session->userdata("login_email");
                $mobile_no          =   $this->session->userdata("login_mobile");
                $password           =   $this->session->userdata("login_password");
                $pkg_id             =   $this->session->userdata("ur_pkg_id");
                $idP                =   $this->session->userdata("id_proof");
                $addp               =   $this->session->userdata("add_proof");
                $data   =   array(
                        "login_email"           =>     $login_email,
                        "login_mobile"          =>     $mobile_no,
                        "login_password"        =>     $password,
                        "is_confirm"            =>     "confirm",
                        "user_type"             =>     2,
                        "status"                =>     1
                );
                $this->db->insert("login",$data);
                $val_id     =   $this->db->insert_id();
                    if($this->db->affected_rows()   >   0){
                        $ins             =   array(
                                "login_id"              =>     $val_id,
                                "first_name"            =>     $first_name,
                                "last_name"             =>     $last_name,
                                "mobile"                =>     $mobile_no,
                                "country"               =>     101,
                                "state"                 =>     $state,
                                "city"                  =>     $city,
                                "created_by"            =>     $ses_id,
                                "mobile"                =>     $mobile_no,
                                "address"               =>     $address,
                                "admin_id"              =>     1,
                                "id_proof"              =>     "$idP",
                                "add_proof"              =>     "$addp"
                        );
                        $ins_comm        =   array(
                                "login_id"              =>     $val_id,
                                "package_id"            =>     $pkg_id,
                                "status"                =>     1
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
                        $this->db->insert("commission",$ins_comm);
                        $this->db->insert("module_access",$ins_access);
                        if($this->db->affected_rows()   >   0){
                            $ch = curl_init();
                            $optArray = array(
                            CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$mobile_no&from=ESYTOP&message=Welcome+to+http://esytopup.co.in++User+Name:+$login_email+Pass:+$password",
                            CURLOPT_RETURNTRANSFER => true
                            );
                            curl_setopt_array($ch, $optArray);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                            $result = curl_exec($ch);
                            curl_close($ch);
                            $xml = @simplexml_load_string($result);
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
        public function view_master_distributor(){
                $this->db->select('l.*,p.*,g.package_name,g.package_id,a.amount');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','left');
                $this->db->join('package as g','g.package_id = c.package_id','left');
                $this->db->join('current_virtual_amount as a','a.user_id = l.login_id','left');
                $this->db->where('l.user_type',2);
                $this->db->order_by("l.login_id","desc");
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function edit_master_distributor($val){
                $this->db->select('l.*,p.*,g.package_name,g.package_id');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('commission as c','c.login_id = l.login_id','left');
                $this->db->join('package as g','g.package_id = c.package_id','left');
                $this->db->where('l.user_type',2);
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
        public function getMasterPackages(){
                $this->db->select('*');
                $this->db->from('package');
                $this->db->where('user_type',2);
                $this->db->where('p_created_by',$this->session->userdata("login_id"));
                $this->db->where('status',1);
                $this->db->order_by('package_name');
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }
                else{
                    return array();
                } 
        }
        public function update_master_distributor($valu,$idp,$addp,$va_em,$mol_value){
                $ses_id             =   $this->session->userdata("login_id");
                $first_name         =   $this->input->post("first_name");
                $last_name          =   $this->input->post("last_name");
                $country            =   $this->input->post("country");
                $state              =   $this->input->post("state");
                $city               =   $this->input->post("city");
                $address            =   $this->input->post("address");
                $pkg_id             =   $this->input->post("package");
                        $ins   =   array(
                                "first_name"            =>     $first_name,
                                "last_name"             =>     $last_name,
                                "country"               =>     $country,
                                "state"                 =>     $state,
                                "city"                  =>     $city,
                                "updated_by"            =>     $ses_id,
                                "updated_on"            =>     date("Y-m-d H:i:s"),
                                "address"               =>     $address,
                                "id_proof"              =>      $idp,
                                "add_proof"             =>      $addp,
                                'mobile'                =>      $mol_value
                        );
                        $this->db->where("login_id",$valu);
                        $this->db->update("profile",$ins);
                        $var3   =  $this->db->affected_rows(); 
                        $lo = array(
                            "login_email"   =>  $va_em,
                            'login_mobile'  =>  $mol_value
                        );
                        $this->db->where("login_id",$valu);
                        $this->db->update("login",$lo);
                        
                        $var1   =  $this->db->affected_rows(); 
                        /* 
                        $abc = $this->uri->segment(3);
                          $querya = $this->db->query("SELECT * FROM commission WHERE login_id = $abc");                
		            if($querya && $querya->num_rows()== 1){
			                  $ins_comm   =   array(
		                                "package_id"            =>     $pkg_id,
                                                "status"                =>     1
			                     );
		                        $this->db->where("login_id",$valu);
		                        $this->db->update("commission",$ins_comm);
                            }else{
                                        $ins_comm   =   array(
		                                "package_id"            =>     $pkg_id,
                                                "status"                =>     1,
                                                "login_id"		=> $this->uri->segment(3)
                                        );
		                       
		                        $this->db->insert("commission",$ins_comm);
                            }
                        $var2  =   $this->db->affected_rows(); */
                        if($var1 == 1 || $var3 == 1){
                                return 1;
                        }
                        else{
                                return 0;
                        }
        }
}

