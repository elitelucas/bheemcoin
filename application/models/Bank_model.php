<?php

class Bank_model Extends CI_Model {

    public function get_bank($user_id) {
        /* if ($IdEarning != 0) {
          $this->db->where('daily_id', $IdEarning);
          } */
        $this->db->select_sum('daily_amount');
        //$this->db->select('daily_amount');
        $this->db->where('daily_user_id', $user_id);
        $objQuery = $this->db->get('daily_earnings');
        //echo $this->db->last_query(); die;
        return $objQuery->row_array();
    }

    public function getBank($user_id = 0) {
        if ($user_id != 0) {
            $this->db->where('bank_user_id', $user_id);
        }
        $objQuery = $this->db->get('bank');
        return $objQuery->result_array();
    }

    public function saveBank($insertData) {
        if ($this->db->insert('bank', $insertData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function updateBank($bank_user_id, $updateBankData) {
        $this->db->where('bank_user_id', $bank_user_id);
        if ($this->db->update('bank', $updateBankData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
    

}
