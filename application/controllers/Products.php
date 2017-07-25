<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		if ($this->session->userdata('lang')==null) {
			$lang = 'english';
		}else{
			$lang = $this->session->userdata('lang');
		}
		$this->lang->load($lang,$lang);
		$this->load->model('Product');

		if ($this->session->userdata('member_id') == null) {
        	redirect('authen/login', 'refresh');
            exit();
        }
	}

	public function index()
	{
		$data['data'] = $this->Product->getallproduct();
		$this->load->view('products/index',$data);
	}

	public function hit(){
		$rs = $this->Product->makehit($this->input->get('product_id'));
		if ($rs) {
			$this->session->set_flashdata('message', "<b>Make 'Hit Product' success.</b>");
		}else{
			$this->session->set_flashdata('error', "<b>Can't make 'Hit Product'</b><p>you're looking the data input.</p>");
		}

		redirect('products','refresh');
	}

	public function unhit(){
		$rs = $this->Product->makeunhit($this->input->get('product_id'));
		if ($rs) {
			$this->session->set_flashdata('message', "<b>Make Un 'Hit Product' success.</b>");
		}else{
			$this->session->set_flashdata('error', "<b>Can't make un 'Hit Product'</b><p>you're looking the data input.</p>");
		}

		redirect('products','refresh');
	}

	public function addproduct(){
		$data['data'] = $this->Product->getAllGroup();
		$this->load->view('products/add',$data);
	}

	public function editproduct(){
		$data = array();
		$data['data'] = $this->Product->getProduct($this->input->get('product_id'));
		$data['group'] = $this->Product->getAllGroup();
		// print_r($data['data'][0]['product_group']['thai']);
		$this->load->view('products/edit', $data);
	}

	public function deleteproduct(){
		$rs = $this->Product->delProduct($this->input->get('product_id'));
		if ($rs) {
			redirect('products','refresh');
		}
	}
	
	public function updateproduct(){
		$input = $this->input->post();
		if ($_FILES['thumbnail']['name']!="") {

			$config = array();
			$config['upload_path'] = "assets/images/product/thumbnail";
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
                	$rs = $this->Product->updateProduct($input);
					if ($rs){
						$this->session->set_flashdata('message', "<b>Update 'Product' success.</b>");
					}else{
						unlink($newName);
						unlink($data['full_path']);
						$this->session->set_flashdata('error', "<b>Can't update 'Product'</b><p>you're looking the data input.</p>");
					}
            	}else{
            		unlink($data['full_path']);
            		$this->session->set_flashdata('error', $this->image_lib->display_errors());
            	}
			} else {
				$this->session->set_flashdata('error', $this->upload->display_errors());
			}
		}else{
			$rs = $this->Product->updateProduct($input);
			if ($rs){
				$this->session->set_flashdata('message', "<b>Update 'Product' success.</b>");

			}else{
				$this->session->set_flashdata('error', "<b>Can't update 'Product'</b><p>you're looking the data input.</p>");
			}
		}
		redirect('products','refresh');
	}

	public function saveProduct(){
		$input = $this->input->post();
		$config = array();
		$config['upload_path'] = "assets/images/product/thumbnail";
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
            	$rs = $this->Product->saveProducts($input);

            	if ($rs){
					$this->session->set_flashdata('message', "<b>Save 'Product' success.</b>");
				}else{
					unlink($newName);
					unlink($data['full_path']);
					$this->session->set_flashdata('error', "<b>Can't save 'Product'</b><p>you're looking the data input.</p>");
				}
            }else{
            	unlink($data['full_path']);
            	$this->session->set_flashdata('error', $this->image_lib->display_errors());
            }
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
		}
		redirect('products/addproduct','refresh');
	}
	public function show(){
		$data = array();
		$data['data'] = $this->Product->getProduct($this->input->get('product_id'));
		$this->load->view('products/show', $data);
	}
	public function formImage(){
		$data = array();
		$data['product_id'] = $this->input->get('product_id');
		$data['products'] = $this->input->get('products');
		$this->load->view('products/imageform', $data);
	}

	public function do_upload(){
		$config = array();
			$config['upload_path'] = "assets/images/product";
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
            		$val['product_id'] = $this->input->get('product_id');
            		$rs = $this->Product->addPicture($val);
            		unlink(realpath('assets/images/product/'.$data['full_path']));
            	}
			} else {
				$this->session->set_flashdata('errors', $this->upload->display_errors());
				// redirect('','refresh');
			}
	}


	public function getPictureProduct(){
		$data['data'] = $this->Product->getpicture($this->input->get('product_id'));
		$this->load->view('products/tablepicture', $data);
	}
	public function deleteimg(){
		$rs = $this->Product->delImgProduct($this->input->post('image_id'));
		if ($rs) {
			echo "success";
		}else{
			echo "fail";
		}
	}
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */