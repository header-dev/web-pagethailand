<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

	public function getcontact(){
		$sql = "SELECT * FROM tb_contact WHERE active = 1 ";
		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"contact_id" => $r['contact_id'],
					"company_name" =>unserialize($r['company_name']),
					"address" => unserialize($r['address']),
					"mobile" => $r['mobile'],
					"facebook" => $r['facebook'],
					"twitter" => $r['twitter'],
					"instagram" => $r['instagram'],
					"tel" => $r['tel'],
					"fax" => $r['fax'],
					"hot_line" => $r['hot_line'],
					"email" => $r['email'],
					"api_map" => $r['api_map'],
					"image_map" => $r['image_map'],
				);
				array_push($item, $ar);
			}
			return $item;
		}else{
			return null;
		}
	}

	public function savecontact($data = array()){
		$value = array(
			'company_name' => serialize($data['company_name']),
			'address' => serialize($data['address']),
			'tel' => $data['tel'],
			'mobile' => $data['mobile'],
			'hot_line' => $data['hot_line'],
			"facebook" => $data['facebook'],
			"twitter" => $data['twitter'],
			"instagram" => $data['instagram'],
			'fax' => $data['fax'],
			'email' => $data['email'],
			'api_map' => $data['api_map'],
			'created_by' => $this->session->userdata('member_id'),
			'image_map' => $data['image_map'],
		);

		if ($this->db->insert('tb_contact', $value)) {
			return true;
		}else{
			return false;
		}
	}

	public function updatecontact($data = array()){
		if (!empty($data['image_map'])) {
			$value = array(
               	'company_name' => serialize($data['company_name']),
				'address' => serialize($data['address']),
				'tel' => $data['tel'],
				'mobile' => $data['mobile'],
				'hot_line' => $data['hot_line'],
				'fax' => $data['fax'],
				'email' => $data['email'],
				"facebook" => $data['facebook'],
				"twitter" => $data['twitter'],
				"instagram" => $data['instagram'],
				'api_map' => $data['api_map'],
				'created_by' => $this->session->userdata('member_id'),
				'image_map' => $data['image_map'],
            );

			$this->db->where('contact_id', $data['contact_id']);
			$rs = $this->db->update('tb_contact', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}else{
			$value = array(
               	'company_name' => serialize($data['company_name']),
				'address' => serialize($data['address']),
				'tel' => $data['tel'],
				'mobile' => $data['mobile'],
				'hot_line' => $data['hot_line'],
				"facebook" => $data['facebook'],
				"twitter" => $data['twitter'],
				"instagram" => $data['instagram'],
				'fax' => $data['fax'],
				'email' => $data['email'],
				'api_map' => $data['api_map'],
				'created_by' => $this->session->userdata('member_id'),
            );

			$this->db->where('contact_id', $data['contact_id']);
			$rs = $this->db->update('tb_contact', $value);
			if ($rs == 1) {
				return true;
			}else{
				return false;
			}
		}
	}

}

/* End of file ContactModel.php */
/* Location: ./application/models/ContactModel.php */