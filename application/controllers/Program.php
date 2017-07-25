<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('upload');
        if ($this->session->userdata('lang') == null) {
            $lang = 'english';
        } else {
            $lang = $this->session->userdata('lang');
        }
        $this->lang->load($lang, $lang);

        if ($this->session->userdata('member_id') == null) {
            redirect('authen/login', 'refresh');
            exit();
        }
        $this->load->model('Language_model');
        $this->load->model('Program_model');
    }

    public function index()
    {
        $data = array();
        $data['program'] = $this->Program_model->getProgram();
        $this->load->view('backend/program/index', $data, false);
    }

    public function jsonprogram()
    {
        $data = $this->Program_model->getProgram();
        echo json_encode($data);
    }

    public function add()
    {
        $data         = array();
        $data['lang'] = $this->Language_model->getLang();

        $this->load->view('backend/program/add', $data, false);
    }

    public function edit()
    {
    	$data = array();
		$data['program'] = $this->Program_model->getProgramById($this->input->get('program_id'));
		$data['lang'] = $this->Language_model->getLang();
		$this->load->view('backend/program/edit', $data);
    }

    public function remove(){
        $rs = $this->Program_model->deleteProgram($this->input->get('program_id'));
        if ($rs) {
            $this->session->set_flashdata('message', "<b>Remove 'Program' success.</b>");
        }else{
            $this->session->set_flashdata('error', "<b>can't remove 'Program'!</b>");
        }
        redirect('program','refresh');
    }

    public function addprogram()
    {
        $input                   = $this->input->post();
        $rs = $this->Program_model->saveProgram($input);

        if ($rs) {
            $this->session->set_flashdata('message', "<b>Save 'Program' success.</b>");
        }else{
            $this->session->set_flashdata('error', "<b>Can't save 'Program'</b><p>you're looking the data input.</p>");
        }

        redirect('program', 'refresh');
    }

    public function update()
    {
        $input = $this->input->post();
        $rs = $this->Program_model->updateProgram($input);

        if ($rs) {
            $this->session->set_flashdata('message', "<b>Update 'Program' success.</b>");
        }

        redirect('program', 'refresh');
    }
}

/* End of file ProgramController.php */
/* Location: ./application/controllers/ProgramController.php */
