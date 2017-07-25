<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	public function saveGroup($data = array()){
		$value = array(
			'product_group' => serialize($data['product_group']),
			'description' => serialize($data['description']),
			'created_by' => $this->session->userdata('member_id'),
			'thumbnail' => $data['thumbnail'],
		);

		if ($this->db->insert('tb_product_group', $value)) {
			return true;
		}else{
			return false;
		}
	}

	public function makehit($id){
			$data = array(
               'hit' => 1,
        	);

			$this->db->where('product_id', $id);
			$rs = $this->db->update('tb_product', $data);
			if ($rs = 1) {
				return true;
			}else{
				return false;
			}
	}

	public function makeunhit($id){
			$data = array(
               'hit' => 0,
        	);

			$this->db->where('product_id', $id);
			$rs = $this->db->update('tb_product', $data);
			if ($rs = 1) {
				return true;
			}else{
				return false;
			}
	}

	public function getallproduct(){
		$sql = "SELECT * FROM tb_product p\n".
"WHERE p.active = 1 ";

		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"product_id" =>$r['product_id'],
					"product_detail" =>unserialize($r['product_detail']),
					"product_name"=> unserialize($r['product_name']),
					"hit" => $r['hit'],
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	public function saveProducts($data = array()){
		$value = array(
			'product_name' => serialize($data['product_name']),
			'product_detail' => serialize($data['product_detail']),
			'created_by' => $this->session->userdata('member_id'),
			// 'product_group_id' => $data['product_group_id'],
			'thumbnail' => $data['thumbnail'],
		);

		if ($this->db->insert('tb_product', $value)) {
			return true;
		}else{
			return false;
		}
	}

	public function getAllGroup(){

		$sql = "SELECT * FROM tb_product_group WHERE active = 1 ";
		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"product_group_id" =>$r['product_group_id'],
					"product_group" => unserialize($r['product_group']),
					"description"=> unserialize($r['description']),
				);
				array_push($item, $ar);
			}
			return $item;
		}else{
			return null;
		}

	}
	public function delGroup($id = null){
			$data = array(
               'active' => 0,
        	);

			$this->db->where('product_group_id', $id);
			$rs = $this->db->update('tb_product_group', $data);
			if ($rs = 1) {
				return true;
			}else{
				return false;
			}
	}

	public function getByIdGroup($id = null){
		$sql = "SELECT * FROM tb_product_group WHERE product_group_id = ".$id." AND active = 1 ";
		$q = $this->db->query($sql);
		if ($q->num_rows() > 0) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"product_group_id" =>$r['product_group_id'],
					"product_group" => unserialize($r['product_group']),
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

	public function updateGroup($data = array()){
		if (!empty($data['thumbnail'])) {
			$value = array(
               	'product_group' => serialize($data['product_group']),
				'description' => serialize($data['description']),
				'updated_by' => $this->session->userdata('member_id'),
				'thumbnail' => $data['thumbnail'],
            );

			$this->db->where('product_group_id', $data['product_group_id']);
			$rs = $this->db->update('tb_product_group', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}else{
			$value = array(
               	'product_group' => serialize($data['product_group']),
				'description' => serialize($data['description']),
				'updated_by' => $this->session->userdata('member_id'),
            );

			$this->db->where('product_group_id', $data['product_group_id']);
			$rs = $this->db->update('tb_product_group', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}
	}
	public function delProduct($id = null){
			$data = array(
               'active' => 0,
        	);
			$this->db->where('product_id', $id);
			$rs = $this->db->update('tb_product', $data);
			if ($rs = 1) {
				return true;
			}else{
				return false;
			}
	}

	public function getProduct($id = null){
		$sql = "SELECT p.product_id,p.product_name,
				p.product_detail,p.thumbnail,p.created_at FROM tb_product p
		WHERE p.product_id = ".$id." AND p.active = 1 ";
		$q = $this->db->query($sql);
		if ($q->num_rows() > 0) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"product_id" =>$r['product_id'],
					// "product_group_id" =>$r['product_group_id'],
					"product_name" => unserialize($r['product_name']),
					// "product_group" => unserialize($r['product_group']),
					"product_detail"=> unserialize($r['product_detail']),
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

	public function updateProduct($data = array()){
		if (!empty($data['thumbnail'])) {
			$value = array(
               	'product_name' => serialize($data['product_name']),
				'product_detail' => serialize($data['product_detail']),
				// 'product_group_id' =>$data['product_group_id'],
				'updated_by' => $this->session->userdata('member_id'),
				'thumbnail' => $data['thumbnail'],
            );

			$this->db->where('product_id', $data['product_id']);
			$rs = $this->db->update('tb_product', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}else{
			$value = array(
               	'product_name' => serialize($data['product_name']),
				'product_detail' => serialize($data['product_detail']),
				// 'product_group_id' =>$data['product_group_id'],
				'updated_by' => $this->session->userdata('member_id'),
            );

			$this->db->where('product_id', $data['product_id']);
			$rs = $this->db->update('tb_product', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}
	}

	function addPicture($data = array()){
		$value = array(
			'image' => $data['image'],
			'ref_id' => $data['product_id'],
			'image_type' => 1,
			'created_by' => $this->session->userdata('member_id'),
		);

		if ($this->db->insert('tb_images', $value)) {
			return true;
		}else{
			unlink(realpath('assets/images/product/'.$data['image']));
		}
	}

	function getpicture($data = null){
		$sql = "select * from tb_images where active = 1 and image_type = 1 and ref_id = ".$data;
		$q = $this->db->query($sql);
		return $q->result_array();
	}

	function delImgProduct($id = null){
		$data = array(
               'active' => 0,
        );
		$this->db->where('image_id', $id);
		$rs = $this->db->update('tb_images', $data);
		if ($rs = 1) {
			return true;
		}else{
			return false;
		}
	}
}

/* End of file Product.php */
/* Location: ./application/models/Product.php */