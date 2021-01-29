<?php

class Withdraw_limit_model extends CI_Model {

    /**
     * addWithdraw_limit
     *
     * @uses        using this we can add withdraw_limit 
     * @author      Webiots_m     
     */
    public function addWithdraw_limit($insertData) {
        if ($this->db->insert('withdraw_limit', $insertData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * getWithdraw_limit
     *
     * @uses        using this we can get withdraw_limit and display ..
     * @author      Webiots_m     
     */
    public function getWithdraw_limit($IWithdraw_limitID = 0) {
        if ($IWithdraw_limitID != 0) {
            $this->db->where('withdraw_limit_id', $IWithdraw_limitID);
        }
        $objQuery = $this->db->get('withdraw_limit');
        return $objQuery->result_array();
    }

    /**
     * updateWithdraw_limit
     *
     * @uses        using this we can update withdraw_limit limit 
     * @author      Webiots_m     
     */
    public function updateWithdraw_limit($IWithdraw_limitID, $updateData) {
        $this->db->where('withdraw_limit_id', $IWithdraw_limitID);
        if ($this->db->update('withdraw_limit', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * deleteWithdraw_limit
     *
     * @uses        using this we can delete withdraw_limit 
     * @author      Webiots_m     
     */
    public function deleteWithdraw_limit($IWithdraw_limitID) {
        $this->db->where('withdraw_limit_id', $IWithdraw_limitID);
        if ($this->db->delete('withdraw_limit')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getRequestType($request) {
        $this->db->where('withdraw_limit_type', $request);
        $objQuery = $this->db->get('withdraw_limit');
        return $objQuery->row_array();
    }

}
