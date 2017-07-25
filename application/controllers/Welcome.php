<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login(){
		if ($this->input->post('bt')!=null) {
			// print_r($this->input->post());
			$this->session->set_userdata(array('login_id' => '01'));
			redirect('','refresh');
		}else{
			$this->load->view('login');
		}

		if ($this->session->userdata('member_id') == null) {
        	redirect('authen/login', 'refresh');
            exit();
        }

	}

	public function logout(){
		// print_r('Hello');
		$this->session->sess_destroy();
		// print_r($this->session->userdata('login_id'));
		redirect('','refresh');
		exit();
	}

}
