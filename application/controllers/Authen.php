<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authen extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('member');
        $this->load->library('form_validation');
    }

    public function login() {

        $this->form_validation->set_error_delimiters('<div class="text-red"><span class="fa fa-ban"></span>  ', '</div>');

        $this->form_validation->set_rules('username', 'Username', 'required');

        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('username',$this->input->post('username'));
            $this->load->view('login');
        }
        else {
        	$input = $this->input->post();
        	$rs = $this->member->getMember($input);
        	if ($rs==false) {
                $this->session->set_flashdata('username',$this->input->post('username'));
        		$this->session->set_flashdata('error', '<h4>Please re-enter your password</h4>
        <p>The password you entered is incorrect. Please try again (make sure your caps lock is off).</p>');
                redirect('authen/login');
            }else{
                redirect('administrator','refresh');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('member_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('last_login');
        redirect('','refresh');
    }
}

/* End of file Authen.php */

/* Location: ./application/controllers/Authen.php */
