<?php
class Api_model extends CI_Model
{
    public function checkLogin($agent){
        $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><response>";
       $id =  substr($agent, 8);
       $query = $this->db->query("SELECT * FROM module_access WHERE login_id = $id");
       if($query && $query->num_rows()> 0){
           if($query->row()->dth == 1){
               $xml .= "<status>1</status><isValid>1</isValid><message>User is valid</message></response>";
               //$arr = array('status' => 1, 'isValid' => 1, 'message' => 'User is valid');
               //return  json_encode($arr);
           }else{
               $xml .= "<status>0</status><isValid>0</isValid><message>User is invalid</message></response>";
               //$arr = array('status' => 0, 'isValid' => 0, 'message' => 'User is invalid');
              // return  json_encode($arr);
           }
       }else{
           $xml .= "<status>0</status><isValid>0</isValid><message>User is invalid</message></response>";
            //$arr = array('status' => 0, 'isValid' => 0, 'message' => 'User is invalid');
            //return  json_encode($arr);
        }
        return $xml;
    }
    
    public function isValidTransfer($agent,$amt){ 
         $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><response>";
        $id = substr($agent, 8);
        $query = $this->db->get_where('current_virtual_amount', array('user_id' => $id));        
        if($query && $query->num_rows()== 1){
            if(($query->row()->amount+500) > $amt){
                $xml .= "<status>1</status><isValid>1</isValid><amount>$amt</amount><message>Transfer successfully</message></response>";
                //$arr = array('status' => 1, 'isValid' => 1, 'amount' => "$amt", 'message' => 'Transfer successfully');
               // return  json_encode($arr);
            }else{
                $xml .= "<status>0</status><isValid>0</isValid><message>Fail</message></response>";
               //$arr = array('status' => 0, 'isValid' => 0, 'message' => 'Fail');
              // return  json_encode($arr);
           }
              
           }else{
               $xml .= "<status>0</status><isValid>0</isValid><message>Fail</message></response>";
               //$arr = array('status' => 0, 'isValid' => 0, 'message' => 'Fail');
               //return  json_encode($arr);
           }
            return $xml;
    }
    
    public function sendSuccessInfo($agent,$amt,$beneficaryID,$track_id,$transstatus,$responseCode,$rrn,$statuscode,$beneficaryname){
         $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><response>"; 
        $this->load->model('recharge_model');
        $id = substr($agent, 8);        
         $query = $this->db->query("SELECT * FROM profile WHERE login_id = $id");
         if($query && $query->num_rows()> 0){
            $ad     = $query->row()->admin_id;
            $md     = $query->row()->master_distributor_id;
            $sd     = $query->row()->super_distributor_id;
            $d      = $query->row()->distributor_id;
            $my     = $id;
            $optna  =   strtolower('dmr');
            $amt    = $amt;
            $this->recharge_model->trans_commission($ad,$md,$sd,$d,$my,$optna,$amt,"2","0","0");
            
            $up = array(
                     'login_id' => $id,
                     'to_id'    => $beneficaryID,
                     'amount'    =>$amt,
                     'track_id' => "$track_id",
                     'status' => "$transstatus",
                     'responce_code' => "$responseCode",
                     'rrn' => "$rrn",
                     'responce_cd' => "$statuscode",
                     'ben_name' => "$beneficaryname"
            );         
                $insert = $this->db->insert('transection_track',$up);
                if($this->db->affected_rows() == 1){
                     $xml .= "<status>1</status><message>Record saved successfully</message></response>";
                    //$arr = array('status' => 1, 'message' => 'Record saved successfully.');
                    //return  json_encode($arr);
                    
                }else{
                     $xml .= "<status>0</status><message>Not inserted</message></response>";
                   // $arr = array('status' => 0, 'message' => 'Not inserted.');
                  //  return  json_encode($arr);
                }                 
            }else{
                $xml .= "<status>0</status><message>Invalid User</message></response>";
              // $arr = array('status' => 0, 'message' => 'Not inserted.');
             //  return  json_encode($arr);
           }
         return $xml;
    }
    
    public function sendSuccessTopupInfo($agent,$amt,$name, $serial, $topupval, $currnetvalue, $previousvalue, $topuptransid, $expirydate){
        $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><response>"; 
        $this->load->model('recharge_model');
        $id = substr($agent, 8);  
        $ser = (($amt * 0.45)/100);
        $query2 = $this->db->get_where('current_virtual_amount', array('user_id' => $id));
        
        if($query2 && $query2->num_rows()== 1){ 
            $totalcharge= $amt + $ser;
            //$name = $this->session->userdata('dmrname').' '.$this->session->userdata('dmrlastname').' :'.$this->session->userdata('dmrcard');
            $val2 = $query2->row()->amount;
            $insfrom   =   array(                      
                    "amount"     => ($val2 - $totalcharge)
                );
            $this->db->where("user_id",$id);
            $query1 = $this->db->update("current_virtual_amount",$insfrom);

             $myupdate = array(
               "trans_from"    =>   $id,
               "trans_to"      =>     0,
              "cur_amount"      =>    ($val2 - $totalcharge),
               "trans_amt"     =>     floatval($totalcharge),
               "trans_remark"  =>     "Added in wallet with service charge to $name",
                 "type"  =>     "2",
                 'trans_date' => date('Y-m-d H:i:s')
            );
           $query =   $this->db->insert("trans_detail", $myupdate);
           
           $up = array(
                     'login_id' => $id,
                     'serial_no' => "$serial",
                     'topup_val' => "$topupval",
                     'current' => "$currnetvalue",
                     'prev_val' => "$previousvalue",
                     'trans_id' => "$topuptransid",
                     'expiry' => "$expirydate",
            );         
                $insert = $this->db->insert('topup_track',$up);
                if($this->db->affected_rows() == 1){
                     $xml .= "<status>1</status><message>Record saved successfully</message></response>";
                   // $arr = array('status' => 1, 'message' => 'Record saved successfully.');
                   // return  json_encode($arr);
                    
                }else{
                     $xml .= "<status>0</status><message>Invalid User</message></response>";
                    //$arr = array('status' => 0, 'message' => 'Not inserted.');
                   // return  json_encode($arr);
                }
        }else{
            $xml .= "<status>0</status><message>Invalid User</message></response>";
           //$arr = array('status' => 0, 'message' => 'Not inserted.');
          // return  json_encode($arr);
       }
         return $xml;       
    }
    public function getuser(){
        $query = $this->db->query("SELECT * FROM login WHERE user_type = 5 OR user_type = 4 ORDER BY login_id desc");
        if($this->db->affected_rows() > 0){
            return $query->result();
        }
        else{
            return array();
        }
    }
}