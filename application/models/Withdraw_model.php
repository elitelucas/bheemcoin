<?php

class Withdraw_model extends CI_Model {

    public function get_withdraw($userId = 0) {
        if ($userId != 0) {
            $this->db->where('withdraw_user_id', $userId);
        }

        $objQuery = $this->db->get('withdraw');
        return $objQuery->result_array();
    }
	 public function pendingbtc($userId) {
            $this->db->select('SUM(withdraw_btc_amount)');
            $this->db->where('withdraw_user_id', $userId);
			$this->db->where('withdraw_status', 0);
        

        $objQuery = $this->db->get('withdraw');
        return $objQuery->result_array();
    }
  public function paidbtc($userId) {
            $this->db->select('SUM(withdraw_btc_amount)');
            $this->db->where('withdraw_user_id', $userId);
			$this->db->where('withdraw_status', 1);
        

        $objQuery = $this->db->get('withdraw');
        return $objQuery->result_array();
    }
    public function get_withdraw_request($IwithdrawId = 0) {

        $this->db->where('withdraw_id', $IwithdrawId);

        $this->db->join('users', 'withdraw.withdraw_user_id = users.id');
        $objQuery = $this->db->get('withdraw');
        return $objQuery->row_array();
    }

    public function updateWithdrawRequest($requestId, $updateWithdrawal) {
        $this->db->where('withdraw_id', $requestId);
        if ($this->db->update('withdraw', $updateWithdrawal)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function saveWithdraw($insertData) {
        if ($this->db->insert('withdraw', $insertData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function paymentsAll() {

        //$this->db->where('withdraw_user_id', $userId);
        $this->db->join('users','withdraw.withdraw_user_id = users.id');

        $this->db->order_by('withdraw_date','DESC');
        $objQuery = $this->db->get('withdraw');
        return $objQuery->result_array();
    }

}
