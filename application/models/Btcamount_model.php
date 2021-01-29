<?php

class Btcamount_model extends CI_Model {

     public function insertdata($insertData) {
	    $this->db->insert('btcamount', $insertData);
		
    }
	public function getdata($getData) {
        $this->db->where('user_id', $getData['user_id']);
        $this->db->where('address', $getData['address']);
		 $this->db->where('flag',1);
	    $objQuery = $this->db->get('btcamount');
        return $objQuery->result_array();
    }
    public function getflag($getData) {
        $this->db->where('user_id', $getData['user_id']);
        $this->db->where('address', $getData['address']);
	    $objQuery = $this->db->get('btcamount');
        return $objQuery->result_array();
    }
	
}
