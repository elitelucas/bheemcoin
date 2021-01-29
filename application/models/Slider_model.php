<?php

class Slider_model extends CI_Model {

    public function add_slider($insertData) {
        if ($this->db->insert('slider', $insertData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_slider($IsliderId = 0) {
        if ($IsliderId != 0) {
            $this->db->where('slider_id', $IsliderId);
        }
        $objQuery = $this->db->get('slider');
        return $objQuery->result_array();
    }

    public function get_slider_img($hiddenID = 0) {
        if ($hiddenID != 0) {
            $this->db->where('slider_id', $hiddenID);
        }
        $objQuery = $this->db->get('slider');
        return $objQuery->result_array();
    }

    public function update_slider($IsliderId, $updateData) {
        $this->db->where('slider_id', $IsliderId);
        if ($this->db->update('slider', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_slider($IsliderId) {
        $this->db->where('slider_id', $IsliderId);
        if ($this->db->delete('slider')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
