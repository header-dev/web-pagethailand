<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Language_model extends CI_Model
{

    public function getLang()
    {
        $sql = "CALL getLang()";

        $query = $this->db->query($sql);
        $data  = $query->result_array();
        $query->free_result();
        $query->next_result();

        return $data;
    }

    public function getAllLang()
    {
        $sql = "SELECT * FROM tb_language WHERE active = 1";
        $q   = $this->db->query($sql);

        return $q->result_array();
    }

    public function setEnable($input = array())
    {
        if ($input['enable']=='on') {
            $data = array(
                'enable' => 'off'
            );
        }else{
            $data = array(
                'enable' => 'on'
            );
        }
        $this->db->where('language_id', $input['language_id']);
        $q = $this->db->update('tb_language', $data);
        if ($q == 1) {
            return true;
        } else {
             return false;
        }
    }

    public function setDefault($id = null)
    {
        $sql = "UPDATE tb_language SET set_default = 1 WHERE language_id = " . $id;
        $q   = $this->db->query($sql);
        if ($q) {
            $sql = "UPDATE tb_language SET set_default = 0 WHERE language_id not in (".$id.")";
            $this->db->query($sql);
            return true;
        } else {
            return false;
        }
    }
}

/* End of file LanguageModel.php */
/* Location: ./application/models/LanguageModel.php */
