<?php
class Recharge_model extends CI_Model
{ 
     public function getRechargeDetails1(){
         $url = RECHARGEURL;  
        
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                      <soap:Header>
                        <ns1:clsSecurity soap:mustUnderstand="false"
                    xmlns:ns1="http://tempuri.org/HERMESAPI/HermesMobile">
                           <ns1:WebProviderLoginId>'.USER.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.PASSW.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                <GETRECHARGEDETAILS xmlns="http://tempuri.org/HERMESAPI/HermesMobile/">
                    <pobjSecurity>
                        <WebProviderLoginId>'.USER.'</WebProviderLoginId>
                        <WebProviderPassword>'.PASSW.'</WebProviderPassword>
                            <IsAgent>false</IsAgent>
                          </pobjSecurity>
                          <PstrFinalOutPut />
                          <pstrError />
                        </GETRECHARGEDETAILS>
                      </soap:Body>
                    </soap:Envelope>';
        
        $curl = curl_init();

        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_TIMEOUT,120);
        
        curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
            'SOAPAction:"'.RECHARGEACTION.'GETRECHARGEDETAILS"',
            'Content-Type: text/xml; charset=utf-8;',
        ));

         curl_setopt ($curl, CURLOPT_POST, 1);
        
        curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);
       
        $result = curl_exec($curl); 
        curl_close ($curl);
        
        $keep_array = explode('true', $result);
        if(count($keep_array)!= 2 ){
            return array();
            }else{
            $first_tag = explode('</GETRECHARGEDETAILSResult><PstrFinalOutPut>', $keep_array[1]);       

            $get_less =  str_replace("&lt;","<",$first_tag[1]);
            $get_full =  str_replace("&gt;",">",$get_less);

            $final = explode('</PstrFinalOutPut><pstrError /></GETRECHARGEDETAILSResponse>', $get_full);

           $response = simplexml_load_string($final[0]);
          // print_r($response);
            foreach($response->Item as $val){
                $data_insert = array(
                'code'          => "$val->Code",
                'op_name'           => "$val->Desc",
                'type'     => "$val->ItemType"
               
            );
         
        $insert = $this->db->insert('hrm_oprator',$data_insert);
            }
        }
        
    } 
	public function getamt1( ){
	/*
		// init curl object        
		$ch = curl_init();

		// define options
		$optArray = array(
			CURLOPT_URL => 'http://Members.billworld.in/app/index.php?AccessKey=b4295724b195a2b48581cd2da5545e44&username=BW10433&action=mod_CreditsManagement_getAccountBalance',
			CURLOPT_RETURNTRANSFER => true
		);

		// apply those options
		curl_setopt_array($ch, $optArray);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		$result = curl_exec($ch);
		curl_close($ch);
		$xml = @simplexml_load_string($result);
		return (string)$xml->TotalAccountBalance;
		*/
		
	}
	public function doRecharge1(){
	/*
		$mt = $this->input->post('amount');
		$no = $this->input->post('mobile');
		$op = $this->input->post('oprator_name');
		$ch = curl_init();

		// define options
		$optArray = array(
			CURLOPT_URL => "http://Members.billworld.in/app/index.php?AccessKey=b4295724b195a2b48581cd2da5545e44&username=BW10433&action=mod_MobileRecharge_postEnterRechargeDetails&options_amount=$mt&options_mobilenumber=$no&options_operators=$op",
			CURLOPT_RETURNTRANSFER => true
		);

		// apply those options
		curl_setopt_array($ch, $optArray);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		$result = curl_exec($ch);
		curl_close($ch);
		$xml = @simplexml_load_string($result);
		//print_r($xml);die();
		return (string)$xml->errorcode;
		*/
	}
       
    public function getOperator($number){       
        $val = "";
        $code="";
        $state = "";
        $opts = array(
            'http'=>array(
              'method'=>"GET",
              'header'=>"X-Mashape-Key: WAKMswF0P7mshBFHM6ZO98FwSUY4p1ORVSGjsn4W32pUuFu0T1",
              'Accept'=>"application/json"
            )
          );
        $context = stream_context_create($opts);       
        $res = file_get_contents(OPERATOR."?number=$number", false, $context);       
        $responce = json_decode($res, true);
        $operator_type = 1;
        $oper_list = $this->getAllOperator($operator_type);
         $val .="<option value=''>Select</option>";
        foreach($oper_list as $lis){
            if(strtolower($lis->op_name) == strtolower($responce['Operator'])){               
                $val .= "<option value='".$lis->op_name."' op_code='".$lis->code."' selected = 'selected'>".$lis->op_name."</option>";
                $code = "@@".$lis->code;
                $state = "@@".$responce['Telecom circle'];
            }else{
                 $val .= "<option value='".$lis->op_name."' op_code='".$lis->code."'>".$lis->op_name."</option>";
            }
            
        }
      
        return $val.$code.$state;
    }
    
    public function getAllOperator($operator_type){
        $this->db->order_by('op_name');
        $query = $this->db->get_where('hrm_oprator', array('type' => $operator_type));
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }
    }
    
    public function getMobilePlans($operator,$circle){
        $str = '';
        $data = array(0=> 'full', 1=> 'top', 2=> 'special', 3=>'2g', 4=> '3g', 5=>'roaming');
        $get_circle = str_replace(" ", "+", $circle);
        $get_op = str_replace(" ", "+", $operator);
        foreach($data as $key=>$val){
           
                $opts = array(
                    'http'=>array(
                      'method'=>"GET",
                      'header'=>"X-Mashape-Key: HsHlHWN3aPmshfBxfWlytCLXNtjJp1aJx02jsnPNtnHFr80sW0",
                      'Accept'=>"application/json"
                    )
                  );
                $context = stream_context_create($opts);       
                $res = file_get_contents(TARIF."?circleid=$get_circle&limit=50&operatorid=$get_op&recharge_type=$val", false, $context);       
                $responce = json_decode($res, true);
                //return $responce;
                foreach($responce as $res){
                    if(count($res) > 1){
                        if($val == 'full' || $val == 'top'){
                            $str .="<thead> <tr> <th>Amount</th> <th>Talktime</th> <th>Validity</th> <th>Description</th> <th>Get</th> </tr> </thead><tbody>";
                        }else{
                            $str .="<thead> <tr> <th>Amount</th>  <th>Validity</th> <th>Description</th> <th>Get</th> </tr> </thead><tbody>";
                        }
                        
                        foreach($res as $d){
                           
                            $str .= "<tr> <td>".$d['recharge_amount']."</td>";
                            if($val == 'full' || $val == 'top'){
                                if(array_key_exists('recharge_talktime', $d)){
                                $str .= "<td>".$d['recharge_talktime']."</td>";
                                }
                            }
                            $str .= "<td>".$d['recharge_validity']."</td>";
                            $str .= "<td>".$d['recharge_longdesc']."</td>";
                            $str .= "<td><buttion class='btn btn-pill-right btn-success get-pl' get-pl-val ='".$d['recharge_amount']."' type='buttion'>Get</buttion></td> </tr>";
                            }
                            
                         
                    }else{
                       $str .="<div class='text-center'><h4>No Plans available.</h4></div>"; 
                    }
                }
                $str .="</tbody>@@@@";
        }        
        return $str;
    }
    public function insertOff(){
        $sender_n = $this->input->get('number', TRUE);
        $sender_no = substr($sender_n, -10);
        $id = 0;
        $queryq = $this->db->get_where('login', array('login_mobile' => $sender_no));
        if($queryq && $queryq->num_rows()> 0){
            $id = $queryq->row()->login_id;
        }
        $ioff = array(                
                'descp'            =>$this->input->get('message', TRUE).' number '.$this->input->get('number', TRUE),
                'done_by'            =>$id,
                'done'              => date('Y-m-d H:i:s')
            );
            $insert = $this->db->insert('offtime',$ioff);
            return $this->db->insert_id();
            
    }
    public function updateOff($off_id,$respons){
        $ioff = array(                
                'respons'            =>"$respons"
            );            
             $this->db->where("off_id",$off_id);
            $this->db->update("offtime",$ioff);
            //echo $this->db->last_query();die();
    }
    public function bal($req){
        $sender_n = $this->input->get('number', TRUE);
        $sender_no = substr($sender_n, -10);
        $id = 0;
        $queryq = $this->db->get_where('login', array('login_mobile' => $sender_no));
        if($queryq && $queryq->num_rows()> 0){
            $id = $queryq->row()->login_id;
            $query = $this->db->get_where('current_virtual_amount', array('user_id' => $id));
            if($query && $query->num_rows()> 0){
                $amount = $query->row()->amount;                
            }else{
                $amount = "0.00";
            }
            $this->updateOff($req,"Hi your current balance is $amount");
                            
            $ch = curl_init();
            $optArray = array(
            CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$sender_n&from=ESYTOP&message=ESY+TOPUP+Hi+your+current+balance+is+$amount",
                    CURLOPT_RETURNTRANSFER => true
            );
            curl_setopt_array($ch, $optArray);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            $result = curl_exec($ch);
            curl_close($ch);
        }else{
             $this->updateOff($req,"Access denied, Please Use registered mobile number");
                            
                $ch = curl_init();
                $optArray = array(
                CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$sender_n&from=ESYTOP&message=ESY+TOPUP+Access+denied,+Please+Use+registered+number",
                        CURLOPT_RETURNTRANSFER => true
                );
                curl_setopt_array($ch, $optArray);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                $result = curl_exec($ch);
                curl_close($ch);
        }
        
    }
    
     /*** Air tel recharge ***********/
         
        public function doairtel(){
                 $mobile = $this->input->post('mobile');
                 $amt    = $this->input->post('amount');
                 $desc       = $this->input->post('oprator_name');
               //  echo "http://www.mrupees.com/api/api.asp?USERID=1012&PASSWORD=99859&OPERATOR=1&AMOUNT=$amt&SUBSCRIBER=$mobile&TRANNO=A1002&RECTYPE=NORMAL";
		$ch = curl_init();
		
		$optArray = array(
			CURLOPT_URL => "http://www.mobi2pay.in/api/api.asp?USERID=1012&PASSWORD=99859&OPERATOR=2&AMOUNT=$amt&SUBSCRIBER=$mobile&TRANNO=A1002&RECTYPE=NORMAL",
			CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $optArray);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		$result = curl_exec($ch);
		curl_close($ch);
                $get = explode("STATUS:",$result);
                //echo $result; die(); 
                if(Count($get) == 2){
                    if($get['1'] == "SUCCESS"){
                        $myamt = $this->input->post('amount');
                        $myno = $this->input->post('mobile');
                        $query2 = $this->db->get_where('current_virtual_amount', array('user_id' => $this->session->userdata('login_id')));           
                             if($query2 && $query2->num_rows()== 1){                        
                                 $val2 = $query2->row()->amount;
                                 $insfrom   =   array(                      
                                         "amount"     => ($val2 - $this->input->post('amount'))
                                     );
                                 $this->db->where("user_id",$this->session->userdata('login_id'));
                                 $query1 = $this->db->update("current_virtual_amount",$insfrom);

                                  $myupdate = array(
                                    "trans_from"    =>   $this->session->userdata('login_id'),
                                    "trans_to"      =>     0,
                                   "cur_amount"      =>    ($val2 - $this->input->post('amount')),
                                    "trans_amt"     =>     floatval($this->input->post('amount')),
                                    "trans_remark"  =>     "Recharge $mobile",
                                      "type"  =>     "2",
                                      'trans_date' => date('Y-m-d H:i:s')
                                 );
                                $query =   $this->db->insert("trans_detail", $myupdate);
                             } 

                             $md = $this->session->userdata("master_distributor_id");
                            $sd = $this->session->userdata("super_distributor_id");
                            $d = $this->session->userdata("distributor_id");
                            $my = $this->session->userdata("login_id");
                            $optna  =   strtolower($desc);
                            $this->trans_commission($md,$sd,$d,$my,$optna,$amt);
                        return 0;
                    }
                }else{
                    return 2;
                }
            
        }
        public function doairteloff($mobile,$amt,$req,$desc){
                 
                $sender_n = $this->input->get('number', TRUE);
                $sender_no = substr($sender_n, -10);
                    $queryq = $this->db->query("SELECT l.*,p.* FROM login l "
                            . "INNER JOIN profile p ON p.login_id = l.login_id WHERE l.login_mobile = $sender_no" );
                   
                if($queryq && $queryq->num_rows()> 0){
                   $login_id =   $queryq->row()->login_id;
                    $current_amt = $this->db->get_where('current_virtual_amount', array('user_id' => $login_id));

                    if(floatval($current_amt->row()->amount) > floatval($amt)){                
                 
                        $ch = curl_init();

                        $optArray = array(
                                CURLOPT_URL => "http://www.mobi2pay.in/api/api.asp?USERID=1012&PASSWORD=99859&OPERATOR=2&AMOUNT=$amt&SUBSCRIBER=$mobile&TRANNO=A1002&RECTYPE=NORMAL",
                                CURLOPT_RETURNTRANSFER => true
                        );
                        curl_setopt_array($ch, $optArray);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                        $result = curl_exec($ch);
                        curl_close($ch);
                        $get = explode("STATUS:",$result);
                        if(Count($get) == 2){
                            if($get['1'] == "SUCCESS"){
                                
                                $query2 = $this->db->get_where('current_virtual_amount', array('user_id' => $this->session->userdata('login_id')));           
                                     if($query2 && $query2->num_rows()== 1){                        
                                         $val2 = $query2->row()->amount;
                                         $insfrom   =   array(                      
                                                 "amount"     => ($val2 - $this->input->post('amount'))
                                             );
                                         $this->db->where("user_id",$this->session->userdata('login_id'));
                                         $query1 = $this->db->update("current_virtual_amount",$insfrom);

                                          $myupdate = array(
                                            "trans_from"    =>   $this->session->userdata('login_id'),
                                            "trans_to"      =>     0,
                                           "cur_amount"      =>    ($val2 - $this->input->post('amount')),
                                            "trans_amt"     =>     floatval($this->input->post('amount')),
                                            "trans_remark"  =>     "Recharge $mobile",
                                              "type"  =>     "2",
                                              'trans_date' => date('Y-m-d H:i:s')
                                         );
                                        $query =   $this->db->insert("trans_detail", $myupdate);
                                     } 

                                     $md = $this->session->userdata("master_distributor_id");
                                    $sd = $this->session->userdata("super_distributor_id");
                                    $d = $this->session->userdata("distributor_id");
                                    $my = $this->session->userdata("login_id");
                                    $optna  =   strtolower($desc);
                                    $this->trans_commission($md,$sd,$d,$my,$optna,$amt);
                                    
                                    $this->updateOff($req,"ESY TOPUP Recharge successfull Rs. $amt debited from your Esy Topup recharge account Total Amount is Rs. $now Thank you.");

                                    $ch = curl_init();
                                    $optArray = array(
                                    CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$sender_no&from=ESYTOP&message=ESY+TOPUP+Rs.+$amt+debited+from+your+Esy+Topup+recharge+account+for+recharge+Total+Amount+is+Rs.+$now+Thank+you.",
                                            CURLOPT_RETURNTRANSFER => true
                                    );
                                    curl_setopt_array($ch, $optArray);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                                    $result = curl_exec($ch);
                                    curl_close($ch);
                                return 0;
                            }
                        }else{
                            return 2;
                        }
                    }else{
                        $this->updateOff($req,"ESY TOPUP Recharge fail you are not having enough balance.");

                       $ch = curl_init();
                               $optArray = array(
                               CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$sender_no&from=ESYTOP&message=ESY+TOPUP++Recharge+fail+you+are+not+having+enough+balance.",
                               CURLOPT_RETURNTRANSFER => true
                       );
                               curl_setopt_array($ch, $optArray);
                       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                       curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                       $result = curl_exec($ch);
                       curl_close($ch);
                   }
                }else{
                       $this->updateOff($req,"ESYTOPUP Access denied please use registered number.");

                    $ch = curl_init();
                               $optArray = array(
                               CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$sender_no&from=ESYTOP&message=ESY+TOPUP++Access+denied+please+use+registered+number.",
                               CURLOPT_RETURNTRANSFER => true
                       );
                               curl_setopt_array($ch, $optArray);
                       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                       curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                       $result = curl_exec($ch);
                       curl_close($ch);
                  }
            
        }
        /***************************/
    public function doRechargeoff(  $recharge_type,$codeval,$V,$number,$amt,$req){
      
        $sender_n = $this->input->get('number', TRUE);
        $sender_no = substr($sender_n, -10);
            $queryq = $this->db->query("SELECT l.*,p.* FROM login l "
                    . "INNER JOIN profile p ON p.login_id = l.login_id WHERE l.login_mobile = $sender_no" );
           // $queryq = $this->db->get_where('login', array('login_mobile' => $sender_no));
           // echo $this->db->last_query();die();
        if($queryq && $queryq->num_rows()> 0){
           $login_id =   $queryq->row()->login_id;
            $current_amt = $this->db->get_where('current_virtual_amount', array('user_id' => $login_id));
           
            if(floatval($current_amt->row()->amount) > floatval($amt)){               
            
                $a = mt_rand(100000,999999); 
               for ($i = 0; $i<27; $i++) 
                {
                    $a .= mt_rand(0,9);
                }
                $track_id   = 'SWAMI'.$a;
                $item       = $V;
                $desc       = $codeval;
               // $mobile     = $this->input->get('number', TRUE);
                $mobile     = $number;
                $amt        = $amt;
                $circle     = 'ANDHRA PRADESH';

                 $data_insert = array(
                        'track_id'          => $track_id,
                        'done_by'           => $login_id,
                        'recharge_type'     => $recharge_type,
                        'code'              => $item,
                        'op_name'           => $desc,
                        'number'            => $mobile,
                        'amount'            => $amt,
                        'cur_time'          => date('Y-m-d H:i:s')
                    );

                $insert = $this->db->insert('recharge_track',$data_insert);
                if($this->db->affected_rows() == 1){
                    
                    $my_mo_id = $this->db->insert_id();

                        $url = RECHARGEURL;        
                        $curlData = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope
                            xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                            xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                            xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                            <soap:Header>
                                <ns1:clsSecurity soap:mustUnderstand="false"
                            xmlns:ns1="http://tempuri.org/HERMESAPI/HermesMobile">
                                  <ns1:WebProviderLoginId>'.USER.'</ns1:WebProviderLoginId>
                                  <ns1:WebProviderPassword>'.PASSW.'</ns1:WebProviderPassword>
                                  <ns1:IsAgent>false</ns1:IsAgent>
                                </ns1:clsSecurity>
                              </soap:Header>
                    <soap:Body>
                        <MOBILEBOOKINGDETAILS xmlns="http://tempuri.org/HERMESAPI/HermesMobile/">
                            <pobjSecurity>
                                <WebProviderLoginId>'.USER.'</WebProviderLoginId>
                                <WebProviderPassword>'.PASSW.'</WebProviderPassword>
                                <IsAgent>false</IsAgent>   
                            </pobjSecurity>
                            <PstrInput>
                                    &lt;MobileBookingRequest&gt;
                                    &lt;UsertrackId&gt;'.$track_id.'&lt;/UsertrackId&gt;
                                    &lt;Itemid&gt;'.$item.'&lt;/Itemid&gt;
                                    &lt;ItemDesc&gt;'.$desc.'&lt;/ItemDesc&gt;
                                    &lt;MobileNo&gt;'.$mobile.'&lt;/MobileNo&gt;
                                    &lt;Amount&gt;'.$amt.'&lt;/Amount&gt;
                                    &lt;/MobileBookingRequest&gt;
                            </PstrInput>
                            <PstrFinalOutPut /><pstrError/>
                        </MOBILEBOOKINGDETAILS>
                    </soap:Body></soap:Envelope>';

                        $curl = curl_init();

                        curl_setopt ($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl,CURLOPT_TIMEOUT,120);

                        curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                            'SOAPAction:"'.RECHARGEACTION.'MOBILEBOOKINGDETAILS"',
                            'Content-Type: text/xml; charset=utf-8;',
                        ));

                         curl_setopt ($curl, CURLOPT_POST, 1);

                        curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

                         $result = curl_exec($curl); 

                        curl_close ($curl);

                        $keep_array = explode('true', $result);
                        if(count($keep_array)!= 2 ){
                            return 1;
                        }else{
                       // echo $keep_array[1]; die();
                        $first_tag = explode('</MOBILEBOOKINGDETAILSResult><PstrFinalOutPut>', $keep_array[1]);       

                        $get_less =  str_replace("&lt;","<",$first_tag[1]);
                        $get_full =  str_replace("&gt;",">",$get_less);

                        $final = explode('</PstrFinalOutPut><pstrError /></MOBILEBOOKINGDETAILSResponse>', $get_full);

                       $response = simplexml_load_string($final[0]);
                      print_r($response);
                       if($response->Status == 1){
                        $val2 = floatval($current_amt->row()->amount);
                    $now = (floatval($current_amt->row()->amount) - floatval($amt));
                    $insfrom   =   array(                      
                            "amount"     => ($val2 - floatval($amt))
                        );
                    $this->db->where("user_id",$login_id);
                    $query1 = $this->db->update("current_virtual_amount",$insfrom);

                    $myupdate = array(
                        "trans_from"    =>   $login_id,
                        "trans_to"      =>     0,
                        "cur_amount"      =>    ($val2 - $this->input->post('amount')),
                        "trans_amt"     =>     floatval($amt),
                        "trans_remark"  =>     "Off-Line Recharge $mobile",
                        "type"  =>     "2",
                        'trans_date' => date('Y-m-d H:i:s')
                     );
                    $query =   $this->db->insert("trans_detail", $myupdate);

                    $this->updateOff($req,"ESY TOPUP Recharge successfull Rs. $amt debited from your Esy Topup recharge account Total Amount is Rs. $now Thank you.");

                    $ch = curl_init();
                    $optArray = array(
                    CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$sender_no&from=ESYTOP&message=ESY+TOPUP+Rs.+$amt+debited+from+your+Esy+Topup+recharge+account+for+recharge+Total+Amount+is+Rs.+$now+Thank+you.",
                            CURLOPT_RETURNTRANSFER => true
                    );
                    curl_setopt_array($ch, $optArray);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                    $result = curl_exec($ch);
                    curl_close($ch);
                     $md = $queryq->row()->master_distributor_id;
                    $sd = $queryq->row()->super_distributor_id;
                    $d = $queryq->row()->distributor_id;
                    $my = $queryq->row()->login_id;
                    $optna  =   strtolower($desc);
                    //echo $md ."-".$sd."-".$d."-".$my ;
                    $this->trans_commission($md,$sd,$d,$my,$optna,$amt);
                    
                        $data = array(                        
                                'hrm_track'              => "$response->TrackId",
                                'ref_num'                => "$response->RefNo",
                                'trans_no'               => "$response->TransNo",
                                'remarks'                => "$response->Remarks",
                                'desc'                   => "$response->ItemDescription",
                                'hrm_amount'             => "$response->Amount",
                                'responce_time'          => "$response->DateTime",
                                'status'                 =>  $response->Status,

                            );
                        $this->db->where('recharge_id',$my_mo_id);
                        $update = $this->db->update('recharge_track',$data);

                         if($this->db->affected_rows() == 1){
                             return 0;
                         }  else {
                             return 2;
                         }
                       }else{
                           return 1;
                       }
                    }

                }else{
                    return 3;
                }
            }else{
                 $this->updateOff($req,"ESY TOPUP Recharge fail you are not having enough balance.");
                            
                $ch = curl_init();
                        $optArray = array(
			CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$sender_no&from=ESYTOP&message=ESY+TOPUP++Recharge+fail+you+are+not+having+enough+balance.",
			CURLOPT_RETURNTRANSFER => true
		);
                        curl_setopt_array($ch, $optArray);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		$result = curl_exec($ch);
		curl_close($ch);
            }
         }else{
                $this->updateOff($req,"ESYTOPUP Access denied please use registered number.");
                  
             $ch = curl_init();
                        $optArray = array(
			CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$sender_no&from=ESYTOP&message=ESY+TOPUP++Access+denied+please+use+registered+number.",
			CURLOPT_RETURNTRANSFER => true
		);
                        curl_setopt_array($ch, $optArray);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		$result = curl_exec($ch);
		curl_close($ch);
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
       
    public function doRecharge( $recharge_type){
       $a = mt_rand(100000,999999); 
       for ($i = 0; $i<27; $i++) 
        {
            $a .= mt_rand(0,9);
        }
        $track_id   = 'SWAMI'.$a;
        $item       = $this->input->post('code');
        $desc       = $this->input->post('oprator_name');
        $mobile     = $this->input->post('mobile');
        $amt        = $this->input->post('amount');
        $circle     = $this->input->post('circle');
        
        
         $data_insert = array(
                'track_id'          => $track_id,
                'done_by'           => $this->session->userdata('login_id'),
                'recharge_type'     => $recharge_type,
                'code'              => $item,
                'op_name'           => $desc,
                'number'            => $mobile,
                'amount'            => $amt,
                'cur_time'          => date('Y-m-d H:i:s')
            );
         
        $insert = $this->db->insert('recharge_track',$data_insert);
        if($this->db->affected_rows() == 1){
            $my_mo_id = $this->db->insert_id();
            
            $from_m =$this->getprofile($this->session->userdata('login_id'));
            $from_mo = $from_m->mobile;
       
                $url = RECHARGEURL;        
                $curlData = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope
                    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <soap:Header>
                        <ns1:clsSecurity soap:mustUnderstand="false"
                    xmlns:ns1="http://tempuri.org/HERMESAPI/HermesMobile">
                          <ns1:WebProviderLoginId>'.USER.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.PASSW.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                <MOBILEBOOKINGDETAILS xmlns="http://tempuri.org/HERMESAPI/HermesMobile/">
                    <pobjSecurity>
                        <WebProviderLoginId>'.USER.'</WebProviderLoginId>
                        <WebProviderPassword>'.PASSW.'</WebProviderPassword>
                        <IsAgent>false</IsAgent>   
                    </pobjSecurity>
                    <PstrInput>
                            &lt;MobileBookingRequest&gt;
                            &lt;UsertrackId&gt;'.$track_id.'&lt;/UsertrackId&gt;
                            &lt;Itemid&gt;'.$item.'&lt;/Itemid&gt;
                            &lt;ItemDesc&gt;'.$desc.'&lt;/ItemDesc&gt;
                            &lt;MobileNo&gt;'.$mobile.'&lt;/MobileNo&gt;
                            &lt;Amount&gt;'.$amt.'&lt;/Amount&gt;
                            &lt;/MobileBookingRequest&gt;
                    </PstrInput>
                    <PstrFinalOutPut /><pstrError/>
                </MOBILEBOOKINGDETAILS>
            </soap:Body></soap:Envelope>';

                $curl = curl_init();

                curl_setopt ($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl,CURLOPT_TIMEOUT,120);

                curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                    'SOAPAction:"'.RECHARGEACTION.'MOBILEBOOKINGDETAILS"',
                    'Content-Type: text/xml; charset=utf-8;',
                ));

                 curl_setopt ($curl, CURLOPT_POST, 1);

                curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

                 $result = curl_exec($curl); 

                curl_close ($curl);

                $keep_array = explode('true', $result);
                if(count($keep_array)!= 2 ){
                    return 1;
                }else{
               // echo $keep_array[1]; die();
                $first_tag = explode('</MOBILEBOOKINGDETAILSResult><PstrFinalOutPut>', $keep_array[1]);       

                $get_less =  str_replace("&lt;","<",$first_tag[1]);
                $get_full =  str_replace("&gt;",">",$get_less);

                $final = explode('</PstrFinalOutPut><pstrError /></MOBILEBOOKINGDETAILSResponse>', $get_full);

               $response = simplexml_load_string($final[0]);
              // print_r($response);die();
               if($response->Status == 1){
                   $myamt = $this->input->post('amount');
            $myno = $this->input->post('mobile');
            $query2 = $this->db->get_where('current_virtual_amount', array('user_id' => $this->session->userdata('login_id')));           
                 if($query2 && $query2->num_rows()== 1){                        
                     $val2 = $query2->row()->amount;
                     $insfrom   =   array(                      
                             "amount"     => ($val2 - $this->input->post('amount'))
                         );
                     $this->db->where("user_id",$this->session->userdata('login_id'));
                     $query1 = $this->db->update("current_virtual_amount",$insfrom);

                      $myupdate = array(
                        "trans_from"    =>   $this->session->userdata('login_id'),
                        "trans_to"      =>     0,
                       "cur_amount"      =>    ($val2 - $this->input->post('amount')),
                        "trans_amt"     =>     floatval($this->input->post('amount')),
                        "trans_remark"  =>     "Recharge $mobile",
                          "type"  =>     "2",
                          'trans_date' => date('Y-m-d H:i:s')
                     );
                    $query =   $this->db->insert("trans_detail", $myupdate);
                 } 
                    
                $md = $this->session->userdata("master_distributor_id");
                $sd = $this->session->userdata("super_distributor_id");
                $d = $this->session->userdata("distributor_id");
                $my = $this->session->userdata("login_id");
                $optna  =   strtolower($desc);
                $this->trans_commission($md,$sd,$d,$my,$optna,$amt);
                
                $data = array(                        
                        'hrm_track'              => "$response->TrackId",
                        'ref_num'                => "$response->RefNo",
                        'trans_no'               => "$response->TransNo",
                        'remarks'                => "$response->Remarks",
                        'desc'                   => "$response->ItemDescription",
                        'hrm_amount'             => "$response->Amount",
                        'responce_time'          => "$response->DateTime",
                        'status'                 =>  $response->Status,
                        
                    );
                $this->db->where('recharge_id',$my_mo_id);
                $update = $this->db->update('recharge_track',$data);             
               
                 if($this->db->affected_rows() == 1){
                     return 0;
                 }  else {
                     return 2;
                 }
               }else{
                   return 1;
               }
            }
                
        }else{
            return 3;
        }
    }
        public function trans_commission($md,$sd,$d,$my,$desc,$amt){
                $cammmt     =   0;
                $cammst     =   0;
                $cammdt     =   0;
                $cammat     =   0;
                $mobjid  =   $this->getmoduleobjectid($desc);
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
                //echo $cammat; die();
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
                
                $cammmt1     =   $cammmt+$detm;
                $cammst1     =   $cammst+$dets;
                $cammdt1     =   $cammdt+$detd;
                $cammat1     =   $cammat+$deta;
               // echo $cammat1; die();
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
                $qu = $this->db->get_where("commission",array("login_id" => $val));
                $pg = $qu->row_array();
                return $pg['package_id'];
        }
        public function getmoduleobjectid($desc){
                $qu = $this->db->get_where("modules_object",array("modules_obj_name" => $desc));
                $od = $qu->row_array();
                return $od['modules_obj_id'];
        }
        public function getcamt($md){
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
                $data   =   array(
                        "from"          =>  $d,
                        "to"            =>  $my,
                        "com_amount"    =>  $amt,
                        "cur_amount"    =>  $camount?$camount:0,
                        "remarks"       =>  "commission amount",
                        "date_time"     => date('Y-m-d H:i:s')
                );
                
                $this->db->insert("comi_virtual_det",$data);
                
                $inset   =   array(
                        "trans_from"        =>  $d,
                        "trans_to"          =>  $my,
                        "trans_amt"         =>  $dt,
                        "cur_amount"        =>  $amt,
                        "trans_remark"      =>  "commission amount",
                        "trans_status"      =>  2,
                        "type"  =>     "1",
                    'trans_date' => date('Y-m-d H:i:s')
                );
                $this->db->insert("trans_detail",$inset);
        }
	public function getamt(){
	
		 $url = RECHARGEURL;        
                $curlData = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope
                    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <soap:Header>
                        <ns1:clsSecurity soap:mustUnderstand="false"
                    xmlns:ns1="http://tempuri.org/HERMESAPI/HermesMobile">
                          <ns1:WebProviderLoginId>'.USER.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.PASSW.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                <CheckQuota xmlns="http://tempuri.org/HERMESAPI/HermesMobile/">
                    <pobjSecurity>
                        <WebProviderLoginId>'.USER.'</WebProviderLoginId>
                        <WebProviderPassword>'.PASSW.'</WebProviderPassword>
                        <IsAgent>false</IsAgent>   
                    </pobjSecurity>
                    
                    <PstrFinalOutPut /><pstrError/>
                </CheckQuota>
            </soap:Body></soap:Envelope>';

                $curl = curl_init();

                curl_setopt ($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl,CURLOPT_TIMEOUT,120);

                curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                    'SOAPAction:"'.RECHARGEACTION.'CheckQuota"',
                    'Content-Type: text/xml; charset=utf-8;',
                ));

                 curl_setopt ($curl, CURLOPT_POST, 1);

                curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

                 $result = curl_exec($curl); 

                curl_close ($curl);
                
                $keep_array = explode('true', $result);
                if(count($keep_array)!= 2 ){
                    return 0;
                }else{
               // echo $keep_array[1]; die();
                $first_tag = explode('</CheckQuotaResult><PstrFinalOutPut>', $keep_array[1]);       

                $get_less =  str_replace("&lt;","<",$first_tag[1]);
                $get_full =  str_replace("&gt;",">",$get_less);

                $final = explode('</PstrFinalOutPut><pstrError /></CheckQuotaResponse>', $get_full);

               $response = simplexml_load_string($final[0]);
			   return $response;
			   //print_r($response);die();
			   }
			   
	}
    
    public function getrechargeDetails(){
        $this->db->select('r.*,p.*,u.user_type as u_type');
        $this->db->from('recharge_track r'); 
        $this->db->join('profile as p' , 'p.login_id = r.done_by', 'Inner');
        $this->db->join('login as l' , 'l.login_id = p.login_id', 'Inner');
        $this->db->join('user_type as u' , 'l.user_type = u.user_type_id', 'Inner');
        $this->db->where('r.hrm_track <>', ''); 
        $this->db->order_by('recharge_id', 'desc');
        $this->db->limit(10);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if($this->db->affected_rows() > 0){
            return $query->result();
        }
        else{
            return array();
        } 
    }
    
    public function getPaymentDetail(){
        $url = RECHARGEURL;
        
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
		      <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
			<soap:Header>
			<ns1:clsSecurity soap:mustUnderstand="false" xmlns:ns1="http://tempuri.org/HERMESAPI/HermesMobile"> 
                          <ns1:WebProviderLoginId>'.USER.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.PASSW.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
                      <soap:Body>
                        <GETBILLPAYMENTDETAILS xmlns="http://tempuri.org/HERMESAPI/HermesMobile/">
                          <pobjSecurity>
                            <WebProviderLoginId>'.USER.'</WebProviderLoginId>
                            <WebProviderPassword>'.PASSW.'</WebProviderPassword>
                            <IsAgent>false</IsAgent>
                          </pobjSecurity>
                          <PstrFinalOutPut />
                          <pstrError />
                        </GETBILLPAYMENTDETAILS>
                      </soap:Body>
                    </soap:Envelope>';
        
        $curl = curl_init();

        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_TIMEOUT,120);
        
        curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
            'SOAPAction:"'.POSTPAIDACTION.'GETBILLPAYMENTDETAILS"',
            'Content-Type: text/xml; charset=utf-8;',
        ));

         curl_setopt ($curl, CURLOPT_POST, 1);
        
        curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);
       
        $result = curl_exec($curl); 
        curl_close ($curl);
        
        $keep_array = explode('true', $result);
        if(count($keep_array)!= 2 ){
            return array();
            }else{
            $first_tag = explode('</GETBILLPAYMENTDETAILSResult><PstrFinalOutPut>', $keep_array[1]);       

            $get_less =  str_replace("&lt;","<",$first_tag[1]);
            $get_full =  str_replace("&gt;",">",$get_less);

            $final = explode('</PstrFinalOutPut><pstrError /></GETBILLPAYMENTDETAILSResponse>', $get_full);

           $response = simplexml_load_string($final[0]);
           
           return $response;
        }
    }
    
    public function doPostRecharge($recharge_type){
        $a = mt_rand(100000,999999); 
       for ($i = 0; $i<27; $i++) 
        {
            $a .= mt_rand(0,9);
        }
        $code = '';
         if($this->input->post('oprator_name') == 'BSNL POSTPAID OR LANDLINE'){
             $code = $this->input->post('circle')."$".$this->input->post('acc')."$".$this->input->post('std');
        }
        if($this->input->post('oprator_name') == 'RELIANCE POSTPAID'){
             $code = "$$".$this->input->post('std');
        }
        $track_id   = 'SWAMI'.$a;
        $item       = $this->input->post('code');
        $desc       = $this->input->post('oprator_name');
        $mobile     = $this->input->post('mobile');
        $amt        = $this->input->post('amount');
        $circle     = $this->input->post('circle');
        
         $data_insert = array(
                'track_id'          => $track_id,
                'done_by'           => $this->session->userdata('login_id'),
                'recharge_type'     => $recharge_type,
                'code'              => $item,
                'op_name'           => $desc,
                'number'            => $mobile,
                'amount'            => $amt,
                'cur_time'          => date('Y-m-d H:i:s')
            );
         
        $insert = $this->db->insert('recharge_track',$data_insert);
        if($this->db->affected_rows() == 1){
            $my_mo_id = $this->db->insert_id();
       
                $url = RECHARGEURL;        
                $curlData = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope
                    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <soap:Header>
                        <ns1:clsSecurity soap:mustUnderstand="false"
                    xmlns:ns1="http://tempuri.org/HERMESAPI/HermesMobile">
                          <ns1:WebProviderLoginId>'.USER.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.PASSW.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                <BILLPAYMENTBOOKINGDETAILS xmlns="http://tempuri.org/HERMESAPI/HermesMobile/">
                    <pobjSecurity>
                        <WebProviderLoginId>'.USER.'</WebProviderLoginId>
                        <WebProviderPassword>'.PASSW.'</WebProviderPassword>
                        <IsAgent>false</IsAgent>   
                    </pobjSecurity>
                    <PstrInput>
                            &lt;BillBookingRequest&gt;
                            &lt;UsertrackId&gt;'.$track_id.'&lt;/UsertrackId&gt;
                            &lt;Itemid&gt;'.$item.'&lt;/Itemid&gt;
                            &lt;ItemDesc&gt;'.$desc.'&lt;/ItemDesc&gt;
                            &lt;MobileNo&gt;'.$mobile.'&lt;/MobileNo&gt;
                            &lt;Amount&gt;'.$amt.'&lt;/Amount&gt;
                            &lt;OtherDetails&gt;BH$8000560448$0613$&lt;/OtherDetails&gt;
                            &lt;/BillBookingRequest&gt;
                    </PstrInput>
                    <PstrFinalOutPut /><pstrError/>
                </BILLPAYMENTBOOKINGDETAILS>
            </soap:Body></soap:Envelope>';

                $curl = curl_init();

                curl_setopt ($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl,CURLOPT_TIMEOUT,120);

                curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                    'SOAPAction:"'.POSTPAIDACTION.'BILLPAYMENTBOOKINGDETAILS"',
                    'Content-Type: text/xml; charset=utf-8;',
                ));

                 curl_setopt ($curl, CURLOPT_POST, 1);

                curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

                 $result = curl_exec($curl); 

                curl_close ($curl);
               
                $keep_array = explode('true', $result);
                if(count($keep_array)!= 2 ){
                    return 1;
                }else{
               // echo $keep_array[1]; die();
                $first_tag = explode('</BILLPAYMENTBOOKINGDETAILSResult><PstrFinalOutPut>', $keep_array[1]);       

                $get_less =  str_replace("&lt;","<",$first_tag[1]);
                $get_full =  str_replace("&gt;",">",$get_less);

                $final = explode('</PstrFinalOutPut><pstrError /></BILLPAYMENTBOOKINGDETAILSResponse>', $get_full);

               $response = simplexml_load_string($final[0]);
                 if($response->Status == 1){
                    $from_m =$this->getprofile($this->session->userdata('login_id'));

                     $from_mo = $from_m->mobile;
                     $myamt = $this->input->post('amount');
                     $myno = $this->input->post('mobile');
                     $query2 = $this->db->get_where('current_virtual_amount', array('user_id' => $this->session->userdata('login_id')));           
                          if($query2 && $query2->num_rows()== 1){                        
                              $val2 = $query2->row()->amount;
                              $insfrom   =   array(                      
                                      "amount"     => ($val2 - $this->input->post('amount'))
                                  );
                              $this->db->where("user_id",$this->session->userdata('login_id'));
                              $query1 = $this->db->update("current_virtual_amount",$insfrom);
                              
                              $myupdate = array(
                                "trans_from"    =>   $this->session->userdata('login_id'),
                                "trans_to"      =>     0,
                                "cur_amount"      =>    ($val2 - $this->input->post('amount')),
                                "trans_amt"     =>     floatval($this->input->post('amount')),
                                "trans_remark"  =>     "Post-paid Recharge $mobile",
                                  "type"  =>     "2",
                                  'trans_date' => date('Y-m-d H:i:s')
                             );
                            $query =   $this->db->insert("trans_detail", $myupdate);
                          } 
                          
                    $data = array(                        
                            'hrm_track'              => "$response->TrackId",
                            'ref_num'                => "$response->RefNo",
                            'trans_no'               => "$response->TransNo",
                            'remarks'                => "$response->Remarks",
                            'desc'                   => "$response->ItemDescription",
                            'hrm_amount'             => "$response->Amount",
                            'responce_time'          => "$response->DateTime",
                            'status'                 =>  $response->Status,

                        );
                    $this->db->where('recharge_id',$my_mo_id);
                    $update = $this->db->update('recharge_track',$data);    
                    
                        $md = $this->session->userdata("master_distributor_id");
                        $sd = $this->session->userdata("super_distributor_id");
                        $d = $this->session->userdata("distributor_id");
                        $my = $this->session->userdata("login_id");
                        $optna  =   strtolower($desc);
                        $this->trans_commission($md,$sd,$d,$my,$optna,$amt);

                     if($this->db->affected_rows() == 1){
                         return 0;
                     }  else {
                         return 2;
                     }
                 }else{
                     return 2;
                 }
            }
                
        }else{
            return 3;
        }
    }
    public function circle(){
        $query = $this->db->get('circle');
        if($query){
            return $query->result();
        }
    }
}