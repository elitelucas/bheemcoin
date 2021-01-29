<?php

class Manage_ad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('back_end');
        $this->load->library("pagination");
        
        if ($this->session->userdata('user_login') != "true") {
            redirect('welcome/login');
        }
    }

    public function index() {
        $this->load->view('admin/index');
    }

    public function login() {
        $result = $this->back_end->check_login();
        if ($result == "success") {

            redirect('manage_ad/login_success');
        } else {

            $this->session->set_flashdata('abc', 'error');
            redirect('manage_ad/index');
        }
    }

    function logout() {
        $this->session->unset_userdata('admin_login');
        redirect('manage_ad/index');
    }

    public function login_success() {
        if ($this->session->userdata('admin_login')) {

            $this->load->view('admin/back_end/index');
        } else {
            redirect('manage_ad/index');
        }
    }

    public function register_user() {
        if ($this->session->userdata('admin_login')) {
            $data['users'] = $this->back_end->register_user();
            $this->load->view('admin/back_end/users', $data);
        } else {
            redirect('manage_ad/index');
        }
    }

    public function search_user() {
        $data = $this->back_end->search_user();
        $i = 1;
        foreach ($data as $row) {
            $id = $row['id'];
            $en_id = base64_encode($id);

            $a = explode('-', $row['date']);
            $date = $a['2'] . "-" . $a['1'] . "-" . $a['0'];

            $ref = $row['refered_by'];
            $status = $row['status'];
            if ($ref == "") {
                $ref = "-";
            }
            if ($status == 1) {
                $status = "Online";
            } else {
                $status = "Offline";
            }
            echo'
									<tr>
										<td>' . $i . '</td>
										<td>' . $row['username'] . '</td>
										<td>' . $row['email'] . '</td>
										<td>' . $row['bitcoin_address'] . '</td>
										<td>' . $status . '</td>
										<td>' . $date . '</td>
									</tr>';
            $i++;
        }
    }

}

?>