<?php
class Dmr_model extends CI_Model
{
    public function knowIp(){
        $url = "http://115.248.39.80/knowyourip/yourip.asmx";
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <KnowYourIp xmlns="http://tempuri.org/ping.asmx" />
  </soap:Body>
</soap:Envelope>';

//echo $curlData;
            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:http://tempuri.org/ping.asmx/KnowYourIp',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);
            print_r($result);die();

    }
   public function doRegister($iloc, $aloc){
  
         $a = mt_rand(100000,999999); 
        for ($i = 0; $i<22; $i++) 
         {
             $a .= mt_rand(0,9);
         }
         $track_id   = 'SWAMIDMR'.$a;
         
         $data_insert = array(                
                'login_id'          => $this->session->userdata('login_id'),
                'name'         => $this->input->post('first_name').' '.$this->input->post('middle_name').' '.$this->input->post('last_name'),
                'mobile'            => $this->input->post('mobile'),
                'transection_id'    => $track_id,
                'email'             => $this->input->post('email'),
                'kyc'             => $this->input->post('kyc')
            );
         
        $insert = $this->db->insert('dmr_registration_track',$data_insert);
        if($this->db->affected_rows() == 1){
            $my_DMR_id = $this->db->insert_id();
            
            $url = DMRURL; 
                $curlData = '<?xml version="1.0" encoding="utf-8"?>
                       <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                       <soap:Body>
                           <REGISTRATION xmlns="http://tempuri.org/">
                             <RequestData>
                                   &lt;REGISTRATIONREQUEST&gt;
                                   &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                                   &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                                   &lt;TRANSACTIONID&gt;'.$track_id.'&lt;/TRANSACTIONID&gt;
                                   &lt;KYCFLAG&gt;'.$this->input->post('kyc').'&lt;/KYCFLAG&gt;
                                   &lt;USERNAME&gt;'.$this->input->post('first_name').'&lt;/USERNAME&gt;
                                   &lt;USERMIDDLENAME&gt;'.$this->input->post('middle_name').'&lt;/USERMIDDLENAME&gt;
                                   &lt;USERLASTNAME&gt;'.$this->input->post('last_name').'&lt;/USERLASTNAME&gt;
                                   &lt;USERMOTHERSMAIDENNAME&gt;'.$this->input->post('m_name').'&lt;/USERMOTHERSMAIDENNAME&gt;
                                   &lt;USERDATEOFBIRTH&gt;'.$this->input->post('dob').'&lt;/USERDATEOFBIRTH&gt;
                                   &lt;USEREMAILID&gt;'.$this->input->post('email').'&lt;/USEREMAILID&gt;
                                    &lt;USERMOBILENO&gt;'.$this->input->post('mobile').'&lt;/USERMOBILENO&gt;
                                    &lt;USERSTATE&gt;'.$this->input->post('state').'&lt;/USERSTATE&gt;
                                    &lt;USERCITY&gt;'.$this->input->post('city').'&lt;/USERCITY&gt;
                                    &lt;USERADDRESS&gt;'.$this->input->post('add').'&lt;/USERADDRESS&gt;
                                    &lt;PINCODE&gt;'.$this->input->post('zip').'&lt;/PINCODE&gt;
                                    &lt;USERIDPROOFTYPE&gt;'.$this->input->post('id_proof_type').'&lt;/USERIDPROOFTYPE&gt;
                                    &lt;USERIDPROOF&gt;'.$this->input->post('id_proof').'&lt;/USERIDPROOF&gt;
                                    &lt;IDPROOFURL&gt;'.$iloc.'&lt;/IDPROOFURL&gt;
                                    &lt;USERADDRESSPROOFTYPE&gt;'.$this->input->post('address_proof_type').'&lt;/USERADDRESSPROOFTYPE&gt;
                                    &lt;USERADDRESSPROOF&gt;'.$this->input->post('address_proof').'&lt;/USERADDRESSPROOF&gt;
                                    &lt;ADDRESSPROOFURL&gt;'.$aloc.'&lt;/ADDRESSPROOFURL&gt;
                                    &lt;PARAM1&gt;&lt;/PARAM1&gt;
                                    &lt;PARAM2&gt;&lt;/PARAM2&gt;
                                    &lt;PARAM3&gt;&lt;/PARAM3&gt;
                                    &lt;PARAM4&gt;&lt;/PARAM4&gt;
                                    &lt;PARAM5&gt;&lt;/PARAM5&gt;
                                    &lt;/REGISTRATIONREQUEST&gt;
                              </RequestData>
                            </REGISTRATION>
                          </soap:Body>
                        </soap:Envelope>';


                   $curl = curl_init();

                   curl_setopt ($curl, CURLOPT_URL, $url);
                   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                   curl_setopt($curl,CURLOPT_TIMEOUT,120);

                   curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                       'SOAPAction:'.DMRACTIUON.'REGISTRATION',
                       'Content-Type: text/xml; charset=utf-8;',
                   ));

                    curl_setopt ($curl, CURLOPT_POST, 1);

                   curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

                   $result = curl_exec($curl);                 
                   curl_close ($curl);
                   //echo $result; die();
                $first_tag = explode('<REGISTRATIONResult>', $result);       
                //print_r($first_tag);die();
                if(count($first_tag)!= 2 ){
               // print_r($first_tag);die();
                    return 0;
                }else{
                    $get_less =  str_replace("&lt;","<",$first_tag[1]);
                    $get_full =  str_replace("&gt;",">",$get_less);

                    $final = explode('</REGISTRATIONResult></REGISTRATIONResponse></soap:Body></soap:Envelope>', $get_full);

                    $response = simplexml_load_string($final[0]);
                    if($response->STATUSCODE == 20){//transection_id
                       // redirect('dmr/otp/'.$my_DMR_id);
                        $data_status = array(
                                 'transection_id'  => "$response->STATUS"
                             );
                            $this->db->where('d_id',$my_DMR_id);
                           $update = $this->db->update('dmr_registration_track',$data_status);   
                           
                        return $my_DMR_id;
                        
                    }else if($response->STATUSCODE == 0){
                        $data_status = array(
                                 'status_code'       => "$response->STATUSCODE",
                                 'status'           => "$response->STATUS",
                                 'card_number'      => "$response->CARDNO",
                                 'output'           => "$response->OTPSTATUS"
                             );

                            $this->db->where('d_id',$my_DMR_id);
                           $update = $this->db->update('dmr_registration_track',$data_status);   
                         if($this->db->affected_rows() == 1){
                              return $my_DMR_id;
                         }else{
                             return 0;
                         }

                    }else{
                        return 0;
                    }
                }
               
        }else{
            return 0;
        }   
               
    } 
    public function getDMRDetails($transection_id){
        $query = $this->db->get_where('dmr_registration_track', array('d_id' => $transection_id));
        if($query && $query->num_rows()== 1){
              return $query->row();
           }else{
               return array();
           }
    }
     public function doVerify($transection_id){
        $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <SENDERREGISTER  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;SENDERREGISTERREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;TRANSACTIONID&gt;'.$this->input->post('trans').'&lt;/TRANSACTIONID&gt;
                            &lt;OTP&gt;'.$this->input->post('otp').'&lt;/OTP&gt;
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                            &lt;PARAM1&gt;&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;
                            &lt;/SENDERREGISTERREQUEST&gt;
                       </RequestData>
                     </SENDERREGISTER>
                   </soap:Body>
                 </soap:Envelope>';


            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'SENDERREGISTER',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<SENDERREGISTERResult>', $result);       

         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</SENDERREGISTERResult></SENDERREGISTERResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);


             if($response->STATUS == 'Successfully Registered'){
                 $query2 = $this->db->get_where('current_virtual_amount', array('user_id' => $this->session->userdata('login_id')));           
                 if($query2 && $query2->num_rows()== 1){                        
                     $val2 = $query2->row()->amount;
                     $insfrom   =   array(                      
                             "amount"     => ($val2 - 15.00)
                         );
                     $this->db->where("user_id",$this->session->userdata('login_id'));
                     $query1 = $this->db->update("current_virtual_amount",$insfrom);

                      $myupdate = array(
                        "trans_from"    =>   $this->session->userdata('login_id'),
                        "trans_to"      =>     0,
                       "cur_amount"      =>    ($val2 - 15),
                        "trans_amt"     =>     15.00,
                        "trans_remark"  =>     "DMR sender registration charge",
                           "type"  =>     "2",
                          'trans_date' => date('Y-m-d H:i:s')
                     );
                    $query =   $this->db->insert("trans_detail", $myupdate);
                 } 
                 
                 $up = array(
                     'mmid' => $response->MMID,
                     'serial_no' => $response->SERIALNO
                     );
                 $this->db->where('d_id',$transection_id);
                 $this->db->update('dmr_registration_track',$up);
                 //echo $this->db->last_query();die();
                 if($this->db->affected_rows() == 1){
                      return 1;
                 }       
             }else if($response->STATUS == 'Invalid OTP'){
                 return 2;
             }else{
                 return 0;
             }
         }
    }
    public function resendOTP(){
        $t_id = $this->uri->segment(3);
        
         $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <SENDERRESENDOTP  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;SENDERRESENDOTPREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;TRANSACTIONID&gt;'.$t_id.'&lt;/TRANSACTIONID&gt;
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                            &lt;PARAM1&gt;&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;
                            &lt;/SENDERRESENDOTPREQUEST&gt;
                       </RequestData>
                     </SENDERRESENDOTP>
                   </soap:Body>
                 </soap:Envelope>';


            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'SENDERRESENDOTP',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);
           
           
         $first_tag = explode('<SENDERRESENDOTPResult>', $result);      
       //  print_r($first_tag);die();
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</SENDERRESENDOTPResult></SENDERRESENDOTPResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);

             if($response->STATUS == 'Success'){
                 return 1;
             }else{
                 return 0;
             }
         }        
    }
    
    public function sender_details(){
        $mob = $this->session->userdata('mobile');
        $this->db->select('d.*,p.first_name,p.last_name');
        $this->db->from('dmr_registration_track d'); 
        $this->db->join('profile as p' , 'p.login_id = d.login_id', 'Inner');
        $this->db->where('d.mobile',$mob);        
        $this->db->where('d.status','Success');        
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }
        else{
            return array();
        } 
    }
    public function sender_details1($card){
        
        $this->db->select('d.*');
        $this->db->from('dmr_registration_track d');
        $this->db->where('d.card_number',$card);        
        $this->db->where('d.status','Success');        
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }
        else{
            return array();
        } 
    }
    
    public function dmrLogin(){
        if($this->uri->segment(3) != ''){
        $getmo = $this->sender_details1($this->uri->segment(3));
        }else{
            $getmo = $this->sender_details();
        }
       
        if(count($getmo)>0){
        $mobile = $getmo->mobile;
        //$pin = $getmo->pin;
        
        $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <LOGIN_V2  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;LOGIN_V1REQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;USERMOBILENO&gt;'.$mobile.'&lt;/USERMOBILENO&gt;                            
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                            &lt;PARAM1&gt;&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;
                            &lt;/LOGIN_V1REQUEST&gt;
                       </RequestData>
                     </LOGIN_V2>
                   </soap:Body>
                 </soap:Envelope>';


            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'LOGIN_V2',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);
           
           
         $first_tag = explode('<LOGIN_V2Result>', $result);      
        // print_r($first_tag);die();
         if(count($first_tag) == 1 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);
            
             $final = explode('</LOGIN_V2Result></LOGIN_V2Response></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);
             
             if($response->STATUS == 'Success'){
                 return $response;
             }else{
                 return 2;
             }
         }
        
        }else{
            return 4;
        }
        
    }
    public function dmrLogin1($mo,$pin){
       
        //$pin = $getmo->pin;
       
        
        $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <LOGIN_V2  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;LOGIN_V2REQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;USERMOBILENO&gt;'.$mo.'&lt;/USERMOBILENO&gt;                            
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                            &lt;PARAM1&gt;'.$pin.'&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;
                            &lt;/LOGIN_V2REQUEST&gt;
                       </RequestData>
                     </LOGIN_V2>
                   </soap:Body>
                 </soap:Envelope>';


            $curl = curl_init();
 
            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'LOGIN_V2',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);
           
          // echo $result;die();
         $first_tag = explode('<LOGIN_V2Result>', $result);  
        // echo "hiii";die();
        // print_r($first_tag);die();
         if(count($first_tag) == 1 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);
            
             $final = explode('</LOGIN_V2Result></LOGIN_V2Response></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);
             //echo "<pre>";
             print_r($response);
             if($response->STATUSCODE == '1'){
                 return 1; // Invalid PIN
             }else if($response->STATUSCODE == '0' && $response->OTPSTATUS == '0'){
                 $this->session->set_userdata('iddmr', 1);
                 $this->session->set_userdata('dmrname', "$response->NAME");
                 $this->session->set_userdata('dmrmidname', "$response->MIDDLENAME");
                 $this->session->set_userdata('dmrlastname', "$response->LASTNAME");
                 $this->session->set_userdata('dmrmo', "$response->MOBILE");
                 $this->session->set_userdata('dmrcard', "$response->CARDNO");
                 $this->session->set_userdata('dmrtranslimit', "$response->TRANSACTIONLIMIT");
                 $this->session->set_userdata('dmrbalance', "$response->BALANCE");
                 $this->session->set_userdata('dmrkyc', "$response->KYCSTATUS");
                 $this->session->set_userdata('dmrkey', "$response->SECURITYKEY");
                 $this->session->set_userdata('dmrpin', "$response->PINCODE");
                 $this->session->set_userdata('dmrad', "$response->ADDRESS");
                 $this->session->set_userdata('dmrcity', "$response->CITY");
                 $this->session->set_userdata('dmrstate', "$response->STATE"); 
                 return 2;
             }else if($response->STATUSCODE == '0' && $response->OTPSTATUS == '1'){
                 return 3;
             }
             else{
                 return 0;
             }
         }
        
    }
    // OTP based ...........
    public function dmrLogin_cp($card,$mo){
       
        //$pin = $getmo->pin;
        
        $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <LOGIN_CP  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;LOGIN_CPREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;USERMOBILENO&gt;'.$mo.'&lt;/USERMOBILENO&gt;                            
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                            &lt;PARAM1&gt;&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;
                            &lt;/LOGIN_CPREQUEST&gt;
                       </RequestData>
                     </LOGIN_CP>
                   </soap:Body>
                 </soap:Envelope>';


            $curl = curl_init();
//echo $curlData;
            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'LOGIN_CP',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);
           
           
         $first_tag = explode('<LOGIN_CPResult>', $result);      
      // return print_r($first_tag);die();
         if(count($first_tag) == 1 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);
            
             $final = explode('</LOGIN_CPResult></LOGIN_CPResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);
            //return print_r($response);
             if($response->STATUS == 'Success'){
                 return 1;
             }else{
                 return 0;
             }
         }
        
    }
    public function setPin($transection_id){
        $up = array(
            'pin' => $this->input->post('pin')            
            );
        $this->db->where('d_id',$transection_id);
        $this->db->update('dmr_registration_track',$up);
      
         if($this->db->affected_rows() == 1){
                return 1;
           }else{
               return 0;
           }   
    }
    
    public function addBeneficiary(){
       
         $a = mt_rand(100000,999999); 
        for ($i = 0; $i<22; $i++) 
         {
             $a .= mt_rand(0,9);
         }
         $track_id   = 'SWAMIBEN'.$a;
        $mmid = ($this->input->post('mmid')!='')?$this->input->post('mmid'):'';
        $mobile = ($this->input->post('mobile')!='')?$this->input->post('mobile'):'';
        $bank_name = ($this->input->post('bank_name')!='')?$this->input->post('bank_name'):'';
        $state = ($this->input->post('state')!='')?$this->input->post('state'):'';
        $city = ($this->input->post('city')!='')?$this->input->post('city'):'';
        $branch_name = ($this->input->post('branch_name')!='')?$this->input->post('branch_name'):'';
        $ifsc_code = ($this->input->post('ifsc_code')!='')?$this->input->post('ifsc_code'):'';
        $ac_no = ($this->input->post('ac_no')!='')?$this->input->post('ac_no'):'';
        
         $data_insert = array(                
                'login_id'          => $this->session->userdata('login_id'),
                'card_no'           => $this->input->post('card_no'),
                'ben_type'          => $this->input->post('b_type'),
                'track_id'          => $track_id,
                'ben_name'          => $this->input->post('b_name'),
                'ben_mmid'          => $this->input->post('mmid'),
                'ben_mobile'        => $this->input->post('mobile'),
                'bank_name'         => $this->input->post('bank_name'),
                'bank_state'        => $this->input->post('state'),
                'bank_city'         => $this->input->post('city'),
                'bank_branch'       => $this->input->post('branch_name'),
                'bank_ifsc'         => $this->input->post('ifsc_code'),
                'acc'               => $this->input->post('ac_no')
            );
         
        $insert = $this->db->insert('beneficiary_track',$data_insert);
        if($this->db->affected_rows() == 1){
            $my_DMR_id = $this->db->insert_id();
            $url = DMRURL; 
            if($this->input->post('b_type') == 'IFSC'){
                $curlData = '<?xml version="1.0" encoding="utf-8"?>
                       <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                       <soap:Body>
                           <ADDBENEFICIARY xmlns="http://tempuri.org/">
                             <RequestData>
                                   &lt;ADDBENEFICIARYREQUEST&gt;
                                   &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                                   &lt;CARDNO&gt;'.$this->input->post('card_no').'&lt;/CARDNO&gt;
                                   &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                                   &lt;TRANSACTIONID&gt;'.$track_id.'&lt;/TRANSACTIONID&gt;
                                   &lt;BENENAME&gt;'.$this->input->post('b_name').'&lt;/BENENAME&gt;
                                   &lt;MMID&gt;&lt;/MMID&gt;
                                   &lt;BENEMOBILE&gt;&lt;/BENEMOBILE&gt;
                                   &lt;BANKNAME&gt;'.$bank_name.'&lt;/BANKNAME&gt;
                                   &lt;BRANCHNAME&gt;'.$branch_name.'&lt;/BRANCHNAME&gt;
                                   &lt;CITY&gt;'.$city.'&lt;/CITY&gt;
                                   &lt;STATE&gt;'.$state.'&lt;/STATE&gt;
                                   &lt;IFSCCODE&gt;'.$ifsc_code.'&lt;/IFSCCODE&gt;
                                   &lt;ACCOUNTNO&gt;'.$ac_no.'&lt;/ACCOUNTNO&gt;
                                    &lt;PARAM1&gt;&lt;/PARAM1&gt;
                                    &lt;PARAM2&gt;&lt;/PARAM2&gt;
                                    &lt;PARAM3&gt;&lt;/PARAM3&gt;
                                    &lt;PARAM4&gt;&lt;/PARAM4&gt;
                                    &lt;PARAM5&gt;&lt;/PARAM5&gt;
                                    &lt;/ADDBENEFICIARYREQUEST&gt;
                              </RequestData>
                            </ADDBENEFICIARY>
                          </soap:Body>
                        </soap:Envelope>';
            }else{
                   $curlData = '<?xml version="1.0" encoding="utf-8"?>
                       <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                       <soap:Body>
                           <ADDBENEFICIARY xmlns="http://tempuri.org/">
                             <RequestData>
                                   &lt;ADDBENEFICIARYREQUEST&gt;
                                   &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                                   &lt;CARDNO&gt;'.$this->input->post('card_no').'&lt;/CARDNO&gt;
                                   &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                                   &lt;TRANSACTIONID&gt;'.$track_id.'&lt;/TRANSACTIONID&gt;
                                   &lt;BENENAME&gt;'.$this->input->post('b_name').'&lt;/BENENAME&gt;
                                   &lt;MMID&gt;'.$mmid.'&lt;/MMID&gt;
                                   &lt;BENEMOBILE&gt;'.$mobile.'&lt;/BENEMOBILE&gt;
                                   &lt;BANKNAME&gt;&lt;/BANKNAME&gt;
                                   &lt;BRANCHNAME&gt;&lt;/BRANCHNAME&gt;
                                   &lt;CITY&gt;&lt;/CITY&gt;
                                   &lt;STATE&gt;&lt;/STATE&gt;
                                   &lt;IFSCCODE&gt;&lt;/IFSCCODE&gt;
                                   &lt;ACCOUNTNO&gt;&lt;/ACCOUNTNO&gt;
                                    &lt;PARAM1&gt;&lt;/PARAM1&gt;
                                    &lt;PARAM2&gt;&lt;/PARAM2&gt;
                                    &lt;PARAM3&gt;&lt;/PARAM3&gt;
                                    &lt;PARAM4&gt;&lt;/PARAM4&gt;
                                    &lt;PARAM5&gt;&lt;/PARAM5&gt;
                                    &lt;/ADDBENEFICIARYREQUEST&gt;
                              </RequestData>
                            </ADDBENEFICIARY>
                          </soap:Body>
                        </soap:Envelope>';
            }


                   $curl = curl_init();

                   curl_setopt ($curl, CURLOPT_URL, $url);
                   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                   curl_setopt($curl,CURLOPT_TIMEOUT,120);

                   curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                       'SOAPAction:'.DMRACTIUON.'ADDBENEFICIARY',
                       'Content-Type: text/xml; charset=utf-8;',
                   ));

                    curl_setopt ($curl, CURLOPT_POST, 1);

                   curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

                   $result = curl_exec($curl);                 
                   curl_close ($curl);
                  
                $first_tag = explode('<ADDBENEFICIARYResult>', $result);       
               // print_r($first_tag);die();
                if(count($first_tag)!= 2 ){
                    return 0;
                }else{
                    $get_less =  str_replace("&lt;","<",$first_tag[1]);
                    $get_full =  str_replace("&gt;",">",$get_less);

                    $final = explode('</ADDBENEFICIARYResult></ADDBENEFICIARYResponse></soap:Body></soap:Envelope>', $get_full);

                    $response = simplexml_load_string($final[0]);
                   // print_r($response);
                     if($response->STATUSCODE == 0){
                        $data_status = array(
                                 'status_code'       => "$response->STATUSCODE",
                                 'status'           => "$response->STATUS",
                                 'otp_status'      => "$response->OTPSTATUS",
                                 'beneid'           => "$response->BENEID"
                             );

                            $this->db->where('ben_id',$my_DMR_id);
                           $update = $this->db->update('beneficiary_track',$data_status);   
                         if($this->db->affected_rows() == 1){
                              return $my_DMR_id;
                         }else{
                             return 0;
                         }

                    }else if($response->STATUSCODE == 1){
                        $data_status = array(
                                 'status_code'       => "$response->STATUSCODE",
                                 'status'           => "$response->STATUS",
                                 'otp_status'      => "$response->OTPSTATUS",
                                 'beneid'           => "$response->BENEID"
                             );

                            $this->db->where('ben_id',$my_DMR_id);
                           $update = $this->db->update('beneficiary_track',$data_status);   
                        return 1;
                    }
                    else{
                        return 0;
                    } 
                }
              
        }else{
            return 0;
        }   
    }
    
    public function addVerifyBeneficiary(){
         $url = DMRURL; 
        $a = mt_rand(100000,999999); 
        for ($i = 0; $i<22; $i++) 
         {
             $a .= mt_rand(0,9);
         }
         $track_id   = 'SWAMIBEN'.$a;
         $mmid = ($this->input->post('mmid')!='')?$this->input->post('mmid'):'';
        $mobile = ($this->input->post('mobile')!='')?$this->input->post('mobile'):'';
        $bank_name = ($this->input->post('bank_name')!='')?$this->input->post('bank_name'):'';
        $state = ($this->input->post('state')!='')?$this->input->post('state'):'';
        $city = ($this->input->post('city')!='')?$this->input->post('city'):'';
        $branch_name = ($this->input->post('branch_name')!='')?$this->input->post('branch_name'):'';
        $ifsc_code = ($this->input->post('ifsc_code')!='')?$this->input->post('ifsc_code'):'';
        $ac_no = ($this->input->post('ac_no')!='')?$this->input->post('ac_no'):'';
         $data_insert = array(                
                'login_id'          => $this->session->userdata('login_id'),
                'card_no'           => $this->input->post('card_no'),
                'ben_type'          => $this->input->post('b_type'),
                'track_id'          => $track_id,
                'ben_name'          => $this->input->post('b_name'),
                'ben_mmid'          => $this->input->post('mmid'),
                'ben_mobile'        => $this->input->post('mobile'),
                'bank_name'         => $this->input->post('bank_name'),
                'bank_state'        => $this->input->post('state'),
                'bank_city'         => $this->input->post('city'),
                'bank_branch'       => $this->input->post('branch_name'),
                'bank_ifsc'         => $this->input->post('ifsc_code'),
                'acc'               => $this->input->post('ac_no'),
                'verification'      => 0
            );
         
        $insert = $this->db->insert('beneficiary_track',$data_insert);
        if($this->db->affected_rows() == 1){           
            
            $my_DMR_id = $this->db->insert_id();
            $url = DMRURL; 
            
           if($this->input->post('b_type') == 'IFSC'){
                $curlData = '<?xml version="1.0" encoding="utf-8"?>
                       <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                       <soap:Body>
                           <ADDBENEFICIARY xmlns="http://tempuri.org/">
                             <RequestData>
                                   &lt;ADDBENEFICIARYREQUEST&gt;
                                   &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                                   &lt;CARDNO&gt;'.$this->input->post('card_no').'&lt;/CARDNO&gt;
                                   &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                                   &lt;TRANSACTIONID&gt;'.$track_id.'&lt;/TRANSACTIONID&gt;
                                   &lt;BENENAME&gt;'.$this->input->post('b_name').'&lt;/BENENAME&gt;
                                   &lt;MMID&gt;&lt;/MMID&gt;
                                   &lt;BENEMOBILE&gt;&lt;/BENEMOBILE&gt;
                                   &lt;BANKNAME&gt;'.$bank_name.'&lt;/BANKNAME&gt;
                                   &lt;BRANCHNAME&gt;'.$branch_name.'&lt;/BRANCHNAME&gt;
                                   &lt;CITY&gt;'.$city.'&lt;/CITY&gt;
                                   &lt;STATE&gt;'.$state.'&lt;/STATE&gt;
                                   &lt;IFSCCODE&gt;'.$ifsc_code.'&lt;/IFSCCODE&gt;
                                   &lt;ACCOUNTNO&gt;'.$ac_no.'&lt;/ACCOUNTNO&gt;
                                    &lt;PARAM1&gt;&lt;/PARAM1&gt;
                                    &lt;PARAM2&gt;&lt;/PARAM2&gt;
                                    &lt;PARAM3&gt;&lt;/PARAM3&gt;
                                    &lt;PARAM4&gt;&lt;/PARAM4&gt;
                                    &lt;PARAM5&gt;&lt;/PARAM5&gt;
                                    &lt;/ADDBENEFICIARYREQUEST&gt;
                              </RequestData>
                            </ADDBENEFICIARY>
                          </soap:Body>
                        </soap:Envelope>';
            }else{
                   $curlData = '<?xml version="1.0" encoding="utf-8"?>
                       <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                       <soap:Body>
                           <ADDBENEFICIARY xmlns="http://tempuri.org/">
                             <RequestData>
                                   &lt;ADDBENEFICIARYREQUEST&gt;
                                   &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                                   &lt;CARDNO&gt;'.$this->input->post('card_no').'&lt;/CARDNO&gt;
                                   &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                                   &lt;TRANSACTIONID&gt;'.$track_id.'&lt;/TRANSACTIONID&gt;
                                   &lt;BENENAME&gt;'.$this->input->post('b_name').'&lt;/BENENAME&gt;
                                   &lt;MMID&gt;'.$mmid.'&lt;/MMID&gt;
                                   &lt;BENEMOBILE&gt;'.$mobile.'&lt;/BENEMOBILE&gt;
                                   &lt;BANKNAME&gt;&lt;/BANKNAME&gt;
                                   &lt;BRANCHNAME&gt;&lt;/BRANCHNAME&gt;
                                   &lt;CITY&gt;&lt;/CITY&gt;
                                   &lt;STATE&gt;&lt;/STATE&gt;
                                   &lt;IFSCCODE&gt;'.$ifsc_code.'&lt;/IFSCCODE&gt;
                                   &lt;ACCOUNTNO&gt;&lt;/ACCOUNTNO&gt;
                                    &lt;PARAM1&gt;&lt;/PARAM1&gt;
                                    &lt;PARAM2&gt;&lt;/PARAM2&gt;
                                    &lt;PARAM3&gt;&lt;/PARAM3&gt;
                                    &lt;PARAM4&gt;&lt;/PARAM4&gt;
                                    &lt;PARAM5&gt;&lt;/PARAM5&gt;
                                    &lt;/ADDBENEFICIARYREQUEST&gt;
                              </RequestData>
                            </ADDBENEFICIARY>
                          </soap:Body>
                        </soap:Envelope>';
            }


                   $curl = curl_init();

                   curl_setopt ($curl, CURLOPT_URL, $url);
                   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                   curl_setopt($curl,CURLOPT_TIMEOUT,120);

                   curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                       'SOAPAction:'.DMRACTIUON.'ADDBENEFICIARY',
                       'Content-Type: text/xml; charset=utf-8;',
                   ));

                    curl_setopt ($curl, CURLOPT_POST, 1);

                   curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

                   $result = curl_exec($curl);                 
                   curl_close ($curl);
                  
                $first_tag = explode('<ADDBENEFICIARYResult>', $result);       
                
                if(count($first_tag)!= 2 ){
                    return 0;
                }else{
                    $get_less =  str_replace("&lt;","<",$first_tag[1]);
                    $get_full =  str_replace("&gt;",">",$get_less);

                    $final = explode('</ADDBENEFICIARYResult></ADDBENEFICIARYResponse></soap:Body></soap:Envelope>', $get_full);

                    $response = simplexml_load_string($final[0]);
                   // print_r($response);
                     if($response->STATUSCODE == 0){
                        $data_status = array(
                                 'status_code'       => "$response->STATUSCODE",
                                 'status'           => "$response->STATUS",
                                 'otp_status'      => "$response->OTPSTATUS",
                                 'beneid'           => "$response->BENEID"
                             );

                            $this->db->where('ben_id',$my_DMR_id);
                           $update = $this->db->update('beneficiary_track',$data_status);
                           if($this->input->post('b_type') == 'IFSC'){
                                $type = 2;
                                $id = $this->input->post('ac_no');
                            }else{
                                $type = 1;
                                $id = $this->input->post('mmid');
                            }
                          $accver =  $this->accVerify($type,$id);
                          if($accver == 0){
                           return $my_DMR_id; // verified
                          }else{
                              return $my_DMR_id;
                          }
                        
                    } if($response->STATUSCODE == 1){
                        $data_status = array(
                                 'status_code'       => "$response->STATUSCODE",
                                 'status'           => "$response->STATUS",
                                 'otp_status'      => "$response->OTPSTATUS",
                                 'beneid'           => "$response->BENEID"
                             );

                            $this->db->where('ben_id',$my_DMR_id);
                           $update = $this->db->update('beneficiary_track',$data_status);   
                       if($response->STATUS == 'Account Already Added'){
                           return '8';
                       }
                    }
                    
                }

        }
    }
    public function accVerify($type,$id){
        $url = DMRURL;
        $a = mt_rand(100000,999999); 
                for ($i = 0; $i<22; $i++) 
                 {
                     $a .= mt_rand(0,9);
                 }
                 $track_id   = 'SWAMIBEN'.$a;
                $curlData = '<?xml version="1.0" encoding="utf-8"?>
                       <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                       <soap:Body>
                           <TRANSACTION_V2 xmlns="http://tempuri.org/">
                             <RequestData>
                                   &lt;TRANSACTION_V2REQUEST&gt;
                                   &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                                   &lt;CARDNO&gt;'.$this->input->post('card_no').'&lt;/CARDNO&gt;
                                   &lt;TRANSTYPE&gt;'.$type.'&lt;/TRANSTYPE&gt;
                                   &lt;TRANSTYPEDESC&gt;'.$id.'&lt;/TRANSTYPEDESC&gt;
                                   &lt;BENEMOBILE&gt;'.$this->input->post('mobile').'&lt;/BENEMOBILE&gt; 
                                   &lt;IFSCCODE&gt;'.$this->input->post('ifsc_code').'&lt;/IFSCCODE&gt;
                                   &lt;OTP&gt;&lt;/OTP&gt; 
                                   &lt;TRANSAMOUNT&gt;1&lt;/TRANSAMOUNT&gt; 
                                   &lt;REMARKS&gt;Account Verification&lt;/REMARKS&gt; 
                                   &lt;MERCHANTTRANSID&gt;'.$track_id.'&lt;/MERCHANTTRANSID&gt;
                                   &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                                  &lt;BANKNAME&gt;'.$this->input->post('bank_name').'&lt;/BANKNAME&gt;
                                  &lt;BRANCHNAME&gt;'.$this->input->post('branch_name').'&lt;/BRANCHNAME&gt;
                                   
                                    &lt;PARAM1&gt;0.00&lt;/PARAM1&gt;
                                    &lt;PARAM2&gt;&lt;/PARAM2&gt;
                                    &lt;PARAM3&gt;&lt;/PARAM3&gt;
                                    &lt;PARAM4&gt;&lt;/PARAM4&gt;
                                    &lt;PARAM5&gt;&lt;/PARAM5&gt;
                                    &lt;/TRANSACTION_V2REQUEST&gt;
                              </RequestData>
                            </TRANSACTION_V2>
                          </soap:Body>
                        </soap:Envelope>';
            
//echo $curlData;

                   $curl = curl_init();

                   curl_setopt ($curl, CURLOPT_URL, $url);
                   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                   curl_setopt($curl,CURLOPT_TIMEOUT,120);

                   curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                       'SOAPAction:'.DMRACTIUON.'TRANSACTION_V2',
                       'Content-Type: text/xml; charset=utf-8;',
                   ));

                    curl_setopt ($curl, CURLOPT_POST, 1);

                   curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

                   $result = curl_exec($curl);                 
                   curl_close ($curl);
                  
                $first_tag = explode('<TRANSACTION_V2Result>', $result);       
                
                if(count($first_tag)!= 2 ){
                    return 0;
                }else{
                    $get_less =  str_replace("&lt;","<",$first_tag[1]);
                    $get_full =  str_replace("&gt;",">",$get_less);
                  //  print_r($get_full);die();
                    $final = explode('</TRANSACTION_V2Result></TRANSACTION_V2Response></soap:Body></soap:Envelope>', $get_full);
                    
                    $response = simplexml_load_string($final[0]);
                    
                  //  print_r($response); die();
                    
                     if($response->STATUSCODE == 0){
                       
                  $query2 = $this->db->get_where('current_virtual_amount', array('user_id' => $this->session->userdata('login_id')));           
                   if($query2 && $query2->num_rows()== 1){ 
                       $totalcharge =  6.00;
                       $name = $this->session->userdata('dmrname').' '.$this->session->userdata('dmrlastname').' :'.$this->session->userdata('dmrcard');
                       $val2 = $query2->row()->amount;
                       $insfrom   =   array(                      
                               "amount"     => ($val2 - $totalcharge)
                           );
                       $this->db->where("user_id",$this->session->userdata('login_id'));
                       $query1 = $this->db->update("current_virtual_amount",$insfrom);
                      
                        $myupdate = array(
                          "trans_from"    =>   $this->session->userdata('login_id'),
                          "trans_to"      =>     0,
                         "cur_amount"      =>    ($val2 - $totalcharge),
                          "trans_amt"     =>     6.00,
                          "trans_remark"  =>     "Account verification charge of $name",
                          "type"  =>     "2",
                            'trans_date' => date('Y-m-d H:i:s')
                       );
                      $query =   $this->db->insert("trans_detail", $myupdate);
                    }
                         
                      return 0;  

                    }else if($response->STATUSCODE == 1){ 
                        $this->session->set_flashdata('msg','Your Beneficiary registration is successfull but verification is failed  Please verify if by using OTP.');  
                         redirect('dmr/beneficiaryOTP/'.$my_DMR_id.'/'.$this->input->post('card_no'));
                        
                    }else if($response->STATUSCODE == 2){
                        $query2 = $this->db->get_where('current_virtual_amount', array('user_id' => $this->session->userdata('login_id')));           
                        if($query2 && $query2->num_rows()== 1){ 
                            $totalcharge =  6.00;
                            $name = $this->session->userdata('dmrname').' '.$this->session->userdata('dmrlastname').' :'.$this->session->userdata('dmrcard');
                            $val2 = $query2->row()->amount;
                            $insfrom   =   array(                      
                                    "amount"     => ($val2 - $totalcharge)
                                );
                            $this->db->where("user_id",$this->session->userdata('login_id'));
                            $query1 = $this->db->update("current_virtual_amount",$insfrom);

                             $myupdate = array(
                               "trans_from"    =>   $this->session->userdata('login_id'),
                               "trans_to"      =>     0,
                              "cur_amount"      =>    ($val2 - $totalcharge),
                               "trans_amt"     =>     6.00,
                               "trans_remark"  =>     "Account verification charge of $name",
                               "type"  =>     "2",
                                 'trans_date' => date('Y-m-d H:i:s')
                            );
                           $query =   $this->db->insert("trans_detail", $myupdate);
                         }
                         $this->session->set_flashdata('err','Unknown : please Retry after 90 seconds. Server is busy!');  
                          redirect('dmr/transRequery/'.$track_id);
                    }else if($response->STATUSCODE == 3){                        
                        return 3;
                    }
                    else{
                        return 0;
                    } 
                }
    }

    public function verifyBeneficiary(){
        //$data = $this->beneDetails($ben_id);
        
             $a = mt_rand(100000,999999); 
        for ($i = 0; $i<22; $i++) 
         {
             $a .= mt_rand(0,9);
         }
         $track_id   = 'SWAMIBEN'.$a;
            $url = DMRURL;
            if($this->uri->segment(3) == '2'){
                $type = 2;
                $id = $this->uri->segment(6);
            }else{
                $type = 1;
                $id = $this->uri->segment(6);
            }
                $curlData = '<?xml version="1.0" encoding="utf-8"?>
                       <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                       <soap:Body>
                           <TRANSACTION_V2 xmlns="http://tempuri.org/">
                             <RequestData>
                                   &lt;TRANSACTION_V2REQUEST&gt;
                                   &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                                   &lt;CARDNO&gt;'.$this->uri->segment(5).'&lt;/CARDNO&gt;
                                   &lt;TRANSTYPE&gt;'.$type.'&lt;/TRANSTYPE&gt;
                                   &lt;TRANSTYPEDESC&gt;'.$id.'&lt;/TRANSTYPEDESC&gt;
                                   &lt;BENEMOBILE&gt;'.$this->uri->segment(7).'&lt;/BENEMOBILE&gt; 
                                   &lt;IFSCCODE&gt;'.$this->uri->segment(8).'&lt;/IFSCCODE&gt;
                                   &lt;OTP&gt;&lt;/OTP&gt; 
                                   &lt;TRANSAMOUNT&gt;1&lt;/TRANSAMOUNT&gt; 
                                   &lt;REMARKS&gt;Account Verification&lt;/REMARKS&gt; 
                                   &lt;MERCHANTTRANSID&gt;'.$track_id.'&lt;/MERCHANTTRANSID&gt;
                                   &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                                  &lt;BANKNAME&gt;'.$this->uri->segment(9).'&lt;/BANKNAME&gt;
                                  &lt;BRANCHNAME&gt;'.$this->uri->segment(10).'&lt;/BRANCHNAME&gt;
                                   
                                    &lt;PARAM1&gt;&lt;/PARAM1&gt;
                                    &lt;PARAM2&gt;&lt;/PARAM2&gt;
                                    &lt;PARAM3&gt;&lt;/PARAM3&gt;
                                    &lt;PARAM4&gt;&lt;/PARAM4&gt;
                                    &lt;PARAM5&gt;&lt;/PARAM5&gt;
                                    &lt;/TRANSACTION_V2REQUEST&gt;
                              </RequestData>
                            </TRANSACTION_V2>
                          </soap:Body>
                        </soap:Envelope>';
            
//echo $curlData; 

                   $curl = curl_init();

                   curl_setopt ($curl, CURLOPT_URL, $url);
                   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                   curl_setopt($curl,CURLOPT_TIMEOUT,120);

                   curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                       'SOAPAction:'.DMRACTIUON.'TRANSACTION_V2',
                       'Content-Type: text/xml; charset=utf-8;',
                   ));

                    curl_setopt ($curl, CURLOPT_POST, 1);

                   curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

                   $result = curl_exec($curl);                 
                   curl_close ($curl);
                 //  print_r($result);die();  
                $first_tag = explode('<TRANSACTION_V2Result>', $result);       
                
                if(count($first_tag)!= 2 ){
                    return 0;
                }else{
                    $get_less =  str_replace("&lt;","<",$first_tag[1]);
                    $get_full =  str_replace("&gt;",">",$get_less);
                    //print_r($get_full);die();
                    $final = explode('</TRANSACTION_V2Result></TRANSACTION_V2Response></soap:Body></soap:Envelope>', $get_full);
                    
                    $response = simplexml_load_string($final[0]);
                   // print_r($response);die();
                     if($response->STATUSCODE == 0){
                             return 1;
                    }else if($response->STATUSCODE == 1){                        
                        return 2;
                    }else if($response->STATUSCODE == 2){ 
                         $this->session->set_flashdata('err','Unknown : please Retry after 90 seconds. Server is busy!');  
                    redirect('dmr/transRequery1/'.$track_id);
                    }else if($response->STATUSCODE == 3){                        
                       return $response->STATUS;
                    }
                    else{
                        return 0;
                    } 
                }
            
        
    }

    public function getBeneficiary($card){
        //$login_id = $this->session->userdata('login_id');
//        $this->db->select('d.*');
//        $this->db->from('beneficiary_track d'); 
//       
//        $this->db->where('d.card_no',$card);        
//        $this->db->where('d.status_code','0');        
//        $query = $this->db->get();
//        if($query->num_rows() > 0){
//            return $query->result();
//        }
//        else{
//            return array();
//        } 
         $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <VIEWBENEFICIARY  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;VIEWBENEFICIARYREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;                          
                            &lt;CARDNO&gt;'.$this->session->userdata('dmrcard').'&lt;/CARDNO&gt;
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                           
                            &lt;PARAM1&gt;&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;  
                            &lt;/VIEWBENEFICIARYREQUEST&gt;
                       </RequestData>
                     </VIEWBENEFICIARY>
                   </soap:Body>
                 </soap:Envelope>';

//echo $curlData;
            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'VIEWBENEFICIARY',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<VIEWBENEFICIARYResult>', $result);       
        // print_r($first_tag);die();
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</VIEWBENEFICIARYResult></VIEWBENEFICIARYResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);
//             echo "<pre>";
//            print_r($response);die();
             return $response;
         }
    }
    public function getBeneficiary_edit($id){
        
        $login_id = $this->session->userdata('login_id');
        $this->db->select('d.*');
        $this->db->from('beneficiary_track d'); 
       
        $this->db->where('d.login_id',$login_id);        
        $this->db->where('d.ben_id',$id);        
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }
        else{
            return array();
        } 
    }
    
    public function editBeneficiary($ben_id){
        $data_update = array(                
                
                'ben_mmid'          => ($this->input->post('mmid') != '')?$this->input->post('mmid'):'',
                'ben_mobile'        => ($this->input->post('mobile') != '')?$this->input->post('mobile'):'',
                'bank_name'         => ($this->input->post('bank_name') !="")?$this->input->post('bank_name'):'',
                'bank_state'        => ($this->input->post('state') !="")?$this->input->post('state'):'',
                'bank_city'         => ($this->input->post('city') !='')?$this->input->post('city'):'',
                'bank_branch'       => ($this->input->post('branch_name') !='')?$this->input->post('branch_name'):'',
                'bank_ifsc'         => ($this->input->post('ifsc_code') != '')?$this->input->post('ifsc_code'):'',
                'acc'               => ($this->input->post('ac_no') != '')?$this->input->post('ac_no'):''
            );
         
        //$insert = $this->db->insert('beneficiary_track',$data_insert);
        if($this->db->affected_rows() == 1){
            //$my_DMR_id = $this->db->insert_id();
            $url = DMRURL; 
            if($this->input->post('b_type') == 'IFSC'){
                $curlData = '<?xml version="1.0" encoding="utf-8"?>
                       <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                       <soap:Body>
                           <EDITBENEFICIARY xmlns="http://tempuri.org/">
                             <RequestData>
                                   &lt;EDITBENEFICIARYREQUEST&gt;
                                   &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                                   &lt;CARDNO&gt;'.$this->input->post('card_no').'&lt;/CARDNO&gt;
                                   &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                                   &lt;FLAG&gt;2&lt;/FLAG&gt; 
                                   &lt;MMID&gt;&lt;/MMID&gt;
                                   &lt;BENEMOBILE&gt;&lt;/BENEMOBILE&gt;
                                   &lt;BANKNAME&gt;'.$this->input->post('bank_name').'&lt;/BANKNAME&gt;
                                   &lt;BRANCHNAME&gt;'.$this->input->post('branch_name').'&lt;/BRANCHNAME&gt;
                                   &lt;CITY&gt;'.$this->input->post('city').'&lt;/CITY&gt;
                                   &lt;STATE&gt;'.$this->input->post('state').'&lt;/STATE&gt;
                                   &lt;IFSCCODE&gt;'.$this->input->post('ifsc_code').'&lt;/IFSCCODE&gt;
                                   &lt;ACCOUNTNO&gt;'.$this->input->post('ac_no').'&lt;/ACCOUNTNO&gt;
                                    &lt;BENEID&gt;'.$ben_id.'&lt;/BENEID&gt;
                                    &lt;PARAM1&gt;&lt;/PARAM1&gt;
                                    &lt;PARAM2&gt;&lt;/PARAM2&gt;
                                    &lt;PARAM3&gt;&lt;/PARAM3&gt;
                                    &lt;PARAM4&gt;&lt;/PARAM4&gt;
                                    &lt;PARAM5&gt;&lt;/PARAM5&gt;
                                    &lt;/EDITBENEFICIARYREQUEST&gt;
                              </RequestData>
                            </EDITBENEFICIARY>
                          </soap:Body>
                        </soap:Envelope>';
            }else{
                   $curlData = '<?xml version="1.0" encoding="utf-8"?>
                       <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                       <soap:Body>
                           <EDITBENEFICIARY xmlns="http://tempuri.org/">
                             <RequestData>
                                   &lt;EDITBENEFICIARYREQUEST&gt;
                                   &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                                   &lt;CARDNO&gt;'.$this->input->post('card_no').'&lt;/CARDNO&gt;
                                   &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                                   &lt;FLAG&gt;1&lt;/FLAG&gt;                                  
                                   &lt;MMID&gt;'.$this->input->post('mmid').'&lt;/MMID&gt;
                                   &lt;BENEMOBILE&gt;'.$this->input->post('mobile').'&lt;/BENEMOBILE&gt;
                                   &lt;BANKNAME&gt;&lt;/BANKNAME&gt;
                                   &lt;BRANCHNAME&gt;&lt;/BRANCHNAME&gt;
                                   &lt;CITY&gt;&lt;/CITY&gt;
                                   &lt;STATE&gt;&lt;/STATE&gt;
                                   &lt;IFSCCODE&gt;&lt;/IFSCCODE&gt;
                                   &lt;ACCOUNTNO&gt;&lt;/ACCOUNTNO&gt;
                                   &lt;BENEID&gt;'.$ben_id.'&lt;/BENEID&gt;
                                    &lt;PARAM1&gt;&lt;/PARAM1&gt;
                                    &lt;PARAM2&gt;&lt;/PARAM2&gt;
                                    &lt;PARAM3&gt;&lt;/PARAM3&gt;
                                    &lt;PARAM4&gt;&lt;/PARAM4&gt;
                                    &lt;PARAM5&gt;&lt;/PARAM5&gt;
                                    &lt;/EDITBENEFICIARYREQUEST&gt;
                              </RequestData>
                            </EDITBENEFICIARY>
                          </soap:Body>
                        </soap:Envelope>';
            }


                   $curl = curl_init();

                   curl_setopt ($curl, CURLOPT_URL, $url);
                   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                   curl_setopt($curl,CURLOPT_TIMEOUT,120);

                   curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                       'SOAPAction:'.DMRACTIUON.'EDITBENEFICIARY',
                       'Content-Type: text/xml; charset=utf-8;',
                   ));

                    curl_setopt ($curl, CURLOPT_POST, 1);

                   curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

                   $result = curl_exec($curl);                 
                   curl_close ($curl);
                  
                $first_tag = explode('<EDITBENEFICIARYResult>', $result);       
                print_r($first_tag);die();
                if(count($first_tag)!= 2 ){
                    return 0;
                }else{
                    $get_less =  str_replace("&lt;","<",$first_tag[1]);
                    $get_full =  str_replace("&gt;",">",$get_less);

                    $final = explode('</EDITBENEFICIARYResult></EDITBENEFICIARYResponse></soap:Body></soap:Envelope>', $get_full);

                    $response = simplexml_load_string($final[0]);
                    print_r($response);
                     if($response->STATUSCODE == 0){
//                        $data_status = array(
//                                 'status_code'       => "$response->STATUSCODE",
//                                 'status'           => "$response->STATUS",
//                                 'otp_status'      => "$response->OTPSTATUS",
//                                 'beneid'           => "$response->BENEID"
//                             );
//
//                            $this->db->where('ben_id',$my_DMR_id);
//                           $update = $this->db->update('beneficiary_track',$data_status);  
                         $this->db->where('beneid',$ben_id);
                         $update = $this->db->update('beneficiary_track',$data_update);
                         if($this->db->affected_rows() == 1){
                              return 4;//updated
                         }else{
                             return 0;
                         }

                    }else if($response->STATUSCODE == 1){
  
                        return 1;
                    }
                    else{
                        return 0;
                    } 
                }
              
        }else{
            return 0;
        }  
    }
    
    public function getBENDetails($ben_id){
         $query = $this->db->get_where('beneficiary_track', array('ben_id' => $ben_id));
        if($query && $query->num_rows()== 1){
              return $query->row();
           }else{
               return array();
           }
    }
    public function doVerifyBen($ben_id){
        $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <BENEREGISTER  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;BENEREGISTERREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;CARDNO&gt;'.$this->input->post('trans').'&lt;/CARDNO&gt;
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                            &lt;OTP&gt;'.$this->input->post('otp').'&lt;/OTP&gt;
                            &lt;BENEID&gt;'.$this->input->post('bene_id').'&lt;/BENEID&gt;
                            &lt;PARAM1&gt;&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;
                            &lt;/BENEREGISTERREQUEST&gt;
                       </RequestData>
                     </BENEREGISTER>
                   </soap:Body>
                 </soap:Envelope>';


            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'BENEREGISTER',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<BENEREGISTERResult>', $result);       
         //print_r($first_tag);die();
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</BENEREGISTERResult></BENEREGISTERResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);


             if($response->STATUSCODE == 0){
                 $up = array(
                     'otp' => 1,
                     'imps_status' => "$response->IMPSSTATUS",
                     'neft_status' => "$response->NEFTSTATUS",
                     );
                 $this->db->where('ben_id',$ben_id);
                 $this->db->update('beneficiary_track',$up);
                 //echo $this->db->last_query();die();
                 if($this->db->affected_rows() == 1){
                      return 1;//success
                 }       
             }else{
                 return 2;//invalid OTP
             }
         }
    }
    public function resendBenOTP(){
        $t_id = $this->uri->segment(3);
        
         $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <BENERESENDOTP  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;BENERESENDOTPREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;CARDNO&gt;'.$t_id.'&lt;/CARDNO&gt;
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                            &lt;PARAM1&gt;&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;
                            &lt;/BENERESENDOTPREQUEST&gt;
                       </RequestData>
                     </BENERESENDOTP>
                   </soap:Body>
                 </soap:Envelope>';


            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'BENERESENDOTP',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);
           
           
         $first_tag = explode('<BENERESENDOTPResult>', $result);      

         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</BENERESENDOTPResult></BENERESENDOTPResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);

             if($response->STATUS == 'Success'){
                 return 1;
             }else{
                 return 0;
             }
         }  
    }
    
    public function removeBeneficary($id){
        
        $card = $this->session->userdata('dmrcard');
        $b_id = $id;
        $url = DMRURL; 
       //petram 10 for delete 11 for desiable
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <REMOVEBENEFICIARY  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;REMOVEBENEFICIARYREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;CARDNO&gt;'.$card.'&lt;/CARDNO&gt;
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                            &lt;BENEID&gt;'.$b_id.'&lt;/BENEID&gt;
                            &lt;PARAM1&gt;11&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;
                            &lt;/REMOVEBENEFICIARYREQUEST&gt;
                       </RequestData>
                     </REMOVEBENEFICIARY>
                   </soap:Body>
                 </soap:Envelope>';


            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'REMOVEBENEFICIARY',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);
           
           
         $first_tag = explode('<REMOVEBENEFICIARYResult>', $result);      
         //print_r($first_tag);
         //echo "<br><br>";die();
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</REMOVEBENEFICIARYResult></REMOVEBENEFICIARYResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);
            //echo $response->STATUSCODE;print_r($response);die();
             if($response->STATUSCODE == "0"){
                // $this->db->delete('beneficiary_track', array('beneid' => $b_id));
                 return "1";
             }else{
                 return "0";
             }
         }
    }
    
    public function doRemoveVerifyBen(){
        $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <REMOVEBENEOTP  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;REMOVEBENEOTPREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;CARDNO&gt;'.$this->session->userdata('dmrcard').'&lt;/CARDNO&gt;
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                            &lt;BENEID&gt;'.$this->input->post('bene_id').'&lt;/BENEID&gt;
                            &lt;OTP&gt;'.$this->input->post('otp').'&lt;/OTP&gt;
                            &lt;BENESTATUS&gt;10&lt;/BENESTATUS&gt;
                            &lt;PARAM1&gt;&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;
                            &lt;/REMOVEBENEOTPREQUEST&gt;
                       </RequestData>
                     </REMOVEBENEOTP>
                   </soap:Body>
                 </soap:Envelope>';


            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'REMOVEBENEOTP',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<REMOVEBENEOTPResult>', $result);       
        // print_r($first_tag);die();
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</REMOVEBENEOTPResult></REMOVEBENEOTPResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);


             if($response->STATUSCODE == 0){
                 $this->db->delete('beneficiary_track', array('beneid' => $b_id));
                 
                      return 1;//success
                    
             }else{
                 return 2;//invalid OTP
             }
         }
    }
    public function getCardMore($id){
        $query = $this->db->get_where('dmr_registration_track', array('login_id' => $id));
        
        if($query && $query->num_rows()> 0){
              return $query->row();
           }else{
               return array();
           }
    }
    public function getBene($id){
        $query = $this->db->get_where('beneficiary_track', array('login_id' => $id, 'otp' => '1'));
        if($query && $query->num_rows()>0){
              return $query->result();
           }else{
               return array();
           }
    }


    public function checktopupLimit($card){
        $url = DMRURL; 
       //$data = $this->getCardMore($this->session->userdata('login_id'));
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <CHECKTOPUPLIMIT  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;CHECKTOPUPLIMITREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;CARDNO&gt;'.$card.'&lt;/CARDNO&gt;
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                            
                            &lt;/CHECKTOPUPLIMITREQUEST&gt;
                       </RequestData>
                     </CHECKTOPUPLIMIT>
                   </soap:Body>
                 </soap:Envelope>';


            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'CHECKTOPUPLIMIT',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<CHECKTOPUPLIMITResult>', $result);       
        // print_r($first_tag);die();
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</CHECKTOPUPLIMITResult></CHECKTOPUPLIMITResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);


             if($response->STATUSCODE == 0){
                  return $response;  
             }else{
                 return array();//invalid OTP
             }
         }
    }
    
    public function checkCard($card){
        $url = DMRURL; 
       //$data = $this->getCardMore($this->session->userdata('login_id'));
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <CHECKCARDBALANCE  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;CHECKCARDBALANCEREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                            &lt;CARDNO&gt;'.$card.'&lt;/CARDNO&gt;
                            &lt;/CHECKCARDBALANCEREQUEST&gt;
                       </RequestData>
                     </CHECKCARDBALANCE>
                   </soap:Body>
                 </soap:Envelope>';


            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'CHECKCARDBALANCE',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<CHECKCARDBALANCEResult>', $result);       
        // print_r($first_tag);die();
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</CHECKCARDBALANCEResult></CHECKCARDBALANCEResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);

//             echo "<pre>";
//             print_r($response);
//             die();
             if($response->STATUSCODE == 0){
                  return $response;  
             }else{
                 return array();//invalid OTP
             }
         }
    }
    
    public function dotransferAmt($key,$card,$mo,$type=0,$cardval){
        
        $this->load->model('recharge_model');
        
        $url = DMRURL;
        $ben_id = $this->input->post('ben_id');
        $ben_anme = $this->input->post('bene');

        if($ben_anme == 'MMID'){
            $val = '1';
            $desc = $this->input->post('ac');

        }else{
            $val = '2';
            $desc = $this->input->post('ac');
        }
        if($type != 0){
            $val = $type;
        }
        
        $a = mt_rand(100000,999999); 
        for ($i = 0; $i<22; $i++) 
         {
             $a .= mt_rand(0,9);
         }
         $track_id   = 'SWAMITR'.$a;
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <TRANSACTION_V3  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;TRANSACTION_V3REQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;CARDNO&gt;'.$card.'&lt;/CARDNO&gt;
                            &lt;TRANSTYPE&gt;'.$val.'&lt;/TRANSTYPE&gt;
                            &lt;TRANSTYPEDESC&gt;'.$desc.'&lt;/TRANSTYPEDESC&gt;
                            &lt;BENEMOBILE&gt;'.$this->input->post('mo').'&lt;/BENEMOBILE&gt;
                            &lt;IFSCCODE&gt;'.$this->input->post('ifsc').'&lt;/IFSCCODE&gt;
                            &lt;OTP&gt;&lt;/OTP&gt;
                            &lt;TRANSAMOUNT&gt;'.$this->input->post('tr_amt').'&lt;/TRANSAMOUNT&gt;
                            &lt;SERVICECHARGE&gt;'.(($this->input->post('tr_amt') * 0.45) /100).'&lt;/SERVICECHARGE&gt;
                            &lt;REMARKS&gt;'.$this->input->post('remark').'&lt;/REMARKS&gt;
                            &lt;BENEID&gt;'.$ben_id.'&lt;/BENEID&gt;
                            &lt;MERCHANTTRANSID&gt;'.$track_id.'&lt;/MERCHANTTRANSID&gt;
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                            &lt;PARAM1&gt;&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;'.$key.'&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;
                            &lt;/TRANSACTION_V3REQUEST&gt;
                       </RequestData>
                     </TRANSACTION_V3>
                   </soap:Body>
                 </soap:Envelope>';

       // echo $curlData;
            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'TRANSACTION_V3',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<TRANSACTION_V3Result>', $result);       
        
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</TRANSACTION_V3Result></TRANSACTION_V3Response></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);
           //  print_r($response);die();
             if($response->STATUSCODE == 0){
                 $ser = (($this->input->post('tr_amt') * 0.45) /100);
                  $query2 = $this->db->get_where('current_virtual_amount', array('user_id' => $this->session->userdata('login_id')));           
                   if($query2 && $query2->num_rows()== 1){ 
                       $totalcharge =  $ser;
                       $name = $this->session->userdata('dmrname').' '.$this->session->userdata('dmrlastname').' :'.$this->session->userdata('dmrcard');
                       $val2 = $query2->row()->amount;
                       $insfrom   =   array(                      
                               "amount"     => ($val2 - $totalcharge)
                           );
                       $this->db->where("user_id",$this->session->userdata('login_id'));
                       $query1 = $this->db->update("current_virtual_amount",$insfrom);
                      
                        $myupdate = array(
                          "trans_from"    =>   $this->session->userdata('login_id'),
                          "trans_to"      =>     0,
                         "cur_amount"      =>    ($val2 - $totalcharge),
                          "trans_amt"     =>     floatval($totalcharge),
                          "trans_remark"  =>     "DMR transaction charge $name",
                            "type"  =>     "2",
                            'trans_date' => date('Y-m-d H:i:s')
                       );
                      $query =   $this->db->insert("trans_detail", $myupdate);
                   }
                    $md = $this->session->userdata("master_distributor_id");
                    $sd = $this->session->userdata("super_distributor_id");
                    $d = $this->session->userdata("distributor_id");
                    $my = $this->session->userdata("login_id");
                    $optna  =   strtolower('dmr');
                    $amt = $this->input->post('tr_amt');
                    $this->recharge_model->trans_commission($md,$sd,$d,$my,$optna,$amt);
                 
                 $up = array(
                     'login_id' => $this->session->userdata('login_id'),
                     'to_id'    => $this->input->post('bene'),
                     'amount'    =>$this->input->post('tr_amt'),
                     'track_id' => "$track_id",
                     'status' => "$response->TRANSACTIONSTATUS",
                     'responce_code' => "$response->RESPONSECODE",
                     'rrn' => "$response->RRN",
                     'responce_cd' => "$response->STATUSCODE",
                     'ben_name' => "$response->BENENAME"
            );         
                $insert = $this->db->insert('transection_track',$up);
                if($this->db->affected_rows() == 1){
                    
                    $this->session->set_flashdata('msg','Amount transferred successfull .');  
                    redirect('dmr/printDetail/'.$track_id);
                }else{
                    return 5;
                }
                  
             }else if($response->STATUSCODE == 1){
                 return 2;
             }else if($response->STATUSCODE == 2){
                  $ser = (($this->input->post('tr_amt') * 0.45) /100);
                  $query2 = $this->db->get_where('current_virtual_amount', array('user_id' => $this->session->userdata('login_id')));           
                   if($query2 && $query2->num_rows()== 1){ 
                       $totalcharge =  $ser;
                       $name = $this->session->userdata('dmrname').' '.$this->session->userdata('dmrlastname').' :'.$this->session->userdata('dmrcard');
                       $val2 = $query2->row()->amount;
                       $insfrom   =   array(                      
                               "amount"     => ($val2 - $totalcharge)
                           );
                       $this->db->where("user_id",$this->session->userdata('login_id'));
                       $query1 = $this->db->update("current_virtual_amount",$insfrom);
                      
                        $myupdate = array(
                          "trans_from"    =>   $this->session->userdata('login_id'),
                          "trans_to"      =>     0,
                         "cur_amount"      =>    ($val2 - $totalcharge),
                          "trans_amt"     =>     floatval($totalcharge),
                          "trans_remark"  =>     "DMR transaction charge $name",
                            "type"  =>     "2",
                            'trans_date' => date('Y-m-d H:i:s')
                       );
                      $query =   $this->db->insert("trans_detail", $myupdate);
                   }
                    $md = $this->session->userdata("master_distributor_id");
                    $sd = $this->session->userdata("super_distributor_id");
                    $d = $this->session->userdata("distributor_id");
                    $my = $this->session->userdata("login_id");
                    $optna  =   strtolower('dmr');
                    $amt = $this->input->post('tr_amt');
                    $this->recharge_model->trans_commission($md,$sd,$d,$my,$optna,$amt); 
                 $up = array(
                     'login_id' => $this->session->userdata('login_id'),
                     'to_id'    => $this->input->post('bene'),
                     'amount'    =>$this->input->post('tr_amt'),
                     'track_id' => "$track_id",
                     'status' => "$response->TRANSACTIONSTATUS",                     
                     'responce_cd' => "$response->STATUSCODE",                     
                     'rrn' => "$response->RRN",
                     
            );       
                 $insert = $this->db->insert('transection_track',$up);
                 return $track_id;
             }else if($response->STATUSCODE == 3){
                 return 4;
             }else{
                 return 5;//invalid OTP
             }
         }
    }
    
    public function doTopup($key){
        $topup_amt = $this->input->post('amount');
        //$ser = ($cardval * 0.20)/100;
         //$topup_amt = ($this->input->post('tr_amt') - $cardval); 
         
                $t_amt = 0.00;
                $loop = $topup_amt/5000;  

                if($loop > 1){
                     $per = (explode(".",$loop));
                    for($i = 1; $i<= $per['0']; $i++){ // check the loop timing
                        if($topup_amt > $t_amt){
                              $dotop = $this->dmrTOP($this->session->userdata('dmrkey'),5000);
                        }
                        $t_amt = $t_amt + 5000;
                    }
                    if($topup_amt > $t_amt){
                        $val = $topup_amt - $t_amt;
                          $dotop = $this->dmrTOP($this->session->userdata('dmrkey'),$val);
                        $t_amt = $t_amt + $val;
                    }

                }else{
                     $dotop = $this->dmrTOP($this->session->userdata('dmrkey'),$topup_amt);
                    $t_amt = $topup_amt;
                }
               return $dotop;
            
    }
    public function dmrTOP($key, $topup_amt){
        $url = DMRURL; 
       //$data = $this->getCardMore($this->session->userdata('login_id'));
      // print_r($data);die();
         if($this->input->post('card') == 'MMID'){
             $val = '1';
         }else{
             $val = '2';
         }
        $a = mt_rand(100000,999999); 
        for ($i = 0; $i<22; $i++) 
         {
             $a .= mt_rand(0,9);
         }
         $track_id   = 'SWAMITR'.$a;
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <TOPUP_V2  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;TOPUP_V2REQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;CARDNO&gt;'.$this->session->userdata('dmrcard').'&lt;/CARDNO&gt;
                             &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;   
                            
                            &lt;TOPUPAMOUNT&gt;'.$topup_amt.'&lt;/TOPUPAMOUNT&gt;
                            &lt;TOPUPTRANSID&gt;'.$track_id.'&lt;/TOPUPTRANSID&gt;
                            &lt;MOBILE&gt;'.$this->session->userdata('dmrmo').'&lt;/MOBILE&gt;                           
                            &lt;REGIONID&gt;'.$this->input->post('region').'&lt;/REGIONID&gt;
                            &lt;SERVICECHARGE&gt;'.(($topup_amt * 0.20)/100).'&lt;/SERVICECHARGE&gt;
                            &lt;PARAM1&gt;&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;'.$key.'&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;
                            &lt;/TOPUP_V2REQUEST&gt;
                       </RequestData>
                     </TOPUP_V2>
                   </soap:Body>
                 </soap:Envelope>';

    //echo $curlData;
            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'TOPUP_V2',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<TOPUP_V2Result>', $result);       
       // print_r($first_tag);die();
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</TOPUP_V2Result></TOPUP_V2Response></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);

             if($response->STATUSCODE == 0){
                 $ser = (($topup_amt * 0.20)/100);
                 $query2 = $this->db->get_where('current_virtual_amount', array('user_id' => $this->session->userdata('login_id')));           
               if($query2 && $query2->num_rows()== 1){ 
                   $totalcharge= $topup_amt + $ser;
                   $name = $this->session->userdata('dmrname').' '.$this->session->userdata('dmrlastname').' :'.$this->session->userdata('dmrcard');
                   $val2 = $query2->row()->amount;
                   $insfrom   =   array(                      
                           "amount"     => ($val2 - $totalcharge)
                       );
                   $this->db->where("user_id",$this->session->userdata('login_id'));
                   $query1 = $this->db->update("current_virtual_amount",$insfrom);

                    $myupdate = array(
                      "trans_from"    =>   $this->session->userdata('login_id'),
                      "trans_to"      =>     0,
                     "cur_amount"      =>    ($val2 - $totalcharge),
                      "trans_amt"     =>     floatval($totalcharge),
                      "trans_remark"  =>     "Topup with service charge to $name",
                        "type"  =>     "2",
                        'trans_date' => date('Y-m-d H:i:s')
                   );
                  $query =   $this->db->insert("trans_detail", $myupdate);
               }
                 
             $up = array(
                     'login_id' => $this->session->userdata('login_id'),
                     'serial_no' => "$response->SERIALNO",
                     'topup_val' => "$response->TOPUPVALUE",
                     'current' => "$response->CURRENTVALUE",
                     'prev_val' => "$response->PREVIOUSVALUE",
                     'trans_id' => "$response->TOPUPTRANSID",
                     'expiry' => "$response->EXPIRYDATE",
            );         
                $insert = $this->db->insert('topup_track',$up);
                if($this->db->affected_rows() == 1){
                    return $this->db->insert_id();
                }else{
                    return 0;
                }
             }else{
                 return 0;//invalid OTP
             }
         }
    }
    
    public function searchuser(){
        $mobile = $this->input->post('mobile');
        $l_id =$this->session->userdata('login_id');
        //$query_validate = $this->db->query("SELECT p.* FROM profile p WHERE p.mobile = $mobile AND ( p.admin_id = $l_id OR p.master_distributor_id = $l_id OR p.super_distributor_id = $l_id OR p.distributor_id = $l_id OR p.login_id = $l_id )"); 
       //echo $this->db->last_query();
        //if(count($query_validate->result())>0){
            $query = $this->db->get_where('dmr_registration_track', array('mobile' => $mobile));
            if($query && $query->num_rows()== 1){
                  return $query->row();
               }else{
                   return array();
               }
       /* }else{
            return array('a'=>'1', 'b'=>'2');
        }*/
    }
    public function get_ben($ben_id){
        $query = $this->db->get_where('beneficiary_track', array('beneid' => $ben_id));
        if($query && $query->num_rows()== 1){
              return $query->row();
           }else{
               return array();
           }
    }
    
    public function getSender(){
       $user = $this->session->userdata('login_id');
      
       $where = "";
       if($this->session->userdata('user_type') != 'Admin'){
       $where = "AND d.login_id = $user";
       }
       $query = $this->db->query(" SELECT d.*, p.first_name, p.last_name, p.admin_id,p.master_distributor_id,p.super_distributor_id,p.distributor_id FROM dmr_registration_track d  "
               . " INNER JOIN profile p ON p.login_id = d.login_id "
               . "WHERE d.card_number <> '' $where ORDER BY d.d_id desc");
       
      /* $query = $this->db->query(" SELECT d.*, p.first_name, p.last_name, p.admin_id,p.master_distributor_id,p.super_distributor_id,p.distributor_id FROM dmr_registration_track d  "
               . " INNER JOIN profile p ON p.mobile = d.mobile "
               . "WHERE d.card_number <> '' $where ORDER BY d.d_id desc");*/
       if($query && $query->num_rows()> 0){
             return $query->result();
         }else{
             return array();
         }
    }
    
    public function getSenderdetail($id ){
        $query = $this->db->query(" SELECT d.* FROM dmr_registration_track d  "              
               . "WHERE d.card_number <> '' AND  d_id = $id ");
       if($query && $query->num_rows()> 0){
             return $query->row();
         }else{
             return array();
         }
    }
    public function upgradeToKYC($iloc,$aloc){
        $url = DMRURL; 
         $curlData = '<?xml version="1.0" encoding="utf-8"?>
                       <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                       <soap:Body>
                           <KYCUPLOAD xmlns="http://tempuri.org/">
                             <RequestData>
                                   &lt;KYCUPLOADREQUEST&gt;
                                   &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                                   &lt;CARDNO&gt;'.$this->input->post('card').'&lt;/CARDNO&gt;
                                   &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                                    &lt;KYCFLAG&gt;2&lt;/KYCFLAG&gt;
                                  
                                   &lt;USERNAME&gt;'.$this->input->post('first_name').'&lt;/USERNAME&gt;
                                   &lt;USERMIDDLENAME&gt;'.$this->input->post('middle_name').'&lt;/USERMIDDLENAME&gt;
                                   &lt;USERLASTNAME&gt;'.$this->input->post('last_name').'&lt;/USERLASTNAME&gt;
                                   &lt;USERMOTHERSMAIDENNAME&gt;'.$this->input->post('m_name').'&lt;/USERMOTHERSMAIDENNAME&gt;
                                   &lt;USERDATEOFBIRTH&gt;'.$this->input->post('dob').'&lt;/USERDATEOFBIRTH&gt;
                                   &lt;USEREMAILID&gt;'.$this->input->post('email').'&lt;/USEREMAILID&gt;
                                   
                                    &lt;USERSTATE&gt;'.$this->input->post('state').'&lt;/USERSTATE&gt;
                                    &lt;USERCITY&gt;'.$this->input->post('city').'&lt;/USERCITY&gt;
                                    &lt;USERADDRESS&gt;'.$this->input->post('add').'&lt;/USERADDRESS&gt;
                                    &lt;PINCODE&gt;'.$this->input->post('zip').'&lt;/PINCODE&gt;
                                        

                                    &lt;IDPROOFTYPE&gt;'.$this->input->post('id_proof_type').'&lt;/IDPROOFTYPE&gt;
                                    &lt;IDPROOF&gt;'.$this->input->post('id_proof').'&lt;/IDPROOF&gt;
                                    &lt;IDPROOFURL&gt;'.$iloc.'&lt;/IDPROOFURL&gt;
                                    &lt;ADDRESSPROOFTYPE&gt;'.$this->input->post('address_proof_type').'&lt;/ADDRESSPROOFTYPE&gt;
                                    &lt;ADDRESSPROOF&gt;'.$this->input->post('address_proof').'&lt;/ADDRESSPROOF&gt;
                                    &lt;ADDRESSPROOFURL&gt;'.$aloc.'&lt;/ADDRESSPROOFURL&gt;                                   
                                    &lt;/KYCUPLOADREQUEST&gt;
                              </RequestData>
                            </KYCUPLOAD>
                          </soap:Body>
                        </soap:Envelope>';


                   $curl = curl_init();

                   curl_setopt ($curl, CURLOPT_URL, $url);
                   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                   curl_setopt($curl,CURLOPT_TIMEOUT,120);

                   curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                       'SOAPAction:'.DMRACTIUON.'KYCUPLOAD',
                       'Content-Type: text/xml; charset=utf-8;',
                   ));

                    curl_setopt ($curl, CURLOPT_POST, 1);

                   curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

                   $result = curl_exec($curl);                 
                   curl_close ($curl);
                   //echo $result; die();
                $first_tag = explode('<KYCUPLOADResult>', $result);       
                //print_r($first_tag);die();
                if(count($first_tag)!= 2 ){
                    return 0;
                }else{
                    $get_less =  str_replace("&lt;","<",$first_tag[1]);
                    $get_full =  str_replace("&gt;",">",$get_less);

                    $final = explode('</KYCUPLOADResult></KYCUPLOADResponse></soap:Body></soap:Envelope>', $get_full);

                    $response = simplexml_load_string($final[0]);
                    if($response->STATUSCODE == 20){
                        return 20;
                    }else if($response->STATUSCODE == 0){
                        
                              return 1;
                         

                    }else{
                        return 0;
                    }
                }
    }
    
    public function reTryTransfer(){
        $url = DMRURL; 
       $data = $this->getCardMore($this->session->userdata('login_id'));
        
         if($this->input->post('card') == 'MMID'){
             $val = '1';
         }else{
             $val = '2';
         }
        $a = mt_rand(100000,999999); 
        for ($i = 0; $i<22; $i++) 
         {
             $a .= mt_rand(0,9);
         }
         $track_id   = 'SWAMITR'.$a;
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <TRANSACTIONREQUERY  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;TRANSACTIONREQUERYREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;TRANSACTIONID&gt;'.$this->input->post('id').'&lt;/TRANSACTIONID&gt;
                             &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                           
                            &lt;PARAM1&gt;&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;
                            &lt;/TRANSACTIONREQUERYREQUEST&gt;
                       </RequestData>
                     </TRANSACTIONREQUERY>
                   </soap:Body>
                 </soap:Envelope>';

            //echo $curlData;
            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'TRANSACTIONREQUERY',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<TRANSACTIONREQUERYResult>', $result);       
         
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</TRANSACTIONREQUERYResult></TRANSACTIONREQUERYResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);
             //print_r($response); die();

             if($response->STATUSCODE == 0){
             $data_status = array(
                        'status'       => "$response->STATUS",
                        'responce_cd'       => "$response->STATUSCODE",
                    );

                   $this->db->where('track_id',$this->input->post('id'));
                  $update = $this->db->update('transection_track',$data_status);   
                if($this->db->affected_rows() == 1){
                     return 1;
                }else{
                    return 1;
                }
               
             }else if( $response->STATUSCODE == 1){
                 return 2;
             }else if( $response->STATUSCODE == 3){
                 return 4;
             }else if( $response->STATUSCODE == 4){
                 return 5;
             }else{
                 return 0;//invalid OTP
             }
         }
    }
    public function reTryTransfer1(){
        $url = DMRURL; 
       $data = $this->getCardMore($this->session->userdata('login_id'));
        
         if($this->input->post('card') == 'MMID'){
             $val = '1';
         }else{
             $val = '2';
         }
        $a = mt_rand(100000,999999); 
        for ($i = 0; $i<22; $i++) 
         {
             $a .= mt_rand(0,9);
         }
         $track_id   = 'SWAMITR'.$a;
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <TRANSACTIONREQUERY  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;TRANSACTIONREQUERYREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;TRANSACTIONID&gt;'.$this->input->post('id').'&lt;/TRANSACTIONID&gt;
                             &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                           
                            &lt;PARAM1&gt;&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;
                            &lt;/TRANSACTIONREQUERYREQUEST&gt;
                       </RequestData>
                     </TRANSACTIONREQUERY>
                   </soap:Body>
                 </soap:Envelope>';

//echo $curlData;
            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'TRANSACTIONREQUERY',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<TRANSACTIONREQUERYResult>', $result);       
         
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</TRANSACTIONREQUERYResult></TRANSACTIONREQUERYResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);


             if($response->STATUSCODE == 0){
             
                  
                  $data_status = array(                                 
                                 'status'           => "$response->STATUS",
                                 'otp_status'      => "1",
                                 'verification'    => "1"
                             );

                            $this->db->where('track_id',$this->input->post('id'));
                           $update = $this->db->update('beneficiary_track',$data_status);   
                           
                if($this->db->affected_rows() == 1){
                     return 1;
                }
               
             }else if( $response->STATUSCODE == 1){
                 return 2;
             }else if( $response->STATUSCODE == 3){
                 return 4;
             }else if( $response->STATUSCODE == 4){
                 return 5;
             }else{
                 return 0;//invalid OTP
             }
         }
    }
    public function transectionQUickDetails($t_id){
         $url = DMRURL; 
         $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <REPRINT  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;REPRINTREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;TRANSACTIONID&gt;'.$t_id.'&lt;/TRANSACTIONID&gt;
                           
                            &lt;/REPRINTREQUEST&gt;
                       </RequestData>
                     </REPRINT>
                   </soap:Body>
                 </soap:Envelope>';

//echo $curlData;
            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'REPRINT',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<REPRINTResult>', $result);       
         
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</REPRINTResult></REPRINTResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);
            // echo "<pre>";
            // print_r($response);die();
             if($response->STATUSCODE == 0){
                 return $response;
             }else{
                 return array();
             }
             
         }
    }
    
    public function card_details($card){
         $query = $this->db->query(" SELECT t.* FROM dmr_registration_track t "  
                  
               . "WHERE  t.card_number = '$card' ");
       if($query && $query->num_rows()> 0){
             return $query->row();
         }else{
             return array();
         }
    }
    
    public function searchUserHistory($card,$type,$mode){
        $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <TRANSACTIONHISTORY  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;TRANSACTIONHISTORYREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            &lt;CARDNO&gt;'.$card.'&lt;/CARDNO&gt;
                            &lt;FROMDATE&gt;'.$this->input->post('from').'&lt;/FROMDATE&gt;
                            &lt;TODATE&gt;'.$this->input->post('to').'&lt;/TODATE&gt;
                            &lt;TRANSTYPE&gt;'.$this->input->post('t_type').'&lt;/TRANSTYPE&gt;
                            &lt;TRANSMODE&gt;'.$this->input->post('m_type').'&lt;/TRANSMODE&gt;
                            
                            &lt;/TRANSACTIONHISTORYREQUEST&gt;
                       </RequestData>
                     </TRANSACTIONHISTORY>
                   </soap:Body>
                 </soap:Envelope>';

//echo $curlData;
            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'TRANSACTIONHISTORY',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<TRANSACTIONHISTORYResult>', $result);       
        // print_r($first_tag);die();
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</TRANSACTIONHISTORYResult></TRANSACTIONHISTORYResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);

//             echo "<pre>";
//             print_r($response);
//             echo '</pre>';die();
             if(count($response) >0){
                 return $response;
             }else{
                 return array();
             }
         }
    }
	public function searchagentHistory($card,$type,$mode){
		$url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <AGENTTRANSACTIONHISTORY  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;AGENTTRANSACTIONHISTORYREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;
                            
                            &lt;FROMDATE&gt;'.$this->input->post('from').'&lt;/FROMDATE&gt;
                            &lt;TODATE&gt;'.$this->input->post('to').'&lt;/TODATE&gt;
                             &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                             &lt;TRANSTYPE&gt;'.$this->input->post('t_type').'&lt;/TRANSTYPE&gt;
                            &lt;TRANSMODE&gt;'.$this->input->post('m_type').'&lt;/TRANSMODE&gt;
                            &lt;TRANSACTIONID&gt;&lt;/TRANSACTIONID&gt;
                            
                            &lt;/AGENTTRANSACTIONHISTORYREQUEST&gt;
                       </RequestData>
                     </AGENTTRANSACTIONHISTORY>
                   </soap:Body>
                 </soap:Envelope>';


            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'AGENTTRANSACTIONHISTORY',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<AGENTTRANSACTIONHISTORYResult>', $result);       
       // print_r($first_tag);die();
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</AGENTTRANSACTIONHISTORYResult></AGENTTRANSACTIONHISTORYResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);

             echo "<pre>";
             print_r($response);
             echo '</pre>';die();
             if(count($response) >0){
                 return $response;
             }else{
                 return array();
             }
         }
	
	}
    
    public function changePin($mo){
        $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <FORGOTPIN  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;FORGOTPINREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;                          
                            &lt;USERMOBILENO&gt;'.$mo.'&lt;/USERMOBILENO&gt;
                            
                            &lt;/FORGOTPINREQUEST&gt;
                       </RequestData>
                     </FORGOTPIN>
                   </soap:Body>
                 </soap:Envelope>';

//echo $curlData;
            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'FORGOTPIN',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<FORGOTPINResult>', $result);       
        // print_r($first_tag);die();
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</FORGOTPINYResult></FORGOTPINResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);


             if($response->STATUSCODE == 0){
                 return 1;
             }else{
                 return 0;
             }
         }
    }
	
	
    public function mobileverify(){
        $query = $this->db->get_where('profile', array('mobile' => $this->input->post('mobile')));
        //echo $this->db->last_query();die();
        if($query && $query->num_rows()> 0){
              return 1;
           }else{
               return 0;
           }
    }
    public function getAjaxBank($ifsc,$bank){
        $query = $this->db->get_where('bank_details', array('ifsc' => $ifsc, 'bank'=>"$bank"));
        //echo $this->db->last_query();die();
        if($query && $query->num_rows()> 0){
              return $query->row()->state.'@@'.$query->row()->city.'@@'.$query->row()->branch.'@@'.$query->row()->address;
           }else{
               return '';
           }
    }
    public function verifyUser($mobile){
        $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <VALIDATELOGIN_V1  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;VALIDATELOGIN_V1REQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;                          
                            &lt;USERMOBILENO&gt;'.$mobile.'&lt;/USERMOBILENO&gt;
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;
                            &lt;OTP&gt;'.$this->input->post('otp').'&lt;/OTP&gt;
                            &lt;PARAM1&gt;&lt;/PARAM1&gt;
                            &lt;PARAM2&gt;&lt;/PARAM2&gt;
                            &lt;PARAM3&gt;&lt;/PARAM3&gt;
                            &lt;PARAM4&gt;&lt;/PARAM4&gt;
                            &lt;PARAM5&gt;&lt;/PARAM5&gt;  
                            &lt;/VALIDATELOGIN_V1REQUEST&gt;
                       </RequestData>
                     </VALIDATELOGIN_V1>
                   </soap:Body>
                 </soap:Envelope>';

//echo $curlData;
            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'VALIDATELOGIN_V1',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<VALIDATELOGIN_V1Result>', $result);       
        // print_r($first_tag);die();
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</VALIDATELOGIN_V1Result></VALIDATELOGIN_V1Response></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);
            //echo "<pre>";
			//print_r($response);die();
             if($response->STATUSCODE == 0){
                 $this->session->set_userdata('iddmr', 1);
                 $this->session->set_userdata('dmrname', "$response->NAME");
                 $this->session->set_userdata('dmrmidname', "$response->MIDDLENAME");
                 $this->session->set_userdata('dmrlastname', "$response->LASTNAME");
                 $this->session->set_userdata('dmrmo', "$response->MOBILE");
                 $this->session->set_userdata('dmrcard', "$response->CARDNO");
                 $this->session->set_userdata('dmrtranslimit', "$response->TRANSACTIONLIMIT");
                 $this->session->set_userdata('dmrbalance', "$response->BALANCE");
                 $this->session->set_userdata('dmrkyc', "$response->KYCSTATUS");
                 $this->session->set_userdata('dmrkey', "$response->SECURITYKEY");
                 $this->session->set_userdata('dmrpin', "$response->PINCODE");
                 $this->session->set_userdata('dmrad', "$response->ADDRESS");
                 $this->session->set_userdata('dmrcity', "$response->CITY");
                 $this->session->set_userdata('dmrstate', "$response->STATE");
                 return 1;
             }else{
                 return 0;
             }
         }
    }
    public function getIFSCBank($name){
        $query = $this->db->get_where('bank_details', array('bank'=>"$name"));
        //echo $this->db->last_query();die();
        if($query && $query->num_rows()> 0){
              return $result = substr($query->row()->ifsc, 0, 4);
           }else{
               return '';
           }
    }
    public function cardByMo($mo){
        $query = $this->db->get_where('dmr_registration_track', array('mobile'=>"$mo"));
        //echo $this->db->last_query();die();
        if($query && $query->num_rows()> 0){
              return $query->row()->card_number ;
           }else{
               return '';
           }
    }
    public function knowKYC($card){
        $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <KYCSTATUS  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;KYCSTATUSREQUEST&gt;
                            &lt;TERMINALID&gt;'.TID.'&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;'.LKEY.'&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;'.MID.'&lt;/MERCHANTID&gt;                          
                            &lt;CARDNO&gt;'.$card.'&lt;/CARDNO&gt;
                            &lt;AGENTID&gt;Swamicom'.$this->session->userdata('login_id').'&lt;/AGENTID&gt;                           
                            &lt;/KYCSTATUSREQUEST&gt;
                       </RequestData>
                     </KYCSTATUS>
                   </soap:Body>
                 </soap:Envelope>';

//echo $curlData;
            $curl = curl_init();

            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_TIMEOUT,120);

            curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                'SOAPAction:'.DMRACTIUON.'KYCSTATUS',
                'Content-Type: text/xml; charset=utf-8;',
            ));

             curl_setopt ($curl, CURLOPT_POST, 1);

            curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl);                 
            curl_close ($curl);



         $first_tag = explode('<KYCSTATUSResult>', $result);       
        // print_r($first_tag);die();
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</KYCSTATUSResult></KYCSTATUSResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);
            //echo "<pre>";
            //print_r($response);die();
             if($response->STATUSCODE == 0){
                 return $response->KYC;
             }else{
                 return 'NO';
             }
            
         }
    }
}