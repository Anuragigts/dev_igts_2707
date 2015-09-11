<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Forgot_model extends CI_Model
{ 
        public function getDetails(){
                $email  =   $this->input->post("reset_email");
                $this->db->select('l.*,p.*');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->where('l.login_email',$email);
                $query = $this->db->get();
                if($this->db->affected_rows() > 0){
                    return 1;
                }
                else{
                    return 0;
                }            
        }
        public function updateDetails(){
                $email  =   $this->input->post("reset_email");
                 $this->db->select("login_mobile");
                $this->db->from("login");
                $this->db->where("login_email","$email");
                $qu             =   $this->db->get()->row();
                //echo $this->db->last_query()."++++++++";
                $mobile          =   $qu->login_mobile;
                //echo $mobile;
                $pass   =   rand(10000,99999);
                    $this->email->set_newline("\r\n");
                    // Set to, from, message, etc.
                   $this->email->from('support@esytopup.com', 'Support : Esy Topup');
                    $this->email->to($email);
                    $this->email->subject('Esy Top-up Reset Password');
                    $message = 'Dear '."User, <br/><br/>";
                    $message .= 'Please reset your password By clicking on ';
                    $message .='<a href="'.base_url().'forgot_password/reset/'.md5($pass).'">Link</a> ';
                    $message .= ' to reset your password.  <br/><br/><br/>';
                   $message .='<div>Regards ,<br/> Esy Top-up Admin <br>+91 96666 580220<br>+91 96666 580540<br>http://esytopup.com</div>'; 
                    $this->email->message($message);
//                    echo $message;exit;
                    if($this->email->send()){
                        $ch = curl_init();
                         $optArray = array(
			CURLOPT_URL => "http://bsms.slabs.mobi/spanelv2/api.php?username=chbhargav9&password=927276&to=$mobile&from=ESYTOP&message=Welcome+to+http://esytopup.com++You+Can+Reset+password+On+Clicking+On+".base_url()."forgot_password/reset/".md5($pass),
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
                            $data   =   array(
                                    'login_password'    =>      md5($pass), 
                                    'is_confirm'        =>      md5($pass)
                            );
                            $this->db->where('login_email',$email);
                            $this->db->update('login',$data);
                            if($this->db->affected_rows() > 0){
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
        public function getConfirm($id){
                $email  =   $this->input->post("reset_email");
                $this->db->select('l.*,p.*');
                $this->db->from('login as l');
                $this->db->join('profile as p','l.login_id = p.login_id','inner');
                $this->db->where('l.is_confirm',$id);
                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                    return 1;
                }
                else{
                    return 0;
                }            
        }
        public function updatePassword($id){
            $pass  =   $this->input->post("password");
            $data   =   array(
                    'login_password'    =>      md5($pass), 
                    'is_confirm'        =>      'confirm'
            );
            $this->db->where('is_confirm',$id);
            $this->db->update('login',$data);
            if($this->db->affected_rows() > 0){
                return 1;
            }
            else{
                return 0;
            }
        }
}

