<?php

class Player extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('player_model');
        
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('admin');
        }
    }

    public function index() {

        $arrData['playerDetails'] = $this->player_model->get_player();
        //echo "<pre>";        print_r($arrData); die;
        $arrData['middle'] = 'admin/player/list';
        $this->load->view('admin/template', $arrData);
    }

    public function add() {
        if ($this->input->post('cmdSubmit')) {
            //print_r($_SERVER['DOCUMENT_ROOT']); 
            //die;
            //echo "<prE>";            print_r($this->session->userdata('user_id')); die;
            $userId = $this->session->userdata('user_id');
            //echo "<pre>";            print_r($_POST); die;

            if ($_FILES['imgUplod']['name']) {
                $projectName = $this->config->item('Project_name');
                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/admin_assets/assets/images/player/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1000000';
                $config['max_width'] = '1024000';
                $config['max_height'] = '768000';

                //echo "<pre>";                print_r($config); die;
                $this->load->library('upload', $config);

                $insertData['player_user_id'] = $userId;
                $insertData['player_name'] = $this->input->post('txtPlayerName');
                $insertData['player_satoshi_minute'] = $this->input->post('txtMinute');
                $insertData['player_membership'] = $this->input->post('cmbMembership');
                $insertData['player_price'] = $this->input->post('txtPrice');
                $insertData['player_price_type'] = $this->input->post('cmbPriceType');
                $insertData['player_capicity'] = $this->input->post('txtCapicity');
                //$insertData['player_duration'] = $this->input->post('txtCapicity');                	
                $insertData['player_daily_limit'] = $this->input->post('txtPlayerlimit');
                $insertData['player_status'] = $this->input->post('cmbPlayerStatus');
                $insertData['player_createdDate'] = date('Y-m-d');
                $insertData['player_ip_address'] = $this->input->ip_address();

                // echo "<pre>";                print_r($insertData); die;
                if (!$this->upload->do_upload('imgUplod')) {
                    $error = array('error' => $this->upload->display_errors());
                    // echo "<pre>"; print_r($error); die;
                } else {
                    $upload_data = $this->upload->data();
                    $insertData['player_image'] = $upload_data['file_name'];

                    // echo "<pre>";                print_r($insertData); die;
                    $insert = $this->player_model->add_player($insertData);
                    if ($insert) {
                        $this->session->set_flashdata('success', 'Player Inserted Successfully');
                        redirect('admin/player');
                    }
                }
            }
        }

        $arrData['middle'] = 'admin/player/add';
        $this->load->view('admin/template', $arrData);
    }

    public function edit($IplayerId) {
        //echo $id; die;
        $arrData['editPlayer'] = $this->player_model->get_player($IplayerId);
        $userId = $this->session->userdata('user_id');
        //echo "<prE>";        print_r($arrData); die;
        if ($this->input->post('cmdSubmit')) {

            // print_r($_SERVER['DOCUMENT_ROOT']); 
            // die;
            $hiddenID = $this->input->post('imgHiddenId');

            $updateData['player_user_id'] = $userId;
            $updateData['player_name'] = $this->input->post('txtPlayerName');
            $updateData['player_satoshi_minute'] = $this->input->post('txtMinute');
            $updateData['player_membership'] = $this->input->post('cmbMembership');
            $updateData['player_price'] = $this->input->post('txtPrice');
            $updateData['player_price_type'] = $this->input->post('cmbPriceType');
            $updateData['player_capicity'] = $this->input->post('txtCapicity');
            //$updateData['player_duration'] = $this->input->post('txtCapicity');                	
            $updateData['player_daily_limit'] = $this->input->post('txtPlayerlimit');
            $updateData['player_status'] = $this->input->post('cmbPlayerStatus');
            $updateData['player_createdDate'] = date('Y-m-d h-i-s');
            $updateData['player_ip_address'] = $this->input->ip_address();


            if (isset($_FILES['imgUplod']['name'])) {
                $projectName = $this->config->item('Project_name');
                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/admin_assets/assets/images/player/';
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
                    $imageName = $this->player_model->get_player_img($hiddenID);
                    //echo "<prE>";                    print_r($data); die;                   
                    $upload_data = $this->upload->data();
                    $updateData['player_image'] = $upload_data['file_name'];
                    //echo "<prE>";                    print_r($data); die;
                    $img_name = $imageName[0]['player_image'];
                    if (unlink($_SERVER['DOCUMENT_ROOT'] . '/admin_assets/assets/images/player/' . $img_name)) {
                        
                    } else {
                        echo 'errors Occured';
                    }
                }
            } else {
                echo 'image not upload';
                die;
            }

            $update = $this->player_model->update_player($IplayerId, $updateData);

            if ($update) {
                $this->session->set_flashdata('success', 'Player Updated Successfully');
                redirect('admin/player');
            } else {
                echo 'not update';
                die;
            }
        }

        $arrData['middle'] = 'admin/player/edit';
        $this->load->view('admin/template', $arrData);
    }

    public function delete($IplayerId) {
        $imageName = $this->player_model->get_player_img($IplayerId);
        $img_name = $imageName[0]['player_image'];

        //echo $img_name; die;
        $projectName = $this->config->item('Project_name');
        if (unlink($_SERVER['DOCUMENT_ROOT'] . '/admin_assets/assets/images/player/' . $img_name)) {
            if ($this->player_model->delete_player($IplayerId)) {
                $this->session->set_flashdata('success', 'Player Deleted Successfully');
                redirect('admin/player');
            }
        } else {
            echo 'errors Occured';
        }
    }

}
?>

