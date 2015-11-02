<?php
class Dashboard_model extends CI_Model
{ 
    public function masterCnt(){
        $query = $this->db->query("SELECT COUNT(login_id)cnt FROM login WHERE user_type = 2");
        return $query->row()->cnt;
    }
     public function superCnt(){
        $query = $this->db->query("SELECT COUNT(login_id)cnt FROM login WHERE user_type = 3");
        return $query->row()->cnt;
    }
     public function msuperCnt(){
         $id= $this->session->userdata('login_id');
        $query = $this->db->query("SELECT COUNT(l.login_id)cnt FROM login l "
                . " INNER JOIN profile p ON p.login_id = l.login_id "
                . " WHERE l.user_type = 3 AND p.master_distributor_id = $id");
        return $query->row()->cnt;
    }
     public function mdisCnt(){
         $id= $this->session->userdata('login_id');
        $query = $this->db->query("SELECT COUNT(l.login_id)cnt FROM login l "
                . " INNER JOIN profile p ON p.login_id = l.login_id "
                . " WHERE l.user_type = 4 AND p.master_distributor_id = $id");      
        return $query->row()->cnt;
    }
     public function magtCnt(){
         $id= $this->session->userdata('login_id');
        $query = $this->db->query("SELECT COUNT(l.login_id)cnt FROM login l "
                . " INNER JOIN profile p ON p.login_id = l.login_id "
                . " WHERE l.user_type = 5 AND p.master_distributor_id = $id");      
        return $query->row()->cnt;
    }
     public function sdisCnt(){
         $id= $this->session->userdata('login_id');
        $query = $this->db->query("SELECT COUNT(l.login_id)cnt FROM login l "
                . " INNER JOIN profile p ON p.login_id = l.login_id "
                . " WHERE l.user_type = 4 AND p.super_distributor_id = $id");      
        return $query->row()->cnt;
    }
     public function sagtCnt(){
         $id= $this->session->userdata('login_id');
        $query = $this->db->query("SELECT COUNT(l.login_id)cnt FROM login l "
                . " INNER JOIN profile p ON p.login_id = l.login_id "
                . " WHERE l.user_type = 5 AND p.super_distributor_id = $id");      
        return $query->row()->cnt;
    }
     public function disCnt(){
        $query = $this->db->query("SELECT COUNT(login_id)cnt FROM login WHERE user_type = 4");
        return $query->row()->cnt;
    }
     public function agCnt(){
        $query = $this->db->query("SELECT COUNT(login_id)cnt FROM login WHERE user_type = 5");
        return $query->row()->cnt;
    }
    
    public function amounts(){
        $query = $this->db->query("SELECT v.amount, CONCAT(p.first_name,' ',p.last_name)as name,u.user_type FROM current_virtual_amount v"
                . " INNER JOIN profile p ON p.login_id = v.user_id"
                . " INNER JOIN login l ON l.login_id = v.user_id"
                . " INNER JOIN user_type u ON u.user_type_id = l.user_type WHERE l.status = 1");
        //echo $this->db->last_query();die();
        return $query->result();
    }
    public function mamt(){
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id WHERE l.user_type = 2");
        $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
    public function samt(){
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id WHERE l.user_type = 3");
         $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
    public function damt(){
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id WHERE l.user_type = 4");
         $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
     public function aamt(){
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id WHERE l.user_type = 5");
         $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
    
    /*************************/
    public function msamt(){
        $login_id = $this->session->userdata('login_id');
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id "
                . " INNER JOIN profile p ON p.login_id = l.login_id  WHERE l.user_type = 3 AND p.master_distributor_id = $login_id" );
         $val = 0.00;
         //echo $this->db->last_query();die();
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
    public function mdamt(){
        $login_id = $this->session->userdata('login_id');
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id "
                . " INNER JOIN profile p ON p.login_id = l.login_id  WHERE l.user_type = 4 AND p.master_distributor_id = $login_id" );
         $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
     public function maamt(){
         $login_id = $this->session->userdata('login_id');
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id "
                . " INNER JOIN profile p ON p.login_id = l.login_id  WHERE l.user_type = 5 AND p.master_distributor_id = $login_id" );
         $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
    
     public function sdamt(){
        $login_id = $this->session->userdata('login_id');
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id "
                . " INNER JOIN profile p ON p.login_id = l.login_id  WHERE l.user_type = 4 AND p.super_distributor_id = $login_id" );
         $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
     public function saamt(){
         $login_id = $this->session->userdata('login_id');
        $query = $this->db->query("SELECT v.amount FROM current_virtual_amount v"
                . " INNER JOIN login l ON l.login_id = v.user_id "
                . " INNER JOIN profile p ON p.login_id = l.login_id  WHERE l.user_type = 5 AND p.super_distributor_id = $login_id" );
        //echo $this->db->last_query();die(); 
        $val = 0.00;
         if($query && $query->num_rows()> 0){
             foreach($query->result() as $result){
                 $val = $val + $result->amount;
             }
                return $val;
         }else{
             return $val;
         }
    }
    /*************************/
    
     public function notice(){
            $query = $this->db->get_where('notice', array('id' => 1));
            //echo $this->db->last_query();
                if($query && $query->num_rows()>0){
                  return $query->row();
               }else{
                   return array();
               }
        }
    
        public function tcom(){
                $id = $this->session->userdata("login_id");
                $uty = $this->session->userdata("my_type");
                if($uty == 1 || $uty == 2){
                        $aid = $this->session->userdata("admin_id");
                }
                if($uty == 3){
                        $aid = $this->session->userdata("master_distributor_id");
                }
                if($uty == 4){
                        $aid = $this->session->userdata("super_distributor_id");
                }
                if($uty == 5){
                        $aid = $this->session->userdata("distributor_id");
                }
                $this->db->select("sum(trans_amt) as amt");
                $query = $this->db->get_where("trans_detail",array("trans_from" => $aid,"trans_to" => $id,"trans_date >=" => date("Y-m-d 00:00:00"),"trans_date <=" => date("Y-m-d 23:59:59"),"trans_status" => 2 ))->row_array();
                //echo $this->db->last_query();exit;
                if($query){
                        return number_format($query['amt'],2);
                }else{
                        return "0.00";
                }    
        }
        public function pcom(){               
                 $id = $this->session->userdata("login_id");
                $uty = $this->session->userdata("my_type");
                $this->db->select("s.*,l.*");
                $this->db->from("trans_detail as s");
                $this->db->join("profile as l","l.login_id = s.trans_from","inner");
                $this->db->where("s.`trans_date` >= '".date("Y-m-d 00:00:00")."' AND s.`trans_date` <= '".date("Y-m-d 23:59:59")."' AND s.`trans_status` = '1' and s.type <> 0");
                $query = $this->db->get()->result();
                $va = 0;
                foreach($query as $qu){
                        if($uty == 1){
                                $va = $va+$qu->trans_amt;
                        }
                        if($uty == 2){
                                if($qu->master_distributor_id == $id){
                                        $va = $va+$qu->trans_amt;
                                }
                        }
                        if($uty == 3){
                                if($qu->super_distributor_id == $id){
                                        $va = $va+$qu->trans_amt;
                                }
                        }
                        if($uty == 4){
                                if($qu->distributor_id == $id){
                                        $va = $va+$qu->trans_amt;
                                }
                        }
                        if($uty == 5){
                                if($qu->login_id == $id){
                                        $va = $va+$qu->trans_amt;
                                }
                        }
                }
               // echo $va;
                // echo $this->db->last_query();exit;
                if($query){
                        return number_format( $va ,2);
                }else{
                        return "0";
                }    
        }
        public function vpcomo(){               
                 $id = $this->session->userdata("login_id");
                $uty = $this->session->userdata("my_type");
                $this->db->select("s.*,l.*");
                $this->db->from("trans_detail as s");
                $this->db->join("profile as l","l.login_id = s.trans_from","inner");
                $this->db->where("s.`trans_date` >= '".date("Y-m-d 00:00:00")."' AND s.`trans_date` <= '".date("Y-m-d 23:59:59")."' AND s.`trans_status` = '1' and s.type <> 0");
                $query = $this->db->get()->result();
                $va = 0;
                foreach($query as $qu){
                        if($uty == 4){
                                if($qu->distributor_id == $id  || $qu->login_id == $id){
                                        $va = $va+$qu->trans_amt;
                                }
                        }
                }
               // echo $va;
                // echo $this->db->last_query();exit;
                if($query){
                        return number_format( $va ,2);
                }else{
                        return "0";
                }    
        }

        public function pcomo(){
                $id = $this->session->userdata("login_id");
                $this->db->select("sum(trans_amt) as trans");
                $this->db->from("trans_detail as s");
                $this->db->join("profile as l","l.login_id = s.trans_from","inner");
                $this->db->where("s.`trans_date` >= '".date("Y-m-d 00:00:00")."' AND s.`trans_date` <= '".date("Y-m-d 23:59:59")."' AND s.`trans_status` = '1' and s.type <> 0 and s.trans_from= $id");
                $query = $this->db->get()->row_array();
                if($query){
                        return number_format( $query["trans"] ,2);
                }else{
                        return "0";
                }
        }

        public function pcomChart(){               
                $id = $this->session->userdata("login_id");
               $uty = $this->session->userdata("my_type");
                $this->db->select("s.*,l.*");
                $this->db->from("trans_detail as s");
                $this->db->join("profile as l","l.login_id = s.trans_from","inner");
                $this->db->where("s.`trans_date` >= '".date("Y-m-1 00:00:00")."' AND s.`trans_date` <= '".date("Y-m-d 23:59:59")."' AND s.`trans_status` = '1' and s.type <> 0");
                $query = $this->db->get()->result();
                $return = array();
               
                
                $day = date('d-m-Y');
                $month =explode('-', $day);
                $d=cal_days_in_month(CAL_GREGORIAN,$month['1'],$month['2']);
                $our = date('Y-m-01');
                for($i = 1; $i<=$month['0']; $i++){
                    $amt =0;
                    $k='no';
                    foreach($query as $qu){
                        if($uty == 1){
                            $day = explode(' ', $qu->trans_date);
                              if($our == $day['0']){
                                $amt = $amt+$qu->trans_amt;
                                $k = 'yes';
                             }
                        }
                         if($uty == 2){
                                if($qu->master_distributor_id == $id){
                                    $day = explode(' ', $qu->trans_date);
                                    if($our == $day['0']){
                                      $amt = $amt+$qu->trans_amt;
                                      $k = 'yes';
                                   }
                                }
                        }
                        if($uty == 3){
                                if($qu->super_distributor_id == $id){
                                    $day = explode(' ', $qu->trans_date);
                                    if($our == $day['0']){
                                      $amt = $amt+$qu->trans_amt;
                                      $k = 'yes';
                                   }
                                }
                        }
                        if($uty == 4){
                                if($qu->distributor_id == $id || $qu->login_id == $id){
                                    $day = explode(' ', $qu->trans_date);
                                    if($our == $day['0']){
                                      $amt = $amt+$qu->trans_amt;
                                      $k = 'yes';
                                   }
                                }
                        }
                        if($uty == 5){
                                if($qu->login_id == $id){
                                    $day = explode(' ', $qu->trans_date);
                                    if($our == $day['0']){
                                      $amt = $amt+$qu->trans_amt;
                                      $k = 'yes';
                                   }
                                }
                        }
                    }
                    if($k == 'no'){
                         array_push($return, "0.00");
                        $our = date('Y-m-d',date(strtotime("+1 day", strtotime("$our"))));
                    }else{
                        $val = number_format($amt/100, 2);
                        array_push($return, "$val");
                        $our = date('Y-m-d',date(strtotime("+1 day", strtotime("$our"))));
                    }
                 }
              
                 return $return; 
        }

}