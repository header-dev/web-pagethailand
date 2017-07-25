<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institution extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data = array();
		$this->load->view('backend/institution/index', $data, FALSE);
	}

	public function addinstitution()
	{
		$data = array();
		$this->load->view('backend/institution/add', $data, FALSE);
	}

}

/* End of file Institution.php */
/* Location: ./application/controllers/Institution.php */