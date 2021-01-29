<?php

class Foods extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('foods_model');
        $this->load->model('daily_gift_model');
        $this->load->model('user_model');
        $this->load->model('satoshi_model');
        
        if ($this->session->userdata('user_login') != "true") {
            redirect('welcome/login');
        }
    }

    /**
     * index
     *
     * @uses        using we can get Daily Foods on dashboard page   ..    
     * @author      Webiots_m     
     */
    public function index() {
        $user_id = $this->session->userdata('user_id');
        
        $data['foodDetails'] = $this->foods_model->getFoodsDashboard($user_id);

        $data['playerHealth'] = $this->user_model->get_profile($user_id);

        //echo "<pre>";        print_r($data); die;

        $data['middle'] = 'foods';
        $this->load->view('template', $data);
        //$this->load->view('foods');
    }

    /**
     * getImage
     *
     * @uses        using this we can get image for specific food    
     * @author      Webiots_m     
     */
    public function getImage() {
        $getFoodid = $_POST['getFoodid'];
        //echo $getFoodid; die;
        $user_id = $this->session->userdata('user_id');
        $data = $this->foods_model->getFoodsDashboardImage($user_id, $getFoodid);
        echo $data[0]['foods_image'];


//        /echo "<prE>";        print_r($data); die;
    }

    /**
     * changeDailyEarningStatus
     *
     * @uses        when eating food success in daily_earnings table daily_earning_status = 0 ..    
     * @author      Webiots_m     
     */
    public function changeDailyEarningStatus() {
        $getFoodid = $_POST['getFoodid'];
        $food_health_Capicity = $_POST['food_health_Capicity'];
        $user_health_capicity = $_POST['user_health_capicity'];

        $user_id = $this->session->userdata('user_id');

        //echo $getFoodid; die;
        $updateData['daily_earning_status'] = 0;

        $status = $this->daily_gift_model->changeStatusDailyEarning($user_id, $getFoodid, $updateData);
        if ($status) {

            $updateHealthData['user_player_health'] = $food_health_Capicity + $user_health_capicity;
            $player = $this->foods_model->updateUserHealth($user_id, $updateHealthData);

            if ($player) {
                echo 'done';
            } else {
                echo 'not done';
            }
        }
    }

    /**
     * updateUserHealth
     *
     * @uses        using this we can get user health data for user table and update latest data 
     * @author      Webiots_m     
     */
    public function updateUserHealth() {
        $user_id = $this->session->userdata('user_id');

        $data = $this->satoshi_model->getSatoshi();
        $min_value = $data[0]['satoshi_min'];
        $max_value = $data[0]['satoshi_max'];

        //echo "<pre>";        print_r($min_value); die;

        $random = rand($min_value, $max_value);
//        user_attack_player_satoshi

        $user_health = $_POST['user_health'];
        $user_satoshi = $_POST['user_satoshi'];
        $updateData['user_player_health'] = $user_health - 100;
        $updateData['user_attack_player_satoshi'] = $user_satoshi + $random;


        $update = $this->user_model->update_UserHealth($user_id, $updateData);
        if ($update) {
            ?>
            <?php echo 'You Won ' . $random; ?> Satoshi ! <br> 
            <?php
        }
    }

}
