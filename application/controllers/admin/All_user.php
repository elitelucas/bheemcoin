<?php

class All_user extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        // $this->load->model('all_user_model');
        
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('admin');
        }
    }

    /**
     * index
     *
     * @uses        list all all_user   
     * @author      Webiots_m     
     */
    public function index() {

        $arrData['All_userDetails'] = $this->user_model->getAll_user();
        //echo "<pre>";        print_r($arrData); die;

        $arrData['middle'] = 'admin/all_user/list';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * edit
     *
     * @uses        using this we can edit all_user for front end side for set limit all_user ..  
     * @author      Webiots_m     
     */
    public function edit($admin_id, $status) {
        if ($status == 1) {
            $updateData['status_block'] = 0;
        } else {
            $updateData['status_block'] = 1;
        }


        $update = $this->user_model->update_Profile($admin_id, $updateData);

        if ($update) {
            $this->session->set_flashdata('success', 'User update Successfully');
            redirect('admin/all_user');
        }
    }
public function edit_user($user_id) {
if ($this->input->post('update')) {
    
    $updateData['username'] = $this->input->post('username');
    $updateData['email'] = $this->input->post('email');
    $updateData['satoshi'] = $this->input->post('satoshi');
    $updateData['bitcoin_address'] = $this->input->post('bitcoin_address');
    $updateData['status'] = $this->input->post('status');
    $update = $this->user_model->updateuserdetails($user_id, $updateData);

            if ($update) {
                $this->session->set_flashdata('success', 'User Details Updated Successfully');
                redirect('admin/all_user');
            }
   
 
}
$arrData['All_userDetails'] = $this->user_model->getedit($user_id);
$arrData['middle'] = 'admin/all_user/edit_user';
$this->load->view('admin/template', $arrData);
    }
    /**
     * delete
     *
     * @uses        delete all_user
     * @author      Webiots_m     
     */
    public function delete($IAll_userId) {
        if ($this->all_user_model->deleteAll_user($IAll_userId)) {
            $this->session->set_flashdata('success', 'All user Deleted Successfully');
            redirect('admin/all_user');
        }
    }

}
?>

