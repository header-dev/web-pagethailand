<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

	public function getAllGroup(){

		$sql = "SELECT * FROM tb_news_group WHERE active = 1 ";
		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"news_group_id" =>$r['news_group_id'],
					"news_group" => unserialize($r['news_group']),
					"description"=> unserialize($r['description']),
				);
				array_push($item, $ar);
			}
			return $item;
		}else{
			return null;
		}

	}

	public function saveGroup($data = array()){
		$value = array(
			'news_group' => serialize($data['news_group']),
			'description' => serialize($data['description']),
			'created_by' => $this->session->userdata('member_id'),
			'thumbnail' => $data['thumbnail'],
		);

		if ($this->db->insert('tb_news_group', $value)) {
			return true;
		}else{
			return false;
		}
	}

	public function getallnews(){
		$sql = "SELECT * FROM tb_news p\n".
"WHERE p.active = 1 ";

		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"news_id" =>$r['news_id'],
					"topic"=> unserialize($r['topic']),
					"sub-topic"=> unserialize($r['sub-topic']),
					"news_date" => $r['news_date'],
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
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

	public function updateGroup($data = array()){
		if (!empty($data['thumbnail'])) {
			$value = array(
               	'news_group' => serialize($data['news_group']),
				'description' => serialize($data['description']),
				'updated_by' => $this->session->userdata('member_id'),
				'thumbnail' => $data['thumbnail'],
            );

			$this->db->where('news_group_id', $data['news_group_id']);
			$rs = $this->db->update('tb_news_group', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}else{
			$value = array(
               	'news_group' => serialize($data['news_group']),
				'description' => serialize($data['description']),
				'updated_by' => $this->session->userdata('member_id'),
            );

			$this->db->where('news_group_id', $data['news_group_id']);
			$rs = $this->db->update('tb_news_group', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}
	}
	public function delGroup($id = null){
			$data = array(
               'active' => 0,
        	);

			$this->db->where('news_group_id', $id);
			$rs = $this->db->update('tb_news_group', $data);
			if ($rs = 1) {
				return true;
			}else{
				return false;
			}
	}

	public function savenews($data = array()){

		$value = array(
			'topic' => serialize($data['topic']),
			'sub-topic' => serialize($data['sub-topic']),
			'news_date' => $data['news_date'],
			'created_by' => $this->session->userdata('member_id'),
			'thumbnail' => $data['thumbnail'],
		);

		if ($this->db->insert('tb_news', $value)) {
			return true;
		}else{
			return false;
		}
	}
	public function savecontent($data = array()){

		$value = array(
			'content' => serialize($data['content']),
		);

		$this->db->where('news_id', $data['news_id']);

		if ($this->db->update('tb_news', $value)) {
			return true;
		}else{
			return false;
		}
	}


	public function getnewsbyid($id){
		$sql = "SELECT * FROM tb_news p\n".
			"WHERE p.active = 1 AND news_id = ".$id;

		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"news_id" =>$r['news_id'],
					"topic"=> unserialize($r['topic']),
					"content"=> unserialize($r['content']),
					"sub-topic"=> unserialize($r['sub-topic']),
					"news_date"=> $r['news_date'],
					"thumbnail" => $r['thumbnail'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	public function saveupdatenews($data = array()){

		if (!empty($data['thumbnail'])) {
			$value = array(
               	'topic' => serialize($data['topic']),
				'sub-topic' => serialize($data['sub-topic']),
				'news_date' => $data['news_date'],
				'updated_by' => $this->session->userdata('member_id'),
				'thumbnail' => $data['thumbnail'],
            );

			$this->db->where('news_id', $data['news_id']);
			$rs = $this->db->update('tb_news', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}else{
			$value = array(
               	'topic' => serialize($data['topic']),
				'sub-topic' => serialize($data['sub-topic']),
				'news_date' => $data['news_date'],
				'updated_by' => $this->session->userdata('member_id'),
            );

			$this->db->where('news_id', $data['news_id']);
			$rs = $this->db->update('tb_news', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}
	}

	public function delnews($id){
		$this->db->where('news_id', $id);
		$this->db->delete('tb_news');
	}
}

/* End of file NewsModel.php */
/* Location: ./application/models/NewsModel.php */