<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $redire;

	public function __construct()
	{
		parent::__construct();
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

	public function index(){
		$this->load->view('index');
	}

	public function change($type){
		$this->session->set_userdata('lang',$type);
		redirect('','refresh');
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */