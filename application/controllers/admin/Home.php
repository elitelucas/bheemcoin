<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home_model');
        
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('admin');
        }
        
    }

    public function index() {
        $arrData['middle'] = 'admin/home';
        $this->load->view('admin/template', $arrData);
    }

}
?>

