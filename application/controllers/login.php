<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
             $data = array(
              'title'         => 'SC :: LOGIN',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'login'
             );
       
            $this->load->view('layout/login',$data);		
	}
}
