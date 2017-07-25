<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packageinc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data = array();
		$this->load->view('backend/packageinc/index', $data, FALSE);
	}

	public function add()
	{
		$data = array();
		$this->load->view('backend/packageinc/add', $data, FALSE);
	}

}

/* End of file Packageinc.php */
/* Location: ./application/controllers/Packageinc.php */