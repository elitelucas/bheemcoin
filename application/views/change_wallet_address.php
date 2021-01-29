<style>
    .main_div
    {
        /*margin-left: 300px;
        margin-right: 300px;*/
        /*        background-color: #E5E5E5;*/
        color:black;
        text-align: center;
    }
    .banktextColor
    {
        color: black;
    }
    .btnwalleteaddresschange{
    font-size: 20px;
    padding: 10px;
    background: transparent;
    border: 1px solid white;
    color: #c5db3b;
    }
    .btnwalleteaddresschange:hover{
          background: #c5db3b;
        border: 1px solid white;
        border:1px solid #c5db3b;
    }

</style>

<div class="container main_div">     
    <div class="row mainbodybgdailygift padding30both">
        <div class="row" width="100%" style="align-content: center;background-color: #0782C0">
            <h2>Edit Wallet Address</h2>
        </div>
        <div class="row" width="100%">               

        </div> 
        <div class="row margintop30" id="" width="100%">
            <div class="small-16 large-4 flotleft paddinggift text-center">
                <br>
            </div>
            <div class="small-16 large-8 flotleft paddinggift text-center">
            <?php
            echo form_open('withdraw/change_wallet_address/' . $user_data['id']);
            ?>
            <div  style="float: left;width: 100%;color: black; margin-bottom: 25px;">          
                <span class="foodtext">New Wallet Address :</span>
                <span class="foodtext">
                    <?php
                    $dataBtcAddress = array(
                        'name' => 'txtBtcAddress',
                        'id' => 'txtBtcAddress',
                        'class' => 'banktextColor form-control',
                        'value' => $user_data['bitcoin_address']
                    );
                    echo form_input($dataBtcAddress);
                    ?>
                </span>
                    <div class="small-16 large-16 flotleft paddinggift text-center"><img src="<?php echo base_url() . 'client_assets/assets/images/bheemaddresschange.png'; ?>" style="width: 200px;margin-bottom: 20px;"/><br>
                    </div>
                <span class="foodtext">

                    <?php

                    echo form_submit('cmdSubmit', 'Update Wallet', 'class="button btnwalleteaddresschange"');
                    ?>
                </span><br>
            </div> 
            <?php
            echo form_close();
            ?>
        </div>
        <div class="small-16 large-4 flotleft paddinggift text-center">
              
            </div>
        </div>  
        <div class="row" id="countDownsatoshi" width="100%">               
            <div  style="color: black;  text-align: center; ">
                <a  class="button btndailygift" href="<?php echo base_url('welcome'); ?>">Back</a>
            </div>
        </div>
    </div>

</div>
