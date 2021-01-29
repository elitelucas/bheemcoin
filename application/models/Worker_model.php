<?php

class Worker_model extends CI_Model {

    public function add_worker($insertData) {
        if ($this->db->insert('worker', $insertData)) {
            
            return TRUE;
        } else {
            
            return FALSE;
        }
    }

    public function get_worker($IworkerId = 0) {
        if ($IworkerId != 0) {
            $this->db->where('worker_id', $IworkerId);
        }
        $objQuery = $this->db->get('worker');
        return $objQuery->result_array();
    }

    public function get_worker_img($hiddenID = 0) {
        if ($hiddenID != 0) {
            $this->db->where('worker_id', $hiddenID);
        }
        $objQuery = $this->db->get('worker');
        return $objQuery->result_array();
    }

    public function update_worker($IworkerId, $updateData) {
        $this->db->where('worker_id', $IworkerId);
        if ($this->db->update('worker', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_worker($IworkerId) {
        $this->db->where('worker_id', $IworkerId);
        if ($this->db->delete('worker')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
