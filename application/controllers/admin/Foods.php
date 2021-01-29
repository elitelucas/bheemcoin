<?php

class Foods extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('foods_model');
        
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('admin');
        }
    }

    public function index() {

        $arrData['foodsDetails'] = $this->foods_model->get_foods();
        //echo "<pre>";        print_r($arrData); die;
        $arrData['middle'] = 'admin/foods/list';
        $this->load->view('admin/template', $arrData);
    }

    public function add() {
        if ($this->input->post('cmdSubmit')) {
            // print_r($_SERVER['DOCUMENT_ROOT']); 
            //die;

            if ($_FILES['imgUplod']['name']) {
                $projectName = $this->config->item('Project_name');
                
                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] .'/admin_assets/assets/images/foods/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1000000';
                $config['max_width'] = '1024000';
                $config['max_height'] = '768000';

                //echo "<pre>";                print_r($config); die;
                $this->load->library('upload', $config);

                $insertData['foods_created_date'] = date('Y-m-d');
                $insertData['foods_name'] = $this->input->post('txtFoodsName');
                $insertData['foods_health_capicity'] = $this->input->post('txtHealth');
                $insertData['foods_status'] = $this->input->post('cmbStatus');
                $insertData['foods_ip_address'] = $this->input->ip_address();

                // echo "<pre>";                print_r($insertData); die;
                if (!$this->upload->do_upload('imgUplod')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo "<pre>";
                    print_r($error);
                    die;
                } else {
                    $upload_data = $this->upload->data();
                    $insertData['foods_image'] = $upload_data['file_name'];

                    $insert = $this->foods_model->add_foods($insertData);
                    if ($insert) {
                        $this->session->set_flashdata('successUplod', 'Foods Inserted Successfully');
                        redirect('admin/foods');
                    }
                }
            }
        }

        $arrData['middle'] = 'admin/foods/add';
        $this->load->view('admin/template', $arrData);
    }

    public function edit($IfoodsId) {
        //echo $id; die;
        $arrData['editFoods'] = $this->foods_model->get_foods($IfoodsId);

        //echo "<prE>";        print_r($arrData); die;
        if ($this->input->post('cmdSubmit')) {

            // print_r($_SERVER['DOCUMENT_ROOT']); 
            // die;
            $hiddenID = $this->input->post('imgHiddenId');


            $updateData['foods_created_date'] = date('Y-m-d');
            $updateData['foods_name'] = $this->input->post('txtFoodsName');
            $updateData['foods_health_capicity'] = $this->input->post('txtHealth');
            $updateData['foods_status'] = $this->input->post('cmbStatus');
            $updateData['foods_ip_address'] = $this->input->ip_address();

            
            $projectName = $this->config->item('Project_name');
            if (isset($_FILES['imgUplod']['name'])) {
                $projectName = $this->config->item('Project_name');
                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] .'/admin_assets/assets/images/foods/';
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
                    $imageName = $this->foods_model->get_foods_img($hiddenID);
                    //echo "<prE>";                    print_r($data); die;                   
                    $upload_data = $this->upload->data();
                    $updateData['foods_image'] = $upload_data['file_name'];
                    //echo "<prE>";                    print_r($data); die;
                    $img_name = $imageName[0]['foods_image'];
                    if (unlink($_SERVER['DOCUMENT_ROOT'] .'/admin_assets/assets/images/foods/' . $img_name)) {
                        
                    } else {
                        echo 'errors Occured';
                    }
                }
            } else {
                echo 'image not upload';
                die;
            }

            $update = $this->foods_model->update_foods($IfoodsId, $updateData);

            if ($update) {
                $this->session->set_flashdata('imageUpload', 'Foods Updated Successfully');
                redirect('admin/foods');
            } else {
                echo 'not update';
                die;
            }
        }

        $arrData['middle'] = 'admin/foods/edit';
        $this->load->view('admin/template', $arrData);
    }

    public function delete($IfoodsId) {
        $imageName = $this->foods_model->get_foods_img($IfoodsId);
        $img_name = $imageName[0]['foods_image'];
        $projectName = $this->config->item('Project_name');
        //echo $img_name; die;
        if (unlink($_SERVER['DOCUMENT_ROOT'] .'/admin_assets/assets/images/foods/' . $img_name)) {
            if ($this->foods_model->delete_foods($IfoodsId)) {
                $this->session->set_flashdata('imageDelete', 'Foods Deleted Successfully');
                redirect('admin/foods');
            }
        } else {
            echo 'errors Occured';
        }
    }

}
?>

