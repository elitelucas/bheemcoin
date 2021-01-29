<?php

class Deposit_model extends CI_Model {

    public function saveBtcAddress($insertData) {
        if ($this->db->insert('deposit', $insertData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
     public function totalgetbtc($userId) {
            $this->db->select('ROUND(SUM(btc),8) as s');
            $this->db->where('deposit_user_id', $userId);
			$objQuery = $this->db->get('deposit');
        return $objQuery->result_array();
    }
    public function getDeposit($user_id) {
        $this->db->where('deposit_user_id', $user_id);
        $this->db->where('deposit_status', 1);
        $objQuery = $this->db->get('deposit');
        return $objQuery->result_array();
    }
	
    public function getDepositall($user_id) {
        $this->db->where('deposit_user_id', $user_id);
        $objQuery = $this->db->get('deposit');
        return $objQuery->result_array();
    }
    public function get_last_btc($user_id) {

        $this->db->select_max('deposit_id');
        $this->db->where('deposit_user_id', $user_id);

        $objQuery = $this->db->get('deposit');
        //echo $this->db->last_query(); die;
        $max_id = $objQuery->row_array();
        //  echo "<prE>";        print_r($max_id); die;
        if ($max_id['deposit_id']) {
            $this->db->get('deposit_user_id');
            $this->db->where('deposit_user_id', $user_id);
            $this->db->where('deposit_id', $max_id['deposit_id']);
            $objQuery = $this->db->get('deposit');
            return $objQuery->row_array();
        }
    }

    public function get_invoice($invoice_id) {
        $this->db->where('deposit_invoice_id', $invoice_id);
        $objQuery = $this->db->get('deposit');
        return $objQuery->row_array();
    }

    public function updateDeposit($invoice_id,$updateData) {
        $this->db->where('deposit_invoice_id', $invoice_id);
        if ($this->db->update('deposit', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	 public function updateDepositall($address,$btc) {
		// echo $address."_____".$btc;
		if($btc!=0){
		$this->db->query("update deposit set btc='".$btc."',deposit_status='1' where deposit_btc_address='".$address."'");
		}
    }
	 public function getDepositlast($user_id) {
		// echo $address."_____".$btc;
	$this->db->where('deposit_user_id', $user_id);
        $this->db->where('deposit_status', 1);
		 $this->db->order_by("deposit_date", "desc");
        $objQuery = $this->db->get('deposit');
        return $objQuery->result_array();
    }

}
