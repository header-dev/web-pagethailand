<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('lang')==null) {
			$lang = 'english';
		}else{
			$lang = $this->session->userdata('lang');
		}
		$this->lang->load($lang,$lang);

		$this->load->library('upload');

		$this->load->model('News_model');
	}

	public function index()
	{
		$data = array();
		$data['data'] = $this->News_model->getallnews();
		$this->load->view('news/index',$data);
	}

	public function addnews(){
		$data = array();
		$data['groups'] = $this->News_model->getAllGroup();
		$this->load->view('news/add',$data);
	}

	public function editnews(){
		$data['groups'] = $this->News_model->getAllGroup();
		$data['data'] = $this->News_model->getnewsbyid($this->input->get('news_id'));
		$this->load->view('news/edit', $data);
	}

	public function addcontent(){
		$data['data'] = $this->News_model->getnewsbyid($this->input->get('news_id'));
		$this->load->view('news/add_content',$data);
	}

	public function saveNews(){
		// print_r($this->input->post());
		// $rs = $this->News_model->savenews($this->input->post());
		// redirect('news','refresh');

		$input = $this->input->post();
		$config = array();
		$config['upload_path'] = "assets/images/news/thumbnail";
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
            	$rs = $this->News_model->savenews($input);

            	if ($rs){
					$this->session->set_flashdata('message', "<b>Save 'News' success.</b>");
				}else{
					unlink($newName);
					unlink($data['full_path']);
					$this->session->set_flashdata('error', "<b>Can't save 'News'</b><p>you're looking the data input.</p>");
				}
            }else{
            	unlink($data['full_path']);
            	$this->session->set_flashdata('error', $this->image_lib->display_errors());
            }
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
		}
		redirect('news','refresh');
	}

	public function getlistpicture(){
		$this->load->model('Picture_model');
		$data['data'] = $this->Picture_model->getallpicture();
		$this->load->view('news/table_picture', $data);
	}

	public function savecontent(){
		$rs = $this->News_model->savecontent($this->input->post());
		if ($rs) {
			echo "success";
		}else{
			echo "fail";
		}
	}

	public function saveupdatenews(){
		// $this->News_model->saveupdatenews($this->input->post());
		// redirect('news','refresh');
		$input = $this->input->post();

		if ($_FILES['thumbnail']['error']==0) {

			$config = array();
			$config['upload_path'] = "assets/images/news/thumbnail";
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
                	$rs = $this->News_model->saveupdatenews($input);
					if ($rs){
						$this->session->set_flashdata('message', "<b>Update 'News' success.</b>");
					}else{
						unlink($newName);
						unlink($data['full_path']);
						$this->session->set_flashdata('error', "<b>Can't update 'News'</b><p>you're looking the data input.</p>");
					}
            	}else{
            		unlink($data['full_path']);
            		$this->session->set_flashdata('error', $this->image_lib->display_errors());
            	}
			} else {
				$this->session->set_flashdata('error', $this->upload->display_errors());
			}
		}else{
			$rs = $this->News_model->saveupdatenews($input);
			if ($rs){
				$this->session->set_flashdata('message', "<b>Update 'News' success.</b>");

			}else{
				$this->session->set_flashdata('error', "<b>Can't update 'News'</b><p>you're looking the data input.</p>");
			}
		}
		redirect('news','refresh');

	}

	public function destroynews(){
		$this->News_model->delnews($this->input->get('news_id'));
		redirect('news','refresh');
	}

}

/* End of file News.php */
/* Location: ./application/controllers/News.php */