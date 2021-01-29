
<style>
    .banktextColor
    {
        color: black;
    }
    .satoshi-balancebank{
        font-size: 20px;
        font-weight: bold;
        color: #ffffff;
    }
    .inlinedisp{
        display:  inline;
    }
    .banktextbox{
        width: 93%;;
        display: inline-block; 
    }
    .withdrowbtcamount{
        font-size: 22px;
        font-weight: bold;
    }
    .withdrowbuttonbank{
        width: 120px;
        padding: 11px;
        font-size: 19px;
        background: #0782c0;
        font-weight: bold;
    }
    .withrowdivbank{
        margin-top:49px;
    }
    .captcheroor{
        color: red;
        font-weight: bold;
        text-shadow: 0px 0px 10px black;
    }
</style>



<div class="row mainbodybg padding30both mainbodybgdailygift ">  

    <div class="row" width="100%" style="align-content: center;background-color: #0782C0;text-align: center;">
        <h2>Bank</h2>
    </div>
    <div class="row" id="imageId" width="100%">               
        <br>
        <?php
        //$btc = $available_Balance / 100000000;
        ?>

    </div>
    
    <?php
if ($this->session->flashdata('failed_withdrawl')) {
    ?>
    <div class="row" id="" width="100%">
        <div class="small-16 large-4 flotleft paddinggift">  
            &nbsp;
        </div>
        <div class="small-16 large-8 flotleft paddinggift">   
            <br>
            <center> <div class="alert alert-danger alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>
                        <?php
                        echo $this->session->flashdata('failed_withdrawl');
                        ?>
                    </strong> 

                </div></center>
        </div><br>
        <div class="small-16 large-4 flotleft paddinggift">  
            &nbsp;
        </div>
    </div>
    <?php
}
?>
    
    <div class="row">
        <div class="small-16 large-3 flotleft paddinggift">
            <br>
        </div>
        <div class="small-16 large-5 flotleft paddinggift">
            <!--p>Submit the word you see below:</p-->
            <div class="row">
                <span style="font-family: Luckiest Guy, cursive;    font-size: 25px;
                      color: #c5db3b;"><?php
                      //    echo "Your Total Satoshi is -> " . number_format($btc, 8);
                      echo "Your Total Satoshi is : " . $available_Balance;
                      //echo "<pre>";        print_r($available_Balance); die;
                      ?>
                </span>
                <br>
                <span class="satoshi-balancebank">Satoshi transfer into Bank Balance :</span>
            </div>
            <div class="row">

                <input class="banktextColor banktextbox" type="text" name="txtInputBank" id="txtInputBank" value="<?php echo $available_Balance; ?>">

  <!--<span class="inlinedisp satoshi-balancebank">
      (28 Available)
  </span>-->
            </div>
            <p id="captImg" class="inlinedisp"><?php echo $captchaImg; ?></p>
            <a href="javascript:void(0);" class="refreshCaptcha inlinedisp" >
                <img src="<?php echo base_url() . 'admin_assets/assets/images/refresh.png'; ?>"/>
            </a>
            <?php
            //echo form_open('bank', 'bank');
            ?>
            <div class="row">
                <br>
                <input type="text" class="banktextColor banktextbox" name="captcha" id="captcha" placeholder="Enter captcha here">
                <span id="resultShow"></span>
                <input type="hidden" id="btc_amount" name="btc_amount" value="<?php echo $available_Balance; ?>">

                <br><input type="submit" id="cmdSubmit" id="cmdSubmit" name="cmdSubmit" value="SUBMIT" class="button withdrowbuttonbank"/>
                <?php
                //echo form_close();
                ?>
            </div>
        </div>
        <div class="small-16 large-6 flotleft paddinggift text-center">
            <div class="row withrowdivbank">
                <img src="<?php echo base_url() . 'client_assets/assets/images/banknew.png'; ?>" style="width: 200px;"/>

            </div>
            <div class="row"> 
                <span class="withdrowbtcamount">
                    <?php
                    if ($bankDetails == 'no_data') {
                        $satoshi = 0;
                    } else {
                        $satoshi = $bankDetails[0]['bank_amount']; //Satoshi to btc

                        echo number_format(($satoshi) * (pow(10, -8)), 8, '.', '') . ' BTC'; //Returns 0.00005000
                    }
                    ?> 
                </span>
                <br> 
                <a class="button withdrowbuttonbank" href="<?php echo base_url('bank/bankWithdrawl/' . $satoshi); ?>">Withdraw</a>
            </div>
        </div>
    </div>
    <center><iframe data-aa='873554' src='//ad.a-ads.com/873554?size=728x90' scrolling='no' style='width:728px; height:90px; border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe></center>
<center><iframe data-aa='873544' src='//ad.a-ads.com/873544?size=990x90' scrolling='no' style='width:990px; height:90px; border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe></center>
    <div class="row" id="countDownsatoshi" width="100%">               
        <div  style="color: black; margin-top: 30px;    text-align: center; ">
            <a  class="button btndailygift" href="<?php echo base_url('welcome'); ?>">Back</a>
        </div>
    </div>
    <br>
</div>

<script>

    $('.refreshCaptcha').on('click', function () {
        // alert('hello');
        $.get('<?php echo base_url() . 'bank/refresh'; ?>', function (data) {
            $('#captImg').html(data);
        });
    });

    $('#cmdSubmit').click(function ()
    {
        var btc_amount = $('#btc_amount').val();
        var captcha = $('#captcha').val();
        var txtInputBank = $('#txtInputBank').val();
        //  alert(txtInputBank);


        $.ajax(
                {
                    url: '<?php echo base_url('bank/checkCaptcha'); ?>',
                    type: 'post',
                    data: {btc_amount: btc_amount, captcha: captcha, txtInputBank: txtInputBank},
                    success: function (data)
                    {
                        if (data == 'success')
                        {
                            window.location = "<?php echo base_url('bank'); ?>";
                        } else
                        {
                            $('#resultShow').html(data);
                        }

                    }
                });
    });

</script>
