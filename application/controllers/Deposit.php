<?php

class Deposit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('referal_model');
        $this->load->model('user_model');
        $this->load->model('deposit_model');
        
        if ($this->session->userdata('user_login') != "true") {
            redirect('welcome/login');
        }
    }

    public function index() {
     
    
		$user_id = $this->session->userdata('user_id');
      //  echo $user_id; die;
        $arrData['listDeposit'] = $this->deposit_model->getDeposit($user_id);
        
        $arrData['lastDepositAddress'] = $this->deposit_model->get_last_btc($user_id);
        
       // echo "<pre>";        print_r($arrData['lastDepositAddress']); die;
        $arrData['middle'] = 'deposit';
        $this->load->view('template', $arrData);
    }

    // create a new btc address.
    public function newBtcAddress() {
        $secret = 'ASD15jU1uqTjXasdhDB145PMo152cp4Ng75ShQ5e582caZ54P';
        //$my_xpub = 'xpub6BmcegowDZNmhEDfsuU7Y4urYrD1mARrJ5JvbmFz9B9AD5BpwB26THuSsVATS4mmaDjYZ6H9Z5GPuQuQBmCAkJCNLKSpz7auM9uNdyf2ngi'; // new another account
        //$my_api_key = 'a77accc3-1594-47ce-81df-cc3bd4e0313b';
        $my_xpub = 'xpub6Cuo97KNGKSMQvPBrVzUBbSN9gNdcM1vF8hxPar6cS6YCxUDozZfziHfyH65c4oht5ps8qPJ5iYEj92ffyvcdEBSYbUA1a3yHv2fXuy7vV5';
        $my_api_key = '7c4891e7-bc50-438f-a84c-b2399ff3833c';
        $inv = "bhimcoin" . time();
        $my_callback_url = 'https://bheemcoin.com/deposit/callback?invoice_id=' . $inv . '&secret=' . $secret;
       // $my_callback_url = 'http://testcodeonline.com/bhimcoin/deposit/callback?invoice_id=' . $inv . '&secret=' . $secret;
        $root_url = 'https://api.blockchain.info/v2/receive';
        $parameters = 'xpub=' . $my_xpub . '&callback=' . urlencode($my_callback_url) . '&key=' . $my_api_key . '&gap_limit=50000';
        $response = file_get_contents($root_url . '?' . $parameters);
        $object = json_decode($response);
        $address = $object->address;

        $insertData['deposit_btc_address'] = $address;
        $insertData['deposit_invoice_id'] = $inv;
        $insertData['deposit_date'] = date('Y-m-d H:i:s');
        $insertData['deposit_user_id'] = $this->session->userdata('user_id');
         
        $insert = $this->deposit_model->saveBtcAddress($insertData);
        if ($insert) {
            redirect('deposit');
        }
    }

    public function callback() {
        $secret = 'ASD15jU1uqTjXasdhDB145PMo152cp4Ng75ShQ5e582caZ54P';
		if ($_GET['secret'] != $secret) {
            echo "Failed";
            die;
        }
        $invoice_id = $_GET['invoice_id'];
        
        //$investor = Investor::where('invoice_no', $request->invoice_id)->first();
        $investor = $this->deposit_model->get_invoice($invoice_id);
       // echo "<pre>";        print_r($investor); die;
        if ($investor) {
            $updateData['deposit_status'] = 1;
            $updateData['txid'] = $_GET['transaction_hash'];
            $updateData['btc'] = $_GET['value'] / 100000000;
            
            $update = $this->deposit_model->updateDeposit($invoice_id,$updateData);
            //$investor->status = 1;
            //$investor->txid = 
            //$investor->btc = ;$request->value / 100000000;
            //$investor->save();                    
        }
      
    }

}
