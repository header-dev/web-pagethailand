<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsgroup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('News_model');
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
		$data['data'] = $this->News_model->getAllGroup();
		$this->load->view('news_group/index', $data);
	}

	public function addGroup(){
		$this->load->view('news_group/add');
	}

	public function deleteGroup(){
		$rs = $this->News_model->delGroup($this->input->get('news_group_id'));
		if ($rs) {
			redirect('newsgroup','refresh');
		}
	}

	public function editGroup(){
		$data = array();
		$data['data'] = $this->News_model->getByIdGroup($this->input->get('news_group_id'));
		// print_r($data['data'][0]['product_group']['thai']);
		$this->load->view('news_group/edit', $data);
	}
	public function updateNewsGroup(){
		$input = $this->input->post();
		if ($_FILES['thumbnail']['name']!="") {

			$config = array();
			$config['upload_path'] = "assets/images/news_group/thumbnail";
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
                	$rs = $this->News_model->updateGroup($input);
					if ($rs){
						$this->session->set_flashdata('message', "<b>Update 'News Topic' success.</b>");
					}else{
						unlink($newName);
						unlink($data['full_path']);
						$this->session->set_flashdata('error', "<b>Can't update 'News Topic'</b><p>you're looking the data input.</p>");
					}
            	}else{
            		unlink($data['full_path']);
            		$this->session->set_flashdata('error', $this->image_lib->display_errors());
            	}
			} else {
				$this->session->set_flashdata('error', $this->upload->display_errors());
			}
		}else{
			$rs = $this->News_model->updateGroup($input);
			if ($rs){
				$this->session->set_flashdata('message', "<b>Update 'News Topic' success.</b>");

			}else{
				$this->session->set_flashdata('error', "<b>Can't update 'News Topic'</b><p>you're looking the data input.</p>");
			}
		}
		redirect('newsgroup','refresh');
	}
	public function showGroup(){
		$data = array();
		$data['data'] = $this->News_model->getByIdGroup($this->input->get('news_group_id'));
		$this->load->view('news_group/show', $data);
	}

	public function saveNewsGroup(){

		$input = $this->input->post();
		$config = array();
		$config['upload_path'] = "assets/images/news_group/thumbnail";
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
            	$rs = $this->News_model->saveGroup($input);

            	if ($rs){
					$this->session->set_flashdata('message', "<b>Save 'News Group' success.</b>");
				}else{
					unlink($newName);
					unlink($data['full_path']);
					$this->session->set_flashdata('error', "<b>Can't save 'News Group'</b><p>you're looking the data input.</p>");
				}
            }else{
            	unlink($data['full_path']);
            	$this->session->set_flashdata('error', $this->image_lib->display_errors());
            }
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
		}
		redirect('newsgroup/addGroup','refresh');
	}

		public function getByIdGroup($id = null){
		$sql = "SELECT * FROM tb_news_group WHERE news_group_id = ".$id." AND active = 1 ";
		$q = $this->db->query($sql);
		if ($q->num_rows() > 0) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"news_group_id" =>$r['news_group_id'],
					"news_group" => unserialize($r['news_group']),
					"description"=> unserialize($r['description']),
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}else{
			return null;
		}
	}
}

/* End of file NewsGroup.php */
/* Location: ./application/controllers/NewsGroup.php */