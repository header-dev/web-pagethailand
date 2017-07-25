<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model {

	function getMember($data = array()){

		$where = '';
		if (!empty($data)) {
			$username = $data['username'];
			$password = $data['password'];

			$where .= " WHERE username = '".$username."'
			AND password = PASSWORD('".$password."') AND ACTIVE = 1 ";
		}

		$sql = "SELECT * FROM tb_member $where";

		// printf($sql);

		$q = $this->db->query($sql);


		if ($q->num_rows() > 0) {
			$rs = $q->row_array();
			$array = array(
				'username' => $rs['username'],
				'member_id' => $rs['member_id'],
				'name'=>$rs['name'],
				'role' => $rs['role'],
				'lang' => 'english',
				'last_login' => date("Y-m-d H:i:sa"),
			);
			$val = array(
				'last_login' => date("Y-m-d H:i:sa"),
			);


			$this->session->set_userdata($array);
			$this->db->where('member_id', $rs['member_id']);
			if ($this->db->update('tb_member', $val)) {
				return true;
			}
		} else {
			return false;
		}
	}

	public function getusersbyid($id){
		$sql = "SELECT * FROM tb_member WHERE member_id = ".$id;
		$q = $this->db->query($sql);
		return $q->result_array();
	}

	public function saveusers($data = array()){
		$sql = "INSERT INTO tb_member (name,username,password)
				VALUES ('".$data['name']."','".$data['username']."',PASSWORD('".$data['password']."'));";
		$rs = $this->db->query($sql);
		if ($rs==1) {
			return true;
		}else{
			return false;
		}
	}
	public function updateusers($data =array()){
		$sql = "UPDATE tb_member SET name = '".$data['name']."' , 
		username = '".$data['username']."' , password = PASSWORD('".$data['password']."') 
		WHERE member_id = ".$data['member_id'];
		$q = $this->db->query($sql);
		if ($q == 1) {
			return true;
		}else{
			return false;
		}
	}

	public function getallusers(){
		$sql = "SELECT * FROM tb_member WHERE active = 1";

		$q = $this->db->query($sql);

		return $q->result_array();
	}

	public function delusers($id){
		$this->db->where('member_id', $id);
		$q = $this->db->delete('tb_member');
		if ($q == 1) {
			return true;
		}else{
			return false;
		}
	}
}

/* End of file Member.php */
/* Location: ./application/models/Member.php */