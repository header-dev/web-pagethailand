<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Province_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getProvince()
	{
		$sql = "SELECT * FROM tb_province WHERE active = 1;";
		$q = $this->db->query($sql);
		if ($this->db->affected_rows()) {
			return $q->result_array();
		}
	}

}

/* End of file Province_model.php */
/* Location: ./application/models/Province_model.php */