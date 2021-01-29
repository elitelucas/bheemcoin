<?php

class Satoshi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('satoshi_model');
        
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('admin');
        }
    }

    /**
     * index
     *
     * @uses        list all satoshi   
     * @author      Webiots_m     
     */
    public function index() {

        $arrData['SatoshiDetails'] = $this->satoshi_model->getSatoshi();
        //echo "<pre>";        print_r($arrData); die;
        $arrData['middle'] = 'admin/satoshi/list';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * add
     *
     * @uses        using this we can add satoshi   
     * @author      Webiots_m     
     */
    public function add() {
        if ($this->input->post('cmdSubmit')) {
            $insertData['satoshi_createdDate'] = date('Y/m/d');
            $insertData['satoshi_min'] = $this->input->post('txtMinLimit');
            $insertData['satoshi_max'] = $this->input->post('txtMaxLimit');
            $insertData['satoshi_IpAddress'] = $this->input->ip_address();

            $insert = $this->satoshi_model->add_Satoshi($insertData);
            if ($insert) {
                $this->session->set_flashdata('success', 'Satoshi Inserted Successfully');
                redirect('admin/satoshi');
            }
        }

        $arrData['middle'] = 'admin/satoshi/add';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * edit
     *
     * @uses        using this we can edit satoshi for front end side for set limit satoshi ..  
     * @author      Webiots_m     
     */
    public function edit($ISatoshiId) {
        //echo $id; die;
        $arrData['editSatoshi'] = $this->satoshi_model->getSatoshi($ISatoshiId);

        //echo "<prE>";        print_r($arrData); die;
        if ($this->input->post('cmdSubmit')) {

            $updateData['satoshi_createdDate'] = date('Y/m/d');
            $updateData['satoshi_min'] = $this->input->post('txtMinLimit');
            $updateData['satoshi_max'] = $this->input->post('txtMaxLimit');
            $updateData['satoshi_IpAddress'] = $this->input->ip_address();

            $update = $this->satoshi_model->updateSatoshi($ISatoshiId, $updateData);

            if ($update) {
                $this->session->set_flashdata('success', 'Satoshi Updated Successfully');
                redirect('admin/satoshi');
            }
        }

        $arrData['middle'] = 'admin/satoshi/edit';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * delete
     *
     * @uses        delete satoshi
     * @author      Webiots_m     
     */
    public function delete($ISatoshiId) {
        if ($this->satoshi_model->deleteSatoshi($ISatoshiId)) {
            $this->session->set_flashdata('success', 'Satoshi Deleted Successfully');
            redirect('admin/satoshi');
        }
    }

}
?>

