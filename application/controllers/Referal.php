<?php

class Referal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('referal_model');
        $this->load->model('user_model');
        
        if ($this->session->userdata('user_login') != "true") {
            redirect('welcome/login');
        }
    }

    public function index() {
        $user_data = $this->session->userdata();
        $user_id = $user_data['user_id'];
        $arrData['adminData'] = $this->user_model->get_profile($user_id);
        
        $arrData['reference_link'] = $user_data['reference_link'];

        // using this we can list referal in user table 
        $refreal_friends = $this->user_model->get_referal($user_id);
        //echo "<pre>";        print_r($refreal_friends); die;

        $arrData['referal_count'] = count($refreal_friends);

        $result_value = 0;

        foreach ($refreal_friends as $refer) {
            $user_id = $refer['id'];
            $result_data = $this->user_model->get_earn_satoshi($user_id);
            $result_value += $result_data['total_Satoshi'];
           // echo "<pre>";        print_r($result_data); 
        }
       // die;
        $arrData['total_referal'] = $result_value;
        

        // $arrData['count'] = $refreal_friends['rowcount'];
        //$arrData['referal_earn'] = $this->user_model->
        $arrData['middle'] = 'referal';
        $this->load->view('template', $arrData);
    }

    public function show_referal() {
        $user_data = $this->session->userdata();
        $user_id = $user_data['user_id'];
        $arrData['refreal_friends'] = $this->user_model->get_referal($user_id);

        $arrData['middle'] = 'ShowReferal';
        $this->load->view('template', $arrData);
    }

}
