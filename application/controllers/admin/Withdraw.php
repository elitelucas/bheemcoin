<?php

class Withdraw extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('withdraw_model');
        $this->load->model('user_model');
        $this->load->model('withdraw_limit_model');
		$this->api_key = 'b8a2e8ef6116c2124b0104eb5af008ab';
        $this->currency = 'BTC';
		$this->disable_curl = false;
		$this->api_base = "https://faucethub.io/api/v1/";
		$this->verify_peer=true;
		$this->timeout=null;
      //  $this->load->library('FaucetHub');
		//die;
		//-----------------
		
		///------------------
		//03-02-2018
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('admin');
        }
        
    }

    public function index() {
		
        $userId = $this->session->userdata('user_id');
        $arrData['withdrawDetails'] = $this->withdraw_model->get_withdraw($userId);
        //echo "<pre>";        print_r($arrData); die;
        $arrData['middle'] = 'admin/withdraw/list';
        $this->load->view('admin/template', $arrData);
    }

    public function delete($IwithdrawId) {
        
    }
    //----------------------------
	public function __exec($method, $params = array()) {
        $this->last_status = null;
        if($this->disable_curl) {
            $response = $this->__execPHP($method, $params);
        } else {
            $response = $this->__execCURL($method, $params);
        }
        $response = json_decode($response, true);
        if($response) {
            $this->last_status = $response['status'];
        } else {
            $this->last_status = null;
            $response = array(
                'status' => 502,
                'message' => 'Invalid response',
            );
        }
        return $response;
    }

    public function __execCURL($method, $params = array()) {
        $params = array_merge($params, array("api_key" => $this->api_key, "currency" => $this->currency));

        $ch = curl_init($this->api_base . $method);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->verify_peer);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, (int)$this->timeout);

        $response = curl_exec($ch);
        if(!$response) {
            //$response = $this->__execPHP($method, $params); // disabled the exec fallback when using curl
            return json_encode(array(
                'status' => 504,
                'message' => 'Connection error',
            ), TRUE);
        }
        curl_close($ch);

        return $response;
    }
	public function __execPHP($method, $params = array()) {
        $params = array_merge($params, array("api_key" => $this->api_key, "currency" => $this->currency));
        $opts = array(
            "http" => array(
                "method" => "POST",
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "content" => http_build_query($params),
                "timeout" => $this->timeout,
            ),
            "ssl" => array(
                "verify_peer" => $this->verify_peer
            )
        );
        $ctx = stream_context_create($opts);
        $fp = fopen($this->api_base . $method, 'rb', null, $ctx);
        
        if (!$fp) {
            return json_encode(array(
                'status' => 503,
                'message' => 'Connection to FaucetHub failed, please try again later',
            ), TRUE);
        }
        
        $response = stream_get_contents($fp);
        if($response && !$this->disable_curl) {
            $this->curl_warning = true;
        }
        fclose($fp);
        return $response;
    }
	public function getBalance() {
        $r = $this->__exec("balance");
        return $r;
    }
	 public function send($to, $amount, $referral = false, $ip_address = "") {
        $referral = ($referral === true) ? 'true' : 'false';
        
        $r = $this->__exec("send", array("to" => $to, "amount" => $amount, "referral" => $referral, "ip_address" => $ip_address));
        if (array_key_exists("status", $r) && $r["status"] == 200) {
            return array(
                'success' => true,
                'message' => 'Payment sent to your address using FaucetHub.io',
                'html' => '<div class="alert alert-success">' . htmlspecialchars($amount) . ' satoshi was sent to <a target="_blank" href="https://faucethub.io/balance/' . rawurlencode($to) . '">your account at FaucetHub.io</a>.</div>',
                'html_coin' => '<div class="alert alert-success">' . htmlspecialchars(rtrim(rtrim(sprintf("%.8f", $amount/100000000), '0'), '.')) . ' '.$this->currency.' was sent to <a target="_blank" href="https://faucethub.io/balance/' . rawurlencode($to) . '">your account at FaucetHub.io</a>.</div>',
                'balance' => $r["balance"],
                'balance_bitcoin' => $r["balance_bitcoin"],
                'response' => json_encode($r)
            );
        }
        
        // Let the user know they need an account to claim
        if (array_key_exists("status", $r) && $r["status"] == 456) {
            return array(
                'success' => false,
                'message' => $r['message'],
                'html' => '<div class="alert alert-danger">Before you can receive payments at FaucetHub.io with this address you must link it to an account. <a href="http://faucethub.io/signup" target="_blank">Create an account at FaucetHub.io</a> and link your address, then come back and claim again.</div>',
                'response' => json_encode($r)
            );
        }

        if (array_key_exists("message", $r)) {
            return array(
                'success' => false,
                'message' => $r["message"],
                'html' => '<div class="alert alert-danger">' . htmlspecialchars($r["message"]) . '</div>',
                'response' => json_encode($r)
            );
        }

        return array(
            'success' => false,
            'message' => 'Unknown error.',
            'html' => '<div class="alert alert-danger">Unknown error.</div>',
            'response' => json_encode($r)
        );
    }
	//----------------------------
    public function userRequest($IwithdrawId) {
	

        $arrData['withdrawRequest'] = $this->withdraw_model->get_withdraw_request($IwithdrawId);
        //echo "<prE>";        print_r($arrData); die;

        $arrData['middle'] = 'admin/withdraw/edit';
        $this->load->view('admin/template', $arrData);
    }

    public function changeRequest($Request, $requestId) {        
        $userId = $this->session->userdata('user_id');
        $admin_id = $userId;
        $userData = $this->user_model->get_profile($admin_id);      

        $IwithdrawId = $requestId;
        $arrData['withdrawRequest'] = $this->withdraw_model->get_withdraw_request($IwithdrawId);      
        
        $request = $arrData['withdrawRequest']['withdrawl_type'];
        $withLimitData = $this->withdraw_limit_model->getRequestType($request);
        //echo "<prE>";        print_r($withLimitData); die;
        $with_min_limit = $withLimitData['withdraw_limit_min'];
        $with_max_limit = $withLimitData['withdraw_limit_max'];
        $with_fees = $withLimitData['withdraw_limit_fees'];

        $withAmount = $arrData['withdrawRequest']['withdraw_btc_amount'];       
        if ($Request == 'accept') {
            $updateWithdrawal['withdraw_status'] = 1;
			
           
			//if($arrData['withdrawRequest']['withdrawl_type']==2){
			$this->send($arrData['withdrawRequest']['withdraw_btc_address'], $arrData['withdrawRequest']['withdraw_btc_amount']);
			//}
			
        } else if ($Request == 'reject') { 

            $updateWithdrawal['withdraw_btc_amount'] = 0;
            
            $updateData['user_attack_player_satoshi'] = $userData['user_attack_player_satoshi'] + $withAmount + $with_fees;
            $updateUserProfile = $this->user_model->update_Profile($admin_id, $updateData);
            $updateWithdrawal['withdraw_status'] = 2;
        }

        $update = $this->withdraw_model->updateWithdrawRequest($requestId, $updateWithdrawal);
        if ($update) {
            $this->session->set_flashdata('success', 'Request Update Success !');
            redirect('admin/withdraw');
        }
    }

}
?>

