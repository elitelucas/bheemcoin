<?php

class Player extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('daily_gift_model');
        $this->load->model('user_model');
        $this->load->model('player_model');

        //$this->load->model('foods_model');
        //$this->load->model('satoshi_model');
    }

    /**
     * index
     *
     * @uses        using we can get Daily Gifts Page   ..    
     * @author      Webiots_m     
     */
    public function index() {
        $userId = $this->session->userdata('user_id');

        //get user data
        $arrData['user_Data'] = $this->user_model->get_profile($userId);
        //echo "<pre>";        print_r($arrData['user_Data']); die;
        //get Player data
        $arrData['player_data'] = $this->player_model->get_player();
        //echo "<pre>";        print_r($arrData['player_data']); die;
        $arrData['middle'] = 'player';
        $this->load->view('template', $arrData);
    }

    public function get_player() {
        $userId = $this->session->userdata('user_id');
        //old player id ..
        $player_id = $_POST['player_id'];
        $satoshi_balance = $_POST['satoshi_balance'];
        $data_satoshi_price_type = $_POST['data_satoshi_price_type'];


        // using this we can get current player image 
        $player_curent_image = $_POST['player_curent_image'];

        $arrData = $this->user_model->get_profile($userId);
        //$IplayerId = $player_id;
        //echo "<prE>";        print_r($arrData); die;

        $old_player_img_id = $arrData['user_current_player'];
        //echo $old_player_img_id; die;
        $IplayerId = $old_player_img_id;
        $player_data = $this->player_model->get_player_image($IplayerId, $userId);

        $old_playe_image = $player_data['player_image'];

        if ($player_id == 1 && $data_satoshi_price_type == 1) {
            $current_satoshi = $arrData['user_attack_player_satoshi'];
            if ($current_satoshi >= $satoshi_balance) {
                ?>
                <h4>Are You Sure You Want to Chnage Your Player ?</h4>
                <div style="float: left;width: 70%;color: black;">                                 
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $player_curent_image); ?>"> --->   <br>
                    </p>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;margin-right: 100px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $old_playe_image); ?>">                                              
                    </p><br>
                    <p style="display:inline-block;margin-left: 200px;">

                        <a href="javascript:void(0)" onclick='playerChangeYes("done",<?php echo $satoshi_balance; ?>,<?php echo $data_satoshi_price_type; ?>,<?php echo $player_id; ?>)' class="button btn-danger">Yes</a>
                        <a href="javascript:void(0)" onclick="playerChangeNo()" class="button ">No</a>
                    </p>
                </div>
                <?php
            } else {
                $playerData = 'not_done';
                ?>
                <h4>Are You Sure You Want to Chnage Your Player ?</h4>
                <div style="float: left;width: 70%;color: black;">                                 
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $player_curent_image); ?>"> --->   <br>
                    </p>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;margin-right: 100px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $old_playe_image); ?>">                                              
                    </p><br>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <a href="javascript:void(0)" onclick="playerChangeYes('not_done')" class="button btn-danger">Yes</a>
                        <a href="javascript:void(0)" onclick="playerChangeNo()" class="button ">No</a>
                    </p>
                </div>
                <?php
            }
        } else if ($player_id == 2 && $data_satoshi_price_type == 1) {
            $current_satoshi = $arrData['user_attack_player_satoshi'];
            if ($current_satoshi >= $satoshi_balance) {
                ?>
                <h4>Are You Sure You Want to Chnage Your Player ?</h4>
                <div style="float: left;width: 70%;color: black;">                                 
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $player_curent_image); ?>"> --->   <br>
                    </p>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;margin-right: 100px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $old_playe_image); ?>">                                              
                    </p><br>
                    <p style="display:inline-block;margin-left: 200px;">

                        <a href="javascript:void(0)" onclick='playerChangeYes("done",<?php echo $satoshi_balance; ?>,<?php echo $data_satoshi_price_type; ?>,<?php echo $player_id; ?>)' class="button btn-danger">Yes</a>
                        <a href="javascript:void(0)" onclick="playerChangeNo()" class="button ">No</a>
                    </p>
                </div>
                <?php
            } else {
                $playerData = 'not_done';
                ?>
                <h4>Are You Sure You Want to Chnage Your Player ?</h4>
                <div style="float: left;width: 70%;color: black;">                                 
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $player_curent_image); ?>"> --->   <br>
                    </p>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;margin-right: 100px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $old_playe_image); ?>">                                              
                    </p><br>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <a href="javascript:void(0)" onclick="playerChangeYes('not_done')" class="button btn-danger">Yes</a>
                        <a href="javascript:void(0)" onclick="playerChangeNo()" class="button ">No</a>
                    </p>
                </div>
                <?php
            }
        } else if ($player_id == 3 && $data_satoshi_price_type == 2) {
            $current_star = $arrData['user_star'];
            if ($current_star >= $satoshi_balance) {
                ?>
                <h4>Are You Sure You Want to Chnage Your Player ?</h4>
                <div style="float: left;width: 70%;color: black;">                                 
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $player_curent_image); ?>"> --->   <br>
                    </p>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;margin-right: 100px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $old_playe_image); ?>">                                              
                    </p><br>
                    <p style="display:inline-block;margin-left: 200px;">

                        <a href="javascript:void(0)" onclick='playerChangeYes("done",<?php echo $satoshi_balance; ?>,<?php echo $data_satoshi_price_type; ?>,<?php echo $player_id; ?>)' class="button btn-danger">Yes</a>
                        <a href="javascript:void(0)" onclick="playerChangeNo()" class="button ">No</a>
                    </p>
                </div>
                <?php
            } else {
                $playerData = 'not_done';
                ?>
                <h4>Are You Sure You Want to Chnage Your Player ?</h4>
                <div style="float: left;width: 70%;color: black;">                                 
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $player_curent_image); ?>"> --->   <br>
                    </p>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;margin-right: 100px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $old_playe_image); ?>">                                              
                    </p><br>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <a href="javascript:void(0)" onclick="playerChangeYes('not_done')" class="button btn-danger">Yes</a>
                        <a href="javascript:void(0)" onclick="playerChangeNo()" class="button ">No</a>
                    </p>
                </div>
                <?php
            }
        } else if ($player_id == 4 && $data_satoshi_price_type == 2) {
            $current_star = $arrData['user_star'];
            if ($current_star >= $satoshi_balance) {
                ?>
                <h4>Are You Sure You Want to Chnage Your Player ?</h4>
                <div style="float: left;width: 70%;color: black;">                                 
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $player_curent_image); ?>"> --->   <br>
                    </p>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;margin-right: 100px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $old_playe_image); ?>">                                              
                    </p><br>
                    <p style="display:inline-block;margin-left: 200px;">

                        <a href="javascript:void(0)" onclick='playerChangeYes("done",<?php echo $satoshi_balance; ?>,<?php echo $data_satoshi_price_type; ?>,<?php echo $player_id; ?>)' class="button btn-danger">Yes</a>
                        <a href="javascript:void(0)" onclick="playerChangeNo()" class="button ">No</a>
                    </p>
                </div>
                <?php
            } else {
                $playerData = 'not_done';
                ?>
                <h4>Are You Sure You Want to Chnage Your Player ?</h4>
                <div style="float: left;width: 70%;color: black;">                                 
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $player_curent_image); ?>"> --->   <br>
                    </p>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;margin-right: 100px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $old_playe_image); ?>">                                              
                    </p><br>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <a href="javascript:void(0)" onclick="playerChangeYes('not_done')" class="button btn-danger">Yes</a>
                        <a href="javascript:void(0)" onclick="playerChangeNo()" class="button ">No</a>
                    </p>
                </div>
                <?php
            }
        } else if ($player_id == 5 && $data_satoshi_price_type == 3) {
            $current_btc = $arrData['user_attack_player_satoshi'];
            $BTC = number_format($current_btc / 100000000, 8);

            if ($BTC >= $satoshi_balance) {
                ?>
                <h4>Are You Sure You Want to Chnage Your Player ?</h4>
                <div style="float: left;width: 70%;color: black;">                                 
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $player_curent_image); ?>"> --->   <br>
                    </p>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;margin-right: 100px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $old_playe_image); ?>">                                              
                    </p><br>
                    <p style="display:inline-block;margin-left: 200px;">

                        <a href="javascript:void(0)" onclick='playerChangeYes("done",<?php echo $satoshi_balance; ?>,<?php echo $data_satoshi_price_type; ?>,<?php echo $player_id; ?>)' class="button btn-danger">Yes</a>
                        <a href="javascript:void(0)" onclick="playerChangeNo()" class="button ">No</a>
                    </p>
                </div>
                <?php
            } else {
                $playerData = 'not_done';
                ?>
                <h4>Are You Sure You Want to Chnage Your Player ?</h4>
                <div style="float: left;width: 70%;color: black;">                                 
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $player_curent_image); ?>"> --->   <br>
                    </p>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <img style="margin-top:15px;margin-right: 100px;" src="<?php echo base_url('admin_assets/assets/images/player/' . $old_playe_image); ?>">                                              
                    </p><br>
                    <p style="display:inline-block;margin-left: 200px;">                
                        <a href="javascript:void(0)" onclick="playerChangeYes('not_done')" class="button btn-danger">Yes</a>
                        <a href="javascript:void(0)" onclick="playerChangeNo()" class="button ">No</a>
                    </p>
                </div>
                <?php
            }
        }
    }

    /**
     * updateUserSatoshi
     *
     * @uses        using this we can update user table . 
     * @author      Webiots_m     
     */
    public function updateUserSatoshi() {
        $userId = $this->session->userdata('user_id');
        $arrData = $this->user_model->get_profile($userId);
        //echo "<prE>";        print_r($arrData); die;
        //old player id
        $old_player_id = $_POST['old_player_id'];

        $satoshi = $_POST['satoshi'];
        $price_type = $_POST['price_type'];
        $updateData;
        if ($price_type == 1) {
            $updateData['user_attack_player_satoshi'] = $arrData['user_attack_player_satoshi'] - $satoshi;
        } else if ($price_type == 2) {
            $updateData['user_star'] = $arrData['user_star'] - $satoshi;
        } else if ($price_type == 3) {
            $updateData['user_attack_player_satoshi'] = $arrData['user_attack_player_satoshi'] - $satoshi;
        }

        $updateData['user_current_player'] = $old_player_id;
        $updateData['user_current_player_expire'] = date('Y-m-d H:i:s');
        $updateData['user_earning_date'] = date('Y-m-d H:i:s');
        //echo "<pre>";        print_r($updateData); die;
        $update = $this->user_model->updateUserSatoshi($userId, $updateData);

        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
