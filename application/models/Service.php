<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Model {

	public function saveGroup($data = array()){
		$value = array(
			'service_group' => serialize($data['service_group']),
			'description' => serialize($data['description']),
			'created_by' => $this->session->userdata('member_id'),
			'thumbnail' => $data['thumbnail'],
		);

		if ($this->db->insert('tb_service_group', $value)) {
			return true;
		}else{
			return false;
		}
	}

	public function getallservice(){
		$sql = "SELECT * FROM tb_service s\n".
"WHERE s.active = 1 ";

		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"service_id" =>$r['service_id'],
					"service_detail" =>unserialize($r['service_detail']),
					"service"=> unserialize($r['service']),
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	public function saveServices($data = array()){
		$value = array(
			'service' => serialize($data['service']),
			'service_detail' => serialize($data['service_detail']),
			'created_by' => $this->session->userdata('member_id'),
			'thumbnail' => $data['thumbnail'],
		);

		if ($this->db->insert('tb_service', $value)) {
			return true;
		}else{
			return false;
		}
	}

	public function getAllGroup(){

		$sql = "SELECT * FROM tb_service_group WHERE active = 1 ";
		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"service_group_id" =>$r['service_group_id'],
					"service_group" => unserialize($r['service_group']),
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

			$this->db->where('service_group_id', $id);
			$rs = $this->db->update('tb_service_group', $data);
			if ($rs = 1) {
				return true;
			}else{
				return false;
			}
	}

	public function getByIdGroup($id = null){
		$sql = "SELECT * FROM tb_service_group WHERE service_group_id = ".$id." AND active = 1 ";
		$q = $this->db->query($sql);
		if ($q->num_rows() > 0) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"service_group_id" =>$r['service_group_id'],
					"service_group" => unserialize($r['service_group']),
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
               	'service_group' => serialize($data['service_group']),
				'description' => serialize($data['description']),
				'updated_by' => $this->session->userdata('member_id'),
				'thumbnail' => $data['thumbnail'],
            );

			$this->db->where('service_group_id', $data['service_group_id']);
			$rs = $this->db->update('tb_service_group', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}else{
			$value = array(
               	'service_group' => serialize($data['service_group']),
				'description' => serialize($data['description']),
				'updated_by' => $this->session->userdata('member_id'),
            );

			$this->db->where('service_group_id', $data['service_group_id']);
			$rs = $this->db->update('tb_service_group', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}
	}
	public function delService($id = null){
			$data = array(
               'active' => 0,
        	);
			$this->db->where('service_id', $id);
			$rs = $this->db->update('tb_service', $data);
			if ($rs = 1) {
				return true;
			}else{
				return false;
			}
	}

	public function getService($id = null){
		$sql = "SELECT p.service_id,p.service_group_id,p.service,
				p.service_detail,p.thumbnail,p.created_at FROM tb_service p
		WHERE p.service_id = ".$id." AND p.active = 1 ";
		$q = $this->db->query($sql);
		if ($q->num_rows() > 0) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"service_id" =>$r['service_id'],
					"service" => unserialize($r['service']),
					"service_detail"=> unserialize($r['service_detail']),
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

	public function updateService($data = array()){
		if (!empty($data['thumbnail'])) {
			$value = array(
               	'service' => serialize($data['service']),
				'service_detail' => serialize($data['service_detail']),
				'updated_by' => $this->session->userdata('member_id'),
				'thumbnail' => $data['thumbnail'],
            );

			$this->db->where('service_id', $data['service_id']);
			$rs = $this->db->update('tb_service', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}else{
			$value = array(
               	'service' => serialize($data['service']),
				'service_detail' => serialize($data['service_detail']),
				'updated_by' => $this->session->userdata('member_id'),
            );

			$this->db->where('service_id', $data['service_id']);
			$rs = $this->db->update('tb_service', $value);
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
			'ref_id' => $data['service_id'],
			'image_type' => 3,
			'created_by' => $this->session->userdata('member_id'),
		);

		if ($this->db->insert('tb_images', $value)) {
			return true;
		}else{
			unlink(realpath('assets/images/service/'.$data['image']));
		}
	}

	function getpicture($data = null){
		$sql = "select * from tb_images where active = 1 and image_type = 3 and ref_id = ".$data;
		$q = $this->db->query($sql);
		return $q->result_array();
	}

	function delImgService($id = null){
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