<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Settings_model extends CI_Model
{ 
        public function change_password(){
                $mobile      =   $this->session->userdata("mobile");
                $pass        =   $this->input->post("pass");
//                echo $mobile;exit;
                $data   =   array(
                        "login_password"        =>     md5($pass)
                );
                $this->db->where("login_mobile",$mobile);
                $this->db->update("login",$data);
                if($this->db->affected_rows()   >   0){
                        return 1;
                }
                else{
                        return 0;
                }
        }
        public function profile($val){
                $this->db->select('l.*,p.*,u.user_type as type_user');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('user_type as u','l.user_type = u.user_type_id','inner');
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
        public function update_profile($valu,$idP,$addp){
                $ses_id             =   $valu;
                $first_name         =   $this->input->post("first_name");
                $last_name          =   $this->input->post("last_name");
                $state              =   $this->input->post("state");
                $city               =   $this->input->post("city");
                $address            =   $this->input->post("address");
                $door               =   $this->input->post("door");
                $street             =   $this->input->post("street");
                $area               =   $this->input->post("area"); 
                        $ins   =   array(
                                "first_name"            =>     $first_name,
                                "last_name"             =>     $last_name,
                                "state"                 =>     $state,
                                "city"                  =>     $city,
                                "updated_by"            =>     $ses_id,
                                "updated_on"            =>     date("Y-m-d H:i:s"),
                                "address"               =>     $address,
                                "id_proof"              =>     "$idP",
                                "add_proof"              =>     "$addp",
                                'door'                  =>     $door,
                                'street'                =>     $street,
                                'area'                  =>     $area
                        );
                        $this->db->where("login_id",$valu);
                        $this->db->update("profile",$ins);
                        $var2  =   $this->db->affected_rows();
                        if($var2 > 0){
                                return 1;
                        }
                        else{
                                return 0;
                        }
        }
        
        public function getVirtual1(){
            $id = $this->session->userdata('login_id');
            $query = $this->db->get_where('current_virtual_amount', array('user_id' => $id));
            
            if($query && $query->num_rows()== 1){
                  return  number_format($query->row()->amount,2);
               }else{
                   return "0.00";
               }
        }
        public function getVirtual(){
            $id = $this->session->userdata('login_id');
            $query = $this->db->get_where('current_virtual_amount', array('user_id' => $id));
            
            if($query && $query->num_rows()== 1){
                  return $query->row()->amount;
               }else{
                   return "0.00";
               }
        }
        public function checkVirtual(){
            $id = $this->session->userdata('login_id');
            $query = $this->db->get_where('current_virtual_amount', array('user_id' => $id));
           
            if($query && $query->num_rows()== 1){
                  return $query->row()->amount;
               }else{
                   return 0;
               }
        }
        
        public function addAmount(){
            $val = $this->checkVirtual();
            if($val == 0){
                $ins   =   array(
                        "user_id"    =>     $this->session->userdata('login_id'),
                        "amount"     =>     $this->input->post('amount')
                );
              $query =   $this->db->insert("current_virtual_amount", $ins);
            }else{
                $ins   =   array(                      
                        "amount"     =>     ($val + $this->input->post('amount'))
                );
                $this->db->where("user_id",$this->session->userdata('login_id'));
                $query = $this->db->update("current_virtual_amount",$ins);
            }
            if($query){
                return 1;
            }else{
                return 0;
            }
        }
        public function editAmount(){
            $ins   =   array(                      
                        "amount"     =>     ($val + $this->input->post('amount'))
                );
                $this->db->where("user_id",$this->session->userdata('login_id'));
                $query = $this->db->update("current_virtual_amount",$ins);
                 if($query){
                return 1;
            }else{
                return 0;
            }
        }
        
        public function getVirtualgetter($id){
            $query = $this->db->get_where('current_virtual_amount', array('user_id' => $id));
            
            if($query && $query->num_rows()== 1){
                  return  number_format($query->row()->amount,2);
               }else{
                   return "0.00";
               }
        }
        
        public function getVirtualallgetter($id,$ue){
                $this->db->select('l.*,p.*,u.user_type as type_user');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->join('user_type as u','l.user_type = u.user_type_id','inner');
                if($ue == 2){
                    $this->db->where('p.master_distributor_id',$id);
                }
                else if($ue == 3){
                    $this->db->where('p.super_distributor_id',$id);
                }
                else if($ue == 4){
                    $this->db->where('p.distributor_id',$id);
                }
                else if($ue == 5){
                    $this->db->where('p.login_id',$id);
                }
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                  return $query->result();
               }else{
                   return array();
               }
        }
        public function getprofile($id){
            $query = $this->db->get_where('profile', array('login_id' => $id));
            //echo $this->db->last_query();
                if($query && $query->num_rows()>0){
                  return $query->row();
               }else{
                   return array();
               }
        }
        public function transferVamt($from,$to){
            $from_m =$this->getprofile($from);
            $from_t =$this->getprofile($to);
            $from_mo = $from_m->mobile;
            $from_to = $from_t->mobile;
            $myamt = $this->input->post('amount');
            
            $query = $this->db->get_where('current_virtual_amount', array('user_id' => $to));           
            if($query && $query->num_rows()== 1){
                  $val = $query->row()->amount;
                   $insto   =   array(                      
                        "amount"     => ($val + $this->input->post('amount'))
                    );
                $this->db->where("user_id",$to);
                $query1 = $this->db->update("current_virtual_amount",$insto);
                
                $query2 = $this->db->get_where('current_virtual_amount', array('user_id' => $from));           
                    if($query2 && $query2->num_rows()== 1){                        
                        $val2 = $query2->row()->amount;
                        $cur = $val2 - $this->input->post('amount');
                        $insfrom   =   array(                      
                                "amount"     => ($val2 - $this->input->post('amount'))
                            );
                        $this->db->where("user_id",$from);
                        $query1 = $this->db->update("current_virtual_amount",$insfrom);
                        
                        $ch = curl_init();
                        $optArray = array(
			CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$from_mo&from=ESYTOP&message=ESY+TOPUP+Rs.+$myamt+debited+from+your+Esy+Topup+account+Now+current+balance+is+Rs.+$cur.",
                                CURLOPT_RETURNTRANSFER => true
                        );
                        curl_setopt_array($ch, $optArray);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                        $result = curl_exec($ch);
                        curl_close($ch);
                    }
                    else{
                        $cur = 0 - $this->input->post('amount');
                        $insfrom   =   array(
                                "user_id"    =>     $from,
                                "amount"     => (0 - $this->input->post('amount'))
                            );
                        
                        $query =   $this->db->insert("current_virtual_amount", $insfrom);
                        
                        $ch = curl_init();
                        $optArray = array(
			CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$from_mo&from=ESYTOP&message=ESY+TOPUP+Rs.+$myamt+debited+from+your+Esy+Topup+account+Now+current+balance+is+Rs.+$cur.",
                                CURLOPT_RETURNTRANSFER => true
                        );
                        curl_setopt_array($ch, $optArray);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                        $result = curl_exec($ch);
                        curl_close($ch);
                    } 
                    
                     $myupdate = array(
                        "trans_from"    =>     $from,
                        "trans_to"    =>     $to,
                        "trans_amt"     =>     $this->input->post('amount'),
                        "trans_remark"     =>     $this->input->post('remarks')
                     );
                    $query =   $this->db->insert("trans_detail", $myupdate);
                    
                     $ch = curl_init();
                        $optArray = array(
			CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$from_to&from=ESYTOP&message=ESY+TOPUP+Rs.+$myamt+credited+from+in+Esy+Topup+account.",
                                CURLOPT_RETURNTRANSFER => true
                        );
                        curl_setopt_array($ch, $optArray);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                        $result = curl_exec($ch);
                        curl_close($ch);
                    
                    return 1;
                    
               }else{
                  $ins   =   array(
                        "user_id"    =>     $to,
                        "amount"     =>     $this->input->post('amount')
                );
              $query =   $this->db->insert("current_virtual_amount", $ins);

                $query2 = $this->db->get_where('current_virtual_amount', array('user_id' => $from));           
                    if($query2 && $query2->num_rows()== 1){                        
                        $val2 = $query2->row()->amount;
                        $curr = $val2 - $this->input->post('amount');
                        $insfrom   =   array(                      
                                "amount"     => ($val2 - $this->input->post('amount'))
                            );
                        $this->db->where("user_id",$from);
                        $query1 = $this->db->update("current_virtual_amount",$insfrom);
                        
                        $ch = curl_init();
                        $optArray = array(
			CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$from_mo&from=ESYTOP&message=ESY+TOPUP+Rs.+$myamt+debited+from+your+Esy+Topup+account,+your+current+balance+is+$curr.",
                                CURLOPT_RETURNTRANSFER => true
                        );
                        curl_setopt_array($ch, $optArray);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                        $result = curl_exec($ch);
                        curl_close($ch);
                    }else{
                        $curr = 0 - $this->input->post('amount');
                        $insfrom   =   array(
                                "user_id"    =>     $from,
                                "amount"     => (0 - $this->input->post('amount'))
                            );
                        
                        $query =   $this->db->insert("current_virtual_amount", $insfrom);
                        
                        $ch = curl_init();
                        $optArray = array(
			CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$from_mo&from=ESYTOP&message=ESY+TOPUP+Rs.+$myamt+debited+from+your+Esy+Topup+account,+your+current+balance+is+$curr.",
                                CURLOPT_RETURNTRANSFER => true
                        );
                        curl_setopt_array($ch, $optArray);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                        $result = curl_exec($ch);
                        curl_close($ch);
                    } 
                    
                     $myupdate = array(
                        "trans_from"    =>     $from,
                        "trans_to"    =>     $to,
                        "trans_amt"     =>     $this->input->post('amount'),
                        "trans_remark"     =>     $this->input->post('remarks')
                     );
                    $query =   $this->db->insert("trans_detail", $myupdate);
                    $curr = $this->input->post('amount');
                    
                     $ch = curl_init();
                        $optArray = array(
			CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$from_to&from=ESYTOP&message=ESY+TOPUP+Rs.+Rs.+$myamt+credited+from+in+Esy+Topup+account,+your+current+balance+is+$curr.",
                                CURLOPT_RETURNTRANSFER => true
                        );
                        curl_setopt_array($ch, $optArray);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                        $result = curl_exec($ch);
                        curl_close($ch);
                    
                    return 1;
               }
        }
        
        public function getDebit($id){
            $from = $this->session->userdata('login_id');
            $query = $this->db->query ("SELECT t.*,CONCAT(p.first_name,' ',p.last_name)AS from_name, CONCAT(po.first_name,' ',po.last_name)AS to_name FROM trans_detail t"
                    . " INNER JOIN profile p ON p.login_id = t.trans_from"
                    . " INNER JOIN profile po On po.login_id = t.trans_to"
                    . " WHERE t.trans_from = $from AND t.trans_to = $id ORDER BY trans_id DESC");
            //echo $this->db->last_query();
            if($query && $query->num_rows()>0){
                return $query->result();
            }else{
                return array();
            }
            
        }
        public function getCredit($id){
            $from = $this->session->userdata('login_id');
            $query = $this->db->query ("SELECT t.*,CONCAT(p.first_name,' ',p.last_name)AS from_name, CONCAT(po.first_name,' ',po.last_name)AS to_name FROM trans_detail t"
                    . " INNER JOIN profile p ON p.login_id = t.trans_from"
                    . " INNER JOIN profile po On po.login_id = t.trans_to"
                    . " WHERE t.trans_from = $id ORDER BY trans_id DESC");
           // echo $this->db->last_query();
            if($query && $query->num_rows()>0){
                return $query->result();
            }else{
                return array();
            }
            
        }
        
        public function notice(){
            $query = $this->db->get_where('notice', array('id' => 1));
            //echo $this->db->last_query();
                if($query && $query->num_rows()>0){
                  return $query->row();
               }else{
                   return array();
               }
        }
        public function noticeUpdate(){
            $insfrom   =   array(                      
                    "title"     => $this->input->post('title'),
                    "msg"     => $this->input->post('message'),
                );
            $this->db->where("id",1);
            $query1 = $this->db->update("notice",$insfrom);
                        
                if($query1){
                  return 1;
               }else{
                   return 0;
               }
        }
}