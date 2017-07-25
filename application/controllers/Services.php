<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('upload');
		if ($this->session->userdata('lang')==null) {
			$lang = 'english';
		}else{
			$lang = $this->session->userdata('lang');
		}
		$this->lang->load($lang,$lang);
		$this->load->model('Service');
		$this->load->library('upload');

		if ($this->session->userdata('member_id') == null) {
        	redirect('authen/login', 'refresh');
            exit();
        }
	}

	public function formImage(){
		$data = array();
		$data['service_id'] = $this->input->get('service_id');
		$data['service'] = $this->input->get('service');
		$this->load->view('services/imageform', $data);
	}

	public function index()
	{
		$data['data'] = $this->Service->getallservice();
		$this->load->view('services/index',$data);
	}

	public function addservice(){
		$data['data'] = $this->Service->getAllGroup();
		$this->load->view('services/add',$data);
	}

	public function saveService(){
		$input = $this->input->post();
		$config = array();
		$config['upload_path'] = "assets/images/service/thumbnail";
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
            	$rs = $this->Service->saveServices($input);

            	if ($rs){
					$this->session->set_flashdata('message', "<b>Save 'Service' success.</b>");
				}else{
					unlink($newName);
					unlink($data['full_path']);
					$this->session->set_flashdata('error', "<b>Can't save 'Service'</b><p>you're looking the data input.</p>");
				}
            }else{
            	unlink($data['full_path']);
            	$this->session->set_flashdata('error', $this->image_lib->display_errors());
            }
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
		}
		redirect('services/addservice','refresh');
	}

	public function editservices(){
		$data = array();
		$data['data'] = $this->Service->getService($this->input->get('service_id'));
		$data['group'] = $this->Service->getAllGroup();
		// print_r($data['data'][0]['product_group']['thai']);
		$this->load->view('services/edit', $data);
	}
	public function updateservice(){
		$input = $this->input->post();
		if ($_FILES['thumbnail']['name']!="") {

			$config = array();
			$config['upload_path'] = "assets/images/service/thumbnail";
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
                	$rs = $this->Service->updateService($input);
					if ($rs){
						$this->session->set_flashdata('message', "<b>Update 'Service' success.</b>");
					}else{
						unlink($newName);
						unlink($data['full_path']);
						$this->session->set_flashdata('error', "<b>Can't update 'Service'</b><p>you're looking the data input.</p>");
					}
            	}else{
            		unlink($data['full_path']);
            		$this->session->set_flashdata('error', $this->image_lib->display_errors());
            	}
			} else {
				$this->session->set_flashdata('error', $this->upload->display_errors());
			}
		}else{
			$rs = $this->Service->updateService($input);
			if ($rs){
				$this->session->set_flashdata('message', "<b>Update 'Service' success.</b>");

			}else{
				$this->session->set_flashdata('error', "<b>Can't update 'Service'</b><p>you're looking the data input.</p>");
			}
		}
		redirect('services','refresh');
	}
	public function show(){
		$data = array();
		$data['data'] = $this->Service->getService($this->input->get('service_id'));
		$this->load->view('services/show', $data);
	}

	public function deleteservice(){
		$rs = $this->Service->delService($this->input->get('service_id'));
		if ($rs) {
			redirect('services','refresh');
		}
	}

	public function do_upload(){
		$config = array();
			$config['upload_path'] = "assets/images/service";
			$config['allowed_types'] = "*";
			$config['max_size'] = 50000;
			$config['max_height'] = 2000;
			$config['max_width'] = 2000;

			$this->upload->initialize($config);

			if ($this->upload->do_upload("Filedata")) {
				$data = $this->upload->data();
				$newName =  date("YmdHis").rand(0000001,999999). $data['file_ext'];
				rename($data['full_path'], $data['file_path'].$newName);

                $config['image_library'] = 'gd2';
                $config['source_image'] = $this->upload->upload_path.$newName;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 700;
                $config['height'] = 450;
                $this->load->library('image_lib',$config);
                if (!$this->image_lib->resize()){
                	$this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));
            	}else{
            		$val = array();
            		$val['image'] = $newName;
            		$val['service_id'] = $this->input->get('service_id');
            		$rs = $this->Service->addPicture($val);
            		unlink(realpath('assets/images/service/'.$data['full_path']));
            	}
			} else {
				$this->session->set_flashdata('errors', $this->upload->display_errors());
				// redirect('','refresh');
			}
	}

	public function getPictureService(){
		$data['data'] = $this->Service->getpicture($this->input->get('service_id'));
		$this->load->view('services/tablepicture', $data);
	}
	public function deleteimg(){
		$rs = $this->Service->delImgService($this->input->post('image_id'));
		if ($rs) {
			echo "success";
		}else{
			echo "fail";
		}
	}
}

/* End of file Services.php */
/* Location: ./application/controllers/Services.php */