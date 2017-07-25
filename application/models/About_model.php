<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model {

	public function getallabout(){
		$sql = "SELECT * FROM tb_about WHERE active = 1";
		$q = $this->db->query($sql);
		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"about_id" =>$r['about_id'],
					"about" => unserialize($r['about']),
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}

	}

	public function saveabout($data = array()){
		$value = array(
			'about' => serialize($data['about']),
			'created_by' => $this->session->userdata('member_id'),
			'thumbnail' => $data['thumbnail'],
		);

		if ($this->db->insert('tb_about', $value)) {
			return true;
		}else{
			return false;
		}
	}

	public function getaboutbyid($id){
		$sql = "SELECT * FROM tb_about WHERE about_id = ".$id." AND active = 1 ";

		$q = $this->db->query($sql);
		if ($q->num_rows() > 0) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"about_id" =>$r['about_id'],
					"about" => unserialize($r['about']),
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

	public function updateabout($data = array()){
		if (!empty($data['thumbnail'])) {
			$value = array(
               	'about' => serialize($data['about']),
				'updated_by' => $this->session->userdata('member_id'),
				'thumbnail' => $data['thumbnail'],
            );

			$this->db->where('about_id', $data['about_id']);
			$rs = $this->db->update('tb_about', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}else{
			$value = array(
               	'about' => serialize($data['about']),
				'updated_by' => $this->session->userdata('member_id'),
            );

			$this->db->where('about_id', $data['about_id']);
			$rs = $this->db->update('tb_about', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}
	}

	public function deleteabout($id){
		
		$sql = "UPDATE tb_about SET active = 0 WHERE about_id = ".$id;

		$q = $this->db->query($sql);
		if($q == 1){
			echo "success";
		}else{
			echo "fail";
		}
	}
}

/* End of file AboutModel.php */
/* Location: ./application/models/AboutModel.php */