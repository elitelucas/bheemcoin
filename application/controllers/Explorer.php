<?php

class Explorer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('explorer_model');
        $this->load->model('user_model');
        
        if ($this->session->userdata('user_login') != "true") {
            redirect('welcome/login');
        }
    }

    /**
     * index
     *
     * @uses        using we can get explorer   ..    
     * @author      Webiots_m     
     */
    public function index() {
        if ($this->input->post('cmdSubmit')) {
            
        } else {
            $data['middle'] = 'explorer';
            $this->load->view('template', $data);
        }
    }

    public function saveStar() {
        $user_id = $this->session->userdata('user_id');

        $arrData['explorer_user_id'] = $user_id;
        $arrData['explorer_daily_star'] = $_POST['star'];
        $arrData['explorer_created_date'] = date("Y-m-d");
        $arrData['explorer_ip_address'] = $this->input->ip_address();


        //echo "<pre>";        print_r($arrData); die;
        $current_date = date('Y-m-d');
        $explorerStar = $this->explorer_model->get_Star($user_id, $current_date);

        if ($explorerStar) {
            ?>            
            <div  style="float: left;width: 100%;color: black; margin-top: 30px; margin-left: 50px;">
                <h3 style="color:black;">Your Daily Star Expired for Today !</h3>
            </div> 
            <?php
        } else {
            $insert = $this->explorer_model->save_explorerStar($arrData);
            if ($insert) {
                
                // if insert than get current star from user table and than update in user table ..
                
                $currnt_star = $this->user_model->get_profile($user_id);
                $old_star = $currnt_star['user_star'];
                $updateData['user_star'] = $arrData['explorer_daily_star'] + $old_star;
                $update = $this->explorer_model->update_Star($user_id, $updateData);
                if ($update) {
                    ?>
                    <div  style="float: left;width: 100%;color: black; margin-top: 30px;">
                        <h3 style="color:black;">Yow Win a new STAR !</h3> <img src="<?php echo base_url('client_assets/assets/explore/goldenstar.png'); ?>" height="100px" width="100px">
                    </div>                   
                    <?php
                }
            }
        }
    }

}
