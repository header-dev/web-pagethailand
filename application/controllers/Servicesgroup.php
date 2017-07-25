<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicesgroup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Service');
		$this->load->library('upload');
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
		$data = array();
		$data['data'] = $this->Service->getAllGroup();
		$this->load->view('services_group/index', $data);
	}

	public function addGroup(){
		$this->load->view('services_group/add');
	}

	public function saveServiceGroup(){

		$input = $this->input->post();
		$config = array();
		$config['upload_path'] = "assets/images/services_group/thumbnail";
		$config['allowed_types'] = "*";
		$config['max_size'] = 50000;
		$config['max_width'] = 2000;
		$config['max_height'] = 3000;

		$this->upload->initialize($config);

		if ($this->upload->do_upload("thumbnail")) {
			$data = $this->upload->data();
			$newName = date("YmdHis").$data['file_ext'];
			rename($data['full_path'], $data['file_path'].$newName);
            $config['image_library'] = 'gd2';
            $config['source_image'] = $this->upload->upload_path.$newName;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 700;
            $config['height'] = 450;
            $this->load->library('image_lib',$config);

            if ($this->image_lib->resize()){
            	$input['thumbnail'] = $newName;
            	$rs = $this->Service->saveGroup($input);

            	if ($rs){
					$this->session->set_flashdata('message', "<b>Save 'Service Group' success.</b>");
				}else{
					unlink($newName);
					unlink($data['full_path']);
					$this->session->set_flashdata('error', "<b>Can't save 'Service Group'</b><p>you're looking the data input.</p>");
				}
            }else{
            	unlink($data['full_path']);
            	$this->session->set_flashdata('error', $this->image_lib->display_errors());
            }
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
		}
		redirect('servicesgroup/addGroup','refresh');
	}

	public function deleteGroup(){
		$rs = $this->Service->delGroup($this->input->get('service_group_id'));
		if ($rs) {
			redirect('servicesgroup','refresh');
		}
	}

	public function editGroup(){
		$data = array();
		$data['data'] = $this->Service->getByIdGroup($this->input->get('service_group_id'));
		// print_r($data['data'][0]['product_group']['thai']);
		$this->load->view('services_group/edit', $data);
	}

	public function updateServiceGroup(){
		$input = $this->input->post();
		if ($_FILES['thumbnail']['name']!="") {

			$config = array();
			$config['upload_path'] = "assets/images/services_group/thumbnail";
			$config['allowed_types'] = "*";
			$config['max_size'] = 50000;
			$config['max_width'] = 2000;
			$config['max_height'] = 3000;

			$this->upload->initialize($config);

			if ($this->upload->do_upload("thumbnail")) {
				$data = $this->upload->data();
				$newName = date("YmdHis").$data['file_ext'];
				rename($data['full_path'], $data['file_path'].$newName);
            	$config['image_library'] = 'gd2';
            	$config['source_image'] = $this->upload->upload_path.$newName;
            	$config['maintain_ratio'] = TRUE;
            	$config['width'] = 700;
            	$config['height'] = 450;
            	$this->load->library('image_lib',$config);

            	if ($this->image_lib->resize()){
            		$input['thumbnail'] = $newName;
                	$rs = $this->Service->updateGroup($input);
					if ($rs){
						$this->session->set_flashdata('message', "<b>Update 'Service Group' success.</b>");
					}else{
						unlink($newName);
						unlink($data['full_path']);
						$this->session->set_flashdata('error', "<b>Can't update 'Service Group'</b><p>you're looking the data input.</p>");
					}
            	}else{
            		unlink($data['full_path']);
            		$this->session->set_flashdata('error', $this->image_lib->display_errors());
            	}
			} else {
				$this->session->set_flashdata('error', $this->upload->display_errors());
			}
		}else{
			$rs = $this->Service->updateGroup($input);
			if ($rs){
				$this->session->set_flashdata('message', "<b>Update 'Service Group' success.</b>");

			}else{
				$this->session->set_flashdata('error', "<b>Can't update 'Service Group'</b><p>you're looking the data input.</p>");
			}
		}
		redirect('servicesgroup','refresh');
	}
	public function showGroup(){
		$data = array();
		$data['data'] = $this->Service->getByIdGroup($this->input->get('service_group_id'));
		$this->load->view('services_group/show', $data);
	}

}

/* End of file ServicesGroup.php */
/* Location: ./application/controllers/ServicesGroup.php */