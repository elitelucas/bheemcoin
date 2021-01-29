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
                $name = $this->input->post('refer');
                // echo $name; die;
                $link = base_url() . "index.php/welcome/register/" . $name;
                $refer = $this->input->post('refer');
                $USER_Id = $this->user_model->get_user_id($refer);

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
                if ($check_ip) {
                    $this->session->set_flashdata('failed_ip', 'Your ip address already register try some differ !');
                    //redirect('welcome/register');
                    $data['middle'] = 'front_end/register';
                    $this->load->view('template', $data);
                    // echo 'ip regis'; die; 
                } else {
                    $insert = $this->front_end->save_user($insertdata);
                    if ($insert) {
                        $this->load->library('email');
                        $this->email->from('test@webiots.com', 'Webiots');
                        $this->email->to($insertdata['email']);
                        //$this->email->cc('another@another-example.com');
                        //$this->email->bcc('them@their-example.com');
                        $this->email->subject('Registration Mail');
                        $this->email->message('Welcome User registration successfull !');
                        if ($this->email->send()) {
                            $this->session->set_flashdata('success', 'user register success !');
                            redirect('welcome/login');
                        }
                    }
                }

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
                    <div  style="float: left;width: 100%;color: black; margin-top: 30px; margin-left: 50px;">
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

    public function login_success() {

        if ($this->session->userdata('user_login') == "true") {
            $session_data = $this->session->userdata();
            $userId = $session_data['user_id'];
            //  echo "<pre>";            print_r($session_data);die;
            $data = $this->user_model->get_profile($session_data['user_id']);
            //echo "<pre>";            print_r($data);die;
            // date differnce between two date..
            $date_2 = strtotime($data['user_current_player_expire']);
            $date_1 = strtotime(date('Y-m-d H:i:s'));
            $datediff = $date_1 - $date_2;
            $datediff = floor($datediff / (60 * 60 * 24));
            //$dateDiff = $date_1 - $date_2;

            $current_player = $this->player_model->get_player($data['user_current_player']);

            $current_player_days = $current_player[0]['player_membership'];
            $current_player_dayss = $current_player_days - 1;

            $current_days = $current_player_dayss;
            //echo $current_days; die;
            if ($data['user_current_player'] == 3) {
                if ($datediff > $current_days) {
                    $updateData['user_current_player'] = '1';
                    $update = $this->user_model->updateUserSatoshi($userId, user_earning_date);
                }
            } else if ($data['user_current_player'] == 4) {
                if ($datediff > $current_days) {
                    $updateData['user_current_player'] = '1';
                    $update = $this->user_model->updateUserSatoshi($userId, $updateData);
                }
            } else if ($data['user_current_player'] == 5) {
                if ($datediff > $current_days) {
                    $updateData['user_current_player'] = '1';
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

            /* $date = date("Y-m-d H:i:s");
              $time = strtotime($date);
              $time = $time - ($minutes * 60);
              $dates = date("Y-m-d H:i:s", $time); */

            //using this we can get last entry of table if any entry found in database we can change image.

            $dates = date('Y-m-d H:i:s', strtotime("-" . $minutes . " minutes"));

            $imageWorker = $this->front_end->getWorkerSatoshiTime($user_id, $dates);
            if ($imageWorker) {
                $data['imageData'] = 'found';
            } else {
                $data['imageData'] = 'not_found';
            }

            // using this we can add dynamic worker here .
            $data['workerDetails'] = $this->worker_model->get_worker();
            //echo "<pre>";            print_r($data); die;

            $data['middle'] = 'front_end/login_success';
            $this->load->view('template', $data);
            //$this->load->view('front_end/login_success', $data);
        } else {
            redirect('welcome/login');
        }
    }

    public function players() {


        $arrData['middle'] = 'front_end/players';
        $this->load->view('template', $arrData);


        //$this->load->view('front_end/players');
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
        $config["total_rows"] = $this->front_end->count_online_players();
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

        //$data['player']=$this->front_end->get_online_player();
        $data['middle'] = 'front_end/online-players';
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

        $email_body = 'Dear ' . $username;
        $email_body .= ' <a href="http://testcodeonline.com/bhimcoin/index.php/welcome/reset_password/' . $user_id . '">Click here</a> to reset your password ';

        $config = Array(
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        /* $this->load->library('email', $config);
          $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
          $this->email->set_header('Content-type', 'text/html');
          $this->email->from('no-reply@bheemcoin.com', 'Reset Password Link');
          $this->email->to($email);
          $this->email->subject('Reset Password Link');
          $this->email->message($email_body);
          $this->email->send(); */


        $this->load->library('email', $config);
        $this->email->from('test@webiots.com', 'Webiots');
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

            $this->load->view('front_end/forgot_password', $data);
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
        $insertData['worker_s_worker_id'] = $_POST['data_worker_id'];
        $insertData['worker_satoshi_userId'] = $this->session->userdata('user_id');
        $insertData['worker_satoshi_created_date'] = date("Y-m-d H-i-s");
        $insertData['worker_satoshi_ip'] = $this->input->ip_address();

        /* $date = date("Y-m-d H:i:s");
          $time = strtotime($date);
          $time = $time - ($minutes * 60);
          $dates = date("Y-m-d H:i:s", $time); */


        /* $date = new DateTime();
          / $date->modify("+<?php echo $minutes; ?> minutes"); */

        $dates = date('Y-m-d H:i:s', strtotime("-" . $minutes . " minutes"));
        $insert = $this->front_end->saveWorkerSatoshi($user_id, $insertData, $dates);

        if ($insert) {
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
        $data_Satoshi = $this->user_model->getSatoshi($admin_id);
        //echo         print_r($data_Satoshi); die;
        //total satoshi in collect satoshi table ..
        $total_Satoshi = $data_Satoshi['collect_satoshi']; //todays total earning 93
        //echo $total_Satoshi; die;
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
                echo 'Satoshi Won Today is : ' . $total_Satoshi . "<br>";
            } else {
                echo 'Satoshi Won Today is : 0' . '<br>';
            }

            // if earn satoshi less than player capicity 
            // echo $earn_satoshi."<br>"; 
            //echo $playerData[0]['player_capicity']; 
            // echo $total_Satoshi; die
            if ($earn_satoshi <= $playerData[0]['player_capicity']) {
                //echo 'hello';
                ?>
                <a href="javascript:void(0)" onclick="earnSatoshi(<?php echo $earn_satoshi; ?>,<?php echo $playerData[0]['player_daily_limit']; ?>)" class="button btn-danger">Collect</a>&nbsp;&nbsp;&nbsp;&nbsp; 
                <?php
                echo $earn_satoshi . '/' . $player_Daily_Capicity . '<br>';
                echo 'Generated : ' . $earn_satoshi . ' Satoshi' . "<br>";
            } else {
                //echo 'bye '; die;
                ?>
                <a href="javascript:void(0)" onclick="earnSatoshi(<?php echo $playerData[0]['player_capicity']; ?>,<?php echo $playerData[0]['player_daily_limit']; ?>)" class="button btn-danger">Collect</a>&nbsp;&nbsp;&nbsp;&nbsp; 
                <?php
                echo $playerData[0]['player_capicity'] . '/' . $playerData[0]['player_capicity'] . '<br>';
                echo 'Generated : ' . $playerData[0]['player_capicity'] . ' Satoshi' . "<br>";
            }

            echo 'My Speed : ' . $playerData[0]['player_daily_limit'] . '/Hour' . "<br>";
            echo 'My Capicity : ' . $playerData[0]['player_capicity'] . ' Satoshi';
        } else {
            echo 'Satoshi Won Today is : ' . $total_Satoshi . "<br>";
            ?>
            <a href="javascript:void(0)" onclick="earnSatoshiFailed('failed')" class="button btn-danger">Collect</a>&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $earn_satoshi . '/' . $playerData[0]['player_capicity'] ?><br>
            <?php
            echo 'Generated : ' . $earn_satoshi . ' Satoshi' . "<br>";
            echo 'My Speed : ' . $playerData[0]['player_daily_limit'] . '/Hour' . "<br>";
            echo 'My Capicity : ' . $playerData[0]['player_capicity'] . ' Satoshi';
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
            //echo "<pre>";            print_r($referal_data); die;                        
            $user_total_Satoshi = $referal_data['user_attack_player_satoshi'];
           
            //echo $user_total_Satoshi; die;
            $refer_satoshi_earn = (($current_satoshi * 20) / 100);
            $updateUSERreferal['user_attack_player_satoshi'] = $user_total_Satoshi + $refer_satoshi_earn;
            //echo "<prE>";            print_r($updateUSERreferal); die;
            if ($this->user_model->updateReferSatoshi($refer_id, $updateUSERreferal)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

}
