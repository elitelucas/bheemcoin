<?php

class Daily_gift extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('daily_gift_model');
        $this->load->model('foods_model');
        $this->load->model('satoshi_model');
        $this->load->model('user_model');
        
        if ($this->session->userdata('user_login') != "true") {
            redirect('welcome/login');
        }
        
    }

    /**
     * index
     *
     * @uses        using we can get Daily Gifts Page   ..    
     * @author      Webiots_m     
     */
    public function index() {
        if ($this->input->post('cmdSubmit')) {
            
        } else {
            $data['middle'] = 'daily_gifts';
            $this->load->view('template', $data);
        }
    }

    /**
     * login
     *
     * @uses        using this login in front side.   
     * @author      Webiots_m     
     */
    public function get_random() {
        $user_id = $this->session->userdata('user_id');

        // random value set dynamic using satoshi model..
        $data = $this->satoshi_model->getSatoshi();
        $min_value = $data[0]['satoshi_min'];
        $max_value = $data[0]['satoshi_max'];

        //echo "<pre>";        print_r($min_value); die;
        $random = rand($min_value, $max_value);
        //$random = rand(180,181);
        //$fixArrayFoodsData = array(10, 20, 30, 40, 50, 60, 70, 80, 90, 100);
        $fixArrayFoodsData = array(180, 181, 190, 200);
        $fixArrayStarsData = array(3, 4);


        $arrData['daily_amount'] = '';

        if (in_array($random, $fixArrayFoodsData)) {
            $foodsDetails = $this->foods_model->get_foods_name();
            //echo $foodsDetails; die;
            $arrData['daily_type'] = 'foods';
            $arrData['daily_amount'] = $foodsDetails;
        } else if (in_array($random, $fixArrayStarsData)) {
            $arrData['daily_type'] = 'stars';
            $arrData['daily_amount'] = '1';
        } else {
            $arrData['daily_type'] = 'satoshi';
            $arrData['daily_amount'] = $random;
        }

        //echo $arrData['daily_type']; die;
        // echo  in_array(10, $RandomNumberList); die;  
        //$arrData['daily_amount'] = rand(20, 200);

        $arrData['daily_user_id'] = $user_id;
        $arrData['daily_created_date'] = date("Y-m-d h-i-s");
        $arrData['daily_ip_address'] = $this->input->ip_address();



        // echo "<pre>";        print_r($arrData); die;
        $current_date = date('Y-m-d');
        $dailyGift = $this->daily_gift_model->get_dailyGift($user_id, $current_date);

        if ($dailyGift) {
            ?>            
            <div  style="float: left;width: 100%;color: black; margin-top: 30px; margin-left: 50px;">
                <h3 style="color:black;">Your Daily Gift Expired for Today !</h3>
            </div> 
            <?php
        } else {
            $currnt_satoshi = $this->user_model->get_profile($user_id);
            $insert = $this->daily_gift_model->save_dailyGift($arrData);


            // echo "<prE>";            print_r($currnt_satoshi); die;
            if ($insert) {
                ?>
                <div  style="float: left;width: 100%;color: black; margin-top: 30px; margin-left: 50px;">
                    <?php
                    if ($arrData['daily_type'] == 'foods') {
                        $IfoodsId = $arrData['daily_amount'];
                        $resultData = $this->foods_model->get_foods($IfoodsId);
                        ?>
                        <h3 style="color:black;">Yow Won <img style="height: 100px;" src="<?php echo base_url('admin_assets/assets/images/foods/' . $resultData[0]['foods_image']); ?>"></h3>
                        <?php
                    } else if ($arrData['daily_type'] == 'stars') {
                        //echo 'stars'; die;
                        $old_star = $currnt_satoshi['user_star'];
                        $updateData['user_star'] = $arrData['daily_amount'] + $old_star;
                        $update = $this->daily_gift_model->update_DailyGift($user_id, $updateData);
                        if ($update) {
                            ?>
                            <h3 style="color:black;">Yow Won <img style="height: 100px;" src="<?php echo base_url('client_assets/assets/explore/goldenstar.png'); ?>">
                            </h3>
                            <?php
                        }
                    } else if ($arrData['daily_type'] == 'satoshi') {
                        $old_satoshi = $currnt_satoshi['user_attack_player_satoshi'];
                        $updateData['user_attack_player_satoshi'] = $arrData['daily_amount'] + $old_satoshi;
                        $update = $this->daily_gift_model->update_DailyGift($user_id, $updateData);
                        if ($update) {
                            ?>
                            <h3 style="color:black;">Yow Won <?php echo $arrData['daily_amount']; ?> Satoshi !</h3>
                            <?php
                        }
                    }
                    ?>

                </div>                   
                <?php
            }
            //$data['daily_gifts'] = 'not_expired';
        }
    }

}
