<?php

class Explorer_model extends CI_Model {

    /**
     * save_star
     *
     * @uses        using this we can save star  
     * @author      Webiots_m     
     */
    public function save_explorerStar($arrData) {
        if ($this->db->insert('explorer', $arrData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * get_Star 
     *
     * @uses       check existing date with current date 
     * @author     Webiots_m     
     */
    public function get_Star($user_id, $current_date) {
        $this->db->where('explorer_user_id', $user_id);
        $this->db->like('explorer_created_date', $current_date);
        $objQuery = $this->db->get('explorer');

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

    /**
     * update_Star
     *
     * @uses       check existing date with current date 
     * @author     Webiots_m     
     */
    public function update_Star($user_id, $updateData) {
        $this->db->where('id', $user_id);
        if ($this->db->update('users', $updateData)) {
            // echo "<prE>";            print_r($this->db->last_query()); die;
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
