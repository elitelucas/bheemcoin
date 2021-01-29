<?php

class Daily_message extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('daily_message_model');
        
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('admin');
        }
    }

    /**
     * index
     *
     * @uses        list all daily_message   
     * @author      Webiots_m     
     */
    public function index() {

        $arrData['Daily_messageDetails'] = $this->daily_message_model->getDaily_message();

        $arrData['listUsersDailyMsg'] = '';
        
        foreach ($arrData['Daily_messageDetails'] as $messageDetails) {
            $daily_message_user_id = $messageDetails['daily_message_user_id'];
            $arrData['listUsersDailyMsg'] = $this->daily_message_model->getDaily_UserMessage($daily_message_user_id);
            
        }
        
      //  echo "<pre>";        print_r($arrData); die;
        $arrData['user_all_details'] = $arrData['middle'] = 'admin/daily_message/list';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * add 
     *
     * @uses        using this we can add daily_message   
     * @author      Webiots_m     
     */
    public function add() {
        if ($this->input->post('cmdSubmit')) {

            $this->form_validation->set_rules('txtAddname', 'Daily message name', 'required');
            if ($this->form_validation->run() == TRUE) {

                $userdata = $this->daily_message_model->getAllUser();
                // echo "<prE>";                print_r($userdata); die;
                foreach ($userdata as $user) {
                    $insertData['daily_message_user_id'] = $user['id'];
                    $insertData['daily_message_created_date'] = date('Y/m/d H:i:s');
                    $insertData['daily_message_name'] = $this->input->post('txtAddname');

                    $insert = $this->daily_message_model->addDaily_message($insertData);
                    if ($insert) {
                        $this->session->set_flashdata('success', 'Daily message Inserted Successfully');
                    }
                }
                redirect('admin/daily_message');
            } else {
                $arrData['middle'] = 'admin/daily_message/add';
                $this->load->view('admin/template', $arrData);
            }
        } else {
            $arrData['middle'] = 'admin/daily_message/add';
            $this->load->view('admin/template', $arrData);
        }
    }

    /**
     * edit
     *
     * @uses        using this we can edit daily_message for front end side for set limit daily_message ..  
     * @author      Webiots_m     
     */
    public function edit($IDaily_messageId) {
        //echo $id; die;
        $arrData['editDaily_message'] = $this->daily_message_model->getDaily_message($IDaily_messageId);

        if ($this->input->post('cmdSubmit')) {
            $this->form_validation->set_rules('txtAddname', 'Daily message name', 'required');
            if ($this->form_validation->run() == TRUE) {

                $updateData['daily_message_created_date'] = date('Y/m/d H:i:s');
                $updateData['daily_message_name'] = $this->input->post('txtAddname');

                $update = $this->daily_message_model->updateDaily_message($IDaily_messageId, $updateData);

                if ($update) {
                    $this->session->set_flashdata('success', 'Daily message Updated Successfully');
                    redirect('admin/daily_message');
                }
            } else {
                $arrData['middle'] = 'admin/daily_message/edit';
                $this->load->view('admin/template', $arrData);
            }
        } else {
            $arrData['middle'] = 'admin/daily_message/edit';
            $this->load->view('admin/template', $arrData);
        }
    }

    /**
     * delete
     *
     * @uses        delete daily_message
     * @author      Webiots_m     
     */
    public function delete($IDaily_messageId) {
        if ($this->daily_message_model->deleteDaily_message($IDaily_messageId)) {
            $this->session->set_flashdata('success', 'Daily message Deleted Successfully');
            redirect('admin/daily_message');
        }
    }

}
?>

