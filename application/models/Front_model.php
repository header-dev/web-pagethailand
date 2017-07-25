<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_model extends CI_Model {

	function getslide(){
		$sql = "SELECT * FROM tb_images WHERE active = 1 and image_type = 4";

		$q = $this->db->query($sql);
		return $q->result_array();

	}

	function getproductgroup(){
		$sql = "SELECT * FROM tb_product_group
				WHERE active = 1";

		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"product_group_id" =>$r['product_group_id'],
					"product_group" =>unserialize($r['product_group']),
					"description"=> unserialize($r['description']),
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	function getservicegroup(){
		$sql = "SELECT * FROM tb_service_group
				WHERE active = 1";

		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"service_group_id" =>$r['service_group_id'],
					"service_group" =>unserialize($r['service_group']),
					"description"=> unserialize($r['description']),
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	function getproduct(){
		$sql = "SELECT * FROM tb_product
				WHERE active = 1";

		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"product_id" =>$r['product_id'],
					"product_name" =>unserialize($r['product_name']),
					"product_detail"=> unserialize($r['product_detail']),
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	function getproductbyid($id = null){
		$sql = "SELECT * FROM tb_product
				WHERE active = 1 and product_id = ".$id;

		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"product_id" =>$r['product_id'],
					"product_name" =>unserialize($r['product_name']),
					"product_detail"=> unserialize($r['product_detail']),
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	function getservicebyid($id=null){
		$sql = "SELECT * FROM tb_service
				WHERE active = 1 and service_id = ".$id;

		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"service_id" =>$r['service_id'],
					"service" =>unserialize($r['service']),
					"service_detail"=> unserialize($r['service_detail']),
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	function getimageservicebyid($id=null){
		$sql = "SELECT * FROM tb_images
				WHERE active = 1 and image_type = 3 and ref_id = ".$id;

		if ($q = $this->db->query($sql)) {
			return $q->result_array();
		}
	}


	function getimagebyid($id = null){
		$sql = "SELECT * FROM tb_images
				WHERE active = 1 and image_type = 1 and ref_id = ".$id;

		if ($q = $this->db->query($sql)) {
			return $q->result_array();
		}
	}

	function getservice(){
		$sql = "SELECT * FROM tb_service
				WHERE active = 1";

		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"service_id" =>$r['service_id'],
					"service" =>unserialize($r['service']),
					"service_detail"=> unserialize($r['service_detail']),
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	function getallnews($limit, $start){

		$sql = "SELECT * FROM tb_news WHERE active = 1 limit " . $start . ", " . $limit;
		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"news_id" =>$r['news_id'],
					"topic" =>unserialize($r['topic']),
					"sub-topic"=> unserialize($r['sub-topic']),
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	function getabouts(){
		$sql = "SELECT * FROM tb_about WHERE active = 1 ";
		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"about_id" =>$r['about_id'],
					"about" =>unserialize($r['about']),
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	function getallcustomers(){
		$sql = "SELECT * FROM tb_images
		WHERE image_type = 6 and active = 1 ";
		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"image_id" =>$r['image_id'],
					"image" =>$r['image'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	function getcontact(){
		$sql = "SELECT * FROM tb_contact WHERE active = 1";
		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"contact_id" =>$r['contact_id'],
					"company_name" =>unserialize($r['company_name']),
					"address" =>unserialize($r['address']),
					"tel" => $r['tel'],
					"mobile" => $r['mobile'],
					"fax" => $r['fax'],
					"facebook" => $r['facebook'],
					"instagram" => $r['instagram'],
					"twitter" => $r['twitter'],
					"hot_line" => $r['hot_line'],
					"email" => $r['email'],
					"image_map" => $r['image_map'],
					"api_map" => $r['api_map'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	function getcareer(){
		$sql = "SELECT * FROM tb_jobs WHERE active = 1";
		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"jobs_id" =>$r['jobs_id'],
					"position" =>unserialize($r['position']),
					"responsibility" =>unserialize($r['responsibility']),
					"welfare" =>unserialize($r['welfare']),
					"remark" =>unserialize($r['remark']),
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

	function getnewsbyid($id=null){
		$sql = "SELECT * FROM tb_news WHERE active = 1 AND news_id = ".$id;
		if ($q = $this->db->query($sql)) {
			$item=array();
			foreach ($q->result_array() as $r) {
				$ar = array(
					"news_id" =>$r['news_id'],
					"topic" =>unserialize($r['topic']),
					"sub-topic" =>unserialize($r['sub-topic']),
					"content" =>unserialize($r['content']),
					"news_date" =>$r['news_date'],
					"thumbnail" => $r['thumbnail'],
					"created_at" => $r['created_at'],
				);
				array_push($item, $ar);
			}
			return $item;
		}
	}

}

/* End of file FrontModel.php */
/* Location: ./application/models/FrontModel.php */