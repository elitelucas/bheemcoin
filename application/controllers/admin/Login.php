<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');

        /* if ($this->session->userdata('logged_in') == FALSE) {
          redirect('admin');
          } */
    }

    /**
     * Super Class
     *
     * @package     Package Name
     * @subpackage  Subpackage
     * @category    Category
     * @author      Webiots_m
     * @link        http://example.com
     */
    public function index() {


        if ($this->input->post('cmdSubmit')) {
            $this->form_validation->set_rules('txtUsername', 'Username', 'required');
            $this->form_validation->set_rules('txtPassword', 'Password', 'required');

            if ($this->form_validation->run() == TRUE) {
                $username = $this->input->post('txtUsername');
                $password = md5($this->input->post('txtPassword'));

                $this->user_model->verifyUser($username, $password);
                if ($this->session->userdata('logged_in') == TRUE) {
                    redirect('admin/home');
                } else {
                    $this->load->view('admin/login');
                    $this->session->set_flashdata('failed', 'Incorrect Username or Password');
                }
            } else {
                $this->load->view('admin/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin');
    }

    public function profile() {
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('admin');
        } else {
            $admin_id = $this->session->userdata('id');
            $arrData['profileData'] = $this->user_model->get_profile($admin_id);

            //echo "<pre>";        print_r($arrData); die;

            if ($this->input->post('cmdSubmit')) {

                $txtOldPassword = md5($_POST['txtOldPassword']);
                $check_result = $this->user_model->get_old_password($txtOldPassword);

                if ($check_result) {
                    $updateData['password'] = md5($this->input->post('txtPassword'));
                    $updateData['bitcoin_address'] = $this->input->post('txtbitcoin_address');
                    $updateData['email'] = $this->input->post('txtEmail');

                    $update = $this->user_model->update_Profile($admin_id, $updateData);
                    if ($update) {
                        $this->session->set_flashdata('success_profile', 'Profile Updates Successfuly !');
                        redirect('admin/home');
                    }
                } else {
                    $this->session->set_flashdata('failed', 'Old Password Not Match');
                    $arrData['middle'] = 'admin/user/profile';
                    $this->load->view('admin/template', $arrData);
                }
            } else {
                $arrData['middle'] = 'admin/user/profile';
                $this->load->view('admin/template', $arrData);
            }
        }
    }

    public function verifyOldPassword() {
        $txtOldPassword = md5($_POST['txtOldPassword']);
        $check_result = $this->user_model->get_old_password($txtOldPassword);
        if ($check_result) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function api() {

        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('admin');
        } else {
            $arrData['select_data'] = $this->user_model->get_api_settings();


            if ($this->input->post('cmdSubmit')) {
                $api_hidden_id = $_POST['api_id'];

                $arrUpdateData['api_name'] = $this->input->post('api_name');
                $arrUpdateData['api_private'] = $this->input->post('private_key');
                $arrUpdateData['api_public'] = $this->input->post('public_key');
                $arrUpdateData['current'] = $this->input->post('api_current_value');

//            echo $api_hidden_id;
//            die;
                $update = $this->user_model->update_api($api_hidden_id, $arrUpdateData);
                if ($update) {
//                echo $api_hidden_id;
//            die;
                    //$get_value = $this->user_model->get_current_val($api_hidden_id);
                    //$api_ID= $get_value['current'];
                    //$get_current_value_id= $get_value['current'];
                    //echo "<pre>";                print_r($get_value); die;
                    //  $update_settingVal = $this->user_model->update_set_api_value(,);

                    if ($this->input->post('api_current_value') == 1) {
                        $current = 0;
                    } else {
                        $current = 1;
                    }

                    $update_settingVal = $this->user_model->update_set_api_value($current, $api_hidden_id);
                    if ($update_settingVal) {
                        $this->session->set_flashdata('success_settings', 'Settings Updated Successfuly !');
                        redirect('admin/home');
                    }
                } else {
                    $arrData['middle'] = 'admin/user/settings';
                    $this->load->view('admin/template', $arrData);
                }
            }

            $arrData['middle'] = 'admin/user/settings';
            $this->load->view('admin/template', $arrData);
        }
    }

    public function get_api_settings_data() {
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('admin');
        } else {
            $api_name = $_POST['current_value'];
            $api_data = $this->user_model->get_current_api_data($api_name);
            //echo "<pre>";        print_r($api_data); die;
            ?>
            <div class="form-group row">
                <label for="hori-pass1" class="col-2 col-form-label">Private Key<span class="text-danger">*</span></label>

                <div class="col-7">                    
            <?php
            $dataPrivate = array(
                'id' => 'private_key',
                'class' => 'form-control',
                'name' => 'private_key',
                'value' => $api_data['api_public']
            );
            echo form_input($dataPrivate);
            ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="hori-pass1" class="col-2 col-form-label">Public Key<span class="text-danger">*</span></label>

                <div class="col-7">                    
            <?php
            $dataPublic = array(
                'id' => 'public_key',
                'class' => 'form-control',
                'name' => 'public_key',
                'value' => $api_data['api_private']
            );
            echo form_input($dataPublic);
            ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="hori-pass1" class="col-2 col-form-label">Settings<span class="text-danger">*</span></label>
                <div class="col-7">                    
            <?php
            $options = array(
                '1' => 'Yes',
                '0' => 'No'
            );
            $api_curent_value = array(
                'id' => 'api_current_value',
                'class' => 'form-control'
            );
            echo form_dropdown('api_current_value', $options, $api_data['current'], $api_curent_value);

            // hidden data send for changing setting value .                    
            ?>
                    <input type="hidden" value="<?php echo $api_data['api_id'] ?>" name="api_id" id="api_id">
                </div>
            </div>
            <?php
        }
    }

}
?>

