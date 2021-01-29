<?php

class Withdraw_limit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('withdraw_limit_model');
        
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('admin');
        }
    }

    /**
     * index
     *
     * @uses        list all withdraw_limit   
     * @author      Webiots_m     
     */
    public function index() {

        $arrData['Withdraw_limitDetails'] = $this->withdraw_limit_model->getWithdraw_limit();
        //echo "<pre>";        print_r($arrData); die;
        $arrData['middle'] = 'admin/withdraw_limit/list';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * edit
     *
     * @uses        using this we can edit withdraw_limit for front end side for set limit withdraw_limit ..  
     * @author      Webiots_m     
     */
    public function edit($IWithdraw_limitID) {
        //echo $id; die;
        $arrData['editWithdraw_limit'] = $this->withdraw_limit_model->getWithdraw_limit($IWithdraw_limitID);

        //echo "<prE>";        print_r($arrData); die;
        if ($this->input->post('cmdSubmit')) {

            $updateData['withdraw_limit_created_date'] = date('Y-m-d H:i:s');
            $updateData['withdraw_limit_fees'] = $this->input->post('txtWithLimFees');
            $updateData['withdraw_limit_min'] = $this->input->post('txtMinLimit');
            $updateData['withdraw_limit_max'] = $this->input->post('txtMaxLimit');
            $updateData['withdraw_limit_ip_address'] = $this->input->ip_address();

            //echo "<prE>";            print_r($updateData); die;
            $update = $this->withdraw_limit_model->updateWithdraw_limit($IWithdraw_limitID, $updateData);

            if ($update) {                
                $this->session->set_flashdata('success', 'Withdraw limit Updated Successfully');
                redirect('admin/withdraw_limit');
            } else {
                echo 'byebye';
                die;
            }
        }

        $arrData['middle'] = 'admin/withdraw_limit/edit';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * delete
     *
     * @uses        delete withdraw_limit
     * @author      Webiots_m     
     */
    public function delete($IWithdraw_limitId) {
        if ($this->withdraw_limit_model->deleteWithdraw_limit($IWithdraw_limitId)) {
            $this->session->set_flashdata('success', 'Withdraw limit Deleted Successfully');
            redirect('admin/withdraw_limit');
        }
    }

}
?>

