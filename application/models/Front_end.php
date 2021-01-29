<?php

defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Front_end extends CI_Model {

    function __construct() {
        //call model constructor  
        parent::__construct();

        $this->load->database();
        $this->load->library("session");
        $this->load->helper('url');
    }

    /* function process_register() {

      } */

    /**
     * check_refer
     *
     * @package     using this we can get referal  when user register is exist or not..     
     * @author      Webiots_m
     * 
     */
    public function check_refer($refer_ID) {
        $this->db->where('username', $refer_ID);
        $objQuery = $this->db->get('users');
        //echo $this->db->last_query();die;
        if ($objQuery->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * validate_member
     *
     * @package     check referal is register or not ..   
     * @author      Webiots_m
     * 
     */
    public function validate_member($field_value) {
        $this->db->where('username', $field_value);
        $objQuery = $this->db->get('users');
        //echo $this->db->last_query();die;
        if ($objQuery->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * check_ip_address
     *
     * @package     using this we can check ip address is valid or not .  
     * @author      Webiots_m
     *
     */
    public function check_ip_address($ip) {
        $this->db->where('ip_address', $ip);
        $objQuery = $this->db->get('users');
        //echo $this->db->last_query();die;
        if ($objQuery->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * save_user
     *
     * @package     register user save ..  
     * @author      Webiots_m
     * 
     */
    public function save_user($insertdata) {
        if ($this->db->insert('users', $insertdata)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * save_dailyGift
     *
     * @uses        using this we can save daily gift   
     * @author      Webiots_m     
     */
    public function save_dailymonkeyStar($arrData) {
        if ($this->db->insert('monkeystar', $arrData)) {
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
    public function get_dailymonkeyStar($user_id, $current_date) {
        $this->db->where('monkeystar_user_id', $user_id);
        $this->db->like('monkeystar_created_date', $current_date);
        $objQuery = $this->db->get('monkeystar');

        //echo $this->db->last_query(); die;
        //$this->db->where('daily_created_date', $current_date);

        if ($objQuery->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
        //return $objQuery->row_array();
    }

    function check_username_availability() {
        $name = $this->input->post('name');

        $this->db->where("username", $name);
        $query = $this->db->get('users');
        $q = $query->result_array();

        if ($query->num_rows() == 1) {
            return "false";
        } else {
            return "success";
        }
    }

    function check_email_availability() {
        $email = $this->input->post('email');

        $this->db->where("email", $email);
        $query = $this->db->get('users');
        $q = $query->result_array();

        if ($query->num_rows() == 1) {
            return "false";
        } else {
            return "success";
        }
    }

    function validate_reference() {
        $refer_data = $this->input->post('refer_data');

        $this->db->where("username", $refer_data);
        $query = $this->db->get('users');
        $q = $query->result_array();

        if ($query->num_rows() == 1) {
            return "success";
        } else {
            return "false";
        }
    }

    function process_login() {
        $name = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $where = "username='$name' AND password='$password'";
        $this->db->where($where);
        $query = $this->db->get('users');
        $q = $query->result_array();


        if ($query->num_rows() == 1) {
            $user_id = $q[0]['id'];

            $this->session->set_userdata('user_login', 'true');
            $this->session->set_userdata('user_id', $user_id);
            $this->session->set_userdata('user_name', $name);
            $this->session->set_userdata('user_attack_player_satoshi', $q[0]['user_attack_player_satoshi']);
            $this->session->set_userdata('user_star', $q[0]['user_star']);
            $this->session->set_userdata('user_current_player', $q[0]['user_current_player']);
            $this->session->set_userdata('user_current_player_expire', $q[0]['user_current_player_expire']);
            $this->session->set_userdata('refered_by', $q[0]['refered_by']);
            $this->session->set_userdata('ip_address', $q[0]['ip_address']);
            $this->session->set_userdata('reference_link', $q[0]['reference_link']);
            $this->session->set_userdata('how_find', $q[0]['how_find']);
            $this->session->set_userdata('image', $q[0]['image']);
            $this->session->set_userdata('bitcoin_address', $q[0]['bitcoin_address']);
            $this->session->set_userdata('date', $q[0]['date']);
            $this->session->set_userdata('user_logged_in', TRUE);

            $this->db->where("username", $name);
            $system_date = date('Y-m-d H-i-s');
            $data = array(
                'status' => 1,
				'user_last_login'=>$system_date
            );
            $this->db->update("users", $data);
            return "success";
        } else {
            return "false";
        }
    }

    function update_logout($id) {
        $this->db->where("id", $id);
        $data = array("status" => 0);
        $this->db->update("users", $data);
    }

    function get_user_details($id) {
        $this->db->where("id", $id);
        $query = $this->db->get('users');
        return $q = $query->result_array();
    }

    function get_user_edit_profile($id) {
        $this->db->where("username", $id);
        $query = $this->db->get('users');
        return $q = $query->result_array();
    }

    // update profile check old password is right than its update..

    public function update_profile($id) {

        $this->load->library('image_lib');

        $this->db->where('username', $id);
        $query = $this->db->get('users');
        $q = $query->result_array();
        $user_id = $q[0]['id'];
        $old_Password = $_POST['old'];

        $old = md5($old_Password);
        // echo $old; die;
        // $new = md5($this->input->post('password'));

        $this->db->where('username', $id);
        $query = $this->db->get('users');
        // echo $this->db->last_query(); die;
        $q = $query->result_array();
        // echo "<pre>";        print_r($q); die;
        $user_id = $q[0]['id'];
        $user_pass = $q[0]['password'];
        //echo $user_pass; die;
        //echo $old; die;

        if ($user_pass == $old) {
            //echo 'hello'; die;

            $name = $this->input->post('name');
            $bitcoin = $this->input->post('bitcoin');
            $email = $this->input->post('email');
            $find = $this->input->post('find');

            $path = "";

            if (!empty($_FILES['file']['name'])) {
                $new_name = rand(10, 99) . str_replace(" ", "_", ($_FILES["file"]['name']));

                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = $new_name;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $path = "uploads/" . $new_name;

                    $upload_data = $this->upload->data();

                    //resize:

                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = $upload_data['full_path'];
                    $config2['overwrite'] = TRUE;
                    $config2['height'] = 150;

                    $this->load->library('image_lib', $config2);
                    $this->image_lib->initialize($config2);
                    $this->image_lib->resize();
                }

                $data = array(
                    'username' => $name,
                    'bitcoin_address' => $bitcoin,
                    'email' => $email,
                    'how_find' => $find,
                    'image' => $path
                );
            } else {
                $data = array(
                    'username' => $name,
                    'bitcoin_address' => $bitcoin,
                    'email' => $email,
                    'how_find' => $find
                );
            }
            $this->db->where('id', $user_id);
            if ($this->db->update('users', $data)) {
                return "success";
            }
        } else {
            return "failed";
        }
    }

    public function update_wallet($id) {
        $this->db->where('username', $id);
        $query = $this->db->get('users');
        $q = $query->result_array();
        $user_id = $q[0]['id'];

        $bitcoin = $this->input->post('bitcoin');
        if ($bitcoin != "") {
            $data = array('bitcoin_address' => $bitcoin);
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
        }
    }

    public function update_password($id) {
        $old = md5($this->input->post('old'));
        $new = md5($this->input->post('password'));

        $this->db->where('username', $id);
        $query = $this->db->get('users');
        $q = $query->result_array();
        $user_id = $q[0]['id'];
        $user_pass = $q[0]['password'];
        if ($user_pass == $old) {
            $data = array('password' => $new);
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
            return "success";
        } else {
            return "failed";
        }
    }

    //*************************Chat****************************************
    public function send_message_chat() {
        $message = $this->input->post('message');

        $user_id = $this->session->userdata('user_id');
        $date = date("Y-m-d");
        $time = date("h:i:s");

        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        $q = $query->result_array();
        $name = $q[0]['username'];
        $image = $q[0]['image'];

        $data = array("user_id" => $user_id,
            "username" => $name,
            "date" => $date,
            "time" => $time,
            "message" => $message,
            "image" => $image
        );
        $this->db->insert("chat", $data);
    }

    public function update_chat() {
        $q = $this->db->get('chat');
        $total = $q->num_rows();
        if ($total >= 6) {
            $start = $total - 5;
            $this->db->limit('5', $start);
        }
        $query = $this->db->get('chat');
        $result = $query->result_array();
        return $result;
    }

    public function update_chat_history() {
        $q = $this->db->get('chat');
        $total = $q->num_rows();
        if ($total >= 100) {
            $start = $total - 100;
            $this->db->limit('100', $start);
        }
        $query = $this->db->get('chat');
        $result = $query->result_array();
        return $result;
    }

    public function delete_old_msg() {
        $q = $this->db->get('chat');
        $total = $q->num_rows();
        if ($total >= 26) {
            $limit = $total - 25;
            $query = $this->db->query('DELETE FROM chat ORDER BY id ASC limit ' . $limit);
        }
    }

    public function get_online_player() {
        $this->db->order_by('id', 'ASC');
        $this->db->where('status', "1");
        $query = $this->db->get('users');
        $q = $query->result_array();
        return $q;
    }

    public function get_online_player1($limit, $start) {
        $this->db->order_by('id', 'ASC');
        $this->db->where('status', '1');
        $this->db->limit($limit, $start);
        $query = $this->db->get('users');
        $res = $query->result_array();
        return $res;

        /* $this->db->where('status',"1");
          $query=$this->db->get('users');
          $q=$query->result_array();
          return $q; */
    }

    public function get_user_details_lost() {
        $email = $this->input->post('email');
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        $q = $query->result_array();
        return $q;
    }
    public function last5_minutes(){
		$query = $this->db->query('select * from users where `user_last_login` > date_sub(now(), interval 5 minute) order by `user_last_login` desc');
		$result = $query->result_array();
		return $result;
	}
	public function count_last5_minutes(){
		$query = $this->db->query('select count(id) as usercount from users where `user_last_login` > date_sub(now(), interval 5 minute) order by `user_last_login` desc');
		$result = $query->result_array();
		return $result[0]['usercount'];
	}
    public function count_online_players() {
        $this->db->select('*');
        $this->db->where('status', '1');
        $query = $this->db->get('users');
        return $num = $query->num_rows();
    }

    public function get_all_user() {
        $query = $this->db->get('users');
        $q = $query->result_array();
        return $q;
    }

    public function do_reset_password($id) {
        $email = $this->input->post('email');
        $new = md5($this->input->post('password'));

        $this->db->where('id', $id);
        $query = $this->db->get('users');
        $q = $query->result_array();
        $user_id = $q[0]['id'];
        $user_email = $q[0]['email'];
        if ($user_email == $email) {
            $data = array('password' => $new);
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
            return "success";
        } else {
            return "failed";
        }
    }

    public function saveWorkerSatoshi($user_id, $insertData, $dates) {
        $this->db->where('worker_satoshi_userId', $user_id);
        $this->db->where('worker_satoshi_created_date >=', $dates);
        $objQuery = $this->db->get('worker_satoshi');

        if ($objQuery->num_rows() > 0) {
            return FALSE;
        } else {
            $this->db->insert('worker_satoshi', $insertData);
            return TRUE;
        }
    }

    public function getWorkerSatoshiTime($user_id, $dates) {
        $current_date = date('Y-m-d H:i:s');
        $this->db->where('worker_satoshi_userId', $user_id);
        $objQuerys = $this->db->get('worker_satoshi');
        // echo $this->db->last_query(); die;
        if ($objQuerys->num_rows() > 0) {
            $this->db->where('worker_satoshi_created_date >=', $dates);
            $objQuery = $this->db->get('worker_satoshi');

            if ($objQuery->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function update_Satoshi($user_id, $updateData) {
        $this->db->where('id', $user_id);
        if ($this->db->update('users', $updateData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>