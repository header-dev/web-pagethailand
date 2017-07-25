<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Language_model');
		$this->load->model('Package_model');
		$this->load->model('Program_model');
		$this->load->model('Province_model');
	}

	public function index()
	{
		$data = array();
		$data['package'] = $this->Package_model->getPackage();
		$this->load->view('backend/package/index', $data, FALSE);
	}

	public function add()
	{
		$data = array();
		$data['lang'] = $this->Language_model->getLang();
		$data['program'] = $this->Program_model->getProgram();
		$data['province'] = $this->Province_model->getProvince();
		$this->load->view('backend/package/add', $data, FALSE);
	}

	public function edit()
	{
		$data = array();
		$id = $this->input->get('package_id');
		$data['package'] = $this->Package_model->getPackageById($id);
		$data['lang'] = $this->Language_model->getLang();
		$data['program'] = $this->Program_model->getProgram();
		$data['province'] = $this->Province_model->getProvince();
		$this->load->view('backend/package/edit', $data, FALSE);
	}
	public function addpackage()
	{
		$input = $this->input->post();
		$rs = $this->Package_model->savePackage($input);
		if ($rs) {
            $this->session->set_flashdata('message', "<b>Add 'Package' success.</b>");
        }else{
            $this->session->set_flashdata('error', "<b>can't add 'Package'!</b>");
        }
        redirect('package','refresh');
	}

	public function remove()
	{
		$id = $this->input->get('package_id');
		$rs = $this->Package_model->deletePackage($id);
		if ($rs) {
            $this->session->set_flashdata('message', "<b>Remove 'Package' success.</b>");
        }else{
            $this->session->set_flashdata('error', "<b>can't remove 'Package'!</b>");
        }
        redirect('package','refresh');
	}

	public function update()
	{
		$input = $this->input->post();
		$rs = $this->Package_model->updatePackage($input);
		if ($rs) {
            $this->session->set_flashdata('message', "<b>Update 'Package' success.</b>");
        }else{
            $this->session->set_flashdata('error', "<b>can't update 'Package'!</b>");
        }
        redirect('package','refresh');
	}

}