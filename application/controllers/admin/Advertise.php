<?php

class Advertise extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('advertise_model');

        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('admin');
        }
    }

    /**
     * index
     *
     * @uses        list all advertise   
     * @author      Webiots_m     
     */
    public function index() {

        $arrData['AdvertiseDetails'] = $this->advertise_model->getAdvertise();
        //echo "<pre>";        print_r($arrData); die;
        $arrData['middle'] = 'admin/advertise/list';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * add
     *
     * @uses        using this we can add advertise   
     * @author      Webiots_m     
     */
    public function add() {
        if ($this->input->post('cmdSubmit')) {

            $this->form_validation->set_rules('txtAddname', 'Advertise name', 'required');
            if ($this->form_validation->run() == TRUE) {

                $insertData['advertise_created_date'] = date('Y/m/d H:i:s');
                $insertData['advertise_name'] = $this->input->post('txtAddname');


                $insert = $this->advertise_model->addAdvertise($insertData);
                if ($insert) {
                    $this->session->set_flashdata('success', 'Advertise Inserted Successfully');
                    redirect('admin/advertise');
                }
            } else {
                $arrData['middle'] = 'admin/advertise/add';
                $this->load->view('admin/template', $arrData);
            }
        } else {
            $arrData['middle'] = 'admin/advertise/add';
            $this->load->view('admin/template', $arrData);
        }
    }

    /**
     * edit
     *
     * @uses        using this we can edit advertise for front end side for set limit advertise ..  
     * @author      Webiots_m     
     */
    public function edit($IAdvertiseId) {
        //echo $id; die;
        $arrData['editAdvertise'] = $this->advertise_model->getAdvertise($IAdvertiseId);

        if ($this->input->post('cmdSubmit')) {
            $this->form_validation->set_rules('txtAddname', 'Advertise name', 'required');
            if ($this->form_validation->run() == TRUE) {

                $updateData['advertise_created_date'] = date('Y/m/d H:i:s');
                $updateData['advertise_name'] = $this->input->post('txtAddname');

                $update = $this->advertise_model->updateAdvertise($IAdvertiseId, $updateData);

                if ($update) {
                    $this->session->set_flashdata('success', 'Advertise Updated Successfully');
                    redirect('admin/advertise');
                }
            } else {
                $arrData['middle'] = 'admin/advertise/edit';
                $this->load->view('admin/template', $arrData);
            }
        } else {
            $arrData['middle'] = 'admin/advertise/edit';
            $this->load->view('admin/template', $arrData);
        }
    }

    /**
     * delete
     *
     * @uses        delete advertise
     * @author      Webiots_m     
     */
    public function delete($IAdvertiseId) {
        if ($this->advertise_model->deleteAdvertise($IAdvertiseId)) {
            $this->session->set_flashdata('success', 'Advertise Deleted Successfully');
            redirect('admin/advertise');
        }
    }

}
?>

