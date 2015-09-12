<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funds extends CI_Controller {
    public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('fund_model');
            date_default_timezone_set('Asia/Kolkata');  
    }
    public function  send_request(){
            $data = array(
                    'title'         => 'ESY TOPUP :: Send Request',
                    'metakeyword'   => 'ESY TOPUP :: Send Request',
                    'metadesc'      => 'ESY TOPUP :: Send Request',
                    'content'       => 'send_request'
            );
            if($this->input->post("send")){
                    $this->form_validation->set_rules("amount",  "Amount",  "required");
                    $this->form_validation->set_rules("date",     "Date",   "required");
                    $this->form_validation->set_rules("bank_name", "Bank Name",   "required");
                    $this->form_validation->set_rules("ptype",     "Payment Type",   "required");
                    if($this->input->post("ptype") > 2){
                            $this->form_validation->set_rules("cheque",     "Cheque No. (or) Transaction No.",   "required");
                    }
                    if($this->form_validation->run() == TRUE){
                                $ins    =   $this->fund_model->send_req();
                                if($ins == 1){
                                        $this->session->set_flashdata("msg","Your request has been successfully sent to admin.");
                                        redirect("funds/send_request");
                                }
                                else{
                                        $this->session->set_flashdata("err","Your request has not been sent to admin");
                                        redirect("funds/send_request");
                                }
                    }
            }
            $this->load->view('layout/inner_template',$data);
    }
    public function  view_request_details(){
            $data = array(
                    'title'         => 'ESY TOPUP :: View Send Requests',
                    'metakeyword'   => 'ESY TOPUP :: View Send Requests',
                    'metadesc'      => 'ESY TOPUP :: View Send Requests',
                    'content'       => 'view_send_requests'
            );
            $data["view"]   = $this->fund_model->view_send_requests();
            $this->load->view('layout/inner_template',$data);
    }
    public function fund_actdeact(){
            $val    =   $this->fund_model->fund_actdeact();
            echo $val;
    }
    public function refund_request(){
            $data = array(
                    'title'         => 'ESY TOPUP :: View Send Requests',
                    'metakeyword'   => 'ESY TOPUP :: View Send Requests',
                    'metadesc'      => 'ESY TOPUP :: View Send Requests',
                    'content'       => 'refund_request'
            );
            $data["view"]   = $this->fund_model->refund_request();
            $this->load->view('layout/inner_template',$data);
    }
    public function reffund_actdeact(){
            $val    =   $this->fund_model->reffund_actdeact();
            echo $val;
    }
}
?>    