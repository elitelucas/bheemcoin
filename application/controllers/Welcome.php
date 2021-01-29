<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('front_end');
        $this->load->model('slider_model');
        $this->load->model('daily_gift_model');
        $this->load->model('explorer_model');
        $this->load->model('worker_model');
        $this->load->model('user_model');
        $this->load->model('player_model');
        $this->load->model('foods_model');
        $this->load->model('daily_message_model');
        
        $this->load->model('user_model');
        $this->load->model('deposit_model');
		$this->load->model('withdraw_model');
		$this->load->model('btcamount_model');
		
    }

    /**
     * index
     *
     * @uses        using we can get home page     
     * @author      Webiots_m     
     */
    public function index() {
        // echo 'hello'; die;
        //$this->load->view('')

        if ($this->session->userdata('user_login')) {
            redirect('welcome/login_success');
        } else {
            $arrData['getSlider'] = $this->slider_model->get_slider_img();
            //echo "<pre>";            print_r($arrData); die;
            $arrData['middle'] = 'front_end/index';
            $this->load->view('template', $arrData);
            // $this->load->view('front_end/index');
        }
    }

    /**
     * login
     *
     * @uses        using this login in front side.   
     * @author      Webiots_m     
     */
    public function login() {
        if ($this->session->userdata('user_login')) {
            redirect('welcome/login_success');
        } else {
            $rand_function = rand(1, 3);
            if ($rand_function == 1) {
                $data['f_number'] = rand(1, 9);
                $data['s_number'] = rand(1, 9);
                $data['operation'] = "+";
                $data['result'] = $data['f_number'] + $data['s_number'];
            }
            if ($rand_function == 2) {
                $data['f_number'] = rand(1, 9);
                $data['s_number'] = rand(1, 9);
                $data['operation'] = "-";
                $data['result'] = $data['f_number'] - $data['s_number'];
            }
            if ($rand_function == 3) {
                $data['f_number'] = rand(1, 9);
                $data['s_number'] = rand(1, 5);
                $data['operation'] = "x";
                $data['result'] = $data['f_number'] * $data['s_number'];
            }


            $data['middle'] = 'front_end/login';
            $this->load->view('template', $data);

            //$this->load->view('front_end/login', $data);
        }
    }

    public function logout() {
        $user_id = $this->session->userdata('user_id');
        $this->front_end->update_logout($user_id);
        $this->session->unset_userdata('user_login');
		
		unset($_SESSION["user_id"]);
        redirect('welcome/index');
    }

    //***********************Registration*****************************
    public function register() {


        if ($this->session->userdata('user_login')) {
            redirect('welcome/login_success');
        } else {

            $rand_function = rand(1, 3);
            if ($rand_function == 1) {
                $data['f_number'] = rand(1, 9);
                $data['s_number'] = rand(1, 9);
                $data['operation'] = "+";
                $data['result'] = $data['f_number'] + $data['s_number'];
            }
            if ($rand_function == 2) {
                $data['f_number'] = rand(1, 9);
                $data['s_number'] = rand(1, 9);
                $data['operation'] = "-";
                $data['result'] = $data['f_number'] - $data['s_number'];
            }
            if ($rand_function == 3) {
                $data['f_number'] = rand(1, 9);
                $data['s_number'] = rand(1, 5);
                $data['operation'] = "x";
                $data['result'] = $data['f_number'] * $data['s_number'];
            }

            $ranStr = md5(microtime());
            $ranStr = substr($ranStr, 0, 6);
            $data['smart_captcha'] = rand(1001, 9999);
            $data['image_captcha'] = $ranStr;

            if ($this->input->post('cmdSubmit')) {

                $ip = $this->input->ip_address();
                // echo $_SERVER['REMOTE_ADDR']; die;
                //echo $ip; die;
                if(!empty($this->input->post('refer'))){
				$name = $this->input->post('refer');
                // echo $name; die;
                $link = base_url() . "index.php/welcome/register/" . $name;
                $refer = $this->input->post('refer');
                $USER_Id = $this->user_model->get_user_id($refer);
				}else{
				$name = "admin";
		
                // echo $name; die;
                $link =base_url() . "index.php/welcome/register/" . $name;;
                $refer ="admin";
                $USER_Id = $this->user_model->get_user_id($refer);
				}
				

                //echo "<pre>";                print_r($USER_Id); die;

                $insertdata['username'] = $this->input->post('name');
                $insertdata['password'] = md5($this->input->post('pass'));
                $insertdata['refered_by'] = $USER_Id['id'];
                $insertdata['bitcoin_address'] = $this->input->post('bitcoin');
                $insertdata['email'] = $this->input->post('email');
                $insertdata['reference_link'] = $link;
                $insertdata['how_find'] = $this->input->post('find');
                $insertdata['ip_address'] = $ip;
                $insertdata['status'] = '1';
                $insertdata['date'] = date("Y-m-d H:i:s");
                $insertdata['user_earning_date'] = date("Y-m-d H:i:s");
                $insertdata['user_admin'] = '0';
                //echo "<prE>";                    print_r($insertdata); die;
                //echo 'hello'; die;
                // $refer_link = $this->front_end->check_refer($refer_ID);
              
				$check_ip = $this->front_end->check_ip_address($ip);
				if ($check_ip) 
				{
                    $this->session->set_flashdata('failed_ip', 'Your ip address already register try some differ !');
                    //redirect('welcome/register');
                    $data['middle'] = 'front_end/register';
                    $this->load->view('template', $data);
                    // echo 'ip regis'; die; 
                } 
				else 
				{
                    $insert = $this->front_end->save_user($insertdata);
					echo $insert;
                    if ($insert) 
					{
                         $admin_email = $this->config->item('admin_email');
                        
                        $this->load->library('email');
                        $this->email->from($admin_email, 'Webiots');
                        $this->email->to($insertdata['email']);
                        //$this->email->cc('another@another-example.com');
                        //$this->email->bcc('them@their-example.com');
                        $this->email->subject('Registration Mail');
                        $this->email->message('Welcome User registration successfull !');
                        if ($this->email->send()) {
                            
                        }
						$this->session->set_flashdata('success', 'user register success !');
                            redirect('welcome/login');
                    }
					 }
                /*}

                // echo "<prE>";        print_r($_POST); die;
                /* $this->form_validation->set_rules('refer', 'refer is not valid', 'callback_validate_member');
                  if ($this->form_validation->run() == TRUE) {
                  } else {
                  $data['middle'] = 'front_end/register';
                  $this->load->view('template', $data);
                  } */
            } else {
                $data['middle'] = 'front_end/register';
                $this->load->view('template', $data);
                //$this->load->view('front_end/register', $data);
            }
        }
    }

    /**
     * validate_member
     *
     * @uses        this is create dynamic validation rule in codeigniter that will be check referal valid or not.   
     * @author      Webiots_m     
     */
    function validate_member($str) {
        $field_value = $str; //this is redundant, but it's to show you how
        //the content of the fields gets automatically passed to the method

        if ($this->front_end->validate_member($field_value)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * getStar
     *
     * @uses        using this we can get Monkey in home page for getting star .
     * @author      Webiots_m     
     */
    public function getStar() {
        $monkeyId = $_POST['id'];
        $user_id = $this->session->userdata('user_id');

        // echo "<pre>";        print_r($arrData); die;
        $current_date = date('Y-m-d');
        $monkeyStar = $this->front_end->get_dailymonkeyStar($user_id, $current_date);


        $arrData['monkeystar_user_id'] = $user_id;
        $arrData['monkeystar_created_date'] = date("Y-m-d");
        $arrData['monkeystar_ip_address'] = $this->input->ip_address();
        $arrData['monkeystar_daily_star'] = '1';

        // echo "<pre>";        print_r($arrData); die;

        if ($monkeyStar) {
            ?>            
            <div  style="float: left;width: 100%;color: black; margin-top: 30px; margin-left: 50px;">
                <h3 style="color:white;">Your Daily Gift Expired for Today !</h3>
            </div> 
            <?php
        } else {
            $insert = $this->front_end->save_dailymonkeyStar($arrData);
            if ($insert) {
                $currnt_star = $this->user_model->get_profile($user_id);
                $old_satoshi = $currnt_star['user_star'];
                $updateData['user_star'] = $arrData['monkeystar_daily_star'] + $old_satoshi;
                $update = $this->front_end->update_Satoshi($user_id, $updateData);

                if ($update) {
                    ?>
                    <div  style="float: left;width: 100%;color: black; margin-top: 30px; margin-left: 10px;">
                        <h3 style="color:white;">You Won <img style="height: 50px;" src="<?php echo base_url('client_assets/assets/explore/goldenstar.png'); ?>">
                        </h3>
                    </div>
                    <?php
                }
            }
            //$data['daily_gifts'] = 'not_expired';
        }
    }

    /**
     * check
     *
     * @uses        using we can get star from dashboard on home page    
     * @author      Webiots_m     
     */
    public function check() {
        $user_id = $this->session->userdata('user_id');
        $current_date = date('Y-m-d');
        $monkeyStar = $this->front_end->get_dailymonkeyStar($user_id, $current_date);

        // echo "<pre>";        print_r($arrData); die;

        if ($monkeyStar) {
            echo TRUE;
        } else {
            echo FALSE;
        }
    }

    public function process_register() {
        $result = $this->front_end->process_register();

        if ($result == "success") {
            redirect('welcome/login_success');
        } else {
            $this->session->set_flashdata('abc', 'error');
            redirect('welcome/register/#not-allowed');
        }
    }

    public function check_username_availability() {
        $result = $this->front_end->check_username_availability();
        echo $result;
    }

    public function validate_reference() {
        $result = $this->front_end->validate_reference();
        echo $result;
    }

    function check_email_availability() {
        $result = $this->front_end->check_email_availability();
        echo $result;
    }

    function refer() {
        $id = $this->uri->segment(3);
        $data['refer'] = $id;
        $rand_function = rand(1, 3);
        if ($rand_function == 1) {
            $data['f_number'] = rand(1, 9);
            $data['s_number'] = rand(1, 9);
            $data['operation'] = "+";
            $data['result'] = $data['f_number'] + $data['s_number'];
        }
        if ($rand_function == 2) {
            $data['f_number'] = rand(1, 9);
            $data['s_number'] = rand(1, 9);
            $data['operation'] = "-";
            $data['result'] = $data['f_number'] - $data['s_number'];
        }
        if ($rand_function == 3) {
            $data['f_number'] = rand(1, 9);
            $data['s_number'] = rand(1, 5);
            $data['operation'] = "x";
            $data['result'] = $data['f_number'] * $data['s_number'];
        }
        $data['middle'] = 'front_end/refer';
        $this->load->view('template', $data);
        //$this->load->view('front_end/refer', $data);
    }

    //***********************Login*****************************
    public function process_login() {
        $result = $this->front_end->process_login();
        echo $result;
    }
    public function get_details(){
		$userid=$this->input->post('userid');
		$restuls=$this->front_end->get_user_details($userid);
		$userdata = $this->user_model->get_profile($userid);
		
        $IplayerId = $userdata['user_current_player'];
		$playerData = $this->player_model->get_player($IplayerId);
		$restuls[0]['speed']=$playerData[0]['player_capicity']."/Hour";
		$restuls[0]['capacity']=$playerData[0]['player_daily_limit']." Satoshi";
		$lastdeposit="0 Satoshi";
		$getlast = $this->deposit_model->getDepositlast($userid);
		if(count($getlast)!=0){
		$lastdeposit=$getlast[0]['btc']." Satoshi";	
		}
		$referal="0 Friends";
		$referalarray = $this->user_model->get_referal($userid);
		if(count($referalarray)!=0){
		$referal=count($referalarray)." Friends";	
		}
		$restuls[0]['lastdeposit']=$lastdeposit;
		$restuls[0]['referal']=$referal;
		echo json_encode($restuls);
		
	}
    public function login_success() {
		//code for deposite
		
		$user_id = $this->session->userdata('user_id');
		$listDeposit = $this->deposit_model->getDepositall($user_id);
      //  echo $user_id; die;
     
		foreach ($listDeposit as $list) {
		$arrData['listDeposit'] = $this->deposit_model->getDepositall($user_id);
		$root_url="https://blockchain.info/q/addressbalance/".$list['deposit_btc_address'];
  								$response = file_get_contents($root_url);
        						$object = json_decode($response);
  
		$btc= 	$object/100000000;
			if($list['deposit_status']==0){
			$update = $this->deposit_model->updateDepositall($list['deposit_btc_address'],$btc);
			}
		
			
			if($object>0){
				
			$insertData['address']=$list['deposit_btc_address'];
			$insertData['user_id']=$user_id;
			$insertData['amount']=$btc;
			$insertData['flag']=1;	
			$getData=$this->btcamount_model->getdata($insertData);
				
			if($getData){
			 }else{
			$this->btcamount_model->insertdata($insertData);
			$getarray=$this->user_model->getUserss($user_id);	 
			if($flag_status==0){
			$t_amount=$object+$getarray['user_attack_player_satoshi']; 
			$this->user_model->updateUserss($user_id,$t_amount);
			} 
			}
			}
		}
	
		$getlast = $this->deposit_model->getDepositlast($user_id);
		 //pending btc
		$pendingbtc=$this->withdraw_model->pendingbtc($user_id);
	    $paidbtc=$this->withdraw_model->paidbtc($user_id);
		$totalgetbtc=$this->deposit_model->totalgetbtc($user_id);
		
		
		//----
			//$update = $this->deposit_model->updateDeposit($invoice_id,$updateData);
		//----------
        $this->load->model('advertise_model');
        if ($this->session->userdata('user_login') == "true") {

            $session_data = $this->session->userdata();
            $userId = $session_data['user_id'];

            $data = $this->user_model->get_profile($userId);
            //echo "<pre>";            print_r($data);die;
            // date differnce between two date..
            $date_2 = strtotime($data['user_current_player_expire']);
            $date_1 = strtotime(date('Y-m-d H:i:s'));
            $datediff = $date_1 - $date_2;
            $datediff = floor($datediff / (60 * 60 * 24));
            //$dateDiff = $date_1 - $date_2;

            $current_player = $this->player_model->get_player($data['user_current_player']);
            $data['current_player_image'] = $current_player[0]['player_image'];
            // echo "<pre>";            print_r($current_player); die;
            $current_player_days = $current_player[0]['player_membership'];
            $current_player_dayss = $current_player_days - 1;

            $current_days = $current_player_dayss;
            //echo $current_days; die;
            if ($data['user_current_player'] == 3) {
                // echo 'hello'; die;
                if ($datediff > $current_days) {
                    $updateData['user_current_player'] = '1';
                    $updateData['user_current_player_expire'] = date('Y-m-d H:i:s');
                    $update = $this->user_model->updateUserSatoshi($userId, $updateData);
                }
            } else if ($data['user_current_player'] == 4) {
                if ($datediff > $current_days) {
                    $updateData['user_current_player'] = '1';
                    $updateData['user_current_player_expire'] = date('Y-m-d H:i:s');
                    $update = $this->user_model->updateUserSatoshi($userId, $updateData);
                }
            } else if ($data['user_current_player'] == 5) {
                if ($datediff > $current_days) {
                    $updateData['user_current_player'] = '1';
                    $updateData['user_current_player_expire'] = date('Y-m-d H:i:s');
                    $update = $this->user_model->updateUserSatoshi($userId, $updateData);
                }
            }

            $user_id = $this->session->userdata('user_id');
            $data['user'] = $this->front_end->get_user_details($user_id);

            //echo "<pre>";            print_r($data); die;
            $current_date = date('Y-m-d');
            //echo $current_date; die;
            $dailyGift = $this->daily_gift_model->get_dailyGift($user_id, $current_date);
            //echo "<prE>";            print_r($dailyGift); die;
            if ($dailyGift) {
                $data['daily_gifts'] = 'expired';
            } else {
                $data['daily_gifts'] = 'not_expired';
            }

            $explorerStar = $this->explorer_model->get_Star($user_id, $current_date);
            //echo "<prE>";            print_r($dailyGift); die;
            if ($explorerStar) {
                $data['daily_star'] = 'expired';
            } else {
                $data['daily_star'] = 'not_expired';
            }

            $getDays = $this->worker_model->get_worker();
            $minutes = $getDays[0]['worker_minute'];


            $dates = date('Y-m-d H:i:s', strtotime("-" . $minutes . " minutes"));
            //echo $dates; die;

            $imageWorker = $this->front_end->getWorkerSatoshiTime($user_id, $dates);

            if ($imageWorker) {
                $data['imageData'] = 'found';
            } else {
                $data['imageData'] = 'not_found';
            }

            $user_id = $userId;

            $current_date = date('Y-m-d');

            // this will help you if daily monkey star expire or not !
            $monkeyStar = $this->front_end->get_dailymonkeyStar($user_id, $current_date);

            if ($monkeyStar) {
                $data['monkey_status'] = 'monkeystar_expired';
            } else {
                $data['monkey_status'] = 'monkeystar_not_expired';
            }


            // using this we can add dynamic worker here .
            $data['workerDetails'] = $this->worker_model->get_worker();

            var_dump($data['workerDetails']);
            die;
            //echo "<prE>";            print_r($data['workerDetails']); die;
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
                'img_width' => '150',
                'img_height' => 50,
                'expiration' => 3600
            );
            $data['captcha_code'] = create_captcha($config);
            //echo "<pre>";            print_r($data) ;die;
            $this->session->set_userdata('captcha_code', $data['captcha_code']['word']);

            //this is used for total numner of foods in welcome page 
            $data['foos_total'] = $this->foods_model->get_total_foods($userId);
            $data['daily_message'] = $this->daily_message_model->get_user_Daily_message($userId);
            //echo "<pre>";            print_r($data); die;
            
            $data['advertiseData'] = $this->advertise_model->getAdvertise();
            
           
            
            
           
            $data['pendingbtc']=0;
			$data['paidbtc']=0;
            $data['middle'] = 'front_end/login_success';
			$data['getlast']=0;
			$data['totalgetbtcs']=0;
			if(isset($getlast[0]['btc'])){
			 if($getlast[0]['btc']!=0){
			  $data['getlast']=$getlast[0]['btc'];
			 }
			}
			if(isset($pendingbtc[0]['SUM(withdraw_btc_amount)'])){
			 if($pendingbtc[0]['SUM(withdraw_btc_amount)']!=0){
			  $data['pendingbtc']=$pendingbtc[0]['SUM(withdraw_btc_amount)'];
			 }
			}
			if(isset($paidbtc[0]['SUM(withdraw_btc_amount)'])){
			 if($paidbtc[0]['SUM(withdraw_btc_amount)']!=0){
			  $data['paidbtc']=$paidbtc[0]['SUM(withdraw_btc_amount)'];
			 }
			}
			if(isset($totalgetbtc[0]['s'])){
			 if($totalgetbtc[0]['s']!=0){
			  $data['totalgetbtcs']=$totalgetbtc[0]['s']*100000000;
			 }
			}
		   
            $this->load->view('template', $data);

            //echo "<prE>";            print_r($data['foos_total']); die;
            //$this->load->view('front_end/login_success', $data);
        } else {
            redirect('welcome/login');
        }
    }

    public function randomString($length = 8) {
        $str = "";
        $characters = array_merge(range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    // This function generates CAPTCHA image and store in "image folder".
    public function captcha_setting() {
        $length = 8;
        $str = "";
        $characters = array_merge(range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }

        $values = array(
            'word' => $str,
            'word_length' => 8,
            'img_path' => './images/',
            'img_url' => base_url() . 'images/',
            'font_path' => base_url() . 'system/fonts/texb.ttf',
            'img_width' => '150',
            'img_height' => 50,
            'expiration' => 3600
        );
        $data = create_captcha($values);
        $this->session->set_userdata('captcha_code', $data['captcha_code']['word']);
        //$_SESSION['captchaWord'] = $data['word'];
// image will store in "$data['image']" index and its send on view page
        //$this->load->view('captcha_view', $data);
        $data['middle'] = 'front_end/login_success';
        $this->load->view('template', $data);
    }

    // For new image on click refresh button.
    public function captcha_refresh() {
        $length = 8;
        $str = "";
        $characters = array_merge(range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }

        $values = array(
            'word' => $str,
            'word_length' => 8,
            'img_path' => './images/',
            'img_url' => base_url() . 'images/',
            'font_path' => base_url() . 'system/fonts/texb.ttf',
            'img_width' => '150',
            'img_height' => 50,
            'expiration' => 3600
        );
        $data['captcha_code'] = create_captcha($values);
        // $this->session->unset_userdata('captcha_code');
        $this->session->set_userdata('captcha_code', $data['captcha_code']['word']);

        echo $data['captcha_code']['image'];
    }

    public function get_new_session_value() {
        echo $this->session->userdata('captcha_code');
    }

    public function players() {
        $userId = $this->session->userdata('user_id');

        //get user data
        $arrData['user_Data'] = $this->user_model->get_profile($userId);
        //echo "<pre>";        print_r($arrData['user_Data']); die;
        //get Player data
        $arrData['player_data'] = $this->player_model->get_player();
        //echo "<pre>";        print_r($arrData['player_data']); die;
        $arrData['middle'] = 'front_end/players';
        $this->load->view('template', $arrData);

        //$this->load->view('front_end/player');
    }

    //***********************Edit Profile*****************************************	
    public function edit_profile() {

        if ($this->session->userdata('user_login') == "true") {
            $id = $this->uri->segment(3);
            $data['user'] = $this->front_end->get_user_edit_profile($id);
            $rand_function = rand(1, 3);
            if ($rand_function == 1) {
                $data['f_number'] = rand(1, 9);
                $data['s_number'] = rand(1, 9);
                $data['operation'] = "+";
                $data['result'] = $data['f_number'] + $data['s_number'];
            }
            if ($rand_function == 2) {
                $data['f_number'] = rand(1, 9);
                $data['s_number'] = rand(1, 9);
                $data['operation'] = "-";
                $data['result'] = $data['f_number'] - $data['s_number'];
            }
            if ($rand_function == 3) {
                $data['f_number'] = rand(1, 9);
                $data['s_number'] = rand(1, 5);
                $data['operation'] = "x";
                $data['result'] = $data['f_number'] * $data['s_number'];
            }

            $data['middle'] = 'front_end/edit_profile';
            $this->load->view('template', $data);
            //$this->load->view('front_end/edit_profile', $data);
        } else {
            redirect('welcome/login');
        }
    }

    public function update_profile() {
        $id = $this->uri->segment(3);
        $data = $this->front_end->update_profile($id);

        $id = $this->uri->segment(3);
        $data['user'] = $this->front_end->get_user_edit_profile($id);



        if ($data == "success") {
            // echo 'hello success'; die;
            redirect('welcome/login_success');
        } else {
            //echo 'hello failed'; die;

            $this->session->set_flashdata('abc', 'error');
            //redirect('welcome/change_password/' . $id);
            // redirect('welcome/edit_profile');
            $data['middle'] = 'front_end/edit_profile';
            $this->load->view('template', $data);
        }
    }

    /* public function change_wallet() {
      if ($this->session->userdata('user_login') == "true") {
      $id = $this->uri->segment(3);
      $data['user'] = $this->front_end->get_user_edit_profile($id);
      $rand_function = rand(1, 3);
      if ($rand_function == 1) {
      $data['f_number'] = rand(1, 9);
      $data['s_number'] = rand(1, 9);
      $data['operation'] = "+";
      $data['result'] = $data['f_number'] + $data['s_number'];
      }
      if ($rand_function == 2) {
      $data['f_number'] = rand(1, 9);
      $data['s_number'] = rand(1, 9);
      $data['operation'] = "-";
      $data['result'] = $data['f_number'] - $data['s_number'];
      }
      if ($rand_function == 3) {
      $data['f_number'] = rand(1, 9);
      $data['s_number'] = rand(1, 5);
      $data['operation'] = "x";
      $data['result'] = $data['f_number'] * $data['s_number'];
      }

      $data['middle'] = 'front_end/edit_wallet';
      $this->load->view('template', $data);
      //$this->load->view('front_end/edit_wallet', $data);
      } else {
      redirect('welcome/login');
      }
      } */

    public function update_wallet() {
        $id = $this->uri->segment(3);
        $data = $this->front_end->update_wallet($id);
        redirect('welcome/login_success', 'refresh');
    }

    public function change_password() {
        if ($this->session->userdata('user_login') == "true") {
            $id = $this->uri->segment(3);
            $data['user'] = $this->front_end->get_user_edit_profile($id);
            $rand_function = rand(1, 3);
            if ($rand_function == 1) {
                $data['f_number'] = rand(1, 9);
                $data['s_number'] = rand(1, 9);
                $data['operation'] = "+";
                $data['result'] = $data['f_number'] + $data['s_number'];
            }
            if ($rand_function == 2) {
                $data['f_number'] = rand(1, 9);
                $data['s_number'] = rand(1, 9);
                $data['operation'] = "-";
                $data['result'] = $data['f_number'] - $data['s_number'];
            }
            if ($rand_function == 3) {
                $data['f_number'] = rand(1, 9);
                $data['s_number'] = rand(1, 5);
                $data['operation'] = "x";
                $data['result'] = $data['f_number'] * $data['s_number'];
            }

            $data['middle'] = 'front_end/change_password';
            $this->load->view('template', $data);
            //$this->load->view('front_end/change_password', $data);
        } else {
            redirect('welcome/login');
        }
    }

    public function update_password() {

        $id = $this->uri->segment(3);
        $data = $this->front_end->update_password($id);

        if ($data == "success") {
            redirect('welcome/login_success');
        } else {

            $this->session->set_flashdata('abc', 'error');
            redirect('welcome/change_password/' . $id);
        }
    }

    //******************************Chat*****************************************************
    public function chat() {
        if ($this->session->userdata('user_login') == "true") {

            $data['middle'] = 'front_end/chat';
            $this->load->view('template', $data);

            //$this->load->view('front_end/chat');
        } else {
            redirect('welcome/login');
        }
    }

    public function send_message_chat() {
        $result = $this->front_end->send_message_chat();
        echo $result;
    }

    function update_chat() {
        $data = $this->front_end->update_chat();
        foreach ($data as $row) {
            $sess_name = $this->session->userdata('user_name');
            $name = $row['username'];
            $date = $row['date'];
            $time = $row['time'];
            $message = $row['message'];
            $image = $row['image'];
            if ($sess_name == $name) {
                $name = "You";
            }
            if ($image == "") {
                $image = "client_assets/assets/user1.jpg";
            }
            echo '
					 <div class="entry row large-collapse">
					<div class="date small-3 large-2 columns">
					  <img src="' . base_url() . $image . '"/>
					</div>
					
					<div class="article-preview small-13 large-14 columns">
					  <h6><a>' . $name . '</a> <span style="font-size: 12px;">' . $time . '</span></h6>
					  <p>' . $message . '</p>
					</div>
					
				  </div>';
        }
    }

    //******************************Chat*****************************************************
    public function chat_history() {
        if ($this->session->userdata('user_login') == "true") {

            $this->load->view('front_end/chat_history');
        } else {
            redirect('welcome/login');
        }
    }

    function update_chat_history() {
        $data = $this->front_end->update_chat_history();
        foreach ($data as $row) {
            $sess_name = $this->session->userdata('user_name');
            $name = $row['username'];
            $date = $row['date'];
            $time = $row['time'];
            $message = $row['message'];
            $image = $row['image'];
            if ($sess_name == $name) {
                $name = "You";
            }
            if ($image == "") {
                $image = "client_assets/assets/user1.jpg";
            }
            echo '
					 <div class="entry row large-collapse">
					<div class="date small-3 large-2 columns">
					  <img src="' . base_url() . $image . '"/>
					</div>
					
					<div class="article-preview small-13 large-14 columns">
					  <h6><a>' . $name . '</a> <span style="font-size: 12px;">' . $time . '</span></h6>
					  <p>' . $message . '</p>
					</div>
					
				  </div>';
        }
    }

    function delete_old_msg() {
        $this->front_end->delete_old_msg();
    }

    function online_players() {

        $config["base_url"] = base_url() . "index.php/welcome/online_players/";
        $total_rows_count = $this->front_end->count_online_players();
        $config["total_rows"] = $total_rows_count;
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['num_links'] = 3;
        $config["use_page_numbers"] = TRUE;
        $config['full_tag_open'] = "<ul id='pagination' style='float: right;padding-right: 15px;display:flex;list-style:none;'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#" style="color:#c5db3b;">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous Page';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next Page';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["player"] = $this->front_end->get_online_player1($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['cnt']=$total_rows_count;
		$data['userscount']=$this->front_end->count_last5_minutes();
		$data['last5minutesusers']=$this->front_end->last5_minutes();
        
        //$data['player']=$this->front_end->get_online_player();
        $data['middle'] = 'front_end/online-players';
		/* print_r($data['userscount']);
		print_r($data['last5minutesusers']); */
        $this->load->view('template', $data);
        //$this->load->view("front_end/online-players", $data);
    }

    function lost_password() {
        $rand_function = rand(1, 3);
        if ($rand_function == 1) {
            $data['f_number'] = rand(1, 9);
            $data['s_number'] = rand(1, 9);
            $data['operation'] = "+";
            $data['result'] = $data['f_number'] + $data['s_number'];
        }
        if ($rand_function == 2) {
            $data['f_number'] = rand(1, 9);
            $data['s_number'] = rand(1, 9);
            $data['operation'] = "-";
            $data['result'] = $data['f_number'] - $data['s_number'];
        }
        if ($rand_function == 3) {
            $data['f_number'] = rand(1, 9);
            $data['s_number'] = rand(1, 5);
            $data['operation'] = "x";
            $data['result'] = $data['f_number'] * $data['s_number'];
        }

        $data['middle'] = 'front_end/lost_password';
        $this->load->view('template', $data);

        //$this->load->view('front_end/lost_password', $data);
    }

    function send_password_link() {
    $email = $this->input->post('email');
    $data = $this->front_end->get_user_details_lost();
    $user_id = $data[0]['id'];
    $username = $data[0]['username'];


    $admin_email = $this->config->item('admin_email');
    //$resetLink = ;        

    $email_body = 'Dear  ' . $username;
    $email_body .= 'Reset Password link. ';
    $email_body .= base_url("welcome/reset_password/".$user_id);

    $config = Array(
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'wordwrap' => TRUE
    );

    $this->load->library('email', $config);
    $this->email->from($admin_email, "Bheemcoin");
    $this->email->to($email);
    //$this->email->cc('another@another-example.com');
    //$this->email->bcc('them@their-example.com');
    $this->email->subject('Reset Password Link');
    $this->email->message($email_body);

    if ($this->email->send()) {
        $this->session->set_flashdata('success', 'user register success !');
        redirect('welcome/login');
    }

    //echo "<pre>"; print_r($email_body); die;

    redirect("welcome/index/#send_link");
    }

    function get_user() {
        $data = $this->front_end->get_all_user();
        print_r($data);
    }

    function reset_password() {
        $id = $this->uri->segment(3);
        if (isset($id)) {
            $data['user'] = $this->front_end->get_user_details($id);


            $data['f_number'] = rand(1, 9);
            $data['s_number'] = rand(1, 9);
            $data['operation'] = "+";
            $data['result'] = $data['f_number'] + $data['s_number'];
            
            
            $data['middle'] = 'front_end/forgot_password';
            $this->load->view('template', $data);
        } else {
            redirect("welcome/lost_password");
        }
    }

    function do_reset_password() {
        $id = $this->uri->segment(3);
        $data = $this->front_end->do_reset_password($id);

        if ($data == "success") {
            redirect('welcome/login');
        } else {
            $this->session->set_flashdata('abc', 'error');
            redirect('welcome/reset_password/' . $id);
        }
    }

    /**
     * satoshiStore
     *
     * @uses        this is used when 
     * @author      Webiots_m     
     */
    public function satoshiStore() {
        $getDays = $this->worker_model->get_worker();
        $minutes = $getDays[0]['worker_minute'];
        // echo "<pre>";        print_r($getDays); die;

        $user_id = $this->session->userdata('user_id');
        $insertData['worker_satoshi_amount'] = $_POST['satoshiValue'];

        //  if ($_POST['data_worker_id']) {
        $insertData['worker_s_worker_id'] = $_POST['data_worker_id'];
        // }

        $insertData['worker_satoshi_userId'] = $this->session->userdata('user_id');
        $insertData['worker_satoshi_created_date'] = date("Y-m-d H:i:s");
        $insertData['worker_satoshi_ip'] = $this->input->ip_address();

        //echo "<pre>";        print_r($insertData); die;
        /* $date = date("Y-m-d H:i:s");
          $time = strtotime($date);
          $time = $time - ($minutes * 60);
          $dates = date("Y-m-d H:i:s", $time); */


        /* $date = new DateTime();
          / $date->modify("+<?php echo $minutes; ?> minutes"); */

        $dates = date('Y-m-d H:i:s', strtotime("-" . $minutes . " minutes"));
        $insert = $this->front_end->saveWorkerSatoshi($user_id, $insertData, $dates);

        if ($insert) {
            //echo 'hello'; die; 
            $currnt_satoshi = $this->user_model->get_profile($user_id);
            $old_satoshi = $currnt_satoshi['user_attack_player_satoshi'];
            $updateData['user_attack_player_satoshi'] = $insertData['worker_satoshi_amount'] + $old_satoshi;
            $update = $this->front_end->update_Satoshi($user_id, $updateData);

            if ($update) {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * getCurrentTime
     *
     * @uses        this is used for get current time for displaying collected satoshi ..
     * @author      Webiots_m     
     */
    public function getCurrentTime() {

        $admin_id = $this->session->userdata('user_id');
        $systemDate = date('Y-m-d H:i:s');

        $userdata = $this->user_model->get_profile($admin_id);
        $user_earning_date = $userdata['user_earning_date'];

        $IplayerId = $userdata['user_current_player'];
        // echo $IplayerId; die;
        //$datetime1 = new DateTime($systemDate);
        //$datetime2 = new DateTime($user_earning_date);
        //$interval = $datetime1->diff($datetime2);
        //$elapsed = $interval->format('%i');
        //$earn_satoshi = $elapsed * 2; 
        // get player informaion
        // get player informaion
        $playerData = $this->player_model->get_player($IplayerId);
        $player_Daily_LIMIT = $playerData[0]['player_daily_limit'];
        $player_Daily_Capicity = $playerData[0]['player_capicity'];


        $datetime1 = strtotime($systemDate);
        $datetime2 = strtotime($user_earning_date);
        $interval = abs($datetime2 - $datetime1);
        $minutes = round($interval / 60);



        $earn_satoshi = $minutes * $playerData[0]['player_satoshi_minute'];
        //echo $earn_satoshi; die;
        // echo  $playerData[0]['player_daily_limit']; 
        //$data_Satoshi = $this->user_model->getSatoshi($admin_id);
        $dateTime = date('Y-m-d');
        $data_Satoshi = $this->user_model->get_today_satoshi($admin_id, $dateTime);

        //echo         print_r($data_Satoshi); die;
        //total satoshi in collect satoshi table ..
        $total_Satoshi = $data_Satoshi['total_Satoshi']; //todays total earning 93
//        $earn_satoshi is current earning ganerater            452
//         $player_Daily_LIMIT //  this is daily limit of user 200
//         $player_Daily_Capicity // daily capacity of hour  100   
        // if player satoshi daily limit reached than price is 0

        if ($total_Satoshi == NULL || $total_Satoshi == 0) {

            if ($earn_satoshi < $player_Daily_Capicity) {
                $earn_satoshi;
            } else {
                $earn_satoshi = $player_Daily_Capicity;
                //$total_Satoshi = 10;
            }
        } else if ($total_Satoshi >= $player_Daily_LIMIT) {
            $earn_satoshi = 0;
        } else if ($earn_satoshi > ($player_Daily_LIMIT - $total_Satoshi)) {
            $earn_satoshi = $player_Daily_LIMIT - $total_Satoshi;
        }
        //echo $earn_satoshi; die;

        if ($earn_satoshi < $playerData[0]['player_daily_limit']) {
            if ($total_Satoshi != NULL || $total_Satoshi != 0) {
                echo '<span class="SatoshiWON">Satoshi Won Today is : ' . $total_Satoshi . "</span><br>";
            } else {
                echo '<span class="SatoshiWON">Satoshi Won Today is : 0' . '</span><br>';
            }

            // if earn satoshi less than player capicity 
            if ($earn_satoshi < $playerData[0]['player_capicity']) {
                ?>
                <span class="genereatedButton"><a href="javascript:void(0)" onclick="earnSatoshi(<?php echo $earn_satoshi; ?>,<?php echo $playerData[0]['player_daily_limit']; ?>)" class="button btn-danger">Collect</a></span>
                <span class="satoshiearned"> <?php echo $earn_satoshi . '/' . $player_Daily_Capicity . '<br>'; ?> </span>
                <?php
                echo '<span class="GeneratedSatoshi">Generated : ' . $earn_satoshi . ' Satoshi' . "<br></span>";
            } else {
                ?>
                <span class="genereatedButton"><a href="javascript:void(0)" onclick="earnSatoshi(<?php echo $playerData[0]['player_capicity']; ?>,<?php echo $playerData[0]['player_daily_limit']; ?>)" class="button btn-danger">Collect</a></span>
                <?php
                echo '<span class="satoshiearned">' . $playerData[0]['player_capicity'] . '/' . $playerData[0]['player_capicity'] . '<br></span>';
                echo '<span class="GeneratedSatoshi">Generated : ' . $playerData[0]['player_capicity'] . ' Satoshi' . "<br></span>";
            }

            echo '<span class="mySpeed">My Speed : ' . $playerData[0]['player_capicity'] . '/Hour' . "<br></span>";
            echo '<span class="myCapicity">My Capicity : ' . $playerData[0]['player_daily_limit'] . ' Satoshi</span>';
        } else {
            echo 'Satoshi Won Today is : ' . $total_Satoshi . "<br>";
            ?>
            <span class="genereatedButton"><a href="javascript:void(0)" onclick="earnSatoshiFailed('failed')" class="button btn-danger">Collect</a></span><span class="satoshiearned"><?php echo $earn_satoshi . '/' . $playerData[0]['player_capicity'] ?><br></span>
            <?php
            echo '<span class="GeneratedSatoshi">Generated : ' . $earn_satoshi . ' Satoshi' . "<br></span>";
            echo '<span class="mySpeed">My Speed : ' . $playerData[0]['player_capicity'] . '/Hour' . "<br></span>";
            echo '<span class="myCapicity">My Capicity : ' . $playerData[0]['player_daily_limit'] . ' Satoshi</span>';
        }
    }

    /**
     * update_current_satoshi
     *
     * @uses        when user click collect button satoshi earn 
     * @author      Webiots_m     
     */
    public function update_current_satoshi() {
        $user_id = $this->session->userdata('user_id');
        $ip = $this->input->ip_address();
        $admin_id = $user_id;

        $player_daily_limit = $_POST['player_daily_limit'];
        $current_satoshi = $_POST['earn_Satoshi'];

        $user_profile = $this->user_model->getSatoshi($admin_id);

        $total_satoshi = $user_profile['collect_satoshi'];

        // when satoshi is generated we can store in generatedSatoshi table ..

        $InsertGeneratedSatoshiData['generated_satoshi_user_id'] = $user_id;
        $InsertGeneratedSatoshiData['generated_satoshi_amount'] = $current_satoshi;
        $InsertGeneratedSatoshiData['generated_satoshi_created_date'] = date('Y-m-d H:i:s');
        $InsertGeneratedSatoshiData['generated_satoshi_ip_address'] = $ip;

        $insertSatoshiData = $this->user_model->generatedSatoshi($InsertGeneratedSatoshiData);

        if ($total_satoshi != NULL && $total_satoshi != 0) {
            $updateSatoshiOLD['collect_earning_date'] = date('Y-m-d H:i:s');

            $updateSATOSHI = $current_satoshi + $total_satoshi;
            if ($updateSATOSHI < $player_daily_limit) {
                $updateSatoshiOLD['collect_satoshi'] = $updateSATOSHI;
            } else {
                $updateSatoshiOLD['collect_satoshi'] = $player_daily_limit;
            }
            $update_old = $this->user_model->updateOldSatoshi($user_id, $updateSatoshiOLD);
        } else {
            $insertData['collect_created_date'] = date('Y-m-d H:i:s');
            $insertData['collect_earning_date'] = date('Y-m-d H:i:s');
            $insertData['collect_ip_address'] = $ip;
            $insertData['collect_user_id'] = $user_id;
            $insertData['collect_satoshi'] = $current_satoshi;
            $update_new = $this->user_model->insertSatoshi($insertData);
        }

        //$updateUSERreferal['user_attack_player_satoshi'] = $current_satoshi;
        //get current profile and update referal satoshi ...
        //$User_DATA = $this->user_model->get_profile($admin_id);
        //$refer_id = $User_DATA['refered_by'];
        //$refer_satoshi_balance = $User_DATA['user_attack_player_satoshi'];
        //echo $refer_satoshi_balance; die;
        //$current_newsatoshi = (($current_satoshi * 20) / 100);
        // $updateUSERreferal['user_attack_player_satoshi'] = $refer_satoshi_balance + $current_newsatoshi;
        //$updateReferal = $this->user_model->updateReferSatoshi($refer_id, $updateUSERreferal);
        //$updateSatoshi = $this->user_model->updateSatoshi($user_id, $updateSatoshi);  

        $user_data = $this->user_model->get_profile($user_id);
        //echo "<prE>";            print_r($user_data); die;
        $updateData['user_earning_date'] = date('Y-m-d H:i:s');
        $updateData['user_attack_player_satoshi'] = $user_data['user_attack_player_satoshi'] + $current_satoshi;
        $updateUser = $this->user_model->update_Profile($admin_id, $updateData);
        if ($updateUser) {
            // also update referal satoshi in user model ...
            $user_data_Profile = $this->user_model->get_profile($admin_id);
            //echo "<prE>";            print_r($user_data_Profile); die;
            $refer_id = $user_data_Profile['refered_by'];
            $admin_id = $refer_id;
            $referal_data = $this->user_model->get_profile($admin_id);
            //echo "<prE>";            print_r($referal_data); die;
            $user_total_Satoshi = $referal_data['user_attack_player_satoshi'];
            $user_total_Earn = $referal_data['refer_earning'];

            //echo $user_total_Satoshi; die;
            $refer_satoshi_earn = (($current_satoshi * 20) / 100);
                                  
            if ($user_data['user_current_player'] == 1 || $user_data['user_current_player'] == 2) {                
                $updateUSERreferal['user_attack_player_satoshi'] = $user_total_Satoshi + $refer_satoshi_earn;
                
                $updateUSERreferal['refer_earning'] = $user_total_Earn + $refer_satoshi_earn;
                //echo "<prE>";            print_r($updateUSERreferal); die;
                if ($this->user_model->updateReferSatoshi($refer_id, $updateUSERreferal)) {                    
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
            else
            {
                echo 'not update';
            }
        }
    }

    public function checkUserlogin() {
        if ($this->session->userdata('logged_in') !== TRUE) {
            echo 'false';
        }
    }

    public function contactus() {
        $arrData['middle'] = 'footer_pages/contactus';
        $this->load->view('template', $arrData);
    }
    
    public function advertise() {
        $arrData['middle'] = 'footer_pages/advertise';
        $this->load->view('template', $arrData);
    }
    
    public function howtoplay() {
        $arrData['middle'] = 'footer_pages/howtoplay';
        $this->load->view('template', $arrData);
    }
    
    public function privacypolicy() {
        $arrData['middle'] = 'footer_pages/privacypolicy';
        $this->load->view('template', $arrData);
    }

    public function terms() {
        $arrData['middle'] = 'footer_pages/terms';
        $this->load->view('template', $arrData);
    }

    // remove daily message 
    public function removeDailymsg($IDaily_messageId) {
        $delete = $this->daily_message_model->deleteDaily_message($IDaily_messageId);
        redirect('welcome');
    }

}
