<style>
    .main_div
    {
        /*margin-left: 300px;
        margin-right: 300px;*/
        /*        background-color: #E5E5E5;*/
        color:black;
        text-align: center;
    }
    .withdrawaloptionimg{
        min-height: 200px;
        border: 2px solid #0782c0;
    }

    .withdrawfee{
        font-weight: bold;
        color: white;
        font-size: 18px;
        font-family: Open Sans, Helvetica Neue, Helvetica, Roboto, Arial, sans-serif;
    }
    .withdrawmaxfee{
        color: white;
        font-size: 15px;
        font-family: Open Sans, Helvetica Neue, Helvetica, Roboto, Arial, sans-serif;
    }
    .withdrawminfee{
        font-weight: bold;
        color: #c5db3b;
        font-size: 17px;
        font-family: Open Sans, Helvetica Neue, Helvetica, Roboto, Arial, sans-serif;
    }
    .foodtext1{
        font-size: 19px;
        color: white;
    }
    .satoshitobtc{
        font-size: 19px;
        color: white;
    }
    .usersatoshi{
        text-shadow: 1px 1px 2px white;
        font-size: 41px;
        color:#0782c0;
    }
    .walleteaddress{
        font-size: 15px;
        color: #c5db3b;
    }
    .walletadrlink{
        font-size: 15px;
        text-decoration: underline;
    }
    .paymentmethod{
        position: absolute;
        z-index: 999999999;
        color: black;
        bottom: top;
        margin-top: -189px;
        margin-left: 11px;
        font-weight: bold;
    }
    .paymethodtop{
        color: black;
        position: absolute;
        /* width: 100%; */
        width: 174px;
        font-weight: bold;
        margin-top: 14px;
    }
    @media only screen and (min-width:1200px) {

        .withdrowrow{
            margin-bottom: 40px;
            padding-bottom: 13px;
            padding-top: 37px;
        }
    }
</style>

<div class="container main_div">     
    <div class="row mainbodybgdailygift padding30both">
        <div class="row" width="100%" style="align-content: center;background-color: #0782C0">
            <h2>Withdraw</h2>
        </div>
        <div class="row" width="100%">               

        </div> 
        <?php
        if ($this->session->flashdata('success')) {
            ?>
            <h5>
                <?php
                echo $this->session->flashdata('success');
            }
            ?>
        </h5>
        <br>
        <div class="row text-center">
            <div class="small-16 large-16 flotleft paddinggift">
                <div class="small-16 large-6 flotleft paddinggift">
                    <br>
                </div>
                <div class="small-16 large-4 flotleft paddinggift">                  
                    <a href="">
                        <?php
                        if ($requestType == 1) {
                            ?>
                            <img class="withdrawaloptionimg" src="<?php echo base_url() . 'client_assets/assets/images/withdrawoption.png'; ?>" alt="">
                            <?php
                        } else if ($requestType == 2) {
                            ?>
                            <img class="withdrawaloptionimg" src="<?php echo base_url() . 'client_assets/assets/images/fucethub.png'; ?>" alt="">
                            <?php
                        }
                        ?>

                    </a>
                    <br>

                    <a class="button withdrowbuttonbank" href="<?php echo base_url('withdraw/checkWithdrawLimit/'.$requestType.'/yes'); ?>">Yes</a>
                    <a class="button withdrowbuttonbank" href="<?php echo base_url('withdraw/checkWithdrawLimit/'.$requestType.'/no'); ?>">No</a>
                </div>
                <div class="small-16 large-6 flotleft paddinggift">
                    <br>
                </div>

            </div>
        </div>
        <div class="row margintop30 withdrowrow" id="" width="100%">
            <div class="small-16 large-2 flotleft paddinggift text-center">
                <br>
            </div>
            <div class="small-16 large-6 flotleft paddinggift text-center">
                <div  style="float: left;width: 100%;color: black;">          
                    <span class="foodtext1">Available Balance to Withdraw :</span><br>
                    <span class="usersatoshi"><?php echo $user_data['user_attack_player_satoshi']; ?></span><br>      
                    <span class="satoshitobtc">
                        <?php echo number_format(($user_data['user_attack_player_satoshi']) * (pow(10, -8)), 8, '.', '') . ' BTC'; //Returns 0.00005000     ?>
                    </span><br>      

                </div> 
            </div>                 
            <div class="small-16 large-6 flotleft paddinggift text-center">
                <div  style="float: left;width: 100%;color: black; margin-bottom: 25px;">          
                    <span class="foodtext1">Your Wallet Address :</span><br>
                    <span class="walleteaddress"><?php echo $user_data['bitcoin_address']; ?>     </span><br>
                    <span class="foodtext">
                        <a href="<?php echo base_url('withdraw/change_wallet_address/' . $user_data['id']); ?>" class="walletadrlink">Change Wallet Address</a>
                    </span><br>
                    <span class="foodtext">
                        <a href="<?php echo base_url('bank'); ?>" class="walletadrlink">Keep some funds in Bank</a>
                    </span><br>

                </div> 
            </div>    
            <div class="small-16 large-2 flotleft paddinggift text-center">
                <br>
            </div>             
        </div> 

        <div class="row text-center">
            <span class="foodtext1">Select Withdraw Option   </span><br><br>
            <div class="small-16 large-4 flotleft paddinggift"> 
                <br>
            </div>

            <div class="small-16 large-8 flotleft paddinggift">        
                <div class="small-16 large-3 flotleft paddinggift">
                    <br>
                </div>
                <div class="small-16 large-5 flotleft paddinggift">
                    <center><span class="paymethodtop">[Middel micro wallet]</span>
                        <a href="<?php echo base_url('withdraw/withdrawMethod/' . $withdraw_limit_data[1]['withdraw_limit_type']); ?>">
                            <img class="withdrawaloptionimg" src="<?php echo base_url() . 'client_assets/assets/images/fucethub.png'; ?>" alt="">
                        </a>
                        <center class="walttertext"> <span class="withdrawfee">Fee: <?php echo $withdraw_limit_data[1]['withdraw_limit_fees']; ?></span> <br><span class="withdrawminfee">Minimum: <?php echo $withdraw_limit_data[1]['withdraw_limit_min']; ?></span> <br><span class="withdrawmaxfee">Max: <?php echo $withdraw_limit_data[1]['withdraw_limit_max']; ?></span></center>
                </div>

                <div class="small-16 large-5 flotleft paddinggift">
                    <center><span class="paymethodtop">[Manual]</span>
                        <?php
                        $with_limit_fees = $withdraw_limit_data[0]['withdraw_limit_fees'];
                        $with_limit_min = $withdraw_limit_data[0]['withdraw_limit_min'];
                        $with_limit_max = $withdraw_limit_data[0]['withdraw_limit_max'];
                        ?>
                        <a href="<?php echo base_url('withdraw/withdrawMethod/' . $withdraw_limit_data[0]['withdraw_limit_type']); ?>">
                            <img class="withdrawaloptionimg" src="<?php echo base_url() . 'client_assets/assets/images/withdrawoption.png'; ?>" alt="">
                        </a>
                        <center class="walttertext"> <span class="withdrawfee">Fee: <?php echo $with_limit_fees; ?></span> <br><span class="withdrawminfee">Minimum: <?php echo $with_limit_min; ?></span> <br><span class="withdrawmaxfee">Max: <?php echo $with_limit_max; ?></span></center>
                </div>


                <!--div class="small-16 large-5 flotleft paddinggift" style="float:left;">
                    <center><span class="paymethodtop">[instant]</span>
                        <a href="">
                            <img class="withdrawaloptionimg" src="<?php echo base_url() . 'client_assets/assets/images/withdrawoption.png'; ?>" alt="">
                            
                        </a>
                        <center class="walttertext"> <span class="withdrawfee">Fee: 20,000</span> <br><span class="withdrawminfee">Minimum: 200,000</span> <br><span class="withdrawmaxfee">Max: Any</span></center>
                </div-->  
            </div>
            <div class="small-16 large-4 flotleft paddinggift"> 
                <br>
            </div>
        </div>



        <!-- <div class="row margintop30" id="" width="100%">
             <div  style="float: left;width: 100%;color: black; margin-bottom: 25px;">          
                 <span class="foodtext">Select Withdraw Option   </span><br>
                 <span class="foodtext">
        <?php
        $method = 'faucetHUb';
        ?>
                     <a href="<?php echo base_url('withdraw/' . $method); ?>">
                         <img src="">
                     </a>
                 </span><br>
             </div>                  
         </div> -->
        <div class="row" id="countDownsatoshi" width="100%">               
            <div  style="color: black; margin-top: 30px;    text-align: center; ">
                <a  class="button btndailygift" href="<?php echo base_url('welcome'); ?>">Back</a>
            </div>
        </div>
    </div>
</div>
