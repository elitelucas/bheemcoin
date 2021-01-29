<?php

class Daily_gift_model extends CI_Model {

    /**
     * save_dailyGift
     *
     * @uses        using this we can save daily gift   
     * @author      Webiots_m     
     */
    public function save_dailyGift($arrData) {
        if ($this->db->insert('daily_earnings', $arrData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * get_dailyGift 
     *
     * @uses       check existing date with current date 
     * @author     Webiots_m     
     */
    public function get_dailyGift($user_id, $current_date) {
        $this->db->where('daily_user_id', $user_id);
        $this->db->like('daily_created_date', $current_date);
        $objQuery = $this->db->get('daily_earnings');

        //echo $this->db->last_query(); die;
        //echo $this->db->last_query(); die;
        //$this->db->where('daily_created_date', $current_date);

        if ($objQuery->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
        //return $objQuery->row_array();
    }

    public function changeStatusDailyEarning($user_id, $getFoodid, $updateData) {
        $this->db->where('daily_id', $getFoodid);
        $this->db->where('daily_user_id', $user_id);
        if ($this->db->update('daily_earnings', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_DailyGift($user_id, $updateData) {
        $this->db->where('id', $user_id);
        if ($this->db->update('users', $updateData)) {
           // echo "<prE>";            print_r($this->db->last_query()); die;
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
