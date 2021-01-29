<?php

class Slider extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('slider_model');
        
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('admin');
        }
    }

    public function index() {

        $arrData['sliderDetails'] = $this->slider_model->get_slider();
        //echo "<pre>";        print_r($arrData); die;
        $arrData['middle'] = 'admin/slider/list';
        $this->load->view('admin/template', $arrData);
    }

    public function add() {

        if ($this->input->post('cmdSubmit')) {

            // print_r($_SERVER['DOCUMENT_ROOT']); 
            // die;


            if ($_FILES['imgUplod']['name']) {
                $projectName = $this->config->item('Project_name');
                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] .'/admin_assets/assets/images/slider/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1000000';
                $config['max_width'] = '1024000';
                $config['max_height'] = '768000';

                //echo "<pre>";                print_r($config); die;
                $this->load->library('upload', $config);

                $insertData['created_date'] = date('Y/m/d H:i:s');
                $insertData['slider_content'] = $this->input->post('content_text');
                $insertData['slider_view'] = $this->input->post('cmbAdmin');


                if (!$this->upload->do_upload('imgUplod')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo "<pre>";
                    print_r($error);
                    die;
                } else {
                    $upload_data = $this->upload->data();
                    $insertData['slider_image'] = $upload_data['file_name'];

                    $insert = $this->slider_model->add_slider($insertData);
                    if ($insert) {
                        $this->session->set_flashdata('successUplod', 'Image Inserted Successfully');
                        redirect('admin/slider');
                    }
                }
            }
        }

        $arrData['middle'] = 'admin/slider/add';
        $this->load->view('admin/template', $arrData);
    }

    public function edit($IsliderId) {
        //echo $id; die;
        $arrData['editSlider'] = $this->slider_model->get_slider($IsliderId);

        //echo "<prE>";        print_r($arrData); die;
        if ($this->input->post('cmdSubmit')) {

            // print_r($_SERVER['DOCUMENT_ROOT']); 
            // die;
            $hiddenID = $this->input->post('imgHiddenId');
            $updateData['created_date'] = date('d/m/Y');
            $updateData['slider_content'] = $this->input->post('content_text');
            $updateData['slider_view'] = $this->input->post('cmbAdmin');
            
            //echo "<pre>";            print_r($updateData); die;
            $projectName = $this->config->item('Project_name');
            if (isset($_FILES['imgUplod']['name'])) {

                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] .'/admin_assets/assets/images/slider/';
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
                    $imageName = $this->slider_model->get_slider_img($hiddenID);
                    //echo "<prE>";                    print_r($data); die;                   
                    $upload_data = $this->upload->data();
                    $updateData['slider_image'] = $upload_data['file_name'];
                    //echo "<prE>";                    print_r($data); die;
                    $img_name = $imageName[0]['slider_image'];
                    if (unlink($_SERVER['DOCUMENT_ROOT'] .'/admin_assets/assets/images/slider/' . $img_name)) {
                        
                    } else {
                        echo 'errors Occured';
                    }
                }
            } else {
                echo 'image not upload';
                die;
            }

            
            $update = $this->slider_model->update_slider($IsliderId, $updateData);
            
            if ($update) {
                $this->session->set_flashdata('imageUpload', 'Slider Updated Successfully');
                redirect('admin/slider');
            } else {
                echo 'not update';
                die;
            }
        }

        $arrData['middle'] = 'admin/slider/edit';
        $this->load->view('admin/template', $arrData);
    }

    public function delete($IsliderId) {
        $imageName = $this->slider_model->get_slider_img($IsliderId);
        $img_name = $imageName[0]['slider_image'];
        $projectName = $this->config->item('Project_name');
        //echo $img_name; die;
        if (unlink($_SERVER['DOCUMENT_ROOT'] .'/admin_assets/assets/images/slider/' . $img_name)) {
            if ($this->slider_model->delete_slider($IsliderId)) {
                $this->session->set_flashdata('imageDelete', 'Image Deleted Successfully');
                redirect('admin/slider');
            }
        } else {
            echo 'errors Occured';
        }
    }

}
?>

