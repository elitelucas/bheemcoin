<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Back_end extends CI_Model {

    function __construct() {
        //call model constructor  
        parent::__construct();

        $this->load->database();
        $this->load->library("session");
    }

    function check_login() {
        $name = $this->input->post('user_name');
        $password = md5($this->input->post('password'));

        $this->db->where("username", $name);
        $this->db->where("password", $password);
        $query = $this->db->get('musermst');
        if ($query->num_rows() == 1) {
            $this->session->set_userdata('admin_login', 'true');
            $this->session->set_userdata('admin_name', $name);
            return "success";
        } else {
            return "false";
        }
    }

    function register_user() {
        $this->db->order_by('date', "DESC");
        $query = $this->db->get('users');
        return $query->result_array();
    }

    function search_user() {
        $data = $this->input->post('data');
        $this->db->or_like(array('username' => $data, 'email' => $data));
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get('users');
        return $query->result_array();
    }

}

?>