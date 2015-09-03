<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Register_model extends CI_Model
{ 
        public function register($idP,$addp){
                $email      =   $this->input->post("email");
                $pass       =   $this->input->post("pass");
                $stat1      =   $this->input->post("state");
                $mobile     =   $this->input->post("mobile");
                $city1      =   $this->input->post("city");
                $refer1     =   $this->input->post("refer");
                $zip        =   $this->input->post("zip");
                
                
                $this->db->select("State_id");
                $this->db->from("states");
                $this->db->where("State_name",$stat1);
                $qu             =   $this->db->get()->row();
                $state          =   $qu->State_id;
                
               $city = $this->input->post("city");
                
                
                $this->db->select("user_type_id");
                $this->db->from("user_type");
                $this->db->where("user_type",$refer1);
                $qu2         =   $this->db->get()->row();
                $ref        =   $qu2->user_type_id;  
                $pass       =   $this->input->post("pass");
                
                    $this->email->set_newline("\r\n");
                    // Set to, from, message, etc.
                    $this->email->from('info@igravitas.in', 'Admin');
                    $this->email->to($email);
                    $this->email->subject('Esy Top-up Conformation');
                    $message = 'Dear '."Urer, <br/><br/>";
                    $message .= 'Thank you for being with Esy Top-up, We will send your username and password on your mobile<br> For verification Click on this ';
                    $message .='<a href="'.base_url().'register/confirm/'.md5($email).'">Confirmation Link</a> ';
                    $message .= '<br/><br/><br/>';
                    $message .='<div>Regards ,<br/> Esy Top-up Admin <br>+91 9985 997675<br>http://esytopup.com</div>'; 
                    $this->email->message($message);
//                    print_r($data);exit;
//                    echo $message;exit;
                    	// init curl object        
		

		
                    if($this->email->send()){
                        $ch = curl_init();
                        $optArray = array(
			CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$mobile&from=ESYTOP&message=Welcome+to+http://esytopup.com++User+Name:+$email+Pass:+$pass",
			CURLOPT_RETURNTRANSFER => true
		);

		// apply those options
		curl_setopt_array($ch, $optArray);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		$result = curl_exec($ch);
		curl_close($ch);
		$xml = @simplexml_load_string($result);
                            $data   =   array(
                                    "login_email"           =>     $email,
                                    "login_mobile"          =>     $mobile,
                                    "login_password"        =>     md5($pass),
                                    "is_confirm"            =>     'confirm',
                                    "user_type"             =>     2,
                                    "status"                =>     1
                            );
                            $this->db->insert("login",$data);
                            $val_id     =   $this->db->insert_id();
                                if($this->db->affected_rows()   >   0){
                                    $ins             =   array(
                                            "login_id"              =>     $val_id,
                                            "mobile"                =>     $mobile,
                                            "country"               =>     101,
                                            "state"                 =>     $state,
                                            "city"                  =>     $city1,
                                            "zip_code"              =>     $zip,
                                            "preferred_for"         =>     $ref,
                                            "admin_id"              =>     1,
                                        'id_proof' => "$idP",
                                        'add_proof' =>"$addp"
                                            
                                    );
                                    $ins_access      =   array(
                                            "login_id"              =>      $val_id,
                                            "recharge"              =>      0,
                                            "prepaid_mobile"        =>      0,
                                            "postpaid_mobile"       =>      0,
                                            'data_card'             =>      0,
                                            "dth"                   =>      0,
                                            "utility"               =>      0,
                                            "electricity"           =>      0,
                                            "gas"                   =>      0,
                                            "dmr"                   =>      0,
                                            "add_beneficiary"       =>      0,
                                            "money_transfer"        =>      0
                                    );
                                    $this->db->insert("profile",$ins);
                                    
                                    $this->db->insert("module_access",$ins_access);
                                    if($this->db->affected_rows()   >   0){
										
                                        return 1;
                                    }
                                    else{
                                            return 0;
                                    }
                                }
                            else{
                                return 0;
                            }    
                }
                else{
                    return 2;
                }
        }
        public function confirm($con){
                $da     =   array(
                            "is_confirm"    =>      "confirm"
                );
                $this->db->where("is_confirm",$con);
                $this->db->update("login",$da);
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows()   >   0){
                        return 1;
                }
                else{
                        return 0;
                }
        }
}