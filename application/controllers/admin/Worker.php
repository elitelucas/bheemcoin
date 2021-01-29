<?php

class Worker extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('worker_model');
        
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('admin');
        }
    }

    public function index() {

        $arrData['workerDetails'] = $this->worker_model->get_worker();
        //echo "<pre>";        print_r($arrData); die;
        $arrData['middle'] = 'admin/worker/list';
        $this->load->view('admin/template', $arrData);
    }

    public function add() {
        if ($this->input->post('cmdSubmit')) {
             //print_r($_SERVER['DOCUMENT_ROOT']); 
            //die;

            if ($_FILES['imgUplod']['name']) {
                $projectName = $this->config->item('Project_name');
                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/admin_assets/assets/images/worker/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1000000';
                $config['max_width'] = '1024000';
                $config['max_height'] = '768000';

                //echo "<pre>";                print_r($config); die;
                $this->load->library('upload', $config);

                $insertData['worker_created_date'] = date('Y-m-d');
                $insertData['worker_name'] = $this->input->post('txtWorkerName');
                $insertData['worker_minute'] = $this->input->post('txtMinute');
                $insertData['worker_status'] = $this->input->post('cmbStatus');
                $insertData['worker_ip_address'] = $this->input->ip_address();

                // echo "<pre>";                print_r($insertData); die;
                if (!$this->upload->do_upload('imgUplod')) {
                    $error = array('error' => $this->upload->display_errors());
                   // echo "<pre>"; print_r($error); die;
                } else {
                    $upload_data = $this->upload->data();
                    $insertData['worker_image'] = $upload_data['file_name'];
                    
                    // echo "<pre>";                print_r($insertData); die;
                    $insert = $this->worker_model->add_worker($insertData);
                    if ($insert) {
                        $this->session->set_flashdata('successUplod', 'Worker Inserted Successfully');
                        redirect('admin/worker');
                    }
                }
            }
        }

        $arrData['middle'] = 'admin/worker/add';
        $this->load->view('admin/template', $arrData);
    }

    public function edit($IworkerId) {
        //echo $id; die;
        $arrData['editWorker'] = $this->worker_model->get_worker($IworkerId);

        //echo "<prE>";        print_r($arrData); die;
        if ($this->input->post('cmdSubmit')) {

            // print_r($_SERVER['DOCUMENT_ROOT']); 
            // die;
            $hiddenID = $this->input->post('imgHiddenId');


            $updateData['worker_created_date'] = date('Y-m-d');
            $updateData['worker_name'] = $this->input->post('txtWorkerName');
            $updateData['worker_minute'] = $this->input->post('txtMinute');
            $updateData['worker_value'] = $this->input->post('txtValue');
            $updateData['worker_status'] = $this->input->post('cmbStatus');
            $updateData['worker_ip_address'] = $this->input->ip_address();

            

            if (isset($_FILES['imgUplod']['name'])) {
                $projectName = $this->config->item('Project_name');
                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/admin_assets/assets/images/worker/';
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
                    $imageName = $this->worker_model->get_worker_img($hiddenID);
                    //echo "<prE>";                    print_r($data); die;                   
                    $upload_data = $this->upload->data();
                    $updateData['worker_image'] = $upload_data['file_name'];
                    //echo "<prE>";                    print_r($data); die;
                    $img_name = $imageName[0]['worker_image'];
                    if (unlink($_SERVER['DOCUMENT_ROOT'] . '/admin_assets/assets/images/worker/' . $img_name)) {
                        
                    } else {
                        echo 'errors Occured';
                    }
                }
            } else {
                echo 'image not upload';
                die;
            }

            $update = $this->worker_model->update_worker($IworkerId, $updateData);

            if ($update) {
                $this->session->set_flashdata('imageUpload', 'Worker Updated Successfully');
                redirect('admin/worker');
            } else {
                echo 'not update';
                die;
            }
        }

        $arrData['middle'] = 'admin/worker/edit';
        $this->load->view('admin/template', $arrData);
    }

    public function delete($IworkerId) {
        $imageName = $this->worker_model->get_worker_img($IworkerId);
        $img_name = $imageName[0]['worker_image'];
        $projectName = $this->config->item('Project_name');
        //echo $img_name; die;
        if (unlink($_SERVER['DOCUMENT_ROOT'] . '/admin_assets/assets/images/worker/' . $img_name)) {
            if ($this->worker_model->delete_worker($IworkerId)) {
                $this->session->set_flashdata('imageDelete', 'Worker Deleted Successfully');
                redirect('admin/worker');
            }
        } else {
            echo 'errors Occured';
        }
    }

}
?>

