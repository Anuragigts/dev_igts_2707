<?php
class Flight_model extends CI_Model
{
    public function getFlight(){
        $url = FLIGHTURL;  
        if($this->input->post('type') == 'O'){
                $curlData = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope
                    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <soap:Header>
                        <ns1:clsSecurity soap:mustUnderstand="false"
                    xmlns:ns1="http://tempuri.org/WsHermes/Service1">
                          <ns1:WebProviderLoginId>'.FLIGHTID.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.FLIGHTPASS.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                 <Availablity xmlns="http://tempuri.org/HERMESAPI/IntHermesAir">
                    <pobjSecurity>
                        <WebProviderLoginId>'.FLIGHTID.'</WebProviderLoginId>
                        <WebProviderPassword>'.FLIGHTPASS.'</WebProviderPassword>
                        <IsAgent>false</IsAgent>   
                    </pobjSecurity>
                    <PstrInput>
                            &lt;AvailabilityReq&gt;
                            &lt;BookingType&gt;'.$this->input->post('type').'&lt;/BookingType&gt;
                            &lt;Details&gt;
                                &lt;Item&gt;
                                    &lt;Source&gt;'.$this->input->post('from').'&lt;/Source&gt;
                                    &lt;Destination&gt;'.$this->input->post('to').'&lt;/Destination&gt;
                                    &lt;Date&gt;'.$this->input->post('departure').'&lt;/Date&gt;
                                &lt;/Item&gt;
                               
                            &lt;/Details&gt;
                            &lt;ClassTypeId&gt;'.$this->input->post('class').'&lt;/ClassTypeId&gt;
                            &lt;AIRLINES&gt;&lt;/AIRLINES&gt;
                            &lt;Adult&gt;'.$this->input->post('adult').'&lt;/Adult&gt;
                            &lt;Child&gt;'.$this->input->post('child').'&lt;/Child&gt;
                            &lt;Infant&gt;'.$this->input->post('infant').'&lt;/Infant&gt;
                            &lt;ResidentofIndia&gt;1&lt;/ResidentofIndia&gt;
                            &lt;AirlineCode&gt;&lt;/AirlineCode&gt;
                            &lt;DirectAccess&gt;0&lt;/DirectAccess&gt;
                            &lt;/AvailabilityReq&gt;
                    </PstrInput>
                    <PstrFinalOutPut /><pstrError/>
                </Availablity>
            </soap:Body></soap:Envelope>';
                
    }else{
        $curlData = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope
                    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <soap:Header>
                        <ns1:clsSecurity soap:mustUnderstand="false"
                    xmlns:ns1="http://tempuri.org/WsHermes/Service1">
                          <ns1:WebProviderLoginId>'.FLIGHTID.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.FLIGHTPASS.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                 <Availablity xmlns="http://tempuri.org/HERMESAPI/IntHermesAir">
                    <pobjSecurity>
                        <WebProviderLoginId>'.FLIGHTID.'</WebProviderLoginId>
                        <WebProviderPassword>'.FLIGHTPASS.'</WebProviderPassword>
                        <IsAgent>false</IsAgent>   
                    </pobjSecurity>
                    <PstrInput>
                            &lt;AvailabilityReq&gt;
                            &lt;BookingType&gt;'.$this->input->post('type').'&lt;/BookingType&gt;
                            &lt;Details&gt;
                                &lt;Item&gt;
                                    &lt;Source&gt;'.$this->input->post('from').'&lt;/Source&gt;
                                    &lt;Destination&gt;'.$this->input->post('to').'&lt;/Destination&gt;
                                    &lt;Date&gt;'.$this->input->post('departure').'&lt;/Date&gt;
                                &lt;/Item&gt;
                                &lt;Item&gt;
                                    &lt;Source&gt;'.$this->input->post('to').'&lt;/Source&gt;
                                    &lt;Destination&gt;'.$this->input->post('from').'&lt;/Destination&gt;
                                    &lt;Date&gt;'.$this->input->post('return').'&lt;/Date&gt;
                                &lt;/Item&gt;                               
                            &lt;/Details&gt;
                            &lt;ClassTypeId&gt;'.$this->input->post('class').'&lt;/ClassTypeId&gt;
                            &lt;AIRLINES&gt;&lt;/AIRLINES&gt;
                            &lt;Adult&gt;'.$this->input->post('adult').'&lt;/Adult&gt;
                            &lt;Child&gt;'.$this->input->post('child').'&lt;/Child&gt;
                            &lt;Infant&gt;'.$this->input->post('infant').'&lt;/Infant&gt;
                            &lt;ResidentofIndia&gt;1&lt;/ResidentofIndia&gt;
                            &lt;AirlineCode&gt;&lt;/AirlineCode&gt;
                            &lt;DirectAccess&gt;0&lt;/DirectAccess&gt;
                            &lt;/AvailabilityReq&gt;
                    </PstrInput>
                    <PstrFinalOutPut /><pstrError/>
                </Availablity>
            </soap:Body></soap:Envelope>';
    }

                $curl = curl_init();

                curl_setopt ($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl,CURLOPT_TIMEOUT,120);

                curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                    'SOAPAction:"'.FLIGHTACTION.'Availablity"',
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
                     
                     $first_tag = explode('</AvailablityResult><PstrFinalOutPut>', $keep_array[1]);       
                    
                     $get_less =  str_replace("&lt;","<",$first_tag[1]);
                     $get_full =  str_replace("&gt;",">",$get_less);

                     $final = explode('</PstrFinalOutPut><pstrError /></AvailablityResponse>', $get_full);

                    $response = simplexml_load_string($final[0]);
                    
                   // print_r($response);
                  return $response;
                }
              
    }
    public function getLogo(){
        $query = $this->db->get('flight_logo');
        if($query && $query->num_rows()> 0){
             return $query->result();
         }
         else{
             return array();
         }   
    }
    /**************************************
     ********** Get fare rule ************
     ************************************/
    public function getFare($airlineId, $flightId, $classCode, $track){
        $url = FLIGHTURL;
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope
                    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <soap:Header>
                        <ns1:clsSecurity soap:mustUnderstand="false"
                    xmlns:ns1="http://tempuri.org/WsHermes/Service1">
                          <ns1:WebProviderLoginId>'.FLIGHTID.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.FLIGHTPASS.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                 <FareRequest xmlns="http://tempuri.org/HERMESAPI/IntHermesAir">
                    <pobjSecurity>
                        <WebProviderLoginId>'.FLIGHTID.'</WebProviderLoginId>
                        <WebProviderPassword>'.FLIGHTPASS.'</WebProviderPassword>
                        <IsAgent>false</IsAgent>   
                    </pobjSecurity>
                    <PstrInput>
                            &lt;FareRequest&gt;
                            &lt;UserTrackId&gt;'.$track.'&lt;/UserTrackId&gt;                            
                            &lt;AirlineId&gt;'.$airlineId.'&lt;/AirlineId&gt;                            
                            &lt;FlightId&gt;'.$flightId.'&lt;/FlightId&gt;                            
                            &lt;ClassCode&gt;'.$classCode.'&lt;/ClassCode&gt;                           
                            &lt;/FareRequest&gt;
                    </PstrInput>
                    <PstrFinalOutPut /><pstrError/>
                </FareRequest>
            </soap:Body></soap:Envelope>';
        //echo $curlData;
             $curl = curl_init();

                curl_setopt ($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl,CURLOPT_TIMEOUT,120);

                curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                    'SOAPAction:"'.FLIGHTACTION.'FareRequest"',
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
                     
                     $first_tag = explode('</FareRequestResult><PstrFinalOutPut>', $keep_array[1]);       
                    
                     $get_less =  str_replace("&lt;","<",$first_tag[1]);
                     $get_full =  str_replace("&gt;",">",$get_less);

                     $final = explode('</PstrFinalOutPut><pstrError /></FareRequestResponse>', $get_full);

                    $response = simplexml_load_string($final[0]);
                    
                   //return print_r($response);
                  return $response->FareRules;
                }
    } 
   public  function _remove_empty_internal($value) {
        return !empty($value) || $value === 0;
}
    public function getFareTax($airlineId, $flightId, $classCode, $track, $basicAmount, $infant, $child, $adult,$tourType){
        $url = FLIGHTURL;
       if($tourType == 'R'){
           $inc = 2;
       }else{
           $inc = 1;
       }
       $array = explode(",", $flightId);    
      $arrval = array_map('trim', $array);
       $arrayair = explode(",", $airlineId);    
      $arrvalair = array_map('trim', $arrayair);
      $str = '';
      $p = 0;
      $cnt = count($arrval);
      foreach($arrval as $arr){
          if($arr !=''){
          $str .= '
                     &lt;Item&gt;                            
                        &lt;FlightId&gt;'.$arr.'&lt;/FlightId&gt;                            
                        &lt;ClassCode&gt;'.$classCode.'&lt;/ClassCode&gt;
                        &lt;AirlineId&gt;'.$arrvalair[$p].'&lt;/AirlineId&gt;
                        &lt;EticketFlag&gt;1&lt;/EticketFlag&gt;';
          if($cnt == ($p+2) ){
              $str .= ' 
                      &lt;BasicAmt&gt;'.$basicAmount.'&lt;/BasicAmt&gt;
                    &lt;/Item&gt;
                  ';
          }else{
               $str .=  '
                   &lt;BasicAmt&gt;&lt;/BasicAmt&gt;
                    &lt;/Item&gt;
                  ';
          }
                       
          $p++;
          }
      }
        $curlData = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope
                    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <soap:Header>
                        <ns1:clsSecurity soap:mustUnderstand="false"
                    xmlns:ns1="http://tempuri.org/WsHermes/Service1">
                          <ns1:WebProviderLoginId>'.FLIGHTID.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.FLIGHTPASS.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                 <FlightTax xmlns="http://tempuri.org/HERMESAPI/IntHermesAir">
                    <pobjSecurity>
                        <WebProviderLoginId>'.FLIGHTID.'</WebProviderLoginId>
                        <WebProviderPassword>'.FLIGHTPASS.'</WebProviderPassword>
                        <IsAgent>false</IsAgent>   
                    </pobjSecurity>
                    <PstrInput>
                            &lt;TAXREQUEST&gt;
                                &lt;UserTrackId&gt;'.$track.'&lt;/UserTrackId&gt;                            
                                &lt;AirlineId&gt;'.$arrvalair['0'].'&lt;/AirlineId&gt;                            
                                &lt;FlightDetails&gt;                            
                                   '. $str.'
                               &lt;/FlightDetails&gt;
                            &lt;/TAXREQUEST&gt;
                    </PstrInput>
                    <PstrFinalOutPut /><pstrError/>
                </FlightTax>
            </soap:Body></soap:Envelope>';
      // return  $curlData;
             $curl = curl_init();

                curl_setopt ($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl,CURLOPT_TIMEOUT,120);

                curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                    'SOAPAction:"'.FLIGHTACTION.'FlightTax"',
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
                     
                     $first_tag = explode('</FlightTaxResult><PstrFinalOutPut>', $keep_array[1]);       
                    
                     $get_less =  str_replace("&lt;","<",$first_tag[1]);
                     $get_full =  str_replace("&gt;",">",$get_less);

                     $final = explode('</PstrFinalOutPut><pstrError /></FlightTaxResponse>', $get_full);

                    $response = simplexml_load_string($final[0]);
                    
                //  echo "<pre>";  print_r($response); die();
                   $tax = 0.00;
                   foreach($response->FlightDetails->Item->Adult->Tax->Item as $cnt){
                      $tax =  ($tax + ($adult * $cnt->TaxAmt)); 
                   }
                   foreach($response->FlightDetails->Item->Child->Tax->Item as $cnt1){
                      $tax = ($tax + ($child * $cnt1->TaxAmt)); 
                   }
                   foreach($response->FlightDetails->Item->Infant->Tax->Item as $cnt2){
                      $tax = ($tax + ($infant * $cnt2->TaxAmt)); 
                   }
                   $tr = ((($adult * $response->FlightDetails->Item->Adult->TransactionAmount) + ( $child * $response->FlightDetails->Item->Child->TransactionAmount) + ($infant * $response->FlightDetails->Item->Infant->TransactionAmount)));
                   $sr =  ((($adult * $response->FlightDetails->Item->Adult->ServiceAmount) + ( $child * $response->FlightDetails->Item->Child->ServiceAmount) + ($infant * $response->FlightDetails->Item->Infant->ServiceAmount)));
                   $pr =  ((($adult * $response->FlightDetails->Item->Adult->Commission) + ( $child * $response->FlightDetails->Item->Child->Commission) + ($infant * $response->FlightDetails->Item->Infant->Commission)));
                   $style= "style='border-bottom:1px solid #ccc;'";
                   $style1= "style='border-bottom:1px solid #000;background-color:#ccc;'";
                   $th= "style='padding:5px;font-weight:boald;'";
                   $td= "style='padding-left:5px;padding-right:5px;'";
                   $table= "style='border:1px solid #000;'";
                   $val = '';
                   $val .= "<h4>FARE DETAILS</h4>";
                   $val .= "<table  width='100%' ".$table.">";
                   
                   $val .= "<tr ".$style.">";
                   $val .= "<td ".$td.">".$adult." Adult</td>";
                   $val .= '<td class="pull-right" '.$td.'>';
                   $val .= '<em class="fa fa-rupee"></em>'.$s_adult =  ($adult * $response->FlightDetails->Item->Adult->BasicAmt);
                   $val .= '</td></tr>';
                   
                   $val .= "<tr ".$style.">";
                   $val .= "<td ".$td.">".$child." Child</td>";
                   $val .= '<td class="pull-right" '.$td.'>';
                   $val .= '<em class="fa fa-rupee"></em>'.$s_child =  ($child * $response->FlightDetails->Item->Child->BasicAmt);
                   $val .= '</td></tr>';
                   
                   $val .= "<tr ".$style.">";
                   $val .= "<td ".$td.">".$infant." Infant</td>";
                   $val .= '<td class="pull-right" '.$td.'>';
                   $val .= '<em class="fa fa-rupee"></em>'.$s_infant = ($infant * $response->FlightDetails->Item->Infant->BasicAmt);
                   $val .= '</td></tr>';
                   
                   $val .= "<tr ".$style1.">";
                   $val .= "<th ".$th.">Total</th>";
                   $val .= '<th class="pull-right" '.$th.'>';
                   $val .= '<em class="fa fa-rupee"></em>'.($s_adult + $s_child + $s_infant);
                   $val .= '</th></tr>';
                   /*************************/
                   $val .= "<tr ".$style.">";
                   $val .= "<td ".$td.">Tax</td>";
                   $val .= '<td class="pull-right" '.$td.'>';
                   $val .= '<em class="fa fa-rupee"></em>'.$tax;
                   $val .= '</td></tr>';
                   
                   $val .= "<tr ".$style.">";
                   $val .= "<td ".$td.">Transaction Charge</td>";
                   $val .= '<td class="pull-right" '.$td.'>';
                   $val .= '<em class="fa fa-rupee"></em>'.$tr;
                   $val .= '</td></tr>';
                   
                   $val .= "<tr ".$style.">";
                   $val .= "<td ".$td.">Service Charge</td>";
                   $val .= '<td class="pull-right" '.$td.'>';
                   $val .= '<em class="fa fa-rupee"></em>'.$sr;
                   $val .= '</td></tr>';
                   
                   $val .= "<tr ".$style.">";
                   $val .= "<td ".$td.">Processing Fee</td>";
                   $val .= '<td class="pull-right" '.$td.'>';
                   $val .= '<em class="fa fa-rupee"></em>'.$pr;
                   $val .= '</td></tr>';
                   
                   $val .= "<tr ".$style1.">";
                   $val .= "<th ".$th.">Grand Total</th>";
                   $val .= '<th class="pull-right" '.$th.'>';
                   $val .= '<em class="fa fa-rupee"></em>'.($s_adult + $s_child + $s_infant + $tr + $sr + $pr + $tax);
                   $val .= '</th></tr>';
                   $val .= '</table>';
                   
                  return $val;
                }
    }
    
    public function getFareTotal($airlineId, $flightId, $classCode, $track, $basicAmount, $infant, $child, $adult,$tourType){
        $url = FLIGHTURL;
       if($tourType == 'R'){
           $inc = 2;
       }else{
           $inc = 1;
       }
        $url = FLIGHTURL;
       if($tourType == 'R'){
           $inc = 2;
       }else{
           $inc = 1;
       }
       $array = explode(",", $flightId);    
      $arrval = array_map('trim', $array);
       $arrayair = explode(",", $airlineId);    
      $arrvalair = array_map('trim', $arrayair);
      $str = '';
      $p = 0;
      $cnt = count($arrval);
      foreach($arrval as $arr){
          if($arr !=''){
          $str .= '
                     &lt;Item&gt;                            
                        &lt;FlightId&gt;'.$arr.'&lt;/FlightId&gt;                            
                        &lt;ClassCode&gt;'.$classCode.'&lt;/ClassCode&gt;
                        &lt;AirlineId&gt;'.$arrvalair[$p].'&lt;/AirlineId&gt;
                        &lt;EticketFlag&gt;1&lt;/EticketFlag&gt;';
          if($cnt == ($p+2) ){
              $str .= ' 
                      &lt;BasicAmt&gt;'.$basicAmount.'&lt;/BasicAmt&gt;
                    &lt;/Item&gt;
                  ';
          }else{
               $str .=  '
                   &lt;BasicAmt&gt;&lt;/BasicAmt&gt;
                    &lt;/Item&gt;
                  ';
          }
                       
          $p++;
          }
      }
        $curlData = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope
                    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <soap:Header>
                        <ns1:clsSecurity soap:mustUnderstand="false"
                    xmlns:ns1="http://tempuri.org/WsHermes/Service1">
                          <ns1:WebProviderLoginId>'.FLIGHTID.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.FLIGHTPASS.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                 <FlightTax xmlns="http://tempuri.org/HERMESAPI/IntHermesAir">
                    <pobjSecurity>
                        <WebProviderLoginId>'.FLIGHTID.'</WebProviderLoginId>
                        <WebProviderPassword>'.FLIGHTPASS.'</WebProviderPassword>
                        <IsAgent>false</IsAgent>   
                    </pobjSecurity>
                    <PstrInput>
                            &lt;TAXREQUEST&gt;
                                &lt;UserTrackId&gt;'.$track.'&lt;/UserTrackId&gt;                            
                                &lt;AirlineId&gt;'.$arrvalair['0'].'&lt;/AirlineId&gt;                            
                                &lt;FlightDetails&gt;                            
                                   '. $str.'
                               &lt;/FlightDetails&gt;
                            &lt;/TAXREQUEST&gt;
                    </PstrInput>
                    <PstrFinalOutPut /><pstrError/>
                </FlightTax>
            </soap:Body></soap:Envelope>';
             $curl = curl_init();

                curl_setopt ($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl,CURLOPT_TIMEOUT,120);

                curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                    'SOAPAction:"'.FLIGHTACTION.'FlightTax"',
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
                     
                     $first_tag = explode('</FlightTaxResult><PstrFinalOutPut>', $keep_array[1]);       
                    
                     $get_less =  str_replace("&lt;","<",$first_tag[1]);
                     $get_full =  str_replace("&gt;",">",$get_less);

                     $final = explode('</PstrFinalOutPut><pstrError /></FlightTaxResponse>', $get_full);

                    $response = simplexml_load_string($final[0]);
                    
                  // return print_r($response);
                   $tax = 0.00;
                   foreach($response->FlightDetails->Item->Adult->Tax->Item as $cnt){
                      $tax = $tax + ($adult * $cnt->TaxAmt); 
                   }
                   foreach($response->FlightDetails->Item->Child->Tax->Item as $cnt1){
                      $tax = $tax + ($child * $cnt1->TaxAmt); 
                   }
                   foreach($response->FlightDetails->Item->Infant->Tax->Item as $cnt2){
                      $tax = $tax + ($infant * $cnt2->TaxAmt); 
                   }
                   $tr = (($adult * $response->FlightDetails->Item->Adult->TransactionAmount) + ( $child * $response->FlightDetails->Item->Child->TransactionAmount) + ($infant * $response->FlightDetails->Item->Infant->TransactionAmount));
                   $sr = (($adult * $response->FlightDetails->Item->Adult->ServiceAmount) + ( $child * $response->FlightDetails->Item->Child->ServiceAmount) + ($infant * $response->FlightDetails->Item->Infant->ServiceAmount));
                   $pr = (($adult * $response->FlightDetails->Item->Adult->Commission) + ( $child * $response->FlightDetails->Item->Child->Commission) + ($infant * $response->FlightDetails->Item->Infant->Commission));
                   
                   $s_adult = ($adult * $response->FlightDetails->Item->Adult->BasicAmt);
                   $s_child = ($child * $response->FlightDetails->Item->Child->BasicAmt);
                   $s_infant = ($infant * $response->FlightDetails->Item->Infant->BasicAmt);
                   $total = ($s_adult + $s_child + $s_infant + $tr + $sr + $pr + $tax);
                  
                   
                  return $total;
                }
    }
    
    /*****************************
     ****** Book Ticket **********
     ****************************/
    
    public function bookTicket($tourType = 'O'){ 
        $url = FLIGHTURL;       
     
      $city = $this->input->post('city');
      $code = $this->input->post('code');
      $cc = $this->input->post('classCode');
       $inc = 0;
       
       $cat   = $this->input->post('cat');
       $title   = $this->input->post('title');
       $first_n = $this->input->post('first_name');
       $last_n  = $this->input->post('last_name');
       $dob     = $this->input->post('dob');
       $pp      = $this->input->post('pp');
       $expiry  = $this->input->post('expiry');
       $myf = $this->input->post('f_Id');
       $my_name = $first_n['0'].' '.$last_n['0'];
      
       $dynamic = '';
       for($i=0; $i< count($this->input->post('first_name')); $i++){
            if($title[$i] == 'Mr'){
                $gen = 'M';
            }else{
               $gen = 'F'; 
            }
            //$adob = explode("/", $dob[$i]);
            //$mydob = $adob['1'].'/'.$adob['0'].'/'.$adob['2'];
            $mydob = $dob[$i];
            
            $apa = explode("/", $expiry[$i]);
            $mypa = $apa['1'].'/'.$apa['0'].'/'.$apa['2'];
            if($this->input->post('type') == 'O'){
                $dynamic .= '&lt;item&gt;  
                            &lt;PassengerType&gt;'.$cat[$i].'&lt;/PassengerType&gt;                            
                            &lt;Title&gt;'.$title[$i].'&lt;/Title&gt;                            
                            &lt;FirstName&gt;'.$first_n[$i].'&lt;/FirstName&gt;                            
                            &lt;LastName&gt;'.$last_n[$i].'&lt;/LastName&gt;
                            &lt;PassportNo&gt;'.$pp[$i].'&lt;/PassportNo&gt;
                            &lt;Gender&gt;'.$gen.'&lt;/Gender&gt;
                            &lt;PassportExpirtyDate&gt;'.$mypa.'&lt;/PassportExpirtyDate&gt;
                            &lt;PassportIssuingCountry&gt;India3&lt;/PassportIssuingCountry&gt;
                            &lt;Nationality&gt;India4353&lt;/Nationality&gt;
                            &lt;DateofBirth&gt;'.$mydob.'&lt;/DateofBirth&gt;
                            &lt;Segment&gt;
                            ';
                            foreach($this->input->post('f_Id') as $f_id){
                               
                                $dynamic .= '&lt;item&gt;
                                                &lt;FlightId&gt;'.$f_id.'&lt;/FlightId&gt;
                                                &lt;ClassCode&gt;'.$cc['0'].'&lt;/ClassCode&gt;
                                                &lt;SpRequestId&gt;&lt;/SpRequestId&gt;
                                                &lt;FrequentFlyerId&gt;&lt;/FrequentFlyerId&gt;
                                                &lt;FrequentFlyerNumber&gt;&lt;/FrequentFlyerNumber&gt;
                                                &lt;MealsPrefId&gt;&lt;/MealsPrefId&gt;
                                                &lt;SeatPrefId&gt;&lt;/SeatPrefId&gt;
                                            &lt;/item&gt;';
                               
                            } 
                                $inc++;
                         $dynamic .= '
                             &lt;/Segment&gt;
                          &lt;/item&gt; 
                        ';
            }else{
                $dynamic .= '&lt;item&gt;  
                            &lt;PassengerType&gt;'.$cat[$i].'&lt;/PassengerType&gt;                            
                            &lt;Title&gt;'.$title[$i].'&lt;/Title&gt;                            
                            &lt;FirstName&gt;'.$first_n[$i].'&lt;/FirstName&gt;                            
                            &lt;LastName&gt;'.$last_n[$i].'&lt;/LastName&gt;
                            &lt;PassportNo&gt;'.$pp[$i].'&lt;/PassportNo&gt;
                            &lt;Gender&gt;'.$gen.'&lt;/Gender&gt;
                            &lt;PassportExpirtyDate&gt;'.$mypa.'&lt;/PassportExpirtyDate&gt;
                            &lt;PassportIssuingCountry&gt;India3&lt;/PassportIssuingCountry&gt;
                            &lt;Nationality&gt;India4353&lt;/Nationality&gt;
                            &lt;DateofBirth&gt;'.$mydob.'&lt;/DateofBirth&gt;
                            &lt;Segment&gt;
                            ';
                            foreach($this->input->post('f_Id') as $f_id){
                               
                                $dynamic .= '&lt;item&gt;
                                                &lt;FlightId&gt;'.$f_id.'&lt;/FlightId&gt;
                                                &lt;ClassCode&gt;'.$cc[$inc].'&lt;/ClassCode&gt;
                                                &lt;SpRequestId&gt;&lt;/SpRequestId&gt;
                                                &lt;FrequentFlyerId&gt;&lt;/FrequentFlyerId&gt;
                                                &lt;FrequentFlyerNumber&gt;&lt;/FrequentFlyerNumber&gt;
                                                &lt;MealsPrefId&gt;&lt;/MealsPrefId&gt;
                                                &lt;SeatPrefId&gt;&lt;/SeatPrefId&gt;
                                            &lt;/item&gt;';
                                $inc++;
                            }
                                
                         $dynamic .= '
                             &lt;/Segment&gt;
                          &lt;/item&gt; 
                        ';
            }
            
            
       }
      
        $curlData = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope
                    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <soap:Header>
                        <ns1:clsSecurity soap:mustUnderstand="false"
                    xmlns:ns1="http://tempuri.org/WsHermes/Service1">
                          <ns1:WebProviderLoginId>'.FLIGHTID.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.FLIGHTPASS.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                 <IntFlightBookingV1 xmlns="http://tempuri.org/HERMESAPI/IntHermesAir">
                    <pobjSecurity>
                        <WebProviderLoginId>'.FLIGHTID.'</WebProviderLoginId>
                        <WebProviderPassword>'.FLIGHTPASS.'</WebProviderPassword>
                        <IsAgent>false</IsAgent>   
                    </pobjSecurity>
                    <PstrInput>
                            &lt;AIRBOOKING&gt;
                                &lt;UserTrackId&gt;'.$this->input->post('track').'&lt;/UserTrackId&gt; 
                                &lt;CustomerDetails&gt;       
                                    &lt;PhoneNumber&gt;'.$this->input->post('mobile_no').'&lt;/PhoneNumber&gt;                            
                                    &lt;CustomerTitle&gt;'.$title['0'].'&lt;/CustomerTitle&gt;
                                    &lt;BookedByCusomter&gt;'.$my_name.'&lt;/BookedByCusomter&gt;
                                    &lt;CustomerAddr&gt;'.$this->input->post('add').'&lt;/CustomerAddr&gt;
                                    &lt;CustomerCity&gt;'.$city['0'].'&lt;/CustomerCity&gt;
                                    &lt;CustomerCountryId&gt;99&lt;/CustomerCountryId&gt;
                                    &lt;CustomerEmail&gt;'.$this->input->post('login_email').'&lt;/CustomerEmail&gt;
                                    &lt;PinCode&gt;'.$this->input->post('zip').'&lt;/PinCode&gt;
                               &lt;/CustomerDetails&gt;
                               &lt;SpecialRemarks&gt;&lt;/SpecialRemarks&gt;
                               &lt;SendingMail&gt;0&lt;/SendingMail&gt;
                               &lt;SendingSMS&gt;0&lt;/SendingSMS&gt;
                               &lt;No_of_Adults&gt;'.$this->input->post('adult').'&lt;/No_of_Adults&gt;
                               &lt;No_of_Child&gt;'.$this->input->post('child').'&lt;/No_of_Child&gt;
                               &lt;No_of_Infants&gt;'.$this->input->post('infrount').'&lt;/No_of_Infants&gt;
                               &lt;TravelTypeId&gt;'.$this->input->post('type').'&lt;/TravelTypeId&gt;
                               &lt;TotalAmount&gt;'.$this->input->post('amt').'&lt;/TotalAmount&gt;
                                 &lt;FrequentFlyer&gt;                            
                                    &lt;item&gt;                            
                                        &lt;NamePosition&gt;&lt;/NamePosition&gt;                            
                                        &lt;FreqFlyerAirline&gt;&lt;/FreqFlyerAirline&gt;
                                        &lt;FreqFlyerNumber&gt;&lt;/FreqFlyerNumber&gt;
                                    &lt;/item&gt;
                               &lt;/FrequentFlyer&gt; 
                               &lt;SPECIALREQUEST&gt;                            
                                    &lt;item&gt;                            
                                        &lt;SegmantNumber&gt;&lt;/SegmantNumber&gt;                            
                                        &lt;SpecialReqDetails&gt;
                                             &lt;NamePosition&gt;&lt;/NamePosition&gt;
                                             &lt;SSRCode&gt;&lt;/SSRCode&gt;
                                        &lt;/SpecialReqDetails&gt;
                                    &lt;/item&gt;
                               &lt;/SPECIALREQUEST&gt; 
                                &lt;MEALREQUEST&gt;                            
                                    &lt;item&gt;                            
                                        &lt;SegmantNumber&gt;&lt;/SegmantNumber&gt;                            
                                        &lt;MealReqDetails&gt;
                                             &lt;NamePosition&gt;&lt;/NamePosition&gt;
                                             &lt;MealCode&gt;&lt;/MealCode&gt;
                                        &lt;/MealReqDetails&gt;
                                    &lt;/item&gt;
                               &lt;/MEALREQUEST&gt;
                               &lt;Bookingdetails&gt; 
                                    &lt;AirLinesId&gt;'.$code['0'].'&lt;/AirLinesId&gt;
                                    &lt;Payment&gt;
                                        &lt;CurrencyCode&gt;INR&lt;/CurrencyCode&gt;
                                        &lt;Amount&gt;'.$this->input->post('amt').'&lt;/Amount&gt;
                                    &lt;/Payment&gt;
                                    &lt;TourCode&gt;&lt;/TourCode&gt;
                                    &lt;PassengerDetail&gt;
                                                                   
                                            '.$dynamic.'
                                       
                                    &lt;/PassengerDetail&gt;
                               &lt;/Bookingdetails&gt;
                            &lt;/AIRBOOKING&gt;
                    </PstrInput>
                    <PstrFinalOutPut /><pstrError/>
                </IntFlightBookingV1>
            </soap:Body></soap:Envelope>';
      //echo $curlData."<br><br>";
              
             $curl = curl_init();

                curl_setopt ($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl,CURLOPT_TIMEOUT,120);

                curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                    'SOAPAction:"'.FLIGHTACTION.'IntFlightBookingV1"',
                    'Content-Type: text/xml; charset=utf-8;',
                ));

                 curl_setopt ($curl, CURLOPT_POST, 1);

                curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

                 $result = curl_exec($curl); 

                curl_close ($curl);
               // print_r($result);
               //  echo "<br>";
                $keep_array = explode('true', $result);
                if(count($keep_array)!= 2 ){
                    return "Please try after some time.";
                }else{
                     
                     $first_tag = explode('</IntFlightBookingV1Result><PstrFinalOutPut>', $keep_array[1]);       
                    
                     $get_less =  str_replace("&lt;","<",$first_tag[1]);
                     $get_full =  str_replace("&gt;",">",$get_less);

                     $final = explode('</PstrFinalOutPut><pstrError /></IntFlightBookingV1Response>', $get_full);

                    $response = simplexml_load_string($final[0]);
                   //echo "<pre>"; 
                    //print_r($response);
                    
                    
                    if($response->Resultcode == 1){
                        $userTrackId        =  $response->Item->UserTrackId;
                        $hermesPNR          =  $response->Item->TicketDetails->HermesPNR;
                        $transactionid      =  $response->Item->TicketDetails->Transactionid;
                        $phoneNumber        =  $response->Item->TicketDetails->CusomterDetails->PhoneNumber;
                        $bookedByCusomter   =  $response->Item->TicketDetails->CusomterDetails->BookedByCusomter;
                        $airlineCode        =  $response->Item->TicketDetails->AirLineDetails->Item->AirlineCode;
                        $airlinePNR         =  $response->Item->TicketDetails->AirLineDetails->Item->AirlinePNR;
                        $airlineName        =  $response->Item->TicketDetails->AirLineDetails->Item->AirlineName;
                        $airlineAddr1       =  $response->Item->TicketDetails->AirLineDetails->Item->AirlineAddr1;
                        $airlineCity        =  $response->Item->TicketDetails->AirLineDetails->Item->AirlineCity;
                        $airPhoneNumber     =  $response->Item->TicketDetails->AirLineDetails->Item->PhoneNumber;
                        $MailId             =  $response->Item->TicketDetails->AirLineDetails->Item->MailId;
                        $disclaimerId       =  $response->Item->TicketDetails->DisclaimerId;
                        $totalAmount        =  $response->Item->TicketDetails->TotalAmount;
                        $adults             =  $response->Item->TicketDetails->Adults;
                        $child              =  $response->Item->TicketDetails->Child;
                        $infants            =  $response->Item->TicketDetails->Infants;
                        $bookingType        =  $response->Item->TicketDetails->BookingType;
                        $travelType         =  $response->Item->TicketDetails->TravelType;
                        $issueDate          =  $response->Item->TicketDetails->IssueDate;
                        $baseOrigin         =  $response->Item->TicketDetails->BaseOrigin;
                        $baseDestination    =  $response->Item->TicketDetails->BaseDestination;
                        $date = date('Y-m-d');
                        $backup = array(
                            'UserTrackId'       => "$userTrackId",
                            'HermesPNR'         => "$hermesPNR",
                            'Transactionid'     => "$transactionid",
                            'PhoneNumber'       => "$phoneNumber",
                            'BookedByCusomter'  => "$bookedByCusomter",
                            'AirlineCode'       => "$airlineCode",
                            'AirlinePNR'        => "$airlinePNR",
                            'AirlineName'       => "$airlineName",
                            'AirlineAddr1'      => "$airlineAddr1",
                            'AirlineCity'       => "$airlineCity",
                            'AirPhoneNumber'    => "$airPhoneNumber",
                            'MailId'            => "$MailId",
                            'DisclaimerId'      => "$disclaimerId",
                            'TotalAmount'       => "$totalAmount",
                            'Adults'            => "$adults",
                            'Child'             => "$child",
                            'Infants'           => "$infants",
                            'BookingType'       => "$bookingType",
                            'TravelType'        => "$travelType",
                            'IssueDate'         => "$issueDate",
                            'BaseOrigin'        => "$baseOrigin",
                            'BaseDestination'   => "$baseDestination",
                            'DoneBy'            => $this->session->userdata('login_id'),
                            'DoneDate'          => "$date"
                       ); 
                       $insert = $this->db->insert('flight_track',$backup);
                      
                        if($this->db->affected_rows() == 1){
                            $inserted = $this->db->insert_id();
                            foreach($response->Item->TicketDetails->PassengerDetails->Item as $item){
                                $flightNumber       = $item->SegmentDetails->Item->FlightNumber;
                                $airCraftType       = $item->SegmentDetails->Item->AirCraftType;
                                $origin             = $item->SegmentDetails->Item->Origin;
                                $originAirport      = $item->SegmentDetails->Item->OriginAirport;
                                $departuredatetime  = $item->SegmentDetails->Item->Departuredatetime;
                                $destination        = $item->SegmentDetails->Item->Destination;
                                $arrivaldatetime    = $item->SegmentDetails->Item->Arrivaldatetime;
                                $carrierAirLineCode = $item->SegmentDetails->Item->CarrierAirLineCode;
                                $classCode          = $item->SegmentDetails->Item->ClassCode;
                                $classCodeDesc      = $item->SegmentDetails->Item->ClassCodeDesc;
                                $baggageAllowed     = $item->SegmentDetails->Item->BaggageAllowed;
                                
                                $ticket = array(
                                    'FTrackID'              => $inserted,
                                    'TicketNo'              => "$item->TicketNo",
                                    'TransmissionControlNo' => "$item->TransmissionControlNo",
                                    'TYPE'                  => "$item->TYPE",
                                    'Title'                 => "$item->Title",
                                    'FirstName'             => "$item->FirstName",
                                    'Lastname'              => "$item->Lastname",
                                    'Age'                   => "$item->Age",
                                    'IdentityProofId'       => "$item->IdentityProofId",
                                    'IdentityProofNumber'   => "$item->IdentityProofNumber",
                                    'FlightNumber'          => "$flightNumber",
                                    'AirCraftType'          => "$airCraftType",
                                    'Origin'                => "$origin",
                                    'OriginAirport'         => "$originAirport",
                                    'Departuredatetime'     => "$departuredatetime",
                                    'Destination'           => "$destination",
                                    'Arrivaldatetime'       => "$arrivaldatetime",
                                    'CarrierAirLineCode'    => "$carrierAirLineCode",
                                    'ClassCode'             => "$classCode",
                                    'ClassCodeDesc'         => "$classCodeDesc",
                                    'BaggageAllowed'        => "$baggageAllowed",
                                );
                                $insert_tick = $this->db->insert('flight_passenger',$ticket);
                            }
                           
                            if($this->db->affected_rows() > 0){
                                return 1;
                            }else{
                                return "Please try after some time.";
                            }
                        }                        
                    }else if($response->Resultcode == 2){
                        return 2;
                    }else if($response->Resultcode == 0){
                         return $response->ResultCode->Error->Remarks;
                    }else if($response->Resultcode->Status == 0){
                         return $response->ResultCode->Error->Remarks;
                    }else{
                        return $response->ResultCode->Error->Remarks;
                    }
                   
                }//die();
              
    }
    /*
     * Check ticket booking status
     */
    public function checkStatus($track){
        $url = FLIGHTURL;
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope
                    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <soap:Header>
                        <ns1:clsSecurity soap:mustUnderstand="false"
                    xmlns:ns1="http://tempuri.org/WsHermes/Service1">
                          <ns1:WebProviderLoginId>'.FLIGHTID.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.FLIGHTPASS.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                 <CheckTransactionStatus xmlns="http://tempuri.org/HERMESAPI/IntHermesAir">
                    <pobjSecurity>
                        <WebProviderLoginId>'.FLIGHTID.'</WebProviderLoginId>
                        <WebProviderPassword>'.FLIGHTPASS.'</WebProviderPassword>
                        <IsAgent>false</IsAgent>   
                    </pobjSecurity>
                    <PstrInput>
                            &lt;CheckTransReq&gt;
                                &lt;TrackId&gt;'.$track.'&lt;/TrackId&gt;
                            &lt;/CheckTransReq&gt;
                    </PstrInput>
                    <PstrFinalOutPut /><pstrError/>
                </CheckTransactionStatus>
            </soap:Body></soap:Envelope>';
       // echo $curlData;
        $curl = curl_init();

           curl_setopt ($curl, CURLOPT_URL, $url);
           curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($curl,CURLOPT_TIMEOUT,120);

           curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
               'SOAPAction:"'.FLIGHTACTION.'CheckTransactionStatus"',
               'Content-Type: text/xml; charset=utf-8;',
           ));

            curl_setopt ($curl, CURLOPT_POST, 1);

           curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl); 

           curl_close ($curl);
          
            $keep_array = explode('true', $result);
                if(count($keep_array)!= 1 ){
                    return 0;
                }else{
                     
                    $first_tag = explode('<CheckTransactionStatusResponse xmlns="http://tempuri.org/HERMESAPI/IntHermesAir"><PstrFinalOutPut>', $keep_array[0]);       

                    $get_less =  str_replace("&lt;","<",$first_tag['1']);
                    $get_full =  str_replace("&gt;",">",$get_less);

                    $final = explode('</PstrFinalOutPut><pstrError /></CheckTransactionStatusResponse></soap:Body>', $get_full);

                   $response = simplexml_load_string($final['0']);
                   $ref = array('Refrence' => "$response->Remarks",'stat' => "$response->StatusCode");
                   $this->db->where('UserTrackId',"$track");
                   $update = $this->db->update('flight_track',$ref);  
                    return $response->StatusCode;
          }
    }
    
    /*
     * Get ticket details
     */
    public function getTicketDetails($track){
        $query = $this->db->get_where('flight_track', array('UserTrackId' => $track));
        if($query && $query->num_rows()== 1){
              return $query->row();
           }else{
               return array();
           }
    }
     /*
      * Get the tickets
      */
    public function getTicket($trackId){
        $query = $this->db->get_where('flight_passenger', array('FTrackID' => $trackId));
        if($query && $query->num_rows()> 0){
              return $query->result();
           }else{
               return array();
           }
    }
    
    /**
     * Flight report 
     */
    public function flight_reports($gefr,$geto,$val){
         $this->db->select("r.*");
        $this->db->from("flight_track as r");
        $this->db->where("DoneBy",$val);
        $this->db->where("DoneDate >=",$gefr);
        $this->db->where("DoneDate <=",$geto);
        $this->db->order_by('r.F_ID', 'desc');
        $qu     =   $this->db->get();
       // echo $this->db->last_query();exit;
        return $qu->result();
    }
    /*
     * cancellation of ticket
     */
    public function cancellation(){
        $hrm = $this->input->post('esyPNR');
        $air = $this->input->post('airPNR');
        $typ = $this->input->post('cancType');
        
        $url = FLIGHTURL;
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope
                    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <soap:Header>
                        <ns1:clsSecurity soap:mustUnderstand="false"
                    xmlns:ns1="http://tempuri.org/WsHermes/Service1">
                          <ns1:WebProviderLoginId>'.FLIGHTID.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.FLIGHTPASS.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                 <Cancellation xmlns="http://tempuri.org/HERMESAPI/IntHermesAir">
                    <pobjSecurity>
                        <WebProviderLoginId>'.FLIGHTID.'</WebProviderLoginId>
                        <WebProviderPassword>'.FLIGHTPASS.'</WebProviderPassword>
                        <IsAgent>false</IsAgent>   
                    </pobjSecurity>
                    <PstrInput>
                            &lt;cancellation&gt;
                                &lt;HermesPNR&gt;'.$hrm.'&lt;/HermesPNR&gt;
                                &lt;AirlinePNR&gt;'.$air.'&lt;/AirlinePNR&gt;
                                &lt;CancelStatus&gt;'.$typ.'&lt;/CancelStatus&gt;
                            &lt;/cancellation&gt;
                    </PstrInput>
                    <PstrFinalOutPut /><pstrError/>
                </Cancellation>
            </soap:Body></soap:Envelope>';
       // echo $curlData;
        $curl = curl_init();

           curl_setopt ($curl, CURLOPT_URL, $url);
           curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($curl,CURLOPT_TIMEOUT,120);

           curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
               'SOAPAction:"'.FLIGHTACTION.'Cancellation"',
               'Content-Type: text/xml; charset=utf-8;',
           ));

            curl_setopt ($curl, CURLOPT_POST, 1);

           curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl); 

           curl_close ($curl);
         
           $keep_array = explode('true', $result);
                if(count($keep_array)!= 2 ){
                    return "Please try after some time.";
                }else{
                     
                     $first_tag = explode('</CancellationResult><PstrFinalOutPut>', $keep_array[1]);       
                    
                     $get_less =  str_replace("&lt;","<",$first_tag[1]);
                     $get_full =  str_replace("&gt;",">",$get_less);

                     $final = explode('</PstrFinalOutPut><pstrError /></CancellationResponse>', $get_full);

                    $response = simplexml_load_string($final[0]);
//                    echo "<pre>";
//                    print_r($response);
//                    die();
                    if($response->Status == 1){
                        if($typ == 0){
                            return $response;
                        }else{
                             $myq=$this->db->query("SELECT F_ID FROM flight_track WHERE HermesPNR = '$hrm'");
                             $idval = $myq->row()->F_ID;
                             $ref = array('Status' => "2");
                            $this->db->where('FTrackID',$idval);
                            $update = $this->db->update('flight_passenger',$ref); 
                            return '';
                        }
                    } else{
                    return $response->Error->Remarks;
                }
               
                
          }
    }
    
    /*
     * Cancle it ticket
     */
    public function cancleIt(){
         $url = FLIGHTURL;
       
        $curlData = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope
                    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <soap:Header>
                        <ns1:clsSecurity soap:mustUnderstand="false"
                    xmlns:ns1="http://tempuri.org/WsHermes/Service1">
                          <ns1:WebProviderLoginId>'.FLIGHTID.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.FLIGHTPASS.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                 <CancelSubmit xmlns="http://tempuri.org/HERMESAPI/IntHermesAir">
                    <pobjSecurity>
                        <WebProviderLoginId>'.FLIGHTID.'</WebProviderLoginId>
                        <WebProviderPassword>'.FLIGHTPASS.'</WebProviderPassword>
                        <IsAgent>false</IsAgent>   
                    </pobjSecurity>
                    <PstrInput>
                            &lt;CancelSubmit&gt;
                                &lt;HermesPNR&gt;'.$this->input->post('HermesPNR').'&lt;/HermesPNR&gt;
                                &lt;AirlinePNR&gt;'.$this->input->post('AirlinePNR').'&lt;/AirlinePNR&gt;
                                &lt;CRSPNR&gt;&lt;/CRSPNR&gt;
                                &lt;PassengerDetails&gt;
                                    &lt;item&gt;
                                        &lt;PaxNo&gt;'.$this->input->post('PaxNo').'&lt;/PaxNo&gt;
                                        &lt;TicketDetails&gt;
                                            &lt;item&gt;
                                                &lt;TicketNo&gt;'.$this->input->post('TicketNo').'&lt;/TicketNo&gt;
                                                &lt;SegmentId&gt;'.$this->input->post('SegmentId').'&lt;/SegmentId&gt;
                                                &lt;FlightNo&gt;'.$this->input->post('FlightNo').'&lt;/FlightNo&gt;
                                                &lt;Source&gt;'.$this->input->post('Source').'&lt;/Source&gt;
                                                &lt;Destiantion&gt;'.$this->input->post('Destiantion').'&lt;/Destiantion&gt;
                                            &lt;/item&gt;
                                        &lt;/TicketDetails&gt;
                                    &lt;/item&gt;
                                &lt;/PassengerDetails&gt;                               
                            &lt;/CancelSubmit&gt;
                    </PstrInput>
                    <PstrFinalOutPut /><pstrError/>
                </CancelSubmit>
            </soap:Body></soap:Envelope>';
        //echo $curlData;
        $curl = curl_init();

           curl_setopt ($curl, CURLOPT_URL, $url);
           curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($curl,CURLOPT_TIMEOUT,120);

           curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
               'SOAPAction:"'.FLIGHTACTION.'CancelSubmit"',
               'Content-Type: text/xml; charset=utf-8;',
           ));

            curl_setopt ($curl, CURLOPT_POST, 1);

           curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

            $result = curl_exec($curl); 

           curl_close ($curl);
         
           $keep_array = explode('true', $result);
                if(count($keep_array)!= 2 ){
                    return "Please try after some time.";
                }else{
                     
                     $first_tag = explode('</CancelSubmitResult><PstrFinalOutPut>', $keep_array[1]);       
                    
                     $get_less =  str_replace("&lt;","<",$first_tag[1]);
                     $get_full =  str_replace("&gt;",">",$get_less);

                     $final = explode('</PstrFinalOutPut><pstrError /></CancelSubmitResponse>', $get_full);

                    $response = simplexml_load_string($final[0]);
//                   echo "<pre>";
//                   print_r($response);
//                  die();
                   if($response->Status == 1){
                        $ref = array('Status' => "2");
                        $this->db->where('TicketNo',$this->input->post('TicketNo'));
                        $update = $this->db->update('flight_passenger',$ref);  
                         return 1;
                   }else{
                       return $response->Error->Remarks;
                   }
                   //die();
          }
    }
    
    /******************************************
     ******************Domestic*************** 
     ****************************************/
    
  public function domesticGetFlight(){
      $url = FLIGHTURLDOM;  
        if($this->input->post('type') == 'O'){
               
                $curlData = '<?xml version="1.0" encoding="utf-8"?>
                    <s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
                    <s:Body>
                         <GetAvailability xmlns="http://hermes-it.in/API">
                            <GetAvailabilityRequest xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
                                <Authentication>
                                    <LoginId>'.FLIGHTID.'</LoginId>
                                    <Password>'.FLIGHTPASS.'</Password>
                                </Authentication>
                                <AvailabilityInput>
                                    <BookingType>'.$this->input->post('type').'</BookingType>
                                    <JourneyDetails>
                                        <TripDetails>
                                            <Origin>'.$this->input->post('from').'</Origin>
                                            <Destination>'.$this->input->post('to').'</Destination>
                                            <TravelDate>'.$this->input->post('departure').'</TravelDate>
                                        </TripDetails>
                                    </JourneyDetails>
                                    <ClassType>'.$this->input->post('class').'</ClassType>
                                    <AirlineCode></AirlineCode>
                                    <AdultCount>'.$this->input->post('adult').'</AdultCount>
                                    <ChildCount>'.$this->input->post('child').'</ChildCount>
                                    <InfantCount>'.$this->input->post('infant').'</InfantCount>
                                    <ResidentofIndia>1</ResidentofIndia>
                                    <Optional1>0</Optional1>
                                    <Optional2>0</Optional2>
                                    <Optional3>0</Optional3>
                                </AvailabilityInput>
                            </GetAvailabilityRequest>
                        </GetAvailability>
                    </s:Body>
                </s:Envelope>';


                  
                
    }else{
        $curlData = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope
                    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <soap:Header>
                        <ns1:clsSecurity soap:mustUnderstand="false"
                    xmlns:ns1="http://tempuri.org/WsHermes/Service1">
                          <ns1:WebProviderLoginId>'.FLIGHTID.'</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>'.FLIGHTPASS.'</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                 <Availablity xmlns="http://tempuri.org/HERMESAPI/IntHermesAir">
                    <pobjSecurity>
                        <WebProviderLoginId>'.FLIGHTIDDOM.'</WebProviderLoginId>
                        <WebProviderPassword>'.FLIGHTPASSDOM.'</WebProviderPassword>
                        <IsAgent>false</IsAgent>   
                    </pobjSecurity>
                    <PstrInput>
                            &lt;AvailabilityReq&gt;
                            &lt;BookingType&gt;'.$this->input->post('type').'&lt;/BookingType&gt;
                            &lt;Details&gt;
                                &lt;Item&gt;
                                    &lt;Source&gt;'.$this->input->post('from').'&lt;/Source&gt;
                                    &lt;Destination&gt;'.$this->input->post('to').'&lt;/Destination&gt;
                                    &lt;Date&gt;'.$this->input->post('departure').'&lt;/Date&gt;
                                &lt;/Item&gt;
                                &lt;Item&gt;
                                    &lt;Source&gt;'.$this->input->post('to').'&lt;/Source&gt;
                                    &lt;Destination&gt;'.$this->input->post('from').'&lt;/Destination&gt;
                                    &lt;Date&gt;'.$this->input->post('return').'&lt;/Date&gt;
                                &lt;/Item&gt;                               
                            &lt;/Details&gt;
                            &lt;ClassTypeId&gt;'.$this->input->post('class').'&lt;/ClassTypeId&gt;
                            &lt;AIRLINES&gt;&lt;/AIRLINES&gt;
                            &lt;Adult&gt;'.$this->input->post('adult').'&lt;/Adult&gt;
                            &lt;Child&gt;'.$this->input->post('child').'&lt;/Child&gt;
                            &lt;Infant&gt;'.$this->input->post('infant').'&lt;/Infant&gt;
                            &lt;ResidentofIndia&gt;1&lt;/ResidentofIndia&gt;
                            &lt;AirlineCode&gt;&lt;/AirlineCode&gt;
                            &lt;DirectAccess&gt;0&lt;/DirectAccess&gt;
                            &lt;/AvailabilityReq&gt;
                    </PstrInput>
                    <PstrFinalOutPut /><pstrError/>
                </Availablity>
            </soap:Body></soap:Envelope>';
    }
//echo $curlData;
                $curl = curl_init();

                curl_setopt ($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl,CURLOPT_TIMEOUT,120);

                curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
                    'SOAPAction:"'.FLIGHTACTIONDOM.'GetAvailability"',
                    'Content-Type: text/xml; charset=utf-8;',
                ));

                 curl_setopt ($curl, CURLOPT_POST, 1);

                curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

                 $result = curl_exec($curl); 

                curl_close ($curl);
               // print_r($result);
                
               
                $keep_array = explode('true', $result);
                if(count($keep_array)!= 2 ){
                    return 0;
                }else{
                     
                     $first_tag = explode('</AvailablityResult><PstrFinalOutPut>', $keep_array[1]);       
                    
                     $get_less =  str_replace("&lt;","<",$first_tag[1]);
                     $get_full =  str_replace("&gt;",">",$get_less);

                     $final = explode('</PstrFinalOutPut><pstrError /></AvailablityResponse>', $get_full);

                    $response = simplexml_load_string($final[0]);
                    
                   // print_r($response);
                  return $response;
                }
  }
    
}