<?php
    class Fund_model extends CI_Model{
            public function send_req(){
                    $str    =   explode("/",$this->input->post("date"));
                    $date   =   $str["2"].'-'.$str["0"]."-".$str["1"];
                    $data = array(
                            "user_id"    => $this->session->userdata("login_id"),
                            "amount"     => $this->input->post("amount"),
                            "date_time"  => $date,
                            "bank_name"  => $this->input->post("bank_name"),
                            "ptype"  => $this->input->post("ptype"),
                            "cheque"  => $this->input->post("cheque"),
                            "status"  => 3,
                            "date_time"        => date('Y-m-d H:i:s')
                    );
                    //print_r($data);exit;
                    $this->db->insert("fund_request",$data);
                    if($this->db->affected_rows() > 0){
                            return 1;
                    }else{
                            return 0;
                    }
            }   
            public function view_send_requests(){
                        $this->db->select("f.*,p.*");
                        $this->db->from("fund_request as f");
                        $this->db->join("profile as p","f.user_id = p.login_id","inner");
                        if($this->session->userdata("my_type") > 1){
                                $this->db->where("p.login_id",$this->session->userdata("login_id"));
                        }
                        $this->db->order_by("f.fund_id","desc");
                        $qu =   $this->db->get();
						//echo $this->db->last_query();
                        if($this->db->affected_rows() > 0){
                                return $qu->result();
                        }else{
                                return array();
                        }
            }
            public function fund_actdeact(){
                    $status     =   $this->input->post('status');
                    $fund       =   $this->input->post('fund');
                    $login      =   $this->input->post('login');
                    $amount1     =   $this->input->post('amount');
                    $upd        =   array(
                            'status'    =>  $status
                    );
                    
                    $qu = $this->db->get_where("current_virtual_amount",array("user_id"=> 1));
                    $pg = $qu->row_array();
                    $admin  = $pg['amount'];
                    
                    $qu1 = $this->db->get_where("current_virtual_amount",array("user_id"=> $login));
                   
                    $vai = $qu1->row_array();
                    $loginat1  =   $vai['amount'];
                    
                    if($status == 1){
                            $adm    =   $admin-$amount1;
                            $ldm    =   $loginat1+$amount1;
                            $this->db->where("user_id","1");
                            $this->db->update("current_virtual_amount",array("amount" => $adm));

                            $this->db->where("user_id",$login);
                            $this->db->update("current_virtual_amount",array("amount" =>   $ldm));

                             $inset   =   array(
                                    "trans_from"        =>  1,
                                    "trans_to"          =>  $login,
                                    "trans_amt"         =>  $amount1,
                                    "cur_amount"        =>  $loginat1,
                                    "trans_remark"      =>  "fund requested",
                                    "trans_status"      =>  3
                            );
                            $this->db->insert("trans_detail",$inset);
                    }                     
                    $this->db->where('fund_id',$fund);
                    $this->db->update('fund_request',$upd);
                    if($this->db->affected_rows() > 0){
                            return 1;
                    }
                    else{
                            return 0;
                    }
            }
            public function refund_request(){
                    $this->db->select("f.*,p.*,r.*,f.status as status1");
                    $this->db->from("refund_req as f");
                    $this->db->join("profile as p","f.user_id = p.login_id","inner");
                    $this->db->join("recharge_track as r","f.recharge_id = r.recharge_id","inner");
                    if($this->session->userdata("my_type") > 1){
                            $this->db->where("p.login_id",$this->session->userdata("login_id"));
                    }
                    $this->db->order_by("f.refund_req_id","desc");
                    $qu =   $this->db->get();
		//	echo $this->db->last_query();		
                    if($this->db->affected_rows() > 0){
                            return $qu->result();
                    }else{
                            return array();
                    }
            }
            public function reffund_actdeact(){
                    $status     =   $this->input->post('status');
                    $fund       =   $this->input->post('fund');
                    $login      =   $this->input->post('login');
                    $amount1     =   $this->input->post('amount');
                    
                    $recharge_id     =   $this->input->post('recharge');
                    $op_name     =   $this->input->post('op_name');
                    
                    $md     =   $this->input->post('md');
                    $sd     =   $this->input->post('sd');
                    $d     =   $this->input->post('d');
                    $my = $this->input->post('login');
                    $amt = $this->input->post('amount');
                    $optna  =   strtolower($this->input->post('op_name'));
                    $this->trans_commission($md,$sd,$d,$my,$optna,$amt);
                    
                    $upd        =   array(
                            'status'    =>  $status
                    );
                    
                    $qu = $this->db->get_where("current_virtual_amount",array("user_id"=> 1));
                    $pg = $qu->row_array();
                    $admin  = $pg['amount'];
                    
                    $qu1 = $this->db->get_where("current_virtual_amount",array("user_id"=> $login));
                   
                    $vai = $qu1->row_array();
                    $loginat1  =   $vai['amount'];
                    
                    if($status == 1){
                            $adm    =   $admin-$amount1;
                            $ldm    =   $loginat1+$amount1;
                            $this->db->where("user_id","1");
                            $this->db->update("current_virtual_amount",array("amount" => $adm));

                            $this->db->where("user_id",$login);
                            $this->db->update("current_virtual_amount",array("amount" =>   $ldm));

                             $inset   =   array(
                                    "trans_from"        =>  1,
                                    "trans_to"          =>  $login,
                                    "trans_amt"         =>  $amount1,
                                    "cur_amount"        =>  $loginat1,
                                    "trans_remark"      =>  "Refund request Accepted",
                                    "trans_status"      =>  3
                            );
                            $this->db->insert("trans_detail",$inset);
                    }                     
                    $this->db->where('refund_req_id',$fund);
                    $this->db->update('refund_req',$upd);
                    if($this->db->affected_rows() > 0){
                            return 1;
                    }
                    else{
                            return 0;
                    }
            }
            public function trans_commission($md,$sd,$d,$my,$desc,$amt){
                $cammmt     =   0;
                $cammst     =   0;
                $cammdt     =   0;
                $cammat     =   0;
                $mobjid  =   $this->getmoduleobjectid($desc);
				//echo $mobjid;die();
                if($md != 0){
                            $mdp     =   $this->getpackage($md);
                            $comd    =   $this->getcomdet($mdp,$mobjid);
                            $cammmt  =   $this->getcamt($md);
                }
                if($sd != 0){
                            $sdp     =   $this->getpackage($sd);
                            $cosd    =   $this->getcomdet($sdp,$mobjid);
                            $cammst  =   $this->getcamt($sd);
                }
                if($d != 0){
                            $dp = $this->getpackage($d);
                            $cod    =   $this->getcomdet($dp,$mobjid);
                            $cammdt  =   $this->getcamt($d);
                }
                if($my != 0){
                            $myp    = $this->getpackage($my);
                            $coyd    =   $this->getcomdet($myp,$mobjid);
                            $cammat  =   $this->getcamt($my);
                }
               
                $amyt      =   number_format((($amt*($coyd['commission_amt']))/100),2);
                $amdt      =   number_format((($amt*($cod['commission_amt']))/100),2);
                $amst      =   number_format((($amt*($cosd['commission_amt']))/100),2);
                $ammt      =   number_format((($amt*($comd['commission_amt']))/100),2);
                
                $deta       =   $amyt;
                $detd       =   $amdt-$deta;
                if($d != 0){
                $dets       =   $amst-$amdt;
                }else{
                    $dets       =   $amst-$amyt;
                }
                $detm       =   $ammt-$amst;
                
                $cammmt1     =   $cammmt-$detm;
                $cammst1     =   $cammst-$dets;
                $cammdt1     =   $cammdt-$detd;
                $cammat1     =   $cammat-$deta;
                //echo $deta; die();
                $this->updatecvamt($md,$cammmt1);
                $this->updatecvamt($sd,$cammst1);
                $this->updatecvamt($d,$cammdt1);
                $this->updatecvamt($my,$cammat1);
                
				if($d != 0 && $sd != 0 && $md != 0){
						$this->insertdeamt($d,$my,$cammat1,$cammat,$deta);
						$this->insertdeamt($sd,$d,$cammdt1,$cammdt,$detd);
						$this->insertdeamt($md,$sd,$cammst1,$cammst,$dets);
						$this->insertdeamt("1",$md,$cammmt1,$cammmt,$detm);
				}
				if($d == 0 && $sd != 0 && $md != 0){
						$this->insertdeamt($sd,$my,$cammat1,$cammat,$deta);
						$this->insertdeamt($md,$sd,$cammst1,$cammst,$dets);
						$this->insertdeamt("1",$md,$cammmt1,$cammmt,$detm);
				}
				/*
				if($d == 0 && $sd = 0 && $md != 0){
						$this->insertdeamt($md,$my,$cammat1,$cammat,$deta);
						$this->insertdeamt("1",$md,$cammmt1,$cammmt,$detm);
				}
				if($d == 0 && $sd == 0 && $md == 0){
						$this->insertdeamt("1",$my,$cammat1,$cammat,$deta);
				}
				*/
               
                
        }
        
        public function getpackage($val){
                $this->db->reconnect();
                $qu = $this->db->get_where("commission",array("login_id" => $val));
                $pg = $qu->row_array();
                return $pg['package_id'];
        }
        public function getmoduleobjectid($desc){
                $qu = $this->db->get_where("modules_object",array("modules_obj_name" => $desc));
				//echo $this->db->last_query();die();
                $od = $qu->row_array();
                return $od['modules_obj_id'];
        }
        public function getcamt($md){
            $this->db->reconnect();
            $query2 = $this->db->get_where('current_virtual_amount', array('user_id' => $md));
             if($query2 && $query2->num_rows()== 1){
                $qu = $this->db->get_where("current_virtual_amount",array("user_id" => $md));
                $od = $qu->row_array();
                return $od['amount'];
             }else{
                  $insfrom   =   array(
                        "user_id"    =>   $md,
                        "amount"     => 0
                    );

                $query =   $this->db->insert("current_virtual_amount", $insfrom);
                return '0';
             }
        }
        public function getcomdet($mdp,$mobjid){
                $this->db->reconnect();
                $qu = $this->db->get_where("commission_details",array("package_id" => $mdp,"modules_object_id" => $mobjid));
                $od = $qu->row_array();
                return $od;
        }
        public function updatecvamt($md,$amt){
                $this->db->where(array("user_id" => $md));
                $qu = $this->db->update("current_virtual_amount",array("amount" => $amt));
                return $qu;
        }
        public function insertdeamt($d,$my,$amt,$camount,$dt){
            $this->db->reconnect();
                $data   =   array(
                        "from"          =>  $d,
                        "to"            =>  $my,
                        "com_amount"    =>  $amt,
                        "cur_amount"    =>  $camount?$camount:0,
                        "remarks"       =>  "commission amount reverted",
                        "date_time"     => date('Y-m-d H:i:s')
                );
                
                $this->db->insert("comi_virtual_det",$data);
                
                $inset   =   array(
                        "trans_from"        =>  $d,
                        "trans_to"          =>  $my,
                        "trans_amt"         =>  $dt,
                        "cur_amount"        =>  $amt,
                        "trans_remark"      =>  "commission amount reverted, for refund request",
                        "trans_status"      =>  2,
                        "type"  =>     "2",
                    'trans_date' => date('Y-m-d H:i:s')
                );
                $this->db->insert("trans_detail",$inset);
        }
            
    }
?>