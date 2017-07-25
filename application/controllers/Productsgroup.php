<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productsgroup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product');
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
		$data['data'] = $this->Product->getAllGroup();
		$this->load->view('products_group/index', $data);
	}

	public function addGroup(){
		$this->load->view('products_group/add');
	}

	public function saveProductGroup(){

		$input = $this->input->post();
		$config = array();
		$config['upload_path'] = "assets/images/product_group/thumbnail";
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
            	$rs = $this->Product->saveGroup($input);

            	if ($rs){
					$this->session->set_flashdata('message', "<b>Save 'Product Group' success.</b>");
				}else{
					unlink($newName);
					unlink($data['full_path']);
					$this->session->set_flashdata('error', "<b>Can't save 'Product Group'</b><p>you're looking the data input.</p>");
				}
            }else{
            	unlink($data['full_path']);
            	$this->session->set_flashdata('error', $this->image_lib->display_errors());
            }
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
		}
		redirect('productsgroup/addGroup','refresh');
	}

	public function deleteGroup(){
		$rs = $this->Product->delGroup($this->input->get('product_group_id'));
		if ($rs) {
			redirect('productsgroup','refresh');
		}
	}

	public function editGroup(){
		$data = array();
		$data['data'] = $this->Product->getByIdGroup($this->input->get('product_group_id'));
		// print_r($data['data'][0]['product_group']['thai']);
		$this->load->view('products_group/edit', $data);
	}

	public function updateProductGroup(){
		$input = $this->input->post();
		if ($_FILES['thumbnail']['name']!="") {

			$config = array();
			$config['upload_path'] = "assets/images/product_group/thumbnail";
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
                	$rs = $this->Product->updateGroup($input);
					if ($rs){
						$this->session->set_flashdata('message', "<b>Update 'Product Group' success.</b>");
					}else{
						unlink($newName);
						unlink($data['full_path']);
						$this->session->set_flashdata('error', "<b>Can't update 'Product Group'</b><p>you're looking the data input.</p>");
					}
            	}else{
            		unlink($data['full_path']);
            		$this->session->set_flashdata('error', $this->image_lib->display_errors());
            	}
			} else {
				$this->session->set_flashdata('error', $this->upload->display_errors());
			}
		}else{
			$rs = $this->Product->updateGroup($input);
			if ($rs){
				$this->session->set_flashdata('message', "<b>Update 'Product Group' success.</b>");

			}else{
				$this->session->set_flashdata('error', "<b>Can't update 'Product Group'</b><p>you're looking the data input.</p>");
			}
		}
		redirect('productsgroup','refresh');
	}
	public function showGroup(){
		$data = array();
		$data['data'] = $this->Product->getByIdGroup($this->input->get('product_group_id'));
		$this->load->view('products_group/show', $data);
	}
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */