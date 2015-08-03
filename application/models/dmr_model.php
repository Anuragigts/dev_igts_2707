<?php
class Dmr_model extends CI_Model
{
   public function doRegister(){
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
                'email'             => $this->input->post('email')
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
                                   &lt;TERMINALID&gt;200094&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;0079394869&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;94&lt;/MERCHANTID&gt;
                                   &lt;AGENTID&gt;Anu0112&lt;/AGENTID&gt;
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
                                    &lt;IDPROOFURL&gt;'.$this->input->post('id_proof_url').'&lt;/IDPROOFURL&gt;
                                    &lt;USERADDRESSPROOFTYPE&gt;'.$this->input->post('address_proof_type').'&lt;/USERADDRESSPROOFTYPE&gt;
                                    &lt;USERADDRESSPROOF&gt;'.$this->input->post('address_proof').'&lt;/USERADDRESSPROOF&gt;
                                    &lt;ADDRESSPROOFURL&gt;'.$this->input->post('address_proof_url').'&lt;/ADDRESSPROOFURL&gt;
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
                    return 0;
                }else{
                    $get_less =  str_replace("&lt;","<",$first_tag[1]);
                    $get_full =  str_replace("&gt;",">",$get_less);

                    $final = explode('</REGISTRATIONResult></REGISTRATIONResponse></soap:Body></soap:Envelope>', $get_full);

                    $response = simplexml_load_string($final[0]);
                    if($response->STATUSCODE == 20){
                        return 20;
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
                            &lt;TERMINALID&gt;200094&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;0079394869&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;94&lt;/MERCHANTID&gt;
                            &lt;TRANSACTIONID&gt;'.$this->input->post('trans').'&lt;/TRANSACTIONID&gt;
                            &lt;OTP&gt;'.$this->input->post('otp').'&lt;/OTP&gt;
                            &lt;AGENTID&gt;Anu0112&lt;/AGENTID&gt;
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
                            &lt;TERMINALID&gt;200094&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;0079394869&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;94&lt;/MERCHANTID&gt;
                            &lt;TRANSACTIONID&gt;'.$t_id.'&lt;/TRANSACTIONID&gt;
                            &lt;AGENTID&gt;Anu0112&lt;/AGENTID&gt;
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
        $login_id = $this->session->userdata('login_id');
        $this->db->select('d.*,p.first_name,p.last_name');
        $this->db->from('dmr_registration_track d'); 
        $this->db->join('profile as p' , 'p.login_id = d.login_id', 'Inner');
        $this->db->where('d.login_id',$login_id);        
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
        $getmo = $this->sender_details();
        $mobile = $getmo->mobile;
        $pin = $getmo->pin;
        if($pin != ''){
        $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <LOGIN_V2  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;LOGIN_V1REQUEST&gt;
                            &lt;TERMINALID&gt;200094&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;0079394869&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;94&lt;/MERCHANTID&gt;
                            &lt;USERMOBILENO&gt;'.$mobile.'&lt;/USERMOBILENO&gt;                            
                            &lt;AGENTID&gt;Anu0112&lt;/AGENTID&gt;
                            &lt;PARAM1&gt;'.$pin.'&lt;/PARAM1&gt;
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
            return 3;
        }
        
    }
    public function setPin(){
        $up = array(
            'pin' => $this->input->post('otp')            
            );
        $this->db->where('login_id',$this->session->userdata('login_id'));
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
                                   &lt;TERMINALID&gt;200094&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;0079394869&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;94&lt;/MERCHANTID&gt;
                                   &lt;CARDNO&gt;'.$this->input->post('card_no').'&lt;/CARDNO&gt;
                                   &lt;AGENTID&gt;Anu0112&lt;/AGENTID&gt;
                                   &lt;TRANSACTIONID&gt;'.$track_id.'&lt;/TRANSACTIONID&gt;
                                   &lt;BENENAME&gt;'.$this->input->post('b_name').'&lt;/BENENAME&gt;
                                   &lt;MMID&gt;&lt;/MMID&gt;
                                   &lt;BENEMOBILE&gt;&lt;/BENEMOBILE&gt;
                                   &lt;BANKNAME&gt;'.$this->input->post('bank_name').'&lt;/BANKNAME&gt;
                                   &lt;BRANCHNAME&gt;'.$this->input->post('branch_name').'&lt;/BRANCHNAME&gt;
                                   &lt;CITY&gt;'.$this->input->post('city').'&lt;/CITY&gt;
                                   &lt;STATE&gt;'.$this->input->post('state').'&lt;/STATE&gt;
                                   &lt;IFSCCODE&gt;'.$this->input->post('ifsc_code').'&lt;/IFSCCODE&gt;
                                   &lt;ACCOUNTNO&gt;'.$this->input->post('ac_no').'&lt;/ACCOUNTNO&gt;
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
                                   &lt;TERMINALID&gt;200094&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;0079394869&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;94&lt;/MERCHANTID&gt;
                                   &lt;CARDNO&gt;'.$this->input->post('card_no').'&lt;/CARDNO&gt;
                                   &lt;AGENTID&gt;Anu0112&lt;/AGENTID&gt;
                                   &lt;TRANSACTIONID&gt;'.$track_id.'&lt;/TRANSACTIONID&gt;
                                   &lt;BENENAME&gt;'.$this->input->post('b_name').'&lt;/BENENAME&gt;
                                   &lt;MMID&gt;'.$this->input->post('mmid').'&lt;/MMID&gt;
                                   &lt;BENEMOBILE&gt;'.$this->input->post('mobile').'&lt;/BENEMOBILE&gt;
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
                
                if(count($first_tag)!= 2 ){
                    return 0;
                }else{
                    $get_less =  str_replace("&lt;","<",$first_tag[1]);
                    $get_full =  str_replace("&gt;",">",$get_less);

                    $final = explode('</ADDBENEFICIARYResult></ADDBENEFICIARYResponse></soap:Body></soap:Envelope>', $get_full);

                    $response = simplexml_load_string($final[0]);
                    print_r($response);
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
    
    public function getBeneficiary(){
        $login_id = $this->session->userdata('login_id');
        $this->db->select('d.*');
        $this->db->from('beneficiary_track d'); 
       
        $this->db->where('d.login_id',$login_id);        
        $this->db->where('d.status_code','0');        
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return array();
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
                                   &lt;TERMINALID&gt;200094&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;0079394869&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;94&lt;/MERCHANTID&gt;
                                   &lt;CARDNO&gt;'.$this->input->post('card_no').'&lt;/CARDNO&gt;
                                   &lt;AGENTID&gt;Anu0112&lt;/AGENTID&gt;
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
                                   &lt;TERMINALID&gt;200094&lt;/TERMINALID&gt;
                                   &lt;LOGINKEY&gt;0079394869&lt;/LOGINKEY&gt;
                                   &lt;MERCHANTID&gt;94&lt;/MERCHANTID&gt;
                                   &lt;CARDNO&gt;'.$this->input->post('card_no').'&lt;/CARDNO&gt;
                                   &lt;AGENTID&gt;Anu0112&lt;/AGENTID&gt;
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
                            &lt;TERMINALID&gt;200094&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;0079394869&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;94&lt;/MERCHANTID&gt;
                            &lt;CARDNO&gt;'.$this->input->post('trans').'&lt;/CARDNO&gt;
                            &lt;AGENTID&gt;Anu0112&lt;/AGENTID&gt;
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
                            &lt;TERMINALID&gt;200094&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;0079394869&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;94&lt;/MERCHANTID&gt;
                            &lt;CARDNO&gt;'.$t_id.'&lt;/CARDNO&gt;
                            &lt;AGENTID&gt;Anu0112&lt;/AGENTID&gt;
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
    
    public function removeBeneficary(){
        
        $card = $this->uri->segment(4);
        $b_id = $this->uri->segment(5);
        $url = DMRURL; 
       //petram 10 for delete 11 for desiable
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <REMOVEBENEFICIARY  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;REMOVEBENEFICIARYREQUEST&gt;
                            &lt;TERMINALID&gt;200094&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;0079394869&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;94&lt;/MERCHANTID&gt;
                            &lt;CARDNO&gt;'.$card.'&lt;/CARDNO&gt;
                            &lt;AGENTID&gt;Anu0112&lt;/AGENTID&gt;
                            &lt;BENEID&gt;'.$b_id.'&lt;/BENEID&gt;
                            &lt;PARAM1&gt;10&lt;/PARAM1&gt;
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
            // print_r($response);die();
             if($response->STATUSCODE == 0){
                // $this->db->delete('beneficiary_track', array('beneid' => $b_id));
                 return 1;
             }else{
                 return 0;
             }
         }
    }
    
    public function doRemoveVerifyBen($ben_id){
        $url = DMRURL; 
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>
                    <REMOVEBENEOTP  xmlns="http://tempuri.org/">
                      <RequestData>
                            &lt;REMOVEBENEOTPREQUEST&gt;
                            &lt;TERMINALID&gt;200094&lt;/TERMINALID&gt;
                            &lt;LOGINKEY&gt;0079394869&lt;/LOGINKEY&gt;
                            &lt;MERCHANTID&gt;94&lt;/MERCHANTID&gt;
                            &lt;CARDNO&gt;'.$this->input->post('trans').'&lt;/CARDNO&gt;
                            &lt;AGENTID&gt;Anu0112&lt;/AGENTID&gt;
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
         print_r($first_tag);die();
         if(count($first_tag)!= 2 ){
             return 0;
         }else{
             $get_less =  str_replace("&lt;","<",$first_tag[1]);
             $get_full =  str_replace("&gt;",">",$get_less);

             $final = explode('</REMOVEBENEOTPResult></REMOVEBENEOTPResponse></soap:Body></soap:Envelope>', $get_full);

             $response = simplexml_load_string($final[0]);


             if($response->STATUSCODE == 0){
                 $this->db->delete('beneficiary_track', array('beneid' => $b_id));
                 if($this->db->affected_rows() == 1){
                      return 1;//success
                 }       
             }else{
                 return 2;//invalid OTP
             }
         }
    }
}