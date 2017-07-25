<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_model extends CI_Model {

	public function getalljobs(){
		$sql = "SELECT * FROM tb_jobs WHERE active = 1";

		$q = $this->db->query($sql);

		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"jobs_id" =>$r['jobs_id'],
					"position" => unserialize($r['position']),
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	public function savejobs($data = array()){
		$value = array(
			'position' => serialize($data['position']),
			'welfare' => serialize($data['welfare']),
			'responsibility' => serialize($data['responsibility']),
			'remark' => serialize($data['remark']),
			'created_by' => $this->session->userdata('member_id'),
			'thumbnail' => $data['thumbnail'],
		);

		if ($this->db->insert('tb_jobs', $value)) {
			return true;
		}else{
			return false;
		}
	}

	public function deljobs($id){
		$data = array(
               'active' => 0,
               'updated_by' => $this->session->userdata('member_id')
        	);

		$this->db->where('jobs_id', $id);
		$rs = $this->db->update('tb_jobs', $data);

		if ($rs = 1) {
			return true;
		}else{
			return false;
		}
	}

	public function getjobsbyid($id){
		$sql = "SELECT * FROM tb_jobs WHERE jobs_id = ".$id." AND active = 1 ";
		$q = $this->db->query($sql);
		if ($q->num_rows() > 0) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"jobs_id" =>$r['jobs_id'],
					"position" => unserialize($r['position']),
					"welfare"=> unserialize($r['welfare']),
					"responsibility"=> unserialize($r['responsibility']),
					"remark"=> unserialize($r['remark']),
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

	public function updatejobs($data = array()){
		if (!empty($data['thumbnail'])) {
			$value = array(
               	'position' => serialize($data['position']),
               	'responsibility' => serialize($data['responsibility']),
				'welfare' => serialize($data['welfare']),
				'remark' => serialize($data['remark']),
				'updated_by' => $this->session->userdata('member_id'),
				'thumbnail' => $data['thumbnail'],
            );

			$this->db->where('jobs_id', $data['jobs_id']);
			$rs = $this->db->update('tb_jobs', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}else{
			$value = array(
               	'position' => serialize($data['position']),
               	'responsibility' => serialize($data['responsibility']),
				'welfare' => serialize($data['welfare']),
				'remark' => serialize($data['remark']),
				'updated_by' => $this->session->userdata('member_id'),
            );

			$this->db->where('jobs_id', $data['jobs_id']);
			$rs = $this->db->update('tb_jobs', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}
	}
}

/* End of file JobsModel.php */
/* Location: ./application/models/JobsModel.php */