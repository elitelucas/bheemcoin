<?php

class User_model extends CI_Model {

    public function verifyUser($user, $password) {
        $this->db->where('username', $user);
        $this->db->where('password', $password);
        $this->db->where('user_admin', 1);
        $objQuery = $this->db->get('users');


        if ($objQuery->num_rows() > 0) {
            $row = $objQuery->result_array();
            //echo "<pre>";            print_r($row); die;
            $session_data = array(
                'id' => $row[0]['id'],
                'username' => $row[0]['username'],
                'refered_by' => $row[0]['refered_by'],
                'bitcoin_address' => $row[0]['bitcoin_address'],
                'email' => $row[0]['email'],
                'image' => $row[0]['image'],
                'reference_link' => $row[0]['reference_link'],
                'how_find' => $row[0]['how_find'],
                'ip_address' => $row[0]['ip_address'],
                'status' => $row[0]['status'],
                'date' => $row[0]['date'],
                'user_admin' => $row[0]['user_admin'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
            $this->session->set_flashdata('success', 'Login Successfully');
        } else {
            $row = $objQuery->result_array();
            $session_data = array(
                'logged_in' => FALSE
            );
            $this->session->set_userdata($session_data);
            $this->session->set_flashdata('failed', 'Incorrect Username Or Password !');
        }
    }

    public function getAll_user($admin_id = 0) {
        if ($admin_id != 0) {
            $this->db->where('id',$admin_id);
        }
        
        $this->db->group_by('ip_address'); 
        $objQuery = $this->db->get('users');
        return $objQuery->result_array();
    }

    public function get_profile($admin_id) {
        $this->db->where('id', $admin_id);
        $objQuery = $this->db->get('users');
        return $objQuery->row_array();
    }

    public function update_Profile($admin_id, $updateData) {
        $this->db->where('id', $admin_id);
        if ($this->db->update('users', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_old_password($txtOldPassword) {
        $this->db->where('password', $txtOldPassword);
        $objQuery = $this->db->get('users');
        if ($objQuery->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_api_settings() {
        $this->db->where('current', '1');
        $objQuery = $this->db->get('api_settings');
        // echo $this->db->last_query(); die;
        return $objQuery->row_array();
    }

    public function get_current_api_data($api_name) {
        $this->db->where('api_name', $api_name);
        $objQuery = $this->db->get('api_settings');
        return $objQuery->row_array();
    }

    public function update_api($api_hidden_id, $arrUpdateData) {
        // $this->db->where()
        $this->db->where('api_id', $api_hidden_id);
        if ($this->db->update('api_settings', $arrUpdateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* public function get_current_val($api_hidden_id) {
      $this->db->where('api_id', $api_hidden_id);
      $objQuery = $this->db->get('api_settings');
      return $objQuery->row_array();
      } */

    public function update_set_api_value($current, $api_hidden_id) {

        $this->db->where('api_id !=', $api_hidden_id);
        if ($this->db->update('api_settings', array('current' => $current))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* public function get_current_val($api_hidden_id) {
      $this->db->where('api_id', $api_hidden_id);
      $objQuery = $this->db->get('api_settings');
      return $objQuery->row_array();
      } */

    public function update_UserHealth($user_id, $updateData) {

        $this->db->where('id', $user_id);
        if ($this->db->update('users', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	public function getUserss($userId, $amount){
		 $this->db->where('id', $userId);
        $objQuery = $this->db->get('users');
//        echo $this->db->last_query(); die;
        return $objQuery->row_array();
		
	}
    public function updateUserss($userId, $amount){
		$this->db->query("update users set user_attack_player_satoshi='".$amount."' where id='".$userId."'");
	}
    public function updateUserSatoshi($userId, $updateData) {
        $this->db->where('id', $userId);
        if ($this->db->update('users', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getSatoshi($admin_id) {
        $this->db->where('collect_user_id', $admin_id);
        $objQuery = $this->db->get('collect_satoshi');
//        echo $this->db->last_query(); die;
        return $objQuery->row_array();
    }

    // using this we can get today's won saoshi ..
    public function get_today_satoshi($admin_id, $dateTime) {
        $this->db->select('sum(generated_satoshi_amount) as total_Satoshi');
        //$this->db->select_sum('generated_satoshi_amount');
        $this->db->where('generated_satoshi_user_id', $admin_id);
        $this->db->like('generated_satoshi_created_date', $dateTime);
        $objQuery = $this->db->get('generated_satoshi');
        //echo $this->db->last_query(); die;

        return $objQuery->row_array();
    }

    public function updateOldSatoshi($user_id = 0, $updateSatoshiOLD) {
        if ($user_id != 0) {
            $this->db->where('collect_user_id', $user_id);
        }
        if ($this->db->update('collect_satoshi', $updateSatoshiOLD)) {
            //  echo $this->db->last_query(); die;
            return TRUE;
        } else {
            // echo $this->db->last_query(); die;
            return FALSE;
        }
    }

    public function insertSatoshi($insertData) {
        if ($this->db->insert('collect_satoshi', $insertData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function generatedSatoshi($InsertGeneratedSatoshiData) {
        if ($this->db->insert('generated_satoshi', $InsertGeneratedSatoshiData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_user_id($refer_ID) {
        $this->db->where("username", $refer_ID);
        $query = $this->db->get('users');
        // echo $this->db->last_query(); die;
        //$q = $query->result_array();
        //$ref_id = "";
        if ($query->num_rows() > 0) {
            return $query->row_array();
            //$ref_id = $q[0]['id'];
        }
    }
 
    // using this we can get referal 
    public function get_referal($user_id) {
        // $this->db->where('id', $user_id);
        $this->db->where('refered_by', $user_id);
        $objQuery = $this->db->get('users');
        //echo $this->db->last_query(); die;
        $data['rowcount'] = $objQuery->num_rows();
        $row = $objQuery->result_array();
        return $row;
    }

    public function get_earn_satoshi($user_id) {
        $this->db->select('sum(generated_satoshi_amount) as total_Satoshi');
        $this->db->where('generated_satoshi_user_id', $user_id);
        $objQuery = $this->db->get('generated_satoshi');
        return $objQuery->row_array();
    }

    public function updateReferSatoshi($refer_id, $updateUSERreferal) {
        $this->db->where('id', $refer_id);
        $this->db->update('users', $updateUSERreferal);
    }
      public function getedit($user_id) {
        $this->db->where('id', $user_id);
        $objQuery = $this->db->get('users');
        return $objQuery->result_array();
    }
  public function updateuserdetails($userId, $updateData){
		$this->db->query("update users set 	user_attack_player_satoshi='".$updateData['satoshi']."',	email='".$updateData['email']."',
		username='".$updateData['username']."',	bitcoin_address='".$updateData['bitcoin_address']."',	status='".$updateData['status']."' where id='".$userId."'");
		$r=1;
		return $r;
	
	}
}
