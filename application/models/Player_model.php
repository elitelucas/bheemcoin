<?php

class Player_model extends CI_Model {

    public function add_player($insertData) {
        if ($this->db->insert('player', $insertData)) {
           // return TRUE;
           // echo $this->db->last_query();
            //die;
        } else {
            //echo $this->db->last_query();
            //die;
            return FALSE;
        }
    }

    public function get_player($IplayerId = 0) {
        if ($IplayerId != 0) {
            $this->db->where('player_id', $IplayerId);
        }
        $objQuery = $this->db->get('player');
        return $objQuery->result_array();
    }

    public function get_player_image($IplayerId,$userId) {
        if ($IplayerId != 0) {
            $this->db->where('player_id', $IplayerId);
        }
      //  $this->db->where('player_user_id', $userId);
        $objQuery = $this->db->get('player');
        //echo $this->db->last_query(); die;
        return $objQuery->row_array();
    }

    public function get_player_img($hiddenID = 0) {
        if ($hiddenID != 0) {
            $this->db->where('player_id', $hiddenID);
        }
        $objQuery = $this->db->get('player');
        return $objQuery->result_array();
    }

    public function update_player($IplayerId, $updateData) {
        $this->db->where('player_id', $IplayerId);
        if ($this->db->update('player', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_player($IplayerId) {
        $this->db->where('player_id', $IplayerId);
        if ($this->db->delete('player')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
