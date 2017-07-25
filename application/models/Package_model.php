<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getPackage()
	{
		$data = array();
		$query = $this->db->query("CALL GET_PACKAGE()");
		$data  = $query->result_array();
		$query->free_result();
        $query->next_result();

        return $data;
	}

	public function getPackageById($id = null)
	{
		$data = array();
		$query = $this->db->query("CALL GET_PACKAGE_BYID(".$id.")");
		$data  = $query->result_array();
		$query->free_result();
        $query->next_result();

        return $data;
	}

	public function updatePackage($data = array())
	{
		$this->db->where('package_id',$data['package_id']);
		$this->db->update('tb_package',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
        }else{
        	return false;
        }
	}

	public function deletePackage($id = null)
	{

		$q = $this->db->query("CALL UNACTIVE_PACKAGE(".$id.")");

        $q->free_result();
        if ($this->db->affected_rows() > 0) {
        	return true;
        }else{
        	return false;
        }
	}

	public function savePackage($data = array())
	{
		$value = array(
			'program_id'=>$data['program_id'],
			'province_id'=>$data['province_id'],
			'name' => $data['name'],
			'description' => $data['description'],
			'detail' => $data['detail'],
			'remark' => $data['remark'],
			'period_detail' => $data['period_detail'],
			'lang' => strtolower($data['lang']),
			'createdby' => $this->session->userdata('member_id'),
			'thumbnail' => $data['thumbnail'],
		);
		$this->db->insert('tb_package', $value);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}
}

/* End of file Package_model.php */
/* Location: ./application/models/Package_model.php */