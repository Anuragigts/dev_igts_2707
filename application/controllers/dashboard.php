<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('dashboard_model');
        if( $this->session->userdata('login_id') == ''){redirect('login');}
    }
    //index funs
     public function index(){
        //print_r( $this->session->all_userdata());
//         if($this->session->userdata('user_type') == ""){ redirect("/");}
        $data = array(
              'title'         => 'ESY TOPUP :: DASHBOARD',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'dashboard'
             );
       $data['master'] = $this->dashboard_model->masterCnt();
       $data['super'] = $this->dashboard_model->superCnt();
       $data['dis'] = $this->dashboard_model->disCnt();
       $data['ag'] = $this->dashboard_model->agCnt();
       $data['amounts'] = $this->dashboard_model->amounts();
        $this->load->view('layout/inner_template',$data);        
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('/');
    }
}