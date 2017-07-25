<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jobs_model');

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
		$rs['data'] = $this->Jobs_model->getalljobs();
		$this->load->view('jobs/index',$rs);
	}

	public function addjobs(){
		$this->load->view('jobs/add');
	}

	public function savejobs(){
		$input = $this->input->post();
		$config = array();
		$config['upload_path'] = "assets/images/jobs/thumbnail";
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
            	$rs = $this->Jobs_model->savejobs($input);

            	if ($rs){
					$this->session->set_flashdata('message', "<b>Save 'Jobs' success.</b>");
				}else{
					unlink($newName);
					unlink($data['full_path']);
					$this->session->set_flashdata('error', "<b>Can't save 'jobs'</b><p>you're looking the data input.</p>");
				}
            }else{
            	unlink($data['full_path']);
            	$this->session->set_flashdata('error', $this->image_lib->display_errors());
            }
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
		}
		redirect('jobs','refresh');
	}

	public function deletejobs(){
		$this->Jobs_model->deljobs($this->input->get('jobs_id'));
		redirect('jobs','refresh');
	}

	public function editjobs(){
		$rs['data'] = $this->Jobs_model->getjobsbyid($this->input->get('jobs_id'));
		$this->load->view('jobs/edit', $rs);
	}

	public function saveeditjobs(){
		$input = $this->input->post();
		if ($_FILES['thumbnail']['name']!="") {

			$config = array();
			$config['upload_path'] = "assets/images/jobs/thumbnail";
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
                	$rs = $this->Jobs_model->updatejobs($input);
					if ($rs){
						$this->session->set_flashdata('message', "<b>Update 'Jobs' success.</b>");
					}else{
						unlink($newName);
						unlink($data['full_path']);
						$this->session->set_flashdata('error', "<b>Can't update 'Jobs'</b><p>you're looking the data input.</p>");
					}
            	}else{
            		unlink($data['full_path']);
            		$this->session->set_flashdata('error', $this->image_lib->display_errors());
            	}
			} else {
				$this->session->set_flashdata('error', $this->upload->display_errors());
			}
		}else{
			$rs = $this->Jobs_model->updatejobs($input);
			if ($rs){
				$this->session->set_flashdata('message', "<b>Update 'Jobs' success.</b>");

			}else{
				$this->session->set_flashdata('error', "<b>Can't update 'Jobs'</b><p>you're looking the data input.</p>");
			}
		}
		redirect('jobs','refresh');
	}
}

/* End of file Jobs.php */
/* Location: ./application/controllers/Jobs.php */