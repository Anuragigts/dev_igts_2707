<?php
class Api_model extends CI_Model
{    
    public function verify(){
		$data 		= $this->input->get_post('xmlRequest');           
			$xmldata 	= simplexml_load_string($data);	
				$a = mt_rand(100000,999999); 
               for ($i = 0; $i<10; $i++) 
                {
                    $a .= mt_rand(0,9);
                }			
        $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>";
        $id = $xmldata->USERID;
        $query = $this->db->get_where('current_virtual_amount', array('user_id' => $id));        
        if($query && $query->num_rows()== 1){            
                $xml .= "<CHECKBALANCERESPONSE>
						<STATUSCODE>0</STATUSCODE>
						<STATUSDESCRIPTION>SUCCESS</STATUSDESCRIPTION>
						<AGENTCODE>".$xmldata->AGENTCODE."</AGENTCODE>
						<USERID>".$xmldata->USERID."</USERID>
						<GIREFID>".$xmldata->GIREFID."</GIREFID>
						<CHANNELPARTNERREFID>SWAMI".$a."</CHANNELPARTNERREFID>
						<BALANCE>".$query->row()->amount."</BALANCE>
						</CHECKBALANCERESPONSE>";
           }else{
               $xml .= "<CHECKBALANCERESPONSE>
						<STATUSCODE>1</STATUSCODE>
						<STATUSDESCRIPTION>Fail</STATUSDESCRIPTION>
						<AGENTCODE>".$xmldata->AGENTCODE."</AGENTCODE>
						<USERID>".$xmldata->USERID."</USERID>
						<GIREFID>".$xmldata->GIREFID."</GIREFID>
						<CHANNELPARTNERREFID>SWAMI".$a."</CHANNELPARTNERREFID>
						<BALANCE>0</BALANCE>
						</CHECKBALANCERESPONSE>";
           }
            return $xml;
	}
	
    public function isValidTransfer(){
			$data 		= $this->input->get_post('xmlRequest');           
			$xmldata 	= simplexml_load_string($data);	
				$a = mt_rand(100000,999999); 
               for ($i = 0; $i<10; $i++) 
                {
                    $a .= mt_rand(0,9);
                }			
        $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>";
        $id = $xmldata->USERID;
        $query = $this->db->get_where('current_virtual_amount', array('user_id' => $id));        
        if($query && $query->num_rows()== 1){            
                $xml .= "<VERIFICATIONRESPONSE>
						<STATUSCODE>0</STATUSCODE>
						<STATUSDESCRIPTION>SUCCESS</STATUSDESCRIPTION>
						<AGENTCODE>".$xmldata->AGENTCODE."</AGENTCODE>
						<USERID>".$xmldata->USERID."</USERID>
						<GIREFID>".$xmldata->GIREFID."</GIREFID>
						<CHANNELPARTNERREFID>SWAMI".$a."</CHANNELPARTNERREFID>
						<BALANCE>".$query->row()->amount."</BALANCE>
						</VERIFICATIONRESPONSE>";
           }else{
               $xml .= "<VERIFICATIONRESPONSE>
						<STATUSCODE>1</STATUSCODE>
						<STATUSDESCRIPTION>Fail</STATUSDESCRIPTION>
						<AGENTCODE>".$xmldata->AGENTCODE."</AGENTCODE>
						<USERID>".$xmldata->USERID."</USERID>
						<GIREFID>".$xmldata->GIREFID."</GIREFID>
						<CHANNELPARTNERREFID>SWAMI".$a."</CHANNELPARTNERREFID>
						<BALANCE>0</BALANCE>
						</VERIFICATIONRESPONSE>";
           }
            return $xml;
    }
    
    public function sendSuccessInfo(){
			$data 		= $this->input->get_post('xmlRequest');           
			$xmldata 	= simplexml_load_string($data);	
				$a = mt_rand(100000,999999); 
               for ($i = 0; $i<10; $i++) 
                {
                    $a .= mt_rand(0,9);
                }
			$trackid = "SWAMI".$a;
        $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>"; 
        $this->load->model('recharge_model');
        $id = $xmldata->USERID;        
         $query = $this->db->query("SELECT * FROM profile WHERE login_id = $id");
         if($query && $query->num_rows()> 0){
            $ad     = $query->row()->admin_id;
            $md     = $query->row()->master_distributor_id;
            $sd     = $query->row()->super_distributor_id;
            $d      = $query->row()->distributor_id;
            $my     = $id;
            $optna  =   strtolower('dmr');
            $amt    = $xmldata->NETAMOUNT;
            $this->recharge_model->trans_commission($ad,$md,$sd,$d,$my,$optna,$amt,"2","0","0");
            
            $up = array(
                     'login_id' => $id,
                     'to_id'    => 00,
                     'amount'    =>$amt,
                     'track_id' => "$trackid",
                     'status' => "Success",
                     'responce_code' => "$xmldata->GIREFID",
                     'rrn' => "AAA",
                     'responce_cd' => "AAA",
                     'ben_name' => "No Data"
            );         
                $insert = $this->db->insert('transection_track',$up);
                if($this->db->affected_rows() == 1){
					$query1 = $this->db->get_where('current_virtual_amount', array('user_id' => $id));
					if($query1 && $query1->num_rows()== 1){ 
                     $xml .= "<AGENTQUOTADEBITRESPONSE>
							<STATUSCODE>0</STATUSCODE>
							<STATUSDESCRIPTION>SUCCESS</STATUSDESCRIPTION>
							<AGENTCODE>".$xmldata->AGENTCODE."</AGENTCODE>
							<USERID>".$xmldata->USERID."</USERID>
							<GIREFID>".$xmldata->GIREFID."</GIREFID>
							<CHANNELPARTNERREFID>".$trackid."</CHANNELPARTNERREFID>
							<TOTALAMOUNT>".$xmldata->TOTALAMOUNT."</TOTALAMOUNT>
							<RECHARGEFEE>".$xmldata->RECHARGEFEE."</RECHARGEFEE>
							<NETAMOUNT>".$xmldata->NETAMOUNT."</NETAMOUNT>
							<BALANCE>".$query1->row()->amount."</BALANCE>
							<METHODID>2</METHODID>
							</AGENTQUOTADEBITRESPONSE>";
					}
                }else{
                     $xml .= "<AGENTQUOTADEBITRESPONSE>
							<STATUSCODE>1</STATUSCODE>
							<STATUSDESCRIPTION>FAIL</STATUSDESCRIPTION>
							<AGENTCODE>".$xmldata->AGENTCODE."</AGENTCODE>
							<USERID>".$xmldata->USERID."</USERID>
							<GIREFID>".$xmldata->GIREFID."</GIREFID>
							<CHANNELPARTNERREFID>".$trackid."</CHANNELPARTNERREFID>
							<TOTALAMOUNT>".$xmldata->TOTALAMOUNT."</TOTALAMOUNT>
							<RECHARGEFEE>".$xmldata->RECHARGEFEE."</RECHARGEFEE>
							<NETAMOUNT>".$xmldata->NETAMOUNT."</NETAMOUNT>
							<BALANCE>00</BALANCE>
							<METHODID>2</METHODID>
							</AGENTQUOTADEBITRESPONSE>";
                }                 
            }else{
                $xml .= "<AGENTQUOTADEBITRESPONSE>
						<STATUSCODE>1</STATUSCODE>
						<STATUSDESCRIPTION>FAIL</STATUSDESCRIPTION>
						<AGENTCODE>".$xmldata->AGENTCODE."</AGENTCODE>
						<USERID>".$xmldata->USERID."</USERID>
						<GIREFID>".$xmldata->GIREFID."</GIREFID>
						<CHANNELPARTNERREFID>".$trackid."</CHANNELPARTNERREFID>
						<TOTALAMOUNT>".$xmldata->TOTALAMOUNT."</TOTALAMOUNT>
						<RECHARGEFEE>".$xmldata->RECHARGEFEE."</RECHARGEFEE>
						<NETAMOUNT>".$xmldata->NETAMOUNT."</NETAMOUNT>
						<BALANCE>00</BALANCE>
						<METHODID>2</METHODID>
						</AGENTQUOTADEBITRESPONSE>";
           }
         return $xml;
    }
	
	public function returnAmtInfo(){
		$data 		= $this->input->get_post('xmlRequest');           
			$xmldata 	= simplexml_load_string($data);	
				$a = mt_rand(100000,999999); 
               for ($i = 0; $i<10; $i++) 
                {
                    $a .= mt_rand(0,9);
                }
		$trackid = "SWAMI".$a;
        $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>"; 
		$id = $xmldata->USERID;
		$amt = $xmldata->CREDITAMOUNT;
        $query = $this->db->get_where('current_virtual_amount', array('user_id' => $id));        
        if($query && $query->num_rows()== 1){ 
			$val = $query->row()->amount;
                   $insto   =   array(                      
                        "amount"     => ($val + $amt)
                    );
					$this->db->where("user_id",$id);
					$query1 = $this->db->update("current_virtual_amount",$insto);
                    
                     $myupdate = array(
                        "trans_from"    =>     1,
                        "trans_to"    =>     $id,
                        "trans_amt"     =>     $amt,
                        "trans_remark"     =>  "$xmldata->REASON"
                     );
                    $query =   $this->db->insert("trans_detail", $myupdate);
                  
                    
               
			$xml .= "<AGENTQUOTACREDITRESPONSE>
					<STATUSCODE>0</STATUSCODE>
					<STATUSDESCRIPTION>SUCCESS</STATUSDESCRIPTION>
					<AGENTCODE>".$xmldata->AGENTCODE."</AGENTCODE>
					<USERID>".$xmldata->USERID."</USERID>
					<GIREFID>".$xmldata->GIREFID."</GIREFID>
					<CHANNELPARTNERREFID>".$trackid."</CHANNELPARTNERREFID>
					<CREDITAMOUNT>".$amt."</CREDITAMOUNT>
					<BALANCE>".$val + $amt."</BALANCE>
					<METHODID>3</METHODID>
					</AGENTQUOTACREDITRESPONSE>";
		}else{
			$xml .= "<AGENTQUOTACREDITRESPONSE>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>Fail</STATUSDESCRIPTION>
					<AGENTCODE>".$xmldata->AGENTCODE."</AGENTCODE>
					<USERID>".$xmldata->USERID."</USERID>
					<GIREFID>".$xmldata->GIREFID."</GIREFID>
					<CHANNELPARTNERREFID>".$trackid."</CHANNELPARTNERREFID>
					<CREDITAMOUNT>".$amt."</CREDITAMOUNT>
					<BALANCE>00</BALANCE>
					<METHODID>3</METHODID>
					</AGENTQUOTACREDITRESPONSE>";
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