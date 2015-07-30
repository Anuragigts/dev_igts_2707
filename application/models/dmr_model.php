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
        $query = $this->db->get();
        if($this->db->affected_rows() > 0){
            return $query->row();
        }
        else{
            return array();
        } 
    }
}