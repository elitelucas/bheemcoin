<?php

class Bank extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('bank_model');
        $this->load->model('user_model');
        $this->load->helper('captcha');
        
        if ($this->session->userdata('user_login') != "true") {
            redirect('welcome/login');
        }
    }

    public function index() {
        // If captcha form is submitted
        if ($this->input->post('cmdSubmit')) {
            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
            if ($inputCaptcha === $sessCaptcha) {
                echo 'Captcha code matched.';
            } else {
                echo 'Captcha code was not match, please try again.';
            }
        } else {
            //echo "<pre>";        print_r($this->session->userdata()); die;
            $user_id = $this->session->userdata('user_id');
            $userData = $this->user_model->get_profile($user_id);
            $arrData['available_Balance'] = $userData['user_attack_player_satoshi'];


            $bankDetails = $this->bank_model->getBank($user_id);
            //echo count($bankDetails); die;
            if (count($bankDetails) > 0) {
                $arrData['bankDetails'] = $bankDetails;
            } else {
                $arrData['bankDetails'] = 'no_data';
            }




            $length = 8;
            $str = "";
            $characters = array_merge(range('a', 'z'), range('0', '9'));
            $max = count($characters) - 1;
            for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, $max);
                $str .= $characters[$rand];
            }

            $config = array(
                'word' => $str,
                'word_length' => 8,
                'img_path' => './images/',
                'img_url' => base_url() . 'images/',
                'font_path' => base_url() . 'system/fonts/texb.ttf',
                'img_width' => 150,
                'img_height' => 50,
                'expiration' => 3600,
                'font_size' => 20
            );
            $captcha = create_captcha($config);

            $this->session->unset_userdata('captchaCode');
            $this->session->set_userdata('captchaCode', $captcha['word']);

            // Send captcha image to view
            $arrData['captchaImg'] = $captcha['image'];

            $arrData['middle'] = 'bank';
            $this->load->view('template', $arrData);
        }
    }

    public function refresh() {

        $length = 8;
        $str = "";
        $characters = array_merge(range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        // Captcha configuration
        $config = array(
            'word' => $str,
            'word_length' => 8,
            'img_path' => './images/',
            'img_url' => base_url() . 'images/',
            'font_path' => base_url() . 'system/fonts/texb.ttf',
            'img_width' => '150',
            'img_height' => 50,
            'expiration' => 3600,
            'font_size' => 20
        );
        $captcha = create_captcha($config);

        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);

        // Display captcha image
        echo $captcha['image'];
    }

    public function checkCaptcha() {
        $admin_id = $this->session->userdata('user_id');

        $userdata = $this->user_model->get_profile($admin_id);
        $user_satoshi = $userdata['user_attack_player_satoshi'];
        //echo "<prE>";        print_r($userdata); die;
        $btc_amount = $this->input->post('btc_amount');
        $txtInputBank = $this->input->post('txtInputBank');

        $captcha = $this->input->post('captcha');
        $sessCaptcha = $this->session->userdata('captchaCode');
        if ($captcha == '' || $captcha == NULL) {
            echo '<span style="color:red;" class="captcheroor">please enter captcha !</span><br>';
        } else {
            if ($captcha === $sessCaptcha) {
                if ($user_satoshi == 0) {
                    echo '<span style="color:red;" class="captcheroor">not sufficient balance </span>';
                } else if ($txtInputBank <= $user_satoshi) {
                    //echo '<span style="color:red;">done</span>';

                    $updateData['user_attack_player_satoshi'] = $user_satoshi - $txtInputBank;
                    //echo "<prE>";                    print_r($updateData); die;
                    $update = $this->user_model->update_Profile($admin_id, $updateData);
                    if ($update) {
                        $getUserBank = $this->bank_model->getBank($admin_id);
                        // echo "<pre>"; print_r($getUserBank); die;

                        if ($getUserBank) {
                            $bank_user_id = $getUserBank[0]['bank_user_id'];
                            $updateBankData['bank_amount'] = $txtInputBank + $getUserBank[0]['bank_amount'];
                            $updateBankData['bank_updated_date'] = date('Y-m-d H:i:s');
                            $updateBank = $this->bank_model->updateBank($bank_user_id, $updateBankData);
                            if ($updateBank) {
                                echo 'success';
                            }
                        } else {
                            $insertData['bank_user_id'] = $admin_id;
                            $insertData['bank_amount'] = $txtInputBank;
                            $insertData['bank_created_date'] = date('Y-m-d H:i:s');
                            $insertData['bank_ip_address'] = $this->input->ip_address();

                            $insert = $this->bank_model->saveBank($insertData);
                            if ($insert) {
                                echo 'success';
                            }
                        }
                        //$updateBank['']
                    }
                }
                // echo '<span style="color:red;">Captcha code matched.</span>';
            } else {
                echo '<span style="color:red; class="captcheroor"">Captcha code was not match, please try again.</span>';
            }
        }
    }

    public function bankWithdrawl($satoshi) {

        if ($satoshi == 0) {
            $this->session->set_flashdata('failed_withdrawl', 'not Sufficient Balance For withdrawing');
            redirect('bank');
        } else {
            $bank_user_id = $this->session->userdata('user_id');
            $admin_id = $bank_user_id;
            $userdata = $this->user_model->get_profile($admin_id);
            $user_satoshi = $userdata['user_attack_player_satoshi'];



            $updateBankData['bank_amount'] = 0;
            $updateBankData['bank_updated_date'] = date('Y-m-d H:i:s');
//       / echo "<pre>";        print_r($updateBankData); die;
            $updateBank = $this->bank_model->updateBank($bank_user_id, $updateBankData);

            if ($updateBank) {
                // echo 'hello'; die;
                $updateData['user_attack_player_satoshi'] = $user_satoshi + $satoshi;
                $updateUser = $this->user_model->update_Profile($admin_id, $updateData);
                if ($updateUser) {
                    redirect('bank');
                }
            }
        }
    }

}
