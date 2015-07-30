<?php
class Recharge_model extends CI_Model
{ 
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
                                $str .= "<td>".$d['recharge_talktime']."</td>";
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
                'amount'            => $amt
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
                          <ns1:WebProviderLoginId>Swamicom</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>Swamicom123</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                <MOBILEBOOKINGDETAILS xmlns="http://tempuri.org/HERMESAPI/HermesMobile/">
                    <pobjSecurity>
                        <WebProviderLoginId>Swamicom</WebProviderLoginId>
                        <WebProviderPassword>Swamicom123</WebProviderPassword>
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
                    return 0;
                }else{
               // echo $keep_array[1]; die();
                $first_tag = explode('</MOBILEBOOKINGDETAILSResult><PstrFinalOutPut>', $keep_array[1]);       

                $get_less =  str_replace("&lt;","<",$first_tag[1]);
                $get_full =  str_replace("&gt;",">",$get_less);

                $final = explode('</PstrFinalOutPut><pstrError /></MOBILEBOOKINGDETAILSResponse>', $get_full);

               $response = simplexml_load_string($final[0]);
               //print_r($response);
               
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
                     return 1;
                 }  else {
                     return 2;
                 }
            }
                
        }else{
            return 3;
        }
    }
    
    public function getrechargeDetails(){
        $this->db->select('r.*,p.first_name,p.last_name');
        $this->db->from('recharge_track r'); 
        $this->db->join('profile as p' , 'p.login_id = r.done_by', 'Inner');
        $this->db->where('done_by',$this->session->userdata('login_id'));        
        $query = $this->db->get();
        if($this->db->affected_rows() > 0){
            return $query->result();
        }
        else{
            return array();
        } 
    }
}