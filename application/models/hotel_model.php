<?php
class Hotel_model extends CI_Model
{
    public function getCity(){
        
        $url = HOTELURL;  
      
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Header>
                   <AuthHeader xmlns="http://tempuri.org/">
                     <B2BCode>'.HOTELBTB.'</B2BCode>
                     <VendorId>'.HOTELID.'</VendorId>
                     <VendorCode>'.HOTELPASS.'</VendorCode>
                   </AuthHeader>
                 </soap:Header>
                <soap:Body>
                     <getAllCities xmlns="http://tempuri.org/" />
                </soap:Body>
            </soap:Envelope>';
        $curl = curl_init();

        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_TIMEOUT,120);

        curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
            'SOAPAction:"'.HOTELACTION.'getAllCities"',
            'Content-Type: text/xml; charset=utf-8;',
        ));

         curl_setopt ($curl, CURLOPT_POST, 1);

        curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

         $result = curl_exec($curl); 

        curl_close ($curl);

        $xml = $result;
        // SimpleXML seems to have problems with the colon ":" in the <xxx:yyy> response tags, so take them out
        $xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
        $xml = simplexml_load_string($xml);
        $json = json_encode($xml);
        $responseArray = json_decode($json,true);
         //print_r($responseArray);die(); 
          return $responseArray;
        
    }
    
    public function getHotel(){
        $url = HOTELURL;  
      
        $curlData = '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Header>
                   <AuthHeader xmlns="http://tempuri.org/">
                     <B2BCode>'.HOTELBTB.'</B2BCode>
                     <VendorId>'.HOTELID.'</VendorId>
                     <VendorCode>'.HOTELPASS.'</VendorCode>
                   </AuthHeader>
                 </soap:Header>
                <soap:Body>
                    <SearchHotels xmlns="http://tempuri.org/">
                      <DestName>'.$this->input->post('loc').'</DestName>
                      <chkIn>'.$this->input->post('in').'</chkIn>
                      <chkOut>'.$this->input->post('out').'</chkOut>
                      <Rcount>'.$this->input->post('room').'</Rcount>
                      <rmInfo>'.$this->input->post('room').','.$this->input->post('adult').','.$this->input->post('child').'~12</rmInfo>
                    </SearchHotels>
                  </soap:Body>
            </soap:Envelope>';
        $curl = curl_init();
echo $curlData;
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_TIMEOUT,120);

        curl_setopt($curl,CURLOPT_HTTPHEADER,array (           
            'SOAPAction:"'.HOTELACTION.'SearchHotels"',
            'Content-Type: text/xml; charset=utf-8;',
        ));

         curl_setopt ($curl, CURLOPT_POST, 1);

        curl_setopt ($curl, CURLOPT_POSTFIELDS, $curlData);

         $result = curl_exec($curl); 

        curl_close ($curl);

        $xml = $result;
        print_r($xml);
        echo "<hr>";die();
        // SimpleXML seems to have problems with the colon ":" in the <xxx:yyy> response tags, so take them out
        //$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
       // $xml = simplexml_load_string($xml);
      //  $json = json_encode($xml);
       // $responseArray = json_decode($json,true);
       // echo "<pre>";
       //  print_r($responseArray);die(); 
        //  return $responseArray;
    }
  
    
}?>