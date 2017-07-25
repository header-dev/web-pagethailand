<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Picture_model extends CI_Model
{
    public function saveslide($img)
    {
        $user = '';
        $user = $this->session->userdata('member_id');
        $sql  = "INSERT INTO tb_images (image,image_type,ref_id,created_by) VALUE('$img',4,0,$user)";
        $q    = $this->db->query($sql);
    }

    public function saveother($img)
    {
        $user = '';
        $user = $this->session->userdata('member_id');
        $sql  = "INSERT INTO tb_images (image,image_type,ref_id,created_by) VALUE('$img',5,0,$user)";
        $q    = $this->db->query($sql);
    }

    public function getslide()
    {
        $sql = "SELECT * FROM tb_images WHERE active = 1 AND image_type = 4 AND ref_id = 0 ";
        $q   = $this->db->query($sql);
        return $q->result_array();
    }
    public function delslide($id = null)
    {
        $sql = "UPDATE tb_images SET active = 0 WHERE image_id = " . $id;
        $q   = $this->db->query($sql);
        if ($q == 1) {
            echo "success";
        } else {
            echo "fail";
        }
    }

    public function getallpicture()
    {
        $sql = "SELECT * FROM tb_images WHERE active = 1";
        $q   = $this->db->query($sql);
        return $q->result_array();
    }

    public function getcustomers()
    {
        $sql = "SELECT * FROM tb_images WHERE active = 1 AND image_type = 6 AND ref_id = 0 ";
        $q   = $this->db->query($sql);
        return $q->result_array();
    }

    public function savecustomers($img)
    {
        $user = '';
        $user = $this->session->userdata('member_id');
        $sql  = "INSERT INTO tb_images (image,image_type,ref_id,created_by) VALUE('$img',6,0,$user)";
        $q    = $this->db->query($sql);
    }

    public function delcustomers($id = null)
    {
        $sql = "UPDATE tb_images SET active = 0 WHERE image_id = " . $id;
        $q   = $this->db->query($sql);
        if ($q == 1) {
            echo "success";
        } else {
            echo "fail";
        }
    }

    public function getallimage()
    {
        $sql = "SELECT *
		FROM
    		tb_images
		WHERE
			active = 1
		AND image_type not in (4)";
        $q = $this->db->query($sql);
        return $q->result_array();
    }

}

/* End of file PictureModel.php */
/* Location: ./application/models/PictureModel.php */
