<?php

class Daily_message_model extends CI_Model {

    /**
     * addDaily_message
     *
     * @uses        using this we can add daily_message 
     * @author      Webiots_m     
     */
    public function addDaily_message($insertData) {
        if ($this->db->insert('daily_message', $insertData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * getDaily_message
     *
     * @uses        using this we can get daily_message and display ..
     * @author      Webiots_m     
     */
    public function getDaily_message($IDaily_messageId = 0) {
        if ($IDaily_messageId != 0) {
            $this->db->where('daily_message_id', $IDaily_messageId);
        }
        $objQuery = $this->db->get('daily_message');
        return $objQuery->result_array();
    }

    /**
     * getDaily_message
     *
     * @uses        using this we can get daily_message and display ..
     * @author      Webiots_m     
     */
    public function get_user_Daily_message($userId) {

        $this->db->where('daily_message_user_id', $userId);

        $objQuery = $this->db->get('daily_message');
        return $objQuery->result_array();
    }

    /**
     * getDaily_UserMessage
     *
     * @uses        using this we can get get Daily UserMessage and display ..
     * @author      Webiots_m     
     */
    public function getDaily_UserMessage($daily_message_user_id) {
        
        $this->db->join('users','daily_message.daily_message_user_id = users.id');
        $objQuery = $this->db->get('daily_message');
        return $objQuery->result_array();
    }

    /**
     * updateDaily_message
     *
     * @uses        using this we can update daily_message limit 
     * @author      Webiots_m     
     */
    public function updateDaily_message($IDaily_messageId, $updateData) {
        $this->db->where('daily_message_id', $IDaily_messageId);
        if ($this->db->update('daily_message', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * deleteDaily_message
     *
     * @uses        using this we can delete daily_message 
     * @author      Webiots_m     
     */
    public function deleteDaily_message($IDaily_messageId) {
        $this->db->where('daily_message_id', $IDaily_messageId);
        if ($this->db->delete('daily_message')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // get all users list for daily message ..
    public function getAllUser() {

        $objQuery = $this->db->get('users');
        return $objQuery->result_array();
    }

}
