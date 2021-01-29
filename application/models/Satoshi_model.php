<?php

class Satoshi_model extends CI_Model {

    /**
     * addSatoshi
     *
     * @uses        using this we can add satoshi 
     * @author      Webiots_m     
     */
    public function addSatoshi($insertData) {
        if ($this->db->insert('satoshi', $insertData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * getSatoshi
     *
     * @uses        using this we can get satoshi and display ..
     * @author      Webiots_m     
     */
    public function getSatoshi($ISatoshiId = 0) {
        if ($ISatoshiId != 0) {
            $this->db->where('satoshi_id', $ISatoshiId);
        }
        $objQuery = $this->db->get('satoshi');
        return $objQuery->result_array();
    }

    /**
     * updateSatoshi
     *
     * @uses        using this we can update satoshi limit 
     * @author      Webiots_m     
     */
    public function updateSatoshi($ISatoshiId, $updateData) {
        $this->db->where('satoshi_id', $ISatoshiId);
        if ($this->db->update('satoshi', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * deleteSatoshi
     *
     * @uses        using this we can delete satoshi 
     * @author      Webiots_m     
     */
    public function deleteSatoshi($ISatoshiId) {
        $this->db->where('satoshi_id', $ISatoshiId);
        if ($this->db->delete('satoshi')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
