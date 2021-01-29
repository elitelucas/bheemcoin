<?php

class Advertise_model extends CI_Model {

    /**
     * addAdvertise
     *
     * @uses        using this we can add advertise 
     * @author      Webiots_m     
     */
    public function addAdvertise($insertData) {
        if ($this->db->insert('advertise', $insertData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * getAdvertise
     *
     * @uses        using this we can get advertise and display ..
     * @author      Webiots_m     
     */
    public function getAdvertise($IAdvertiseId = 0) {
        if ($IAdvertiseId != 0) {
            $this->db->where('advertise_id', $IAdvertiseId);
        }
        $objQuery = $this->db->get('advertise');
        return $objQuery->result_array();
    }

    /**
     * updateAdvertise
     *
     * @uses        using this we can update advertise limit 
     * @author      Webiots_m     
     */
    public function updateAdvertise($IAdvertiseId, $updateData) {
        $this->db->where('advertise_id', $IAdvertiseId);
        if ($this->db->update('advertise', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * deleteAdvertise
     *
     * @uses        using this we can delete advertise 
     * @author      Webiots_m     
     */
    public function deleteAdvertise($IAdvertiseId) {
        $this->db->where('advertise_id', $IAdvertiseId);
        if ($this->db->delete('advertise')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
