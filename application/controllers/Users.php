<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('member');

		if ($this->session->userdata('lang')==null) {
			$lang = 'english';
		}else{
			$lang = $this->session->userdata('lang');
		}
		$this->lang->load($lang,$lang);

		if ($this->session->userdata('member_id') == null) {
        	redirect('authen/login', 'refresh');
            exit();
        }
	}

	public function index()
	{
		$data['data'] = $this->member->getallusers();
		$this->load->view('users/index', $data);
	}

	public function addusers(){
		$this->load->view('users/add');
	}

	public function editusers(){
		$rs['data'] = $this->member->getusersbyid($this->input->get('member_id'));
		$this->load->view('users/edit', $rs);
	}

	public function saveusers(){
		if (empty($this->input->post('member_id'))) {
			$rs = $this->member->saveusers($this->input->post());
			if($rs){
				$this->session->set_flashdata('message', "<b>Save 'Users' success.</b>");
				redirect('users','refresh');
			}else{
				$this->session->set_flashdata('error', "<b>Can't save 'Users'</b><p>you're looking the data input.</p>");
				redirect('users/addusers','refresh');
			}
		}else{
			$rs = $this->member->updateusers($this->input->post());
			if ($rs) {
				$this->session->set_flashdata('message', "<b>Save 'Users' success.</b>");
			}else{
				$this->session->set_flashdata('error', "<b>Can't save 'Users'</b><p>you're looking the data input.</p>");
			}
			redirect('users','refresh');
		}
	}

	public function deleteusers(){
		$rs = $this->member->delusers($this->input->get('member_id'));
		if ($rs) {
			$this->session->set_flashdata('message', "<b>Delete 'Users' success.</b>");
		}else{
			$this->session->set_flashdata('error', "<b>Can't delete 'Users'</b><p>you're looking the data input.</p>");
		}
		redirect('users','refresh');
	}
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */