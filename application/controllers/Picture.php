<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Picture extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('member_id') == null) {
        	redirect('authen/login', 'refresh');
            exit();
        }
        $this->load->library('upload');
        $this->load->model('Picture_model');
	}


	public function getallimage()
	{
		$data = array();
		$data['images'] = $this->Picture_model->getallimage();
		$this->load->view('news/table_picture', $data, FALSE);
	}

	public function getslide()
	{
		$this->load->view('picture/slide/index');
	}

	public function getdataslide(){
		$data['data'] = $this->Picture_model->getslide();
		$this->load->view('picture/slide/table_slide', $data);
	}

	public function saveSlide(){
		$config = array();
		$config['upload_path'] = "assets/images/slide";
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
                $config['width'] = 1900;
                $config['height'] = 1080;
                $this->load->library('image_lib',$config);
                if (!$this->image_lib->resize()){
                	$this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));
            	}else{
            		$rs = $this->Picture_model->saveslide($newName);
            		redirect('picture/getslide','refresh');
            	}
		} else {
			$this->session->set_flashdata('errors', $this->upload->display_errors());
			redirect('','refresh');
		}
	}

	public function deleteslide(){
		$id = $this->input->post('id');
		$rs = $this->Picture_model->delslide($id);
	}

	public function saveother(){
		$config = array();
		$config['upload_path'] = "assets/images/other";
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
                $config['width'] = 1900;
                $config['height'] = 1080;
                $this->load->library('image_lib',$config);
                if (!$this->image_lib->resize()){
                	echo "fail";
            	}else{
            		$rs = $this->Picture_model->saveother($newName);
            	}
		} else {
			echo "fail";
		}
	}

	public function customers(){
		$this->load->view('picture/customers/index');
	}

	public function getdatacustomers(){
		$data['data'] = $this->Picture_model->getcustomers();
		$this->load->view('picture/customers/table_customers', $data);
	}

	public function deletecustomers(){
		$id = $this->input->post('id');
		$rs = $this->Picture_model->delcustomers($id);
	}

	public function savecustomers(){
		$config = array();
		$config['upload_path'] = "assets/images/customers";
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
                $config['width'] = 500;
                $config['height'] = 300;
                $this->load->library('image_lib',$config);
                if (!$this->image_lib->resize()){
                	echo "fail";
            	}else{
            		$rs = $this->Picture_model->savecustomers($newName);
            	}
		} else {
			echo "fail";
		}
	}
}

/* End of file Picture.php */
/* Location: ./application/controllers/Picture.php */