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
                $pass   =   rand(10000,99999);
                    $this->email->set_newline("\r\n");
                    // Set to, from, message, etc.
                    $this->email->from('info@igravitas.in', 'Admin');
                    $this->email->to($email);
                    $this->email->subject('PASSWORD RESET');
                    $message = 'Dear '.$email.", <br/><br/>";
                    $message .= 'Click on this ';
                    $message .='<a href="'.base_url().'forgot_password/reset/'.md5($pass).'">Link</a> ';
                    $message .= ' to reset your password  <br/><br/><br/>';
                    $message .='<div>Regards ,<br/> Admin </div>'; 
                    $this->email->message($message);
//                    echo $message;exit;
                    if($this->email->send()){
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

