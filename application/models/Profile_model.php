<?php

class Profile_model extends CI_Model {

    public function get_Profile($iDProfile = 0) {
        if ($iDProfile != 0) {
            $this->db->where('id', $iDProfile);
        }
        $objQuery = $this->db->get('users');
        return $objQuery->row_array();
    }

    public function check_Password($userId, $old_password) {
        $this->db->where('id', $userId);
        $this->db->where('password', $old_password);
        $objQuery = $this->db->get('users');
        if ($objQuery->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_profile($userId, $updateData) {
        $this->db->where('id', $userId);
        if ($this->db->update('users', $updateData)) {
            //echo 'hello'; die;
            return TRUE;
        } else {
            //echo 'hello die'; die;
            return FALSE;
        }
    }

}

?>