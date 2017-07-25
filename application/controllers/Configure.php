<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Configure extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Language_model');
    }

    public function index()
    {
        $data = array();
        $this->load->view('backend/configure/index', $data, false);
    }

    public function language()
    {
        $data         = array();
        $data['lang'] = $this->Language_model->getAllLang();
        $this->load->view('backend/configure/lang', $data, false);
    }

    public function savelang()
    {
        $id = $this->input->post('default');
        if ($this->Language_model->setDefault($id)) {
        	redirect('configure/language','refresh');
        }

    }

    public function enablelang()
    {
        // print_r($this->input->get('language_id'));
        $data = array();
        $data = $this->input->get();
        if ($this->Language_model->setEnable($data)) {
            redirect('configure/language','refresh');
        }
    }

}

/* End of file Configure.php */
/* Location: ./application/controllers/Configure.php */
