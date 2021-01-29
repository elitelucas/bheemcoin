<?php

class Withdraw extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('withdraw_model');
        $this->load->model('withdraw_limit_model');
		 $this->load->model('deposit_model');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $admin_id = $user_id;
        $arrData['user_data'] = $this->user_model->get_profile($admin_id);
        $arrData['withdraw_limit_data'] = $this->withdraw_limit_model->getWithdraw_limit();
        // echo "<prE>";        print_r($arrData); die;
        $arrData['totalgetbtcs']=0;
		$totalgetbtc=$this->deposit_model->totalgetbtc($user_id);
        if(isset($totalgetbtc[0]['s'])){
			 if($totalgetbtc[0]['s']!=0){
			  $arrData['totalgetbtcs']=$totalgetbtc[0]['s']*100000000;
			 }
			}
        $arrData['middle'] = 'withdraw';
        $this->load->view('template', $arrData);
    }

    public function change_wallet_address($user_id) {

        $user_id = $this->session->userdata('user_id');
        $admin_id = $user_id;
        $arrData['user_data'] = $this->user_model->get_profile($admin_id);

        if ($this->input->post('cmdSubmit')) {
            $updateData['bitcoin_address'] = $this->input->post('txtBtcAddress');
            $update = $this->user_model->update_Profile($admin_id, $updateData);
            if ($update) {
                $this->session->set_flashdata('success', 'Wallet Update Success !');
                redirect('withdraw');
            }
        } else {
            $arrData['middle'] = 'change_wallet_address';
            $this->load->view('template', $arrData);
        }
    }

    public function withdrawMethod($request) {
        $user_id = $this->session->userdata('user_id');
        $admin_id = $user_id;

        $arrData['user_data'] = $this->user_model->get_profile($admin_id);

        $arrData['withdraw_limit_data'] = $this->withdraw_limit_model->getWithdraw_limit();
        $arrData['requestType'] = $request;
        $arrData['totalgetbtcs']=0;
		$totalgetbtc=$this->deposit_model->totalgetbtc($user_id);
        if(isset($totalgetbtc[0]['s'])){
			 if($totalgetbtc[0]['s']!=0){
			  //$arrData['totalgetbtcs']=$totalgetbtc[0]['s']*100000000;
			 }
			}
        $arrData['middle'] = 'withdrawMethod';
        $this->load->view('template', $arrData);
    }

    public function checkWithdrawLimit($request, $button) {
        if ($button == 'yes') {
            $withLimitData = $this->withdraw_limit_model->getRequestType($request);

            $with_min_limit = $withLimitData['withdraw_limit_min'];
            $with_max_limit = $withLimitData['withdraw_limit_max'];
            $with_fees = $withLimitData['withdraw_limit_fees'];

            
            $user_id = $this->session->userdata('user_id');
            $admin_id = $user_id;
            $arrData['user_data'] = $this->user_model->get_profile($admin_id);
            $totalgetbtc=$this->deposit_model->totalgetbtc($user_id);
        if(isset($totalgetbtc[0]['s'])){
			 if($totalgetbtc[0]['s']!=0){
			  //$arrData['totalgetbtcs']=$totalgetbtc[0]['s']*100000000;
			 }
			}
            $current_satoshi = $arrData['user_data']['user_attack_player_satoshi'];
            $status = $arrData['user_data']['status_block'];
            //  echo $status; die;
            if ($status == 1) {

                if ($current_satoshi >= $with_min_limit && $current_satoshi <= $with_max_limit) {
                    $updateData['user_attack_player_satoshi'] = 0;
                    $updateUser = $this->user_model->update_Profile($admin_id, $updateData);
                    if ($updateUser) {
                        $finalSatoshi = $current_satoshi - $with_fees;

                        $insertData['withdraw_user_id'] = $admin_id;
                        $insertData['withdraw_btc_address'] = $arrData['user_data']['bitcoin_address'];
                        $insertData['withdraw_btc_amount'] = $finalSatoshi;
                        $insertData['withdraw_status'] = 0;
                        $insertData['withdraw_date'] = date('Y-m-d H:i:s');
                        $insertData['withdraw_ip_address'] = $this->input->ip_address();
                        $insertData['withdrawl_type'] = $request;


                        $insert = $this->withdraw_model->saveWithdraw($insertData);
                        if ($insert) {
                            redirect('withdraw');
                        }
                    }
                } else {
                    $this->session->set_flashdata('failed', 'You Have Insufficient Balance');
                    redirect('withdraw');
                }
            } else if ($status == 0) {
                $this->session->set_flashdata('failed', 'multi ip address so admin block you !');
                redirect('withdraw');
            }
        } else {
            redirect('withdraw');
        }
    }

    // display withdraw history 
    public function withdraw_history() {
        $user_id = $this->session->userdata('user_id');
        $admin_id = $user_id;
        $arrData['withdrawHistory'] = $this->withdraw_model->get_withdraw($admin_id);
        //echo "<prE>";        print_r($arrData); die;


        $arrData['middle'] = 'withdrawHistory';
        $this->load->view('template', $arrData);
    }

    public function withdrawHistoryAll() {
        $arrData['withdrawHistory'] = $this->withdraw_model->paymentsAll();
        //echo "<prE>";        print_r($arrData); die;
        $arrData['middle'] = 'withdrawHistoryAll';
        $this->load->view('template', $arrData);
    }

}
