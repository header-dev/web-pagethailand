<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_model extends CI_Model {

	public function saveProgram($data = array())
	{
		$value = array(
			'name' => $data['name'],
			'description' => $data['description'],
			'lang' => strtolower($data['lang']),
			'createdby' => $this->session->userdata('member_id'),
			'thumbnail' => $data['thumbnail'],
		);

		if ($this->db->insert('tb_program', $value)) {
			return true;
		}else{
			return false;
		}
	}

	public function getProgram()
	{

        $query = $this->db->query("CALL GET_PROGRAM()");
        $data  = $query->result_array();
        $query->free_result();
        $query->next_result();

        return $data;

	}

	public function getProgramById($id = null)
	{
		$query = $this->db->query("CALL GET_PROGRAM_BYID(".$id.")");
		$data  = $query->result_array();
        $query->free_result();
        $query->next_result();

        return $data;
	}

	public function deleteProgram($id = null)
	{
		$q = $this->db->query("CALL UNACTIVE_PROGRAM(".$id.")");
        $q->free_result();
        if ($this->db->affected_rows() > 0) {
        	return true;
        }else{
        	return false;
        }
	}

	public function updateProgram($data = array())
	{
		$this->db->where('program_id',$data['program_id']);
		$this->db->update('tb_program',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
        }else{
        	return false;
        }

	}

}

/* End of file ProgramModel.php */
/* Location: ./application/models/ProgramModel.php */