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
                    $this->db->select("f.*,p.*");
                    $this->db->from("refund_req as f");
                    $this->db->join("profile as p","f.user_id = p.login_id","inner");
                    if($this->session->userdata("my_type") > 1){
                            $this->db->where("p.login_id",$this->session->userdata("login_id"));
                    }
                    $this->db->order_by("f.refund_req_id","desc");
                    $qu =   $this->db->get();
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
                                    "trans_remark"      =>  "Refund requested",
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
    }
?>