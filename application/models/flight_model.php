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
                          <ns1:WebProviderLoginId>Swamicom</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>Swamicom123</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                 <Availablity xmlns="http://tempuri.org/HERMESAPI/IntHermesAir">
                    <pobjSecurity>
                        <WebProviderLoginId>Swamicom</WebProviderLoginId>
                        <WebProviderPassword>Swamicom123</WebProviderPassword>
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
                          <ns1:WebProviderLoginId>Swamicom</ns1:WebProviderLoginId>
                          <ns1:WebProviderPassword>Swamicom123</ns1:WebProviderPassword>
                          <ns1:IsAgent>false</ns1:IsAgent>
                        </ns1:clsSecurity>
                      </soap:Header>
            <soap:Body>
                 <Availablity xmlns="http://tempuri.org/HERMESAPI/IntHermesAir">
                    <pobjSecurity>
                        <WebProviderLoginId>Swamicom</WebProviderLoginId>
                        <WebProviderPassword>Swamicom123</WebProviderPassword>
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
}