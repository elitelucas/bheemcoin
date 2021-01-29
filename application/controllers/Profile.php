<?php

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('profile_model');

        if ($this->session->userdata('user_login') != "true") {
            redirect('welcome/login');
        }
    }

    public function index() {

        //$arrData['middle'] = 'profile/add';
        //$this->load->view('template', $arrData);
    }

    public function edit() {
        $userId = $this->session->userData('user_id');
        $arrData['profileDetails'] = $this->profile_model->get_Profile($userId);


        $id = $this->uri->segment(3);

        $rand_function = rand(1, 3);
        if ($rand_function == 1) {
            $arrData['f_number'] = rand(1, 9);
            $arrData['s_number'] = rand(1, 9);
            $arrData['operation'] = "+";
            $arrData['result'] = $arrData['f_number'] + $arrData['s_number'];
        }
        if ($rand_function == 2) {
            $arrData['f_number'] = rand(1, 9);
            $arrData['s_number'] = rand(1, 9);
            $arrData['operation'] = "-";
            $arrData['result'] = $arrData['f_number'] - $arrData['s_number'];
        }
        if ($rand_function == 3) {
            $arrData['f_number'] = rand(1, 9);
            $arrData['s_number'] = rand(1, 5);
            $arrData['operation'] = "x";
            $arrData['result'] = $arrData['f_number'] * $arrData['s_number'];
        }

        //echo "<prE>";        print_r($arrData); die;
        if ($this->input->post('cmdSubmit')) {
            //echo "<pre>";            print_r($_POST); die;

            if (isset($_POST['old'])) {
                $old_password = md5($this->input->post('old'));
                //echo $old_password; die;

                $checkPassword = $this->profile_model->check_Password($userId, $old_password);
                if ($checkPassword) {
                    //echo 'right'; die;

                    if (isset($_POST['bitcoin'])) {
                        $updateData['bitcoin_address'] = $this->input->post('bitcoin');
                    }
                    if (isset($_POST['email'])) {
                        $updateData['email'] = $this->input->post('email');
                    }

                    if (isset($_POST['find'])) {
                        $updateData['how_find'] = $this->input->post('find');
                    }

                    if (isset($_POST['password'])) {
                        $updateData['password'] = md5($this->input->post('password'));
                    }


                    if (isset($_FILES['imgUplod']['name'])) {

                        //using config file we get project name 
                        $project_name = $this->config->item('Project_name');
                        
                        //echo $project_name; die;
                        $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] .'/client_assets/assets/user_profile/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = '1000000';
                        $config['max_width'] = '1024000';
                        $config['max_height'] = '768000';
                        //echo "<pre>";                print_r($config); die;
                        $this->load->library('upload', $config);

                        //echo "<prE>";                print_r($updateData); die;

                        if (!$this->upload->do_upload('imgUplod')) {

                            //echo $hiddenID; die;                    
                            $error = array('error' => $this->upload->display_errors());
                        } else {

                            //$data = array('upload_data' => $this->upload->data());
                            //$imageName = $this->foods_model->get_foods_img($hiddenID);
                            //echo "<prE>";                    print_r($data); die;                   
                            $upload_data = $this->upload->data();
                            $updateData['image'] = $upload_data['file_name'];
                            //echo "<prE>";                    print_r($data); die;
                            $img_name = $arrData['profileDetails']['image'];
                            if (unlink($_SERVER['DOCUMENT_ROOT'] . '/client_assets/assets/user_profile/' . $img_name)) {
                                
                            } else {
                                echo 'errors Occured';
                            }
                        }
                    } else {
                        echo 'image not upload';
                        die;
                    }



                    //echo "<pre>";                    print_r($updateData); die;
                    $update = $this->profile_model->update_profile($userId, $updateData);
                    if ($update) {
                        redirect('welcome');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Old Password Wrong !');
                    $arrData['middle'] = 'profile/edit';
                    $this->load->view('template', $arrData);
                }
            }

            // echo 'hello'; die;
        } else {
            $arrData['middle'] = 'profile/edit';
            $this->load->view('template', $arrData);
        }

        // $arrData['middle'] = 'profile/edit';
        //->load->view('template', $arrData);
    }

}
